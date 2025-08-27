@extends('posts.layouts.layout')

@section('title')
تعديل المنشور
@endsection
@section('content')
<div class="container mt-5">
    <h1>تعديل المنشور</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title" class="form-label">العنوان</label>
            <input type="text" name="title" class="form-control" id="title" value="{{ $post->title }}">
        </div>
        <div class="mb-3">
            <label for="body" class="form-label">المحتوى</label>
            <textarea class="form-control" style="height:150px" name="body" id="body">{{ $post->body }}</textarea>
        </div>
        <div class="mb-3">
            <input type="file" name="image" id="image">
        </div>
        
        <div class="mb-3">
            <img src="{{ asset("storage/$post->image") }}">
        </div>
        <button type="submit" class="btn btn-success">تحديث</button>
        <a class="btn btn-secondary" href="{{ route('posts.index') }}">العودة</a>
    </form>
</div>

@endsection
