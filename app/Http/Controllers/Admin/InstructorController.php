<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Instructor;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class InstructorController extends Controller
{
    public function index(): View
    {
        $instructors = Instructor::orderBy('sort_order')->orderByDesc('id')->paginate(15);

        return view('admin.instructors.index', compact('instructors'));
    }

    public function create(): View
    {
        return view('admin.instructors.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validated($request);

        if ($request->hasFile('photo')) {
            $data['photo'] = $request->file('photo')->store('instructors', 'public');
        }

        Instructor::create($data);

        return redirect()->route('admin.instructors.index')->with('success', 'Instructor added.');
    }

    public function edit(Instructor $instructor): View
    {
        return view('admin.instructors.edit', compact('instructor'));
    }

    public function update(Request $request, Instructor $instructor): RedirectResponse
    {
        $data = $this->validated($request);

        if ($request->hasFile('photo')) {
            if ($instructor->photo) {
                Storage::disk('public')->delete($instructor->photo);
            }
            $data['photo'] = $request->file('photo')->store('instructors', 'public');
        }

        $instructor->update($data);

        return redirect()->route('admin.instructors.index')->with('success', 'Instructor updated.');
    }

    public function destroy(Instructor $instructor): RedirectResponse
    {
        if ($instructor->photo) {
            Storage::disk('public')->delete($instructor->photo);
        }

        $instructor->delete();

        return back()->with('success', 'Instructor deleted.');
    }

    private function validated(Request $request): array
    {
        $data = $request->validate([
            'name' => ['required', 'string', 'max:120'],
            'photo' => ['nullable', 'image', 'max:4096'],
            'position' => ['nullable', 'string', 'max:120'],
            'experience' => ['nullable', 'string', 'max:60'],
            'description' => ['nullable', 'string', 'max:2000'],
            'phone' => ['nullable', 'string', 'max:40'],
            'social' => ['nullable', 'string', 'max:255'],
            'sort_order' => ['nullable', 'integer'],
        ]);

        $data['is_published'] = $request->boolean('is_published');
        $data['sort_order'] = $data['sort_order'] ?? 0;

        return $data;
    }
}
