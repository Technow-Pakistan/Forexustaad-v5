@include('inc.header')
<!-- Content Area -->
<div class="content_area">
   <section class="after_banner_content_area">
      <div class="container">
         <div class="row justify-content-center">
            <div class="col-lg-3 col-md-6 col-sm-12 order-2 order-lg-1">
               @include('inc.home-left-sidebar')
            </div>
			<div class="col-lg-9 col-md-12 order-1 order-lg-2">
                  <div class="row">
                      <div class="col-md-8">
                        @if($MidBannerHomeActive)
                            <div class="mb-5">
                                <a href="{{$MidBannerHomeActive->link}}" target="_blank">
                                    <img src="{{URL::to('storage/app')}}/{{$MidBannerHomeActive->image}}" width="100%">
                                  </a>
                            </div>
                        @endif
                        <div class="news_us">
                            <div class="content_area_heading large-heading text-center">

                                <h1 class="heading_title wow animated fadeInUp">
                                    {{$broker1->title}} Trainning
                                </h1>
                                <div class="heading_border wow animated fadeInUp">
                                    <span class="one"></span><span class="two"></span><span class="three"></span>
                                </div>
                            </div>
                        </div>
                        <!-- <h4 class="text-center mt-5">
                            Advance Trainning
                        </h4> -->
                        <div class="card rounded-lg shadow-lg">
                            <div class="card-header pre-header">
                                <div class="d-flex justify-content-between">
                                    <div>
                                        <p class="h5 p-3">
                                            Training: {{$training->title}}
                                        </p>
                                    </div>
                                    <div>

                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><i class="fa fa-file-video-o" aria-hidden="true"></i> Video</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false"><i class="fa fa-book" aria-hidden="true"></i> Reading</a>
                                    </li>
                                </ul>
                                <div class="tab-content" id="myTabContent">
                                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                        <div class="video-iframe pt-3">
                                            @php echo $training->embed @endphp
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                        <div class="pt-3">
                                            <h4>Links or text related to video</h1><br>
                                            @php
                                                $Description = html_entity_decode($training->description);
                                                echo $Description;
                                                $countId = 0;
                                            @endphp
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="row analysis" style="margin-top: 0; margin-bottom:0;">
                            <div class="pre-header mb-2 w-100">
                                <div class="p-4">
                                    <h5 class="text-white"> Training: {{$training->title}}</h5>
                                </div>
                            </div>
                            <div class="force-overflow" id="force-overflow">
                              @foreach($Trainings as $data)
                                @php
                                    $countId++;
                                  $title = str_replace(' ','-',$data->title);
                                  $img12 = $data->embed;
                                  $img123 = explode ("/",$img12);
                                  if(isset($img123[4])){
                                    $img1234 = explode (" ",$img123[4]);
                                    $img12345 = strlen($img1234[0]);
                                    $img123456 = substr($img1234[0],0,--$img12345);
                                  }else{
                                    $img123456 = null;
                                  }
                                @endphp
                                <a href="{{URL::to('/broker/training'). '/' . $title}}">
                                  <div class="col-sm-12 pl-3 {{$training->id == $data->id ? 'activeVideo pre-header' : ''}}" id="{{$training->id == $data->id ? 'activeVideo' : ''}}">
                                      <div class="media">
                                          <p class="mt-4 mr-2">{{$countId}}. </p>
                                        <img class="mr-3 BorderNone" src="http://i.ytimg.com/vi/{{$img123456}}/hqdefault.jpg" alt="Generic placeholder image">
                                        <div class="media-body">
                                          <h6 class="m-0 text-{{$training->id == $data->id ? 'white' : 'primary'}}">{{$data->title}}</h6>
                                        </div>
                                      </div>
                                  </div>
                                </a>
                              @endforeach
                            </div>
                        </div>
                      </div>
                  </div>
                  <div class="row mt-5">
                      <div class="col-md-8">
                      </div>
                      <div class="col-md-4">
                        @include('inc.home-right-sidebar')
                      </div>
                  </div>


			</div>


         </div>
      </div>
   </section>

</div>
@include('inc.footer')

<script>
  var elmnt = document.getElementById("activeVideo");
  var elmnt1 = document.getElementById("force-overflow");
  elmnt.scrollIntoView();
  var der1 =  elmnt1.scrollTop;
  var der2 =  elmnt1.scrollHeight;
  var der = der2 - der1;
  if(der >= 600){
  	elmnt1.scrollBy(0, -170);
  }
</script>

<style>
		.pre-header {
    		background-image: linear-gradient(45deg, #ff0024, #0d5fe9);
    		color: white;
		}
		@media all and (min-width: 992px) {
			.navbar .nav-item .dropdown-menu{  display:block; opacity: 0;  visibility: hidden; transition:.3s; margin-top:0;  }
			.navbar .nav-item:hover .nav-link{ color: #fff;  }
			.navbar .dropdown-menu.fade-down{ top:80%; transform: rotateX(-75deg); transform-origin: 0% 0%; }
			.navbar .dropdown-menu.fade-up{ top:180%;  }
			.navbar .nav-item:hover .dropdown-menu{ transition: .3s; opacity:1; visibility:visible; top:100%; transform: rotateX(0deg); }
		}
	.dropdown-toggle::after {
		display:none;
	}
	.dropdown-menu{
		right: 0!important;
		left: auto;

	}
	.nav-tabs {
		margin-bottom: 25px;
	}
	.video-iframe iframe{
		width:100%;
	}
</style>
