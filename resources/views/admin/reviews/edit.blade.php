@extends('admin.layout')

@section('title', 'Edit Review')

@section('content')
    <div class="card">
        <form class="form-grid" method="POST" action="{{ route('admin.reviews.update', $review) }}" enctype="multipart/form-data">
            @include('admin.reviews._form')
        </form>
    </div>
@endsection
