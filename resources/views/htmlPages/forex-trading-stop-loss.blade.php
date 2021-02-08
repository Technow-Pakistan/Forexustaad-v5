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
                                <h4>Forex Trading without stop loss</h4>
                            </div>
                            <div class="post_representor">
                                <ul class="">
                                    <li><i class="fa fa-user"></i> Raheel Nawaz</li>
                                    <li><i class="fa fa-clock-o"></i> September 2, 2015</li>
                                    <li><i class="fa fa-folder"></i> Jobs scams, Scams</li>
                                    <li><i class="fa fa-comments"></i> 10 Comments </li>
                                    <li><i class="fa fa-eye"></i> 4,276 Views</li>
                                </ul>
                            </div>
                            
                            <div class="pt-4">
                                <p>
                                    Forex Trading karty time Stop loss zaror set kya karo warna app ka be ye he hall ho ga jo es bandy ky sath howa hai. account wast and pata nai kya kya . so think about it
                                </p>
                                
                                <div class="text-center">
                                    <img src="{{URL::to('/public/assets/assets/img/blog-post/Forex-without-stop-los.jpg')}}">
                                </div>
                                
                                <p>
                                    <strong>Share this post on your Wall with your friends</strong>
                                </p>
                                
                                
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