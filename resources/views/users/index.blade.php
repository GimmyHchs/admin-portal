@extends('layouts.portal')

@section('body')
<div class="card" style="min-height:550px;">
    <div class="card-block">
        <table class="table table-hover">
            <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Email</th>
                <th>updated</th>
                <th>actions</th>
            </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                    <th scope="row">{{$user->id}}</th>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->updated_at}}</td>
                    <td>123</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

{{ $users->links() }}

@endsection
