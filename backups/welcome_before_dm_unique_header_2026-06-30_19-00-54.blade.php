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


<style id="start-style-header-v1">
    body{
        background:#ffffff !important;
    }

    .start-nav{
        position:fixed !important;
        top:0 !important;
        left:0 !important;
        right:0 !important;
        height:88px !important;
        z-index:9999 !important;
        background:#ffffff !important;
        border-bottom:1px solid #edf1f6 !important;
        display:flex !important;
        align-items:center !important;
        justify-content:space-between !important;
        padding:0 30px !important;
        box-shadow:0 10px 30px rgba(15,23,42,.04) !important;
    }

    .start-logo{
        display:flex !important;
        align-items:center !important;
        gap:10px !important;
        color:#18243a !important;
        min-width:235px !important;
    }

    .logo-wheel{
        width:43px !important;
        height:43px !important;
        border-radius:50% !important;
        display:grid !important;
        place-items:center !important;
        border:4px solid #253246 !important;
        color:#43aee8 !important;
        font-size:18px !important;
        line-height:1 !important;
    }

    .start-logo strong{
        display:block !important;
        font-size:18px !important;
        font-weight:1000 !important;
        line-height:.9 !important;
        letter-spacing:-.6px !important;
    }

    .start-logo b{
        display:block !important;
        font-size:30px !important;
        font-weight:1000 !important;
        line-height:.85 !important;
        letter-spacing:-1.7px !important;
        color:#31a6df !important;
    }

    .start-menu{
        display:flex !important;
        align-items:center !important;
        gap:0 !important;
        height:100% !important;
    }

    .start-menu a{
        height:46px !important;
        display:flex !important;
        align-items:center !important;
        padding:0 24px !important;
        color:#506174 !important;
        font-size:17px !important;
        font-weight:850 !important;
        border-right:1px solid #e7edf4 !important;
    }

    .start-menu a:last-child{
        border-right:0 !important;
    }

    .start-menu a.active{
        background:#58cf83 !important;
        color:#fff !important;
        border-radius:7px !important;
        border-right:0 !important;
        box-shadow:0 12px 24px rgba(88,207,131,.28) !important;
        margin-right:12px !important;
    }

    .lang-pill{
        height:52px !important;
        min-width:88px !important;
        border:1px solid #dfe7f0 !important;
        border-radius:12px !important;
        display:flex !important;
        align-items:center !important;
        justify-content:center !important;
        font-size:22px !important;
        background:#fff !important;
        color:#506174 !important;
        box-shadow:0 8px 20px rgba(15,23,42,.04) !important;
    }

    .start-hero{
        position:relative !important;
        min-height:760px !important;
        padding:135px 30px 55px !important;
        background:
            radial-gradient(circle at 1px 1px, rgba(70,82,100,.32) 1.3px, transparent 1.4px) 0 0/32px 32px,
            linear-gradient(90deg, rgba(255,255,255,.95), rgba(255,255,255,.94)) !important;
        overflow:hidden !important;
    }

    .start-hero:before{
        content:"" !important;
        position:absolute !important;
        inset:88px 0 0 0 !important;
        background:
            linear-gradient(90deg, rgba(39,166,223,.04) 1px, transparent 1px) 0 0/64px 64px,
            linear-gradient(0deg, rgba(39,166,223,.04) 1px, transparent 1px) 0 0/64px 64px !important;
        pointer-events:none !important;
    }

    .start-container{
        width:min(1640px,100%) !important;
        margin:auto !important;
        position:relative !important;
        z-index:2 !important;
    }

    .start-hero-grid{
        display:grid !important;
        grid-template-columns:1fr 1.05fr !important;
        gap:60px !important;
        align-items:center !important;
    }

    .start-copy h1{
        margin:0 0 34px !important;
        font-size:48px !important;
        line-height:1.08 !important;
        letter-spacing:-1.6px !important;
        color:#101d31 !important;
        font-weight:1000 !important;
    }

    .start-copy p{
        max-width:760px !important;
        margin:0 0 26px !important;
        color:#7a8493 !important;
        font-size:21px !important;
        line-height:1.65 !important;
        font-weight:700 !important;
    }

    .store-buttons{
        margin-top:64px !important;
        display:flex !important;
        gap:12px !important;
        flex-wrap:wrap !important;
    }

    .store-buttons a{
        background:#101010 !important;
        color:#fff !important;
        border-radius:8px !important;
        padding:14px 22px !important;
        font-size:16px !important;
        font-weight:900 !important;
        box-shadow:0 12px 24px rgba(0,0,0,.16) !important;
    }

    .start-visual{
        min-height:430px !important;
        position:relative !important;
    }

    .map-circle{
        position:absolute !important;
        top:10px !important;
        left:10px !important;
        width:365px !important;
        height:365px !important;
        border-radius:50% !important;
        background:
            linear-gradient(135deg, rgba(12,31,68,.96), rgba(20,54,105,.95)),
            radial-gradient(circle at 50% 50%, rgba(88,207,131,.2), transparent 45%) !important;
        border:4px solid #2476ff !important;
        box-shadow:0 22px 70px rgba(36,118,255,.22) !important;
        overflow:hidden !important;
    }

    .map-circle:before{
        content:"" !important;
        position:absolute !important;
        inset:0 !important;
        background:
            linear-gradient(35deg, transparent 20%, rgba(87,129,190,.24) 21%, rgba(87,129,190,.24) 25%, transparent 26%),
            linear-gradient(125deg, transparent 28%, rgba(87,129,190,.22) 29%, rgba(87,129,190,.22) 33%, transparent 34%),
            linear-gradient(80deg, transparent 44%, rgba(87,129,190,.20) 45%, rgba(87,129,190,.20) 49%, transparent 50%) !important;
        opacity:.9 !important;
    }

    .route-line{
        position:absolute !important;
        left:72px !important;
        top:126px !important;
        width:220px !important;
        height:145px !important;
        border-left:6px solid #58cf83 !important;
        border-bottom:6px solid #58cf83 !important;
        border-top:6px solid #58cf83 !important;
        transform:rotate(-24deg) skewX(-13deg) !important;
        filter:drop-shadow(0 0 9px rgba(88,207,131,.8)) !important;
    }

    .pin{
        position:absolute !important;
        width:18px !important;
        height:18px !important;
        border-radius:50% !important;
        background:#fff !important;
        border:5px solid #58cf83 !important;
        z-index:4 !important;
        box-shadow:0 0 15px rgba(88,207,131,.8) !important;
    }

    .p1{left:110px;top:245px}
    .p2{left:185px;top:125px}
    .p3{left:276px;top:100px}

    .start-car{
        position:absolute !important;
        right:20px !important;
        bottom:12px !important;
        width:520px !important;
        height:250px !important;
        border-radius:22px !important;
        overflow:hidden !important;
        box-shadow:0 22px 55px rgba(15,23,42,.16) !important;
    }

    .start-car img{
        width:100% !important;
        height:100% !important;
        object-fit:cover !important;
        object-position:center !important;
        display:block !important;
    }

    .green-bubble{
        position:absolute !important;
        right:10px !important;
        top:60px !important;
        max-width:390px !important;
        padding:18px 28px !important;
        border-radius:999px !important;
        background:#58cf83 !important;
        color:white !important;
        font-size:19px !important;
        line-height:1.25 !important;
        font-weight:950 !important;
        box-shadow:0 20px 45px rgba(88,207,131,.28) !important;
    }

    .category-row{
        position:relative !important;
        z-index:2 !important;
        width:min(1640px,100%) !important;
        margin:58px auto 0 !important;
        display:grid !important;
        grid-template-columns:repeat(8,1fr) !important;
        gap:14px !important;
    }

    .category-row div{
        height:104px !important;
        border:1.5px dashed #cad8e8 !important;
        border-radius:12px !important;
        display:flex !important;
        flex-direction:column !important;
        align-items:center !important;
        justify-content:center !important;
        gap:8px !important;
        color:#273348 !important;
        font-size:25px !important;
        background:rgba(255,255,255,.58) !important;
    }

    .category-row span{
        font-size:16px !important;
        font-weight:850 !important;
    }

    @media(max-width:1000px){
        .start-menu a:not(.active):not([href="/autoschool/exam"]){
            display:none !important;
        }

        .start-hero-grid{
            grid-template-columns:1fr !important;
        }

        .start-visual{
            min-height:390px !important;
        }

        .category-row{
            grid-template-columns:repeat(2,1fr) !important;
        }
    }

    @media(max-width:680px){
        .start-nav{
            height:76px !important;
            padding:0 14px !important;
        }

        .start-logo{
            min-width:auto !important;
        }

        .start-logo strong{
            font-size:14px !important;
        }

        .start-logo b{
            font-size:22px !important;
        }

        .start-menu a.active{
            padding:0 16px !important;
        }

        .lang-pill{
            display:none !important;
        }

        .start-hero{
            padding:112px 18px 42px !important;
        }

        .start-copy h1{
            font-size:36px !important;
        }

        .start-copy p{
            font-size:17px !important;
        }

        .map-circle{
            width:280px !important;
            height:280px !important;
        }

        .start-car{
            width:320px !important;
            height:190px !important;
            right:0 !important;
        }

        .green-bubble{
            position:relative !important;
            right:auto !important;
            top:auto !important;
            margin-bottom:20px !important;
            font-size:15px !important;
            border-radius:22px !important;
        }
    }
</style>

</head>

<body>


<nav class="start-nav">
    <a href="/autoschool" class="start-logo">
        <span class="logo-wheel">◉</span>
        <span>
            <strong>ავტოსკოლა</strong>
            <b>START</b>
        </span>
    </a>

    <div class="start-menu">
        <a class="active" href="/autoschool">⌂ მთავარი</a>
        <a href="#program">▱ ბილეთები</a>
        <a href="/autoschool/exam">☑ გამოცდა</a>
        <a href="#benefits">ⓘ ინფორმაცია</a>
        <a href="#contact">✉ კონტაქტი</a>
    </div>

    <div class="lang-pill">🇬🇪⌄</div>
</nav>




<header class="start-hero">
    <div class="start-container start-hero-grid">
        <div class="start-copy">
            <h1>ავტოსკოლა სტარტი</h1>

            <p>
                ავტოსკოლა სტარტი გთავაზობთ თანამედროვე სასწავლო გამოცდილებას.
                მოემზადე თეორიისა და პრაქტიკული გამოცდისთვის მარტივად, გასაგებად
                და კომფორტულ გარემოში.
            </p>

            <p>
                ჩვენთან შეგიძლია გაიარო ონლაინ ტესტები, შეამოწმო შენი ცოდნა
                და გამოცდაზე გახვიდე უფრო თავდაჯერებულად.
            </p>

            <div class="store-buttons">
                <a href="/autoschool/exam">ტესტის დაწყება</a>
                <a href="#program">კურსის ნახვა</a>
            </div>
        </div>

        <div class="start-visual">
            <div class="map-circle">
                <div class="route-line"></div>
                <span class="pin p1"></span>
                <span class="pin p2"></span>
                <span class="pin p3"></span>
            </div>

            <div class="start-car">
                <img src="/autoschool/images/hero-driving-school.webp" alt="ავტოსკოლა">
            </div>

            <div class="green-bubble">
                გამოცდის ზუსტი ანალოგი<br>
                გადამზადების პროგრამა
            </div>
        </div>
    </div>

    <div class="category-row">
        <div>🏍️<span>AM</span></div>
        <div>🏍️<span>A, A1</span></div>
        <div>🚗<span>B, B1</span></div>
        <div>🚚<span>C</span></div>
        <div>🚐<span>C1</span></div>
        <div>🚌<span>D</span></div>
        <div>🚜<span>T, S</span></div>
        <div>🚋<span>Tram</span></div>
    </div>
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
