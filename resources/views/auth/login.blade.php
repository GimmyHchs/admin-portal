@extends('layouts.base')
@section('title')
    Admin Portal Login
@endsection
@section('meta')
    <link rel="stylesheet" href="{{asset('css/auth.css')}}">
@endsection
@section('content')
    <body>
        <div id="app">
            <div class="row">
                <div class="col-6 offset-md-3">
                    <auth-panel></auth-panel>
                </div>
            </div>
        </div>
    </body>
@endsection
