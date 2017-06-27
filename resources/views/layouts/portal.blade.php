@extends('layouts.base')
@section('content')
    <body class="app header-fixed sidebar-fixed aside-menu-fixed aside-menu-hidden">
        @include('partials.header')
        <div id="app" class="app-body">
            @include('partials.sidebar')
            <main class="main">
                <div class="container-fluid" style="margin-top:25px;">
                    @yield('body')
                </div>
            </main>
        </div>
        @include('partials.footer')
    </body>
@endsection
