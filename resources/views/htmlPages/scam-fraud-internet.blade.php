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
                                            <h4>New type of Scam or fraud enter in internet market</h4>
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
                                            <h4>
                                                Assalam U Alaikum dear Friends,
                                            </h4>
                                            <br>
                                            <p>
                                                Today I’m going to Alert you new type of scam, This is not very new but it’s new in Pakistan. pleas watch video and get all information about this Fraud or scam and also share with your friends
                                            </p>
                                            
                                            <div>
                                                <img src="{{URL::to('/public/assets/assets/img/blog-post/cash.jpg')}}" class="img-fluid">
                                            </div>
                                            <h3>
                                                Urdu :
                                            </h3>
                                            
                                            <p>
                                                Ajj mein app logo ko ek Pakistan me start ho ny waly new scam ky bary me batany ja raha ho, ye bohat zarori hai kio ky new scam start howa hai to bohat zyda log es me phas sakty hai. so app logo video watch karo and bad me facebook par es video ko share karo ta ky ye fraud kisi ky sath na ho saky . Thank you
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