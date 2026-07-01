<!DOCTYPE html>
<html lang="ka">
<head>
    <meta charset="UTF-8">
    <title>AutoSchool — Premium Exam Platform</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <style>
        *{box-sizing:border-box}
        :root{
            --yellow:#facc15;
            --yellow2:#eab308;
            --red:#ef4444;
            --green:#22c55e;
            --white:#fff;
            --muted:#a1a1aa;
            --line:rgba(255,255,255,.14);
        }
        body{
            margin:0;
            font-family:system-ui,-apple-system,BlinkMacSystemFont,"Segoe UI",sans-serif;
            background:#020202;
            color:white;
            overflow-x:hidden;
        }
        a{text-decoration:none;color:inherit}

        .hero{
            min-height:100vh;
            position:relative;
            overflow:hidden;
            background:
                radial-gradient(circle at 55% 58%, rgba(250,204,21,.20), transparent 22%),
                radial-gradient(circle at 80% 20%, rgba(250,204,21,.08), transparent 22%),
                linear-gradient(180deg, rgba(0,0,0,.25), rgba(0,0,0,.85)),
                linear-gradient(120deg,#050505,#071019 42%,#020202);
        }
        .hero:before{
            content:"";
            position:absolute;
            inset:0;
            background:
                linear-gradient(90deg,rgba(0,0,0,.72),rgba(0,0,0,.10) 48%,rgba(0,0,0,.78)),
                radial-gradient(circle at 50% 60%,transparent 0 18%,rgba(0,0,0,.66) 62%);
            z-index:1;
        }
        .forest{
            position:absolute;
            inset:0;
            opacity:.55;
            background:
                linear-gradient(135deg, transparent 0 42%, rgba(255,255,255,.03) 42% 43%, transparent 43%),
                repeating-linear-gradient(88deg, transparent 0 55px, rgba(255,255,255,.035) 56px 58px, transparent 60px 140px);
            filter:blur(.2px);
        }
        .road-bg{
            position:absolute;
            left:50%;
            bottom:-330px;
            width:820px;
            height:880px;
            transform:translateX(-50%) perspective(760px) rotateX(68deg);
            background:linear-gradient(90deg,#030303,#111 46%,#1a1a1a 50%,#111 54%,#030303);
            border-left:3px solid rgba(255,255,255,.18);
            border-right:3px solid rgba(255,255,255,.18);
            z-index:0;
        }
        .road-bg:after{
            content:"";
            position:absolute;
            left:50%;
            top:0;
            width:9px;
            height:100%;
            transform:translateX(-50%);
            background:repeating-linear-gradient(to bottom,var(--yellow) 0 44px,transparent 44px 88px);
            filter:drop-shadow(0 0 16px rgba(250,204,21,.65));
        }

        .container{max-width:1280px;margin:auto;padding:0 32px;position:relative;z-index:3}
        .nav{
            height:92px;
            display:flex;
            align-items:center;
            justify-content:space-between;
        }
        .brand{display:flex;align-items:center;gap:13px;font-size:26px;font-weight:950}
        .brand b{color:var(--yellow)}
        .traffic{
            width:48px;height:66px;border-radius:18px;
            background:rgba(0,0,0,.55);
            border:1px solid var(--line);
            display:grid;place-items:center;
            box-shadow:0 20px 70px rgba(0,0,0,.45);
        }
        .traffic div{display:grid;gap:6px}
        .traffic span{width:13px;height:13px;border-radius:50%;display:block}
        .r{background:var(--red);box-shadow:0 0 16px rgba(239,68,68,.8)}
        .y{background:var(--yellow);box-shadow:0 0 16px rgba(250,204,21,.8)}
        .g{background:var(--green);box-shadow:0 0 16px rgba(34,197,94,.8)}
        .menu{display:flex;gap:46px;color:#f4f4f5;font-weight:850;font-size:16px}
        .navbtn{
            background:var(--yellow);
            color:#111;
            padding:18px 30px;
            border-radius:22px;
            font-weight:950;
            box-shadow:0 18px 50px rgba(250,204,21,.22);
        }

        .content{
            min-height:calc(100vh - 92px);
            display:grid;
            grid-template-columns:.88fr 1.12fr;
            gap:28px;
            align-items:center;
            padding:34px 0 54px;
        }
        .copy{position:relative;z-index:6}
        h1{
            margin:0 0 22px;
            font-size:70px;
            line-height:.98;
            letter-spacing:-2.8px;
            max-width:620px;
        }
        h1 span{color:var(--yellow)}
        .lead{
            color:#d4d4d8;
            font-size:19px;
            line-height:1.75;
            max-width:560px;
            margin:0 0 34px;
        }
        .actions{display:flex;gap:16px;flex-wrap:wrap}
        .btn{
            display:inline-flex;
            align-items:center;
            gap:14px;
            padding:18px 28px;
            border-radius:20px;
            font-weight:950;
            font-size:17px;
        }
        .primary{background:var(--yellow);color:#111;box-shadow:0 20px 55px rgba(250,204,21,.25)}
        .secondary{border:1px solid var(--line);background:rgba(255,255,255,.05);backdrop-filter:blur(16px)}
        .arrow{font-size:28px;line-height:0}

        .car-scene{
            position:relative;
            min-height:590px;
        }
        .car{
            position:absolute;
            left:6%;
            right:2%;
            bottom:72px;
            height:210px;
            border-radius:140px 140px 34px 34px;
            background:
                linear-gradient(180deg,#151515,#050505 58%,#010101);
            box-shadow:
                0 60px 120px rgba(0,0,0,.8),
                inset 0 2px 0 rgba(255,255,255,.08);
            z-index:4;
        }
        .car:before{
            content:"";
            position:absolute;
            left:16%;
            right:16%;
            top:-82px;
            height:130px;
            border-radius:120px 120px 18px 18px;
            background:linear-gradient(180deg,#202020,#080808);
            border:1px solid rgba(255,255,255,.08);
        }
        .car:after{
            content:"AUTOSCHOOL";
            position:absolute;
            left:50%;
            bottom:20px;
            transform:translateX(-50%);
            background:#c9b36c;
            color:#111;
            padding:8px 22px;
            border-radius:7px;
            font-weight:900;
            letter-spacing:1px;
        }
        .windshield{
            position:absolute;
            left:24%;
            right:24%;
            top:-58px;
            height:88px;
            border-radius:90px 90px 10px 10px;
            background:linear-gradient(180deg,rgba(148,163,184,.28),rgba(15,23,42,.2));
            z-index:5;
        }
        .light-left,.light-right{
            position:absolute;
            top:75px;
            width:155px;
            height:42px;
            background:linear-gradient(90deg,#fff7cc,#facc15);
            filter:blur(.2px);
            box-shadow:0 0 45px rgba(250,204,21,.8),0 0 120px rgba(250,204,21,.45);
            z-index:8;
        }
        .light-left{left:54px;border-radius:30px 8px 28px 12px;transform:skewX(-13deg)}
        .light-right{right:54px;border-radius:8px 30px 12px 28px;transform:skewX(13deg)}
        .beam-left,.beam-right{
            position:absolute;
            bottom:112px;
            width:420px;
            height:210px;
            background:radial-gradient(ellipse at center, rgba(250,204,21,.42), transparent 68%);
            filter:blur(18px);
            z-index:2;
            pointer-events:none;
        }
        .beam-left{left:-70px;transform:rotate(8deg)}
        .beam-right{right:-70px;transform:rotate(-8deg)}
        .reflection{
            position:absolute;
            left:24%;
            right:12%;
            bottom:0;
            height:110px;
            background:radial-gradient(ellipse at center, rgba(250,204,21,.34), transparent 66%);
            filter:blur(12px);
            z-index:1;
        }
        .sign{
            position:absolute;
            right:20px;
            top:100px;
            width:92px;
            height:92px;
            transform:rotate(45deg);
            border-radius:14px;
            background:var(--yellow);
            box-shadow:0 20px 70px rgba(0,0,0,.5);
            z-index:2;
        }
        .sign:after{
            content:"⌁";
            position:absolute;
            inset:0;
            transform:rotate(-45deg);
            display:grid;
            place-items:center;
            color:#111;
            font-size:48px;
            font-weight:950;
        }

        .progress-card{
            position:absolute;
            right:0;
            top:175px;
            width:330px;
            border-radius:30px;
            background:rgba(10,10,10,.68);
            border:1px solid var(--line);
            backdrop-filter:blur(20px);
            padding:24px;
            z-index:7;
            box-shadow:0 30px 90px rgba(0,0,0,.45);
        }
        .progress-card h3{margin:0 0 20px;font-size:22px}
        .circle{
            width:130px;height:130px;border-radius:50%;
            background:conic-gradient(var(--yellow) 0 68%,#27272a 68% 100%);
            display:grid;place-items:center;
            margin-bottom:16px;
        }
        .circle div{
            width:94px;height:94px;border-radius:50%;
            background:#080808;
            display:grid;place-items:center;
            font-size:31px;
            font-weight:950;
        }
        .progress-row{display:flex;justify-content:space-between;color:#d4d4d8;font-weight:850;margin:11px 0}
        .progress-row span:first-child{color:var(--muted)}
        .panel-btn{margin-top:16px;border:1px solid rgba(250,204,21,.5);border-radius:16px;padding:14px;text-align:center;color:var(--yellow);font-weight:950}

        .stats{
            position:absolute;
            left:0;
            right:0;
            bottom:34px;
            display:grid;
            grid-template-columns:repeat(5,1fr);
            gap:0;
            border-radius:28px;
            background:rgba(10,10,10,.66);
            border:1px solid var(--line);
            backdrop-filter:blur(18px);
            z-index:8;
            overflow:hidden;
        }
        .stat{
            padding:21px 20px;
            display:flex;
            align-items:center;
            gap:14px;
            border-right:1px solid rgba(255,255,255,.10);
        }
        .stat:last-child{border-right:0}
        .ico{
            width:52px;height:52px;border-radius:20px;
            background:rgba(250,204,21,.12);
            color:var(--yellow);
            display:grid;place-items:center;
            font-size:24px;
            box-shadow:0 0 45px rgba(250,204,21,.08);
        }
        .stat b{display:block;font-size:24px}
        .stat span{display:block;color:var(--muted);font-weight:800;margin-top:3px}

        @media(max-width:980px){
            .menu{display:none}
            .content{grid-template-columns:1fr;padding-top:20px}
            h1{font-size:44px}
            .car-scene{min-height:560px}
            .progress-card{position:relative;top:auto;right:auto;width:auto;margin-top:18px}
            .stats{position:relative;grid-template-columns:1fr;bottom:auto;margin-top:18px}
            .stat{border-right:0;border-bottom:1px solid rgba(255,255,255,.10)}
            .navbtn{display:none}
        }
    </style>
</head>
<body>

<section class="hero">
    <div class="forest"></div>
    <div class="road-bg"></div>

    <div class="container">
        <nav class="nav">
            <a class="brand" href="/autoschool">
                <span class="traffic"><div><span class="r"></span><span class="y"></span><span class="g"></span></div></span>
                <span>Auto<b>School</b></span>
            </a>

            <div class="menu">
                <a href="/autoschool/exam">ტესტები</a>
                <a href="#">კატეგორიები</a>
                <a href="#">შედეგები</a>
                <a href="#">პროგრესი</a>
                <a href="#">კონტაქტი</a>
            </div>

            <a class="navbtn" href="/autoschool/exam">ტესტის დაწყება <span class="arrow">→</span></a>
        </nav>

        <div class="content">
            <div class="copy">
                <h1>შეისწავლე.<br>ივარჯიშე.<br><span>ჩააბარე.</span></h1>

                <p class="lead">
                    მართვის მოწმობის ტესტები რეალური გამოცდის ფორმატით.
                    შეცდომა გაჩერებს, ახსნა გასწავლის, სწორი პასუხი კი გახსნის გზას.
                </p>

                <div class="actions">
                    <a class="btn primary" href="/autoschool/exam">ტესტის დაწყება <span class="arrow">→</span></a>
                    <a class="btn secondary" href="#">როგორ მუშაობს</a>
                </div>
            </div>

            <div class="car-scene">
                <div class="sign"></div>

                <div class="progress-card">
                    <h3>დღის პროგრესი</h3>
                    <div class="circle"><div>68%</div></div>
                    <div class="progress-row"><span>სწორი პასუხები</span><b>18</b></div>
                    <div class="progress-row"><span>მიღებული ახსნა</span><b>4</b></div>
                    <div class="progress-row"><span>შეცდომა</span><b>2</b></div>
                    <div class="panel-btn">პროგრესის ნახვა</div>
                </div>

                <div class="car">
                    <div class="windshield"></div>
                    <div class="beam-left"></div>
                    <div class="beam-right"></div>
                    <div class="light-left"></div>
                    <div class="light-right"></div>
                </div>

                <div class="reflection"></div>
            </div>
        </div>

        <div class="stats">
            <div class="stat"><div class="ico">📖</div><div><b>5000+</b><span>კითხვა ბაზაში</span></div></div>
            <div class="stat"><div class="ico">🎓</div><div><b>12</b><span>კატეგორია</span></div></div>
            <div class="stat"><div class="ico">📄</div><div><b>PDF</b><span>რეალური ტესტები</span></div></div>
            <div class="stat"><div class="ico">⚙</div><div><b>AI</b><span>მარტივი ახსნა</span></div></div>
            <div class="stat"><div class="ico">🛡</div><div><b>Exam</b><span>პროფესიონალური რეჟიმი</span></div></div>
        </div>
    </div>
</section>

</body>
</html>
