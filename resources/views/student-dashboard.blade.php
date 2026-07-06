<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('messages.student_dashboard.page_title') }}</title>

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
            <div class="brand">{{ __('messages.student_dashboard.brand') }}</div>

            <div class="actions">
                <a href="{{ url('/') }}">{{ __('messages.student_dashboard.home') }}</a>
                <form method="POST" action="{{ route('student.logout') }}">
                    @csrf
                    <button class="logout" type="submit">{{ __('messages.student_dashboard.logout') }}</button>
                </form>
            </div>
        </header>

        <section class="hero">
            <span class="tag">{{ __('messages.student_dashboard.tag') }}</span>
            <h1>{{ __('messages.student_dashboard.greeting', ['name' => $student->full_name]) }}</h1>
            <p>{{ __('messages.student_dashboard.intro') }}</p>
        </section>

        <section class="grid">
            <div class="card">
                <div class="score">0%</div>
                <b>{{ __('messages.student_dashboard.theory_progress') }}</b>
                <span>{{ __('messages.student_dashboard.theory_progress_desc') }}</span>
            </div>

            <div class="card">
                <div class="score">0</div>
                <b>{{ __('messages.student_dashboard.my_mistakes') }}</b>
                <span>{{ __('messages.student_dashboard.my_mistakes_desc') }}</span>
            </div>

            <div class="card">
                <div class="score">0</div>
                <b>{{ __('messages.student_dashboard.exam_attempts') }}</b>
                <span>{{ __('messages.student_dashboard.exam_attempts_desc') }}</span>
            </div>

            <div class="card">
                <div class="score">{{ __('messages.student_dashboard.status_new') }}</div>
                <b>{{ __('messages.student_dashboard.status') }}</b>
                <span>{{ __('messages.student_dashboard.status_desc') }}</span>
            </div>

            <div class="card wide">
                <b>{{ __('messages.student_dashboard.my_course') }}</b>
                <div class="list">
                    <div class="item"><small>{{ __('messages.student_dashboard.package') }}</small><strong>{{ strtoupper($student->course_type) }}</strong></div>
                    <div class="item"><small>{{ __('messages.student_dashboard.teaching_language') }}</small><strong>{{ strtoupper($student->language) }}</strong></div>
                    <div class="item"><small>{{ __('messages.student_dashboard.preferred_time') }}</small><strong>{{ $student->preferred_time ?: __('messages.student_dashboard.preferred_time_empty') }}</strong></div>
                </div>
            </div>

            <div class="card wide">
                <b>{{ __('messages.student_dashboard.next_steps') }}</b>
                <div class="list">
                    <div class="item"><small>1</small><strong>{{ __('messages.student_dashboard.step_1') }}</strong></div>
                    <div class="item"><small>2</small><strong>{{ __('messages.student_dashboard.step_2') }}</strong></div>
                    <div class="item"><small>3</small><strong>{{ __('messages.student_dashboard.step_3') }}</strong></div>
                </div>
            </div>
        </section>
    </div>
</div>
</body>
</html>
