@include ('inc/header')
<div class="content_area">
    <div class="banner_area">
        <div class="container">
            <div class="row">
                @php
                    if(Session::has('error')){
                        $error =Session::get('error');
                    }
                    @endphp
                @isset($error)
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="alert alert-danger">{{$error}}</div>
                        @php Session::pull('error') @endphp
                    </div>
                @endisset
                @php
                    if(Session::has('success')){
                        $success =Session::get('success');
                    }
                    @endphp
                @isset($success)
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="alert alert-danger">{{$success}}</div>
                        @php Session::pull('success') @endphp
                    </div>
                @endisset
                <div class="col-lg-2 col-md-6 col-sm-6 col-xs-6 col-6 order-2 order-lg-1">
                    <div class="text-center">
                        @isset($headerLeftBanner)
                            @if($headerLeftBanner->htmlLink == null )
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

                                        @if(Session::has('client'))

                                        <section id="extra wrapper"
                                            style="position: relative; padding-right: 44px; padding-left: 48px; background: #f6f6f6; height:152px;">
                                            <!-- CUSTOM ARROWS -->
                                            <button title="Next" class="swiper-custom-next" style="position: absolute; padding: 10px 2px; right: 1px;top: 32%; z-index: 100;
                                            display: inline-block;cursor: pointer;">
                                            <svg style="position: relative; top: 1px;" xmlns="" width="16" height="16" viewBox="0 0 16 16"><g class="nc-icon-wrapper" fill="#111111"><polygon fill="#111111" points="4.9,15.7 3.4,14.3 9.7,8 3.4,1.7 4.9,0.3 12.6,8 "></polygon></g></svg>
                                                </button>
                                            <button title="Prev" class="swiper-custom-prev" style="position: absolute; padding: 10px 2px; left: 2px; top: 35%; z-index: 100;
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



                                                </ol>


                                            </nav>

                                        </section>

                                        @endif
                                    </div>
                                </div>

                            </div>
                        </div>
                    </section>






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
                                                                <a href="{{URL::to('/Blog')}}/{{$value->permalink}}">
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

                    <section class="analysis">
                        <div class="container">
                            <div class="content_area_heading large-heading text-center">

                                <h1 class="heading_title wow animated fadeInUp">
                                    Analysis & Opinion
                                </h1>
                                <div class="heading_border wow animated fadeInUp">
                                    <span class="one"></span><span class="two"></span><span class="three"></span>
                                </div>
                            </div>


                            <div class="row">

                                <?php
$analysis = [
    ['src' => '1.jpg', 'url' => '', 'anchor_text' => 'Cras sit amet nibh libero, in gravida nulla'],
    ['src' => '2.jpg', 'url' => '', 'anchor_text' => 'Cras sit amet nibh libero, in gravida'],
    ['src' => '3.jpg', 'url' => '', 'anchor_text' => 'Cras sit amet nibh libero'],
    ['src' => '4.png', 'url' => '', 'anchor_text' => 'Cras sit amet nibh libero, in gravida nulla nibh libero']
];

$opinion_analysis = '';
?>
@foreach ($analysis as $analysiss_val => $value)

        <div class="col-md-6">
                <div class="media">
              <img class="mr-3" src="{{URL::to('public/assets/assets/img/latest_news')}}/{{$value['src']}}" alt="Generic placeholder image">
              <div class="media-body">
                <p class="date m-0">Jan 16, 2020</p>
                <h6 class="m-0"><a href="{{$value['url']}}">{{$value['anchor_text']}}</a></h6>
                <p class="m-0 nameby">By Ellen WAld, PHD.</p>
              </div>
            </div>
            </div>
@endforeach

                            </div>
                        </div>
                    </section>

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


                    <section class="features">
                        <div class="container">
                            <div class="content_area_heading large-heading text-center">

                                <h1 class="heading_title wow animated fadeInUp">
                                    Sponsers Adds
                                </h1>
                                <div class="heading_border wow animated fadeInUp">
                                    <span class="one"></span><span class="two"></span><span class="three"></span>
                                </div>
                            </div>
                            <div class="row justify-content-center">
                                <div class="col-xl-4 col-lg-6 col-md-7 col-sm-8 col-12 h-100">
                                    <div class="features_inner text-center wow animated fadeInLeft">
                                        <div class="services_wrapper">
                                            <div class="services_icon_wrapper">
                                                <div class="spin_hexagon">
                                                    <svg style="filter: drop-shadow(4px 5px 4px rgba(2,130,91,0.3)); fill: #0d5fe9;"
                                                        xmlns="" viewBox="0 0 177.4 197.4">
                                                        <path
                                                            d="M0,58.4v79.9c0,6.5,3.5,12.6,9.2,15.8l70.5,40.2c5.6,3.2,12.4,3.2,18,0l70.5-40.2c5.7-3.2,9.2-9.3,9.2-15.8V58.4 c0-6.5-3.5-12.6-9.2-15.8L97.7,2.4c-5.6-3.2-12.4-3.2-18,0L9.2,42.5C3.5,45.8,0,51.8,0,58.4z">
                                                        </path>
                                                    </svg>
                                                </div>
                                                <div class="spin_hexagon">
                                                    <svg style="filter: drop-shadow(4px 5px 4px rgba(2,130,91,0.3)); fill: #0d5fe9;"
                                                        xmlns="" viewBox="0 0 177.4 197.4">
                                                        <path
                                                            d="M0,58.4v79.9c0,6.5,3.5,12.6,9.2,15.8l70.5,40.2c5.6,3.2,12.4,3.2,18,0l70.5-40.2c5.7-3.2,9.2-9.3,9.2-15.8V58.4 c0-6.5-3.5-12.6-9.2-15.8L97.7,2.4c-5.6-3.2-12.4-3.2-18,0L9.2,42.5C3.5,45.8,0,51.8,0,58.4z">
                                                        </path>
                                                    </svg>
                                                </div>
                                                <div class="services_icon">

                                                    <img src="{{URL::to('/public/assets/assets/img/customer-service.png')}}" alt="">
                                                </div>
                                            </div>
                                            <div class="feature_content">
                                                <h3 class="content_title">
                                                    Data Protection
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-6 col-md-7 col-sm-8 col-12 h-100">
                                    <div class="features_inner text-center wow animated fadeInUp">
                                        <div class="services_wrapper">
                                            <div class="services_icon_wrapper">
                                                <div class="spin_hexagon">
                                                    <svg style="filter: drop-shadow(4px 5px 4px rgba(2,130,91,0.3)); fill: #0d5fe9;"
                                                        xmlns="" viewBox="0 0 177.4 197.4">
                                                        <path
                                                            d="M0,58.4v79.9c0,6.5,3.5,12.6,9.2,15.8l70.5,40.2c5.6,3.2,12.4,3.2,18,0l70.5-40.2c5.7-3.2,9.2-9.3,9.2-15.8V58.4 c0-6.5-3.5-12.6-9.2-15.8L97.7,2.4c-5.6-3.2-12.4-3.2-18,0L9.2,42.5C3.5,45.8,0,51.8,0,58.4z">
                                                        </path>
                                                    </svg>
                                                </div>
                                                <div class="spin_hexagon">
                                                    <svg style="filter: drop-shadow(4px 5px 4px rgba(2,130,91,0.3)); fill: #0d5fe9;"
                                                        xmlns="" viewBox="0 0 177.4 197.4">
                                                        <path
                                                            d="M0,58.4v79.9c0,6.5,3.5,12.6,9.2,15.8l70.5,40.2c5.6,3.2,12.4,3.2,18,0l70.5-40.2c5.7-3.2,9.2-9.3,9.2-15.8V58.4 c0-6.5-3.5-12.6-9.2-15.8L97.7,2.4c-5.6-3.2-12.4-3.2-18,0L9.2,42.5C3.5,45.8,0,51.8,0,58.4z">
                                                        </path>
                                                    </svg>
                                                </div>
                                                <div class="services_icon">
                                                    <img src="{{URL::to('/public/assets/assets/img/stadistics.png')}}" alt="">
                                                </div>
                                            </div>
                                            <div class="feature_content">
                                                <h3 class="content_title">
                                                    Security Protected
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-6 col-md-7 col-sm-8 col-12 h-100">
                                    <div class="features_inner text-center wow animated fadeInRight">
                                        <div class="services_wrapper">
                                            <div class="services_icon_wrapper">
                                                <div class="spin_hexagon">
                                                    <svg style="filter: drop-shadow(4px 5px 4px rgba(2,130,91,0.3)); fill: #0d5fe9;"
                                                        xmlns="" viewBox="0 0 177.4 197.4">
                                                        <path
                                                            d="M0,58.4v79.9c0,6.5,3.5,12.6,9.2,15.8l70.5,40.2c5.6,3.2,12.4,3.2,18,0l70.5-40.2c5.7-3.2,9.2-9.3,9.2-15.8V58.4 c0-6.5-3.5-12.6-9.2-15.8L97.7,2.4c-5.6-3.2-12.4-3.2-18,0L9.2,42.5C3.5,45.8,0,51.8,0,58.4z">
                                                        </path>
                                                    </svg>
                                                </div>
                                                <div class="spin_hexagon">
                                                    <svg style="filter: drop-shadow(4px 5px 4px rgba(2,130,91,0.3)); fill: #0d5fe9;"
                                                        xmlns="" viewBox="0 0 177.4 197.4">
                                                        <path
                                                            d="M0,58.4v79.9c0,6.5,3.5,12.6,9.2,15.8l70.5,40.2c5.6,3.2,12.4,3.2,18,0l70.5-40.2c5.7-3.2,9.2-9.3,9.2-15.8V58.4 c0-6.5-3.5-12.6-9.2-15.8L97.7,2.4c-5.6-3.2-12.4-3.2-18,0L9.2,42.5C3.5,45.8,0,51.8,0,58.4z">
                                                        </path>
                                                    </svg>
                                                </div>
                                                <div class="services_icon">
                                                    <img src="{{URL::to('/public/assets/assets/img/global.png')}}" alt="">
                                                </div>
                                            </div>
                                            <div class="feature_content">
                                                <h3 class="content_title">
                                                    Support 24/7
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-6 col-md-7 col-sm-8 col-12 h-100">
                                    <div class="features_inner text-center wow animated fadeInLeft">
                                        <div class="services_wrapper">
                                            <div class="services_icon_wrapper">
                                                <div class="spin_hexagon">
                                                    <svg style="filter: drop-shadow(4px 5px 4px rgba(2,130,91,0.3)); fill: #0d5fe9;"
                                                        xmlns="" viewBox="0 0 177.4 197.4">
                                                        <path
                                                            d="M0,58.4v79.9c0,6.5,3.5,12.6,9.2,15.8l70.5,40.2c5.6,3.2,12.4,3.2,18,0l70.5-40.2c5.7-3.2,9.2-9.3,9.2-15.8V58.4 c0-6.5-3.5-12.6-9.2-15.8L97.7,2.4c-5.6-3.2-12.4-3.2-18,0L9.2,42.5C3.5,45.8,0,51.8,0,58.4z">
                                                        </path>
                                                    </svg>
                                                </div>
                                                <div class="spin_hexagon">
                                                    <svg style="filter: drop-shadow(4px 5px 4px rgba(2,130,91,0.3)); fill: #0d5fe9;"
                                                        xmlns="" viewBox="0 0 177.4 197.4">
                                                        <path
                                                            d="M0,58.4v79.9c0,6.5,3.5,12.6,9.2,15.8l70.5,40.2c5.6,3.2,12.4,3.2,18,0l70.5-40.2c5.7-3.2,9.2-9.3,9.2-15.8V58.4 c0-6.5-3.5-12.6-9.2-15.8L97.7,2.4c-5.6-3.2-12.4-3.2-18,0L9.2,42.5C3.5,45.8,0,51.8,0,58.4z">
                                                        </path>
                                                    </svg>
                                                </div>
                                                <div class="services_icon">
                                                    <img src="{{URL::to('/public/assets/assets/img/pay.png')}}" alt="">
                                                </div>
                                            </div>
                                            <div class="feature_content">
                                                <h3 class="content_title">
                                                    Payment Methods
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-6 col-md-7 col-sm-8 col-12 h-100">
                                    <div class="features_inner text-center wow animated fadeInUp">
                                        <div class="services_wrapper">
                                            <div class="services_icon_wrapper">
                                                <div class="spin_hexagon">
                                                    <svg style="filter: drop-shadow(4px 5px 4px rgba(2,130,91,0.3)); fill: #0d5fe9;"
                                                        xmlns="" viewBox="0 0 177.4 197.4">
                                                        <path
                                                            d="M0,58.4v79.9c0,6.5,3.5,12.6,9.2,15.8l70.5,40.2c5.6,3.2,12.4,3.2,18,0l70.5-40.2c5.7-3.2,9.2-9.3,9.2-15.8V58.4 c0-6.5-3.5-12.6-9.2-15.8L97.7,2.4c-5.6-3.2-12.4-3.2-18,0L9.2,42.5C3.5,45.8,0,51.8,0,58.4z">
                                                        </path>
                                                    </svg>
                                                </div>
                                                <div class="spin_hexagon">
                                                    <svg style="filter: drop-shadow(4px 5px 4px rgba(2,130,91,0.3)); fill: #0d5fe9;"
                                                        xmlns="" viewBox="0 0 177.4 197.4">
                                                        <path
                                                            d="M0,58.4v79.9c0,6.5,3.5,12.6,9.2,15.8l70.5,40.2c5.6,3.2,12.4,3.2,18,0l70.5-40.2c5.7-3.2,9.2-9.3,9.2-15.8V58.4 c0-6.5-3.5-12.6-9.2-15.8L97.7,2.4c-5.6-3.2-12.4-3.2-18,0L9.2,42.5C3.5,45.8,0,51.8,0,58.4z">
                                                        </path>
                                                    </svg>
                                                </div>
                                                <div class="services_icon">
                                                    <img src="{{URL::to('/public/assets/assets/img/membership.png')}}" alt="">
                                                </div>
                                            </div>
                                            <div class="feature_content">
                                                <h3 class="content_title">
                                                    Registered Company
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-4 col-lg-6 col-md-7 col-sm-8 col-12 h-100">
                                    <div class="features_inner text-center wow animated fadeInRight">
                                        <div class="services_wrapper">
                                            <div class="services_icon_wrapper">
                                                <div class="spin_hexagon">
                                                    <svg style="filter: drop-shadow(4px 5px 4px rgba(2,130,91,0.3)); fill: #0d5fe9;"
                                                        xmlns="" viewBox="0 0 177.4 197.4">
                                                        <path
                                                            d="M0,58.4v79.9c0,6.5,3.5,12.6,9.2,15.8l70.5,40.2c5.6,3.2,12.4,3.2,18,0l70.5-40.2c5.7-3.2,9.2-9.3,9.2-15.8V58.4 c0-6.5-3.5-12.6-9.2-15.8L97.7,2.4c-5.6-3.2-12.4-3.2-18,0L9.2,42.5C3.5,45.8,0,51.8,0,58.4z">
                                                        </path>
                                                    </svg>
                                                </div>
                                                <div class="spin_hexagon">
                                                    <svg style="filter: drop-shadow(4px 5px 4px rgba(2,130,91,0.3)); fill: #0d5fe9;"
                                                        xmlns="" viewBox="0 0 177.4 197.4">
                                                        <path
                                                            d="M0,58.4v79.9c0,6.5,3.5,12.6,9.2,15.8l70.5,40.2c5.6,3.2,12.4,3.2,18,0l70.5-40.2c5.7-3.2,9.2-9.3,9.2-15.8V58.4 c0-6.5-3.5-12.6-9.2-15.8L97.7,2.4c-5.6-3.2-12.4-3.2-18,0L9.2,42.5C3.5,45.8,0,51.8,0,58.4z">
                                                        </path>
                                                    </svg>
                                                </div>
                                                <div class="services_icon">
                                                    <img src="{{URL::to('/public/assets/assets/img/business-and-finance.png')}}" alt="">
                                                </div>
                                            </div>
                                            <div class="feature_content">
                                                <h3 class="content_title">
                                                    Live Exchange Rates
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>

                    <!-- education Tabs -->
                    <!-- <section>
                        <div class="row">
                            <div class="col-md-12">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home"
                                            role="tab" aria-controls="home" aria-selected="true">Basic Training</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile"
                                            role="tab" aria-controls="profile" aria-selected="false">Paid Training</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact"
                                            role="tab" aria-controls="contact" aria-selected="false">Forex Books</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="home" role="tabpanel"
                                        aria-labelledby="home-tab">
                                        <div id="catab9" class="cat-tabs-wrap cat-tabs-wrap1" style="display: block;">
                                            <div>
                                                <ul>
                                                    <li class="first-news">
                                                        <div class="post-thumbnail tie-appear">
                                                            <a href="" rel="bookmark">
                                                                <img width="310" height="165" src=""
                                                                    class="attachment-tie-medium size-tie-medium wp-post-image tie-appear"
                                                                    alt="" loading="lazy"> <span
                                                                    class="fa overlay-icon"></span>
                                                            </a>
                                                        </div>
                                                        <h2 class="post-box-title"><a href="" rel="bookmark">Nexus 6
                                                                review</a></h2>
                                                        <p class="post-meta">
                                                            <span title="Nice"
                                                                class="post-single-rate post-small-rate stars-small">
                                                                <span style="width: 78.571428571429%"></span>
                                                            </span>
                                                            <span class="tie-date">Dec 24,
                                                                2014</span>
                                                        </p>
                                                        <div class="entry">
                                                            <p>Don’t act so surprised, Your Highness. You weren’t on any
                                                                mercy mission this time. Several …</p>
                                                            <a class="btn btn-mine radial" href="">Read
                                                                More »</a>
                                                        </div>
                                                    </li>
                                                    <li class="tie_video">
                                                        <div class="post-thumbnail tie-appear">
                                                            <a href="" rel="bookmark"><img width="110" height="75"
                                                                    src=""
                                                                    class="attachment-tie-small size-tie-small wp-post-image tie-appear"
                                                                    alt="" loading="lazy"><span
                                                                    class="fa overlay-icon"></span></a>
                                                        </div>
                                                        <h3 class="post-box-title"><a href="" rel="bookmark">Apple iPad
                                                                review</a></h3>
                                                        <p class="post-meta">
                                                            <span title="Good"
                                                                class="post-single-rate post-small-rate stars-small">
                                                                <span style="width: 89.5714285714%"></span>
                                                            </span>
                                                            <span class="tie-date">Dec 24,
                                                                2014</span>
                                                        </p>
                                                    </li>
                                                    <li class="tie_thumb">
                                                        <div class="post-thumbnail tie-appear">
                                                            <a href="" rel="bookmark"><img width="110" height="75"
                                                                    src=""
                                                                    class="attachment-tie-small size-tie-small wp-post-image tie-appear"
                                                                    alt="" loading="lazy"><span
                                                                    class="fa overlay-icon"></span></a>
                                                        </div>
                                                        <h3 class="post-box-title"><a href="" rel="bookmark">BlackBerry
                                                                Classic review</a></h3>
                                                        <p class="post-meta">
                                                            <span title="Not Bad"
                                                                class="post-single-rate post-small-rate stars-small">
                                                                <span style="width: 76.1428571429%"></span>
                                                            </span>
                                                            <span class="tie-date">Nov 24,
                                                                2014</span>
                                                        </p>
                                                    </li>
                                                    <li class="tie_lightbox">
                                                        <div class="post-thumbnail tie-appear">
                                                            <a href="" rel="bookmark"><img width="110" height="75"
                                                                    src=""
                                                                    class="attachment-tie-small size-tie-small wp-post-image tie-appear"
                                                                    alt="" loading="lazy"><span
                                                                    class="fa overlay-icon"></span></a>
                                                        </div>
                                                        <h3 class="post-box-title"><a href="" rel="bookmark">Apple iMac
                                                                with Retina 5K display review</a>
                                                        </h3>
                                                        <p class="post-meta">
                                                            <span title="Great"
                                                                class="post-single-rate post-small-rate stars-small">
                                                                <span style="width: 81.25%"></span>
                                                            </span>
                                                            <span class="tie-date">Nov 24,
                                                                2014</span>
                                                        </p>
                                                    </li>
                                                    <li>
                                                        <div class="post-thumbnail tie-appear">
                                                            <a href="" rel="bookmark"><img width="110" height="75"
                                                                    src=""
                                                                    class="attachment-tie-small size-tie-small wp-post-image tie-appear"
                                                                    alt="" loading="lazy"><span
                                                                    class="fa overlay-icon"></span></a>
                                                        </div>
                                                        <h3 class="post-box-title"><a href="" rel="bookmark">iPhone 6
                                                                Plus review</a></h3>
                                                        <p class="post-meta">
                                                            <span title="Graet"
                                                                class="post-single-rate post-small-rate stars-small">
                                                                <span style="width: 87.142857142857%"></span>
                                                            </span>
                                                            <span class="tie-date">Nov 24,
                                                                2014</span>
                                                        </p>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="clear"></div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="profile" role="tabpanel"
                                        aria-labelledby="profile-tab">
                                        <div id="catab9" class="cat-tabs-wrap cat-tabs-wrap1" style="display: block;">
                                            <div>
                                                <ul>
                                                    <li class="first-news">
                                                        <div class="post-thumbnail tie-appear">
                                                            <a href="" rel="bookmark">
                                                                <img width="310" height="165" src=""
                                                                    class="attachment-tie-medium size-tie-medium wp-post-image tie-appear"
                                                                    alt="" loading="lazy"> <span
                                                                    class="fa overlay-icon"></span>
                                                            </a>
                                                        </div>
                                                        <h2 class="post-box-title"><a href="" rel="bookmark">Nexus 6
                                                                review</a></h2>
                                                        <p class="post-meta">
                                                            <span title="Nice"
                                                                class="post-single-rate post-small-rate stars-small">
                                                                <span style="width: 78.571428571429%"></span>
                                                            </span>
                                                            <span class="tie-date">Dec 24,
                                                                2014</span>
                                                        </p>
                                                        <div class="entry">
                                                            <p>Don’t act so surprised, Your Highness. You weren’t on any
                                                                mercy mission this time. Several …</p>
                                                            <a class="btn btn-mine radial" href="">Read
                                                                More »</a>
                                                        </div>
                                                    </li>
                                                    <li class="tie_video">
                                                        <div class="post-thumbnail tie-appear">
                                                            <a href="" rel="bookmark"><img width="110" height="75"
                                                                    src=""
                                                                    class="attachment-tie-small size-tie-small wp-post-image tie-appear"
                                                                    alt="" loading="lazy"><span
                                                                    class="fa overlay-icon"></span></a>
                                                        </div>
                                                        <h3 class="post-box-title"><a href="" rel="bookmark">Apple iPad
                                                                review</a></h3>
                                                        <p class="post-meta">
                                                            <span title="Good"
                                                                class="post-single-rate post-small-rate stars-small">
                                                                <span style="width: 89.5714285714%"></span>
                                                            </span>
                                                            <span class="tie-date">Dec 24,
                                                                2014</span>
                                                        </p>
                                                    </li>
                                                    <li class="tie_thumb">
                                                        <div class="post-thumbnail tie-appear">
                                                            <a href="" rel="bookmark"><img width="110" height="75"
                                                                    src=""
                                                                    class="attachment-tie-small size-tie-small wp-post-image tie-appear"
                                                                    alt="" loading="lazy"><span
                                                                    class="fa overlay-icon"></span></a>
                                                        </div>
                                                        <h3 class="post-box-title"><a href="" rel="bookmark">BlackBerry
                                                                Classic review</a></h3>
                                                        <p class="post-meta">
                                                            <span title="Not Bad"
                                                                class="post-single-rate post-small-rate stars-small">
                                                                <span style="width: 76.1428571429%"></span>
                                                            </span>
                                                            <span class="tie-date">Nov 24,
                                                                2014</span>
                                                        </p>
                                                    </li>
                                                    <li class="tie_lightbox">
                                                        <div class="post-thumbnail tie-appear">
                                                            <a href="" rel="bookmark"><img width="110" height="75"
                                                                    src=""
                                                                    class="attachment-tie-small size-tie-small wp-post-image tie-appear"
                                                                    alt="" loading="lazy"><span
                                                                    class="fa overlay-icon"></span></a>
                                                        </div>
                                                        <h3 class="post-box-title"><a href="" rel="bookmark">Apple iMac
                                                                with Retina 5K display review</a>
                                                        </h3>
                                                        <p class="post-meta">
                                                            <span title="Great"
                                                                class="post-single-rate post-small-rate stars-small">
                                                                <span style="width: 81.25%"></span>
                                                            </span>
                                                            <span class="tie-date">Nov 24,
                                                                2014</span>
                                                        </p>
                                                    </li>
                                                    <li>
                                                        <div class="post-thumbnail tie-appear">
                                                            <a href="" rel="bookmark"><img width="110" height="75"
                                                                    src=""
                                                                    class="attachment-tie-small size-tie-small wp-post-image tie-appear"
                                                                    alt="" loading="lazy"><span
                                                                    class="fa overlay-icon"></span></a>
                                                        </div>
                                                        <h3 class="post-box-title"><a href="" rel="bookmark">iPhone 6
                                                                Plus review</a></h3>
                                                        <p class="post-meta">
                                                            <span title="Graet"
                                                                class="post-single-rate post-small-rate stars-small">
                                                                <span style="width: 87.142857142857%"></span>
                                                            </span>
                                                            <span class="tie-date">Nov 24,
                                                                2014</span>
                                                        </p>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="clear"></div>
                                        </div>

                                    </div>
                                    <div class="tab-pane fade" id="contact" role="tabpanel"
                                        aria-labelledby="contact-tab">
                                        <div id="catab9" class="cat-tabs-wrap cat-tabs-wrap1" style="display: block;">
                                            <div>
                                                <ul>
                                                    <li class="first-news">
                                                        <div class="post-thumbnail tie-appear">
                                                            <a href="" rel="bookmark">
                                                                <img width="310" height="165" src=""
                                                                    class="attachment-tie-medium size-tie-medium wp-post-image tie-appear"
                                                                    alt="" loading="lazy"> <span
                                                                    class="fa overlay-icon"></span>
                                                            </a>
                                                        </div>
                                                        <h2 class="post-box-title"><a href="" rel="bookmark">Nexus 6
                                                                review</a></h2>
                                                        <p class="post-meta">
                                                            <span title="Nice"
                                                                class="post-single-rate post-small-rate stars-small">
                                                                <span style="width: 78.571428571429%"></span>
                                                            </span>
                                                            <span class="tie-date">Dec 24,
                                                                2014</span>
                                                        </p>
                                                        <div class="entry">
                                                            <p>Don’t act so surprised, Your Highness. You weren’t on any
                                                                mercy mission this time. Several …</p>
                                                            <a class="btn btn-mine radial" href="">Read
                                                                More »</a>
                                                        </div>
                                                    </li>
                                                    <li class="tie_video">
                                                        <div class="post-thumbnail tie-appear">
                                                            <a href="" rel="bookmark"><img width="110" height="75"
                                                                    src=""
                                                                    class="attachment-tie-small size-tie-small wp-post-image tie-appear"
                                                                    alt="" loading="lazy"><span
                                                                    class="fa overlay-icon"></span></a>
                                                        </div>
                                                        <h3 class="post-box-title"><a href="" rel="bookmark">Apple iPad
                                                                review</a></h3>
                                                        <p class="post-meta">
                                                            <span title="Good"
                                                                class="post-single-rate post-small-rate stars-small">
                                                                <span style="width: 89.5714285714%"></span>
                                                            </span>
                                                            <span class="tie-date">Dec 24,
                                                                2014</span>
                                                        </p>
                                                    </li>
                                                    <li class="tie_thumb">
                                                        <div class="post-thumbnail tie-appear">
                                                            <a href="" rel="bookmark"><img width="110" height="75"
                                                                    src=""
                                                                    class="attachment-tie-small size-tie-small wp-post-image tie-appear"
                                                                    alt="" loading="lazy"><span
                                                                    class="fa overlay-icon"></span></a>
                                                        </div>
                                                        <h3 class="post-box-title"><a href="" rel="bookmark">BlackBerry
                                                                Classic review</a></h3>
                                                        <p class="post-meta">
                                                            <span title="Not Bad"
                                                                class="post-single-rate post-small-rate stars-small">
                                                                <span style="width: 76.1428571429%"></span>
                                                            </span>
                                                            <span class="tie-date">Nov 24,
                                                                2014</span>
                                                        </p>
                                                    </li>
                                                    <li class="tie_lightbox">
                                                        <div class="post-thumbnail tie-appear">
                                                            <a href="" rel="bookmark"><img width="110" height="75"
                                                                    src=""
                                                                    class="attachment-tie-small size-tie-small wp-post-image tie-appear"
                                                                    alt="" loading="lazy"><span
                                                                    class="fa overlay-icon"></span></a>
                                                        </div>
                                                        <h3 class="post-box-title"><a href="" rel="bookmark">Apple iMac
                                                                with Retina 5K display review</a>
                                                        </h3>
                                                        <p class="post-meta">
                                                            <span title="Great"
                                                                class="post-single-rate post-small-rate stars-small">
                                                                <span style="width: 81.25%"></span>
                                                            </span>
                                                            <span class="tie-date">Nov 24,
                                                                2014</span>
                                                        </p>
                                                    </li>
                                                    <li>
                                                        <div class="post-thumbnail tie-appear">
                                                            <a href="" rel="bookmark"><img width="110" height="75"
                                                                    src=""
                                                                    class="attachment-tie-small size-tie-small wp-post-image tie-appear"
                                                                    alt="" loading="lazy"><span
                                                                    class="fa overlay-icon"></span></a>
                                                        </div>
                                                        <h3 class="post-box-title"><a href="" rel="bookmark">iPhone 6
                                                                Plus review</a></h3>
                                                        <p class="post-meta">
                                                            <span title="Graet"
                                                                class="post-single-rate post-small-rate stars-small">
                                                                <span style="width: 87.142857142857%"></span>
                                                            </span>
                                                            <span class="tie-date">Nov 24,
                                                                2014</span>
                                                        </p>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="clear"></div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </section> -->



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
                                                <span class="one"></span><span class="two"></span><span
                                                    class="three"></span>
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
                    <p>
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



                    <section class="currency-table-list">
                        <!-- /.End of How to Get  Start -->
                        <div class="currency-table">
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
                                                <table id="cryptoTable"
                                                    class="table table-striped table-hover dt-responsive"
                                                    style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>Ticker</th>
                                                            <th>Price</th>
                                                            <th>Capitalization</th>
                                                            <th>Max Quantity</th>
                                                            <th>1D change</th>
                                                            <th>Graph</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr data-href="price.html">
                                                            <td>
                                                                <div class="logo-name">
                                                                    <div class="item-logo">
                                                                        <img src="{{URL::to('/public/assets/assets/img/BTC.svg')}}"
                                                                            class="img-responsive" alt="">
                                                                    </div>
                                                                    <span class="item_name_value">Bitcoin</span>
                                                                </div>
                                                            </td>
                                                            <td><span class="value_ticker">BTC</span></td>
                                                            <td><span class="value_price">$8,874.19</span></td>
                                                            <td><span class="value_cap">$150.36 B</span></td>
                                                            <td><span class="value_max_quantity">21 M</span></td>
                                                            <td><span
                                                                    class="value_d1_return percent_positive">+13.08%</span>
                                                            </td>
                                                            <td>
                                                                <span class="value_graph"><svg viewBox="0 0 500 100"
                                                                        class="chart">
                                                                        <polyline fill="none" stroke="#35a947"
                                                                            stroke-width="5"
                                                                            points=" 00,120 20,60 40,80 60,20 80,80 100,80 120,60 140,100 160,90 180,80 200, 110 220, 10 240, 70 260, 100 280, 100 300, 40 320, 0 340, 100 360, 100 380, 120 400, 60 420, 70 440, 80 " />
                                                                    </svg></span>
                                                            </td>
                                                        </tr>
                                                        <tr data-href="price.html">
                                                            <td>
                                                                <div class="logo-name">
                                                                    <div class="item-logo">
                                                                        <img src="{{URL::to('/public/assets/assets/img/ETH.svg')}}"
                                                                            class="img-responsive" alt="">
                                                                    </div>
                                                                    <span class="item_name_value">Ethereum</span>
                                                                </div>
                                                            </td>
                                                            <td><span class="value_ticker">ETH</span></td>
                                                            <td><span class="value_price">$864.14</span></td>
                                                            <td><span class="value_cap">$85.68 B</span></td>
                                                            <td><span class="value_max_quantity">Unlimited</span></td>
                                                            <td><span
                                                                    class="value_d1_return percent_positive">+6.82%</span>
                                                            </td>
                                                            <td>
                                                                <span class="value_graph"><svg viewBox="0 0 500 100"
                                                                        class="chart">
                                                                        <polyline fill="none" stroke="#35a947"
                                                                            stroke-width="5"
                                                                            points=" 00,120 20,60 40,80 60,20 80,80 100,80 120,60 140,100 160,90 180,80 200, 110 220, 10 240, 70 260, 100 280, 100 300, 40 320, 0 340, 100 360, 100 380, 120 400, 60 420, 70 440, 80 " />
                                                                    </svg></span>
                                                            </td>
                                                        </tr>
                                                        <tr data-href="price.html">
                                                            <td>
                                                                <div class="logo-name">
                                                                    <div class="item-logo">
                                                                        <img src="{{URL::to('/public/assets/assets/img/XRP.svg')}}"
                                                                            class="img-responsive" alt="">
                                                                    </div>
                                                                    <span class="item_name_value">Ripple</span>
                                                                </div>
                                                            </td>
                                                            <td><span class="value_ticker">XRP</span></td>
                                                            <td><span class="value_price">$1.06</span></td>
                                                            <td><span class="value_cap">$43.16 B</span></td>
                                                            <td><span class="value_max_quantity">99.99 B</span></td>
                                                            <td><span
                                                                    class="value_d1_return percent_positive">+43.04%</span>
                                                            </td>
                                                            <td>
                                                                <span class="value_graph"><svg viewBox="0 0 500 100"
                                                                        class="chart">
                                                                        <polyline fill="none" stroke="#35a947"
                                                                            stroke-width="5"
                                                                            points=" 00,120 20,60 40,80 60,20 80,80 100,80 120,60 140,100 160,90 180,80 200, 110 220, 10 240, 70 260, 100 280, 100 300, 40 320, 0 340, 100 360, 100 380, 120 400, 60 420, 70 440, 80 " />
                                                                    </svg></span>
                                                            </td>
                                                        </tr>
                                                        <tr data-href="price.html">
                                                            <td>
                                                                <div class="logo-name">
                                                                    <div class="item-logo">
                                                                        <img src="{{URL::to('/public/assets/assets/img/LTC.svg')}}"
                                                                            class="img-responsive" alt="">
                                                                    </div>
                                                                    <span class="item_name_value">Litecoin</span>
                                                                </div>
                                                            </td>
                                                            <td><span class="value_ticker">LTC</span></td>
                                                            <td><span class="value_price">$145.25</span></td>
                                                            <td><span class="value_cap">$8.05 B</span></td>
                                                            <td><span class="value_max_quantity">84 M</span></td>
                                                            <td><span
                                                                    class="value_d1_return percent_negative">-11.53%</span>
                                                            </td>
                                                            <td>
                                                                <span class="value_graph"><svg viewBox="0 0 500 100"
                                                                        class="chart">
                                                                        <polyline fill="none" stroke="#e34828"
                                                                            stroke-width="5"
                                                                            points=" 00,120 20,60 40,80 60,20 80,80 100,80 120,60 140,100 160,90 180,80 200, 110 220, 10 240, 70 260, 100 280, 100 300, 40 320, 0 340, 100 360, 100 380, 120 400, 60 420, 70 440, 80 " />
                                                                    </svg></span>
                                                            </td>
                                                        </tr>
                                                        <tr data-href="price.html">
                                                            <td>
                                                                <div class="logo-name">
                                                                    <div class="item-logo">
                                                                        <img src="{{URL::to('/public/assets/assets/img/tron.svg')}}"
                                                                            class="img-responsive" alt="">
                                                                    </div>
                                                                    <span class="item_name_value">TRON</span>
                                                                </div>
                                                            </td>
                                                            <td><span class="value_ticker">TRX</span></td>
                                                            <td><span class="value_price">$0.04</span></td>
                                                            <td><span class="value_cap">$2.73 B</span></td>
                                                            <td><span class="value_max_quantity">Unlimited</span></td>
                                                            <td><span
                                                                    class="value_d1_return percent_negative">-18.58%</span>
                                                            </td>
                                                            <td>
                                                                <span class="value_graph"><svg viewBox="0 0 500 100"
                                                                        class="chart">
                                                                        <polyline fill="none" stroke="#e34828"
                                                                            stroke-width="5"
                                                                            points=" 00,120 20,60 40,80 60,20 80,80 100,80 120,60 140,100 160,90 180,80 200, 110 220, 10 240, 70 260, 100 280, 100 300, 40 320, 0 340, 100 360, 100 380, 120 400, 60 420, 70 440, 80 " />
                                                                    </svg></span>
                                                            </td>
                                                        </tr>
                                                        <tr data-href="price.html">
                                                            <td>
                                                                <div class="logo-name">
                                                                    <div class="item-logo">
                                                                        <img src="{{URL::to('/public/assets/assets/img/BTG.svg')}}"
                                                                            class="img-responsive" alt="">
                                                                    </div>
                                                                    <span class="item_name_value">Bitcoin Gold</span>
                                                                </div>
                                                            </td>
                                                            <td><span class="value_ticker">BTG</span></td>
                                                            <td><span class="value_price">$108.07</span></td>
                                                            <td><span class="value_cap">$381,159</span></td>
                                                            <td><span class="value_max_quantity">Unlimited</span></td>
                                                            <td><span
                                                                    class="value_d1_return percent_positive">-12.93%</span>
                                                            </td>
                                                            <td>
                                                                <span class="value_graph"><svg viewBox="0 0 500 100"
                                                                        class="chart">
                                                                        <polyline fill="none" stroke="#35a947"
                                                                            stroke-width="5"
                                                                            points=" 00,120 20,60 40,80 60,20 80,80 100,80 120,60 140,100 160,90 180,80 200, 110 220, 10 240, 70 260, 100 280, 100 300, 40 320, 0 340, 100 360, 100 380, 120 400, 60 420, 70 440, 80 " />
                                                                    </svg></span>
                                                            </td>
                                                        </tr>
                                                        <tr data-href="price.html">
                                                            <td>
                                                                <div class="logo-name">
                                                                    <div class="item-logo">
                                                                        <img src="{{URL::to('/public/assets/assets/img/qtum.svg')}}"
                                                                            class="img-responsive" alt="">
                                                                    </div>
                                                                    <span class="item_name_value">Qtum</span>
                                                                </div>
                                                            </td>
                                                            <td><span class="value_ticker">BTG</span></td>
                                                            <td><span class="value_price">$108.07</span></td>
                                                            <td><span class="value_cap">$381,159</span></td>
                                                            <td><span class="value_max_quantity">Unlimited</span></td>
                                                            <td><span
                                                                    class="value_d1_return percent_negative">-12.93%</span>
                                                            </td>
                                                            <td>
                                                                <span class="value_graph"><svg viewBox="0 0 500 100"
                                                                        class="chart">
                                                                        <polyline fill="none" stroke="#e34828"
                                                                            stroke-width="5"
                                                                            points=" 00,120 20,60 40,80 60,20 80,80 100,80 120,60 140,100 160,90 180,80 200, 110 220, 10 240, 70 260, 100 280, 100 300, 40 320, 0 340, 100 360, 100 380, 120 400, 60 420, 70 440, 80 " />
                                                                    </svg></span>
                                                            </td>
                                                        </tr>
                                                        <tr data-href="price.html">
                                                            <td>
                                                                <div class="logo-name">
                                                                    <div class="item-logo">
                                                                        <img src="{{URL::to('/public/assets/assets/img/stellar.svg')}}"
                                                                            class="img-responsive" alt="">
                                                                    </div>
                                                                    <span class="item_name_value">Stellar</span>
                                                                </div>
                                                            </td>
                                                            <td><span class="value_ticker">XLM</span></td>
                                                            <td><span class="value_price">$0.35</span></td>
                                                            <td><span class="value_cap">$6.69 B</span></td>
                                                            <td><span class="value_max_quantity">103.27 B</span></td>
                                                            <td><span
                                                                    class="value_d1_return percent_positive">-13.7%</span>
                                                            </td>
                                                            <td>
                                                                <span class="value_graph"><svg viewBox="0 0 500 100"
                                                                        class="chart">
                                                                        <polyline fill="none" stroke="#35a947"
                                                                            stroke-width="5"
                                                                            points=" 00,120 20,60 40,80 60,20 80,80 100,80 120,60 140,100 160,90 180,80 200, 110 220, 10 240, 70 260, 100 280, 100 300, 40 320, 0 340, 100 360, 100 380, 120 400, 60 420, 70 440, 80 " />
                                                                    </svg></span>
                                                            </td>
                                                        </tr>
                                                        <tr data-href="price.html">
                                                            <td>
                                                                <div class="logo-name">
                                                                    <div class="item-logo">
                                                                        <img src="{{URL::to('/public/assets/assets/img/DASH.svg')}}"
                                                                            class="img-responsive" alt="">
                                                                    </div>
                                                                    <span class="item_name_value">Dash</span>
                                                                </div>
                                                            </td>
                                                            <td><span class="value_ticker">DASH</span></td>
                                                            <td><span class="value_price">$578.69</span></td>
                                                            <td><span class="value_cap">$4.55 B</span></td>
                                                            <td><span class="value_max_quantity">18.9 M</span></td>
                                                            <td><span
                                                                    class="value_d1_return percent_positive">-13.21%</span>
                                                            </td>
                                                            <td>
                                                                <span class="value_graph"><svg viewBox="0 0 500 100"
                                                                        class="chart">
                                                                        <polyline fill="none" stroke="#35a947"
                                                                            stroke-width="5"
                                                                            points=" 00,120 20,60 40,80 60,20 80,80 100,80 120,60 140,100 160,90 180,80 200, 110 220, 10 240, 70 260, 100 280, 100 300, 40 320, 0 340, 100 360, 100 380, 120 400, 60 420, 70 440, 80 " />
                                                                    </svg></span>
                                                            </td>
                                                        </tr>
                                                        <tr data-href="price.html">
                                                            <td>
                                                                <div class="logo-name">
                                                                    <div class="item-logo">
                                                                        <img src="{{URL::to('/public/assets/assets/img/ETC.svg')}}"
                                                                            class="img-responsive" alt="">
                                                                    </div>
                                                                    <span class="item_name_value">Ethereum
                                                                        Classic</span>
                                                                </div>
                                                            </td>
                                                            <td><span class="value_ticker">ETC</span></td>
                                                            <td><span class="value_price">$22.23</span></td>
                                                            <td><span class="value_cap">$2.21 B</span></td>
                                                            <td><span class="value_max_quantity">Unlimited</span></td>
                                                            <td><span
                                                                    class="value_d1_return percent_positive">-17.05%</span>
                                                            </td>
                                                            <td>
                                                                <span class="value_graph"><svg viewBox="0 0 500 100"
                                                                        class="chart">
                                                                        <polyline fill="none" stroke="#35a947"
                                                                            stroke-width="5"
                                                                            points=" 00,120 20,60 40,80 60,20 80,80 100,80 120,60 140,100 160,90 180,80 200, 110 220, 10 240, 70 260, 100 280, 100 300, 40 320, 0 340, 100 360, 100 380, 120 400, 60 420, 70 440, 80 " />
                                                                    </svg></span>
                                                            </td>
                                                        </tr>
                                                        <tr data-href="price.html">
                                                            <td>
                                                                <div class="logo-name">
                                                                    <div class="item-logo">
                                                                        <img src="{{URL::to('/public/assets/assets/img/ZEC.svg')}}"
                                                                            class="img-responsive" alt="">
                                                                    </div>
                                                                    <span class="item_name_value">Zcash</span>
                                                                </div>
                                                            </td>
                                                            <td><span class="value_ticker">ZEC</span></td>
                                                            <td><span class="value_price">$22.23</span></td>
                                                            <td><span class="value_cap">$2.21 B</span></td>
                                                            <td><span class="value_max_quantity">140.25 M</span></td>
                                                            <td><span
                                                                    class="value_d1_return percent_positive">-17.05%</span>
                                                            </td>
                                                            <td>
                                                                <span class="value_graph"><svg viewBox="0 0 500 100"
                                                                        class="chart">
                                                                        <polyline fill="none" stroke="#35a947"
                                                                            stroke-width="5"
                                                                            points=" 00,120 20,60 40,80 60,20 80,80 100,80 120,60 140,100 160,90 180,80 200, 110 220, 10 240, 70 260, 100 280, 100 300, 40 320, 0 340, 100 360, 100 380, 120 400, 60 420, 70 440, 80 " />
                                                                    </svg></span>
                                                            </td>
                                                        </tr>
                                                        <tr data-href="price.html">
                                                            <td>
                                                                <div class="logo-name">
                                                                    <div class="item-logo">
                                                                        <img src="{{URL::to('/public/assets/assets/img/neo.svg')}}"
                                                                            class="img-responsive" alt="">
                                                                    </div>
                                                                    <span class="item_name_value">Neo</span>
                                                                </div>
                                                            </td>
                                                            <td><span class="value_ticker">NEO</span></td>
                                                            <td><span class="value_price">$22.23</span></td>
                                                            <td><span class="value_cap">$2.21 B</span></td>
                                                            <td><span class="value_max_quantity">140.25 M</span></td>
                                                            <td><span
                                                                    class="value_d1_return percent_positive">-17.05%</span>
                                                            </td>
                                                            <td>
                                                                <span class="value_graph"><svg viewBox="0 0 500 100"
                                                                        class="chart">
                                                                        <polyline fill="none" stroke="#35a947"
                                                                            stroke-width="5"
                                                                            points=" 00,120 20,60 40,80 60,20 80,80 100,80 120,60 140,100 160,90 180,80 200, 110 220, 10 240, 70 260, 100 280, 100 300, 40 320, 0 340, 100 360, 100 380, 120 400, 60 420, 70 440, 80 " />
                                                                    </svg></span>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="forex" role="tabpanel"
                                            aria-labelledby="forex-tab">
                                            <div class="scroll-tbl">
                                                <table id="forexTable"
                                                    class="table table-striped table-hover dt-responsive"
                                                    style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>Ticker</th>
                                                            <th>Bid</th>
                                                            <th>Ask</th>
                                                            <th>Spread</th>
                                                            <th>1D change</th>
                                                            <th>Graph</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr data-href="price.html">
                                                            <td>
                                                                <div class="logo-name">
                                                                    <div class="item-logo">
                                                                        <img src="{{URL::to('/public/assets/assets/img/EURGBP.svg')}}"
                                                                            class="img-responsive" alt="">
                                                                    </div>
                                                                    <span class="item_name_value">EUR/GBP</span>
                                                                </div>
                                                            </td>
                                                            <td><span class="value_ticker">EURGBP</span></td>
                                                            <td><span class="value_price">0.88621</span></td>
                                                            <td><span class="value_cap">0.88649</span></td>
                                                            <td><span class="value_spread">0.032%</span></td>
                                                            <td><span
                                                                    class="value_d1_return percent_positive">+0.77%</span>
                                                            </td>
                                                            <td>
                                                                <span class="value_graph"><svg viewBox="0 0 500 100"
                                                                        class="chart">
                                                                        <polyline fill="none" stroke="#35a947"
                                                                            stroke-width="5"
                                                                            points=" 00,120 20,60 40,80 60,20 80,80 100,80 120,60 140,100 160,90 180,80 200, 110 220, 10 240, 70 260, 100 280, 100 300, 40 320, 0 340, 100 360, 100 380, 120 400, 60 420, 70 440, 80 " />
                                                                    </svg></span>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="stocks" role="tabpanel"
                                            aria-labelledby="stocks-tab">
                                            <div class="scroll-tbl">
                                                <table id="stocksTable"
                                                    class="table table-striped table-hover dt-responsive"
                                                    style="width:100%">
                                                    <thead>
                                                        <tr>
                                                            <th>Name</th>
                                                            <th>Ticker</th>
                                                            <th>Price</th>
                                                            <th>Capitalization</th>
                                                            <th>Industry</th>
                                                            <th>1D change</th>
                                                            <th>Graph</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr data-href="price.html">
                                                            <td>
                                                                <div class="logo-name">
                                                                    <div class="item-logo">
                                                                        <img src="{{URL::to('/public/assets/assets/img/AAPL.svg')}}"
                                                                            class="img-responsive" alt="">
                                                                    </div>
                                                                    <span class="item_name_value">Apple Inc.</span>
                                                                </div>
                                                            </td>
                                                            <td><span class="value_ticker">AAPL</span></td>
                                                            <td><span class="value_price">$8,874.19</span></td>
                                                            <td><span class="value_cap">$150.36 B</span></td>
                                                            <td><span class="value_overflow">Information
                                                                    Technology</span></td>
                                                            <td><span
                                                                    class="value_d1_return percent_positive">+13.08%</span>
                                                            </td>
                                                            <td>
                                                                <span class="value_graph"><svg viewBox="0 0 500 100"
                                                                        class="chart">
                                                                        <polyline fill="none" stroke="#35a947"
                                                                            stroke-width="5"
                                                                            points=" 00,120 20,60 40,80 60,20 80,80 100,80 120,60 140,100 160,90 180,80 200, 110 220, 10 240, 70 260, 100 280, 100 300, 40 320, 0 340, 100 360, 100 380, 120 400, 60 420, 70 440, 80 " />
                                                                    </svg></span>
                                                            </td>
                                                        </tr>
                                                        <tr data-href="price.html">
                                                            <td>
                                                                <div class="logo-name">
                                                                    <div class="item-logo">
                                                                        <img src="{{URL::to('/public/assets/assets/img/GOOG.svg')}}"
                                                                            class="img-responsive" alt="">
                                                                    </div>
                                                                    <span class="item_name_value">Alphabet Inc.</span>
                                                                </div>
                                                            </td>
                                                            <td><span class="value_ticker">GOOGL</span></td>
                                                            <td><span class="value_price">$864.14</span></td>
                                                            <td><span class="value_cap">$85.68 B</span></td>
                                                            <td><span class="value_overflow">Information
                                                                    Technology</span></td>
                                                            <td><span
                                                                    class="value_d1_return percent_positive">+6.82%</span>
                                                            </td>
                                                            <td>
                                                                <span class="value_graph"><svg viewBox="0 0 500 100"
                                                                        class="chart">
                                                                        <polyline fill="none" stroke="#35a947"
                                                                            stroke-width="5"
                                                                            points=" 00,120 20,60 40,80 60,20 80,80 100,80 120,60 140,100 160,90 180,80 200, 110 220, 10 240, 70 260, 100 280, 100 300, 40 320, 0 340, 100 360, 100 380, 120 400, 60 420, 70 440, 80 " />
                                                                    </svg></span>
                                                            </td>
                                                        </tr>
                                                        <tr data-href="price.html">
                                                            <td>
                                                                <div class="logo-name">
                                                                    <div class="item-logo">
                                                                        <img src="{{URL::to('/public/assets/assets/img/AMZN.svg')}}"
                                                                            class="img-responsive" alt="">
                                                                    </div>
                                                                    <span class="item_name_value">Amazon</span>
                                                                </div>
                                                            </td>
                                                            <td><span class="value_ticker">AMZN</span></td>
                                                            <td><span class="value_price">$1.06</span></td>
                                                            <td><span class="value_cap">$43.16 B</span></td>
                                                            <td><span class="value_overflow">Consumer
                                                                    Discretionary</span></td>
                                                            <td><span
                                                                    class="value_d1_return percent_positive">+43.04%</span>
                                                            </td>
                                                            <td>
                                                                <span class="value_graph"><svg viewBox="0 0 500 100"
                                                                        class="chart">
                                                                        <polyline fill="none" stroke="#35a947"
                                                                            stroke-width="5"
                                                                            points=" 00,120 20,60 40,80 60,20 80,80 100,80 120,60 140,100 160,90 180,80 200, 110 220, 10 240, 70 260, 100 280, 100 300, 40 320, 0 340, 100 360, 100 380, 120 400, 60 420, 70 440, 80 " />
                                                                    </svg></span>
                                                            </td>
                                                        </tr>
                                                        <tr data-href="price.html">
                                                            <td>
                                                                <div class="logo-name">
                                                                    <div class="item-logo">
                                                                        <img src="{{URL::to('/public/assets/assets/img/FB.svg')}}"
                                                                            class="img-responsive" alt="">
                                                                    </div>
                                                                    <span class="item_name_value">Facebook</span>
                                                                </div>
                                                            </td>
                                                            <td><span class="value_ticker">FB</span></td>
                                                            <td><span class="value_price">$145.25</span></td>
                                                            <td><span class="value_cap">$8.05 B</span></td>
                                                            <td><span class="value_overflow">Information
                                                                    Technology</span></td>
                                                            <td><span
                                                                    class="value_d1_return percent_negative">-11.53%</span>
                                                            </td>
                                                            <td>
                                                                <span class="value_graph"><svg viewBox="0 0 500 100"
                                                                        class="chart">
                                                                        <polyline fill="none" stroke="#e34828"
                                                                            stroke-width="5"
                                                                            points=" 00,120 20,60 40,80 60,20 80,80 100,80 120,60 140,100 160,90 180,80 200, 110 220, 10 240, 70 260, 100 280, 100 300, 40 320, 0 340, 100 360, 100 380, 120 400, 60 420, 70 440, 80 " />
                                                                    </svg></span>
                                                            </td>
                                                        </tr>
                                                        <tr data-href="price.html">
                                                            <td>
                                                                <div class="logo-name">
                                                                    <div class="item-logo">
                                                                        <img src="{{URL::to('/public/assets/assets/img/MSFT.svg')}}"
                                                                            class="img-responsive" alt="">
                                                                    </div>
                                                                    <span class="item_name_value">Microsoft
                                                                        Corporation</span>
                                                                </div>
                                                            </td>
                                                            <td><span class="value_ticker">MSFT</span></td>
                                                            <td><span class="value_price">$0.04</span></td>
                                                            <td><span class="value_cap">$2.73 B</span></td>
                                                            <td><span class="value_overflow">Information
                                                                    Technology</span></td>
                                                            <td><span
                                                                    class="value_d1_return percent_negative">-18.58%</span>
                                                            </td>
                                                            <td>
                                                                <span class="value_graph"><svg viewBox="0 0 500 100"
                                                                        class="chart">
                                                                        <polyline fill="none" stroke="#e34828"
                                                                            stroke-width="5"
                                                                            points=" 00,120 20,60 40,80 60,20 80,80 100,80 120,60 140,100 160,90 180,80 200, 110 220, 10 240, 70 260, 100 280, 100 300, 40 320, 0 340, 100 360, 100 380, 120 400, 60 420, 70 440, 80 " />
                                                                    </svg></span>
                                                            </td>
                                                        </tr>
                                                        <tr data-href="price.html">
                                                            <td>
                                                                <div class="logo-name">
                                                                    <div class="item-logo">
                                                                        <img src="{{URL::to('/public/assets/assets/img/BTG.svg')}}"
                                                                            class="img-responsive" alt="">
                                                                    </div>
                                                                    <span class="item_name_value">Bitcoin Gold</span>
                                                                </div>
                                                            </td>
                                                            <td><span class="value_ticker">BTG</span></td>
                                                            <td><span class="value_price">$108.07</span></td>
                                                            <td><span class="value_cap">$381,159</span></td>
                                                            <td><span class="value_max_quantity">Unlimited</span></td>
                                                            <td><span
                                                                    class="value_d1_return percent_positive">-12.93%</span>
                                                            </td>
                                                            <td>
                                                                <span class="value_graph"><svg viewBox="0 0 500 100"
                                                                        class="chart">
                                                                        <polyline fill="none" stroke="#35a947"
                                                                            stroke-width="5"
                                                                            points=" 00,120 20,60 40,80 60,20 80,80 100,80 120,60 140,100 160,90 180,80 200, 110 220, 10 240, 70 260, 100 280, 100 300, 40 320, 0 340, 100 360, 100 380, 120 400, 60 420, 70 440, 80 " />
                                                                    </svg></span>
                                                            </td>
                                                        </tr>
                                                        <tr data-href="price.html">
                                                            <td>
                                                                <div class="logo-name">
                                                                    <div class="item-logo">
                                                                        <img src="{{URL::to('/public/assets/assets/img/qtum.svg')}}"
                                                                            class="img-responsive" alt="">
                                                                    </div>
                                                                    <span class="item_name_value">Qtum</span>
                                                                </div>
                                                            </td>
                                                            <td><span class="value_ticker">BTG</span></td>
                                                            <td><span class="value_price">$108.07</span></td>
                                                            <td><span class="value_cap">$381,159</span></td>
                                                            <td><span class="value_max_quantity">Unlimited</span></td>
                                                            <td><span
                                                                    class="value_d1_return percent_negative">-12.93%</span>
                                                            </td>
                                                            <td>
                                                                <span class="value_graph"><svg viewBox="0 0 500 100"
                                                                        class="chart">
                                                                        <polyline fill="none" stroke="#e34828"
                                                                            stroke-width="5"
                                                                            points=" 00,120 20,60 40,80 60,20 80,80 100,80 120,60 140,100 160,90 180,80 200, 110 220, 10 240, 70 260, 100 280, 100 300, 40 320, 0 340, 100 360, 100 380, 120 400, 60 420, 70 440, 80 " />
                                                                    </svg></span>
                                                            </td>
                                                        </tr>
                                                        <tr data-href="price.html">
                                                            <td>
                                                                <div class="logo-name">
                                                                    <div class="item-logo">
                                                                        <img src="{{URL::to('/public/assets/assets/img/stellar.svg')}}"
                                                                            class="img-responsive" alt="">
                                                                    </div>
                                                                    <span class="item_name_value">Stellar</span>
                                                                </div>
                                                            </td>
                                                            <td><span class="value_ticker">XLM</span></td>
                                                            <td><span class="value_price">$0.35</span></td>
                                                            <td><span class="value_cap">$6.69 B</span></td>
                                                            <td><span class="value_max_quantity">103.27 B</span></td>
                                                            <td><span
                                                                    class="value_d1_return percent_positive">-13.7%</span>
                                                            </td>
                                                            <td>
                                                                <span class="value_graph"><svg viewBox="0 0 500 100"
                                                                        class="chart">
                                                                        <polyline fill="none" stroke="#35a947"
                                                                            stroke-width="5"
                                                                            points=" 00,120 20,60 40,80 60,20 80,80 100,80 120,60 140,100 160,90 180,80 200, 110 220, 10 240, 70 260, 100 280, 100 300, 40 320, 0 340, 100 360, 100 380, 120 400, 60 420, 70 440, 80 " />
                                                                    </svg></span>
                                                            </td>
                                                        </tr>
                                                        <tr data-href="price.html">
                                                            <td>
                                                                <div class="logo-name">
                                                                    <div class="item-logo">
                                                                        <img src="{{URL::to('/public/assets/assets/img/DASH.svg')}}"
                                                                            class="img-responsive" alt="">
                                                                    </div>
                                                                    <span class="item_name_value">Dash</span>
                                                                </div>
                                                            </td>
                                                            <td><span class="value_ticker">DASH</span></td>
                                                            <td><span class="value_price">$578.69</span></td>
                                                            <td><span class="value_cap">$4.55 B</span></td>
                                                            <td><span class="value_max_quantity">18.9 M</span></td>
                                                            <td><span
                                                                    class="value_d1_return percent_positive">-13.21%</span>
                                                            </td>
                                                            <td>
                                                                <span class="value_graph"><svg viewBox="0 0 500 100"
                                                                        class="chart">
                                                                        <polyline fill="none" stroke="#35a947"
                                                                            stroke-width="5"
                                                                            points=" 00,120 20,60 40,80 60,20 80,80 100,80 120,60 140,100 160,90 180,80 200, 110 220, 10 240, 70 260, 100 280, 100 300, 40 320, 0 340, 100 360, 100 380, 120 400, 60 420, 70 440, 80 " />
                                                                    </svg></span>
                                                            </td>
                                                        </tr>
                                                        <tr data-href="price.html">
                                                            <td>
                                                                <div class="logo-name">
                                                                    <div class="item-logo">
                                                                        <img src="{{URL::to('/public/assets/assets/img/ETC.svg')}}"
                                                                            class="img-responsive" alt="">
                                                                    </div>
                                                                    <span class="item_name_value">Ethereum
                                                                        Classic</span>
                                                                </div>
                                                            </td>
                                                            <td><span class="value_ticker">ETC</span></td>
                                                            <td><span class="value_price">$22.23</span></td>
                                                            <td><span class="value_cap">$2.21 B</span></td>
                                                            <td><span class="value_max_quantity">Unlimited</span></td>
                                                            <td><span
                                                                    class="value_d1_return percent_positive">-17.05%</span>
                                                            </td>
                                                            <td>
                                                                <span class="value_graph"><svg viewBox="0 0 500 100"
                                                                        class="chart">
                                                                        <polyline fill="none" stroke="#35a947"
                                                                            stroke-width="5"
                                                                            points=" 00,120 20,60 40,80 60,20 80,80 100,80 120,60 140,100 160,90 180,80 200, 110 220, 10 240, 70 260, 100 280, 100 300, 40 320, 0 340, 100 360, 100 380, 120 400, 60 420, 70 440, 80 " />
                                                                    </svg></span>
                                                            </td>
                                                        </tr>
                                                        <tr data-href="price.html">
                                                            <td>
                                                                <div class="logo-name">
                                                                    <div class="item-logo">
                                                                        <img src="{{URL::to('/public/assets/assets/img/ZEC.svg')}}"
                                                                            class="img-responsive" alt="">
                                                                    </div>
                                                                    <span class="item_name_value">Zcash</span>
                                                                </div>
                                                            </td>
                                                            <td><span class="value_ticker">ZEC</span></td>
                                                            <td><span class="value_price">$22.23</span></td>
                                                            <td><span class="value_cap">$2.21 B</span></td>
                                                            <td><span class="value_max_quantity">140.25 M</span></td>
                                                            <td><span
                                                                    class="value_d1_return percent_positive">-17.05%</span>
                                                            </td>
                                                            <td>
                                                                <span class="value_graph"><svg viewBox="0 0 500 100"
                                                                        class="chart">
                                                                        <polyline fill="none" stroke="#35a947"
                                                                            stroke-width="5"
                                                                            points=" 00,120 20,60 40,80 60,20 80,80 100,80 120,60 140,100 160,90 180,80 200, 110 220, 10 240, 70 260, 100 280, 100 300, 40 320, 0 340, 100 360, 100 380, 120 400, 60 420, 70 440, 80 " />
                                                                    </svg></span>
                                                            </td>
                                                        </tr>
                                                        <tr data-href="price.html">
                                                            <td>
                                                                <div class="logo-name">
                                                                    <div class="item-logo">
                                                                        <img src="{{URL::to('/public/assets/assets/img/neo.svg')}}"
                                                                            class="img-responsive" alt="">
                                                                    </div>
                                                                    <span class="item_name_value">Neo</span>
                                                                </div>
                                                            </td>
                                                            <td><span class="value_ticker">NEO</span></td>
                                                            <td><span class="value_price">$22.23</span></td>
                                                            <td><span class="value_cap">$2.21 B</span></td>
                                                            <td><span class="value_max_quantity">140.25 M</span></td>
                                                            <td><span
                                                                    class="value_d1_return percent_positive">-17.05%</span>
                                                            </td>
                                                            <td>
                                                                <span class="value_graph"><svg viewBox="0 0 500 100"
                                                                        class="chart">
                                                                        <polyline fill="none" stroke="#35a947"
                                                                            stroke-width="5"
                                                                            points=" 00,120 20,60 40,80 60,20 80,80 100,80 120,60 140,100 160,90 180,80 200, 110 220, 10 240, 70 260, 100 280, 100 300, 40 320, 0 340, 100 360, 100 380, 120 400, 60 420, 70 440, 80 " />
                                                                    </svg></span>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                                        <th>&nbsp;</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>
                                            <img src="{{URL::to('/public/assets/assets/img/exness.png')}}" width="200" height="33">
                                        </td>
                                        <td>Cyprus Securities and Exchange Commission (Cyprus)</td>
                                        <td>$1</td>
                                        <td>
                                            <div class="checkbox">
                                                <label>
                                                    <a href="http://www.exness.com/a/405883"
                                                        class="btn btn-mine radial">Trade</a>
                                                </label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img src="{{URL::to('/public/assets/assets/img/liquidity.png')}}" width="200" height="33">
                                        </td>
                                        <td>Financial Services a
                                            Authority (St. Vincent & the Grenadines)</td>
                                        <td>$5</td>
                                        <td>

                                            <div class="checkbox">

                                                <label>


                                                    <a href="https://promo.theliquidity.com/afl-forexustaad "
                                                        class="btn btn-mine radial">Trade</a>

                                                </label>

                                            </div>

                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img src="{{URL::to('/public/assets/assets/img/ic.png')}}" width="200" height="33">
                                        </td>
                                        <td>Cyprus Securities and Exchange Commission (Cyprus)</td>
                                        <td>$10</td>
                                        <td>
                                            <div class="checkbox">
                                                <label>
                                                    <a href="http://www.icmarkets.com/?camp=14589 "
                                                        class="btn btn-mine radial">Trade</a>

                                                </label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img src="{{URL::to('/public/assets/assets/img/cabana.png')}}" width="200" height="33">
                                        </td>
                                        <td>Financial Services Commission (British Virgin Islands)</td>
                                        <td>$50</td>
                                        <td>
                                            <div class="checkbox">
                                                <label>
                                                    <a href="https://secure.cabanacapitals.com/ib/links/go/334"
                                                        class="btn btn-mine radial">Trade</a>

                                                </label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img src="{{URL::to('/public/assets/assets/img/tb_36461062.png')}}" width="200" height="33">
                                        </td>
                                        <td>Cyprus Securities and Exchange Commission (Cyprus), Australian Securities
                                            and Investments Commission (Australia), International Financial Services
                                            Commission (Belize)</td>
                                        <td>$100</td>
                                        <td>
                                            <div class="checkbox">
                                                <label>
                                                    <a href="https://clicks.pipaffiliates.com/c?c=75456&l=en&p=1"
                                                        class="btn btn-mine radial">Trade</a>

                                                </label>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td>
                                            <img src="{{URL::to('/public/assets/assets/img/fxtm.png')}}" width="200" height="33">
                                        </td>
                                        <td>Cyprus Securities and Exchange Commission (Cyprus), Australian Securities
                                            and Investments Commission (Australia), International Financial Services
                                            Commission (Belize)</td>
                                        <td>$100</td>
                                        <td>
                                            <div class="checkbox">
                                                <label>
                                                    <a href="https://www.forextime.com/?partner_id=4907100"
                                                        class="btn btn-mine radial">Trade</a>

                                                </label>

                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </section>

                    <!-- <section class="free-forex-signals mt-5">
    	<div class="content_area_heading large-heading text-center">

                            <h1 class="heading_title wow animated fadeInUp">
                                Free Forex Signals
                            </h1>

                            <div class="heading_border wow animated fadeInUp">
                                <span class="one"></span><span class="two"></span><span class="three"></span>
                            </div>
                            <p class="mb-5">ForexSignals provides <strong>Free Forex Signals Online</strong> with realtime <a href="#">Performance</a> and <a href="#">totals.</a><br>
                            	To stay informed <a href="#">Refresh this page</a> or <a href="#"> Subscribe by E-mail</a>
                            </p>

                        </div>
    	<div class="row">
    		<div class="col-sm-6">
    			<div class="free-forex-signals-inner">
    				<div class="card">
    					<div class="card-header d-flex justify-content-between align-items-center">
    						<p class="mb-2"><span class="flag-icon flag-icon-ad">&nbsp;</span>
                    			<span class="flag-icon flag-icon-us">&nbsp;</span></p>
                    		<h6 class="m-0 font-weight-bold"><strong>EUR/USD</strong></h6>

    					</div>
    					<div class="card-body">
    						<div class="tbl-list d-flex justify-content-between align-items-center">
    							<strong>EUR/USD</strong>
    							<small>46 min ago</small>
    						</div>

    						<div class="tbl-list d-flex justify-content-between align-items-center">
    							<strong>From</strong>
    							<strong><small>GMT + 5:00 </small>0.56</strong>
    						</div>

    						<div class="tbl-list d-flex justify-content-between align-items-center">
    							<strong>Till</strong>
    							<strong><small>GMT + 5:00 </small>6.56</strong>
    						</div>

    						<div class="card-img">
    							<i class="fa fa-bell-o text-danger"></i>
    						</div>
    						<div class="text-center">
    						<button class="btn btn-primary">Login</button>
    						<button class="btn btn-secondary bg-dark btn-lg text-uppercase">Register</button>
    					</div>
    					</div>
    				</div>
    			</div>
    		</div>
    		<div class="col-sm-6">
    			<div class="free-forex-signals-inner locked">
    				<div class="card">
    					<div class="card-header d-flex justify-content-between align-items-center">
    						<p class="mb-2"><span class="flag-icon flag-icon-ad">&nbsp;</span>
                    			<span class="flag-icon flag-icon-us">&nbsp;</span></p>
                    		<h6 class="m-0 font-weight-bold"><strong>EUR/USD</strong></h6>

    					</div>
    					<div class="card-body">
    						<div class="tbl-list d-flex justify-content-between align-items-center">
    							<strong>EUR/USD</strong>
    							<small>46 min ago</small>
    						</div>

    						<div class="tbl-list d-flex justify-content-between align-items-center">
    							<strong>From</strong>
    							<strong><small>GMT + 5:00 </small>0.56</strong>
    						</div>

    						<div class="tbl-list d-flex justify-content-between align-items-center">
    							<strong>Till</strong>
    							<strong><small>GMT + 5:00 </small>6.56</strong>
    						</div>

    						<div class="card-img">
    							<i class="fa fa-lock text-danger"></i>
    						</div>
    						<div class="tbl-list d-flex justify-content-between align-items-center">
    							<strong>Buy</strong>
    							<small>0.9812</small>
    						</div>
    						<div class="tbl-list d-flex justify-content-between align-items-center">
    							<strong>Take Profit* at</strong>
    							<small>0.983</small>
    						</div>
    						<div class="tbl-list d-flex justify-content-between align-items-center">
    							<strong>Stop Loss* at</strong>
    							<small>0.9787</small>
    						</div>
    						<div class="tbl-list d-flex justify-content-between align-items-center">
    							<strong>Condition for new Signals</strong>
    							<small>
    								<i class="fa fa-bell"></i>
    								<i class="fa fa-bell"></i>
    								<i class="fa fa-bell-o"></i>
    								<i class="fa fa-bell-o"></i>
    								<i class="fa fa-bell-o"></i>
    							</small>
    						</div>
    						<div class="locked-overlay">
    							<a href="#">Unlock Now</a>

    						</div>
    					</div>
    				</div>
    			</div>
    		</div>
    	</div>
    </section> -->




                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 order-3 order-lg-3">
                    @include ('inc/home-right-sidebar')
                </div>
            </div>
        </div>
    </section>
    <!-- <section class="free-signals">
        <div class="container">

    <div class="content_area_heading large-heading text-center">

                            <h1 class="heading_title wow animated fadeInUp">
                                Free Signals
                            </h1>
                            <div class="heading_border wow animated fadeInUp">
                                <span class="one"></span><span class="two"></span><span class="three"></span>
                            </div>
                        </div>

    <div class="scroll-tbl"><table id="free-signals-list" class="table table-striped">
        <thead>
            <tr>
                <th>Symbols/Pairs</th>
                <th>Status</th>
                <th>Price</th>
                <th>Stop Lose</th>
                <th>Take Profit</th>
                <th>Valid Till</th>
                <th>Signal</th>
                <th>&nbsp;</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    <p class="mb-2"><span class="flag-icon flag-icon-ad">&nbsp;</span>
                    <span class="flag-icon flag-icon-us">&nbsp;</span></p>
                    <h6 class="m-0 font-weight-bold"><strong>EUR/USD</strong></h6>
                    <h6 class="m-0 text-danger font-weight-bold">59 min ago</h6>
                </td>
                <td><button class="btn btn-success btn-sm">Active</button></td>
                <td>$18.90</td>
                <td class="text-danger">1.90934</td>
                <td class="text-success">1.90934</td>
                <td class="text-center">
                	<p class="m-0"><strong>5 Dec 2020</strong></p>
                	<p class="m-0"><strong>18:30 PM</strong></p>
                </td>
                <td><button class="btn btn-warning btn-sm text-white">Buy</button></td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>
                    <p class="mb-2"><span class="flag-icon flag-icon-ad">&nbsp;</span>
                    <span class="flag-icon flag-icon-us">&nbsp;</span></p>
                    <h6 class="m-0 font-weight-bold"><strong>EUR/USD</strong></h6>
                    <h6 class="m-0 text-danger font-weight-bold">59 min ago</h6>
                </td>
                <td><button class="btn btn-secondary btn-sm">N/A</button></td>
                <td><strong class="font-weight-bold">Premium Only</strong></td>
                <td class="text-danger">N/A</td>
                <td class="text-success">N/A</td>
                <td class="text-center">
                	<p class="m-0"><strong>5 Dec 2020</strong></p>
                	<p class="m-0"><strong>18:30 PM</strong></p>
                </td>
                <td><button class="btn btn-secondary bg-dark btn-sm text-white">Register Now</button>

                </td>
                <td><i class="fa fa-comment-o fa-lg"></i></td>
            </tr>
            <tr>
                <td>
                    <p class="mb-2"><span class="flag-icon flag-icon-ad">&nbsp;</span>
                    <span class="flag-icon flag-icon-us">&nbsp;</span></p>
                    <h6 class="m-0 font-weight-bold"><strong>EUR/USD</strong></h6>
                    <h6 class="m-0 text-danger font-weight-bold">59 min ago</h6>
                </td>
                <td><button class="btn btn-success btn-sm">Active</button></td>
                <td>$18.90</td>
                <td class="text-danger">1.90934</td>
                <td class="text-success">1.90934</td>
                <td class="text-center">
                	<p class="m-0"><strong>5 Dec 2020</strong></p>
                	<p class="m-0"><strong>18:30 PM</strong></p>
                </td>
                <td><button class="btn btn-danger btn-sm text-white">Sell</button></td>
                <td>&nbsp;</td>
            </tr>
            <tr>
                <td>
                    <p class="mb-2"><span class="flag-icon flag-icon-ad">&nbsp;</span>
                    <span class="flag-icon flag-icon-us">&nbsp;</span></p>
                    <h6 class="m-0 font-weight-bold"><strong>EUR/USD</strong></h6>
                    <h6 class="m-0 text-danger font-weight-bold">59 min ago</h6>
                </td>
                <td><button class="btn btn-secondary btn-sm">Pending</button></td>
                <td><strong class="font-weight-bold">Registered Users</strong></td>
                <td class="text-danger">1.90934</td>
                <td class="text-success">1.90934</td>
                <td class="text-center">
                	<p class="m-0"><strong>5 Dec 2020</strong></p>
                	<p class="m-0"><strong>18:30 PM</strong></p>
                </td>
                <td><button class="btn btn-secondary bg-dark btn-sm text-white">Sign in</button></td>
                <td>&nbsp;</td>
            </tr>

        </tbody>
    </table></div>
</div>
    </section> -->
    <!--     <div id="particles-js" style="height: 0;"></div> -->
</div>
@include ('inc/footer')
