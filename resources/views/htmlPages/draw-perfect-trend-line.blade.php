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
                                <h4>How to draw a perfect trend-line</h4>
                            </div>
                            <div class="post_representor">
                                <ul class="">
                                    <li><i class="far fa-user"></i> Raheel Nawaz</li>
                                    <li><i class="far fa-clock"></i> September 2, 2015</li>
                                </ul>
                                <div id="shareLink" align="right"></div>
                            </div>
                            
                            <div class="pt-4">
                                <strong>
                                    <h3 class="text-center">
                                        it’s only for Forex Fun, how to draw a perfect trend-line
                                    </h3>
                                </strong>
                                <h5 class="text-center">
                                    pleas don’t try at home , its only forex fun , we want to make fun at our weekend so if you have Forex Trading funny staff like that then share with use we post with your name , Thank you
                                </h5>
                                <br><br>
                                <div class="text-center">
                                    <img src="{{URL::to('/public/assets/assets/img/blog-post/forex-fun.jpg')}}" class="img-fluid">
                                </div>
                                

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