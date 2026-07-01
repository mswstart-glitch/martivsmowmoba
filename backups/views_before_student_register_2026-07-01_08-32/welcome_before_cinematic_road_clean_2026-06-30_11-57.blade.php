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
    --panel:rgba(8,15,25,.78);
    --panel2:rgba(10,19,31,.88);
    --line:rgba(255,255,255,.12);
    --text:#fff;
    --muted:rgba(255,255,255,.66);
    --green:#4ADE80;
    --green2:#22C55E;
    --red:#EF4444;
}

*{box-sizing:border-box}

html,body{
    margin:0;
    font-family:"Noto Sans Georgian",Arial,sans-serif;
    background:#07111F;
    color:var(--text);
    overflow-x:hidden;
}

a{text-decoration:none;color:inherit}

.road-bg{
    position:fixed;
    inset:0;
    z-index:-3;
    background:
        linear-gradient(rgba(3,10,18,.52),rgba(3,10,18,.84)),
        url("https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?auto=format&fit=crop&w=2200&q=85");
    background-size:cover;
    background-position:center;
}

.road-bg:after{
    content:"";
    position:absolute;
    inset:0;
    background:
        radial-gradient(circle at 48% 18%,rgba(74,222,128,.20),transparent 20%),
        radial-gradient(circle at 60% 42%,rgba(59,130,246,.16),transparent 28%),
        linear-gradient(180deg,rgba(7,17,31,.20),#07111F 92%);
}

.container{
    width:min(1160px,calc(100% - 42px));
    margin:0 auto;
}

.nav{
    position:fixed;
    top:24px;
    left:50%;
    transform:translateX(-50%);
    width:min(1160px,calc(100% - 42px));
    z-index:50;
    display:flex;
    align-items:center;
    justify-content:space-between;
    padding:16px 18px;
    border:1px solid var(--line);
    border-radius:22px;
    background:rgba(5,11,20,.62);
    backdrop-filter:blur(18px);
}

.logo{
    display:flex;
    align-items:center;
    gap:10px;
    font-weight:900;
    line-height:1.05;
}

.logo-mark{
    font-size:42px;
    color:var(--green);
    font-weight:900;
    letter-spacing:-.12em;
}

.nav-links{
    display:flex;
    gap:32px;
    font-size:14px;
    font-weight:800;
    color:rgba(255,255,255,.78);
}

.nav-links a:hover{color:#fff}

.btn{
    display:inline-flex;
    align-items:center;
    justify-content:center;
    min-height:54px;
    padding:0 24px;
    border-radius:13px;
    font-weight:900;
    transition:.25s ease;
    border:1px solid var(--line);
}

.btn-primary{
    background:linear-gradient(180deg,var(--green),var(--green2));
    color:#06111F;
    border-color:rgba(74,222,128,.5);
    box-shadow:0 16px 40px rgba(34,197,94,.24);
}

.btn-dark{
    background:rgba(255,255,255,.04);
    color:#fff;
}

.btn:hover{
    transform:translateY(-3px);
}

.hero{
    min-height:920px;
    padding:160px 0 70px;
    position:relative;
}

.hero-grid{
    display:grid;
    grid-template-columns:1.1fr .9fr;
    gap:48px;
    align-items:center;
}

.pill{
    display:inline-flex;
    align-items:center;
    gap:9px;
    padding:10px 14px;
    border:1px solid var(--line);
    border-radius:999px;
    background:rgba(0,0,0,.32);
    color:#fff;
    font-size:13px;
    font-weight:900;
    margin-bottom:28px;
}

.dot{
    width:9px;
    height:9px;
    border-radius:50%;
    background:var(--green);
    box-shadow:0 0 0 6px rgba(74,222,128,.12);
}

h1{
    max-width:760px;
    margin:0;
    font-size:clamp(44px,6.7vw,86px);
    line-height:1.05;
    letter-spacing:-.075em;
    font-weight:900;
}

h1 span{color:var(--green)}

.hero p{
    max-width:620px;
    margin:26px 0 0;
    color:var(--muted);
    font-size:18px;
    line-height:1.8;
    font-weight:600;
}

.actions{
    display:flex;
    gap:16px;
    flex-wrap:wrap;
    margin-top:38px;
}

.exam-card{
    margin-top:70px;
    background:var(--panel);
    border:1px solid var(--line);
    border-radius:24px;
    padding:24px;
    backdrop-filter:blur(20px);
    box-shadow:0 30px 80px rgba(0,0,0,.32);
}

.exam-top{
    display:flex;
    justify-content:space-between;
    gap:12px;
    margin-bottom:22px;
}

.exam-top span{
    display:inline-flex;
    align-items:center;
    gap:8px;
    padding:8px 12px;
    border:1px solid var(--line);
    border-radius:999px;
    font-size:13px;
    font-weight:900;
}

.exam-card h3{
    margin:0 0 20px;
    font-size:22px;
    line-height:1.45;
}

.option{
    display:flex;
    justify-content:space-between;
    align-items:center;
    padding:18px 20px;
    border:1px solid var(--line);
    border-radius:14px;
    margin-top:12px;
    color:rgba(255,255,255,.7);
    font-weight:800;
}

.option.active{
    background:linear-gradient(180deg,var(--green),var(--green2));
    color:#06111F;
    border-color:rgba(74,222,128,.6);
}

.circle{
    width:20px;
    height:20px;
    border-radius:50%;
    border:1px solid rgba(255,255,255,.25);
}

.option.active .circle{
    background:#fff;
    border-color:#fff;
    position:relative;
}

.option.active .circle:after{
    content:"✓";
    color:var(--green2);
    font-size:12px;
    font-weight:900;
    position:absolute;
    left:5px;
    top:1px;
}

.stats{
    display:grid;
    grid-template-columns:repeat(3,1fr);
    gap:0;
    margin-top:70px;
    background:var(--panel);
    border:1px solid var(--line);
    border-radius:22px;
    backdrop-filter:blur(18px);
    overflow:hidden;
}

.stat{
    padding:26px 32px;
    display:flex;
    gap:18px;
    align-items:center;
    border-right:1px solid var(--line);
}

.stat:last-child{border-right:0}

.stat-icon{
    width:48px;
    height:48px;
    border:3px solid var(--green);
    border-radius:16px;
}

.stat strong{
    display:block;
    font-size:28px;
    letter-spacing:-.04em;
}

.stat span{
    display:block;
    color:var(--muted);
    font-size:14px;
    line-height:1.4;
    font-weight:700;
}

.section{
    padding:70px 0;
    background:#07111F;
}

.section h2{
    margin:0 0 16px;
    font-size:clamp(30px,4vw,48px);
    letter-spacing:-.06em;
    line-height:1.08;
}

.section-desc{
    max-width:650px;
    color:var(--muted);
    line-height:1.8;
    font-weight:600;
    margin:0 0 34px;
}

.features{
    display:grid;
    grid-template-columns:repeat(4,1fr);
    gap:20px;
}

.card{
    min-height:220px;
    padding:28px;
    border:1px solid var(--line);
    border-radius:20px;
    background:var(--panel2);
    transition:.3s ease;
}

.card:hover{
    transform:translateY(-6px);
    border-color:rgba(74,222,128,.35);
}

.card-num{
    display:flex;
    justify-content:space-between;
    color:rgba(255,255,255,.18);
    font-size:34px;
    font-weight:900;
    margin-bottom:34px;
}

.card-icon{
    color:var(--green);
    font-size:26px;
}

.card h3{
    margin:0 0 12px;
    font-size:17px;
}

.card p{
    margin:0;
    color:var(--muted);
    font-size:14px;
    line-height:1.65;
    font-weight:600;
}

.split{
    display:grid;
    grid-template-columns:1.45fr .9fr;
    gap:24px;
    align-items:stretch;
}

.packages{
    display:grid;
    grid-template-columns:repeat(3,1fr);
    gap:18px;
}

.package{
    padding:26px;
    border:1px solid var(--line);
    border-radius:20px;
    background:var(--panel2);
}

.package.featured{
    border-color:rgba(74,222,128,.55);
    box-shadow:0 0 0 1px rgba(74,222,128,.18);
}

.badge{
    display:inline-flex;
    padding:7px 10px;
    border-radius:999px;
    background:rgba(74,222,128,.15);
    color:var(--green);
    font-size:12px;
    font-weight:900;
    margin-bottom:16px;
}

.package h3{
    margin:0;
    font-size:19px;
}

.package p{
    color:var(--muted);
    line-height:1.65;
    font-size:14px;
}

.package ul{
    list-style:none;
    padding:0;
    margin:22px 0;
    display:grid;
    gap:10px;
    color:rgba(255,255,255,.78);
    font-size:14px;
    font-weight:700;
}

.package li:before{
    content:"✓";
    color:var(--green);
    margin-right:8px;
}

.side-photo{
    min-height:405px;
    border-radius:22px;
    border:1px solid var(--line);
    overflow:hidden;
    background:
        linear-gradient(rgba(5,11,20,.25),rgba(5,11,20,.65)),
        url("https://images.unsplash.com/photo-1503376780353-7e6692767b70?auto=format&fit=crop&w=1200&q=85");
    background-size:cover;
    background-position:center;
    display:flex;
    align-items:flex-end;
    padding:32px;
}

.side-photo h3{
    max-width:360px;
    font-size:30px;
    line-height:1.18;
    letter-spacing:-.05em;
    margin:0 0 14px;
}

.side-photo p{
    color:var(--muted);
    line-height:1.65;
    font-weight:600;
}

.results{
    display:grid;
    grid-template-columns:repeat(3,1fr);
    gap:0;
    border:1px solid var(--line);
    border-radius:20px;
    background:var(--panel2);
    overflow:hidden;
}

.result{
    padding:26px 34px;
    border-right:1px solid var(--line);
    display:flex;
    align-items:center;
    gap:20px;
}

.result:last-child{border-right:0}

.result strong{
    display:block;
    font-size:34px;
}

.result span{
    color:var(--muted);
    font-weight:700;
    line-height:1.45;
}

.footer{
    padding:46px 0;
    background:#07111F;
    border-top:1px solid var(--line);
}

.footer-inner{
    display:flex;
    justify-content:space-between;
    align-items:center;
    gap:20px;
    color:var(--muted);
    font-size:14px;
    font-weight:700;
}

.footer-links{
    display:flex;
    gap:30px;
}

@media(max-width:980px){
    .nav-links{display:none}
    .hero-grid,.split{grid-template-columns:1fr}
    .features,.packages,.stats,.results{grid-template-columns:1fr}
    .stat,.result{border-right:0;border-bottom:1px solid var(--line)}
    .stat:last-child,.result:last-child{border-bottom:0}
}

@media(max-width:620px){
    .container,.nav{width:calc(100% - 24px)}
    .hero{padding-top:130px}
    h1{font-size:42px}
    .exam-card{margin-top:34px}
    .footer-inner{flex-direction:column;align-items:flex-start}
}
</style>
</head>

<body>
<div class="road-bg"></div>

<nav class="nav">
    <a class="logo" href="/autoschool">
        <span class="logo-mark">A</span>
        <span>Driving<br>Academy</span>
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
            <div class="hero-grid">
                <div>
                    <div class="pill"><span class="dot"></span> ფიზიკური + ონლაინ თეორიის კურსი</div>

                    <h1>ისწავლე მართვა <span>უფრო მარტივად,</span> სწრაფად და თავდაჯერებულად</h1>

                    <p>
                        Premium Driving Academy გაერთიანებს ავტოსკოლის ფიზიკურ კურსს,
                        ონლაინ თეორიას, გამოცდის რეალურ სიმულაციას და შეცდომების მარტივ ახსნას.
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
                        <span class="circle"></span>
                    </div>

                    <div class="option active">
                        <span>მოძრაობა აკრძალულია</span>
                        <span class="circle"></span>
                    </div>

                    <div class="option">
                        <span>გასწრება ნებადართულია</span>
                        <span class="circle"></span>
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
            <p class="section-desc">ყველა საჭირო ნაწილი ერთ სივრცეში — თეორია, პრაქტიკული მიდგომა, გამოცდის რეჟიმი და პროგრესის კონტროლი.</p>

            <div class="features">
                <div class="card">
                    <div class="card-num"><span class="card-icon">▱</span><span>01</span></div>
                    <h3>ფიზიკური კურსი</h3>
                    <p>ინსტრუქტორთან სწავლა, რეალური მაგალითები და გამოცდაზე ორიენტირებული ახსნა.</p>
                </div>
                <div class="card">
                    <div class="card-num"><span class="card-icon">▰</span><span>02</span></div>
                    <h3>ონლაინ თეორია</h3>
                    <p>ისწავლე სახლიდან, გზაში ან შესვენებაზე — ტელეფონიდანაც და კომპიუტერიდანაც.</p>
                </div>
                <div class="card">
                    <div class="card-num"><span class="card-icon">◎</span><span>03</span></div>
                    <h3>გამოცდის სიმულაცია</h3>
                    <p>რეალურ გამოცდასთან მიახლოებული დრო, კითხვები, პასუხები და შედეგები.</p>
                </div>
                <div class="card">
                    <div class="card-num"><span class="card-icon">▣</span><span>04</span></div>
                    <h3>შეცდომის ახსნა</h3>
                    <p>არასწორ პასუხზე იღებ მარტივ განმარტებას ადამიანურ ენაზე.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="section" id="packages">
        <div class="container">
            <h2>აირჩიე შენზე მორგებული კურსი</h2>
            <p class="section-desc">დაიწყე მხოლოდ ონლაინით ან აიღე სრული premium პაკეტი ფიზიკური მომზადებით.</p>

            <div class="split">
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

                <div class="side-photo">
                    <div>
                        <span class="badge">Live Exam Experience</span>
                        <h3>ტესტი, რომელიც რეალურ გამოცდას ჰგავს</h3>
                        <p>ყველა პასუხის შემდეგ ხედავ პროგრესს, შეცდომებს და საჭირო განმარტებებს.</p>
                        <a href="/autoschool/exam" class="btn btn-primary">გადადი გამოცდაზე</a>
                    </div>
                </div>
            </div>

            <div class="results" style="margin-top:26px">
                <div class="result"><strong>94%</strong><span>მომზადებული მოსწავლეების მაღალი შედეგი</span></div>
                <div class="result"><strong>30</strong><span>წუთიანი გამოცდის რეალური რეჟიმი</span></div>
                <div class="result"><strong>24/7</strong><span>წვდომა ონლაინ სასწავლო სივრცეზე</span></div>
            </div>
        </div>
    </section>
</main>

<footer class="footer" id="contact">
    <div class="container footer-inner">
        <a class="logo" href="/autoschool">
            <span class="logo-mark">A</span>
            <span>Driving<br>Academy</span>
        </a>

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

    if(window.gsap && window.ScrollTrigger){
        gsap.registerPlugin(ScrollTrigger);

        gsap.from('.nav',{y:-20,opacity:0,duration:.8,ease:'power3.out'});
        gsap.from('.pill,h1,.hero p,.actions',{y:34,opacity:0,duration:.85,stagger:.08,ease:'power3.out'});
        gsap.from('.exam-card',{y:40,opacity:0,scale:.96,duration:1,delay:.2,ease:'power3.out'});
        gsap.from('.stats',{y:34,opacity:0,duration:.8,delay:.35,ease:'power3.out'});

        gsap.utils.toArray('.card,.package,.side-photo,.result').forEach((el,i)=>{
            gsap.from(el,{
                scrollTrigger:{trigger:el,start:'top 88%',once:true},
                y:28,
                opacity:0,
                duration:.7,
                delay:(i%4)*.04,
                ease:'power3.out'
            });
        });

        gsap.to('.road-bg',{scale:1.06,duration:18,repeat:-1,yoyo:true,ease:'sine.inOut'});
        gsap.to('.dot',{opacity:.35,duration:1.2,repeat:-1,yoyo:true,ease:'sine.inOut'});
    }
});
</script>
</body>
</html>
