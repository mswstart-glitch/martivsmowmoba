<!DOCTYPE html>
<html lang="ka">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DriveLab.ge</title>
</head>
<body>
    <x-hero-header />
    <x-pricing-cards />

    <x-trust-section />

    <x-testimonials :reviews="$reviewsData ?? null" :average-rating="$averageRating ?? null" :review-count="$reviewCount ?? null" />
    <x-process-timeline />
    <x-instructors :instructors="$instructorsData ?? null" />
    <x-exam-preview />
    <x-friend-challenge />
    <x-news-section :news-items="$newsData ?? null" />
    <x-site-footer />
</body>
</html>
