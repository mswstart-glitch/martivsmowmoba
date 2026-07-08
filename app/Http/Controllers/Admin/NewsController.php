<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\View\View;

class NewsController extends Controller
{
    public function index(): View
    {
        $news = News::latest()->paginate(15);

        return view('admin.news.index', compact('news'));
    }

    public function create(): View
    {
        return view('admin.news.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validated($request);
        $data['slug'] = $this->uniqueSlug($data['slug'] ?? '' ?: $data['title']);

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('news', 'public');
        }

        $data['published_at'] = !empty($data['is_published']) ? now() : null;

        News::create($data);

        return redirect()->route('admin.news.index')->with('success', 'News post created.');
    }

    public function edit(News $news): View
    {
        return view('admin.news.edit', compact('news'));
    }

    public function update(Request $request, News $news): RedirectResponse
    {
        $data = $this->validated($request, $news->id);
        $data['slug'] = $this->uniqueSlug($data['slug'] ?? '' ?: $data['title'], $news->id);

        if ($request->hasFile('image')) {
            if ($news->image) {
                Storage::disk('public')->delete($news->image);
            }
            $data['image'] = $request->file('image')->store('news', 'public');
        }

        if (!empty($data['is_published']) && !$news->is_published) {
            $data['published_at'] = now();
        } elseif (empty($data['is_published'])) {
            $data['published_at'] = null;
        }

        $news->update($data);

        return redirect()->route('admin.news.index')->with('success', 'News post updated.');
    }

    public function destroy(News $news): RedirectResponse
    {
        if ($news->image) {
            Storage::disk('public')->delete($news->image);
        }

        $news->delete();

        return back()->with('success', 'News post deleted.');
    }

    private function validated(Request $request, ?int $ignoreId = null): array
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:180'],
            'slug' => ['nullable', 'string', 'max:180', 'alpha_dash'],
            'image' => ['nullable', 'image', 'max:4096'],
            'short_description' => ['nullable', 'string', 'max:500'],
            'content' => ['nullable', 'string'],
        ]);

        $data['is_published'] = $request->boolean('is_published');

        return $data;
    }

    private function uniqueSlug(string $base, ?int $ignoreId = null): string
    {
        $slug = Str::slug($base) ?: Str::random(8);
        $original = $slug;
        $i = 1;

        while (News::where('slug', $slug)->when($ignoreId, fn ($q) => $q->where('id', '!=', $ignoreId))->exists()) {
            $slug = $original . '-' . $i++;
        }

        return $slug;
    }
}
