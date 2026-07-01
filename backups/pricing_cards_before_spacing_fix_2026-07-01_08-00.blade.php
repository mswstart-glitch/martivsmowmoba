@props([
    'eyebrow' => 'კურსის პაკეტები',
    'title'   => 'აირჩიე შენი გზა საჭესთან',
    'packages' => null,
])

@once
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Noto+Serif+Georgian:wght@600;700;800&family=Noto+Sans+Georgian:wght@400;500;600&family=Space+Mono:wght@700&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tabler-icons/2.47.0/iconfont/tabler-icons.min.css">
@endonce

@php
    $packages = $packages ?? [
        [
            'name' => 'სტანდარტი',
            'icon' => 'ti-steering-wheel',
            'price' => '650',
            'period' => 'სრული კურსი',
            'desc' => 'საბაზისო პროგრამა მათთვის, ვინც მართვის სწავლას სწორად იწყებს.',
            'features' => [
                '30 თეორიული გაკვეთილი',
                '15 პრაქტიკული საათი',
                'საგამოცდო ბილეთები',
                'საბაზისო გამოცდის მომზადება',
            ],
            'featured' => false,
        ],
        [
            'name' => 'პრემიუმი',
            'icon' => 'ti-shield-check',
            'price' => '950',
            'period' => 'სრული კურსი',
            'desc' => 'ყველაზე არჩეული პაკეტი — მეტი პრაქტიკა და გამოცდის სრული სიმულაცია.',
            'features' => [
                '30 თეორიული გაკვეთილი',
                '25 პრაქტიკული საათი',
                'რეალური გამოცდის სიმულაცია',
                'პერსონალური ინსტრუქტორი',
                'დამატებითი პრაქტიკული საათი',
            ],
            'featured' => true,
        ],
        [
            'name' => 'VIP',
            'icon' => 'ti-crown',
            'price' => '1500',
            'period' => 'სრული კურსი',
            'desc' => 'ინდივიდუალური გრაფიკი, მეტი ყურადღება და პრემიუმ მხარდაჭერა.',
            'features' => [
                'ინდივიდუალური განრიგი',
                '40 პრაქტიკული საათი',
                'პირადი ინსტრუქტორი',
                'გამოცდამდე სრული შემოწმება',
                'VIP მხარდაჭერა',
            ],
            'featured' => false,
        ],
    ];
@endphp

<section class="ast-pricing" id="pricing">
    <div class="ast-pricing__perforation" aria-hidden="true"></div>

    <div class="ast-pricing__head">
        <span class="ast-pricing__eyebrow">{{ $eyebrow }}</span>
        <h2 class="ast-pricing__title">{{ $title }}</h2>
    </div>

    <div class="ast-pricing__grid">
        @foreach ($packages as $pkg)
            <article class="ast-pricing__card @if(!empty($pkg['featured'])) is-featured @endif">
                @if(!empty($pkg['featured']))
                    <span class="ast-pricing__badge">ყველაზე პოპულარული</span>
                @endif

                <div class="ast-pricing__card-shine" aria-hidden="true"></div>

                <div class="ast-pricing__icon">
                    <i class="ti {{ $pkg['icon'] }}" aria-hidden="true"></i>
                </div>

                <h3 class="ast-pricing__name">{{ $pkg['name'] }}</h3>
                <p class="ast-pricing__desc">{{ $pkg['desc'] }}</p>

                <div class="ast-pricing__price">
                    <span class="ast-pricing__amount">{{ $pkg['price'] }}</span>
                    <span class="ast-pricing__currency">₾</span>
                    <span class="ast-pricing__period">/ {{ $pkg['period'] }}</span>
                </div>

                <ul class="ast-pricing__features">
                    @foreach ($pkg['features'] as $feature)
                        <li>
                            <i class="ti ti-check" aria-hidden="true"></i>
                            <span>{{ $feature }}</span>
                        </li>
                    @endforeach
                </ul>

                <a href="{{ url('/booking') }}" class="ast-pricing__cta @if(!empty($pkg['featured'])) is-primary @endif">
                    არჩევა
                    <i class="ti ti-arrow-right" aria-hidden="true"></i>
                </a>
            </article>
        @endforeach
    </div>
</section>

<style>
.ast-pricing{
    --ink:#0B1E3D;
    --ink-soft:#46587A;
    --paper:#FFFFFF;
    --paper-tint:#F2F6FB;
    --blue:#155FC9;
    --blue-deep:#0B3E86;
    --blue-light:#5FA8F5;
    --chrome:#D7DEE8;
    --chrome-deep:#A9B6C8;

    position:relative;
    overflow:hidden;
    background:
        radial-gradient(circle at 18% 12%, rgba(95,168,245,.14), transparent 28%),
        linear-gradient(180deg,#FFFFFF 0%,#F7FAFE 100%);
    padding:72px clamp(20px,4vw,56px) 92px;
    font-family:'Noto Sans Georgian',sans-serif;
    color:var(--ink);
}

.ast-pricing *{
    box-sizing:border-box;
}

.ast-pricing__perforation{
    height:1px;
    max-width:1180px;
    margin:0 auto 56px;
    background-image:radial-gradient(circle, rgba(21,95,201,0.35) 1.5px, transparent 1.5px);
    background-size:14px 1px;
    background-repeat:repeat-x;
}

.ast-pricing__head{
    text-align:center;
    max-width:620px;
    margin:0 auto 46px;
}

.ast-pricing__eyebrow{
    display:inline-block;
    font-family:'Space Mono',monospace;
    font-size:11px;
    font-weight:700;
    letter-spacing:2px;
    color:var(--blue-deep);
    background:rgba(242,246,251,.9);
    border:1px solid rgba(21,95,201,0.25);
    border-radius:999px;
    padding:7px 14px;
    margin-bottom:18px;
}

.ast-pricing__title{
    font-family:'Noto Serif Georgian',serif;
    font-weight:800;
    font-size:clamp(28px,3.6vw,42px);
    line-height:1.15;
    margin:0;
    color:var(--ink);
}

.ast-pricing__grid{
    display:grid;
    grid-template-columns:repeat(3,1fr);
    gap:24px;
    max-width:1120px;
    margin:0 auto;
    align-items:start;
}

.ast-pricing__card{
    position:relative;
    overflow:hidden;
    background:rgba(255,255,255,.92);
    border:1px solid var(--chrome);
    border-radius:20px;
    padding:34px 26px 28px;
    box-shadow:0 20px 45px -32px rgba(11,30,61,.45);
    transition:transform .3s ease, box-shadow .3s ease, border-color .3s ease;
}

.ast-pricing__card:hover{
    transform:translateY(-6px);
    box-shadow:0 28px 58px -28px rgba(11,30,61,0.28);
    border-color:var(--blue-light);
}

.ast-pricing__card.is-featured{
    border-color:rgba(21,95,201,.85);
    background:linear-gradient(180deg,#FFFFFF,#F7FAFE);
    box-shadow:0 30px 68px -28px rgba(21,95,201,0.38);
    transform:translateY(-10px);
}

.ast-pricing__card.is-featured:hover{
    transform:translateY(-16px);
}

.ast-pricing__card-shine{
    position:absolute;
    top:-60%;
    left:-70%;
    width:50%;
    height:220%;
    background:linear-gradient(75deg,transparent,rgba(95,168,245,0.18),transparent);
    transform:rotate(20deg);
    pointer-events:none;
    opacity:0;
    transition:opacity .3s ease;
}

.ast-pricing__card:hover .ast-pricing__card-shine{
    opacity:1;
    animation:astPricingSweep 1.1s ease-in-out;
}

.ast-pricing__badge{
    position:absolute;
    top:18px;
    right:18px;
    font-family:'Space Mono',monospace;
    font-size:9.5px;
    font-weight:700;
    letter-spacing:.5px;
    color:#fff;
    background:linear-gradient(135deg,var(--blue-light),var(--blue-deep));
    border-radius:999px;
    padding:6px 12px;
    box-shadow:0 12px 22px -14px rgba(11,62,134,.8);
}

.ast-pricing__icon{
    width:52px;
    height:52px;
    border-radius:14px;
    background:linear-gradient(155deg,var(--blue-light),var(--blue-deep));
    display:flex;
    align-items:center;
    justify-content:center;
    color:#fff;
    font-size:25px;
    margin-bottom:20px;
    box-shadow:0 12px 22px -12px rgba(21,95,201,0.65);
}

.ast-pricing__name{
    font-family:'Noto Serif Georgian',serif;
    font-weight:700;
    font-size:21px;
    margin:0 0 9px;
    color:var(--ink);
}

.ast-pricing__desc{
    font-size:13.5px;
    line-height:1.7;
    color:var(--ink-soft);
    margin:0 0 24px;
    min-height:48px;
}

.ast-pricing__price{
    display:flex;
    align-items:baseline;
    gap:4px;
    margin-bottom:22px;
    padding-bottom:22px;
    border-bottom:1px solid var(--paper-tint);
}

.ast-pricing__amount{
    font-family:'Space Mono',monospace;
    font-weight:700;
    font-size:36px;
    color:var(--blue-deep);
    letter-spacing:-1px;
}

.ast-pricing__currency{
    font-family:'Space Mono',monospace;
    font-weight:700;
    font-size:18px;
    color:var(--blue-deep);
}

.ast-pricing__period{
    font-size:12px;
    color:var(--ink-soft);
    margin-left:4px;
}

.ast-pricing__features{
    list-style:none;
    margin:0 0 28px;
    padding:0;
    display:flex;
    flex-direction:column;
    gap:12px;
}

.ast-pricing__features li{
    display:flex;
    align-items:flex-start;
    gap:10px;
    font-size:13.5px;
    line-height:1.45;
    color:var(--ink-soft);
}

.ast-pricing__features li i{
    color:var(--blue);
    font-size:17px;
    flex-shrink:0;
    margin-top:1px;
}

.ast-pricing__cta{
    display:flex;
    align-items:center;
    justify-content:center;
    gap:8px;
    width:100%;
    text-decoration:none;
    font-family:'Space Mono',monospace;
    font-weight:700;
    font-size:12.5px;
    letter-spacing:.5px;
    color:var(--ink);
    background:#fff;
    border:1px solid var(--chrome);
    border-radius:10px;
    padding:14px 18px;
    transition:transform .25s ease, border-color .25s ease, background .25s ease;
}

.ast-pricing__cta:hover{
    border-color:var(--blue);
    transform:translateY(-1px);
}

.ast-pricing__cta.is-primary{
    color:#fff;
    background:linear-gradient(135deg,var(--blue-light),var(--blue-deep));
    border:none;
    box-shadow:0 14px 26px -14px rgba(11,62,134,0.75);
}

@keyframes astPricingSweep{
    0%{transform:translateX(-40%) rotate(20deg);}
    100%{transform:translateX(220%) rotate(20deg);}
}

@media (max-width:980px){
    .ast-pricing__grid{
        grid-template-columns:1fr;
        max-width:440px;
    }

    .ast-pricing__card.is-featured{
        transform:translateY(0);
    }

    .ast-pricing__card.is-featured:hover{
        transform:translateY(-6px);
    }

    .ast-pricing__desc{
        min-height:auto;
    }
}

@media (prefers-reduced-motion: reduce){
    .ast-pricing__card,
    .ast-pricing__cta{
        transition:none;
    }

    .ast-pricing__card-shine{
        display:none;
    }
}
</style>
