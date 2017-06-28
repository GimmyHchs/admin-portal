@extends('layouts.portal')

@section('body')
@if (session()->has('success'))
    <div class="alert alert-success" role="alert">
        <strong>Success!</strong> {{ session()->get('success') }}
    </div>
@endif

<div class="card" style="min-height:550px;">
    <div class="card-block">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>updated</th>
                <th style="text-align: right;"></th>
            </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                    <th scope="row">{{$user->id}}</th>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->updated_at}}</td>
                    <td style="text-align: right;">
                        <a href="{{route('users.edit', $user->id)}}">
                            <button type="button" class="btn btn-outline-info">Edit</button>
                        </a>
                        <a href="{{route('users.destroy', $user->id)}}" data-method="delete" data-confirm="Are you sure?">
                            <button type="button" class="btn btn-outline-danger">Delete</button>
                        </a>
                    </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

{{ $users->links() }}

@endsection
