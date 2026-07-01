<!DOCTYPE html>
<html lang="ka">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>მოსწავლის პანელი — ავტოსკოლა</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Noto+Serif+Georgian:wght@600;700;800&family=Noto+Sans+Georgian:wght@400;500;600;700&family=Space+Mono:wght@700&display=swap">

    <style>
        *{box-sizing:border-box}
        body{margin:0;font-family:'Noto Sans Georgian',sans-serif;background:#f2f6fb;color:#0B1E3D}
        .page{min-height:100vh;padding:28px 20px;background:radial-gradient(circle at top right,rgba(95,168,245,.22),transparent 32%),linear-gradient(180deg,#fff,#f2f6fb)}
        .wrap{max-width:1180px;margin:0 auto}
        .top{display:flex;align-items:center;justify-content:space-between;gap:18px;margin-bottom:24px}
        .brand{font-family:'Noto Serif Georgian',serif;font-size:24px;font-weight:800}
        .actions{display:flex;gap:10px;align-items:center}
        a,.logout{display:inline-flex;text-decoration:none;border:1px solid #D7DEE8;background:#fff;color:#0B3E86;border-radius:999px;padding:11px 16px;font-weight:700;font-size:13px}
        .logout{cursor:pointer;font-family:inherit}
        .hero{border:1px solid #D7DEE8;background:#fff;border-radius:28px;padding:34px;box-shadow:0 28px 70px -42px rgba(11,30,61,.45);margin-bottom:22px}
        .tag{display:inline-flex;font-family:'Space Mono',monospace;font-size:11px;letter-spacing:2px;color:#0B3E86;background:#F2F6FB;border:1px solid rgba(21,95,201,.25);border-radius:999px;padding:8px 14px}
        h1{font-family:'Noto Serif Georgian',serif;font-size:clamp(30px,4vw,48px);line-height:1.12;margin:20px 0 12px}
        p{margin:0;color:#46587A;line-height:1.7}
        .grid{display:grid;grid-template-columns:repeat(4,1fr);gap:16px}
        .card{background:#fff;border:1px solid #D7DEE8;border-radius:20px;padding:22px;box-shadow:0 18px 46px -36px rgba(11,30,61,.45)}
        .card b{display:block;font-family:'Noto Serif Georgian',serif;font-size:17px;margin-bottom:8px}
        .card span{font-size:13px;color:#46587A;line-height:1.55}
        .score{font-family:'Space Mono',monospace;font-size:34px;color:#0B3E86;margin-bottom:6px}
        .wide{grid-column:span 2}
        .list{display:grid;gap:10px;margin-top:14px}
        .item{display:flex;justify-content:space-between;gap:12px;background:#F7FAFE;border:1px solid #D7DEE8;border-radius:14px;padding:13px}
        .item small{color:#46587A}
        .primary{background:linear-gradient(135deg,#5FA8F5,#0B3E86);color:#fff;border:0}
        form{margin:0}
        @media(max-width:980px){.grid{grid-template-columns:repeat(2,1fr)}}
        @media(max-width:620px){.top{align-items:flex-start;flex-direction:column}.grid{grid-template-columns:1fr}.wide{grid-column:auto}.hero{padding:24px}}
    </style>
</head>
<body>
<div class="page">
    <div class="wrap">
        <header class="top">
            <div class="brand">მოსწავლის პანელი</div>

            <div class="actions">
                <a href="{{ url('/') }}">მთავარი</a>
                <form method="POST" action="{{ route('student.logout') }}">
                    @csrf
                    <button class="logout" type="submit">გასვლა</button>
                </form>
            </div>
        </header>

        <section class="hero">
            <span class="tag">STUDENT DASHBOARD</span>
            <h1>გამარჯობა, {{ $student->full_name }}</h1>
            <p>აქ გამოჩნდება შენი კურსი, პროგრესი, შეცდომები, გამოცდის სიმულაციები და პრაქტიკული გაკვეთილების სტატუსი.</p>
        </section>

        <section class="grid">
            <div class="card">
                <div class="score">0%</div>
                <b>თეორიის პროგრესი</b>
                <span>ბილეთების ვარჯიში ჯერ არ დაწყებულა.</span>
            </div>

            <div class="card">
                <div class="score">0</div>
                <b>ჩემი შეცდომები</b>
                <span>არასწორი პასუხები აქ დაგიგროვდება ახსნებით.</span>
            </div>

            <div class="card">
                <div class="score">0</div>
                <b>გამოცდის ცდები</b>
                <span>30-კითხვიანი და მორგებული გამოცდები.</span>
            </div>

            <div class="card">
                <div class="score">NEW</div>
                <b>სტატუსი</b>
                <span>რეგისტრაცია მიღებულია, გუნდი დაგიკავშირდება.</span>
            </div>

            <div class="card wide">
                <b>შენი კურსი</b>
                <div class="list">
                    <div class="item"><small>პაკეტი</small><strong>{{ strtoupper($student->course_type) }}</strong></div>
                    <div class="item"><small>სწავლების ენა</small><strong>{{ strtoupper($student->language) }}</strong></div>
                    <div class="item"><small>სასურველი დრო</small><strong>{{ $student->preferred_time ?: 'არ არის მითითებული' }}</strong></div>
                </div>
            </div>

            <div class="card wide">
                <b>შემდეგი ნაბიჯები</b>
                <div class="list">
                    <div class="item"><small>1</small><strong>ადმინისტრატორი დაგიკავშირდება</strong></div>
                    <div class="item"><small>2</small><strong>შეირჩევა გრაფიკი და ინსტრუქტორი</strong></div>
                    <div class="item"><small>3</small><strong>გაგეხსნება სრული სასწავლო სისტემა</strong></div>
                </div>
            </div>
        </section>
    </div>
</div>
</body>
</html>
