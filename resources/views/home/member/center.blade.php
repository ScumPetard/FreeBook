@extends('home.layouts.base')

@section('title','个人中心')

@section('css')
    <link rel="stylesheet" href="/assets/css/memberResource.css">
@stop

@section('content')
    @include('home.layouts.head')
    <div class="container-wrap">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-3 wow fadeInLeft animated">
                    <div class="box box-primary">
                        <div class="box-body box-profile">
                            <img class="profile-user-img img-responsive img-circle"
                                 src="{{$member->avatar?$member->avatar:'/default-avatar.jpg'}}">
                            <h4 class="profile-username text-center">{{$member->name}}</h4>
                            <p class="text-muted text-center">您是本站第<a href="javascript:;">「 {{$member->id}} 」</a>位会员</p>
                            <ul class="list-group list-group-unbordered">
                                <li class="list-group-item">
                                    <b><i class="fa fa-star" aria-hidden="true"></i></b>&nbsp;已获得赞 <span
                                            class="label label-success pull-right">{{$member->praise_count}}</span>
                                </li>
                                <li class="list-group-item">
                                    <b><i class="fa fa-book" aria-hidden="true"></i></b>&nbsp;已分享资源 <span
                                            class="label label-success pull-right">543</span>
                                </li>
                                <li class="list-group-item">
                                    <b><i class="fa fa-sign-in" aria-hidden="true"></i></b>&nbsp;注册于 <span
                                            class="pull-right">{{$member->created_at}}</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title"></h3>
                        </div>
                        <div class="box-body text-center" style="padding: 15px;">
                            <strong>个人介绍</strong>
                            <br>
                            <p class="text-muted" style="padding-top: 10px;">
                                {{$member->intro or '还没有填写个人介绍哦~'}}
                            </p>
                        </div>
                        <div class="box-footer text-center">
                            <a href="/member/data" class="btn btn-info btn-signout">编辑资料</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="nav-tabs-custom" style="padding: 15px;">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#activity" data-toggle="tab" aria-expanded="true">最近阅读</a></li>
                            <li class=""><a href="#timeline" data-toggle="tab" aria-expanded="false">我的分享</a></li>
                            <li class=""><a href="#settings" data-toggle="tab" aria-expanded="false">Settings</a></li>
                        </ul>
                        <div class="tab-content">
                            <div class="tab-pane active" id="activity">

                                    <div class="row" style="padding: 30px;">
                                        <div class="col-md-6">
                                            <div class="fh5co-blog animate-box fadeInUp animated-fast">
                                                <a href="#" class="blog-bg" style="background-image: url(/assets/images/blog-1.jpg);"></a>
                                                <div class="blog-text">
                                                    <span class="posted_on">Feb. 15th 2016</span>
                                                    <h3><a href="#">Photoshoot On The Street</a></h3>
                                                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                                                    <ul class="stuff">
                                                        <li><i class="icon-heart3"></i>249</li>
                                                        <li><i class="icon-eye2"></i>1,308</li>
                                                        <li><a href="#">Read More<i class="icon-arrow-right22"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="fh5co-blog animate-box fadeInUp animated-fast">
                                                <a href="#" class="blog-bg" style="background-image: url(/assets/images/blog-2.jpg);"></a>
                                                <div class="blog-text">
                                                    <span class="posted_on">Feb. 15th 2016</span>
                                                    <h3><a href="#">Surfing at Philippines</a></h3>
                                                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                                                    <ul class="stuff">
                                                        <li><i class="icon-heart3"></i>249</li>
                                                        <li><i class="icon-eye2"></i>1,308</li>
                                                        <li><a href="#">Read More<i class="icon-arrow-right22"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="fh5co-blog animate-box fadeInUp animated-fast">
                                                <a href="#" class="blog-bg" style="background-image: url(/assets/images/blog-3.jpg);"></a>
                                                <div class="blog-text">
                                                    <span class="posted_on">Feb. 15th 2016</span>
                                                    <h3><a href="#">Focus On Uderwater</a></h3>
                                                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                                                    <ul class="stuff">
                                                        <li><i class="icon-heart3"></i>249</li>
                                                        <li><i class="icon-eye2"></i>1,308</li>
                                                        <li><a href="#">Read More<i class="icon-arrow-right22"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="fh5co-blog animate-box fadeInUp animated-fast">
                                                <a href="#" class="blog-bg" style="background-image: url(/assets/images/blog-1.jpg);"></a>
                                                <div class="blog-text">
                                                    <span class="posted_on">Feb. 15th 2016</span>
                                                    <h3><a href="#">Photoshoot On The Street</a></h3>
                                                    <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
                                                    <ul class="stuff">
                                                        <li><i class="icon-heart3"></i>249</li>
                                                        <li><i class="icon-eye2"></i>1,308</li>
                                                        <li><a href="#">Read More<i class="icon-arrow-right22"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <nav aria-label="Page navigation" style="float: right">
                                            <ul class="pagination">
                                                <li>
                                                    <a href="#" aria-label="Previous">
                                                        <span aria-hidden="true">&laquo;</span>
                                                    </a>
                                                </li>
                                                <li><a href="#">1</a></li>
                                                <li><a href="#">2</a></li>
                                                <li><a href="#">3</a></li>
                                                <li><a href="#">4</a></li>
                                                <li><a href="#">5</a></li>
                                                <li>
                                                    <a href="#" aria-label="Next">
                                                        <span aria-hidden="true">&raquo;</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </nav>
                                    </div>

                                </div>

                            <div class="tab-pane" id="timeline">
                                <!-- The timeline -->
                                <ul class="timeline timeline-inverse">
                                    <!-- timeline time label -->
                                    <li class="time-label">
                        <span class="bg-red">
                          10 Feb. 2014
                        </span>
                                    </li>
                                    <!-- /.timeline-label -->
                                    <!-- timeline item -->
                                    <li>
                                        <i class="fa fa-envelope bg-blue"></i>

                                        <div class="timeline-item">
                                            <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>

                                            <h3 class="timeline-header"><a href="#">Support Team</a> sent you an email</h3>

                                            <div class="timeline-body">
                                                Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles,
                                                weebly ning heekya handango imeem plugg dopplr jibjab, movity
                                                jajah plickers sifteo edmodo ifttt zimbra. Babblely odeo kaboodle
                                                quora plaxo ideeli hulu weebly balihoo...
                                            </div>
                                            <div class="timeline-footer">
                                                <a class="btn btn-primary btn-xs">Read more</a>
                                                <a class="btn btn-danger btn-xs">Delete</a>
                                            </div>
                                        </div>
                                    </li>
                                    <!-- END timeline item -->
                                    <!-- timeline item -->
                                    <li>
                                        <i class="fa fa-user bg-aqua"></i>

                                        <div class="timeline-item">
                                            <span class="time"><i class="fa fa-clock-o"></i> 5 mins ago</span>

                                            <h3 class="timeline-header no-border"><a href="#">Sarah Young</a> accepted your friend request
                                            </h3>
                                        </div>
                                    </li>
                                    <!-- END timeline item -->
                                    <!-- timeline item -->
                                    <li>
                                        <i class="fa fa-comments bg-yellow"></i>

                                        <div class="timeline-item">
                                            <span class="time"><i class="fa fa-clock-o"></i> 27 mins ago</span>

                                            <h3 class="timeline-header"><a href="#">Jay White</a> commented on your post</h3>

                                            <div class="timeline-body">
                                                Take me to your leader!
                                                Switzerland is small and neutral!
                                                We are more like Germany, ambitious and misunderstood!
                                            </div>
                                            <div class="timeline-footer">
                                                <a class="btn btn-warning btn-flat btn-xs">View comment</a>
                                            </div>
                                        </div>
                                    </li>
                                    <!-- END timeline item -->
                                    <!-- timeline time label -->
                                    <li class="time-label">
                        <span class="bg-green">
                          3 Jan. 2014
                        </span>
                                    </li>
                                    <!-- /.timeline-label -->
                                    <!-- timeline item -->
                                    <li>
                                        <i class="fa fa-camera bg-purple"></i>

                                        <div class="timeline-item">
                                            <span class="time"><i class="fa fa-clock-o"></i> 2 days ago</span>

                                            <h3 class="timeline-header"><a href="#">Mina Lee</a> uploaded new photos</h3>

                                            <div class="timeline-body">
                                                <img src="http://placehold.it/150x100" alt="..." class="margin">
                                                <img src="http://placehold.it/150x100" alt="..." class="margin">
                                                <img src="http://placehold.it/150x100" alt="..." class="margin">
                                                <img src="http://placehold.it/150x100" alt="..." class="margin">
                                            </div>
                                        </div>
                                    </li>
                                    <!-- END timeline item -->
                                    <li>
                                        <i class="fa fa-clock-o bg-gray"></i>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-pane " id="settings">
                                <form class="form-horizontal">
                                    <div class="form-group">
                                        <label for="inputName" class="col-sm-2 control-label">Name</label>

                                        <div class="col-sm-10">
                                            <input type="email" class="form-control" id="inputName" placeholder="Name">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                                        <div class="col-sm-10">
                                            <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputName" class="col-sm-2 control-label">Name</label>

                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputName" placeholder="Name">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputExperience" class="col-sm-2 control-label">Experience</label>

                                        <div class="col-sm-10">
                                            <textarea class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="inputSkills" class="col-sm-2 control-label">Skills</label>

                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <button type="submit" class="btn btn-danger">Submit</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div style="clear: both;"></div>
    </div>
    @include('home.layouts.footer')
@stop