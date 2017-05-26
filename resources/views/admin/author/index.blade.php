@extends('admin.layouts.app')

@section('title','作者设置')

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
                    <h3 class="box-title">作者设置</h3>
                    <a href="javascript:;" class="btn btn-info pull-right" data-toggle="modal" data-target="#_create">添加作者</a>
                </div>
                <div class="box-body">
                    <table id="resourceTable" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>头像</th>
                            <th>名称</th>
                            <th>作品数</th>
                            <th>添加时间</th>
                            <th>最后修改时间</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($authors as $author)
                            <tr>
                                <td>{{ $author->id }}</td>
                                <td><img src="{{$author->avatar}}" class="img-circle"></td>
                                <td>{{ $author->name }}</td>
                                <td>{{count($author->book)}}</td>
                                <td>{{ $author->created_at }}</td>
                                <td>{{ $author->updated_at }}</td>
                                <td>
                                    <a href="javascript:;" data-toggle="modal" data-target="#_edit{{ $author->id }}"
                                       class="btn btn-info btn-sm"><i class="fa fa-pencil-square-o"
                                                                      aria-hidden="true"></i> 编辑</a>
                                    <a href="/admin/author/destroy/{{ $author->id }}"
                                       class="btn btn-warning btn-sm"><i class="fa fa-times" aria-hidden="true"></i> 删除</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>

            </div>

        </div>

    </div>

    @include('admin.author.create_form',['_formId' => '_create'])
    @foreach($authors as $author)
        @include('admin.author.edit_form',['_formId' => '_edit'.$author->id, 'author' => $author])
    @endforeach
@stop

@section('js')
    @include('admin.layouts.dataTable')
@stop