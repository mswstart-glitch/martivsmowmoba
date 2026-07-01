@props([
    'eyebrow' => 'როგორ მუშაობს',
    'title' => 'შენი გზა მართვის მოწმობამდე',
    'steps' => null,
])

@php
    $steps = $steps ?? [
        ['icon'=>'ti-user-plus','title'=>'რეგისტრაცია','desc'=>'აირჩიე პაკეტი და დარეგისტრირდი 5 წუთში, ონლაინ ან ოფისში.'],
        ['icon'=>'ti-book-2','title'=>'თეორია','desc'=>'გაიარე საგზაო წესები აპში — ნებისმიერ დროს, ნებისმიერი მოწყობილობიდან.'],
        ['icon'=>'ti-steering-wheel','title'=>'პრაქტიკა','desc'=>'ივარჯიშე გზაზე პირად ინსტრუქტორთან ერთად, შენი გრაფიკით.'],
        ['icon'=>'ti-clipboard-check','title'=>'სიმულაცია','desc'=>'გაიარე სავარჯიშო გამოცდა, რომელიც რეალურს იდენტურია.'],
        ['icon'=>'ti-license','title'=>'მოწმობა','desc'=>'ჩააბარე გამოცდა და მიიღე შენი მართვის მოწმობა.'],
    ];
@endphp

<section class="ast-timeline" id="process">
    <div class="ast-timeline__head">
        <span class="ast-timeline__eyebrow">{{ $eyebrow }}</span>
        <h2 class="ast-timeline__title">{{ $title }}</h2>
    </div>

    <div class="ast-timeline__track">
        <svg class="ast-timeline__road" viewBox="0 0 1000 10" preserveAspectRatio="none" aria-hidden="true">
            <line x1="0" y1="5" x2="1000" y2="5" stroke="var(--chrome)" stroke-width="2"/>
            <line x1="0" y1="5" x2="1000" y2="5" stroke="var(--blue)" stroke-width="2" stroke-dasharray="10 8" class="ast-timeline__road-dash"/>
        </svg>

        @foreach ($steps as $i => $step)
            <div class="ast-timeline__step">
                <div class="ast-timeline__node">
                    <i class="ti {{ $step['icon'] }}" aria-hidden="true"></i>
                </div>
                <span class="ast-timeline__num">STEP {{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}</span>
                <h3 class="ast-timeline__step-title">{{ $step['title'] }}</h3>
                <p class="ast-timeline__step-desc">{{ $step['desc'] }}</p>
            </div>
        @endforeach
    </div>
</section>

<style>
.ast-timeline{
    --ink:#0B1E3D; --ink-soft:#46587A; --paper:#FFFFFF; --paper-tint:#F2F6FB;
    --blue:#155FC9; --blue-deep:#0B3E86; --blue-light:#5FA8F5;
    --chrome:#D7DEE8;
    position:relative;
    background:var(--paper-tint);
    padding:64px clamp(20px,4vw,56px) 76px;
    font-family:'Noto Sans Georgian',sans-serif;
    color:var(--ink);
}
.ast-timeline *{box-sizing:border-box}
.ast-timeline__head{text-align:center;max-width:560px;margin:0 auto 56px}
.ast-timeline__eyebrow{display:inline-block;font-family:'Space Mono';font-size:11px;font-weight:700;letter-spacing:2px;color:var(--blue-deep);background:#fff;border:1px solid rgba(21,95,201,.25);border-radius:2px;padding:5px 12px;margin-bottom:18px}
.ast-timeline__title{font-family:'Noto Serif Georgian';font-weight:800;font-size:clamp(28px,3.6vw,38px);line-height:1.15;margin:0;color:var(--ink)}
.ast-timeline__track{position:relative;display:grid;grid-template-columns:repeat(5,1fr);gap:18px;max-width:1140px;margin:0 auto}
.ast-timeline__road{position:absolute;top:24px;left:0;width:100%;height:10px;z-index:0}
.ast-timeline__road-dash{animation:astTimelineFlow 6s linear infinite}
.ast-timeline__step{position:relative;z-index:1;display:flex;flex-direction:column;align-items:center;text-align:center;padding:0 8px}
.ast-timeline__node{width:48px;height:48px;border-radius:50%;background:#fff;border:2px solid var(--blue);display:flex;align-items:center;justify-content:center;color:var(--blue-deep);font-size:22px;margin-bottom:16px;box-shadow:0 10px 22px -12px rgba(21,95,201,.4);transition:transform .3s ease,box-shadow .3s ease}
.ast-timeline__step:hover .ast-timeline__node{transform:translateY(-4px) scale(1.05);box-shadow:0 16px 28px -12px rgba(21,95,201,.5)}
.ast-timeline__num{font-family:'Space Mono';font-size:10px;font-weight:700;letter-spacing:1.5px;color:var(--blue);margin-bottom:8px}
.ast-timeline__step-title{font-family:'Noto Serif Georgian';font-weight:700;font-size:16px;margin:0 0 8px;color:var(--ink)}
.ast-timeline__step-desc{font-size:12.5px;line-height:1.6;color:var(--ink-soft);margin:0}
@keyframes astTimelineFlow{0%{stroke-dashoffset:0}100%{stroke-dashoffset:-72}}
@media(max-width:860px){
    .ast-timeline__track{grid-template-columns:1fr;gap:0;max-width:380px}
    .ast-timeline__road{display:none}
    .ast-timeline__step{flex-direction:row;align-items:flex-start;text-align:left;gap:18px;padding:0 0 32px;position:relative}
    .ast-timeline__step:not(:last-child)::before{content:'';position:absolute;left:23px;top:48px;bottom:0;width:2px;background:repeating-linear-gradient(180deg,var(--blue) 0 6px,transparent 6px 12px)}
    .ast-timeline__node{margin-bottom:0;flex-shrink:0}
    .ast-timeline__step:hover .ast-timeline__node{transform:none}
}
</style>
