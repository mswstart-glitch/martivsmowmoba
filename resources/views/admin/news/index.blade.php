@extends('admin.layout')

@section('title', 'News')
@section('subtitle', 'Posts published here appear automatically on the website news section.')

@section('topbar-actions')
    <a href="{{ route('admin.news.create') }}" class="btn btn-primary"><i class="ti ti-plus" aria-hidden="true"></i> Add news post</a>
@endsection

@section('content')
    <div class="card">
        <table>
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Status</th>
                    <th>Published</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($news as $item)
                    <tr>
                        <td>
                            @if($item->image)
                                <img src="{{ asset('storage/' . $item->image) }}" class="thumb" alt="">
                            @else
                                <div class="thumb"></div>
                            @endif
                        </td>
                        <td>{{ $item->title }}</td>
                        <td><span class="badge {{ $item->is_published ? 'badge-published' : 'badge-draft' }}">{{ $item->is_published ? 'Published' : 'Draft' }}</span></td>
                        <td>{{ $item->published_at?->format('d.m.Y') ?? '—' }}</td>
                        <td style="display:flex; gap:8px;">
                            <a href="{{ route('admin.news.edit', $item) }}" class="btn btn-sm">Edit</a>
                            <form method="POST" action="{{ route('admin.news.destroy', $item) }}" onsubmit="return confirm('Delete this news post?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="empty-state">No news posts yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div style="margin-top:20px;">
        {{ $news->links() }}
    </div>
@endsection
