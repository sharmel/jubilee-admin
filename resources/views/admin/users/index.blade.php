@extends('layouts.admin')
@section('content')


<h1>Users</h1>

@if(Session::has('user_update'))

	<p class="alert alert-info">{{session('user_update')}}</p>
@endif

@if(Session::has('user_added'))

	<p class="alert alert-success">{{session('user_added')}}</p>
@endif

<table class="table table-striped">
    <thead>
      <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Email</th>
        <th>Status</th>
        <th>Role</th>
        <th>Created</th>
        <th>Updated</th>
      </tr>
    </thead>
    <tbody>
    @if($users)

    @foreach($users as $user)
      <tr>
        <td>{{$user->id}}</td>
        <td> <a href="{{route('users.edit',$user->id)}}">{{$user->name}}</a></td>
        <td>{{$user->email}}</td>
        <td>{{$user->is_active == 1 ? 'Active' : 'Not Active'}}</td>
        <td>{{$user->role->name}}</td>
        <td>{{$user->created_at->diffForHumans()}}</td>
        <td>{{$user->updated_at->diffForHumans()}}</td>
      </tr>
      
     @endforeach
     @endif
    </tbody>
  </table>











@stop