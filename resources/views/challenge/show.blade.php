<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <title>{{ __('messages.challenge.invite_title') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body style="font-family:Arial;padding:30px;background:#f3f6fb;">

<div style="max-width:520px;margin:40px auto;background:white;padding:36px 30px;border-radius:20px;text-align:center;box-shadow:0 20px 45px -25px rgba(11,30,61,.25);">
    <div style="font-size:13px;font-weight:700;letter-spacing:1px;color:#155FC9;margin-bottom:14px;">
        {{ __('messages.challenge.code_label') }}: {{ $challenge->code }}
    </div>

    <h1 style="font-size:26px;margin:0 0 12px;color:#0B1E3D;">{{ __('messages.challenge.invite_title') }}</h1>
    <p style="font-size:15px;line-height:1.7;color:#46587A;margin:0 0 26px;">{{ __('messages.challenge.invite_desc') }}</p>

    <a href="{{ route('challenge.start', $challenge->code) }}" style="display:inline-block;width:100%;box-sizing:border-box;padding:14px;margin-bottom:14px;border-radius:10px;background:#155FC9;color:#fff;text-decoration:none;font-weight:700;">
        {{ __('messages.challenge.start_button') }}
    </a>

    <div style="display:flex;align-items:center;gap:8px;">
        <input id="ast-challenge-link" type="text" readonly value="{{ route('challenge.show', $challenge->code) }}" style="flex:1;padding:10px;border-radius:8px;border:1px solid #ddd;">
        <button type="button" onclick="copyChallengeLink(this)" style="padding:10px 16px;border-radius:8px;border:none;background:#F2F6FB;color:#155FC9;font-weight:700;cursor:pointer;">
            {{ __('messages.challenge.copy_link') }}
        </button>
    </div>
</div>

<script>
function copyChallengeLink(btn) {
    const input = document.getElementById('ast-challenge-link');
    if (!input) return;
    input.select();
    input.setSelectionRange(0, 99999);

    const originalLabel = btn.textContent;
    const markCopied = function () {
        btn.textContent = {!! \Illuminate\Support\Js::from(__('messages.challenge.link_copied')) !!};
        setTimeout(function () { btn.textContent = originalLabel; }, 2000);
    };

    if (navigator.clipboard && navigator.clipboard.writeText) {
        navigator.clipboard.writeText(input.value).then(markCopied).catch(function () {
            document.execCommand('copy');
            markCopied();
        });
    } else {
        document.execCommand('copy');
        markCopied();
    }
}
</script>

</body>
</html>
