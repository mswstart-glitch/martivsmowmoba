<?php

namespace App\Http\Controllers;

use App\Models\Instructor;
use App\Models\News;
use App\Models\Review;
use Illuminate\Support\Str;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(): View
    {
        $reviews = Review::published()->orderBy('sort_order')->orderByDesc('id')->get();
        $instructors = Instructor::published()->orderBy('sort_order')->orderByDesc('id')->get();
        $news = News::published()->orderByDesc('published_at')->take(3)->get();

        $reviewsData = $reviews->isEmpty() ? null : $reviews->map(fn (Review $r) => [
            'rating' => $r->rating,
            'quote' => $r->review_text,
            'initials' => $this->initials($r->student_name),
            'name' => $r->student_name,
            'photo' => $r->photo ? asset('storage/' . $r->photo) : null,
            'pkg' => null,
        ])->all();

        $instructorsData = $instructors->isEmpty() ? null : $instructors->map(fn (Instructor $i) => [
            'name' => $i->name,
            'initials' => $this->initials($i->name),
            'photo' => $i->photo ? asset('storage/' . $i->photo) : null,
            'cats' => $i->position,
            'years' => $i->experience,
            'quote' => $i->description,
            'phone' => $i->phone,
            'social' => $i->social,
            'rating' => null,
            'students' => null,
        ])->all();

        $newsData = $news->count() < 3 ? null : $news->map(fn (News $n) => [
            'date' => ($n->published_at ?? $n->created_at)->format('d.m.Y'),
            'title' => $n->title,
            'text' => $n->short_description,
            'slug' => $n->slug,
        ])->values()->all();

        return view('welcome', [
            'reviewsData' => $reviewsData,
            'instructorsData' => $instructorsData,
            'newsData' => $newsData,
            'averageRating' => $reviews->isEmpty() ? null : round($reviews->avg('rating'), 1),
            'reviewCount' => $reviews->isEmpty() ? null : $reviews->count(),
        ]);
    }

    private function initials(string $name): string
    {
        $parts = preg_split('/\s+/', trim($name)) ?: [];
        $letters = array_map(fn ($p) => Str::substr($p, 0, 1), array_slice($parts, 0, 2));

        return Str::upper(implode('', $letters)) ?: '?';
    }
}
