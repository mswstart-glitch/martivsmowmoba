<!DOCTYPE html>
<html lang="ka">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>DM ავტოსკოლა — მართვის სწავლა მარტივად</title>

<style>
*{box-sizing:border-box}
html{scroll-behavior:smooth}
body{
    margin:0;
    font-family:system-ui,-apple-system,BlinkMacSystemFont,"Segoe UI",sans-serif;
    background:#f6f9ff;
    color:#081b33;
    overflow-x:hidden;
}
a{text-decoration:none;color:inherit}

:root{
    --blue:#1f6fff;
    --blue2:#0057e8;
    --dark:#081b33;
    --text:#5c7088;
    --line:rgba(31,111,255,.14);
    --shadow:0 28px 80px rgba(22,78,150,.14);
}

/* NAVBAR */
.nav{
    position:fixed;
    top:24px;
    left:50%;
    transform:translateX(-50%);
    width:min(1030px,calc(100% - 42px));
    height:70px;
    padding:8px 9px 8px 14px;
    border-radius:999px;
    z-index:1000;
    display:flex;
    align-items:center;
    justify-content:space-between;
    gap:14px;
    background:rgba(255,255,255,.82);
    border:1px solid rgba(255,255,255,.86);
    backdrop-filter:blur(26px) saturate(180%);
    -webkit-backdrop-filter:blur(26px) saturate(180%);
    box-shadow:
        0 24px 70px rgba(30,90,170,.18),
        inset 0 1px 0 rgba(255,255,255,.95);
}
.brand{
    display:flex;
    align-items:center;
    gap:11px;
    height:52px;
    padding:0 15px 0 5px;
    border-radius:999px;
    font-weight:950;
    letter-spacing:-.5px;
    color:var(--dark);
    background:rgba(255,255,255,.56);
}
.brand-mark{
    width:42px;
    height:42px;
    border-radius:15px;
    background:
        radial-gradient(circle at 30% 22%,rgba(255,255,255,.75),transparent 30%),
        linear-gradient(135deg,#62b4ff,#1262ff);
    box-shadow:0 16px 36px rgba(31,111,255,.34);
}
.nav-links{
    display:flex;
    align-items:center;
    gap:4px;
}
.nav-links a{
    height:48px;
    padding:0 16px;
    border-radius:999px;
    display:flex;
    align-items:center;
    color:#536b86;
    font-size:14px;
    font-weight:850;
    transition:.18s ease;
}
.nav-links a:hover{
    background:#eef6ff;
    color:var(--blue2);
}
.nav-cta{
    color:#fff!important;
    background:
        radial-gradient(circle at 28% 18%,rgba(255,255,255,.45),transparent 30%),
        linear-gradient(135deg,#3389ff,#0d58e8)!important;
    box-shadow:0 16px 38px rgba(31,111,255,.34);
    font-weight:950!important;
}

/* HERO */
.hero{
    position:relative;
    min-height:100vh;
    padding:132px 0 54px;
    overflow:hidden;
    background:
        linear-gradient(90deg,rgba(246,249,255,.98) 0%,rgba(246,249,255,.92) 38%,rgba(246,249,255,.30) 72%,rgba(246,249,255,.08) 100%),
        url("/autoschool/images/hero-driving-school.webp") center/cover no-repeat;
}
.hero:before{
    content:"";
    position:absolute;
    inset:0;
    background:
        radial-gradient(circle at 16% 18%,rgba(31,111,255,.13),transparent 30%),
        radial-gradient(circle at 74% 18%,rgba(255,255,255,.48),transparent 26%);
    pointer-events:none;
}
.container{
    position:relative;
    width:min(1180px,calc(100% - 34px));
    margin:auto;
}
.hero-grid{
    display:grid;
    grid-template-columns:minmax(0,1fr) 420px;
    gap:48px;
    align-items:center;
}
.kicker{
    display:inline-flex;
    align-items:center;
    gap:8px;
    padding:10px 15px;
    border-radius:999px;
    background:rgba(255,255,255,.78);
    border:1px solid var(--line);
    color:var(--blue2);
    font-size:14px;
    font-weight:900;
    box-shadow:0 16px 38px rgba(31,111,255,.09);
}
.kicker:before{
    content:"";
    width:9px;
    height:9px;
    border-radius:99px;
    background:var(--blue);
    box-shadow:0 0 0 6px rgba(31,111,255,.12);
}
h1{
    max-width:680px;
    margin:24px 0 18px;
    font-size:clamp(52px,6vw,88px);
    line-height:.9;
    letter-spacing:-4px;
    color:#07192f;
}
h1 span{
    color:var(--blue);
}
.hero-text{
    max-width:600px;
    margin:0 0 30px;
    font-size:19px;
    line-height:1.72;
    color:#516a86;
}
.actions{
    display:flex;
    gap:12px;
    flex-wrap:wrap;
}
.btn{
    height:56px;
    padding:0 22px;
    border-radius:18px;
    display:inline-flex;
    align-items:center;
    justify-content:center;
    font-weight:950;
    transition:.2s ease;
}
.btn:hover{transform:translateY(-2px)}
.btn.primary{
    color:#fff;
    background:linear-gradient(135deg,#3389ff,#0d58e8);
    box-shadow:0 18px 42px rgba(31,111,255,.34);
}
.btn.secondary{
    color:#10345e;
    background:rgba(255,255,255,.82);
    border:1px solid var(--line);
    box-shadow:0 14px 34px rgba(30,90,170,.10);
}

/* EXAM CARD */
.exam-card{
    position:relative;
    border-radius:34px;
    padding:24px;
    background:rgba(255,255,255,.78);
    border:1px solid rgba(255,255,255,.8);
    backdrop-filter:blur(22px) saturate(170%);
    -webkit-backdrop-filter:blur(22px) saturate(170%);
    box-shadow:0 34px 90px rgba(18,76,150,.20);
}
.exam-card:before{
    content:"";
    position:absolute;
    inset:0;
    border-radius:34px;
    background:linear-gradient(135deg,rgba(255,255,255,.9),rgba(255,255,255,.18));
    pointer-events:none;
}
.exam-card > *{position:relative}
.exam-head{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:22px;
}
.exam-label{
    color:var(--blue2);
    font-weight:950;
    font-size:14px;
}
.exam-pill{
    padding:8px 12px;
    border-radius:999px;
    background:#eef6ff;
    color:var(--blue2);
    font-size:13px;
    font-weight:950;
}
.exam-card h3{
    margin:0 0 18px;
    font-size:26px;
    line-height:1.2;
    letter-spacing:-.7px;
    color:#0a213d;
}
.option{
    margin-top:10px;
    height:52px;
    padding:0 15px;
    border-radius:17px;
    display:flex;
    align-items:center;
    justify-content:space-between;
    background:rgba(255,255,255,.86);
    border:1px solid rgba(31,111,255,.10);
    color:#526b86;
    font-weight:850;
}
.option.active{
    color:#fff;
    background:linear-gradient(135deg,#287cff,#0d58e8);
    box-shadow:0 18px 42px rgba(31,111,255,.30);
}
.option.active:after{
    content:"✓";
    width:25px;
    height:25px;
    border-radius:50%;
    background:#fff;
    color:var(--blue2);
    display:grid;
    place-items:center;
    font-weight:1000;
}

/* STATS */
.stats{
    margin-top:38px;
    display:grid;
    grid-template-columns:repeat(3,1fr);
    gap:14px;
    max-width:690px;
}
.stat{
    min-height:118px;
    padding:20px;
    border-radius:26px;
    background:rgba(255,255,255,.78);
    border:1px solid rgba(255,255,255,.78);
    box-shadow:0 22px 60px rgba(18,76,150,.12);
    backdrop-filter:blur(18px);
}
.stat-icon{
    width:36px;
    height:36px;
    border-radius:14px;
    background:#eef6ff;
    color:var(--blue2);
    display:grid;
    place-items:center;
    font-weight:1000;
    margin-bottom:12px;
}
.stat b{
    display:block;
    font-size:28px;
    letter-spacing:-1px;
    color:#07192f;
}
.stat span{
    color:#60758d;
    font-size:14px;
    font-weight:800;
}

/* SECTIONS */
.section{
    padding:100px 0;
    background:#fff;
}
.section.alt{
    background:#f6f9ff;
}
.section-title{
    max-width:760px;
    margin-bottom:34px;
}
.section-title small{
    color:var(--blue2);
    font-weight:950;
}
.section-title h2{
    margin:10px 0 0;
    font-size:clamp(34px,4.4vw,58px);
    line-height:.98;
    letter-spacing:-2.4px;
    color:#07192f;
}
.cards{
    display:grid;
    grid-template-columns:repeat(3,1fr);
    gap:18px;
}
.card{
    position:relative;
    overflow:hidden;
    min-height:250px;
    padding:28px;
    border-radius:32px;
    background:#fff;
    border:1px solid rgba(31,111,255,.12);
    box-shadow:var(--shadow);
}
.card:after{
    content:"";
    position:absolute;
    right:-40px;
    top:-40px;
    width:120px;
    height:120px;
    border-radius:50%;
    background:rgba(31,111,255,.07);
}
.icon{
    width:54px;
    height:54px;
    border-radius:19px;
    display:grid;
    place-items:center;
    background:linear-gradient(135deg,#eef6ff,#dcecff);
    color:var(--blue2);
    font-weight:1000;
    margin-bottom:24px;
}
.card h3{
    margin:0 0 11px;
    font-size:23px;
    letter-spacing:-.5px;
    color:#0a213d;
}
.card p{
    margin:0;
    color:#60758d;
    line-height:1.68;
}

/* PROCESS */
.process{
    display:grid;
    grid-template-columns:1fr 1fr;
    gap:18px;
}
.step{
    display:flex;
    gap:18px;
    padding:24px;
    border-radius:28px;
    background:#fff;
    border:1px solid rgba(31,111,255,.12);
    box-shadow:0 20px 55px rgba(18,76,150,.09);
}
.step-no{
    width:48px;
    height:48px;
    flex:0 0 auto;
    border-radius:17px;
    display:grid;
    place-items:center;
    background:var(--blue);
    color:#fff;
    font-weight:1000;
}
.step h3{
    margin:0 0 8px;
    color:#0a213d;
}
.step p{
    margin:0;
    color:#60758d;
    line-height:1.6;
}

/* CTA */
.cta{
    padding:46px;
    border-radius:38px;
    background:
        radial-gradient(circle at 16% 20%,rgba(255,255,255,.20),transparent 32%),
        linear-gradient(135deg,#0c3d91,#216fff);
    color:#fff;
    display:flex;
    justify-content:space-between;
    align-items:center;
    gap:28px;
    box-shadow:0 34px 90px rgba(31,111,255,.28);
}
.cta h2{
    margin:0 0 10px;
    font-size:clamp(32px,4vw,48px);
    letter-spacing:-1.8px;
}
.cta p{
    margin:0;
    color:rgba(255,255,255,.82);
    line-height:1.65;
}
.cta a{
    height:58px;
    padding:0 24px;
    border-radius:18px;
    display:inline-flex;
    align-items:center;
    background:#fff;
    color:var(--blue2);
    font-weight:1000;
    white-space:nowrap;
}

@media(max-width:900px){
    .nav{
        top:12px;
        width:calc(100% - 22px);
        height:66px;
        padding:7px 8px 7px 12px;
    }
    .brand{font-size:14px}
    .brand-mark{width:38px;height:38px;border-radius:13px}
    .nav-links a:not(.nav-cta){display:none}
    .nav-cta{height:46px;padding:0 16px;font-size:13px}

    .hero{
        padding:112px 0 50px;
        background:
            linear-gradient(180deg,rgba(246,249,255,.96) 0%,rgba(246,249,255,.88) 52%,rgba(246,249,255,.56) 100%),
            url("/autoschool/images/hero-driving-school.webp") center/cover no-repeat;
    }
    .hero-grid{grid-template-columns:1fr;gap:30px}
    h1{letter-spacing:-2.4px}
    .exam-card{max-width:480px}
    .stats,.cards,.process{grid-template-columns:1fr}
    .cta{flex-direction:column;align-items:flex-start;padding:32px}
}
</style>

<style id="cinematic-hero-patch-v1">
    .cinematic-hero{
        position:relative !important;
        min-height:100vh !important;
        display:flex !important;
        align-items:center !important;
        overflow:hidden !important;
        isolation:isolate !important;
        padding:120px 0 70px !important;
        background:#07192f !important;
    }

    .cinematic-hero .hero-bg{
        position:absolute !important;
        inset:0 !important;
        z-index:-4 !important;
        background:url("/autoschool/images/hero-driving-school.webp") center/cover no-repeat !important;
        transform:scale(1.07) !important;
        filter:saturate(1.12) contrast(1.05) brightness(.88) !important;
    }

    .cinematic-hero:before{
        content:"" !important;
        position:absolute !important;
        inset:0 !important;
        z-index:-3 !important;
        background:
            linear-gradient(180deg,rgba(3,12,25,.34),rgba(3,12,25,.28) 48%,rgba(246,249,255,.94) 100%),
            radial-gradient(circle at 50% 22%,rgba(255,255,255,.34),transparent 30%),
            radial-gradient(circle at 18% 28%,rgba(31,111,255,.24),transparent 32%) !important;
    }

    .cinematic-hero:after{
        content:"" !important;
        position:absolute !important;
        left:0 !important;
        right:0 !important;
        bottom:-80px !important;
        height:260px !important;
        z-index:-1 !important;
        opacity:.62 !important;
        background:
            linear-gradient(90deg,transparent 0 45%,rgba(255,255,255,.70) 45% 46%,transparent 46% 54%,rgba(255,255,255,.70) 54% 55%,transparent 55%),
            repeating-linear-gradient(115deg,transparent 0 46px,rgba(31,111,255,.16) 46px 56px,transparent 56px 100px) !important;
        transform:perspective(560px) rotateX(64deg) !important;
        animation:roadMove 7s linear infinite !important;
    }

    @keyframes roadMove{
        from{background-position:0 0,0 0}
        to{background-position:0 0,0 260px}
    }

    .hero-center{
        max-width:930px !important;
        margin:auto !important;
        text-align:center !important;
        color:#fff !important;
    }

    .hero-center .kicker{
        background:rgba(255,255,255,.16) !important;
        border:1px solid rgba(255,255,255,.25) !important;
        color:#fff !important;
        backdrop-filter:blur(18px) !important;
        box-shadow:0 18px 50px rgba(0,0,0,.18) !important;
    }

    .hero-center h1{
        max-width:980px !important;
        margin:24px auto 18px !important;
        font-size:clamp(54px,8vw,112px) !important;
        line-height:.86 !important;
        letter-spacing:-5.2px !important;
        color:#fff !important;
        text-shadow:0 28px 90px rgba(0,0,0,.42) !important;
    }

    .hero-center h1 span{
        display:block !important;
        color:#78bdff !important;
    }

    .hero-center .hero-text{
        max-width:720px !important;
        margin:0 auto 30px !important;
        color:rgba(255,255,255,.86) !important;
        font-size:20px !important;
        line-height:1.72 !important;
        text-shadow:0 16px 45px rgba(0,0,0,.28) !important;
    }

    .hero-center .actions{
        justify-content:center !important;
    }

    .hero-center .btn.secondary{
        color:#fff !important;
        background:rgba(255,255,255,.14) !important;
        border:1px solid rgba(255,255,255,.24) !important;
        backdrop-filter:blur(16px) !important;
    }

    .hero-badge{
        position:absolute !important;
        z-index:3 !important;
        padding:12px 16px !important;
        border-radius:999px !important;
        background:rgba(255,255,255,.72) !important;
        border:1px solid rgba(255,255,255,.72) !important;
        backdrop-filter:blur(18px) !important;
        box-shadow:0 18px 50px rgba(0,0,0,.16) !important;
        color:#0a213d !important;
        font-size:14px !important;
        font-weight:950 !important;
        animation:heroFloat 4.8s ease-in-out infinite alternate !important;
    }

    .badge-1{left:8%;top:28%}
    .badge-2{right:9%;top:34%;animation-delay:.7s!important}
    .badge-3{left:13%;bottom:22%;animation-delay:1.1s!important}

    @keyframes heroFloat{
        from{transform:translateY(0)}
        to{transform:translateY(-15px)}
    }

    .scroll-hint{
        position:absolute !important;
        left:50% !important;
        bottom:32px !important;
        transform:translateX(-50%) !important;
        color:rgba(255,255,255,.84) !important;
        font-size:13px !important;
        font-weight:900 !important;
    }

    .scroll-hint:after{
        content:"" !important;
        display:block !important;
        width:2px !important;
        height:34px !important;
        margin:10px auto 0 !important;
        border-radius:99px !important;
        background:rgba(255,255,255,.58) !important;
        animation:scrollLine 1.4s ease-in-out infinite !important;
    }

    @keyframes scrollLine{
        0%{transform:scaleY(.35);opacity:.35}
        50%{transform:scaleY(1);opacity:1}
        100%{transform:scaleY(.35);opacity:.35}
    }

    @media(max-width:900px){
        .hero-badge{display:none!important}
        .hero-center h1{
            letter-spacing:-2.8px !important;
            font-size:clamp(46px,13vw,72px) !important;
        }
        .hero-center .hero-text{
            font-size:17px !important;
        }
    }
</style>



<style id="connected-road-v2">
    .cinematic-hero{
        margin-bottom:0 !important;
        overflow:hidden !important;
    }

    .cinematic-hero:after{
        content:"" !important;
        position:absolute !important;
        left:50% !important;
        right:auto !important;
        bottom:-150px !important;
        width:min(760px,78vw) !important;
        height:430px !important;
        transform:translateX(-50%) perspective(720px) rotateX(64deg) !important;
        transform-origin:bottom center !important;
        z-index:1 !important;
        opacity:.82 !important;
        pointer-events:none !important;

        background:
            linear-gradient(90deg,
                transparent 0 42%,
                rgba(255,255,255,.88) 42% 43%,
                transparent 43% 57%,
                rgba(255,255,255,.88) 57% 58%,
                transparent 58% 100%
            ),
            repeating-linear-gradient(
                180deg,
                transparent 0 58px,
                rgba(31,111,255,.22) 58px 72px,
                transparent 72px 128px
            ) !important;

        animation:connectedRoadMove 7s linear infinite !important;
    }

    body::before{
        content:"" !important;
        position:fixed !important;
        left:50% !important;
        top:0 !important;
        width:min(760px,78vw) !important;
        height:140vh !important;
        transform:translateX(-50%) perspective(720px) rotateX(64deg) translateY(58vh) !important;
        transform-origin:top center !important;
        pointer-events:none !important;
        z-index:0 !important;
        opacity:.16 !important;

        background:
            linear-gradient(90deg,
                transparent 0 42%,
                rgba(31,111,255,.34) 42% 43%,
                transparent 43% 57%,
                rgba(31,111,255,.34) 57% 58%,
                transparent 58% 100%
            ),
            repeating-linear-gradient(
                180deg,
                transparent 0 58px,
                rgba(31,111,255,.17) 58px 72px,
                transparent 72px 128px
            ) !important;

        mask-image:linear-gradient(180deg,black 0%,black 68%,transparent 100%) !important;
        -webkit-mask-image:linear-gradient(180deg,black 0%,black 68%,transparent 100%) !important;

        animation:connectedRoadMove 7s linear infinite !important;
    }

    @keyframes connectedRoadMove{
        from{background-position:0 0,0 0}
        to{background-position:0 0,0 256px}
    }

    .section,
    .container,
    .stats-grid,
    .cards,
    .exam-section,
    .process,
    .cta{
        position:relative !important;
        z-index:2 !important;
    }

    .section:first-of-type{
        padding-top:145px !important;
    }

    @media(max-width:900px){
        .cinematic-hero:after{
            width:92vw !important;
            height:300px !important;
            bottom:-120px !important;
            opacity:.55 !important;
        }

        body::before{
            width:92vw !important;
            opacity:.08 !important;
            transform:translateX(-50%) perspective(720px) rotateX(64deg) translateY(62vh) !important;
        }

        .section:first-of-type{
            padding-top:100px !important;
        }
    }
</style>

</head>

<body>

<nav class="nav">
    <a href="/autoschool" class="brand">
        <span class="brand-mark"></span>
        <span>DM ავტოსკოლა</span>
    </a>

    <div class="nav-links">
        <a href="#program">პროგრამა</a>
        <a href="#benefits">უპირატესობები</a>
        <a href="#process">პროცესი</a>
        <a href="/autoschool/exam" class="nav-cta">ტესტის დაწყება</a>
    </div>
</nav>


<header class="hero cinematic-hero">
    <div class="hero-bg"></div>

    <div class="hero-badge badge-1">🚗 პრაქტიკული გაკვეთილები</div>
    <div class="hero-badge badge-2">🚦 გამოცდის სიმულაცია</div>
    <div class="hero-badge badge-3">📘 ონლაინ თეორია</div>

    <div class="container">
        <div class="hero-center">
            <div class="kicker">Premium Driving School</div>

            <h1>ისწავლე მართვა <span>თავდაჯერებულად</span></h1>

            <p class="hero-text">
                თანამედროვე ავტოსკოლა თეორიისთვის, პრაქტიკისთვის და რეალური გამოცდისთვის მოსამზადებლად.
            </p>

            <div class="actions">
                <a href="/autoschool/exam" class="btn primary">დაიწყე ტესტი</a>
                <a href="#program" class="btn secondary">ნახე პროგრამა</a>
            </div>
        </div>
    </div>

    <div class="scroll-hint">გადაახვიე</div>
</header>


<section id="program" class="section">
    <div class="container">
        <div class="section-title">
            <small>სასწავლო პროგრამა</small>
            <h2>ყველაფერი, რაც მართვის მოწმობისთვის გჭირდება</h2>
        </div>

        <div class="cards">
            <article class="card">
                <div class="icon">01</div>
                <h3>თეორიის კურსი</h3>
                <p>საგამოცდო საკითხები მარტივი ენით, ლოგიკით და პრაქტიკული მაგალითებით.</p>
            </article>

            <article class="card">
                <div class="icon">02</div>
                <h3>პრაქტიკული სწავლება</h3>
                <p>სასწავლო მოედანი, ქალაქში მოძრაობა და ეტაპობრივი მომზადება გამოცდისთვის.</p>
            </article>

            <article class="card">
                <div class="icon">03</div>
                <h3>გამოცდის სიმულაცია</h3>
                <p>რეალურ გამოცდასთან მიახლოებული ტესტები შედეგის სწრაფი შემოწმებით.</p>
            </article>
        </div>
    </div>
</section>

<section id="benefits" class="section alt">
    <div class="container">
        <div class="section-title">
            <small>რატომ ჩვენ?</small>
            <h2>სწავლა, რომელიც მარტივად გასაგებია</h2>
        </div>

        <div class="cards">
            <article class="card">
                <div class="icon">✓</div>
                <h3>მშვიდი პროცესი</h3>
                <p>არანაირი ზედმეტი სტრესი — სწავლა იწყება მარტივად და პროგრესი ჩანს ყოველ ეტაპზე.</p>
            </article>

            <article class="card">
                <div class="icon">↗</div>
                <h3>სწრაფი პროგრესი</h3>
                <p>გაკვეთილები აგებულია კონკრეტულ მიზნებზე, რომ გამოცდისთვის მზადება არ გაიწელოს.</p>
            </article>

            <article class="card">
                <div class="icon">★</div>
                <h3>პრემიუმ გამოცდილება</h3>
                <p>სუფთა ვიზუალი, ონლაინ ტესტები და თანამედროვე სასწავლო მიდგომა ერთ სივრცეში.</p>
            </article>
        </div>
    </div>
</section>

<section id="process" class="section">
    <div class="container">
        <div class="section-title">
            <small>როგორ მუშაობს?</small>
            <h2>3 მარტივი ნაბიჯი დაწყებისთვის</h2>
        </div>

        <div class="process">
            <div class="step">
                <div class="step-no">1</div>
                <div>
                    <h3>იწყებ თეორიით</h3>
                    <p>გაივლი ძირითად წესებს, ნიშნებს და საგამოცდო კითხვების ლოგიკას.</p>
                </div>
            </div>

            <div class="step">
                <div class="step-no">2</div>
                <div>
                    <h3>ვარჯიშობ პრაქტიკაში</h3>
                    <p>მოედანზე და გზაზე სწავლობ რეალურ სიტუაციებში სწორ მოქმედებას.</p>
                </div>
            </div>

            <div class="step">
                <div class="step-no">3</div>
                <div>
                    <h3>ამოწმებ შედეგს</h3>
                    <p>გამოცდის სიმულაციით იგებ რამდენად მზად ხარ რეალური გამოცდისთვის.</p>
                </div>
            </div>

            <div class="step">
                <div class="step-no">4</div>
                <div>
                    <h3>გადიხარ თავდაჯერებულად</h3>
                    <p>შედეგზე ორიენტირებული მომზადება გეხმარება გამოცდაზე მშვიდად გასვლაში.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<section id="exam" class="section alt">
    <div class="container">
        <div class="cta">
            <div>
                <h2>მზად ხარ თეორიისთვის?</h2>
                <p>გაიარე სატესტო გამოცდა და ნახე რამდენად მზად ხარ რეალური გამოცდისთვის.</p>
            </div>
            <a href="/autoschool/exam">ტესტის დაწყება</a>
        </div>
    </div>
</section>

<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js"></script>

<script>
if(window.gsap && window.ScrollTrigger){
    gsap.registerPlugin(ScrollTrigger);

    gsap.from(".kicker,h1,.hero-text,.actions,.stats",{
        y:24,
        opacity:0,
        duration:.7,
        stagger:.07,
        ease:"power3.out"
    });

    gsap.from(".exam-card",{
        y:26,
        opacity:0,
        scale:.985,
        duration:.75,
        delay:.18,
        ease:"power3.out"
    });

    gsap.utils.toArray(".card,.step,.cta").forEach(function(el){
        gsap.from(el,{
            y:28,
            opacity:0,
            duration:.58,
            ease:"power3.out",
            scrollTrigger:{
                trigger:el,
                start:"top 88%",
                once:true
            }
        });
    });
}
</script>

</body>
</html>
