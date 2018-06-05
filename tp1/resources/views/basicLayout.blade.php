<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script src="{{ asset('js/jquery-1.11.1.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/pusher.min.js') }}"></script>
    <script src="{{ asset('js/utils.js') }}"></script>

    <link href="{{ asset('css/room.css') }}" rel="stylesheet">
    <link href="{{ asset('css/navbar-top-fixed.css') }}" rel="stylesheet">
    <link href="{{ asset('css/sidebar.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap2.min.css') }}" rel="stylesheet">
    <link href="//netdna.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">

    <script>@yield('scripts')</script>
    <title>@yield('title')</title>
</head>
<body>
<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <div class="col-sm-8">
        @yield('headerMessage')
    </div>
    <div class="col-sm-1">
        <a  id="usuarios" class="navbar-brand" target="_blank" href="/users/all/{{ $user->name }}">Usuarios</a>
    </div>
    <div class="col-sm-1">
        <a class="navbar-brand" target="_blank" href="/room/all/{{ $user->name }}">Grupos</a>
    </div>
    <div class="col-sm-1">
        <a class="navbar-brand" href="/room?name={{ $user->name }}">{{ 'App\Models\Room'::mainRoom()->name }}</a>
    </div>
</nav>

@yield('content')
</body>
</html>