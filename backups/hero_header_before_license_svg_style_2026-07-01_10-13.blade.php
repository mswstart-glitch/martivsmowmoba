@props([
    'brand' => 'ავტოსკოლა სტარტი',
    'eyebrow' => 'EST. 2012 · LICENSE ACADEMY',
    'title' => 'საჭე შენშია',
    'subtitle' => 'თეორიული და პრაქტიკული პროგრამა 2012 წლიდან. ივარჯიშე Web, iOS და Android აპლიკაციებში — რეალური საგამოცდო ბილეთებითა და სიმულაციით.',
    'years' => '13 წელი გამოცდილება',
])

@once
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Noto+Serif+Georgian:wght@600;700;800&family=Noto+Sans+Georgian:wght@400;500;600&family=Space+Mono:wght@700&display=swap">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tabler-icons/2.47.0/iconfont/tabler-icons.min.css">
@endonce

<section class="ast-hero">
    <div class="ast-hero__aurora ast-hero__aurora--a" aria-hidden="true"></div>
    <div class="ast-hero__aurora ast-hero__aurora--b" aria-hidden="true"></div>

    <span class="ast-hero__particle" style="top:18%;left:6%;animation-delay:0s;" aria-hidden="true"></span>
    <span class="ast-hero__particle" style="top:62%;left:12%;animation-delay:1.4s;" aria-hidden="true"></span>
    <span class="ast-hero__particle" style="top:30%;left:48%;animation-delay:2.6s;" aria-hidden="true"></span>
    <span class="ast-hero__particle" style="top:78%;left:58%;animation-delay:0.8s;" aria-hidden="true"></span>

    <svg class="ast-hero__route" viewBox="0 0 1440 600" preserveAspectRatio="none" aria-hidden="true">
        <path d="M -50 480 C 250 380, 450 560, 760 420 S 1250 220, 1500 260"
              fill="none" stroke="url(#ast-route-grad)" stroke-width="1.5" stroke-dasharray="6 10"/>
        <defs>
            <linearGradient id="ast-route-grad" x1="0" y1="0" x2="1" y2="0">
                <stop offset="0%" stop-color="#155FC9" stop-opacity="0"/>
                <stop offset="20%" stop-color="#155FC9" stop-opacity="0.45"/>
                <stop offset="80%" stop-color="#155FC9" stop-opacity="0.45"/>
                <stop offset="100%" stop-color="#155FC9" stop-opacity="0"/>
            </linearGradient>
        </defs>
    </svg>

    <input type="checkbox" id="ast-nav-toggle" class="ast-hero__nav-toggle-input">

    <header class="ast-hero__bar">
        <a href="/autoschool" class="ast-hero__logo">
            <span class="ast-hero__logo-mark"><i class="ti ti-steering-wheel" aria-hidden="true"></i></span>
            <span class="ast-hero__logo-word">{{ $brand }}</span>
        </a>

        <label for="ast-nav-toggle" class="ast-hero__burger" aria-label="მენიუ">
            <i class="ti ti-menu-2" aria-hidden="true"></i>
        </label>

        <nav class="ast-hero__nav">
            <a href="/autoschool" class="is-active">მთავარი</a>
            <a href="#tickets">ბილეთები</a>
            <a href="/autoschool/exam">გამოცდა</a>
            <a href="#info">ინფორმაცია</a>
            <a href="#contact">კონტაქტი</a>
        </nav>

        <a href="/autoschool/exam" class="ast-hero__cta-ghost">დაჯავშნა</a>
    </header>

    <div class="ast-hero__body">
        <div class="ast-hero__copy">
            <span class="ast-hero__eyebrow">{{ $eyebrow }}</span>
            <h1 class="ast-hero__title">{!! str_replace(' ', '<br>', $title) !!}</h1>
            <p class="ast-hero__subtitle">{{ $subtitle }}</p>

            <div class="ast-hero__actions">
                <a href="/autoschool/exam" class="ast-hero__store-btn">
                    <i class="ti ti-brand-google-play" aria-hidden="true"></i>
                    <span><small>დაწყება</small>Google Play</span>
                </a>
                <a href="#tickets" class="ast-hero__store-btn">
                    <i class="ti ti-brand-apple" aria-hidden="true"></i>
                    <span><small>ნახვა</small>App Store</span>
                
                <a href="{{ route('booking') }}" class="hero-register-btn">
                    <i class="ti ti-user-plus"></i>
                    დარეგისტრირდი
                </a>
</a>
            </div>
        </div>

        <div class="ast-hero__roadside" aria-hidden="true">
            <div class="ast-hero__semaphore">
                <span class="ast-hero__light ast-hero__light--red"></span>
                <span class="ast-hero__light ast-hero__light--yellow"></span>
                <span class="ast-hero__light ast-hero__light--green"></span>
            </div>
            <div class="ast-hero__pole"></div>
            <div class="ast-hero__pole-base"></div>
        </div>

        <div class="ast-hero__card-wrap">
            <div class="ast-hero__card" id="astCard">
                <div class="ast-hero__card-shine"></div>
                <div class="ast-hero__card-top">
                    <span>PLATINUM MEMBER LICENSE</span>
                    <span class="ast-hero__card-cat">CAT B1</span>
                </div>
                <div class="ast-hero__card-mid">
                    <div class="ast-hero__card-photo"><i class="ti ti-steering-wheel" aria-hidden="true"></i></div>
                    <div class="ast-hero__card-lines">
                        <i style="width:88%"></i>
                        <i style="width:64%"></i>
                        <i style="width:46%"></i>
                    </div>
                </div>
                <div class="ast-hero__card-bottom">
                    <span>AVTOSCHOOL START</span>
                    <span>№ 0001 2012</span>
                </div>
            </div>
            <div class="ast-hero__seal">
                <span>START<br>2012</span>
            </div>
            <div class="ast-hero__stat">{{ $years }}</div>
        </div>
    </div>

    <div class="ast-hero__perforation" aria-hidden="true"></div>

    <div class="ast-hero__categories" id="tickets">
        @foreach ([
            ['code'=>'AM','label'=>'მოპედი'],
            ['code'=>'A, A1','label'=>'მოტოციკლი'],
            ['code'=>'B, B1','label'=>'მსუბუქი ავტო','featured'=>true],
            ['code'=>'C','label'=>'სატვირთო'],
            ['code'=>'C1','label'=>'მსუბ. სატვირთო'],
            ['code'=>'D','label'=>'ავტობუსი'],
            ['code'=>'D1','label'=>'მიკროავტობუსი'],
            ['code'=>'T, S','label'=>'ტრაქტორი'],
            ['code'=>'TRAM','label'=>'ტრამვაი'],
            ['code'=>'MIL','label'=>'სამხედრო'],
        ] as $cat)
            <div class="ast-hero__plate @if(!empty($cat['featured'])) is-featured @endif">

                @switch($cat['code'])
                    @case('AM')
                        <x-license-icon :type="$cat['code']" />
                        @break
                    @case('A, A1')
                        <x-license-icon :type="$cat['code']" />
                        @break
                    @case('B, B1')
                        <x-license-icon :type="$cat['code']" />
                        @break
                    @case('C')
                        <x-license-icon :type="$cat['code']" />
                        @break
                    @case('C1')
                        <x-license-icon :type="$cat['code']" />
                        @break
                    @case('D')
                        <x-license-icon :type="$cat['code']" />
                        @break
                    @case('D1')
                        <x-license-icon :type="$cat['code']" />
                        @break
                    @case('T, S')
                        <x-license-icon :type="$cat['code']" />
                        @break
                    @case('TRAM')
                        <x-license-icon :type="$cat['code']" />
                        @break
                    @case('MIL')
                        <x-license-icon :type="$cat['code']" />
                        @break
                @endswitch

                <span class="ast-hero__plate-code">{{ $cat['code'] }}</span>
                <span class="ast-hero__plate-label">{{ $cat['label'] }}</span>

            </div>
        @endforeach
    </div>
</section>

<style>
body{margin:0;background:#fff}
.ast-hero{
    --ink:#0B1E3D;--ink-soft:#46587A;--paper:#FFFFFF;--paper-tint:#F2F6FB;
    --blue:#155FC9;--blue-deep:#0B3E86;--blue-light:#5FA8F5;--chrome:#D7DEE8;--chrome-deep:#A9B6C8;
    position:relative;isolation:isolate;overflow:hidden;background:var(--paper);font-family:'Noto Sans Georgian',sans-serif;color:var(--ink)
}
.ast-hero *{box-sizing:border-box}
.ast-hero__aurora{position:absolute;border-radius:50%;filter:blur(70px);z-index:0;pointer-events:none}
.ast-hero__aurora--a{width:560px;height:560px;top:-220px;right:-160px;background:radial-gradient(circle,rgba(21,95,201,.16),transparent 70%)}
.ast-hero__aurora--b{width:420px;height:420px;bottom:-200px;left:-120px;background:radial-gradient(circle,rgba(95,168,245,.14),transparent 70%)}
.ast-hero__particle{position:absolute;width:5px;height:5px;border-radius:50%;background:var(--blue-light);opacity:.5;z-index:0;animation:astFloat 6s ease-in-out infinite}
.ast-hero__route{position:absolute;inset:0;width:100%;height:100%;z-index:0;opacity:.9;pointer-events:none}
.ast-hero__nav-toggle-input{display:none}
.ast-hero__bar{position:relative;z-index:2;display:flex;align-items:center;justify-content:space-between;gap:18px;padding:20px clamp(20px,4vw,56px);border-bottom:1px solid rgba(21,95,201,.14);background:rgba(255,255,255,.7);backdrop-filter:blur(10px)}
.ast-hero__logo{display:flex;align-items:center;gap:12px;text-decoration:none;color:inherit}
.ast-hero__logo-mark{width:38px;height:38px;border-radius:50%;background:linear-gradient(155deg,var(--blue-light),var(--blue-deep));display:flex;align-items:center;justify-content:center;color:#fff;font-size:19px;box-shadow:0 6px 16px -6px rgba(21,95,201,.5)}
.ast-hero__logo-word{font-family:'Noto Serif Georgian';font-weight:700;font-size:18px;letter-spacing:.2px;color:var(--ink)}
.ast-hero__nav{display:flex;gap:30px;font-size:14px;font-weight:500}
.ast-hero__nav a{color:var(--ink-soft);text-decoration:none;position:relative;padding-bottom:4px;transition:color .25s ease}
.ast-hero__nav a::after{content:'';position:absolute;left:0;right:100%;bottom:0;height:2px;background:linear-gradient(90deg,var(--blue),var(--blue-light));border-radius:2px;transition:right .3s cubic-bezier(.4,0,.2,1)}
.ast-hero__nav a:hover{color:var(--ink)}
.ast-hero__nav a:hover::after{right:0}
.ast-hero__nav a.is-active{color:var(--blue)}
.ast-hero__nav a.is-active::after{right:0}
.ast-hero__cta-ghost{font-family:'Space Mono';font-size:12px;font-weight:700;letter-spacing:.5px;color:#fff;background:linear-gradient(135deg,var(--blue-light),var(--blue-deep));border-radius:3px;padding:10px 20px;text-decoration:none;box-shadow:0 10px 22px -10px rgba(11,62,134,.65);transition:transform .25s ease,box-shadow .25s ease}
.ast-hero__cta-ghost:hover{transform:translateY(-1px);box-shadow:0 14px 26px -10px rgba(11,62,134,.75)}
.ast-hero__burger{display:none;color:var(--blue);font-size:22px;cursor:pointer}
.ast-hero__body{position:relative;z-index:2;display:grid;grid-template-columns:1fr 70px 1fr;gap:24px;align-items:center;padding:clamp(36px,6vw,76px) clamp(20px,4vw,56px) clamp(32px,5vw,60px)}
.ast-hero__roadside{display:flex;flex-direction:column;align-items:center;justify-self:center;animation:astRise 1s .3s cubic-bezier(.2,.7,.2,1) both}
.ast-hero__copy{animation:astRise .8s cubic-bezier(.2,.7,.2,1) both}
.ast-hero__semaphore{width:38px;height:68px;border-radius:9px;background:linear-gradient(155deg,#1B2C4A,#0B1726);border:1px solid var(--chrome);box-shadow:0 10px 20px -10px rgba(11,30,61,.45),inset 0 0 0 1px rgba(255,255,255,.04);display:flex;flex-direction:column;align-items:center;justify-content:center;gap:6px}
.ast-hero__light{width:12px;height:12px;border-radius:50%;background:rgba(255,255,255,.08)}
.ast-hero__light--red{animation:astLightRed 7s ease-in-out infinite}
.ast-hero__light--yellow{animation:astLightYellow 7s ease-in-out infinite}
.ast-hero__light--green{animation:astLightGreen 7s ease-in-out infinite}
.ast-hero__pole{width:3px;height:120px;background:linear-gradient(180deg,var(--chrome-deep),var(--chrome))}
.ast-hero__pole-base{width:30px;height:8px;border-radius:50%;background:rgba(11,30,61,.18);filter:blur(2px);margin-top:-3px}
.ast-hero__eyebrow{display:inline-block;font-family:'Space Mono';font-size:11px;font-weight:700;letter-spacing:2px;color:var(--blue-deep);background:var(--paper-tint);border:1px solid rgba(21,95,201,.25);border-radius:2px;padding:5px 12px;margin-bottom:22px}
.ast-hero__title{font-family:'Noto Serif Georgian';font-weight:800;font-size:clamp(40px,5.6vw,64px);line-height:1.04;margin:0 0 20px;background:linear-gradient(100deg,var(--ink) 25%,var(--blue) 50%,var(--ink) 75%);background-size:220% 100%;-webkit-background-clip:text;background-clip:text;color:transparent;animation:astShine 7s linear infinite}
.ast-hero__subtitle{font-size:15.5px;line-height:1.75;color:var(--ink-soft);max-width:460px;margin:0 0 32px}
.ast-hero__actions{display:flex;gap:14px;flex-wrap:wrap}
.ast-hero__store-btn{display:flex;align-items:center;gap:10px;text-decoration:none;color:var(--ink);background:#fff;border:1px solid var(--chrome);border-radius:6px;padding:10px 18px;font-size:13.5px;font-weight:500;box-shadow:0 4px 14px -8px rgba(11,30,61,.18);transition:border-color .25s ease,transform .25s ease}
.ast-hero__store-btn i{font-size:21px;color:var(--blue)}
.ast-hero__store-btn small{display:block;font-size:10px;color:var(--ink-soft);font-weight:400}
.ast-hero__store-btn:hover{border-color:var(--blue);transform:translateY(-2px)}
.ast-hero__card-wrap{display:flex;flex-direction:column;align-items:center;gap:18px;perspective:900px;animation:astRise .9s .15s cubic-bezier(.2,.7,.2,1) both}
.ast-hero__card{position:relative;width:270px;background:linear-gradient(155deg,#FFFFFF,#EAF0F8);border:1px solid var(--chrome);border-radius:14px;padding:20px;box-shadow:0 30px 60px -24px rgba(11,30,61,.28),inset 0 0 0 1px rgba(255,255,255,.6);transform:rotate(-4deg);transition:transform .4s ease;overflow:hidden}
.ast-hero__card-shine{position:absolute;top:-50%;left:-60%;width:60%;height:200%;background:linear-gradient(75deg,transparent,rgba(95,168,245,.35),transparent);transform:rotate(20deg);animation:astSweep 4.5s ease-in-out infinite}
.ast-hero__card-top{display:flex;justify-content:space-between;align-items:flex-start;font-family:'Space Mono';font-size:9.5px;letter-spacing:1px;color:var(--blue-deep);margin-bottom:16px}
.ast-hero__card-cat{border:1px solid var(--blue);border-radius:3px;padding:2px 6px;color:var(--blue-deep)}
.ast-hero__card-mid{display:flex;gap:14px;align-items:center;margin-bottom:18px}
.ast-hero__card-photo{width:56px;height:56px;border-radius:8px;background:linear-gradient(155deg,var(--blue-light),var(--blue-deep));display:flex;align-items:center;justify-content:center;color:#fff;font-size:28px;flex-shrink:0;box-shadow:0 8px 16px -8px rgba(21,95,201,.5)}
.ast-hero__card-lines{flex:1;display:flex;flex-direction:column;gap:7px}
.ast-hero__card-lines i{display:block;height:6px;border-radius:2px;background:rgba(11,30,61,.12);font-style:normal}
.ast-hero__card-bottom{display:flex;justify-content:space-between;font-family:'Space Mono';font-size:9px;color:var(--ink-soft);border-top:1px solid var(--chrome);padding-top:12px}
.ast-hero__seal{position:relative;margin-top:-86px;margin-left:182px;width:64px;height:64px;border-radius:50%;border:1.5px solid var(--blue);background:#fff;display:flex;align-items:center;justify-content:center;transform:rotate(12deg);box-shadow:0 10px 20px -8px rgba(11,30,61,.3)}
.ast-hero__seal span{font-family:'Space Mono';font-size:8.5px;font-weight:700;color:var(--blue-deep);text-align:center;line-height:1.3}
.ast-hero__stat{font-family:'Space Mono';font-size:12px;font-weight:700;color:var(--blue-deep);background:var(--paper-tint);border:1px solid rgba(21,95,201,.3);border-radius:3px;padding:8px 16px}
.ast-hero__perforation{position:relative;z-index:2;height:1px;margin:0 clamp(20px,4vw,56px);background-image:radial-gradient(circle,rgba(21,95,201,.35) 1.5px,transparent 1.5px);background-size:14px 1px;background-repeat:repeat-x}
.ast-hero__categories{position:relative;z-index:2;display:flex;gap:10px;overflow-x:auto;padding:24px clamp(20px,4vw,56px) 30px;background:var(--paper-tint);scrollbar-width:thin}
.ast-hero__plate{flex:0 0 auto;min-width:84px;text-align:center;border:1px solid var(--chrome);border-radius:6px;padding:10px 14px;background:#fff;transition:border-color .25s ease,transform .25s ease,box-shadow .25s ease}
.ast-hero__plate:hover{border-color:var(--blue);transform:translateY(-3px);box-shadow:0 10px 18px -10px rgba(21,95,201,.35)}
.ast-hero__plate.is-featured{border-color:var(--blue);background:linear-gradient(155deg,rgba(21,95,201,.10),rgba(95,168,245,.04))}
.ast-hero__emoji{
display:block;
font-size:24px;
line-height:1;
margin-bottom:8px;
}


.ast-license-icon{
    width:26px;
    height:26px;
    display:block;
    margin:0 auto 8px;
    color:#155FC9;
}

.ast-license-icon svg{
    width:100%;
    height:100%;
    stroke:currentColor;
    fill:none;
    stroke-width:1.9;
    stroke-linecap:round;
    stroke-linejoin:round;
}

.ast-hero__plate-code{display:block;font-family:'Space Mono';font-weight:700;font-size:13px;color:var(--blue-deep)}
.ast-hero__plate-label{display:block;font-size:10px;color:var(--ink-soft);margin-top:4px}
@keyframes astRise{from{opacity:0;transform:translateY(18px)}to{opacity:1;transform:translateY(0)}}
@keyframes astShine{0%{background-position:0% 0}100%{background-position:-220% 0}}
@keyframes astSweep{0%,100%{transform:translateX(-30%) rotate(20deg)}50%{transform:translateX(180%) rotate(20deg)}}
@keyframes astFloat{0%,100%{transform:translateY(0)}50%{transform:translateY(-16px)}}
@keyframes astLightRed{0%,33%{background:#E5483F;box-shadow:0 0 10px 2px rgba(229,72,63,.75)}33.01%,100%{background:rgba(255,255,255,.08);box-shadow:none}}
@keyframes astLightYellow{0%,24.9%{background:rgba(255,255,255,.08);box-shadow:none}25%,33%{background:#F2B72E;box-shadow:0 0 10px 2px rgba(242,183,46,.75)}33.01%,82.9%{background:rgba(255,255,255,.08);box-shadow:none}83%,100%{background:#F2B72E;box-shadow:0 0 10px 2px rgba(242,183,46,.75)}}
@keyframes astLightGreen{0%,33%{background:rgba(255,255,255,.08);box-shadow:none}33.01%,83%{background:#3FBF6E;box-shadow:0 0 10px 2px rgba(63,191,110,.75)}83.01%,100%{background:rgba(255,255,255,.08);box-shadow:none}}
@media(max-width:920px){.ast-hero__body{grid-template-columns:1fr}.ast-hero__roadside{order:1}.ast-hero__card-wrap{order:2}.ast-hero__pole{height:50px}.ast-hero__seal{margin-left:182px}}
@media(max-width:720px){.ast-hero__nav{position:absolute;top:100%;left:0;right:0;flex-direction:column;gap:0;background:#fff;border-bottom:1px solid var(--chrome);max-height:0;overflow:hidden;transition:max-height .3s ease}.ast-hero__nav a{padding:14px clamp(20px,4vw,56px);border-bottom:1px solid var(--paper-tint)}.ast-hero__burger{display:block}#ast-nav-toggle:checked ~ .ast-hero__bar .ast-hero__nav{max-height:300px}}


.hero-register-btn{
    display:inline-flex;
    align-items:center;
    gap:10px;
    padding:16px 28px;
    border-radius:14px;
    background:#fff;
    color:#0B3E86;
    border:1px solid rgba(255,255,255,.25);
    text-decoration:none;
    font-weight:700;
    transition:.3s;
    backdrop-filter:blur(12px);
    box-shadow:0 15px 40px rgba(0,0,0,.15);
}

.hero-register-btn:hover{
    transform:translateY(-3px);
    background:#F2F6FB;
}


@media (max-width:720px){
    .ast-hero__plate{
        min-width:142px !important;
        height:102px !important;
    }

    

    .ast-hero__plate-code{
        font-size:18px !important;
    }
}



/* ---------- Category Strip ---------- */

.ast-hero__categories{
display:flex;
gap:10px;
overflow-x:auto;
padding:20px;
scrollbar-width:none;
}

.ast-hero__categories::-webkit-scrollbar{
display:none;
}

.ast-hero__plate{
flex:0 0 auto;
min-width:90px;
text-align:center;
border:1px solid #D7DEE8;
border-radius:8px;
padding:16px 12px;
background:#fff;
transition:.25s;
}

.ast-hero__plate:hover{
border-color:#155FC9;
transform:translateY(-2px);
}

.ast-hero__plate.is-featured{
border-color:#155FC9;
background:linear-gradient(
155deg,
rgba(21,95,201,.10),
rgba(95,168,245,.04)
);
}

.ast-hero__plate i{
display:block;
font-size:26px;
color:#155FC9;
margin-bottom:8px;
}

.ast-hero__plate-code{
display:block;
font-weight:700;
font-size:13px;
color:#0B3E86;
}

.ast-hero__plate-label{
display:block;
font-size:10px;
color:#46587A;
margin-top:4px;
}

</style>

<script>
(function(){
    var card = document.getElementById('astCard');
    if(!card || window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;
    var wrap = card.parentElement;
    wrap.addEventListener('mousemove', function(e){
        var r = wrap.getBoundingClientRect();
        var x = (e.clientX - r.left) / r.width - 0.5;
        var y = (e.clientY - r.top) / r.height - 0.5;
        card.style.transform = 'rotate(-4deg) rotateX(' + (y * -10) + 'deg) rotateY(' + (x * 14) + 'deg)';
    });
    wrap.addEventListener('mouseleave', function(){
        card.style.transform = 'rotate(-4deg)';
    });
})();
</script>

<style id="ast-final-polish-v1">
.ast-hero__body{
    grid-template-columns: .95fr 120px .95fr !important;
    gap: 34px !important;
    min-height: 620px !important;
}

.ast-hero__title{
    font-size: clamp(38px, 4.8vw, 58px) !important;
    line-height: 1.02 !important;
    letter-spacing: -1.4px !important;
}

.ast-hero__subtitle{
    max-width: 540px !important;
    font-size: 17px !important;
}

.ast-hero__roadside{
    transform: translate(28px, 80px) !important;
    align-self: center !important;
}

.ast-hero__semaphore{
    width: 44px !important;
    height: 80px !important;
}

.ast-hero__pole{
    height: 150px !important;
}

.ast-hero__card-wrap{
    transform: translateY(24px) !important;
}

.ast-hero__card{
    width: 310px !important;
}

.ast-hero__stat{
    margin-top: 6px !important;
}

.ast-hero__actions{
    margin-top: 8px !important;
}

@media(max-width:920px){
    .ast-hero__body{
        grid-template-columns: 1fr !important;
        min-height: auto !important;
    }

    .ast-hero__roadside{
        display:none !important;
    }

    .ast-hero__title{
        font-size: clamp(38px, 10vw, 52px) !important;
    }
}


.hero-register-btn{
    display:inline-flex;
    align-items:center;
    gap:10px;
    padding:16px 28px;
    border-radius:14px;
    background:#fff;
    color:#0B3E86;
    border:1px solid rgba(255,255,255,.25);
    text-decoration:none;
    font-weight:700;
    transition:.3s;
    backdrop-filter:blur(12px);
    box-shadow:0 15px 40px rgba(0,0,0,.15);
}

.hero-register-btn:hover{
    transform:translateY(-3px);
    background:#F2F6FB;
}


@media (max-width:720px){
    .ast-hero__plate{
        min-width:142px !important;
        height:102px !important;
    }

    

    .ast-hero__plate-code{
        font-size:18px !important;
    }
}



/* ---------- Category Strip ---------- */

.ast-hero__categories{
display:flex;
gap:10px;
overflow-x:auto;
padding:20px;
scrollbar-width:none;
}

.ast-hero__categories::-webkit-scrollbar{
display:none;
}

.ast-hero__plate{
flex:0 0 auto;
min-width:90px;
text-align:center;
border:1px solid #D7DEE8;
border-radius:8px;
padding:16px 12px;
background:#fff;
transition:.25s;
}

.ast-hero__plate:hover{
border-color:#155FC9;
transform:translateY(-2px);
}

.ast-hero__plate.is-featured{
border-color:#155FC9;
background:linear-gradient(
155deg,
rgba(21,95,201,.10),
rgba(95,168,245,.04)
);
}

.ast-hero__plate i{
display:block;
font-size:26px;
color:#155FC9;
margin-bottom:8px;
}

.ast-hero__plate-code{
display:block;
font-weight:700;
font-size:13px;
color:#0B3E86;
}

.ast-hero__plate-label{
display:block;
font-size:10px;
color:#46587A;
margin-top:4px;
}

</style>

<style id="hero-compact-v2">

.ast-hero{
    padding-top:0!important;
}

.ast-hero__bar{
    padding:16px clamp(20px,4vw,56px)!important;
}

.ast-hero__body{
    padding-top:24px!important;
    padding-bottom:28px!important;
    min-height:510px!important;
    gap:34px!important;
}

.ast-hero__copy{
    margin-top:-18px!important;
}

.ast-hero__eyebrow{
    margin-bottom:16px!important;
}

.ast-hero__title{
    font-size:clamp(40px,4.8vw,58px)!important;
    line-height:.95!important;
    margin-bottom:18px!important;
}

.ast-hero__subtitle{
    font-size:17px!important;
    line-height:1.65!important;
    margin-bottom:24px!important;
}

.ast-hero__roadside{
    transform:translateY(35px)!important;
}

.ast-hero__card-wrap{
    margin-top:-10px!important;
}

.ast-hero__categories{
    padding-top:18px!important;
    padding-bottom:22px!important;
}

@media(max-width:920px){

.ast-hero__body{
    min-height:auto!important;
    padding-top:24px!important;
}

.ast-hero__roadside{
    display:none!important;
}

}



.hero-register-btn{
    display:inline-flex;
    align-items:center;
    gap:10px;
    padding:16px 28px;
    border-radius:14px;
    background:#fff;
    color:#0B3E86;
    border:1px solid rgba(255,255,255,.25);
    text-decoration:none;
    font-weight:700;
    transition:.3s;
    backdrop-filter:blur(12px);
    box-shadow:0 15px 40px rgba(0,0,0,.15);
}

.hero-register-btn:hover{
    transform:translateY(-3px);
    background:#F2F6FB;
}


@media (max-width:720px){
    .ast-hero__plate{
        min-width:142px !important;
        height:102px !important;
    }

    

    .ast-hero__plate-code{
        font-size:18px !important;
    }
}



/* ---------- Category Strip ---------- */

.ast-hero__categories{
display:flex;
gap:10px;
overflow-x:auto;
padding:20px;
scrollbar-width:none;
}

.ast-hero__categories::-webkit-scrollbar{
display:none;
}

.ast-hero__plate{
flex:0 0 auto;
min-width:90px;
text-align:center;
border:1px solid #D7DEE8;
border-radius:8px;
padding:16px 12px;
background:#fff;
transition:.25s;
}

.ast-hero__plate:hover{
border-color:#155FC9;
transform:translateY(-2px);
}

.ast-hero__plate.is-featured{
border-color:#155FC9;
background:linear-gradient(
155deg,
rgba(21,95,201,.10),
rgba(95,168,245,.04)
);
}

.ast-hero__plate i{
display:block;
font-size:26px;
color:#155FC9;
margin-bottom:8px;
}

.ast-hero__plate-code{
display:block;
font-weight:700;
font-size:13px;
color:#0B3E86;
}

.ast-hero__plate-label{
display:block;
font-size:10px;
color:#46587A;
margin-top:4px;
}

</style>

