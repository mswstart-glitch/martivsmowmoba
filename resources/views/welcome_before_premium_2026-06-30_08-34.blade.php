<!DOCTYPE html>
<html lang="ka">
<head>
    <meta charset="UTF-8">
    <title>ავტოსკოლა — მართვის მოწმობის ტესტები</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
        body{margin:0;font-family:system-ui,-apple-system,BlinkMacSystemFont,"Segoe UI",sans-serif;background:#f4f7fb;color:#0f172a}
        .hero{min-height:100vh;background:radial-gradient(circle at top left,#2563eb 0,#111827 42%,#020617 100%);color:white;overflow:hidden}
        .nav{max-width:1180px;margin:auto;padding:24px 18px;display:flex;justify-content:space-between;align-items:center}
        .logo{font-weight:900;font-size:24px}
        .logo span{color:#60a5fa}
        .nav a{color:white;text-decoration:none;margin-left:20px;font-weight:700;opacity:.9}
        .wrap{max-width:1180px;margin:auto;padding:60px 18px 90px;display:grid;grid-template-columns:1.05fr .95fr;gap:42px;align-items:center}
        .badge{display:inline-flex;padding:10px 16px;border-radius:999px;background:rgba(255,255,255,.12);border:1px solid rgba(255,255,255,.18);font-weight:800;margin-bottom:18px}
        h1{font-size:58px;line-height:1.04;margin:0 0 20px;letter-spacing:-1.5px}
        p{font-size:19px;line-height:1.7;color:#dbeafe;margin:0 0 28px}
        .actions{display:flex;gap:14px;flex-wrap:wrap}
        .btn{display:inline-block;padding:15px 22px;border-radius:16px;text-decoration:none;font-weight:900}
        .primary{background:#3b82f6;color:white;box-shadow:0 18px 40px rgba(59,130,246,.35)}
        .secondary{background:rgba(255,255,255,.1);color:white;border:1px solid rgba(255,255,255,.22)}
        .panel{background:rgba(255,255,255,.1);border:1px solid rgba(255,255,255,.18);border-radius:32px;padding:24px;box-shadow:0 30px 90px rgba(0,0,0,.35);backdrop-filter:blur(18px)}
        .card{background:white;color:#0f172a;border-radius:24px;padding:22px;margin-bottom:14px}
        .ticket{font-size:14px;font-weight:900;color:#2563eb;margin-bottom:8px}
        .q{font-size:20px;font-weight:900;margin-bottom:14px}
        .answer{padding:13px 14px;border-radius:14px;background:#f1f5f9;margin-top:9px;font-weight:700}
        .answer.good{background:#dcfce7;color:#166534}
        .stats{display:grid;grid-template-columns:repeat(3,1fr);gap:14px;margin-top:34px}
        .stat{background:rgba(255,255,255,.1);border:1px solid rgba(255,255,255,.15);border-radius:20px;padding:18px}
        .stat b{font-size:26px;display:block}
        .section{max-width:1180px;margin:auto;padding:70px 18px}
        .grid{display:grid;grid-template-columns:repeat(3,1fr);gap:18px}
        .feature{background:white;border-radius:24px;padding:24px;box-shadow:0 18px 45px rgba(15,23,42,.07)}
        .feature h3{margin:0 0 10px;font-size:22px}
        .feature p{color:#64748b;font-size:16px;margin:0}
        @media(max-width:850px){
            .wrap{grid-template-columns:1fr;padding-top:35px}
            h1{font-size:38px}
            .grid,.stats{grid-template-columns:1fr}
            .nav a{display:none}
        }
    </style>
</head>
<body>

<div class="hero">
    <div class="nav">
        <div class="logo">Auto<span>School</span></div>
        <div>
            <a href="#">მთავარი</a>
            <a href="/autoschool/exam">ტესტი</a>
            <a href="#">კონტაქტი</a>
        </div>
    </div>

    <div class="wrap">
        <div>
            <div class="badge">მართვის მოწმობის მოსამზადებელი პლატფორმა</div>
            <h1>ისწავლე წესები მარტივად და მოემზადე გამოცდისთვის</h1>
            <p>
                თანამედროვე ავტოსკოლის პლატფორმა, სადაც მოსწავლე ტესტებს გაივლის,
                არასწორ პასუხზე მიიღებს ადამიანურ ახსნას და ეტაპობრივად მოემზადება გამოცდისთვის.
            </p>

            <div class="actions">
                <a class="btn primary" href="/autoschool/exam">ტესტის დაწყება</a>
                <a class="btn secondary" href="#features">როგორ მუშაობს</a>
            </div>

            <div class="stats">
                <div class="stat"><b>5</b> სატესტო კითხვა</div>
                <div class="stat"><b>PDF</b> ავტომატური იმპორტი</div>
                <div class="stat"><b>AI</b> მარტივი ახსნა</div>
            </div>
        </div>

        <div class="panel">
            <div class="card">
                <div class="ticket">ბილეთი #12</div>
                <div class="q">რომელი მიმართულებით არის ნებადართული მოძრაობა?</div>
                <div class="answer">მხოლოდ მარჯვნივ</div>
                <div class="answer good">სწორია — მარცხნივ ან პირდაპირ</div>
                <div class="answer">მხოლოდ უკან დაბრუნება</div>
            </div>
            <div style="color:#bfdbfe;font-weight:800;padding:8px 4px;">
                არასწორ პასუხზე სისტემა გიხსნის მიზეზს მარტივი ენით.
            </div>
        </div>
    </div>
</div>

<section class="section" id="features">
    <div class="grid">
        <div class="feature">
            <h3>საგამოცდო რეჟიმი</h3>
            <p>მოსწავლე პასუხობს კითხვებს და ხედავს სწორ/არასწორ პასუხებს.</p>
        </div>
        <div class="feature">
            <h3>ადამიანური ახსნა</h3>
            <p>შეცდომის შემთხვევაში popup უხსნის წესს მარტივად და გასაგებად.</p>
        </div>
        <div class="feature">
            <h3>ადმინ პანელი</h3>
            <p>შემდეგ ეტაპზე დაემატება კითხვების, პასუხების და კატეგორიების მართვა.</p>
        </div>
    </div>
</section>

</body>
</html>
