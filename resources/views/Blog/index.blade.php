@include ('inc/header')
<!-- Content are -->
<div class="content_area">
    <section class="after_banner_content_area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-3 col-md-6 col-sm-12 order-2 order-lg-1">
                    @include ('inc/home-left-sidebar')
                </div>
                <div class="col-lg-6 col-md-12 order-1 order-lg-2">
                  	<div class="row ">
                  		<div class="col-sm-12">
                    		<div class="news_us">
                        		<div class="content_area_heading large-heading text-center">
                            
                            		<h1 class="heading_title wow animated fadeInUp">
                               			Our Blog Posts
                            		</h1>
                            		<div class="heading_border wow animated fadeInUp">
                                		<span class="one"></span><span class="two"></span><span class="three"></span>
                            		</div>
                        		</div>
                    		</div>
                        </div>
                        @foreach($BlogData as $data)
                            <div class=" col-sm-12 col-md-6 bg-light">
                                <div class="wow animated fadeInUp mt-1">
                                    <div class="re_img w-100 p-4">
                                        <a href="{{URL::to('Blog')}}/{{$data->permalink}}">
                                            <img src="{{URL::to('/storage/app')}}/{{$data->image}}" >               
                                        </a>
                                    </div>
                                    <div class="container-fluid ">
                                        <div class="row">
                                            <div class="col-sm-12 ">
                                                
                                                <div class="new_description-details">
                                                    <h6>
                                                        <a href="{{URL::to('Blog')}}/{{$data->permalink}}">
                                                            {{$data->mainTitle}}
                                                        </a>
                                                    </h6>
                                                    <p>
                                                        {{$data->description}}
                                                    </p>
                                                
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                			<div class="col-sm-12 col-md-6 bg-light">
                			<div class="wow animated fadeInUp mt-1">
                			     <div class="re_img w-100 p-4 ">
                                    <a href="forexustaad-weekly-lucky-draw.html">
                                        <img src="{{URL::to('/public/assets/assets/img/blog-post/raheel-nawaz-lucky-.jpg')}}">
                                    </a>
                                </div>
                                <div class="container-fluid ">
                                    <div class="row">
                                        <div class="col-sm-12 ">
                                            
                                            <div class="new_description-details">
                                            <h6>
                                                <a href="forexustaad-weekly-lucky-draw.html">
                                                    
                                                    ForexUstaad Weekly Lucky Draw
                                                </a>
                                            </h6>
                                            <p>
                                               Forexustaad Lucky Draws promotion is going to be promoted by Mr Raheel Nawaz on 21/11/2016 as an incentive to encourage the local Forex
                                            </p>
                                            
                                        </div>
                                            </div>

                                        </div>
                                    </div>
                			</div>
                			</div>
                            <div class="col-sm-12 col-md-6 bg-light">
                            <div class="wow animated fadeInUp mt-1">
                                 <div class="re_img w-100 p-4">
                                    <a href="fundamental-analysis-us-presidential-election-2016.html">
                                        <img src="{{URL::to('/public/assets/assets/img/blog-post/trump.jpg')}}">
                                    </a>
                                </div>
                                <div class="container-fluid ">
                                    <div class="row">
                                        <div class="col-sm-12 ">
                                            
                                            <div class="new_description-details">
                                            <h6>
                                                <a href="fundamental-analysis-us-presidential-election-2016.html">
                                                    
                                                    Fundamental Analysis about US Presidential Election 2016
                                                </a>
                                            </h6>
                                            <p>
                                               Finally today is US Election Day, the day to decide the result of the battle which was started on the media almost a year back. Media has already made the mind of people that Mrs. Clinton
                                            </p>
                                            
                                        </div>
                                            </div>

                                        </div>
                                    </div>
                            </div>
                            </div>
                            <div class="col-sm-12 col-md-6 bg-light">
                            <div class="wow animated fadeInUp mt-1">
                                 <div class="re_img w-100 p-4">
                                    <a href="market-reviews-euro-dollar-yen.html">
                                        <img src="{{URL::to('/public/assets/assets/img/blog-post/123966-310x205.jpg')}}">
                                    </a>
                                </div>
                                <div class="container-fluid ">
                                    <div class="row">
                                        <div class="col-sm-12 ">
                                            
                                            <div class="new_description-details">
                                            <h6>
                                                <a href="market-reviews-euro-dollar-yen.html">
                                                    
                                                   Market reviews Euro/Dollar, Dollar Yen and more
                                                </a>
                                            </h6>
                                            <p>
                                               The yen retreated against its major peers on Tuesday, as risk appetite was relatively positive and trading was quiet, which

                                            </p>
                                            
                                        </div>
                                            </div>

                                        </div>
                                    </div>
                            </div>
                            </div>
                             <div class="col-sm-12 col-md-6 bg-light">
                            <div class="wow animated fadeInUp mt-1">
                                 <div class="re_img w-100 p-4">
                                    <a href="technical-analysis-trading-forex.html">
                                        <img src="{{URL::to('/public/assets/assets/img/blog-post/Forexustaad-Analisis-310x205.jpg')}}">
                                    </a>
                                </div>
                                <div class="container-fluid ">
                                    <div class="row">
                                        <div class="col-sm-12 ">
                                            
                                            <div class="new_description-details">
                                            <h6>
                                                <a href="technical-analysis-trading-forex.html">
                                                    
                                                   How To Use Technical Analysis When Trading Forex
                                                </a>
                                            </h6>
                                            <p>
                                               No matter what you’re trading analysis is important. In the world of trading, analysis is the process of using
                                                
                                            </p>
                                            
                                        </div>
                                            </div>

                                        </div>
                                    </div>
                            </div>
                            </div>
                            <div class="col-sm-12 col-md-6 bg-light">
                            <div class="wow animated fadeInUp mt-1">
                                 <div class="re_img w-100 p-4 ">
                                    <a href="azadi-real-account-contest.tml">
                                        <img src="{{URL::to('/public/assets/assets/img/blog-post/pakistan_independence-88-1-310x205.jpg')}}">
                                    </a>
                                </div>
                                <div class="container-fluid ">
                                    <div class="row">
                                        <div class="col-sm-12 ">
                                            
                                            <div class="new_description-details">
                                            <h6>
                                                <a href="azadi-real-account-contest.html">  
                                                    A Very Happy Independence Day!
                                                </a>
                                            </h6>
                                            <p>
                                               Join in the celebration of independence and freedom this August! Participate in the 2016 Azadi Real Account Contest and stand to 
                                                
                                            </p>
                                            
                                        </div>
                                            </div>

                                        </div>
                                    </div>
                            </div>
                            </div>
                            <div class="col-sm-12 col-md-6 bg-light">
                            <div class="wow animated fadeInUp mt-1">
                                 <div class="re_img w-100 p-4 ">
                                    <a href="exness-and-raheel-nawaz-is-organizing-seminar-in-gujranwala-pakistan.php">
                                        <img src="{{URL::to('/public/assets/assets/img/blog-post/original-310x205.jpg')}}">
                                    </a>
                                </div>
                                <div class="container-fluid ">
                                    <div class="row">
                                        <div class="col-sm-12 ">
                                            
                                            <div class="new_description-details">
                                            <h6>
                                                <a href="exness-and-raheel-nawaz-is-organizing-seminar-in-gujranwala-pakistan.php">  
                                                    Exness and Raheel Nawaz is organized Seminar
                                                </a>
                                            </h6>
                                            <p>
                                               No matter what you’re trading analysis is important. In the world of trading, analysis is the process of using the data that’s available
                                                
                                            </p>
                                            
                                        </div>
                                            </div>

                                        </div>
                                    </div>
                            </div>
                            </div>
                            <div class="col-sm-12 col-md-6 bg-light">
                            <div class="wow animated fadeInUp mt-1">
                                 <div class="re_img w-100 p-4">
                                    <a href="free-signals-analysis-and-news-updates.html">
                                        <img src="{{URL::to('/public/assets/assets/img/blog-post/forex-tradingsignals-300x165.png')}}">
                                    </a>
                                </div>
                                <div class="container-fluid ">
                                    <div class="row">
                                        <div class="col-sm-12 ">
                                            
                                            <div class="new_description-details">
                                            <h6>
                                                <a href="free-signals-analysis-and-news-updates.html">  
                                                    Free Signals, Analysis and news updates
                                                </a>
                                            </h6>
                                            <p>
                                               Assalam o Alaikum Dear Friends If you need Free Signals , Analysis and Market updates then sing up Now , InshaAllah you get daily and weekly updates in your e mail box
                                                
                                            </p>
                                            
                                        </div>
                                            </div>

                                        </div>
                                    </div>
                            </div>
                            </div>
                            <div class="col-sm-12 col-md-6 bg-light">
                            <div class="wow animated fadeInUp mt-1">
                                 <div class="re_img w-100 p-4">
                                    <a href="scam-fraud-internet.html">
                                        <img src="{{URL::to('/public/assets/assets/img/blog-post/Scam-alert-580-1-310x205.jpg')}}">
                                    </a>
                                </div>
                                <div class="container-fluid ">
                                    <div class="row">
                                        <div class="col-sm-12 ">
                                            
                                            <div class="new_description-details">
                                            <h6>
                                                <a href="scam-fraud-internet.html">  
                                                    New type of Scam or fraud enter in internet market
                                                </a>
                                            </h6>
                                            <p>
                                               Assalam U Alaikum dear Friends, Today I’m going to Alert you new type of scam, This is not very new but it’s new in Pakistan
                                                
                                            </p>
                                            
                                        </div>
                                            </div>

                                        </div>
                                    </div>
                            </div>
                            </div>
                            <div class="col-sm-12 col-md-6 bg-light">
                            <div class="wow animated fadeInUp mt-1">
                                 <div class="re_img w-100 p-4">
                                    <a href="flags-charts-patterns-urdu-hindi.html">
                                        <img src="{{URL::to('/public/assets/assets/img/blog-post/pakistan-flag1-310x205.jpg')}}">
                                    </a>
                                </div>
                                <div class="container-fluid ">
                                    <div class="row">
                                        <div class="col-sm-12 ">
                                            
                                            <div class="new_description-details">
                                            <h6>
                                                <a href="flags-charts-patterns-urdu-hindi.html">  
                                                    Learn free Flags charts patterns in Urdu | Hindi
                                                </a>
                                            </h6>
                                            <p>
                                               Salam o alaikum all my Dear Traders Today I’m going to teach you A free chart pattern which is called flags , It’s most popular and profitable
                                                
                                            </p>
                                            
                                        </div>
                                            </div>

                                        </div>
                                    </div>
                            </div>
                            </div>
                            <div class="col-sm-12 col-md-6 bg-light">
                            <div class="wow animated fadeInUp mt-1">
                                 <div class="re_img w-100 p-4">
                                   <a href="forex-trading-plan-july-2015.html">
                                        <img src="{{URL::to('/public/assets/assets/img/blog-post/Forex-Trading-plan1-310x205.jpg')}}">
                                   </a>
                                </div>
                                <div class="container-fluid ">
                                    <div class="row">
                                        <div class="col-sm-12 ">
                                            
                                            <div class="new_description-details">
                                            <h6>
                                                <a href="forex-trading-plan-july-2015.html">  
                                                    My Advance Forex Trading Plan on July 2015
                                                </a>
                                            </h6>
                                            <p>
                                               In this Video I will show you my Real Trading account, which I started 1st July 2015, set 25% Target and in just 10 days I got my target
                                                
                                            </p>
                                            
                                        </div>
                                            </div>

                                        </div>
                                    </div>
                            </div>
                            </div>
                            <div class="col-sm-12 col-md-6 bg-light">
                            <div class="wow animated fadeInUp mt-1">
                                 <a href="trading-story-mr-bean-its-your.html">
                                     <div class="re_img w-100 p-4">
                                 </a>
                                    <img src="{{URL::to('/public/assets/assets/img/blog-post/beam.jpg')}}">
                                </div>
                                <div class="container-fluid ">
                                    <div class="row">
                                        <div class="col-sm-12 ">
                                            
                                            <div class="new_description-details">
                                            <h6>
                                                <a href="trading-story-mr-bean-its-your.html">  
                                                    It’s not only Mr.Bean Trading story , It’s your also ……!
                                                </a>
                                            </h6>
                                            <p>
                                               Salam Friends Yu to ye Photo meiny Fun masti ky liy upload ki hai but it’s not funny it’s your story 😛 gee ha ye 99% Forex Trader ki story hai jin jinlogo ny learn kiy bagir he Forex Trading start di the aon sab ny start me Mr.Bean ki
                                                
                                            </p>
                                            
                                        </div>
                                            </div>

                                        </div>
                                    </div>
                            </div>
                            </div>
                            <div class="col-sm-12 col-md-6 bg-light">
                            <div class="wow animated fadeInUp mt-1">
                                 <div class="re_img w-100 p-4">
                                    <a href="become-successful-forex-trader.html">
                                        <img src="{{URL::to('/public/assets/assets/img/blog-post/What-is-Forex-and-How-To-Become-a-Successful-Forex-Trader-310x205.jpg')}}">
                                    </a>
                                </div>
                                <div class="container-fluid ">
                                    <div class="row">
                                        <div class="col-sm-12 ">
                                            
                                            <div class="new_description-details">
                                            <h6>
                                                <a href="become-successful-forex-trader.html">  
                                                    What is Forex and How To Become a Successful Forex Trader (Urdu/hindi)
                                                </a>
                                            </h6>
                                            <p>
                                               So far, we have talked about the Forex market, money management and candlestick signals and Trading strategy in our videos. In this video we will talk about the a pl
                                                
                                            </p>
                                            
                                        </div>
                                            </div>

                                        </div>
                                    </div>
                            </div>
                            </div>

                            <div class="col-sm-12 col-md-6 bg-light">
                            <div class="wow animated fadeInUp mt-1">
                                 <div class="re_img w-100 p-4">
                                    <a href="fundamental-analysis-forex-trading.html">
                                        <img src="{{URL::to('/public/assets/assets/img/blog-post/Fundamental-Analysis-in-urdu-310x205.jpg')}}">
                                    </a>
                                </div>
                                <div class="container-fluid ">
                                    <div class="row">
                                        <div class="col-sm-12 ">
                                            
                                            <div class="new_description-details">
                                            <h6>
                                                <a href="fundamental-analysis-forex-trading.html">  
                                                    Fundamental Analysis for Forex Trading, A Free Video for Newbie in urdu/hindi
                                                </a>
                                            </h6>
                                            <p>
                                               Dear Friends 99% traders fail and they loss all there funds in Forex trading , I know you also worry about your future in Forex Market , Yo want to answer ?? why your Stop loss hit early
                                                
                                            </p>
                                            
                                        </div>
                                            </div>

                                        </div>
                                    </div>
                            </div>
                            </div>

                            <div class="col-sm-12 col-md-6 bg-light">
                            <div class="wow animated fadeInUp mt-1">
                                 <div class="re_img w-100 p-4">
                                    <a href="forex-trading-stop-loss.html">
                                        <img src="{{URL::to('/public/assets/assets/img/blog-post/Forex-without-stop-los.jpg')}}">
                                    </a>
                                </div>
                                <div class="container-fluid ">
                                    <div class="row">
                                        <div class="col-sm-12 ">
                                            
                                            <div class="new_description-details">
                                            <h6>
                                                <a href="forex-trading-stop-loss.html">  
                                                    Forex Trading without stop loss
                                                </a>
                                            </h6>
                                            <p>
                                              Forex Trading karty time Stop loss zaror set kya karo warna app ka be ye he hall ho ga jo es bandy ky sath howa hai. account wast and patanai kya kya
                                                
                                            </p>
                                            
                                        </div>
                                            </div>

                                        </div>
                                    </div>
                            </div>
                            </div>

                            <div class="col-sm-12 col-md-6 bg-light">
                            <div class="wow animated fadeInUp mt-1">
                                 <div class="re_img w-100 p-4">
                                    <a href="best-currency-pair-to-trade.html">
                                        <img src="{{URL::to('/public/assets/assets/img/blog-post/The-Best-Currency-Pair-to-Trade-in-Forex-Market1.jpg')}}">
                                    </a>
                                </div>
                                <div class="container-fluid ">
                                    <div class="row">
                                        <div class="col-sm-12 ">
                                            
                                            <div class="new_description-details">
                                            <h6>
                                                <a href="best-currency-pair-to-trade.phpbest-currency-pair-to-trade.html">  
                                                    The Best Currency Pair to Trade in Forex Market
                                                </a>
                                            </h6>
                                            <p>
                                              In today’s post i will talk about the Best currency pairs for Forex Trading.I know some senior traders already knows what what currency pairs are best to trade. but this post is for beginners Traders Which currency pairs are best to trade traders always ask this question a lot on forums and discussion boards, But unfortunately
                                                
                                            </p>
                                            
                                        </div>
                                            </div>

                                        </div>
                                    </div>
                            </div>
                            </div>


                            <div class="col-sm-12 col-md-6 bg-light">
                            <div class="wow animated fadeInUp mt-1">
                                 <div class="re_img w-100 p-4">
                                    <a href="deposit-money-exness-pakistan.html">
                                        <img src="{{URL::to('/public/assets/assets/img/blog-post/exness-to-Pakistani-rupes.jpg')}}">
                                    </a>
                                </div>
                                <div class="container-fluid ">
                                    <div class="row">
                                        <div class="col-sm-12 ">
                                            
                                            <div class="new_description-details">
                                            <h6>
                                                <a href="deposit-money-exness-pakistan.html">  
                                                    How to Deposit and Withdraw money in exness from Pakistan
                                                </a>
                                            </h6>
                                            <p>
                                              In this Post I will teach you how to money deposit in your exness account from Pakistan via Excard. Like You want invest in PKR and also withdraw in Pak rupess then 
                                                
                                            </p>
                                            
                                        </div>
                                            </div>

                                        </div>
                                    </div>
                            </div>
                            </div>

                            <div class="col-sm-12 col-md-6 bg-light">
                            <div class="wow animated fadeInUp mt-1">
                                 <div class="re_img w-100 p-4">
                                    <a href="fundamental-analysis-webinar.html">
                                        <img src="{{URL::to('/public/assets/assets/img/blog-post/Fundamental-Analysis (1).jpg')}}">
                                    </a>
                                </div>
                                <div class="container-fluid ">
                                    <div class="row">
                                        <div class="col-sm-12 ">
                                            
                                            <div class="new_description-details">
                                            <h6>
                                                <a href="fundamental-analysis-webinar.html">  
                                                    
                                                    Fundamental Analysis,A Free webinar for Newbie in urdu/hindi
                                                </a>
                                            </h6>
                                            <p>
                                              Salam o alikom my Friends , I have an other Good news for all my ForexUstaad members, I have organize a Free webinar about Fundamental 
                                                
                                            </p>
                                            
                                        </div>
                                            </div>

                                        </div>
                                    </div>
                            </div>
                            </div>

                             <div class="col-sm-12 col-md-6 bg-light">
                            <div class="wow animated fadeInUp mt-1">
                                 <div class="re_img w-100 p-4">
                                    <a href="great-news-for-my-forex-lovers-friend.html">
                                        <img src="{{URL::to('/public/assets/assets/img/blog-post/Candlesticks.jpg')}}">
                                    </a>
                                </div>
                                <div class="container-fluid ">
                                    <div class="row">
                                        <div class="col-sm-12 ">
                                            
                                            <div class="new_description-details">
                                            <h6>
                                                <a href="great-news-for-my-forex-lovers-friend.html">  
                                                    
                                                    Great news for my Forex lovers Friends
                                                </a>
                                            </h6>
                                            <p>
                                              Salam-Alikom Meiny sab dosto ky liy Free webinar rakha hai, but ye free hai nai ye jo log mery sy training ly rahy hai aos ki class hai but aon logo ky tawon sy sab ko 
                                                
                                            </p>
                                            
                                        </div>
                                            </div>

                                        </div>
                                    </div>
                            </div>
                            </div>

                             <div class="col-sm-12 col-md-6 bg-light">
                            <div class="wow animated fadeInUp mt-1">
                                 <div class="re_img w-100 p-4">
                                    <a href="daily-time-frame-forex-trading.html">
                                        <img src="{{URL::to('/public/assets/assets/img/blog-post/FOrex-time.png')}}">
                                    </a>
                                </div>
                                <div class="container-fluid ">
                                    <div class="row">
                                        <div class="col-sm-12 ">
                                            
                                            <div class="new_description-details">
                                            <h6>
                                                <a href="daily-time-frame-forex-trading.html">  
                                                    
                                                    I Love Daily time frame for Forex Trading, Do you ?
                                                </a>
                                            </h6>
                                            <p>
                                              Beginner traders always want to know what is the best time frame for candlestick. Many platforms support different time
                                              frames from 1 minute to 1 month. Even some  of them platforms support tropical time frames  like 10 minute or 2 hours . I have published an article before
                                                
                                            </p>
                                            
                                        </div>
                                            </div>

                                        </div>
                                    </div>
                            </div>
                            </div>

                             <div class="col-sm-12 col-md-6 bg-light">
                            <div class="wow animated fadeInUp mt-1">
                                 <div class="re_img w-100 p-4">
                                    <a href="timing-is-most-important-element-in-forex-trading.html">
                                        <img src="{{URL::to('/public/assets/assets/img/blog-post/raheel-310x205.jpg')}}">
                                    </a>
                                </div>
                                <div class="container-fluid ">
                                    <div class="row">
                                        <div class="col-sm-12 ">
                                            
                                            <div class="new_description-details">
                                            <h6>
                                                <a href="timing-is-most-important-element-in-forex-trading.html">  
                                                    
                                                    Timing is most important element in Forex Trading
                                                </a>
                                            </h6>
                                            <p>
                                              The most important element in Forex Trading is Timing and Patience Patience is something my clients only learn after losing big money in Forex trading
                                                
                                            </p>
                                            
                                        </div>
                                            </div>

                                        </div>
                                    </div>
                            </div>
                            </div>

                              <div class="col-sm-12 col-md-6 bg-light">
                            <div class="wow animated fadeInUp mt-1">
                                 <div class="re_img w-100 p-4">
                                    <a href="draw-perfect-trend-line.html">
                                        <img src="{{URL::to('/public/assets/assets/img/blog-post/forex-fun.jpg')}}">
                                    </a>
                                </div>
                                <div class="container-fluid ">
                                    <div class="row">
                                        <div class="col-sm-12 ">
                                            
                                            <div class="new_description-details">
                                            <h6>
                                                <a href="draw-perfect-trend-line.html">  
                                                    
                                                    How to draw a perfect trend-line
                                                </a>
                                            </h6>
                                            <p>
                                              it’s only for Forex Fun, how to draw a perfect trend-line pleas don’t try at home , its only forex fun , we want to make fun at our weekend so if you have Forex Trading funny. staff like that then share with use wth your name  Thank you

                                                
                                            </p>

                                        </div>
                                            </div>

                                        </div>
                                    </div>
                            </div>
                            </div>


                            <div class="col-sm-12 col-md-6 bg-light">
                            <div class="wow animated fadeInUp mt-1">
                                 <div class="re_img w-100 p-4">
                                    <a href="schoolboy-made-72million-forex-trading-lunch-breaks.html">
                                        <img src="{{URL::to('/public/assets/assets/img/blog-post/17.jpg')}}">
                                    </a>
                                </div>
                                <div class="container-fluid ">
                                    <div class="row">
                                        <div class="col-sm-12 ">
                                            
                                            <div class="new_description-details">
                                            <h6>
                                                <a href="schoolboy-made-72million-forex-trading-lunch-breaks.html">  
                                                    
                                                    School’boy made $72million from Forex Trading on his lunch breaks
                                                </a>
                                            </h6>
                                            <p>
                                              This is news of the Year 2014 A School Boy make $72 Million From Forex Trading on his school lunch break, He is Muslim and his name is

                                                
                                            </p>
                                            
                                        </div>
                                            </div>

                                        </div>
                                    </div>
                            </div>
                            </div>

                                <div class="col-sm-12 col-md-6 bg-light">
                            <div class="wow animated fadeInUp mt-1">
                                 <div class="re_img w-100 p-4">
                                    <a href="learn-forex-trading-in-pakistan.html">
                                        <img src="{{URL::to('/public/assets/assets/img/blog-post/Support-and-Resistance-310x205.jpg')}}">
                                    </a>
                                </div>
                                <div class="container-fluid ">
                                    <div class="row">
                                        <div class="col-sm-12 ">
                                            
                                            <div class="new_description-details">
                                            <h6>
                                                <a href="learn-forex-trading-in-pakistan.html">  
                                                    
                                                    learn Forex Trading in Pakistan | manual support and resistance
                                                </a>
                                            </h6>
                                            <p>
                                              Friends learn Forex Trading in Pakistan now very easy because we teach you 100% free at ForexUstaad.com. Today we share with you a Forex

                                                
                                            </p>
                                            
                                        </div>
                                            </div>

                                        </div>
                                    </div>
                            </div>
                            </div>


                                <div class="col-sm-12 col-md-6 bg-light">
                            <div class="wow animated fadeInUp mt-1">
                                 <div class="re_img w-100 p-4">
                                    <a href="forex-trading-webinar-for-vips.html">
                                        <img src="{{URL::to('/public/assets/assets/img/blog-post/VIPs-310x205.jpg')}}">
                                    </a>
                                </div>
                                <div class="container-fluid ">
                                    <div class="row">
                                        <div class="col-sm-12 ">
                                            
                                            <div class="new_description-details">
                                            <h6>
                                                <a href="forex-trading-webinar-for-vips.html">  
                                                    
                                                    Forex Trading webinar for VIPs
                                                </a>
                                            </h6>
                                            <p>
                                             In this webinar you learn how to use VIPstrend Indicator and also how to menage your daily trad setup with us. This webinar is for VIPs member but also free for all my Users ,you se

                                                
                                            </p>
                                            
                                        </div>
                                            </div>

                                        </div>
                                    </div>
                            </div>
                            </div>



                                <div class="col-sm-12 col-md-6 bg-light">
                            <div class="wow animated fadeInUp mt-1">
                                 <div class="re_img w-100 p-4">
                                    <a href="forex-trading-using-moving-average-strategy.html">
                                        <img src="{{URL::to('/public/assets/assets/img/blog-post/Forex-ustad-310x205.jpg')}}">
                                    </a>
                                </div>
                                <div class="container-fluid ">
                                    <div class="row">
                                        <div class="col-sm-12 ">
                                            
                                            <div class="new_description-details">
                                            <h6>
                                                <a href="forex-trading-using-moving-average-strategy.html">  
                                                    
                                                    Forex Trading using Moving Average Strategy in urdu/Hindi
                                                </a>
                                            </h6>
                                            <p>
                                            Friends Today Mr.Hamid Teach you what is “Moving Average” and how can word this strategy to help use for earn some pips in Forex Trading, fist is very 

                                                
                                            </p>
                                            
                                        </div>
                                            </div>

                                        </div>
                                    </div>
                            </div>
                            </div>
                			 

                            <div class="col-sm-12 col-md-6 bg-light">
                            <div class="wow animated fadeInUp mt-1">
                                 <div class="re_img w-100 p-100">
                                    <a href="what-is-candlestick-strategy-in-urduhindi-part-1.html">
                                        <img src="{{URL::to('/public/assets/assets/img/blog-post/Candlesticks.jpg')}}">
                                    </a>
                                </div>
                                <div class="container-fluid ">
                                    <div class="row">
                                        <div class="col-sm-12 ">
                                            
                                            <div class="new_description-details">
                                            <h6>
                                                <a href="what-is-candlestick-strategy-in-urduhindi-part-1.html">  
                                                    
                                                    what is Candlestick Strategy in urdu/Hindi part 1
                                                </a>
                                            </h6>
                                            <p>
                                            Technical analysis is an observation of combination of chart patterns, Candlestick formations and indicators. Together with chart patterns, candlestick formation

                                                
                                            </p>
                                            
                                        </div>
                                            </div>

                                        </div>
                                    </div>
                            </div>
                            </div>


                            <div class="col-sm-12 col-md-6 bg-light">
                            <div class="wow animated fadeInUp mt-1">
                                 <div class="re_img w-100 p-4">
                                    <a href="always-trad-with-stop-loss.html">
                                        <img src="{{URL::to('/public/assets/assets/img/blog-post/Trad-with-stop-los.jpg')}}">
                                    </a>
                                </div>
                                <div class="container-fluid ">
                                    <div class="row">
                                        <div class="col-sm-12 ">
                                            
                                            <div class="new_description-details">
                                            <h6>
                                                <a href="always-trad-with-stop-loss.html">  
                                                    
                                                    Always trad with stop loss in Forex trading
                                                </a>
                                            </h6>
                                            <p>
                                            I teach in my webinar you always trad with stop loss, look at image below and get some idea, you must Always trad with Sl if you no bear wash you trading account ....

                                                
                                            </p>
                                            
                                        </div>
                                            </div>

                                        </div>
                                    </div>
                            </div>
                            </div>

                            <div class="col-sm-12 col-md-6 bg-light">
                            <div class="wow animated fadeInUp mt-1">
                                 <div class="re_img w-100 p-4">
                                    <a href="advance-forex-trading-plan.html">
                                        <img src="{{URL::to('/public/assets/assets/img/blog-post/Advance-forex-Trading-plan.jpg')}}">
                                    </a>
                                </div>
                                <div class="container-fluid ">
                                    <div class="row">
                                        <div class="col-sm-12 ">
                                            
                                            <div class="new_description-details">
                                            <h6>
                                                <a href="advance-forex-trading-plan.html">  
                                                    
                                                    Advance Forex Trading Plan
                                                </a>
                                            </h6>
                                            <p>
                                            Friends Today we talk about Advance Forex Trading Plan in Pakistan, if you doing Forex Trading and you still doing loss from many years then you come right place , before we start talking about Forex trading plan you

                                                
                                            </p>
                                            
                                        </div>
                                            </div>

                                        </div>
                                    </div>
                            </div>
                            </div>


                            <div class="col-sm-12 col-md-6 bg-light">
                            <div class="wow animated fadeInUp mt-1">
                                 <div class="re_img w-100 p-4">
                                    <a href="live-radio.html">
                                        <img src="{{URL::to('/public/assets/assets/img/blog-post/radio.jpg')}}">
                                    </a>
                                </div>
                                <div class="container-fluid ">
                                    <div class="row">
                                        <div class="col-sm-12 ">
                                            
                                            <div class="new_description-details">
                                            <h6>
                                                <a href="live-radio.html">  
                                                    
                                                    Live Radio
                                                </a>
                                            </h6>
                                            <p>
                                            Every Saturday and Sunday Live at ForexUstaad.com Raheel Nawaz 1 is on Mixlr you

                                                
                                            </p>
                                            
                                        </div>
                                            </div>

                                        </div>
                                    </div>
                            </div>
                            </div>


                            <div class="col-sm-12 col-md-6 bg-light">
                            <div class="wow animated fadeInUp mt-1">
                                 <div class="re_img w-100 p-4">
                                    <a href="how-to-use-metatrader-4-full-training-in-urdu-part-1.html">
                                        <img src="{{URL::to('/public/assets/assets/img/blog-post/forex-trading-free-webinar-news.jpg')}}">
                                    </a>
                                </div>
                                <div class="container-fluid ">
                                    <div class="row">
                                        <div class="col-sm-12 ">
                                            
                                            <div class="new_description-details">
                                            <h6>
                                                <a href="how-to-use-metatrader-4-full-training-in-urdu-part-1.html">  
                                                    
                                                    How to use Metatrader 4 full training in urdu Part 1
                                                </a>
                                            </h6>
                                            <p>
                                            You know ? What is Meta Trader and how can we use Meta Trader 4…….. Don’t worry if you don’t know about metaTrader 4 , I will teach you in this webinar about Metatrader 4 in ur

                                                
                                            </p>
                                            
                                        </div>
                                            </div>

                                        </div>
                                    </div>
                            </div>
                            </div>


                            <div class="col-sm-12 col-md-6 bg-light">
                            <div class="wow animated fadeInUp mt-1">
                                 <div class="re_img w-100 p-4">
                                    <a href="how-to-use-metatrader-4-full-training-in-urdu-part-2.html">
                                        <img src="{{URL::to('/public/assets/assets/img/blog-post/images.jpg')}}">
                                    </a>
                                </div>
                                <div class="container-fluid ">
                                    <div class="row">
                                        <div class="col-sm-12 ">
                                            
                                            <div class="new_description-details">
                                            <h6>
                                                <a href="how-to-use-metatrader-4-full-training-in-urdu-part-2.html">  
                                                    
                                                    How to use Metatrader 4 full training in urdu Part 2
                                                </a>
                                            </h6>
                                            <p>
                                            How to use Metatrader 4 full training in Pakistan (Urdu) Part 2 In this webinar you learn about Meta-Trader 4 (MT4) with full detail , I’m sure if you watch this Video  then you never face any problem to using MT4. pleas note

                                                
                                            </p>
                                            
                                        </div>
                                            </div>

                                        </div>
                                    </div>
                            </div>
                            </div>


                            <div class="col-sm-12 col-md-6 bg-light">
                            <div class="wow animated fadeInUp mt-1">
                                 <div class="re_img w-100 p-4">
                                    <a href="how-to-choose-a-forex-broker-in-urdu-webinar.html">
                                        <img src="{{URL::to('/public/assets/assets/img/blog-post/Broker-Forex.png')}}">
                                    </a>
                                </div>
                                <div class="container-fluid ">
                                    <div class="row">
                                        <div class="col-sm-12 ">
                                            
                                            <div class="new_description-details">
                                            <h6>
                                                <a href="how-to-choose-a-forex-broker-in-urdu-webinar.html">  
                                                    
                                                    How to Choose a Forex Trading Broker in urdu (webinar)
                                                </a>
                                            </h6>
                                            <p>
                                            Why Choosing Forex Broker is imported ? To Trade in Forex market you need a broker. there is no way around to choose a perfect broker, the problem is that you can not

                                                
                                            </p>
                                            
                                        </div>
                                            </div>

                                        </div>
                                    </div>
                            </div>
                            </div>


                            <div class="col-sm-12 col-md-6 bg-light">
                            <div class="wow animated fadeInUp mt-1">
                                 <div class="re_img w-100 p-4">
                                    <a href="how-to-choose-a-forex-broker-webinar-ready.html">
                                        <img src="{{URL::to('/public/assets/assets/img/blog-post/webinar.png')}}">
                                    </a>
                                </div>
                                <div class="container-fluid ">
                                    <div class="row">
                                        <div class="col-sm-12 ">
                                            
                                            <div class="new_description-details">
                                            <h6>
                                                <a href="how-to-choose-a-forex-broker-webinar-ready.html">  
                                                    
                                                    How to Choose a Forex Broker webinar ready
                                                </a>
                                            </h6>
                                            <p>
                                            In this webinar you learn how does a Forex “newbie” pick a broker? We are organize this webinar to help you to select a best broker available in the forex market You will never got information like this  before so pleas watch our video and learn much more about how to choose Broker and what  is requirements checked before joining any Forex broker market.InshaAllah this is information helped

                                                
                                            </p>
                                            
                                        </div>
                                            </div>

                                        </div>
                                    </div>
                            </div>
                            </div>


                            <div class="col-sm-12 col-md-6 bg-light">
                            <div class="wow animated fadeInUp mt-1">
                                 <div class="re_img w-100 p-4">
                                    <a href="what-is-forex-trading-in-urdu-webinar.html">
                                        <img src="{{URL::to('/public/assets/assets/img/blog-post/What-is-Forex-310x205.jpg')}}">
                                    </a>
                                </div>
                                <div class="container-fluid ">
                                    <div class="row">
                                        <div class="col-sm-12 ">
                                            
                                            <div class="new_description-details">
                                            <h6>
                                                <a href="what-is-forex-trading-in-urdu-webinar.html">  
                                                    
                                                    
                                                    What is Forex Trading in Urdu (webinar)
                                                </a>
                                            </h6>
                                            <p>
                                            Salam o alikom Dear friends Today webinar is Totally about Forex trading and it’s full with information about Forex trading, in this video you find your all question Like What is Fore

                                                
                                            </p>
                                            
                                        </div>
                                            </div>

                                        </div>
                                    </div>
                            </div>
                            </div>



                            <div class="col-sm-12 col-md-6 bg-light">
                            <div class="wow animated fadeInUp mt-1">
                                 <div class="re_img w-100 p-4">
                                    <a href="support-and-resistance-chart.html">
                                        <img src="{{URL::to('/public/assets/assets/img/blog-post/Support-and-resistance-in-urdu-310x205.jpg')}}">
                                    </a>
                                </div>
                                <div class="container-fluid ">
                                    <div class="row">
                                        <div class="col-sm-12 ">
                                            
                                            <div class="new_description-details">
                                            <h6>
                                                <a href="support-and-resistance-chart.html">  
                                                    
                                                    
                                                    How can Draw Support and Resistance on chart In Urdu
                                                </a>
                                            </h6>
                                            <p>
                                            Hay Friends Today I share with you Support and Resistance information, before I told you, What is Support and What is Resistance and hx.

                                                
                                            </p>
                                            
                                        </div>
                                            </div>

                                        </div>
                                    </div>
                            </div>
                            </div>

                            <div class="col-sm-12 col-md-6 bg-light">
                            <div class="wow animated fadeInUp mt-1">
                                 <div class="re_img w-100 p-4">
                                    <a href="pinbar-candlestick-strategies.html">
                                        <img src="{{URL::to('/public/assets/assets/img/blog-post/1-pin-bar-patterns-290x195.jpg')}}">
                                    </a>
                                </div>
                                <div class="container-fluid ">
                                    <div class="row">
                                        <div class="col-sm-12 ">
                                            
                                            <div class="new_description-details">
                                            <h6>
                                                <a href="pinbar-candlestick-strategies.html">  
                                                    
                                                    
                                                    Pinbar candlestick strategies in urdu
                                                </a>
                                            </h6>
                                            <p>
                                                Hay Friends, Today I share with you a Pinbar strategy. It is very useful strategy and I have earned number of pips by using this strategy, So I Decided to share with

                                                
                                            </p>
                                            
                                        </div>
                                            </div>

                                        </div>
                                    </div>
                            </div>
                            </div>

                            <div class="col-sm-12 col-md-6 bg-light">
                            <div class="wow animated fadeInUp mt-1">
                                 <div class="re_img w-100 p-4">
                                    <a href="free-forexustaad-pro-indicator.html">
                                        <img src="{{URL::to('/public/assets/assets/img/blog-post/forex-ge-290x195.jpg')}}">
                                    </a>
                                </div>
                                <div class="container-fluid ">
                                    <div class="row">
                                        <div class="col-sm-12 ">
                                            
                                            <div class="new_description-details">
                                            <h6>
                                                <a href="free-forexustaad-pro-indicator.html">  
                                                    
                                                    
                                                    Free indicator for Forex | Forexustaad-pro indicator
                                                </a>
                                            </h6>
                                            <p>
                                                Hey Friends, Today 14 August, 2014 is independence day of Pakistan. As I promised with you that I teach you free about forex trading. I’m very happy to

                                                
                                            </p>
                                            
                                        </div>
                                            </div>

                                        </div>
                                    </div>
                            </div>
                            </div>


                            <div class="col-sm-12 col-md-6 bg-light">
                            <div class="wow animated fadeInUp mt-1">
                                 <div class="re_img w-100 p-4">
                                    <a href="what-is-forex-trading.html">
                                        <img src="{{URL::to('/public/assets/assets/img/blog-post/forex-ge-290x195.jpg')}}">
                                    </a>
                                </div>
                                <div class="container-fluid ">
                                    <div class="row">
                                        <div class="col-sm-12 ">
                                            
                                            <div class="new_description-details">
                                            <h6>
                                                <a href="what-is-forex-trading.html">  
                                                    
                                                    
                                                    What is forex trading
                                                </a>
                                            </h6>
                                            <p>
                                                What is forex ? Forex stands for “FOReign EXcange” it’s also called as FX.

                                                
                                            </p>
                                            
                                        </div>
                                            </div>

                                        </div>
                                    </div>
                            </div>
                            </div>


                		</div>

                		
                	</div>
                  	           
               
                <div class="col-lg-3 col-md-6 col-sm-12 order-3 order-lg-3">
                    @include ('inc/home-right-sidebar')
                </div>
        </div>
    </section>
  

@include ('inc/footer')