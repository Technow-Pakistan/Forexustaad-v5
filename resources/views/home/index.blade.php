@include ('inc/header')
<div class="content_area">
    <div class="banner_area">
        <div class="container">
            <div class="row">
                <div class="col-lg-2 col-md-6 col-sm-6 col-xs-6 col-6 order-2 order-lg-1">
                    <div class="text-center">
                        @isset($MainLeftBanner)
                            @if($MainLeftBanner->htmlLink == null )
                                <a href="{{$MainLeftBanner->link}}">
                                    <img src="{{URL::to('/storage/app')}}/{{$MainLeftBanner->banner}}" width="160" height="600" alt="" />
                                </a>
                            @else
                                @php
                                    echo $MainLeftBanner->htmlLink;
                                @endphp
                            @endif
                        @endisset
                    </div>
                </div>
                <div class="col-lg-8 col-md-12 order-1 order-lg-2">
                    <div class="home-slider">
                        <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-ride="carousel"
                            data-interval="100000">
                            <ol class="carousel-indicators">
                                @for($i=0; $i < count($SlidingImagesData); $i++)
                                <li data-target="#carouselExampleIndicators" data-slide-to="{{$i}}" class="{{$i == 0 ? 'active' : ''}}"></li>
                                <!-- <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li> -->
                                @endfor
                            </ol>
                            <div class="carousel-inner">
                                @php
                                    $activeSlidingImage = 1;
                                @endphp
                                @foreach($SlidingImagesData as $imageData)
                                <div class="carousel-item {{$activeSlidingImage == 1 ? 'active' : ''}}">
                                    <img src="{{URL::to('storage/app')}}/{{$imageData->image}}" class="d-block w-100 wow animated" alt="slide1" style="visibility: visible;">

                                    <div class="carousel-caption d-flex slide1 last-slide">

                                <div class="row no-gutters w-100 slide_row">
                                <div class="col-lg-12">
                                        <div class="slide_content text-md-left text-sm-left">
                                            <h1><span class="highlight secondary-color">{{$imageData->title}}</h1>
                                            <p>{{$imageData->description}}</p>
                                            <a class="btn btn-primary btn-radial" href="{{$imageData->link}}" role="button">Learn More</a>
                                        </div>
                                    </div>
                                  </div>
                                  </div>

                                  @php
                                                    $activeSlidingImage++;
                                                @endphp
                                  <div class="bannner-info">
                                    <ul>
                                        <li>
                                            <a href="#">www.forexustaad.com</a>
                                        </li>
                                        <li>
                                            <a href="#">+44 7459065360</a>
                                        </li>
                                        <li>
                                            <a href="#">info@forexustaad.com</a>
                                        </li>
                                    </ul>
                                  </div>
                                </div>
                               @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-6 col-sm-6 col-xs-6 col-6 order-3 order-lg-3">
                    <div class="text-center">
                        @isset($MainRightBanner)
                            @if($MainRightBanner->htmlLink == null )
                                <a href="{{$MainRightBanner->link}}">
                                    <img src="{{URL::to('/storage/app')}}/{{$MainRightBanner->banner}}" width="160" height="600" alt="" />
                                </a>
                            @else
                                @php
                                    echo $MainRightBanner->htmlLink;
                                @endphp
                            @endif
                        @endisset
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- ticker rates add-->
    <div class="ticker">
        <div class="list-wrpaaer">
            <ul id="marquee-horizontal">
                <li class="list-ite">
                    @php
                        echo $MainHomeApi->link
                    @endphp
                </li>

            </ul>
        </div>
    </div>
    <!-- /.End of tricker -->
    <section class="after_banner_content_area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-3 col-md-6 col-sm-12 order-2 order-lg-1">
                    @include ('inc/home-left-sidebar')
                </div>
                <div class="col-lg-6 col-md-12 order-1 order-lg-2">
                            @if($MidBannerHomeActive)
                                <div class="mb-5">
                                    <a href="{{$MidBannerHomeActive->link}}" target="_blank">
                                        <img src="{{URL::to('storage/app')}}/{{$MidBannerHomeActive->image}}" width="100%">
                                      </a>
                                </div>
                            @endif
                    <section class="what-is">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-6 col-md-6 col-sm-6 col-12 order-2 order-sm-1">
                                    <div class="content_area py-5">
                                        <div class="content_area_heading">
                                            <h1 class="heading_title wow animated fadeInUp">
                                                Message From CEO
                                            </h1>
                                            <div class="heading_border wow animated fadeInUp">
                                                <span class="two"></span><span class="three"></span>
                                            </div>
                                        </div>
                                        <div class="content_area_text wow animated fadeInUp">
                                            <p>
                                                 My Goal is to educate everyone about forex and help them reshape their future by teaching them how they can be financially in-depended and successful in life.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6 col-sm-6 text-center p-0 order-1 order-sm-2">
                                    <div class="icon_area">
                                        <img src="{{URL::to('/public/assets/assets/img/img-head.png')}}" class="wow animated fadeInUp">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    @if(Session::has('client'))
                    <section class="news-slid features">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12 col-md-12 col-sm-12 col-12 order-2 order-sm-1">
                                    <div style="margin:0px auto">

                                    <section class="vid-main-wrapper clearfix">
                                            <!-- THE YOUTUBE PLAYER -->
                                            <div class="vid-container">
                                                <div class="fluid-width-video-wrapper" style="padding-top: 55%;">
                                                    <iframe id="vid_frame" src="https://www.youtube.com/embed/X9JClP-XMyc?rel=0&amp;showinfo=0&amp;autohide=1&amp;autoplay=1" frameborder="0" allow="" allowfullscreen=""></iframe>
                                                </div>
                                            </div>
                                        </section>

                                        <section id="extra wrapper"
                                            style="position: relative; padding-right: 44px; padding-left: 48px; background: #f6f6f6; height:152px;">
                                            <!-- CUSTOM ARROWS -->
                          <button title="Next" class="swiper-custom-next" style="position: absolute; padding: 10px 2px; right: 1px;top: 32%;
                          display: inline-block;cursor: pointer;">
                      <svg style="position: relative; top: 1px;" xmlns="" width="16" height="16" viewBox="0 0 16 16"><g class="nc-icon-wrapper" fill="#111111"><polygon fill="#111111" points="4.9,15.7 3.4,14.3 9.7,8 3.4,1.7 4.9,0.3 12.6,8 "></polygon></g></svg>
                            </button>
                          <button title="Prev" class="swiper-custom-prev" style="position: absolute; padding: 10px 2px; left: 2px; top: 35%;
                          display: inline-block;cursor: pointer;font-size: 15px;">
                           <svg xmlns="" width="16" height="16" viewBox="0 0 16 16"><g class="nc-icon-wrapper" fill="#111111"><polygon fill="#111111" points="11.1,15.7 3.4,8 11.1,0.3 12.6,1.7 6.3,8 12.6,14.3 "></polygon></g></svg>
                          </button>
                                            <!-- Swiper -->
                                            <nav class="swiper-container swiper-container-videos slider-produtos-destaque"
                                                style="top: 8px;">
                                                <ol class="swiper-wrapper" style="list-style-type: none; padding: 0px;">
                                                    <li class="swiper-slide" style="width: 130px;">
                                                        <a class="" href="javascript:void();"
                                                            onClick="document.getElementById('vid_frame').src='https://youtube.com/embed/WAcnWtZjDWE?autoplay=1&rel=0&showinfo=0&autohide=1'">
                                                            <span class="vid-thumb">
                                                                <img
                                                                    src="https://i.ytimg.com/vi/X9JClP-XMyc/hqdefault.jpg" />
                                                            </span>
                                                            <p class="desc">Lecture 1</p>
                                                        </a>
                                                    </li>

                                                    <li class="swiper-slide" style="width: 130px;">
                                                        <a href="javascript:void();"
                                                            onClick="document.getElementById('vid_frame').src='https://www.youtube.com/embed/UC0AhxFpilA?autoplay=1&rel=0&showinfo=0&autohide=1'">
                                                            <span class="vid-thumb"><img
                                                                    src="https://i.ytimg.com/vi/UC0AhxFpilA/hqdefault.jpg" /></span>
                                                            <p class="desc">Lecture 2</p>
                                                        </a>
                                                    </li>

                                                    <li class="swiper-slide" style="width: 130px;">
                                                        <a href="javascript:void();"
                                                            onClick="document.getElementById('vid_frame').src='https://www.youtube.com/embed/sbCrpno-pE4?autoplay=1&rel=0&showinfo=0&autohide=1'">
                                                            <span class="vid-thumb"><img
                                                                    src="https://i.ytimg.com/vi/sbCrpno-pE4/hqdefault.jpg" /></span>
                                                            <div class="desc">Lecture 3</div>
                                                        </a>
                                                    </li>

                                                     <li class="swiper-slide" style="width: 130px;">
                                                        <a href="javascript:void();"
                                                            onClick="document.getElementById('vid_frame').src='https://www.youtube.com/embed/iHncnJ2LM60?autoplay=1&rel=0&showinfo=0&autohide=1'">
                                                            <span class="vid-thumb"><img
                                                                    src="https://i.ytimg.com/vi/iHncnJ2LM60/hqdefault.jpg" /></span>
                                                            <div class="desc">Lecture 4</div>
                                                        </a>
                                                    </li>
                                                    <li class="swiper-slide" style="width: 130px;">
                                                        <a href="javascript:void();"
                                                            onClick="document.getElementById('vid_frame').src='https://www.youtube.com/embed/6FokO8ntMvo?autoplay=1&rel=0&showinfo=0&autohide=1'">

                                                            <span class="vid-thumb"><img
                                                                    src="https://i.ytimg.com/vi/6FokO8ntMvo/hqdefault.jpg" /></span>
                                                            <div class="desc">Lecture 5</div>
                                                        </a>
                                                    </li>
                                                    <li class="swiper-slide" style="width: 130px;">
                                                        <a href="javascript:void();"
                                                            onClick="document.getElementById('vid_frame').src='https://www.youtube.com/embed/pmL632FYHfc?autoplay=1&rel=0&showinfo=0&autohide=1'">

                                                            <span class="vid-thumb"><img
                                                                    src="https://i.ytimg.com/vi/pmL632FYHfc/hqdefault.jpg" /></span>
                                                            <div class="desc">Lecture 6</div>
                                                        </a>
                                                    </li>
                                                    <li class="swiper-slide" style="width: 130px;">
                                                        <a href="javascript:void();"
                                                            onClick="document.getElementById('vid_frame').src='https://www.youtube.com/embed/FQLN-vMWNTE?autoplay=1&rel=0&showinfo=0&autohide=1'">

                                                            <span class="vid-thumb"><img
                                                                    src="https://i.ytimg.com/vi/FQLN-vMWNTE/hqdefault.jpg" /></span>
                                                            <div class="desc">Lecture 7</div>
                                                        </a>
                                                    </li>
                                                    <li class="swiper-slide" style="width: 130px;">
                                                        <a href="javascript:void();"
                                                            onClick="document.getElementById('vid_frame').src='https://www.dailymotion.com/embed/video/x23uw26?autoplay=1&rel=0&showinfo=0&autohide=1'">

                                                            <span class="vid-thumb"><img
                                                                    src="https://s1.dmcdn.net/v/7c2ZE1PeDikEO94Hj/x480" style="height:90px;" /></span>
                                                            <div class="desc">Lecture 8</div>
                                                        </a>
                                                    </li>
                                                    <li class="swiper-slide" style="width: 130px;">
                                                        <a href="javascript:void();"
                                                            onClick="document.getElementById('vid_frame').src='https://www.youtube.com/embed/vFG45cY6Em0?autoplay=1&rel=0&showinfo=0&autohide=1'">

                                                            <span class="vid-thumb"><img
                                                                    src="https://i.ytimg.com/vi/vFG45cY6Em0/hqdefault.jpg"  /></span>
                                                            <div class="desc">Lecture 9</div>
                                                        </a>
                                                    </li>
                                                    <li class="swiper-slide" style="width: 130px;">
                                                        <a href="javascript:void();"
                                                            onClick="document.getElementById('vid_frame').src='https://player.vimeo.com/video/126562298?autoplay=1&rel=0&showinfo=0&autohide=1'">

                                                            <span class="vid-thumb"><img
                                                                    src="https://i.vimeocdn.com/video/517171722_130x73.jpg" style="height:90px;" /></span>
                                                            <div class="desc">Lecture 10</div>
                                                        </a>
                                                    </li>


                                                </ol>


                                            </nav>

                                        </section>

                                    </div>
                                </div>

                            </div>
                        </div>
                    </section>
                @endif

                @php $dataSignalsCount = 0; @endphp
                    @foreach($StarSignalsHome as $data)
                        @php $dataSignalsCount++ @endphp
                        @if($dataSignalsCount == 1)
                            <section class="features">
                                <div class="container">
                                    <div class="content_area_heading large-heading text-center">

                                        <h1 class="heading_title wow animated fadeInUp">
                                            Latest Signals
                                        </h1>
                                        <div class="heading_border wow animated fadeInUp">
                                            <span class="one"></span><span class="two"></span><span class="three"></span>
                                        </div>
                                    </div>
                                    <div class="row justify-content-center">
                        @endif
                                            @php
                                                $url = $data->GetURL();
                                                $loginClientData = Session::get('client');
                                                $go = 1;
                                                $go3 = 1;
                                                $profits = explode('@',$data->takeProfit);
                                                $time1 = strtotime($data->time);
                                                $time = date('h:i A', $time1);
                                                $date1 = strtotime($data->date);
                                                $date = date('d M Y', $date1);
                                                if($data->date == date("Y-m-d")){
                                                    if($data->time >= date("H:i:s")){
                                                        $go = 0;
                                                        $go3 = 3;
                                                    }
                                                }
                                                if($data->date > date("Y-m-d")){
                                                    $go = 0;
                                                    $go3 = 3;
                                                }
                                                $timeDate1 = strtotime(date("Y-m-d H:i:s"));
                                                $timeDate2 = strtotime($data->created_at->format("Y-m-d H:i:s"));
                                                $minsDate = ($timeDate1 - $timeDate2) / 60;
                                                            $pair = $data->getPair();
                                                $flags = explode("/",$pair->pair);
                                            @endphp
                                            @if($go == 0)
                                                <div class="col-xl-4 col-lg-6 col-md-7 col-sm-8 col-12 h-100">
                                                    <div class="features_inner text-center wow animated fadeInLeft">
                                                        <div class="services_wrapper">
                                                            <div class="">
                                                                <div class="services_icon">
                                                                    @foreach($flags as $flag)
                                                                        @php $flag4 = str_replace(' ', '', $flag) @endphp
                                                                        <img src="{{URL::to('storage/app/signalFlag')}}/{{$flag4}}.jpg" width="50" height="35" alt=""> &nbsp;&nbsp;
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                            <div class="feature_content">
                                                                <h3 class="content_title">
                                                                    {{$pair->pair}} <br>
                                                                    {{$data->selectUser}} <br>
                                                                    @if($go == 0)
                                                                        @if($data->selectUser == "Register User" && !Session::has('client'))
                                                                            <a href="#!" class="LoginButton" data-toggle="modal" data-target="#requestQuoteModal">View Signal</a>
                                                                        @elseif($data->selectUser == "VIP Member")
                                                                        @if(!Session::has('client'))
                                                                            <a href="#!" class="LoginButton" data-toggle="modal" data-target="#requestQuoteModal">View Signal</a>
                                                                        @elseif(isset($loginClientData->memberType))
                                                                            @if($loginClientData->memberType == 1)
                                                                                <a href="#!" onclick="snackbar1()">View Signal</a>
                                                                            @else
                                                                                <a href="{{URL::to('signal')}}/{{$url}}">View Signal</a>
                                                                            @endif
                                                                        @endif
                                                                        @else
                                                                            <a href="{{URL::to('signal')}}/{{$url}}">View Signal</a>
                                                                        @endif
                                                                    @endif
                                                                </h3>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endif
                                        @if(count($StarSignalsHome) == $dataSignalsCount )
                                    </div>
                                </div>
                            </section>
                                        @endif
                    @endforeach





                      <section class="mt-4">
                        <div class="row">
                            <div class="col-sm-12">
                                @foreach($AllHomeApi as $TopApi)
                                    @if($TopApi->area == "Top")
                                        @if($TopApi->id != $MainHomeApi->id)
                                            @php
                                                echo $TopApi->link
                                            @endphp
                                        @endif
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </section>



                    @if(count($LatestBlogsData) > 0)
                        <section class="our_news">
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="news_us">
                                            <div class="content_area_heading large-heading text-center">

                                                <h1 class="heading_title wow animated fadeInUp">
                                                    Our Latest News
                                                </h1>
                                                <div class="heading_border wow animated fadeInUp">
                                                    <span class="one"></span><span class="two"></span><span
                                                        class="three"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="news_responsive news_slider bullet_style wow animated fadeInUp">
                                            @foreach ($LatestBlogsData as $value)
                                                @php
                                                    $category = $value->GetCategory();
                                                    $go = 1;
                                                    if($value->publishDate == date("Y-m-d")){
                                                        if($value->publishTime >= date("H:i:s")){
                                                            $go = 0;
                                                        }
                                                    }
                                                    $paymentDate = date('Y-m-d');
                                                    $paymentDate=date('Y-m-d', strtotime($paymentDate));
                                                    //echo $paymentDate; // echos today!
                                                    $contractDateBegin = date('Y-m-d', strtotime($value->publishDate));
                                                @endphp
                                                @if($go == 1)
                                                    @if($paymentDate >= $contractDateBegin)
                                                            <div class="slide position-relative news">
                                                                <div class="new_img">
                                                                    <img src="{{URL::to('storage/app')}}/{{$value->image}}">
                                                                </div>
                                                                <div class="new_description-details">
                                                                <h6>
                                                                    <a href="{{URL::to('/Posts')}}/{{$category->mainCategory}}/{{$value->permalink}}">
                                                                            {{$value->mainTitle}}
                                                                        </a>
                                                                </h6>
                                                                <p>
                                                                    {{$value->description}}
                                                                </p>
                                                                </div>
                                                            </div>
                                                    @endif
                                                @endif
                                            @endforeach
                                        </div>
                                        <div class="new_btn text-right wow animated fadeInUp">
                                            <a href="{{URL::to('/blog-post.html')}}">Show More News <i class="fa fa-chevron-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    @endif
                    @if(count($LatestFundamental) > 0)
                        <section class="analysis">
                            <div class="container">
                                <div class="content_area_heading large-heading text-center">

                                    <h1 class="heading_title wow animated fadeInUp">
                                        Fundamental History
                                    </h1>
                                    <div class="heading_border wow animated fadeInUp">
                                        <span class="one"></span><span class="two"></span><span class="three"></span>
                                    </div>
                                </div>


                                <div class="row">

                                    @foreach ($LatestFundamental as $fundamental)
                                        @php
                                            $url = str_replace(" ","-",$fundamental->title);
                                            $admin = $fundamental->GetAdminMember();
                                        @endphp
                                        <div class="col-md-6">
                                            <div class="media">
                                                <img class="mr-3" src="{{URL::to('storage/app')}}/{{$fundamental->image}}" alt="Generic placeholder image">
                                                <div class="media-body">
                                                    <p class="date m-0">{{$fundamental->created_at->format('M d, Y')}}</p>
                                                    <h6 class="m-0"><a href="{{URL::to('/fundamental')}}/{{$url}}">{{$fundamental->title}}</a></h6>
                                                    <p class="m-0 nameby">{{$admin->username}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach

                                </div>
                            </div>
                        </section>
                    @endif
                    <section>
                        <div class="row">
                            <div class="col-sm-12">
                                @foreach($AllHomeApi as $CenterApi)
                                    @if($CenterApi->area == "Center")
                                        @php
                                            echo $CenterApi->link
                                        @endphp
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </section>

                    @if(count($latestWebinars) > 0)

                        <section class="our_news">
                            <div class="container">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="news_us">
                                            <div class="content_area_heading large-heading text-center">

                                                <h1 class="heading_title wow animated fadeInUp">
                                                    Upcomming Live Webinars
                                                </h1>
                                                <div class="heading_border wow animated fadeInUp">
                                                    <span class="one"></span><span class="two"></span><span class="three"></span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-12">
                                        <div class="news_responsive webinar_responsive bullet_style wow animated fadeInUp">
                                            @foreach ($latestWebinars as $data)
                                                <div class="slide position-relative news">

                                                    <div class="new_img">
                                                        <img src="{{URL::to('storage/app')}}/{{$data->image}}" width="100%"></video>
                                                    </div>
                                                    <div class="new_description-details">


                                                        <h6>
                                                            <a href="{{$data->link}}" target="_blank">
                                                                    {{$data->title}}
                                                                </a>
                                                        </h6>
                                                        <p class="webinarParaStyle">
                                                            {{$data->description}}
                                                        </p>
                                                        <div class="webinar-info">
                                                            <p class="m-0 date">
                                                                @php
                                                                    $dateData = date_create($data->date);
                                                                    $date  = date_format($dateData,"d M");
                                                                    $timeData = date_create($data->time);
                                                                    $time  = date_format($timeData,"H:i A");
                                                                @endphp
                                                                {{$date}} - {{$time}}
                                                            </p>
                                                            <p class="m-0 go-icon">
                                                                <a href="{{$data->link}}" target="_blank"><i class="fa fa-arrow-right text-light"></i></a>
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                        <div class="new_btn text-right wow animated fadeInUp">
                                            <a href="{{URL::to('/webinar')}}">Show More Webinars <i class="fa fa-chevron-right"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                    @endif


                    <section class="currency-table-list">
                        <!-- /.End of How to Get  Start -->
                        <!-- <div class="currency-table">
                            <div class="with-nav-tabs currency-tabs">
                                <div class="tab-header">
                                    <ul class="nav nav-tabs" id="currencyTab" role="tablist">
                                        <li class="nav-item" class="active"><a class="nav-link active" href="#crypto"
                                                data-toggle="tab" role="tab" aria-controls="crypto"
                                                aria-selected="true">Crypto</a></li>
                                        <li class="nav-item"><a class="nav-link" href="#forex" data-toggle="tab"
                                                role="tab" aria-controls="forex" aria-selected="false">Forex</a></li>
                                        <li class="nav-item"><a class="nav-link" role="tab" aria-controls="stocks"
                                                aria-selected="false" href="#stocks" data-toggle="tab">Stocks</a></li>
                                    </ul>
                                </div>
                                <div class="container">
                                    <div class="tab-content" id="currencyTabContent">
                                        <div class="tab-pane fade show active" id="crypto" role="tabpanel"
                                            aria-labelledby="crypto-tab">
                                            <div class="scroll-tbl">
                                                <table id="cryptoTable" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                                                    <thead>                                                      
                                                        <tr>
                                                            <th>Id</th>
                                                            <th>Symbol</th>
                                                            <th>Price</th>
                                                            <th>Opening Price</th>
                                                            <th>High Price</th>
                                                            <th>Low Price</th>
                                                            <th>Date & Time</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($CryptoApiData as $cryptoData)
                                                            <tr>
                                                                <td>{{$cryptoData->id}}</td>
                                                                <td>{{$cryptoData->s}}</td>
                                                                <td>{{$cryptoData->c}}</td>
                                                                <td>{{$cryptoData->o}}</td>
                                                                <td>{{$cryptoData->h}}</td>
                                                                <td>{{$cryptoData->l}}</td>
                                                                <td>{{$cryptoData->tm}}</td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="forex" role="tabpanel"
                                            aria-labelledby="forex-tab">
                                            <div class="scroll-tbl">
                                                <table id="forexTable" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                                                    <thead>                                                     
                                                        <tr>
                                                            <th>Id</th>
                                                            <th>Symbol</th>
                                                            <th>Price</th>
                                                            <th>Opening Price</th>
                                                            <th>High Price</th>
                                                            <th>Low Price</th>
                                                            <th>Date & Time</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($forexApiData as $forexData)
                                                            <tr>
                                                                <td>{{$forexData->id}}</td>
                                                                <td>{{$forexData->s}}</td>
                                                                <td>{{$forexData->c}}</td>
                                                                <td>{{$forexData->o}}</td>
                                                                <td>{{$forexData->h}}</td>
                                                                <td>{{$forexData->l}}</td>
                                                                <td>{{$forexData->tm}}</td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="stocks" role="tabpanel"
                                            aria-labelledby="stocks-tab">
                                            <div class="scroll-tbl">
                                                <table id="stocksTable" class="table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                                                    <thead>                                                    
                                                        <tr>
                                                            <th>Id</th>
                                                            <th>Symbol</th>
                                                            <th>Price</th>
                                                            <th>High Price</th>
                                                            <th>Low Price</th>
                                                            <th>Date & Time</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($StockApiData as $stockData)
                                                            <tr>
                                                                <td>{{$stockData->id}}</td>
                                                                <td>{{$stockData->name}}</td>
                                                                <td>{{$stockData->c}}</td>
                                                                <td>{{$stockData->h}}</td>
                                                                <td>{{$stockData->l}}</td>
                                                                <td>{{$stockData->tm}}</td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <!-- /.End of currency table -->
                    </section>


                    <section>
                        <div class="row">
                            <div class="col-sm-12">
                                @foreach($AllHomeApi as $BottomApi)
                                    @if($BottomApi->area == "Bottom")
                                        @php
                                            echo $BottomApi->link
                                        @endphp
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </section>

                    @if(count($StarBrokerHome) > 0)
                        <section class="top-brokers ">


                            <div class="content_area_heading large-heading text-center">

                                <h1 class="heading_title wow animated fadeInUp">
                                    Start Trading With Top Industry Brokers
                                </h1>
                                <div class="heading_border wow animated fadeInUp">
                                    <span class="one"></span><span class="two"></span><span class="three"></span>
                                </div>
                            </div>

                            <div class="scroll-tbl">
                                <table id="topbroker-list" class="table table-striped">
                                    <thead class=" bannner-info">
                                        <tr>
                                            <th>Brokers</th>
                                            <th>Regulation</th>
                                            <th>Minimum Deposit</th>
                                            <th>Trade</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($StarBrokerHome as $starBroker)
                                        @php
                                            $deposit = $starBroker->GetAccountInfo();
                                            $promotion = $starBroker->GetPromotionLinkInfo();
                                        @endphp
                                        <tr>
                                            <td>
                                                <img src="{{URL::to('storage/app')}}/{{$starBroker->image}}" width="200" height="33">
                                            </td>
                                            <td class="brokerRegulationStyle">{{$starBroker->regulations}}</td>
                                            <td>{{$deposit->min}}</td>
                                            <td>
                                                <div class="checkbox">
                                                    <a href="{{$promotion->link}}"class="btn btn-mine radial">Trade</a>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>

                        </section>
                    @endif


                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 order-3 order-lg-3">
                    @include ('inc/home-right-sidebar')
                </div>
            </div>
        </div>
    </section>

    <!--     <div id="particles-js" style="height: 0;"></div> -->
</div>
@include ('inc/footer')


<script>
   
// // Stock Indices
//     $.ajax({
//       type: "Get",
//       url: "https://fcsapi.com/api-v3/stock/indices_latest?id=1,2,3,4,5&access_key=&access_key=7bcaAttKq4UFZwKhrE2LEHn",
//       success: function(response){
//         json = response.response;
//         $("#stocksTable tbody").html("");
//         for (let index = 0; index < json.length; index++) {
//             $("#stocksTable tbody").append("<tr><td>"+json[index].name+"</td><td>"+json[index].c+"</td><td>"+json[index].h+"</td><td>"+json[index].l+"</td><td>"+json[index].tm+"</td></tr>");          
//         }
//       },
//       error: function(data) {
//         console.log("fail");
//       }
//     });


// // Crypto
//     $.ajax({
//       type: "Get",
//       url: "https://fcsapi.com/api-v3/crypto/latest?symbol=all_crypto&access_key=DGBiPcd81sslKeJJuwC17lhGW",
//       success: function(response){
//         json = response.response;
//         $("#cryptoTable tbody").html("");
//         for (let index = 0; index < json.length; index++) {
//             $("#cryptoTable tbody").append("<tr><td>"+json[index].s+"</td><td>"+json[index].c+"</td><td>"+json[index].o+"</td><td>"+json[index].h+"</td><td>"+json[index].l+"</td><td>"+json[index].tm+"</td></tr>");          
//         }
//       },
//       error: function(data) {
//         console.log("fail");
//       }
//     });

// // Forex
    // $.ajax({
    //   type: "Get",
    //   url: "https://fcsapi.com/api-v3/forex/latest?symbol=all_forex&access_key=7bcaAttKq4UFZwKhrE2LEHn",
    //   success: function(response){
    //     json = response.response;
    //     $("#forexTable tbody").html("");
    //     for (let index = 0; index < json.length; index++) {
    //         $("#forexTable tbody").append("<tr><td>"+json[index].s+"</td><td>"+json[index].c+"</td><td>"+json[index].o+"</td><td>"+json[index].h+"</td><td>"+json[index].l+"</td><td>"+json[index].tm+"</td></tr>");          
    //     }
    //   },
    //   error: function(data) {
    //     console.log("fail");
    //   }
    // });
</script>
