<div class="modal fade" id="{{ $_formId }}">
    <div class="modal-dialog martop10">
        <form role="form" action="/admin/admin/edit/{{ $admin->id }}" method="post" enctype="multipart/form-data">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span></button>
                    <h4 class="modal-title">编辑管理员</h4>
                </div>
                <div class="modal-body">
                    <div class="box-body">
                        <div class="form-group">
                            <label>管理员名称</label>
                            <input type="text" name="name" class="form-control" value="{{ $admin->name }}" required>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" class="form-control" value="{{ $admin->email }}" required>
                        </div>
                        <div class="form-group">
                            <label>密码</label>
                            <input type="text" name="password" class="form-control">
                            <p class="help-block text-blue">如不想更改密码请不要填写此项</p>
                        </div>
                        <div class="form-group">
                            <label>头像</label>
                            <input type="file" name="avatar" class="form-control">
                            <p class="help-block text-blue">如不想更换头像请不要上传文件</p>
                        </div>
                        <div class="form-group">
                            <label style="display: block">权限</label>
                            @foreach($permissions as $permission)
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="permission[]" value="{{ $permission->id }}"
                                               @if($admin->can($permission->slug)) checked @endif>
                                        {{ $permission->name }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                        <div class="form-group">
                            <label style="display: block">状态</label>
                            <div class="radio radio-inline">
                                <label>
                                    <input type="radio" name="enable" value="1" {{$admin->enable==1?'checked':''}}>
                                    <i class="fa fa-check text-green" aria-hidden="true"></i> 启用
                                </label>
                            </div>
                            <div class="radio radio-inline" style="margin-top: 8px">
                                <label>
                                    <input type="radio" name="enable" value="0" {{$admin->enable==0?'checked':''}}>
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