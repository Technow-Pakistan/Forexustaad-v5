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
                                            <h4>Advance Forex Trading Plan</h4>
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
                                                Friends Today we talk about Advance Forex Trading Plan in Pakistan, if you doing Forex Trading and you still doing loss from many years then you come right place , before we start talking about Forex trading plan you must know what is Forex Trading, if you don’t know what is Forex trading then you go back and read my old post, so Fist step is you must know what is advance Forex trading plan ?
                                            </p>
                                            
                                            <h2 class="text-center">
                                                <strong>What is Advance Trading Plan ?</strong>
                                            </h2>
                                            
                                            <p>
                                                Today we talk about Forex Trading plan. Make sure you have Forex Trading plan before you start Forex Trading. In below Image I try to share with you a Advance Forex Trading plan. This is our plan but you make your Forex trading plan
                                            </p>
                                            
                                            <div class="text-center">
                                                <img src="{{URL::to('/public/assets/assets/img/blog-post/Advance-forex-Trading-plan.jpg')}}" class="img-fluid">
                                            </div>
                                            <h4 class="pt-5 font-weight-bold">
                                                What is Trading Plan
                                            </h4>
                                            <ol>
                                                <li>Trading Method </li>
                                                <li>Money Management</li>
                                                <li>My Goals</li>
                                                <li>My Weaknesses</li>
                                                <li>My Rules</li>
                                                <li>My Routine</li>
                                            </ol>
                                            <h4 class="font-weight-bold">
                                                Trading Method
                                            </h4>
                                            <ol>
                                                <li>The Pairs You Trade:</li>
                                                <ul>
                                                    <li>EUR/USD, GBP/USD, AUD/USD, NZD/USD, USD/CAD, USD/JPY, EUR/JPY, GBP/JPY, AUD/JPY, & Gold.</li>
                                                </ul>
                                                <li>Time frame :</li>
                                                <ul>
                                                    <li>4 Hours and daily</li>
                                                </ul>
                                                <li>
                                                    Type of Analysis :
                                                </li>
                                                <ul>
                                                    <li>Candlestick analysis, Support and Resistance lines analysis</li>
                                                </ul>
                                                <li>Indicators :</li>
                                                <ul>
                                                    <li>RSI , MacD, Zigzag</li>
                                                </ul>
                                            </ol>
                                           
                                            <p>
                                                Since the very first day, many of us had a idea to start trading with a shared account. By Trading with a shared account, it is not for the purpose of making a shared profit for each of us, but for the charity purpose. Each of us had our own accounts, but apart of that we also wanted to have a shared account to trade our trade setups, grow it and use all the profit for the charitable purposes.
                                            </p>
                                            
                                            <p>
                                                That was A great idea, but there was a question about what would be the size of this account. Some of us wanted it to be a large account, but some of the others don’t agreed on the large account. Finally we all get settled on $1000 account for the beginning, just to see how it will be. So we opened a $1000 account and started Forex trading with it using our shared trade setups. The account show great progress of $100,000 in 14 months. That was a huge achievement, not because of we turned $1000 into $100,000, but because of the lessons we learned from this experiment.
                                            </p>
                                            
                                            <h3 class="text-center">
                                                Advance Forex Trading Plan part 1
                                            </h3>
                                            <br>
                                            <iframe width="100%" height="315" src="https://www.youtube.com/embed/jwY4nu1lmJ4" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                            
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