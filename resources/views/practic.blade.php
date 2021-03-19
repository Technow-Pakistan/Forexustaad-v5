<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">
    <title>Document</title>
    

<!--Desktop Notification Script-->
<script src="https://cdn.onesignal.com/sdks/OneSignalSDK.js" async=""></script>
<script>
  window.OneSignal = window.OneSignal || [];
  OneSignal.push(function() {
    OneSignal.init({
      appId: "2e2a8527-b671-4d10-bbe3-bca1064dc33b",
      safari_web_id: "web.onesignal.auto.2e2a8527-b671-4d10-bbe3-bca1064dc33b",
      notifyButton: {
        enable: true,
      },
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
  
    <link href="{{URL::to('/public/assets/assets/css/bootstrap-toggle.min.css')}}" rel="stylesheet">

<!-- news Slider -->
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.3/css/swiper.min.css">


<!-- Newletter -->

<script id="mcjs">!function(c,h,i,m,p){m=c.createElement(h),p=c.getElementsByTagName(h)[0],m.async=1,m.src=i,p.parentNode.insertBefore(m,p)}(document,"script","https://chimpstatic.com/mcjs-connected/js/users/cd218c9f98ecf24ef623b52af/867964901ebaea03aa7601a97.js");</script>

<link href="//cdn-images.mailchimp.com/embedcode/horizontal-slim-10_7.css" rel="stylesheet" type="text/css">

<script data-ad-client="ca-pub-4965167409528757" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>

<!-- Google recaptch -->
<script src="https://www.google.com/recaptcha/api.js?render=6LfoWyEaAAAAAC-Bs8wiRSMTBSLB3AR8Nq8eS3kH"></script>
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
  

<!-- Request Quote Modal ends -->
<script src="{{URL::to('/public/assets/assets/js/jquery-3.2.1.min.js')}}"></script>

<script>
   
// Stock Indices
$.ajax({
      type: "Get",
      url: "https://fcsapi.com/api-v3/stock/indices_latest?id=1,2,3,4,5&access_key=&access_key=7bcaAttKq4UFZwKhrE2LEHn",
      success: function(response){
        json = response.response;
        $("#stocksTable tbody").html("");
        for (let index = 0; index < response.length; index++) {
            $("#stocksTable tbody").appand("<tr><td>"+json[index].name+"</td><td>"+json[index].c+"</td><td>"+json[index].h+"</td><td>"+json[index].l+"</td><td>"+json[index].tm+"</td></tr>");          
        }
      },
      error: function(data) {
        console.log("fail");
      }
    });


// Crypto
    $.ajax({
      type: "Get",
      url: "https://fcsapi.com/api-v3/crypto/latest?symbol=all_crypto&access_key=7bcaAttKq4UFZwKhrE2LEHn",
      success: function(response){
        json = response.response;
        $("#cryptoTable tbody").html("");
        for (let index = 0; index < response.length; index++) {
            $("#cryptoTable tbody").appand("<tr><td>"+json[index].s+"</td><td>"+json[index].c+"</td><td>"+json[index].o+"</td><td>"+json[index].h+"</td><td>"+json[index].l+"</td><td>"+json[index].tm+"</td></tr>");          
        }
      },
      error: function(data) {
        console.log("fail");
      }
    });

// Forexx
    $.ajax({
      type: "Get",
      url: "https://fcsapi.com/api-v3/forex/latest?symbol=all_forex&access_key=7bcaAttKq4UFZwKhrE2LEHn",
      success: function(response){
        json = response.response;
        $("#forexTable tbody").html("");
        for (let index = 0; index < response.length; index++) {
            $("#forexTable tbody").appand("<tr><td>"+json[index].s+"</td><td>"+json[index].c+"</td><td>"+json[index].o+"</td><td>"+json[index].h+"</td><td>"+json[index].l+"</td><td>"+json[index].tm+"</td></tr>");          
        }

      },
      error: function(data) {
        console.log("fail");
      }
    });
</script>