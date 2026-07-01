<!DOCTYPE html>
<html lang="ka">
<head>
<meta charset="UTF-8">
<title>AutoSchool</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<style>
*{box-sizing:border-box}
body{margin:0;background:#030303;color:white;font-family:system-ui,-apple-system,BlinkMacSystemFont,"Segoe UI",sans-serif}
a{text-decoration:none;color:inherit}
.hero{
    min-height:100vh;
    position:relative;
    overflow:hidden;
    background:
        linear-gradient(90deg,rgba(0,0,0,.92),rgba(0,0,0,.35),rgba(0,0,0,.82)),
        linear-gradient(180deg,rgba(0,0,0,.15),rgba(0,0,0,.92)),
        url('/autoschool/images/hero-car.jpg') center/cover no-repeat;
}
.hero:after{
    content:"";
    position:absolute;
    inset:0;
    background:radial-gradient(circle at 55% 65%,rgba(250,204,21,.18),transparent 28%);
}
.wrap{max-width:1280px;margin:auto;padding:0 34px;position:relative;z-index:2}
.nav{height:92px;display:flex;align-items:center;justify-content:space-between}
.logo{display:flex;gap:14px;align-items:center;font-size:27px;font-weight:950}
.logo b{color:#facc15}
.light{width:46px;height:64px;border-radius:18px;background:rgba(0,0,0,.65);border:1px solid rgba(255,255,255,.18);display:grid;place-items:center}
.light div{display:grid;gap:6px}
.light span{width:13px;height:13px;border-radius:50%;display:block}
.r{background:#ef4444;box-shadow:0 0 16px #ef4444}.y{background:#facc15;box-shadow:0 0 16px #facc15}.g{background:#22c55e;box-shadow:0 0 16px #22c55e}
.menu{display:flex;gap:42px;color:#e5e7eb;font-weight:800}
.navbtn,.btn-main{background:#facc15;color:#111;border-radius:22px;font-weight:950;box-shadow:0 20px 55px rgba(250,204,21,.25)}
.navbtn{padding:17px 28px}
.content{min-height:calc(100vh - 92px);display:grid;grid-template-columns:.9fr 1.1fr;align-items:center;gap:40px;padding-bottom:70px}
h1{font-size:82px;line-height:.92;letter-spacing:-3.8px;margin:0 0 26px}
h1 span{color:#facc15}
.lead{font-size:20px;line-height:1.75;color:#d4d4d8;max-width:570px;margin:0 0 34px}
.actions{display:flex;gap:16px;flex-wrap:wrap}
.btn-main,.btn-soft{display:inline-flex;padding:18px 28px;font-size:17px}
.btn-soft{border:1px solid rgba(255,255,255,.22);border-radius:22px;background:rgba(255,255,255,.06);backdrop-filter:blur(16px);font-weight:900}
.glass{
    justify-self:end;
    width:360px;
    border-radius:34px;
    background:rgba(10,10,10,.68);
    border:1px solid rgba(255,255,255,.16);
    backdrop-filter:blur(22px);
    padding:28px;
    box-shadow:0 35px 100px rgba(0,0,0,.55);
}
.glass h3{font-size:24px;margin:0 0 22px}
.circle{width:138px;height:138px;border-radius:50%;background:conic-gradient(#facc15 0 68%,#27272a 68% 100%);display:grid;place-items:center;margin-bottom:20px}
.circle div{width:98px;height:98px;border-radius:50%;background:#070707;display:grid;place-items:center;font-size:32px;font-weight:950}
.row{display:flex;justify-content:space-between;margin:13px 0;color:#d4d4d8;font-weight:850}
.row span{color:#a1a1aa}
.stats{position:absolute;left:34px;right:34px;bottom:34px;display:grid;grid-template-columns:repeat(4,1fr);border-radius:28px;background:rgba(10,10,10,.64);border:1px solid rgba(255,255,255,.14);backdrop-filter:blur(18px);overflow:hidden}
.stat{padding:22px;display:flex;gap:14px;align-items:center;border-right:1px solid rgba(255,255,255,.12)}
.stat:last-child{border-right:0}
.ico{width:52px;height:52px;border-radius:19px;background:rgba(250,204,21,.12);color:#facc15;display:grid;place-items:center;font-size:24px}
.stat b{font-size:24px}.stat span{display:block;color:#a1a1aa;font-weight:800;margin-top:3px}
@media(max-width:950px){
    .menu,.navbtn{display:none}
    .content{grid-template-columns:1fr;padding-top:30px}
    h1{font-size:48px}
    .glass{justify-self:stretch;width:auto}
    .stats{position:relative;left:auto;right:auto;bottom:auto;grid-template-columns:1fr;margin-top:20px}
    .stat{border-right:0;border-bottom:1px solid rgba(255,255,255,.12)}
}
</style>
</head>
<body>

<section class="hero">
    <div class="wrap">
        <nav class="nav">
            <a class="logo" href="/autoschool">
                <span class="light"><div><span class="r"></span><span class="y"></span><span class="g"></span></div></span>
                <span>Auto<b>School</b></span>
            </a>
            <div class="menu">
                <a href="/autoschool/exam">ტესტები</a>
                <a href="#">კატეგორიები</a>
                <a href="#">შედეგები</a>
                <a href="#">კონტაქტი</a>
            </div>
            <a class="navbtn" href="/autoschool/exam">ტესტის დაწყება →</a>
        </nav>

        <div class="content">
            <div>
                <h1>ისწავლე.<br>ივარჯიშე.<br><span>ჩააბარე.</span></h1>
                <p class="lead">მართვის მოწმობის ტესტები რეალური გამოცდის სტილში. შეცდომაზე იღებ მარტივ ახსნას და აგრძელებ მწვანე გზით.</p>
                <div class="actions">
                    <a class="btn-main" href="/autoschool/exam">ტესტის დაწყება →</a>
                    <a class="btn-soft" href="#">როგორ მუშაობს</a>
                </div>
            </div>

            <div class="glass">
                <h3>დღის პროგრესი</h3>
                <div class="circle"><div>68%</div></div>
                <div class="row"><span>სწორი პასუხი</span><b>18</b></div>
                <div class="row"><span>მიღებული ახსნა</span><b>4</b></div>
                <div class="row"><span>შეცდომა</span><b>2</b></div>
            </div>
        </div>

        <div class="stats">
            <div class="stat"><div class="ico">📖</div><div><b>5000+</b><span>კითხვა</span></div></div>
            <div class="stat"><div class="ico">🎓</div><div><b>12</b><span>კატეგორია</span></div></div>
            <div class="stat"><div class="ico">📄</div><div><b>PDF</b><span>იმპორტი</span></div></div>
            <div class="stat"><div class="ico">AI</div><div><b>AI</b><span>ახსნა</span></div></div>
        </div>
    </div>
</section>

</body>
</html>
