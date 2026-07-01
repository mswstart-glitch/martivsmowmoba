<!DOCTYPE html>
<html lang="ka">
<head>
    <meta charset="UTF-8">
    <title>AutoSchool — Night Drive</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
        *{box-sizing:border-box}
        :root{
            --bg:#070707;
            --card:#121212;
            --card2:#181818;
            --line:#2a2a2a;
            --yellow:#facc15;
            --yellow2:#eab308;
            --text:#ffffff;
            --muted:#a1a1aa;
            --green:#22c55e;
        }
        body{
            margin:0;
            font-family:system-ui,-apple-system,BlinkMacSystemFont,"Segoe UI",sans-serif;
            background:var(--bg);
            color:var(--text);
            overflow-x:hidden;
        }
        a{text-decoration:none;color:inherit}
        .hero{
            min-height:100vh;
            position:relative;
            overflow:hidden;
            background:
                radial-gradient(circle at 50% 0%,rgba(250,204,21,.13),transparent 34%),
                radial-gradient(circle at 10% 20%,rgba(255,255,255,.05),transparent 22%),
                linear-gradient(180deg,#090909 0%,#050505 100%);
        }
        .hero:before{
            content:"";
            position:absolute;
            inset:0;
            opacity:.16;
            background-image:
                linear-gradient(90deg,rgba(255,255,255,.06) 1px,transparent 1px),
                linear-gradient(rgba(255,255,255,.04) 1px,transparent 1px);
            background-size:70px 70px;
        }
        .road-line{
            position:absolute;
            left:50%;
            top:-180px;
            width:12px;
            height:140%;
            transform:translateX(-50%);
            background:repeating-linear-gradient(
                to bottom,
                rgba(250,204,21,.8) 0 70px,
                transparent 70px 130px
            );
            filter:drop-shadow(0 0 18px rgba(250,204,21,.45));
            opacity:.35;
            animation:drive 3.8s linear infinite;
        }
        @keyframes drive{
            from{background-position-y:0}
            to{background-position-y:130px}
        }
        .container{max-width:1220px;margin:auto;padding:0 22px;position:relative;z-index:3}
        .nav{
            height:86px;
            display:flex;
            align-items:center;
            justify-content:space-between;
        }
        .brand{display:flex;align-items:center;gap:12px;font-weight:950;font-size:22px}
        .mark{
            width:46px;height:46px;border-radius:16px;
            background:var(--yellow);
            color:#111;
            display:grid;
            place-items:center;
            box-shadow:0 20px 60px rgba(250,204,21,.22);
        }
        .links{display:flex;gap:28px;color:var(--muted);font-weight:800}
        .navbtn{
            background:var(--yellow);
            color:#111;
            padding:13px 18px;
            border-radius:16px;
            font-weight:950;
        }
        .center{
            padding:72px 0 56px;
            text-align:center;
        }
        .badge{
            display:inline-flex;
            padding:10px 15px;
            border-radius:999px;
            background:rgba(250,204,21,.1);
            border:1px solid rgba(250,204,21,.22);
            color:var(--yellow);
            font-weight:950;
            margin-bottom:22px;
        }
        h1{
            font-size:78px;
            line-height:.94;
            letter-spacing:-3.4px;
            margin:0 auto 24px;
            max-width:1000px;
        }
        h1 span{color:var(--yellow)}
        .lead{
            color:var(--muted);
            font-size:20px;
            line-height:1.75;
            max-width:760px;
            margin:0 auto 34px;
        }
        .actions{display:flex;justify-content:center;gap:14px;flex-wrap:wrap}
        .btn{
            display:inline-flex;
            padding:16px 24px;
            border-radius:18px;
            font-weight:950;
        }
        .primary{
            background:var(--yellow);
            color:#111;
            box-shadow:0 22px 60px rgba(250,204,21,.22);
        }
        .secondary{
            background:rgba(255,255,255,.06);
            border:1px solid rgba(255,255,255,.12);
            color:#fff;
        }
        .screen{
            margin:28px auto 0;
            max-width:1080px;
            background:rgba(18,18,18,.88);
            border:1px solid rgba(255,255,255,.12);
            border-radius:38px;
            padding:18px;
            box-shadow:0 45px 140px rgba(0,0,0,.58);
            backdrop-filter:blur(18px);
        }
        .screen-top{
            height:46px;
            border-radius:24px;
            background:#0b0b0b;
            border:1px solid var(--line);
            display:flex;
            align-items:center;
            justify-content:space-between;
            padding:0 15px;
            margin-bottom:18px;
        }
        .dots{display:flex;gap:8px}
        .dot{width:10px;height:10px;border-radius:50%;background:#3f3f46}
        .url{color:#71717a;font-weight:850;font-size:13px}
        .exam{
            display:grid;
            grid-template-columns:.82fr 1.18fr;
            gap:18px;
        }
        .visual{
            min-height:360px;
            border-radius:28px;
            background:
                radial-gradient(circle at 50% 15%,rgba(250,204,21,.15),transparent 30%),
                linear-gradient(180deg,#191919,#0d0d0d);
            border:1px solid var(--line);
            position:relative;
            overflow:hidden;
        }
        .road{
            position:absolute;
            left:50%;
            bottom:-150px;
            width:250px;
            height:520px;
            transform:translateX(-50%) perspective(480px) rotateX(62deg);
            background:#111;
            border-left:4px solid #f5f5f5;
            border-right:4px solid #f5f5f5;
        }
        .road:after{
            content:"";
            position:absolute;
            left:50%;top:0;
            width:8px;height:100%;
            transform:translateX(-50%);
            background:repeating-linear-gradient(to bottom,var(--yellow) 0 34px,transparent 34px 66px);
        }
        .sign{
            position:absolute;
            right:32px;
            top:32px;
            width:70px;
            height:70px;
            border-radius:50%;
            background:#fff;
            border:9px solid #ef4444;
            box-shadow:0 20px 45px rgba(0,0,0,.3);
        }
        .exam-card{
            background:#0b0b0b;
            border:1px solid var(--line);
            border-radius:28px;
            padding:24px;
        }
        .exam-head{
            display:flex;
            justify-content:space-between;
            align-items:center;
            margin-bottom:18px;
        }
        .pill{
            background:rgba(250,204,21,.1);
            color:var(--yellow);
            border:1px solid rgba(250,204,21,.22);
            padding:9px 13px;
            border-radius:999px;
            font-size:13px;
            font-weight:950;
        }
        .timer{color:var(--yellow);font-weight:950}
        .progress{
            height:10px;
            background:#1f1f1f;
            border-radius:999px;
            overflow:hidden;
            margin-bottom:20px;
        }
        .progress span{display:block;width:68%;height:100%;background:var(--yellow)}
        .question{
            font-size:24px;
            line-height:1.35;
            font-weight:950;
            margin-bottom:16px;
            letter-spacing:-.4px;
        }
        .answer{
            padding:15px;
            border-radius:16px;
            background:#151515;
            border:1px solid var(--line);
            color:#d4d4d8;
            margin-top:10px;
            font-weight:850;
            display:flex;
            justify-content:space-between;
        }
        .answer.good{
            background:rgba(34,197,94,.12);
            border-color:rgba(34,197,94,.45);
            color:#86efac;
        }
        .explain{
            margin-top:16px;
            background:rgba(250,204,21,.09);
            border:1px solid rgba(250,204,21,.18);
            border-radius:20px;
            padding:16px;
            color:#e5e5e5;
            line-height:1.58;
            font-weight:750;
        }
        .explain b{display:block;color:var(--yellow);margin-bottom:6px}
        .section{max-width:1220px;margin:auto;padding:86px 22px}
        .title{
            display:flex;
            justify-content:space-between;
            align-items:end;
            gap:30px;
            margin-bottom:30px;
        }
        .title h2{
            margin:0;
            font-size:48px;
            line-height:1.05;
            letter-spacing:-1.7px;
            max-width:680px;
        }
        .title p{
            margin:0;
            color:var(--muted);
            font-size:18px;
            line-height:1.65;
            max-width:430px;
        }
        .cards{
            display:grid;
            grid-template-columns:1.15fr .85fr;
            gap:18px;
        }
        .card{
            background:var(--card);
            border:1px solid var(--line);
            border-radius:32px;
            padding:30px;
            box-shadow:0 24px 80px rgba(0,0,0,.22);
        }
        .card.big{min-height:410px}
        .label{color:var(--yellow);font-weight:950;margin-bottom:14px}
        .card h3{font-size:34px;letter-spacing:-1px;margin:0 0 12px}
        .card p{margin:0;color:var(--muted);line-height:1.7;font-size:17px}
        .stack{display:grid;gap:18px}
        .mini-list{display:grid;gap:10px;margin-top:24px}
        .mini-list div{
            padding:14px 15px;
            border-radius:16px;
            background:#191919;
            border:1px solid var(--line);
            font-weight:850;
            color:#e5e5e5;
        }
        .flow{
            display:grid;
            grid-template-columns:repeat(4,1fr);
            gap:16px;
        }
        .step{
            background:var(--card);
            border:1px solid var(--line);
            border-radius:28px;
            padding:24px;
        }
        .num{
            width:44px;height:44px;border-radius:15px;
            background:var(--yellow);
            color:#111;
            display:grid;
            place-items:center;
            font-weight:950;
            margin-bottom:18px;
        }
        .step h3{margin:0 0 8px;font-size:22px}
        .step p{margin:0;color:var(--muted);line-height:1.55;font-weight:700}
        .cta{
            background:linear-gradient(135deg,#151515,#0b0b0b);
            border:1px solid var(--line);
            border-radius:38px;
            padding:46px;
            display:flex;
            align-items:center;
            justify-content:space-between;
            gap:30px;
            margin-bottom:78px;
        }
        .cta h2{font-size:42px;margin:0 0 10px}
        .cta p{margin:0;color:var(--muted);font-size:18px;line-height:1.6}
        .cta a{
            background:var(--yellow);
            color:#111;
            padding:16px 24px;
            border-radius:18px;
            font-weight:950;
            white-space:nowrap;
        }
        @media(max-width:950px){
            .links{display:none}
            h1{font-size:44px;letter-spacing:-1.4px}
            .exam,.cards,.flow{grid-template-columns:1fr}
            .title,.cta{display:block}
            .title h2{font-size:36px}
            .cta a{display:inline-flex;margin-top:22px}
            .url{display:none}
            .screen{border-radius:28px}
        }
    </style>
</head>
<body>

<section class="hero">
    <div class="road-line"></div>

    <div class="container">
        <nav class="nav">
            <a class="brand" href="/autoschool">
                <span class="mark">A</span>
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
            <div class="badge">Night Drive Premium Platform</div>

            <h1>მართვის მოწმობისთვის მზადება <span>ღამის გზის სტილში</span></h1>

            <p class="lead">
                შავი პრემიუმ დიზაინი, ყვითელი საგზაო აქცენტები, ტესტები, სურათები და ადამიანური ახსნა —
                ავტოსკოლის პლატფორმა, რომელიც განსხვავდება ჩვეულებრივი საიტებისგან.
            </p>

            <div class="actions">
                <a class="btn primary" href="/autoschool/exam">ტესტის დაწყება</a>
                <a class="btn secondary" href="#platform">პლატფორმის ნახვა</a>
            </div>

            <div class="screen">
                <div class="screen-top">
                    <div class="dots">
                        <span class="dot"></span><span class="dot"></span><span class="dot"></span>
                    </div>
                    <div class="url">autoschool.ge / exam-mode</div>
                    <div class="pill">Live Preview</div>
                </div>

                <div class="exam">
                    <div class="visual">
                        <div class="sign"></div>
                        <div class="road"></div>
                    </div>

                    <div class="exam-card">
                        <div class="exam-head">
                            <span class="pill">ბილეთი #24</span>
                            <span class="timer">00:28</span>
                        </div>

                        <div class="progress"><span></span></div>

                        <div class="question">
                            რომელი მიმართულებით არის ნებადართული მოძრაობა მოცემულ სიტუაციაში?
                        </div>

                        <div class="answer">მხოლოდ მარჯვნივ <span>→</span></div>
                        <div class="answer good">პირდაპირ ან მარცხნივ <span>✓</span></div>
                        <div class="answer">მხოლოდ უკან დაბრუნება <span>×</span></div>

                        <div class="explain">
                            <b>ადამიანური ახსნა</b>
                            არასწორ პასუხზე სისტემა ხსნის წესს მარტივი ენით — რატომ არის პასუხი არასწორი და რა უნდა დაიმახსოვრო.
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section" id="platform">
    <div class="title">
        <h2>პლატფორმა, რომელიც არ ჰგავს ჩვეულებრივ ავტოსკოლის საიტს.</h2>
        <p>სისტემა ეწყობა სუფთა Laravel არქიტექტურით: კითხვები, პასუხები, სურათები, ახსნა და შემდეგ admin panel.</p>
    </div>

    <div class="cards">
        <div class="card big">
            <div class="label">Exam Mode</div>
            <h3>საგამოცდო გამოცდილება ერთ ეკრანზე.</h3>
            <p>კითხვა, სურათი, პასუხები, დრო, პროგრესი და შედეგი — ყველაფერი ისე, რომ მოსწავლემ გამოცდის გარემო იგრძნოს.</p>

            <div class="mini-list">
                <div>✓ სწორი/არასწორი პასუხის დაფიქსირება</div>
                <div>✓ შეცდომაზე ახსნა popup-ით</div>
                <div>✓ მომავალში შედეგების ისტორია</div>
            </div>
        </div>

        <div class="stack">
            <div class="card">
                <div class="label">PDF Import</div>
                <h3>კითხვები რეალური PDF-დან.</h3>
                <p>ticket_no, question, answers, correct_answer, explanation და image ინახება MySQL-ში.</p>
            </div>

            <div class="card">
                <div class="label">Learning Mode</div>
                <h3>შეცდომა ხდება სწავლა.</h3>
                <p>სისტემა მოსწავლეს უხსნის პასუხს მარტივად, არა რთული მუხლებით.</p>
            </div>
        </div>
    </div>
</section>

<section class="section" id="flow">
    <div class="title">
        <h2>როგორ მუშაობს</h2>
        <p>მარტივი გზა მოსწავლისთვის — ძლიერი სისტემა ადმინისტრატორისთვის.</p>
    </div>

    <div class="flow">
        <div class="step"><div class="num">1</div><h3>აირჩიე რეჟიმი</h3><p>სასწავლო ან საგამოცდო რეჟიმი.</p></div>
        <div class="step"><div class="num">2</div><h3>უპასუხე კითხვებს</h3><p>სურათიანი კითხვები და პასუხები.</p></div>
        <div class="step"><div class="num">3</div><h3>მიიღე ახსნა</h3><p>არასწორზე მარტივი popup ახსნა.</p></div>
        <div class="step"><div class="num">4</div><h3>ნახე პროგრესი</h3><p>შედეგები და შეცდომების ისტორია.</p></div>
    </div>
</section>

<section class="section">
    <div class="cta">
        <div>
            <h2>გავხსნათ პირველი ტესტი</h2>
            <p>ახლა უკვე გვაქვს 5 კითხვა MySQL-ში. შემდეგი ნაბიჯი იქნება exam page-ის ამავე სტილში გადაკეთება.</p>
        </div>
        <a href="/autoschool/exam">ტესტის გახსნა</a>
    </div>
</section>

</body>
</html>
