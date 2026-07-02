import re, json, urllib.request
from pathlib import Path
from html import unescape

ROOT = Path("/home/admin/web/dmgroup.website/public_html/public/autoschool/esvinkofila")
DATA = ROOT / "data/questions.json"
HEADERS = {"User-Agent":"Mozilla/5.0"}

def fetch(url):
    req = urllib.request.Request(url, headers=HEADERS)
    return urllib.request.urlopen(req, timeout=40).read().decode("utf-8", errors="ignore")

def clean(s):
    s = re.sub(r"<.*?>", "", s, flags=re.S)
    s = unescape(s)
    return re.sub(r"\s+", " ", s).strip()

data = json.load(open(DATA, encoding="utf-8"))
by_source = {int(q["source_ticket"]): q for q in data if q.get("source_ticket")}

topic_names = {
    1:"მძღოლი, მგზავრი და ქვეითი, ნიშნები, კონვენცია",
    2:"უწესივრობა და მართვის პირობები",
    3:"მაფრთხილებელი ნიშნები",
    4:"პრიორიტეტის ნიშნები",
    5:"ამკრძალავი ნიშნები",
    6:"მიმთითებელი ნიშნები",
    7:"საინფორმაციო-მაჩვენებელი ნიშნები",
    8:"სერვისის ნიშნები",
    9:"დამატებითი ინფორმაციის ნიშნები",
    10:"შუქნიშნის სიგნალები",
    11:"მარეგულირებლის სიგნალები",
    12:"სპეციალური სიგნალის გამოყენება",
    13:"საავარიო შუქური სიგნალიზაცია",
    14:"სანათი ხელსაწყოები, ხმოვანი სიგნალი",
    15:"მოძრაობა, მანევრირება, სავალი ნაწილი",
    16:"გასწრება შემხვედრის გვერდის ავლით",
    17:"მოძრაობის სიჩქარე",
    18:"სამუხრუჭე მანძილი, დისტანცია",
    19:"გაჩერება დგომა",
    20:"გზაჯვარედინის გავლა",
    21:"რკინიგზის გადასასვლელი",
    22:"მოძრაობა ავტომაგისტრალზე",
    23:"საცხოვრებელი ზონა, სამარშრუტოს პრიორიტეტი",
    24:"ბუქსირება",
    25:"სასწავლო სვლა",
    26:"გადაზიდვები, ხალხი, ტვირთი",
    27:"ველოსიპედი, მოპედი და პირუტყვის გადარეკვა",
    28:"საგზაო მონიშვნა",
    29:"სამედიცინო დახმარება",
    30:"მოძრაობის უსაფრთხოება",
    31:"ადმინისტრაციული კანონი",
    32:"ეკო-მართვა",
}

mapped = 0

for topic_id in range(1, 33):
    page = 1
    while True:
        url = f"https://teoria.on.ge/tickets/2/{topic_id}?page={page}"
        html = fetch(url)

        tickets = [int(x) for x in re.findall(r'tickets\?ticket=(\d+)', html)]
        tickets = sorted(set(tickets))

        if not tickets:
            break

        for tid in tickets:
            q = by_source.get(tid)
            if q:
                if not q.get("topic_id"):
                    mapped += 1
                q["topic_id"] = topic_id
                q["topic_name"] = topic_names.get(topic_id, "")

        print(f"topic {topic_id} page {page}: {len(tickets)} tickets")
        page += 1

        if page > 10:
            break

DATA.write_text(json.dumps(data, ensure_ascii=False, indent=2), encoding="utf-8")

print("DONE")
print("mapped:", mapped)
print("with topic:", sum(1 for q in data if q.get("topic_id")))
