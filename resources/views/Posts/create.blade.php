<!DOCTYPE html>
<html>
<head>
    <title>إنشاء منشور جديد</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1>إنشاء منشور جديد</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- method - action - name ,  --}}
    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="hidden" name="user_id" value = '1'>
        <div class="mb-3">
            <label for="title" class="form-label">العنوان</label>
            <input type="text" name="title" class="form-control" id="title" placeholder="عنوان المنشور">
        </div>
        <div class="mb-3">
            <label for="body" class="form-label">المحتوى</label>
            <textarea class="form-control" style="height:150px" name="body" id="body" placeholder="محتوى المنشور"></textarea>
        </div>
        <input type="file" name="image" id="">
        <button type="submit" class="btn btn-success">حفظ</button>
        <a class="btn btn-secondary" href="">العودة</a>
    </form>
</div>
</body>
</html>
