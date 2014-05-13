@extends('layouts.master')

@section('content')

<form method="post" action="{{ URL::to('signup') }}" class="form-signin">
    <!-- check for notifications -->
    @if (Session::has('notification'))
        <span class="notification">{{ Session::get('notification') }}</span>
    @endif

    <span class="icon-user icon-2x pull-right icon-border"></span><h2 class="form-login-heading">Sign Up Below</h2>
    
    <input type="text" class="form-control" id="username" name="username" placeholder="Username">
    <input type="text" class="form-control" id="email" name="email" placeholder="Email address">
    <input type="password" class="form-control" id="password" name="password" placeholder="Password">
    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password">
   
    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign Up</button>
    
</form>

@stop