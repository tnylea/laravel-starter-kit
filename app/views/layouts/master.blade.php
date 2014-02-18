<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" href="{{ URL::asset('assets/bootstrap/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('assets/css/style.css') }}" />
    @yield('css')
</head>
<body>
    @yield('content')
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script scr="{{ URL::asset('assets/js/bootstrap.min.js') }}"></script>
    @yield('javascript')
</body>
</html>