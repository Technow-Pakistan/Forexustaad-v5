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
                                <h4>what is Candlestick Strategy in urdu/Hindi part 1</h4>
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
                                    Technical analysis is an observation of combination of chart patterns, Candlestick formations and indicators. Together with chart patterns, candlestick formations can give traders the indication of next movements of the markets, this one is very helpful and useful for traders, I use this strategy and earn many pips .
                                </p>
                               
                                <h5 class="text-center">
                                    <strong>
                                        First we start from Basics of Candlestick
                                    </strong>
                                </h5>
                                <div>
                                    <ul>
                                    <h3><li>What is Candlestick</li></h3>
                                    <ul>
                                        <li>This is only a Forex Trading strategy , in candlestick strategy  have many different  patterns Like :</li>
                                        <ul>
                                            <li>Hammer</li>
                                            <li>Shooting star</li>
                                            <li>Pin bar</li>
                                            <li>Bullish engulfing</li>
                                        </ul>
                                    </ul>
                                    <h3><li>What is Bullish</li></h3>
                                    <ul>
                                        <li>Forex Trader who believe that a stock price will increase over time are said to be bullish. Trader who buy calls are bullish</li>
                                    </ul>
                                    <h3><li>What is Bearish</li></h3>
                                    <ul>
                                        <li>Forex Trader who believe that a stock price will decline are said to be bearish</li>
                                    </ul>
                                </ul>
                                </div>
                                <p>
                                    <strong>
                                    In this webinar I will cover the candlestick basics as well as most important bullish and bearish reversal patterns
                                </strong>
                                </p>
                                
                                <div>
                                    <ul>
                                    <h2>
                                        <li>Bullish Reversals</li>
                                    </h2>
                                    <h2>
                                        <li>Bearish Reversals</li>
                                    </h2>
                                </ul>
                                </div>
                                
                                <h3 class="text-center">
                                    This video locked, Pleas click on Like button for unlock and watch this video
                                </h3>
                                <br>
                                <div>
                                    <iframe width="100%" height="315" src="https://www.youtube.com/embed/pmL632FYHfc" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                </div>
                                <br>
                                <h6 class="text-center">
                                    Learn and share this post with your friends and also write below your e mail address for new updates
                                </h6>
                                
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