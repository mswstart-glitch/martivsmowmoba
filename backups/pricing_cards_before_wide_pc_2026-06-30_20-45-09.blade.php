@props([
    'eyebrow' => 'კურსის პაკეტები',
    'title' => 'აირჩიე შენი გზა საჭესთან',
    'packages' => null,
])

@php
    $packages = $packages ?? [
        [
            'name' => 'სტანდარტი',
            'icon' => 'ti-steering-wheel',
            'price' => '650',
            'period' => 'სრული კურსი',
            'desc' => 'საბაზისო პროგრამა მათთვის, ვინც თავდაჯერებულად იწყებს გზას.',
            'features' => ['30 თეორიული გაკვეთილი', '15 პრაქტიკული საათი', 'მობილური აპლიკაცია', 'საგამოცდო ბილეთები'],
            'featured' => false,
        ],
        [
            'name' => 'პრემიუმი',
            'icon' => 'ti-steering-wheel',
            'price' => '950',
            'period' => 'სრული კურსი',
            'desc' => 'ყველაზე არჩეული პაკეტი — მეტი პრაქტიკა და სრული გამოცდის სიმულაცია.',
            'features' => ['30 თეორიული გაკვეთილი', '25 პრაქტიკული საათი', 'რეალური გამოცდის სიმულატორი', 'პერსონალური ინსტრუქტორი', 'უფასო დამატებითი საათი'],
            'featured' => true,
        ],
        [
            'name' => 'VIP',
            'icon' => 'ti-crown',
            'price' => '1500',
            'period' => 'სრული კურსი',
            'desc' => 'ინდივიდუალური გრაფიკი და გამოცდის ჩაბარების გარანტია.',
            'features' => ['ინდივიდუალური განრიგი', '40 პრაქტიკული საათი', 'პირადი ინსტრუქტორი', 'გამოცდამდე free re-test', 'VIP მხარდაჭერა 24/7'],
            'featured' => false,
        ],
    ];
@endphp

<section class="ast-pricing" id="packages">
    <div class="ast-pricing__perforation" aria-hidden="true"></div>

    <div class="ast-pricing__head">
        <span class="ast-pricing__eyebrow">{{ $eyebrow }}</span>
        <h2 class="ast-pricing__title">{{ $title }}</h2>
    </div>

    <div class="ast-pricing__grid">
        @foreach ($packages as $pkg)
            <div class="ast-pricing__card @if(!empty($pkg['featured'])) is-featured @endif">
                @if(!empty($pkg['featured']))
                    <span class="ast-pricing__badge">ყველაზე პოპულარული</span>
                @endif

                <div class="ast-pricing__card-shine"></div>
                <div class="ast-pricing__icon"><i class="ti {{ $pkg['icon'] }}" aria-hidden="true"></i></div>

                <h3 class="ast-pricing__name">{{ $pkg['name'] }}</h3>
                <p class="ast-pricing__desc">{{ $pkg['desc'] }}</p>

                <div class="ast-pricing__price">
                    <span class="ast-pricing__amount">{{ $pkg['price'] }}</span>
                    <span class="ast-pricing__currency">₾</span>
                    <span class="ast-pricing__period">/ {{ $pkg['period'] }}</span>
                </div>

                <ul class="ast-pricing__features">
                    @foreach ($pkg['features'] as $feature)
                        <li><i class="ti ti-check" aria-hidden="true"></i>{{ $feature }}</li>
                    @endforeach
                </ul>

                <a href="/autoschool/exam" class="ast-pricing__cta @if(!empty($pkg['featured'])) is-primary @endif">
                    არჩევა <i class="ti ti-arrow-right" aria-hidden="true"></i>
                </a>
            </div>
        @endforeach
    </div>
</section>

<style>
.ast-pricing{
    --ink:#0B1E3D; --ink-soft:#46587A; --paper:#FFFFFF; --paper-tint:#F2F6FB;
    --blue:#155FC9; --blue-deep:#0B3E86; --blue-light:#5FA8F5;
    --chrome:#D7DEE8;
    position:relative;
    background:var(--paper);
    padding:64px clamp(20px,4vw,56px) 80px;
    font-family:'Noto Sans Georgian',sans-serif;
    color:var(--ink);
}
.ast-pricing *{box-sizing:border-box}
.ast-pricing__perforation{height:1px;margin:0 0 56px;background-image:radial-gradient(circle,rgba(21,95,201,.35) 1.5px,transparent 1.5px);background-size:14px 1px;background-repeat:repeat-x}
.ast-pricing__head{text-align:center;max-width:560px;margin:0 auto 44px}
.ast-pricing__eyebrow{display:inline-block;font-family:'Space Mono';font-size:11px;font-weight:700;letter-spacing:2px;color:var(--blue-deep);background:var(--paper-tint);border:1px solid rgba(21,95,201,.25);border-radius:2px;padding:5px 12px;margin-bottom:18px}
.ast-pricing__title{font-family:'Noto Serif Georgian';font-weight:800;font-size:clamp(28px,3.6vw,38px);line-height:1.15;margin:0;color:var(--ink)}
.ast-pricing__grid{display:grid;grid-template-columns:repeat(3,1fr);gap:24px;max-width:1080px;margin:0 auto;align-items:start}
.ast-pricing__card{position:relative;overflow:hidden;background:#fff;border:1px solid var(--chrome);border-radius:16px;padding:32px 26px;transition:transform .3s ease,box-shadow .3s ease,border-color .3s ease}
.ast-pricing__card:hover{transform:translateY(-6px);box-shadow:0 24px 48px -20px rgba(11,30,61,.22);border-color:var(--blue-light)}
.ast-pricing__card.is-featured{border:1px solid var(--blue);background:linear-gradient(180deg,#fff,#F7FAFE);box-shadow:0 26px 54px -22px rgba(21,95,201,.28);transform:translateY(-10px)}
.ast-pricing__card.is-featured:hover{transform:translateY(-16px)}
.ast-pricing__card-shine{position:absolute;top:-60%;left:-70%;width:50%;height:220%;background:linear-gradient(75deg,transparent,rgba(95,168,245,.16),transparent);transform:rotate(20deg);pointer-events:none;opacity:0;transition:opacity .3s ease}
.ast-pricing__card:hover .ast-pricing__card-shine{opacity:1;animation:astPricingSweep 1.1s ease-in-out}
.ast-pricing__badge{position:absolute;top:18px;right:18px;font-family:'Space Mono';font-size:9.5px;font-weight:700;letter-spacing:.5px;color:#fff;background:linear-gradient(135deg,var(--blue-light),var(--blue-deep));border-radius:20px;padding:5px 12px}
.ast-pricing__icon{width:48px;height:48px;border-radius:10px;background:linear-gradient(155deg,var(--blue-light),var(--blue-deep));display:flex;align-items:center;justify-content:center;color:#fff;font-size:24px;margin-bottom:18px;box-shadow:0 8px 16px -8px rgba(21,95,201,.5)}
.ast-pricing__name{font-family:'Noto Serif Georgian';font-weight:700;font-size:20px;margin:0 0 8px;color:var(--ink)}
.ast-pricing__desc{font-size:13.5px;line-height:1.6;color:var(--ink-soft);margin:0 0 22px;min-height:42px}
.ast-pricing__price{display:flex;align-items:baseline;gap:4px;margin-bottom:22px;padding-bottom:22px;border-bottom:1px solid var(--paper-tint)}
.ast-pricing__amount{font-family:'Space Mono';font-weight:700;font-size:34px;color:var(--blue-deep)}
.ast-pricing__currency{font-family:'Space Mono';font-weight:700;font-size:18px;color:var(--blue-deep)}
.ast-pricing__period{font-size:12px;color:var(--ink-soft);margin-left:4px}
.ast-pricing__features{list-style:none;margin:0 0 26px;padding:0;display:flex;flex-direction:column;gap:11px}
.ast-pricing__features li{display:flex;align-items:center;gap:9px;font-size:13.5px;color:var(--ink-soft)}
.ast-pricing__features li i{color:var(--blue);font-size:16px;flex-shrink:0}
.ast-pricing__cta{display:flex;align-items:center;justify-content:center;gap:8px;width:100%;text-decoration:none;font-family:'Space Mono';font-weight:700;font-size:12.5px;letter-spacing:.5px;color:var(--ink);background:#fff;border:1px solid var(--chrome);border-radius:6px;padding:13px 18px;transition:border-color .25s ease,background .25s ease}
.ast-pricing__cta:hover{border-color:var(--blue)}
.ast-pricing__cta.is-primary{color:#fff;background:linear-gradient(135deg,var(--blue-light),var(--blue-deep));border:none;box-shadow:0 10px 22px -10px rgba(11,62,134,.65)}
.ast-pricing__cta.is-primary:hover{transform:translateY(-1px)}
@keyframes astPricingSweep{0%{transform:translateX(-40%) rotate(20deg)}100%{transform:translateX(220%) rotate(20deg)}}
@media(max-width:900px){
    .ast-pricing__grid{grid-template-columns:1fr;max-width:420px}
    .ast-pricing__card.is-featured{transform:translateY(0)}
    .ast-pricing__card.is-featured:hover{transform:translateY(-6px)}
}
</style>
