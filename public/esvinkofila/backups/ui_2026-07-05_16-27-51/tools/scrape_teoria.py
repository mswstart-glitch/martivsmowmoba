import re, json, time, urllib.request
from pathlib import Path
from html import unescape

ROOT = Path("/home/admin/web/dmgroup.website/public_html/public/autoschool/esvinkofila")
IMG_DIR = ROOT / "images"
DATA_DIR = ROOT / "data"
REPORT = ROOT / "scrape-report.txt"
OUT_JSON = DATA_DIR / "questions.json"

BASE = "https://teoria.on.ge/tickets/2?page={page}"
HEADERS = {"User-Agent": "Mozilla/5.0"}

IMG_DIR.mkdir(exist_ok=True)
DATA_DIR.mkdir(exist_ok=True)

def fetch(url):
    req = urllib.request.Request(url, headers=HEADERS)
    return urllib.request.urlopen(req, timeout=40).read()

def clean(s):
    s = re.sub(r"<.*?>", "", s, flags=re.S)
    s = unescape(s)
    return re.sub(r"\s+", " ", s).strip()

def abs_url(url):
    if url.startswith("//"): return "https:" + url
    if url.startswith("/"): return "https://teoria.on.ge" + url
    return url.replace("http://", "https://")

def parse_articles(html):
    blocks = re.findall(r'<article class="ticket-container.*?</article>', html, flags=re.S)
    items = []

    for block in blocks:
        ticket_m = re.search(r'tickets\?ticket=(\d+)', block)
        ticket_id = int(ticket_m.group(1)) if ticket_m else None

        img_m = re.search(r'<figure class="t-image">\s*<img src="([^"]+)"', block, flags=re.S)
        img_url = abs_url(img_m.group(1)) if img_m else ""

        q_m = re.search(r'<span class="text-wrap">(.*?)</span>', block, flags=re.S)
        question = clean(q_m.group(1)) if q_m else ""

        answer_blocks = re.findall(r'<p class="t-answer[^"]*"(.*?)>(.*?)</p>', block, flags=re.S)
        answers = []
        correct = None

        for i, (attrs, inner) in enumerate(answer_blocks, start=1):
            # პასუხის რეალური ტექსტი <t-a-text><text-wrap>-შია, არა
            # <t-answer-inner>-ის პირველივე </span>-მდე (რაც მხოლოდ
            # t-a-num-ის ციფრს იჭერდა — ამიტომ იყო ყველგან "1","2","3","4")
            text_m = re.search(r'<span class="t-a-text">\s*<span class="text-wrap">(.*?)</span>', inner, flags=re.S)
            text = clean(text_m.group(1)) if text_m else ""
            if not text:
                continue

            is_correct = 'data-is-correct-list="true"' in attrs
            if is_correct:
                correct = i

            answers.append({
                "number": i,
                "text": text,
                "is_correct": is_correct
            })

        desc_m = re.search(r'<div class="desc-box-inner">.*?</strong>\s*<p>(.*?)</p>', block, flags=re.S)
        explanation = clean(desc_m.group(1)) if desc_m else ""

        if question and answers:
            items.append({
                "source_ticket": ticket_id,
                "question": question,
                "image_url": img_url,
                "image": "",
                "answers": answers,
                "correct_answer": correct,
                "explanation": explanation
            })

    return items

all_items = []
report = []

for page in range(1, 80):
    url = BASE.format(page=page)
    print("PAGE", page)
    html = fetch(url).decode("utf-8", errors="ignore")
    items = parse_articles(html)

    print("  questions:", len(items))
    report.append(f"PAGE {page}: {len(items)}")

    if not items:
        break

    for item in items:
        new_id = len(all_items) + 1
        item["id"] = new_id
        item["ticket_number"] = new_id

        if item["image_url"]:
            ext = ".jpg"
            img_path = IMG_DIR / f"ticket_{new_id}{ext}"

            if not img_path.exists() or img_path.stat().st_size < 1000:
                try:
                    img_path.write_bytes(fetch(item["image_url"]))
                    time.sleep(0.08)
                except Exception as e:
                    print("IMAGE ERROR", item["image_url"], e)

            if img_path.exists():
                item["image"] = f"images/ticket_{new_id}{ext}"

        all_items.append(item)

    OUT_JSON.write_text(json.dumps(all_items, ensure_ascii=False, indent=2), encoding="utf-8")
    time.sleep(0.25)

OUT_JSON.write_text(json.dumps(all_items, ensure_ascii=False, indent=2), encoding="utf-8")
REPORT.write_text("\n".join(report) + f"\nTOTAL: {len(all_items)}\n", encoding="utf-8")

print("DONE")
print("TOTAL:", len(all_items))
print("JSON:", OUT_JSON)
print("IMAGES:", IMG_DIR)
