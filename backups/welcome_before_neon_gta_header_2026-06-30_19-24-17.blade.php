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
    --dark:#0b1220;
    --muted:#66758a;
    --line:#e4ecf7;
}

.nav{
    position:fixed;
    top:20px;
    left:50%;
    transform:translateX(-50%);
    width:min(1180px,calc(100% - 34px));
    height:72px;
    z-index:999;
    padding:9px 10px 9px 16px;
    border-radius:26px;
    display:flex;
    align-items:center;
    justify-content:space-between;
    background:rgba(255,255,255,.88);
    border:1px solid rgba(255,255,255,.9);
    backdrop-filter:blur(22px);
    box-shadow:0 24px 70px rgba(15,35,70,.10);
}
.brand{
    display:flex;
    align-items:center;
    gap:12px;
    font-weight:1000;
    color:#0b1220;
}
.brand span{
    width:46px;
    height:46px;
    border-radius:16px;
    display:grid;
    place-items:center;
    color:white;
    background:#0b1220;
    box-shadow:0 16px 34px rgba(11,18,32,.22);
}
.menu{
    display:flex;
    gap:4px;
    align-items:center;
}
.menu a{
    height:46px;
    padding:0 16px;
    display:flex;
    align-items:center;
    border-radius:16px;
    color:#5d6d82;
    font-size:14px;
    font-weight:900;
}
.menu a:hover{
    background:#edf5ff;
    color:var(--blue);
}
.nav-cta{
    height:52px;
    padding:0 22px;
    border-radius:18px;
    display:flex;
    align-items:center;
    color:white!important;
    background:linear-gradient(135deg,#1c7dff,#0b57e8);
    font-weight:1000!important;
    box-shadow:0 16px 34px rgba(21,108,255,.30);
}

.hero{
    position:relative;
    min-height:100vh;
    padding:134px 24px 70px;
    overflow:hidden;
    background:
        radial-gradient(circle at 18% 18%,rgba(21,108,255,.13),transparent 30%),
        radial-gradient(circle at 85% 12%,rgba(11,18,32,.08),transparent 28%),
        linear-gradient(180deg,#fff 0%,#f6f9ff 100%);
}
.hero:before{
    content:"";
    position:absolute;
    inset:0;
    background:
        linear-gradient(90deg,rgba(21,108,255,.045) 1px,transparent 1px) 0 0/82px 82px,
        linear-gradient(0deg,rgba(21,108,255,.045) 1px,transparent 1px) 0 0/82px 82px;
    pointer-events:none;
}
.shell{
    position:relative;
    z-index:2;
    width:min(1180px,100%);
    margin:auto;
    display:grid;
    grid-template-columns:.92fr 1.08fr;
    gap:58px;
    align-items:center;
}
.kicker{
    display:inline-flex;
    align-items:center;
    gap:10px;
    padding:11px 15px;
    border-radius:999px;
    background:#eef5ff;
    border:1px solid #d8e8ff;
    color:var(--blue);
    font-size:14px;
    font-weight:1000;
    margin-bottom:28px;
}
.kicker span{
    width:9px;
    height:9px;
    border-radius:50%;
    background:var(--blue);
    box-shadow:0 0 0 7px rgba(21,108,255,.13);
}
h1{
    margin:0 0 24px;
    max-width:690px;
    font-size:clamp(54px,6vw,92px);
    line-height:.9;
    letter-spacing:-4.8px;
    color:var(--dark);
}
h1 em{
    display:block;
    font-style:normal;
    color:var(--blue);
}
.lead{
    max-width:620px;
    margin:0;
    color:var(--muted);
    font-size:19px;
    line-height:1.75;
    font-weight:720;
}
.actions{
    margin-top:34px;
    display:flex;
    gap:13px;
    flex-wrap:wrap;
}
.btn{
    height:58px;
    padding:0 24px;
    border-radius:18px;
    display:inline-flex;
    align-items:center;
    font-size:16px;
    font-weight:1000;
}
.btn.primary{
    background:#0b1220;
    color:white;
    box-shadow:0 18px 42px rgba(11,18,32,.23);
}
.btn.secondary{
    background:white;
    color:#0b1220;
    border:1px solid var(--line);
    box-shadow:0 14px 34px rgba(15,35,70,.06);
}

.journey{
    margin-top:48px;
    display:grid;
    grid-template-columns:repeat(4,1fr);
    gap:12px;
    max-width:720px;
}
.journey div{
    position:relative;
    padding:18px;
    border-radius:22px;
    background:white;
    border:1px solid var(--line);
    box-shadow:0 16px 34px rgba(15,35,70,.055);
}
.journey div:after{
    content:"";
    position:absolute;
    right:-18px;
    top:50%;
    width:24px;
    height:2px;
    background:#cfe0f6;
}
.journey div:last-child:after{display:none}
.journey span{
    display:block;
    color:#9aa8ba;
    font-size:12px;
    font-weight:1000;
    margin-bottom:8px;
}
.journey b{
    font-size:15px;
}
.journey .active{
    background:#0b1220;
    color:white;
}
.journey .active span{color:#93c5fd}

.visual{
    position:relative;
    min-height:620px;
}
.license-card{
    position:absolute;
    right:0;
    top:32px;
    width:610px;
    min-height:390px;
    border-radius:42px;
    padding:30px;
    background:#0b1220;
    color:white;
    box-shadow:0 40px 110px rgba(11,18,32,.30);
    overflow:hidden;
}
.license-card:before{
    content:"";
    position:absolute;
    inset:0;
    background:
        radial-gradient(circle at 20% 20%,rgba(21,108,255,.34),transparent 32%),
        linear-gradient(90deg,rgba(255,255,255,.05) 1px,transparent 1px) 0 0/54px 54px,
        linear-gradient(0deg,rgba(255,255,255,.05) 1px,transparent 1px) 0 0/54px 54px;
}
.license-card > *{position:relative}
.license-top{
    display:flex;
    justify-content:space-between;
    align-items:center;
}
.license-top small{
    color:#93c5fd;
    font-size:12px;
    font-weight:1000;
    letter-spacing:1.2px;
}
.license-top b{
    width:48px;
    height:48px;
    border-radius:16px;
    background:var(--blue);
    display:grid;
    place-items:center;
}
.license-title{
    margin:42px 0 24px;
}
.license-title h3{
    margin:0;
    font-size:44px;
    line-height:.95;
    letter-spacing:-2.5px;
}
.license-title p{
    margin:12px 0 0;
    color:#cbd5e1;
    line-height:1.5;
}
.road-map{
    height:118px;
    border-radius:28px;
    background:rgba(255,255,255,.07);
    position:relative;
    overflow:hidden;
}
.road-map:before{
    content:"";
    position:absolute;
    left:-20px;
    right:-20px;
    top:54px;
    height:8px;
    border-radius:99px;
    background:linear-gradient(90deg,#156cff,#60a5fa,#156cff);
    box-shadow:0 0 24px rgba(21,108,255,.75);
    transform:rotate(-8deg);
}
.node{
    position:absolute;
    width:20px;
    height:20px;
    border-radius:50%;
    background:white;
    border:6px solid #156cff;
    z-index:2;
}
.n1{left:55px;top:70px}
.n2{left:220px;top:48px}
.n3{left:390px;top:26px}
.n4{right:55px;top:42px}

.photo-ticket{
    position:absolute;
    left:0;
    bottom:30px;
    width:430px;
    height:285px;
    border-radius:36px;
    overflow:hidden;
    background:white;
    border:1px solid rgba(255,255,255,.8);
    box-shadow:0 30px 90px rgba(15,35,70,.22);
}
.photo-ticket img{
    width:100%;
    height:100%;
    object-fit:cover;
    display:block;
}
.photo-ticket:after{
    content:"";
    position:absolute;
    inset:0;
    background:linear-gradient(180deg,transparent 30%,rgba(11,18,32,.32));
}
.ticket-label{
    position:absolute;
    left:22px;
    bottom:22px;
    z-index:2;
    padding:11px 15px;
    border-radius:999px;
    background:rgba(255,255,255,.86);
    color:#0b1220;
    font-size:13px;
    font-weight:1000;
    backdrop-filter:blur(14px);
}
.floating-note{
    position:absolute;
    right:22px;
    bottom:92px;
    z-index:5;
    width:250px;
    padding:18px;
    border-radius:24px;
    background:rgba(255,255,255,.90);
    border:1px solid rgba(255,255,255,.75);
    backdrop-filter:blur(18px);
    box-shadow:0 24px 60px rgba(15,35,70,.14);
}
.floating-note b{
    display:block;
    margin-bottom:6px;
}
.floating-note span{
    color:#718096;
    font-size:13px;
    line-height:1.45;
    font-weight:850;
}

.section{
    padding:96px 24px;
    background:white;
}
.section.alt{background:#f6f9ff}
.container{
    width:min(1180px,100%);
    margin:auto;
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
    font-size:clamp(34px,4vw,56px);
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
.card h3{margin:0 0 10px;font-size:23px}
.card p{margin:0;color:var(--muted);line-height:1.68}

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
.cta p{margin:0;color:rgba(255,255,255,.75)}
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
    .visual{min-height:720px}
    .license-card{width:100%}
    .photo-ticket{width:80%}
    .cards{grid-template-columns:1fr}
}
@media(max-width:680px){
    .nav{top:12px;width:calc(100% - 22px);height:66px;border-radius:22px}
    .brand b{font-size:14px}
    .nav-cta{height:46px;padding:0 16px;font-size:13px}
    .hero{padding:102px 18px 54px}
    h1{font-size:42px;letter-spacing:-2.2px}
    .lead{font-size:16px}
    .journey{grid-template-columns:1fr}
    .journey div:after{display:none}
    .visual{min-height:690px}
    .license-card{min-height:370px;border-radius:30px;padding:24px}
    .license-title h3{font-size:34px}
    .photo-ticket{width:100%;height:230px;bottom:50px}
    .floating-note{display:none}
    .section{padding:74px 18px}
    .cta{flex-direction:column;align-items:flex-start;padding:32px}
}
</style>
</head>

<body>

<nav class="nav">
    <a href="/autoschool" class="brand">
        <span>DM</span>
        <b>Drive Academy</b>
    </a>

    <div class="menu">
        <a href="#program">პროგრამა</a>
        <a href="#steps">გზა</a>
        <a href="/autoschool/exam">გამოცდა</a>
        <a href="#contact">კონტაქტი</a>
    </div>

    <a href="/autoschool/exam" class="nav-cta">დაწყება</a>
</nav>

<header class="hero">
    <div class="shell">
        <div>
            <div class="kicker"><span></span> Road to License</div>

            <h1>შენი გზა <em>მართვის მოწმობამდე</em></h1>

            <p class="lead">
                DM Drive Academy გაძლევს მარტივ და გასაგებ გზას: თეორიიდან პრაქტიკამდე,
                პრაქტიკიდან გამოცდამდე და გამოცდიდან მართვის მოწმობამდე.
            </p>

            <div class="actions">
                <a href="/autoschool/exam" class="btn primary">დაიწყე ტესტი</a>
                <a href="#program" class="btn secondary">ნახე პროგრამა</a>
            </div>

            <div class="journey">
                <div>
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
                <div>
                    <span>04</span>
                    <b>მოწმობა</b>
                </div>
            </div>
        </div>

        <div class="visual">
            <div class="license-card">
                <div class="license-top">
                    <small>LICENSE JOURNEY</small>
                    <b>A</b>
                </div>

                <div class="license-title">
                    <h3>Progress Route</h3>
                    <p>სწავლის ეტაპები ერთ ვიზუალურ სისტემაში.</p>
                </div>

                <div class="road-map">
                    <span class="node n1"></span>
                    <span class="node n2"></span>
                    <span class="node n3"></span>
                    <span class="node n4"></span>
                </div>
            </div>

            <div class="photo-ticket">
                <img src="/autoschool/images/hero-driving-school.webp" alt="DM ავტოსკოლა">
                <div class="ticket-label">პრაქტიკული გაკვეთილები</div>
            </div>

            <div class="floating-note">
                <b>Exam Simulator</b>
                <span>ტესტები რეალური გამოცდის ფორმატით.</span>
            </div>
        </div>
    </div>
</header>

<section id="program" class="section">
    <div class="container">
        <div class="title">
            <small>პროგრამა</small>
            <h2>სრული მომზადება ერთ სივრცეში</h2>
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

<section class="section alt">
    <div class="container">
        <div class="cta">
            <div>
                <h2>მზად ხარ პირველი ტესტისთვის?</h2>
                <p>დაიწყე თეორიის ტესტი და ნახე რამდენად მზად ხარ გამოცდისთვის.</p>
            </div>
            <a href="/autoschool/exam">ტესტის დაწყება</a>
        </div>
    </div>
</section>

<script>
document.querySelectorAll('a[href^="#"]').forEach(a=>{
    a.addEventListener('click',e=>{
        const id=a.getAttribute('href');
        const el=document.querySelector(id);
        if(el){
            e.preventDefault();
            el.scrollIntoView({behavior:'smooth'});
        }
    });
});
</script>

</body>
</html>
