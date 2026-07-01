<!DOCTYPE html>
<html lang="ka">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>DM Drive Academy</title>

<style>
*{box-sizing:border-box}
html{scroll-behavior:smooth}
body{
    margin:0;
    font-family:system-ui,-apple-system,BlinkMacSystemFont,"Segoe UI",sans-serif;
    background:#f6f9ff;
    color:#0b1220;
    overflow-x:hidden;
}
a{text-decoration:none;color:inherit}

:root{
    --blue:#156cff;
    --blue2:#0b57e8;
    --dark:#0b1220;
    --muted:#64748b;
    --line:#e6edf7;
    --soft:#f6f9ff;
}

.nav{
    position:fixed;
    top:20px;
    left:50%;
    transform:translateX(-50%);
    width:min(1180px,calc(100% - 34px));
    height:72px;
    z-index:50;
    padding:9px 10px 9px 16px;
    border-radius:24px;
    display:flex;
    align-items:center;
    justify-content:space-between;
    background:rgba(255,255,255,.82);
    border:1px solid rgba(255,255,255,.9);
    backdrop-filter:blur(24px);
    box-shadow:0 22px 60px rgba(15,35,70,.10);
}
.brand{
    display:flex;
    align-items:center;
    gap:12px;
    font-weight:1000;
}
.brand-icon{
    width:46px;
    height:46px;
    border-radius:16px;
    display:grid;
    place-items:center;
    background:linear-gradient(135deg,#1c7dff,#0b57e8);
    color:#fff;
    box-shadow:0 16px 34px rgba(21,108,255,.28);
}
.menu{
    display:flex;
    align-items:center;
    gap:4px;
}
.menu a{
    height:46px;
    padding:0 16px;
    border-radius:16px;
    display:flex;
    align-items:center;
    color:#5f6f84;
    font-size:14px;
    font-weight:900;
}
.menu a:hover{background:#edf5ff;color:var(--blue)}
.nav-cta{
    height:52px;
    padding:0 22px;
    border-radius:18px;
    display:flex;
    align-items:center;
    color:#fff!important;
    background:linear-gradient(135deg,#1c7dff,#0b57e8);
    font-weight:1000!important;
    box-shadow:0 16px 34px rgba(21,108,255,.30);
}

.hero{
    min-height:100vh;
    padding:132px 24px 70px;
    position:relative;
    overflow:hidden;
    background:
        radial-gradient(circle at 16% 20%,rgba(21,108,255,.13),transparent 32%),
        radial-gradient(circle at 82% 18%,rgba(11,18,32,.08),transparent 28%),
        linear-gradient(180deg,#fff 0%,#f6f9ff 100%);
}
.hero:before{
    content:"";
    position:absolute;
    inset:0;
    background:
        linear-gradient(90deg,rgba(21,108,255,.045) 1px,transparent 1px) 0 0/80px 80px,
        linear-gradient(0deg,rgba(21,108,255,.045) 1px,transparent 1px) 0 0/80px 80px;
    pointer-events:none;
}
.shell{
    position:relative;
    z-index:2;
    width:min(1180px,100%);
    margin:0 auto;
    display:grid;
    grid-template-columns:.9fr 1.1fr;
    gap:54px;
    align-items:center;
}
.kicker{
    display:inline-flex;
    align-items:center;
    gap:9px;
    padding:10px 15px;
    border-radius:999px;
    background:#edf5ff;
    color:var(--blue);
    border:1px solid #d9e8ff;
    font-size:14px;
    font-weight:1000;
    margin-bottom:24px;
}
.kicker span{
    width:9px;
    height:9px;
    border-radius:50%;
    background:var(--blue);
    box-shadow:0 0 0 7px rgba(21,108,255,.13);
}
h1{
    margin:0 0 22px;
    font-size:clamp(50px,5.8vw,86px);
    line-height:.92;
    letter-spacing:-4px;
    color:var(--dark);
    max-width:680px;
}
h1 b{
    color:var(--blue);
}
.lead{
    margin:0;
    max-width:640px;
    font-size:19px;
    line-height:1.75;
    color:var(--muted);
    font-weight:700;
}
.actions{
    display:flex;
    gap:13px;
    flex-wrap:wrap;
    margin-top:34px;
}
.btn{
    height:58px;
    padding:0 24px;
    border-radius:18px;
    display:inline-flex;
    align-items:center;
    justify-content:center;
    font-weight:1000;
}
.btn.primary{
    background:#0b1220;
    color:#fff;
    box-shadow:0 18px 42px rgba(11,18,32,.22);
}
.btn.secondary{
    background:#fff;
    color:#0b1220;
    border:1px solid var(--line);
    box-shadow:0 14px 34px rgba(15,35,70,.06);
}

.mini{
    margin-top:44px;
    display:grid;
    grid-template-columns:repeat(3,1fr);
    gap:12px;
    max-width:640px;
}
.mini div{
    padding:18px;
    border-radius:22px;
    background:#fff;
    border:1px solid var(--line);
    box-shadow:0 16px 34px rgba(15,35,70,.05);
}
.mini b{
    display:block;
    font-size:26px;
    letter-spacing:-1px;
}
.mini span{
    color:#718096;
    font-size:13px;
    font-weight:850;
}

.dashboard-wrap{
    position:relative;
    min-height:620px;
}
.car-card{
    position:absolute;
    right:0;
    top:20px;
    width:620px;
    height:330px;
    border-radius:38px;
    overflow:hidden;
    background:#111827;
    box-shadow:0 36px 90px rgba(11,18,32,.24);
}
.car-card img{
    width:100%;
    height:100%;
    object-fit:cover;
    display:block;
}
.car-card:after{
    content:"";
    position:absolute;
    inset:0;
    background:linear-gradient(135deg,rgba(11,18,32,.34),rgba(11,18,32,.02));
}

.dashboard{
    position:absolute;
    left:0;
    bottom:0;
    width:500px;
    min-height:390px;
    border-radius:38px;
    padding:28px;
    background:rgba(11,18,32,.92);
    color:#fff;
    border:1px solid rgba(255,255,255,.12);
    backdrop-filter:blur(20px);
    box-shadow:0 34px 90px rgba(11,18,32,.30);
}
.dash-top{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:26px;
}
.dash-top span{
    color:#93c5fd;
    font-size:13px;
    font-weight:1000;
    letter-spacing:.8px;
}
.dash-top b{
    width:42px;
    height:42px;
    border-radius:15px;
    display:grid;
    place-items:center;
    background:#156cff;
}
.speed{
    display:flex;
    align-items:flex-end;
    gap:12px;
    margin-bottom:14px;
}
.speed strong{
    font-size:86px;
    line-height:.8;
    letter-spacing:-5px;
}
.speed small{
    color:#94a3b8;
    font-weight:900;
    margin-bottom:10px;
}
.progress{
    height:12px;
    border-radius:999px;
    background:rgba(255,255,255,.12);
    overflow:hidden;
    margin:24px 0;
}
.progress span{
    display:block;
    width:76%;
    height:100%;
    border-radius:999px;
    background:linear-gradient(90deg,#60a5fa,#156cff);
    box-shadow:0 0 24px rgba(21,108,255,.70);
}
.checks{
    display:grid;
    gap:10px;
}
.check{
    display:flex;
    justify-content:space-between;
    align-items:center;
    padding:13px 14px;
    border-radius:16px;
    background:rgba(255,255,255,.07);
    color:#dbeafe;
    font-weight:850;
}
.check em{
    font-style:normal;
    color:#60a5fa;
}

.float-card{
    position:absolute;
    z-index:4;
    width:230px;
    padding:17px;
    border-radius:22px;
    background:rgba(255,255,255,.88);
    border:1px solid rgba(255,255,255,.8);
    backdrop-filter:blur(18px);
    box-shadow:0 22px 54px rgba(15,35,70,.13);
}
.float-card b{
    display:block;
    margin-bottom:5px;
}
.float-card span{
    color:#718096;
    font-size:13px;
    line-height:1.45;
    font-weight:800;
}
.f1{right:24px;bottom:122px}
.f2{right:300px;top:0}

.section{
    padding:96px 24px;
    background:#fff;
}
.section.alt{background:#f6f9ff}
.container{
    width:min(1180px,100%);
    margin:0 auto;
}
.title{
    max-width:760px;
    margin-bottom:34px;
}
.title small{
    color:var(--blue);
    font-weight:1000;
}
.title h2{
    margin:9px 0 0;
    font-size:clamp(34px,4.4vw,58px);
    line-height:.98;
    letter-spacing:-2.4px;
}
.cards{
    display:grid;
    grid-template-columns:repeat(3,1fr);
    gap:18px;
}
.card{
    min-height:245px;
    padding:28px;
    border-radius:30px;
    background:#fff;
    border:1px solid var(--line);
    box-shadow:0 22px 60px rgba(15,35,70,.07);
}
.icon{
    width:54px;
    height:54px;
    border-radius:19px;
    display:grid;
    place-items:center;
    background:#edf5ff;
    color:var(--blue);
    font-weight:1000;
    margin-bottom:22px;
}
.card h3{
    margin:0 0 10px;
    font-size:23px;
}
.card p{
    margin:0;
    color:var(--muted);
    line-height:1.68;
}

.timeline{
    display:grid;
    grid-template-columns:repeat(4,1fr);
    gap:16px;
}
.step{
    padding:24px;
    border-radius:28px;
    background:#fff;
    border:1px solid var(--line);
    box-shadow:0 20px 50px rgba(15,35,70,.06);
}
.step b{
    width:46px;
    height:46px;
    display:grid;
    place-items:center;
    border-radius:16px;
    color:#fff;
    background:#0b1220;
    margin-bottom:18px;
}
.step h3{margin:0 0 8px}
.step p{margin:0;color:var(--muted);line-height:1.6}

.cta{
    padding:44px;
    border-radius:36px;
    background:linear-gradient(135deg,#0b1220,#12346b);
    color:#fff;
    display:flex;
    justify-content:space-between;
    align-items:center;
    gap:24px;
    box-shadow:0 34px 90px rgba(11,18,32,.24);
}
.cta h2{
    margin:0 0 10px;
    font-size:clamp(32px,4vw,48px);
    letter-spacing:-1.8px;
}
.cta p{
    margin:0;
    color:rgba(255,255,255,.75);
}
.cta a{
    height:58px;
    padding:0 24px;
    border-radius:18px;
    display:flex;
    align-items:center;
    background:#fff;
    color:#0b1220;
    font-weight:1000;
    white-space:nowrap;
}

@media(max-width:1000px){
    .menu{display:none}
    .shell{grid-template-columns:1fr}
    .dashboard-wrap{min-height:720px}
    .car-card{width:100%}
    .dashboard{width:min(500px,100%)}
    .cards,.timeline{grid-template-columns:1fr}
}
@media(max-width:680px){
    .nav{top:12px;width:calc(100% - 22px);height:66px;border-radius:22px}
    .brand b{font-size:14px}
    .nav-cta{height:46px;padding:0 16px;font-size:13px}
    .hero{padding:102px 18px 54px}
    h1{font-size:42px;letter-spacing:-2.2px}
    .lead{font-size:16px}
    .mini{grid-template-columns:1fr}
    .dashboard-wrap{min-height:650px}
    .car-card{height:260px;border-radius:28px}
    .dashboard{top:280px;bottom:auto;border-radius:28px}
    .speed strong{font-size:64px}
    .float-card{display:none}
    .section{padding:74px 18px}
    .cta{flex-direction:column;align-items:flex-start;padding:32px}
}
</style>

<style id="command-center-header-v1">
    body{
        background:#f4f7fb !important;
    }

    .cmd-nav{
        position:fixed !important;
        top:22px !important;
        left:50% !important;
        transform:translateX(-50%) !important;
        width:min(1180px, calc(100% - 34px)) !important;
        height:74px !important;
        z-index:99999 !important;
        padding:9px 10px 9px 14px !important;
        border-radius:26px !important;
        display:flex !important;
        align-items:center !important;
        justify-content:space-between !important;
        background:rgba(255,255,255,.88) !important;
        border:1px solid rgba(255,255,255,.95) !important;
        backdrop-filter:blur(22px) !important;
        box-shadow:0 26px 80px rgba(15,35,70,.12) !important;
    }

    .cmd-brand{
        display:flex !important;
        align-items:center !important;
        gap:12px !important;
        color:#0b1220 !important;
    }

    .cmd-brand > span{
        width:48px !important;
        height:48px !important;
        border-radius:17px !important;
        display:grid !important;
        place-items:center !important;
        background:#0b1220 !important;
        color:#fff !important;
        font-weight:1000 !important;
        box-shadow:0 16px 38px rgba(11,18,32,.22) !important;
    }

    .cmd-brand b{
        display:block !important;
        font-size:17px !important;
        letter-spacing:-.5px !important;
    }

    .cmd-brand small{
        display:block !important;
        margin-top:2px !important;
        color:#718096 !important;
        font-size:12px !important;
        font-weight:800 !important;
    }

    .cmd-menu{
        display:flex !important;
        align-items:center !important;
        gap:5px !important;
        height:52px !important;
        padding:5px !important;
        border-radius:20px !important;
        background:#f2f6fb !important;
        border:1px solid #e8eef6 !important;
    }

    .cmd-menu a{
        height:42px !important;
        padding:0 16px !important;
        border-radius:15px !important;
        display:flex !important;
        align-items:center !important;
        color:#5f6f84 !important;
        font-size:14px !important;
        font-weight:900 !important;
    }

    .cmd-menu a:hover{
        background:#fff !important;
        color:#156cff !important;
    }

    .cmd-start{
        height:52px !important;
        padding:0 22px !important;
        border-radius:18px !important;
        display:flex !important;
        align-items:center !important;
        color:#fff !important;
        background:linear-gradient(135deg,#156cff,#073fd2) !important;
        font-weight:1000 !important;
        box-shadow:0 16px 36px rgba(21,108,255,.32) !important;
    }

    .cmd-hero{
        position:relative !important;
        min-height:930px !important;
        padding:138px 24px 70px !important;
        overflow:hidden !important;
        background:
            radial-gradient(circle at 12% 18%,rgba(21,108,255,.15),transparent 32%),
            radial-gradient(circle at 84% 20%,rgba(11,18,32,.10),transparent 32%),
            linear-gradient(180deg,#fff 0%,#f4f7fb 100%) !important;
    }

    .cmd-hero:before{
        content:"" !important;
        position:absolute !important;
        inset:0 !important;
        pointer-events:none !important;
        background:
            linear-gradient(90deg,rgba(21,108,255,.045) 1px,transparent 1px) 0 0/82px 82px,
            linear-gradient(0deg,rgba(21,108,255,.045) 1px,transparent 1px) 0 0/82px 82px !important;
    }

    .cmd-bg-orb{
        position:absolute !important;
        border-radius:50% !important;
        filter:blur(50px) !important;
        pointer-events:none !important;
    }

    .orb-one{
        width:360px !important;
        height:360px !important;
        background:rgba(21,108,255,.16) !important;
        left:6% !important;
        top:18% !important;
    }

    .orb-two{
        width:420px !important;
        height:420px !important;
        background:rgba(11,18,32,.09) !important;
        right:8% !important;
        top:14% !important;
    }

    .cmd-shell{
        position:relative !important;
        z-index:2 !important;
        width:min(1180px,100%) !important;
        margin:0 auto !important;
        display:grid !important;
        grid-template-columns:.9fr 1.1fr !important;
        gap:58px !important;
        align-items:center !important;
    }

    .cmd-kicker{
        width:max-content !important;
        max-width:100% !important;
        padding:11px 15px !important;
        border-radius:999px !important;
        display:flex !important;
        align-items:center !important;
        gap:10px !important;
        background:#eef5ff !important;
        border:1px solid #d7e7ff !important;
        color:#156cff !important;
        font-size:14px !important;
        font-weight:1000 !important;
        margin-bottom:28px !important;
    }

    .cmd-kicker span{
        width:9px !important;
        height:9px !important;
        border-radius:50% !important;
        background:#156cff !important;
        box-shadow:0 0 0 7px rgba(21,108,255,.13) !important;
    }

    .cmd-copy h1{
        margin:0 0 24px !important;
        max-width:670px !important;
        font-size:clamp(54px,6.3vw,94px) !important;
        line-height:.87 !important;
        letter-spacing:-4.8px !important;
        color:#0b1220 !important;
        font-weight:1000 !important;
    }

    .cmd-copy h1 em{
        display:block !important;
        color:#156cff !important;
        font-style:normal !important;
    }

    .cmd-copy p{
        max-width:620px !important;
        margin:0 !important;
        color:#65758a !important;
        font-size:19px !important;
        line-height:1.75 !important;
        font-weight:720 !important;
    }

    .cmd-actions{
        margin-top:34px !important;
        display:flex !important;
        gap:13px !important;
        flex-wrap:wrap !important;
    }

    .cmd-actions a{
        height:58px !important;
        padding:0 24px !important;
        border-radius:18px !important;
        display:inline-flex !important;
        align-items:center !important;
        font-size:16px !important;
        font-weight:1000 !important;
    }

    .cmd-primary{
        background:#0b1220 !important;
        color:#fff !important;
        box-shadow:0 18px 42px rgba(11,18,32,.23) !important;
    }

    .cmd-secondary{
        background:#fff !important;
        color:#0b1220 !important;
        border:1px solid #dde7f2 !important;
        box-shadow:0 14px 34px rgba(15,35,70,.07) !important;
    }

    .cmd-route{
        margin-top:48px !important;
        display:grid !important;
        grid-template-columns:repeat(3,1fr) !important;
        gap:12px !important;
        max-width:650px !important;
    }

    .cmd-route div{
        position:relative !important;
        padding:18px !important;
        border-radius:22px !important;
        background:#fff !important;
        border:1px solid #e6edf7 !important;
        box-shadow:0 16px 34px rgba(15,35,70,.055) !important;
    }

    .cmd-route span{
        display:block !important;
        color:#94a3b8 !important;
        font-size:12px !important;
        font-weight:1000 !important;
        margin-bottom:8px !important;
    }

    .cmd-route b{
        color:#0b1220 !important;
        font-size:16px !important;
    }

    .cmd-route .active{
        background:#0b1220 !important;
    }

    .cmd-route .active b,
    .cmd-route .active span{
        color:#fff !important;
    }

    .cmd-route .done:after,
    .cmd-route .active:after{
        content:"✓" !important;
        position:absolute !important;
        right:16px !important;
        top:16px !important;
        width:24px !important;
        height:24px !important;
        border-radius:50% !important;
        display:grid !important;
        place-items:center !important;
        color:#fff !important;
        background:#156cff !important;
        font-size:13px !important;
        font-weight:1000 !important;
    }

    .cmd-visual{
        position:relative !important;
        min-height:620px !important;
    }

    .cmd-photo{
        position:absolute !important;
        right:0 !important;
        top:48px !important;
        width:640px !important;
        height:360px !important;
        border-radius:46px !important;
        overflow:hidden !important;
        background:#0b1220 !important;
        box-shadow:0 38px 100px rgba(11,18,32,.24) !important;
        transform:rotate(-2deg) !important;
    }

    .cmd-photo img{
        width:100% !important;
        height:100% !important;
        object-fit:cover !important;
        display:block !important;
        filter:saturate(1.05) contrast(1.03) !important;
    }

    .cmd-photo:after{
        content:"" !important;
        position:absolute !important;
        inset:0 !important;
        background:linear-gradient(135deg,rgba(11,18,32,.38),rgba(11,18,32,.02)) !important;
    }

    .cmd-speed{
        position:absolute !important;
        left:0 !important;
        bottom:10px !important;
        width:470px !important;
        min-height:470px !important;
        border-radius:46px !important;
        background:#0b1220 !important;
        color:#fff !important;
        box-shadow:0 38px 105px rgba(11,18,32,.30) !important;
        border:1px solid rgba(255,255,255,.12) !important;
        padding:28px !important;
        z-index:4 !important;
    }

    .speed-ring{
        position:relative !important;
        width:240px !important;
        height:240px !important;
        margin:10px auto 24px !important;
    }

    .speed-ring svg{
        width:100% !important;
        height:100% !important;
        transform:rotate(-90deg) !important;
    }

    .speed-ring circle{
        fill:none !important;
        stroke:rgba(255,255,255,.10) !important;
        stroke-width:18 !important;
    }

    .speed-ring .progress{
        stroke:#156cff !important;
        stroke-linecap:round !important;
        stroke-dasharray:578 !important;
        stroke-dashoffset:138 !important;
        filter:drop-shadow(0 0 16px rgba(21,108,255,.75)) !important;
    }

    .speed-text{
        position:absolute !important;
        inset:0 !important;
        display:grid !important;
        place-items:center !important;
        text-align:center !important;
    }

    .speed-text strong{
        display:block !important;
        font-size:76px !important;
        line-height:.75 !important;
        letter-spacing:-4px !important;
    }

    .speed-text span{
        display:block !important;
        margin-top:12px !important;
        color:#93c5fd !important;
        font-weight:1000 !important;
    }

    .cmd-status{
        display:flex !important;
        justify-content:space-between !important;
        align-items:center !important;
        padding:18px !important;
        border-radius:24px !important;
        background:rgba(255,255,255,.07) !important;
    }

    .cmd-status small{
        display:block !important;
        color:#93c5fd !important;
        font-size:12px !important;
        font-weight:1000 !important;
        letter-spacing:.8px !important;
        margin-bottom:4px !important;
    }

    .cmd-status b{
        font-size:18px !important;
    }

    .cmd-status span{
        width:48px !important;
        height:48px !important;
        border-radius:16px !important;
        display:grid !important;
        place-items:center !important;
        background:#156cff !important;
        font-weight:1000 !important;
    }

    .cmd-floating{
        position:absolute !important;
        z-index:5 !important;
        width:250px !important;
        padding:18px !important;
        border-radius:24px !important;
        background:rgba(255,255,255,.90) !important;
        border:1px solid rgba(255,255,255,.78) !important;
        backdrop-filter:blur(18px) !important;
        box-shadow:0 24px 60px rgba(15,35,70,.13) !important;
    }

    .cmd-floating b{
        display:block !important;
        font-size:17px !important;
        color:#0b1220 !important;
        margin-bottom:5px !important;
    }

    .cmd-floating span{
        color:#718096 !important;
        font-size:13px !important;
        font-weight:850 !important;
        line-height:1.45 !important;
    }

    .f-theory{
        right:0 !important;
        bottom:120px !important;
    }

    .f-exam{
        right:250px !important;
        top:8px !important;
    }

    @media(max-width:1050px){
        .cmd-menu{display:none!important}
        .cmd-shell{grid-template-columns:1fr!important}
        .cmd-visual{min-height:700px!important}
        .cmd-photo{width:100%!important}
    }

    @media(max-width:680px){
        .cmd-nav{
            top:12px!important;
            width:calc(100% - 22px)!important;
            height:66px!important;
            border-radius:22px!important;
            padding:8px!important;
        }
        .cmd-brand small{display:none!important}
        .cmd-brand b{font-size:14px!important}
        .cmd-brand > span{width:44px!important;height:44px!important}
        .cmd-start{height:46px!important;padding:0 14px!important;font-size:13px!important}
        .cmd-hero{padding:102px 18px 54px!important;min-height:auto!important}
        .cmd-copy h1{font-size:44px!important;letter-spacing:-2.4px!important}
        .cmd-copy p{font-size:16px!important}
        .cmd-route{grid-template-columns:1fr!important}
        .cmd-photo{height:260px!important;border-radius:30px!important;transform:none!important}
        .cmd-speed{position:relative!important;width:100%!important;min-height:420px!important;margin-top:330px!important;border-radius:32px!important}
        .cmd-floating{display:none!important}
    }
</style>

</head>

<body>


<nav class="cmd-nav">
    <a href="/autoschool" class="cmd-brand">
        <span>DM</span>
        <div>
            <b>Drive Academy</b>
            <small>Smart Driving School</small>
        </div>
    </a>

    <div class="cmd-menu">
        <a href="#program">პროგრამა</a>
        <a href="#steps">პროცესი</a>
        <a href="/autoschool/exam">გამოცდა</a>
        <a href="#contact">კონტაქტი</a>
    </div>

    <a href="/autoschool/exam" class="cmd-start">ტესტის დაწყება</a>
</nav>



<header class="cmd-hero">
    <div class="cmd-bg-orb orb-one"></div>
    <div class="cmd-bg-orb orb-two"></div>

    <div class="cmd-shell">
        <div class="cmd-copy">
            <div class="cmd-kicker">
                <span></span>
                ახალი თაობის ავტოსკოლა
            </div>

            <h1>
                მართვის სწავლა
                <em>სისტემურად</em>
            </h1>

            <p>
                თეორია, პრაქტიკა და გამოცდის სიმულაცია ერთ სივრცეში — ისე,
                რომ ზუსტად იცოდე სად ხარ და რა გრჩება ჩასაბარებლად.
            </p>

            <div class="cmd-actions">
                <a href="/autoschool/exam" class="cmd-primary">დაიწყე ტესტი</a>
                <a href="#program" class="cmd-secondary">ნახე პროგრამა</a>
            </div>

            <div class="cmd-route">
                <div class="done">
                    <span>01</span>
                    <b>თეორია</b>
                </div>
                <div class="active">
                    <span>02</span>
                    <b>პრაქტიკა</b>
                </div>
                <div>
                    <span>03</span>
                    <b>გამოცდა</b>
                </div>
            </div>
        </div>

        <div class="cmd-visual">
            <div class="cmd-speed">
                <div class="speed-ring">
                    <svg viewBox="0 0 220 220">
                        <circle cx="110" cy="110" r="92"></circle>
                        <circle class="progress" cx="110" cy="110" r="92"></circle>
                    </svg>
                    <div class="speed-text">
                        <strong>76</strong>
                        <span>% მზად</span>
                    </div>
                </div>

                <div class="cmd-status">
                    <div>
                        <small>STATUS</small>
                        <b>Practice Mode</b>
                    </div>
                    <span>A</span>
                </div>
            </div>

            <div class="cmd-photo">
                <img src="/autoschool/images/hero-driving-school.webp" alt="DM ავტოსკოლა">
            </div>

            <div class="cmd-floating f-theory">
                <b>500+</b>
                <span>საგამოცდო კითხვა</span>
            </div>

            <div class="cmd-floating f-exam">
                <b>Exam Ready</b>
                <span>რეალური სიმულაცია</span>
            </div>
        </div>
    </div>
</header>


<section id="program" class="section">
    <div class="container">
        <div class="title">
            <small>პროგრამა</small>
            <h2>ერთი სისტემა სრული მომზადებისთვის</h2>
        </div>

        <div class="cards">
            <article class="card">
                <div class="icon">01</div>
                <h3>თეორია</h3>
                <p>საგამოცდო საკითხები მარტივი ენით, ლოგიკით და პრაქტიკული მაგალითებით.</p>
            </article>

            <article class="card">
                <div class="icon">02</div>
                <h3>პრაქტიკა</h3>
                <p>სასწავლო მოედანი, ქალაქში მოძრაობა და ეტაპობრივი პროგრესი.</p>
            </article>

            <article class="card">
                <div class="icon">03</div>
                <h3>გამოცდა</h3>
                <p>სატესტო რეჟიმი, შედეგის შემოწმება და მზადება რეალური გამოცდისთვის.</p>
            </article>
        </div>
    </div>
</section>

<section id="steps" class="section alt">
    <div class="container">
        <div class="title">
            <small>პროცესი</small>
            <h2>როგორ იწყება შენი გზა მართვამდე</h2>
        </div>

        <div class="timeline">
            <div class="step">
                <b>1</b>
                <h3>Theory</h3>
                <p>იწყებ წესებით, ნიშნებით და საგამოცდო კითხვებით.</p>
            </div>
            <div class="step">
                <b>2</b>
                <h3>Practice</h3>
                <p>გადადიხარ მოედანზე და რეალურ მართვის პროცესში.</p>
            </div>
            <div class="step">
                <b>3</b>
                <h3>Exam</h3>
                <p>ამოწმებ შედეგს გამოცდის სიმულაციით.</p>
            </div>
            <div class="step">
                <b>4</b>
                <h3>License</h3>
                <p>გადიხარ გამოცდაზე თავდაჯერებულად.</p>
            </div>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <div class="cta">
            <div>
                <h2>მზად ხარ ტესტისთვის?</h2>
                <p>დაიწყე თეორიის ტესტი და ნახე რამდენად მზად ხარ გამოცდისთვის.</p>
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

    gsap.from(".kicker,h1,.lead,.actions,.mini",{
        y:24,
        opacity:0,
        duration:.75,
        stagger:.07,
        ease:"power3.out"
    });

    gsap.from(".car-card,.dashboard,.float-card",{
        y:30,
        opacity:0,
        duration:.75,
        stagger:.08,
        delay:.18,
        ease:"power3.out"
    });

    gsap.from(".progress span",{
        width:"0%",
        duration:1.2,
        delay:.6,
        ease:"power3.out"
    });

    gsap.utils.toArray(".card,.step,.cta").forEach(function(el){
        gsap.from(el,{
            y:28,
            opacity:0,
            duration:.6,
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
