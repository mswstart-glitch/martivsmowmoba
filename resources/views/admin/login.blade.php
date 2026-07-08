<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login — DriveLab</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Noto+Serif+Georgian:wght@700;800&family=Noto+Sans+Georgian:wght@400;500;600&family=Space+Mono:wght@700&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tabler-icons/2.47.0/iconfont/tabler-icons.min.css">
    <style>
        :root{
            --ink:#0B1E3D; --ink-soft:#46587A; --paper:#FFFFFF; --paper-tint:#F2F6FB;
            --blue:#155FC9; --blue-deep:#0B3E86; --blue-light:#5FA8F5; --chrome:#D7DEE8;
        }
        *{box-sizing:border-box}
        body{
            margin:0; min-height:100vh; display:flex; align-items:center; justify-content:center;
            background:linear-gradient(160deg,#0B1726,#132546);
            font-family:'Noto Sans Georgian',sans-serif; color:var(--ink);
        }
        .card{
            width:100%; max-width:380px; background:var(--paper); border-radius:18px;
            padding:40px 34px; box-shadow:0 40px 80px -30px rgba(0,0,0,.5);
        }
        .brand{display:flex; align-items:center; gap:12px; margin-bottom:28px;}
        .brand-mark{
            width:40px; height:40px; border-radius:50%;
            background:linear-gradient(155deg,var(--blue-light),var(--blue-deep));
            display:flex; align-items:center; justify-content:center; color:#fff; font-size:20px;
        }
        .brand-word{font-family:'Noto Serif Georgian',serif; font-weight:800; font-size:19px;}
        h1{font-family:'Noto Serif Georgian',serif; font-size:22px; margin:0 0 6px;}
        p.sub{font-size:13.5px; color:var(--ink-soft); margin:0 0 26px;}
        label{display:block; font-size:12.5px; font-weight:600; color:var(--ink-soft); margin-bottom:6px;}
        input[type=email], input[type=password]{
            width:100%; padding:12px 14px; border-radius:9px; border:1px solid var(--chrome);
            font-size:14px; margin-bottom:18px; background:var(--paper-tint); color:var(--ink);
        }
        input:focus{outline:none; border-color:var(--blue);}
        .checkbox-row{display:flex; align-items:center; gap:8px; margin:-8px 0 20px; font-size:13px; color:var(--ink-soft);}
        button{
            width:100%; padding:13px; border:none; border-radius:9px; cursor:pointer;
            background:linear-gradient(135deg,var(--blue-light),var(--blue-deep)); color:#fff;
            font-weight:700; font-size:14.5px; box-shadow:0 14px 26px -10px rgba(11,62,134,.6);
            transition:transform .2s ease;
        }
        button:hover{transform:translateY(-1px)}
        .errors{background:#FDECEC; border:1px solid #F3B6B6; color:#B3261E; border-radius:9px; padding:10px 14px; font-size:13px; margin-bottom:18px;}
    </style>
</head>
<body>
    <div class="card">
        <div class="brand">
            <span class="brand-mark"><i class="ti ti-steering-wheel" aria-hidden="true"></i></span>
            <span class="brand-word">DriveLab</span>
        </div>
        <h1>Admin Panel</h1>
        <p class="sub">Sign in to manage site content.</p>

        @if ($errors->any())
            <div class="errors">{{ $errors->first() }}</div>
        @endif

        <form method="POST" action="{{ route('admin.login.attempt') }}">
            @csrf
            <label for="email">Email</label>
            <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus>

            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>

            <div class="checkbox-row">
                <input type="checkbox" id="remember" name="remember" style="margin:0;">
                <label for="remember" style="margin:0;">Remember me</label>
            </div>

            <button type="submit">Sign in</button>
        </form>
    </div>
</body>
</html>
