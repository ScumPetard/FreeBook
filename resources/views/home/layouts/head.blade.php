<nav class="fh5co-nav" role="navigation">
    <div class="container-wrap">
        <div class="top-menu">
            <div class="row wow fadeInUp animated">
                <div class="col-xs-2">
                    <div id="fh5co-logo"><a href="/">FreeBook</a></div>
                </div>
                <div class="col-xs-10 text-right menu-1">
                    <ul>
                        <li class="active"><a href="/">首页</a></li>
                        <li><a href="/books">书籍列表</a></li>
                        <li><a href="about.html">社区</a></li>
                        <li><a href="contact.html">意见反馈</a></li>
                        <li><a href="contact.html">意见反馈</a></li>
                        @if(Session::has('member'))
                            <li class="has-dropdown">
                                {{--<img class="img-circle" src="{{Session::get('member')->avatar?Session::get('member')->avatar:'/default-avatar.jpg'}}" width="50">--}}
                                <a class="user-toggle">{{Session::get('member')->name}}</a>
                                <ul class="dropdown text-center">
                                    <li><a href="/member/center">个人中心</a></li>
                                    <li><a href="#">我的分享</a></li>
                                    <li><a href="/member/signout">退出登录</a></li>
                                </ul>
                            </li>
                        @else
                            <li class="btn-sign">
                                <button onclick="window.location.href='/member/sign'">登录</button>
                            </li>
                        @endif
                    </ul>
                </div>

            </div>
        </div>
    </div>
</nav>
