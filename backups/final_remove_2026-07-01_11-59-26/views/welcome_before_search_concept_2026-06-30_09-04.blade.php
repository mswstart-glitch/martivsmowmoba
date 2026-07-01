<!DOCTYPE html>
<html lang="ka">
<head>
    <meta charset="UTF-8">
    <title>AutoSchool — მართვის მოწმობის ტესტები</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
        *{box-sizing:border-box}
        body{margin:0;font-family:system-ui,-apple-system,BlinkMacSystemFont,"Segoe UI",sans-serif;background:#f3f5f9;color:#0f172a}
        a{text-decoration:none;color:inherit}
        .hero{background:#080d18;color:white;min-height:760px;position:relative;overflow:hidden}
        .hero:before{content:"";position:absolute;inset:-200px;background:radial-gradient(circle at 25% 10%,rgba(37,99,235,.55),transparent 28%),radial-gradient(circle at 88% 20%,rgba(14,165,233,.25),transparent 26%)}
        .container{max-width:1220px;margin:auto;padding:0 22px;position:relative;z-index:2}
        .nav{height:84px;display:flex;align-items:center;justify-content:space-between}
        .brand{display:flex;align-items:center;gap:12px;font-size:22px;font-weight:950}
        .mark{width:46px;height:46px;border-radius:16px;background:white;color:#0f172a;display:grid;place-items:center}
        .links{display:flex;gap:28px;color:#cbd5e1;font-weight:800}
        .navbtn{background:white;color:#0f172a;padding:13px 18px;border-radius:15px;font-weight:950}
        .hero-grid{display:grid;grid-template-columns:.92fr 1.08fr;gap:54px;align-items:center;padding:72px 0 92px}
        .badge{display:inline-flex;padding:10px 15px;border-radius:999px;background:rgba(255,255,255,.08);border:1px solid rgba(255,255,255,.14);color:#bfdbfe;font-weight:900;margin-bottom:22px}
        h1{font-size:74px;line-height:.95;letter-spacing:-3px;margin:0 0 24px}
        h1 span{color:#93c5fd}
        .lead{font-size:20px;line-height:1.75;color:#cbd5e1;margin:0 0 32px;max-width:650px}
        .actions{display:flex;gap:14px;flex-wrap:wrap}
        .btn{display:inline-flex;padding:16px 22px;border-radius:16px;font-weight:950}
        .primary{background:#2563eb;color:white;box-shadow:0 22px 55px rgba(37,99,235,.35)}
        .secondary{background:rgba(255,255,255,.08);border:1px solid rgba(255,255,255,.14);color:white}
        .preview{background:white;color:#0f172a;border-radius:34px;padding:18px;box-shadow:0 40px 120px rgba(0,0,0,.45)}
        .topbar{height:44px;background:#f8fafc;border-radius:20px;display:flex;align-items:center;justify-content:space-between;padding:0 14px;margin-bottom:16px}
        .dots{display:flex;gap:7px}.dot{width:10px;height:10px;border-radius:50%;background:#cbd5e1}
        .mode{font-size:13px;font-weight:950;color:#2563eb;background:#eff6ff;padding:7px 11px;border-radius:999px}
        .exam{display:grid;grid-template-columns:.85fr 1fr;gap:16px}
        .visual{height:310px;border-radius:24px;background:linear-gradient(180deg,#dbeafe,#f8fafc);position:relative;overflow:hidden;border:1px solid #e5e7eb}
        .road{position:absolute;left:50%;bottom:-130px;width:210px;height:420px;transform:translateX(-50%) perspective(420px) rotateX(60deg);background:#111827;border-left:4px solid white;border-right:4px solid white}
        .road:after{content:"";position:absolute;left:50%;top:0;width:7px;height:100%;transform:translateX(-50%);background:repeating-linear-gradient(to bottom,#facc15 0 34px,transparent 34px 64px)}
        .sign{position:absolute;right:28px;top:28px;width:64px;height:64px;border-radius:50%;border:8px solid #ef4444;background:white}
        .question{font-size:22px;line-height:1.35;font-weight:950;margin-bottom:14px}
        .answer{padding:14px 15px;border-radius:16px;background:#f1f5f9;border:1px solid #e2e8f0;margin-top:9px;font-weight:850}
        .answer.good{background:#dcfce7;border-color:#86efac;color:#166534}
        .coach{margin-top:14px;background:#0f172a;color:#dbeafe;border-radius:18px;padding:15px;line-height:1.55;font-weight:750}
        .stats{display:grid;grid-template-columns:repeat(3,1fr);gap:12px;margin-top:18px}
        .stat{background:#f8fafc;border:1px solid #e5e7eb;border-radius:18px;padding:14px;font-weight:900}
        .stat b{display:block;font-size:24px;color:#2563eb}

        .section{max-width:1220px;margin:auto;padding:74px 22px}
        .title{display:flex;justify-content:space-between;align-items:end;gap:26px;margin-bottom:28px}
        .title h2{font-size:46px;line-height:1.04;letter-spacing:-1.7px;margin:0;max-width:650px}
        .title p{font-size:18px;line-height:1.65;color:#64748b;margin:0;max-width:430px}
        .cards{display:grid;grid-template-columns:1.1fr .9fr;gap:18px}
        .card{background:white;border:1px solid #e7eaf0;border-radius:32px;padding:30px;box-shadow:0 20px 60px rgba(15,23,42,.06)}
        .card.dark{background:#0f172a;color:white;min-height:390px}
        .label{font-weight:950;color:#2563eb;margin-bottom:14px}
        .dark .label{color:#93c5fd}
        .card h3{font-size:34px;letter-spacing:-1px;margin:0 0 12px}
        .card p{font-size:17px;line-height:1.7;color:#64748b;margin:0}
        .dark p{color:#cbd5e1}
        .stack{display:grid;gap:18px}
        .mini-list{margin-top:24px;display:grid;gap:10px}
        .mini-list div{padding:14px 15px;border-radius:16px;background:rgba(255,255,255,.08);font-weight:850}
        .light-list div{background:#f1f5f9}
        .flow{display:grid;grid-template-columns:repeat(4,1fr);gap:16px}
        .step{background:white;border:1px solid #e7eaf0;border-radius:28px;padding:24px;box-shadow:0 20px 60px rgba(15,23,42,.05)}
        .num{width:42px;height:42px;border-radius:14px;background:#0f172a;color:white;display:grid;place-items:center;font-weight:950;margin-bottom:18px}
        .step h3{margin:0 0 8px;font-size:22px}
        .step p{margin:0;color:#64748b;line-height:1.55;font-weight:700}
        .cta{background:#0f172a;color:white;border-radius:36px;padding:46px;display:flex;align-items:center;justify-content:space-between;gap:30px;margin-bottom:72px}
        .cta h2{font-size:42px;margin:0 0 10px}
        .cta p{color:#cbd5e1;font-size:18px;line-height:1.6;margin:0}
        .cta a{background:white;color:#0f172a;padding:16px 22px;border-radius:16px;font-weight:950;white-space:nowrap}
        @media(max-width:950px){
            .links{display:none}.hero-grid,.exam,.cards{grid-template-columns:1fr}
            h1{font-size:44px}.flow,.stats{grid-template-columns:1fr}
            .title,.cta{display:block}.title h2{font-size:36px}.cta a{display:inline-flex;margin-top:22px}
        }
    </style>
</head>
<body>

<section class="hero">
    <div class="container">
        <nav class="nav">
            <a class="brand" href="/autoschool"><span class="mark">A</span><span>AutoSchool</span></a>
            <div class="links">
                <a href="#platform">პლატფორმა</a>
                <a href="#flow">როგორ მუშაობს</a>
                <a href="/autoschool/exam">ტესტები</a>
            </div>
            <a class="navbtn" href="/autoschool/exam">დაწყება</a>
        </nav>

        <div class="hero-grid">
            <div>
                <div class="badge">Premium Driving Exam Platform</div>
                <h1>მართვის მოწმობისთვის მზადება <span>ახალი ფორმით</span></h1>
                <p class="lead">
                    ტესტები, სურათები, სწორი პასუხები და ადამიანური ახსნა ერთ პლატფორმაში —
                    რომ მოსწავლემ არა დაიზეპიროს, არამედ რეალურად გაიგოს წესი.
                </p>
                <div class="actions">
                    <a class="btn primary" href="/autoschool/exam">ტესტის დაწყება</a>
                    <a class="btn secondary" href="#platform">პლატფორმის ნახვა</a>
                </div>
            </div>

            <div class="preview">
                <div class="topbar">
                    <div class="dots"><span class="dot"></span><span class="dot"></span><span class="dot"></span></div>
                    <span class="mode">Exam Preview</span>
                </div>

                <div class="exam">
                    <div class="visual"><div class="sign"></div><div class="road"></div></div>
                    <div>
                        <div class="question">რომელი მიმართულებით არის ნებადართული მოძრაობა მოცემულ სიტუაციაში?</div>
                        <div class="answer">მხოლოდ მარჯვნივ</div>
                        <div class="answer good">სწორია — პირდაპირ ან მარცხნივ</div>
                        <div class="answer">მხოლოდ უკან დაბრუნება</div>
                        <div class="coach">არასწორ პასუხზე სისტემა ხსნის მარტივად: რა წესი მოქმედებს და რატომ.</div>
                    </div>
                </div>

                <div class="stats">
                    <div class="stat"><b>5</b> კითხვა MySQL-ში</div>
                    <div class="stat"><b>PDF</b> იმპორტი</div>
                    <div class="stat"><b>AI</b> ახსნა</div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section" id="platform">
    <div class="title">
        <h2>არა უბრალოდ ტესტები — სრული სასწავლო გამოცდილება.</h2>
        <p>სუფთა Laravel არქიტექტურა, PDF-დან კითხვები, პასუხები, სურათები და შეცდომაზე მარტივი ახსნა.</p>
    </div>

    <div class="cards">
        <div class="card dark">
            <div class="label">Exam System</div>
            <h3>საგამოცდო რეჟიმი, პროგრესი და შედეგები.</h3>
            <p>მომხმარებელი ხედავს კითხვას, სურათს, პასუხებს და რეალურ გამოცდასთან მიახლოებულ გამოცდილებას.</p>
            <div class="mini-list">
                <div>✓ დროის კონტროლი</div>
                <div>✓ სწორი/არასწორი პასუხები</div>
                <div>✓ პროგრესის დათვლა</div>
            </div>
        </div>

        <div class="stack">
            <div class="card">
                <div class="label">PDF Import</div>
                <h3>კითხვები რეალური PDF-დან.</h3>
                <p>ticket_no, question, answers, correct_answer, explanation და image ინახება ბაზაში.</p>
            </div>
            <div class="card">
                <div class="label">Smart Explanation</div>
                <h3>შეცდომა ხდება სწავლა.</h3>
                <p>popup უხსნის წესს ადამიანურად, ზედმეტი რთული ტექსტის გარეშე.</p>
            </div>
        </div>
    </div>
</section>

<section class="section" id="flow">
    <div class="title">
        <h2>როგორ მუშაობს</h2>
        <p>მარტივი პროცესი მოსწავლისთვის და ძლიერი სისტემა ადმინისტრატორისთვის.</p>
    </div>

    <div class="flow">
        <div class="step"><div class="num">1</div><h3>აირჩიე რეჟიმი</h3><p>სასწავლო ან საგამოცდო.</p></div>
        <div class="step"><div class="num">2</div><h3>უპასუხე კითხვას</h3><p>სურათიანი კითხვა და პასუხები.</p></div>
        <div class="step"><div class="num">3</div><h3>მიიღე ახსნა</h3><p>შეცდომაზე მარტივი popup.</p></div>
        <div class="step"><div class="num">4</div><h3>ნახე პროგრესი</h3><p>შედეგები და შეცდომები.</p></div>
    </div>
</section>

<section class="section">
    <div class="cta">
        <div>
            <h2>გავხსნათ პირველი ტესტი</h2>
            <p>ახლა უკვე გვაქვს ბაზა და 5 კითხვა. შემდეგი ნაბიჯი იქნება exam page-ის პრემიუმ დიზაინი.</p>
        </div>
        <a href="/autoschool/exam">ტესტის გახსნა</a>
    </div>
</section>

</body>
</html>
