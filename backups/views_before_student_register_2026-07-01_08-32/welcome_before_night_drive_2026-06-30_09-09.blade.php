<!DOCTYPE html>
<html lang="ka">
<head>
    <meta charset="UTF-8">
    <title>AutoSchool — მართვის მოწმობის პლატფორმა</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
        *{box-sizing:border-box}
        body{margin:0;font-family:system-ui,-apple-system,BlinkMacSystemFont,"Segoe UI",sans-serif;background:#f4f7fb;color:#0f172a}
        a{text-decoration:none;color:inherit}
        .wrap{max-width:1240px;margin:auto;padding:22px}
        .hero{min-height:760px;border-radius:42px;background:#fff;border:1px solid #e5e7eb;box-shadow:0 35px 100px rgba(15,23,42,.10);overflow:hidden}
        .browser-top{height:64px;background:#f8fafc;border-bottom:1px solid #e5e7eb;display:flex;align-items:center;gap:14px;padding:0 22px}
        .dots{display:flex;gap:8px}
        .dot{width:12px;height:12px;border-radius:50%;background:#cbd5e1}
        .url{height:34px;flex:1;background:white;border:1px solid #e5e7eb;border-radius:999px;color:#94a3b8;display:flex;align-items:center;padding:0 18px;font-size:14px;font-weight:800}
        .navbtn{background:#0f172a;color:white;padding:10px 16px;border-radius:14px;font-weight:900}
        .inside{padding:64px 52px 56px}
        .brand{display:flex;align-items:center;justify-content:center;gap:12px;font-size:28px;font-weight:1000;margin-bottom:28px}
        .mark{width:52px;height:52px;border-radius:18px;background:#2563eb;color:white;display:grid;place-items:center;box-shadow:0 20px 45px rgba(37,99,235,.25)}
        h1{text-align:center;font-size:56px;line-height:1.03;letter-spacing:-2px;margin:0 auto 26px;max-width:940px}
        .search{max-width:880px;margin:0 auto 28px;background:white;border:1px solid #dbe3ef;border-radius:28px;box-shadow:0 24px 70px rgba(15,23,42,.10);padding:18px 20px;display:flex;align-items:center;gap:14px}
        .search-icon{font-size:22px;color:#64748b}
        .search-text{flex:1;font-size:22px;font-weight:850;color:#0f172a}
        .search a{background:#2563eb;color:white;padding:14px 20px;border-radius:18px;font-weight:950}
        .suggestions{display:flex;justify-content:center;gap:10px;flex-wrap:wrap;margin-bottom:42px}
        .suggestions a{background:#f1f5f9;border:1px solid #e2e8f0;color:#334155;padding:11px 15px;border-radius:999px;font-weight:850}
        .grid{display:grid;grid-template-columns:1fr 1fr;gap:24px;align-items:start}
        .results{display:grid;gap:14px}
        .result{background:#fff;border:1px solid #e5e7eb;border-radius:24px;padding:22px;box-shadow:0 18px 50px rgba(15,23,42,.06)}
        .result small{color:#2563eb;font-weight:950}
        .result h3{font-size:24px;margin:8px 0 8px;letter-spacing:-.5px}
        .result p{margin:0;color:#64748b;line-height:1.6;font-weight:700}
        .exam{background:#0f172a;color:white;border-radius:30px;padding:24px;box-shadow:0 30px 85px rgba(15,23,42,.25)}
        .exam-head{display:flex;justify-content:space-between;align-items:center;margin-bottom:16px}
        .pill{background:rgba(255,255,255,.09);border:1px solid rgba(255,255,255,.12);padding:8px 12px;border-radius:999px;font-weight:950;color:#bfdbfe;font-size:13px}
        .timer{color:#facc15;font-weight:950}
        .preview-img{height:180px;border-radius:22px;background:linear-gradient(180deg,#dbeafe,#eff6ff);position:relative;overflow:hidden;margin-bottom:16px}
        .road{position:absolute;left:50%;bottom:-100px;width:180px;height:330px;transform:translateX(-50%) perspective(380px) rotateX(58deg);background:#111827;border-left:4px solid white;border-right:4px solid white}
        .road:after{content:"";position:absolute;left:50%;top:0;width:7px;height:100%;transform:translateX(-50%);background:repeating-linear-gradient(to bottom,#facc15 0 28px,transparent 28px 55px)}
        .question{font-size:21px;font-weight:950;line-height:1.35;margin-bottom:13px}
        .answer{padding:13px 14px;border-radius:15px;background:#1e293b;border:1px solid rgba(255,255,255,.08);margin-top:9px;font-weight:850;color:#dbeafe}
        .answer.good{background:#dcfce7;color:#166534;border-color:#22c55e}
        .explain{margin-top:14px;background:rgba(37,99,235,.14);border:1px solid rgba(147,197,253,.18);border-radius:18px;padding:15px;color:#dbeafe;line-height:1.55;font-weight:750}
        .bottom{padding:0 52px 56px;display:grid;grid-template-columns:repeat(4,1fr);gap:14px}
        .stat{background:#f8fafc;border:1px solid #e5e7eb;border-radius:22px;padding:20px}
        .stat b{display:block;font-size:30px;color:#2563eb;margin-bottom:5px}
        .stat span{color:#64748b;font-weight:850}
        @media(max-width:900px){
            .inside{padding:36px 20px}
            h1{font-size:36px;text-align:left}
            .brand{justify-content:flex-start}
            .search{border-radius:22px;align-items:flex-start}
            .search-text{font-size:17px}
            .search a{display:none}
            .grid,.bottom{grid-template-columns:1fr}
            .bottom{padding:0 20px 34px}
            .url{display:none}
        }
    </style>
</head>
<body>

<div class="wrap">
    <main class="hero">
        <div class="browser-top">
            <div class="dots"><span class="dot"></span><span class="dot"></span><span class="dot"></span></div>
            <div class="url">autoschool.ge — search your driving exam</div>
            <a class="navbtn" href="/autoschool/exam">ტესტი</a>
        </div>

        <div class="inside">
            <div class="brand">
                <span class="mark">A</span>
                <span>AutoSchool</span>
            </div>

            <h1>ყველა პასუხი მართვის მოწმობის გამოცდაზე — ერთ ჭკვიან პლატფორმაში</h1>

            <div class="search">
                <span class="search-icon">⌕</span>
                <div class="search-text">როგორ ჩავაბარო მართვის მოწმობის გამოცდა?</div>
                <a href="/autoschool/exam">ძებნა</a>
            </div>

            <div class="suggestions">
                <a href="/autoschool/exam">ტესტის დაწყება</a>
                <a href="#results">სასწავლო რეჟიმი</a>
                <a href="#results">შეცდომების ახსნა</a>
                <a href="#results">გამოცდის სიმულაცია</a>
            </div>

            <div class="grid" id="results">
                <div class="results">
                    <div class="result">
                        <small>პირველი შედეგი</small>
                        <h3>გაიარე რეალური ტესტი</h3>
                        <p>კითხვები, პასუხები, სურათები და სწორი პასუხი Laravel/MySQL სისტემაში.</p>
                    </div>

                    <div class="result">
                        <small>სწავლისთვის</small>
                        <h3>შეცდომაზე მიიღე მარტივი ახსნა</h3>
                        <p>არასწორი პასუხისას popup ხსნის წესს ადამიანური ენით, არა რთული მუხლებით.</p>
                    </div>

                    <div class="result">
                        <small>პროექტის არქიტექტურა</small>
                        <h3>PDF-დან კითხვების იმპორტი</h3>
                        <p>სისტემა ინახავს ticket_no, question, answers, correct_answer, explanation და image ველებს.</p>
                    </div>
                </div>

                <div class="exam">
                    <div class="exam-head">
                        <span class="pill">Live Exam Preview</span>
                        <span class="timer">00:28</span>
                    </div>

                    <div class="preview-img">
                        <div class="road"></div>
                    </div>

                    <div class="question">რომელი მიმართულებით არის ნებადართული მოძრაობა მოცემულ სიტუაციაში?</div>

                    <div class="answer">მხოლოდ მარჯვნივ</div>
                    <div class="answer good">სწორია — პირდაპირ ან მარცხნივ</div>
                    <div class="answer">მხოლოდ უკან დაბრუნება</div>

                    <div class="explain">
                        არასწორ პასუხზე სისტემა გიხსნის რატომ შეცდი და რა წესი უნდა დაიმახსოვრო.
                    </div>
                </div>
            </div>
        </div>

        <div class="bottom">
            <div class="stat"><b>PDF</b><span>წყაროდ გამოყენებული</span></div>
            <div class="stat"><b>10</b><span>კითხვა ამოღებულია</span></div>
            <div class="stat"><b>5</b><span>MySQL-ში ჩასმული</span></div>
            <div class="stat"><b>Admin</b><span>შემდეგი ეტაპი</span></div>
        </div>
    </main>
</div>

</body>
</html>
