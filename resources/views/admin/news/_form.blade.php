@csrf
@if(isset($news))
    @method('PUT')
@endif

<div class="row-2">
    <div>
        <label for="title">Title</label>
        <input type="text" id="title" name="title" value="{{ old('title', $news->title ?? '') }}" required>
        @error('title') <div class="field-error">{{ $message }}</div> @enderror
    </div>
    <div>
        <label for="slug">Slug (optional — auto-generated from title if left blank)</label>
        <input type="text" id="slug" name="slug" value="{{ old('slug', $news->slug ?? '') }}" placeholder="e.g. new-exam-rules-2026">
        @error('slug') <div class="field-error">{{ $message }}</div> @enderror
    </div>
</div>

<div>
    <label for="image">Image</label>
    @if(!empty($news?->image))
        <div style="margin-bottom:10px;">
            <img src="{{ asset('storage/' . $news->image) }}" class="thumb" style="width:80px;height:80px;" alt="">
        </div>
    @endif
    <input type="file" id="image" name="image" accept="image/*">
    @error('image') <div class="field-error">{{ $message }}</div> @enderror
</div>

<div>
    <label for="short_description">Short description</label>
    <textarea id="short_description" name="short_description" rows="2">{{ old('short_description', $news->short_description ?? '') }}</textarea>
    @error('short_description') <div class="field-error">{{ $message }}</div> @enderror
</div>

<div>
    <label for="content">Full content</label>
    <textarea id="content" name="content" rows="10">{{ old('content', $news->content ?? '') }}</textarea>
    @error('content') <div class="field-error">{{ $message }}</div> @enderror
</div>

<div>
    <label style="display:flex; align-items:center; gap:8px;">
        <input type="checkbox" name="is_published" value="1" style="width:auto;" @checked(old('is_published', $news->is_published ?? true))>
        Published (visible on the website)
    </label>
</div>

<div style="display:flex; gap:12px;">
    <button type="submit" class="btn btn-primary">{{ isset($news) ? 'Save changes' : 'Create news post' }}</button>
    <a href="{{ route('admin.news.index') }}" class="btn">Cancel</a>
</div>
