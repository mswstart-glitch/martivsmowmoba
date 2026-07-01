<!DOCTYPE html>
<html lang="ka">
<head>
<meta charset="UTF-8">
<title>AutoSchool — Driving Academy</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<style>
*{box-sizing:border-box}
:root{
    --bg:#070707;
    --cream:#f4efe5;
    --muted:#9d988f;
    --gold:#c7a45a;
    --gold2:#efd89a;
    --line:rgba(255,255,255,.12);
}
html.lenis{height:auto}
.lenis.lenis-smooth{scroll-behavior:auto}
body{
    margin:0;
    font-family:system-ui,-apple-system,BlinkMacSystemFont,"Segoe UI",sans-serif;
    background:var(--bg);
    color:var(--cream);
    overflow-x:hidden;
}
a{text-decoration:none;color:inherit}
.hero{
    min-height:100vh;
    position:relative;
    overflow:hidden;
    background:
        radial-gradient(circle at 70% 40%,rgba(199,164,90,.18),transparent 28%),
        radial-gradient(circle at 20% 20%,rgba(255,255,255,.045),transparent 28%),
        linear-gradient(120deg,#070707,#11100d 48%,#050505);
}
.noise{
    position:absolute;
    inset:0;
    opacity:.14;
    background-image:
        linear-gradient(90deg,rgba(255,255,255,.06) 1px,transparent 1px),
        linear-gradient(rgba(255,255,255,.04) 1px,transparent 1px);
    background-size:80px 80px;
    mask-image:linear-gradient(to bottom,#000,transparent 88%);
}
.road{
    position:absolute;
    right:-180px;
    bottom:-320px;
    width:920px;
    height:900px;
    transform:perspective(760px) rotateX(66deg) rotateZ(-10deg);
    background:linear-gradient(90deg,#030303,#151515 48%,#2a2a2a 50%,#151515 52%,#030303);
    border-left:2px solid rgba(255,255,255,.18);
    border-right:2px solid rgba(255,255,255,.18);
}
.road:after{
    content:"";
    position:absolute;
    left:50%;
    top:0;
    width:9px;
    height:100%;
    transform:translateX(-50%);
    background:repeating-linear-gradient(to bottom,var(--gold) 0 44px,transparent 44px 94px);
    filter:drop-shadow(0 0 18px rgba(199,164,90,.75));
}
.car{
    position:absolute;
    right:120px;
    bottom:190px;
    width:540px;
    height:190px;
    border-radius:150px 150px 38px 38px;
    background:linear-gradient(180deg,#202020,#070707 62%,#000);
    box-shadow:0 70px 150px rgba(0,0,0,.75), inset 0 2px 0 rgba(255,255,255,.08);
}
.car:before{
    content:"";
    position:absolute;
    left:18%;
    right:18%;
    top:-78px;
    height:124px;
    border-radius:115px 115px 16px 16px;
    background:linear-gradient(180deg,#2a2a2a,#090909);
    border:1px solid rgba(255,255,255,.08);
}
.car:after{
    content:"AUTOSCHOOL";
    position:absolute;
    left:50%;
    bottom:18px;
    transform:translateX(-50%);
    background:linear-gradient(135deg,var(--gold2),var(--gold));
    color:#111;
    padding:8px 22px;
    border-radius:7px;
    font-weight:950;
    letter-spacing:1px;
}
.light-left,.light-right{
    position:absolute;
    top:70px;
    width:155px;
    height:42px;
    background:linear-gradient(90deg,#fff4c4,var(--gold));
    box-shadow:0 0 45px rgba(199,164,90,.85),0 0 130px rgba(199,164,90,.38);
    z-index:2;
}
.light-left{left:54px;border-radius:34px 8px 28px 12px;transform:skewX(-14deg)}
.light-right{right:54px;border-radius:8px 34px 12px 28px;transform:skewX(14deg)}
.beam{
    position:absolute;
    left:-90px;
    right:-90px;
    bottom:40px;
    height:260px;
    background:radial-gradient(ellipse at center,rgba(199,164,90,.26),transparent 68%);
    filter:blur(18px);
}
.wrap{
    max-width:1280px;
    margin:auto;
    padding:0 34px;
    position:relative;
    z-index:3;
}
.nav{
    height:94px;
    display:flex;
    align-items:center;
    justify-content:space-between;
}
.logo{
    display:flex;
    align-items:center;
    gap:12px;
    font-weight:950;
    font-size:24px;
}
.logo-mark{
    width:44px;
    height:44px;
    border-radius:15px;
    background:linear-gradient(180deg,#171717,#080808);
    border:1px solid rgba(199,164,90,.35);
    color:var(--gold);
    display:grid;
    place-items:center;
}
.logo b{color:var(--gold)}
.menu{
    display:flex;
    gap:38px;
    color:#d9d4cb;
    font-weight:800;
    font-size:15px;
}
.nav-cta{
    background:linear-gradient(135deg,var(--gold2),var(--gold));
    color:#111;
    padding:15px 24px;
    border-radius:16px;
    font-weight:950;
    box-shadow:0 18px 45px rgba(199,164,90,.18);
}
.hero-grid{
    min-height:calc(100vh - 94px);
    display:grid;
    grid-template-columns:.9fr 1.1fr;
    align-items:center;
    padding-bottom:80px;
}
.eyebrow{
    color:var(--gold);
    font-weight:950;
    margin-bottom:18px;
    letter-spacing:.4px;
}
.title{
    font-size:84px;
    line-height:.9;
    letter-spacing:-4px;
    margin:0 0 26px;
    max-width:720px;
}
.title span{
    background:linear-gradient(90deg,var(--cream),var(--gold2),var(--gold));
    -webkit-background-clip:text;
    color:transparent;
}
.split-line{
    display:block;
    overflow:hidden;
}
.lead{
    max-width:590px;
    color:#b8b1a5;
    font-size:20px;
    line-height:1.75;
    margin:0 0 34px;
}
.actions{
    display:flex;
    gap:14px;
    flex-wrap:wrap;
}
.btn{
    display:inline-flex;
    align-items:center;
    gap:12px;
    padding:17px 28px;
    border-radius:17px;
    font-weight:950;
    transition:.28s cubic-bezier(.2,.8,.2,1);
}
.btn:hover{transform:translateY(-4px) scale(1.015)}
.primary{
    background:linear-gradient(135deg,var(--gold2),var(--gold));
    color:#111;
    box-shadow:0 22px 60px rgba(199,164,90,.22);
}
.secondary{
    border:1px solid var(--line);
    background:rgba(255,255,255,.055);
    backdrop-filter:blur(14px);
}
.trust{
    display:flex;
    gap:12px;
    align-items:center;
    margin-top:46px;
    color:#b8b1a5;
    font-weight:850;
}
.avatars{display:flex}
.avatar{
    width:34px;
    height:34px;
    border-radius:50%;
    background:linear-gradient(135deg,#2c2c2c,var(--gold));
    border:2px solid #070707;
    margin-left:-8px;
}
.avatar:first-child{margin-left:0}
.next-section{
    background:#0b0b0b;
    padding:110px 34px;
}
.cards-wrap{
    max-width:1280px;
    margin:auto;
}
.section-head{
    display:flex;
    justify-content:space-between;
    align-items:flex-end;
    gap:30px;
    margin-bottom:34px;
}
.section-head small{
    color:var(--gold);
    font-weight:950;
}
.section-head h2{
    font-size:54px;
    line-height:1.02;
    letter-spacing:-2px;
    margin:10px 0 0;
    max-width:720px;
}
.section-head p{
    color:#aaa;
    font-size:18px;
    line-height:1.7;
    max-width:430px;
    margin:0;
}
.premium-cards{
    display:grid;
    grid-template-columns:1.1fr .9fr;
    gap:18px;
}
.big-card,.small-card{
    border:1px solid rgba(255,255,255,.1);
    background:linear-gradient(180deg,rgba(255,255,255,.06),rgba(255,255,255,.025));
    border-radius:34px;
    padding:34px;
    backdrop-filter:blur(16px);
    box-shadow:0 30px 90px rgba(0,0,0,.28);
    transition:.28s cubic-bezier(.2,.8,.2,1);
}
.big-card:hover,.small-card:hover{
    transform:translateY(-6px) scale(1.01);
    border-color:rgba(199,164,90,.34);
}
.big-card{
    min-height:520px;
    position:relative;
    overflow:hidden;
}
.big-card:after{
    content:"";
    position:absolute;
    width:360px;
    height:360px;
    border-radius:50%;
    right:-110px;
    bottom:-130px;
    background:radial-gradient(circle,rgba(199,164,90,.24),transparent 68%);
}
.card-label{
    color:var(--gold);
    font-weight:950;
    margin-bottom:18px;
}
.big-card h3,.small-card h3{
    font-size:38px;
    line-height:1.08;
    letter-spacing:-1.2px;
    margin:0 0 14px;
}
.big-card p,.small-card p{
    color:#aaa;
    font-size:17px;
    line-height:1.7;
    margin:0;
}
.mode-list{
    display:grid;
    grid-template-columns:1fr 1fr;
    gap:12px;
    margin-top:36px;
    position:relative;
    z-index:2;
}
.mode-item{
    background:rgba(0,0,0,.26);
    border:1px solid rgba(255,255,255,.09);
    border-radius:22px;
    padding:18px;
}
.mode-item b{
    display:block;
    font-size:24px;
    color:var(--cream);
    margin-bottom:6px;
}
.mode-item span{
    color:#aaa;
    font-weight:800;
}
.side-stack{
    display:grid;
    gap:18px;
}
.small-card{
    min-height:251px;
}
.card-icon{
    width:58px;
    height:58px;
    border-radius:20px;
    background:linear-gradient(180deg,#171717,#080808);
    border:1px solid rgba(199,164,90,.28);
    color:var(--gold);
    display:grid;
    place-items:center;
    font-size:26px;
    margin-bottom:22px;
}
@media(max-width:980px){
    .section-head{display:block}
    .section-head h2{font-size:38px}
    .section-head p{margin-top:18px}
    .premium-cards,.mode-list{grid-template-columns:1fr}
}
@media(max-width:980px){
    .menu,.nav-cta{display:none}
    .hero-grid{grid-template-columns:1fr}
    .title{font-size:50px;letter-spacing:-2px}
    .car{opacity:.28;right:-160px;bottom:130px}
    .road{opacity:.4}
    .wrap{padding:0 22px}
}

.courses-section{
    background:#0b0b0b;
    padding:40px 34px 120px;
}
.course-packages{
    max-width:1280px;
    margin:auto;
}
.package-grid{
    display:grid;
    grid-template-columns:repeat(3,1fr);
    gap:18px;
    margin-top:34px;
}
.package{
    min-height:420px;
    border-radius:34px;
    padding:32px;
    background:linear-gradient(180deg,rgba(255,255,255,.065),rgba(255,255,255,.025));
    border:1px solid rgba(255,255,255,.1);
    box-shadow:0 30px 90px rgba(0,0,0,.28);
    transition:.28s cubic-bezier(.2,.8,.2,1);
    position:relative;
    overflow:hidden;
}
.package:hover{
    transform:translateY(-6px) scale(1.01);
    border-color:rgba(199,164,90,.34);
}
.package.featured{
    background:linear-gradient(180deg,rgba(199,164,90,.16),rgba(255,255,255,.035));
}
.package-badge{
    display:inline-flex;
    padding:9px 13px;
    border-radius:999px;
    background:rgba(199,164,90,.12);
    border:1px solid rgba(199,164,90,.22);
    color:var(--gold);
    font-weight:950;
    margin-bottom:24px;
}
.package h3{
    font-size:34px;
    line-height:1.08;
    letter-spacing:-1px;
    margin:0 0 12px;
}
.package p{
    color:#aaa;
    line-height:1.7;
    margin:0 0 26px;
}
.price{
    font-size:42px;
    font-weight:950;
    color:var(--cream);
    margin-bottom:24px;
}
.price span{
    font-size:16px;
    color:#aaa;
}
.package ul{
    list-style:none;
    margin:0;
    padding:0;
    display:grid;
    gap:12px;
}
.package li{
    color:#d8d8d8;
    font-weight:800;
}
.package li:before{
    content:"✓";
    color:var(--gold);
    margin-right:9px;
}
.package a{
    position:absolute;
    left:32px;
    right:32px;
    bottom:32px;
    text-align:center;
    padding:16px;
    border-radius:17px;
    font-weight:950;
    background:rgba(255,255,255,.06);
    border:1px solid rgba(255,255,255,.12);
}
.package.featured a{
    background:linear-gradient(135deg,var(--gold2),var(--gold));
    color:#111;
}
@media(max-width:980px){
    .package-grid{grid-template-columns:1fr}
}

.live-exam-section{
    background:
        radial-gradient(circle at 78% 36%,rgba(199,164,90,.16),transparent 26%),
        linear-gradient(180deg,#0b0b0b,#070707);
    padding:120px 34px;
    position:relative;
    overflow:hidden;
}
.live-exam-section:before{
    content:"";
    position:absolute;
    inset:0;
    opacity:.12;
    background-image:
        linear-gradient(90deg,rgba(255,255,255,.06) 1px,transparent 1px),
        linear-gradient(rgba(255,255,255,.05) 1px,transparent 1px);
    background-size:72px 72px;
}
.live-exam-wrap{
    max-width:1280px;
    margin:auto;
    position:relative;
    z-index:2;
    display:grid;
    grid-template-columns:.85fr 1.15fr;
    gap:54px;
    align-items:center;
}
.exam-copy small{
    color:var(--gold);
    font-weight:950;
}
.exam-copy h2{
    font-size:56px;
    line-height:1.02;
    letter-spacing:-2px;
    margin:12px 0 22px;
}
.exam-copy p{
    color:#aaa;
    font-size:18px;
    line-height:1.75;
    max-width:520px;
    margin:0 0 28px;
}
.exam-points{
    display:grid;
    gap:12px;
    margin-bottom:30px;
}
.exam-points div{
    color:#e5e5e5;
    font-weight:850;
}
.exam-points div:before{
    content:"✓";
    color:var(--gold);
    margin-right:10px;
}
.exam-stage{
    position:relative;
    min-height:620px;
}
.exam-device{
    position:absolute;
    right:40px;
    top:0;
    width:470px;
    border-radius:42px;
    padding:22px;
    background:linear-gradient(180deg,rgba(255,255,255,.08),rgba(255,255,255,.025));
    border:1px solid rgba(255,255,255,.13);
    box-shadow:0 45px 130px rgba(0,0,0,.5);
    backdrop-filter:blur(20px);
}
.device-top{
    height:42px;
    border-radius:22px;
    background:#070707;
    border:1px solid rgba(255,255,255,.08);
    display:flex;
    align-items:center;
    justify-content:space-between;
    padding:0 14px;
    margin-bottom:18px;
}
.device-dots{display:flex;gap:7px}
.device-dots span{
    width:9px;
    height:9px;
    border-radius:50%;
    background:#3f3f46;
}
.device-pill{
    color:var(--gold);
    font-weight:950;
    font-size:13px;
}
.exam-card-inner{
    background:#080808;
    border:1px solid rgba(255,255,255,.09);
    border-radius:30px;
    padding:22px;
}
.exam-meta{
    display:flex;
    justify-content:space-between;
    margin-bottom:16px;
    color:#aaa;
    font-weight:850;
}
.exam-meta b{color:var(--gold)}
.exam-image{
    height:190px;
    border-radius:24px;
    margin-bottom:18px;
    background:
        radial-gradient(circle at 68% 28%,rgba(199,164,90,.25),transparent 28%),
        linear-gradient(180deg,#1a1a1a,#090909);
    position:relative;
    overflow:hidden;
    border:1px solid rgba(255,255,255,.08);
}
.exam-road{
    position:absolute;
    left:50%;
    bottom:-120px;
    width:210px;
    height:360px;
    transform:translateX(-50%) perspective(420px) rotateX(62deg);
    background:#111;
    border-left:4px solid rgba(255,255,255,.55);
    border-right:4px solid rgba(255,255,255,.55);
}
.exam-road:after{
    content:"";
    position:absolute;
    left:50%;
    top:0;
    transform:translateX(-50%);
    width:7px;
    height:100%;
    background:repeating-linear-gradient(to bottom,var(--gold) 0 30px,transparent 30px 62px);
}
.exam-question{
    font-size:23px;
    line-height:1.35;
    font-weight:950;
    letter-spacing:-.4px;
    margin-bottom:14px;
}
.exam-answers{
    display:grid;
    gap:10px;
}
.exam-answer{
    padding:14px 15px;
    border-radius:16px;
    background:#141414;
    border:1px solid rgba(255,255,255,.09);
    color:#d4d4d8;
    font-weight:850;
    display:flex;
    justify-content:space-between;
}
.exam-answer.active{
    border-color:rgba(199,164,90,.55);
    background:rgba(199,164,90,.1);
    color:#f4efe5;
}
.exam-progress{
    margin-top:18px;
}
.exam-progress-top{
    display:flex;
    justify-content:space-between;
    color:#aaa;
    font-weight:850;
    margin-bottom:9px;
}
.exam-progress-line{
    height:10px;
    border-radius:999px;
    background:#222;
    overflow:hidden;
}
.exam-progress-fill{
    width:0%;
    height:100%;
    background:linear-gradient(90deg,var(--gold2),var(--gold));
}
.ai-popup{
    position:absolute;
    left:0;
    bottom:58px;
    width:360px;
    border-radius:28px;
    background:rgba(10,10,10,.76);
    border:1px solid rgba(199,164,90,.26);
    backdrop-filter:blur(20px);
    padding:22px;
    box-shadow:0 35px 100px rgba(0,0,0,.5);
}
.ai-popup b{
    display:block;
    color:var(--gold);
    margin-bottom:9px;
    font-size:18px;
}
.ai-popup p{
    color:#d4d4d8;
    line-height:1.65;
    margin:0;
    font-weight:750;
}
.floating-score{
    position:absolute;
    right:0;
    bottom:0;
    width:210px;
    border-radius:26px;
    padding:22px;
    background:rgba(255,255,255,.06);
    border:1px solid rgba(255,255,255,.12);
    backdrop-filter:blur(18px);
}
.floating-score strong{
    display:block;
    font-size:38px;
    color:var(--gold);
}
.floating-score span{
    color:#aaa;
    font-weight:850;
}
@media(max-width:980px){
    .live-exam-wrap{grid-template-columns:1fr}
    .exam-copy h2{font-size:38px}
    .exam-stage{min-height:auto}
    .exam-device,.ai-popup,.floating-score{
        position:relative;
        right:auto;
        left:auto;
        top:auto;
        bottom:auto;
        width:auto;
        margin-top:18px;
    }
}
</style>


<style>
.proof-section{
    position:relative;
    padding:120px 7vw;
    background:linear-gradient(180deg,#14110c 0%,#0b0a08 100%);
    color:#f7efd9;
    overflow:hidden;
}
.proof-section:before{
    content:"";
    position:absolute;
    inset:0;
    background:
        radial-gradient(circle at 20% 20%,rgba(211,170,92,.16),transparent 34%),
        radial-gradient(circle at 80% 70%,rgba(255,241,202,.08),transparent 30%);
    pointer-events:none;
}
.proof-head{
    position:relative;
    max-width:780px;
    margin:0 auto 54px;
    text-align:center;
}
.proof-head span,
.final-cta-inner span{
    display:inline-flex;
    padding:9px 16px;
    border:1px solid rgba(213,177,104,.28);
    border-radius:999px;
    color:#d8b46c;
    background:rgba(255,255,255,.04);
    margin-bottom:18px;
}
.proof-head h2,
.final-cta-inner h2{
    font-size:clamp(34px,5vw,72px);
    line-height:.98;
    letter-spacing:-.05em;
    margin:0 0 20px;
}
.proof-head p,
.final-cta-inner p{
    color:rgba(247,239,217,.68);
    font-size:18px;
    line-height:1.7;
}
.results-grid{
    position:relative;
    display:grid;
    grid-template-columns:repeat(3,1fr);
    gap:18px;
    margin-bottom:24px;
}
.result-card{
    min-height:190px;
    padding:34px;
    border:1px solid rgba(213,177,104,.18);
    border-radius:30px;
    background:linear-gradient(145deg,rgba(255,255,255,.08),rgba(255,255,255,.025));
    box-shadow:0 30px 90px rgba(0,0,0,.28);
}
.result-card strong{
    display:block;
    font-size:clamp(42px,6vw,76px);
    letter-spacing:-.06em;
    color:#e6c175;
    margin-bottom:18px;
}
.result-card span{
    color:rgba(247,239,217,.7);
    line-height:1.6;
}
.testimonials-grid{
    position:relative;
    display:grid;
    grid-template-columns:repeat(3,1fr);
    gap:18px;
}
.testimonial-card{
    padding:30px;
    border-radius:28px;
    background:#f3ead3;
    color:#14110c;
    min-height:250px;
    display:flex;
    flex-direction:column;
    justify-content:space-between;
}
.testimonial-card p{
    font-size:18px;
    line-height:1.65;
    margin:0 0 28px;
}
.testimonial-card b{
    display:block;
    font-size:17px;
}
.testimonial-card span{
    color:rgba(20,17,12,.58);
}
.final-cta{
    position:relative;
    padding:130px 7vw;
    background:#f3ead3;
    color:#14110c;
    overflow:hidden;
}
.cta-orb{
    position:absolute;
    width:520px;
    height:520px;
    right:-120px;
    top:-170px;
    border-radius:50%;
    background:radial-gradient(circle,#d9b56b 0%,rgba(217,181,107,.2) 42%,transparent 70%);
}
.final-cta-inner{
    position:relative;
    max-width:900px;
}
.final-cta-inner span{
    color:#8b6326;
    border-color:rgba(139,99,38,.22);
    background:rgba(20,17,12,.04);
}
.final-cta-inner p{
    max-width:680px;
    color:rgba(20,17,12,.62);
}
.cta-actions{
    display:flex;
    gap:14px;
    margin-top:34px;
    flex-wrap:wrap;
}
.cta-primary,
.cta-secondary{
    text-decoration:none;
    padding:17px 24px;
    border-radius:999px;
    font-weight:700;
    transition:transform .25s ease, box-shadow .25s ease;
}
.cta-primary{
    background:#14110c;
    color:#f7efd9;
    box-shadow:0 18px 45px rgba(20,17,12,.22);
}
.cta-secondary{
    color:#14110c;
    border:1px solid rgba(20,17,12,.18);
    background:rgba(255,255,255,.35);
}
.cta-primary:hover,
.cta-secondary:hover{
    transform:translateY(-3px);
}
.premium-footer{
    display:flex;
    justify-content:space-between;
    gap:24px;
    padding:42px 7vw;
    background:#080706;
    color:#f7efd9;
    border-top:1px solid rgba(213,177,104,.16);
}
.premium-footer h3{
    margin:0 0 8px;
    letter-spacing:-.03em;
}
.premium-footer p{
    margin:0;
    color:rgba(247,239,217,.55);
}
.footer-links{
    display:flex;
    gap:18px;
    align-items:center;
    flex-wrap:wrap;
}
.footer-links a{
    color:rgba(247,239,217,.68);
    text-decoration:none;
}
.footer-links a:hover{
    color:#e6c175;
}
@media(max-width:900px){
    .results-grid,
    .testimonials-grid{
        grid-template-columns:1fr;
    }
    .proof-section,
    .final-cta{
        padding:86px 20px;
    }
    .premium-footer{
        flex-direction:column;
        padding:34px 20px;
    }
}
</style>

<style>
html,body{font-family:"Manrope",sans-serif!important;}
h1,h2,h3,h4,h5,h6{font-family:"Manrope",sans-serif!important;font-weight:800;letter-spacing:-0.05em;}
p,span,a,button,input,textarea{font-family:"Manrope",sans-serif!important;}
</style>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@200;300;400;500;600;700;800&display=swap" rel="stylesheet">

</head>
<body>

<section class="hero">
    <div class="noise"></div>
    <div class="road"></div>
    <div class="car">
        <div class="beam"></div>
        <div class="light-left"></div>
        <div class="light-right"></div>
    </div>

    <div class="wrap">
        <nav class="nav">
            <a class="logo" href="/autoschool">
                <span class="logo-mark">⌁</span>
                <span>Auto<b>School</b></span>
            </a>

            <div class="menu">
                <a href="#">მთავარი</a>
                <a href="#">კურსები</a>
                <a href="#">ონლაინ სწავლა</a>
                <a href="/autoschool/exam">ტესტები</a>
                <a href="#">კონტაქტი</a>
            </div>

            <a class="nav-cta" href="/autoschool/exam">უფასო ტესტი</a>
        </nav>

        <div class="hero-grid">
            <div>
                <div class="eyebrow hero-reveal">Driving Academy</div>

                <h1 class="title">
                    შენი გზა<br>
                    მართვის<br>
                    <span>მოწმობამდე.</span>
                </h1>

                <p class="lead hero-reveal">
                    ფიზიკური და ონლაინ თეორიის კურსები, რეალური გამოცდის სიმულაცია
                    და მარტივი ახსნა თითოეულ შეცდომაზე.
                </p>

                <div class="actions hero-reveal">
                    <a class="btn primary" href="#">კურსის არჩევა →</a>
                    <a class="btn secondary" href="/autoschool/exam">უფასო ტესტი</a>
                </div>

                <div class="trust hero-reveal">
                    <div class="avatars">
                        <span class="avatar"></span>
                        <span class="avatar"></span>
                        <span class="avatar"></span>
                    </div>
                    <span>სწავლა, რომელიც გამოცდისთვის რეალურად გამზადებს</span>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="next-section">
    <div class="cards-wrap">
        <div class="section-head reveal">
            <div>
                <small>სწავლის არჩევანი</small>
                <h2>ერთ სივრცეში — ფიზიკური კურსი, ონლაინ სწავლა და გამოცდის სიმულაცია.</h2>
            </div>
            <p>
                პლატფორმა აერთიანებს ავტოსკოლის რეალურ კურსებს და ონლაინ სავარჯიშო სისტემას,
                რომ მოსწავლემ ნებისმიერ ეტაპზე იცოდეს შემდეგი ნაბიჯი.
            </p>
        </div>

        <div class="premium-cards">
            <div class="big-card reveal">
                <div class="card-label">Driving Academy</div>
                <h3>სწავლა ისე, როგორც რეალურად გჭირდება.</h3>
                <p>
                    აირჩიე ოფისში სწავლა, ონლაინ კურსი ან ინდივიდუალური გაკვეთილი.
                    შემდეგ ივარჯიშე გამოცდის რეჟიმში და შეამოწმე პროგრესი.
                </p>

                <div class="mode-list">
                    <div class="mode-item">
                        <b>🎓 ფიზიკური</b>
                        <span>თეორიის კურსი აუდიტორიაში</span>
                    </div>
                    <div class="mode-item">
                        <b>💻 ონლაინ</b>
                        <span>სწავლა სახლიდან, შენს ტემპში</span>
                    </div>
                    <div class="mode-item">
                        <b>📝 გამოცდა</b>
                        <span>რეალური გამოცდის სიმულაცია</span>
                    </div>
                    <div class="mode-item">
                        <b>📊 პროგრესი</b>
                        <span>შეცდომები და სუსტი თემები</span>
                    </div>
                </div>
            </div>

            <div class="side-stack">
                <div class="small-card reveal">
                    <div class="card-icon">AI</div>
                    <div class="card-label">Human Explanation</div>
                    <h3>შეცდომა ხდება სწავლა.</h3>
                    <p>არასწორ პასუხზე იღებ მარტივ ახსნას — არა მშრალ კანონის ტექსტს.</p>
                </div>

                <div class="small-card reveal">
                    <div class="card-icon">✓</div>
                    <div class="card-label">Exam Ready</div>
                    <h3>გამოცდამდე ხედავ მზადყოფნას.</h3>
                    <p>სტატისტიკა აჩვენებს სწორ პასუხებს, შეცდომებს და თემებს, სადაც მეტი ვარჯიში გჭირდება.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="https://unpkg.com/lenis@1.1.18/dist/lenis.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/gsap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/gsap@3.12.5/dist/ScrollTrigger.min.js"></script>

<script>
gsap.registerPlugin(ScrollTrigger);

const lenis = new Lenis({
    duration: 1.05,
    smoothWheel: true,
    wheelMultiplier: 0.72
});

lenis.on('scroll', ScrollTrigger.update);

gsap.ticker.add((time) => {
    lenis.raf(time * 1000);
});

gsap.ticker.lagSmoothing(0);

document.querySelectorAll('.title').forEach(title => {
    const html = title.innerHTML.trim();
    title.innerHTML = html
        .split('<br>')
        .map(line => `<span class="split-line"><span>${line.trim()}</span></span>`)
        .join('');
});

gsap.set('.split-line span', {yPercent: 110});
gsap.set('.hero-reveal', {y: 26, opacity: 0});
gsap.set('.car', {x: 120, scale: 1.04, opacity: 0});
gsap.set('.road', {y: 40, opacity: .75});

const intro = gsap.timeline({defaults:{ease:'expo.out'}});
intro
    .from('.nav', {y:-28, opacity:0, duration:.7})
    .to('.split-line span', {yPercent:0, duration:.9, stagger:.08}, '-=.25')
    .to('.hero-reveal', {y:0, opacity:1, duration:.75, stagger:.08}, '-=.45')
    .to('.car', {x:0, scale:1, opacity:1, duration:.9}, '-=.75');

gsap.to('.car', {
    y:-18,
    scale:1.025,
    ease:'none',
    scrollTrigger:{
        trigger:'.hero',
        start:'top top',
        end:'bottom top',
        scrub:1
    }
});

gsap.to('.road', {
    y:70,
    scale:1.035,
    ease:'none',
    scrollTrigger:{
        trigger:'.hero',
        start:'top top',
        end:'bottom top',
        scrub:1
    }
});

gsap.utils.toArray('.reveal').forEach((el, i) => {
    gsap.from(el, {
        y:42,
        opacity:0,
        scale:.975,
        duration:.85,
        delay:(i % 4) * 0.04,
        ease:'expo.out',
        scrollTrigger:{
            trigger:el,
            start:'top 88%',
            toggleActions:'play none none reverse'
        }
    });
});

gsap.utils.toArray('.package').forEach((el, i) => {
    gsap.from(el, {
        y:70,
        opacity:0,
        scale:.94,
        rotateX:6,
        duration:.9,
        delay:i * .08,
        ease:'expo.out',
        scrollTrigger:{
            trigger:el,
            start:'top 88%',
            toggleActions:'play none none reverse'
        }
    });
});
</script>


<section class="courses-section">
    <div class="course-packages">
        <div class="section-head reveal">
            <div>
                <small>კურსები</small>
                <h2>აირჩიე ფორმატი, რომელიც შენს გრაფიკს ერგება.</h2>
            </div>
            <p>
                ფიზიკური სწავლა, ონლაინ კურსი ან ინდივიდუალური მომზადება —
                ყველა გზა ერთ მიზანთან მიდის: გამოცდის ჩაბარებასთან.
            </p>
        </div>

        <div class="package-grid">
            <div class="package reveal">
                <div class="package-badge">Classroom</div>
                <h3>ფიზიკური კურსი</h3>
                <p>თეორიის სწავლა აუდიტორიაში მასწავლებელთან ერთად.</p>
                <div class="price">250₾ <span>/ კურსი</span></div>
                <ul>
                    <li>აუდიტორიაში სწავლა</li>
                    <li>თემების ახსნა</li>
                    <li>საგამოცდო ვარჯიში</li>
                </ul>
                <a href="#">კურსის არჩევა</a>
            </div>

            <div class="package featured reveal">
                <div class="package-badge">Most Popular</div>
                <h3>ონლაინ + გამოცდა</h3>
                <p>სწავლა სახლიდან, ტესტები, პროგრესი და შეცდომებზე მუშაობა.</p>
                <div class="price">390₾ <span>/ პაკეტი</span></div>
                <ul>
                    <li>ონლაინ გაკვეთილები</li>
                    <li>ულიმიტო ტესტები</li>
                    <li>AI ახსნა შეცდომებზე</li>
                </ul>
                <a href="#">დაწყება</a>
            </div>

            <div class="package reveal">
                <div class="package-badge">VIP</div>
                <h3>ინდივიდუალური</h3>
                <p>პერსონალური მომზადება ქართულად, რუსულად ან ინგლისურად.</p>
                <div class="price">650₾ <span>/ კურსი</span></div>
                <ul>
                    <li>პირადი მასწავლებელი</li>
                    <li>სუსტი თემების დამუშავება</li>
                    <li>გამოცდის სტრატეგია</li>
                </ul>
                <a href="#">კონსულტაცია</a>
            </div>
        </div>
    </div>
</section>


<script>
window.addEventListener('load', () => {
    if (window.gsap && window.ScrollTrigger) {
        gsap.utils.toArray('.courses-section .section-head, .courses-section .package').forEach((el, i) => {
            gsap.fromTo(el,
                {
                    y: 80,
                    opacity: 0,
                    scale: 0.94,
                    rotateX: 8
                },
                {
                    y: 0,
                    opacity: 1,
                    scale: 1,
                    rotateX: 0,
                    duration: 0.95,
                    delay: i * 0.08,
                    ease: 'expo.out',
                    scrollTrigger: {
                        trigger: el,
                        start: 'top 88%',
                        toggleActions: 'play none none reverse'
                    }
                }
            );
        });

        gsap.utils.toArray('.package li').forEach((el, i) => {
            gsap.fromTo(el,
                { x: -18, opacity: 0 },
                {
                    x: 0,
                    opacity: 1,
                    duration: 0.55,
                    delay: i * 0.03,
                    ease: 'power2.out',
                    scrollTrigger: {
                        trigger: el.closest('.package'),
                        start: 'top 82%',
                        toggleActions: 'play none none reverse'
                    }
                }
            );
        });
    }
});
</script>


<section class="live-exam-section">
    <div class="live-exam-wrap">
        <div class="exam-copy reveal">
            <small>Live Exam Experience</small>
            <h2>ნახე როგორ მუშაობს გამოცდის რეჟიმი რეალურად.</h2>
            <p>
                Landing-ზეც ჩანს მთავარი ღირებულება — კითხვა, პასუხები,
                პროგრესი და შეცდომაზე მარტივი AI ახსნა.
            </p>

            <div class="exam-points">
                <div>რეალური კითხვები PDF-დან</div>
                <div>დროის კონტროლი და პროგრესი</div>
                <div>არასწორ პასუხზე ადამიანური ახსნა</div>
                <div>შეცდომებზე სწავლა და სუსტი თემები</div>
            </div>

            <a class="btn primary" href="/autoschool/exam">დაიწყე გამოცდა →</a>
        </div>

        <div class="exam-stage">
            <div class="exam-device reveal">
                <div class="device-top">
                    <div class="device-dots"><span></span><span></span><span></span></div>
                    <div class="device-pill">Exam Mode</div>
                </div>

                <div class="exam-card-inner">
                    <div class="exam-meta">
                        <span>კითხვა <b>125</b> / 1124</span>
                        <span>00:55</span>
                    </div>

                    <div class="exam-image">
                        <div class="exam-road"></div>
                    </div>

                    <div class="exam-question">
                        რომელი ავტომობილი უნდა გადაადგილდეს პირველი მოცემულ სიტუაციაში?
                    </div>

                    <div class="exam-answers">
                        <div class="exam-answer">A — წითელი ავტომობილი <span>○</span></div>
                        <div class="exam-answer active">B — ლურჯი ავტომობილი <span>●</span></div>
                        <div class="exam-answer">C — ორივე ერთდროულად <span>○</span></div>
                    </div>

                    <div class="exam-progress">
                        <div class="exam-progress-top">
                            <span>მზადყოფნა</span>
                            <b>68%</b>
                        </div>
                        <div class="exam-progress-line">
                            <div class="exam-progress-fill"></div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="ai-popup reveal">
                <b>AI ახსნა</b>
                <p>
                    სწორი პასუხია B, რადგან ამ სიტუაციაში პრიორიტეტი აქვს იმ მიმართულებას,
                    საიდანაც მოძრაობა ნებადართულია საგზაო წესის მიხედვით.
                </p>
            </div>

            <div class="floating-score reveal">
                <strong>18/20</strong>
                <span>დღის შედეგი</span>
            </div>
        </div>
    </div>
</section>

<script>
window.addEventListener('load', () => {
    if (window.gsap && window.ScrollTrigger) {
        gsap.from('.exam-device', {
            y: 80,
            opacity: 0,
            scale: .94,
            duration: .95,
            ease: 'expo.out',
            scrollTrigger: {
                trigger: '.live-exam-section',
                start: 'top 72%',
                toggleActions: 'play none none reverse'
            }
        });

        gsap.from('.ai-popup', {
            y: 40,
            opacity: 0,
            scale: .92,
            duration: .8,
            delay: .28,
            ease: 'expo.out',
            scrollTrigger: {
                trigger: '.live-exam-section',
                start: 'top 68%',
                toggleActions: 'play none none reverse'
            }
        });

        gsap.from('.floating-score', {
            y: 35,
            opacity: 0,
            scale: .9,
            duration: .75,
            delay: .42,
            ease: 'expo.out',
            scrollTrigger: {
                trigger: '.live-exam-section',
                start: 'top 68%',
                toggleActions: 'play none none reverse'
            }
        });

        gsap.to('.exam-progress-fill', {
            width: '68%',
            duration: 1.2,
            ease: 'expo.out',
            scrollTrigger: {
                trigger: '.live-exam-section',
                start: 'top 66%',
                toggleActions: 'play none none reverse'
            }
        });

        gsap.to('.exam-device', {
            y: -24,
            ease: 'none',
            scrollTrigger: {
                trigger: '.live-exam-section',
                start: 'top bottom',
                end: 'bottom top',
                scrub: 1
            }
        });

        gsap.to('.ai-popup', {
            y: 18,
            ease: 'none',
            scrollTrigger: {
                trigger: '.live-exam-section',
                start: 'top bottom',
                end: 'bottom top',
                scrub: 1
            }
        });
    }
});
</script>



    {{-- Testimonials / Results --}}
    <section class="proof-section">
        <div class="proof-head">
            <span>შედეგები და ნდობა</span>
            <h2>სწავლა, რომელიც გამოცდამდე თავდაჯერებულად მიგიყვანს</h2>
            <p>ფიზიკური კურსი, ონლაინ თეორია და გამოცდის რეალური სიმულაცია ერთ premium გარემოში.</p>
        </div>

        <div class="results-grid">
            <div class="result-card">
                <strong>94%</strong>
                <span>მომზადებული მოსწავლეების წარმატებული შედეგი</span>
            </div>
            <div class="result-card">
                <strong>5K+</strong>
                <span>გავლილი სატესტო კითხვა პლატფორმაზე</span>
            </div>
            <div class="result-card">
                <strong>24/7</strong>
                <span>ონლაინ სწავლა ნებისმიერი მოწყობილობიდან</span>
            </div>
        </div>

        <div class="testimonials-grid">
            <article class="testimonial-card">
                <p>“პირველად ვიგრძენი, რომ თეორია არ იყო რთული. ახსნა მარტივია, ტესტები კი გამოცდას ჰგავს.”</p>
                <div>
                    <b>ნიკა მ.</b>
                    <span>თეორიის კურსი</span>
                </div>
            </article>

            <article class="testimonial-card">
                <p>“შეცდომაზე ადამიანურად მიხსნის რატომ არის პასუხი არასწორი. ეგ ყველაზე მეტად დამეხმარა.”</p>
                <div>
                    <b>მარიამ კ.</b>
                    <span>Exam Simulator</span>
                </div>
            </article>

            <article class="testimonial-card">
                <p>“ფიზიკურ გაკვეთილებთან ერთად ონლაინ ვიმეორებდი და გამოცდაზე ბევრად მშვიდად გავედი.”</p>
                <div>
                    <b>გიორგი რ.</b>
                    <span>Premium Course</span>
                </div>
            </article>
        </div>
    </section>

    {{-- Final CTA --}}
    <section class="final-cta">
        <div class="cta-orb"></div>
        <div class="final-cta-inner">
            <span>Premium Driving Academy</span>
            <h2>დაიწყე სწავლა დღეს — გამოცდაზე გადი მზად</h2>
            <p>აირჩიე ფიზიკური კურსი, ონლაინ თეორია ან გამოცდის სიმულაცია და ისწავლე იმ სტილით, რომელიც რეალურად მუშაობს.</p>

            <div class="cta-actions">
                <a href="/autoschool/exam" class="cta-primary">გამოცდის სიმულაცია</a>
                <a href="#packages" class="cta-secondary">კურსების ნახვა</a>
            </div>
        </div>
    </section>

    {{-- Footer --}}
    <footer class="premium-footer">
        <div>
            <h3>Driving Academy</h3>
            <p>ფიზიკური და ონლაინ თეორიის premium სასწავლო პლატფორმა.</p>
        </div>

        <div class="footer-links">
            <a href="/autoschool">მთავარი</a>
            <a href="/autoschool/exam">გამოცდა</a>
            <a href="#packages">კურსები</a>
        </div>
    </footer>



<script>
document.addEventListener('DOMContentLoaded', () => {
    if (window.gsap && window.ScrollTrigger) {
        gsap.utils.toArray('.result-card').forEach((card, i) => {
            gsap.from(card, {
                scrollTrigger: {
                    trigger: card,
                    start: 'top 86%',
                    once: true
                },
                y: 42,
                opacity: 0,
                duration: .9,
                delay: i * .08,
                ease: 'power3.out'
            });
        });

        gsap.utils.toArray('.testimonial-card').forEach((card, i) => {
            gsap.from(card, {
                scrollTrigger: {
                    trigger: card,
                    start: 'top 88%',
                    once: true
                },
                y: 34,
                opacity: 0,
                scale: .97,
                duration: .85,
                delay: i * .07,
                ease: 'power3.out'
            });
        });

        gsap.from('.final-cta-inner', {
            scrollTrigger: {
                trigger: '.final-cta',
                start: 'top 72%',
                once: true
            },
            y: 46,
            opacity: 0,
            duration: 1,
            ease: 'power3.out'
        });

        gsap.to('.cta-orb', {
            scrollTrigger: {
                trigger: '.final-cta',
                start: 'top bottom',
                end: 'bottom top',
                scrub: 1
            },
            y: 120,
            scale: 1.08,
            ease: 'none'
        });
    }
});
</script>


<style id="premium-font-override">
html,
body,
body *,
button,
input,
textarea,
select{
    font-family:'Plus Jakarta Sans',sans-serif !important;
}

h1,h2,h3,h4,h5,h6{
    font-family:'Plus Jakarta Sans',sans-serif !important;
    font-weight:800 !important;
    letter-spacing:-0.045em !important;
}

.hero h1{
    font-size:clamp(56px,7vw,96px) !important;
    line-height:.92 !important;
}

.hero p{
    font-size:20px !important;
    line-height:1.8 !important;
}
</style>

</body>
</html>

<style>
/* Premium Navy + Electric Blue Theme Override */
:root{
    --as-bg:#050B14;
    --as-bg-2:#07111F;
    --as-card:#0E1B2E;
    --as-card-2:#10233C;
    --as-blue:#3B82F6;
    --as-blue-2:#60A5FA;
    --as-text:#F8FAFC;
    --as-muted:rgba(248,250,252,.68);
    --as-line:rgba(96,165,250,.18);
}

html,
body{
    background:var(--as-bg) !important;
    color:var(--as-text) !important;
}

body:before{
    content:"";
    position:fixed;
    inset:0;
    z-index:-2;
    background:
        radial-gradient(circle at 15% 12%, rgba(59,130,246,.20), transparent 32%),
        radial-gradient(circle at 84% 20%, rgba(96,165,250,.13), transparent 30%),
        radial-gradient(circle at 50% 92%, rgba(37,99,235,.16), transparent 36%),
        linear-gradient(180deg,#050B14 0%,#07111F 42%,#030712 100%);
    pointer-events:none;
}

section,
.hero,
.premium-section,
.packages-section,
.exam-section,
.proof-section{
    background:
        radial-gradient(circle at 18% 18%, rgba(59,130,246,.14), transparent 34%),
        radial-gradient(circle at 82% 70%, rgba(96,165,250,.09), transparent 34%),
        linear-gradient(180deg,#07111F 0%,#050B14 100%) !important;
    color:var(--as-text) !important;
}

.final-cta{
    background:
        radial-gradient(circle at 85% 10%, rgba(96,165,250,.28), transparent 34%),
        linear-gradient(135deg,#07111F 0%,#0E1B2E 48%,#050B14 100%) !important;
    color:var(--as-text) !important;
}

.premium-footer{
    background:#030712 !important;
    color:var(--as-text) !important;
    border-top:1px solid var(--as-line) !important;
}

h1,h2,h3,h4,
.proof-head h2,
.final-cta-inner h2{
    color:var(--as-text) !important;
}

p,
.proof-head p,
.final-cta-inner p,
.premium-footer p{
    color:var(--as-muted) !important;
}

a{
    color:inherit;
}

.card,
.premium-card,
.package-card,
.exam-mockup,
.result-card,
.testimonial-card{
    background:
        linear-gradient(145deg,rgba(16,35,60,.82),rgba(7,17,31,.70)) !important;
    border:1px solid var(--as-line) !important;
    color:var(--as-text) !important;
    box-shadow:
        0 28px 90px rgba(0,0,0,.35),
        inset 0 1px 0 rgba(255,255,255,.06) !important;
    backdrop-filter:blur(18px);
}

.testimonial-card p,
.testimonial-card b,
.testimonial-card span{
    color:var(--as-text) !important;
}

.testimonial-card span{
    opacity:.62;
}

.result-card strong{
    color:var(--as-blue-2) !important;
    text-shadow:0 0 34px rgba(96,165,250,.35);
}

.proof-head span,
.final-cta-inner span,
.badge,
.kicker,
.eyebrow{
    color:var(--as-blue-2) !important;
    border-color:var(--as-line) !important;
    background:rgba(59,130,246,.10) !important;
}

.cta-primary,
button,
.btn-primary{
    background:linear-gradient(135deg,#2563EB,#60A5FA) !important;
    color:#fff !important;
    border:0 !important;
    box-shadow:0 18px 55px rgba(59,130,246,.30) !important;
}

.cta-secondary,
.btn-secondary{
    background:rgba(96,165,250,.08) !important;
    color:var(--as-text) !important;
    border:1px solid var(--as-line) !important;
}

.cta-primary:hover,
.cta-secondary:hover,
button:hover{
    transform:translateY(-3px);
    box-shadow:0 22px 70px rgba(59,130,246,.36) !important;
}

.cta-orb{
    background:radial-gradient(circle,#60A5FA 0%,rgba(59,130,246,.24) 42%,transparent 72%) !important;
}

.footer-links a{
    color:rgba(248,250,252,.68) !important;
}

.footer-links a:hover{
    color:var(--as-blue-2) !important;
}

/* road / car visual blue light feeling */
.road,
.car-visual,
.hero-visual{
    filter:drop-shadow(0 30px 80px rgba(59,130,246,.20));
}

.road:before,
.road:after{
    background:rgba(96,165,250,.35) !important;
}

*::selection{
    background:rgba(96,165,250,.35);
    color:#fff;
}
</style>
