<html>
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" />
    <script src="{{ asset('js/jquery.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <script src="{{ asset('js/init.js') }}"></script>
</head>
<body>
<nav class="navbar navbar-inverse" >
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" href="http://laravel.dev/adminhome">Kino</a>
        </div>
        <ul class="nav navbar-nav">
            <li class="active"><a href="http://laravel.dev/adminhome">Home</a></li>
        </ul>
        <ul class="nav navbar-nav">
            <li><a href="{{ route('films') }}">Films</a></li>
        </ul>
    </div>
</nav>

@yield('content')

</body>
</html>