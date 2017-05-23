@extends('home.layouts.base')

@section('title','验证成功')

@section('css')
    <style>
        .sign-title > a {font-size: 30px;text-decoration: none;}
        .sign-title > a:hover {text-decoration: none;}
    </style>
@stop

@section('content')
    @include('home.layouts.head')
    <div class="container-wrap">
        <div id="fh5co-contact">
            <div class="row">
                <div class="col-md-12">
                    <div class="col-md-6 col-lg-offset-3">
                        <p class="sign-title text-center">
                            <a href="javascript:;"><i class="fa fa-check" aria-hidden="true"></i> 验证成功 </a>
                        </p>
                        <p class="text-center">{{Session::get('member')->name}}，恭喜您已经完成注册。</p>
                        <p class="text-center"><a href="/">「回到首页」</a></p>
                    </div>
                </div>
            </div>
            <div class="row">

            </div>
        </div>
    </div>
    @include('home.layouts.footer')
@stop