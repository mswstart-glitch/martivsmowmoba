<!doctype html>
<html lang="ka">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ტესტის კითხვა #{{ $currentTicket ?? $question->ticket_number }}</title>
    <style>
        body {
            margin: 0;
            font-family: system-ui, -apple-system, BlinkMacSystemFont, "Segoe UI", sans-serif;
            background: #f3f6fb;
            color: #111827;
        }

        .wrap {
            max-width: 880px;
            margin: 40px auto;
            padding: 0 16px;
        }

        .card {
            background: #fff;
            border-radius: 22px;
            padding: 26px;
            box-shadow: 0 18px 50px rgba(15, 23, 42, .10);
            border: 1px solid rgba(148, 163, 184, .25);
        }

        .top {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            margin-bottom: 18px;
        }

        .badge {
            display: inline-flex;
            padding: 8px 13px;
            border-radius: 999px;
            background: #eaf2ff;
            color: #1454d8;
            font-weight: 800;
            font-size: 14px;
        }

        h1 {
            margin: 0 0 22px;
            font-size: 25px;
            line-height: 1.45;
        }

        .answers {
            display: grid;
            gap: 12px;
        }

        .answer {
            width: 100%;
            text-align: left;
            border: 1px solid #d8e1ef;
            background: #f8fbff;
            border-radius: 16px;
            padding: 16px 18px;
            font-size: 16px;
            cursor: pointer;
            transition: .18s ease;
        }

        .answer:hover {
            background: #eef6ff;
            border-color: #9ec5ff;
        }

        .answer.correct {
            background: #dcfce7;
            border-color: #22c55e;
            color: #14532d;
            font-weight: 800;
        }

        .answer.wrong {
            background: #fee2e2;
            border-color: #ef4444;
            color: #7f1d1d;
            font-weight: 800;
        }

        .answer.disabled {
            pointer-events: none;
        }

        .result {
            display: none;
            margin-top: 18px;
            padding: 14px 16px;
            border-radius: 14px;
            font-weight: 800;
        }

        .result.ok {
            display: block;
            background: #dcfce7;
            color: #166534;
        }

        .result.bad {
            display: block;
            background: #fee2e2;
            color: #991b1b;
        }

        .nav {
            display: flex;
            justify-content: space-between;
            gap: 12px;
            margin-top: 22px;
        }

        .nav a {
            text-decoration: none;
            padding: 12px 16px;
            border-radius: 14px;
            background: #1454d8;
            color: white;
            font-weight: 800;
        }

        .nav a.secondary {
            background: #e5e7eb;
            color: #111827;
        }

        .muted {
            color: #64748b;
            font-size: 14px;
        }

        @media (max-width: 640px) {
            .wrap { margin: 20px auto; }
            .card { padding: 18px; border-radius: 18px; }
            h1 { font-size: 20px; }
            .nav { flex-direction: column; }
            .nav a { text-align: center; }
        }
    </style>
</head>
<body>
<div class="wrap">
    <div class="card">
        <div class="top">
            <span class="badge">ბილეთი #{{ $currentTicket ?? $question->ticket_number }}</span>
            <span class="muted">პასუხი შემოწმდება არჩევის შემდეგ</span>
        </div>

        <h1>{{ $question->question }}</h1>

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
                <span></span>
            @endif

            @if($nextTicket)
                <a href="{{ route('test.question', ['ticket' => $nextTicket]) }}">შემდეგი →</a>
            @endif
        </div>
    </div>
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
                result.textContent = 'სწორია ✅';
            } else {
                button.classList.add('wrong');
                result.className = 'result bad';
                result.textContent = 'არასწორია ❌ სწორი პასუხი მონიშნულია მწვანედ.';
            }
        });
    });
</script>
</body>
</html>
