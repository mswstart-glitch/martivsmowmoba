#!/usr/bin/env python3
"""
detect_zones.py — თითოეული ticket ფოტოს ჩაშენებული (baked) პასუხების ველის
ავტომატური აღმოჩენა პიქსელების ანალიზით.

ფოტოს ქვედა ნაწილში ჩაშენებულია მუქი-ცისფერი (teal) პასუხების შაბლონი, რომელიც
ფოტოს ბოლომდე გრძელდება. სკრიპტი ქვევიდან ზევით სკანირებით პოულობს, სად იწყება
ეს ბლოკი (პროცენტულად სიმაღლიდან) და აკლასიფიცირებს:
  wide   — დიდი ჩაშენებული ველი (~37%-დან), საფარი მაღლა უნდა დაიწყოს
  normal — ჩვეულებრივი (~73%-დან)
  review — ატიპური/საეჭვო, ხელით სანახავი (preview_all.html-ში)

გამომავალი: data/image_zones.json  ({wide:[...], review:[...], map:{img:pct}})
გაშვება:  python3 tools/detect_zones.py
"""
from PIL import Image
import json, os

ROOT = os.path.dirname(os.path.dirname(os.path.abspath(__file__)))
QJSON = os.path.join(ROOT, 'data', 'questions.json')
OUT   = os.path.join(ROOT, 'data', 'image_zones.json')

def cyan_row(px, y, cols):
    rs = gs = bs = 0
    for x in cols:
        r, g, b = px[x, y]; rs += r; gs += g; bs += b
    n = len(cols); r, g, b = rs // n, gs // n, bs // n
    # მუქი-ცისფერი (teal) შაბლონის მწკრივი: b>r, g>=r, არც ღია, არც ცისფერი ცა
    return (b > r + 6) and (g >= r - 2) and (r < 120) and (b < 170)

def zone_top(path):
    im = Image.open(path).convert('RGB'); W, H = im.size; px = im.load()
    cols = [int(W * f) for f in (0.12, 0.28, 0.44, 0.6, 0.76, 0.9)]
    if not any(cyan_row(px, H - 1 - k, cols) for k in range(6)):
        return None                      # ბოლოში teal არ არის — შაბლონი ვერ მოიძებნა
    top = H; gap = 0; y = H - 1
    while y >= 0:
        if cyan_row(px, y, cols):
            top = y; gap = 0
        else:
            gap += 1
            if gap > int(H * 0.03):       # პატარა არა-teal ზოლები (ბორდერები) დაშვებულია
                break
        y -= 1
    return round(top / H * 100, 2)

def numkey(s):
    return int(''.join(filter(str.isdigit, s)) or 0)

def main():
    d = json.load(open(QJSON, encoding='utf-8'))
    imgs = []; seen = set()
    for q in d:
        im = q.get('image')
        if im and im not in seen:
            seen.add(im); imgs.append(im)

    wide = []; normal = []; review = []; mp = {}
    for im in imgs:
        p = os.path.join(ROOT, im)
        if not os.path.exists(p):
            review.append(im); continue
        z = zone_top(p); mp[im] = z
        if z is None:            review.append(im)
        elif 30 <= z <= 50:      wide.append(im)
        elif z >= 60:            normal.append(im)
        else:                    review.append(im)   # ატიპური (50-60% ან <30%)

    out = {
        'version': 1,
        'note': 'auto-detected teal answer-template start; wide=cover from ~37%, normal=~73%',
        'wide':   sorted(wide,   key=numkey),
        'review': sorted(review, key=numkey),
        'map':    mp,
    }
    json.dump(out, open(OUT, 'w', encoding='utf-8'), ensure_ascii=False, indent=1)
    print(f'wide:{len(wide)}  normal:{len(normal)}  review:{len(review)}  total:{len(imgs)}')
    print('->', OUT)

if __name__ == '__main__':
    main()
