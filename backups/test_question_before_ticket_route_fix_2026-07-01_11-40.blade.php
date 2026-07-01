<!DOCTYPE html>
<html lang="ka">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>სატესტო კითხვა</title>
<style>
body{font-family:Arial,sans-serif;background:#f3f7fc;margin:0;padding:30px}
.card{max-width:780px;margin:auto;background:#fff;border-radius:18px;padding:28px;box-shadow:0 20px 50px rgba(0,0,0,.08)}
.badge{color:#155FC9;font-weight:700;margin-bottom:12px}
h1{font-size:22px;line-height:1.5}
.question-image{width:100%;max-height:360px;object-fit:contain;background:#f2f6fb;border-radius:14px;margin:18px 0}
.answer{display:block;padding:14px 16px;border:1px solid #dbe5f2;border-radius:12px;margin:10px 0;cursor:pointer}
.answer input{margin-right:8px}
.answer.is-correct{background:#e9f8ef;border-color:#2fbf71}
.answer.is-wrong{background:#fff0f0;border-color:#dc3545}
.explain{display:none;margin-top:22px;background:#f2f6fb;padding:18px;border-radius:14px;line-height:1.6}
.actions{display:flex;gap:12px;flex-wrap:wrap;margin-top:20px}
.btn{border:0;background:#155FC9;color:white;padding:12px 18px;border-radius:10px;text-decoration:none;cursor:pointer;font-weight:700}
.btn.secondary{background:#eef2fb;color:#155FC9}
</style>
</head>
<body>
<div class="card" data-correct="{{ $question->correct_answer }}">
<div class="badge">ბილეთი №{{ $question->ticket_number }}</div>
<h1>{{ $question->question }}</h1>

@if($question->image_path)
<img class="question-image" src="{{ asset($question->image_path) }}" alt="">
@endif

<div id="answers">
@foreach($question->answers as $answer)
<label class="answer" data-option="{{ $answer->option_number }}">
<input type="radio" name="answer" value="{{ $answer->option_number }}">
<strong>{{ $answer->option_number }}.</strong> {{ $answer->answer }}
</label>
@endforeach
</div>

@if($question->explanation)
<div class="explain" id="explain">
<strong>განმარტება:</strong><br>
{{ $question->explanation }}
</div>
@endif

<div class="actions">
<button class="btn" type="button" onclick="checkAnswer()">შემოწმება</button>
<a class="btn secondary" href="{{ route('test.question') }}">შემდეგი კითხვა</a>
</div>
</div>

<script>
function checkAnswer(){
    const card = document.querySelector('.card');
    const correct = String(card.dataset.correct);
    const selected = document.querySelector('input[name="answer"]:checked');

    if(!selected){
        alert('ჯერ აირჩიე პასუხი');
        return;
    }

    document.querySelectorAll('.answer').forEach(el => {
        const option = String(el.dataset.option);
        el.classList.remove('is-correct','is-wrong');

        if(option === correct){
            el.classList.add('is-correct');
        }

        if(option === selected.value && selected.value !== correct){
            el.classList.add('is-wrong');
        }
    });

    const explain = document.getElementById('explain');
    if(explain) explain.style.display = 'block';
}
</script>
</body>
</html>
