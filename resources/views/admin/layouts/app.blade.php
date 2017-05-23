<!DOCTYPE html>
<html lang="zh">
<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="shortcut icon" href="/favicon.ico"/>
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.bootcss.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="/style/css/AdminLTE.min.css">
    <link rel="stylesheet" href="/style/css/skin-black-light.css">
    @include('admin.layouts.style')
    @yield('css')
</head>
<body class="sidebar-mini wysihtml5-supported fixed skin-black-light">
<div class="wrapper">
    <header class="main-header">
        <a href="/admin/index" class="logo">
            <span class="logo-mini"><b>L</b>ara</span>
            <span class="logo-lg"><b>Lara</b>dmin</span>
        </a>
        <nav class="navbar navbar-static-top">
            <a href="javascript:;" class="sidebar-toggle" data-toggle="offcanvas" role="button"></a>
        </nav>
    </header>
    @include('admin.layouts.nav')
    <div class="content-wrapper">
        <section class="content">
            @include('admin.layouts.notify')
            @yield('content')
        </section>
    </div>
    <div class="control-sidebar-bg"></div>
</div>
<script src="https://cdn.bootcss.com/jquery/2.2.3/jquery.min.js"></script>
<script src="https://cdn.bootcss.com/jqueryui/1.12.1/jquery-ui.min.js"></script>
@yield('js')
<script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<script src="/style/js/app.js"></script>
</body>
</html>
