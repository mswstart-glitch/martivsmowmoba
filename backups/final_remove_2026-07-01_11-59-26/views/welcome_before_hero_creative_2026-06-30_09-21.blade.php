<!DOCTYPE html>
<html lang="ka">
<head>
    <meta charset="UTF-8">
    <title>AutoSchool — Night Drive</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
        *{box-sizing:border-box}
        :root{--bg:#070707;--card:#121212;--line:#2a2a2a;--yellow:#facc15;--text:#fff;--muted:#a1a1aa;--red:#ef4444;--green:#22c55e}
        body{margin:0;font-family:system-ui,-apple-system,BlinkMacSystemFont,"Segoe UI",sans-serif;background:var(--bg);color:var(--text);overflow-x:hidden}
        a{text-decoration:none;color:inherit}
        .hero{min-height:100vh;position:relative;overflow:hidden;background:radial-gradient(circle at 50% -10%,rgba(250,204,21,.18),transparent 36%),radial-gradient(circle at 15% 20%,rgba(34,197,94,.08),transparent 24%),radial-gradient(circle at 85% 20%,rgba(239,68,68,.08),transparent 24%),linear-gradient(180deg,#080808,#030303)}
        .hero:before{content:"";position:absolute;inset:0;opacity:.12;background-image:linear-gradient(90deg,rgba(255,255,255,.06) 1px,transparent 1px),linear-gradient(rgba(255,255,255,.04) 1px,transparent 1px);background-size:70px 70px}
        .road-line{position:absolute;left:50%;top:-180px;width:46px;height:145%;transform:translateX(-50%);opacity:.25;filter:drop-shadow(0 0 22px rgba(250,204,21,.45));background:repeating-linear-gradient(to bottom,rgba(250,204,21,.9) 0 72px,transparent 72px 132px) left center/12px 100% no-repeat,repeating-linear-gradient(to bottom,rgba(250,204,21,.9) 0 72px,transparent 72px 132px) right center/12px 100% no-repeat;animation:drive 3.8s linear infinite}
        @keyframes drive{from{background-position-y:0}to{background-position-y:132px}}
        .container{max-width:1220px;margin:auto;padding:0 22px;position:relative;z-index:3}
        .nav{height:86px;display:flex;align-items:center;justify-content:space-between}
        .brand{display:flex;align-items:center;gap:12px;font-weight:950;font-size:22px}
        .traffic-logo{width:50px;height:68px;border-radius:20px;background:linear-gradient(180deg,#191919,#050505);border:1px solid rgba(255,255,255,.12);display:grid;place-items:center;padding:7px;box-shadow:0 20px 60px rgba(0,0,0,.35)}
        .lights{display:grid;gap:5px}
        .light{width:14px;height:14px;border-radius:50%;background:#333;box-shadow:inset 0 2px 5px rgba(0,0,0,.65)}
        .red{background:var(--red);animation:redOn 3s infinite}
        .yellow{background:var(--yellow);animation:yellowOn 3s infinite}
        .green{background:var(--green);animation:greenOn 3s infinite}
        @keyframes redOn{0%,28%{box-shadow:0 0 18px var(--red);opacity:1}29%,100%{opacity:.28;box-shadow:none}}
        @keyframes yellowOn{0%,32%{opacity:.28;box-shadow:none}33%,60%{box-shadow:0 0 18px var(--yellow);opacity:1}61%,100%{opacity:.28;box-shadow:none}}
        @keyframes greenOn{0%,64%{opacity:.28;box-shadow:none}65%,100%{box-shadow:0 0 18px var(--green);opacity:1}}
        .links{display:flex;gap:28px;color:var(--muted);font-weight:800}
        .navbtn{background:var(--yellow);color:#111;padding:13px 18px;border-radius:16px;font-weight:950}
        .center{padding:70px 0 56px;text-align:center}
        .badge{display:inline-flex;padding:10px 15px;border-radius:999px;background:rgba(250,204,21,.1);border:1px solid rgba(250,204,21,.22);color:var(--yellow);font-weight:950;margin-bottom:22px}
        h1{font-size:78px;line-height:.92;letter-spacing:-3.8px;margin:0 auto 24px;max-width:1060px}
        h1 span{color:var(--yellow)}
        .lead{color:var(--muted);font-size:20px;line-height:1.75;max-width:760px;margin:0 auto 26px}
        .searchbox{max-width:760px;margin:0 auto 24px;background:rgba(255,255,255,.07);border:1px solid rgba(250,204,21,.22);border-radius:24px;padding:15px 18px;display:flex;align-items:center;gap:14px;box-shadow:0 24px 80px rgba(0,0,0,.28)}
        .searchbox span{color:var(--yellow);font-size:22px}
        .searchbox b{color:#f5f5f5;font-size:18px;font-weight:850;flex:1;text-align:left}
        .chips{display:flex;justify-content:center;gap:10px;flex-wrap:wrap;margin-bottom:32px}
        .chips a{padding:10px 14px;border-radius:999px;background:#121212;border:1px solid var(--line);color:#d4d4d8;font-weight:850}
        .chips a:hover{border-color:rgba(250,204,21,.55);color:var(--yellow)}
        .actions{display:flex;justify-content:center;gap:14px;flex-wrap:wrap}
        .btn{display:inline-flex;padding:16px 24px;border-radius:18px;font-weight:950}
        .primary{background:var(--yellow);color:#111;box-shadow:0 22px 60px rgba(250,204,21,.22)}
        .secondary{background:rgba(255,255,255,.06);border:1px solid rgba(255,255,255,.12);color:#fff}
        .screen{margin:28px auto 0;max-width:1080px;background:linear-gradient(180deg,rgba(24,24,24,.92),rgba(10,10,10,.92));border:1px solid rgba(255,255,255,.14);border-radius:42px;padding:20px;box-shadow:0 55px 160px rgba(0,0,0,.72),0 0 0 1px rgba(250,204,21,.04);backdrop-filter:blur(18px)}
        .screen-top{height:46px;border-radius:24px;background:#0b0b0b;border:1px solid var(--line);display:flex;align-items:center;justify-content:space-between;padding:0 15px;margin-bottom:18px}
        .dots{display:flex;gap:8px}.dot{width:10px;height:10px;border-radius:50%;background:#3f3f46}.url{color:#71717a;font-weight:850;font-size:13px}
        .pill{background:rgba(250,204,21,.1);color:var(--yellow);border:1px solid rgba(250,204,21,.22);padding:9px 13px;border-radius:999px;font-size:13px;font-weight:950}
        .exam{display:grid;grid-template-columns:.82fr 1.18fr;gap:18px}
        .visual{min-height:390px;border-radius:28px;background:radial-gradient(circle at 50% 15%,rgba(250,204,21,.15),transparent 30%),linear-gradient(180deg,#191919,#0d0d0d);border:1px solid var(--line);position:relative;overflow:hidden}
        .big-traffic{position:absolute;left:28px;top:28px;width:66px;height:140px;border-radius:28px;background:#090909;border:1px solid #303030;display:grid;place-items:center;padding:12px;z-index:3}
        .big-traffic .light{width:25px;height:25px}
        .road{position:absolute;left:50%;bottom:-150px;width:250px;height:520px;transform:translateX(-50%) perspective(480px) rotateX(62deg);background:#111;border-left:4px solid #f5f5f5;border-right:4px solid #f5f5f5}
        .road:after{content:"";position:absolute;left:50%;top:0;width:8px;height:100%;transform:translateX(-50%);background:repeating-linear-gradient(to bottom,var(--yellow) 0 34px,transparent 34px 66px)}
        .exam-card{background:linear-gradient(180deg,#101010,#070707);border:1px solid rgba(255,255,255,.10);border-radius:30px;padding:26px;box-shadow:inset 0 1px 0 rgba(255,255,255,.04)}
        .exam-head{display:flex;justify-content:space-between;align-items:center;margin-bottom:18px}.timer{color:var(--yellow);font-weight:950}
        .progress{height:10px;background:#1f1f1f;border-radius:999px;overflow:hidden;margin-bottom:20px}.progress span{display:block;width:68%;height:100%;background:var(--yellow)}
        .question{font-size:24px;line-height:1.35;font-weight:950;margin-bottom:16px;letter-spacing:-.4px}
        .answer{padding:16px;border-radius:16px;background:#151515;border:1px solid var(--line);color:#d4d4d8;margin-top:10px;font-weight:850;display:flex;justify-content:space-between}
        .answer.bad{border-color:rgba(239,68,68,.45);color:#fca5a5}
        .answer.wait{border-color:rgba(250,204,21,.45);color:#fde68a}
        .answer.good{background:rgba(34,197,94,.12);border-color:rgba(34,197,94,.45);color:#86efac}
        .explain{margin-top:16px;background:rgba(250,204,21,.09);border:1px solid rgba(250,204,21,.18);border-radius:20px;padding:16px;color:#e5e5e5;line-height:1.58;font-weight:750}
        .explain b{display:block;color:var(--yellow);margin-bottom:6px}
        .preview-stats{display:grid;grid-template-columns:repeat(3,1fr);gap:10px;margin-top:16px}
        .preview-stat{background:#151515;border:1px solid var(--line);border-radius:16px;padding:13px;color:#d4d4d8;font-weight:850;text-align:left}
        .preview-stat b{display:block;color:var(--yellow);font-size:22px;margin-bottom:3px}
        .section{max-width:1220px;margin:auto;padding:86px 22px}
        .title{display:flex;justify-content:space-between;align-items:end;gap:30px;margin-bottom:30px}
        .title h2{margin:0;font-size:48px;line-height:1.05;letter-spacing:-1.7px;max-width:680px}.title p{margin:0;color:var(--muted);font-size:18px;line-height:1.65;max-width:430px}
        .cards{display:grid;grid-template-columns:1.15fr .85fr;gap:18px}.stack{display:grid;gap:18px}
        .card{background:linear-gradient(180deg,rgba(255,255,255,.055),rgba(255,255,255,.025));border:1px solid rgba(255,255,255,.10);border-radius:32px;padding:30px;box-shadow:0 24px 80px rgba(0,0,0,.26);transition:.25s ease;backdrop-filter:blur(18px)}
        .card:hover{transform:translateY(-4px);border-color:rgba(250,204,21,.5);box-shadow:0 28px 90px rgba(250,204,21,.08)}
        .card.big{min-height:410px}.label{color:var(--yellow);font-weight:950;margin-bottom:14px}.card h3{font-size:34px;letter-spacing:-1px;margin:0 0 12px}.card p{margin:0;color:var(--muted);line-height:1.7;font-size:17px}
        .mini-list{display:grid;gap:10px;margin-top:24px}.mini-list div{padding:14px 15px;border-radius:16px;background:#191919;border:1px solid var(--line);font-weight:850;color:#e5e5e5}
        .flow{display:grid;grid-template-columns:repeat(3,1fr);gap:16px}.step{background:var(--card);border:1px solid var(--line);border-radius:28px;padding:24px;transition:.25s ease}.step:hover{transform:translateY(-4px);border-color:rgba(250,204,21,.45)}
        .num{width:44px;height:44px;border-radius:15px;display:grid;place-items:center;font-weight:950;margin-bottom:18px}.num.red{background:var(--red)}.num.yellow{background:var(--yellow);color:#111}.num.green{background:var(--green)}
        .step h3{margin:0 0 8px;font-size:22px}.step p{margin:0;color:var(--muted);line-height:1.55;font-weight:700}
        .cta{background:linear-gradient(135deg,#151515,#0b0b0b);border:1px solid var(--line);border-radius:38px;padding:46px;display:flex;align-items:center;justify-content:space-between;gap:30px;margin-bottom:78px}
        .cta h2{font-size:42px;margin:0 0 10px}.cta p{margin:0;color:var(--muted);font-size:18px;line-height:1.6}.cta a{background:var(--yellow);color:#111;padding:16px 24px;border-radius:18px;font-weight:950;white-space:nowrap}
        @media(max-width:950px){.links{display:none}h1{font-size:44px;letter-spacing:-1.4px}.exam,.cards,.flow,.preview-stats{grid-template-columns:1fr}.title,.cta{display:block}.title h2{font-size:36px}.cta a{display:inline-flex;margin-top:22px}.url{display:none}.screen{border-radius:28px}.searchbox b{font-size:16px}.center{padding-top:38px}}
    </style>
</head>
<body>

<section class="hero">
    <div class="road-line"></div>

    <div class="container">
        <nav class="nav">
            <a class="brand" href="/autoschool">
                <span class="traffic-logo"><span class="lights"><span class="light red"></span><span class="light yellow"></span><span class="light green"></span></span></span>
                <span>AutoSchool</span>
            </a>

            <div class="links">
                <a href="#platform">პლატფორმა</a>
                <a href="#flow">როგორ მუშაობს</a>
                <a href="/autoschool/exam">ტესტები</a>
            </div>

            <a class="navbtn" href="/autoschool/exam">დაწყება</a>
        </nav>

        <div class="center">
            <div class="badge">Premium Traffic Learning</div>

            <h1>შეცდომა გაჩერებს. ახსნა გასწავლის. <span>მწვანე გზა გამოცდისკენ.</span></h1>

            <p class="lead">
                პრემიუმ სასწავლო პლატფორმა მართვის მოწმობისთვის — ტესტები, სურათები,
                სწორი პასუხები და ადამიანური ახსნა ერთ სივრცეში.
            </p>

            <div class="searchbox">
                <span>⌕</span>
                <b>როგორ ჩავაბარო მართვის მოწმობის გამოცდა?</b>
            </div>

            <div class="chips">
                <a href="/autoschool/exam">ტესტის დაწყება</a>
                <a href="#platform">სასწავლო რეჟიმი</a>
                <a href="#platform">შეცდომების ახსნა</a>
                <a href="#flow">გამოცდის სიმულაცია</a>
            </div>

            <div class="actions">
                <a class="btn primary" href="/autoschool/exam">ტესტის დაწყება</a>
                <a class="btn secondary" href="#platform">პლატფორმის ნახვა</a>
            </div>

            <div class="screen">
                <div class="screen-top">
                    <div class="dots"><span class="dot"></span><span class="dot"></span><span class="dot"></span></div>
                    <div class="url">autoschool.ge / traffic-exam-mode</div>
                    <div class="pill">Live Preview</div>
                </div>

                <div class="exam">
                    <div class="visual">
                        <div class="big-traffic">
                            <span class="lights"><span class="light red"></span><span class="light yellow"></span><span class="light green"></span></span>
                        </div>
                        <div class="road"></div>
                    </div>

                    <div class="exam-card">
                        <div class="exam-head">
                            <span class="pill">ბილეთი #24</span>
                            <span class="timer">00:28</span>
                        </div>

                        <div class="progress"><span></span></div>

                        <div class="question">რომელი მიმართულებით არის ნებადართული მოძრაობა მოცემულ სიტუაციაში?</div>

                        <div class="answer bad">არასწორი პასუხი <span>წითელი</span></div>
                        <div class="answer wait">ახსნა და სწავლა <span>ყვითელი</span></div>
                        <div class="answer good">სწორი პასუხი <span>მწვანე</span></div>

                        <div class="explain">
                            <b>ადამიანური ახსნა</b>
                            სისტემა შეცდომას არ ტოვებს უბრალოდ წითლად — გიხსნის, რატომ შეცდი და როგორ უნდა იფიქრო შემდეგ კითხვაზე.
                        </div>

                        <div class="preview-stats">
                            <div class="preview-stat"><b>18</b>სწორი</div>
                            <div class="preview-stat"><b>2</b>შეცდომა</div>
                            <div class="preview-stat"><b>90%</b>მზად ხარ</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section" id="platform">
    <div class="title">
        <h2>შუქნიშნის ლოგიკა, პრემიუმ სასწავლო გამოცდილებაში.</h2>
        <p>სამი ფერი აქ მხოლოდ დეკორი არ არის — ეს არის სწავლის სისტემა: გაჩერდი, გაიგე, გააგრძელე.</p>
    </div>

    <div class="cards">
        <div class="card big">
            <div class="label">Traffic Learning</div>
            <h3>შეცდომა აღარ არის უბრალოდ არასწორი პასუხი.</h3>
            <p>მოსწავლე ხედავს სად შეცდა, იღებს ახსნას და იგივე ლოგიკით შემდეგ კითხვაზე უკეთ ფიქრობს.</p>

            <div class="mini-list">
                <div>🔴 არასწორი პასუხი — გაჩერდი</div>
                <div>🟡 ახსნა — ისწავლე წესი</div>
                <div>🟢 სწორი პასუხი — გააგრძელე</div>
            </div>
        </div>

        <div class="stack">
            <div class="card">
                <div class="label">PDF Import</div>
                <h3>კითხვები რეალური PDF-დან.</h3>
                <p>ticket_no, question, answers, correct_answer, explanation და image ინახება MySQL-ში.</p>
            </div>

            <div class="card">
                <div class="label">Exam Mode</div>
                <h3>საგამოცდო გამოცდილება.</h3>
                <p>შემდეგ ეტაპზე დაემატება დრო, შედეგები, შეცდომების ისტორია და კატეგორიები.</p>
            </div>
        </div>
    </div>
</section>

<section class="section" id="flow">
    <div class="title">
        <h2>სამი ფერი, ერთი მიზანი</h2>
        <p>მოსწავლემ სწრაფად გაიგოს სად არის, რას სწავლობს და როდის არის მზად.</p>
    </div>

    <div class="flow">
        <div class="step"><div class="num red">1</div><h3>შეცდომა</h3><p>სისტემა აჩვენებს არასწორ პასუხს მკაფიოდ.</p></div>
        <div class="step"><div class="num yellow">2</div><h3>ახსნა</h3><p>ყვითელი ეტაპი — წესის მარტივი განმარტება.</p></div>
        <div class="step"><div class="num green">3</div><h3>მზად ხარ</h3><p>მწვანე პასუხი — პროგრესი გამოცდისკენ.</p></div>
    </div>
</section>

<section class="section">
    <div class="cta">
        <div>
            <h2>გავხსნათ პირველი ტესტი</h2>
            <p>ახლა მთავარი იდეა უკვე შუქნიშნის ლოგიკაზე დგას. შემდეგში exam გვერდსაც ამავე სტილში გადავიყვანთ.</p>
        </div>
        <a href="/autoschool/exam">ტესტის გახსნა</a>
    </div>
</section>

</body>
</html>
