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
                               			Fundamental History
                            		</h1>
                            		<div class="heading_border wow animated fadeInUp">
                                		<span class="one"></span><span class="two"></span><span class="three"></span>
                            		</div>
                        		</div>
                    		</div>
                        </div>
                        @foreach($Fundamental as $data)
                            @php
                                $url = str_replace(" ","-",$data->title);
                                $admin = $data->GetAdminMember();
                            @endphp
                                <div class=" col-sm-12 col-md-6 bg-light">
                                    <div class="wow animated fadeInUp mt-1">
                                        <div class="container-fluid ">
                                            <div class="row">
                                                <div class="col-sm-12 ">
                                                    <div class="media">
                                                        <img class="mr-3" src="{{URL::to('storage/app')}}/{{$data->image}}" width="100px" height="75px">
                                                        <div class="media-body">
                                                            <p class="date date56 m-0 font-bold">{{$data->created_at->format('M d, Y')}}</p>
                                                            <h6 class="m-0 font-bold"><a href="{{URL::to('/fundamental')}}/{{$url}}">{{$data->title}}</a></h6>
                                                            <p class="m-0 nameby">{{$admin->username}}</p>
                                                        </div>
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


@include ('inc/footer')
<style>
    .date56{
        font-size: 12px;
        text-transform: uppercase;
        color: #ff0024;
    }
</style>