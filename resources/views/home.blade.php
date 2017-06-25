@extends('layouts.portal')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-8 offset-md-2">
            <div class="card">
                <div class="card-header">
                    Dashboard
                </div>
                <div class="card-block">
                    <p class="card-text">
                        Hi, {{$user->name}} ! You are logged in!
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
