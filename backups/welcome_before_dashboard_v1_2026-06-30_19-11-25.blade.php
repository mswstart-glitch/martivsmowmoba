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




<style id="luxury-unique-header-v1">
    body{
        background:#f5f7fb !important;
    }

    .lux-nav{
        position:fixed !important;
        top:24px !important;
        left:50% !important;
        transform:translateX(-50%) !important;
        width:min(1180px, calc(100% - 36px)) !important;
        height:74px !important;
        z-index:9999 !important;
        padding:9px 10px 9px 16px !important;
        border-radius:26px !important;
        display:flex !important;
        align-items:center !important;
        justify-content:space-between !important;
        background:rgba(9,20,36,.82) !important;
        border:1px solid rgba(255,255,255,.12) !important;
        backdrop-filter:blur(22px) saturate(170%) !important;
        box-shadow:0 26px 70px rgba(7,18,36,.28) !important;
    }

    .lux-brand{
        display:flex !important;
        align-items:center !important;
        gap:12px !important;
        color:white !important;
    }

    .lux-brand span{
        width:46px !important;
        height:46px !important;
        border-radius:16px !important;
        display:grid !important;
        place-items:center !important;
        background:linear-gradient(135deg,#4f9cff,#0b58e8) !important;
        font-weight:1000 !important;
        box-shadow:0 14px 34px rgba(32,111,255,.35) !important;
    }

    .lux-brand b{
        font-size:17px !important;
        letter-spacing:-.4px !important;
    }

    .lux-menu{
        display:flex !important;
        align-items:center !important;
        gap:4px !important;
    }

    .lux-menu a{
        height:46px !important;
        padding:0 17px !important;
        border-radius:16px !important;
        display:flex !important;
        align-items:center !important;
        color:rgba(255,255,255,.68) !important;
        font-size:14px !important;
        font-weight:850 !important;
    }

    .lux-menu a:hover{
        background:rgba(255,255,255,.08) !important;
        color:white !important;
    }

    .lux-nav-btn{
        height:52px !important;
        padding:0 24px !important;
        border-radius:18px !important;
        display:flex !important;
        align-items:center !important;
        color:white !important;
        font-weight:1000 !important;
        background:linear-gradient(135deg,#4f9cff,#0b58e8) !important;
        box-shadow:0 16px 34px rgba(32,111,255,.34) !important;
    }

    .lux-hero{
        min-height:940px !important;
        padding:135px 28px 58px !important;
        position:relative !important;
        overflow:hidden !important;
        background:
            radial-gradient(circle at 15% 16%, rgba(32,111,255,.14), transparent 30%),
            radial-gradient(circle at 90% 12%, rgba(9,20,36,.12), transparent 28%),
            linear-gradient(180deg,#ffffff 0%,#f4f7fb 100%) !important;
    }

    .lux-hero:before{
        content:"" !important;
        position:absolute !important;
        inset:0 !important;
        background:
            linear-gradient(90deg, rgba(15,32,58,.035) 1px, transparent 1px) 0 0/80px 80px,
            linear-gradient(0deg, rgba(15,32,58,.035) 1px, transparent 1px) 0 0/80px 80px !important;
        pointer-events:none !important;
    }

    .lux-shell{
        width:min(1220px, 100%) !important;
        margin:0 auto !important;
        position:relative !important;
        z-index:2 !important;
        display:grid !important;
        grid-template-columns:.92fr 1.08fr !important;
        gap:54px !important;
        align-items:center !important;
    }

    .lux-badge{
        width:max-content !important;
        max-width:100% !important;
        padding:11px 15px !important;
        border-radius:999px !important;
        background:#eef5ff !important;
        border:1px solid #d8e8ff !important;
        color:#0b58e8 !important;
        font-size:14px !important;
        font-weight:950 !important;
        margin-bottom:26px !important;
    }

    .lux-left h1{
        margin:0 0 24px !important;
        color:#08172b !important;
        font-size:clamp(48px,5vw,82px) !important;
        line-height:.93 !important;
        letter-spacing:-4px !important;
        font-weight:1000 !important;
        max-width:650px !important;
    }

    .lux-left p{
        margin:0 !important;
        max-width:610px !important;
        color:#68778a !important;
        font-size:19px !important;
        line-height:1.75 !important;
        font-weight:700 !important;
    }

    .lux-actions{
        margin-top:34px !important;
        display:flex !important;
        gap:13px !important;
        flex-wrap:wrap !important;
    }

    .lux-actions a{
        height:58px !important;
        padding:0 24px !important;
        border-radius:18px !important;
        display:inline-flex !important;
        align-items:center !important;
        font-size:16px !important;
        font-weight:1000 !important;
    }

    .lux-primary{
        background:#08172b !important;
        color:#fff !important;
        box-shadow:0 18px 42px rgba(8,23,43,.24) !important;
    }

    .lux-secondary{
        background:#fff !important;
        color:#08172b !important;
        border:1px solid #dde7f2 !important;
        box-shadow:0 14px 34px rgba(15,23,42,.06) !important;
    }

    .lux-metrics{
        margin-top:50px !important;
        display:grid !important;
        grid-template-columns:repeat(3,1fr) !important;
        gap:14px !important;
        max-width:620px !important;
    }

    .lux-metrics div{
        padding:20px !important;
        border-radius:24px !important;
        background:#fff !important;
        border:1px solid #e7eef7 !important;
        box-shadow:0 18px 44px rgba(15,23,42,.055) !important;
    }

    .lux-metrics b{
        display:block !important;
        font-size:30px !important;
        letter-spacing:-1px !important;
        color:#08172b !important;
    }

    .lux-metrics span{
        display:block !important;
        margin-top:4px !important;
        color:#718093 !important;
        font-size:13px !important;
        font-weight:850 !important;
    }

    .lux-right{
        min-height:610px !important;
        position:relative !important;
    }

    .lux-photo{
        position:absolute !important;
        right:0 !important;
        top:40px !important;
        width:660px !important;
        height:460px !important;
        border-radius:44px !important;
        overflow:hidden !important;
        background:#08172b !important;
        box-shadow:0 38px 100px rgba(8,23,43,.24) !important;
    }

    .lux-photo:after{
        content:"" !important;
        position:absolute !important;
        inset:0 !important;
        background:
            linear-gradient(135deg, rgba(8,23,43,.40), rgba(8,23,43,.03)),
            radial-gradient(circle at 20% 20%, rgba(79,156,255,.18), transparent 32%) !important;
    }

    .lux-photo img{
        width:100% !important;
        height:100% !important;
        object-fit:cover !important;
        display:block !important;
    }

    .lux-panel{
        position:absolute !important;
        left:0 !important;
        bottom:18px !important;
        width:360px !important;
        padding:22px !important;
        border-radius:30px !important;
        background:rgba(255,255,255,.88) !important;
        border:1px solid rgba(255,255,255,.75) !important;
        backdrop-filter:blur(18px) !important;
        box-shadow:0 28px 70px rgba(8,23,43,.18) !important;
        z-index:4 !important;
    }

    .panel-top{
        display:flex !important;
        justify-content:space-between !important;
        align-items:center !important;
        margin-bottom:18px !important;
    }

    .panel-top span{
        color:#0b58e8 !important;
        font-weight:1000 !important;
        font-size:13px !important;
    }

    .panel-top b{
        width:34px !important;
        height:34px !important;
        border-radius:12px !important;
        background:#eef5ff !important;
        color:#0b58e8 !important;
        display:grid !important;
        place-items:center !important;
    }

    .lux-panel h3{
        margin:0 0 16px !important;
        font-size:23px !important;
        line-height:1.2 !important;
        letter-spacing:-.6px !important;
        color:#08172b !important;
    }

    .panel-option{
        height:46px !important;
        border-radius:15px !important;
        background:#f4f7fb !important;
        border:1px solid #e4ecf6 !important;
        display:flex !important;
        align-items:center !important;
        padding:0 14px !important;
        margin-top:9px !important;
        color:#617185 !important;
        font-weight:850 !important;
        font-size:14px !important;
    }

    .panel-option.active{
        color:#fff !important;
        background:linear-gradient(135deg,#4f9cff,#0b58e8) !important;
        border-color:transparent !important;
        box-shadow:0 14px 30px rgba(32,111,255,.28) !important;
    }

    .lux-route-card{
        position:absolute !important;
        right:36px !important;
        bottom:38px !important;
        width:270px !important;
        padding:18px !important;
        border-radius:26px !important;
        background:rgba(8,23,43,.86) !important;
        color:#fff !important;
        border:1px solid rgba(255,255,255,.12) !important;
        box-shadow:0 24px 60px rgba(8,23,43,.24) !important;
        display:flex !important;
        align-items:center !important;
        gap:14px !important;
        z-index:5 !important;
    }

    .lux-route-card span{
        width:44px !important;
        height:44px !important;
        border-radius:16px !important;
        background:linear-gradient(135deg,#4f9cff,#0b58e8) !important;
        position:relative !important;
        flex:0 0 auto !important;
    }

    .lux-route-card span:after{
        content:"" !important;
        position:absolute !important;
        width:20px !important;
        height:20px !important;
        border:3px solid #fff !important;
        border-radius:50% !important;
        left:50% !important;
        top:50% !important;
        transform:translate(-50%,-50%) !important;
    }

    .lux-route-card b{
        display:block !important;
        font-size:15px !important;
        margin-bottom:3px !important;
    }

    .lux-route-card small{
        display:block !important;
        color:rgba(255,255,255,.68) !important;
        font-weight:750 !important;
    }

    .lux-categories{
        width:min(1220px, calc(100% - 56px)) !important;
        margin:36px auto 0 !important;
        position:relative !important;
        z-index:3 !important;
        display:grid !important;
        grid-template-columns:repeat(7,1fr) !important;
        gap:12px !important;
    }

    .lux-categories div{
        height:82px !important;
        display:flex !important;
        align-items:center !important;
        justify-content:center !important;
        border-radius:22px !important;
        background:#fff !important;
        border:1px solid #e4ecf6 !important;
        color:#08172b !important;
        font-size:16px !important;
        font-weight:1000 !important;
        box-shadow:0 14px 32px rgba(15,23,42,.045) !important;
    }

    @media(max-width:1050px){
        .lux-menu{display:none!important}
        .lux-shell{grid-template-columns:1fr!important}
        .lux-right{min-height:540px!important}
        .lux-photo{width:100%!important}
        .lux-categories{grid-template-columns:repeat(2,1fr)!important}
    }

    @media(max-width:680px){
        .lux-nav{
            top:12px!important;
            width:calc(100% - 22px)!important;
            height:66px!important;
            border-radius:22px!important;
        }

        .lux-brand b{font-size:14px!important}
        .lux-nav-btn{height:46px!important;padding:0 16px!important;font-size:13px!important}

        .lux-hero{
            padding:100px 18px 42px!important;
        }

        .lux-left h1{
            font-size:42px!important;
            letter-spacing:-2.2px!important;
        }

        .lux-left p{font-size:16px!important}
        .lux-metrics{grid-template-columns:1fr!important}
        .lux-photo{height:320px!important;border-radius:30px!important}
        .lux-panel{position:relative!important;width:100%!important;margin-top:340px!important}
        .lux-route-card{display:none!important}
    }
</style>

</head>

<body>




<nav class="lux-nav">
    <a href="/autoschool" class="lux-brand">
        <span>DM</span>
        <b>Drive Academy</b>
    </a>

    <div class="lux-menu">
        <a href="#program">პროგრამა</a>
        <a href="/autoschool/exam">გამოცდა</a>
        <a href="#process">პროცესი</a>
        <a href="#contact">კონტაქტი</a>
    </div>

    <a href="/autoschool/exam" class="lux-nav-btn">დაიწყე</a>
</nav>








<header class="lux-hero">
    <div class="lux-shell">
        <div class="lux-left">
            <div class="lux-badge">A კატეგორია • თეორია • პრაქტიკა</div>

            <h1>მართვის სწავლა ახალი სტანდარტით</h1>

            <p>
                თანამედროვე ავტოსკოლა, სადაც თეორია, პრაქტიკული მომზადება და გამოცდის
                სიმულაცია ერთ სისტემაშია გაერთიანებული.
            </p>

            <div class="lux-actions">
                <a href="/autoschool/exam" class="lux-primary">ტესტის დაწყება</a>
                <a href="#program" class="lux-secondary">პროგრამის ნახვა</a>
            </div>

            <div class="lux-metrics">
                <div><b>24/7</b><span>ონლაინ ტესტები</span></div>
                <div><b>500+</b><span>კითხვა</span></div>
                <div><b>95%</b><span>მზადება</span></div>
            </div>
        </div>

        <div class="lux-right">
            <div class="lux-photo">
                <img src="/autoschool/images/hero-driving-school.webp" alt="DM ავტოსკოლა">
            </div>

            <div class="lux-panel">
                <div class="panel-top">
                    <span>Exam Preview</span>
                    <b>A</b>
                </div>

                <h3>რას ნიშნავს ეს ნიშანი?</h3>

                <div class="panel-option">სიჩქარის შეზღუდვა</div>
                <div class="panel-option active">მოძრაობის მიმართულება</div>
                <div class="panel-option">გაჩერება აკრძალულია</div>
            </div>

            <div class="lux-route-card">
                <span></span>
                <div>
                    <b>Smart Route</b>
                    <small>ქალაქში პრაქტიკული მოძრაობა</small>
                </div>
            </div>
        </div>
    </div>

    <div class="lux-categories">
        <div>AM</div>
        <div>A / A1</div>
        <div>B / B1</div>
        <div>C</div>
        <div>C1</div>
        <div>D</div>
        <div>T / S</div>
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
