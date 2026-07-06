@props([
    'eyebrow' => null,
    'title'   => null,
    'desc'    => null,
    'stats'   => null,
])

@php
    $eyebrow = $eyebrow ?? __('messages.trust.eyebrow');
    $title = $title ?? __('messages.trust.title');
    $desc = $desc ?? __('messages.trust.desc');
@endphp

@once
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Noto+Serif+Georgian:wght@600;700;800&family=Noto+Sans+Georgian:wght@400;500;600&family=Space+Mono:wght@700&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tabler-icons/2.47.0/iconfont/tabler-icons.min.css">
@endonce

@php
    $stats = $stats ?? __('messages.trust.stats');
    $flow = __('messages.trust.flow');
@endphp

<section class="ast-trust">
    <div class="ast-trust__head">
        <span class="ast-trust__eyebrow">{{ $eyebrow }}</span>
        <h2 class="ast-trust__title">{{ $title }}</h2>
        <p class="ast-trust__desc">{{ $desc }}</p>
    </div>

    <div class="ast-trust__stats">
        @foreach ($stats as $stat)
            <div class="ast-trust__stat @if($stat['type'] === 'feature') is-feature @endif">
                @if($stat['type'] === 'stat')
                    <span class="ast-trust__stat-value">{{ $stat['value'] }}</span>
                    <span class="ast-trust__stat-label">{{ $stat['label'] }}</span>
                @else
                    <span class="ast-trust__stat-icon">
                        <i class="ti {{ $stat['icon'] }}" aria-hidden="true"></i>
                    </span>
                    <span class="ast-trust__stat-label ast-trust__stat-label--feature">{{ $stat['label'] }}</span>
                @endif
            </div>
        @endforeach
    </div>

    <div class="ast-trust__flow">
        @foreach ($flow as $step)
            <div class="ast-trust__flow-chip">
                <i class="ti {{ $step['icon'] }}" aria-hidden="true"></i>
                <span>{{ $step['label'] }}</span>
            </div>

            @if (!$loop->last)
                <i class="ti ti-arrow-right ast-trust__flow-arrow" aria-hidden="true"></i>
            @endif
        @endforeach
    </div>

    <div class="ast-trust__cta-wrap">
        <a href="#pricing" class="ast-trust__cta">
            {{ __('messages.trust.cta') }}
            <i class="ti ti-arrow-right" aria-hidden="true"></i>
        </a>
    </div>
</section>

<style>
.ast-trust{
    --ink:#0B1E3D; --ink-soft:#46587A; --paper:#FFFFFF; --paper-tint:#F2F6FB;
    --blue:#155FC9; --blue-deep:#0B3E86; --blue-light:#5FA8F5;
    --chrome:#D7DEE8; --chrome-deep:#A9B6C8;
    position:relative;
    background:var(--paper);
    padding:34px clamp(20px,4vw,56px) 76px;
    font-family:'Noto Sans Georgian',sans-serif;
    color:var(--ink);
    text-align:center;
}
.ast-trust *{box-sizing:border-box;}

.ast-trust__head{max-width:620px; margin:0 auto 44px;}
.ast-trust__eyebrow{display:inline-block; font-family:'Space Mono',monospace; font-size:11px; font-weight:700; letter-spacing:2px; color:var(--blue-deep); background:var(--paper-tint); border:1px solid rgba(21,95,201,0.25); border-radius:999px; padding:7px 14px; margin-bottom:18px;}
.ast-trust__title{font-family:'Noto Serif Georgian',serif; font-weight:800; font-size:clamp(28px,3.6vw,38px); line-height:1.18; margin:0 0 16px; color:var(--ink);}
.ast-trust__desc{font-size:14.5px; line-height:1.75; color:var(--ink-soft); margin:0;}

.ast-trust__stats{display:grid; grid-template-columns:repeat(4,1fr); gap:16px; max-width:850px; margin:0 auto 48px;}
.ast-trust__stat{background:var(--paper-tint); border:1px solid var(--chrome); border-radius:16px; padding:22px 12px; transition:transform .3s ease, box-shadow .3s ease, border-color .3s ease;}
.ast-trust__stat:hover{transform:translateY(-4px); border-color:var(--blue-light); box-shadow:0 16px 32px -18px rgba(21,95,201,0.3);}
.ast-trust__stat-value{display:block; font-family:'Space Mono',monospace; font-weight:700; font-size:clamp(22px,3vw,30px); color:var(--blue-deep); margin-bottom:6px;}
.ast-trust__stat-label{display:block; font-size:11.5px; color:var(--ink-soft); line-height:1.4;}
.ast-trust__stat.is-feature{display:flex; flex-direction:column; align-items:center; justify-content:center;}
.ast-trust__stat-icon{width:40px; height:40px; border-radius:12px; background:linear-gradient(155deg,var(--blue-light),var(--blue-deep)); display:flex; align-items:center; justify-content:center; color:#fff; font-size:20px; margin-bottom:10px; box-shadow:0 8px 16px -8px rgba(21,95,201,0.5);}
.ast-trust__stat-label--feature{font-size:13px; font-weight:600; color:var(--ink);}

.ast-trust__flow{display:flex; align-items:center; justify-content:center; flex-wrap:wrap; gap:12px; margin-bottom:44px;}
.ast-trust__flow-chip{display:flex; align-items:center; gap:9px; background:#fff; border:1px solid var(--chrome); border-radius:999px; padding:10px 18px; font-size:13px; font-weight:500; color:var(--ink);}
.ast-trust__flow-chip i{color:var(--blue); font-size:17px;}
.ast-trust__flow-arrow{color:var(--chrome-deep); font-size:16px;}

.ast-trust__cta{display:inline-flex; align-items:center; gap:8px; text-decoration:none; font-family:'Space Mono',monospace; font-weight:700; font-size:13.5px; letter-spacing:.5px; color:#fff; background:linear-gradient(135deg,var(--blue-light),var(--blue-deep)); border-radius:10px; padding:15px 28px; box-shadow:0 14px 28px -12px rgba(11,62,134,0.6); transition:transform .25s ease, box-shadow .25s ease;}
.ast-trust__cta:hover{transform:translateY(-2px); box-shadow:0 18px 34px -12px rgba(11,62,134,0.7);}

@media (max-width:700px){
    .ast-trust__stats{grid-template-columns:repeat(2,1fr); max-width:360px;}
}
@media (max-width:480px){
    .ast-trust__flow-chip span{display:none;}
    .ast-trust__flow-chip{padding:10px;}
}
@media (prefers-reduced-motion: reduce){
    .ast-trust__stat, .ast-trust__cta{transition:none;}
}
</style>
