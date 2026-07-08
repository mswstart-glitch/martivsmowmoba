@extends('admin.layout')

@section('title', 'Add News Post')

@section('content')
    <div class="card">
        <form class="form-grid" method="POST" action="{{ route('admin.news.store') }}" enctype="multipart/form-data">
            @include('admin.news._form')
        </form>
    </div>
@endsection
