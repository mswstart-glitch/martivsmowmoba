@props([
    'eyebrow' => null,
    'title' => null,
    'desc' => null,
    'newsItems' => null,
])

@php
    $eyebrow = $eyebrow ?? __('messages.news.eyebrow');
    $title = $title ?? __('messages.news.title');
    $desc = $desc ?? __('messages.news.desc');
    $items = $newsItems ?? __('messages.news.items');
    $isDynamic = $newsItems !== null;
@endphp

<section class="ast-news" id="news">
    <div class="ast-news__aurora ast-news__aurora--a" aria-hidden="true"></div>
    <div class="ast-news__aurora ast-news__aurora--b" aria-hidden="true"></div>

    <div class="ast-news__inner">
        <div class="ast-news__head">
            <span class="ast-news__eyebrow">{{ $eyebrow }}</span>
            <h2 class="ast-news__title">{{ $title }}</h2>
            <p class="ast-news__desc">{{ $desc }}</p>
        </div>

        <div class="ast-news__grid">
            <a href="{{ $isDynamic ? route('news.show', $items[0]['slug']) : route('exam.index') }}" class="ast-news__card ast-news__card--feature">
                <span class="ast-news__tag ast-news__tag--new"><i class="ti ti-sparkles" aria-hidden="true"></i> {{ __('messages.news.new_badge') }}</span>
                <div class="ast-news__icon ast-news__icon--feature"><i class="ti ti-category-2" aria-hidden="true"></i></div>
                <span class="ast-news__date">{{ $items[0]['date'] }}</span>
                <h3 class="ast-news__card-title">{{ $items[0]['title'] }}</h3>
                <p class="ast-news__card-text">{{ $items[0]['text'] }}</p>
                <span class="ast-news__link">{{ $isDynamic ? __('messages.news.read_more') : __('messages.news.open_practice') }} <i class="ti ti-arrow-right" aria-hidden="true"></i></span>
            </a>

            <div class="ast-news__side">
                <a href="{{ $isDynamic ? route('news.show', $items[1]['slug']) : '#tickets' }}" class="ast-news__card">
                    <div class="ast-news__icon"><i class="ti ti-refresh" aria-hidden="true"></i></div>
                    <div class="ast-news__card-body">
                        <span class="ast-news__date">{{ $items[1]['date'] }}</span>
                        <h3 class="ast-news__card-title">{{ $items[1]['title'] }}</h3>
                        <p class="ast-news__card-text">{{ $items[1]['text'] }}</p>
                    </div>
                </a>

                <a href="{{ $isDynamic ? route('news.show', $items[2]['slug']) : route('booking') }}" class="ast-news__card">
                    <div class="ast-news__icon ast-news__icon--accent"><i class="ti ti-discount-2" aria-hidden="true"></i></div>
                    <div class="ast-news__card-body">
                        <span class="ast-news__date">{{ $items[2]['date'] }}</span>
                        <h3 class="ast-news__card-title">{{ $items[2]['title'] }}</h3>
                        <p class="ast-news__card-text">{{ $items[2]['text'] }}</p>
                    </div>
                </a>
            </div>
        </div>

        @if($isDynamic)
            <div class="ast-news__viewall">
                <a href="{{ route('news.index') }}">{{ __('messages.news.title') }} <i class="ti ti-arrow-right" aria-hidden="true"></i></a>
            </div>
        @endif
    </div>
</section>

<style>
.ast-news{
    --ink:#0B1E3D; --ink-soft:#46587A; --paper:#FFFFFF; --paper-tint:#F2F6FB;
    --blue:#155FC9; --blue-deep:#0B3E86; --blue-light:#5FA8F5; --chrome:#D7DEE8;
    position:relative;isolation:isolate;overflow:hidden;
    background:var(--paper);
    padding:76px clamp(20px,4vw,56px) 88px;
    font-family:'Noto Sans Georgian',sans-serif;
    color:var(--ink);
}
.ast-news *{box-sizing:border-box}
.ast-news__aurora{position:absolute;border-radius:50%;filter:blur(80px);z-index:0;pointer-events:none;opacity:.7}
.ast-news__aurora--a{width:480px;height:480px;top:-180px;left:-140px;background:radial-gradient(circle,rgba(21,95,201,.14),transparent 70%)}
.ast-news__aurora--b{width:420px;height:420px;bottom:-200px;right:-140px;background:radial-gradient(circle,rgba(95,168,245,.12),transparent 70%)}
.ast-news__inner{position:relative;z-index:1;max-width:1080px;margin:0 auto}
.ast-news__head{max-width:560px;margin:0 0 40px}
.ast-news__eyebrow{display:inline-block;font-family:'Space Mono';font-size:11px;font-weight:700;letter-spacing:2px;color:var(--blue-deep);background:var(--paper-tint);border:1px solid rgba(21,95,201,.25);border-radius:2px;padding:5px 12px;margin-bottom:18px}
.ast-news__title{font-family:'Noto Serif Georgian';font-weight:800;font-size:clamp(26px,3.4vw,36px);line-height:1.18;margin:0 0 14px;color:var(--ink)}
.ast-news__desc{font-size:14.5px;line-height:1.75;color:var(--ink-soft);margin:0}

.ast-news__grid{display:grid;grid-template-columns:1.25fr 1fr;gap:22px;align-items:stretch}
.ast-news__side{display:flex;flex-direction:column;gap:22px}

.ast-news__card{
    position:relative;display:flex;flex-direction:column;
    text-decoration:none;color:inherit;
    background:var(--paper-tint);
    border:1px solid var(--chrome);
    border-radius:18px;
    padding:26px 26px 24px;
    transition:transform .3s cubic-bezier(.2,.7,.2,1),box-shadow .3s ease,border-color .3s ease;
    overflow:hidden;
}
.ast-news__card:hover{transform:translateY(-4px);box-shadow:0 24px 48px -22px rgba(11,30,61,.28);border-color:var(--blue)}
.ast-news__side .ast-news__card{flex-direction:row;align-items:flex-start;gap:16px;flex:1}

.ast-news__card--feature{
    background:linear-gradient(165deg,#0B3E86,#155FC9 55%,#5FA8F5);
    color:#fff;border-color:transparent;justify-content:flex-end;min-height:340px;
    box-shadow:0 30px 60px -26px rgba(11,62,134,.55);
}
.ast-news__card--feature:hover{box-shadow:0 34px 70px -24px rgba(11,62,134,.65)}
.ast-news__card--feature::before{
    content:"";position:absolute;inset:0;z-index:0;
    background:radial-gradient(circle at 85% 15%,rgba(255,255,255,.22),transparent 55%);
}
.ast-news__card--feature > *{position:relative;z-index:1}
.ast-news__card--feature .ast-news__date{color:rgba(255,255,255,.75)}
.ast-news__card--feature .ast-news__card-text{color:rgba(255,255,255,.85)}

.ast-news__tag{
    position:absolute;top:22px;right:22px;display:inline-flex;align-items:center;gap:6px;
    font-family:'Space Mono';font-size:10.5px;font-weight:700;letter-spacing:.5px;
    background:rgba(255,255,255,.16);border:1px solid rgba(255,255,255,.35);
    color:#fff;border-radius:999px;padding:6px 12px;backdrop-filter:blur(4px);
}
.ast-news__tag i{font-size:12px}

.ast-news__icon{
    width:44px;height:44px;border-radius:12px;flex-shrink:0;
    display:flex;align-items:center;justify-content:center;
    background:#fff;color:var(--blue);font-size:20px;
    box-shadow:0 8px 16px -8px rgba(21,95,201,.35);
    margin-bottom:16px;
}
.ast-news__icon--feature{
    width:56px;height:56px;font-size:26px;
    background:rgba(255,255,255,.16);color:#fff;border:1px solid rgba(255,255,255,.3);
    box-shadow:none;margin-bottom:auto;
}
.ast-news__icon--accent{background:linear-gradient(155deg,var(--blue-light),var(--blue-deep));color:#fff}
.ast-news__side .ast-news__card .ast-news__icon{margin-bottom:0}

.ast-news__card-body{flex:1;min-width:0}
.ast-news__date{display:block;font-family:'Space Mono';font-size:10.5px;font-weight:700;letter-spacing:.5px;color:var(--blue-deep);margin-bottom:8px}
.ast-news__card-title{font-family:'Noto Serif Georgian';font-weight:700;font-size:16.5px;line-height:1.32;margin:0 0 8px;color:inherit}
.ast-news__card--feature .ast-news__card-title{font-size:clamp(20px,2.4vw,25px);margin-top:20px}
.ast-news__card-text{font-size:13px;line-height:1.65;color:var(--ink-soft);margin:0}
.ast-news__link{
    display:inline-flex;align-items:center;gap:7px;margin-top:18px;
    font-family:'Space Mono';font-size:12px;font-weight:700;letter-spacing:.3px;color:#fff;
}
.ast-news__link i{font-size:14px;transition:transform .25s ease}
.ast-news__card--feature:hover .ast-news__link i{transform:translateX(4px)}

@media(max-width:820px){
    .ast-news__grid{grid-template-columns:1fr}
    .ast-news__card--feature{min-height:280px}
}
@media(max-width:520px){
    .ast-news__side .ast-news__card{flex-direction:column}
    .ast-news__tag{position:static;align-self:flex-start;margin-bottom:14px}
}
.ast-news__viewall{text-align:center;margin-top:32px}
.ast-news__viewall a{display:inline-flex;align-items:center;gap:8px;text-decoration:none;font-family:'Space Mono';font-size:13px;font-weight:700;color:var(--blue-deep);border:1px solid var(--chrome);border-radius:999px;padding:11px 22px;transition:border-color .2s ease,background .2s ease}
.ast-news__viewall a:hover{border-color:var(--blue);background:var(--paper-tint)}
</style>
