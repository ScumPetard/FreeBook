@extends('admin.layouts.app')

@section('title','管理员设置')

@section('css')
    <style>
        .img-circle {width: 50px;height: 50px;}
        td {line-height: 50px !important;}
    </style>
@stop

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">管理员设置</h3>
                    <a href="javascript:;" class="btn btn-info pull-right" data-toggle="modal" data-target="#_create"><i class="fa fa-plus" aria-hidden="true"></i> 添加</a>
                </div>
                <div class="box-body">
                    <table id="resourceTable" class="table table-bordered table-striped dataTable">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>头像</th>
                            <th>名称</th>
                            <th>Email</th>
                            <th>启用状态</th>
                            <th>创建时间</th>
                            <th>最后一次修改时间</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($admins as $admin)
                            <tr>
                                <td>{{ $admin->id }}</td>
                                <td><img src="{{$admin->avatar}}" class="img-circle"></td>
                                <td>{{ $admin->name }}</td>
                                <td>{{ $admin->email }}</td>
                                <td><span class="label label-{{$admin->isEnable()?'info':'danger'}}">{{$admin->isEnable()?'启用':'停用'}}</span></td>
                                <td>{{ $admin->created_at }}</td>
                                <td>{{ $admin->updated_at }}</td>
                                <td>
                                    <a href="javascript:;" data-toggle="modal" data-target="#_edit{{ $admin->id }}"
                                       class="btn btn-info btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> 编辑</a>
                                    <a href="/admin/admin/destroy/{{ $admin->id }}"
                                       class="btn btn-danger btn-sm"><i class="fa fa-times" aria-hidden="true"></i> 删除</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @include('admin.admin.create_form',['_formId' => '_create'])
    @foreach($admins as $admin)
        @include('admin.admin.edit_form',['_formId' => '_edit'.$admin->id,'admin' => $admin])
    @endforeach
@stop

@section('js')
    @include('admin.layouts.dataTable')
@stop