@extends('home.layouts.base')

@section('title','登录')

    @section('css')
        <style>
            .form-control {
                padding-left: 0;
            }
        </style>
    @stop

@section('content')
    @include('home.layouts.head')
    <div class="container-wrap">
        <div id="fh5co-contact">
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-2 col-lg-offset-5">
                        <p class="sign-title text-center">
                            <a href="/member/sign" class="pull-left title-hover">登录</a>
                            ·
                            <a href="/member/signup" class="pull-right">注册</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-md-push-1 animate-box fadeInUp animated-fast col-lg-offset-3">
                    <div class="row">
                        <form action="" method="post">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="input-group ">
                                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                        <input type="email" name="email" class="form-control" placeholder="请输入你的邮箱" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <div class="input-group ">
                                        <span class="input-group-addon">
                                            <i class="fa fa-lock" aria-hidden="true"></i>
                                        </span>
                                        <input type="password" name="password" class="form-control" placeholder="请输入你的密码" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group text-center">
                                    {{ csrf_field() }}
                                    <input type="submit" value="登录" class="btn btn-block btn-primary btn-modify">
                                </div>
                            </div>
                        </form>
                        <p class="text-center reset-text"><a href="">忘记密码</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('home.layouts.footer')
@stop