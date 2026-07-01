<!DOCTYPE html>
<html lang="ka">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Driving Academy</title>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Georgian:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">

<style>
:root{
    --dark:#07111F;
    --bg:#F8FAFC;
    --card:#FFFFFF;
    --text:#0F172A;
    --muted:#64748B;
    --line:#E2E8F0;
    --green:#4F8EF7;
    --green-soft:#EEF6FF;
}
*{box-sizing:border-box}
html,body{margin:0;font-family:"Noto Sans Georgian",Arial,sans-serif;background:var(--bg);color:var(--text);overflow-x:hidden}
a{text-decoration:none;color:inherit}
.container{width:min(1180px,calc(100% - 42px));margin:0 auto}

.nav{
    position:fixed;top:22px;left:50%;transform:translateX(-50%);
    z-index:50;width:min(1180px,calc(100% - 42px));
    display:flex;justify-content:space-between;align-items:center;
    padding:14px 16px;border-radius:22px;
    border:1px solid rgba(255,255,255,.18);
    background:rgba(7,17,31,.62);backdrop-filter:blur(18px);color:#fff;
}
.logo{display:flex;align-items:center;gap:10px;font-weight:900}
.logo-mark{width:38px;height:38px;border-radius:13px;display:grid;place-items:center;background:var(--green);color:#06111F;font-weight:900}
.nav-links{display:flex;gap:30px;font-size:14px;font-weight:800;color:rgba(255,255,255,.76)}
.nav-links a:hover{color:#fff}

.btn{
    display:inline-flex;align-items:center;justify-content:center;
    min-height:52px;padding:0 22px;border-radius:15px;
    font-weight:900;border:1px solid transparent;transition:.25s ease;
}
.btn-primary{background:var(--green);color:#06111F;border-color:var(--green);box-shadow:0 14px 32px rgba(34,197,94,.22)}
.btn-white{background:#fff;color:var(--text);border-color:#fff}
.btn-outline{background:#fff;color:var(--text);border-color:var(--line)}
.btn:hover{transform:translateY(-3px)}

.hero{
    min-height:100vh;
    padding:150px 0 70px;
    position:relative;
    overflow:hidden;
    color:#fff;
    background:#07111F;
    background-size:cover;
    background-position:center;
}
.hero:after{
    content:"";position:absolute;inset:0;
    background:linear-gradient(180deg,transparent 0%,rgba(7,17,31,.10) 72%,var(--bg) 100%);
    pointer-events:none;
}
.hero-content{
    position:relative;z-index:3;
    display:grid;grid-template-columns:1fr 420px;
    gap:56px;align-items:center;
}
.kicker{
    display:inline-flex;align-items:center;gap:9px;
    padding:9px 13px;border-radius:999px;
    background:rgba(255,255,255,.10);
    border:1px solid rgba(255,255,255,.18);
    color:#fff;font-size:13px;font-weight:900;margin-bottom:26px;
}
.dot{width:9px;height:9px;border-radius:50%;background:var(--green);box-shadow:0 0 0 6px rgba(34,197,94,.16)}
h1{
    margin:0;max-width:720px;
    font-size:clamp(40px,5vw,68px);
    line-height:1.05;letter-spacing:-.06em;font-weight:900;
}
h1 span{color:var(--green)}
.hero-text{
    max-width:610px;margin:24px 0 0;
    color:rgba(255,255,255,.76);
    font-size:17px;line-height:1.8;font-weight:600;
}
.actions{display:flex;gap:14px;flex-wrap:wrap;margin-top:34px}

.exam-card{
    background:rgba(7,17,31,.72);
    border:1px solid rgba(255,255,255,.16);
    border-radius:28px;padding:26px;
    backdrop-filter:blur(20px);
    box-shadow:0 30px 80px rgba(0,0,0,.34);
}
.exam-top{display:flex;gap:12px;flex-wrap:wrap;margin-bottom:26px}
.exam-top span{
    display:inline-flex;align-items:center;gap:8px;
    padding:9px 12px;border-radius:999px;
    border:1px solid rgba(255,255,255,.14);
    font-size:13px;font-weight:900;
}
.exam-card h3{margin:0;font-size:23px;line-height:1.45;letter-spacing:-.035em}
.option{
    display:flex;align-items:center;justify-content:space-between;gap:15px;
    margin-top:13px;padding:17px 18px;border-radius:16px;
    border:1px solid rgba(255,255,255,.14);
    background:rgba(255,255,255,.04);
    color:rgba(255,255,255,.66);font-weight:900;
}
.option.active{background:var(--green);color:#06111F;border-color:var(--green)}
.radio{width:20px;height:20px;border-radius:50%;border:2px solid rgba(255,255,255,.26)}
.option.active .radio{background:#fff;border-color:#fff;position:relative}
.option.active .radio:after{content:"✓";position:absolute;left:4px;top:-1px;color:var(--green);font-size:13px}

.stats{
    position:relative;z-index:4;margin-top:58px;
    display:grid;grid-template-columns:repeat(3,1fr);
    background:rgba(255,255,255,.94);color:var(--text);
    border:1px solid rgba(255,255,255,.55);
    border-radius:24px;overflow:hidden;
    box-shadow:0 24px 70px rgba(15,23,42,.16);
}
.stat{padding:25px 30px;display:flex;gap:18px;align-items:center;border-right:1px solid var(--line)}
.stat:last-child{border-right:none}
.stat-icon{width:46px;height:46px;border-radius:15px;border:3px solid var(--green)}
.stat strong{display:block;font-size:28px;letter-spacing:-.04em}
.stat span{display:block;margin-top:3px;color:var(--muted);font-size:13px;line-height:1.45;font-weight:700}

.section{padding:82px 0;background:var(--bg)}
.section h2{
    margin:0 0 14px;max-width:760px;
    font-size:clamp(30px,4vw,48px);
    line-height:1.08;letter-spacing:-.055em;color:var(--text);
}
.section-desc{max-width:650px;margin:0 0 34px;color:var(--muted);line-height:1.75;font-weight:600}
.grid-4{display:grid;grid-template-columns:repeat(4,1fr);gap:18px}
.card,.package,.result-card{
    background:#fff;border:1px solid var(--line);
    border-radius:22px;box-shadow:0 14px 34px rgba(15,23,42,.055);
}
.card{min-height:220px;padding:26px;transition:.28s ease}
.card:hover,.package:hover{transform:translateY(-6px);box-shadow:0 22px 50px rgba(15,23,42,.09)}
.card-top{display:flex;justify-content:space-between;align-items:center;color:#CBD5E1;font-size:32px;font-weight:900;margin-bottom:32px}
.card-icon{width:46px;height:46px;border-radius:15px;background:var(--green-soft);color:var(--green);display:grid;place-items:center;font-size:16px}
.card h3,.package h3{margin:0 0 10px;color:var(--text);font-size:18px}
.card p,.package p{margin:0;color:var(--muted);line-height:1.65;font-size:14px;font-weight:600}

.packages{display:grid;grid-template-columns:repeat(3,1fr);gap:18px}
.package{padding:28px;transition:.28s ease}
.package.featured{border-color:rgba(34,197,94,.45);box-shadow:0 20px 55px rgba(34,197,94,.12)}
.badge{display:inline-flex;padding:7px 11px;border-radius:999px;background:var(--green-soft);color:#2F80ED;font-size:12px;font-weight:900;margin-bottom:16px}
.package ul{list-style:none;padding:0;margin:22px 0;display:grid;gap:10px;color:#475569;font-size:14px;font-weight:700}
.package li:before{content:"✓";color:var(--green);margin-right:8px}

.results{display:grid;grid-template-columns:repeat(3,1fr);gap:18px}
.result-card{padding:30px}
.result-card strong{display:block;color:var(--text);font-size:42px;letter-spacing:-.05em}
.result-card span{display:block;margin-top:8px;color:var(--muted);font-size:14px;line-height:1.55;font-weight:700}

.final-cta{
    padding:100px 0;
    background:
        linear-gradient(90deg,rgba(7,17,31,.88),rgba(7,17,31,.48)),
        url("/autoschool/images/hero-driving-school.webp");
    background-size:cover;
    background-position:center;
    color:#fff;
}
.cta-box{
    background:rgba(7,17,31,.72);
    border:1px solid rgba(255,255,255,.16);
    backdrop-filter:blur(18px);
    border-radius:32px;padding:58px;text-align:center;
}
.cta-box h2{margin:0 auto;max-width:760px;font-size:clamp(32px,4.8vw,58px);line-height:1.05;letter-spacing:-.055em}
.cta-box p{max-width:630px;margin:18px auto 0;color:rgba(255,255,255,.72);line-height:1.75;font-weight:600}
.cta-box .actions{justify-content:center}

.footer{padding:42px 0;background:#fff;border-top:1px solid var(--line);color:var(--muted)}
.footer-inner{display:flex;justify-content:space-between;align-items:center;gap:20px;font-size:14px;font-weight:700}
.footer .logo{color:var(--text)}
.footer-links{display:flex;gap:24px}
.footer-links a:hover{color:var(--text)}

@media(max-width:980px){
    .nav-links{display:none}
    .hero-content{grid-template-columns:1fr}
    .stats,.grid-4,.packages,.results{grid-template-columns:1fr}
    .stat{border-right:none;border-bottom:1px solid var(--line)}
    .stat:last-child{border-bottom:none}
}
@media(max-width:620px){
    .container,.nav{width:calc(100% - 24px)}
    .hero{padding-top:130px}
    h1{font-size:38px}
    .exam-card{padding:20px}
    .cta-box{padding:38px 22px}
    .footer-inner{flex-direction:column;align-items:flex-start}
}
</style>

<style id="after-hero-road-bg">
.after-hero-road-bg{
    position:fixed;
    inset:0;
    z-index:0;
    pointer-events:none;
    opacity:0;
    background:
        linear-gradient(
            180deg,
            rgba(248,250,252,.86) 0%,
            rgba(248,250,252,.62) 18%,
            rgba(248,250,252,.58) 72%,
            rgba(248,250,252,.88) 100%
        ),
        url("/autoschool/images/hero-driving-school.webp");
    background-size:cover;
    background-position:center 35%;
    transform:scale(1.04);
}

.hero{
    position:relative;
    z-index:3;
    background:#07111F !important;
}

.hero:before{
    content:"";
    position:absolute;
    inset:0;
    z-index:0;
    background:
        radial-gradient(circle at 22% 20%,rgba(34,197,94,.18),transparent 28%),
        radial-gradient(circle at 76% 24%,rgba(59,130,246,.12),transparent 30%),
        linear-gradient(180deg,#07111F 0%,#07111F 100%);
    pointer-events:none;
}

.hero-content,
.stats{
    position:relative;
    z-index:5;
}

main,
.section,
.final-cta,
.footer{
    position:relative;
    z-index:2;
}

.section,
.final-cta{
    background:transparent !important;
}

.section:before{
    content:"";
    position:absolute;
    inset:0;
    z-index:-1;
    background:rgba(248,250,252,.62);
    backdrop-filter:blur(2px);
}

.section:nth-of-type(odd):before{
    background:rgba(248,250,252,.72);
}

.card,
.package,
.result-card,
.cta-box{
    position:relative;
    z-index:4;
}

.final-cta{
    background:transparent !important;
}

.final-cta:before{
    content:"";
    position:absolute;
    inset:0;
    z-index:-1;
    background:rgba(7,17,31,.74);
    backdrop-filter:blur(2px);
}

.footer{
    background:rgba(255,255,255,.92) !important;
    backdrop-filter:blur(10px);
}

@media(max-width:700px){
    .after-hero-road-bg{
        background-position:center;
        transform:scale(1.08);
    }
}
</style>

</head>

<body>
<div class="after-hero-road-bg"></div>
<nav class="nav">
    <a href="/autoschool" class="logo">
        <span class="logo-mark">A</span>
        <span>Driving Academy</span>
    </a>

    <div class="nav-links">
        <a href="#features">უპირატესობები</a>
        <a href="#packages">კურსები</a>
        <a href="/autoschool/exam">გამოცდა</a>
        <a href="#contact">კონტაქტი</a>
    </div>

    <a href="/autoschool/exam" class="btn btn-primary">ტესტის დაწყება</a>
</nav>

<main>
<section class="hero">
    <div class="container">
        <div class="hero-content">
            <div>
                <div class="kicker"><span class="dot"></span> ფიზიკური + ონლაინ თეორიის კურსი</div>
                <h1>ისწავლე მართვა <span>უფრო მარტივად</span></h1>
                <p class="hero-text">ავტოსკოლის ფიზიკური კურსი, ონლაინ თეორია და გამოცდის რეალური სიმულაცია ერთ premium სასწავლო სივრცეში.</p>
                <div class="actions">
                    <a href="/autoschool/exam" class="btn btn-primary">გამოცდის სიმულაცია →</a>
                    <a href="#packages" class="btn btn-white">კურსების ნახვა</a>
                </div>
            </div>

            <div class="exam-card">
                <div class="exam-top">
                    <span><span class="dot"></span> Exam Simulator</span>
                    <span><span class="dot"></span> სწორი პასუხი</span>
                </div>
                <h3>რას ნიშნავს მოცემული საგზაო ნიშანი?</h3>
                <div class="option"><span>სიჩქარის შეზღუდვა</span><span class="radio"></span></div>
                <div class="option active"><span>მოძრაობა აკრძალულია</span><span class="radio"></span></div>
                <div class="option"><span>გასწრება ნებადართულია</span><span class="radio"></span></div>
            </div>
        </div>

        <div class="stats">
            <div class="stat"><div class="stat-icon"></div><div><strong>30წთ</strong><span>რეალური გამოცდის ფორმატი</span></div></div>
            <div class="stat"><div class="stat-icon"></div><div><strong>5K+</strong><span>სავარჯიშო კითხვა და პასუხი</span></div></div>
            <div class="stat"><div class="stat-icon"></div><div><strong>24/7</strong><span>სწავლა ნებისმიერი მოწყობილობიდან</span></div></div>
        </div>
    </div>
</section>

<section class="section" id="features">
    <div class="container">
        <h2>ერთი სისტემა სრული მომზადებისთვის</h2>
        <p class="section-desc">თეორია, პრაქტიკული მიდგომა, გამოცდის რეჟიმი და შეცდომების მარტივი ახსნა.</p>

        <div class="grid-4">
            <div class="card"><div class="card-top"><span class="card-icon">01</span><span>01</span></div><h3>ფიზიკური კურსი</h3><p>ინსტრუქტორთან სწავლა და გამოცდაზე ორიენტირებული ახსნა.</p></div>
            <div class="card"><div class="card-top"><span class="card-icon">02</span><span>02</span></div><h3>ონლაინ თეორია</h3><p>ისწავლე სახლიდან, გზაში ან შესვენებაზე — ნებისმიერ მოწყობილობაზე.</p></div>
            <div class="card"><div class="card-top"><span class="card-icon">03</span><span>03</span></div><h3>გამოცდის სიმულაცია</h3><p>რეალურ გამოცდასთან მიახლოებული დრო, კითხვები და შედეგები.</p></div>
            <div class="card"><div class="card-top"><span class="card-icon">04</span><span>04</span></div><h3>შეცდომის ახსნა</h3><p>არასწორ პასუხზე მარტივი განმარტება ადამიანურ ენაზე.</p></div>
        </div>
    </div>
</section>

<section class="section" id="packages">
    <div class="container">
        <h2>აირჩიე შენზე მორგებული კურსი</h2>
        <p class="section-desc">დაიწყე ონლაინით ან აიღე სრული premium პაკეტი ფიზიკური მომზადებით.</p>

        <div class="packages">
            <div class="package">
                <span class="badge">A</span>
                <h3>ფიზიკური კურსი</h3>
                <p>სრული მომზადება ავტოსკოლაში ინსტრუქტორთან ერთად.</p>
                <ul><li>თეორიის ახსნა</li><li>პრაქტიკული მაგალითები</li><li>გამოცდაზე ორიენტირება</li></ul>
                <a href="#" class="btn btn-outline">დეტალურად</a>
            </div>

            <div class="package featured">
                <span class="badge">ყველაზე მოთხოვნადი</span>
                <h3>ონლაინ + გამოცდა</h3>
                <p>ონლაინ თეორია და გამოცდის სიმულაცია პროგრესის კონტროლით.</p>
                <ul><li>ტესტები 24/7</li><li>AI განმარტება შეცდომაზე</li><li>პროგრესის ნახვა</li></ul>
                <a href="/autoschool/exam" class="btn btn-primary">დაწყება</a>
            </div>

            <div class="package">
                <span class="badge">C</span>
                <h3>ინდივიდუალური</h3>
                <p>მორგებული სწავლა მათთვის, ვისაც სწრაფად უნდა მომზადება.</p>
                <ul><li>პირადი მიდგომა</li><li>სუსტი თემების გაძლიერება</li><li>სწრაფი მომზადება</li></ul>
                <a href="#" class="btn btn-outline">კონსულტაცია</a>
            </div>
        </div>
    </div>
</section>

<section class="section">
    <div class="container">
        <h2>შედეგები, რომელიც ნდობას ქმნის</h2>
        <p class="section-desc">სწავლა უფრო ეფექტურია, როცა ხედავ პროგრესს და ზუსტად იცი სად ხარ ძლიერი.</p>

        <div class="results">
            <div class="result-card"><strong>94%</strong><span>მომზადებული მოსწავლეების მაღალი შედეგი</span></div>
            <div class="result-card"><strong>30წთ</strong><span>რეალური გამოცდის რეჟიმი</span></div>
            <div class="result-card"><strong>24/7</strong><span>წვდომა ონლაინ სასწავლო სივრცეზე</span></div>
        </div>
    </div>
</section>

<section class="final-cta">
    <div class="container">
        <div class="cta-box">
            <h2>დაიწყე მომზადება დღეს და გამოცდაზე გადი მშვიდად</h2>
            <p>შეარჩიე კურსი, გაიარე ტესტები და ისწავლე სისტემით, რომელიც რეალურად გიმზადებს გამოცდისთვის.</p>
            <div class="actions">
                <a href="/autoschool/exam" class="btn btn-primary">გამოცდის დაწყება</a>
                <a href="#packages" class="btn btn-white">კურსების ნახვა</a>
            </div>
        </div>
    </div>
</section>
</main>

<footer class="footer" id="contact">
    <div class="container footer-inner">
        <a href="/autoschool" class="logo"><span class="logo-mark">A</span><span>Driving Academy</span></a>
        <div>© {{ date('Y') }} Driving Academy. ყველა უფლება დაცულია.</div>
        <div class="footer-links"><a href="/autoschool">მთავარი</a><a href="/autoschool/exam">გამოცდა</a><a href="#packages">კურსები</a></div>
    </div>
</footer>

<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@studio-freight/lenis@1.0.42/bundled/lenis.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const lenis = new Lenis({duration:1.05,smoothWheel:true,wheelMultiplier:.85});
    function raf(t){lenis.raf(t);requestAnimationFrame(raf)}
    requestAnimationFrame(raf);

    if(window.gsap && window.ScrollTrigger){
        gsap.registerPlugin(ScrollTrigger);
        gsap.from('.nav',{y:-20,opacity:0,duration:.75,ease:'power3.out'});
        gsap.from('.kicker,h1,.hero-text,.actions',{y:28,opacity:0,duration:.8,stagger:.08,ease:'power3.out'});
        gsap.from('.exam-card',{y:32,opacity:0,scale:.97,duration:.9,delay:.15,ease:'power3.out'});
        gsap.from('.stats',{y:30,opacity:0,duration:.8,delay:.35,ease:'power3.out'});
        gsap.utils.toArray('.card,.package,.result-card,.cta-box').forEach((el,i)=>{
            gsap.from(el,{scrollTrigger:{trigger:el,start:'top 88%',once:true},y:28,opacity:0,duration:.7,delay:(i%4)*.04,ease:'power3.out'});
        });
    }
});
</script>

<script id="after-hero-road-bg-js">
document.addEventListener('DOMContentLoaded', () => {
    if(window.gsap && window.ScrollTrigger){
        gsap.to('.after-hero-road-bg', {
            scrollTrigger:{
                trigger:'#features',
                start:'top bottom',
                end:'bottom bottom',
                scrub:true
            },
            opacity:.62,
            ease:'none'
        });

        gsap.to('.after-hero-road-bg', {
            scrollTrigger:{
                trigger:'#features',
                start:'top bottom',
                end:'bottom bottom',
                scrub:1
            },
            backgroundPosition:'center 75%',
            scale:1.10,
            ease:'none'
        });
    }
});
</script>

</body>
</html>
