<!DOCTYPE html>
<html lang="ka">
<head>
    <meta charset="UTF-8">
    <title>AutoSchool — მართვის მოწმობის ტესტები</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
        *{box-sizing:border-box}
        body{margin:0;font-family:system-ui,-apple-system,BlinkMacSystemFont,"Segoe UI",sans-serif;background:#f5f7fb;color:#111827}
        a{text-decoration:none;color:inherit}
        .top{background:#07111f;color:white;position:relative;overflow:hidden}
        .top:before{content:"";position:absolute;inset:-120px;background:radial-gradient(circle at 15% 10%,rgba(59,130,246,.45),transparent 32%),radial-gradient(circle at 90% 20%,rgba(14,165,233,.28),transparent 30%)}
        .nav,.hero,.section{max-width:1200px;margin:auto;position:relative;z-index:2}
        .nav{padding:24px 18px;display:flex;align-items:center;justify-content:space-between}
        .brand{display:flex;align-items:center;gap:12px;font-weight:950;font-size:22px}
        .logo{width:44px;height:44px;border-radius:14px;background:linear-gradient(135deg,#38bdf8,#2563eb);display:grid;place-items:center;box-shadow:0 18px 50px rgba(37,99,235,.35)}
        .menu{display:flex;gap:24px;color:#cbd5e1;font-weight:800}
        .navbtn{padding:12px 18px;border-radius:14px;background:white;color:#0f172a;font-weight:950}
        .hero{padding:70px 18px 95px;display:grid;grid-template-columns:1.05fr .95fr;gap:42px;align-items:center}
        .badge{display:inline-flex;padding:10px 15px;border-radius:999px;background:rgba(255,255,255,.1);border:1px solid rgba(255,255,255,.14);color:#bae6fd;font-weight:900;margin-bottom:18px}
        h1{font-size:62px;line-height:1.02;letter-spacing:-2px;margin:0 0 22px}
        .lead{font-size:19px;line-height:1.75;color:#cbd5e1;margin:0 0 30px;max-width:650px}
        .actions{display:flex;gap:14px;flex-wrap:wrap}
        .btn{display:inline-flex;padding:16px 22px;border-radius:16px;font-weight:950}
        .primary{background:#2563eb;color:white;box-shadow:0 18px 45px rgba(37,99,235,.4)}
        .secondary{background:rgba(255,255,255,.09);border:1px solid rgba(255,255,255,.13);color:white}
        .dashboard{background:white;color:#0f172a;border-radius:32px;padding:24px;box-shadow:0 35px 90px rgba(0,0,0,.28)}
        .dash-top{display:flex;justify-content:space-between;align-items:center;margin-bottom:18px}
        .pill{padding:8px 12px;border-radius:999px;background:#eff6ff;color:#2563eb;font-weight:950;font-size:13px}
        .progress{height:10px;background:#e5e7eb;border-radius:20px;overflow:hidden;margin:14px 0 20px}
        .progress span{display:block;width:72%;height:100%;background:linear-gradient(90deg,#38bdf8,#2563eb)}
        .question{font-size:21px;font-weight:950;line-height:1.35;margin-bottom:14px}
        .answer{padding:14px 15px;border-radius:15px;background:#f1f5f9;border:1px solid #e2e8f0;margin-top:9px;font-weight:800}
        .answer.good{background:#dcfce7;border-color:#22c55e;color:#166534}
        .explain{margin-top:16px;padding:16px;border-radius:18px;background:#f8fafc;border:1px solid #e2e8f0;color:#475569;line-height:1.55;font-weight:700}
        .section{padding:70px 18px}
        .section-title{display:flex;justify-content:space-between;gap:20px;align-items:end;margin-bottom:26px}
        .section h2{font-size:42px;letter-spacing:-1.4px;margin:0;color:#0f172a}
        .section p{color:#64748b;font-size:17px;line-height:1.65;margin:0}
        .cards{display:grid;grid-template-columns:repeat(3,1fr);gap:18px}
        .card{background:white;border-radius:28px;padding:26px;box-shadow:0 18px 50px rgba(15,23,42,.07);border:1px solid #edf2f7}
        .icon{width:52px;height:52px;border-radius:18px;background:#eff6ff;color:#2563eb;display:grid;place-items:center;font-size:24px;margin-bottom:18px}
        .card h3{font-size:23px;margin:0 0 10px}
        .card p{font-size:16px}
        .modes{display:grid;grid-template-columns:1fr 1fr;gap:18px}
        .mode{background:#0f172a;color:white;border-radius:30px;padding:30px;position:relative;overflow:hidden}
        .mode.light{background:white;color:#0f172a;border:1px solid #edf2f7;box-shadow:0 18px 50px rgba(15,23,42,.07)}
        .mode h3{font-size:28px;margin:0 0 12px}
        .mode p{color:#94a3b8}
        .mode.light p{color:#64748b}
        .list{margin-top:22px;display:grid;gap:10px}
        .list div{padding:13px 14px;border-radius:15px;background:rgba(255,255,255,.08);font-weight:850}
        .mode.light .list div{background:#f1f5f9}
        .stats{display:grid;grid-template-columns:repeat(4,1fr);gap:16px}
        .stat{background:white;border-radius:24px;padding:24px;box-shadow:0 18px 50px rgba(15,23,42,.07);border:1px solid #edf2f7}
        .stat b{display:block;font-size:34px;color:#2563eb;margin-bottom:6px}
        .stat span{color:#64748b;font-weight:800}
        .cta{margin:40px 18px 70px;background:linear-gradient(135deg,#0f172a,#1e40af);border-radius:34px;padding:44px;color:white;text-align:center}
        .cta h2{font-size:42px;margin:0 0 12px}
        .cta p{color:#dbeafe;margin:0 auto 24px;max-width:720px}
        @media(max-width:900px){
            .hero,.modes{grid-template-columns:1fr}
            h1{font-size:40px}
            .cards,.stats{grid-template-columns:1fr}
            .menu{display:none}
            .section-title{display:block}
        }
    </style>
</head>
<body>

<div class="top">
    <nav class="nav">
        <a class="brand" href="/autoschool">
            <span class="logo">A</span>
            <span>AutoSchool</span>
        </a>
        <div class="menu">
            <a href="/autoschool">მთავარი</a>
            <a href="/autoschool/exam">ტესტები</a>
            <a href="#modes">რეჟიმები</a>
            <a href="#features">შესაძლებლობები</a>
        </div>
        <a class="navbtn" href="/autoschool/exam">დაწყება</a>
    </nav>

    <section class="hero">
        <div>
            <div class="badge">მართვის მოწმობის სასწავლო პლატფორმა</div>
            <h1>ტესტები, ახსნა და გამოცდისთვის მზადება ერთ სივრცეში</h1>
            <p class="lead">
                პროექტი აერთიანებს PDF-დან ამოღებულ კითხვებს, პასუხებს, სწორ პასუხს,
                სურათებს და ადამიანურ ახსნას — რომ მოსწავლემ უბრალოდ არ დაიზეპიროს, არამედ გაიგოს წესი.
            </p>
            <div class="actions">
                <a class="btn primary" href="/autoschool/exam">ტესტის დაწყება</a>
                <a class="btn secondary" href="#features">პლატფორმის ნახვა</a>
            </div>
        </div>

        <div class="dashboard">
            <div class="dash-top">
                <span class="pill">საგამოცდო რეჟიმი</span>
                <b>72%</b>
            </div>
            <div class="progress"><span></span></div>
            <div class="question">რომელი მიმართულებით არის ნებადართული მოძრაობა მოცემულ სიტუაციაში?</div>
            <div class="answer">მხოლოდ მარჯვნივ</div>
            <div class="answer good">სწორია — პირდაპირ ან მარცხნივ</div>
            <div class="answer">მხოლოდ უკან დაბრუნება</div>
            <div class="explain">
                შეცდომის შემთხვევაში სისტემა ხსნის მარტივი ენით: რა წესი მოქმედებს,
                რატომ არის პასუხი არასწორი და როგორ უნდა იფიქროს მოსწავლემ მსგავს სიტუაციაში.
            </div>
        </div>
    </section>
</div>

<section class="section" id="features">
    <div class="section-title">
        <div>
            <h2>პროექტის ძირითადი ბლოკები</h2>
            <p>ეს არ არის უბრალოდ quiz გვერდი — ეს არის სასწავლო სისტემა.</p>
        </div>
    </div>

    <div class="cards">
        <div class="card">
            <div class="icon">📄</div>
            <h3>PDF იმპორტი</h3>
            <p>კითხვები ამოდის PDF-დან: ბილეთის ნომერი, კითხვა, პასუხები, სწორი პასუხი, ახსნა და სურათი.</p>
        </div>
        <div class="card">
            <div class="icon">🧠</div>
            <h3>ადამიანური ახსნა</h3>
            <p>არასწორ პასუხზე popup ხსნის წესს მარტივად, ზედმეტი იურიდიული ტექსტის გარეშე.</p>
        </div>
        <div class="card">
            <div class="icon">🖼</div>
            <h3>სურათიანი კითხვები</h3>
            <p>სისტემა ინახავს და აჩვენებს იმ სურათებს, რომლებიც PDF-დან კითხვებთან ერთად ამოვიდა.</p>
        </div>
    </div>
</section>

<section class="section" id="modes">
    <div class="section-title">
        <div>
            <h2>სწავლის რეჟიმები</h2>
            <p>მომავალში მოსწავლეს ექნება როგორც სწავლა, ისე გამოცდის სიმულაცია.</p>
        </div>
    </div>

    <div class="modes">
        <div class="mode">
            <h3>სასწავლო რეჟიმი</h3>
            <p>მოსწავლე პასუხობს კითხვებს და მაშინვე იღებს ახსნას.</p>
            <div class="list">
                <div>არასწორ პასუხზე ახსნა</div>
                <div>სწორი პასუხის ჩვენება</div>
                <div>კატეგორიების მიხედვით სწავლა</div>
            </div>
        </div>

        <div class="mode light">
            <h3>საგამოცდო რეჟიმი</h3>
            <p>რეალურ გამოცდასთან მიახლოებული გამოცდილება დროით და შედეგით.</p>
            <div class="list">
                <div>დროის კონტროლი</div>
                <div>შედეგების დათვლა</div>
                <div>შეცდომების ისტორია</div>
            </div>
        </div>
    </div>
</section>

<section class="section">
    <div class="stats">
        <div class="stat"><b>10</b><span>კითხვა უკვე ამოღებულია</span></div>
        <div class="stat"><b>5</b><span>კითხვა MySQL-შია</span></div>
        <div class="stat"><b>PDF</b><span>წყაროდ გამოიყენება</span></div>
        <div class="stat"><b>Admin</b><span>შემდეგი ეტაპი</span></div>
    </div>
</section>

<div class="cta">
    <h2>დავიწყოთ ტესტირება</h2>
    <p>ახლა უკვე გვაქვს ბაზა, კითხვები და პირველი exam გვერდი. შემდეგი ნაბიჯია შიდა გვერდების პრემიუმ დიზაინი და admin panel.</p>
    <a class="btn primary" href="/autoschool/exam">ტესტის გახსნა</a>
</div>

</body>
</html>
