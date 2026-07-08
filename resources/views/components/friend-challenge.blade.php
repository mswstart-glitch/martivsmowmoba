@props([
    'eyebrow' => null,
    'title' => null,
    'subtitle' => null,
    'desc' => null,
])

@php
    $eyebrow = $eyebrow ?? __('messages.friend_challenge.eyebrow');
    $title = $title ?? __('messages.friend_challenge.title');
    $subtitle = $subtitle ?? __('messages.friend_challenge.subtitle');
    $desc = $desc ?? __('messages.friend_challenge.desc');
    $you = __('messages.friend_challenge.you');
    $friend = __('messages.friend_challenge.friend');
    $chips = __('messages.friend_challenge.chips');
@endphp

<section class="ast-challenge" id="friend-challenge">
    <div class="ast-challenge__aurora ast-challenge__aurora--a" aria-hidden="true"></div>
    <div class="ast-challenge__aurora ast-challenge__aurora--b" aria-hidden="true"></div>

    <div class="ast-challenge__card">
        <span class="ast-challenge__eyebrow">
            <i class="ti ti-swords" aria-hidden="true"></i>{{ $eyebrow }}
        </span>

        <h2 class="ast-challenge__title">{{ $title }}</h2>
        <p class="ast-challenge__subtitle">{{ $subtitle }}</p>

        <div class="ast-challenge__battle">
            <div class="ast-challenge__player">
                <div class="ast-challenge__avatar ast-challenge__avatar--you">
                    <i class="ti ti-user" aria-hidden="true"></i>
                </div>
                <span class="ast-challenge__player-label">{{ $you }}</span>
            </div>

            <div class="ast-challenge__vs">
                <span class="ast-challenge__vs-line" aria-hidden="true"></span>
                <span class="ast-challenge__vs-badge">VS</span>
                <span class="ast-challenge__vs-line" aria-hidden="true"></span>
            </div>

            <div class="ast-challenge__player">
                <div class="ast-challenge__avatar ast-challenge__avatar--friend">
                    <i class="ti ti-user-plus" aria-hidden="true"></i>
                </div>
                <span class="ast-challenge__player-label">{{ $friend }}</span>
            </div>
        </div>

        <p class="ast-challenge__desc">{{ $desc }}</p>

        <div class="ast-challenge__chips">
            <span class="ast-challenge__chip"><i class="ti ti-list-numbers" aria-hidden="true"></i>{{ $chips['questions'] }}</span>
            <span class="ast-challenge__chip"><i class="ti ti-clock" aria-hidden="true"></i>{{ $chips['time'] }}</span>
            <span class="ast-challenge__chip"><i class="ti ti-chart-bar" aria-hidden="true"></i>{{ $chips['compare'] }}</span>
        </div>

        <form method="POST" action="{{ route('challenge.create') }}" class="ast-challenge__form">
            @csrf
            <button type="submit" class="ast-challenge__cta">
                <i class="ti ti-swords" aria-hidden="true"></i>
                {{ __('messages.friend_challenge.cta') }}
            </button>
        </form>
    </div>
</section>

<style>
.ast-challenge{
    --ink:#0B1E3D; --ink-soft:#46587A; --paper:#FFFFFF; --paper-tint:#F2F6FB;
    --blue:#155FC9; --blue-deep:#0B3E86; --blue-light:#5FA8F5;
    --violet:#7C5CFC; --violet-deep:#5B3DD6; --violet-light:#B3A2FF;
    --chrome:#D7DEE8;
    position:relative;
    overflow:hidden;
    background:
        radial-gradient(circle at 14% 18%, rgba(95,168,245,.16), transparent 30%),
        radial-gradient(circle at 88% 82%, rgba(124,92,252,.13), transparent 32%),
        linear-gradient(180deg,#FFFFFF 0%,#F7FAFE 100%);
    padding:70px clamp(20px,4vw,56px) 80px;
    font-family:'Noto Sans Georgian',sans-serif;
    color:var(--ink);
}
.ast-challenge *{box-sizing:border-box}
.ast-challenge__aurora{position:absolute;border-radius:50%;filter:blur(50px);z-index:0;pointer-events:none}
.ast-challenge__aurora--a{width:420px;height:420px;top:-160px;right:-120px;background:radial-gradient(circle,rgba(124,92,252,.16),transparent 70%)}
.ast-challenge__aurora--b{width:380px;height:380px;bottom:-180px;left:-120px;background:radial-gradient(circle,rgba(21,95,201,.14),transparent 70%)}

.ast-challenge__card{
    position:relative;
    z-index:1;
    max-width:760px;
    margin:0 auto;
    text-align:center;
    padding:clamp(32px,5vw,54px) clamp(22px,5vw,54px);
    border-radius:24px;
    background:rgba(255,255,255,.72);
    border:1px solid rgba(255,255,255,.9);
    box-shadow:0 30px 64px -30px rgba(11,30,61,.28),inset 0 1px 0 rgba(255,255,255,.9);
    backdrop-filter:blur(16px);
    -webkit-backdrop-filter:blur(16px);
}

.ast-challenge__eyebrow{display:inline-flex;align-items:center;gap:7px;font-family:'Space Mono',monospace;font-size:11px;font-weight:700;letter-spacing:2px;color:var(--blue-deep);background:linear-gradient(135deg,rgba(21,95,201,.08),rgba(124,92,252,.08));border:1px solid rgba(124,92,252,.3);border-radius:999px;padding:7px 15px;margin-bottom:20px}
.ast-challenge__eyebrow i{font-size:14px;color:var(--violet)}

.ast-challenge__title{font-family:'Noto Serif Georgian',serif;font-weight:800;font-size:clamp(26px,3.6vw,38px);line-height:1.18;margin:0 0 14px;color:var(--ink)}
.ast-challenge__subtitle{font-size:15px;line-height:1.7;color:var(--ink-soft);margin:0 auto 34px;max-width:460px}

.ast-challenge__battle{display:flex;align-items:center;justify-content:center;gap:clamp(14px,4vw,30px);margin-bottom:30px}
.ast-challenge__player{display:flex;flex-direction:column;align-items:center;gap:9px}
.ast-challenge__avatar{width:58px;height:58px;border-radius:50%;display:flex;align-items:center;justify-content:center;color:#fff;font-size:25px}
.ast-challenge__avatar--you{background:linear-gradient(155deg,var(--blue-light),var(--blue-deep));box-shadow:0 10px 22px -10px rgba(21,95,201,.55)}
.ast-challenge__avatar--friend{background:linear-gradient(155deg,var(--violet-light),var(--violet-deep));box-shadow:0 10px 22px -10px rgba(91,61,214,.55)}
.ast-challenge__player-label{font-family:'Space Mono',monospace;font-size:11px;font-weight:700;letter-spacing:1px;color:var(--ink-soft)}
.ast-challenge__vs{display:flex;align-items:center;gap:8px}
.ast-challenge__vs-line{width:24px;height:1px;background:var(--chrome)}
.ast-challenge__vs-badge{font-family:'Space Mono',monospace;font-weight:700;font-size:12px;letter-spacing:1px;color:#fff;background:linear-gradient(135deg,var(--blue),var(--violet));border-radius:999px;padding:7px 13px;box-shadow:0 10px 20px -8px rgba(91,61,214,.5)}

.ast-challenge__desc{font-size:13.5px;line-height:1.75;color:var(--ink-soft);margin:0 auto 28px;max-width:480px}

.ast-challenge__chips{display:flex;flex-wrap:wrap;align-items:center;justify-content:center;gap:10px;margin-bottom:32px}
.ast-challenge__chip{display:inline-flex;align-items:center;gap:7px;font-family:'Space Mono',monospace;font-size:11px;font-weight:700;letter-spacing:.4px;color:var(--blue-deep);background:var(--paper-tint);border:1px solid var(--chrome);border-radius:999px;padding:8px 15px}
.ast-challenge__chip i{font-size:13px;color:var(--blue)}

.ast-challenge__form{display:inline-block}
.ast-challenge__cta{display:inline-flex;align-items:center;gap:9px;text-decoration:none;font-family:'Space Mono',monospace;font-weight:700;font-size:13px;letter-spacing:.5px;color:#fff;background:linear-gradient(135deg,var(--blue-light),var(--violet-deep));border:none;border-radius:999px;padding:14px 30px;cursor:pointer;box-shadow:0 16px 32px -14px rgba(91,61,214,.55);transition:transform .25s ease,box-shadow .25s ease}
.ast-challenge__cta i{font-size:16px}
.ast-challenge__cta:hover{transform:translateY(-2px);box-shadow:0 20px 38px -14px rgba(91,61,214,.65)}

@media(max-width:560px){
    .ast-challenge__battle{gap:10px}
    .ast-challenge__vs-line{width:14px}
    .ast-challenge__avatar{width:50px;height:50px;font-size:21px}
    .ast-challenge__chips{gap:8px}
    .ast-challenge__chip{padding:7px 12px;font-size:10px}
    .ast-challenge__form{display:block}
    .ast-challenge__cta{width:100%;justify-content:center}
}
</style>
