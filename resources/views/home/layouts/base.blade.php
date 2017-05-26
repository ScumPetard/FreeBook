<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="keywords" content="@yield('keywords')" />
    <meta name="description" content="@yield('description')" />
    <link rel="stylesheet" href="/assets/css/animate.css">
    <link rel="stylesheet" href="/assets/css/icomoon.css">
    <link rel="stylesheet" href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/assets/css/bootstrap.css">
    <link rel="stylesheet" href="/assets/css/magnific-popup.css">
    <link rel="stylesheet" href="/assets/css/flexslider.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.bootcss.com/animate.css/3.5.2/animate.min.css">
    <link rel="stylesheet" href="/assets/css/style.css">
    <link rel="stylesheet" href="/assets/css/custom.css">
</head>
@yield('css')
<body>
<div id="page">
    @if(Session::has('notify_message'))
        <div class="alert alert-{{  session('notify_type') }} alert-dismissible text-center">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            {{  session('notify_message') }}
        </div>
    @endif
    @yield('content')
</div>
<script src="/assets/js/jquery.min.js"></script>
<script src="/assets/js/jquery.easing.1.3.js"></script>
<script src="/assets/js/bootstrap.min.js"></script>

<script src="/assets/js/main.js"></script>
<script type="text/javascript" src="https://cdn.bootcss.com/wow/1.1.2/wow.min.js"></script>
@yield('js')
</body>
</html>

