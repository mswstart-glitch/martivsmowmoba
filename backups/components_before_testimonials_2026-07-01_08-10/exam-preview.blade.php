@props([
    'eyebrow' => 'სცადე ახლავე',
    'title' => 'გამოცდის სიმულატორი',
    'desc' => 'ივარჯიშე რეალურ საგამოცდო ბილეთებზე, ისეთივე დროის ლიმიტითა და ფორმატით, როგორიც სააგენტოშია — სანამ ნამდვილ გამოცდაზე მიხვალ.',
])

<section class="ast-exam" id="exam-preview">
    <div class="ast-exam__inner">
        <div class="ast-exam__copy">
            <span class="ast-exam__eyebrow">{{ $eyebrow }}</span>
            <h2 class="ast-exam__title">{{ $title }}</h2>
            <p class="ast-exam__desc">{{ $desc }}</p>

            <ul class="ast-exam__points">
                <li><i class="ti ti-check" aria-hidden="true"></i>500+ რეალური საგამოცდო ბილეთი</li>
                <li><i class="ti ti-check" aria-hidden="true"></i>დროის ნამდვილი ლიმიტი</li>
                <li><i class="ti ti-check" aria-hidden="true"></i>დეტალური განმარტება არასწორ პასუხებზე</li>
            </ul>

            <a href="{{ route('exam.index') }}" class="ast-exam__cta">
                სცადე უფასოდ
                <i class="ti ti-arrow-right" aria-hidden="true"></i>
            </a>
        </div>

        <div class="ast-exam__preview">
            <div class="ast-exam__device">
                <div class="ast-exam__device-top">
                    <span class="ast-exam__progress-label">კითხვა 7 / 30</span>
                    <span class="ast-exam__timer"><i class="ti ti-clock" aria-hidden="true"></i> 00:42</span>
                </div>

                <div class="ast-exam__progress-track">
                    <div class="ast-exam__progress-fill"></div>
                </div>

                <div class="ast-exam__sign"><i class="ti ti-octagon" aria-hidden="true"></i></div>

                <p class="ast-exam__question">
                    რომელ შემთხვევაში გაქვს გასწრების უფლება ორმხრივი მოძრაობის გზაზე?
                </p>

                <div class="ast-exam__options">
                    <div class="ast-exam__option">
                        <span class="ast-exam__option-letter">A</span>
                        <span class="ast-exam__option-text">ნებისმიერ მონაკვეთზე, თუ გზა თავისუფალია</span>
                    </div>

                    <div class="ast-exam__option is-wrong">
                        <span class="ast-exam__option-letter">B</span>
                        <span class="ast-exam__option-text">გადასასვლელთან, თუ ჩქარობ</span>
                        <i class="ti ti-x" aria-hidden="true"></i>
                    </div>

                    <div class="ast-exam__option is-correct">
                        <span class="ast-exam__option-letter">C</span>
                        <span class="ast-exam__option-text">როცა საკმარისი ხილვადობა და თავისუფალი ზოლია</span>
                        <i class="ti ti-check" aria-hidden="true"></i>
                    </div>

                    <div class="ast-exam__option">
                        <span class="ast-exam__option-letter">D</span>
                        <span class="ast-exam__option-text">მხოლოდ მოსახვევში</span>
                    </div>
                </div>

                <div class="ast-exam__dots">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span class="is-active"></span>
                    <span></span>
                    <span></span>
                </div>
            </div>

            <div class="ast-exam__glow" aria-hidden="true"></div>
        </div>
    </div>
</section>

<style>
.ast-exam{
    --ink:#0B1E3D; --ink-soft:#46587A; --paper:#FFFFFF; --paper-tint:#F2F6FB;
    --blue:#155FC9; --blue-deep:#0B3E86; --blue-light:#5FA8F5;
    --chrome:#D7DEE8; --red:#D7423F; --green:#2FA866;
    position:relative;
    background:var(--paper-tint);
    padding:70px clamp(20px,4vw,56px) 80px;
    font-family:'Noto Sans Georgian',sans-serif;
    color:var(--ink);
}
.ast-exam *{box-sizing:border-box}
.ast-exam__inner{max-width:1080px;margin:0 auto;display:grid;grid-template-columns:1fr 1fr;gap:56px;align-items:center}
.ast-exam__eyebrow{display:inline-block;font-family:'Space Mono';font-size:11px;font-weight:700;letter-spacing:2px;color:var(--blue-deep);background:#fff;border:1px solid rgba(21,95,201,.25);border-radius:2px;padding:5px 12px;margin-bottom:18px}
.ast-exam__title{font-family:'Noto Serif Georgian';font-weight:800;font-size:clamp(26px,3.4vw,36px);line-height:1.18;margin:0 0 16px;color:var(--ink)}
.ast-exam__desc{font-size:14.5px;line-height:1.75;color:var(--ink-soft);margin:0 0 22px;max-width:420px}
.ast-exam__points{list-style:none;margin:0 0 28px;padding:0;display:flex;flex-direction:column;gap:11px}
.ast-exam__points li{display:flex;align-items:center;gap:9px;font-size:13.5px;color:var(--ink-soft)}
.ast-exam__points li i{color:var(--blue);font-size:16px;flex-shrink:0}
.ast-exam__cta{display:inline-flex;align-items:center;gap:8px;text-decoration:none;font-family:'Space Mono';font-weight:700;font-size:13px;letter-spacing:.5px;color:#fff;background:linear-gradient(135deg,var(--blue-light),var(--blue-deep));border-radius:6px;padding:13px 22px;box-shadow:0 12px 24px -12px rgba(11,62,134,.6);transition:transform .25s ease}
.ast-exam__cta:hover{transform:translateY(-2px)}
.ast-exam__preview{position:relative;display:flex;justify-content:center}
.ast-exam__glow{position:absolute;width:340px;height:340px;border-radius:50%;background:radial-gradient(circle,rgba(21,95,201,.14),transparent 70%);filter:blur(40px);z-index:0}
.ast-exam__device{position:relative;z-index:1;width:100%;max-width:330px;background:#fff;border:1px solid var(--chrome);border-radius:18px;padding:22px 22px 20px;box-shadow:0 32px 60px -24px rgba(11,30,61,.3)}
.ast-exam__device-top{display:flex;justify-content:space-between;align-items:center;margin-bottom:10px}
.ast-exam__progress-label{font-family:'Space Mono';font-size:11px;font-weight:700;color:var(--blue-deep)}
.ast-exam__timer{display:flex;align-items:center;gap:5px;font-family:'Space Mono';font-size:11px;font-weight:700;color:var(--red)}
.ast-exam__timer i{font-size:13px}
.ast-exam__progress-track{height:5px;border-radius:3px;background:var(--paper-tint);overflow:hidden;margin-bottom:20px}
.ast-exam__progress-fill{height:100%;width:23%;border-radius:3px;background:linear-gradient(90deg,var(--blue-light),var(--blue));animation:astExamFill 1.2s ease both}
.ast-exam__sign{width:42px;height:42px;border-radius:10px;background:linear-gradient(155deg,var(--blue-light),var(--blue-deep));display:flex;align-items:center;justify-content:center;color:#fff;font-size:22px;margin-bottom:14px;box-shadow:0 8px 16px -8px rgba(21,95,201,.5)}
.ast-exam__question{font-size:14px;font-weight:500;line-height:1.55;color:var(--ink);margin:0 0 18px}
.ast-exam__options{display:flex;flex-direction:column;gap:9px;margin-bottom:18px}
.ast-exam__option{position:relative;display:flex;align-items:center;gap:10px;border:1px solid var(--chrome);border-radius:8px;padding:10px 12px;font-size:12.5px;color:var(--ink-soft);transition:border-color .2s ease}
.ast-exam__option-letter{width:22px;height:22px;flex-shrink:0;border-radius:50%;background:var(--paper-tint);display:flex;align-items:center;justify-content:center;font-family:'Space Mono';font-size:10.5px;font-weight:700;color:var(--ink-soft)}
.ast-exam__option-text{flex:1}
.ast-exam__option i{font-size:15px;flex-shrink:0}
.ast-exam__option.is-correct{border-color:var(--green);background:rgba(47,168,102,.06);color:var(--ink)}
.ast-exam__option.is-correct .ast-exam__option-letter{background:var(--green);color:#fff}
.ast-exam__option.is-correct i{color:var(--green)}
.ast-exam__option.is-wrong{border-color:var(--red);background:rgba(215,66,63,.06);color:var(--ink-soft);text-decoration:line-through}
.ast-exam__option.is-wrong .ast-exam__option-letter{background:var(--red);color:#fff}
.ast-exam__option.is-wrong i{color:var(--red)}
.ast-exam__dots{display:flex;justify-content:center;gap:6px}
.ast-exam__dots span{width:6px;height:6px;border-radius:50%;background:var(--chrome)}
.ast-exam__dots span.is-active{background:var(--blue);width:18px;border-radius:3px}
@keyframes astExamFill{from{width:0}to{width:23%}}
@media(max-width:880px){
    .ast-exam__inner{grid-template-columns:1fr;gap:40px;text-align:center}
    .ast-exam__points{align-items:center}
    .ast-exam__desc{margin-left:auto;margin-right:auto}
}
</style>
