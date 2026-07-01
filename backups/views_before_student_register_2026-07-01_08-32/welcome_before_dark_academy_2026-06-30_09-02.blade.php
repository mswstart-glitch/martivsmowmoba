<!DOCTYPE html>
<html lang="ka">
<head>
    <meta charset="UTF-8">
    <title>AutoSchool — მართვის მოწმობის პლატფორმა</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
        *{box-sizing:border-box}
        :root{
            --bg:#f6f7fb;
            --text:#0b1020;
            --muted:#667085;
            --line:#e6e8ef;
            --blue:#2563eb;
            --dark:#0d1324;
            --soft:#ffffff;
            --green:#16a34a;
            --red:#ef4444;
        }
        body{
            margin:0;
            font-family:system-ui,-apple-system,BlinkMacSystemFont,"Segoe UI",sans-serif;
            background:var(--bg);
            color:var(--text);
        }
        a{text-decoration:none;color:inherit}
        .container{max-width:1220px;margin:auto;padding:0 22px}
        .nav{
            height:82px;
            display:flex;
            align-items:center;
            justify-content:space-between;
        }
        .brand{display:flex;align-items:center;gap:12px;font-weight:950;font-size:22px}
        .mark{
            width:44px;height:44px;border-radius:14px;
            background:#0b1020;color:white;display:grid;place-items:center;
            box-shadow:0 16px 35px rgba(11,16,32,.18);
        }
        .links{display:flex;gap:28px;color:#667085;font-weight:800;font-size:15px}
        .nav-cta{
            background:#0b1020;color:white;padding:13px 18px;
            border-radius:14px;font-weight:900;
        }

        .hero{
            padding:64px 0 42px;
            display:grid;
            grid-template-columns:.92fr 1.08fr;
            gap:54px;
            align-items:center;
        }
        .badge{
            display:inline-flex;
            padding:10px 15px;
            border-radius:999px;
            background:white;
            border:1px solid var(--line);
            color:#2563eb;
            font-weight:900;
            margin-bottom:22px;
            box-shadow:0 14px 35px rgba(15,23,42,.04);
        }
        h1{
            margin:0 0 22px;
            font-size:72px;
            line-height:.96;
            letter-spacing:-3.2px;
        }
        .lead{
            margin:0 0 34px;
            color:var(--muted);
            font-size:20px;
            line-height:1.72;
            max-width:620px;
        }
        .actions{display:flex;gap:14px;flex-wrap:wrap}
        .btn{
            display:inline-flex;align-items:center;justify-content:center;
            padding:16px 22px;border-radius:16px;font-weight:950;
        }
        .btn-main{background:var(--blue);color:white;box-shadow:0 18px 42px rgba(37,99,235,.24)}
        .btn-soft{background:white;border:1px solid var(--line);color:#111827}

        .browser{
            background:white;
            border:1px solid var(--line);
            border-radius:30px;
            box-shadow:0 34px 90px rgba(15,23,42,.12);
            overflow:hidden;
        }
        .browser-top{
            height:56px;
            border-bottom:1px solid var(--line);
            display:flex;
            align-items:center;
            justify-content:space-between;
            padding:0 18px;
            background:#fbfcff;
        }
        .dots{display:flex;gap:7px}
        .dot{width:11px;height:11px;border-radius:50%;background:#d0d5dd}
        .url{
            width:52%;
            height:30px;
            background:#f2f4f7;
            border-radius:999px;
            color:#98a2b3;
            font-size:13px;
            display:flex;
            align-items:center;
            justify-content:center;
            font-weight:800;
        }
        .exam-ui{padding:24px;background:#fff}
        .exam-head{
            display:flex;
            justify-content:space-between;
            align-items:center;
            margin-bottom:18px;
        }
        .pill{
            background:#eff6ff;color:#2563eb;
            border-radius:999px;
            padding:9px 13px;
            font-weight:950;
            font-size:13px;
        }
        .timer{font-weight:950;color:#f97316}
        .progress{
            height:10px;background:#eef2f7;border-radius:999px;overflow:hidden;margin-bottom:22px;
        }
        .progress span{display:block;width:68%;height:100%;background:linear-gradient(90deg,#2563eb,#38bdf8)}
        .question-card{
            display:grid;
            grid-template-columns:.78fr 1fr;
            gap:20px;
            align-items:start;
        }
        .road-img{
            height:250px;
            border-radius:22px;
            background:
                radial-gradient(circle at 50% 25%,rgba(37,99,235,.18),transparent 32%),
                linear-gradient(180deg,#eef6ff,#dfeafa);
            position:relative;
            overflow:hidden;
            border:1px solid #e6e8ef;
        }
        .road{
            position:absolute;
            left:50%;
            bottom:-110px;
            width:180px;
            height:340px;
            transform:translateX(-50%) perspective(380px) rotateX(58deg);
            background:#1f2937;
            border-left:4px solid white;
            border-right:4px solid white;
        }
        .road:after{
            content:"";
            position:absolute;
            left:50%;top:0;
            width:7px;height:100%;
            transform:translateX(-50%);
            background:repeating-linear-gradient(to bottom,#facc15 0 28px,transparent 28px 55px);
        }
        .sign{
            position:absolute;
            right:28px;
            top:32px;
            width:62px;
            height:62px;
            border-radius:50%;
            border:8px solid #ef4444;
            background:white;
        }
        .q-title{
            font-size:24px;
            line-height:1.35;
            font-weight:950;
            margin:0 0 15px;
            letter-spacing:-.4px;
        }
        .answers{display:grid;gap:10px}
        .answer{
            padding:14px 15px;
            border-radius:16px;
            border:1px solid #e6e8ef;
            background:#f8fafc;
            font-weight:850;
            display:flex;
            justify-content:space-between;
            gap:10px;
        }
        .answer.good{
            background:#ecfdf3;
            border-color:#86efac;
            color:#166534;
        }
        .explain{
            margin-top:14px;
            padding:16px;
            border-radius:18px;
            background:#0d1324;
            color:#dbeafe;
            line-height:1.58;
            font-weight:750;
        }
        .explain b{display:block;color:white;margin-bottom:5px}

        .strip{
            padding:34px 0 26px;
            display:grid;
            grid-template-columns:repeat(4,1fr);
            gap:14px;
        }
        .stat{
            background:white;
            border:1px solid var(--line);
            border-radius:24px;
            padding:22px;
            box-shadow:0 18px 50px rgba(15,23,42,.05);
        }
        .stat b{display:block;font-size:34px;letter-spacing:-1px;margin-bottom:4px}
        .stat span{color:var(--muted);font-weight:850}

        .section{padding:72px 0}
        .section-title{
            display:flex;
            align-items:end;
            justify-content:space-between;
            gap:30px;
            margin-bottom:24px;
        }
        .section-title h2{
            margin:0;
            font-size:48px;
            line-height:1.04;
            letter-spacing:-1.8px;
            max-width:660px;
        }
        .section-title p{
            margin:0;
            color:var(--muted);
            font-size:18px;
            line-height:1.65;
            max-width:420px;
        }
        .cards{
            display:grid;
            grid-template-columns:1.05fr .95fr;
            gap:18px;
        }
        .big-card,.small-card{
            background:white;
            border:1px solid var(--line);
            border-radius:32px;
            padding:30px;
            box-shadow:0 22px 70px rgba(15,23,42,.06);
        }
        .big-card.dark{
            background:#0d1324;
            color:white;
            min-height:420px;
            position:relative;
            overflow:hidden;
        }
        .big-card.dark:after{
            content:"";
            position:absolute;
            width:360px;height:360px;border-radius:50%;
            background:rgba(37,99,235,.22);
            right:-120px;bottom:-130px;
            filter:blur(10px);
        }
        .card-label{
            color:#2563eb;
            font-weight:950;
            margin-bottom:14px;
        }
        .dark .card-label{color:#93c5fd}
        .big-card h3,.small-card h3{
            margin:0 0 12px;
            font-size:34px;
            letter-spacing:-1px;
        }
        .big-card p,.small-card p{
            margin:0;
            color:#667085;
            line-height:1.7;
            font-size:17px;
        }
        .dark p{color:#cbd5e1}
        .mini-window{
            margin-top:28px;
            background:rgba(255,255,255,.08);
            border:1px solid rgba(255,255,255,.12);
            border-radius:24px;
            padding:18px;
            position:relative;
            z-index:2;
        }
        .mini-row{
            display:flex;
            justify-content:space-between;
            padding:13px 0;
            border-bottom:1px solid rgba(255,255,255,.09);
            font-weight:850;
            color:#e5e7eb;
        }
        .mini-row:last-child{border-bottom:0}
        .side-stack{display:grid;gap:18px}
        .small-card{min-height:201px}
        .small-card.blue{background:#eff6ff}
        .small-card.green{background:#ecfdf3}
        .timeline{
            display:grid;
            grid-template-columns:repeat(4,1fr);
            gap:16px;
            margin-top:22px;
        }
        .step{
            background:white;
            border:1px solid var(--line);
            border-radius:26px;
            padding:24px;
        }
        .num{
            width:42px;height:42px;border-radius:14px;
            background:#0d1324;color:white;
            display:grid;place-items:center;
            font-weight:950;
            margin-bottom:18px;
        }
        .step h3{margin:0 0 8px;font-size:22px}
        .step p{margin:0;color:var(--muted);line-height:1.55;font-weight:700}
        .cta{
            margin:18px 0 70px;
            background:#0d1324;
            color:white;
            border-radius:36px;
            padding:46px;
            display:flex;
            justify-content:space-between;
            align-items:center;
            gap:28px;
            overflow:hidden;
            position:relative;
        }
        .cta:after{
            content:"";
            position:absolute;
            width:380px;height:380px;border-radius:50%;
            background:rgba(37,99,235,.3);
            right:-120px;top:-160px;
        }
        .cta h2{margin:0 0 10px;font-size:42px;letter-spacing:-1px}
        .cta p{margin:0;color:#cbd5e1;font-size:18px;line-height:1.6;max-width:680px}
        .cta .btn{position:relative;z-index:2;background:white;color:#0d1324}

        @media(max-width:950px){
            .links{display:none}
            .hero{grid-template-columns:1fr;padding-top:34px}
            h1{font-size:44px;letter-spacing:-1.4px}
            .question-card,.cards{grid-template-columns:1fr}
            .strip,.timeline{grid-template-columns:1fr}
            .section-title,.cta{display:block}
            .section-title h2{font-size:36px}
            .cta .btn{margin-top:22px}
            .url{display:none}
        }
    </style>
</head>
<body>

<header class="container">
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

        <a class="nav-cta" href="/autoschool/exam">დაწყება</a>
    </nav>
</header>

<main class="container">
    <section class="hero">
        <div>
            <div class="badge">ახალი თაობის ავტოსკოლის პლატფორმა</div>
            <h1>მართვის მოწმობის გამოცდისთვის მზადება — ჭკვიანად.</h1>
            <p class="lead">
                მოსწავლე გადის ტესტს, ხედავს ვიზუალურ კითხვებს, არასწორ პასუხზე იღებს მარტივ ახსნას
                და რეალურად სწავლობს წესს — არა უბრალოდ ზეპირად.
            </p>
            <div class="actions">
                <a class="btn btn-main" href="/autoschool/exam">ტესტის დაწყება</a>
                <a class="btn btn-soft" href="#platform">პლატფორმის ნახვა</a>
            </div>
        </div>

        <div class="browser">
            <div class="browser-top">
                <div class="dots"><span class="dot"></span><span class="dot"></span><span class="dot"></span></div>
                <div class="url">autoschool.ge/exam</div>
                <div class="pill">Exam</div>
            </div>

            <div class="exam-ui">
                <div class="exam-head">
                    <span class="pill">ბილეთი #24</span>
                    <span class="timer">00:28</span>
                </div>
                <div class="progress"><span></span></div>

                <div class="question-card">
                    <div class="road-img">
                        <div class="sign"></div>
                        <div class="road"></div>
                    </div>

                    <div>
                        <h2 class="q-title">რომელი მიმართულებით არის ნებადართული მოძრაობა მოცემულ სიტუაციაში?</h2>
                        <div class="answers">
                            <div class="answer">მხოლოდ მარჯვნივ <span>→</span></div>
                            <div class="answer good">პირდაპირ ან მარცხნივ <span>✓</span></div>
                            <div class="answer">მხოლოდ უკან დაბრუნება <span>×</span></div>
                        </div>
                    </div>
                </div>

                <div class="explain">
                    <b>მარტივი ახსნა</b>
                    არასწორ პასუხზე სისტემა გიხსნის ადამიანურად: რა წესი მოქმედებს და რატომ უნდა აირჩიო სწორი პასუხი.
                </div>
            </div>
        </div>
    </section>

    <section class="strip">
        <div class="stat"><b>PDF</b><span>კითხვების წყარო</span></div>
        <div class="stat"><b>10</b><span>ამოღებული კითხვა</span></div>
        <div class="stat"><b>5</b><span>MySQL-ში ჩასმული</span></div>
        <div class="stat"><b>AI</b><span>ადამიანური ახსნა</span></div>
    </section>

    <section class="section" id="platform">
        <div class="section-title">
            <h2>პლატფორმა, რომელიც გამოცდისთვის ამზადებს და არა უბრალოდ კითხვებს აჩვენებს.</h2>
            <p>სისტემა აწყობილია Laravel/MySQL-ზე სუფთა არქიტექტურით, რათა მომავალში დაემატოს admin panel, კატეგორიები და სრული PDF იმპორტი.</p>
        </div>

        <div class="cards">
            <div class="big-card dark">
                <div class="card-label">საგამოცდო გამოცდილება</div>
                <h3>ტესტი, დრო, პროგრესი და შედეგი ერთ ეკრანზე.</h3>
                <p>მომხმარებელი ხედავს კითხვას, პასუხებს, სურათს და რეალურ გამოცდასთან მიახლოებულ პროცესს.</p>

                <div class="mini-window">
                    <div class="mini-row"><span>სწორი პასუხები</span><b>18</b></div>
                    <div class="mini-row"><span>შეცდომები</span><b>2</b></div>
                    <div class="mini-row"><span>პროგრესი</span><b>90%</b></div>
                </div>
            </div>

            <div class="side-stack">
                <div class="small-card blue">
                    <div class="card-label">PDF Import</div>
                    <h3>კითხვები მოდის რეალური PDF ფაილიდან.</h3>
                    <p>ინახება ბილეთის ნომერი, კითხვა, პასუხები, სწორი პასუხი, ახსნა და სურათი.</p>
                </div>

                <div class="small-card green">
                    <div class="card-label">Explanation Popup</div>
                    <h3>შეცდომა ხდება სასწავლო მომენტი.</h3>
                    <p>არასწორ პასუხზე მოსწავლე იღებს მარტივ ახსნას რთული მუხლების გარეშე.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="section" id="flow">
        <div class="section-title">
            <h2>როგორ იმუშავებს სისტემა</h2>
            <p>მარტივი პროცესი მოსწავლისთვის, ძლიერი მართვა ადმინისტრატორისთვის.</p>
        </div>

        <div class="timeline">
            <div class="step">
                <div class="num">1</div>
                <h3>აირჩიე რეჟიმი</h3>
                <p>სწავლა ან საგამოცდო ტესტირება.</p>
            </div>
            <div class="step">
                <div class="num">2</div>
                <h3>უპასუხე კითხვებს</h3>
                <p>სურათიანი კითხვები და პასუხები ერთ card-ში.</p>
            </div>
            <div class="step">
                <div class="num">3</div>
                <h3>მიიღე ახსნა</h3>
                <p>არასწორზე popup გიხსნის მიზეზს ადამიანურად.</p>
            </div>
            <div class="step">
                <div class="num">4</div>
                <h3>ნახე პროგრესი</h3>
                <p>შედეგები, შეცდომები და მომზადების დონე.</p>
            </div>
        </div>
    </section>

    <section class="cta">
        <div>
            <h2>დავიწყოთ პირველი ტესტით</h2>
            <p>ახლა უკვე გვაქვს 5 კითხვა MySQL-ში. შემდეგი ეტაპია exam page-ის პრემიუმ დიზაინი და admin panel.</p>
        </div>
        <a class="btn" href="/autoschool/exam">ტესტის გახსნა</a>
    </section>
</main>

</body>
</html>
