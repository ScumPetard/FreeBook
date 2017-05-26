@extends('home.layouts.base')

@section('title','书籍列表')

@section('css')
    <style>
        .btn-seach {
            border: none;
        }

        .btn-seach:hover {
            background: #fff;
        }

        .btn-group-us > button {
            border-radius: 5px;
            margin: auto 5px;
        }
    </style>
@stop

@section('content')
    @include('home.layouts.head')
    <div class="container-wrap">
        <div id="fh5co-blog" style="padding: 2rem 3rem;">
            <div class="row" style="margin-bottom: 30px">
                <div class="col-lg-8">
                    <div class="btn-group-us">
                        <button type="button" class="btn btn-info" onclick="jack();">点击数&nbsp;<i
                                    class="fa fa-sort-amount-asc"
                                    aria-hidden="true"></i></button>
                        <button type="button" class="btn btn-default">收藏数</button>
                    </div>
                </div>
                <div class="col-lg-4">
                    <form action="">
                        <div class="input-group">
                            <input type="text" class="form-control" name="keywork" placeholder="输入书名或作者名...">
                            <span class="input-group-btn">
                         <button class="btn btn-default btn-seach" type="submit"><i class="fa fa-search"
                                                                                    aria-hidden="true"></i></button>
                        </span>
                        </div>
                    </form>
                </div>
            </div>
            {{--<div class="alert alert-info alert-dismissible text-center">--}}
            {{--<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>--}}
            {{--搜索 「 傻逼 」的结果--}}
            {{--</div>--}}
            <div class="row" id="resourcePage">

                <div class="col-md-12" id="onload-load">
                    <div class="alert alert-info alert-dismissible text-center">
                        <i class="fa fa-spinner" aria-hidden="true"></i> 正在努力加载中 ~
                    </div>
                </div>

                <div class="col-md-4" v-for="item in items">
                    <div class="fh5co-blog zoomInUp animated">
                        <a href="#" class="blog-bg animated" onmouseover="attchClass(this);" style="background-image:url(@{{item.preview}});"></a>
                        <div class="blog-text">
                            <span class="posted_on">@{{item.created_at}}</span>
                            <h3><a href="#">@{{item.name}}</a></h3>
                            <p>@{{item.intro}}</p>
                            <ul class="stuff">
                                <li><i class="icon-heart3"></i>@{{item.favorite_count}}</li>
                                <li><i class="icon-eye2"></i>@{{item.click_count}}</li>
                                <li><a href="#">查看<i class="icon-arrow-right22"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-12" id="onload-loaded" style="display: none;">
                    <div class="alert alert-info alert-dismissible text-center">
                        没有更多了 ~
                    </div>
                </div>

            </div>
        </div>
    </div><!-- END container-wrap -->
    @include('home.layouts.footer')
@stop

@section('js')
    <script src="/assets/js/vue.js"></script>
    <script src="/assets/js/vue-resource.min.js"></script>
    <script>
        var vm = new Vue({
            el: '#fh5co-blog',
            data: {
                page: 1,
                items: []
            },
            ready: function () {
                this.fetchItems(this.page);
            },
            methods: {
                fetchItems: function (page) {
                    var data = {page: page};
                    this.$http.get('/api/book/ajaxpaginate', data).then(function (response) {
                        if (response.data.data.length !== 0) {
                            $('#onload-load').hide();
                            this.changePage(page + 1);
                            vm.items = vm.items.concat(response.data.data);
                        }
                        else {
                            $('#onload-loaded').show();
                        }
                    }, function (error) {

                    });
                },
                changePage: function (page) {
                    this.page = page;
                },
                nextPage: function () {
                    this.fetchItems(this.page);
                }
            }
        });

        $(window).scroll(function () {  //分页

            if ($(window).scrollTop() + $(window).height()  > $(document).height() - 350) { //滚动到底部时
                vm.nextPage();
            }
        });

        function attchClass(object) {
            $(object).addClass('rubberBand');
            setTimeout(function(){
                $(object).removeClass('rubberBand');
            },1000)
        }

    </script>
@stop