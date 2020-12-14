@include ('inc/header')
        <!-- Content Area -->

        <div class="content_area">
    <section class="after_banner_content_area">
        <div class="container">
            <div class="row justify-content-center">
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
                <div class="col-lg-3 col-md-6 col-sm-12 order-2 order-lg-1">
                    @include('inc.home-left-sidebar')
                </div>
                <div class="col-lg-6 col-md-12 order-1 order-lg-2">
                    

                    <div class="family">
                            <div>
                                <h4>How can Draw Support and Resistance on chart In Urdu</h4>
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
                                Hay Friends
                                
                                <p>
                                    Today I share with you Support and Resistance information, before I told you, What is Support and What is Resistance and how it work on forex trading and also how can we get profit from Support and Resistance. I would like to tell you benefits of Support and Resistance. Support and Resistance is zigzag lines , these line we draw on chart and analysis market, I’m doing forex trading since 2011 and I earned number of pips from drawing Support and Resistance on my chart, it is very simple and also 100% useful magic.
                                </p>
                                <br>
                                <h3>
                                    <strong>
                                        What is Support and Resistance :-
                                    </strong>
                                </h3>
                                <p>
                                    Support and Resistance only lines pattern. We draw lines on chart and make a zigzag pattern and This pattern indicate us about market next movement and market points , these points help us to set our Take Profit and stop loss . I draw diagram image below for example. I will very helpful for you InshaAllah.
                                </p>
                                
                                <div class="text-center">
                                    <img src="{{URL::to('/public/assets/assets/img/blog-post/resistance-and-support-in-urdu.jpg')}}" class="img-fluid">
                                </div>
                                
                                <p>
                                    Look at the diagram image above. As you can see diagram image, this zigzag pattern is making its way up (bull market). When the forex market moves up and then pulls back, the highest point reached before it pulled back is now resistance.
                                </p>
                                
                                <p>
                                    As the market continues up again, the lowest point reached before it started back is now support. In this way, resistance and support are continually formed as the forex market oscillates over time. The reverse is true for the down trend
                                </p>.
                                
                                <h4 class="text-center">
                                    How can Draw Support and Resistance on chart In Urdu
                                </h4>
                                <div>
                                    <iframe frameborder="0" width="100%" height="370" src="https://www.dailymotion.com/embed/video/x242e8x" allowfullscreen allow="autoplay"></iframe>
                                </div>
                                                                <p>
                                    <strong>
                                    For more information or any problem feel free to contact us..
                                </strong>
                                </p>
                                
                                <div>
                                    <ul>
                                    <li>Contact: Raheel Nawaz Jutt</li>
                                    <li>24/7 Live Support</li>
                                    <li>GTalk: Raheeljutt@gmail.com</li>
                                    <li> Skype: raheel6542380</li>
                                    <li> Cell #:   +92-345-6542380 (SmS fist then Call)</li>
                                    <li>Follow me on Twitter</li>
                                    <li>Find me on Facebook</li>
                                    <li>Circle me on Google+</li>
                                    <li>Subscribe to me On Youtube</li>

                                </ul>
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