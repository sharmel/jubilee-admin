@extends('layouts.admin')
@section('content')
<h1>Vendors</h1>

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
    @if($vendor)

      <tr>
        <td>{{$vendor->id}}</td>
        <td> <a href="{{route('vendors.edit',$vendor->id)}}">{{$vendor->first_name . ' '.$vendor->last_name}}</a></td>
       
        <td>{{$vendor->username}}</td>
        <td>{{$vendor->created_at->diffForHumans()}}</td>
        <td>{{$vendor->updated_at->diffForHumans()}}</td>
      </tr>
      
     @endif
    </tbody>
  </table>


@stop