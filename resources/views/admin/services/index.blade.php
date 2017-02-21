@extends('layouts.admin')
@section('content')
<h1>Services</h1>

@if(Session::has('service_update'))

	<p class="alert alert-info">{{session('service_update')}}</p>
@endif

@if(Session::has('service_added'))

	<p class="alert alert-success">{{session('service_added')}}</p>
@endif

<table class="table table-striped">
    <thead>
      <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Description</th>
        <th>Created</th>
        <th>Updated</th>
        <th>Image</th>
      </tr>
    </thead>
    <tbody>
    @if($services)

    @foreach($services as $service)
      <tr>
        <td>{{$service->id}}</td>
        <td> <a href="{{route('services.edit',$service->id)}}">{{$service->name}}</a></td>
       
        <td>{{$service->description}}</td>
        <td>{{$service->created_at->diffForHumans()}}</td>
        <td>{{$service->updated_at->diffForHumans()}}</td>
        <td><img style="height:50px; width: 50px;" class="img-rounded img-responsive" src="{{URL::to($service->image_src)}}"/></td>
      </tr>
      
     @endforeach
     @endif
    </tbody>
  </table>


@stop