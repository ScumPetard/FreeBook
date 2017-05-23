@extends('home.layouts.base')

@section('title','注册成功')

@section('css')
    <style>
        .sign-title > a {
            font-size: 30px;
            text-decoration: none;
        }

        .sign-title > a:hover {
            text-decoration: none;
        }
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
                            <a href="javascript:;" style=""><i class="fa fa-check" aria-hidden="true"></i> 恭喜您注册成功 </a>
                        </p>
                        <p class="text-center">验证邮件已经发送至您的邮箱，请在2小时内完成验证。</p>
                        <p class="text-center">如果长时间没有收到验证邮件，请点击下方的 <a href="javascript:;">「重新发送」</a>。</p>
                        <div class="form-group text-center">
                            <form action="" method="post">
                                {{ csrf_field() }}
                                <input type="hidden" name="reset" value="1">
                                <input type="submit" value="重新发送" class="btn  btn-primary btn-modify">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">

            </div>
        </div>
    </div>
    @include('home.layouts.footer')
@stop