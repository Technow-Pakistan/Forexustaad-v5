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
                                <h4>School’boy made $72million from Forex Trading on his lunch breaks</h4>
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
                                    This is news of the Year 2014 A School Boy make $72 Million From Forex Trading on his school lunch break,
                                </p>
                               
                                <p>
                                    He is Muslim and his name is Muhammad Islam , He start Forex Trading at the age of nine and He earn 72 Million Dollar at the age of 17 year. He trades stocks at on his Lunch breaks at New York Stuyvesant High school, Now he plan to earn $1 BN with his friends , we wish him best luck and also pray for him
                                </p>
                                
                                <div>
                                    <ul>
                                    <li>Mohammed Islam, 17, started dabbling in penny stocks at the age of nine</li>
                                    <li>He trades stocks on lunch breaks at New York’s Stuyvesant High School</li>
                                    <li>Has made 8-figures trading – rumored to be as much as $72 million</li>
                                    <li>Has bought BMW and Manhattan apartment</li>
                                    <li>He cites his inspiration as billionaire hedge finder Paul Tudor Jones, 60</li>
                                    <li>Mohammed’s parents are immigrants from Bengal region of South Asia</li>
                                    <li>Student hopes to start hedge fund next year and make $1 bn with friends</li>
                                    <li>On his Instamatic profile, he has written: ‘More money, less problems’</li>
                                </ul>
                                </div>
                                <br><br>
                                <div class="text-center">
                                    <img src="{{URL::to('/public/assets/assets/img/blog-post/17-year-old-boy-become-multi-millionair-17-in-urdu.jpg')}}">
                                </div>
                                <br>
                                
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