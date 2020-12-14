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
                                <h4>How to use Metatrader 4 full training in urdu Part 2</h4>
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
                                <h3 class="text-center">
                                    How to use Metatrader 4 full training in Pakistan (Urdu) Part 2
                                </h3>
                                
                                <p>
                                    In this webinar you learn about Meta-Trader 4 (MT4) with full detail , I’m sure if you watch this Video then you never face any problem to using MT4.  pleas note this is part 2 of Metatrader 4 , if you not watch our fist part about MT4 then click on Metatrader 4 training part 1  but if watch fist time our video then you must start from beginning , you must watch our fist webinar about basic of forex trading , What is Forex Trading  I’m sure then you under stand what is MT4 and what is his use. all info step by step I write blow what you learn in this video training.
                                </p>
                                
                                <div>
                                    <ul>
                                    <li>What is Time frame and why it’s so imported  ?</li>
                                    <li>How to change Change language</li>
                                    <li>Login and logout account / Delete</li>
                                    <li>How to Market watch</li>
                                    <li>Add symbols / Delete symbols</li>
                                    <li>Open new charts with in 5 way</li>
                                    <li>How to mange Window menus and charts properties</li>
                                    <li>How to Open and closing orders</li>
                                    <li>How to Modifying orders</li>
                                    <li>How to Watch account history</li>
                                    <li>How to enter Pending orders</li>
                                    <li>How to set Trailing stop</li>
                                    <li>How to watch Profit display</li>
                                    <li>How to draw Objects line</li>
                                    <li>How to add indicators</li>
                                    <li>How to Make Template</li>
                                    <li>How to mange profiles</li>

                                </ul>
                                </div>
                                <br>
                                <p>
                                    Its very simple to use metatrader but some point is very imported like Time frame, market watch, charts reading, Objects lines, some imported how to  add indicators, How to Make Template and how to set Trailing stop. pleas watch video if you want learn all these thing
                                </p>
                                
                                <div>
                                    <iframe width="100%" height="315" src="https://www.youtube.com/embed/iHncnJ2LM60" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
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