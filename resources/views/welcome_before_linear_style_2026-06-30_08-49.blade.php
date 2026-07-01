<!DOCTYPE html>
<html lang="ka">
<head>
    <meta charset="UTF-8">
    <title>AutoSchool — მართვის მოწმობის ტესტები</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
        *{box-sizing:border-box}
        body{margin:0;font-family:Inter,system-ui,-apple-system,BlinkMacSystemFont,"Segoe UI",sans-serif;background:#eef3fb;color:#101827}
        a{text-decoration:none;color:inherit}
        .shell{max-width:1220px;margin:auto;padding:22px}
        .hero{
            min-height:720px;
            border-radius:42px;
            background:
                radial-gradient(circle at 78% 20%,rgba(37,99,235,.18),transparent 30%),
                linear-gradient(135deg,#ffffff 0%,#f8fbff 50%,#edf5ff 100%);
            border:1px solid rgba(148,163,184,.22);
            box-shadow:0 35px 100px rgba(15,23,42,.12);
            overflow:hidden;
            position:relative;
        }
        .nav{display:flex;justify-content:space-between;align-items:center;padding:24px 28px;position:relative;z-index:2}
        .brand{display:flex;gap:12px;align-items:center;font-weight:950;font-size:22px}
        .brand-mark{width:46px;height:46px;border-radius:17px;background:#111827;color:white;display:grid;place-items:center}
        .navlinks{display:flex;gap:26px;color:#64748b;font-weight:800}
        .navbtn{background:#111827;color:white;padding:13px 18px;border-radius:16px;font-weight:900}
        .hero-grid{display:grid;grid-template-columns:1fr 1fr;gap:38px;align-items:center;padding:62px 58px 70px}
        .kicker{display:inline-flex;background:#e0ecff;color:#2563eb;border-radius:999px;padding:10px 15px;font-weight:900;margin-bottom:18px}
        h1{font-size:66px;line-height:1;letter-spacing:-2.8px;margin:0 0 22px;color:#0f172a}
        .text{font-size:19px;line-height:1.75;color:#64748b;margin:0 0 30px;max-width:630px}
        .actions{display:flex;gap:14px;flex-wrap:wrap}
        .primary{display:inline-flex;background:#2563eb;color:white;padding:16px 22px;border-radius:17px;font-weight:950;box-shadow:0 20px 45px rgba(37,99,235,.25)}
        .secondary{display:inline-flex;background:white;color:#0f172a;padding:16px 22px;border-radius:17px;font-weight:950;border:1px solid #e2e8f0}
        .preview{position:relative}
        .exam{
            background:#101827;
            border-radius:34px;
            padding:22px;
            color:white;
            box-shadow:0 35px 90px rgba(15,23,42,.28);
            position:relative;
            z-index:2;
        }
        .exam-head{display:flex;justify-content:space-between;align-items:center;margin-bottom:18px}
        .tag{background:rgba(255,255,255,.09);padding:9px 12px;border-radius:999px;color:#bfdbfe;font-weight:900;font-size:13px}
        .timer{color:#fde68a;font-weight:950}
        .image-box{
            height:175px;
            border-radius:24px;
            background:
                linear-gradient(135deg,rgba(59,130,246,.26),rgba(14,165,233,.08)),
                #182235;
            margin-bottom:18px;
            position:relative;
            overflow:hidden;
        }
        .road{position:absolute;left:50%;bottom:-80px;width:230px;height:270px;background:#0f172a;transform:translateX(-50%) perspective(400px) rotateX(55deg);border-left:3px solid #38bdf8;border-right:3px solid #38bdf8}
        .road:after{content:"";position:absolute;left:50%;top:0;width:6px;height:100%;transform:translateX(-50%);background:repeating-linear-gradient(to bottom,#facc15 0 28px,transparent 28px 52px)}
        .q{font-size:21px;line-height:1.35;font-weight:950;margin-bottom:14px}
        .answer{background:#1e293b;border:1px solid rgba(255,255,255,.08);padding:14px;border-radius:16px;margin-top:9px;font-weight:850;color:#dbeafe}
        .answer.good{background:#dcfce7;color:#166534;border-color:#22c55e}
        .coach{
            margin-top:14px;
            background:#f8fafc;
            color:#334155;
            border-radius:22px;
            padding:17px;
            line-height:1.55;
            font-weight:750;
        }
        .floating{
            position:absolute;
            right:-20px;
            bottom:-22px;
            background:white;
            padding:18px;
            border-radius:24px;
            box-shadow:0 25px 60px rgba(15,23,42,.16);
            z-index:3;
            font-weight:950;
        }
        .section{padding:42px 4px 0}
        .cards{display:grid;grid-template-columns:repeat(3,1fr);gap:18px}
        .card{
            background:white;
            border-radius:30px;
            padding:28px;
            border:1px solid rgba(226,232,240,.9);
            box-shadow:0 22px 60px rgba(15,23,42,.07);
        }
        .icon{width:54px;height:54px;border-radius:20px;background:#eff6ff;color:#2563eb;display:grid;place-items:center;font-size:24px;margin-bottom:18px}
        .card h3{font-size:23px;margin:0 0 10px;color:#0f172a}
        .card p{margin:0;color:#64748b;line-height:1.65;font-size:16px}
        .wide{
            margin-top:18px;
            display:grid;
            grid-template-columns:1fr 1fr;
            gap:18px;
        }
        .panel{
            background:#111827;
            color:white;
            border-radius:32px;
            padding:30px;
            min-height:245px;
        }
        .panel.light{background:white;color:#0f172a;border:1px solid #e2e8f0}
        .panel h2{font-size:34px;letter-spacing:-1px;margin:0 0 12px}
        .panel p{color:#94a3b8;line-height:1.7;margin:0}
        .panel.light p{color:#64748b}
        @media(max-width:900px){
            .hero-grid,.wide{grid-template-columns:1fr;padding:34px 22px}
            h1{font-size:42px}
            .cards{grid-template-columns:1fr}
            .navlinks{display:none}
            .hero{border-radius:28px}
            .floating{display:none}
        }
    </style>
</head>
<body>

<div class="shell">
    <main class="hero">
        <nav class="nav">
            <a href="/autoschool" class="brand">
                <span class="brand-mark">A</span>
                <span>AutoSchool</span>
            </a>
            <div class="navlinks">
                <a href="/autoschool/exam">ტესტები</a>
                <a href="#features">სისტემა</a>
                <a href="#">ადმინი</a>
            </div>
            <a href="/autoschool/exam" class="navbtn">დაწყება</a>
        </nav>

        <div class="hero-grid">
            <div>
                <div class="kicker">მართვის მოწმობის პლატფორმა</div>
                <h1>ისწავლე არა ზეპირად, არამედ გაგებით.</h1>
                <p class="text">
                    ტესტები, სურათები, სწორი პასუხები და მარტივი ახსნა ერთ სივრცეში.
                    პლატფორმა ეხმარება მოსწავლეს შეცდომიდან ისწავლოს და გამოცდაზე თავდაჯერებული გავიდეს.
                </p>
                <div class="actions">
                    <a class="primary" href="/autoschool/exam">ტესტის დაწყება</a>
                    <a class="secondary" href="#features">პლატფორმის ნახვა</a>
                </div>
            </div>

            <div class="preview">
                <div class="exam">
                    <div class="exam-head">
                        <span class="tag">საგამოცდო კითხვა</span>
                        <span class="timer">00:28</span>
                    </div>
                    <div class="image-box">
                        <div class="road"></div>
                    </div>
                    <div class="q">რომელი მიმართულებით არის ნებადართული მოძრაობა მოცემულ სიტუაციაში?</div>
                    <div class="answer">მხოლოდ მარჯვნივ</div>
                    <div class="answer good">სწორია — პირდაპირ ან მარცხნივ</div>
                    <div class="answer">მხოლოდ უკან დაბრუნება</div>
                    <div class="coach">
                        არასწორ პასუხზე მოსწავლე იღებს მოკლე, ადამიანურ ახსნას — რატომ არის პასუხი არასწორი.
                    </div>
                </div>
                <div class="floating">PDF → კითხვები → ტესტი</div>
            </div>
        </div>
    </main>

    <section class="section" id="features">
        <div class="cards">
            <div class="card">
                <div class="icon">01</div>
                <h3>PDF-დან ამოღებული კითხვები</h3>
                <p>ბილეთის ნომერი, კითხვა, პასუხები, სწორი პასუხი, ახსნა და სურათი ინახება Laravel/MySQL-ში.</p>
            </div>
            <div class="card">
                <div class="icon">02</div>
                <h3>შეცდომაზე ახსნა</h3>
                <p>popup უხსნის მოსწავლეს შეცდომას მარტივად, ისე რომ რეალურად დაიმახსოვროს წესი.</p>
            </div>
            <div class="card">
                <div class="icon">03</div>
                <h3>სუფთა არქიტექტურა</h3>
                <p>demo კოდი არ გადმოგვაქვს პირდაპირ — სისტემა Laravel-ში სწორად და მასშტაბურად ეწყობა.</p>
            </div>
        </div>

        <div class="wide">
            <div class="panel">
                <h2>სასწავლო რეჟიმი</h2>
                <p>მოსწავლე პასუხობს კითხვებს და მაშინვე ხედავს სწორ პასუხს, ახსნას და ვიზუალურ მინიშნებას.</p>
            </div>
            <div class="panel light">
                <h2>საგამოცდო რეჟიმი</h2>
                <p>შემდეგ ეტაპზე დაემატება დრო, ქულები, შეცდომების ისტორია და კატეგორიების მიხედვით ტესტირება.</p>
            </div>
        </div>
    </section>
</div>

</body>
</html>
