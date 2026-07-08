@csrf
@if(isset($instructor))
    @method('PUT')
@endif

<div class="row-2">
    <div>
        <label for="name">Name</label>
        <input type="text" id="name" name="name" value="{{ old('name', $instructor->name ?? '') }}" required>
        @error('name') <div class="field-error">{{ $message }}</div> @enderror
    </div>
    <div>
        <label for="position">Position</label>
        <input type="text" id="position" name="position" value="{{ old('position', $instructor->position ?? '') }}" placeholder="e.g. Category B, B1 instructor">
        @error('position') <div class="field-error">{{ $message }}</div> @enderror
    </div>
</div>

<div class="row-2">
    <div>
        <label for="experience">Experience</label>
        <input type="text" id="experience" name="experience" value="{{ old('experience', $instructor->experience ?? '') }}" placeholder="e.g. 9 years">
        @error('experience') <div class="field-error">{{ $message }}</div> @enderror
    </div>
    <div>
        <label for="phone">Phone (optional)</label>
        <input type="tel" id="phone" name="phone" value="{{ old('phone', $instructor->phone ?? '') }}">
        @error('phone') <div class="field-error">{{ $message }}</div> @enderror
    </div>
</div>

<div>
    <label for="social">Social link (optional)</label>
    <input type="url" id="social" name="social" value="{{ old('social', $instructor->social ?? '') }}" placeholder="https://facebook.com/...">
    @error('social') <div class="field-error">{{ $message }}</div> @enderror
</div>

<div>
    <label for="photo">Photo</label>
    @if(!empty($instructor?->photo))
        <div style="margin-bottom:10px;">
            <img src="{{ asset('storage/' . $instructor->photo) }}" class="thumb" style="width:80px;height:80px;border-radius:50%;" alt="">
        </div>
    @endif
    <input type="file" id="photo" name="photo" accept="image/*">
    @error('photo') <div class="field-error">{{ $message }}</div> @enderror
</div>

<div>
    <label for="description">Description</label>
    <textarea id="description" name="description" rows="4">{{ old('description', $instructor->description ?? '') }}</textarea>
    @error('description') <div class="field-error">{{ $message }}</div> @enderror
</div>

<div class="row-2">
    <div>
        <label for="sort_order">Display order (lower shows first)</label>
        <input type="number" id="sort_order" name="sort_order" value="{{ old('sort_order', $instructor->sort_order ?? 0) }}">
    </div>
    <div style="display:flex; align-items:flex-end;">
        <label style="display:flex; align-items:center; gap:8px; margin-bottom:11px;">
            <input type="checkbox" name="is_published" value="1" style="width:auto;" @checked(old('is_published', $instructor->is_published ?? true))>
            Published (visible on the website)
        </label>
    </div>
</div>

<div style="display:flex; gap:12px;">
    <button type="submit" class="btn btn-primary">{{ isset($instructor) ? 'Save changes' : 'Add instructor' }}</button>
    <a href="{{ route('admin.instructors.index') }}" class="btn">Cancel</a>
</div>
