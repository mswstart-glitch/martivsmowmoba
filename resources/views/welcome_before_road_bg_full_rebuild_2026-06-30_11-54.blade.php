<!DOCTYPE html>
<html lang="ka">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Premium Driving Academy</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+Georgian:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">

    <style>
        :root{
            --bg:#F6F8FB;
            --white:#FFFFFF;
            --navy:#031022;
            --text:#1C3146;
            --muted:#64748B;
            --line:#E8EDF2;
            --brand:#5FD389;
            --brand-dark:#43B872;
            --soft:#EEF8F2;
            --radius:22px;
        }

        *{box-sizing:border-box}

        html{
            scroll-behavior:auto;
        }

        body{
            margin:0;
            font-family:"Noto Sans Georgian", Arial, sans-serif;
            background:var(--bg);
            color:var(--text);
            overflow-x:hidden;
        }

        a{text-decoration:none;color:inherit}

        .page{
            min-height:100vh;
            background:var(--bg);
        }

        .container{
            width:min(1180px, calc(100% - 40px));
            margin:0 auto;
        }

        .nav{
            position:fixed;
            top:18px;
            left:50%;
            transform:translateX(-50%);
            z-index:50;
            width:min(1180px, calc(100% - 40px));
            display:flex;
            align-items:center;
            justify-content:space-between;
            padding:12px 14px;
            background:rgba(255,255,255,.86);
            border:1px solid rgba(232,237,242,.9);
            border-radius:18px;
            backdrop-filter:blur(18px);
            box-shadow:0 14px 36px rgba(15,23,42,.08);
        }

        .brand{
            display:flex;
            align-items:center;
            gap:10px;
            font-weight:900;
            color:var(--navy);
            letter-spacing:-.04em;
        }

        .brand-mark{
            width:38px;
            height:38px;
            border-radius:12px;
            display:grid;
            place-items:center;
            background:var(--navy);
            color:#fff;
            position:relative;
            overflow:hidden;
        }

        .brand-mark:after{
            content:"";
            width:14px;
            height:14px;
            border-radius:50%;
            background:var(--brand);
            position:absolute;
            right:6px;
            bottom:6px;
        }

        .nav-links{
            display:flex;
            gap:22px;
            align-items:center;
            color:#53657A;
            font-size:14px;
            font-weight:700;
        }

        .nav-links a:hover{
            color:var(--navy);
        }

        .nav-cta{
            padding:12px 18px;
            border-radius:14px;
            background:var(--navy);
            color:#fff;
            font-size:14px;
            font-weight:800;
            transition:.25s ease;
        }

        .nav-cta:hover{
            transform:translateY(-2px);
            background:#082247;
        }

        .hero{
            padding:150px 0 80px;
        }

        .hero-grid{
            display:grid;
            grid-template-columns:1.05fr .95fr;
            gap:44px;
            align-items:center;
        }

        .eyebrow{
            display:inline-flex;
            align-items:center;
            gap:9px;
            padding:8px 12px;
            border-radius:999px;
            background:var(--soft);
            color:#24784B;
            border:1px solid rgba(95,211,137,.28);
            font-size:13px;
            font-weight:900;
            margin-bottom:22px;
        }

        .eyebrow i{
            width:8px;
            height:8px;
            border-radius:50%;
            background:var(--brand);
            box-shadow:0 0 0 5px rgba(95,211,137,.18);
        }

        .hero h1{
            margin:0;
            max-width:720px;
            font-size:clamp(44px,6vw,82px);
            line-height:.98;
            letter-spacing:-.07em;
            color:var(--navy);
            font-weight:900;
        }

        .hero h1 span{
            color:#2C3E50;
        }

        .hero p{
            margin:24px 0 0;
            max-width:610px;
            color:var(--muted);
            font-size:18px;
            line-height:1.8;
            font-weight:500;
        }

        .hero-actions{
            display:flex;
            gap:12px;
            flex-wrap:wrap;
            margin-top:34px;
        }

        .btn{
            display:inline-flex;
            align-items:center;
            justify-content:center;
            min-height:52px;
            padding:0 22px;
            border-radius:15px;
            font-weight:900;
            transition:.25s ease;
            border:1px solid transparent;
        }

        .btn-primary{
            background:var(--brand);
            color:var(--navy);
            box-shadow:0 14px 30px rgba(95,211,137,.28);
        }

        .btn-primary:hover{
            transform:translateY(-3px);
            background:var(--brand-dark);
        }

        .btn-secondary{
            background:#fff;
            color:var(--navy);
            border-color:var(--line);
        }

        .btn-secondary:hover{
            transform:translateY(-3px);
            border-color:#CBD5E1;
        }

        .hero-stats{
            display:grid;
            grid-template-columns:repeat(3,1fr);
            gap:12px;
            margin-top:38px;
            max-width:650px;
        }

        .stat{
            background:#fff;
            border:1px solid var(--line);
            border-radius:18px;
            padding:18px;
        }

        .stat strong{
            display:block;
            font-size:28px;
            letter-spacing:-.05em;
            color:var(--navy);
        }

        .stat span{
            display:block;
            margin-top:5px;
            font-size:13px;
            color:var(--muted);
            line-height:1.45;
            font-weight:700;
        }

        .hero-panel{
            position:relative;
            min-height:560px;
            border-radius:34px;
            background:#fff;
            border:1px solid var(--line);
            box-shadow:0 24px 70px rgba(15,23,42,.10);
            overflow:hidden;
            padding:28px;
        }

        .road-card{
            height:100%;
            min-height:500px;
            border-radius:26px;
            background:#031022;
            position:relative;
            overflow:hidden;
        }

        .road{
            position:absolute;
            left:50%;
            bottom:-40px;
            transform:translateX(-50%);
            width:70%;
            height:110%;
            background:#111827;
            clip-path:polygon(40% 0,60% 0,92% 100%,8% 100%);
        }

        .road:before{
            content:"";
            position:absolute;
            left:50%;
            top:5%;
            width:6px;
            height:90%;
            transform:translateX(-50%);
            background:repeating-linear-gradient(to bottom,#fff 0 34px,transparent 34px 68px);
            opacity:.8;
        }

        .car{
            position:absolute;
            left:50%;
            bottom:94px;
            transform:translateX(-50%);
            width:150px;
            height:82px;
            border-radius:32px 32px 20px 20px;
            background:#fff;
            box-shadow:0 26px 55px rgba(0,0,0,.35);
        }

        .car:before{
            content:"";
            position:absolute;
            left:28px;
            right:28px;
            top:-30px;
            height:54px;
            border-radius:28px 28px 8px 8px;
            background:#E8EDF2;
        }

        .car:after{
            content:"";
            position:absolute;
            left:18px;
            right:18px;
            bottom:-12px;
            height:16px;
            border-radius:999px;
            background:rgba(95,211,137,.75);
            filter:blur(12px);
        }

        .exam-mini{
            position:absolute;
            top:24px;
            left:24px;
            right:24px;
            background:#fff;
            border-radius:22px;
            padding:18px;
            box-shadow:0 18px 40px rgba(0,0,0,.20);
        }

        .exam-mini-top{
            display:flex;
            justify-content:space-between;
            align-items:center;
            gap:12px;
            margin-bottom:14px;
        }

        .exam-mini-top b{
            color:var(--navy);
            font-size:14px;
        }

        .exam-mini-top span{
            padding:7px 10px;
            border-radius:999px;
            background:var(--soft);
            color:#24784B;
            font-size:12px;
            font-weight:900;
        }

        .mini-question{
            color:#334155;
            font-size:14px;
            line-height:1.5;
            font-weight:700;
        }

        .answer-row{
            display:grid;
            gap:8px;
            margin-top:14px;
        }

        .answer-row div{
            padding:10px 12px;
            border-radius:12px;
            background:#F6F8FB;
            color:#475569;
            font-size:12px;
            font-weight:800;
        }

        .answer-row div.active{
            background:var(--brand);
            color:var(--navy);
        }

        .section{
            padding:84px 0;
        }

        .section-head{
            max-width:760px;
            margin:0 auto 36px;
            text-align:center;
        }

        .section-head h2{
            margin:0;
            color:var(--navy);
            font-size:clamp(34px,4.5vw,58px);
            line-height:1.03;
            letter-spacing:-.06em;
            font-weight:900;
        }

        .section-head p{
            margin:16px auto 0;
            color:var(--muted);
            font-size:17px;
            line-height:1.75;
            max-width:650px;
            font-weight:500;
        }

        .cards-grid{
            display:grid;
            grid-template-columns:repeat(4,1fr);
            gap:16px;
        }

        .feature-card,
        .package-card,
        .testimonial-card{
            background:#fff;
            border:1px solid var(--line);
            border-radius:var(--radius);
            padding:24px;
            box-shadow:0 14px 34px rgba(15,23,42,.055);
            transition:.28s ease;
        }

        .feature-card:hover,
        .package-card:hover,
        .testimonial-card:hover{
            transform:translateY(-6px);
            box-shadow:0 20px 46px rgba(15,23,42,.09);
        }

        .icon{
            width:46px;
            height:46px;
            border-radius:15px;
            display:grid;
            place-items:center;
            background:var(--soft);
            color:#24784B;
            font-weight:900;
            margin-bottom:18px;
        }

        .feature-card h3,
        .package-card h3{
            margin:0;
            color:var(--navy);
            font-size:18px;
            letter-spacing:-.03em;
        }

        .feature-card p,
        .package-card p,
        .testimonial-card p{
            margin:12px 0 0;
            color:var(--muted);
            line-height:1.65;
            font-size:14px;
            font-weight:500;
        }

        .packages-grid{
            display:grid;
            grid-template-columns:repeat(3,1fr);
            gap:18px;
        }

        .package-card{
            padding:28px;
            min-height:330px;
            display:flex;
            flex-direction:column;
        }

        .price{
            margin-top:20px;
            color:var(--navy);
            font-size:34px;
            font-weight:900;
            letter-spacing:-.06em;
        }

        .package-card ul{
            list-style:none;
            padding:0;
            margin:20px 0 0;
            display:grid;
            gap:10px;
            color:#475569;
            font-size:14px;
            font-weight:700;
        }

        .package-card li:before{
            content:"✓";
            color:#24784B;
            font-weight:900;
            margin-right:8px;
        }

        .package-card .btn{
            margin-top:auto;
            width:100%;
        }

        .exam-section{
            padding:84px 0;
        }

        .exam-wrap{
            display:grid;
            grid-template-columns:.9fr 1.1fr;
            gap:24px;
            align-items:center;
            background:#fff;
            border:1px solid var(--line);
            border-radius:34px;
            padding:30px;
            box-shadow:0 24px 70px rgba(15,23,42,.08);
        }

        .exam-copy h2{
            margin:0;
            color:var(--navy);
            font-size:clamp(34px,4vw,56px);
            line-height:1.04;
            letter-spacing:-.06em;
        }

        .exam-copy p{
            margin:18px 0 0;
            color:var(--muted);
            line-height:1.75;
            font-size:16px;
            font-weight:500;
        }

        .mockup{
            background:#F6F8FB;
            border:1px solid var(--line);
            border-radius:26px;
            padding:18px;
        }

        .mock-question{
            background:#fff;
            border:1px solid var(--line);
            border-radius:20px;
            padding:18px;
        }

        .mock-question h3{
            margin:0;
            color:var(--navy);
            font-size:18px;
        }

        .mock-question p{
            margin:10px 0 0;
            color:var(--muted);
            line-height:1.6;
            font-size:14px;
        }

        .mock-options{
            display:grid;
            gap:10px;
            margin-top:16px;
        }

        .mock-options div{
            padding:14px;
            border-radius:14px;
            background:#F6F8FB;
            border:1px solid #EEF2F6;
            color:#475569;
            font-weight:800;
            font-size:14px;
        }

        .mock-options .correct{
            background:var(--soft);
            border-color:rgba(95,211,137,.35);
            color:#24784B;
        }

        .ai-box{
            margin-top:14px;
            padding:16px;
            border-radius:18px;
            background:var(--navy);
            color:#fff;
        }

        .ai-box b{
            color:var(--brand);
        }

        .ai-box p{
            color:rgba(255,255,255,.72);
            margin:8px 0 0;
            font-size:13px;
            line-height:1.6;
        }

        .results-grid{
            display:grid;
            grid-template-columns:repeat(3,1fr);
            gap:16px;
        }

        .result-card{
            background:#fff;
            border:1px solid var(--line);
            border-radius:var(--radius);
            padding:30px;
            text-align:center;
            box-shadow:0 14px 34px rgba(15,23,42,.055);
        }

        .result-card strong{
            display:block;
            color:var(--navy);
            font-size:46px;
            letter-spacing:-.06em;
        }

        .result-card span{
            display:block;
            margin-top:10px;
            color:var(--muted);
            line-height:1.55;
            font-weight:700;
            font-size:14px;
        }

        .testimonials-grid{
            display:grid;
            grid-template-columns:repeat(3,1fr);
            gap:16px;
        }

        .testimonial-card p{
            font-size:15px;
            color:#475569;
        }

        .person{
            margin-top:26px;
            display:flex;
            align-items:center;
            gap:12px;
        }

        .avatar{
            width:42px;
            height:42px;
            border-radius:50%;
            background:var(--soft);
            color:#24784B;
            display:grid;
            place-items:center;
            font-weight:900;
        }

        .person b{
            display:block;
            color:var(--navy);
            font-size:14px;
        }

        .person span{
            color:var(--muted);
            font-size:12px;
            font-weight:700;
        }

        .final-cta{
            padding:90px 0;
        }

        .cta-box{
            background:var(--navy);
            color:#fff;
            border-radius:34px;
            padding:58px;
            text-align:center;
            position:relative;
            overflow:hidden;
        }

        .cta-box:before{
            content:"";
            position:absolute;
            width:260px;
            height:260px;
            right:-80px;
            top:-100px;
            border-radius:50%;
            background:rgba(95,211,137,.16);
        }

        .cta-box h2{
            position:relative;
            margin:0 auto;
            max-width:820px;
            font-size:clamp(34px,5vw,64px);
            line-height:1.02;
            letter-spacing:-.06em;
            color:#fff;
        }

        .cta-box p{
            position:relative;
            max-width:650px;
            margin:18px auto 0;
            color:rgba(255,255,255,.68);
            line-height:1.75;
        }

        .cta-box .hero-actions{
            justify-content:center;
            position:relative;
        }

        .footer{
            padding:34px 0 46px;
            border-top:1px solid var(--line);
            color:var(--muted);
        }

        .footer-inner{
            display:flex;
            justify-content:space-between;
            gap:20px;
            align-items:center;
            flex-wrap:wrap;
            font-size:14px;
            font-weight:700;
        }

        .footer-links{
            display:flex;
            gap:18px;
            flex-wrap:wrap;
        }

        .footer-links a:hover{
            color:var(--navy);
        }

        @media(max-width:980px){
            .nav-links{display:none}
            .hero-grid,
            .exam-wrap{
                grid-template-columns:1fr;
            }
            .hero-panel{
                min-height:460px;
            }
            .cards-grid{
                grid-template-columns:repeat(2,1fr);
            }
            .packages-grid,
            .testimonials-grid,
            .results-grid{
                grid-template-columns:1fr;
            }
        }

        @media(max-width:620px){
            .container,
            .nav{
                width:calc(100% - 24px);
            }
            .hero{
                padding-top:120px;
            }
            .hero h1{
                font-size:42px;
            }
            .hero-stats,
            .cards-grid{
                grid-template-columns:1fr;
            }
            .hero-panel{
                padding:16px;
                min-height:430px;
            }
            .road-card{
                min-height:390px;
            }
            .cta-box{
                padding:38px 22px;
            }
        }
    </style>
</head>
<body>
<div class="page">
    <nav class="nav">
        <a href="/autoschool" class="brand">
            <span class="brand-mark">A</span>
            <span>Driving Academy</span>
        </a>

        <div class="nav-links">
            <a href="#features">უპირატესობები</a>
            <a href="#packages">კურსები</a>
            <a href="#exam">გამოცდა</a>
            <a href="#results">შედეგები</a>
        </div>

        <a href="/autoschool/exam" class="nav-cta">ტესტის დაწყება</a>
    </nav>

    <main>
        <section class="hero">
            <div class="container hero-grid">
                <div>
                    <div class="eyebrow"><i></i> ფიზიკური + ონლაინ თეორიის კურსი</div>

                    <h1>
                        ისწავლე მართვა უფრო მარტივად, სწრაფად და თავდაჯერებულად
                    </h1>

                    <p>
                        Premium Driving Academy გაერთიანებს ავტოსკოლის ფიზიკურ კურსს, ონლაინ თეორიას,
                        გამოცდის რეალურ სიმულაციას და შეცდომების მარტივ ახსნას.
                    </p>

                    <div class="hero-actions">
                        <a href="/autoschool/exam" class="btn btn-primary">გამოცდის სიმულაცია</a>
                        <a href="#packages" class="btn btn-secondary">კურსების ნახვა</a>
                    </div>

                    <div class="hero-stats">
                        <div class="stat">
                            <strong>30წთ</strong>
                            <span>რეალური გამოცდის ფორმატი</span>
                        </div>
                        <div class="stat">
                            <strong>5K+</strong>
                            <span>სავარჯიშო კითხვა და პასუხი</span>
                        </div>
                        <div class="stat">
                            <strong>24/7</strong>
                            <span>სწავლა ნებისმიერი მოწყობილობიდან</span>
                        </div>
                    </div>
                </div>

                <div class="hero-panel">
                    <div class="road-card">
                        <div class="road"></div>
                        <div class="car"></div>

                        <div class="exam-mini">
                            <div class="exam-mini-top">
                                <b>Exam Simulator</b>
                                <span>სწორი პასუხი</span>
                            </div>
                            <div class="mini-question">
                                რას ნიშნავს მოცემული საგზაო ნიშანი?
                            </div>
                            <div class="answer-row">
                                <div>სიჩქარის შეზღუდვა</div>
                                <div class="active">მოძრაობა აკრძალულია</div>
                                <div>გასწრება ნებადართულია</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section" id="features">
            <div class="container">
                <div class="section-head">
                    <h2>ერთი სისტემა სრული მომზადებისთვის</h2>
                    <p>ყველა საჭირო ნაწილი ერთ სივრცეში — თეორია, პრაქტიკული მიდგომა, გამოცდის რეჟიმი და პროგრესის კონტროლი.</p>
                </div>

                <div class="cards-grid">
                    <div class="feature-card">
                        <div class="icon">01</div>
                        <h3>ფიზიკური კურსი</h3>
                        <p>ინსტრუქტორთან სწავლა, რეალური მაგალითები და გამოცდაზე ორიენტირებული ახსნა.</p>
                    </div>
                    <div class="feature-card">
                        <div class="icon">02</div>
                        <h3>ონლაინ თეორია</h3>
                        <p>ისწავლე სახლიდან, გზაში ან შესვენებაზე — ტელეფონიდანაც და კომპიუტერიდანაც.</p>
                    </div>
                    <div class="feature-card">
                        <div class="icon">03</div>
                        <h3>გამოცდის სიმულაცია</h3>
                        <p>რეალურ გამოცდასთან მაქსიმალურად მიახლოებული დრო, კითხვები და შედეგები.</p>
                    </div>
                    <div class="feature-card">
                        <div class="icon">04</div>
                        <h3>შეცდომის ახსნა</h3>
                        <p>არასწორ პასუხზე იღებ მარტივ განმარტებას ადამიანურ ენაზე.</p>
                    </div>
                </div>
            </div>
        </section>

        <section class="section" id="packages">
            <div class="container">
                <div class="section-head">
                    <h2>აირჩიე შენზე მორგებული კურსი</h2>
                    <p>დაიწყე მხოლოდ ონლაინით ან აიღე სრული premium პაკეტი ფიზიკური მომზადებით.</p>
                </div>

                <div class="packages-grid">
                    <div class="package-card">
                        <div class="icon">A</div>
                        <h3>ფიზიკური კურსი</h3>
                        <p>სრული მომზადება ავტოსკოლაში ინსტრუქტორთან ერთად.</p>
                        <div class="price">₾---</div>
                        <ul>
                            <li>თეორიის ახსნა</li>
                            <li>პრაქტიკული მაგალითები</li>
                            <li>გამოცდაზე ორიენტირება</li>
                        </ul>
                        <a href="#" class="btn btn-secondary">დეტალურად</a>
                    </div>

                    <div class="package-card">
                        <div class="icon">B</div>
                        <h3>ონლაინ + გამოცდა</h3>
                        <p>ონლაინ თეორია და გამოცდის სიმულაცია პროგრესის კონტროლით.</p>
                        <div class="price">₾---</div>
                        <ul>
                            <li>ტესტები 24/7</li>
                            <li>AI განმარტება შეცდომაზე</li>
                            <li>პროგრესის ნახვა</li>
                        </ul>
                        <a href="/autoschool/exam" class="btn btn-primary">დაწყება</a>
                    </div>

                    <div class="package-card">
                        <div class="icon">C</div>
                        <h3>ინდივიდუალური</h3>
                        <p>მორგებული სწავლა მათთვის, ვისაც სწრაფად და კონკრეტულად უნდა მომზადება.</p>
                        <div class="price">₾---</div>
                        <ul>
                            <li>პირადი მიდგომა</li>
                            <li>სუსტი თემების გაძლიერება</li>
                            <li>სწრაფი მომზადება</li>
                        </ul>
                        <a href="#" class="btn btn-secondary">კონსულტაცია</a>
                    </div>
                </div>
            </div>
        </section>

        <section class="exam-section" id="exam">
            <div class="container">
                <div class="exam-wrap">
                    <div class="exam-copy">
                        <div class="eyebrow"><i></i> Live Exam Experience</div>
                        <h2>ტესტი, რომელიც რეალურ გამოცდას ჰგავს</h2>
                        <p>
                            ყოველი პასუხის შემდეგ ხედავ პროგრესს, შეცდომებს და საჭირო განმარტებებს.
                            მთავარი მიზანია არა უბრალოდ დამახსოვრება, არამედ სწორად გაგება.
                        </p>
                        <div class="hero-actions">
                            <a href="/autoschool/exam" class="btn btn-primary">გადადი გამოცდაზე</a>
                        </div>
                    </div>

                    <div class="mockup">
                        <div class="mock-question">
                            <h3>კითხვა 12 / 30</h3>
                            <p>რა უნდა გააკეთოს მძღოლმა, როცა გზაჯვარედინზე ხედავს ამ ნიშანს?</p>

                            <div class="mock-options">
                                <div>გააგრძელოს მოძრაობა უცვლელი სიჩქარით</div>
                                <div class="correct">შეანელოს და იმოქმედოს ნიშნით განსაზღვრული წესით</div>
                                <div>აუცილებლად გაჩერდეს ნებისმიერ შემთხვევაში</div>
                            </div>

                            <div class="ai-box">
                                <b>განმარტება</b>
                                <p>ნიშანი გეუბნება, რომ წინ მოქმედებს კონკრეტული შეზღუდვა. ამიტომ მძღოლმა უნდა შეამციროს სიჩქარე და იმოქმედოს სიტუაციის მიხედვით.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="section" id="results">
            <div class="container">
                <div class="section-head">
                    <h2>შედეგები, რომელიც ნდობას ქმნის</h2>
                    <p>სწავლა უფრო ეფექტურია, როცა ხედავ პროგრესს და ზუსტად იცი, სად ხარ ძლიერი.</p>
                </div>

                <div class="results-grid">
                    <div class="result-card">
                        <strong>94%</strong>
                        <span>მომზადებული მოსწავლეების მაღალი შედეგი</span>
                    </div>
                    <div class="result-card">
                        <strong>30</strong>
                        <span>წუთიანი გამოცდის რეალური რეჟიმი</span>
                    </div>
                    <div class="result-card">
                        <strong>24/7</strong>
                        <span>წვდომა ონლაინ სასწავლო სივრცეზე</span>
                    </div>
                </div>
            </div>
        </section>

        <section class="section">
            <div class="container">
                <div class="section-head">
                    <h2>რას ამბობენ მოსწავლეები</h2>
                    <p>მარტივი ახსნა, სუფთა სისტემა და რეალური გამოცდის შეგრძნება.</p>
                </div>

                <div class="testimonials-grid">
                    <div class="testimonial-card">
                        <p>“თეორია ბევრად მარტივად გავიგე. განსაკუთრებით მომეწონა, რომ შეცდომაზე პირდაპირ მიხსნის რატომ იყო არასწორი.”</p>
                        <div class="person">
                            <div class="avatar">ნ</div>
                            <div><b>ნიკა მ.</b><span>თეორიის კურსი</span></div>
                        </div>
                    </div>

                    <div class="testimonial-card">
                        <p>“გამოცდის სიმულაციამ ძალიან დამამშვიდა. უკვე ვიცოდი რა ფორმატს ველოდებოდი რეალურ გამოცდაზე.”</p>
                        <div class="person">
                            <div class="avatar">მ</div>
                            <div><b>მარიამ კ.</b><span>Exam Simulator</span></div>
                        </div>
                    </div>

                    <div class="testimonial-card">
                        <p>“ფიზიკური გაკვეთილები და ონლაინ ტესტები ერთად იდეალურად მუშაობს. პროგრესიც კარგად ჩანს.”</p>
                        <div class="person">
                            <div class="avatar">გ</div>
                            <div><b>გიორგი რ.</b><span>Premium Course</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section class="final-cta">
            <div class="container">
                <div class="cta-box">
                    <h2>დაიწყე მომზადება დღეს და გამოცდაზე გადი მშვიდად</h2>
                    <p>შეარჩიე კურსი, გაიარე ტესტები და ისწავლე სისტემით, რომელიც რეალურად გიმზადებს გამოცდისთვის.</p>
                    <div class="hero-actions">
                        <a href="/autoschool/exam" class="btn btn-primary">გამოცდის დაწყება</a>
                        <a href="#packages" class="btn btn-secondary">კურსების ნახვა</a>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <footer class="footer">
        <div class="container footer-inner">
            <div>© {{ date('Y') }} Driving Academy. ყველა უფლება დაცულია.</div>
            <div class="footer-links">
                <a href="/autoschool">მთავარი</a>
                <a href="/autoschool/exam">გამოცდა</a>
                <a href="#packages">კურსები</a>
            </div>
        </div>
    </footer>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/gsap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.5/ScrollTrigger.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@studio-freight/lenis@1.0.42/bundled/lenis.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', () => {
    const lenis = new Lenis({
        duration: 1.05,
        smoothWheel: true,
        wheelMultiplier: .85
    });

    function raf(time){
        lenis.raf(time);
        requestAnimationFrame(raf);
    }
    requestAnimationFrame(raf);

    if(window.gsap && window.ScrollTrigger){
        gsap.registerPlugin(ScrollTrigger);

        gsap.from('.nav', {
            y: -18,
            opacity: 0,
            duration: .75,
            ease: 'power3.out'
        });

        gsap.from('.eyebrow, .hero h1, .hero p, .hero-actions, .hero-stats', {
            y: 28,
            opacity: 0,
            duration: .85,
            stagger: .09,
            ease: 'power3.out'
        });

        gsap.from('.hero-panel', {
            y: 36,
            opacity: 0,
            scale: .96,
            duration: 1,
            delay: .18,
            ease: 'power3.out'
        });

        gsap.to('.car', {
            y: -10,
            duration: 2.4,
            repeat: -1,
            yoyo: true,
            ease: 'sine.inOut'
        });

        gsap.utils.toArray('.feature-card, .package-card, .result-card, .testimonial-card').forEach((el, i) => {
            gsap.from(el, {
                scrollTrigger:{
                    trigger: el,
                    start:'top 88%',
                    once:true
                },
                y: 28,
                opacity: 0,
                duration: .7,
                delay: (i % 4) * .04,
                ease:'power3.out'
            });
        });

        gsap.from('.exam-wrap', {
            scrollTrigger:{
                trigger: '.exam-wrap',
                start:'top 78%',
                once:true
            },
            y: 34,
            opacity: 0,
            duration: .9,
            ease:'power3.out'
        });

        gsap.from('.cta-box', {
            scrollTrigger:{
                trigger: '.cta-box',
                start:'top 82%',
                once:true
            },
            y: 34,
            opacity: 0,
            duration: .85,
            ease:'power3.out'
        });
    }
});
</script>
</body>
</html>
