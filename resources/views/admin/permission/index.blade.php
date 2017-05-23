@extends('admin.layouts.app')

@section('title','权限设置')

@section('css')
    <style>
        .img-circle {
            width: 70px;
            height: 70px;
        }
    </style>
@stop

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">权限设置</h3>
                    <a href="javascript:;" class="btn btn-info pull-right" data-toggle="modal" data-target="#_create">添加权限</a>
                </div>
                <div class="box-body">
                    <table id="resourceTable" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>权限路由</th>
                            <th>名称</th>
                            <th>介绍</th>
                            <th>添加时间</th>
                            <th>最后修改时间</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($permissions as $permission)
                            <tr>
                                <td>{{ $permission->id }}</td>
                                <td>{{ $permission->slug }}</td>
                                <td>{{ $permission->name }}</td>
                                <td>{{ $permission->description }}</td>
                                <td>{{ $permission->created_at }}</td>
                                <td>{{ $permission->updated_at }}</td>
                                <td>
                                    <a href="javascript:;" data-toggle="modal" data-target="#_edit{{ $permission->id }}" class="btn btn-info btn-sm"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> 编辑</a>
                                    <a href="/admin/permission/destroy/{{ $permission->id }}" class="btn btn-warning btn-sm"><i class="fa fa-times" aria-hidden="true"></i> 删除</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

            </div>

        </div>

    </div>

    @include('admin.permission.create_form',['_formId' => '_create'])
    @foreach($permissions as $permission)
        @include('admin.permission.edit_form',['_formId' => '_edit'.$permission->id, 'permission' => $permission])
    @endforeach
@stop

@section('js')
    @include('admin.layouts.dataTable')
@stop