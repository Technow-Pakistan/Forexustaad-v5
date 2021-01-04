<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Meta Data -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Forexustaad is the best platforms for learning free forex trading in urdu/hindi. So, join our free forex training now and reshape your future with us.
">
    <title>{{isset($title) ? "$title" : 'Forex Ustaad'}}:Free Forex Training In Urdu/Hindi | Forexustaad</title>
    <!-- Fav Icon -->
    <link rel="icon" type="image/png" href="{{URL::to('/storage/app')}}/{{$MainFavicon->favicon}}">
    <!-- Dependency Styles -->
    <link rel="stylesheet" href="{{URL::to('/public/assets/node_modules/bootstrap/dist/css/bootstrap.css')}}">
    <!-- Site Stylesheet -->
    <link rel="stylesheet" href="{{URL::to('/public/assets/assets/css/slick.css')}}" type="text/css">
    <link rel="stylesheet" href="{{URL::to('/public/assets/assets/css/style.css')}}" type="text/css">
    <link rel="stylesheet" href="{{URL::to('/public/assets/assets/css/responsive.css')}}" type="text/css">
    <link rel="stylesheet" href="{{URL::to('/public/assets/assets/css/animate.css')}}" type="text/css">
    <link rel="stylesheet" href="{{URL::to('/public/assets/assets/fonts/font-awesome4/css/font-awesome.css')}}">
    <link rel="stylesheet" href="{{URL::to('/public/assets/assets/fonts/flaticon/flaticon.css')}}">
    <link rel="stylesheet" href="{{URL::to('/public/assets/assets/flag-icons/css/flag-icon.min.css')}}">
    <link href="{{URL::to('/public/assets/assets/css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{URL::to('/public/assets/assets/css/bootstrap-toggle.min.css')}}" rel="stylesheet">

    <!-- Link to the file hosted on your server, -->
<link rel="stylesheet" href="path-to-the-file/splide.min.css">

<!-- or the one installed in node_modules directory, -->
<link rel="stylesheet" href="{{URL::to('/public/assets/node_modules/@splidejs/splide/dist/css/splide.min.css')}}">

<!-- or the reference on CDN -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/css/splide.min.css">
<!-- news Slider -->
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.3/css/swiper.min.css">


<!-- Newletter -->

<script id="mcjs">!function(c,h,i,m,p){m=c.createElement(h),p=c.getElementsByTagName(h)[0],m.async=1,m.src=i,p.parentNode.insertBefore(m,p)}(document,"script","https://chimpstatic.com/mcjs-connected/js/users/cd218c9f98ecf24ef623b52af/867964901ebaea03aa7601a97.js");</script>

<link href="//cdn-images.mailchimp.com/embedcode/horizontal-slim-10_7.css" rel="stylesheet" type="text/css">

<script data-ad-client="ca-pub-4965167409528757" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
</head>

<body>

    <!-- Preloader starts -->
    <!-- <div id="loading">
  <img id="loading-image" src="assets/img/preloader.gif" alt="Loading..." />
  <p class="mt-3"><strong>LOADING...</strong></p>
</div> -->
    <!-- Preloader ends -->
    <div class="wrapper" id="top">
        <?php
		define('BASE_URL', 'http://localhost/forex-ustaad/');
	?>

	<section class="header-wrap">
        <div class="pre-header">
            <div class="container">
            	<div class="pre-header-inner">
                <div class="row justify-content-between">
                    @if(Session::has('client'))
                        <div class="col-sm-6 col-left">
                            <!-- Socials -->
                            <nav class="navbar navbar-expand-lg pl-0 pr-0 position-relative sticky-top" id="toggler12345">

                                <button class="navbar-toggler" id="toggler12" type="button" data-toggle="collapse" data-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent1" aria-expanded="false" aria-label="Toggle navigation">
                                    <span class="navbar-toggler-icon cs-menu"></span>
                                </button> 
                                <div class="mainClass">
                                    <ul class="social-icons d-flex list-unstyled h-100 align-items-center mt-2 mb-0">
                                        @foreach($SocialMediaLink as $link)
                                            @if($link->iconName == "Facebook")
                                                <li><a href="{{$link->link}}" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                            @elseif($link->iconName == "Twitter")
                                                <li><a href="{{$link->link}}" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                            @elseif($link->iconName == "GooglePlus")
                                                <li><a href="{{$link->link}}" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                                            @elseif($link->iconName == "Youtube")
                                                <li><a href="{{$link->link}}" target="_blank"><i class="fa fa-youtube-play"></i></a></li>
                                            @elseif($link->iconName == "LinkedIn")
                                                <li><a href="{{$link->link}}" target="_blank"><i class="fa fa-linkedin-square"></i></a></li>
                                            @elseif($link->iconName == "Instagram")
                                                <li><a href="{{$link->link}}" target="_blank"><i class="fa fa-instagram"></i></a></li>
                                            @elseif($link->iconName == "Snapchat")bell
                                                <li><a href="{{$link->link}}" target="_blank"><i class="fa fa-"></i></a></li>
                                            @elseif($link->iconName == "Tiktok")
                                                <li><a href="{{$link->link}}" target="_blank"><img src="{{URL::to('/public/assets/assets/img/tiktokLogo.png')}}" alt="tiktok" width="20" height="20"></a></li>
                                            @elseif($link->iconName == "Pinterest")
                                                <li><a href="{{$link->link}}" target="_blank"><i class="fa fa-pinterest-p"></i></a></li>
                                            @endif
                                        @endforeach
                                            <!-- <li><a href="#"><i class="fa fa-briefcase"></i></a></li>
                                            <li><a href="#"><i class="fa fa-clock-o"></i></a></li> -->
                                    </ul>
                                    @if(!Session::has('client'))
                                        <div class="lang-area d-flex justify-content-center align-items-center">
                                            <a class="nav-link btn btn-outline-primary LoginButton" href="#" data-toggle="modal" data-target="#requestQuoteModal" href="javascript_void(0)">Login</a>
                                            &nbsp;|&nbsp;
                                            <a class="nav-link btn btn-outline-primary RegistrationButton" href="#" data-toggle="modal" data-target="#requestQuoteModal" href="javascript_void(0)">Register</a>

                                        </div>
                                    @endif

                                    
                                    @if(Session::has('client'))

                                        @php
                                            $clientAccountData =Session::get('client');
                                        @endphp
                                        <div class="after-login">
                                            <div class="dropdown">
                                            <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <img src="{{URL::to('/public/assets/assets/img/user1.jpg')}}" alt="user">
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <!-- <a class="dropdown-item" href="#">Action</a>
                                                <a class="dropdown-item" href="#">Another action</a> -->
                                                <a class="dropdown-item" href="{{URL::to('/clientLogout')}}">Logout</a>
                                            </div>
                                            </div>
                                        </div>
                                    @endif

                                </div>
                                
                                <div class="collapse navbar-collapse" id="navbarSupportedContent1">
                                    <ul class="navbar-nav">
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{URL::to('/')}}"><span>HOME</span> </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{URL::to('/brokerList')}}"><span>Forex</span> </a>
                                        </li>
                                        <!-- <li class="nav-item dropdown">
                                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Forex Broker List
                                            </a>
                                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                                <a class="dropdown-item" href="#">Broker Comparison</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="#">Item 2</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item" href="#">item 3</a>
                                            </div>
                                        </li> -->
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{URL::to('/construction')}}"><span>ABOUT</span></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{URL::to('/construction')}}"><span>Trading</span></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{URL::to('/construction')}}"><span>Education</span></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{URL::to('/construction')}}"><span>Promotions</span></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{URL::to('/construction')}}"><span>Member</span></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{URL::to('blog-post.html')}}"><span>blog</span></a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{URL::to('/construction')}}"><span>contact</span></a>
                                        </li>
                                    </ul>
                                </div>
                            
                            </nav>
                        </div>
                        <div class="col-sm-6 col-right mainHide">
                            <div class="d-flex justify-content-end align-items-center h-100">
                                <ul class="social-icons d-flex list-unstyled h-100 align-items-center m-0">
                                    @foreach($SocialMediaLink as $link)
                                        @if($link->iconName == "Facebook")
                                            <li><a href="{{$link->link}}" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                        @elseif($link->iconName == "Twitter")
                                            <li><a href="{{$link->link}}" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                        @elseif($link->iconName == "GooglePlus")
                                            <li><a href="{{$link->link}}" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                                        @elseif($link->iconName == "Youtube")
                                            <li><a href="{{$link->link}}" target="_blank"><i class="fa fa-youtube-play"></i></a></li>
                                        @elseif($link->iconName == "LinkedIn")
                                            <li><a href="{{$link->link}}" target="_blank"><i class="fa fa-linkedin-square"></i></a></li>
                                        @elseif($link->iconName == "Instagram")
                                            <li><a href="{{$link->link}}" target="_blank"><i class="fa fa-instagram"></i></a></li>
                                        @elseif($link->iconName == "Snapchat")bell
                                            <li><a href="{{$link->link}}" target="_blank"><i class="fa fa-"></i></a></li>
                                        @elseif($link->iconName == "Tiktok")
                                            <li><a href="{{$link->link}}" target="_blank"><img src="{{URL::to('/public/assets/assets/img/tiktokLogo.png')}}" alt="tiktok" width="20" height="20"></a></li>
                                        @elseif($link->iconName == "Pinterest")
                                            <li><a href="{{$link->link}}" target="_blank"><i class="fa fa-pinterest-p"></i></a></li>
                                        @endif
                                    @endforeach
                                        <!-- <li><a href="#"><i class="fa fa-briefcase"></i></a></li>
                                        <li><a href="#"><i class="fa fa-clock-o"></i></a></li> -->
                                </ul>
                                @if(!Session::has('client'))
                                    <div class="lang-area d-flex justify-content-center align-items-center">
                                        <a class="nav-link btn btn-outline-primary LoginButton" href="#" data-toggle="modal" data-target="#requestQuoteModal" href="javascript_void(0)">Login</a>
                                        &nbsp;|&nbsp;
                                        <a class="nav-link btn btn-outline-primary RegistrationButton" href="#" data-toggle="modal" data-target="#requestQuoteModal" href="javascript_void(0)">Register</a>

                                    </div>
                                @endif
                                @if(Session::has('client'))

                                    @php
                                        $clientAccountData =Session::get('client');
                                    @endphp
                                    <div class="after-login">
                                        <div class="dropdown">
                                        <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <img src="{{URL::to('/public/assets/assets/img/user1.jpg')}}" alt="user">
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <!-- <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a> -->
                                            <a class="dropdown-item" href="{{URL::to('/clientLogout')}}">Logout</a>
                                        </div>
                                        </div>
                                    </div>
                                @endif

                            </div>
                        </div>
                        <style>
                            .mainClass{
                                display:none !important;
                            }
                                @media (max-width: 575px){
                                .mainClass{
                                    display:flex !important;
                                }  
                                .mainHide{
                                    display:none !important;
                                }
                            #navbarSupportedContent1 .navbar-nav .nav-link{
                                padding: 10px 0px !important;
                                color: #fff;
                                font-family: "Morton-Bold";
                                font-size: 14px;
                                text-transform: uppercase;

                            }
                            }
                            #navbarSupportedContent1 .navbar-nav .nav-link{
                                padding: 0px 0px;
                                color: #fff;
                                font-family: "Morton-Bold";
                                font-size: 14px;
                                text-transform: uppercase;

                            }
                        </style>
                    @else
                        <div class="col-sm-6 col-left">
                            <!-- Socials -->
                            <ul class="social-icons d-flex list-unstyled h-100 align-items-center m-0">
                                @foreach($SocialMediaLink as $link)
                                    @if($link->iconName == "Facebook")
                                        <li><a href="{{$link->link}}" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                    @elseif($link->iconName == "Twitter")
                                        <li><a href="{{$link->link}}" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                    @elseif($link->iconName == "GooglePlus")
                                        <li><a href="{{$link->link}}" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                                    @elseif($link->iconName == "Youtube")
                                        <li><a href="{{$link->link}}" target="_blank"><i class="fa fa-youtube-play"></i></a></li>
                                    @elseif($link->iconName == "LinkedIn")
                                        <li><a href="{{$link->link}}" target="_blank"><i class="fa fa-linkedin-square"></i></a></li>
                                    @elseif($link->iconName == "Instagram")
                                        <li><a href="{{$link->link}}" target="_blank"><i class="fa fa-instagram"></i></a></li>
                                    @elseif($link->iconName == "Snapchat")
                                        <li><a href="{{$link->link}}" target="_blank"><i class="fa fa-bell"></i></a></li>
                                    @elseif($link->iconName == "Tiktok")
                                        <li><a href="{{$link->link}}" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                                    @elseif($link->iconName == "Pinterest")
                                        <li><a href="{{$link->link}}" target="_blank"><i class="fa fa-pinterest-p"></i></a></li>
                                    @endif
                                @endforeach
                                    <!-- <li><a href="#"><i class="fa fa-briefcase"></i></a></li>
                                    <li><a href="#"><i class="fa fa-clock-o"></i></a></li> -->
                            </ul>
                            
                        </div>
                        <div class="col-sm-6 col-right">
                            <div class="d-flex justify-content-end align-items-center h-100">
                                @if(!Session::has('client'))
                                    <div class="lang-area d-flex justify-content-center align-items-center">
                                        <a class="nav-link btn btn-outline-primary LoginButton" href="#" data-toggle="modal" data-target="#requestQuoteModal" href="javascript_void(0)">Login</a>
                                        &nbsp;|&nbsp;
                                        <a class="nav-link btn btn-outline-primary RegistrationButton" href="#" data-toggle="modal" data-target="#requestQuoteModal" href="javascript_void(0)">Register</a>

                                    </div>
                                @endif

                                <div class="lang-button">
                                    <a href="#">English</a>
                                    <ul class="dropdown-list">
                                        <li><a href="#">English</a></li>
                                        <li><a href="#">German</a></li>
                                        <li><a href="#">Spanish</a></li>
                                    </ul>
                                </div>
                                @if(Session::has('client'))

                                    @php
                                        $clientAccountData =Session::get('client');
                                    @endphp
                                    <div class="after-login">
                                        <div class="dropdown">
                                        <button class="btn dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        {{$clientAccountData->name}}  <img src="{{URL::to('/public/assets/assets/img/user1.jpg')}}" alt="user">
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <!-- <a class="dropdown-item" href="#">Action</a>
                                            <a class="dropdown-item" href="#">Another action</a> -->
                                            <a class="dropdown-item" href="{{URL::to('/clientLogout')}}">Logout</a>
                                        </div>
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            </div>
        </div>
        <div class="top-header">
            <div class="container">
                <div class="row text-center align-items-center">
                    <div class="col">
                        <div class="a-img">
                            @isset($headerLeftBanner)
                                @if($headerLeftBanner->banner != null)
                                    <a href="{{$headerLeftBanner->link}}">
                                        <img src="{{URL::to('/storage/app')}}/{{$headerLeftBanner->banner}}">
                                    </a>
                                @else
                                    @php
                                        echo $headerLeftBanner->htmlLink;
                                    @endphp
                                @endif
                            @endisset
                    	</div>
                    </div>
                    <div class="col">
                        <!-- logo -->
                        <div class="logo-wrap">
                            <a href="{{URL::to('/')}}" class="logo"> <img src="{{URL::to('/storage/app')}}/{{$MainLogo->logo}}" alt="Logo"></a>
                        </div>
                    </div>
                    <div class="col text-right">
                    	<div class="a-img">
                            @isset($headerRightBanner)
                                @if($headerRightBanner->banner != null)
                                    <a href="{{$headerRightBanner->link}}">
                                        <img src="{{URL::to('/storage/app')}}/{{$headerRightBanner->banner}}">
                                    </a>
                                @else
                                    @php
                                        echo $headerRightBanner->htmlLink;
                                    @endphp
                                @endif
                            @endisset
                    	</div>
                    </div>
                </div>
            </div>
        </div>
        <header>
            <div class="container">
                <nav class="navbar navbar-expand-lg pl-0 pr-0 position-relative sticky-top">

                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon cs-menu"></span>
                    </button>
                    <a class="navbar-brand m-0" href="{{URL::to('/')}}">
                        <img src="{{URL::to('/storage/app')}}/{{$MainLogo->logo}}">
                    </a>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="{{URL::to('/')}}"><span>HOME</span> </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{URL::to('/brokerList')}}"><span>Forex Broker List</span> </a>
                            </li>
                            <!-- <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Forex Broker List
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="#">Broker Comparison</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">Item 2</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#">item 3</a>
                                </div>
                            </li> -->
                            <li class="nav-item">
                                <a class="nav-link" href="{{URL::to('/construction')}}"><span>ABOUT</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{URL::to('/construction')}}"><span>Trading Tools </span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{URL::to('/construction')}}"><span>Education</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{URL::to('/construction')}}"><span>Promotions</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{URL::to('/construction')}}"><span>Member area</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{URL::to('blog-post.html')}}"><span>blog</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{URL::to('/construction')}}"><span>contact us</span></a>
                            </li>
                        </ul>
                    </div>
                    <div class="search_div">
                        <ul class="pl-0 mb-0 search_btns">
                            <li class="search_header list-unstyled">
                                <i class="fa fa-search" id="open_popup"></i>
                                <i class="fa fa-times" id="close_popup"></i>
                            </li>
                        </ul>
                        <form id="search_top_bar" class="search_popup form-inline">
                            <div class="form-group position-relative m-0">
                                <input type="text" class="form-control search_group" placeholder="Search..." name="search_text" id="search_text">
                                <!-- <button type="submit" class="search_btn text-white">
                                    <i class="fa fa-search"></i>
                                </button> -->
                            </div>
                        </form>
                    </div>
                </nav>
            </div>
        </header>
        </section>
        <!--=========================-->
        <!--=        Navbar         =-->
        <!--=========================-->
        <!-- /#header -->
