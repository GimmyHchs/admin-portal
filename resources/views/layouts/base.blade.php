<!DOCTYPE html>
<html>
    <head>
        <title>
            @section('title')
                Admin Portal
            @show
        </title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <link rel="stylesheet" href="{{asset('css/auth.css')}}">
    </head>
    <body>
        @yield('nav')
        <div id="app" class="container">
            @yield('body')
        </div>
    </body>
    <script src="{{asset('js/app.js')}}" charset="utf-8"></script>
</html>
