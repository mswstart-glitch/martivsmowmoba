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

@if(isset($challenge))
<div id="ast-challenge-bar" style="background:white;padding:16px 20px;margin:0 0 20px;border-radius:16px;display:flex;flex-wrap:wrap;align-items:center;gap:14px;justify-content:space-between;">
    <div>
        <strong>{{ __('messages.challenge.code_label') }}:</strong> {{ $challenge->code }}
        &nbsp;·&nbsp;
        <span id="ast-challenge-progress">0 / {{ $questions->count() }}</span> {{ __('messages.challenge.progress_label') }}
    </div>
    <div style="display:flex;align-items:center;gap:8px;flex-wrap:wrap;">
        <span style="color:#46587A;font-size:13px;">{{ __('messages.challenge.share_hint') }}</span>
        <input id="ast-challenge-link" type="text" readonly value="{{ route('challenge.show', $challenge->code) }}" style="padding:8px;border-radius:8px;border:1px solid #ddd;min-width:220px;">
        <button type="button" onclick="copyChallengeLink(this)" style="padding:8px 14px;border-radius:8px;border:none;background:#155FC9;color:#fff;cursor:pointer;">{{ __('messages.challenge.copy_link') }}</button>
    </div>
</div>

<div id="ast-challenge-result" style="display:none;background:white;padding:20px;margin:0 0 20px;border-radius:16px;"></div>
@endif

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

    if (typeof trackChallengeAnswer === 'function') {
        trackChallengeAnswer(btn);
    }
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

@if(isset($challenge))
// --- Challenge mode: additive only, never touches the functions above. ---
const CHALLENGE_TOTAL = @json($questions->count());
const CHALLENGE_RESULT_URL = @json(route('challenge.result', $challenge->code));
const CHALLENGE_RESULTS_URL = @json(route('challenge.results', $challenge->code));
const CHALLENGE_TEXT = {
    waiting: {!! \Illuminate\Support\Js::from(__('messages.challenge.waiting_for_friend')) !!},
    yourResult: {!! \Illuminate\Support\Js::from(__('messages.challenge.your_result')) !!},
    you: {!! \Illuminate\Support\Js::from(__('messages.challenge.you')) !!},
    friend: {!! \Illuminate\Support\Js::from(__('messages.challenge.friend')) !!},
    winnerYou: {!! \Illuminate\Support\Js::from(__('messages.challenge.winner_you')) !!},
    winnerOpponent: {!! \Illuminate\Support\Js::from(__('messages.challenge.winner_opponent')) !!},
    draw: {!! \Illuminate\Support\Js::from(__('messages.challenge.draw')) !!},
    seconds: {!! \Illuminate\Support\Js::from(__('messages.challenge.seconds_suffix')) !!},
    linkCopied: {!! \Illuminate\Support\Js::from(__('messages.challenge.link_copied')) !!},
    copyLink: {!! \Illuminate\Support\Js::from(__('messages.challenge.copy_link')) !!},
    viewFullResults: {!! \Illuminate\Support\Js::from(__('messages.challenge.view_full_results')) !!},
};

const challengeAnsweredQuestions = {};
const challengeStartedAt = performance.now();
let challengePollTimer = null;

function trackChallengeAnswer(btn) {
    const qid = btn.dataset.questionId;
    const wasAnswered = Object.prototype.hasOwnProperty.call(challengeAnsweredQuestions, qid);
    challengeAnsweredQuestions[qid] = btn.dataset.correct === '1';

    const answeredCount = Object.keys(challengeAnsweredQuestions).length;
    const progressEl = document.getElementById('ast-challenge-progress');
    if (progressEl) progressEl.textContent = answeredCount + ' / ' + CHALLENGE_TOTAL;

    if (!wasAnswered && answeredCount === CHALLENGE_TOTAL) {
        finishChallenge();
    }
}

function finishChallenge() {
    const correct = Object.values(challengeAnsweredQuestions).filter(Boolean).length;
    const timeSeconds = Math.max(0, Math.round((performance.now() - challengeStartedAt) / 1000));
    const csrfMeta = document.querySelector('meta[name="csrf-token"]');

    fetch(CHALLENGE_RESULT_URL, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'Accept': 'application/json',
            'X-CSRF-TOKEN': csrfMeta ? csrfMeta.content : '',
        },
        body: JSON.stringify({
            correct_count: correct,
            total_questions: CHALLENGE_TOTAL,
            time_seconds: timeSeconds,
        }),
    })
        .then(function (r) { return r.json(); })
        .then(renderChallengeStatus)
        .catch(function () {});
}

function renderChallengeStatus(data) {
    const box = document.getElementById('ast-challenge-result');
    if (!box) return;
    box.style.display = 'block';

    const resultsLink = '<p><a href="' + CHALLENGE_RESULTS_URL + '">' + CHALLENGE_TEXT.viewFullResults + '</a></p>';

    if (!data.opponent) {
        box.innerHTML =
            '<p>' + CHALLENGE_TEXT.waiting + '</p>' +
            '<p>' + CHALLENGE_TEXT.yourResult + ': ' + data.me.correct_count + '/' + data.me.total_questions +
            ' — ' + data.me.time_seconds + ' ' + CHALLENGE_TEXT.seconds + '</p>' +
            resultsLink;
        startChallengePolling();
        return;
    }

    stopChallengePolling();

    const winnerLabel = data.winner === 'me'
        ? CHALLENGE_TEXT.winnerYou
        : (data.winner === 'opponent' ? CHALLENGE_TEXT.winnerOpponent : CHALLENGE_TEXT.draw);

    box.innerHTML =
        '<h3>' + winnerLabel + '</h3>' +
        '<p>' + CHALLENGE_TEXT.you + ': ' + data.me.correct_count + '/' + data.me.total_questions +
        ' — ' + data.me.time_seconds + ' ' + CHALLENGE_TEXT.seconds + '</p>' +
        '<p>' + CHALLENGE_TEXT.friend + ': ' + data.opponent.correct_count + '/' + data.opponent.total_questions +
        ' — ' + data.opponent.time_seconds + ' ' + CHALLENGE_TEXT.seconds + '</p>' +
        resultsLink;
}

function startChallengePolling() {
    if (challengePollTimer) return;
    challengePollTimer = setInterval(function () {
        fetch(CHALLENGE_RESULTS_URL, { headers: { 'Accept': 'application/json' } })
            .then(function (r) { return r.json(); })
            .then(function (data) {
                if (data.opponent) {
                    renderChallengeStatus(data);
                }
            })
            .catch(function () {});
    }, 5000);
}

function stopChallengePolling() {
    if (challengePollTimer) {
        clearInterval(challengePollTimer);
        challengePollTimer = null;
    }
}

function copyChallengeLink(btn) {
    const input = document.getElementById('ast-challenge-link');
    if (!input) return;
    input.select();
    input.setSelectionRange(0, 99999);

    const markCopied = function () {
        if (btn) btn.textContent = CHALLENGE_TEXT.linkCopied;
        if (btn) setTimeout(function () { btn.textContent = CHALLENGE_TEXT.copyLink; }, 2000);
    };

    if (navigator.clipboard && navigator.clipboard.writeText) {
        navigator.clipboard.writeText(input.value).then(markCopied).catch(function () {
            document.execCommand('copy');
            markCopied();
        });
    } else {
        document.execCommand('copy');
        markCopied();
    }
}
@endif
</script>

</body>
</html>
