@extends('layouts.master')

@section('content')

<form method="post" action="{{ URL::to('login') }}" class="form-signin">
   
    <h2 class="form-signin-heading">Please sign in</h2>
    <input type="text" class="form-control" placeholder="Email address or Username" id="email" name="email" autofocus>
    <input type="password" class="form-control" placeholder="Password" id="password" name="password">
    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
    <br />
    <a href="{{ URL::to('password/reset') }}">Forgot Password?</a>
</form>

@stop