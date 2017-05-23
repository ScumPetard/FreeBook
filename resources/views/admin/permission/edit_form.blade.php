<div class="modal fade" id="{{ $_formId }}">
    <div class="modal-dialog martop10">
        <form role="form" action="/admin/permission/edit/{{ $permission->id }}" method="post" >
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">编辑权限</h4>
                </div>
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <label>权限路由</label>
                            <input type="text" name="slug" class="form-control" value="{{ $permission->slug }}" required>
                        </div>
                        <div class="form-group">
                            <label>名称</label>
                            <input type="text" name="name" class="form-control" value="{{ $permission->name }}"  required>
                        </div>
                        <div class="form-group">
                            <label>介绍</label>
                            <textarea name="description"  class="form-control" cols="30" rows="3" required>{{ $permission->description }}</textarea>
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