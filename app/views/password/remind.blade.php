@extends('layouts.master')

@section('content')
	 
	{{ Form::open(array('route' => 'password.request', 'class' => 'form-signin')) }}
		
		<h2 class="form-signin-heading">Password Reset</h2>

		<p>{{ Form::label('email', 'Enter Your Email Below') }}
		{{ Form::text('email', '', array('class' => 'form-control')) }}</p>
	 	
	 	<p>{{ Form::submit('Submit', array('class' => 'btn btn-lg btn-primary btn-block')) }}</p>
	 
	{{ Form::close() }}

@stop

@section('javascript')

	<script type="text/javascript">
	  
	  $('document').ready(function(){

	    @if (Session::has('error'))
	    console.log('hit');
	    	var n = noty({text: "{{ trans(Session::get('reason')) }}", layout: 'top', type: 'error', template: '<div class="noty_message"><span class="noty_text"></span><div class="noty_close"></div></div>', closeWith: ['button'], timeout:2000 });
	    @elseif (Session::has('success'))
	        var n = noty({text: 'An email with the password reset has been sent.', layout: 'top', type: 'success', template: '<div class="noty_message"><span class="noty_text"></span><div class="noty_close"></div></div>', closeWith: ['button'], timeout:2000 });
	    @endif

	  });

	 </script>

@stop