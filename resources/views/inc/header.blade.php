
@php 
    if(Session::has('client')){
        $clientDataNoti = Session::get('client');
        $clientNotiID = $clientDataNoti['id'];
        $countLoop = count($ClientNotificationMessage);
        $finalData = array();
        foreach($ClientNotificationMessage as $clientNoti){
            if($clientNoti->email != null && $clientNoti->email == $clientDataNoti['email']){
                array_push($finalData,$clientNoti);
            };
            if($clientNoti->email == null){
                $viewClientNotiMember = $clientNoti->viewClientsId;
                $arrayViewNoti = explode("@",$viewClientNotiMember);
                if(array_search($clientNotiID,$arrayViewNoti) === false){
                    array_push($finalData,$clientNoti);
                }
            }
        }
    }
@endphp
<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-53883159-1"></script>
        <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'UA-53883159-1');
        </script>

    <!-- Meta Data -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Forexustaad is the best platforms for learning free forex trading in urdu/hindi. So, join our free forex training now and reshape your future with us.
">
<script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async=""></script>
<script>
  window.OneSignal = window.OneSignal || [];
  OneSignal.push(function() {
    OneSignal.init({
      appId: "02ee1eb6-82fc-4aa7-9d6a-3615c671f963",
    });
  });
</script>
    <title>Forex Ustaad:Free Forex Training In Urdu/Hindi | Forexustaad</title>
    <!-- Fav Icon -->
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
       <!-- datatable Stylesheet -->
    <link rel="stylesheet" type="text/css" href="{{ URL::to('/public/assets/DataTable/datatables.net/datatables.net-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ URL::to('/public/assets/DataTable/data-table/extensions/responsive/css/responsive.dataTables.css') }}" type="text/css" media="all">
        <!-- datatable Stylesheet -->
    <link href="{{URL::to('/public/assets/assets/css/bootstrap-toggle.min.css')}}" rel="stylesheet">

<!-- news Slider -->
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.3/css/swiper.min.css">


<!-- Newletter -->

<script id="mcjs">!function(c,h,i,m,p){m=c.createElement(h),p=c.getElementsByTagName(h)[0],m.async=1,m.src=i,p.parentNode.insertBefore(m,p)}(document,"script","https://chimpstatic.com/mcjs-connected/js/users/cd218c9f98ecf24ef623b52af/867964901ebaea03aa7601a97.js");</script>

<link href="//cdn-images.mailchimp.com/embedcode/horizontal-slim-10_7.css" rel="stylesheet" type="text/css">


<!-- Google recaptch -->
<script src="https://www.google.com/recaptcha/api.js?render=6LfoWyEaAAAAAC-Bs8wiRSMTBSLB3AR8Nq8eS3kH"></script>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script type="text/javascript">
      var onloadCallback = function() {
        grecaptcha.render('html_element', {
          'sitekey' : '6LezBIYaAAAAABr8gfLi76swA4va2bPoD-gykpGi'
        });
      };
      window.onload = function() {
    var $recaptcha = document.querySelector('#g-recaptcha-response');

    if($recaptcha) {
        $recaptcha.setAttribute("required", "required");
    }
};
    </script>
        <!-- font-awesome -->
            <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">
            <style>
                .fa{
                    font-family: "Font Awesome 5 Free", Open Sans;
                    font-weight:501;
                }
                .fa{
                    font-family: 'Font Awesome 5 Pro', 'Font Awesome 5 Free','Font Awesome 5 Solids', 'Font Awesome 5 Brands' !important;
                }
            </style>
            
<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-602bc30f9629ba67"></script>
<style>
  .atm-f{
    display:none!important;
  }
  .addthis_button_expanded1{
    display:none!important;
  }

</style>
</head>

<body>
    @if(Session::has('desktopNotification'))
        @include('send')
    @endif
    <div class='adblock-wrapper center hiddenAdblocker' id='ads-blocked'>
        <div class='adblock-content-wrapper'>
            <div class='adblock-content'>
            <div class='center'>
                <div class='image-container'>
                <div class='image'>
                    <i class="fas fa-exclamation-circle"></i>
                    <h3>
                    Ads
                    </h3>
                </div>
                </div>
            </div><br>
            <div class='adblock-text'>
                <h3>
                    Please disable your ad blocker!
                </h3>
                <p>
                    We know ads are annoying but please bear with us here & disable your ad blocker!
                </p>
            </div>
            <div class='adblock-button'>
                <a href="" class='btn'>
                    I've disabled my ad blocker!
                </a>
            </div>
            </div>
        </div>
    </div>



    <!-- Preloader starts -->
    <div id="loading">
        <img id="loading-image" src="{{URL::to('public/assets/assets/img/preloader.gif')}}" alt="Loading..." />
        <p class="mt-3"><strong>LOADING...</strong></p>
    </div>
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
                                                <li><a href="{{$link->link}}" target="_blank"><i class="fa fa-youtube"></i></a></li>
                                            @elseif($link->iconName == "LinkedIn")
                                                <li><a href="{{$link->link}}" target="_blank"><i class="fa fa-linkedin"></i></a></li>
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
                                        <li class="dropdown notification1">
                                            <a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-bell"></i><sup class="ClientNotificationCount">{{count($finalData)}}</sup></a>
                                            <div class="dropdown-menu notification" id="notifictionRight" aria-labelledby="navbarDropdown">
                                                <div class="card">
                                                    <div class="card-header text-white"> inbox (<span class="ClientNotificationCount">{{count($finalData)}}</span>)</span></div>
                                                    <div class="card-body">
                                                        <ul class="list-unstyled list-unstyled12">
                                                            @foreach($finalData as $clientMessageNoti)
                                                                @php
                                                                    if($clientMessageNoti->userType != 1){
                                                                        $user = $clientMessageNoti->GetUser();
                                                                        $userInfo = $clientMessageNoti->GetUserInfo();
                                                                        $clientNotiImg = URL::to('public/assets/assets/img/favicon.png');
                                                                        if($userInfo->userImage == null){
                                                                            $userInfo->userImage = "WebImages/avatar-5.jpg";
                                                                        }
                                                                    }else{
                                                                        $userClient = $clientMessageNoti->GetClientUser();
                                                                        if($userClient->image == null){
                                                                            $userClient->image = "WebImages/avatar-5.jpg";
                                                                        }
                                                                        $clientNotiImg = URL::to('/storage/app/'). "/" . $userClient->image;
                                                                    }
                                                                @endphp
                                                                <li class="media">
                                                                    <div class="media">
                                                                        <img class="img-radius ImageClientNotification" src="{{$clientNotiImg}}" alt="Generic placeholder image"/>
                                                                        <div class="media-body">
                                                                            <p class="m-0"><strong>{{$clientMessageNoti->userType != 1 ? "Admin" : $userClient->name}}</strong></p>
                                                                            <p class="m-0">{{$clientMessageNoti->message}}</p>
                                                                        </div>
                                                                        <a href="{{URL::to('clientNotification')}}/{{$clientMessageNoti->id}}" class="text-primary linkClientNotification m-0">View</a>
                                                                    </div>
                                                                </li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </li>
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
                                            @if($clientAccountData->image == null)
                                                <img id="ChatClientImageShowSrc" src="{{URL::to('/public/assets/assets/img/user1.jpg')}}" alt="user">
                                            @else
                                                <img id="ChatClientImageShowSrc" src="{{URL::to('/storage/app')}}/{{$clientAccountData->image}}" alt="user">
                                            @endif
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" href="{{URL::to('/user-profile')}}">User Profile</a>
                                                @php
                                                    $ikju = 0;
                                                    foreach($ClientAccountDetailInfo as $clientAccount){
                                                        if($clientAccount->clientId == $clientAccountData->id){
                                                            $ikju = 1;
                                                        }
                                                    }
                                                @endphp
                                                @if($ikju == 0)
                                                    <a class="dropdown-item" href="{{URL::to('/user-registration')}}">Become Vip Member</a>
                                                @endif
                                                <a class="dropdown-item" href="{{URL::to('/changePassword')}}">Change Password</a>
                                                <a class="dropdown-item" href="{{URL::to('/clientLogout')}}">Logout</a>
                                            </div>
                                            </div>
                                        </div>
                                    @endif

                                </div>

                                <div class="collapse navbar-collapse" id="navbarSupportedContent1">
                                    <ul class="navbar-nav">
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{URL::to('/strategies')}}"><span>Strategies</span> </a>
                                        </li>
                                        <li class="nav-item">
                                            <a class="nav-link" href="{{URL::to('/vipWebinar')}}"><span>Weekly Webinar</span> </a>
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
                                            <li><a href="{{$link->link}}" target="_blank"><i class="fa fa-youtube"></i></a></li>
                                        @elseif($link->iconName == "LinkedIn")
                                            <li><a href="{{$link->link}}" target="_blank"><i class="fa fa-linkedin"></i></a></li>
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
                                    <li class="dropdown notification1">
                                        <a class="dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-bell"></i><sup class="ClientNotificationCount">{{count($finalData)}}</sup></a>
                                        <div class="dropdown-menu notification" aria-labelledby="navbarDropdown">
                                            <div class="card">
                                                <div class="card-header text-white"> inbox (<span class="ClientNotificationCount">{{count($finalData)}}</span>)</span></div>
                                                <div class="card-body">
                                                    <ul class="list-unstyled list-unstyled12">
                                                        @foreach($finalData as $clientMessageNoti)
                                                            @php
                                                                if($clientMessageNoti->userType != 1){
                                                                    $user = $clientMessageNoti->GetUser();
                                                                    $userInfo = $clientMessageNoti->GetUserInfo();
                                                                    $clientNotiImg = URL::to('public/assets/assets/img/favicon.png');
                                                                }else{
                                                                    $userClient = $clientMessageNoti->GetClientUser();
                                                                    if($userClient->image == null){
                                                                        $userClient->image = "WebImages/avatar-5.jpg";
                                                                    }
                                                                    $clientNotiImg = URL::to('/storage/app/'). "/" . $userClient->image;
                                                                }
                                                            @endphp
                                                            <li class="media">
                                                                <div class="media">
                                                                    <img class="img-radius ImageClientNotification" src="{{$clientNotiImg}}" alt="Generic placeholder image" />
                                                                    <div class="media-body">
                                                                        <p class="m-0"><strong>{{$clientMessageNoti->userType != 1 ? "Admin" : $userClient->name}}</strong></p>
                                                                        <p class="m-0">{{$clientMessageNoti->message}}</p>
                                                                    </div>
                                                                    <a href="{{URL::to('clientNotification')}}/{{$clientMessageNoti->id}}" class="text-primary linkClientNotification m-0">View</a>
                                                                </div>
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
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
                                            @if($clientAccountData->image == null)
                                                <img src="{{URL::to('/public/assets/assets/img/user1.jpg')}}" alt="user">
                                            @else
                                                <img src="{{URL::to('/storage/app')}}/{{$clientAccountData->image}}" alt="user">
                                            @endif
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" style="width: 200px;z-index:10000;">
                                            <a class="dropdown-item" href="{{URL::to('/user-profile')}}">User Profile</a>
                                            @if($ikju == 0)
                                                <a class="dropdown-item" href="{{URL::to('/user-registration')}}">Become Vip Member</a>
                                            @endif
                                            <a class="dropdown-item" href="{{URL::to('/changePassword')}}">Change Password</a>
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
                                        <li><a href="{{$link->link}}" target="_blank"><i class="fa fa-youtube"></i></a></li>
                                    @elseif($link->iconName == "LinkedIn")
                                        <li><a href="{{$link->link}}" target="_blank"><i class="fa fa-linkedin"></i></a></li>
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
                                    <a href="#">English <i class="fa fa-caret-down"></i></a>
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
                <nav class="navbar navbar-expand-lg pl-0 pr-0 position-relative sticky-top" style="z-index: 10;">
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
                                <a class="nav-link" href="{{URL::to('/brokerList')}}"><span>Brokers</span> </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link  dropdown-toggle text-light" href="#" data-toggle="dropdown">
                                    Forex Education
                                </a>
                                <ul class="dropdown-menu fade-up">
                                    <li><a class="dropdown-item" href="{{URL::to('/training/Basic/all')}}">Basic Training</a></li>
                                    @if(!Session::has('client'))
                                        <li><a class="dropdown-item LoginButton" data-toggle="modal" data-target="#requestQuoteModal">Advance Training</a></li>
                                    @else
                                        <li><a class="dropdown-item" href="{{URL::to('/training/Advance/all')}}">Advance Training</a></li>
                                    @endif
                                    <li><a class="dropdown-item" href="{{URL::to('/training/Habbit/all')}}">50 Habbit Training</a></li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link  dropdown-toggle text-light" href="#" data-toggle="dropdown">
                                    Trading Tools
                                </a>
                                <ul class="dropdown-menu fade-up">
                                    <li><a class="dropdown-item" href="{{URL::to('/analysis/')}}">Analysis</a></li>
                                    <li><a class="dropdown-item" href="{{URL::to('/fundamental/')}}">Fundamental History</a></li>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{URL::to('/signal')}}"><span>Signals <sup id="blink">new</sup></span></a>
                            </li>
                            <!-- <li class="nav-item">
                                <a class="nav-link" href="{{URL::to('blog-post.html')}}"><span>blog</span></a>
                            </li> -->
                            <li class="nav-item">
                                <a class="nav-link" href="{{URL::to('/about-page')}}"><span>ABOUT</span></a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#" data-toggle="modal" data-target=".bd-example-modal-lg"><span>contact us</span></a>
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
{{--contact modal  --}}
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="contact-section">
                <div class="container minusmargin">
                    <div class="row shadow">
                        <div class="col-md-8 bg-white p-5">
                            <div class="clearfix">
                                <p class="fontpop float-left">
                                    <span class="font20 sendmsgspan"> Send us a Message </span><br>
                                    Feel free to contact us
                                </p>
                                <img src="{{URL::to('public/assets/assets/img/send.svg')}}" class="img-fluid float-right" style="width: 63px;">
                            </div>
                            <div class="pt-3 ">
                                <form action="{{URL::to('/contact/add')}}" class="ContactFormSubmit" method="post">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="fn" class="fontpop">Your Name <i class=" text-bl fa fa-check-circle-o"></i></label>
                                                <input type="text" name="name" class="form-control" id="fn" placeholder="Enter Your Name">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="email" class="fontpop">Email Address <i class=" text-bl fa fa-check-circle-o"></i></label>
                                                <input type="email" name="email" class="form-control emailContact" id="email" placeholder="Enter Email">
                                                <small id="emailHelp" class="form-text text-muted font9">We'll never share your email with anyone else.</small>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="phonenum" class="fontpop">Phone Number <i class=" text-bl fa fa-check-circle-o"></i></label>
                                                <input type="tel" name="phone" class="form-control" id="phonenum" placeholder="Enter Your Number">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="country" class="fontpop">Enter Country <i class=" text-bl fa fa-check-circle-o"></i></label>
                                                <input type="text" name="country" class="form-control" id="country" placeholder="Country">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group ">
                                                <label for="exampleCheck1" class="fontpop">Message <i class=" text-bl fa fa-check-circle-o"></i></label>
                                                <textarea class="form-control" name="message" rows="7" placeholder="Enter your message here"></textarea>
                                            </div>
                                        </div>
                                        <input type="submit" class="btn btn-primary1 text-center">
                                        <p class="Contacterror text-danger text-right w-100"></p>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <div class="col-md-4 py-5 bg-darkpurple">
                            <div class="basic-info about-p text-center">
                                <button type="button" class="close bg-light text-dark" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <h3 class="fontpop py-3 text-white">Contact Information</h3>
                                <div class=" p-3">
                                    <div class="row">
                                        <div class="col-md-4 mb-3">
                                            <div class="icc">
                                                <i class="fa fa-map-marker text-white"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-8 mb-3">
                                            <div class="text-left text-white">
                                                <p class="h5">Our Location</p>
                                                <p>Glasgow, UK</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <div class="icc">
                                                <i class="fa fa-envelope"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-8 mb-3">
                                            <div class="text-left text-white">
                                                <p class="h5">Email</p>
                                                <p>info@forexustaad.com</p>
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <div class="icc">
                                                <i class="fa fa-phone"></i>
                                            </div>
                                        </div>
                                        <div class="col-md-8 mb-3">
                                            <div class="text-left text-white">
                                                <p class="h5">Phone</p>
                                                <p>+44 7459065360</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="">
                                        <!-- social media large section -->
                                        <div class=" bg-purplelight">
                                            <div class="text-center contactpage py-5">
                                                <a href="http://facebook.com/forexustaad/" class="pr-3">
                                                    <i class="fa fa-facebook"></i>
                                                </a>
                                                <a href="https://www.instagram.com/forexustaadofficial/" class="pr-3">
                                                    <i class="fa fa-instagram"></i>
                                                </a>
                                                <a href="https://twitter.com/Forex_ustaad/" class="pr-3">
                                                    <i class="fa fa-twitter"></i>
                                                </a>
                                                <a href="https://www.youtube.com/channel/UColKJfR46umR3KAnM0ggMKQ" class="pr-3">
                                                    <i class="fa fa-youtube"></i>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

