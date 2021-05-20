<!DOCTYPE html>
<html lang="en">


<head>
    <title>Forexustaad Admin panel</title>
    
    <!-- Meta -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="" />
    <meta name="keywords" content="">
    
    <!-- Favicon icon -->
    <link rel="icon" href="{{URL::to('public/assets/assets/img/favicon.png')}}" type="image/x-icon">

    <!-- vendor css -->
    <link rel="stylesheet" href="{{URL::to('public/assets/assets/css/style.css')}}">
    
    

</head>
<!-- [ offline-ui ] start -->
<div class="auth-wrapper maintance">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="text-center">
                    <!-- <img src="assets/images/maintance/404.png" alt="" class="img-fluid"> -->
                    <div class="">
                        <img src="{{URL::to('public/assets/assets/img/404.png')}}" class="img-fluid h-75" alt="">
                    </div>
                    <p align="center">
                        <a href="{{URL::to('/')}}">Go To Home Page</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- [ offline-ui ] end -->
<!-- Required Js -->
<script src="{{URL::to('public/assets/assets/js/vendor-all.min.js')}}"></script>
<script src="{{URL::to('public/assets/assets/js/plugins/bootstrap.min.js')}}"></script>


</body>


</html>
