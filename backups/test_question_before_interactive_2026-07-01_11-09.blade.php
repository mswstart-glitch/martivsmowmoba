<!DOCTYPE html>
<html lang="ka">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>სატესტო კითხვა</title>
<style>
body{font-family:Arial,sans-serif;background:#f3f7fc;margin:0;padding:30px}
.card{max-width:760px;margin:auto;background:#fff;border-radius:18px;padding:28px;box-shadow:0 20px 50px rgba(0,0,0,.08)}
.badge{color:#155FC9;font-weight:700;margin-bottom:12px}
h1{font-size:22px;line-height:1.5}
.answer{padding:14px 16px;border:1px solid #dbe5f2;border-radius:12px;margin:10px 0}
.correct{background:#e9f8ef;border-color:#2fbf71}
.explain{margin-top:22px;background:#f2f6fb;padding:18px;border-radius:14px;line-height:1.6}
.btn{display:inline-block;margin-top:20px;background:#155FC9;color:white;padding:12px 18px;border-radius:10px;text-decoration:none}
</style>
</head>
<body>
<div class="card">
<div class="badge">ბილეთი №{{ $question->ticket_number }}</div>
<h1>{{ $question->question }}</h1>

@foreach($question->answers as $answer)
<div class="answer @if($answer->option_number == $question->correct_answer) correct @endif">
<strong>{{ $answer->option_number }}.</strong> {{ $answer->answer }}
</div>
@endforeach

@if($question->explanation)
<div class="explain">
<strong>განმარტება:</strong><br>
{{ $question->explanation }}
</div>
@endif

<a class="btn" href="{{ route('test.question') }}">შემდეგი კითხვა</a>
</div>
</body>
</html>
