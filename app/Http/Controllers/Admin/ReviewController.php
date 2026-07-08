<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ReviewController extends Controller
{
    public function index(): View
    {
        $reviews = Review::orderBy('sort_order')->orderByDesc('id')->paginate(15);

        return view('admin.reviews.index', compact('reviews'));
    }

    public function create(): View
    {
        return view('admin.reviews.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validated($request);

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('reviews', 'public');
        }

        Review::create($data);

        return redirect()->route('admin.reviews.index')->with('success', 'Review added.');
    }

    public function edit(Review $review): View
    {
        return view('admin.reviews.edit', compact('review'));
    }

    public function update(Request $request, Review $review): RedirectResponse
    {
        $data = $this->validated($request);

        if ($request->hasFile('photo')) {
            if ($review->photo) {
                Storage::disk('public')->delete($review->photo);
            }
            $data['photo'] = $request->file('photo')->store('reviews', 'public');
        }

        $review->update($data);

        return redirect()->route('admin.reviews.index')->with('success', 'Review updated.');
    }

    public function destroy(Review $review): RedirectResponse
    {
        if ($review->photo) {
            Storage::disk('public')->delete($review->photo);
        }

        $review->delete();

        return back()->with('success', 'Review deleted.');
    }

    private function validated(Request $request): array
    {
        $data = $request->validate([
            'student_name' => ['required', 'string', 'max:120'],
            'photo' => ['nullable', 'image', 'max:4096'],
            'rating' => ['required', 'integer', 'min:1', 'max:5'],
            'review_text' => ['required', 'string', 'max:2000'],
            'sort_order' => ['nullable', 'integer'],
        ]);

        $data['is_published'] = $request->boolean('is_published');
        $data['sort_order'] = $data['sort_order'] ?? 0;

        return $data;
    }
}
