@extends('layouts.base')

@section('body')
    <div class="row">
        <div class="col-6 offset-md-3">
            <reset-password-form :email="'{{$email}}'"></reset-password-form>
        </div>
    </div>
@endsection
