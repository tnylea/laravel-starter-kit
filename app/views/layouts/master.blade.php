<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" href="{{ URL::asset('assets/bootstrap/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('assets/css/noty.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('assets/css/nprogress.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('assets/css/font-awesome.min.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('assets/css/capicon.css') }}" />
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
    <script src="{{ URL::asset('assets/js/bootstrap.min.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('assets/js/noty/jquery.noty.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('assets/js/noty/themes/default.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('assets/js/noty/layouts/bottomRight.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('assets/js/noty/layouts/top.js') }}"></script>
	<script type="text/javascript" src="{{ URL::asset('assets/js/nprogress.js') }}"></script>

	<script type="text/javascript">
	  
	  $('document').ready(function(){

	    NProgress.start();

	    @if(Session::get('note') != '' && Session::get('note_type') != '')
	    console.log('invalid');
	        var n = noty({text: '{{ Session::get("note") }}', layout: 'top', type: '{{ Session::get("note_type") }}', template: '<div class="noty_message"><span class="noty_text"></span><div class="noty_close"></div></div>', closeWith: ['button'], timeout:2000 });
	        <?php Session::forget('note');
	              Session::forget('note_type');
	        ?>
	    @endif

	  });


	  $(window).load(function () {
	    NProgress.done();
	  });

	</script>

    @yield('javascript')
</body>
</html>