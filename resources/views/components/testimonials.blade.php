@props([
    'eyebrow'       => null,
    'title'         => null,
    'averageRating' => null,
    'reviewCount'   => null,
    'reviews'       => null,
])

@php
    $eyebrow = $eyebrow ?? __('messages.testimonials.eyebrow');
    $title = $title ?? __('messages.testimonials.title');
    $averageRating = $averageRating ?? __('messages.testimonials.average_rating');
    $reviewCount = $reviewCount ?? __('messages.testimonials.review_count');
@endphp

@once
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Noto+Serif+Georgian:wght@600;700;800&family=Noto+Sans+Georgian:wght@400;500;600&family=Space+Mono:wght@700&display=swap">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tabler-icons/2.47.0/iconfont/tabler-icons.min.css">
@endonce

@php
    $reviews = $reviews ?? __('messages.testimonials.reviews');
@endphp

<section class="ast-reviews">
    <div class="ast-reviews__head">
        <span class="ast-reviews__eyebrow">{{ $eyebrow }}</span>
        <h2 class="ast-reviews__title">{{ $title }}</h2>

        <div class="ast-reviews__summary">
            <span class="ast-reviews__summary-score">{{ $averageRating }}</span>

            <div class="ast-reviews__summary-right">
                <div class="ast-reviews__summary-stars">
                    <i class="ti ti-star-filled" aria-hidden="true"></i>
                    <i class="ti ti-star-filled" aria-hidden="true"></i>
                    <i class="ti ti-star-filled" aria-hidden="true"></i>
                    <i class="ti ti-star-filled" aria-hidden="true"></i>
                    <i class="ti ti-star-filled" aria-hidden="true"></i>
                </div>

                <span class="ast-reviews__summary-count">{{ $reviewCount }} {{ __('messages.testimonials.review_count_suffix') }}</span>
            </div>
        </div>
    </div>

    <div class="ast-reviews__grid">
        @foreach ($reviews as $review)
            <article class="ast-reviews__card">
                <div class="ast-reviews__card-shine" aria-hidden="true"></div>
                <i class="ti ti-quote ast-reviews__quote-mark" aria-hidden="true"></i>

                <div class="ast-reviews__stars">
                    @for ($s = 1; $s <= 5; $s++)
                        <i class="ti {{ $s <= $review['rating'] ? 'ti-star-filled' : 'ti-star' }}" aria-hidden="true"></i>
                    @endfor
                </div>

                <p class="ast-reviews__text">{{ $review['quote'] }}</p>

                <div class="ast-reviews__person">
                    @if(!empty($review['photo']))
                        <img src="{{ $review['photo'] }}" class="ast-reviews__avatar ast-reviews__avatar--photo" alt="">
                    @else
                        <span class="ast-reviews__avatar">{{ $review['initials'] }}</span>
                    @endif

                    <div class="ast-reviews__person-info">
                        <span class="ast-reviews__name">{{ $review['name'] }}</span>
                        @if(!empty($review['pkg']))
                            <span class="ast-reviews__pkg">{{ $review['pkg'] }}</span>
                        @endif
                    </div>
                </div>
            </article>
        @endforeach
    </div>
</section>

<style>
.ast-reviews{
    --ink:#0B1E3D; --ink-soft:#46587A; --paper:#FFFFFF; --paper-tint:#F2F6FB;
    --blue:#155FC9; --blue-deep:#0B3E86; --blue-light:#5FA8F5;
    --chrome:#D7DEE8; --chrome-deep:#A9B6C8; --gold:#E8A93C;
    position:relative;
    background:
        radial-gradient(circle at 80% 10%, rgba(95,168,245,.12), transparent 26%),
        var(--paper);
    padding:34px clamp(20px,4vw,56px) 84px;
    font-family:'Noto Sans Georgian',sans-serif;
    color:var(--ink);
}

.ast-reviews *{box-sizing:border-box;}

.ast-reviews__head{
    text-align:center;
    max-width:620px;
    margin:0 auto 48px;
}

.ast-reviews__eyebrow{
    display:inline-block;
    font-family:'Space Mono',monospace;
    font-size:11px;
    font-weight:700;
    letter-spacing:2px;
    color:var(--blue-deep);
    background:var(--paper-tint);
    border:1px solid rgba(21,95,201,0.25);
    border-radius:999px;
    padding:7px 14px;
    margin-bottom:18px;
}

.ast-reviews__title{
    font-family:'Noto Serif Georgian',serif;
    font-weight:800;
    font-size:clamp(28px,3.6vw,38px);
    line-height:1.18;
    margin:0 0 24px;
    color:var(--ink);
}

.ast-reviews__summary{
    display:inline-flex;
    align-items:center;
    gap:16px;
    background:var(--paper-tint);
    border:1px solid var(--chrome);
    border-radius:16px;
    padding:14px 22px;
}

.ast-reviews__summary-score{
    font-family:'Space Mono',monospace;
    font-weight:700;
    font-size:32px;
    color:var(--blue-deep);
}

.ast-reviews__summary-right{
    display:flex;
    flex-direction:column;
    align-items:flex-start;
    gap:3px;
}

.ast-reviews__summary-stars{
    color:var(--gold);
    font-size:14px;
    display:flex;
    gap:2px;
}

.ast-reviews__summary-count{
    font-size:11.5px;
    color:var(--ink-soft);
}

.ast-reviews__grid{
    display:grid;
    grid-template-columns:repeat(4,1fr);
    gap:20px;
    max-width:1180px;
    margin:0 auto;
}

.ast-reviews__card{
    position:relative;
    overflow:hidden;
    background:#fff;
    border:1px solid var(--chrome);
    border-radius:18px;
    padding:28px 24px 24px;
    display:flex;
    flex-direction:column;
    min-height:260px;
    box-shadow:0 20px 45px -34px rgba(11,30,61,.4);
    transition:transform .3s ease, box-shadow .3s ease, border-color .3s ease;
}

.ast-reviews__card:hover{
    transform:translateY(-6px);
    box-shadow:0 26px 52px -24px rgba(11,30,61,0.24);
    border-color:var(--blue-light);
}

.ast-reviews__card-shine{
    position:absolute;
    top:-60%;
    left:-70%;
    width:50%;
    height:220%;
    background:linear-gradient(75deg,transparent,rgba(95,168,245,0.16),transparent);
    transform:rotate(20deg);
    pointer-events:none;
    opacity:0;
    transition:opacity .3s ease;
}

.ast-reviews__card:hover .ast-reviews__card-shine{
    opacity:1;
    animation:astReviewSweep 1.1s ease-in-out;
}

.ast-reviews__quote-mark{
    position:absolute;
    top:18px;
    right:20px;
    font-size:30px;
    color:var(--paper-tint);
}

.ast-reviews__stars{
    display:flex;
    gap:3px;
    margin-bottom:14px;
    font-size:14px;
    color:var(--gold);
}

.ast-reviews__stars .ti-star{
    color:var(--chrome-deep);
}

.ast-reviews__text{
    font-size:13.5px;
    line-height:1.7;
    color:var(--ink-soft);
    margin:0 0 22px;
    flex:1;
}

.ast-reviews__person{
    display:flex;
    align-items:center;
    gap:12px;
    border-top:1px solid var(--paper-tint);
    padding-top:16px;
}

.ast-reviews__avatar{
    width:40px;
    height:40px;
    border-radius:50%;
    flex-shrink:0;
    background:linear-gradient(155deg,var(--blue-light),var(--blue-deep));
    display:flex;
    align-items:center;
    justify-content:center;
    color:#fff;
    font-family:'Noto Serif Georgian',serif;
    font-weight:700;
    font-size:14px;
    box-shadow:0 8px 16px -8px rgba(21,95,201,0.5);
}

.ast-reviews__avatar--photo{
    object-fit:cover;
}

.ast-reviews__person-info{
    display:flex;
    flex-direction:column;
}

.ast-reviews__name{
    font-family:'Noto Serif Georgian',serif;
    font-weight:700;
    font-size:13.5px;
    color:var(--ink);
}

.ast-reviews__pkg{
    font-family:'Space Mono',monospace;
    font-size:10px;
    color:var(--blue-deep);
}

@keyframes astReviewSweep{
    0%{transform:translateX(-40%) rotate(20deg);}
    100%{transform:translateX(220%) rotate(20deg);}
}

@media (max-width:980px){
    .ast-reviews__grid{
        grid-template-columns:repeat(2,1fr);
        max-width:620px;
    }
}

@media (max-width:560px){
    .ast-reviews__grid{
        grid-template-columns:1fr;
        max-width:360px;
    }

    .ast-reviews__summary{
        flex-direction:column;
        align-items:center;
        gap:8px;
        text-align:center;
    }

    .ast-reviews__summary-right{
        align-items:center;
    }
}

@media (prefers-reduced-motion: reduce){
    .ast-reviews__card{
        transition:none;
    }

    .ast-reviews__card-shine{
        display:none;
    }
}
</style>
