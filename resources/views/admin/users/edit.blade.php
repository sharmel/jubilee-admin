@extends('layouts.admin')
@section('content')


<h1>Edit User</h1>


@if(count($errors) > 0)

<div class="alert alert-danger">
	<ul>
		@foreach($errors->all() as $error)
		<li>{{$error}}</li>
		@endforeach
	</ul>
</div>

@endif

{!! Form::model($user, ['method'=>'PATCH', 'action'=>['AdminUsersController@update', $user->id],'files'=>true]) !!}

<div class="row">

<div class="col-md-6">
	    <div class="form-group">
		   
		    {!! Form::label('name' , 'Names') !!} 
		    {!! Form::text('name', null, ['class'=>'form-control','id'=>'name','placeholder'=>'Enter Name']) !!}
		    
	  	</div>

	  	<div class="form-group">
	    
	    {!! Form::label('email' , 'Email address') !!} 
		    {!! Form::email('email', null, ['class'=>'form-control','id'=>'email', 'aria-describedby'=>'emailHelp','placeholder'=>'Enter Email Address']) !!}

	    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
	  </div>

	  	<div class="form-group">
		    
		    {!! Form::label('password' , 'Password') !!} 
		    {!! Form::password('password', ['class'=>'form-control','id'=>'password','placeholder'=>'Enter Password']) !!}
	  	</div>
	  	 <div class="form-group">
	   
		{!! Form::label('roles' , 'Role') !!}
		{!! Form::select('role_id',$roles,null,['placeholder' => 'Select a role...','class'=>'form-control','id'=>'roles'] ) !!}

	  </div>

	   <div class="form-group">
	   
		{!! Form::label('is_active' , 'Status') !!}
		{!! Form::select('is_active',array(1=>'Active', 0 => 'Not Active'),null,['placeholder' => 'Select a status...','class'=>'form-control','id'=>'is_active'] ) !!}

	  </div>

	{!! Form::submit('Update User', ['class' => 'btn btn-primary']) !!}

    {!! Form::close() !!}

</div>
</div>










@stop