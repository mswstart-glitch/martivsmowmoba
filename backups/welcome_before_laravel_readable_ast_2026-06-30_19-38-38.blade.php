<!DOCTYPE html>
<html lang="ka">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>ავტოსკოლა სტარტი</title>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Noto+Serif+Georgian:wght@600;700;800&family=Noto+Sans+Georgian:wght@400;500;600&family=Space+Mono:wght@700&display=swap">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tabler-icons/2.47.0/iconfont/tabler-icons.min.css">

<style>
*{box-sizing:border-box}
html{scroll-behavior:smooth}
body{
    margin:0;
    background:#0E0E10;
    color:#F7F2E7;
    font-family:'Noto Sans Georgian',sans-serif;
    overflow-x:hidden;
}
a{text-decoration:none;color:inherit}

.ast-hero{
    --ink:#0E0E10;
    --ink-2:#19181B;
    --ivory:#F7F2E7;
    --ivory-dim:#C9C3B4;
    --gold:#C9A24B;
    --gold-light:#EAD08F;
    --gold-dark:#8F6F23;
    --wine:#5C1A26;

    position:relative;
    isolation:isolate;
    overflow:hidden;
    min-height:100vh;
    background:radial-gradient(circle at 85% -10%, #241F16 0%, var(--ink) 45%), var(--ink);
}

.ast-hero *{box-sizing:border-box}

.ast-hero__grain{
    position:absolute;
    inset:0;
    width:100%;
    height:100%;
    opacity:.05;
    z-index:0;
    pointer-events:none;
}

.ast-hero__route{
    position:absolute;
    inset:0;
    width:100%;
    height:100%;
    z-index:0;
    opacity:.8;
    pointer-events:none;
}

.ast-hero__nav-toggle-input{display:none}

.ast-hero__bar{
    position:relative;
    z-index:2;
    display:flex;
    align-items:center;
    justify-content:space-between;
    gap:18px;
    padding:20px clamp(20px,4vw,56px);
    border-bottom:1px solid rgba(201,162,75,.25);
}

.ast-hero__logo{
    display:flex;
    align-items:center;
    gap:12px;
    color:inherit;
}

.ast-hero__logo-mark{
    width:38px;
    height:38px;
    border-radius:50%;
    border:1px solid var(--gold);
    display:flex;
    align-items:center;
    justify-content:center;
    color:var(--gold);
    font-size:19px;
}

.ast-hero__logo-word{
    font-family:'Noto Serif Georgian';
    font-weight:700;
    font-size:18px;
    letter-spacing:.2px;
    color:var(--ivory);
}

.ast-hero__nav{
    display:flex;
    gap:30px;
    font-size:14px;
    font-weight:500;
}

.ast-hero__nav a{
    color:var(--ivory-dim);
    position:relative;
    padding-bottom:4px;
    transition:color .25s ease;
}

.ast-hero__nav a::after{
    content:'';
    position:absolute;
    left:0;
    right:100%;
    bottom:0;
    height:1px;
    background:var(--gold);
    transition:right .3s cubic-bezier(.4,0,.2,1);
}

.ast-hero__nav a:hover{color:var(--ivory)}
.ast-hero__nav a:hover::after{right:0}
.ast-hero__nav a.is-active{color:var(--gold)}
.ast-hero__nav a.is-active::after{right:0}

.ast-hero__cta-ghost{
    font-family:'Space Mono';
    font-size:12px;
    font-weight:700;
    letter-spacing:.5px;
    color:var(--ink);
    background:linear-gradient(135deg,var(--gold-light),var(--gold));
    border-radius:2px;
    padding:10px 20px;
    box-shadow:0 6px 18px -8px rgba(201,162,75,.6);
    transition:transform .25s ease;
}

.ast-hero__cta-ghost:hover{transform:translateY(-1px)}

.ast-hero__burger{
    display:none;
    color:var(--gold);
    font-size:22px;
    cursor:pointer;
}

.ast-hero__body{
    position:relative;
    z-index:2;
    display:grid;
    grid-template-columns:1.2fr .9fr;
    gap:48px;
    align-items:center;
    padding:clamp(36px,6vw,76px) clamp(20px,4vw,56px) clamp(32px,5vw,60px);
}

.ast-hero__copy{
    animation:astRise .8s cubic-bezier(.2,.7,.2,1) both;
}

.ast-hero__eyebrow{
    display:inline-block;
    font-family:'Space Mono';
    font-size:11px;
    font-weight:700;
    letter-spacing:2px;
    color:var(--gold);
    border:1px solid rgba(201,162,75,.4);
    border-radius:2px;
    padding:5px 12px;
    margin-bottom:22px;
}

.ast-hero__title{
    font-family:'Noto Serif Georgian';
    font-weight:800;
    font-size:clamp(40px,5.6vw,64px);
    line-height:1.04;
    margin:0 0 20px;
    background:linear-gradient(100deg,var(--ivory) 30%,var(--gold-light) 50%,var(--ivory) 70%);
    background-size:220% 100%;
    -webkit-background-clip:text;
    background-clip:text;
    color:transparent;
    animation:astShine 7s linear infinite;
}

.ast-hero__subtitle{
    font-size:15.5px;
    line-height:1.75;
    color:var(--ivory-dim);
    max-width:460px;
    margin:0 0 32px;
}

.ast-hero__actions{
    display:flex;
    gap:14px;
    flex-wrap:wrap;
}

.ast-hero__store-btn{
    display:flex;
    align-items:center;
    gap:10px;
    color:var(--ivory);
    background:rgba(255,255,255,.03);
    border:1px solid rgba(201,162,75,.35);
    border-radius:6px;
    padding:10px 18px;
    font-size:13.5px;
    font-weight:500;
    transition:border-color .25s ease, background .25s ease;
}

.ast-hero__store-btn i{
    font-size:21px;
    color:var(--gold);
}

.ast-hero__store-btn small{
    display:block;
    font-size:10px;
    color:var(--ivory-dim);
    font-weight:400;
}

.ast-hero__store-btn:hover{
    border-color:var(--gold);
    background:rgba(201,162,75,.08);
}

.ast-hero__card-wrap{
    display:flex;
    flex-direction:column;
    align-items:center;
    gap:18px;
    perspective:900px;
    animation:astRise .9s .15s cubic-bezier(.2,.7,.2,1) both;
}

.ast-hero__card{
    position:relative;
    width:270px;
    background:linear-gradient(155deg,#1C1A14,#0E0D0B);
    border:1px solid rgba(201,162,75,.5);
    border-radius:14px;
    padding:20px;
    box-shadow:0 30px 60px -20px rgba(0,0,0,.6), inset 0 0 0 1px rgba(255,255,255,.02);
    transform:rotate(-4deg);
    transition:transform .4s ease;
    overflow:hidden;
}

.ast-hero__card-shine{
    position:absolute;
    top:-50%;
    left:-60%;
    width:60%;
    height:200%;
    background:linear-gradient(75deg,transparent,rgba(234,208,143,.18),transparent);
    transform:rotate(20deg);
    animation:astSweep 4.5s ease-in-out infinite;
}

.ast-hero__card-top{
    display:flex;
    justify-content:space-between;
    align-items:flex-start;
    font-family:'Space Mono';
    font-size:9.5px;
    letter-spacing:1px;
    color:var(--gold-light);
    margin-bottom:16px;
}

.ast-hero__card-cat{
    border:1px solid var(--gold);
    border-radius:3px;
    padding:2px 6px;
    color:var(--gold);
}

.ast-hero__card-mid{
    display:flex;
    gap:14px;
    align-items:center;
    margin-bottom:18px;
}

.ast-hero__card-photo{
    width:56px;
    height:56px;
    border-radius:8px;
    background:linear-gradient(155deg,var(--gold-light),var(--gold-dark));
    display:flex;
    align-items:center;
    justify-content:center;
    color:var(--ink);
    font-size:28px;
    flex-shrink:0;
}

.ast-hero__card-lines{
    flex:1;
    display:flex;
    flex-direction:column;
    gap:7px;
}

.ast-hero__card-lines i{
    display:block;
    height:6px;
    border-radius:2px;
    background:rgba(247,242,231,.18);
    font-style:normal;
}

.ast-hero__card-bottom{
    display:flex;
    justify-content:space-between;
    font-family:'Space Mono';
    font-size:9px;
    color:rgba(247,242,231,.45);
    border-top:1px solid rgba(201,162,75,.25);
    padding-top:12px;
}

.ast-hero__seal{
    position:relative;
    margin-top:-86px;
    margin-left:182px;
    width:64px;
    height:64px;
    border-radius:50%;
    border:1.5px solid var(--wine);
    background:var(--ink);
    display:flex;
    align-items:center;
    justify-content:center;
    transform:rotate(12deg);
    box-shadow:0 8px 18px -6px rgba(0,0,0,.7);
}

.ast-hero__seal span{
    font-family:'Space Mono';
    font-size:8.5px;
    font-weight:700;
    color:#D88B98;
    text-align:center;
    line-height:1.3;
}

.ast-hero__stat{
    font-family:'Space Mono';
    font-size:12px;
    font-weight:700;
    color:var(--gold-light);
    border:1px solid rgba(201,162,75,.5);
    border-radius:3px;
    padding:8px 16px;
}

.ast-hero__perforation{
    position:relative;
    z-index:2;
    height:1px;
    margin:0 clamp(20px,4vw,56px);
    background-image:radial-gradient(circle, rgba(201,162,75,.55) 1.5px, transparent 1.5px);
    background-size:14px 1px;
    background-repeat:repeat-x;
}

.ast-hero__categories{
    position:relative;
    z-index:2;
    display:flex;
    gap:10px;
    overflow-x:auto;
    padding:24px clamp(20px,4vw,56px) 30px;
    scrollbar-width:thin;
}

.ast-hero__plate{
    flex:0 0 auto;
    min-width:84px;
    text-align:center;
    border:1px solid rgba(201,162,75,.3);
    border-radius:6px;
    padding:10px 14px;
    background:rgba(255,255,255,.02);
    transition:border-color .25s ease, transform .25s ease;
}

.ast-hero__plate:hover{
    border-color:var(--gold);
    transform:translateY(-3px);
}

.ast-hero__plate.is-featured{
    border-color:var(--gold);
    background:linear-gradient(155deg,rgba(201,162,75,.16),rgba(201,162,75,.04));
}

.ast-hero__plate-code{
    display:block;
    font-family:'Space Mono';
    font-weight:700;
    font-size:13px;
    color:var(--gold-light);
}

.ast-hero__plate-label{
    display:block;
    font-size:10px;
    color:var(--ivory-dim);
    margin-top:4px;
}

@keyframes astRise{
    from{opacity:0;transform:translateY(18px)}
    to{opacity:1;transform:translateY(0)}
}

@keyframes astShine{
    0%{background-position:0% 0}
    100%{background-position:-220% 0}
}

@keyframes astSweep{
    0%,100%{transform:translateX(-30%) rotate(20deg)}
    50%{transform:translateX(180%) rotate(20deg)}
}

@media(max-width:920px){
    .ast-hero__body{grid-template-columns:1fr}
    .ast-hero__card-wrap{order:-1}
    .ast-hero__seal{margin-left:182px}
}

@media(max-width:720px){
    .ast-hero__nav{
        position:absolute;
        top:100%;
        left:0;
        right:0;
        flex-direction:column;
        gap:0;
        background:var(--ink-2);
        border-bottom:1px solid rgba(201,162,75,.25);
        max-height:0;
        overflow:hidden;
        transition:max-height .3s ease;
    }

    .ast-hero__nav a{
        padding:14px clamp(20px,4vw,56px);
        border-bottom:1px solid rgba(255,255,255,.05);
    }

    .ast-hero__burger{display:block}

    #ast-nav-toggle:checked ~ .ast-hero__bar .ast-hero__nav{
        max-height:300px;
    }
}

@media(prefers-reduced-motion:reduce){
    .ast-hero__title,
    .ast-hero__card-shine,
    .ast-hero__copy,
    .ast-hero__card-wrap{
        animation:none;
    }
}
</style>
</head>

<body>

<section class="ast-hero">

    <svg class="ast-hero__grain" aria-hidden="true">
        <filter id="ast-noise">
            <feTurbulence type="fractalNoise" baseFrequency="0.85" numOctaves="2" stitchTiles="stitch"></feTurbulence>
            <feColorMatrix type="saturate" values="0"></feColorMatrix>
        </filter>
        <rect width="100%" height="100%" filter="url(#ast-noise)"></rect>
    </svg>

    <svg class="ast-hero__route" viewBox="0 0 1440 600" preserveAspectRatio="none" aria-hidden="true">
        <path d="M -50 480 C 250 380, 450 560, 760 420 S 1250 220, 1500 260"
              fill="none" stroke="url(#ast-route-grad)" stroke-width="1.5" stroke-dasharray="6 10"/>
        <defs>
            <linearGradient id="ast-route-grad" x1="0" y1="0" x2="1" y2="0">
                <stop offset="0%" stop-color="#C9A24B" stop-opacity="0"/>
                <stop offset="20%" stop-color="#C9A24B" stop-opacity="0.55"/>
                <stop offset="80%" stop-color="#C9A24B" stop-opacity="0.55"/>
                <stop offset="100%" stop-color="#C9A24B" stop-opacity="0"/>
            </linearGradient>
        </defs>
    </svg>

    <input type="checkbox" id="ast-nav-toggle" class="ast-hero__nav-toggle-input">

    <header class="ast-hero__bar">
        <a href="/autoschool" class="ast-hero__logo">
            <span class="ast-hero__logo-mark"><i class="ti ti-steering-wheel" aria-hidden="true"></i></span>
            <span class="ast-hero__logo-word">ავტოსკოლა სტარტი</span>
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
            <span class="ast-hero__eyebrow">EST. 2012 · LICENSE ACADEMY</span>
            <h1 class="ast-hero__title">საჭე<br>შენშია</h1>
            <p class="ast-hero__subtitle">
                თეორიული და პრაქტიკული პროგრამა 2012 წლიდან. ივარჯიშე Web, iOS და Android აპლიკაციებში — რეალური საგამოცდო ბილეთებითა და სიმულაციით.
            </p>

            <div class="ast-hero__actions">
                <a href="/autoschool/exam" class="ast-hero__store-btn">
                    <i class="ti ti-license" aria-hidden="true"></i>
                    <span><small>დაწყება</small>ტესტი</span>
                </a>
                <a href="#tickets" class="ast-hero__store-btn">
                    <i class="ti ti-road" aria-hidden="true"></i>
                    <span><small>ნახვა</small>კურსები</span>
                </a>
            </div>
        </div>

        <div class="ast-hero__card-wrap">
            <div class="ast-hero__card" id="astCard">
                <div class="ast-hero__card-shine"></div>

                <div class="ast-hero__card-top">
                    <span>VIP MEMBER LICENSE</span>
                    <span class="ast-hero__card-cat">CAT B1</span>
                </div>

                <div class="ast-hero__card-mid">
                    <div class="ast-hero__card-photo">
                        <i class="ti ti-steering-wheel" aria-hidden="true"></i>
                    </div>

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

            <div class="ast-hero__stat">13 წელი გამოცდილება</div>
        </div>
    </div>

    <div class="ast-hero__perforation" aria-hidden="true"></div>

    <div class="ast-hero__categories" id="tickets">
        <div class="ast-hero__plate">
            <span class="ast-hero__plate-code">AM</span>
            <span class="ast-hero__plate-label">მოპედი</span>
        </div>

        <div class="ast-hero__plate">
            <span class="ast-hero__plate-code">A, A1</span>
            <span class="ast-hero__plate-label">მოტოციკლი</span>
        </div>

        <div class="ast-hero__plate is-featured">
            <span class="ast-hero__plate-code">B, B1</span>
            <span class="ast-hero__plate-label">მსუბუქი ავტო</span>
        </div>

        <div class="ast-hero__plate">
            <span class="ast-hero__plate-code">C</span>
            <span class="ast-hero__plate-label">სატვირთო</span>
        </div>

        <div class="ast-hero__plate">
            <span class="ast-hero__plate-code">C1</span>
            <span class="ast-hero__plate-label">მსუბ. სატვირთო</span>
        </div>

        <div class="ast-hero__plate">
            <span class="ast-hero__plate-code">D</span>
            <span class="ast-hero__plate-label">ავტობუსი</span>
        </div>

        <div class="ast-hero__plate">
            <span class="ast-hero__plate-code">D1</span>
            <span class="ast-hero__plate-label">მიკროავტობუსი</span>
        </div>

        <div class="ast-hero__plate">
            <span class="ast-hero__plate-code">T, S</span>
            <span class="ast-hero__plate-label">ტრაქტორი</span>
        </div>

        <div class="ast-hero__plate">
            <span class="ast-hero__plate-code">TRAM</span>
            <span class="ast-hero__plate-label">ტრამვაი</span>
        </div>

        <div class="ast-hero__plate">
            <span class="ast-hero__plate-code">MIL</span>
            <span class="ast-hero__plate-label">სამხედრო</span>
        </div>
    </div>
</section>

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

</body>
</html>
