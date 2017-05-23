@extends('admin.layouts.app')

@section('title','无权访问')

@section('css')
    <style>
        .headline {display: block;float: inherit !important;text-align: center;}
        .erro1 {display: block;float: inherit !important;text-align: center;font-size: 50px !important;}
        .error-content {text-align: center;margin-left: 0 !important;}
        .btn, .topr, h4 {margin-top: 35px;}
    </style>
@stop

@section('content')
    <div class="error-page">
        <h2 class="headline text-red"><i class="fa fa-ban" aria-hidden="true"></i></h2>
        <h3 class="headline erro1 text-red">无权访问</h3>
        <div class="error-content">
            <h4><i class="fa fa-warning text-red"></i> 很遗憾您的访问必须被终止了</h4>
            <p class="topr">
                虽然抱歉但是也没有办法，您并没有权限访问这个模块呐。
            </p>
            <a href="javascript:history.go(-1)" class="btn btn-danger btn-lg"><i class="fa fa-reply" aria-hidden="true"></i>&nbsp;返回
            </a>
        </div>
    </div>
@stop

