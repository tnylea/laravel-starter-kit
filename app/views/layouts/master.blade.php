<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" href="{{ URL::asset('assets/bootstrap/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('assets/css/style.css') }}" />
    @yield('css')
</head>
<body>

	<nav class="navbar navbar-default navbar-static-top" role="navigation">
	  <div class="container">
	  	<div class="collapse navbar-collapse right" id="bs-example-navbar-collapse-1">
	    	<ul class="nav navbar-nav navbar-right">
	        	<li @if(Request::is('login')) class="active" @endif><a href="/login">Login</a></li>
	        	<li @if(Request::is('signup')) class="active" @endif><a href="/signup">Signup</a></li>
	    	</ul>
	    </div>
	  </div>
	</nav>

    @yield('content')
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script scr="{{ URL::asset('assets/js/bootstrap.min.js') }}"></script>
    @yield('javascript')
</body>
</html>