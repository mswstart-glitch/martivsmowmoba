<!DOCTYPE html>
<html lang="ka">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>DM ავტოსკოლა</title>

<style>
*{box-sizing:border-box}
html{scroll-behavior:smooth}
body{
    margin:0;
    font-family:system-ui,-apple-system,BlinkMacSystemFont,"Segoe UI",sans-serif;
    background:#f7fbff;
    color:#102033;
    overflow-x:hidden;
}
a{text-decoration:none;color:inherit}

.nav{
    position:fixed;
    top:20px;
    left:50%;
    transform:translateX(-50%);
    width:min(1080px,calc(100% - 36px));
    height:72px;
    padding:8px 10px 8px 16px;
    border-radius:999px;
    background:rgba(255,255,255,.86);
    border:1px solid rgba(37,99,235,.16);
    backdrop-filter:blur(22px);
    box-shadow:0 22px 60px rgba(15,70,145,.16);
    z-index:999;
    display:flex;
    align-items:center;
    justify-content:space-between;
}
.brand{
    display:flex;
    align-items:center;
    gap:10px;
    font-weight:950;
    color:#0d2442;
}
.brand-mark{
    width:42px;
    height:42px;
    border-radius:15px;
    background:linear-gradient(135deg,#5aa2ff,#1557e8);
    box-shadow:0 14px 30px rgba(37,99,235,.3);
}
.nav-links{
    display:flex;
    align-items:center;
    gap:6px;
}
.nav-links a{
    padding:13px 17px;
    border-radius:999px;
    color:#526b86;
    font-size:14px;
    font-weight:850;
    transition:.18s ease;
}
.nav-links a:hover{
    background:#edf5ff;
    color:#1557e8;
}
.nav-cta{
    background:linear-gradient(135deg,#3b82f6,#1557e8)!important;
    color:#fff!important;
    box-shadow:0 14px 34px rgba(37,99,235,.32);
}

.hero{
    min-height:100vh;
    padding:130px 0 70px;
    background:
        linear-gradient(90deg,rgba(255,255,255,.96) 0%,rgba(255,255,255,.88) 44%,rgba(255,255,255,.18) 100%),
        url("/autoschool/images/hero-driving-school.webp") center/cover no-repeat;
}
.container{
    width:min(1180px,calc(100% - 34px));
    margin:auto;
}
.hero-grid{
    display:grid;
    grid-template-columns:1fr 430px;
    gap:46px;
    align-items:center;
}
.kicker{
    display:inline-flex;
    padding:10px 15px;
    border-radius:999px;
    background:#fff;
    border:1px solid rgba(37,99,235,.13);
    color:#1557e8;
    font-size:14px;
    font-weight:900;
    box-shadow:0 12px 32px rgba(37,99,235,.08);
}
h1{
    margin:22px 0 18px;
    font-size:clamp(44px,6vw,82px);
    line-height:.94;
    letter-spacing:-3.5px;
    color:#0b2038;
}
.hero-text{
    max-width:620px;
    margin:0 0 30px;
    font-size:19px;
    line-height:1.7;
    color:#556b84;
}
.actions{
    display:flex;
    gap:13px;
    flex-wrap:wrap;
}
.btn{
    padding:16px 22px;
    border-radius:18px;
    font-weight:950;
    box-shadow:0 18px 42px rgba(20,70,140,.12);
}
.btn.primary{
    background:linear-gradient(135deg,#3b82f6,#1557e8);
    color:#fff;
}
.btn.secondary{
    background:#fff;
    color:#17406f;
    border:1px solid rgba(37,99,235,.13);
}

.exam-card{
    background:rgba(255,255,255,.82);
    border:1px solid rgba(37,99,235,.16);
    backdrop-filter:blur(24px);
    border-radius:34px;
    padding:26px;
    box-shadow:0 32px 80px rgba(15,70,145,.20);
}
.exam-top{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:22px;
}
.exam-label{
    color:#1557e8;
    font-weight:950;
    font-size:14px;
}
.exam-score{
    background:#edf5ff;
    color:#1557e8;
    padding:8px 12px;
    border-radius:999px;
    font-weight:950;
    font-size:13px;
}
.exam-card h3{
    margin:0 0 18px;
    font-size:25px;
    line-height:1.25;
    letter-spacing:-.7px;
}
.option{
    padding:15px;
    border-radius:17px;
    background:#fff;
    border:1px solid rgba(37,99,235,.10);
    color:#526b86;
    font-weight:800;
    margin-top:10px;
}
.option.active{
    background:#1557e8;
    color:#fff;
    box-shadow:0 16px 36px rgba(37,99,235,.28);
}

.stats{
    margin-top:42px;
    display:grid;
    grid-template-columns:repeat(3,1fr);
    gap:14px;
}
.stat{
    background:rgba(255,255,255,.86);
    border:1px solid rgba(37,99,235,.12);
    border-radius:24px;
    padding:22px;
    box-shadow:0 18px 50px rgba(15,70,145,.10);
}
.stat b{
    display:block;
    font-size:30px;
    color:#0b2038;
}
.stat span{
    color:#60758d;
    font-weight:750;
}

.section{
    padding:95px 0;
    background:#fff;
}
.section.alt{
    background:#f7fbff;
}
.title{
    max-width:720px;
    margin-bottom:34px;
}
.title small{
    color:#1557e8;
    font-weight:950;
}
.title h2{
    margin:9px 0 0;
    font-size:clamp(32px,4vw,54px);
    line-height:1;
    letter-spacing:-2px;
}
.cards{
    display:grid;
    grid-template-columns:repeat(3,1fr);
    gap:18px;
}
.card{
    background:#fff;
    border:1px solid rgba(37,99,235,.12);
    border-radius:30px;
    padding:28px;
    min-height:230px;
    box-shadow:0 24px 64px rgba(15,70,145,.09);
}
.icon{
    width:50px;
    height:50px;
    border-radius:18px;
    display:grid;
    place-items:center;
    background:#edf5ff;
    color:#1557e8;
    font-weight:1000;
    margin-bottom:22px;
}
.card h3{
    margin:0 0 10px;
    font-size:22px;
    color:#0b2038;
}
.card p{
    margin:0;
    color:#60758d;
    line-height:1.65;
}

.cta{
    padding:44px;
    border-radius:36px;
    background:linear-gradient(135deg,#0f3d91,#2563eb);
    color:#fff;
    box-shadow:0 32px 80px rgba(37,99,235,.28);
    display:flex;
    justify-content:space-between;
    align-items:center;
    gap:28px;
}
.cta h2{
    margin:0 0 10px;
    font-size:42px;
    letter-spacing:-1.6px;
}
.cta p{
    margin:0;
    color:rgba(255,255,255,.82);
    line-height:1.6;
}
.cta a{
    background:#fff;
    color:#1557e8;
    padding:17px 23px;
    border-radius:18px;
    font-weight:1000;
    white-space:nowrap;
}

@media(max-width:900px){
    .nav{top:12px;width:calc(100% - 22px);height:66px}
    .nav-links a:not(.nav-cta){display:none}
    .hero{padding-top:112px}
    .hero-grid{grid-template-columns:1fr}
    .exam-card{max-width:480px}
    .stats,.cards{grid-template-columns:1fr}
    .cta{flex-direction:column;align-items:flex-start}
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
        <a href="#exam">გამოცდა</a>
        <a href="/autoschool/exam" class="nav-cta">ტესტის დაწყება</a>
    </div>
</nav>

<header class="hero">
    <div class="container hero-grid">
        <div>
            <div class="kicker">პრემიუმ ავტოსკოლა საქართველოში</div>
            <h1>მართვის სწავლა უფრო მარტივად იწყება</h1>
            <p class="hero-text">
                თეორია, პრაქტიკა და გამოცდის სიმულაცია ერთ სუფთა სასწავლო სივრცეში.
                მოემზადე მშვიდად, სწრაფად და თავდაჯერებულად.
            </p>

            <div class="actions">
                <a href="/autoschool/exam" class="btn primary">დაიწყე ტესტი</a>
                <a href="#program" class="btn secondary">ნახე პროგრამა</a>
            </div>

            <div class="stats">
                <div class="stat">
                    <b>24/7</b>
                    <span>ონლაინ თეორია</span>
                </div>
                <div class="stat">
                    <b>500+</b>
                    <span>საგამოცდო კითხვა</span>
                </div>
                <div class="stat">
                    <b>95%</b>
                    <span>მომზადების ხარისხი</span>
                </div>
            </div>
        </div>

        <div class="exam-card">
            <div class="exam-top">
                <span class="exam-label">Exam Simulator</span>
                <span class="exam-score">A კატეგორია</span>
            </div>

            <h3>რას ნიშნავს ეს საგზაო ნიშანი?</h3>

            <div class="option">სიჩქარის შეზღუდვა</div>
            <div class="option active">მოძრაობის მიმართულება</div>
            <div class="option">გაჩერება აკრძალულია</div>
            <div class="option">ქვეითთა გადასასვლელი</div>
        </div>
    </div>
</header>

<section id="program" class="section">
    <div class="container">
        <div class="title">
            <small>სასწავლო პროგრამა</small>
            <h2>ყველაფერი მართვის მოწმობისთვის</h2>
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
        <div class="title">
            <small>რატომ DM ავტოსკოლა?</small>
            <h2>სუფთა, გასაგები და კომფორტული სწავლა</h2>
        </div>

        <div class="cards">
            <article class="card">
                <div class="icon">✓</div>
                <h3>მშვიდი პროცესი</h3>
                <p>არანაირი ზედმეტი სტრესი — სწავლა იწყება მარტივად და პროგრესით.</p>
            </article>

            <article class="card">
                <div class="icon">↗</div>
                <h3>სწრაფი პროგრესი</h3>
                <p>ყოველი გაკვეთილი კონკრეტულ მიზანზეა აგებული, რომ შედეგი მალე დაინახო.</p>
            </article>

            <article class="card">
                <div class="icon">★</div>
                <h3>პრემიუმ მიდგომა</h3>
                <p>თანამედროვე ვიზუალი, ონლაინ ტესტები და ხარისხიანი სასწავლო გამოცდილება.</p>
            </article>
        </div>
    </div>
</section>

<section id="exam" class="section">
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
        y:28,
        opacity:0,
        scale:.98,
        duration:.75,
        delay:.18,
        ease:"power3.out"
    });

    gsap.utils.toArray(".card,.cta").forEach((el)=>{
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
