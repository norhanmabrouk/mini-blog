@extends('posts.layouts.layout')

@section('content')

<div class="container mt-5">
    <h1>كل المنشورات</h1>
    <a href="{{ route('posts.create') }}" class="btn btn-primary mb-3">إنشاء منشور جديد</a>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-bordered">
        <tr>
            <th>العنوان</th>
            <th>المحتوى</th>
            <th width="280px">العمليات</th>
        </tr>
        @foreach ($posts as $post)
        <tr>
            <td>{{ $post->title }}</td>
            <td>{{ Str::limit($post->body, 100) }}</td>
            <td>
                <form action="{{ route('posts.delete',$post->id) }}" method="POST">

                    <a class="btn btn-info" href="{{ route('posts.show',$post->id) }}">عرض</a>
                    {{-- <a class="btn btn-info" href="{{ url("posts/$post->id") }}">عرض</a> --}}

                    <a class="btn btn-warning" href="{{ route('posts.edit',$post->id) }}">تعديل</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">حذف</button>
                </form>
            </td>
        </tr>
        @endforeach
        {{ $posts->links() }}

    </table>

</div>

@endsection



@section('title')
كل المنشورات
@endsection
