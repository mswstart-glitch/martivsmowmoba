@csrf
@if(isset($review))
    @method('PUT')
@endif

<div class="row-2">
    <div>
        <label for="student_name">Student name</label>
        <input type="text" id="student_name" name="student_name" value="{{ old('student_name', $review->student_name ?? '') }}" required>
        @error('student_name') <div class="field-error">{{ $message }}</div> @enderror
    </div>
    <div>
        <label for="rating">Rating (1–5)</label>
        <select id="rating" name="rating" required>
            @for ($i = 5; $i >= 1; $i--)
                <option value="{{ $i }}" @selected((int) old('rating', $review->rating ?? 5) === $i)>{{ $i }} star{{ $i > 1 ? 's' : '' }}</option>
            @endfor
        </select>
        @error('rating') <div class="field-error">{{ $message }}</div> @enderror
    </div>
</div>

<div>
    <label for="photo">Photo (optional)</label>
    @if(!empty($review?->photo))
        <div style="margin-bottom:10px;">
            <img src="{{ asset('storage/' . $review->photo) }}" class="thumb" style="width:80px;height:80px;border-radius:50%;" alt="">
        </div>
    @endif
    <input type="file" id="photo" name="photo" accept="image/*">
    @error('photo') <div class="field-error">{{ $message }}</div> @enderror
</div>

<div>
    <label for="review_text">Review text</label>
    <textarea id="review_text" name="review_text" rows="4" required>{{ old('review_text', $review->review_text ?? '') }}</textarea>
    @error('review_text') <div class="field-error">{{ $message }}</div> @enderror
</div>

<div class="row-2">
    <div>
        <label for="sort_order">Display order (lower shows first)</label>
        <input type="number" id="sort_order" name="sort_order" value="{{ old('sort_order', $review->sort_order ?? 0) }}">
    </div>
    <div style="display:flex; align-items:flex-end;">
        <label style="display:flex; align-items:center; gap:8px; margin-bottom:11px;">
            <input type="checkbox" name="is_published" value="1" style="width:auto;" @checked(old('is_published', $review->is_published ?? true))>
            Published (visible on the website)
        </label>
    </div>
</div>

<div style="display:flex; gap:12px;">
    <button type="submit" class="btn btn-primary">{{ isset($review) ? 'Save changes' : 'Add review' }}</button>
    <a href="{{ route('admin.reviews.index') }}" class="btn">Cancel</a>
</div>
