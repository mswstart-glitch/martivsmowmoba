<!doctype html>
<html lang="ka">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ბილეთი #{{ $currentTicket ?? $question->ticket_number }}</title>

    <style>
        * { box-sizing: border-box; }

        body {
            margin: 0;
            min-height: 100vh;
            font-family: system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
            background:
                radial-gradient(circle at top left, rgba(37, 99, 235, .22), transparent 34%),
                radial-gradient(circle at bottom right, rgba(14, 165, 233, .20), transparent 36%),
                linear-gradient(135deg, #07111f 0%, #0f172a 50%, #111827 100%);
            color: #e5e7eb;
        }

        .page {
            width: min(1180px, calc(100% - 28px));
            margin: 0 auto;
            padding: 26px 0 34px;
        }

        .header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 14px;
            margin-bottom: 22px;
        }

        .brand {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .logo {
            width: 46px;
            height: 46px;
            border-radius: 16px;
            background: linear-gradient(135deg, #2563eb, #38bdf8);
            display: grid;
            place-items: center;
            font-weight: 900;
            color: white;
            box-shadow: 0 16px 40px rgba(37, 99, 235, .35);
        }

        .brand h2 {
            margin: 0;
            font-size: 18px;
            color: white;
        }

        .brand p {
            margin: 3px 0 0;
            color: #94a3b8;
            font-size: 13px;
        }

        .pill {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            border: 1px solid rgba(148, 163, 184, .25);
            background: rgba(15, 23, 42, .64);
            backdrop-filter: blur(16px);
            color: #dbeafe;
            padding: 10px 14px;
            border-radius: 999px;
            font-weight: 800;
            font-size: 14px;
        }

        .grid {
            display: grid;
            grid-template-columns: 1.05fr .95fr;
            gap: 22px;
            align-items: start;
        }

        .panel {
            border: 1px solid rgba(148, 163, 184, .22);
            background: rgba(15, 23, 42, .70);
            backdrop-filter: blur(22px);
            border-radius: 28px;
            box-shadow: 0 28px 90px rgba(0, 0, 0, .35);
            overflow: hidden;
        }

        .question-panel {
            padding: 24px;
        }

        .image-box {
            background: linear-gradient(180deg, rgba(255,255,255,.08), rgba(255,255,255,.03));
            border: 1px solid rgba(226, 232, 240, .14);
            border-radius: 24px;
            overflow: hidden;
            margin-bottom: 20px;
            min-height: 280px;
            display: grid;
            place-items: center;
        }

        .image-box img {
            width: 100%;
            max-height: 460px;
            object-fit: contain;
            display: block;
            background: #f8fafc;
        }

        .question-meta {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            gap: 10px;
            margin-bottom: 14px;
        }

        .ticket {
            background: linear-gradient(135deg, #2563eb, #0ea5e9);
            color: white;
            padding: 9px 14px;
            border-radius: 999px;
            font-weight: 900;
            box-shadow: 0 14px 34px rgba(37, 99, 235, .28);
        }

        .hint {
            color: #a5b4fc;
            background: rgba(99, 102, 241, .12);
            border: 1px solid rgba(165, 180, 252, .18);
            padding: 9px 12px;
            border-radius: 999px;
            font-size: 13px;
            font-weight: 750;
        }

        h1 {
            margin: 0;
            font-size: clamp(21px, 2.4vw, 32px);
            line-height: 1.45;
            color: white;
            letter-spacing: -.02em;
        }

        .answers-panel {
            padding: 22px;
            position: sticky;
            top: 18px;
        }

        .answers-title {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 10px;
            margin-bottom: 16px;
        }

        .answers-title h3 {
            margin: 0;
            color: white;
            font-size: 18px;
        }

        .answers-title span {
            color: #94a3b8;
            font-size: 13px;
            font-weight: 700;
        }

        .answers {
            display: grid;
            gap: 12px;
        }

        .answer {
            width: 100%;
            text-align: left;
            border: 1px solid rgba(148, 163, 184, .22);
            background: rgba(30, 41, 59, .72);
            color: #e5e7eb;
            border-radius: 18px;
            padding: 16px 16px;
            font-size: 15px;
            line-height: 1.45;
            cursor: pointer;
            transition: transform .16s ease, border-color .16s ease, background .16s ease, box-shadow .16s ease;
        }

        .answer:hover {
            transform: translateY(-2px);
            border-color: rgba(56, 189, 248, .55);
            background: rgba(30, 64, 175, .28);
            box-shadow: 0 14px 34px rgba(14, 165, 233, .13);
        }

        .answer.correct {
            background: rgba(34, 197, 94, .18);
            border-color: rgba(34, 197, 94, .75);
            color: #dcfce7;
            font-weight: 900;
        }

        .answer.wrong {
            background: rgba(239, 68, 68, .18);
            border-color: rgba(239, 68, 68, .75);
            color: #fee2e2;
            font-weight: 900;
        }

        .answer.disabled {
            pointer-events: none;
        }

        .result {
            display: none;
            margin-top: 16px;
            padding: 15px 16px;
            border-radius: 18px;
            font-weight: 900;
            line-height: 1.45;
        }

        .result.ok {
            display: block;
            background: rgba(34, 197, 94, .15);
            color: #bbf7d0;
            border: 1px solid rgba(34, 197, 94, .45);
        }

        .result.bad {
            display: block;
            background: rgba(239, 68, 68, .15);
            color: #fecaca;
            border: 1px solid rgba(239, 68, 68, .45);
        }

        .nav {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px;
            margin-top: 18px;
        }

        .nav a,
        .nav span {
            min-height: 48px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            border-radius: 16px;
            font-weight: 900;
        }

        .nav a {
            background: linear-gradient(135deg, #2563eb, #0ea5e9);
            color: white;
            box-shadow: 0 16px 34px rgba(37, 99, 235, .24);
        }

        .nav a.secondary {
            background: rgba(226, 232, 240, .10);
            color: #e5e7eb;
            border: 1px solid rgba(226, 232, 240, .14);
            box-shadow: none;
        }

        .nav span {
            background: rgba(226, 232, 240, .05);
            color: #64748b;
            border: 1px solid rgba(226, 232, 240, .08);
        }

        @media (max-width: 900px) {
            .grid { grid-template-columns: 1fr; }
            .answers-panel { position: static; }
            .header { align-items: flex-start; flex-direction: column; }
            .page { padding-top: 18px; }
        }

        @media (max-width: 560px) {
            .question-panel, .answers-panel { padding: 16px; border-radius: 22px; }
            .panel { border-radius: 22px; }
            .image-box { min-height: 190px; border-radius: 18px; }
            .nav { grid-template-columns: 1fr; }
        }
    </style>
</head>
<body>
<div class="page">
    <header class="header">
        <div class="brand">
            <div class="logo">A</div>
            <div>
                <h2>ავტოსკოლის ტესტი</h2>
                <p>აირჩიე პასუხი და შედეგი მაშინვე გამოჩნდება</p>
            </div>
        </div>

        <div class="pill">ბილეთი #{{ $currentTicket ?? $question->ticket_number }}</div>
    </header>

    <main class="grid">
        <section class="panel question-panel">
            @if($question->image_path)
                <div class="image-box">
                    <img src="{{ $question->image_path }}" alt="ბილეთის ფოტო">
                </div>
            @endif

            <div class="question-meta">
                <span class="ticket">კითხვა #{{ $currentTicket ?? $question->ticket_number }}</span>
                <span class="hint">პასუხი მხოლოდ არჩევის შემდეგ მოწმდება</span>
            </div>

            <h1>{{ $question->question }}</h1>
        </section>

        <aside class="panel answers-panel">
            <div class="answers-title">
                <h3>პასუხები</h3>
                <span>{{ $question->answers->count() }} ვარიანტი</span>
            </div>

            <div class="answers">
                @foreach($question->answers as $answer)
                    <button
                        type="button"
                        class="answer"
                        data-correct="{{ $answer->is_correct ? '1' : '0' }}"
                    >
                        {{ $answer->answer }}
                    </button>
                @endforeach
            </div>

            <div id="result" class="result"></div>

            <div class="nav">
                @if($prevTicket)
                    <a class="secondary" href="{{ route('test.question', ['ticket' => $prevTicket]) }}">← წინა</a>
                @else
                    <span>წინა არ არის</span>
                @endif

                @if($nextTicket)
                    <a href="{{ route('test.question', ['ticket' => $nextTicket]) }}">შემდეგი →</a>
                @else
                    <span>დასრულდა</span>
                @endif
            </div>
        </aside>
    </main>
</div>

<script>
    const buttons = document.querySelectorAll('.answer');
    const result = document.getElementById('result');

    buttons.forEach(button => {
        button.addEventListener('click', () => {
            const isCorrect = button.dataset.correct === '1';

            buttons.forEach(btn => {
                btn.classList.add('disabled');

                if (btn.dataset.correct === '1') {
                    btn.classList.add('correct');
                }
            });

            if (isCorrect) {
                result.className = 'result ok';
                result.textContent = 'სწორია — კარგი პასუხია.';
            } else {
                button.classList.add('wrong');
                result.className = 'result bad';
                result.textContent = 'არასწორია — სწორი პასუხი მონიშნულია მწვანედ.';
            }
        });
    });
</script>
</body>
</html>
