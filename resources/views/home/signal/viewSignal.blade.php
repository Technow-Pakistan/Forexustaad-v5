@include('inc.header')

        <!-- Content Area -->
        <div class="content_area">
    <section class="after_banner_content_area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-3 col-md-6 col-sm-12 order-2 order-lg-1">
                    @include('inc.home-left-sidebar')
                </div>
                <div class="col-lg-6 col-md-12 order-1 order-lg-2 {{$blur == 1 ? 'blur' : '' }}">
                    @if($MidBannerHomeActive)
                        <div class="mb-5">
                            <a href="{{$MidBannerHomeActive->link}}" target="_blank">
                                <img src="{{URL::to('storage/app')}}/{{$MidBannerHomeActive->image}}" width="100%">
                              </a>
                        </div>
                    @endif
                    {{-- Counter Start --}}
                    <div id="clockdiv" class="text-center mb-3">
                        <div>
                            <span class="days"></span>
                            <div class="smalltext">Days</div>
                        </div>
                        <div>
                            <span class="hours"></span>
                            <div class="smalltext">Hours</div>
                        </div>
                        <div>
                            <span class="minutes"></span>
                            <div class="smalltext">Minutes</div>
                        </div>
                        <div>
                            <span class="seconds"></span>
                            <div class="smalltext">Seconds</div>
                        </div>
                    </div>
                    {{-- Counter End --}}
                    <div class="">
                        <div class="">
                          @php
                            $pair = $signalData->getPair();
                            $flags = explode("/",$pair->pair);
                          @endphp
                              <div class="row gutters-sm">
                                <div class="col-md-4 mb-3">
                                  <div class="card">
                                    <div class="card-body">
                                      <div class="d-flex flex-column align-items-center text-center">
									  		<div>
                        @if($pair->image == null)
                          @foreach($flags as $flag)
                            @php $flag4 = str_replace(' ', '', $flag) @endphp
                              <img src="{{URL::to('storage/app/signalFlag')}}/{{$flag4}}.jpg" width="50" height="35" alt=""> &nbsp;&nbsp;
                          @endforeach
                        @else
                          <img src="{{URL::to('storage/app')}}/{{$pair->image}}" width="100" height="35"  alt="">
                        @endif
											</div>
                                        <div class="mt-3">
                                          <h4>{{$pair->pair}}</h4>
                                          <p class="text-secondary mb-1">{{$signalData->selectUser}}</p>
                                        </div>
                                        <div>
                                            @php
                                                $clientLikeshow = 0;
                                                if (Session::has('client')) {
                                                    $value = Session::get('client');
                                                    $clientLike = App\Models\SignalLikeModel::where('signalId',$signalData->id)->where('userId',$value['id'])->first();
                                                    if ($clientLike) {
                                                        $clientLikeshow = 1;
                                                    }
                                                }
                                            @endphp
                                            (<span class="totalLiked text-primary">{{count($TotalLikes)}}</span>)
                                            <span class="likeForm likeForm1 {{!Session::has('client') ? "LoginButton" : ''}} {{$clientLikeshow == 1 ? ($clientLike->liked == 1 ? 'text-primary' :'') : '' }}" text="{{$clientLikeshow == 1 ? ($clientLike->liked == 1 ? 'text-primary' :'') : ''  }}" value="1" {{!Session::has('client') ? "data-toggle=modal data-target=#requestQuoteModal" : ''}}> <i class="fa fa-thumbs-up"></i> </span>
                                            (<span class="totalDisliked text-danger">{{count($TotalDislikes)}}</span>)
                                            <span class="likeForm disLikeForm1 {{!Session::has('client') ? "LoginButton" : ''}} {{$clientLikeshow == 1 ? ($clientLike->liked == 0 ? 'text-danger' :'') : ''  }}" text="{{$clientLikeshow == 1 ? ($clientLike->liked == 0 ? 'text-danger' :'') : ''  }}" value="0" {{!Session::has('client') ? "data-toggle=modal data-target=#requestQuoteModal" : ''}}><i class="fa fa-thumbs-up" style="transform: rotate(174deg);"></i></span>
                                        </div>
                                        <div id="shareLink"></div>
                                        @php $SignalRatingPoints = $signalData->GetRatingPoints(); @endphp
                                        <fieldset class="rating1">
                                          <input type="radio" name="rating1" value="5" {{ $SignalRatingPoints == 5 ? 'checked' : '' }}/><i class="fa fa-star full" for="star5" title="Awesome - 5 stars"></i>
                                          <input type="radio" name="rating1" value="4.5"  {{ $SignalRatingPoints == 4.5 ? 'checked' : '' }}/><i class="fa fa-star half" for="star4half" title="Pretty good - 4.5 stars"></i>
                                          <input type="radio" name="rating1" value="4"  {{ $SignalRatingPoints == 4 ? 'checked' : '' }}/><i class = "fa fa-star full" for="star4" title="Pretty good - 4 stars"></i>
                                          <input type="radio" name="rating1" value="3.5"  {{ $SignalRatingPoints == 3.5 ? 'checked' : '' }}/><i class="fa fa-star half" for="star3half" title="Meh - 3.5 stars"></i>
                                          <input type="radio" name="rating1" value="3"  {{ $SignalRatingPoints == 3 ? 'checked' : '' }}/><i class = "fa fa-star full" for="star3" title="Meh - 3 stars"></i>
                                          <input type="radio" name="rating1" value="2.5"  {{ $SignalRatingPoints == 2.5 ? 'checked' : '' }}/><i class="fa fa-star half" for="star2half" title="Kinda bad - 2.5 stars"></i>
                                          <input type="radio" name="rating1" value="2"  {{ $SignalRatingPoints == 2 ? 'checked' : '' }}/><i class = "fa fa-star full" for="star2" title="Kinda bad - 2 stars"></i>
                                          <input type="radio" name="rating1" value="1.5"  {{ $SignalRatingPoints == 1.5 ? 'checked' : '' }}/><i class="fa fa-star half" for="star1half" title="Meh - 1.5 stars"></i>
                                          <input type="radio" name="rating1" value="1"  {{ $SignalRatingPoints == 1 ? 'checked' : '' }}/><i class = "fa fa-star full" for="star1" title="Sucks big time - 1 star"></i>
                                          <input type="radio" name="rating1" value="0.5"  {{ $SignalRatingPoints == 0.5 ? 'checked' : '' }}/><i class="fa fa-star half" for="starhalf" title="Sucks big time - 0.5 stars"></i>
                                        </fieldset>
                                      </div>
                                    </div>
                                  </div>
                                  @if(Session::has('client'))
                                    <div class="card mt-3">
                                      <div class="card">
                                          <div class="card-header">
                                              Your Rating
                                          </div>
                                          <div class="card-body">
                                            @php 
                                              $clientData = Session::get('client');
                                              $userId   = $clientData['id'];
                                              $UserSignalRatingPoints = $signalData->GetUSerRatingPoints($userId); 
                                            @endphp
                                            <fieldset class="rating">
                                              <input type="radio" id="star5" name="rating" value="5" {{ $UserSignalRatingPoints == 5 ? 'checked' : '' }}/><i class="fa fa-star full ratingPick" for="star5" title="Awesome - 5 stars"></i>
                                              <input type="radio" id="star4half" name="rating" value="4.5" {{ $UserSignalRatingPoints == 4.5 ? 'checked' : '' }}/><i class="fa fa-star half ratingPick" for="star4half" title="Pretty good - 4.5 stars"></i>
                                              <input type="radio" id="star4" name="rating" value="4" {{ $UserSignalRatingPoints == 4 ? 'checked' : '' }}/><i class = "fa fa-star full ratingPick" for="star4" title="Pretty good - 4 stars"></i>
                                              <input type="radio" id="star3half" name="rating" value="3.5" {{ $UserSignalRatingPoints == 3.5 ? 'checked' : '' }}/><i class="fa fa-star half ratingPick" for="star3half" title="Meh - 3.5 stars"></i>
                                              <input type="radio" id="star3" name="rating" value="3" {{ $UserSignalRatingPoints == 3 ? 'checked' : '' }}/><i class = "fa fa-star full ratingPick" for="star3" title="Meh - 3 stars"></i>
                                              <input type="radio" id="star2half" name="rating" value="2.5" {{ $UserSignalRatingPoints == 2.5 ? 'checked' : '' }}/><i class="fa fa-star half ratingPick" for="star2half" title="Kinda bad - 2.5 stars"></i>
                                              <input type="radio" id="star2" name="rating" value="2" {{ $UserSignalRatingPoints == 2 ? 'checked' : '' }}/><i class = "fa fa-star full ratingPick" for="star2" title="Kinda bad - 2 stars"></i>
                                              <input type="radio" id="star1half" name="rating" value="1.5" {{ $UserSignalRatingPoints == 1.5 ? 'checked' : '' }}/><i class="fa fa-star half ratingPick" for="star1half" title="Meh - 1.5 stars"></i>
                                              <input type="radio" id="star1" name="rating" value="1" {{ $UserSignalRatingPoints == 1 ? 'checked' : '' }}/><i class = "fa fa-star full ratingPick" for="star1" title="Sucks big time - 1 star"></i>
                                              <input type="radio" id="starhalf" name="rating" value="0.5" {{ $UserSignalRatingPoints == 0.5 ? 'checked' : '' }}/><i class="fa fa-star half ratingPick" for="starhalf" title="Sucks big time - 0.5 stars"></i>
                                            </fieldset>
                                          </div>
                                      </div>
                                    </div>
                                  @endif
                                            @php
                                              $Profits = explode('@',$signalData->takeProfit);
                                              $profit = array_shift($Profits);
                                              $mobiles = explode('@#',$signalData->addMobile);
                                              array_shift($mobiles);
                                              $socials = explode('@#',$signalData->social);
                                              $socialLinks = explode('@#',$signalData->socialLink);
                                            @endphp
                                  <div class="card mt-3">

                                    <div class="card">
                                        <div class="card-header">
                                            Reviews
                                        </div>
                                        <div class="card-body">
                                            {{$signalData->comments}}
                                        </div>
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-8">
                                  <div class="card mb-3">
                                    <div class="card-body">
                                        @if($signalData->orderType != null)
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <h6 class="mb-0">Order Type</h6>
                                                </div>
                                                <div class="col-sm-8 text-secondary fontBold">
                                                    {{$signalData->orderType}}
                                                </div>
                                            </div>
                                            <hr>
                                        @endif
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <h6 class="mb-0">Order</h6>
                                            </div>
                                            <div class="col-sm-8 text-{{stripos($signalData->buySale,'Sell') !== false ? 'danger' : 'primary'}} fontBold">
                                                {{$signalData->buySale}}
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <h6 class="mb-0">Price</h6>
                                            </div>
                                            <div class="col-sm-8 text-secondary fontBold">
                                                {{$signalData->price}}
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <h6 class="mb-0  pt-2">Take Profit 1</h6>
                                            </div>
                                            <div class="col-sm-8 text-secondary fontBold">
                                                <span class="text-primary">{{$profit}}</span>
                                            </div>
                                            @for($i=0; $i < count($Profits); $i++)
                                                <div class="col-sm-4">
                                                    <h6 class="mb-0  pt-2">Take Profit {{$i + 2}}</h6>
                                                </div>
                                                <div class="col-sm-8 text-secondary fontBold">
                                                    <span class="text-primary">{{$Profits[$i]}}</span>
                                                </div>
                                            @endfor
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <h6 class="mb-0">Stop Lose</h6>
                                            </div>
                                            <div class="col-sm-8 text-secondary fontBold">
                                                <span class="text-danger">{{$signalData->stopLose}}</span>
                                            </div>
                                        </div>
                                        <hr>
                                        @if($signalData->result != null && $signalData->result != 'none')
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <h6 class="mb-0">Result</h6>
                                                </div>
                                                <div class="col-sm-8 {{$signalData->result == 'TP Hit' ? 'text-success' : ''}}{{strpos($signalData->result,'TP Hit') != null ? 'text-success' : ''}}{{$signalData->result == 'SL Hit' ? 'text-danger' : ''}} fontBold">
                                                    {{$signalData->result == null ? 'none' : $signalData->result}}
                                                </div>
                                            </div>
                                            <hr>
                                        @endif
                                        @if($signalData->pips != null)
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <h6 class="mb-0">Pips</h6>
                                                </div>
                                                <div class="col-sm-8 {{strpos($signalData->pips,'+') != null ? 'text-success' : ''}}{{strpos($signalData->pips,'-') ? 'text-danger' : ''}} fontBold">
                                                    {{$signalData->pips == null ? 'none' : $signalData->pips}}
                                                </div>
                                            </div>
                                            <hr>
                                        @endif
                                        @if($signalApiData)
                                          @if($signalData->result == null && $signalData->pips == null)
                                              <div class="row">
                                                <div class="col-sm-4">
                                                  <h6 class="mb-0">Current Market Price</h6>
                                                </div>
                                                <div class="col-sm-8 fontBold">
                                                  {{$signalApiData->price}}
                                                </div>
                                              </div>
                                              <hr>
                                              <div class="row">
                                                <div class="col-sm-4">
                                                  <h6 class="mb-0">Current Market Opening Price</h6>
                                                </div>
                                                <div class="col-sm-8 fontBold">
                                                  {{$signalApiData->opening_price}}
                                                </div>
                                              </div>
                                              <hr>
                                              <div class="row">
                                                <div class="col-sm-4">
                                                  <h6 class="mb-0">Current Market High</h6>
                                                </div>
                                                <div class="col-sm-8 fontBold">
                                                  {{$signalApiData->high}}
                                                </div>
                                              </div>
                                              <hr>
                                              <div class="row">
                                                <div class="col-sm-4">
                                                  <h6 class="mb-0">Current Market Low</h6>
                                                </div>
                                                <div class="col-sm-8 fontBold">
                                                  {{$signalApiData->low}}
                                                </div>
                                              </div>
                                              <hr>
                                              <div class="row">
                                                <div class="col-sm-4">
                                                  <h6 class="mb-0">Our PIPs</h6>
                                                </div>
                                                <div class="col-sm-8 fontBold {{$signalApiData->pips > 0 ? 'text-primary' : 'text-danger' }}">
                                                  {{$signalApiData->pips}}
                                                </div>
                                              </div>
                                              <hr>
                                              @if($signalApiData->result != null)
                                                <div class="row">
                                                  <div class="col-sm-4">
                                                    <h6 class="mb-0">Our Current Result</h6>
                                                  </div>
                                                  <div class="col-sm-8 fontBold {{$signalApiData->result != 'SL Hit' ? 'text-primary' : 'text-danger'}} ">
                                                    {{$signalApiData->result}}
                                                  </div>
                                                </div>
                                                <hr>
                                              @endif
                                          @endif
                                        @endif
                                    </div>
                                  </div>
                                </div>
                                <div class="col-md-12">
                                  @php
                                    $detailDescription = html_entity_decode($signalData->detailDescription);
                                    echo $detailDescription;
                                  @endphp
                                </div>
                              </div>
                            </div>
                        </div>
                        @include('comments.comment',['commentObjectId'=>$signalData->id,'commentPage'=>1])
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 order-3 order-lg-3">
                  @include('inc.home-right-sidebar')
                </div>
            </div>
            @if(Session::has('error1'))
              <div class="errorModule pre-header">
                <div class="errorIcon" style="margin-left: 40%;">
                  <i class="fa fa-lock"></i>
                </div>
                <div class="errorMsg">{{Session::get('error1')}}</div>
              </div>
              @php Session::pull('error1') @endphp
            @endif
        </div>
    </section>

<!--     <div id="particles-js" style="height: 0;"></div> -->
</div>

<style>
  /* blur style start */
    .blur{
        height:110% !important;
        -webkit-filter: blur(5px); -moz-filter: blur(5px); -o-filter: blur(5px); -ms-filter: blur(5px); filter: blur(5px);
    }
  /* blur style end */
  /* error Modele style start */
    .errorModule {
      padding:15px;
      position: fixed;
      top: 50%;
      left: 45%;
      color: #fff;
    }
    @media only screen and (max-width: 800px) {
      .errorModule {
        left: 15%;
      }
    }
    .errorModule .errorIcon {
      font-size: 50px;
      margin: 15px;
    }
    .errorModule .errorMsg {
      font-size: 30px;
    }
  /* error Modele style end */
  /* Star Rating style start */
    .rating,.rating1 { 
      border: none;
      float: left;
      position:relative;
    }

    .rating > input,.rating1 > input { display: none; } 
    .rating > i:before,.rating1 > i:before { 
      margin: 5px;
      font-size: 1.25em;
    }

    .rating > .half:before,.rating1 > .half:before { 
      content: "\f089";
      position: absolute;
      top: -5px;
    }

    .rating > i,.rating1 > i { 
      color: #ddd; 
      float: right; 
    }

    /***** CSS Magic to Highlight Stars on Hover *****/

    .rating1 > input:checked ~ i, /* show gold star when clicked */
    .rating > input:checked ~ i, /* show gold star when clicked */
    .rating:not(:checked) > i:hover, /* hover current star */
    .rating:not(:checked) > i:hover ~ i { color: #FFD700;  } /* hover previous stars in list */

    .rating > input:checked + i:hover, /* hover current star when changing rating */
    .rating > input:checked ~ i:hover,
    .rating > i:hover ~ input:checked ~ i, /* lighten current selection */
    .rating > input:checked ~ i:hover ~ i { color: #FFED85;  } 
  /* Star Rating style end */
    /* counter Styling start */

    #clockdiv{
        font-family: sans-serif;
        color: #fff;
        display: inline-block;
        font-weight: 100;
        text-align: center !important;
        font-size: 30px;
        display: block;
    }

    #clockdiv > div{
        padding: 10px;
        border-radius: 3px;
        background: linear-gradient(45deg, #ff0024, #0d5fe9);;
        display: inline-block;
    }

    #clockdiv div > span{
        padding: 15px;
        border-radius: 3px;
        background: #00816A;
        display: inline-block;
    }

    .smalltext{
        padding-top: 5px;
        font-size: 16px;
    }
    /* Counter Styling end */

    .fontBold{
        font-weight: 900;
    }
    .likeForm{
        cursor: pointer;
    }
    .main-body {
        padding: 15px;
    }
    .card {
        box-shadow: 0 1px 3px 0 rgba(0,0,0,.1), 0 1px 2px 0 rgba(0,0,0,.06);
    }

    .card {
        position: relative;
        display: flex;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        border: 0 solid rgba(0,0,0,.125);
        border-radius: .25rem;
    }

    .card-body {
        flex: 1 1 auto;
        min-height: 1px;
        padding: 1rem;
    }

    .gutters-sm {
        margin-right: -8px;
        margin-left: -8px;
    }

    .gutters-sm>.col, .gutters-sm>[class*=col-] {
        padding-right: 8px;
        padding-left: 8px;
    }
    .mb-3, .my-3 {
        margin-bottom: 1rem!important;
    }

    .bg-gray-300 {
        background-color: #e2e8f0;
    }
    .h-100 {
        height: 100%!important;
    }
    .shadow-none {
        box-shadow: none!important;
    }
</style>

@include('inc.footer')
<script>
  $(".ratingPick").on("click",function(){
    var ratingPoints = $(this).attr('for');
    $("#"+ratingPoints).attr("checked",true);
    var ratingPointsValue = $("#"+ratingPoints).val();
    console.log(ratingPoints);
    var url12 = "{{URL::to('signal/UserSignalRating')}}" + "/" + "{{$signalData->id}}" + "/" + ratingPointsValue;
    console.log(url12);
      $.ajax({
          type: "Post",
          url: url12,

          success: function(response) {
              console.log("success");
          },
          error: function(data) {
              console.log("fail");
          }
      });

  })
</script>
<style>
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

{{-- Counter Script Start --}}

    @php
        $start_date = $signalData->date . " " . $signalData->time;

        // end date

        $end_date = date("Y-m-d H:i:s");

        $ss = strtotime($start_date) - strtotime($end_date);


    @endphp

<script>
    @if($ss < 0)
        $("#clockdiv").hide();
    @endif
    function getTimeRemaining(endtime) {
        var t = Date.parse(endtime) - Date.parse(new Date());
        var seconds = Math.floor((t / 1000) % 60);
        var minutes = Math.floor((t / 1000 / 60) % 60);
        var hours = Math.floor((t / (1000 * 60 * 60)) % 24);
        var days = Math.floor(t / (1000 * 60 * 60 * 24));
        return {
            'total': t,
            'days': days,
            'hours': hours,
            'minutes': minutes,
            'seconds': seconds
        };
    }

    function initializeClock(id, endtime) {
        var clock = document.getElementById(id);
        var daysSpan = clock.querySelector('.days');
        var hoursSpan = clock.querySelector('.hours');
        var minutesSpan = clock.querySelector('.minutes');
        var secondsSpan = clock.querySelector('.seconds');

        function updateClock() {
            var t = getTimeRemaining(endtime);

            daysSpan.innerHTML = t.days;
            hoursSpan.innerHTML = ('0' + t.hours).slice(-2);
            minutesSpan.innerHTML = ('0' + t.minutes).slice(-2);
            secondsSpan.innerHTML = ('0' + t.seconds).slice(-2);

            if (t.total <= 0) {
                clearInterval(timeinterval);
            }
        }

        updateClock();
        var timeinterval = setInterval(updateClock, 1000);
    }

    var deadline = new Date(Date.parse(new Date()) + {{$ss}} * 1000);
    initializeClock('clockdiv', deadline);

</script>
{{-- Counter Script End --}}
@include('comments.css_js',['commentObjectId'=>$signalData->id,'commentPage'=>1])
<script data-ad-client="ca-pub-4965167409528757" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
