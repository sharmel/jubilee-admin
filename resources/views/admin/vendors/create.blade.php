@extends('layouts.admin')
@section('content')
<h1>Create vendor</h1>

@if(count($errors) > 0)

<div class="alert alert-danger">
	<ul>
		@foreach($errors->all() as $error)
		<li>{{$error}}</li>
		@endforeach
	</ul>
</div>

@endif
    {!! Form::open(['method'=>'POST', 'action'=>'VendorController@store','files'=>true]) !!}

<div class="row">

<div class="col-md-6">
	    <div class="form-group">
		   
		    {!! Form::label('firsname' , 'First Name') !!} 
		    {!! Form::text('firstname', null, ['class'=>'form-control','id'=>'firstname','placeholder'=>'Enter First Name']) !!}
		    
	  	</div>
	  	<div class="form-group">
		    
		    {!! Form::label('lastname' , 'Last Name') !!} 
		    {!! Form::text('lastname', null, ['class'=>'form-control','id'=>'lastname','placeholder'=>'Enter Last Name']) !!}
	  	</div>
	  	<div class="form-group">
		    
		    {!! Form::label('username' , 'Username') !!} 
		    {!! Form::text('username', null, ['class'=>'form-control','id'=>'username','placeholder'=>'Enter Username']) !!}
	  	</div>

	  <div class="form-group">
	    
	    {!! Form::label('email' , 'Email address') !!} 
		    {!! Form::email('email', null, ['class'=>'form-control','id'=>'email', 'aria-describedby'=>'emailHelp','placeholder'=>'Enter Email Address']) !!}

	    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
	  </div>

	  <div class="form-group">

		  {!! Form::label('phone_number' , 'Phone Number') !!} 
		    {!! Form::text('phone_number', '1-(555)-555-5555', ['class'=>'form-control','id'=>'phone_number','placeholder'=>'Enter Phone Number']) !!}
	  </div>

   	<fieldset class="form-group">
	    <legend>Address</legend>

		<div class="form-group">
		  {!! Form::label('street_number' , 'Street Number') !!}
		  <div class="col-10">
		    {!! Form::number('street_number', '42', ['class'=>'form-control','id'=>'street_number','placeholder'=>'Enter Street Number']) !!}
		    </div>
		</div>

		<div class="form-group">

		    {!! Form::label('street_name' , 'Street Name') !!} 
		    {!! Form::text('street_name', null, ['class'=>'form-control','id'=>'street_name','placeholder'=>'Enter Street Name']) !!}
	  	</div>
	  	<div class="form-group">

		    {!! Form::label('city' , 'City/State') !!} 
		    {!! Form::text('city', null, ['class'=>'form-control','id'=>'city','placeholder'=>'Enter City/State ']) !!}
	  	</div>
	  	<div class="form-group">

		    {!! Form::label('post_code' , 'Post Code') !!} 
		    {!! Form::text('post_code', null, ['class'=>'form-control','id'=>'post_code','placeholder'=>'Enter Postal code']) !!}
	  	</div>

	</fieldset>

	  <div class="form-group">
	   
		{!! Form::label('services' , 'Services') !!}
		{!! Form::select('services',$services,null,['placeholder' => 'Select a service...','class'=>'form-control','id'=>'services'] ) !!}

	  </div>

	  <div class="form-check">

	    {!! Form::label('chain' , 'Do you belong to a chain?') !!} 
	    {!! Form::checkbox('chain',null,false,['class'=>'form-check-input','id'=>'chain' ]) !!}
	  </div>

	  <div class="form-group">
	  	{!! Form::label('image' , 'Image Upload') !!} 
		    {!! Form::file('image[]',  ['class'=>'form-control','id'=>'image','multiple'=>'multiple']) !!}
	  </div>
  	
  	{!! Form::submit('Create Vendor', ['class' => 'btn btn-primary']) !!}

    {!! Form::close() !!}
   </div>
  </div>

@stop