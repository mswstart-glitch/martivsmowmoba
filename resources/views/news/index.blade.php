<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>{{ __('messages.news.title') }} — DriveLab</title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Noto+Serif+Georgian:wght@700;800&family=Noto+Sans+Georgian:wght@400;500;600&display=swap">
<style>
*{margin:0;padding:0;box-sizing:border-box}
body{font-family:'Noto Sans Georgian',sans-serif;background:#F2F6FB;color:#0B1E3D;}
.header{background:#155FC9;color:#fff;padding:18px 28px;display:flex;align-items:center;justify-content:space-between;}
.header a{color:#fff;text-decoration:none;font-weight:600;font-size:14px;}
.header span{font-size:22px;font-weight:700;font-family:'Noto Serif Georgian',serif;}
.wrap{max-width:1080px;margin:auto;padding:40px 20px 80px;}
.grid{display:grid;grid-template-columns:repeat(3,1fr);gap:22px;}
.card{background:#fff;border-radius:16px;overflow:hidden;box-shadow:0 15px 40px rgba(11,30,61,.08);text-decoration:none;color:inherit;display:flex;flex-direction:column;transition:transform .25s ease;}
.card:hover{transform:translateY(-4px);}
.card img{width:100%;height:160px;object-fit:cover;background:#EAF0F8;}
.card-body{padding:18px 20px 22px;flex:1;display:flex;flex-direction:column;}
.date{font-size:11px;font-weight:700;letter-spacing:.5px;color:#0B3E86;margin-bottom:8px;}
.title{font-family:'Noto Serif Georgian',serif;font-weight:700;font-size:17px;line-height:1.35;margin-bottom:10px;}
.desc{font-size:13.5px;line-height:1.6;color:#46587A;flex:1;}
.empty{text-align:center;padding:80px 20px;color:#46587A;}
.pagination{margin-top:36px;}
@media(max-width:820px){.grid{grid-template-columns:1fr 1fr;}}
@media(max-width:560px){.grid{grid-template-columns:1fr;}}
</style>
</head>
<body>
    <div class="header">
        <a href="{{ url('/') }}">← DriveLab.ge</a>
        <span>{{ __('messages.news.title') }}</span>
        <span></span>
    </div>

    <div class="wrap">
        @if($posts->isEmpty())
            <div class="empty">No news posts yet.</div>
        @else
            <div class="grid">
                @foreach($posts as $post)
                    <a href="{{ route('news.show', $post->slug) }}" class="card">
                        @if($post->image)
                            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}">
                        @endif
                        <div class="card-body">
                            <span class="date">{{ $post->published_at?->format('d.m.Y') }}</span>
                            <div class="title">{{ $post->title }}</div>
                            <div class="desc">{{ $post->short_description }}</div>
                        </div>
                    </a>
                @endforeach
            </div>
            <div class="pagination">{{ $posts->links() }}</div>
        @endif
    </div>
</body>
</html>
