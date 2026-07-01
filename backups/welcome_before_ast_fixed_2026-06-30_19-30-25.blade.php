<!DOCTYPE html>
<html lang="ka">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>სტარტის ავტოსკოლა</title>

<style>
*{box-sizing:border-box}
html{scroll-behavior:smooth}
body{
    margin:0;
    font-family:system-ui,-apple-system,BlinkMacSystemFont,"Segoe UI",sans-serif;
    background:#06101a;
    color:#fff;
    overflow-x:hidden;
}
a{text-decoration:none;color:inherit}

.neon-hero{
    min-height:100vh;
    position:relative;
    overflow:hidden;
    padding:28px 34px 34px;
    background:
        radial-gradient(circle at 76% 35%, rgba(42,214,255,.22), transparent 28%),
        radial-gradient(circle at 56% 18%, rgba(172,74,255,.20), transparent 26%),
        linear-gradient(90deg, rgba(6,16,26,.96) 0%, rgba(8,22,36,.88) 48%, rgba(6,16,26,.96) 100%),
        url("/autoschool/images/hero-driving-school.webp") center/cover no-repeat;
}
.neon-hero:before{
    content:"";
    position:absolute;
    inset:0;
    background:
        linear-gradient(90deg,rgba(255,255,255,.04) 1px,transparent 1px) 0 0/72px 72px,
        linear-gradient(0deg,rgba(255,255,255,.035) 1px,transparent 1px) 0 0/72px 72px;
    opacity:.55;
    pointer-events:none;
}
.neon-hero:after{
    content:"";
    position:absolute;
    inset:0;
    background:linear-gradient(180deg,rgba(6,16,26,.10),rgba(6,16,26,.92));
    pointer-events:none;
}

.neon-nav{
    position:relative;
    z-index:10;
    width:min(1500px,100%);
    height:98px;
    margin:0 auto;
    padding:14px 26px;
    border-radius:0 0 34px 34px;
    background:rgba(9,20,34,.72);
    border:1px solid rgba(111,219,255,.22);
    box-shadow:
        0 24px 70px rgba(0,0,0,.35),
        inset 0 0 0 1px rgba(255,255,255,.04);
    backdrop-filter:blur(22px);
    display:flex;
    align-items:center;
    justify-content:space-between;
}
.logo{
    display:flex;
    align-items:center;
    gap:14px;
}
.logo-mark{
    width:58px;
    height:58px;
    border-radius:50%;
    display:grid;
    place-items:center;
    border:3px solid rgba(91,226,255,.9);
    box-shadow:0 0 25px rgba(91,226,255,.45);
    color:#fff;
    font-size:26px;
}
.logo-text strong{
    display:block;
    font-size:24px;
    line-height:.9;
    letter-spacing:-1px;
}
.logo-text b{
    display:block;
    color:#2de2e6;
    font-size:25px;
    line-height:1;
    letter-spacing:-1px;
}
.rocket{
    font-size:48px;
    filter:drop-shadow(0 0 18px rgba(138,92,255,.75));
    transform:rotate(-12deg);
}
.nav-center{
    display:flex;
    align-items:center;
    gap:4px;
    padding:6px;
    border-radius:14px;
    background:rgba(255,255,255,.05);
    border:1px solid rgba(125,226,255,.18);
}
.nav-center a{
    height:46px;
    padding:0 22px;
    display:flex;
    align-items:center;
    border-radius:11px;
    color:rgba(255,255,255,.68);
    font-size:17px;
    font-weight:800;
}
.nav-center a.active{
    color:#dff8ff;
    background:rgba(54,198,255,.14);
    box-shadow:0 0 22px rgba(54,198,255,.25), inset 0 0 0 1px rgba(54,198,255,.28);
}
.nav-action{
    height:54px;
    padding:0 28px;
    border-radius:12px;
    display:flex;
    align-items:center;
    gap:10px;
    color:#fff;
    font-weight:900;
    font-size:17px;
    background:rgba(21,108,255,.18);
    border:1px solid rgba(90,189,255,.5);
    box-shadow:0 0 28px rgba(21,108,255,.25);
}

.hero-grid{
    position:relative;
    z-index:5;
    width:min(1500px,100%);
    margin:52px auto 0;
    display:grid;
    grid-template-columns:.88fr 1.12fr;
    gap:40px;
    align-items:center;
}
.copy{
    padding-left:16px;
}
.copy h1{
    margin:0 0 26px;
    font-size:clamp(54px,6vw,88px);
    line-height:.95;
    letter-spacing:-3.8px;
    font-weight:1000;
    background:linear-gradient(90deg,#2de2e6,#7aa8ff,#c150ff);
    -webkit-background-clip:text;
    background-clip:text;
    color:transparent;
    text-shadow:0 0 35px rgba(45,226,230,.22);
}
.copy p{
    max-width:650px;
    margin:0 0 22px;
    color:rgba(255,255,255,.82);
    font-size:20px;
    line-height:1.65;
    font-weight:650;
}
.store-row{
    margin-top:52px;
    display:flex;
    gap:14px;
    flex-wrap:wrap;
}
.store-row a{
    background:#05070b;
    color:#fff;
    border:1px solid rgba(255,255,255,.18);
    border-radius:8px;
    padding:14px 20px;
    font-weight:900;
    box-shadow:0 12px 28px rgba(0,0,0,.35);
}

.visual{
    position:relative;
    min-height:560px;
}
.map-orb{
    position:absolute;
    right:150px;
    top:0;
    width:460px;
    height:460px;
    border-radius:50%;
    background:
        radial-gradient(circle at 40% 38%,rgba(36,222,255,.30),transparent 24%),
        linear-gradient(135deg,rgba(15,48,82,.96),rgba(10,22,40,.96));
    border:3px solid rgba(74,213,255,.85);
    box-shadow:
        0 0 42px rgba(45,226,230,.35),
        inset 0 0 60px rgba(45,226,230,.08);
    overflow:hidden;
}
.map-orb:before{
    content:"";
    position:absolute;
    inset:0;
    background:
        linear-gradient(35deg, transparent 18%, rgba(55,217,255,.20) 19%, rgba(55,217,255,.20) 23%, transparent 24%),
        linear-gradient(120deg, transparent 35%, rgba(190,75,255,.22) 36%, rgba(190,75,255,.22) 40%, transparent 41%),
        linear-gradient(80deg, transparent 54%, rgba(55,217,255,.18) 55%, rgba(55,217,255,.18) 59%, transparent 60%);
}
.map-orb:after{
    content:"";
    position:absolute;
    left:95px;
    top:125px;
    width:260px;
    height:210px;
    border-left:7px solid #28dfff;
    border-bottom:7px solid #bd45ff;
    border-top:7px solid #28dfff;
    border-radius:36px;
    transform:rotate(-18deg) skewX(-8deg);
    filter:drop-shadow(0 0 12px rgba(45,226,230,.95));
}
.pin{
    position:absolute;
    z-index:5;
    width:22px;
    height:22px;
    border-radius:50%;
    background:#fff;
    border:6px solid #c150ff;
    box-shadow:0 0 0 8px rgba(193,80,255,.20),0 0 20px rgba(193,80,255,.8);
}
.p1{left:150px;top:260px}
.p2{left:270px;top:135px}
.p3{left:330px;top:250px}

.car-white,
.car-dark{
    position:absolute;
    overflow:hidden;
    border-radius:26px;
    background:#fff;
    box-shadow:0 28px 70px rgba(0,0,0,.38);
}
.car-white{
    right:0;
    bottom:92px;
    width:560px;
    height:280px;
    z-index:4;
}
.car-dark{
    left:20px;
    bottom:98px;
    width:360px;
    height:210px;
    z-index:3;
    filter:saturate(.15) brightness(.72) contrast(1.2);
}
.car-white img,
.car-dark img{
    width:100%;
    height:100%;
    object-fit:cover;
    display:block;
}
.car-white:after,
.car-dark:after{
    content:"";
    position:absolute;
    inset:0;
    background:linear-gradient(135deg,rgba(6,16,26,.12),rgba(6,16,26,.02));
}

.cat-strip{
    position:relative;
    z-index:8;
    width:min(1500px,100%);
    margin:12px auto 0;
    padding:12px;
    border-radius:24px;
    display:grid;
    grid-template-columns:repeat(9,1fr);
    gap:10px;
    background:rgba(7,25,42,.72);
    border:1px solid rgba(80,218,255,.34);
    box-shadow:0 0 35px rgba(45,226,230,.18);
    backdrop-filter:blur(18px);
}
.cat-strip div{
    height:78px;
    border-radius:16px;
    display:flex;
    flex-direction:column;
    align-items:center;
    justify-content:center;
    gap:6px;
    color:#dff8ff;
    background:linear-gradient(180deg,rgba(45,226,230,.12),rgba(21,108,255,.10));
    border:1px solid rgba(85,216,255,.32);
    box-shadow:inset 0 0 18px rgba(45,226,230,.10);
}
.cat-strip span{font-size:25px}
.cat-strip b{font-size:14px}

.section{
    padding:90px 34px;
    background:#07111d;
}
.container{
    width:min(1200px,100%);
    margin:auto;
}
.cards{
    display:grid;
    grid-template-columns:repeat(3,1fr);
    gap:18px;
}
.card{
    padding:28px;
    border-radius:26px;
    background:rgba(255,255,255,.05);
    border:1px solid rgba(80,218,255,.18);
    color:#fff;
}
.card h3{margin:0 0 10px}
.card p{margin:0;color:rgba(255,255,255,.68);line-height:1.6}

@media(max-width:1000px){
    .nav-center{display:none}
    .rocket{display:none}
    .hero-grid{grid-template-columns:1fr}
    .visual{min-height:520px}
    .cat-strip{grid-template-columns:repeat(3,1fr)}
}
@media(max-width:680px){
    .neon-hero{padding:14px 16px 28px}
    .neon-nav{height:76px;border-radius:22px;padding:10px 14px}
    .logo-text strong{font-size:16px}
    .logo-text b{font-size:17px}
    .nav-action{display:none}
    .hero-grid{margin-top:42px}
    .copy{padding-left:0}
    .copy h1{font-size:42px;letter-spacing:-2px}
    .copy p{font-size:16px}
    .visual{min-height:430px}
    .map-orb{width:310px;height:310px;right:0}
    .car-white{width:330px;height:190px;right:0;bottom:60px}
    .car-dark{display:none}
    .cat-strip{grid-template-columns:repeat(2,1fr)}
    .cards{grid-template-columns:1fr}
}
</style>
</head>

<body>

<header class="neon-hero">
    <nav class="neon-nav">
        <a href="/autoschool" class="logo">
            <span class="logo-mark">🚘</span>
            <span class="logo-text">
                <strong>სტარტის</strong>
                <b>ავტოსკოლა</b>
            </span>
        </a>

        <div class="rocket">🚀</div>

        <div class="nav-center">
            <a class="active" href="/autoschool">Home</a>
            <a href="#program">გზამკვლევი</a>
            <a href="/autoschool/exam">Exam</a>
            <a href="#info">Info</a>
            <a href="#contact">კონტაქტი</a>
        </div>

        <a class="nav-action" href="/autoschool/exam">⌾ Map and Services</a>
    </nav>

    <div class="hero-grid">
        <div class="copy">
            <h1>ავტოსკოლა სტარტი</h1>

            <p>
                ავტოსკოლა სტარტი გთავაზობთ თანამედროვე სასწავლო პროგრამას,
                თეორიულ მომზადებას და პრაქტიკულ გაკვეთილებს.
            </p>

            <p>
                ჩვენთან შეგიძლია ივარჯიშო ონლაინ ტესტებით, გაიარო გამოცდის
                სიმულაცია და გახვიდე გამოცდაზე უფრო თავდაჯერებულად.
            </p>

            <div class="store-row">
                <a href="/autoschool/exam">▶ ტესტის დაწყება</a>
                <a href="#program">◆ კურსის ნახვა</a>
            </div>
        </div>

        <div class="visual">
            <div class="map-orb">
                <span class="pin p1"></span>
                <span class="pin p2"></span>
                <span class="pin p3"></span>
            </div>

            <div class="car-dark">
                <img src="/autoschool/images/hero-driving-school.webp" alt="ავტოსკოლა">
            </div>

            <div class="car-white">
                <img src="/autoschool/images/hero-driving-school.webp" alt="ავტოსკოლა">
            </div>
        </div>
    </div>

    <div class="cat-strip">
        <div><span>🛵</span><b>AM</b></div>
        <div><span>🏍️</span><b>A1</b></div>
        <div><span>🚗</span><b>B/B1</b></div>
        <div><span>🚚</span><b>C</b></div>
        <div><span>🚐</span><b>C1</b></div>
        <div><span>🚌</span><b>D</b></div>
        <div><span>🚐</span><b>D1</b></div>
        <div><span>🚜</span><b>T/S</b></div>
        <div><span>🚋</span><b>Tram</b></div>
    </div>
</header>

<section id="program" class="section">
    <div class="container">
        <div class="cards">
            <article class="card">
                <h3>თეორია</h3>
                <p>საგამოცდო კითხვები და ნიშნები მარტივი ახსნით.</p>
            </article>

            <article class="card">
                <h3>პრაქტიკა</h3>
                <p>სასწავლო მოედანი და ქალაქში მოძრაობის გაკვეთილები.</p>
            </article>

            <article class="card">
                <h3>გამოცდა</h3>
                <p>ტესტები რეალური გამოცდის ფორმატით.</p>
            </article>
        </div>
    </div>
</section>

</body>
</html>
