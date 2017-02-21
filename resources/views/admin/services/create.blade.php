@extends('layouts.admin')
@section('content')


<h1>Create Service</h1>


@if(count($errors) > 0)

<div class="alert alert-danger">
	<ul>
		@foreach($errors->all() as $error)
		<li>{{$error}}</li>
		@endforeach
	</ul>
</div>

@endif

{!! Form::open(['method'=>'POST', 'action'=>'ServiceController@store','files'=>true]) !!}

<div class="row">

<div class="col-md-6">
	    <div class="form-group">
		   
		    {!! Form::label('name' , 'Name') !!} 
		    {!! Form::text('name', null, ['class'=>'form-control','id'=>'name','placeholder'=>'Enter Name']) !!}
		    
	  	</div>

	  	<div class="form-group">
		   
		    {!! Form::label('description' , 'Description') !!} 
		    {!! Form::text('description', null, ['class'=>'form-control','id'=>'description','placeholder'=>'Enter Description']) !!}
		    
	  	</div>

	  	<div class="form-group">
	  	{!! Form::label('image' , 'Image Source') !!} 
		    {!! Form::file('image[]',  ['class'=>'form-control','id'=>'image','multiple'=>'multiple']) !!}
	  </div>

	{!! Form::submit('Add Service', ['class' => 'btn btn-primary']) !!}

    {!! Form::close() !!}

</div>
</div>








@stop