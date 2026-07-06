<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('messages.analytics.page_title') }}</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Noto+Serif+Georgian:wght@600;700;800&family=Noto+Sans+Georgian:wght@400;500;600;700&family=Space+Mono:wght@700&display=swap">

    <style>
        *{box-sizing:border-box}
        body{margin:0;font-family:'Noto Sans Georgian',sans-serif;background:#f2f6fb;color:#0B1E3D}
        .page{min-height:100vh;padding:28px 20px;background:radial-gradient(circle at top right,rgba(95,168,245,.22),transparent 32%),linear-gradient(180deg,#fff,#f2f6fb)}
        .wrap{max-width:1180px;margin:0 auto}
        .top{display:flex;align-items:center;justify-content:space-between;gap:18px;margin-bottom:24px}
        .brand{font-family:'Noto Serif Georgian',serif;font-size:24px;font-weight:800}
        a.navlink{display:inline-flex;text-decoration:none;border:1px solid #D7DEE8;background:#fff;color:#0B3E86;border-radius:999px;padding:11px 16px;font-weight:700;font-size:13px}
        .hero{border:1px solid #D7DEE8;background:#fff;border-radius:28px;padding:34px;box-shadow:0 28px 70px -42px rgba(11,30,61,.45);margin-bottom:22px}
        .tag{display:inline-flex;font-family:'Space Mono',monospace;font-size:11px;letter-spacing:2px;color:#0B3E86;background:#F2F6FB;border:1px solid rgba(21,95,201,.25);border-radius:999px;padding:8px 14px}
        h1{font-family:'Noto Serif Georgian',serif;font-size:clamp(28px,4vw,42px);line-height:1.12;margin:20px 0 12px}
        h2{font-family:'Noto Serif Georgian',serif;font-size:20px;margin:0 0 14px}
        p{margin:0;color:#46587A;line-height:1.7}
        section.block{border:1px solid #D7DEE8;background:#fff;border-radius:24px;padding:26px;margin-bottom:20px;box-shadow:0 18px 46px -36px rgba(11,30,61,.45)}
        .grid{display:grid;grid-template-columns:repeat(4,1fr);gap:16px}
        .card{background:#F7FAFE;border:1px solid #D7DEE8;border-radius:18px;padding:20px}
        .card b{display:block;font-family:'Noto Serif Georgian',serif;font-size:15px;margin-bottom:6px;color:#46587A;font-weight:600}
        .score{font-family:'Space Mono',monospace;font-size:32px;color:#0B3E86}
        .list{display:grid;gap:10px}
        .item{display:flex;justify-content:space-between;align-items:center;gap:12px;background:#F7FAFE;border:1px solid #D7DEE8;border-radius:14px;padding:13px 16px}
        .item small{color:#46587A}
        .pill{font-family:'Space Mono',monospace;font-size:12px;font-weight:700;border-radius:999px;padding:4px 10px}
        .pill.ok{background:#dcfce7;color:#16a34a}
        .pill.bad{background:#fee2e2;color:#dc2626}
        table{width:100%;border-collapse:collapse}
        th,td{text-align:left;padding:10px 12px;border-bottom:1px solid #EDF1F7;font-size:13px}
        th{color:#46587A;font-weight:700;font-size:12px;text-transform:uppercase;letter-spacing:.04em}
        .empty{color:#46587A;font-size:14px;padding:10px 0}
        @media(max-width:980px){.grid{grid-template-columns:repeat(2,1fr)}}
        @media(max-width:620px){.top{align-items:flex-start;flex-direction:column}.grid{grid-template-columns:1fr}.hero{padding:24px}table{font-size:12px}}
    </style>
</head>
<body>
<div class="page">
    <div class="wrap">
        <header class="top">
            <div class="brand">{{ __('messages.analytics.brand') }}</div>
            <div style="display:flex;gap:10px;align-items:center;">
                <a class="navlink" href="{{ url('/') }}">{{ __('messages.analytics.home') }}</a>
                <form method="POST" action="{{ route('logout') }}" style="margin:0;">
                    @csrf
                    <button type="submit" class="navlink" style="cursor:pointer;font-family:inherit;">{{ __('messages.analytics.logout') }}</button>
                </form>
            </div>
        </header>

        <section class="hero">
            <span class="tag">{{ __('messages.analytics.tag') }}</span>
            <h1>{{ __('messages.analytics.hero_title') }}</h1>
            <p>{{ __('messages.analytics.hero_desc') }}</p>
        </section>

        <section class="block">
            <h2>{{ __('messages.analytics.general_stats') }}</h2>
            <div class="grid">
                <div class="card"><div class="score">{{ $total }}</div><b>{{ __('messages.analytics.total_answered') }}</b></div>
                <div class="card"><div class="score">{{ $correct }}</div><b>{{ __('messages.analytics.correct_answers') }}</b></div>
                <div class="card"><div class="score">{{ $wrong }}</div><b>{{ __('messages.analytics.wrong_answers') }}</b></div>
                <div class="card"><div class="score">{{ $successRate }}%</div><b>{{ __('messages.analytics.success_rate') }}</b></div>
            </div>
        </section>

        <section class="block">
            <h2>{{ __('messages.analytics.weak_topics') }}</h2>
            @if($weakTopics->isEmpty())
                <p class="empty">{{ __('messages.analytics.weak_topics_empty') }}</p>
            @else
                <div class="list">
                    @foreach($weakTopics as $topic)
                        <div class="item">
                            <span>{{ $topic->topic }}</span>
                            <small>{{ $topic->mistakes }} {{ __('messages.analytics.mistakes_suffix') }}</small>
                        </div>
                    @endforeach
                </div>
            @endif
        </section>

        <section class="block">
            <h2>{{ __('messages.analytics.weak_questions') }}</h2>
            @if($weakQuestions->isEmpty())
                <p class="empty">{{ __('messages.analytics.weak_questions_empty') }}</p>
            @else
                <div class="list">
                    @foreach($weakQuestions as $weak)
                        <div class="item">
                            <span>
                                @if($weak->ticket_number) {{ __('messages.analytics.ticket_prefix') }}{{ $weak->ticket_number }} — @endif
                                {{ $weak->question->question ?? (__('messages.analytics.question_prefix') . $weak->question_id) }}
                            </span>
                            <small>{{ $weak->mistakes }} {{ __('messages.analytics.mistakes_suffix') }}</small>
                        </div>
                    @endforeach
                </div>
            @endif
        </section>

        <section class="block">
            <h2>{{ __('messages.analytics.recent_activity') }}</h2>
            @if($recentActivity->isEmpty())
                <p class="empty">{{ __('messages.analytics.recent_activity_empty') }}</p>
            @else
                <table>
                    <thead>
                        <tr>
                            <th>{{ __('messages.analytics.col_question_id') }}</th>
                            <th>{{ __('messages.analytics.col_topic') }}</th>
                            <th>{{ __('messages.analytics.col_result') }}</th>
                            <th>{{ __('messages.analytics.col_date') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($recentActivity as $attempt)
                            <tr>
                                <td>#{{ $attempt->question_id }}</td>
                                <td>{{ $attempt->topic ?? '—' }}</td>
                                <td>
                                    @if($attempt->is_correct)
                                        <span class="pill ok">{{ __('messages.analytics.result_correct') }}</span>
                                    @else
                                        <span class="pill bad">{{ __('messages.analytics.result_wrong') }}</span>
                                    @endif
                                </td>
                                <td>{{ $attempt->created_at->format('d.m.Y H:i') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </section>

        <section class="block">
            <h2>{{ __('messages.analytics.daily_progress') }}</h2>
            <table>
                <thead>
                    <tr>
                        <th>{{ __('messages.analytics.col_period') }}</th>
                        <th>{{ __('messages.analytics.col_attempts') }}</th>
                        <th>{{ __('messages.analytics.col_correct_percent') }}</th>
                        <th>{{ __('messages.analytics.col_wrong_percent') }}</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ __('messages.analytics.period_today') }}</td>
                        <td>{{ $dailyProgress['today']['attempts'] }}</td>
                        <td>{{ $dailyProgress['today']['correct_percent'] }}%</td>
                        <td>{{ $dailyProgress['today']['wrong_percent'] }}%</td>
                    </tr>
                    <tr>
                        <td>{{ __('messages.analytics.period_yesterday') }}</td>
                        <td>{{ $dailyProgress['yesterday']['attempts'] }}</td>
                        <td>{{ $dailyProgress['yesterday']['correct_percent'] }}%</td>
                        <td>{{ $dailyProgress['yesterday']['wrong_percent'] }}%</td>
                    </tr>
                    <tr>
                        <td>{{ __('messages.analytics.period_last_7_days') }}</td>
                        <td>{{ $dailyProgress['last_7_days']['attempts'] }}</td>
                        <td>{{ $dailyProgress['last_7_days']['correct_percent'] }}%</td>
                        <td>{{ $dailyProgress['last_7_days']['wrong_percent'] }}%</td>
                    </tr>
                </tbody>
            </table>
        </section>

        <section class="block">
            <h2>{{ __('messages.analytics.recommendations') }}</h2>
            <div class="list">
                @foreach($recommendations as $recommendation)
                    <div class="item"><span>{{ $recommendation }}</span></div>
                @endforeach
            </div>
        </section>
    </div>
</div>
</body>
</html>
