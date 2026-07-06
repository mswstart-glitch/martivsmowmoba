<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>{{ __('messages.materials.page_title') }}</title>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Georgian:wght@400;500;700&display=swap" rel="stylesheet">

<style>
*{margin:0;padding:0;box-sizing:border-box}

body{
font-family:'Noto Sans Georgian',sans-serif;
background:#f3f7fc;
}

.header{
background:#155FC9;
color:#fff;
padding:18px 28px;
font-size:26px;
font-weight:700;
}

.wrap{
max-width:1200px;
margin:auto;
padding:35px 20px;
}

.card{
background:#fff;
border-radius:18px;
box-shadow:0 15px 40px rgba(0,0,0,.08);
overflow:hidden;
}

.top{
padding:25px;
display:flex;
justify-content:space-between;
align-items:center;
border-bottom:1px solid #eee;
}

.btn{
background:#155FC9;
color:#fff;
padding:12px 24px;
text-decoration:none;
border-radius:8px;
font-weight:600;
transition:.2s;
}

.btn:hover{
background:#0B4DA8;
}

iframe{
width:100%;
height:85vh;
border:0;
display:block;
}
</style>
</head>

<body>

<div class="header">
📘 {{ __('messages.materials.header') }}
</div>

<div class="wrap">

<div class="card">

<div class="top">

<div>
<h2>{{ __('messages.materials.book_title') }}</h2>
<p>{{ __('messages.materials.book_desc') }}</p>
</div>

<a
class="btn"
href="{{ asset('autoschool-material.pdf') }}"
download>
{{ __('messages.materials.download') }}
</a>

</div>

<iframe
src="{{ asset('autoschool-material.pdf') }}">
</iframe>

</div>

</div>

</body>
</html>
