<!DOCTYPE html>
<html lang="ka">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>რეგისტრაცია — ავტოსკოლა</title>

    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Noto+Serif+Georgian:wght@600;700;800&family=Noto+Sans+Georgian:wght@400;500;600;700&family=Space+Mono:wght@700&display=swap">

    <style>
        *{box-sizing:border-box}
        body{margin:0;font-family:'Noto Sans Georgian',sans-serif;background:#f2f6fb;color:#0B1E3D}
        .page{min-height:100vh;padding:40px 20px;background:radial-gradient(circle at top left,rgba(95,168,245,.22),transparent 34%),linear-gradient(180deg,#fff,#f2f6fb)}
        .wrap{max-width:1120px;margin:0 auto;display:grid;grid-template-columns:1fr 1.05fr;gap:28px;align-items:center}
        .hero,.form{background:#fff;border:1px solid #D7DEE8;border-radius:24px;box-shadow:0 28px 70px -42px rgba(11,30,61,.45)}
        .hero{padding:42px}
        .tag{display:inline-flex;font-family:'Space Mono',monospace;font-size:11px;letter-spacing:2px;color:#0B3E86;background:#F2F6FB;border:1px solid rgba(21,95,201,.25);border-radius:999px;padding:8px 14px}
        h1{font-family:'Noto Serif Georgian',serif;font-size:clamp(32px,4vw,52px);line-height:1.12;margin:22px 0 16px}
        p{color:#46587A;line-height:1.75;margin:0}
        .benefits{display:grid;gap:12px;margin-top:28px}
        .benefit{display:flex;gap:12px;align-items:flex-start;background:#F7FAFE;border:1px solid #D7DEE8;border-radius:16px;padding:16px}
        .dot{width:10px;height:10px;margin-top:8px;border-radius:50%;background:#155FC9;box-shadow:0 0 0 6px rgba(21,95,201,.1)}
        .benefit b{display:block;margin-bottom:4px}
        .benefit span{font-size:13px;color:#46587A;line-height:1.55}

        .form{padding:34px}
        .alert{border-radius:14px;padding:14px 16px;margin-bottom:18px;font-size:14px}
        .alert.error{background:#fff1f2;color:#991b1b;border:1px solid #fecdd3}
        .grid{display:grid;grid-template-columns:1fr 1fr;gap:14px}
        label{display:block;font-size:12px;font-weight:700;margin-bottom:7px;color:#0B1E3D}
        input,select,textarea{width:100%;border:1px solid #D7DEE8;background:#fff;border-radius:12px;padding:14px 14px;font:inherit;color:#0B1E3D;outline:none}
        input:focus,select:focus,textarea:focus{border-color:#155FC9;box-shadow:0 0 0 4px rgba(21,95,201,.1)}
        textarea{min-height:110px;resize:vertical}
        .full{grid-column:1/-1}
        button{width:100%;border:0;border-radius:14px;margin-top:18px;padding:16px 22px;background:linear-gradient(135deg,#5FA8F5,#0B3E86);color:#fff;font-family:'Space Mono',monospace;font-weight:700;cursor:pointer;box-shadow:0 18px 34px -18px rgba(11,62,134,.75)}
        .back{display:inline-flex;margin-top:18px;color:#0B3E86;text-decoration:none;font-weight:700;font-size:14px}
        @media(max-width:900px){.wrap{grid-template-columns:1fr}.hero{padding:30px}.form{padding:24px}.grid{grid-template-columns:1fr}}
    </style>
</head>
<body>
<div class="page">
    <div class="wrap">
        <section class="hero">
            <span class="tag">ONLINE REGISTRATION</span>
            <h1>დარეგისტრირდი ავტოსკოლაში და დაიწყე მზადება გამოცდისთვის</h1>
            <p>შეავსე ფორმა, აირჩიე კურსი და ჩვენი გუნდი დაგიკავშირდება. რეგისტრაციის შემდეგ ავტომატურად გაგეხსნება მოსწავლის შიდა პანელი.</p>

            <div class="benefits">
                <div class="benefit"><span class="dot"></span><div><b>სასწავლო პროცესი</b><span>თეორია, პრაქტიკა და გამოცდის სიმულაცია ერთ სისტემაში.</span></div></div>
                <div class="benefit"><span class="dot"></span><div><b>შეცდომებზე სწავლა</b><span>არასწორ პასუხზე მიიღებ მარტივ ახსნას ადამიანურ ენაზე.</span></div></div>
                <div class="benefit"><span class="dot"></span><div><b>პერსონალური გეგმა</b><span>კურსი ერგება შენს დროს, ენას და მომზადების დონეს.</span></div></div>
            </div>

            <a class="back" href="{{ url('/') }}">← მთავარ გვერდზე დაბრუნება</a>
        </section>

        <section class="form">
            @if(session('error'))
                <div class="alert error">{{ session('error') }}</div>
            @endif

            @if($errors->any())
                <div class="alert error">გთხოვ შეამოწმე შევსებული ველები.</div>
            @endif

            <form method="POST" action="{{ route('booking.store') }}">
                @csrf

                <div class="grid">
                    <div>
                        <label>სახელი და გვარი</label>
                        <input type="text" name="full_name" value="{{ old('full_name') }}" required placeholder="მაგ: გიორგი მაისურაძე">
                    </div>

                    <div>
                        <label>ტელეფონი</label>
                        <input type="text" name="phone" value="{{ old('phone') }}" required placeholder="მაგ: 555 12 34 56">
                    </div>

                    <div>
                        <label>Email</label>
                        <input type="email" name="email" value="{{ old('email') }}" placeholder="არასავალდებულო">
                    </div>

                    <div>
                        <label>სასურველი დრო</label>
                        <input type="text" name="preferred_time" value="{{ old('preferred_time') }}" placeholder="მაგ: საღამო / შაბათი">
                    </div>

                    <div>
                        <label>კურსი</label>
                        <select name="course_type" required>
                            <option value="standard">სტანდარტი</option>
                            <option value="premium" selected>პრემიუმი</option>
                            <option value="vip">VIP</option>
                            <option value="individual">ინდივიდუალური</option>
                            <option value="online">ონლაინ</option>
                        </select>
                    </div>

                    <div>
                        <label>სწავლების ენა</label>
                        <select name="language" required>
                            <option value="ka" selected>ქართული</option>
                            <option value="ru">რუსული</option>
                            <option value="en">ინგლისური</option>
                        </select>
                    </div>

                    <div class="full">
                        <label>დამატებითი კომენტარი</label>
                        <textarea name="message" placeholder="მაგ: ჯერ საერთოდ არ მივლია / მხოლოდ პრაქტიკა მინდა">{{ old('message') }}</textarea>
                    </div>
                </div>

                <button type="submit">დარეგისტრირება და პანელში შესვლა</button>
            </form>
        </section>
    </div>
</div>
</body>
</html>
