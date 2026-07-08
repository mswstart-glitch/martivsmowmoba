<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>{{ $post->title }} — DriveLab</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Noto+Serif+Georgian:wght@700;800&family=Noto+Sans+Georgian:wght@400;500;600&display=swap">
<style>
*{margin:0;padding:0;box-sizing:border-box}
body{font-family:'Noto Sans Georgian',sans-serif;background:#F2F6FB;color:#0B1E3D;}
.header{background:#155FC9;color:#fff;padding:18px 28px;display:flex;align-items:center;justify-content:space-between;}
.header a{color:#fff;text-decoration:none;font-weight:600;font-size:14px;}
.wrap{max-width:760px;margin:auto;padding:44px 20px 90px;}
.card{background:#fff;border-radius:18px;overflow:hidden;box-shadow:0 15px 40px rgba(11,30,61,.08);}
.card img{width:100%;max-height:360px;object-fit:cover;}
.card-body{padding:34px clamp(20px,4vw,48px) 44px;}
.date{font-size:11.5px;font-weight:700;letter-spacing:.5px;color:#0B3E86;margin-bottom:12px;display:block;}
h1{font-family:'Noto Serif Georgian',serif;font-weight:800;font-size:clamp(24px,3.4vw,32px);line-height:1.25;margin-bottom:18px;}
.content{font-size:15px;line-height:1.85;color:#33425F;white-space:pre-line;}
.back{display:inline-block;margin-top:30px;color:#155FC9;text-decoration:none;font-weight:600;font-size:14px;}
</style>
</head>
<body>
    <div class="header">
        <a href="{{ url('/') }}">← DriveLab.ge</a>
        <a href="{{ route('news.index') }}">{{ __('messages.news.title') }}</a>
    </div>

    <div class="wrap">
        <div class="card">
            @if($post->image)
                <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}">
            @endif
            <div class="card-body">
                <span class="date">{{ $post->published_at?->format('d.m.Y') }}</span>
                <h1>{{ $post->title }}</h1>
                <div class="content">{{ $post->content }}</div>
            </div>
        </div>
        <a href="{{ route('news.index') }}" class="back">← All news</a>
    </div>
</body>
</html>
