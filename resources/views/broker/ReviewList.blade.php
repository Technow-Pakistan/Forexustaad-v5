@include ('inc/header')
<!-- Content are -->
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
                    @include ('inc/home-left-sidebar')
                </div>
                <div class="col-lg-6 col-md-12 order-1 order-lg-2">
                  	<div class="row ">
                  		<div class="col-sm-12">
                    		<div class="news_us">
                        		<div class="content_area_heading large-heading text-center">
                            
                            		<h1 class="heading_title wow animated fadeInUp">
                               			Our Reviews
                            		</h1>
                            		<div class="heading_border wow animated fadeInUp">
                                		<span class="one"></span><span class="two"></span><span class="three"></span>
                            		</div>
                        		</div>
                    		</div>
                        </div>
                        @foreach($totalData as $data)
                            @php
                                $ReviewTitle = str_replace(" ","-",$data->ReviewTitle);
                            @endphp
                            <div class=" col-sm-12 col-md-6 bg-light">
                                <div class="wow animated fadeInUp mt-1">
                                    <div class="re_img w-100 p-4">
                                        <a href="{{URL::to('/brokerList/brokerReview/ReviewDetail')}}/{{$ReviewTitle}}">
                                            <img src="{{URL::to('/storage/app')}}/{{$data->image}}" >               
                                        </a>
                                    </div>
                                    <div class="container-fluid ">
                                        <div class="row">
                                            <div class="col-sm-12 ">
                                                
                                                <div class="new_description-details">
                                                    <h6>
                                                        <a href="{{URL::to('/brokerList/brokerReview/ReviewDetail')}}/{{$ReviewTitle}}">
                                                            {{$data->ReviewTitle}}
                                                        </a>
                                                    </h6>
                                                    <p>
                                                        {{$data->shortDescription}}
                                                    </p>
                                                
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                        	
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 order-3 order-lg-3">
                    @include ('inc/home-right-sidebar')
                </div>
        </div>
    </section>
</div>
                   
                 
                 @include ('inc/footer')