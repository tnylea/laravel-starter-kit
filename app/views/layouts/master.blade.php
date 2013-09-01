<!DOCTYPE html>
<html>
<head>
    <title></title>
    <link rel="stylesheet" href="{{ URL::asset('assets/bootstrap/css/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ URL::asset('assets/bootstrap/css/bootstrap-theme.min.css') }}" />
    @yield('css')
</head>
<body>
    @yield('content')
    <link rel="stylesheet" href="{{ URL::asset('assets/bootstrap/js/bootstrap.min.js') }}" />
</body>
</html>