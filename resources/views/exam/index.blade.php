<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <title>{{ __('messages.exam_demo.page_title') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body style="font-family:Arial;padding:30px;background:#f3f6fb;">

<h1>{{ __('messages.exam_demo.heading') }}</h1>

@foreach($questions as $question)
    <div data-question-id="{{ $question->id }}" style="background:white;padding:20px;margin:20px 0;border-radius:16px;">
        <b>{{ __('messages.exam_demo.ticket_prefix') }}{{ $question->ticket_no }}</b>
        <h2>{{ $question->translatedText() }}</h2>

        @foreach($question->answers as $answer)
            <button
                onclick="checkAnswer(this)"
                data-correct="{{ $answer->is_correct ? 1 : 0 }}"
                data-explanation="{{ e($question->translatedExplanation()) }}"
                data-question-id="{{ $question->id }}"
                data-answer-id="{{ $answer->id }}"
                style="display:block;width:100%;margin:8px 0;padding:14px;border-radius:10px;border:1px solid #ddd;text-align:left;"
            >
                {{ $answer->translatedText() }}
            </button>
        @endforeach
    </div>
@endforeach

<script>
function checkAnswer(btn) {
    if (btn.dataset.correct === '1') {
        btn.style.background = '#dcfce7';
        btn.style.borderColor = '#16a34a';
    } else {
        btn.style.background = '#fee2e2';
        btn.style.borderColor = '#dc2626';
        alert(btn.dataset.explanation || {!! \Illuminate\Support\Js::from(__('messages.exam_demo.default_wrong_alert')) !!});
    }

    saveAttemptAnalytics(btn);
}

// Silently records the answered question for the user's analytics dashboard.
// Any failure here (e.g. not logged in) must never interrupt the exam itself.
const analyticsQuestionStartTimes = {};

document.addEventListener('DOMContentLoaded', function () {
    document.querySelectorAll('div[data-question-id]').forEach(function (box) {
        analyticsQuestionStartTimes[box.dataset.questionId] = performance.now();
    });
});

function saveAttemptAnalytics(btn) {
    const csrfMeta = document.querySelector('meta[name="csrf-token"]');
    if (!csrfMeta) return;

    const questionId = btn.dataset.questionId;
    const now = performance.now();
    const startedAt = analyticsQuestionStartTimes[questionId] ?? now;
    const timeSpentSeconds = Math.max(0, Math.round((now - startedAt) / 1000));
    analyticsQuestionStartTimes[questionId] = now;

    fetch('{{ url('/api/attempt') }}', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
            'X-CSRF-TOKEN': csrfMeta.content,
        },
        body: JSON.stringify({
            question_id: questionId,
            answer_id: btn.dataset.answerId,
            mode: 'practice',
            time_spent_seconds: timeSpentSeconds,
        }),
    }).catch(function () {
        // Ignore network/auth errors — analytics is best-effort only.
    });
}
</script>

</body>
</html>
