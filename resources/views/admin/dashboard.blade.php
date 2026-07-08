@extends('admin.layout')

@section('title', 'Dashboard')
@section('subtitle', 'Overview of leads and site content.')

@section('content')
    <div class="stat-grid">
        <div class="stat-card">
            <span class="stat-num">{{ $stats['leads_total'] }}</span>
            <span class="stat-label">Total leads / orders</span>
        </div>
        <div class="stat-card">
            <span class="stat-num">{{ $stats['leads_new'] }}</span>
            <span class="stat-label">New leads awaiting contact</span>
        </div>
        <div class="stat-card">
            <span class="stat-num">{{ $stats['news_total'] }}</span>
            <span class="stat-label">News posts</span>
        </div>
        <div class="stat-card">
            <span class="stat-num">{{ $stats['instructors_total'] }}</span>
            <span class="stat-label">Instructors</span>
        </div>
        <div class="stat-card">
            <span class="stat-num">{{ $stats['reviews_total'] }}</span>
            <span class="stat-label">Reviews</span>
        </div>
    </div>

    <div class="card">
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Course</th>
                    <th>Status</th>
                    <th>Received</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($latestLeads as $lead)
                    <tr>
                        <td>{{ $lead->full_name }}</td>
                        <td>{{ $lead->phone }}</td>
                        <td>{{ $lead->course_type }}</td>
                        <td><x-admin.status-badge :status="$lead->status" /></td>
                        <td>{{ $lead->created_at->format('d.m.Y H:i') }}</td>
                    </tr>
                @empty
                    <tr><td colspan="5" class="empty-state">No leads yet.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
@endsection
