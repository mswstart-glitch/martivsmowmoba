<!DOCTYPE html>
<html lang="ka">
<head>
    <meta charset="UTF-8">
    <title>ავტოსკოლის ტესტი</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body style="font-family:Arial;padding:30px;background:#f3f6fb;">

<h1>მართვის მოწმობის ტესტი</h1>

@foreach($questions as $question)
    <div style="background:white;padding:20px;margin:20px 0;border-radius:16px;">
        <b>ბილეთი #{{ $question->ticket_no }}</b>
        <h2>{{ $question->question }}</h2>

        @foreach($question->answers as $answer)
            <button
                onclick="checkAnswer(this)"
                data-correct="{{ $answer->is_correct ? 1 : 0 }}"
                data-explanation="{{ e($question->explanation) }}"
                style="display:block;width:100%;margin:8px 0;padding:14px;border-radius:10px;border:1px solid #ddd;text-align:left;"
            >
                {{ $answer->answer }}
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
        alert(btn.dataset.explanation || 'პასუხი არასწორია. ყურადღება მიაქციე წესს და სცადე თავიდან.');
    }
}
</script>

</body>
</html>
