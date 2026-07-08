@extends('admin.layout')

@section('title', 'Instructors')
@section('subtitle', 'Published instructors appear automatically on the website.')

@section('topbar-actions')
    <a href="{{ route('admin.instructors.create') }}" class="btn btn-primary"><i class="ti ti-plus" aria-hidden="true"></i> Add instructor</a>
@endsection

@section('content')
    <div class="card">
        <table>
            <thead>
                <tr>
                    <th>Photo</th>
                    <th>Name</th>
                    <th>Position</th>
                    <th>Experience</th>
                    <th>Status</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($instructors as $instructor)
                    <tr>
                        <td>
                            @if($instructor->photo)
                                <img src="{{ asset('storage/' . $instructor->photo) }}" class="thumb" style="border-radius:50%;" alt="">
                            @else
                                <div class="thumb" style="border-radius:50%;"></div>
                            @endif
                        </td>
                        <td>{{ $instructor->name }}</td>
                        <td>{{ $instructor->position ?: '—' }}</td>
                        <td>{{ $instructor->experience ?: '—' }}</td>
                        <td><span class="badge {{ $instructor->is_published ? 'badge-published' : 'badge-draft' }}">{{ $instructor->is_published ? 'Published' : 'Draft' }}</span></td>
                        <td style="display:flex; gap:8px;">
                            <a href="{{ route('admin.instructors.edit', $instructor) }}" class="btn btn-sm">Edit</a>
                            <form method="POST" action="{{ route('admin.instructors.destroy', $instructor) }}" onsubmit="return confirm('Delete this instructor?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="6" class="empty-state">No instructors yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div style="margin-top:20px;">
        {{ $instructors->links() }}
    </div>
@endsection
