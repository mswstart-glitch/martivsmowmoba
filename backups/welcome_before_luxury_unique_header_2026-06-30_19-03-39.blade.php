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



<style id="dm-unique-header-v1">
    body{
        background:#fbfdff !important;
    }

    .dm-topbar{
        position:fixed !important;
        top:0 !important;
        left:0 !important;
        right:0 !important;
        height:86px !important;
        z-index:9999 !important;
        background:rgba(255,255,255,.94) !important;
        border-bottom:1px solid #edf2f8 !important;
        box-shadow:0 12px 34px rgba(15,23,42,.04) !important;
        display:flex !important;
        align-items:center !important;
        justify-content:space-between !important;
        padding:0 34px !important;
    }

    .dm-logo{
        display:flex !important;
        align-items:center !important;
        gap:12px !important;
        color:#101d31 !important;
        min-width:230px !important;
    }

    .dm-logo-icon{
        width:48px !important;
        height:48px !important;
        border-radius:16px !important;
        display:grid !important;
        place-items:center !important;
        background:linear-gradient(135deg,#1487ff,#0755dc) !important;
        color:white !important;
        font-weight:1000 !important;
        font-size:23px !important;
        box-shadow:0 16px 34px rgba(20,111,255,.25) !important;
    }

    .dm-logo strong{
        display:block !important;
        font-size:20px !important;
        font-weight:1000 !important;
        letter-spacing:-.7px !important;
        line-height:1 !important;
    }

    .dm-logo small{
        display:block !important;
        margin-top:3px !important;
        color:#6d7a8b !important;
        font-size:13px !important;
        font-weight:850 !important;
    }

    .dm-menu{
        height:54px !important;
        display:flex !important;
        align-items:center !important;
        gap:8px !important;
        padding:5px !important;
        border-radius:18px !important;
        background:#f5f8fc !important;
        border:1px solid #e8eff7 !important;
    }

    .dm-menu a{
        height:44px !important;
        display:flex !important;
        align-items:center !important;
        padding:0 18px !important;
        border-radius:14px !important;
        color:#536174 !important;
        font-size:15px !important;
        font-weight:900 !important;
        transition:.18s ease !important;
    }

    .dm-menu a:hover{
        color:#0755dc !important;
        background:#fff !important;
        box-shadow:0 8px 20px rgba(15,23,42,.05) !important;
    }

    .dm-menu a.active{
        color:#fff !important;
        background:#17b26a !important;
        box-shadow:0 14px 28px rgba(23,178,106,.24) !important;
    }

    .dm-test-btn{
        height:52px !important;
        padding:0 22px !important;
        border-radius:16px !important;
        background:linear-gradient(135deg,#1487ff,#0755dc) !important;
        color:#fff !important;
        display:flex !important;
        align-items:center !important;
        justify-content:center !important;
        font-size:15px !important;
        font-weight:1000 !important;
        box-shadow:0 16px 34px rgba(20,111,255,.26) !important;
    }

    .dm-hero{
        position:relative !important;
        min-height:850px !important;
        padding:145px 34px 50px !important;
        overflow:hidden !important;
        background:
            radial-gradient(circle at 1px 1px, rgba(82,96,118,.25) 1.2px, transparent 1.4px) 0 0/32px 32px,
            linear-gradient(180deg,#ffffff 0%,#f8fbff 100%) !important;
    }

    .dm-hero:before{
        content:"" !important;
        position:absolute !important;
        inset:86px 0 0 0 !important;
        background:
            linear-gradient(90deg,rgba(20,111,255,.04) 1px,transparent 1px) 0 0/72px 72px,
            linear-gradient(0deg,rgba(20,111,255,.04) 1px,transparent 1px) 0 0/72px 72px !important;
        pointer-events:none !important;
    }

    .dm-hero-shell{
        width:min(1580px,100%) !important;
        margin:0 auto !important;
        position:relative !important;
        z-index:2 !important;
        display:grid !important;
        grid-template-columns:.92fr 1.08fr !important;
        gap:58px !important;
        align-items:center !important;
    }

    .dm-kicker{
        display:inline-flex !important;
        align-items:center !important;
        gap:9px !important;
        padding:10px 14px !important;
        border-radius:999px !important;
        background:#edf6ff !important;
        color:#0755dc !important;
        border:1px solid #cfe3ff !important;
        font-size:14px !important;
        font-weight:950 !important;
        margin-bottom:28px !important;
    }

    .dm-kicker:after{
        content:"" !important;
        width:8px !important;
        height:8px !important;
        border-radius:50% !important;
        background:#1487ff !important;
    }

    .dm-hero-copy h1{
        margin:0 0 28px !important;
        font-size:clamp(48px,5.5vw,82px) !important;
        line-height:.96 !important;
        letter-spacing:-3.6px !important;
        color:#101d31 !important;
        font-weight:1000 !important;
    }

    .dm-hero-copy h1 span{
        display:block !important;
        color:#116eea !important;
    }

    .dm-hero-copy p{
        max-width:700px !important;
        margin:0 0 22px !important;
        color:#667386 !important;
        font-size:20px !important;
        line-height:1.75 !important;
        font-weight:700 !important;
    }

    .dm-actions{
        display:flex !important;
        gap:14px !important;
        flex-wrap:wrap !important;
        margin-top:36px !important;
    }

    .dm-actions a{
        height:60px !important;
        padding:0 25px !important;
        border-radius:16px !important;
        display:inline-flex !important;
        align-items:center !important;
        justify-content:center !important;
        font-size:16px !important;
        font-weight:1000 !important;
    }

    .dm-primary{
        background:linear-gradient(135deg,#1487ff,#0755dc) !important;
        color:#fff !important;
        box-shadow:0 18px 38px rgba(20,111,255,.28) !important;
    }

    .dm-secondary{
        background:#fff !important;
        color:#243449 !important;
        border:1px solid #dbe6f3 !important;
        box-shadow:0 12px 30px rgba(15,23,42,.06) !important;
    }

    .dm-mini-stats{
        margin-top:46px !important;
        display:grid !important;
        grid-template-columns:repeat(3,1fr) !important;
        gap:14px !important;
        max-width:650px !important;
    }

    .dm-mini-stats div{
        padding:18px !important;
        border-radius:20px !important;
        background:#fff !important;
        border:1px solid #e8eff7 !important;
        box-shadow:0 16px 34px rgba(15,23,42,.05) !important;
    }

    .dm-mini-stats b{
        display:block !important;
        color:#101d31 !important;
        font-size:25px !important;
        letter-spacing:-.8px !important;
    }

    .dm-mini-stats span{
        color:#6d7a8b !important;
        font-weight:850 !important;
        font-size:13px !important;
    }

    .dm-visual{
        position:relative !important;
        min-height:560px !important;
    }

    .dm-blue-shape{
        position:absolute !important;
        right:180px !important;
        top:0 !important;
        width:470px !important;
        height:480px !important;
        border-radius:48% 52% 54% 46% / 42% 44% 56% 58% !important;
        background:
            linear-gradient(rgba(5,32,79,.82),rgba(5,32,79,.82)),
            url("/autoschool/images/hero-driving-school.webp") center/cover no-repeat !important;
        border:5px solid #116eea !important;
        box-shadow:0 30px 80px rgba(17,110,234,.20) !important;
        overflow:hidden !important;
    }

    .dm-blue-shape:before{
        content:"" !important;
        position:absolute !important;
        inset:0 !important;
        background:
            radial-gradient(circle at 30% 30%,rgba(255,255,255,.16),transparent 28%),
            linear-gradient(90deg,rgba(255,255,255,.05) 1px,transparent 1px) 0 0/42px 42px,
            linear-gradient(0deg,rgba(255,255,255,.05) 1px,transparent 1px) 0 0/42px 42px !important;
    }

    .dm-route{
        position:absolute !important;
        left:170px !important;
        top:64px !important;
        width:150px !important;
        height:310px !important;
        border-left:8px solid #5db2ff !important;
        border-bottom:8px solid #5db2ff !important;
        border-top:8px solid #5db2ff !important;
        border-radius:34px !important;
        transform:rotate(13deg) skewY(-12deg) !important;
        filter:drop-shadow(0 0 10px rgba(93,178,255,.9)) !important;
        z-index:3 !important;
    }

    .dm-pin{
        position:absolute !important;
        width:22px !important;
        height:22px !important;
        border-radius:50% !important;
        background:#fff !important;
        border:6px solid #1487ff !important;
        z-index:4 !important;
        box-shadow:0 0 0 8px rgba(20,111,255,.15) !important;
    }

    .pin-a{left:180px;top:72px}
    .pin-b{left:252px;top:232px}
    .pin-c{left:198px;top:365px}

    .dm-car-card{
        position:absolute !important;
        right:0 !important;
        bottom:42px !important;
        width:600px !important;
        height:315px !important;
        border-radius:36px !important;
        overflow:hidden !important;
        background:#fff !important;
        box-shadow:0 32px 80px rgba(15,23,42,.18) !important;
        border:1px solid #edf2f8 !important;
    }

    .dm-car-card img{
        width:100% !important;
        height:100% !important;
        object-fit:cover !important;
        object-position:center !important;
        display:block !important;
    }

    .dm-floating-card{
        position:absolute !important;
        z-index:5 !important;
        width:250px !important;
        padding:17px 18px !important;
        border-radius:20px !important;
        background:rgba(255,255,255,.92) !important;
        border:1px solid #e5edf7 !important;
        box-shadow:0 22px 50px rgba(15,23,42,.11) !important;
        backdrop-filter:blur(14px) !important;
    }

    .dm-floating-card b{
        display:block !important;
        color:#101d31 !important;
        font-size:16px !important;
        font-weight:1000 !important;
        margin-bottom:5px !important;
    }

    .dm-floating-card span{
        color:#6d7a8b !important;
        font-size:13px !important;
        font-weight:800 !important;
        line-height:1.45 !important;
    }

    .card-safe{
        left:40px !important;
        bottom:88px !important;
    }

    .card-exam{
        right:78px !important;
        top:74px !important;
    }

    .dm-category-strip{
        width:min(1580px,calc(100% - 68px)) !important;
        margin:36px auto 0 !important;
        position:relative !important;
        z-index:3 !important;
        display:grid !important;
        grid-template-columns:repeat(8,1fr) !important;
        gap:14px !important;
    }

    .dm-category-strip div{
        height:104px !important;
        border-radius:22px !important;
        background:#fff !important;
        border:1px solid #e3edf8 !important;
        box-shadow:0 16px 32px rgba(15,23,42,.045) !important;
        display:flex !important;
        flex-direction:column !important;
        align-items:center !important;
        justify-content:center !important;
        gap:9px !important;
        color:#101d31 !important;
    }

    .dm-category-strip span{
        font-size:28px !important;
    }

    .dm-category-strip b{
        font-size:16px !important;
        font-weight:950 !important;
    }

    @media(max-width:1050px){
        .dm-menu a:not(.active){
            display:none !important;
        }

        .dm-test-btn{
            display:none !important;
        }

        .dm-hero-shell{
            grid-template-columns:1fr !important;
        }

        .dm-visual{
            min-height:480px !important;
        }

        .dm-category-strip{
            grid-template-columns:repeat(2,1fr) !important;
        }
    }

    @media(max-width:680px){
        .dm-topbar{
            height:76px !important;
            padding:0 14px !important;
        }

        .dm-logo{
            min-width:auto !important;
        }

        .dm-logo strong{
            font-size:16px !important;
        }

        .dm-logo small{
            font-size:12px !important;
        }

        .dm-hero{
            padding:112px 18px 42px !important;
        }

        .dm-hero-copy h1{
            font-size:42px !important;
            letter-spacing:-2px !important;
        }

        .dm-hero-copy p{
            font-size:17px !important;
        }

        .dm-mini-stats{
            grid-template-columns:1fr !important;
        }

        .dm-blue-shape{
            width:300px !important;
            height:300px !important;
            right:40px !important;
        }

        .dm-car-card{
            width:330px !important;
            height:210px !important;
            right:0 !important;
        }

        .dm-floating-card{
            display:none !important;
        }
    }
</style>

</head>

<body>



<nav class="dm-topbar">
    <a href="/autoschool" class="dm-logo">
        <span class="dm-logo-icon">D</span>
        <span>
            <strong>DM Drive</strong>
            <small>Academy</small>
        </span>
    </a>

    <div class="dm-menu">
        <a class="active" href="/autoschool">მთავარი</a>
        <a href="#program">კურსები</a>
        <a href="/autoschool/exam">გამოცდა</a>
        <a href="#process">პროცესი</a>
        <a href="#contact">კონტაქტი</a>
    </div>

    <a class="dm-test-btn" href="/autoschool/exam">ტესტის დაწყება</a>
</nav>






<header class="dm-hero">
    <div class="dm-hero-shell">
        <div class="dm-hero-copy">
            <div class="dm-kicker">პროფესიონალური მომზადება მართვის მოწმობისთვის</div>

            <h1>
                ისწავლე მართვა
                <span>სწორად და მშვიდად</span>
            </h1>

            <p>
                DM Drive Academy აერთიანებს თეორიას, პრაქტიკულ გაკვეთილებს და გამოცდის
                სიმულაციას ერთ თანამედროვე სასწავლო სივრცეში.
            </p>

            <div class="dm-actions">
                <a href="/autoschool/exam" class="dm-primary">დაიწყე ტესტი</a>
                <a href="#program" class="dm-secondary">ნახე კურსი</a>
            </div>

            <div class="dm-mini-stats">
                <div><b>24/7</b><span>ონლაინ თეორია</span></div>
                <div><b>500+</b><span>საგამოცდო კითხვა</span></div>
                <div><b>1:1</b><span>პრაქტიკა</span></div>
            </div>
        </div>

        <div class="dm-visual">
            <div class="dm-blue-shape">
                <div class="dm-route"></div>
                <span class="dm-pin pin-a"></span>
                <span class="dm-pin pin-b"></span>
                <span class="dm-pin pin-c"></span>
            </div>

            <div class="dm-car-card">
                <img src="/autoschool/images/hero-driving-school.webp" alt="DM ავტოსკოლა">
            </div>

            <div class="dm-floating-card card-safe">
                <b>უსაფრთხოება</b>
                <span>პრაქტიკული სწავლება რეალურ პირობებში</span>
            </div>

            <div class="dm-floating-card card-exam">
                <b>Exam Mode</b>
                <span>ტესტები რეალური ფორმატით</span>
            </div>
        </div>
    </div>

    <div class="dm-category-strip">
        <div><span>🏍️</span><b>AM</b></div>
        <div><span>🏍️</span><b>A / A1</b></div>
        <div><span>🚗</span><b>B / B1</b></div>
        <div><span>🚚</span><b>C</b></div>
        <div><span>🚐</span><b>C1</b></div>
        <div><span>🚌</span><b>D</b></div>
        <div><span>🚜</span><b>T / S</b></div>
        <div><span>🚋</span><b>Tram</b></div>
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
