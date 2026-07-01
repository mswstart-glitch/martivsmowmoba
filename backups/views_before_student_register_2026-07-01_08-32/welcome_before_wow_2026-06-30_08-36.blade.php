<!DOCTYPE html>
<html lang="ka">
<head>
    <meta charset="UTF-8">
    <title>AutoSchool — მართვის მოწმობის ტესტები</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
        *{box-sizing:border-box}
        body{margin:0;font-family:system-ui,-apple-system,BlinkMacSystemFont,"Segoe UI",sans-serif;background:#050816;color:white;overflow-x:hidden}
        a{text-decoration:none;color:inherit}
        .page{min-height:100vh;position:relative;background:
            radial-gradient(circle at 18% 12%,rgba(59,130,246,.35),transparent 32%),
            radial-gradient(circle at 82% 20%,rgba(14,165,233,.22),transparent 30%),
            linear-gradient(180deg,#070b1f 0%,#050816 58%,#030712 100%);
        }
        .glow-line{position:absolute;inset:auto 0 0;height:280px;background:linear-gradient(90deg,transparent,#2563eb,transparent);opacity:.18;filter:blur(45px)}
        .nav{max-width:1220px;margin:0 auto;padding:24px 18px;display:flex;align-items:center;justify-content:space-between;position:relative;z-index:2}
        .brand{display:flex;align-items:center;gap:12px;font-weight:950;font-size:22px;letter-spacing:-.4px}
        .mark{width:44px;height:44px;border-radius:16px;background:linear-gradient(135deg,#38bdf8,#2563eb);display:grid;place-items:center;box-shadow:0 18px 50px rgba(37,99,235,.45)}
        .navlinks{display:flex;gap:24px;color:#cbd5e1;font-weight:800;font-size:14px}
        .navbtn{padding:12px 17px;border-radius:15px;background:rgba(255,255,255,.08);border:1px solid rgba(255,255,255,.12);font-weight:900}
        .hero{max-width:1220px;margin:0 auto;padding:62px 18px 90px;display:grid;grid-template-columns:1.05fr .95fr;gap:44px;align-items:center;position:relative;z-index:2}
        .eyebrow{display:inline-flex;gap:10px;align-items:center;padding:10px 14px;border-radius:999px;background:rgba(56,189,248,.1);border:1px solid rgba(125,211,252,.22);color:#bae6fd;font-weight:900;font-size:14px;margin-bottom:18px}
        h1{font-size:68px;line-height:.98;margin:0 0 22px;letter-spacing:-2.8px}
        h1 span{background:linear-gradient(90deg,#fff,#93c5fd,#38bdf8);-webkit-background-clip:text;color:transparent}
        .lead{font-size:19px;line-height:1.75;color:#cbd5e1;max-width:660px;margin:0 0 30px}
        .actions{display:flex;gap:14px;flex-wrap:wrap}
        .primary,.ghost{display:inline-flex;align-items:center;gap:10px;padding:16px 22px;border-radius:18px;font-weight:950}
        .primary{background:linear-gradient(135deg,#38bdf8,#2563eb);box-shadow:0 22px 55px rgba(37,99,235,.42)}
        .ghost{background:rgba(255,255,255,.07);border:1px solid rgba(255,255,255,.13);color:#dbeafe}
        .mini{display:grid;grid-template-columns:repeat(3,1fr);gap:12px;margin-top:34px;max-width:640px}
        .mini div{padding:16px;border-radius:20px;background:rgba(255,255,255,.06);border:1px solid rgba(255,255,255,.1);color:#cbd5e1;font-weight:800}
        .mini b{display:block;color:white;font-size:25px;margin-bottom:4px}
        .visual{position:relative;min-height:560px}
        .roadcard{position:absolute;inset:0;border-radius:42px;background:linear-gradient(180deg,rgba(15,23,42,.82),rgba(2,6,23,.92));border:1px solid rgba(148,163,184,.22);box-shadow:0 35px 120px rgba(0,0,0,.55);overflow:hidden}
        .road{position:absolute;left:50%;bottom:-170px;width:390px;height:700px;transform:translateX(-50%) perspective(700px) rotateX(58deg);background:linear-gradient(90deg,#020617 0%,#111827 45%,#1e293b 50%,#111827 55%,#020617 100%);border-left:3px solid rgba(56,189,248,.65);border-right:3px solid rgba(56,189,248,.65);box-shadow:0 0 70px rgba(56,189,248,.28)}
        .road:before{content:"";position:absolute;left:50%;top:0;width:8px;height:100%;transform:translateX(-50%);background:repeating-linear-gradient(to bottom,#facc15 0 48px,transparent 48px 88px);filter:drop-shadow(0 0 10px #facc15)}
        .exam-card{position:absolute;left:34px;right:34px;top:34px;border-radius:28px;background:rgba(255,255,255,.92);color:#0f172a;padding:22px;box-shadow:0 30px 80px rgba(0,0,0,.35)}
        .exam-top{display:flex;justify-content:space-between;align-items:center;margin-bottom:16px}
        .pill{padding:8px 12px;border-radius:999px;background:#eff6ff;color:#2563eb;font-weight:950;font-size:13px}
        .timer{font-weight:950;color:#ef4444}
        .question{font-size:22px;font-weight:950;line-height:1.35;margin-bottom:14px}
        .answer{padding:13px 14px;border-radius:16px;background:#f1f5f9;margin-top:9px;font-weight:850;border:1px solid #e2e8f0}
        .answer.ok{background:#dcfce7;border-color:#22c55e;color:#166534}
        .popup{position:absolute;left:56px;right:56px;bottom:44px;border-radius:26px;background:rgba(15,23,42,.86);border:1px solid rgba(125,211,252,.26);padding:20px;backdrop-filter:blur(18px);box-shadow:0 25px 80px rgba(0,0,0,.45)}
        .popup b{display:block;color:#7dd3fc;margin-bottom:7px}
        .popup p{margin:0;color:#dbeafe;line-height:1.55;font-weight:700}
        .orb{position:absolute;width:120px;height:120px;border-radius:50%;background:rgba(56,189,248,.18);filter:blur(3px);right:-32px;top:130px;border:1px solid rgba(125,211,252,.25)}
        .section{max-width:1220px;margin:0 auto;padding:80px 18px}
        .section h2{font-size:42px;letter-spacing:-1.4px;margin:0 0 16px}
        .section-sub{color:#94a3b8;font-size:18px;margin:0 0 26px}
        .features{display:grid;grid-template-columns:repeat(3,1fr);gap:18px}
        .feature{background:linear-gradient(180deg,rgba(255,255,255,.08),rgba(255,255,255,.04));border:1px solid rgba(255,255,255,.1);border-radius:28px;padding:26px}
        .icon{width:50px;height:50px;border-radius:18px;background:rgba(59,130,246,.18);display:grid;place-items:center;margin-bottom:16px;font-size:22px}
        .feature h3{font-size:22px;margin:0 0 10px}
        .feature p{margin:0;color:#94a3b8;line-height:1.65}
        @media(max-width:900px){
            .hero{grid-template-columns:1fr;padding-top:35px}
            h1{font-size:43px;letter-spacing:-1.4px}
            .visual{min-height:520px}
            .features,.mini{grid-template-columns:1fr}
            .navlinks{display:none}
            .exam-card{left:18px;right:18px}
            .popup{left:24px;right:24px}
        }
    </style>
</head>
<body>

<main class="page">
    <div class="glow-line"></div>

    <nav class="nav">
        <a class="brand" href="/autoschool">
            <span class="mark">A</span>
            <span>AutoSchool</span>
        </a>

        <div class="navlinks">
            <a href="/autoschool">მთავარი</a>
            <a href="/autoschool/exam">ტესტები</a>
            <a href="#features">შესაძლებლობები</a>
        </div>

        <a class="navbtn" href="/autoschool/exam">დაწყება</a>
    </nav>

    <section class="hero">
        <div>
            <div class="eyebrow">პრემიუმ სასწავლო პლატფორმა</div>

            <h1>მართვის მოწმობისთვის მზადება <span>უფრო მარტივად</span></h1>

            <p class="lead">
                თანამედროვე ტესტირების სისტემა, სადაც მოსწავლე მხოლოდ პასუხს კი არ ირჩევს —
                შეცდომის დროს იღებს გასაგებ ახსნას, სწავლობს წესს და რეალურად ემზადება გამოცდისთვის.
            </p>

            <div class="actions">
                <a class="primary" href="/autoschool/exam">ტესტის დაწყება →</a>
                <a class="ghost" href="#features">ნახე როგორ მუშაობს</a>
            </div>

            <div class="mini">
                <div><b>PDF</b>კითხვების იმპორტი</div>
                <div><b>AI</b>ადამიანური ახსნა</div>
                <div><b>Admin</b>შემდეგი ეტაპი</div>
            </div>
        </div>

        <div class="visual">
            <div class="roadcard">
                <div class="orb"></div>
                <div class="road"></div>

                <div class="exam-card">
                    <div class="exam-top">
                        <span class="pill">ბილეთი #24</span>
                        <span class="timer">00:28</span>
                    </div>

                    <div class="question">რომელი მიმართულებით არის ნებადართული მოძრაობა მოცემულ სიტუაციაში?</div>

                    <div class="answer">მხოლოდ მარჯვნივ</div>
                    <div class="answer ok">სწორია — პირდაპირ ან მარცხნივ</div>
                    <div class="answer">მხოლოდ უკუსვლით</div>
                </div>

                <div class="popup">
                    <b>შეცდომის ახსნა</b>
                    <p>სისტემა გიხსნის არა მუხლებით, არამედ მარტივი ენით — რატომ არის პასუხი არასწორი და რა უნდა გაითვალისწინო.</p>
                </div>
            </div>
        </div>
    </section>
</main>

<section class="section" id="features">
    <h2>პლატფორმის მთავარი იდეა</h2>
    <p class="section-sub">არა უბრალოდ ტესტები — არამედ სწავლა შეცდომებზე.</p>

    <div class="features">
        <div class="feature">
            <div class="icon">✓</div>
            <h3>საგამოცდო რეჟიმი</h3>
            <p>კითხვები, პასუხები, სწორი პასუხის დაფიქსირება და შედეგების დათვლა.</p>
        </div>

        <div class="feature">
            <div class="icon">!</div>
            <h3>არასწორზე popup</h3>
            <p>როცა მოსწავლე შეცდება, სისტემა უხსნის მიზეზს გასაგებად და მშვიდად.</p>
        </div>

        <div class="feature">
            <div class="icon">⚙</div>
            <h3>ადმინ პანელი</h3>
            <p>შემდეგ ეტაპზე დაემატება კითხვების, პასუხების, კატეგორიების და PDF იმპორტის მართვა.</p>
        </div>
    </div>
</section>

</body>
</html>
