@extends('layouts.admin')
@section('content')
    <h1>All Users</h1>
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Photo</th>
            <th scope="col">Name</th>
            <th scope="col">E-mail</th>
            <th scope="col">Role</th>
            <th scope="col">Active</th>
            <th scope="col">Created</th>
            <th scope="col">Updated</th>
        </tr>
        </thead>
        <tbody>
           @if ($users)
               @foreach($users as $user)
                   <tr>
                       <td>{{$user->id}}</td>
                       <td>
                           <img height="50" src="{{$user->photo ? asset($user->photo->file) :'http://place-hold.it/400x400'}}" alt="">
                       </td>
                       <td><a href="{{route('users.edit', $user->id)}}">{{$user->name}}</a></td>
                       <td>{{$user->email}}</td>
                       <td>{{$user->role_id ? $user->role->name : 'User without role'}}</td>
                       <td>{{$user->is_active == 1 ? 'Active' : 'Not Active'}}</td>
                       <td>{{$user->created_at}}</td>
                       <td>{{$user->updated_at}}</td>
                   </tr>
               @endforeach
           @endif
        </tbody>
    </table>
    <div class="row">
        <div class="col-lg-12 text-center">
            {{$users->links()}}
        </div>
    </div>
@stop
