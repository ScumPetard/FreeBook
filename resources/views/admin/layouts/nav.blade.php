<aside class="main-sidebar">
    <section class="sidebar">
        <div class="user-panel">
            <div class="pull-left image">
                <img src="{{ Auth::user()->avatar }}" class="img-circle" alt="User Image">
            </div>
            <div class="pull-left info">
                <p>{{ Auth::user()->name }}</p>
                <a href="javascript:;"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>
        <form class="sidebar-form">
            <div class="input-group">
                <input type="text" class="form-control" placeholder="不能搜索的搜索框...">
                <span class="input-group-btn">
                <button type="button" name="search" id="search-btn" class="btn btn-flat">
                    <i class="fa fa-search"></i>
                </button>
              </span>
            </div>
        </form>
        <ul class="sidebar-menu">
            <li class="header"></li>
            <li class="treeview">
                <a href="/admin/index">
                    <i class="fa fa-home"></i> <span>首页</span>
                </a>
            </li>
            <li class="treeview">
                <a href="#">
                    <i class="fa fa-gears"></i>
                    <span>基本设置</span>
                    <span class="pull-right-container"><i class="fa fa-angle-left pull-right"></i></span>
                </a>
                <ul class="treeview-menu">
                    <li><a href="/admin/admin"><i class="fa fa-circle-o"></i> 管理员设置</a></li>
                    <li><a href="/admin/permission"><i class="fa fa-circle-o"></i> 权限设置</a></li>
                    <li><a href="/admin/book"><i class="fa fa-circle-o"></i> Book设置</a></li>
                </ul>
            </li>
            <li class="treeview">
                <a href="{{ route('admin.logout') }}">
                    <i class="fa fa-sign-out"></i> <span> 注销</span>
                </a>
            </li>
        </ul>
    </section>
</aside>