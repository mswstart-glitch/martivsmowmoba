<!DOCTYPE html>
<html lang="ka">
<head>
<meta charset="UTF-8">
<title>AutoSchool — Driving Academy</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<style>
*{box-sizing:border-box}
:root{--yellow:#f7c600;--black:#080808;--muted:#5f646d;--line:#ececec}
html{scroll-behavior:smooth}
body{margin:0;font-family:system-ui,-apple-system,BlinkMacSystemFont,"Segoe UI",sans-serif;background:#fff;color:#0b0b0b;overflow-x:hidden}
a{text-decoration:none;color:inherit}
.wrap{max-width:1240px;margin:auto;padding:0 34px}

.reveal{opacity:0;transform:translateY(28px);transition:1s cubic-bezier(.2,.8,.2,1)}
.reveal.show{opacity:1;transform:none}

.hero{min-height:100vh;position:relative;overflow:hidden;background:linear-gradient(90deg,#fff 0%,#fff 43%,rgba(255,255,255,.78) 57%,rgba(255,255,255,.1) 100%),radial-gradient(circle at 73% 36%,rgba(247,198,0,.18),transparent 24%),linear-gradient(135deg,#f7f7f3,#d8d6cc)}
.hero:before{content:"";position:absolute;inset:0;background:linear-gradient(180deg,transparent 65%,#fff 100%);z-index:1}
.road{position:absolute;right:-160px;bottom:-240px;width:780px;height:720px;transform:perspective(720px) rotateX(64deg) rotateZ(-12deg);background:linear-gradient(90deg,#2a2a2a,#111 48%,#3a3a3a 50%,#111 52%,#2a2a2a);border-left:3px solid rgba(255,255,255,.45);border-right:3px solid rgba(255,255,255,.45);z-index:0}
.road:after{content:"";position:absolute;left:50%;top:0;width:9px;height:100%;transform:translateX(-50%);background:repeating-linear-gradient(to bottom,var(--yellow) 0 44px,transparent 44px 92px);filter:drop-shadow(0 0 14px var(--yellow))}
.car{position:absolute;right:115px;bottom:210px;width:500px;height:180px;border-radius:140px 140px 36px 36px;background:linear-gradient(180deg,#171717,#050505 62%,#000);z-index:2;box-shadow:0 50px 110px rgba(0,0,0,.38);animation:floatCar 5s ease-in-out infinite}
.car:before{content:"";position:absolute;left:18%;right:18%;top:-76px;height:118px;border-radius:110px 110px 16px 16px;background:linear-gradient(180deg,#202020,#060606)}
.car:after{content:"AUTOSCHOOL";position:absolute;left:50%;bottom:18px;transform:translateX(-50%);background:#e7d27b;color:#111;padding:8px 22px;border-radius:7px;font-weight:950;letter-spacing:1px}
@keyframes floatCar{0%,100%{transform:translateY(0)}50%{transform:translateY(-10px)}}
.light1,.light2{position:absolute;top:68px;width:145px;height:40px;background:linear-gradient(90deg,#fff6cb,var(--yellow));box-shadow:0 0 40px rgba(247,198,0,.75),0 0 120px rgba(247,198,0,.35);z-index:3}
.light1{left:48px;border-radius:30px 8px 24px 12px;transform:skewX(-14deg)}
.light2{right:48px;border-radius:8px 30px 12px 24px;transform:skewX(14deg)}

.nav{height:96px;display:flex;align-items:center;justify-content:space-between;position:relative;z-index:5}
.logo{display:flex;align-items:center;gap:12px;font-weight:950;font-size:24px}
.logo b{color:var(--yellow)}
.mark{width:42px;height:42px;border-radius:14px;background:#0b0b0b;color:var(--yellow);display:grid;place-items:center}
.menu{display:flex;gap:38px;font-weight:800;font-size:15px}
.navbtn{background:var(--yellow);padding:15px 24px;border-radius:16px;font-weight:950}

.hero-grid{min-height:calc(100vh - 96px);display:grid;grid-template-columns:.92fr 1.08fr;align-items:center;position:relative;z-index:3;padding-bottom:80px}
h1{font-size:76px;line-height:.96;letter-spacing:-3.2px;margin:0 0 24px;max-width:620px}
h1 span{color:var(--yellow)}
.lead{font-size:19px;line-height:1.75;color:#30343b;max-width:570px;margin:0 0 32px}
.actions{display:flex;gap:14px;flex-wrap:wrap}
.btn{padding:17px 27px;border-radius:16px;font-weight:950;display:inline-flex;align-items:center;gap:12px;transition:.3s}
.btn:hover{transform:translateY(-3px)}
.primary{background:var(--yellow);box-shadow:0 18px 45px rgba(247,198,0,.25)}
.secondary{border:1px solid #111;background:white}

.trust{display:flex;gap:12px;align-items:center;margin-top:48px;color:#222;font-weight:850}
.avatars{display:flex}
.avatar{width:34px;height:34px;border-radius:50%;background:#ddd;border:2px solid white;margin-left:-8px}
.avatar:first-child{margin-left:0}

.section{padding:76px 34px}
.section-inner{max-width:1240px;margin:auto}
.center{text-align:center;margin-bottom:38px}
.center small{color:var(--yellow);font-weight:950}
.center h2{font-size:42px;line-height:1.1;letter-spacing:-1.4px;margin:8px 0 0}
.center h2 span{color:var(--yellow)}

.cards{display:grid;grid-template-columns:repeat(4,1fr);gap:20px}
.card{background:white;border:1px solid var(--line);border-radius:28px;padding:30px;min-height:250px;box-shadow:0 24px 70px rgba(0,0,0,.06);transition:.35s cubic-bezier(.2,.8,.2,1)}
.card:hover{transform:translateY(-8px);box-shadow:0 34px 90px rgba(0,0,0,.1)}
.ico{width:56px;height:56px;border-radius:18px;background:#111;color:var(--yellow);display:grid;place-items:center;font-size:24px;margin-bottom:28px}
.card h3{font-size:21px;margin:0 0 12px}.card p{color:#565b63;line-height:1.65;margin:0}

.dark{background:#070707;color:white}
.steps{max-width:1240px;margin:auto;display:grid;grid-template-columns:.8fr 1.2fr;gap:50px;align-items:center}
.steps h2{font-size:42px;line-height:1.1;letter-spacing:-1.4px;margin:0 0 22px}
.steps p{color:#b8b8b8;line-height:1.7;font-size:18px}
.timeline{display:grid;grid-template-columns:repeat(4,1fr);gap:14px}
.step{padding:20px}
.num{width:60px;height:60px;border-radius:50%;border:1px solid rgba(247,198,0,.4);color:var(--yellow);display:grid;place-items:center;font-weight:950;margin-bottom:22px}
.step h3{margin:0 0 10px}.step p{font-size:15px;color:#aaa;margin:0}

.courses{display:grid;grid-template-columns:.72fr 1.28fr;gap:30px;align-items:start}
.courses h2{font-size:42px;line-height:1.12;letter-spacing:-1.4px;margin:0 0 18px}
.course-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:18px}
.course{border:1px solid var(--line);border-radius:24px;overflow:hidden;background:white;box-shadow:0 20px 70px rgba(0,0,0,.06);transition:.35s}
.course:hover{transform:translateY(-7px)}
.thumb{height:155px;background:linear-gradient(135deg,#eee,#d8d8d8);position:relative}
.thumb:after{content:"";position:absolute;inset:0;background:radial-gradient(circle at 70% 40%,rgba(247,198,0,.6),transparent 25%)}
.course-body{padding:20px}.course h3{margin:0 0 8px}.course p{color:#555;line-height:1.5;margin:0 0 14px}.price{font-size:24px;font-weight:950}

@media(max-width:980px){
.menu,.navbtn{display:none}.hero-grid,.steps,.courses{grid-template-columns:1fr}h1{font-size:48px}.car{opacity:.35;right:-80px}.road{opacity:.45}.cards,.timeline,.course-grid{grid-template-columns:1fr}.section{padding:58px 22px}.wrap{padding:0 22px}
}
</style>
</head>
<body>

<section class="hero">
    <div class="road"></div>
    <div class="car"><div class="light1"></div><div class="light2"></div></div>

    <div class="wrap">
        <nav class="nav reveal">
            <a class="logo" href="/autoschool"><span class="mark">⌁</span><span>Auto<b>School</b></span></a>
            <div class="menu"><a>მთავარი</a><a>კურსები</a><a>ონლაინ სწავლა</a><a href="/autoschool/exam">ტესტები</a><a>კონტაქტი</a></div>
            <a class="navbtn" href="/autoschool/exam">უფასო ტესტი</a>
        </nav>

        <div class="hero-grid">
            <div class="reveal">
                <h1>შენი გზა<br>მართვის<br><span>მოწმობამდე.</span></h1>
                <p class="lead">თანამედროვე სასწავლო სისტემა, რეალური გამოცდის სიმულაცია და AI ახსნა თეორიულ კითხვებზე.</p>
                <div class="actions">
                    <a class="btn primary">კურსის არჩევა →</a>
                    <a class="btn secondary" href="/autoschool/exam">უფასო ტესტი</a>
                </div>
                <div class="trust">
                    <div class="avatars"><span class="avatar"></span><span class="avatar"></span><span class="avatar"></span></div>
                    <span>10,000+ მოსწავლე უკვე სწავლობს ჩვენთან</span>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="section">
    <div class="section-inner">
        <div class="center reveal">
            <small>რატომ ჩვენ?</small>
            <h2>სწავლა, რომელიც <span>შედეგს</span> იძლევა.</h2>
        </div>

        <div class="cards">
            <div class="card reveal"><div class="ico">🎓</div><h3>ფიზიკური კურსები</h3><p>პროფესიონალი მასწავლებლები და კომფორტული სასწავლო სივრცე.</p></div>
            <div class="card reveal"><div class="ico">💻</div><h3>ონლაინ სწავლა</h3><p>ისწავლე სახლიდან, შენს ტემპში და შენს გრაფიკზე.</p></div>
            <div class="card reveal"><div class="ico">📄</div><h3>რეალური ტესტები</h3><p>გამოცდის რეჟიმი რეალური ლოგიკით და შედეგების დათვლით.</p></div>
            <div class="card reveal"><div class="ico">📊</div><h3>პროგრესი</h3><p>შეცდომები, სტატისტიკა და სუსტი თემების ანალიზი.</p></div>
        </div>
    </div>
</section>

<section class="section dark">
    <div class="steps">
        <div class="reveal">
            <small style="color:var(--yellow);font-weight:950">როგორ სწავლობ ჩვენთან</small>
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
    <div class="section-inner courses">
        <div class="reveal">
            <small style="color:var(--yellow);font-weight:950">კურსები</small>
            <h2>აირჩიე შენთვის სასურველი კურსი.</h2>
            <p style="color:#555;font-size:18px;line-height:1.65">ფიზიკური, ონლაინ ან ინდივიდუალური სწავლა.</p>
        </div>

        <div class="course-grid">
            <div class="course reveal"><div class="thumb"></div><div class="course-body"><h3>A კატეგორია</h3><p>მოტოციკლის მოსამზადებელი კურსი.</p><div class="price">450₾</div></div></div>
            <div class="course reveal"><div class="thumb"></div><div class="course-body"><h3>B კატეგორია</h3><p>მსუბუქი ავტომობილის თეორია.</p><div class="price">250₾</div></div></div>
            <div class="course reveal"><div class="thumb"></div><div class="course-body"><h3>A+B პაკეტი</h3><p>სრული მოსამზადებელი კურსი.</p><div class="price">650₾</div></div></div>
        </div>
    </div>
</section>

<script>
const items=document.querySelectorAll('.reveal');
const io=new IntersectionObserver((entries)=>{
    entries.forEach(e=>{if(e.isIntersecting)e.target.classList.add('show')})
},{threshold:.12});
items.forEach(i=>io.observe(i));
</script>

</body>
</html>
