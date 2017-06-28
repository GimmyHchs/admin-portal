@extends('layouts.portal')

@section('body')
    <div class="card">
        <div class="card-header">
            Edit User
        </div>
        <div class="card-block">
            @if(count($errors) > 0)
                <div class="alert alert-danger" role="alert">
                    @foreach ($errors->all() as $message)
                        <li>{{ $message }}</li>
                    @endforeach
                </div>
            @endif
            <form action="{{route('users.update', $user->id)}}" method="post">
                {{ csrf_field() }}
                {{ method_field('PATCH') }}
                <div class="form-group row">
                    <label class="col-2 col-form-label">Email</label>
                    <div class="col-10">
                        <input name="email" class="form-control" type="email" value="{{ $user->email }}" disabled required>
                        <input name="email" class="form-control" type="hidden" value="{{ $user->email }}" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-2 col-form-label">Name</label>
                    <div class="col-10">
                        <input name="name" class="form-control" type="text" value="{{ $user->name }}" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-2 col-form-label">Password</label>
                    <div class="col-10">
                        <input name="password" class="form-control" type="password" placeholder="Keep empty to use origin password">
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-2 col-form-label">Password Confirmation</label>
                    <div class="col-10">
                        <input name="password_confirmation" class="form-control" placeholder="Keep empty to use origin password" type="password">
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-2 col-form-label"></label>
                    <div class="col-10">
                        <button type="submit" class="btn btn-primary right">Update</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
@endsection
