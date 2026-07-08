@extends('admin.layout')

@section('title', 'Edit Instructor')

@section('content')
    <div class="card">
        <form class="form-grid" method="POST" action="{{ route('admin.instructors.update', $instructor) }}" enctype="multipart/form-data">
            @include('admin.instructors._form')
        </form>
    </div>
@endsection
