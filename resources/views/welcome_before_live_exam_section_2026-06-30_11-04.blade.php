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
</style>
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

</body>
</html>
