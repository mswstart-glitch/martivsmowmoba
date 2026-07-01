<!DOCTYPE html>
<html lang="ka">
<head>
<meta charset="UTF-8">
<title>AutoSchool — Driving Academy</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<style>
*{box-sizing:border-box}
:root{--y:#c6a15b;--gold:#c6a15b;--gold2:#e6d3a3;--bg:#0b0d10;--panel:#11151b;--ink:#f5f2ea;--muted:#a7a39a;--line:rgba(198,161,91,.20)}
html.lenis{height:auto}
.lenis.lenis-smooth{scroll-behavior:auto}
body{margin:0;background:#050816;color:var(--ink);font-family:system-ui,-apple-system,BlinkMacSystemFont,"Segoe UI",sans-serif;overflow-x:hidden}
a{text-decoration:none;color:inherit}
.wrap{max-width:1240px;margin:auto;padding:0 34px}
.hero{min-height:100vh;position:relative;overflow:hidden;background:radial-gradient(circle at 74% 30%,rgba(198,161,91,.20),transparent 25%),radial-gradient(circle at 18% 20%,rgba(255,255,255,.06),transparent 28%),linear-gradient(120deg,#0b0d10 0%,#121820 48%,#17130c 78%,#050607 100%)}
.road{position:absolute;right:-170px;bottom:-260px;width:820px;height:760px;transform:perspective(720px) rotateX(64deg) rotateZ(-12deg);background:linear-gradient(90deg,#030712,#121826 48%,#2a2d33 50%,#121826 52%,#030712)}
.road:after{content:"";position:absolute;left:50%;top:0;width:9px;height:100%;transform:translateX(-50%);background:repeating-linear-gradient(to bottom,var(--gold) 0 44px,transparent 44px 92px);filter:drop-shadow(0 0 16px rgba(139,92,246,.65))}
.car{position:absolute;right:120px;bottom:210px;width:500px;height:180px;border-radius:140px 140px 36px 36px;background:linear-gradient(180deg,#111827,#030712 62%,#020308);box-shadow:0 50px 110px rgba(0,0,0,.38)}
.car:before{content:"";position:absolute;left:18%;right:18%;top:-76px;height:118px;border-radius:110px 110px 16px 16px;background:linear-gradient(180deg,#1e293b,#090b12)}
.car:after{content:"AUTOSCHOOL";position:absolute;left:50%;bottom:18px;transform:translateX(-50%);background:#e7d27b;color:#111;padding:8px 22px;border-radius:7px;font-weight:950}
.l1,.l2{position:absolute;top:68px;width:145px;height:40px;background:linear-gradient(90deg,#fff3c4,var(--gold));box-shadow:0 0 42px rgba(139,92,246,.75),0 0 130px rgba(139,92,246,.32)}
.l1{left:48px;border-radius:30px 8px 24px 12px;transform:skewX(-14deg)}
.l2{right:48px;border-radius:8px 30px 12px 24px;transform:skewX(14deg)}
.nav{height:96px;display:flex;align-items:center;justify-content:space-between;position:relative;z-index:5}
.logo{display:flex;align-items:center;gap:12px;font-weight:950;font-size:24px}
.logo b{color:var(--gold)}
.mark{width:42px;height:42px;border-radius:14px;background:linear-gradient(180deg,#0f172a,#030712);color:var(--gold);border:1px solid var(--line);display:grid;place-items:center;box-shadow:0 18px 45px rgba(139,92,246,.12)}
.menu{display:flex;gap:38px;font-weight:800;font-size:15px}
.navbtn{background:linear-gradient(135deg,#e6d3a3,#c6a15b);color:#11151b;padding:15px 24px;border-radius:16px;font-weight:950;box-shadow:0 18px 45px rgba(139,92,246,.18)}
.hero-grid{min-height:calc(100vh - 96px);display:grid;grid-template-columns:.9fr 1.1fr;align-items:center;position:relative;z-index:3;padding-bottom:80px}
.eyebrow{color:var(--gold);font-weight:950;margin-bottom:18px}
h1{font-size:76px;line-height:.96;letter-spacing:-3.2px;margin:0 0 24px;max-width:650px}
h1 span{background:linear-gradient(90deg,#f5f2ea,#e6d3a3,#c6a15b);-webkit-background-clip:text;color:transparent}
.lead{font-size:19px;line-height:1.75;color:var(--muted);max-width:570px;margin:0 0 32px}
.actions{display:flex;gap:14px;flex-wrap:wrap}
.btn{padding:17px 27px;border-radius:16px;font-weight:950;display:inline-flex;align-items:center;gap:12px;transition:.16s}
.primary{background:linear-gradient(135deg,#e6d3a3,#c6a15b);color:#11151b;box-shadow:0 18px 45px rgba(139,92,246,.22)}
.secondary{border:1px solid rgba(255,255,255,.15);background:rgba(255,255,255,.05);color:var(--ink);backdrop-filter:blur(14px)}
.trust{display:flex;gap:12px;align-items:center;margin-top:48px;color:var(--muted);font-weight:850}
.avatar{width:34px;height:34px;border-radius:50%;background:linear-gradient(135deg,#1e293b,#22d3ee);border:2px solid #050816;display:inline-block;margin-left:-8px}
.avatar:first-child{margin-left:0}

.section{padding:90px 34px;background:#050816}
.inner{max-width:1240px;margin:auto}
.center{text-align:center;margin-bottom:42px}
.center small{color:var(--gold);font-weight:950}
.center h2{font-size:46px;line-height:1.08;letter-spacing:-1.7px;margin:8px 0 0}
.center h2 span{background:linear-gradient(90deg,#f5f2ea,#e6d3a3,#c6a15b);-webkit-background-clip:text;color:transparent}
.cards{display:grid;grid-template-columns:repeat(4,1fr);gap:20px}
.card{background:linear-gradient(180deg,rgba(255,255,255,.065),rgba(255,255,255,.025));border:1px solid rgba(139,92,246,.14);border-radius:30px;padding:32px;min-height:255px;box-shadow:0 24px 80px rgba(0,0,0,.28);transition:.28s cubic-bezier(.2,.8,.2,1);backdrop-filter:blur(16px)}
.card:hover{transform:translateY(-5px) scale(1.012);border-color:rgba(139,92,246,.42);box-shadow:0 34px 100px rgba(139,92,246,.08)}
.ico{width:58px;height:58px;border-radius:19px;background:linear-gradient(180deg,#0f172a,#030712);border:1px solid rgba(139,92,246,.18);color:var(--gold);display:grid;place-items:center;font-size:24px;margin-bottom:30px}
.card h3{font-size:22px;margin:0 0 12px;color:var(--ink)}.card p{color:var(--muted);line-height:1.65;margin:0}

.dark{background:linear-gradient(180deg,#030712,#070b1f);color:white;overflow:hidden;border-top:1px solid rgba(139,92,246,.12);border-bottom:1px solid rgba(139,92,246,.12)}
.steps{max-width:1240px;margin:auto;display:grid;grid-template-columns:.8fr 1.2fr;gap:60px;align-items:center}
.steps h2{font-size:46px;line-height:1.08;letter-spacing:-1.6px;margin:0 0 22px}
.steps p{color:#b8b8b8;line-height:1.7;font-size:18px}
.timeline{display:grid;grid-template-columns:repeat(4,1fr);gap:14px}
.step{padding:22px}
.num{width:62px;height:62px;border-radius:50%;border:1px solid rgba(139,92,246,.4);color:var(--gold);display:grid;place-items:center;font-weight:950;margin-bottom:22px}
.step h3{margin:0 0 10px}.step p{font-size:15px;color:#aaa;margin:0}

.courses{display:grid;grid-template-columns:.72fr 1.28fr;gap:34px;align-items:start}
.courses h2{font-size:46px;line-height:1.1;letter-spacing:-1.6px;margin:0 0 18px}
.course-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:18px}
.course{border:1px solid rgba(139,92,246,.14);border-radius:26px;overflow:hidden;background:linear-gradient(180deg,rgba(255,255,255,.065),rgba(255,255,255,.025));box-shadow:0 20px 80px rgba(0,0,0,.26);transition:.28s cubic-bezier(.2,.8,.2,1);backdrop-filter:blur(16px)}
.thumb{height:160px;background:linear-gradient(135deg,#0f172a,#070b1f);position:relative;overflow:hidden}
.thumb:after{content:"";position:absolute;inset:0;background:radial-gradient(circle at 70% 40%,rgba(139,92,246,.45),transparent 25%)}
.course-body{padding:21px}.course h3{margin:0 0 8px}.course p{color:var(--muted);line-height:1.5;margin:0 0 14px}.price{font-size:24px;font-weight:950;color:var(--gold)}

.split-line{display:block;overflow:hidden}
@media(max-width:980px){
.menu,.navbtn{display:none}.hero-grid,.steps,.courses{grid-template-columns:1fr}h1{font-size:48px}.car{opacity:.35;right:-80px}.road{opacity:.45}.cards,.timeline,.course-grid{grid-template-columns:1fr}.section{padding:58px 22px}.wrap{padding:0 22px}
}
</style>
</head>
<body>

<section class="hero">
    <div class="road"></div>
    <div class="car"><div class="l1"></div><div class="l2"></div></div>

    <div class="wrap">
        <nav class="nav">
            <a class="logo" href="/autoschool"><span class="mark">⌁</span><span>Auto<b>School</b></span></a>
            <div class="menu"><a>მთავარი</a><a>კურსები</a><a>ონლაინ სწავლა</a><a href="/autoschool/exam">ტესტები</a><a>კონტაქტი</a></div>
            <a class="navbtn" href="/autoschool/exam">უფასო ტესტი</a>
        </nav>

        <div class="hero-grid">
            <div>
                <div class="eyebrow reveal">Driving Academy</div>
                <h1 class="hero-title">შენი გზა<br>მართვის<br><span>მოწმობამდე.</span></h1>
                <p class="lead reveal">თანამედროვე სასწავლო სისტემა, რეალური გამოცდის სიმულაცია და AI ახსნა თეორიულ კითხვებზე.</p>
                <div class="actions reveal">
                    <a class="btn primary">კურსის არჩევა →</a>
                    <a class="btn secondary" href="/autoschool/exam">უფასო ტესტი</a>
                </div>
                <div class="trust reveal">
                    <div><span class="avatar"></span><span class="avatar"></span><span class="avatar"></span></div>
                    <span>10,000+ მოსწავლე უკვე სწავლობს ჩვენთან</span>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section">
    <div class="inner">
        <div class="center reveal">
            <small>რატომ ჩვენ?</small>
            <h2>სწავლა, რომელიც <span>შედეგს</span> იძლევა.</h2>
        </div>

        <div class="cards">
            <div class="card reveal"><div class="ico">🎓</div><h3>ფიზიკური კურსები</h3><p>პროფესიონალი მასწავლებლები და კომფორტული სივრცე.</p></div>
            <div class="card reveal"><div class="ico">💻</div><h3>ონლაინ სწავლა</h3><p>ისწავლე სახლიდან, შენს ტემპში და გრაფიკზე.</p></div>
            <div class="card reveal"><div class="ico">📄</div><h3>რეალური ტესტები</h3><p>გამოცდის რეჟიმი რეალური ლოგიკით.</p></div>
            <div class="card reveal"><div class="ico">📊</div><h3>პროგრესი</h3><p>შეცდომები, სტატისტიკა და სუსტი თემები.</p></div>
        </div>
    </div>
</section>

<section class="section dark">
    <div class="steps">
        <div class="reveal">
            <small style="color:var(--gold);font-weight:950">როგორ სწავლობ ჩვენთან</small>
            <h2>მარტივი ეტაპები კარგი შედეგისთვის.</h2>
            <p>სწავლა იწყება მარტივი ახსნით, გრძელდება ვარჯიშით და სრულდება რეალური გამოცდის სიმულაციით.</p>
            <a class="btn primary" href="/autoschool/exam">დაიწყე ტესტი →</a>
        </div>

        <div class="timeline">
            <div class="step reveal"><div class="num">01</div><h3>ისწავლე თეორია</h3><p>მარტივი ახსნა და მაგალითები.</p></div>
            <div class="step reveal"><div class="num">02</div><h3>ივარჯიშე</h3><p>რეალური კითხვები და თემები.</p></div>
            <div class="step reveal"><div class="num">03</div><h3>AI ახსნა</h3><p>შეცდომა ხდება სწავლა.</p></div>
            <div class="step reveal"><div class="num">04</div><h3>ჩააბარე</h3><p>გამოცდისთვის მზად ხარ.</p></div>
        </div>
    </div>
</section>

<section class="section">
    <div class="inner courses">
        <div class="reveal">
            <small style="color:var(--gold);font-weight:950">კურსები</small>
            <h2>აირჩიე შენთვის სასურველი კურსი.</h2>
            <p style="color:var(--muted);font-size:18px;line-height:1.65">ფიზიკური, ონლაინ ან ინდივიდუალური სწავლა.</p>
        </div>

        <div class="course-grid">
            <div class="course reveal"><div class="thumb"></div><div class="course-body"><h3>A კატეგორია</h3><p>მოტოციკლის მოსამზადებელი კურსი.</p><div class="price">450₾</div></div></div>
            <div class="course reveal"><div class="thumb"></div><div class="course-body"><h3>B კატეგორია</h3><p>მსუბუქი ავტომობილის თეორია.</p><div class="price">250₾</div></div></div>
            <div class="course reveal"><div class="thumb"></div><div class="course-body"><h3>A+B პაკეტი</h3><p>სრული მოსამზადებელი კურსი.</p><div class="price">650₾</div></div></div>
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

document.querySelectorAll('.hero-title').forEach(title => {
    const html = title.innerHTML;
    title.innerHTML = html.split('<br>').map(line => `<span class="split-line">${line}</span>`).join('');
});

gsap.from('.nav', {
    y: -30,
    opacity: 0,
    duration: 0.755,
    ease: 'expo.out'
});

gsap.from('.split-line', {
    yPercent: 110,
    opacity: 0,
    duration: 0.755,
    stagger: 0.06,
    ease: 'expo.out',
    delay: 0.08
});

gsap.from('.lead, .actions, .trust', {
    y: 24,
    opacity: 0,
    duration: 0.75,
    stagger: 0.06,
    ease: 'expo.out',
    delay: 0.085
});

gsap.from('.car', {
    x: 120,
    scale: 1.06,
    opacity: 0,
    duration: 0.85,
    ease: 'expo.out',
    delay: 0.15
});

gsap.to('.car', {
    y: -18,
    scale: 1.025,
    ease: 'none',
    scrollTrigger: {
        trigger: '.hero',
        start: 'top top',
        end: 'bottom top',
        scrub: 1
    }
});

gsap.to('.road', {
    y: 70,
    scale: 1.035,
    ease: 'none',
    scrollTrigger: {
        trigger: '.hero',
        start: 'top top',
        end: 'bottom top',
        scrub: 1
    }
});

gsap.utils.toArray('.reveal').forEach((el, i) => {
    gsap.from(el, {
        y: 34,
        opacity: 0,
        
        duration: 0.755,
        ease: 'expo.out',
        scrollTrigger: {
            trigger: el,
            start: 'top 86%',
            toggleActions: 'play none none reverse'
        }
    });
});

gsap.utils.toArray('.card').forEach((card, i) => {
    gsap.from(card, {
        y: 34,
        opacity: 0,
        scale: 0.985,
        duration: 0.75,
        delay: i * 0.03,
        ease: 'expo.out',
        scrollTrigger: {
            trigger: card,
            start: 'top 88%',
            toggleActions: 'play none none reverse'
        }
    });
});

gsap.utils.toArray('.course').forEach((course, i) => {
    gsap.from(course, {
        y: 34,
        opacity: 0,
        scale: 0.985,
        duration: 0.75,
        delay: i * 0.035,
        ease: 'expo.out',
        scrollTrigger: {
            trigger: course,
            start: 'top 88%',
            toggleActions: 'play none none reverse'
        }
    });
});
</script>

</body>
</html>
