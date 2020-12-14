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
                                <h4>Live Radio</h4>
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
                                <h2 class="text-center">
                                    Every Saturday and Sunday Live at ForexUstaad.com
                                </h2>
                                
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