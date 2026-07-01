<!DOCTYPE html>
<html lang="ka">
<head>
    <meta charset="UTF-8">
    <title>AutoSchool — Premium Driving Exam Platform</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <style>
        *{box-sizing:border-box}
        body{margin:0;font-family:system-ui,-apple-system,BlinkMacSystemFont,"Segoe UI",sans-serif;background:#020617;color:white;overflow-x:hidden}
        a{text-decoration:none;color:inherit}
        .hero{min-height:100vh;position:relative;overflow:hidden;background:
            radial-gradient(circle at 18% 10%,rgba(14,165,233,.45),transparent 28%),
            radial-gradient(circle at 82% 18%,rgba(99,102,241,.35),transparent 28%),
            radial-gradient(circle at 50% 100%,rgba(34,197,94,.16),transparent 30%),
            linear-gradient(180deg,#07111f 0%,#020617 100%)}
        .mesh{position:absolute;inset:0;background-image:linear-gradient(rgba(148,163,184,.08) 1px,transparent 1px),linear-gradient(90deg,rgba(148,163,184,.08) 1px,transparent 1px);background-size:64px 64px;mask-image:linear-gradient(to bottom,#000,transparent 85%)}
        .nav{max-width:1240px;margin:auto;padding:24px 18px;display:flex;justify-content:space-between;align-items:center;position:relative;z-index:4}
        .brand{display:flex;align-items:center;gap:12px;font-size:22px;font-weight:1000}
        .logo{width:48px;height:48px;border-radius:18px;background:linear-gradient(135deg,#22d3ee,#2563eb 60%,#4f46e5);display:grid;place-items:center;box-shadow:0 0 55px rgba(34,211,238,.45)}
        .links{display:flex;gap:25px;color:#cbd5e1;font-weight:850}
        .start{padding:13px 18px;border-radius:16px;background:rgba(255,255,255,.09);border:1px solid rgba(255,255,255,.14);font-weight:950}
        .wrap{max-width:1240px;margin:auto;padding:58px 18px 80px;display:grid;grid-template-columns:1fr 1fr;gap:44px;align-items:center;position:relative;z-index:3}
        .tag{display:inline-flex;align-items:center;gap:10px;padding:10px 15px;border-radius:999px;background:rgba(34,211,238,.1);border:1px solid rgba(103,232,249,.24);color:#a5f3fc;font-weight:950;margin-bottom:20px}
        h1{font-size:76px;line-height:.92;letter-spacing:-3.6px;margin:0 0 24px}
        h1 span{background:linear-gradient(90deg,#fff,#7dd3fc,#60a5fa);-webkit-background-clip:text;color:transparent}
        .lead{font-size:20px;line-height:1.75;color:#cbd5e1;margin:0 0 30px;max-width:650px}
        .actions{display:flex;gap:14px;flex-wrap:wrap}
        .btn{padding:17px 24px;border-radius:18px;font-weight:1000;display:inline-flex;align-items:center;gap:10px}
        .btn-main{background:linear-gradient(135deg,#22d3ee,#2563eb);box-shadow:0 22px 60px rgba(37,99,235,.46)}
        .btn-soft{background:rgba(255,255,255,.075);border:1px solid rgba(255,255,255,.13);color:#dbeafe}
        .metrics{display:grid;grid-template-columns:repeat(3,1fr);gap:13px;margin-top:34px}
        .metric{padding:18px;border-radius:22px;background:rgba(255,255,255,.07);border:1px solid rgba(255,255,255,.11);backdrop-filter:blur(14px)}
        .metric b{font-size:30px;display:block}
        .metric span{color:#94a3b8;font-weight:850}
        .scene{height:610px;position:relative;perspective:1100px}
        .screen{position:absolute;inset:0;border-radius:44px;background:linear-gradient(180deg,rgba(15,23,42,.7),rgba(2,6,23,.92));border:1px solid rgba(148,163,184,.23);box-shadow:0 45px 140px rgba(0,0,0,.62);overflow:hidden;transform:rotateY(-7deg) rotateX(3deg)}
        .horizon{position:absolute;left:0;right:0;top:0;height:58%;background:linear-gradient(180deg,rgba(14,165,233,.16),rgba(15,23,42,.08),transparent)}
        .road{position:absolute;left:50%;bottom:-245px;width:520px;height:830px;transform:translateX(-50%) rotateX(66deg);transform-origin:bottom;background:linear-gradient(90deg,#020617,#0f172a 38%,#1e293b 50%,#0f172a 62%,#020617);border-left:4px solid rgba(34,211,238,.85);border-right:4px solid rgba(34,211,238,.85);box-shadow:0 0 90px rgba(34,211,238,.28)}
        .road:before{content:"";position:absolute;left:50%;top:0;transform:translateX(-50%);width:10px;height:100%;background:repeating-linear-gradient(to bottom,#facc15 0 55px,transparent 55px 105px);filter:drop-shadow(0 0 12px #facc15)}
        .hud{position:absolute;left:28px;right:28px;top:28px;display:flex;justify-content:space-between;z-index:3}
        .hud span{padding:10px 13px;border-radius:999px;background:rgba(2,6,23,.66);border:1px solid rgba(125,211,252,.22);font-weight:950;color:#bae6fd}
        .quiz{position:absolute;left:46px;right:46px;top:96px;border-radius:30px;background:rgba(255,255,255,.94);color:#0f172a;padding:24px;z-index:4;box-shadow:0 34px 90px rgba(0,0,0,.38)}
        .quiz-top{display:flex;justify-content:space-between;align-items:center;margin-bottom:15px}
        .pill{padding:8px 12px;border-radius:999px;background:#eff6ff;color:#2563eb;font-weight:1000;font-size:13px}
        .time{color:#ef4444;font-weight:1000}
        .q{font-size:23px;line-height:1.32;font-weight:1000;margin-bottom:15px}
        .ans{padding:14px 15px;margin-top:9px;border-radius:17px;background:#f1f5f9;border:1px solid #e2e8f0;font-weight:900}
        .ans.good{background:#dcfce7;color:#166534;border-color:#22c55e}
        .coach{position:absolute;left:64px;right:64px;bottom:42px;z-index:5;border-radius:28px;background:rgba(2,6,23,.82);border:1px solid rgba(34,211,238,.27);padding:20px;backdrop-filter:blur(20px);box-shadow:0 30px 85px rgba(0,0,0,.48)}
        .coach b{display:flex;gap:9px;color:#67e8f9;margin-bottom:8px}
        .coach p{margin:0;color:#dbeafe;line-height:1.6;font-weight:750}
        .float{position:absolute;z-index:6;border-radius:24px;background:rgba(255,255,255,.09);border:1px solid rgba(255,255,255,.14);backdrop-filter:blur(16px);padding:16px;font-weight:950;box-shadow:0 20px 70px rgba(0,0,0,.38)}
        .f1{right:-12px;top:138px}.f2{left:-18px;bottom:170px}
        .section{max-width:1240px;margin:auto;padding:85px 18px}
        .section h2{font-size:46px;letter-spacing:-1.6px;margin:0 0 12px}
        .section p{color:#94a3b8;font-size:18px;line-height:1.7}
        .cards{display:grid;grid-template-columns:repeat(3,1fr);gap:18px;margin-top:30px}
        .card{padding:28px;border-radius:30px;background:linear-gradient(180deg,rgba(255,255,255,.08),rgba(255,255,255,.035));border:1px solid rgba(255,255,255,.1)}
        .card h3{margin:0 0 10px;font-size:23px}
        .card p{font-size:16px;margin:0}
        @media(max-width:920px){
            .wrap{grid-template-columns:1fr;padding-top:36px}
            h1{font-size:45px;letter-spacing:-1.6px}
            .links{display:none}
            .metrics,.cards{grid-template-columns:1fr}
            .scene{height:560px}
            .screen{transform:none}
            .quiz{left:18px;right:18px}
            .coach{left:22px;right:22px}
            .float{display:none}
        }
    </style>
</head>
<body>

<section class="hero">
    <div class="mesh"></div>

    <nav class="nav">
        <a class="brand" href="/autoschool">
            <span class="logo">A</span>
            <span>AutoSchool</span>
        </a>
        <div class="links">
            <a href="/autoschool">მთავარი</a>
            <a href="/autoschool/exam">ტესტები</a>
            <a href="#system">სისტემა</a>
        </div>
        <a class="start" href="/autoschool/exam">ტესტის დაწყება</a>
    </nav>

    <div class="wrap">
        <div>
            <div class="tag">Premium Driving Exam System</div>
            <h1>ისწავლე მოძრაობის წესები <span>ჭკვიანად</span></h1>
            <p class="lead">
                ავტოსკოლის თანამედროვე პლატფორმა — ტესტები, ვიზუალური კითხვები,
                სწორი პასუხები და არასწორ პასუხზე ადამიანური ახსნა, რომ მოსწავლემ რეალურად გაიგოს წესი.
            </p>

            <div class="actions">
                <a class="btn btn-main" href="/autoschool/exam">დაიწყე ტესტი →</a>
                <a class="btn btn-soft" href="#system">ნახე სისტემა</a>
            </div>

            <div class="metrics">
                <div class="metric"><b>5</b><span>სატესტო კითხვა</span></div>
                <div class="metric"><b>PDF</b><span>ავტომატური წყარო</span></div>
                <div class="metric"><b>AI</b><span>მარტივი ახსნა</span></div>
            </div>
        </div>

        <div class="scene">
            <div class="screen">
                <div class="horizon"></div>
                <div class="road"></div>

                <div class="hud">
                    <span>Exam Mode</span>
                    <span>Progress 72%</span>
                </div>

                <div class="quiz">
                    <div class="quiz-top">
                        <span class="pill">ბილეთი #24</span>
                        <span class="time">00:28</span>
                    </div>
                    <div class="q">რომელი მიმართულებით არის ნებადართული მოძრაობა მოცემულ სიტუაციაში?</div>
                    <div class="ans">მხოლოდ მარჯვნივ</div>
                    <div class="ans good">სწორია — პირდაპირ ან მარცხნივ</div>
                    <div class="ans">მხოლოდ უკუსვლით</div>
                </div>

                <div class="coach">
                    <b>AI Coach</b>
                    <p>არასწორი პასუხისას სისტემა ხსნის მარტივი ენით — რა წესი მუშაობს და რატომ.</p>
                </div>
            </div>

            <div class="float f1">🚦 წესების სწავლა</div>
            <div class="float f2">🛣 საგამოცდო რეჟიმი</div>
        </div>
    </div>
</section>

<section class="section" id="system">
    <h2>არა უბრალოდ ტესტები — სასწავლო სისტემა</h2>
    <p>პლატფორმის მიზანია მოსწავლემ არა დაიზეპიროს, არამედ გაიგოს რატომ არის პასუხი სწორი.</p>

    <div class="cards">
        <div class="card">
            <h3>საგამოცდო ინტერფეისი</h3>
            <p>კითხვები, პასუხები, დრო, პროგრესი და შედეგების დათვლა.</p>
        </div>
        <div class="card">
            <h3>ახსნა შეცდომაზე</h3>
            <p>popup უხსნის წესს ადამიანურად, ზედმეტი რთული მუხლების გარეშე.</p>
        </div>
        <div class="card">
            <h3>ადმინ პანელი</h3>
            <p>შემდეგ ეტაპზე კითხვების, კატეგორიების და PDF იმპორტის მართვა.</p>
        </div>
    </div>
</section>

</body>
</html>
