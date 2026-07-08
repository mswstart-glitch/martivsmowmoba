<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <title>{{ __('messages.challenge.results_title') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body style="font-family:Arial;padding:30px;background:#f3f6fb;">

<div style="max-width:560px;margin:40px auto;background:white;padding:36px 30px;border-radius:20px;box-shadow:0 20px 45px -25px rgba(11,30,61,.25);">
    <div style="font-size:13px;font-weight:700;letter-spacing:1px;color:#155FC9;margin-bottom:14px;text-align:center;">
        {{ __('messages.challenge.code_label') }}: {{ $challenge->code }}
    </div>

    <h1 style="font-size:24px;margin:0 0 20px;color:#0B1E3D;text-align:center;">{{ __('messages.challenge.results_title') }}</h1>

    @if($leaderboard->count() === 0)
        <p style="text-align:center;color:#46587A;font-size:15px;line-height:1.7;margin:0 0 24px;">
            {{ __('messages.challenge.no_results_yet') }}
        </p>
        <a href="{{ route('challenge.start', $challenge->code) }}" style="display:block;text-align:center;padding:14px;border-radius:10px;background:#155FC9;color:#fff;text-decoration:none;font-weight:700;">
            {{ __('messages.challenge.start_button') }}
        </a>
    @elseif($leaderboard->count() === 1)
        @if($mine)
            <p style="text-align:center;font-weight:700;color:#0B1E3D;margin:0 0 8px;">{{ __('messages.challenge.single_result_mine_title') }}</p>
            <p style="text-align:center;color:#46587A;font-size:15px;line-height:1.7;margin:0 0 24px;">{{ __('messages.challenge.single_result_mine_desc') }}</p>
        @else
            <p style="text-align:center;font-weight:700;color:#0B1E3D;margin:0 0 8px;">{{ __('messages.challenge.single_result_theirs_title') }}</p>
            <p style="text-align:center;color:#46587A;font-size:15px;line-height:1.7;margin:0 0 24px;">{{ __('messages.challenge.single_result_theirs_desc') }}</p>
            <a href="{{ route('challenge.start', $challenge->code) }}" style="display:block;text-align:center;padding:14px;border-radius:10px;background:#155FC9;color:#fff;text-decoration:none;font-weight:700;margin-bottom:8px;">
                {{ __('messages.challenge.start_button') }}
            </a>
        @endif

        @php $solo = $leaderboard->first(); $soloPassed = in_array($solo->id, $passedIds, true); @endphp
        <div style="background:#F2F6FB;border-radius:12px;padding:16px 18px;text-align:center;">
            {{ __('messages.challenge.leaderboard_participant') }} —
            {{ $solo->correct_count }}/{{ $solo->total_questions }} —
            {{ sprintf('%02d:%02d', intdiv($solo->time_seconds, 60), $solo->time_seconds % 60) }} —
            <strong style="color:{{ $soloPassed ? '#16a34a' : '#dc2626' }}">{{ __($soloPassed ? 'messages.challenge.passed' : 'messages.challenge.failed') }}</strong>
        </div>
    @else
        <div>
            @foreach($leaderboard as $index => $result)
                @php $rowPassed = in_array($result->id, $passedIds, true); @endphp
                <div style="display:flex;align-items:center;justify-content:space-between;padding:14px 16px;margin-bottom:10px;border-radius:12px;{{ $index === 0 ? 'background:#EAF3FF;border:1px solid #B3D2F9;' : 'background:#F2F6FB;' }}">
                    <span style="font-weight:700;color:#0B1E3D;">
                        {{ $index + 1 }}. {{ __('messages.challenge.leaderboard_participant') }}
                        @if($result->participant_session_id === session()->getId())
                            ({{ __('messages.challenge.you') }})
                        @endif
                    </span>
                    <span style="font-family:monospace;color:#46587A;">
                        {{ $result->correct_count }}/{{ $result->total_questions }} —
                        {{ sprintf('%02d:%02d', intdiv($result->time_seconds, 60), $result->time_seconds % 60) }} —
                        <strong style="color:{{ $rowPassed ? '#16a34a' : '#dc2626' }}">{{ __($rowPassed ? 'messages.challenge.passed' : 'messages.challenge.failed') }}</strong>
                    </span>
                </div>
            @endforeach
        </div>
    @endif
</div>

</body>
</html>
