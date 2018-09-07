<!DOCTYPE html>
<html>
<head>
@include('partial._admin_header')
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
<div class="content-wrapper">
 <!-- Navigation -->
@include('partial._admin_navigation')

@include('partial._message')
            @yield('content')

@include('partial._admin_script')
@yield('script')
</div>
</body>
</html>