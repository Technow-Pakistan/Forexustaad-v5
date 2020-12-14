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
                                <h4>Market reviews Euro/Dollar, Dollar Yen and more</h4>
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
                                   The yen retreated against its major peers on Tuesday, as risk appetite was relatively positive and trading was quiet, which reduced appetite for the safe haven currency.
                               </p>
                              
                               <p>
                                   Dollar / yen managed to surpass 104; a level that served as resistance in previous sessions as positive sentiment about the greenback continued. Two developments helped the greenback the previous day. First of all, the Markit manufacturing PMI for October came in at 53.2 versus 51.5 expected – the highest in 12 months. Secondly, Chicago Fed President Charles Evans said he expected 3 rate hikes from now until the end of 2017, which was in line with other recent Fed speakers that called for tighter policy. On the other hand, James Bullard of the St Louis Fed said that only one interest rate hike is necessary for now and that low interest rates will likely be the norm during the next two to three years.
                               </p>
                               
                               <p>
                                   Euro / dollar from its part was holding above its lows around 1.0860 by trading at 1.0880. The euro was supported by the previous day’s Markit flash PMI reports that showed the Eurozone economy doing well. The euro also posted gains against the yen by reaching 113.60 compared to Friday’s low of 112.60. Euro / pound was marginally below 0.89.
                               </p>
                                 
                               <p>
                                   The Canadian dollar was volatile as the US dollar strengthened to a 7-month high of 1.3396 versus the loonie in late US trading. Then, a speech by the Bank of Canada Governor Stephen Poloz seemed to indicate that the Bank would refrain from adding more stimulus to the economy, by saying one should wait during for the next “18 months”. The loonie strengthened back to 1.3276, only to weaken again to 1.3361 as the Governor clarified that his comments were not about monetary policy but rather about the economy’s output gap (a measure of how quickly the economy is growing compared to its potential growth rate). Failure by the EU to ratify its free trade agreement with Canada has also been weighing on the loonie lately.
                               </p>
                               
                               <p>
                                   Looking ahead, the German IFO business survey will be closely watched for signs that it matches the optimism displayed in yesterday’s Markit surveys. IFO business climate is expected to hold steady at 109.5. Later in the day during the US session, Consumer Confidence for October by the Conference Board is expected to dip compared to the previous month’s 9-year high. ECB Chief Mario Draghi will also give a speech after the European close.
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