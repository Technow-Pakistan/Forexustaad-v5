@php
	if(Session::has('client')){
    $value =Session::get('client');
  }
@endphp
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
                                            {{$category == "Habbit" ? '50 ' . $category : $category}} Trainning
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
                                        @php
                                            if($nextLecture != null){
                                                $nextTitle = str_replace(' ','-',$nextLecture->title);
                                            }
                                            if($lastLecture != null){
                                                $lastTitle = str_replace(' ','-',$lastLecture->title);
                                            }
                                        @endphp
                                        <p class="h5 p-3">
                                            Lecture {{$lecture->poistion}}: {{$lecture->title}}
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
                                            @if($lecture->status == 0)
                                                @if($category == "Advance"  && $lecture->poistion != 1 && $value['memberType'] != 3)
                                                    @if($commentAllow != null)
                                                        @php
                                                            $date3 = $commentAllow->created_at;
                                                            $date4 = date('Y-m-d H:i:s', strtotime($date3 . ' +24 hours '));
                                                            $date5 = date('Y-m-d H:i:s');
                                                        @endphp
                                                        @if($date4 <= $date5)
                                                            @php echo $lecture->embed @endphp
                                                        @else
                                                            <p>Please! wait for 24 Hours.</p>
                                                        @endif
                                                    @else
                                                        <p>Please submit your previous home work first.</p>
                                                    @endif
                                                @else
                                                    @php echo $lecture->embed @endphp
                                                @endif
                                            @else
                                             <p>This lecture has been delete contact to administrator.</p>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                        <div class="pt-3">
                                            <h4>Links or text related to video</h1><br>
                                            @if($lecture->status == 0)
                                                @if($category == "Advance" && $lecture->poistion != 1 &&$value['memberType'] != 3)
                                                    @if($commentAllow != null)
                                                        @php
                                                            $date3 = $commentAllow->created_at;
                                                            $date4 = date('Y-m-d H:i:s', strtotime($date3 . ' +24 hours '));
                                                            $date5 = date('Y-m-d H:i:s');
                                                        @endphp
                                                        @if($date4 <= $date5)
                                                            @php
                                                                $Description = html_entity_decode($lecture->description);
                                                                echo $Description;
                                                            @endphp
                                                        @else
                                                            <p>Please! wait for 24 Hours.</p>
                                                        @endif
                                                    @else
                                                        <p>Please submit your previous home work first.</p>
                                                    @endif
                                                @else
                                                    @php
                                                        $Description = html_entity_decode($lecture->description);
                                                        echo $Description;
                                                    @endphp
                                                @endif
                                            @else
                                                <p>This lecture has been delete contact to administrator.</p>
                                            @endif

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
                                    <h5 class="text-white"> Lecture {{$lecture->poistion}}: {{$lecture->title}}</h5>
                                </div>
                            </div>
                            <div class="force-overflow" id="force-overflow">
                              @foreach($Lectures as $data)
                                @php
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
                                @php $icountData = 10;  @endphp
                                @if($category == "Advance")
                                  @if($data->vipMember == 1 && $value['memberType'] == 1)
                                    <div class="contentLock">
                                      <div class="content-overlay"></div>
                                      <div>
                                        <a href="#!">
                                          <div class="col-sm-12 pl-3 {{$lecture->id == $data->id ? 'activeVideo pre-header' : ''}}" id="{{$lecture->id == $data->id ? 'activeVideo' : ''}}">
                                            <div class="media">
                                                <p class="mt-4 mr-2">{{$data->poistion}}. </p>
                                                @if($data->thumbnail == null)
                                                  <img class="mr-3 BorderNone" src="http://i.ytimg.com/vi/{{$img123456}}/hqdefault.jpg" alt="Generic placeholder image">
                                                @else
                                                  <img class="mr-3 BorderNone" src="{{URL::to('')}}/{{$data->thumbnail}}" alt="Generic placeholder image">
                                                @endif
                                              <div class="media-body">
                                                <h6 class="m-0 text-{{$lecture->id == $data->id ? 'white' : 'primary'}}">{{$data->title}}</h6>
                                              </div>
                                            </div>
                                          </div>
                                        </a>
                                      </div>
                                      <div class="content-details fadeIn-left">
                                        <a href="{{URL::to('user-registration')}}" class="btn btn-primary btn-radial"><i class="fa fa-lock"></i> Become VIP First</a>
                                      </div>
                                    </div>
                                    @php $icountData = 20;  @endphp
                                  @endif
                                @endif
                                @if($icountData == 10)
                                  <a href="{{URL::to('/'). '/' .  $category . '/' . $title}}">
                                    <div class="col-sm-12 pl-3 {{$lecture->id == $data->id ? 'activeVideo pre-header' : ''}}" id="{{$lecture->id == $data->id ? 'activeVideo' : ''}}">
                                        <div class="media">
                                            <p class="mt-4 mr-2">{{$data->poistion}}. </p>
                                          <img class="mr-3 BorderNone" src="http://i.ytimg.com/vi/{{$img123456}}/hqdefault.jpg" alt="Generic placeholder image">
                                          <div class="media-body">
                                            <h6 class="m-0 text-{{$lecture->id == $data->id ? 'white' : 'primary'}}">{{$data->title}}</h6>
                                          </div>
                                        </div>
                                    </div>
                                  </a>
                                @endif
                              @endforeach
                            </div>
                        </div>
                      </div>
                  </div>
                  <div class="row mt-5">
                      <div class="col-md-8">
                        @if(count($SponoserAddActive) > 0)
                          <section class="features">
                            <div class="container">
                              <div class="content_area_heading large-heading text-center">

                                <h1 class="heading_title wow animated fadeInUp">
                                  Sponsers Ads
                                </h1>
                                <div class="heading_border wow animated fadeInUp">
                                  <span class="one"></span><span class="two"></span><span class="three"></span>
                                </div>
                              </div>
                              <div class="row justify-content-center">
                                  @foreach($SponoserAddActive as $sponoserAdd)
                                    <div class="col-xl-4 col-lg-6 col-md-7 col-sm-8 col-12 h-100 mb-3">
                                      <a href="{{$sponoserAdd->link}}" target="_blank">
                                        <img src="{{URL::to('storage/app')}}/{{$sponoserAdd->image}}" width="300" height="100">
                                      </a>
                                    </div>
                                  @endforeach
                              </div>
                            </div>
                          </section>
                        @endif
                        @php $go23 = 0; @endphp
                        @if($category == "Advance"  && $lecture->poistion != 1)
                          @if($commentAllow != null)
                            @php
                                $go23 = 1;
                                $date3 = $commentAllow->created_at;
                                $date4 = date('Y-m-d H:i:s', strtotime($date3 . ' +24 hours '));
                                $date5 = date('Y-m-d H:i:s');
                            @endphp
                            @if($date4 <= $date5)
                              @php $go23 = 0; @endphp
                            @endif
                          @else
                            @php $go23 = 1; @endphp
                          @endif
                        @endif
                        @if($go23 == 0)
                          @php 
                            if($category == "Basic"){
                              $commentPage = 5;
                            }elseif($category == "Advance"){
                              $commentPage = 6;
                            }elseif($category == "Habbit"){
                              $commentPage = 7;
                            }
                          @endphp
                          @include('comments.comment',['commentObjectId'=>$lecture->id,'commentPage'=>$commentPage])
				                @endif
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
    /* contentLock style start */

      .contentLock {
        position: relative;
        width: 90%;
        max-width: 400px;
        overflow: hidden;
      }

      .contentLock .content-overlay {
        background: rgba(0,0,0,0.7);
        position: absolute;
        height: 99%;
        width: 100%;
        left: 0;
        top: 0;
        bottom: 0;
        right: 0;
        opacity: 0;
        -webkit-transition: all 0.4s ease-in-out 0s;
        -moz-transition: all 0.4s ease-in-out 0s;
        transition: all 0.4s ease-in-out 0s;
      }

      .contentLock:hover .content-overlay{
        opacity: 0.5;
      }

      .content-image{
        width: 100%;
      }

      .content-details {
        position: absolute;
        text-align: center;
        padding-left: 1em;
        padding-right: 1em;
        width: 100%;
        top: 50%;
        left: 50%;
        opacity: 0;
        -webkit-transform: translate(-50%, -50%);
        -moz-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
        -webkit-transition: all 0.3s ease-in-out 0s;
        -moz-transition: all 0.3s ease-in-out 0s;
        transition: all 0.3s ease-in-out 0s;
      }

      .contentLock:hover .content-details{
        top: 50%;
        left: 50%;
        opacity: 1;
      }

      .content-details h3{
        color: #fff;
        font-weight: 500;
        letter-spacing: 0.15em;
        margin-bottom: 0.5em;
        text-transform: uppercase;
      }

      .content-details p{
        color: #fff;
        font-size: 0.8em;
      }

      .fadeIn-left{
        left: 20%;
      }
    /* contentLock style end */
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
@if($go23 == 0)
  @php 
    if($category == "Basic"){
      $commentPage = 5;
    }elseif($category == "Advance"){
      $commentPage = 6;
    }elseif($category == "Habbit"){
      $commentPage = 7;
    }
  @endphp
  @include('comments.css_js',['commentObjectId'=>$lecture->id,'commentPage'=>$commentPage])
@endif