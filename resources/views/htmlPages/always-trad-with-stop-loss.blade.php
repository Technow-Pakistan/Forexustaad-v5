@include ('inc/header')
        <!-- Content Area -->

        <div class="content_area">
    <section class="after_banner_content_area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-3 col-md-6 col-sm-12 order-2 order-lg-1">
                    @include('inc.home-left-sidebar')
                </div>
                <div class="col-lg-6 col-md-12 order-1 order-lg-2">
                    

                    <div class="family">
                            <div>
                                <h4>Always trad with stop loss in Forex trading</h4>
                            </div>
                            <div class="post_representor">
                                <ul class="">
                                    <li><i class="fa fa-user"></i> Raheel Nawaz</li>
                                    <li><i class="fa fa-clock-o"></i> September 2, 2015</li>
                                    <li><i class="fa fa-folder"></i> Jobs scams, Scams</li>
                                    <li><i class="fa fa-comments"></i> 10 Comments </li>
                                    <li><i class="fa fa-eye"></i> 4,276 Views</li>
                                    <li><div id="shareLink"></div></li>
                                </ul>
                            </div>
                            
                            <div class="pt-4">
                                <h3 class="text-center">
                                    I teach in my webinar you always trad with stop loss, look at image below and get some idea,
                                </h3>
                                <br>
                                <h3 class="text-center">
                                    you must Always trad with Sl if you not bear wash you trading account. this is very imported point
                                </h3>
                                <br>
                                <h3 class="text-center">
                                    you must listed this point in your rule
                                </h3>
                                <br><br>
                                <div class="text-center">
                                    <img src="{{URL::to('/public/assets/assets/img/blog-post/Trad-with-stop-los.jpg')}}" class="img-fluid">
                                </div>
                                <br><br>
                                <h4 class="text-center">
                                    <strong>
                                    If you like this Picture then you must share with your friends
                                </strong>

                                </h4>
                                
                            </div>
                        </div>

                </div>
                               
               
                <div class="col-lg-3 col-md-6 col-sm-12 order-3 order-lg-3">
                    @include('inc.home-right-sidebar')
                </div>
            </div>
        </div>
    </section>
     
<!--     <div id="particles-js" style="height: 0;"></div> -->
</div>

@include('inc.footer')