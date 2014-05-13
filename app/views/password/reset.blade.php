@extends('layouts.master')

@section('content')

	@if (Session::has('error'))
	  {{ trans(Session::get('reason')) }}
	@endif

	{{ Form::open(array('route' => array('password.update', $token), 'class' => 'form-signin')) }}
	 
		<h2 class="form-signin-heading">New Password</h2>

		<p>{{ Form::label('email', 'Email') }}
		{{ Form::text('email', '', array('class' => 'form-control')) }}</p>
		 
		<p>{{ Form::label('password', 'Password') }}
		{{ Form::text('password', '', array('class' => 'form-control')) }}</p>
		 
		<p>{{ Form::label('password_confirmation', 'Password confirm') }}
		{{ Form::text('password_confirmation', '', array('class' => 'form-control')) }}</p>
		 
		{{ Form::hidden('token', $token) }}
		 
		<p>{{ Form::submit('Submit') }}</p>
		 
	{{ Form::close() }}

@stop