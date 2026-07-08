@extends('admin.layout')

@section('title', 'Add Instructor')

@section('content')
    <div class="card">
        <form class="form-grid" method="POST" action="{{ route('admin.instructors.store') }}" enctype="multipart/form-data">
            @include('admin.instructors._form')
        </form>
    </div>
@endsection
