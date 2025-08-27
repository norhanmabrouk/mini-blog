<!DOCTYPE html>
<html>
<head>
    <title>
        @yield('title')
    </title>
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"> --}}
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
</head>
<body>

    @yield('content')

    <script src="{{ asset('js/bootstrap.min.js') }}">

    </script>

</body>
</html>
