@extends('layouts.admin')
@section('content')
<h1>Vendors</h1>

@if(Session::has('vendor_update'))

	<p class="alert alert-info">{{session('vendor_update')}}</p>
@endif

@if(Session::has('vendor_added'))

	<p class="alert alert-success">{{session('vendor_added')}}</p>
@endif

<table class="table table-striped">
    <thead>
      <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Username</th>
        <th>Created</th>
        <th>Updated</th>
      </tr>
    </thead>
    <tbody>
    @if($vendors)

    @foreach($vendors as $vendor)
      <tr>
        <td>{{$vendor->id}}</td>
        <td> <a href="{{route('vendors.edit',$vendor->id)}}">{{$vendor->first_name . ' '.$vendor->last_name}}</a></td>
       
        <td>{{$vendor->username}}</td>
        <td>{{$vendor->created_at->diffForHumans()}}</td>
        <td>{{$vendor->updated_at->diffForHumans()}}</td>
      </tr>
      
     @endforeach
     @endif
    </tbody>
  </table>


@stop