@extends('home.layouts.base')

@section('title','登录')

@section('content')
    @include('home.layouts.head')
    <div class="container-wrap">
        <div id="fh5co-contact">
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-2 col-lg-offset-5">
                        <p class="sign-title text-center">
                            <a href="/member/sign"  class="pull-left title-hover">登录</a>
                            ·
                            <a href="/member/signup" class="pull-right">注册</a>
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-md-push-1 animate-box fadeInUp animated-fast col-lg-offset-3">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="input-group ">
                                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                    <input type="email" class="form-control signInput" placeholder="请输入你的邮箱">
                                </div>
                            </div>
                            {{--<div class="alert alert-danger alert-dismissible">--}}
                                {{--<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>--}}
                            {{--</div>--}}
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="input-group ">
                                    <span class="input-group-addon"><i class="fa fa-lock" aria-hidden="true"></i></span>
                                    <input type="password" class="form-control signInput" placeholder="请输入你的密码">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group text-center">
                                <input type="submit" value="登录" class="btn btn-block btn-primary btn-modify">
                            </div>
                        </div>
                        <p class="text-center reset-text"><a href="">忘记密码</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('home.layouts.footer')
@stop