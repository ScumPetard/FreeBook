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
                            <a href="/member/sign" class="pull-left ">登录</a>
                            ·
                            <a href="/member/signup" class="pull-right title-hover">注册</a>
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
                                        <span class="input-group-addon"><i class="fa fa-user-o"></i></span>
                                        <input type="text" id="memberNickName" name="name" class="form-control signInput" placeholder="请输入你的昵称" maxlength="20" required>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="input-group">
                                        <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                                        <input type="email" id="memberEmail" name="email" oninput="checkEmailUnique(this);" class="form-control signInput" placeholder="请输入你的邮箱" maxlength="50" required>
                                    </div>
                                </div>
                                <div class="alert alert-danger" id="EmailErrorMessage" style="display: none"></div>
                                <div class="alert alert-info" id="EmailSuccessMessage" style="display: none"></div>
                                <div class="form-group">
                                    <div class="input-group ">
                                        <span class="input-group-addon">
                                            <i class="fa fa-lock" aria-hidden="true"></i>
                                        </span>
                                        <input type="password" id="memberPassword" name="password" oninput="checkPassword(this);" class="form-control signInput" placeholder="请输入你的密码" minlength="6" maxlength="20" required>
                                    </div>
                                </div>
                                <div class="alert alert-danger" id="PasswordErrorMessage" style="display: none"></div>
                                <div class="form-group">
                                    <div class="input-group ">
                                        <span class="input-group-addon">
                                            <i class="fa fa-lock" aria-hidden="true"></i>
                                        </span>
                                        <input type="password" id="memberConfirmPassword" name="confirmpassword" oninput="checkConfirmPassword(this);" class="form-control signInput" placeholder="请确认你的密码" minlength="6" maxlength="20" required>
                                    </div>
                                </div>
                                <div class="alert alert-danger" id="ConfirmPasswordErrorMessage" style="display: none"></div>
                                <div class="form-group text-center">
                                    {{ csrf_field() }}
                                    <input type="submit" value="注册" class="btn btn-block btn-primary btn-modify" id="submitForm">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @include('home.layouts.footer')
@stop
@section('js')
    <script src="/assets/js/memberSign.js"></script>
@stop