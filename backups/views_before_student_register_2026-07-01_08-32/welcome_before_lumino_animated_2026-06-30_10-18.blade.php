<!DOCTYPE html>
<html lang="ka">
<head>
<meta charset="UTF-8">
<title>AutoSchool — Driving Academy</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<style>
*{box-sizing:border-box}
:root{--y:#facc15;--b:#070707;--t:#fff;--m:#b8b8b8;--l:rgba(255,255,255,.14)}
body{margin:0;font-family:system-ui,-apple-system,BlinkMacSystemFont,"Segoe UI",sans-serif;background:#fff;color:#111}
a{text-decoration:none;color:inherit}
.hero{min-height:100vh;background:linear-gradient(90deg,#050505 0%,rgba(5,5,5,.86) 38%,rgba(5,5,5,.35) 70%,#050505 100%),radial-gradient(circle at 72% 52%,rgba(250,204,21,.35),transparent 18%),linear-gradient(135deg,#08101a,#050505);color:white;position:relative;overflow:hidden}
.hero:before{content:"";position:absolute;inset:0;background:linear-gradient(180deg,transparent 0%,rgba(0,0,0,.88) 100%)}
.road{position:absolute;right:-80px;bottom:-240px;width:760px;height:760px;transform:perspective(700px) rotateX(65deg) rotateZ(-8deg);background:linear-gradient(90deg,#050505,#151515 48%,#242424 50%,#151515 52%,#050505);border-left:2px solid rgba(255,255,255,.18);border-right:2px solid rgba(255,255,255,.18)}
.road:after{content:"";position:absolute;left:50%;top:0;width:9px;height:100%;transform:translateX(-50%);background:repeating-linear-gradient(to bottom,var(--y) 0 44px,transparent 44px 90px);filter:drop-shadow(0 0 16px var(--y))}
.wrap{max-width:1260px;margin:auto;padding:0 34px;position:relative;z-index:3}
.nav{height:92px;display:flex;align-items:center;justify-content:space-between}
.logo{display:flex;gap:12px;align-items:center;font-size:24px;font-weight:950}
.logo b{color:var(--y)}
.mark{width:46px;height:46px;border:2px solid var(--y);border-radius:16px;display:grid;place-items:center;color:var(--y)}
.menu{display:flex;gap:42px;color:#e5e5e5;font-weight:800}
.navbtn{background:var(--y);color:#111;padding:16px 26px;border-radius:16px;font-weight:950}
.hero-grid{min-height:calc(100vh - 92px);display:grid;grid-template-columns:.9fr 1.1fr;align-items:center;gap:30px;padding-bottom:90px}
h1{font-size:74px;line-height:.95;letter-spacing:-3px;margin:0 0 24px;max-width:640px}
h1 span{color:var(--y)}
.lead{font-size:20px;line-height:1.75;color:#d4d4d8;max-width:580px;margin:0 0 34px}
.actions{display:flex;gap:16px;flex-wrap:wrap}
.btn{padding:18px 28px;border-radius:17px;font-weight:950;display:inline-flex;gap:12px;align-items:center}
.primary{background:var(--y);color:#111;box-shadow:0 22px 60px rgba(250,204,21,.22)}
.secondary{border:1px solid var(--l);background:rgba(255,255,255,.06);backdrop-filter:blur(14px)}
.carbox{position:relative;min-height:540px}
.car{position:absolute;right:80px;bottom:135px;width:520px;height:190px;border-radius:160px 160px 38px 38px;background:linear-gradient(180deg,#202020,#050505 66%,#000);box-shadow:0 60px 140px rgba(0,0,0,.85),inset 0 2px 0 rgba(255,255,255,.08)}
.car:before{content:"";position:absolute;left:18%;right:18%;top:-78px;height:125px;border-radius:120px 120px 16px 16px;background:linear-gradient(180deg,#252525,#070707);border:1px solid rgba(255,255,255,.08)}
.car:after{content:"AUTOSCHOOL";position:absolute;left:50%;bottom:20px;transform:translateX(-50%);background:#d8c16d;color:#111;padding:8px 22px;border-radius:7px;font-weight:950}
.l1,.l2{position:absolute;top:72px;width:150px;height:42px;background:linear-gradient(90deg,#fff8d4,var(--y));box-shadow:0 0 50px rgba(250,204,21,.9),0 0 140px rgba(250,204,21,.42);z-index:2}
.l1{left:50px;border-radius:32px 8px 26px 12px;transform:skewX(-14deg)}
.l2{right:50px;border-radius:8px 32px 12px 26px;transform:skewX(14deg)}
.beam{position:absolute;left:-80px;right:-80px;bottom:50px;height:250px;background:radial-gradient(ellipse at center,rgba(250,204,21,.28),transparent 65%);filter:blur(18px)}
.progress{position:absolute;right:0;top:120px;width:360px;background:rgba(10,10,10,.64);border:1px solid var(--l);border-radius:30px;padding:26px;backdrop-filter:blur(20px);box-shadow:0 35px 110px rgba(0,0,0,.5)}
.progress h3{font-size:24px;margin:0 0 18px}
.circle{width:132px;height:132px;border-radius:50%;background:conic-gradient(var(--y) 0 68%,#2b2b2b 68%);display:grid;place-items:center;margin-bottom:18px}
.circle div{width:96px;height:96px;border-radius:50%;background:#070707;display:grid;place-items:center;font-size:31px;font-weight:950}
.row{display:flex;justify-content:space-between;margin:12px 0;color:#e5e5e5;font-weight:850}.row span{color:var(--m)}
.four{position:absolute;left:34px;right:34px;bottom:34px;display:grid;grid-template-columns:repeat(4,1fr);gap:16px;z-index:4}
.fcard{background:rgba(12,12,12,.68);border:1px solid var(--l);border-radius:26px;padding:24px;backdrop-filter:blur(18px);color:white;box-shadow:0 24px 80px rgba(0,0,0,.35)}
.ico{width:52px;height:52px;border-radius:18px;background:rgba(250,204,21,.13);color:var(--y);display:grid;place-items:center;font-size:24px;margin-bottom:18px}
.fcard h3{margin:0 0 8px;font-size:21px}.fcard p{margin:0;color:#b8b8b8;line-height:1.5;font-weight:750}

.section{padding:72px 34px;max-width:1260px;margin:auto}
.stitle{text-align:center;margin-bottom:34px}
.stitle small{font-weight:950;color:#777}.stitle h2{font-size:42px;letter-spacing:-1.4px;margin:8px 0 0}.stitle h2 span{color:var(--y)}
.whitecards{display:grid;grid-template-columns:repeat(4,1fr);gap:20px}
.wcard{background:white;border:1px solid #eee;border-radius:28px;padding:28px;box-shadow:0 22px 70px rgba(0,0,0,.07)}
.wcard .ico{background:#111}.wcard h3{font-size:21px;margin:0 0 12px}.wcard p{color:#555;line-height:1.6;margin:0}
.dark{background:#050505;color:white}
.steps{display:grid;grid-template-columns:1.2fr .8fr;gap:28px;align-items:center}
.line{display:grid;grid-template-columns:repeat(4,1fr);gap:18px}
.step{padding:20px}.step .num{width:56px;height:56px;border-radius:50%;border:1px solid rgba(250,204,21,.45);color:var(--y);display:grid;place-items:center;margin-bottom:18px;font-weight:950}.step h3{margin:0 0 8px}.step p{color:#aaa;line-height:1.6;margin:0}
.ctabox{background:linear-gradient(135deg,#171717,#0a0a0a);border:1px solid rgba(255,255,255,.12);border-radius:34px;padding:34px;text-align:center}.ctabox img{max-width:160px}.ctabox a{margin-top:22px;background:var(--y);color:#111;border-radius:16px;padding:16px 28px;display:inline-flex;font-weight:950}

.courses{display:grid;grid-template-columns:.8fr 1.2fr;gap:26px;align-items:start}
.course-grid{display:grid;grid-template-columns:repeat(3,1fr);gap:18px}
.course{background:white;border:1px solid #eee;border-radius:24px;overflow:hidden;box-shadow:0 20px 60px rgba(0,0,0,.07)}
.thumb{height:145px;background:linear-gradient(135deg,#eee,#ddd);position:relative}
.thumb:after{content:"";position:absolute;inset:0;background:radial-gradient(circle at 70% 40%,rgba(250,204,21,.55),transparent 26%)}
.course-body{padding:20px}.course b{font-size:23px}.course h3{margin:0 0 8px}.course p{color:#555;margin:0 0 14px;line-height:1.5}.course a{float:right;width:38px;height:38px;border:1px solid #ddd;border-radius:50%;display:grid;place-items:center}
@media(max-width:980px){.menu,.navbtn{display:none}.hero-grid,.steps,.courses{grid-template-columns:1fr}h1{font-size:48px}.carbox{min-height:520px}.progress{position:relative;top:auto;right:auto;width:auto}.four{position:relative;left:auto;right:auto;bottom:auto;grid-template-columns:1fr;margin-top:20px}.whitecards,.line,.course-grid{grid-template-columns:1fr}.car{right:0;width:100%;opacity:.75}}
</style>
</head>
<body>

<section class="hero">
    <div class="road"></div>
    <div class="wrap">
        <nav class="nav">
            <a class="logo" href="/autoschool"><span class="mark">⌁</span><span>Auto<b>School</b></span></a>
            <div class="menu">
                <a href="#">მთავარი</a><a href="#">კურსები</a><a href="/autoschool/exam">ტესტები</a><a href="#">შესახებ</a><a href="#">კონტაქტი</a>
            </div>
            <a class="navbtn" href="/autoschool/exam">უფასო ტესტი</a>
        </nav>

        <div class="hero-grid">
            <div>
                <h1>შენი გზა<br>მართვის<br><span>მოწმობამდე.</span></h1>
                <p class="lead">თანამედროვე სასწავლო სისტემა, რეალური გამოცდის სიმულაცია და AI ახსნა თეორიულ კითხვებზე.</p>
                <div class="actions">
                    <a class="btn primary" href="#">კურსის არჩევა →</a>
                    <a class="btn secondary" href="/autoschool/exam">უფასო ტესტი</a>
                </div>
            </div>

            <div class="carbox">
                <div class="progress">
                    <h3>სწავლის პროგრესი</h3>
                    <div class="circle"><div>68%</div></div>
                    <div class="row"><span>სწორი პასუხები</span><b>204</b></div>
                    <div class="row"><span>შეცდომები</span><b>96</b></div>
                    <div class="row"><span>სრული ტესტი</span><b>12</b></div>
                </div>

                <div class="car"><div class="beam"></div><div class="l1"></div><div class="l2"></div></div>
            </div>
        </div>

        <div class="four">
            <div class="fcard"><div class="ico">🎓</div><h3>ფიზიკური კურსები</h3><p>პროფესიონალი მასწავლებლები აუდიტორიაში.</p></div>
            <div class="fcard"><div class="ico">💻</div><h3>ონლაინ სწავლა</h3><p>ისწავლე სახლიდან, შენს გრაფიკზე.</p></div>
            <div class="fcard"><div class="ico">📄</div><h3>რეალური ტესტი</h3><p>გამოცდის სრული სიმულაცია.</p></div>
            <div class="fcard"><div class="ico">📊</div><h3>პროგრესი</h3><p>სტატისტიკა, შეცდომები და შედეგები.</p></div>
        </div>
    </div>
</section>

<section class="section">
    <div class="stitle">
        <small>რატომ ჩვენ?</small>
        <h2>სწავლა, რომელიც <span>შედეგს</span> იძლევა.</h2>
    </div>
    <div class="whitecards">
        <div class="wcard"><div class="ico">🎓</div><h3>ფიზიკური სწავლა</h3><p>კურსები აუდიტორიაში, მასწავლებელთან ერთად.</p></div>
        <div class="wcard"><div class="ico">💻</div><h3>ონლაინ სწავლა</h3><p>სისტემა მუშაობს ნებისმიერი მოწყობილობიდან.</p></div>
        <div class="wcard"><div class="ico">📝</div><h3>გამოცდის რეჟიმი</h3><p>30-კითხვიანი და მორგებული ტესტები.</p></div>
        <div class="wcard"><div class="ico">📈</div><h3>პროგრესი</h3><p>შეცდომები, რთული თემები და შედეგები.</p></div>
    </div>
</section>

<section class="section dark">
    <div class="steps">
        <div>
            <h2 style="font-size:42px;margin:0 0 30px">როგორ სწავლობ ჩვენთან</h2>
            <div class="line">
                <div class="step"><div class="num">01</div><h3>იწყებ თემებს</h3><p>მარტივი ახსნა და მაგალითები.</p></div>
                <div class="step"><div class="num">02</div><h3>ვარჯიშობ</h3><p>რეალური კითხვებით.</p></div>
                <div class="step"><div class="num">03</div><h3>იღებ AI ახსნას</h3><p>შეცდომა ხდება სწავლა.</p></div>
                <div class="step"><div class="num">04</div><h3>აბარებ</h3><p>მზად ხარ გამოცდისთვის.</p></div>
            </div>
        </div>
        <div class="ctabox">
            <div style="font-size:90px">📋</div>
            <h3>დაიწყე ახლავე</h3>
            <a href="/autoschool/exam">ტესტის დაწყება →</a>
        </div>
    </div>
</section>

<section class="section">
    <div class="courses">
        <div>
            <h2 style="font-size:42px;margin:0 0 16px">აირჩიე შენთვის სასურველი კურსი.</h2>
            <p style="color:#555;font-size:18px;line-height:1.6">ფიზიკური, ონლაინ ან ინდივიდუალური სწავლა.</p>
        </div>
        <div class="course-grid">
            <div class="course"><div class="thumb"></div><div class="course-body"><h3>A კატეგორია</h3><p>მოტოციკლის კურსი.</p><b>450₾</b><a>→</a></div></div>
            <div class="course"><div class="thumb"></div><div class="course-body"><h3>B კატეგორია</h3><p>მსუბუქი ავტომობილი.</p><b>250₾</b><a>→</a></div></div>
            <div class="course"><div class="thumb"></div><div class="course-body"><h3>A+B პაკეტი</h3><p>სრული მოსამზადებელი კურსი.</p><b>650₾</b><a>→</a></div></div>
        </div>
    </div>
</section>

</body>
</html>
