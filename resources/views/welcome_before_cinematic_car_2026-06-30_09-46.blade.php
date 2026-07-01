<!DOCTYPE html>
<html lang="ka">
<head>
    <meta charset="UTF-8">
    <title>AutoSchool — Dashboard</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
        *{box-sizing:border-box}
        :root{
            --bg:#050505;
            --card:#111111;
            --card2:#181818;
            --line:#27272a;
            --yellow:#facc15;
            --red:#ef4444;
            --green:#22c55e;
            --text:#fff;
            --muted:#a1a1aa;
        }
        body{margin:0;font-family:system-ui,-apple-system,BlinkMacSystemFont,"Segoe UI",sans-serif;background:var(--bg);color:var(--text)}
        a{text-decoration:none;color:inherit}
        .app{max-width:1260px;margin:auto;padding:22px}
        .nav{height:72px;display:flex;align-items:center;justify-content:space-between}
        .brand{display:flex;align-items:center;gap:12px;font-weight:950;font-size:23px}
        .traffic{width:46px;height:60px;border-radius:18px;background:#111;border:1px solid #2a2a2a;display:grid;place-items:center}
        .traffic div{display:grid;gap:5px}
        .traffic span{width:12px;height:12px;border-radius:50%;display:block}
        .r{background:var(--red);box-shadow:0 0 14px rgba(239,68,68,.7)}
        .y{background:var(--yellow);box-shadow:0 0 14px rgba(250,204,21,.7)}
        .g{background:var(--green);box-shadow:0 0 14px rgba(34,197,94,.7)}
        .nav a.btn{background:var(--yellow);color:#111;padding:13px 18px;border-radius:16px;font-weight:950}

        .hero{padding:34px 0 28px}
        .hello{display:flex;justify-content:space-between;gap:22px;align-items:end;margin-bottom:24px}
        .hello h1{font-size:56px;line-height:1;letter-spacing:-2.4px;margin:0}
        .hello p{margin:12px 0 0;color:var(--muted);font-size:18px}
        .status{background:#111;border:1px solid var(--line);border-radius:22px;padding:18px;min-width:260px}
        .status b{font-size:30px;color:var(--yellow)}
        .status span{display:block;color:var(--muted);font-weight:800;margin-top:4px}

        .main-grid{display:grid;grid-template-columns:1.25fr .75fr;gap:18px}
        .primary-card{
            min-height:430px;
            border-radius:36px;
            background:
                radial-gradient(circle at 70% 20%,rgba(250,204,21,.18),transparent 30%),
                linear-gradient(135deg,#171717,#080808);
            border:1px solid rgba(255,255,255,.10);
            padding:34px;
            position:relative;
            overflow:hidden;
            box-shadow:0 40px 120px rgba(0,0,0,.5);
        }
        .road{
            position:absolute;right:70px;bottom:-170px;width:260px;height:560px;
            transform:perspective(500px) rotateX(62deg);
            background:#080808;border-left:5px solid #e5e5e5;border-right:5px solid #e5e5e5;
            opacity:.85;
        }
        .road:after{
            content:"";position:absolute;left:50%;top:0;width:9px;height:100%;transform:translateX(-50%);
            background:repeating-linear-gradient(to bottom,var(--yellow) 0 36px,transparent 36px 72px);
        }
        .tag{display:inline-flex;background:rgba(250,204,21,.12);border:1px solid rgba(250,204,21,.22);color:var(--yellow);padding:9px 13px;border-radius:999px;font-weight:950;margin-bottom:22px}
        .primary-card h2{font-size:48px;line-height:1.04;letter-spacing:-1.7px;margin:0 0 16px;max-width:580px}
        .primary-card p{color:#d4d4d8;font-size:18px;line-height:1.65;margin:0 0 26px;max-width:560px}
        .play{display:inline-flex;background:var(--yellow);color:#111;padding:16px 24px;border-radius:18px;font-weight:950}
        .quick{display:grid;grid-template-columns:repeat(3,1fr);gap:12px;margin-top:34px;position:relative;z-index:2}
        .quick div{background:rgba(255,255,255,.07);border:1px solid rgba(255,255,255,.11);border-radius:22px;padding:18px}
        .quick b{display:block;font-size:28px;margin-bottom:5px}
        .quick span{color:#a1a1aa;font-weight:800}

        .side{display:grid;gap:18px}
        .card{background:var(--card);border:1px solid var(--line);border-radius:30px;padding:24px;box-shadow:0 24px 80px rgba(0,0,0,.22)}
        .card h3{font-size:25px;margin:0 0 12px}
        .progress{height:12px;background:#27272a;border-radius:999px;overflow:hidden;margin:14px 0}
        .progress span{display:block;width:68%;height:100%;background:var(--yellow)}
        .small-muted{color:var(--muted);font-weight:800}
        .traffic-list{display:grid;gap:10px;margin-top:14px}
        .traffic-list div{display:flex;align-items:center;gap:10px;background:#181818;border:1px solid var(--line);border-radius:16px;padding:13px;font-weight:850}
        .bul{width:12px;height:12px;border-radius:50%;display:block}

        .section{margin-top:22px}
        .section-title{display:flex;justify-content:space-between;align-items:center;margin:0 0 14px}
        .section-title h2{font-size:30px;margin:0;letter-spacing:-.8px}
        .section-title a{color:var(--yellow);font-weight:900}
        .categories{display:grid;grid-template-columns:repeat(4,1fr);gap:14px}
        .cat{min-height:150px;background:var(--card);border:1px solid var(--line);border-radius:28px;padding:22px;transition:.25s}
        .cat:hover{transform:translateY(-4px);border-color:rgba(250,204,21,.5)}
        .cat .ico{font-size:30px;margin-bottom:20px}
        .cat h3{font-size:22px;margin:0 0 8px}
        .cat p{color:var(--muted);margin:0;line-height:1.5;font-weight:700}

        .challenge{margin-top:18px;display:grid;grid-template-columns:1fr 1fr;gap:18px}
        .exam-preview{background:#0b0b0b;border:1px solid var(--line);border-radius:30px;padding:24px}
        .exam-top{display:flex;justify-content:space-between;margin-bottom:16px}
        .pill{background:rgba(250,204,21,.1);border:1px solid rgba(250,204,21,.22);color:var(--yellow);padding:8px 12px;border-radius:999px;font-weight:950;font-size:13px}
        .question{font-size:22px;font-weight:950;line-height:1.35;margin-bottom:14px}
        .answer{padding:14px 15px;border:1px solid var(--line);background:#151515;border-radius:16px;margin-top:9px;font-weight:850;color:#d4d4d8}
        .answer.good{border-color:rgba(34,197,94,.45);background:rgba(34,197,94,.12);color:#86efac}

        @media(max-width:950px){
            .hello,.main-grid,.challenge{display:block}
            .hello h1{font-size:38px}
            .status{margin-top:18px}
            .quick,.categories{grid-template-columns:1fr}
            .side{margin-top:18px}
            .primary-card h2{font-size:34px}
            .road{opacity:.35;right:10px}
            .exam-preview{margin-top:18px}
        }
    </style>
</head>
<body>

<div class="app">
    <nav class="nav">
        <a class="brand" href="/autoschool">
            <span class="traffic"><div><span class="r"></span><span class="y"></span><span class="g"></span></div></span>
            <span>AutoSchool</span>
        </a>
        <a class="btn" href="/autoschool/exam">ტესტის დაწყება</a>
    </nav>

    <section class="hero">
        <div class="hello">
            <div>
                <h1>გამარჯობა 👋<br>რას ვსწავლობთ დღეს?</h1>
                <p>შედი ტესტში, ისწავლე შეცდომებზე და გახსენი მწვანე გზა გამოცდისკენ.</p>
            </div>
            <div class="status">
                <b>68%</b>
                <span>მზადყოფნა გამოცდისთვის</span>
            </div>
        </div>

        <div class="main-grid">
            <div class="primary-card">
                <div class="road"></div>
                <div class="tag">დღის მთავარი რეჟიმი</div>
                <h2>გაიარე მართვის მოწმობის ტესტი რეალური გამოცდის სტილში</h2>
                <p>წითელი გაჩვენებს შეცდომას, ყვითელი გაძლევს ახსნას, მწვანე კი გაძლევს პროგრესს.</p>
                <a class="play" href="/autoschool/exam">▶ დაწყება</a>

                <div class="quick">
                    <div><b>5</b><span>კითხვა ბაზაში</span></div>
                    <div><b>10</b><span>PDF-დან ამოღებული</span></div>
                    <div><b>AI</b><span>მარტივი ახსნა</span></div>
                </div>
            </div>

            <div class="side">
                <div class="card">
                    <h3>გააგრძელე პროგრესი</h3>
                    <div class="progress"><span></span></div>
                    <div class="small-muted">დღეს მიზანი: 20 კითხვა</div>
                </div>

                <div class="card">
                    <h3>შუქნიშნის ლოგიკა</h3>
                    <div class="traffic-list">
                        <div><span class="bul r"></span> წითელი — შეცდომა</div>
                        <div><span class="bul y"></span> ყვითელი — ახსნა</div>
                        <div><span class="bul g"></span> მწვანე — სწორი პასუხი</div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="section-title">
            <h2>სწავლის კატეგორიები</h2>
            <a href="/autoschool/exam">ყველას ნახვა</a>
        </div>

        <div class="categories">
            <div class="cat"><div class="ico">🚦</div><h3>ნიშნები</h3><p>საგზაო ნიშნები და წესები.</p></div>
            <div class="cat"><div class="ico">🚗</div><h3>მანევრი</h3><p>მოხვევა, გასწრება და გაჩერება.</p></div>
            <div class="cat"><div class="ico">🛣</div><h3>გზაჯვარედინი</h3><p>პრიორიტეტი და მიმართულებები.</p></div>
            <div class="cat"><div class="ico">🚸</div><h3>ქვეითები</h3><p>ქვეითთა გადასასვლელი და უსაფრთხოება.</p></div>
        </div>
    </section>

    <section class="challenge">
        <div class="card">
            <h3>დღის გამოწვევა</h3>
            <p class="small-muted">უპასუხე 20 კითხვას და ნახე რამდენად მზად ხარ გამოცდისთვის.</p>
            <br>
            <a class="play" href="/autoschool/exam">გამოწვევის დაწყება</a>
        </div>

        <div class="exam-preview">
            <div class="exam-top">
                <span class="pill">Live Preview</span>
                <span class="pill">00:28</span>
            </div>
            <div class="question">რომელი მიმართულებით არის ნებადართული მოძრაობა?</div>
            <div class="answer">მხოლოდ მარჯვნივ</div>
            <div class="answer good">პირდაპირ ან მარცხნივ ✓</div>
            <div class="answer">მხოლოდ უკან დაბრუნება</div>
        </div>
    </section>
</div>

</body>
</html>
