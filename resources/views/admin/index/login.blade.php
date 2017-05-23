<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>登录</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="shortcut icon" href="/favicon.ico"/>
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.bootcss.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdn.bootcss.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="/style/css/AdminLTE.min.css">
    <link rel="stylesheet" href="/style/css/skin-black-light.css">
    <style>
        * {font-family: "Lucida Grande", Lucida Sans Unicode, Hiragino Sans GB, WenQuanYi Micro Hei, Verdana, Aril, sans-serif;}
        body {background: url(/background1.jpg) center no-repeat;height: auto;}
        .login-box-body {border-radius: 3px;}
        .login-box {width: 360px;margin: 10% auto;box-shadow: 0px 0px 25px -5px rgba(10, 10, 10, 1);}
    </style>
</head>
<body class="sidebar-mini wysihtml5-supported fixed skin-black-light">
<div class="login-box">
    <div class="login-box-body">
        <div class="login-logo">Laradmin</div>
        <p class="login-box-msg">山有木兮木有枝，心悦君兮君不知。</p>
        @include('admin.layouts.notify')
        <form action="{{ route('admin.login') }}" method="post">
            <div class="form-group has-feedback">
                <input type="email" class="form-control" name="email" placeholder="Account" required>
                <span class="glyphicon glyphicon-user form-control-feedback"></span>
            </div>
            <div class="form-group has-feedback">
                <input type="password" class="form-control" name="password" placeholder="Password" required>
                <span class="glyphicon glyphicon-lock form-control-feedback"></span>
            </div>
            <div class="row">
                <div class="col-xs-12 text-center">
                    {{ csrf_field() }}
                    <button type="submit" class="btn btn-info btn-block btn-flat">登录</button>
                </div>
            </div>
        </form>
    </div>
</div>
</body>
<script src="https://cdn.bootcss.com/jquery/2.2.3/jquery.min.js"></script>
<script src="https://cdn.bootcss.com/jqueryui/1.12.1/jquery-ui.min.js"></script>
<script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</html>
