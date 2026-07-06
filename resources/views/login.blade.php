<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ __('messages.login.page_title') }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Noto+Serif+Georgian:wght@600;700;800&family=Noto+Sans+Georgian:wght@400;500;600&family=Space+Mono:wght@700&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tabler-icons/2.47.0/iconfont/tabler-icons.min.css">
</head>
<body class="ast-auth">

    <div class="ast-auth__aurora ast-auth__aurora--a" aria-hidden="true"></div>
    <div class="ast-auth__aurora ast-auth__aurora--b" aria-hidden="true"></div>

    <div class="ast-auth__wrap">
        <a href="{{ url('/') }}" class="ast-auth__logo">
            <span class="ast-auth__logo-mark"><i class="ti ti-steering-wheel" aria-hidden="true"></i></span>
            <span class="ast-auth__logo-word">{{ __('messages.hero.brand') }}</span>
        </a>

        <div class="ast-auth__card">
            <span class="ast-auth__eyebrow">{{ __('messages.login.eyebrow') }}</span>
            <h1 class="ast-auth__title">{{ __('messages.login.title') }}</h1>
            <p class="ast-auth__subtitle">{{ __('messages.login.subtitle') }}</p>

            @if(session('success'))
                <div class="ast-auth__alert ast-auth__alert--success">
                    <i class="ti ti-circle-check" aria-hidden="true"></i>
                    <span>{{ session('success') }}</span>
                </div>
            @endif

            @if ($errors->any())
                <div class="ast-auth__alert">
                    <i class="ti ti-alert-circle" aria-hidden="true"></i>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('login.attempt') }}" class="ast-auth__form">
                @csrf

                <label class="ast-auth__field">
                    <span>{{ __('messages.login.email') }}</span>
                    <input type="email" name="email" value="{{ old('email') }}" placeholder="{{ __('messages.login.email_placeholder') }}" required autofocus>
                </label>

                <label class="ast-auth__field">
                    <span>{{ __('messages.login.password') }}</span>
                    <input type="password" name="password" placeholder="{{ __('messages.login.password_placeholder') }}" required>
                </label>

                <button type="submit" class="ast-auth__submit">
                    {{ __('messages.login.submit') }}
                    <i class="ti ti-arrow-right" aria-hidden="true"></i>
                </button>
            </form>

            <p class="ast-auth__switch">
                {{ __('messages.login.switch_text') }}
                <a href="{{ route('booking') }}">{{ __('messages.login.switch_link') }}</a>
            </p>
        </div>
    </div>

    <style>
        *{box-sizing:border-box;}
        .ast-auth{
            --ink:#0B1E3D; --ink-soft:#46587A; --paper:#FFFFFF; --paper-tint:#F2F6FB;
            --blue:#155FC9; --blue-deep:#0B3E86; --blue-light:#5FA8F5;
            --chrome:#D7DEE8; --chrome-deep:#A9B6C8; --red:#D7423F; --green:#16A34A;
            position:relative; min-height:100vh; margin:0; overflow-x:hidden;
            background:var(--paper); font-family:'Noto Sans Georgian',sans-serif; color:var(--ink);
            display:flex; align-items:center; justify-content:center; padding:40px 20px;
        }
        .ast-auth__aurora{position:absolute; border-radius:50%; filter:blur(70px); z-index:0; pointer-events:none;}
        .ast-auth__aurora--a{width:520px; height:520px; top:-200px; right:-160px; background:radial-gradient(circle,rgba(21,95,201,0.16),transparent 70%);}
        .ast-auth__aurora--b{width:420px; height:420px; bottom:-200px; left:-140px; background:radial-gradient(circle,rgba(95,168,245,0.14),transparent 70%);}

        .ast-auth__wrap{position:relative; z-index:1; width:100%; max-width:460px;}
        .ast-auth__logo{display:flex; align-items:center; justify-content:center; gap:10px; text-decoration:none; margin-bottom:28px;}
        .ast-auth__logo-mark{width:36px; height:36px; border-radius:50%; background:linear-gradient(155deg,var(--blue-light),var(--blue-deep)); display:flex; align-items:center; justify-content:center; color:#fff; font-size:18px;}
        .ast-auth__logo-word{font-family:'Noto Serif Georgian'; font-weight:700; font-size:16px; color:var(--ink);}

        .ast-auth__card{background:#fff; border:1px solid var(--chrome); border-radius:18px; padding:36px 32px; box-shadow:0 30px 60px -28px rgba(11,30,61,0.25);}
        .ast-auth__eyebrow{display:inline-block; font-family:'Space Mono'; font-size:10.5px; font-weight:700; letter-spacing:2px; color:var(--blue-deep); background:var(--paper-tint); border:1px solid rgba(21,95,201,0.25); border-radius:2px; padding:4px 10px; margin-bottom:16px;}
        .ast-auth__title{font-family:'Noto Serif Georgian'; font-weight:800; font-size:26px; margin:0 0 8px;}
        .ast-auth__subtitle{font-size:13px; color:var(--ink-soft); margin:0 0 24px; line-height:1.6;}

        .ast-auth__alert{display:flex; gap:10px; align-items:flex-start; background:rgba(215,66,63,0.06); border:1px solid rgba(215,66,63,0.3); border-radius:8px; padding:12px 14px; margin-bottom:20px; color:var(--red); font-size:12.5px;}
        .ast-auth__alert--success{background:rgba(22,163,74,0.06); border-color:rgba(22,163,74,0.3); color:var(--green);}
        .ast-auth__alert i{font-size:16px; flex-shrink:0; margin-top:1px;}
        .ast-auth__alert ul{margin:0; padding-left:16px;}

        .ast-auth__form{display:flex; flex-direction:column; gap:16px;}
        .ast-auth__field{display:flex; flex-direction:column; gap:6px; font-size:12.5px; font-weight:600; color:var(--ink-soft);}
        .ast-auth__field input,
        .ast-auth__field select,
        .ast-auth__field textarea{
            font-family:inherit; font-size:14px; color:var(--ink); background:var(--paper-tint);
            border:1px solid var(--chrome); border-radius:8px; padding:12px 14px; outline:none;
            transition:border-color .2s ease, background .2s ease;
        }
        .ast-auth__field input:focus,
        .ast-auth__field select:focus,
        .ast-auth__field textarea:focus{border-color:var(--blue); background:#fff;}

        .ast-auth__submit{display:flex; align-items:center; justify-content:center; gap:8px; margin-top:4px; font-family:'Space Mono'; font-weight:700; font-size:13px; letter-spacing:0.5px; color:#fff; background:linear-gradient(135deg,var(--blue-light),var(--blue-deep)); border:none; border-radius:8px; padding:14px; cursor:pointer; box-shadow:0 14px 26px -12px rgba(11,62,134,0.6); transition:transform .2s ease;}
        .ast-auth__submit:hover{transform:translateY(-2px);}

        .ast-auth__switch{text-align:center; font-size:13px; color:var(--ink-soft); margin:22px 0 0;}
        .ast-auth__switch a{color:var(--blue); font-weight:600; text-decoration:none;}
        .ast-auth__switch a:hover{text-decoration:underline;}

        @media(max-width:520px){
            .ast-auth{padding:28px 14px;}
            .ast-auth__card{padding:28px 22px;}
        }
    </style>
</body>
</html>
