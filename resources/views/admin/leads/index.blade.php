@extends('admin.layout')

@section('title', 'Leads / Orders')
@section('subtitle', 'Everyone who registered or ordered a course from the website.')

@section('content')
    <div class="card">
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Course / Category</th>
                    <th>Message</th>
                    <th>Status</th>
                    <th>Received</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($leads as $lead)
                    <tr>
                        <td>{{ $lead->full_name }}</td>
                        <td>{{ $lead->phone }}</td>
                        <td>{{ $lead->course_type }}</td>
                        <td style="max-width:260px;">{{ \Illuminate\Support\Str::limit($lead->message, 80) ?: '—' }}</td>
                        <td>
                            <form method="POST" action="{{ route('admin.leads.status', $lead) }}" style="display:flex; gap:6px; align-items:center;">
                                @csrf
                                @method('PATCH')
                                <select name="status" onchange="this.form.submit()" style="padding:6px 8px; border-radius:7px; border:1px solid var(--chrome); font-size:12.5px;">
                                    @foreach ($statuses as $status)
                                        <option value="{{ $status }}" @selected($lead->status === $status)>{{ ucfirst($status) }}</option>
                                    @endforeach
                                </select>
                            </form>
                        </td>
                        <td>{{ $lead->created_at->format('d.m.Y H:i') }}</td>
                    </tr>
                @empty
                    <tr><td colspan="6" class="empty-state">No leads yet. New orders from the website will appear here automatically.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <div style="margin-top:20px;">
        {{ $leads->links() }}
    </div>
@endsection
