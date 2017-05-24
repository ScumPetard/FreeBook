@extends('home.layouts.base')

@section('title','个人中心')

@section('css')
    <link rel="stylesheet" href="/assets/css/memberResource.css">
    <style>
        .form-control {
            height: 45px;
        }
    </style>
@stop

@section('content')
    @include('home.layouts.head')
    <div class="container-wrap">
        <div id="fh5co-contact">
            <div class="row">
                <div class="col-md-6 animate-box fadeInUp animated-fast">
                    <div class="row">
                        <form action="" method="post">
                            <div class="col-md-10 col-lg-offset-1">
                                <div class="form-group">
                                    <label>Email</label>
                                    <div class="input-group allw">
                                        <input type="email" class="form-control " placeholder="请输入你的Email"
                                               value="{{$member->email}}" disabled required>
                                    </div>
                                    <pre class="help-block" style="color: #000;border: none;background: none;">Email唯一,注册之后不能修改(如真的需要修改,请联系Petard)</pre>
                                </div>
                            </div>
                            <div class="col-md-10 col-lg-offset-1">
                                <div class="form-group">
                                    <label>昵称</label>
                                    <div class="input-group allw">
                                        <input type="text" name="name" class="form-control" placeholder="请输入你的昵称"
                                               value="{{$member->name}}" maxlength="20" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-10 col-lg-offset-1">
                                <div class="form-group">
                                    <label>个人介绍</label>
                                    <div class="input-group allw">
                                        <textarea name="intro" class="form-control" cols="30" rows="5"
                                                  placeholder="填写你的个人介绍" maxlength="255">{{$member->intro}}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-10 col-lg-offset-1">
                                <div class="form-group text-center">
                                    {{ csrf_field() }}
                                    <input type="submit" value="更新我的资料" class="btn btn-primary btn-modify">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-6 animate-box fadeInUp animated-fast ">
                    <div class="row">
                        <div class="col-md-6 col-lg-offset-3">
                            <div class="thumbnail">
                                <img id="avatar-preview" class="circle"
                                     src="{{$member->avatar?$member->avatar:'/default-avatar.jpg'}}"
                                     style="height: 200px; width: 100%; display: block;">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group text-center">
                                <input type="button" value="更换" id="btnChangeAvatar"
                                       class="btn btn-primary btn-modify">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <form action="/api/member/change-avatar" method="post" id="avatar-form" style="display: none;">
        {{ csrf_field() }}
        <input type="file" id="member-avatar" name="avatar">
    </form>
    @include('home.layouts.footer')
@stop

@section('js')
    <script src="/assets/js/jquery.form.js"></script>
    <script src="https://cdn.bootcss.com/layer/3.0.1/layer.min.js"></script>
    <script>
        $('#btnChangeAvatar').click(function () {
            $('#member-avatar').click();
        });

        $(document).ready(function () {
            var options = {
                beforeSubmit: showRequest,
                success: showResponse,
                dataType: 'json'
            };
            $('#member-avatar').on('change', function () {
                layer.load(2);
                $('#avatar-form').ajaxForm(options).submit();
            });
        });
        function showRequest() {
            return true;
        }

        function showResponse(response) {
            layer.closeAll('loading');
            if (response['code']) {
                $('#avatar-preview').attr('src',response['url']);
                return layer.msg('更换头像成功');
            }
            return layer.msg(response['message'],{time:500},function () {
                location.reload();
            });
        }

    </script>
@stop