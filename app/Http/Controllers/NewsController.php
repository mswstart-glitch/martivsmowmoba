<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\View\View;

class NewsController extends Controller
{
    public function index(): View
    {
        $posts = News::published()->orderByDesc('published_at')->paginate(9);

        return view('news.index', compact('posts'));
    }

    public function show(string $slug): View
    {
        $post = News::published()->where('slug', $slug)->firstOrFail();

        return view('news.show', compact('post'));
    }
}
