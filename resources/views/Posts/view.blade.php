@extends('posts.layouts.layout')

@section('title')
عرض المنشور
@endsection
@section('content')

    <h1>Post # {{ $post->id }}</h1>
    <ul>
            <li>{{ $post->title }}</li>
            <li>{{ $post->body }}</li>
            <li><img src="{{ asset("storage/$post->image") }}"></li>

    </ul>

@endsection
