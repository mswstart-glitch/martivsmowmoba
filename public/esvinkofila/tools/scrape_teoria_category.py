"""
Generalized per-category scraper for teoria.on.ge — NEW tool, sibling of the
existing tools/scrape_teoria.py (which only ever scraped category id=2,
B/B1, into data/questions.json + images/). This script never touches that
category, that JSON file, or the images/ folder: it writes to brand-new,
category-specific output paths so the existing exam/test pages and their
data are completely untouched.

Usage: python3 scrape_teoria_category.py <cat_id> <teoria_category_number> <out_json_name>
Example: python3 scrape_teoria_category.py AM 10 questions_AM.json
"""
import re, sys, json, time, urllib.request
from pathlib import Path
from html import unescape

ROOT = Path(__file__).resolve().parent.parent
DATA_DIR = ROOT / "data"
HEADERS = {"User-Agent": "Mozilla/5.0"}

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
            text_m = re.search(r'<span class="t-a-text">\s*<span class="text-wrap">(.*?)</span>', inner, flags=re.S)
            text = clean(text_m.group(1)) if text_m else ""
            if not text:
                continue
            is_correct = 'data-is-correct-list="true"' in attrs
            if is_correct:
                correct = i
            answers.append({"number": i, "text": text, "is_correct": is_correct})

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

def main():
    cat_id = sys.argv[1]            # e.g. "AM"
    teoria_num = sys.argv[2]        # e.g. "10"
    out_name = sys.argv[3]          # e.g. "questions_AM.json"

    img_dir = ROOT / "images_categories" / cat_id
    img_dir.mkdir(parents=True, exist_ok=True)
    out_json = DATA_DIR / out_name
    report = ROOT / f"scrape-report-{cat_id}.txt"

    base = f"https://teoria.on.ge/tickets/{teoria_num}?page={{page}}"
    all_items = []
    report_lines = []

    for page in range(1, 120):
        url = base.format(page=page)
        print(f"[{cat_id}] PAGE {page}", flush=True)
        try:
            html = fetch(url).decode("utf-8", errors="ignore")
        except Exception as e:
            print(f"[{cat_id}] PAGE {page} FETCH ERROR: {e}", flush=True)
            break
        items = parse_articles(html)
        print(f"[{cat_id}]   questions: {len(items)}", flush=True)
        report_lines.append(f"PAGE {page}: {len(items)}")

        if not items:
            break

        for item in items:
            new_id = len(all_items) + 1
            item["id"] = new_id
            item["ticket_number"] = new_id
            item["category"] = cat_id

            if item["image_url"]:
                img_path = img_dir / f"ticket_{new_id}.jpg"
                if not img_path.exists() or img_path.stat().st_size < 1000:
                    try:
                        img_path.write_bytes(fetch(item["image_url"]))
                        time.sleep(0.06)
                    except Exception as e:
                        print(f"[{cat_id}] IMAGE ERROR {item['image_url']}: {e}", flush=True)
                if img_path.exists():
                    item["image"] = f"images_categories/{cat_id}/ticket_{new_id}.jpg"

            all_items.append(item)

        out_json.write_text(json.dumps(all_items, ensure_ascii=False, indent=2), encoding="utf-8")
        time.sleep(0.2)

    out_json.write_text(json.dumps(all_items, ensure_ascii=False, indent=2), encoding="utf-8")
    report.write_text("\n".join(report_lines) + f"\nTOTAL: {len(all_items)}\n", encoding="utf-8")
    print(f"[{cat_id}] DONE total={len(all_items)}", flush=True)

if __name__ == "__main__":
    main()
