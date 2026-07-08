@props([
    'brand' => null,
    'eyebrow' => null,
])

@php
    $brand = $brand ?? __('messages.hero.brand');
    $eyebrow = $eyebrow ?? __('messages.hero.eyebrow');
    $tagline = __('messages.footer.tagline');
    $linksTitle = __('messages.footer.links_title');
    $rights = __('messages.footer.rights');
@endphp

<footer class="ast-footer">
    <div class="ast-footer__glow" aria-hidden="true"></div>

    <div class="ast-footer__top">
        <div class="ast-footer__brand">
            <a href="/autoschool" class="ast-footer__logo">
                <span class="ast-footer__logo-mark"><i class="ti ti-steering-wheel" aria-hidden="true"></i></span>
                <span class="ast-footer__logo-word">{{ $brand }}</span>
            </a>
            <span class="ast-footer__badge">{{ $eyebrow }}</span>
            <p class="ast-footer__tagline">{{ $tagline }}</p>
        </div>

        <div class="ast-footer__links">
            <span class="ast-footer__col-title">{{ $linksTitle }}</span>
            <a href="/autoschool">{{ __('messages.nav.home') }}</a>
            <a href="/autoschool#tickets">{{ __('messages.nav.tickets') }}</a>
            <a href="{{ route('exam.index') }}">{{ __('messages.nav.exam') }}</a>
            <a href="{{ route('materials') }}">{{ __('messages.materials.header') }}</a>
        </div>

        <div class="ast-footer__cta">
            <span class="ast-footer__col-title">{{ __('messages.nav.booking_cta') }}</span>
            <a href="{{ route('booking') }}" class="ast-footer__cta-btn">
                {{ __('messages.nav.booking_cta') }}
                <i class="ti ti-arrow-right" aria-hidden="true"></i>
            </a>
        </div>
    </div>

    <div class="ast-footer__bottom">
        <span class="ast-footer__copy">&copy; {{ date('Y') }} {{ $brand }}. {{ $rights }}</span>
    </div>
</footer>

<style>
.ast-footer{
    --ink:#0B1E3D; --paper:#FFFFFF;
    --blue:#155FC9; --blue-deep:#0B3E86; --blue-light:#5FA8F5;
    --text-soft:#B9C4DE; --text-mute:#7C8AAC;
    position:relative;
    overflow:hidden;
    background:linear-gradient(180deg,#132546 0%,#0B1726 100%);
    padding:56px clamp(20px,4vw,56px) 0;
    font-family:'Noto Sans Georgian',sans-serif;
}
.ast-footer *{box-sizing:border-box}
.ast-footer__glow{position:absolute;top:-160px;left:50%;transform:translateX(-50%);width:640px;height:320px;border-radius:50%;background:radial-gradient(circle,rgba(21,95,201,.28),transparent 70%);filter:blur(40px);pointer-events:none;z-index:0}

.ast-footer__top{position:relative;z-index:1;max-width:1120px;margin:0 auto;display:grid;grid-template-columns:1.4fr 1fr auto;gap:48px;padding-bottom:44px;border-bottom:1px solid rgba(255,255,255,.08)}

.ast-footer__brand{display:flex;flex-direction:column;align-items:flex-start;gap:12px}
.ast-footer__logo{display:flex;align-items:center;gap:12px;text-decoration:none}
.ast-footer__logo-mark{width:38px;height:38px;border-radius:50%;background:linear-gradient(155deg,var(--blue-light),var(--blue-deep));display:flex;align-items:center;justify-content:center;color:#fff;font-size:19px;box-shadow:0 6px 16px -6px rgba(21,95,201,.5)}
.ast-footer__logo-word{font-family:'Noto Serif Georgian',serif;font-weight:700;font-size:18px;letter-spacing:.2px;color:#fff}
.ast-footer__badge{display:inline-block;font-family:'Space Mono',monospace;font-size:10.5px;font-weight:700;letter-spacing:1.5px;color:var(--blue-light);border:1px solid rgba(95,168,245,.3);border-radius:2px;padding:4px 10px}
.ast-footer__tagline{margin:2px 0 0;font-size:13.5px;line-height:1.7;color:var(--text-soft);max-width:340px}

.ast-footer__links{display:flex;flex-direction:column;gap:12px}
.ast-footer__col-title{font-family:'Space Mono',monospace;font-size:11px;font-weight:700;letter-spacing:1.5px;color:var(--text-mute);text-transform:uppercase;margin-bottom:2px}
.ast-footer__links a{color:var(--text-soft);text-decoration:none;font-size:13.5px;transition:color .2s ease}
.ast-footer__links a:hover{color:var(--blue-light)}

.ast-footer__cta{display:flex;flex-direction:column;gap:14px;align-items:flex-start}
.ast-footer__cta-btn{display:inline-flex;align-items:center;gap:8px;text-decoration:none;font-family:'Space Mono',monospace;font-weight:700;font-size:12.5px;letter-spacing:.5px;color:#fff;background:linear-gradient(135deg,var(--blue-light),var(--blue-deep));border-radius:6px;padding:12px 20px;box-shadow:0 12px 24px -12px rgba(21,95,201,.6);transition:transform .25s ease}
.ast-footer__cta-btn:hover{transform:translateY(-2px)}

.ast-footer__bottom{position:relative;z-index:1;max-width:1120px;margin:0 auto;padding:20px 0 24px;text-align:center}
.ast-footer__copy{font-size:12px;color:var(--text-mute)}

@media(max-width:860px){
    .ast-footer__top{grid-template-columns:1fr 1fr;row-gap:36px}
    .ast-footer__cta{grid-column:1 / -1;align-items:flex-start}
}
@media(max-width:560px){
    .ast-footer__top{grid-template-columns:1fr;text-align:left}
    .ast-footer__brand,.ast-footer__cta{align-items:flex-start}
}
</style>
