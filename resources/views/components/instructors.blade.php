@props([
    'eyebrow' => null,
    'title' => null,
    'instructors' => null,
])

@php
    $eyebrow = $eyebrow ?? __('messages.instructors.eyebrow');
    $title = $title ?? __('messages.instructors.title');
    $instructors = $instructors ?? __('messages.instructors.list');
@endphp

<section class="ast-instructors" id="instructors">
    <div class="ast-instructors__head">
        <span class="ast-instructors__eyebrow">{{ $eyebrow }}</span>
        <h2 class="ast-instructors__title">{{ $title }}</h2>
    </div>

    <div class="ast-instructors__grid">
        @foreach ($instructors as $person)
            <div class="ast-instructors__card">
                <div class="ast-instructors__card-shine"></div>

                @if(!empty($person['photo']))
                    <img src="{{ $person['photo'] }}" class="ast-instructors__avatar ast-instructors__avatar--photo" alt="">
                @else
                    <div class="ast-instructors__avatar">{{ $person['initials'] }}</div>
                @endif

                <h3 class="ast-instructors__name">{{ $person['name'] }}</h3>
                @if(!empty($person['cats']))
                    <span class="ast-instructors__cats">{{ __('messages.instructors.category_label') }} {{ $person['cats'] }}</span>
                @endif

                @if(($person['rating'] ?? null) !== null)
                    <div class="ast-instructors__stars" aria-label="{{ __('messages.instructors.rating_aria', ['rating' => $person['rating']]) }}">
                        @for ($s = 1; $s <= 5; $s++)
                            <i class="ti {{ $s <= $person['rating'] ? 'ti-star-filled' : 'ti-star' }}" aria-hidden="true"></i>
                        @endfor
                    </div>
                @endif

                @if(!empty($person['quote']))
                    <p class="ast-instructors__quote">{{ $person['quote'] }}</p>
                @endif

                @if(!empty($person['years']) || !empty($person['students']))
                    <div class="ast-instructors__stats">
                        @if(!empty($person['years']))
                            <div class="ast-instructors__stat">
                                <span class="ast-instructors__stat-num">{{ $person['years'] }}</span>
                                <span class="ast-instructors__stat-label">{{ __('messages.instructors.years_label') }}</span>
                            </div>
                        @endif
                        @if(!empty($person['students']))
                            <div class="ast-instructors__stat">
                                <span class="ast-instructors__stat-num">{{ $person['students'] }}+</span>
                                <span class="ast-instructors__stat-label">{{ __('messages.instructors.students_label') }}</span>
                            </div>
                        @endif
                    </div>
                @endif

                @if(!empty($person['phone']) || !empty($person['social']))
                    <div class="ast-instructors__contact">
                        @if(!empty($person['phone']))
                            <a href="tel:{{ $person['phone'] }}" aria-label="Phone"><i class="ti ti-phone" aria-hidden="true"></i></a>
                        @endif
                        @if(!empty($person['social']))
                            <a href="{{ $person['social'] }}" target="_blank" rel="noopener" aria-label="Social link"><i class="ti ti-link" aria-hidden="true"></i></a>
                        @endif
                    </div>
                @endif
            </div>
        @endforeach
    </div>
</section>

<style>
.ast-instructors{
    --ink:#0B1E3D; --ink-soft:#46587A; --paper:#FFFFFF; --paper-tint:#F2F6FB;
    --blue:#155FC9; --blue-deep:#0B3E86; --blue-light:#5FA8F5;
    --chrome:#D7DEE8; --chrome-deep:#A9B6C8; --gold:#E8A93C;
    position:relative;background:var(--paper);padding:64px clamp(20px,4vw,56px) 80px;
    font-family:'Noto Sans Georgian',sans-serif;color:var(--ink);
}
.ast-instructors *{box-sizing:border-box}
.ast-instructors__head{text-align:center;max-width:560px;margin:0 auto 44px}
.ast-instructors__eyebrow{display:inline-block;font-family:'Space Mono';font-size:11px;font-weight:700;letter-spacing:2px;color:var(--blue-deep);background:var(--paper-tint);border:1px solid rgba(21,95,201,.25);border-radius:2px;padding:5px 12px;margin-bottom:18px}
.ast-instructors__title{font-family:'Noto Serif Georgian';font-weight:800;font-size:clamp(28px,3.6vw,38px);line-height:1.15;margin:0;color:var(--ink)}
.ast-instructors__grid{display:grid;grid-template-columns:repeat(4,1fr);gap:20px;max-width:1180px;margin:0 auto}
.ast-instructors__card{position:relative;overflow:hidden;text-align:center;background:#fff;border:1px solid var(--chrome);border-radius:16px;padding:28px 20px;transition:transform .3s ease,box-shadow .3s ease,border-color .3s ease}
.ast-instructors__card:hover{transform:translateY(-6px);box-shadow:0 24px 48px -22px rgba(11,30,61,.22);border-color:var(--blue-light)}
.ast-instructors__card-shine{position:absolute;top:-60%;left:-70%;width:50%;height:220%;background:linear-gradient(75deg,transparent,rgba(95,168,245,.16),transparent);transform:rotate(20deg);pointer-events:none;opacity:0;transition:opacity .3s ease}
.ast-instructors__card:hover .ast-instructors__card-shine{opacity:1;animation:astInstructorSweep 1.1s ease-in-out}
.ast-instructors__avatar{width:64px;height:64px;border-radius:50%;margin:0 auto 16px;background:linear-gradient(155deg,var(--blue-light),var(--blue-deep));display:flex;align-items:center;justify-content:center;color:#fff;font-family:'Noto Serif Georgian';font-weight:700;font-size:20px;box-shadow:0 10px 22px -10px rgba(21,95,201,.5)}
.ast-instructors__avatar--photo{object-fit:cover}
.ast-instructors__contact{display:flex;justify-content:center;gap:10px;margin-top:16px;padding-top:14px;border-top:1px solid var(--paper-tint)}
.ast-instructors__contact a{width:32px;height:32px;border-radius:50%;display:flex;align-items:center;justify-content:center;background:var(--paper-tint);color:var(--blue-deep);text-decoration:none;font-size:15px;transition:background .2s ease,color .2s ease}
.ast-instructors__contact a:hover{background:var(--blue);color:#fff}
.ast-instructors__name{font-family:'Noto Serif Georgian';font-weight:700;font-size:16.5px;margin:0 0 4px;color:var(--ink)}
.ast-instructors__cats{display:inline-block;font-family:'Space Mono';font-size:10px;font-weight:700;letter-spacing:.5px;color:var(--blue-deep);border:1px solid rgba(21,95,201,.3);border-radius:3px;padding:2px 8px;margin-bottom:14px}
.ast-instructors__stars{display:flex;justify-content:center;gap:3px;margin-bottom:14px;font-size:14px;color:var(--gold)}
.ast-instructors__stars .ti-star{color:var(--chrome-deep)}
.ast-instructors__quote{font-size:12.5px;line-height:1.6;color:var(--ink-soft);font-style:italic;min-height:58px;margin:0 0 18px}
.ast-instructors__stats{display:flex;border-top:1px solid var(--paper-tint);padding-top:16px}
.ast-instructors__stat{flex:1;display:flex;flex-direction:column;gap:2px}
.ast-instructors__stat:first-child{border-right:1px solid var(--paper-tint)}
.ast-instructors__stat-num{font-family:'Space Mono';font-weight:700;font-size:16px;color:var(--blue-deep)}
.ast-instructors__stat-label{font-size:10px;color:var(--ink-soft)}
@keyframes astInstructorSweep{0%{transform:translateX(-40%) rotate(20deg)}100%{transform:translateX(220%) rotate(20deg)}}
@media(max-width:980px){
    .ast-instructors__grid{grid-template-columns:repeat(2,1fr);max-width:560px}
}
@media(max-width:560px){
    .ast-instructors__grid{grid-template-columns:1fr;max-width:340px}
}
</style>
