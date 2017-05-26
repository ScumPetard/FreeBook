<div class="modal fade" id="{{ $_formId }}">
    <div class="modal-dialog martop10">
        <form role="form" action="/admin/book/edit/{{$book->id}}" method="post" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">编辑图书</h4>
                </div>
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <label>书名</label>
                            <input type="text" name="name" value="{{$book->name}}" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label>作者</label>
                            <select name="author_id" class="form-control">
                                @foreach($authors as $author)
                                    <option value="{{$author->id}}" {{$book->author_id==$author->id ? 'selected' : ''}}>{{$author->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Preview</label>
                            <input type="file" name="preview"  class="form-control" >
                            <p class="help-block">如果不想更换封面图片请勿上传文件</p>
                        </div>
                        <div class="form-group">
                            <label>介绍</label>
                            <textarea name="intro"  class="form-control" cols="30" rows="3" required>{{$book->intro}}</textarea>
                        </div>
                        <div class="form-group">
                            <label style="display: block">状态</label>
                            <div class="radio radio-inline">
                                <label>
                                    <input type="radio" name="enable" value="1" {{$book->enable==1 ? 'checked' : ''}}>
                                    <i class="fa fa-check text-green" aria-hidden="true"></i> 启用
                                </label>
                            </div>
                            <div class="radio radio-inline" style="margin-top: 8px">
                                <label>
                                    <input type="radio" name="enable" value="0" {{$book->enable==0 ? 'checked' : ''}}>
                                    <i class="fa fa-warning text-red"></i> 停用
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    {{ csrf_field() }}
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">取消</button>
                    <button type="submit" class="btn btn-info">提交</button>
                </div>
            </div>
        </form>
    </div>
</div>