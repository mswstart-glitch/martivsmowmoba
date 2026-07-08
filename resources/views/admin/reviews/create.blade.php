@extends('admin.layout')

@section('title', 'Add Review')

@section('content')
    <div class="card">
        <form class="form-grid" method="POST" action="{{ route('admin.reviews.store') }}" enctype="multipart/form-data">
            @include('admin.reviews._form')
        </form>
    </div>
@endsection
