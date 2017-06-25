@extends('layouts.base')
@section('nav')
    <nav class="navbar navbar-toggleable-md navbar-light bg-faded navbar-top">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="#">Admin Portal</a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item"><a class="nav-link" href="#">帳號管理</a></li>
            </ul>
            <ul class="nav justify-content-end">
                @if (Auth::check())
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button">{{Auth::user()->name}}</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="{{route('logout')}}">Logout</a>
                        </div>
                    <li>
                @endif
            </ul>
        </div>

    </nav>
@endsection
@section('body')
    @yield('content')
@endsection
