@extends('admin.layout')

@section('title', 'Edit News Post')

@section('content')
    <div class="card">
        <form class="form-grid" method="POST" action="{{ route('admin.news.update', $news) }}" enctype="multipart/form-data">
            @include('admin.news._form')
        </form>
    </div>
@endsection
