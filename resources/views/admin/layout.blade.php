<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Admin') — DriveLab</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Noto+Serif+Georgian:wght@700;800&family=Noto+Sans+Georgian:wght@400;500;600&family=Space+Mono:wght@700&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tabler-icons/2.47.0/iconfont/tabler-icons.min.css">
    <style>
        :root{
            --ink:#0B1E3D; --ink-soft:#46587A; --paper:#FFFFFF; --paper-tint:#F2F6FB;
            --blue:#155FC9; --blue-deep:#0B3E86; --blue-light:#5FA8F5; --chrome:#D7DEE8; --chrome-deep:#A9B6C8;
            --danger:#B3261E; --success:#1D8A4A;
        }
        *{box-sizing:border-box}
        body{margin:0; background:var(--paper-tint); font-family:'Noto Sans Georgian',sans-serif; color:var(--ink);}
        .admin-shell{display:flex; min-height:100vh;}
        .admin-sidebar{
            width:240px; flex-shrink:0; background:linear-gradient(180deg,#132546,#0B1726); color:#fff;
            display:flex; flex-direction:column; padding:26px 18px;
        }
        .admin-brand{display:flex; align-items:center; gap:10px; margin-bottom:32px; padding:0 6px;}
        .admin-brand-mark{width:34px; height:34px; border-radius:50%; background:linear-gradient(155deg,var(--blue-light),var(--blue-deep)); display:flex; align-items:center; justify-content:center; font-size:17px;}
        .admin-brand-word{font-family:'Noto Serif Georgian',serif; font-weight:800; font-size:16.5px;}
        .admin-nav{display:flex; flex-direction:column; gap:2px; flex:1;}
        .admin-nav a{
            display:flex; align-items:center; gap:11px; padding:11px 14px; border-radius:9px;
            color:rgba(255,255,255,.72); text-decoration:none; font-size:13.5px; font-weight:500; transition:background .15s ease,color .15s ease;
        }
        .admin-nav a i{font-size:17px; width:18px; text-align:center;}
        .admin-nav a:hover{background:rgba(255,255,255,.06); color:#fff;}
        .admin-nav a.is-active{background:rgba(21,95,201,.35); color:#fff;}
        .admin-sidebar-foot{border-top:1px solid rgba(255,255,255,.1); padding-top:14px; margin-top:14px;}
        .admin-sidebar-foot form button{
            width:100%; display:flex; align-items:center; gap:11px; padding:11px 14px; border-radius:9px;
            background:none; border:none; color:rgba(255,255,255,.72); font-size:13.5px; font-family:inherit; cursor:pointer;
        }
        .admin-sidebar-foot form button:hover{background:rgba(255,255,255,.06); color:#fff;}
        .admin-main{flex:1; min-width:0; padding:32px clamp(20px,3vw,44px);}
        .admin-topbar{display:flex; align-items:center; justify-content:space-between; margin-bottom:26px;}
        .admin-topbar h1{font-family:'Noto Serif Georgian',serif; font-size:24px; margin:0;}
        .admin-topbar p{margin:4px 0 0; color:var(--ink-soft); font-size:13.5px;}
        .flash{border-radius:11px; padding:13px 18px; font-size:13.5px; margin-bottom:22px;}
        .flash-success{background:#E9F8EF; border:1px solid #BFE8CE; color:var(--success);}
        .flash-error{background:#FDECEC; border:1px solid #F3B6B6; color:var(--danger);}
        .card{background:#fff; border:1px solid var(--chrome); border-radius:16px; padding:26px; box-shadow:0 20px 45px -34px rgba(11,30,61,.35);}
        table{width:100%; border-collapse:collapse; font-size:13.5px;}
        th{text-align:left; font-size:11px; letter-spacing:.5px; text-transform:uppercase; color:var(--ink-soft); font-weight:700; padding:0 12px 12px; border-bottom:1px solid var(--chrome);}
        td{padding:14px 12px; border-bottom:1px solid var(--paper-tint); vertical-align:middle;}
        tr:last-child td{border-bottom:none;}
        .btn{display:inline-flex; align-items:center; gap:7px; text-decoration:none; font-weight:700; font-size:13px; border-radius:8px; padding:9px 16px; border:1px solid var(--chrome); color:var(--ink); background:#fff; cursor:pointer; transition:border-color .2s ease;}
        .btn:hover{border-color:var(--blue);}
        .btn-primary{background:linear-gradient(135deg,var(--blue-light),var(--blue-deep)); color:#fff; border:none; box-shadow:0 10px 20px -10px rgba(11,62,134,.6);}
        .btn-danger{color:var(--danger); border-color:#F3B6B6;}
        .btn-sm{padding:6px 12px; font-size:12px;}
        .badge{display:inline-block; font-size:11px; font-weight:700; padding:4px 10px; border-radius:999px; letter-spacing:.3px;}
        .badge-new{background:#EAF1FE; color:var(--blue-deep);}
        .badge-contacted{background:#FFF4E0; color:#9A6400;}
        .badge-completed{background:#E9F8EF; color:var(--success);}
        .badge-cancelled{background:#FDECEC; color:var(--danger);}
        .badge-published{background:#E9F8EF; color:var(--success);}
        .badge-draft{background:#F2F6FB; color:var(--ink-soft);}
        .stat-grid{display:grid; grid-template-columns:repeat(auto-fit,minmax(180px,1fr)); gap:18px; margin-bottom:28px;}
        .stat-card{background:#fff; border:1px solid var(--chrome); border-radius:14px; padding:20px;}
        .stat-num{font-family:'Space Mono',monospace; font-size:26px; font-weight:700; color:var(--blue-deep); display:block;}
        .stat-label{font-size:12.5px; color:var(--ink-soft);}
        form.form-grid{display:grid; gap:18px;}
        form.form-grid label{font-size:12.5px; font-weight:600; color:var(--ink-soft); display:block; margin-bottom:6px;}
        form.form-grid input[type=text], form.form-grid input[type=email], form.form-grid input[type=tel],
        form.form-grid input[type=url], form.form-grid input[type=file], form.form-grid input[type=number],
        form.form-grid select, form.form-grid textarea{
            width:100%; padding:11px 13px; border-radius:9px; border:1px solid var(--chrome); font-size:13.5px;
            font-family:inherit; background:var(--paper-tint); color:var(--ink);
        }
        form.form-grid textarea{resize:vertical;}
        .field-error{color:var(--danger); font-size:12px; margin-top:5px;}
        .row-2{display:grid; grid-template-columns:1fr 1fr; gap:18px;}
        .empty-state{text-align:center; padding:50px 20px; color:var(--ink-soft); font-size:14px;}
        .thumb{width:42px; height:42px; border-radius:8px; object-fit:cover; background:var(--paper-tint);}
        @media(max-width:820px){
            .admin-shell{flex-direction:column;}
            .admin-sidebar{width:100%; flex-direction:row; align-items:center; overflow-x:auto;}
            .admin-nav{flex-direction:row;}
            .row-2{grid-template-columns:1fr;}
        }
    </style>
    @stack('styles')
</head>
<body>
    <div class="admin-shell">
        <aside class="admin-sidebar">
            <div class="admin-brand">
                <span class="admin-brand-mark"><i class="ti ti-steering-wheel" aria-hidden="true"></i></span>
                <span class="admin-brand-word">DriveLab Admin</span>
            </div>
            <nav class="admin-nav">
                <a href="{{ route('admin.dashboard') }}" class="@if(request()->routeIs('admin.dashboard')) is-active @endif">
                    <i class="ti ti-layout-dashboard" aria-hidden="true"></i> Dashboard
                </a>
                <a href="{{ route('admin.leads.index') }}" class="@if(request()->routeIs('admin.leads.*')) is-active @endif">
                    <i class="ti ti-users" aria-hidden="true"></i> Leads / Orders
                </a>
                <a href="{{ route('admin.news.index') }}" class="@if(request()->routeIs('admin.news.*')) is-active @endif">
                    <i class="ti ti-news" aria-hidden="true"></i> News
                </a>
                <a href="{{ route('admin.instructors.index') }}" class="@if(request()->routeIs('admin.instructors.*')) is-active @endif">
                    <i class="ti ti-user-plus" aria-hidden="true"></i> Instructors
                </a>
                <a href="{{ route('admin.reviews.index') }}" class="@if(request()->routeIs('admin.reviews.*')) is-active @endif">
                    <i class="ti ti-star" aria-hidden="true"></i> Reviews
                </a>
            </nav>
            <div class="admin-sidebar-foot">
                <form method="POST" action="{{ route('admin.logout') }}">
                    @csrf
                    <button type="submit"><i class="ti ti-logout" aria-hidden="true"></i> Logout</button>
                </form>
            </div>
        </aside>

        <main class="admin-main">
            <div class="admin-topbar">
                <div>
                    <h1>@yield('title', 'Dashboard')</h1>
                    @hasSection('subtitle')
                        <p>@yield('subtitle')</p>
                    @endif
                </div>
                @hasSection('topbar-actions')
                    <div>@yield('topbar-actions')</div>
                @endif
            </div>

            @if (session('success'))
                <div class="flash flash-success">{{ session('success') }}</div>
            @endif
            @if (session('error'))
                <div class="flash flash-error">{{ session('error') }}</div>
            @endif

            @yield('content')
        </main>
    </div>
    @stack('scripts')
</body>
</html>
