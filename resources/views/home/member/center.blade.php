@extends('home.layouts.base')

@section('title','个人中心')

@section('css')
    <link rel="stylesheet" href="/assets/css/memberResource.css">
@stop

@section('content')
    @include('home.layouts.head')
    <div class="container-wrap">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3">
                    <div class="box box-primary">
                        <div class="box-body box-profile">
                            <img class="profile-user-img img-responsive img-circle"
                                 src="{{$member->avatar?$member->avatar:'/default-avatar.jpg'}}">
                            <h4 class="profile-username text-center">{{$member->name}}</h4>
                            <p class="text-muted text-center">您是本站第<a href="javascript:;">「 {{$member->id}} 」</a>位会员</p>
                            <ul class="list-group list-group-unbordered">
                                <li class="list-group-item">
                                    <b><i class="fa fa-star" aria-hidden="true"></i></b>&nbsp;已获得赞 <span
                                            class="label label-success pull-right">{{$member->praise_count}}</span>
                                </li>
                                <li class="list-group-item">
                                    <b><i class="fa fa-book" aria-hidden="true"></i></b>&nbsp;已分享资源 <span
                                            class="label label-success pull-right">543</span>
                                </li>
                                <li class="list-group-item">
                                    <b><i class="fa fa-sign-in" aria-hidden="true"></i></b>&nbsp;注册于 <span
                                            class="pull-right">{{$member->created_at}}</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title"></h3>
                        </div>
                        <div class="box-body text-center" style="padding: 15px;">
                            <strong>个人介绍</strong>
                            <br>
                            <p class="text-muted" style="padding-top: 10px;">
                                山有木兮木有枝,心悦君兮君不知
                            </p>
                        </div>
                        <div class="box-footer text-center">
                            <a href="/member/data" class="btn btn-info btn-signout">编辑资料</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">

                </div>
            </div>
        </div>
        <div style="clear: both;"></div>
    </div>
    @include('home.layouts.footer')
@stop