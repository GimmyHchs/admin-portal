@extends('layouts.base')
@section('nav')
    <nav class="navbar navbar-toggleable-md navbar-light bg-faded navbar-top">
        <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="navbar-brand" href="#">Admin Portal</a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item"><a class="nav-link" href="/permissions">權限管理</a></li>
            </ul>
        </div>
        <ul class="nav navbar-nav navbar-right">
            @if (Auth::check())
                <ul class="dropdown">
                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        {{$user->name}}
                    </button>
                    <div class="dropdown-menu" aria-labelledby="dropdownMenu">
                        <button class="dropdown-item" type="button"><a href="{{route('logout')}}">Log out</a></button>
                    </div>
              </ul>
            @endif
        </ul>
    </nav>
@endsection
@section('body')
    {{-- <nav class="navbar navbar-default navbar-fixed-top">
        <div class="container-fluid">
            <ul class="nav navbar-nav">

            </ul>
            <ul class="nav navbar-nav navbar-right">
                @if (Auth::check())
                    <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{$user->name}} <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="{{route('logout')}}">Log out</a></li>
                    </ul>
                    </li>
                @endif
            </ul>
        </div>
    </nav> --}}

    @yield('content')
@endsection
