<!DOCTYPE html>
<html lang="ka">
<head>
<meta charset="UTF-8">
<title>AutoSchool — Driving Academy</title>
<meta name="viewport" content="width=device-width, initial-scale=1">

<style>
*{box-sizing:border-box}
:root{
    --yellow:#facc15;
    --dark:#050505;
    --glass:rgba(10,10,10,.62);
    --line:rgba(255,255,255,.14);
    --muted:#b8b8b8;
}
body{margin:0;background:#050505;color:white;font-family:system-ui,-apple-system,BlinkMacSystemFont,"Segoe UI",sans-serif;overflow-x:hidden}
a{text-decoration:none;color:inherit}

.hero{
    min-height:100vh;
    position:relative;
    overflow:hidden;
    background:
        radial-gradient(circle at 58% 55%,rgba(250,204,21,.22),transparent 18%),
        radial-gradient(circle at 70% 10%,rgba(255,255,255,.08),transparent 20%),
        linear-gradient(90deg,rgba(0,0,0,.96),rgba(0,0,0,.38),rgba(0,0,0,.88)),
        linear-gradient(140deg,#030303,#07111a 48%,#020202);
}
.hero:before{
    content:"";
    position:absolute;
    inset:0;
    background:
        linear-gradient(180deg,rgba(0,0,0,.05),rgba(0,0,0,.92)),
        repeating-linear-gradient(90deg,transparent 0 90px,rgba(255,255,255,.025) 91px 92px);
    z-index:1;
}
.road{
    position:absolute;
    left:52%;
    bottom:-350px;
    width:900px;
    height:900px;
    transform:translateX(-50%) perspective(720px) rotateX(67deg);
    background:linear-gradient(90deg,#030303,#111 47%,#1b1b1b 50%,#111 53%,#030303);
    border-left:2px solid rgba(255,255,255,.16);
    border-right:2px solid rgba(255,255,255,.16);
}
.road:after{
    content:"";
    position:absolute;
    left:50%;
    top:0;
    width:10px;
    height:100%;
    transform:translateX(-50%);
    background:repeating-linear-gradient(to bottom,var(--yellow) 0 46px,transparent 46px 92px);
    filter:drop-shadow(0 0 18px rgba(250,204,21,.7));
}

.wrap{max-width:1280px;margin:auto;padding:0 34px;position:relative;z-index:3}
.nav{height:92px;display:flex;align-items:center;justify-content:space-between}
.logo{display:flex;gap:14px;align-items:center;font-size:27px;font-weight:950}
.logo b{color:var(--yellow)}
.shield{
    width:48px;height:58px;border-radius:16px;
    border:1px solid rgba(250,204,21,.45);
    display:grid;place-items:center;color:var(--yellow);
    background:rgba(0,0,0,.55);
    box-shadow:0 18px 60px rgba(250,204,21,.12);
}
.menu{display:flex;gap:42px;color:#e5e5e5;font-weight:800}
.navbtn{background:var(--yellow);color:#111;padding:16px 28px;border-radius:999px;font-weight:950}

.content{
    min-height:calc(100vh - 92px);
    display:grid;
    grid-template-columns:.88fr 1.12fr;
    align-items:center;
    gap:40px;
    padding-bottom:120px;
}
h1{
    font-size:84px;
    line-height:.9;
    letter-spacing:-4px;
    margin:0 0 28px;
    max-width:680px;
}
h1 span{color:var(--yellow)}
.lead{font-size:20px;line-height:1.75;color:#d4d4d8;max-width:590px;margin:0 0 34px}
.actions{display:flex;gap:16px;flex-wrap:wrap}
.btn{display:inline-flex;align-items:center;gap:14px;padding:18px 30px;border-radius:999px;font-weight:950;font-size:17px}
.primary{background:var(--yellow);color:#111;box-shadow:0 18px 60px rgba(250,204,21,.24)}
.secondary{background:rgba(255,255,255,.07);border:1px solid var(--line);backdrop-filter:blur(16px)}

.scene{min-height:570px;position:relative}
.car{
    position:absolute;
    left:5%;
    right:0;
    bottom:125px;
    height:210px;
    border-radius:150px 150px 38px 38px;
    background:linear-gradient(180deg,#1a1a1a,#050505 62%,#010101);
    box-shadow:0 70px 150px rgba(0,0,0,.85), inset 0 2px 0 rgba(255,255,255,.08);
}
.car:before{
    content:"";
    position:absolute;
    left:18%;
    right:18%;
    top:-82px;
    height:132px;
    border-radius:120px 120px 18px 18px;
    background:linear-gradient(180deg,#222,#070707);
    border:1px solid rgba(255,255,255,.08);
}
.car:after{
    content:"AUTOSCHOOL";
    position:absolute;
    left:50%;
    bottom:22px;
    transform:translateX(-50%);
    background:#d6c06d;
    color:#111;
    padding:8px 24px;
    border-radius:7px;
    font-weight:950;
    letter-spacing:1px;
}
.light-left,.light-right{
    position:absolute;
    top:78px;
    width:165px;
    height:44px;
    background:linear-gradient(90deg,#fff7cc,#facc15);
    box-shadow:0 0 50px rgba(250,204,21,.9),0 0 150px rgba(250,204,21,.45);
    z-index:3;
}
.light-left{left:58px;border-radius:34px 8px 28px 12px;transform:skewX(-14deg)}
.light-right{right:58px;border-radius:8px 34px 12px 28px;transform:skewX(14deg)}
.beam{
    position:absolute;
    left:-8%;
    right:-8%;
    bottom:78px;
    height:260px;
    background:radial-gradient(ellipse at center,rgba(250,204,21,.28),transparent 65%);
    filter:blur(18px);
}
.progress{
    position:absolute;
    right:0;
    top:108px;
    width:365px;
    border-radius:34px;
    background:var(--glass);
    border:1px solid var(--line);
    backdrop-filter:blur(22px);
    padding:28px;
    box-shadow:0 35px 110px rgba(0,0,0,.55);
}
.progress h3{margin:0 0 22px;font-size:25px}
.circle{width:138px;height:138px;border-radius:50%;background:conic-gradient(var(--yellow) 0 68%,#2b2b2b 68% 100%);display:grid;place-items:center;margin-bottom:20px}
.circle div{width:98px;height:98px;border-radius:50%;background:#070707;display:grid;place-items:center;font-size:32px;font-weight:950}
.row{display:flex;justify-content:space-between;margin:13px 0;color:#e5e5e5;font-weight:850}
.row span{color:var(--muted)}

.cards{
    position:absolute;
    left:34px;
    right:34px;
    bottom:34px;
    display:grid;
    grid-template-columns:repeat(4,1fr);
    gap:14px;
    z-index:4;
}
.card{
    min-height:132px;
    border-radius:26px;
    padding:22px;
    background:rgba(10,10,10,.62);
    border:1px solid var(--line);
    backdrop-filter:blur(18px);
    box-shadow:0 25px 80px rgba(0,0,0,.35);
}
.icon{width:48px;height:48px;border-radius:17px;background:rgba(250,204,21,.12);color:var(--yellow);display:grid;place-items:center;font-size:23px;margin-bottom:14px}
.card h3{margin:0 0 6px;font-size:20px}
.card p{margin:0;color:var(--muted);font-weight:750;line-height:1.45}

@media(max-width:980px){
    .menu,.navbtn{display:none}
    .content{grid-template-columns:1fr;padding-bottom:40px}
    h1{font-size:48px}
    .scene{min-height:520px}
    .progress{position:relative;width:auto;top:auto;right:auto;margin-top:18px}
    .cards{position:relative;left:auto;right:auto;bottom:auto;grid-template-columns:1fr;margin-top:20px}
}
</style>
</head>
<body>

<section class="hero">
    <div class="road"></div>

    <div class="wrap">
        <nav class="nav">
            <a class="logo" href="/autoschool">
                <span class="shield">A</span>
                <span>Auto<b>School</b></span>
            </a>
            <div class="menu">
                <a href="#">მთავარი</a>
                <a href="#">კურსები</a>
                <a href="/autoschool/exam">ტესტები</a>
                <a href="#">ონლაინ სწავლა</a>
                <a href="#">კონტაქტი</a>
            </div>
            <a class="navbtn" href="/autoschool/exam">უფასო ტესტი →</a>
        </nav>

        <div class="content">
            <div>
                <h1>შენი გზა<br><span>მართვის მოწმობამდე</span></h1>
                <p class="lead">
                    ფიზიკური და ონლაინ თეორიის კურსები, რეალური გამოცდის სიმულაცია
                    და მარტივი ახსნა თითოეულ შეცდომაზე.
                </p>
                <div class="actions">
                    <a class="btn primary" href="#">კურსის არჩევა →</a>
                    <a class="btn secondary" href="/autoschool/exam">უფასო ტესტი</a>
                </div>
            </div>

            <div class="scene">
                <div class="progress">
                    <h3>სწავლის პროგრესი</h3>
                    <div class="circle"><div>68%</div></div>
                    <div class="row"><span>სწორი პასუხები</span><b>18</b></div>
                    <div class="row"><span>მიღებული ახსნა</span><b>4</b></div>
                    <div class="row"><span>შეცდომა</span><b>2</b></div>
                </div>

                <div class="car">
                    <div class="beam"></div>
                    <div class="light-left"></div>
                    <div class="light-right"></div>
                </div>
            </div>
        </div>

        <div class="cards">
            <div class="card"><div class="icon">🎓</div><h3>ფიზიკური კურსი</h3><p>თეორიის სწავლა აუდიტორიაში.</p></div>
            <div class="card"><div class="icon">💻</div><h3>ონლაინ სწავლა</h3><p>სწავლა ნებისმიერი ადგილიდან.</p></div>
            <div class="card"><div class="icon">📝</div><h3>საგამოცდო ტესტი</h3><p>რეალური გამოცდის სიმულაცია.</p></div>
            <div class="card"><div class="icon">📊</div><h3>პროგრესი</h3><p>შეცდომები, სტატისტიკა და შედეგები.</p></div>
        </div>
    </div>
</section>

</body>
</html>
