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
                    @if($MidBannerHomeActive)
                        <div class="mb-5">
                            <a href="{{$MidBannerHomeActive->link}}" target="_blank">
                                <img src="{{URL::to('storage/app')}}/{{$MidBannerHomeActive->image}}" width="100%">
                              </a>
                        </div>
                    @endif
                  	<div class="row ">
                  		<div class="col-sm-12">
                    		<div class="news_us">
                        		<div class="content_area_heading large-heading text-center">

                            		<h1 class="heading_title wow animated fadeInUp">
                               			Our Promotion
                            		</h1>
                            		<div class="heading_border wow animated fadeInUp">
                                		<span class="one"></span><span class="two"></span><span class="three"></span>
                            		</div>
                        		</div>
                    		</div>
                        </div>
                        @foreach($totalData as $data)
                            @php
                                $PromotionTitle = str_replace(" ","-",$data->PromotionTitle);
                            @endphp
                            <div class=" col-sm-12 col-md-6 bg-light">
                                <div class="wow animated fadeInUp mt-1">
                                    <div class="re_img w-100 p-4">
                                        <a href="{{URL::to('PromotionDetail')}}/{{$PromotionTitle}}">
                                            <img src="{{URL::to('/storage/app')}}/{{$data->image}}" >
                                        </a>
                                    </div>
                                    <div class="container-fluid ">
                                        <div class="row">
                                            <div class="col-sm-12 ">

                                                <div class="new_description-details">
                                                    <h6>
                                                        <a href="{{URL::to('PromotionDetail')}}/{{$PromotionTitle}}">
                                                            {{$data->PromotionTitle}}
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
