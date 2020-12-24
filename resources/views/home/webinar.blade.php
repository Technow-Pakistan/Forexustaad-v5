@include ('inc/header')
    <!-- /.End of tricker -->
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
                    <div class="row">
                  		<div class="col-sm-12">
                    		<div class="news_us">
                        		<div class="content_area_heading large-heading text-center">
                            
                            		<h1 class="heading_title wow animated fadeInUp">
                               			Our Webinars
                            		</h1>
                            		<div class="heading_border wow animated fadeInUp">
                                		<span class="one"></span><span class="two"></span><span class="three"></span>
                            		</div>
                        		</div>
                    		</div>
                        </div>
                            @php $j=0 @endphp
                        @foreach($totalData as $data)
                            <div class="visibleoptions col-md-12 col-sm-12 col-xs-12 m-t-30 p-a-10">
                                <div class="row">
                                    <div class="col-md-3 col-sm-3 col-xs-12 text-align-center border-r-grey p-a-15">
                                        
                                        <div class="text-center">
                                            <span>
                                                <i class="fa fa-calendar" aria-hidden="true"></i>
                                            </span><br>
                                            <span class="dateText">
                                                @php
                                                    $dateData = date_create($data->date);
                                                    $date  = date_format($dateData,"d M");
                                                    $counterDate  = date_format($dateData,"M d, Y");
                                                    $timeData = date_create($data->time);
                                                    $time  = date_format($timeData,"H:i A");
                                                    $countertime  = date_format($timeData,"H:i:s");
                                                    $counter = $counterDate . " " . $countertime;
                                                @endphp
                                                {{$date}}<br>
                                                {{$time}}
                                                <br>

                                                </span>
                                        </div>
                                    </div>
                                    <div class="col-md-6 col-sm-6 col-xs-12 text-align-c768 border-r-grey">
                                        <div class="form-group ">

                                                <h5 class="color-red" style="">{{$data->title}}</h5>

                                                <span>
                                                    <i class="fa fa-user"></i>
                                                    {{$data->nameOfPerson}}

                                                    , {{$data->event}}

                                                    </span><br><br>
                                            <div id="demo{{$j}}" class="demo"></div>
                                        </div>

                                    </div>
                                    
                                    <div class="col-md-3 col-sm-12 col-xs-12 text-align-center">
                                        <div class="form-group">
                                            <p align="center" class="buttonRight">
                                                <a href="{{$data->link}}" class="btn btn-primary radial text-center p-2" target="_blank">Register</a>
                                            </p>
                                        </div>

                                    </div>
                                  
                                </div>

                            </div>
<script>
    // Set the date we're counting down to
    var countDownDate{{$j}} = new Date("{{$counter}}").getTime();

    // Update the count down every 1 second
    var x{{$j}} = setInterval(function() {

      // Get today's date and time
      var now{{$j}} = new Date().getTime();

      // Find the distance between now and the count down date
      var distance{{$j}} = countDownDate{{$j}} - now{{$j}};

      // Time calculations for days, hours, minutes and seconds
      var days{{$j}} = Math.floor(distance{{$j}} / (1000 * 60 * 60 * 24));
      var hours{{$j}} = Math.floor((distance{{$j}} % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      var minutes{{$j}} = Math.floor((distance{{$j}} % (1000 * 60 * 60)) / (1000 * 60));
      var seconds{{$j}} = Math.floor((distance{{$j}} % (1000 * 60)) / 1000);

      // Output the result in an element with id="demo"
      document.getElementById("demo{{$j}}").innerHTML = "<div class='row'><div class='col-md-3 text-center'> D <br>" + days{{$j}} + "</div><div class='col-md-3 text-center'> H <br>" + hours{{$j}}
      + "</div><div class='col-md-3 text-center'> M <br>" + minutes{{$j}} + "</div><div class='col-md-3 text-center'> S <br>" + seconds{{$j}} + "</div></div>";

      // If the count down is over, write some text
      if (distance{{$j}} < 0) {
        clearInterval(x{{$j}});
        document.getElementById("demo{{$j}}").innerHTML = "EXPIRED";
      }
    }, 1000);
</script>
@php $j++ @endphp
                        @endforeach
                                              </div>



                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 order-3 order-lg-3">
                    @include ('inc/home-right-sidebar')
                </div>
            </div>
        </div>
    </section>
</div>

@include ('inc/footer')
<style>
    .radial{
        background-image: linear-gradient(45deg, #ff0024, #0d5fe9);
    }
    .demo {
      text-align: center;
      font-size: 20px;
    }
    .buttonRight{  
      margin-top: 45px;
    }
    .color-red {
    color: #CD0511;
}
    </style>