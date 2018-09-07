<!DOCTYPE html>
<html>
<head>
@include('partial.header')
</head>

<body style="background: #F8F8FF;">

 <!-- Navigation -->
@include('partial.navigation')
@include('partial._message')

            @yield('content')

@include('partial.script')

@yield('script')
</body>
</html>
