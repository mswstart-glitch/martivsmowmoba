@extends('admin.layout')

@section('title', 'Reviews')
@section('subtitle', 'Published reviews appear automatically on the website.')

@section('topbar-actions')
    <a href="{{ route('admin.reviews.create') }}" class="btn btn-primary"><i class="ti ti-plus" aria-hidden="true"></i> Add review</a>
@endsection

@section('content')
    <div class="card">
        <table>
            <thead>
                <tr>
                    <th>Photo</th>
                    <th>Student</th>
                    <th>Rating</th>
                    <th>Review</th>
                    <th>Status</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($reviews as $review)
                    <tr>
                        <td>
                            @if($review->photo)
                                <img src="{{ asset('storage/' . $review->photo) }}" class="thumb" style="border-radius:50%;" alt="">
                            @else
                                <div class="thumb" style="border-radius:50%;"></div>
                            @endif
                        </td>
                        <td>{{ $review->student_name }}</td>
                        <td>{{ str_repeat('★', $review->rating) }}{{ str_repeat('☆', 5 - $review->rating) }}</td>
                        <td style="max-width:280px;">{{ \Illuminate\Support\Str::limit($review->review_text, 70) }}</td>
                        <td><span class="badge {{ $review->is_published ? 'badge-published' : 'badge-draft' }}">{{ $review->is_published ? 'Published' : 'Draft' }}</span></td>
                        <td style="display:flex; gap:8px;">
                            <a href="{{ route('admin.reviews.edit', $review) }}" class="btn btn-sm">Edit</a>
                            <form method="POST" action="{{ route('admin.reviews.destroy', $review) }}" onsubmit="return confirm('Delete this review?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="6" class="empty-state">No reviews yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div style="margin-top:20px;">
        {{ $reviews->links() }}
    </div>
@endsection
