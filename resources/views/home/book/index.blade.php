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
            .btn-group-us>button {
                border-radius: 5px;
                margin:auto 5px;
            }
        </style>
    @stop

@section('content')
    @include('home.layouts.head')
    <div class="container-wrap">
        <div id="fh5co-blog" style="padding-top: 2rem;">
            <div class="row" style="margin-bottom: 30px">
                <div class="col-lg-8">
                    <div class="btn-group-us">
                        <button type="button" class="btn btn-info">点击数&nbsp;<i class="fa fa-sort-amount-asc" aria-hidden="true"></i></button>
                        <button type="button" class="btn btn-default">收藏数</button>
                    </div>
                </div>
                <div class="col-lg-4">
                    <form action="">
                        <div class="input-group">
                        <input type="text" class="form-control" name="keywork" placeholder="输入书名或作者名...">
                        <span class="input-group-btn">
                         <button class="btn btn-default btn-seach" type="submit"><i class="fa fa-search" aria-hidden="true"></i></button>
                        </span>
                    </div>
                    </form>
                </div>
            </div>
            <div class="row">
                {{--<div class="alert alert-info alert-dismissible text-center">--}}
                    {{--<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>--}}
                    {{--搜索 「 傻逼 」的结果--}}
                {{--</div>--}}
                @foreach($books as $book)
                    <div class="col-md-4">
                        <div class="fh5co-blog animate-box">
                            <a href="#" class="blog-bg" style="background-image: url({{$book->preview}});"></a>
                            <div class="blog-text">
                                <span class="posted_on">{{$book->created_at}}</span>
                                <h3><a href="#">{{$book->name}}</a></h3>
                                <p>{{$book->intro}}</p>
                                <ul class="stuff">
                                    <li><i class="icon-heart3"></i>{{$book->favorite_count}}</li>
                                    <li><i class="icon-eye2"></i>{{$book->click_count}}</li>
                                    <li><a href="#">查看<i class="icon-arrow-right22"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach
                <div class="row text-center">
                    {!! $books->render() !!}
                </div>

            </div>
        </div>
    </div><!-- END container-wrap -->
    @include('home.layouts.footer')
@stop