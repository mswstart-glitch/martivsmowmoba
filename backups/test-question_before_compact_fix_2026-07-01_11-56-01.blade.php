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
            background: #06131b;
            color: #fff;
        }

        .page {
            width: min(1180px, calc(100% - 24px));
            margin: 0 auto;
            padding: 22px 0 34px;
        }

        .exam-card {
            overflow: hidden;
            border-radius: 28px;
            background: #082633;
            border: 1px solid rgba(148, 163, 184, .22);
            box-shadow: 0 30px 90px rgba(0,0,0,.35);
        }

        .hero {
            position: relative;
            background: #10202a;
            min-height: 420px;
            display: flex;
            align-items: stretch;
            justify-content: center;
            overflow: hidden;
        }

        .hero img {
            width: 100%;
            height: 100%;
            min-height: 420px;
            max-height: 610px;
            object-fit: cover;
            display: block;
        }

        .ticket-badge {
            position: absolute;
            top: 18px;
            left: 18px;
            width: 58px;
            height: 58px;
            border-radius: 18px;
            display: grid;
            place-items: center;
            background: rgba(6, 19, 27, .86);
            border: 1px solid rgba(255,255,255,.18);
            color: #fff;
            font-size: 23px;
            font-weight: 950;
            backdrop-filter: blur(14px);
            box-shadow: 0 14px 30px rgba(0,0,0,.25);
        }

        .progress-badge {
            position: absolute;
            top: 18px;
            right: 18px;
            border-radius: 999px;
            padding: 12px 16px;
            background: rgba(6, 19, 27, .82);
            border: 1px solid rgba(255,255,255,.16);
            color: #dbeafe;
            font-weight: 900;
            backdrop-filter: blur(14px);
        }

        .question-bar {
            position: relative;
            background: linear-gradient(180deg, #082633 0%, #061f2b 100%);
            border-top: 1px solid rgba(255,255,255,.10);
            padding: 30px 38px;
            text-align: center;
        }

        .question-bar:before {
            content: "";
            position: absolute;
            left: 0;
            right: 0;
            top: -70px;
            height: 70px;
            background: linear-gradient(180deg, transparent, rgba(8,38,51,.95));
            pointer-events: none;
        }

        .question-bar h1 {
            position: relative;
            margin: 0;
            font-size: clamp(22px, 2.35vw, 36px);
            line-height: 1.38;
            font-weight: 950;
            letter-spacing: -.02em;
            text-shadow: 0 3px 18px rgba(0,0,0,.34);
        }

        .answers {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            border-top: 1px solid rgba(255,255,255,.10);
        }

        .answer {
            min-height: 92px;
            display: flex;
            align-items: center;
            gap: 20px;
            width: 100%;
            text-align: left;
            border: 0;
            border-right: 1px solid rgba(255,255,255,.10);
            border-bottom: 1px solid rgba(255,255,255,.10);
            background: #0b3a47;
            color: #fff;
            padding: 22px 24px;
            cursor: pointer;
            transition: .18s ease;
            font-size: 18px;
            line-height: 1.45;
            font-weight: 850;
        }

        .answer:nth-child(2n) {
            border-right: 0;
        }

        .answer:hover {
            background: #104f60;
            transform: translateY(-1px);
        }

        .num {
            flex: 0 0 auto;
            width: 44px;
            height: 44px;
            border-radius: 15px;
            display: grid;
            place-items: center;
            background: #fff;
            color: #082633;
            font-size: 23px;
            font-weight: 950;
            box-shadow: 0 12px 24px rgba(0,0,0,.22);
        }

        .answer.correct {
            background: linear-gradient(135deg, #0f7a45, #16a34a);
            box-shadow: inset 0 0 0 2px rgba(134,239,172,.45);
        }

        .answer.wrong {
            background: linear-gradient(135deg, #991b1b, #dc2626);
            box-shadow: inset 0 0 0 2px rgba(254,202,202,.35);
        }

        .answer.disabled {
            pointer-events: none;
        }

        .result {
            display: none;
            margin-top: 18px;
            border-radius: 20px;
            padding: 17px 20px;
            font-size: 17px;
            font-weight: 950;
            text-align: center;
        }

        .result.ok {
            display: block;
            background: rgba(34, 197, 94, .18);
            border: 1px solid rgba(34, 197, 94, .45);
            color: #bbf7d0;
        }

        .result.bad {
            display: block;
            background: rgba(239, 68, 68, .18);
            border: 1px solid rgba(239, 68, 68, .45);
            color: #fecaca;
        }

        .bottom {
            padding: 20px;
            background: #06131b;
        }

        .nav {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 14px;
        }

        .nav a,
        .nav span {
            min-height: 54px;
            border-radius: 18px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-decoration: none;
            font-size: 16px;
            font-weight: 950;
        }

        .nav a {
            background: linear-gradient(135deg, #2563eb, #0ea5e9);
            color: #fff;
            box-shadow: 0 14px 34px rgba(37,99,235,.26);
        }

        .nav a.secondary {
            background: #0b3a47;
            border: 1px solid rgba(255,255,255,.10);
            box-shadow: none;
        }

        .nav span {
            background: rgba(255,255,255,.06);
            color: #64748b;
            border: 1px solid rgba(255,255,255,.08);
        }

        .no-image {
            min-height: 420px;
            display: grid;
            place-items: center;
            color: #94a3b8;
            font-weight: 900;
            font-size: 20px;
        }

        @media (max-width: 760px) {
            .page {
                width: min(100% - 14px, 1180px);
                padding: 8px 0 18px;
            }

            .exam-card {
                border-radius: 22px;
            }

            .hero,
            .hero img,
            .no-image {
                min-height: 260px;
                max-height: 360px;
            }

            .ticket-badge {
                width: 50px;
                height: 50px;
                border-radius: 16px;
                font-size: 20px;
                top: 12px;
                left: 12px;
            }

            .progress-badge {
                top: 12px;
                right: 12px;
                padding: 10px 13px;
                font-size: 13px;
            }

            .question-bar {
                padding: 24px 16px;
            }

            .question-bar h1 {
                font-size: 21px;
            }

            .answers {
                grid-template-columns: 1fr;
            }

            .answer {
                border-right: 0;
                min-height: 82px;
                padding: 18px 16px;
                font-size: 16px;
            }

            .nav {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body>
<div class="page">
    <div class="exam-card">
        <section class="hero">
            @if($question->image_path)
                <img src="{{ $question->image_path }}" alt="ბილეთის ფოტო">
            @else
                <div class="no-image">ამ ბილეთზე ფოტო არ არის</div>
            @endif

            <div class="ticket-badge">#{{ $currentTicket ?? $question->ticket_number }}</div>
            <div class="progress-badge">{{ $currentTicket ?? $question->ticket_number }} / {{ \App\Models\Question::count() }}</div>
        </section>

        <section class="question-bar">
            <h1>{{ $question->question }}</h1>
        </section>

        <section class="answers">
            @foreach($question->answers as $answer)
                <button
                    type="button"
                    class="answer"
                    data-correct="{{ $answer->is_correct ? '1' : '0' }}"
                >
                    <span class="num">{{ $loop->iteration }}</span>
                    <span>{{ $answer->answer }}</span>
                </button>
            @endforeach
        </section>

        <section class="bottom">
            <div id="result" class="result"></div>

            <div class="nav">
                @if($prevTicket)
                    <a class="secondary" href="{{ route('test.question', ['ticket' => $prevTicket]) }}">← წინა ბილეთი</a>
                @else
                    <span>წინა არ არის</span>
                @endif

                @if($nextTicket)
                    <a href="{{ route('test.question', ['ticket' => $nextTicket]) }}">შემდეგი ბილეთი →</a>
                @else
                    <span>დასრულდა</span>
                @endif
            </div>
        </section>
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
                result.textContent = 'სწორია';
            } else {
                button.classList.add('wrong');
                result.className = 'result bad';
                result.textContent = 'არასწორია — სწორი პასუხი მწვანედ არის მონიშნული';
            }

            result.scrollIntoView({ behavior: 'smooth', block: 'nearest' });
        });
    });
</script>
</body>
</html>
