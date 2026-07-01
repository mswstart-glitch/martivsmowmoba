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
    --bg:#07111F;
    --panel:rgba(8,15,25,.72);
    --panel-solid:#0B1422;
    --line:rgba(255,255,255,.12);
    --text:#FFFFFF;
    --muted:rgba(255,255,255,.66);
    --green:#4ADE80;
    --green-dark:#22C55E;
    --red:#EF4444;
}

*{box-sizing:border-box}

html,body{
    margin:0;
    font-family:"Noto Sans Georgian",Arial,sans-serif;
    background:var(--bg);
    color:var(--text);
    overflow-x:hidden;
}

a{text-decoration:none;color:inherit}

.container{
    width:min(1180px,calc(100% - 42px));
    margin:0 auto;
}

.nav{
    position:fixed;
    top:22px;
    left:50%;
    transform:translateX(-50%);
    width:min(1180px,calc(100% - 42px));
    z-index:50;
    display:flex;
    justify-content:space-between;
    align-items:center;
    padding:14px 16px;
    border-radius:22px;
    border:1px solid var(--line);
    background:rgba(5,11,20,.62);
    backdrop-filter:blur(18px);
}

.logo{
    display:flex;
    align-items:center;
    gap:10px;
    font-weight:900;
    line-height:1;
}

.logo-mark{
    width:38px;
    height:38px;
    border-radius:13px;
    display:grid;
    place-items:center;
    background:var(--green);
    color:#06111F;
    font-weight:900;
}

.nav-links{
    display:flex;
    gap:30px;
    color:rgba(255,255,255,.72);
    font-size:14px;
    font-weight:800;
}

.nav-links a:hover{color:#fff}

.btn{
    display:inline-flex;
    align-items:center;
    justify-content:center;
    min-height:52px;
    padding:0 22px;
    border-radius:15px;
    font-weight:900;
    border:1px solid var(--line);
    transition:.25s ease;
}

.btn-primary{
    background:var(--green);
    color:#06111F;
    border-color:var(--green);
}

.btn-dark{
    background:rgba(255,255,255,.06);
    color:#fff;
}

.btn:hover{
    transform:translateY(-3px);
}

.hero{
    min-height:100vh;
    position:relative;
    overflow:hidden;
    padding:150px 0 70px;
    background:#07111F;
}

.road-scene{
    position:absolute;
    inset:0;
    overflow:hidden;
    pointer-events:none;
}

.road-scene:before{
    content:"";
    position:absolute;
    inset:0;
    background:
        radial-gradient(circle at 24% 18%,rgba(74,222,128,.16),transparent 24%),
        radial-gradient(circle at 72% 22%,rgba(239,68,68,.14),transparent 22%),
        linear-gradient(180deg,rgba(7,17,31,.08),#07111F 90%);
    z-index:4;
}

.road{
    position:absolute;
    left:50%;
    top:-18%;
    width:54vw;
    height:140%;
    transform:translateX(-50%) perspective(900px) rotateX(58deg);
    background:#0E1726;
    border-left:1px solid rgba(255,255,255,.10);
    border-right:1px solid rgba(255,255,255,.10);
    box-shadow:0 0 90px rgba(0,0,0,.6);
}

.road:before{
    content:"";
    position:absolute;
    left:50%;
    top:0;
    width:6px;
    height:100%;
    transform:translateX(-50%);
    background:repeating-linear-gradient(to bottom,rgba(255,255,255,.78) 0 42px,transparent 42px 88px);
}

.road:after{
    content:"";
    position:absolute;
    inset:0;
    background:
        linear-gradient(90deg,transparent 0 48%,rgba(255,255,255,.04) 48% 52%,transparent 52% 100%),
        repeating-linear-gradient(to bottom,rgba(255,255,255,.035) 0 2px,transparent 2px 42px);
}

.crosswalk{
    position:absolute;
    left:50%;
    top:30%;
    width:72vw;
    height:120px;
    transform:translateX(-50%) perspective(700px) rotateX(58deg);
    background:repeating-linear-gradient(90deg,rgba(255,255,255,.65) 0 42px,transparent 42px 78px);
    opacity:.35;
    z-index:2;
}

.signal{
    position:absolute;
    width:22px;
    height:64px;
    border-radius:16px;
    background:#050B14;
    border:1px solid rgba(255,255,255,.18);
    z-index:6;
    box-shadow:0 12px 34px rgba(0,0,0,.45);
}

.signal:before,
.signal:after{
    content:"";
    position:absolute;
    left:50%;
    transform:translateX(-50%);
    width:12px;
    height:12px;
    border-radius:50%;
}

.signal:before{top:10px;background:var(--red);box-shadow:0 0 24px rgba(239,68,68,.75)}
.signal:after{bottom:10px;background:var(--green);box-shadow:0 0 24px rgba(74,222,128,.75)}

.signal.one{left:20%;top:22%}
.signal.two{right:22%;top:18%}
.signal.three{right:12%;top:42%;transform:scale(.82)}

.car{
    position:absolute;
    left:50%;
    bottom:12%;
    width:116px;
    height:178px;
    transform:translateX(-50%);
    border-radius:36px 36px 24px 24px;
    background:linear-gradient(180deg,#CBD5E1,#64748B);
    z-index:7;
    box-shadow:0 30px 80px rgba(0,0,0,.58);
}

.car:before{
    content:"";
    position:absolute;
    left:18px;
    right:18px;
    top:22px;
    height:58px;
    border-radius:24px 24px 12px 12px;
    background:#111827;
}

.car:after{
    content:"";
    position:absolute;
    left:18px;
    right:18px;
    bottom:-18px;
    height:20px;
    border-radius:999px;
    background:rgba(239,68,68,.9);
    filter:blur(16px);
}

.hero-content{
    position:relative;
    z-index:10;
    display:grid;
    grid-template-columns:1fr 420px;
    gap:56px;
    align-items:center;
}

.kicker{
    display:inline-flex;
    align-items:center;
    gap:9px;
    padding:9px 13px;
    border-radius:999px;
    background:rgba(5,11,20,.56);
    border:1px solid var(--line);
    color:rgba(255,255,255,.84);
    font-size:13px;
    font-weight:900;
    margin-bottom:26px;
}

.dot{
    width:9px;
    height:9px;
    border-radius:50%;
    background:var(--green);
    box-shadow:0 0 0 6px rgba(74,222,128,.12);
}

h1{
    margin:0;
    max-width:760px;
    font-size:clamp(42px,5.2vw,72px);
    line-height:1.03;
    letter-spacing:-.065em;
    font-weight:900;
}

h1 span{
    color:var(--green);
}

.hero-text{
    max-width:620px;
    margin:24px 0 0;
    color:var(--muted);
    font-size:17px;
    line-height:1.8;
    font-weight:600;
}

.actions{
    display:flex;
    gap:14px;
    flex-wrap:wrap;
    margin-top:34px;
}

.exam-card{
    background:var(--panel);
    border:1px solid var(--line);
    border-radius:28px;
    padding:26px;
    backdrop-filter:blur(20px);
    box-shadow:0 30px 80px rgba(0,0,0,.35);
}

.exam-top{
    display:flex;
    gap:12px;
    flex-wrap:wrap;
    margin-bottom:26px;
}

.exam-top span{
    display:inline-flex;
    align-items:center;
    gap:8px;
    padding:9px 12px;
    border-radius:999px;
    border:1px solid var(--line);
    font-size:13px;
    font-weight:900;
}

.exam-card h3{
    margin:0;
    font-size:24px;
    line-height:1.45;
    letter-spacing:-.035em;
}

.option{
    display:flex;
    align-items:center;
    justify-content:space-between;
    gap:15px;
    margin-top:13px;
    padding:17px 18px;
    border-radius:16px;
    border:1px solid var(--line);
    background:rgba(255,255,255,.03);
    color:rgba(255,255,255,.62);
    font-weight:900;
}

.option.active{
    background:var(--green);
    color:#06111F;
    border-color:var(--green);
}

.radio{
    width:20px;
    height:20px;
    border-radius:50%;
    border:2px solid rgba(255,255,255,.22);
}

.option.active .radio{
    border-color:#fff;
    background:#fff;
    position:relative;
}

.option.active .radio:after{
    content:"✓";
    position:absolute;
    left:4px;
    top:-1px;
    color:var(--green-dark);
    font-size:13px;
}

.stats{
    position:relative;
    z-index:10;
    margin-top:58px;
    display:grid;
    grid-template-columns:repeat(3,1fr);
    border:1px solid var(--line);
    border-radius:24px;
    background:rgba(5,11,20,.66);
    backdrop-filter:blur(18px);
    overflow:hidden;
}

.stat{
    padding:25px 30px;
    display:flex;
    gap:18px;
    align-items:center;
    border-right:1px solid var(--line);
}

.stat:last-child{border-right:none}

.stat-icon{
    width:46px;
    height:46px;
    border-radius:15px;
    border:3px solid var(--green);
}

.stat strong{
    display:block;
    font-size:28px;
    letter-spacing:-.04em;
}

.stat span{
    display:block;
    margin-top:3px;
    color:var(--muted);
    font-size:13px;
    line-height:1.45;
    font-weight:700;
}

.section{
    padding:78px 0;
    background:#07111F;
}

.section h2{
    margin:0 0 14px;
    font-size:clamp(30px,4vw,48px);
    line-height:1.08;
    letter-spacing:-.055em;
}

.section-desc{
    max-width:650px;
    margin:0 0 34px;
    color:var(--muted);
    line-height:1.75;
    font-weight:600;
}

.grid-4{
    display:grid;
    grid-template-columns:repeat(4,1fr);
    gap:18px;
}

.card{
    min-height:220px;
    padding:26px;
    border-radius:22px;
    background:var(--panel-solid);
    border:1px solid var(--line);
    transition:.28s ease;
}

.card:hover{
    transform:translateY(-6px);
    border-color:rgba(74,222,128,.34);
}

.card-top{
    display:flex;
    justify-content:space-between;
    align-items:center;
    color:rgba(255,255,255,.18);
    font-size:32px;
    font-weight:900;
    margin-bottom:32px;
}

.card-icon{
    color:var(--green);
    font-size:26px;
}

.card h3{
    margin:0 0 10px;
    font-size:17px;
}

.card p{
    margin:0;
    color:var(--muted);
    line-height:1.65;
    font-size:14px;
    font-weight:600;
}

.packages{
    display:grid;
    grid-template-columns:repeat(3,1fr);
    gap:18px;
}

.package{
    padding:28px;
    border-radius:22px;
    background:var(--panel-solid);
    border:1px solid var(--line);
}

.package.featured{
    border-color:rgba(74,222,128,.55);
}

.badge{
    display:inline-flex;
    padding:7px 11px;
    border-radius:999px;
    background:rgba(74,222,128,.14);
    color:var(--green);
    font-size:12px;
    font-weight:900;
    margin-bottom:16px;
}

.package h3{
    margin:0;
    font-size:20px;
}

.package p{
    color:var(--muted);
    line-height:1.65;
    font-size:14px;
    font-weight:600;
}

.package ul{
    list-style:none;
    padding:0;
    margin:22px 0;
    display:grid;
    gap:10px;
    color:rgba(255,255,255,.75);
    font-size:14px;
    font-weight:700;
}

.package li:before{
    content:"✓";
    color:var(--green);
    margin-right:8px;
}

.footer{
    padding:42px 0;
    background:#07111F;
    border-top:1px solid var(--line);
    color:var(--muted);
}

.footer-inner{
    display:flex;
    justify-content:space-between;
    align-items:center;
    gap:20px;
    font-size:14px;
    font-weight:700;
}

.footer-links{
    display:flex;
    gap:24px;
}

@media(max-width:980px){
    .nav-links{display:none}
    .hero-content{grid-template-columns:1fr}
    .stats,.grid-4,.packages{grid-template-columns:1fr}
    .stat{border-right:none;border-bottom:1px solid var(--line)}
    .stat:last-child{border-bottom:none}
    .road{width:80vw}
}

@media(max-width:620px){
    .container,.nav{width:calc(100% - 24px)}
    .hero{padding-top:130px}
    h1{font-size:40px}
    .exam-card{padding:20px}
    .footer-inner{flex-direction:column;align-items:flex-start}
}
</style>
</head>

<body>
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
    <div class="road-scene">
        <div class="road"></div>
        <div class="crosswalk"></div>
        <div class="signal one"></div>
        <div class="signal two"></div>
        <div class="signal three"></div>
        <div class="car"></div>
    </div>

    <div class="container">
        <div class="hero-content">
            <div>
                <div class="kicker"><span class="dot"></span> ფიზიკური + ონლაინ თეორიის კურსი</div>

                <h1>ისწავლე მართვა <span>უფრო მარტივად</span></h1>

                <p class="hero-text">
                    ავტოსკოლის ფიზიკური კურსი, ონლაინ თეორია და გამოცდის რეალური სიმულაცია ერთ premium სასწავლო სივრცეში.
                </p>

                <div class="actions">
                    <a href="/autoschool/exam" class="btn btn-primary">გამოცდის სიმულაცია →</a>
                    <a href="#packages" class="btn btn-dark">კურსების ნახვა</a>
                </div>
            </div>

            <div class="exam-card">
                <div class="exam-top">
                    <span><span class="dot"></span> Exam Simulator</span>
                    <span><span class="dot"></span> სწორი პასუხი</span>
                </div>

                <h3>რას ნიშნავს მოცემული საგზაო ნიშანი?</h3>

                <div class="option">
                    <span>სიჩქარის შეზღუდვა</span>
                    <span class="radio"></span>
                </div>

                <div class="option active">
                    <span>მოძრაობა აკრძალულია</span>
                    <span class="radio"></span>
                </div>

                <div class="option">
                    <span>გასწრება ნებადართულია</span>
                    <span class="radio"></span>
                </div>
            </div>
        </div>

        <div class="stats">
            <div class="stat">
                <div class="stat-icon"></div>
                <div><strong>30წთ</strong><span>რეალური გამოცდის ფორმატი</span></div>
            </div>
            <div class="stat">
                <div class="stat-icon"></div>
                <div><strong>5K+</strong><span>სავარჯიშო კითხვა და პასუხი</span></div>
            </div>
            <div class="stat">
                <div class="stat-icon"></div>
                <div><strong>24/7</strong><span>სწავლა ნებისმიერი მოწყობილობიდან</span></div>
            </div>
        </div>
    </div>
</section>

<section class="section" id="features">
    <div class="container">
        <h2>ერთი სისტემა სრული მომზადებისთვის</h2>
        <p class="section-desc">თეორია, პრაქტიკული მიდგომა, გამოცდის რეჟიმი და შეცდომების მარტივი ახსნა.</p>

        <div class="grid-4">
            <div class="card">
                <div class="card-top"><span class="card-icon">▱</span><span>01</span></div>
                <h3>ფიზიკური კურსი</h3>
                <p>ინსტრუქტორთან სწავლა და გამოცდაზე ორიენტირებული ახსნა.</p>
            </div>
            <div class="card">
                <div class="card-top"><span class="card-icon">▰</span><span>02</span></div>
                <h3>ონლაინ თეორია</h3>
                <p>ისწავლე სახლიდან, გზაში ან შესვენებაზე — ნებისმიერ მოწყობილობაზე.</p>
            </div>
            <div class="card">
                <div class="card-top"><span class="card-icon">◎</span><span>03</span></div>
                <h3>გამოცდის სიმულაცია</h3>
                <p>რეალურ გამოცდასთან მიახლოებული დრო, კითხვები და შედეგები.</p>
            </div>
            <div class="card">
                <div class="card-top"><span class="card-icon">▣</span><span>04</span></div>
                <h3>შეცდომის ახსნა</h3>
                <p>არასწორ პასუხზე მარტივი განმარტება ადამიანურ ენაზე.</p>
            </div>
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
                <ul>
                    <li>თეორიის ახსნა</li>
                    <li>პრაქტიკული მაგალითები</li>
                    <li>გამოცდაზე ორიენტირება</li>
                </ul>
                <a href="#" class="btn btn-dark">დეტალურად</a>
            </div>

            <div class="package featured">
                <span class="badge">ყველაზე მოთხოვნადი</span>
                <h3>ონლაინ + გამოცდა</h3>
                <p>ონლაინ თეორია და გამოცდის სიმულაცია პროგრესის კონტროლით.</p>
                <ul>
                    <li>ტესტები 24/7</li>
                    <li>AI განმარტება შეცდომაზე</li>
                    <li>პროგრესის ნახვა</li>
                </ul>
                <a href="/autoschool/exam" class="btn btn-primary">დაწყება</a>
            </div>

            <div class="package">
                <span class="badge">C</span>
                <h3>ინდივიდუალური</h3>
                <p>მორგებული სწავლა მათთვის, ვისაც სწრაფად უნდა მომზადება.</p>
                <ul>
                    <li>პირადი მიდგომა</li>
                    <li>სუსტი თემების გაძლიერება</li>
                    <li>სწრაფი მომზადება</li>
                </ul>
                <a href="#" class="btn btn-dark">კონსულტაცია</a>
            </div>
        </div>
    </div>
</section>
</main>

<footer class="footer" id="contact">
    <div class="container footer-inner">
        <div>© {{ date('Y') }} Driving Academy. ყველა უფლება დაცულია.</div>
        <div class="footer-links">
            <a href="/autoschool">მთავარი</a>
            <a href="/autoschool/exam">გამოცდა</a>
            <a href="#packages">კურსები</a>
        </div>
    </div>
</footer>

<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@studio-freight/lenis@1.0.42/bundled/lenis.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const lenis = new Lenis({ duration:1.05, smoothWheel:true, wheelMultiplier:.85 });
    function raf(t){ lenis.raf(t); requestAnimationFrame(raf); }
    requestAnimationFrame(raf);

    gsap.registerPlugin(ScrollTrigger);

    gsap.from('.nav',{y:-20,opacity:0,duration:.75,ease:'power3.out'});
    gsap.from('.kicker,h1,.hero-text,.actions',{y:28,opacity:0,duration:.8,stagger:.08,ease:'power3.out'});
    gsap.from('.exam-card',{y:32,opacity:0,scale:.97,duration:.9,delay:.15,ease:'power3.out'});
    gsap.from('.stats',{y:30,opacity:0,duration:.8,delay:.35,ease:'power3.out'});

    gsap.to('.car',{y:-16,duration:2.6,repeat:-1,yoyo:true,ease:'sine.inOut'});
    gsap.to('.signal.one:before',{opacity:.25,duration:1.2,repeat:-1,yoyo:true,ease:'sine.inOut'});
    gsap.to('.signal.two:after',{opacity:.25,duration:1.5,repeat:-1,yoyo:true,ease:'sine.inOut'});

    gsap.utils.toArray('.card,.package').forEach((el,i)=>{
        gsap.from(el,{
            scrollTrigger:{trigger:el,start:'top 88%',once:true},
            y:28,
            opacity:0,
            duration:.7,
            delay:(i%4)*.04,
            ease:'power3.out'
        });
    });
});
</script>
</body>
</html>
