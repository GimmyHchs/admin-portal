@extends('layouts.portal')

@section('body')
    <div class="card">
        <div class="card-header">
            Create User
        </div>
        <div class="card-block">
            <form action="{{route('users.index')}}" method="post">
                {{ csrf_field() }}
                <div class="form-group row">
                    <label class="col-2 col-form-label">Email</label>
                    <div class="col-10">
                        <input name="email" class="form-control" type="email" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-2 col-form-label">Name</label>
                    <div class="col-10">
                        <input name="name" class="form-control" type="text" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-2 col-form-label">Password</label>
                    <div class="col-10">
                        <input name="password" class="form-control" type="password" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-2 col-form-label">Password Confirmation</label>
                    <div class="col-10">
                        <input name="password_confirmation" class="form-control" type="password" required>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-2 col-form-label"></label>
                    <div class="col-10">
                        <button type="submit" class="btn btn-primary right">Create</button>
                    </div>
                </div>

            </form>
        </div>
    </div>
@endsection
