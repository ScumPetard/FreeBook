@extends('admin.layouts.app')

@section('title','图书设置')

@section('css')
    <style>
        .img-thumbnail {width: 75px;height: 100px;}
        td {line-height: 100px !important;}
    </style>
@stop

@section('content')
    <div class="row">
        <div class="col-xs-12">
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">图书设置</h3>
                    <a href="javascript:;" class="btn btn-info pull-right" data-toggle="modal" data-target="#_create">添加图书</a>
                </div>
                <div class="box-body">
                    <table id="resourceTable" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>封面</th>
                            <th>名称</th>
                            <th>点击量</th>
                            <th>关注数</th>
                            <th>赞数量</th>
                            <th>作者</th>
                            <th>状态</th>
                            <th>添加时间</th>
                            <th>最后修改时间</th>
                            <th>操作</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($books as $book)
                            <tr>
                                <td>{{ $book->id }}</td>
                                <td><img src="{{$book->preview}}" class="img-thumbnail"></td>
                                <td>{{ $book->name }}</td>
                                <td>{{ $book->click_count }}</td>
                                <td>{{ $book->favorite_count }}</td>
                                <td>{{ $book->praise_count }}</td>
                                <td><span class="label label-{{$book->enable==1?'success':'danger'}}">{{$book->enable==1?'启用':'停用'}}</span></td>
                                <td>{{ $book->author->name }}</td>
                                <td>{{ $book->created_at }}</td>
                                <td>{{ $book->updated_at }}</td>
                                <td>
                                    <a href="javascript:;" data-toggle="modal" data-target="#_edit{{ $book->id }}"
                                       class="btn btn-info btn-sm"><i class="fa fa-pencil-square-o"
                                                                      aria-hidden="true"></i> 编辑</a>
                                    <a href="/admin/book/destroy/{{ $book->id }}"
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

    @include('admin.book.create_form',['_formId' => '_create'])
    @foreach($books as $book)
        @include('admin.book.edit_form',['_formId' => '_edit'.$book->id, 'book' => $book])
    @endforeach
@stop

@section('js')
    @include('admin.layouts.dataTable')
@stop