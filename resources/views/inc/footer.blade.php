<style>
  
  @media (max-width: 991px){
      .scroll-tbl table:not(.curr_list) {
         min-width: 100%;
      }
   }
  .countChatBoxUnRead{
    position:absolute;
    top:2px;
    font-size:12px;
    left:107px;
    color:white;
    background:black;
    padding:0px 4px;
    border-radius:50%;
  }
</style>
		<!--==============================-->
		<!--=====      Chat Box      =====-->
    <!--==============================-->
    @if(Session::has('client'))
      <section class="chatbox js-chatbox">
          <div class="chatbox__header">
            <h3 class="chatbox__header-cta-text pt-2"><span class="chatbox__header-cta-icon"><i class="fas fa-comments"></i></span>Let's chat</h3>
              @php 
                $value = Session::get('client');
                $ClientChatMessagesData = App\Models\ChatBoxModel::where('userId',$value['id'])->get();
                if(count($ClientChatMessagesData) > 0){
                  $ClientChatMessagesDataUnRead =  count($ClientChatMessagesData[0]->GetTotalUnReadAM());
                  if($ClientChatMessagesDataUnRead == 0){
                    $ClientChatMessagesDataUnRead = "";
                  }
                }else{
                  $ClientChatMessagesDataUnRead = "";
                }
              @endphp
            <span class="countChatBoxUnRead" id="blink1">{{$ClientChatMessagesDataUnRead}}</span>
            <button class="js-chatbox-toggle chatbox__header-cta-btn u-btn btn"><i class="fas fa-chevron-up"></i></button>
          </div>
          <!-- End of .chatbox__header -->
          <div class="js-chatbox-display chatbox__display" id="chatbox__display">
              @foreach($ClientChatMessagesData as $chatMsg)
                @php
                  if($value['image'] == null){
                    $srcImage = URL::to('/public/assets/assets/img/user1.jpg') ;
                  }else{
                    $srcImage = URL::to('/storage/app/') . "/" . $value['image'];
                  }
                @endphp
                @if($chatMsg->userType == 2)
                  <div class="d-flex">
                      <img class="media-object img-radius mr-2" src="{{URL::to('/public/assets/assets/img/favicon.png')}}" alt="">
                      <p class="chatbox__display-chat mt-1">{{$chatMsg->message}} </p>
                  </div>
                @elseif($chatMsg->userType == 1)
                  <div class="d-flex justify-content-end">
                      <p class="chatbox__display-chat mt-1">{{$chatMsg->message}}</p>
                      <img class="media-object img-radius ml-2" src="{{$srcImage}}" alt="">
                  </div>
                @endif
              @endforeach
          </div>
          <!-- End of .chatbox__display -->
          <form class="js-chatbox-form chatbox__form">
            <input type="text" class="js-chatbox-input chatbox__form-input" placeholder="Type your message..." required>
            <button class="chatbox__form-submit u-btn btn"><i class="fas fa-paper-plane"></i></button>
          </form>
          <!-- End of .chatbox__form -->
      </section>
    @endif
		<!--==============================-->
		     <!--=     Toast     =-->
    <!--==============================-->

    <audio id ="NotificationSound" src="{{URL::to('public/assets/Sounds/notification.mp3')}}" loop="" style="display:none"></audio>

    <div id="snackbar"><i class="fa  fa-exclamation-triangle"></i> &nbsp; Please LogIn First</div>
    <div id="snackbar1"><i class="fa fa-exclamation-triangle"></i> &nbsp; Become VIP First</div>
    <div id="snackbar2"></div>
    <div id="snackbar3"></div>
    <script>
        function snackbar() {
          var x = document.getElementById("snackbar");
          x.className = "show";
          setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
        }
        function snackbar1() {
          var x = document.getElementById("snackbar1");
          x.className = "show";
          setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
        }
        function snackbar2() {
          var x = document.getElementById("snackbar2");
          x.className = "show";
          setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
        }
        function snackbar3() {
          var x = document.getElementById("snackbar3");
          x.className = "show bg-success";
          setTimeout(function(){ x.className = x.className.replace("show", ""); }, 3000);
        }
    </script>
                    @if(Session::has('error'))
                      @php
                        $error =Session::get('error');
                      @endphp
                      <script>
                        var data = "{{$error}}";
                        var x = document.getElementById("snackbar2");
                          x.innerHTML = "<i class='fa fa-exclamation-triangle'></i> &nbsp; " + data;
                          snackbar2();
                      </script>
                      @php Session::pull('error') @endphp
                    @endif

                    @if(Session::has('success'))
                      @php
                        $success =Session::get('success');
                      @endphp
                      <script>
                          var data1 = "{{$success}}";
                          var x = document.getElementById("snackbar3");
                            x.innerHTML = "<i class='fa fa-check-square-o'></i> &nbsp; " + data1;
                            snackbar3();
                      </script>
                        @php Session::pull('success') @endphp
                    @endif
    <!--==============================-->
		<!--=        	Footer         	 =-->
		<!--==============================-->

		<footer class="footer-bg">
			<div class="container">
				<div class="row footer-widget">
					<div class="col-sm-12 col-md-4">
						<div class="widget-col">
						<img class="img-fluid mt-3" src="{{URL::to('/storage/app')}}/{{$MainLogo->logo}}" width="300px">
						<p class="mt-3">
              @php
                $description = html_entity_decode($FooterDescription[0]->description);
                echo $description;
              @endphp
            </p>
					</div>
					</div>
					<div class="col-sm-6 col-md-4">
						<div class="widget-col">
						<h3 class="mb-4">Our Webinars</h3>
						<ul class="list-unstyled">
							<li><a href="{{URL::to('/what-is-forex-trading-in-urdu-webinar.html')}}"><i class="fa fa-arrow-right"></i> <span>{{$FooterWebinar[0]->webinar}}</span></a></li>
							<li><a href="{{URL::to('/become-successful-forex-trader.html')}}"><i class="fa fa-arrow-right"></i> <span>{{$FooterWebinar[1]->webinar}}</span></a></li>
							<li><a href="{{URL::to('/how-to-choose-a-forex-broker-in-urdu-webinar.html')}}"><i class="fa fa-arrow-right"></i> <span>{{$FooterWebinar[2]->webinar}}</span></a></li>
							<li><a href="{{URL::to('/how-to-use-metatrader-4-full-training-in-urdu-part-1.html')}}"><i class="fa fa-arrow-right"></i> <span>{{$FooterWebinar[3]->webinar}}</span></a></li>
							<li><a href="{{URL::to('/how-to-use-metatrader-4-full-training-in-urdu-part-2.html')}}"><i class="fa fa-arrow-right"></i> <span>{{$FooterWebinar[4]->webinar}}</span></a></li>
						</ul>
					</div>
					</div>
					<div class="col-sm-6 col-md-4 px-4">
						<div class="widget-col">
						<h3 class="mb-4">Contact Us</h3>
						<ul class="list-unstyled">
							<li><p class="m-0"><i class="fa fa-home"> &nbsp;       {{$FooterContact[0]->contact}}</i></p></li>
							<li><a href="mailto:info@forexustaad.com"><i class="fa fa-envelope"></i> <span>{{$FooterContact[1]->contact}}</span></a></li>
              <!--<li><a href="mailto:jann_g2000@yahoo.com"><i class="fa fa-envelope"></i> <span>jann_g2000@yahoo.com</span></a></li>-->
							<li><a href="tel:+44 07459065360"><i class="fa fa-address-book"></i> <span>{{$FooterContact[2]->contact}}</span></a></li>
              <li><a href="skype:Raheel6542380"><i class="fa fa-skype"></i> <span>{{$FooterContact[3]->contact}}</span></a></li>
						</ul>
					</div>
					</div>
				</div>
				<!-- /.footer-widget -->
        <!-- <div class="row footer-login align-items-center">

          <div class="col-lg-4 col-md-6 col-sm-12">
              <div class="footer-login-inner d-flex justify-content-between align-items-center">
                <div class="login-text">
                  <h4 class="m-0 text-white"><strong>New User</strong></h4>
                  <p class="p-0 m-0">New user can register here</p>
                </div>
                <div class="login-btn">
                  <button class="btn btn-primary">Register</button>
                </div>
              </div>
          </div>
          <div class="col-lg-4 col-md-6 col-sm-12">
            <div class="footer-login-inner d-flex justify-content-between align-items-center">
                <div class="login-text">
                  <h4 class="m-0 text-white"><strong>Already a Member</strong></h4>
                  <p class="p-0 m-0">Please Login here</p>
                </div>
                <div class="login-btn">
                  <button class="btn btn-primary">Login</button>
                </div>
              </div>
          </div>
          <div class="col-lg-2 col-md-6 col-sm-6 col-xs-6 col-6">
              <div class="android-ios">
                <img src="{{URL::to('/public/assets/assets/img/ios.png')}}" alt="ios">
              </div>
            </div>

 <div class="col-lg-2 col-md-6 col-sm-6 col-xs-6 col-6">
              <div class="android-ios">
                <img src="{{URL::to('/public/assets/assets/img/google.png')}}" alt="ios">
              </div>
            </div>        </div> -->

			</div>
			<!-- /.container -->
		</footer>
		<!-- /#footer -->
		<section class="copyright-section secondary-bg-color">

			<div class="container">



				<div class="row">
					<div class="col-12 col-lg-5 col-md-12 text-light">
              @php
                $description = html_entity_decode($copyRight->description);
                echo $description;
              @endphp
					</div>

          <div class="col-12 col-lg-7 col-md-12 text-light">
              @php
                $description = html_entity_decode($copyRight->description2);
                echo $description;
              @endphp
          </div>
				</div>
			</div>
		</section>

		<div class="to-top">
			<a href="#top"><i class="fa fa-angle-up backtotop_btn"></i></a>
		</div>


	</div>
  <style>
    .commentDisableButton{
      cursor:pointer;
      margin-left: 8px;
      background-color: #4267b2;
      border: 1px solid #4267b2;
      color: #fff;
      text-decoration: none;
      line-height: 22px;
      border-radius: 2px;
      font-size: 14px;
      font-weight: bold;
      position: relative;
      text-align: center;
      padding: 1px 6px;
    }
    .commentDisableButton:hover{
      background-color: #29487d;
      border-color: #29487d;
      color: #ffffff;
    }
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
    .buttonBlinking21 {
      text-align: center;

      -webkit-animation: glowing 1500ms infinite;
      -moz-animation: glowing 1500ms infinite;
      -o-animation: glowing 1500ms infinite;
      animation: glowing 1500ms infinite;
    }
    @-webkit-keyframes glowing {
      0% { background-color: #B20000; -webkit-box-shadow: 0 0 3px #B20000; }
      50% { background-color: #FF0000; -webkit-box-shadow: 0 0 40px #FF0000; }
      100% { background-color: #B20000; -webkit-box-shadow: 0 0 3px #B20000; }
    }

    @-moz-keyframes glowing {
      0% { background-color: #B20000; -moz-box-shadow: 0 0 3px #B20000; }
      50% { background-color: #FF0000; -moz-box-shadow: 0 0 40px #FF0000; }
      100% { background-color: #B20000; -moz-box-shadow: 0 0 3px #B20000; }
    }

    @-o-keyframes glowing {
      0% { background-color: #B20000; box-shadow: 0 0 3px #B20000; }
      50% { background-color: #FF0000; box-shadow: 0 0 40px #FF0000; }
      100% { background-color: #B20000; box-shadow: 0 0 3px #B20000; }
    }

    @keyframes glowing {
      0% { background-color: #B20000; box-shadow: 0 0 3px #B20000; }
      50% { background-color: #FF0000; box-shadow: 0 0 40px #FF0000; }
      100% { background-color: #B20000; box-shadow: 0 0 3px #B20000; }
    }
  </style>
     <!-- <script type='text/javascript' src='assets/js/particles.min.js'></script>
     <script type="text/javascript">
    particlesJS("particles-js", {
  "particles": {
    "number": {
      "value": 10,
      "density": {
        "enable": false
      }
    },
    "color": {
      "value": ["#41b893","#7d7a7c","#accbdd","#aaa9ad","#625e5e"]
    },
    "opacity": {
      "value": 1,
      "anim": {
        "enable": false
      }
    },
    "shape": {
      "type": ["polygon"],
      "polygon": {
        "nb_sides": 5
      }
    },
    "size": {
      "value": 5,
      "random": true,
      "anim": {
        "enable": true,
        "speed": 20,
        "size_min": 2,
        "sync": false
      }
    },
    "line_linked": {
      "enable": false
    },
    "move": {
      "enable": true,
      "speed": 2,
      "direction": "none",
      "straight": false
    }
  },
  "interactivity": {
    "detect_on": "canvas",
    "events": {
      "onhover": {
        "enable": false
      }
    },
    "modes": {
      "push": {
        "particles_nb": 12
      }
    }
  }
});
</script> -->




<!-- Request Quote Modal -->
<div class="modal fade {{Session::has('success1') ? 'show' : ''}}" id="requestQuoteModal" tabindex="-1" role="dialog" aria-labelledby="requestQuoteModalLabel" aria-{{Session::has('success1') ? 'model' : 'hidden'}}="true">
  <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body py-5 px-3">
        <button type="button" class="close modelClosemodel" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <div class="row justify-content-center">
          <!-- <div class="col-md-2"></div> -->
          <div class="col-lg-8 col-md-10">
            <div class="content_area_heading large-heading text-center fadeInUp wow mb-5">
              <div class="heading_border fadeInUp wow">
                <span class="one"></span><span class="two"></span><span class="three"></span>
              </div>
              <p class="h1 heading_title fadeInUp wow secondary-text-color heading_title-change4">
               Register
              </p>
              <p class="heading-description fadeInUp wow w-100 heading_description-change4" data-wow-delay="0.2s">
               Fill this form to register your self.
              </p>

              @if(Session::has('success1'))
                  @php
                    $success = Session::get('success1');
                    $reSendMailId =  Session::get('reSendMailId');
                  @endphp
                  <p class="alert alert-success">{{$success}} <a href="{{URL::to('ReconformationMail')}}/{{$reSendMailId}}">Re send mail</a></p>
              @endif
            </div>

              <form action="{{URL::to('/clientRegistration')}}" method="post" class="RegistrationForm" id="RegistrationFormPassword">

                  <div class="contact_us_form wow animated fadeInUp">
                    <div class="row">
                      <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="form-group">
                          <input type="text" class="form-control text-gray explore_form name abc_into" placeholder="First Name *" name="name" id="quote_name" required>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="form-group">
                          <input type="text" class="form-control text-gray explore_form name abc_into" placeholder="Last Name *" name="lastName" id="quote_name" required>
                        </div>
                      </div>
                      <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <select name="" id="sel1" class="form-control text-gray explore_form phone" required>
                                        @foreach($AllCountries as $country)
                                            <option value="{{$country->id}}">{{$country->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <select name="" id="sel2" class="form-control text-gray explore_form phone" required>

                                    </select>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <select name="cityId" id="sel3" class="form-control text-gray explore_form phone" required>

                                    </select>
                                </div>
                            </div>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="form-group">
                          <input type="text" class="form-control text-gray explore_form phone" placeholder="Your Phone *" name="mobile" id="quote_phone" required>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="form-group">
                            <input type="email" class="form-control text-gray explore_form email emailRegistration" placeholder="Your Email *" name="email" id="quote_email" required>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="form-group">
                          <input type="password" class="form-control text-gray explore_form email password" placeholder="Your Password *" name="password" id="passwordchecker" required>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="form-group">
                          <input type="password" class="form-control text-gray explore_form email comfirmedPassword" placeholder="Comfirmed Password *" name="comfrimpassword" id="comfirmedPasswordchecker" required>
                        </div>
                      </div>
                    </div>
                        <input type="hidden" name="token" id="token" value="">
                    <div class="form-group text-left ml-3">
                        <p> <input type="checkbox" value="1" class="RegistrationCheckBox" name="Terms&Conditions" required style="height: 12px;margin-bottom: 0px;"> Please Accept over <a href="https://forexustaad.com/p/Terms-And-Conditions" target="_blank">Term and Conditions</a></p>
                        <button type="submit" class="btn btn-primary text-uppercase quote_send_msg mr-4" data-type="quote">Register</button>
                        <span class="btn btn-primary text-uppercase quote_send_msg LoginButton">Login</span>
                        <span class="text-danger RegistrationError" id="RegistrationErrorChecker"></span>
                    </div>
                  </div>
              </form>



              <form action="{{URL::to('/clientLogin')}}" class="LoginForm" method="post">

                  <div class="contact_us_form wow animated fadeInUp">
                    <div class="form-group">
                      <input type="text" class="form-control text-gray explore_form name abc_into LoginEmail" placeholder="Enter Email or Phone number" name="username" id="quote_name" required>
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control text-gray explore_form name abc_into passwordHide" placeholder="Enter Password" name="password" id="quote_name" required>
                    </div>
                    <div class="form-group text-left ml-3">
                      <button type="submit" class="btn btn-primary text-uppercase quote_send_msg ForgetButton mr-4" data-type="quote">Login</button>
                      <span class="btn btn-primary text-uppercase quote_send_msg RegistrationButton">Register</span><br>
                      <a href="#" class="text-primary ReSendMail mr-5">Re Send Mail</a>
                      <a href="#" class="text-danger ForgetPassword ml-2">Forget Password</a>
                      <span class="text-danger LoginError"></span>
                    </div>
                  </div>
              </form>
              <form action="{{URL::to('/ReSendMailSend')}}" class="ReSendMailForm" method="post">

                  <div class="contact_us_form wow animated fadeInUp">
                    <div class="form-group">
                      <input type="text" class="form-control text-gray explore_form name abc_into" placeholder="Enter Email or Phone number" name="username" id="quote_name" required>
                    </div>
                    <div class="form-group text-left ml-3">
                      <button type="submit" class="btn btn-primary text-uppercase quote_send_msg mr-4" data-type="quote">Re Send Mail</button>
                    </div>
                  </div>
              </form>

              <div class="quote_show_msg d-none">
          </div>
          <!-- <div class="col-md-2"></div> -->
        </div>

      </div>
    </div>
  </div>
</div>


<style>
        .img-radius{
            margin-top: 5px;
            border-radius: 50%;
            display: inline-block;
            width: 45px;
            height: 45px;
            margin-bottom: 5px;
        }
        *, *::after, *::before {
            box-sizing: border-box;
        }
        .u-btn {
            all: unset;
            cursor: pointer;
        }
        .chatbox {
            box-shadow: 1px 1px 10px rgba(0, 0, 0, 0.25);
            bottom: 0;
            position: fixed;
            right: 1em;
            transform: translatey(23.5em);
            transition: all 300ms ease;
            width: 18.5em;
            z-index:100;
        }
        .chatbox--is-visible {
            transform: translatey(0);
            z-index:25;
        }
        .chatbox__header {
            background:linear-gradient( 45deg , #ff0024, #0d5fe9);;
            border-top-right-radius: 0.5em;
            border-top-left-radius: 0.5em;
            display: flex;
            justify-content: space-between;
            padding: 0 0.75em;
            user-select: none;
        }
        .chatbox__header-cta-text {
            color: #fff;
            font-weight: 300;
            font-size: 1.025rem;
        }
        .chatbox__header-cta-icon {
            color: #fff;
            margin-right: 0.75em;
        }
        .chatbox__header-cta-btn {
            background: none;
            border: none;
            color: #aaa;
            padding: 0.5em;
            transition: all 300ms ease;
        }
        .chatbox__header-cta-btn:hover {
            color: #fff;
        }
        .chatbox__display {
            background: #ededed;
            height: 20em;
            overflow: auto;
            padding: 0.75em;
        }
        .chatbox__display-chat {
            background: #fff;
            border-radius: 0.5em;
            color: #666;
            font-weight: 300;
            font-size: 0.9rem;
            line-height: 1.5;
            padding: 0.75em;
            text-align: justify;
        }
        .chatbox__form {
            display: flex;
        }
        .chatbox__form-input {
            border: none;
            color: #222;
            font-size: 0.9rem;
            font-weight: 300;
            padding: 1.25em 1em;
            width: 100%;
        }
        .chatbox__form-input:required {
            box-shadow: none;
        }
        .chatbox__form-submit {
          background: #fff;
          border-left: 1px solid #aaa;
          color: #aaa;
          padding: 1em;
        }
        
    </style>
<!-- Request Quote Modal ends -->
<script src="{{URL::to('/public/assets/assets/js/jquery-3.2.1.min.js')}}"></script>
     <!-- <script src="assets/js/isotope.pkgd.min.js"></script> -->
     <script src="{{URL::to('/public/assets/assets/js/wow.js')}}"></script>
     <script defer src="{{URL::to('/public/assets/assets/js/slick.js')}}"></script>
     <script src="{{URL::to('/public/assets/assets/js/jquery.marquee.min.js')}}"></script>
     <script defer src="{{URL::to('/public/assets/node_modules/bootstrap/dist/js/bootstrap.js')}}"></script>
     <script src="{{URL::to('/public/assets/assets/js/popper.min.js')}}"></script>

          <!-- DataTable start -->

      <script src="{{URL::to('/public/assets/DataTable/datatables.net/datatables.net/js/jquery.dataTables.min.js')}}"></script>
      <script src="{{URL::to('/public/assets/DataTable/data-table/extensions/responsive/js/dataTables.responsive.min.js')}}"></script>
      <script src="{{URL::to('/public/assets/DataTable/datatables.net/datatables.net-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
      <script src="{{URL::to('/public/assets/DataTable/data-table/extensions/responsive/js/responsive-custom.js')}}"></script>

          <!-- DataTable ends -->

     <script src="{{URL::to('/public/assets/assets/js/bootstrap-toggle.min.js')}}"></script>
     <!-- charts -->
      <!--news slide script  -->

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/fitvids/1.0.1/jquery.fitvids.js"></script>
     <!-- Splide Slider -->

     <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/js/splide.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.3/js/swiper.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/fitvids/1.0.1/jquery.fitvids.js"></script>

     <!-- charts ends -->
     <script src="{{URL::to('/public/assets/assets/js/custom.js')}}"></script>

    @if(Session::has('client'))
      <script>
          // Chat Box Scroll Bottom
          var objDiv = document.getElementById("chatbox__display");
          objDiv.scrollTop = objDiv.scrollHeight;

          // Chat Box script start 

          var ChatClientImageShowSrc = $("#ChatClientImageShowSrc").attr('src');
          const toggleChatboxBtn = document.querySelector(".js-chatbox-toggle");
          const chatbox = document.querySelector(".js-chatbox");
          const chatboxMsgDisplay = document.querySelector(".js-chatbox-display");
          const chatboxForm = document.querySelector(".js-chatbox-form");

          // Use to create chat bubble when user submits text
          // Appends to display
          const createChatBubble = input => {
            $(".chatbox__display").append("<div class='d-flex justify-content-end'><p class='chatbox__display-chat mt-1'>"+input+" </p><img class='media-object img-radius ml-2' src='"+ChatClientImageShowSrc+"' alt=''></div>");
            var urlPost = "{{URL::to('/adminMessageSend')}}";
            var chatMessageSave = input;
            console.log(urlPost);
            $.ajax({
              type: "POST",
              data : {
                data1: chatMessageSave
              },
              url: urlPost,
              success: function(response){
                console.log(response);
              },
              error: function(data) {
                console.log("fail");
              }
            });
          };

          // Toggle the visibility of the chatbox element when clicked
          // And change the icon depending on visibility
          toggleChatboxBtn.addEventListener("click", () => {
          chatbox.classList.toggle("chatbox--is-visible");
          $(".countChatBoxUnRead").html("");
          $(".countChatBoxUnRead").attr("class","countChatBoxUnRead1");
          var URLPost12 = "{{URL::to('GetReadChatMessages')}}/" + "{{$value['id']}}";
          $.ajax({ 
              type: "POST",
              url: URLPost12,
              success: function(response){
                console.log("success");
              },
              error: function(data) {
                console.log("fail");
              }
            });
          if (chatbox.classList.contains("chatbox--is-visible")) {
              toggleChatboxBtn.innerHTML = '<i class="fas fa-chevron-down"></i>';
          } else {
              toggleChatboxBtn.innerHTML = '<i class="fas fa-chevron-up"></i>';
          }
          });

          // Form input using method createChatBubble
          // To append any user message to display
          chatboxForm.addEventListener("submit", e => {
          const chatInput = document.querySelector(".js-chatbox-input").value;

          createChatBubble(chatInput);

          e.preventDefault();
          chatboxForm.reset();
          });

      </script>
      <!-- Chat Box script end -->
    @endif

<script>
    $(document).ready(function(){
      setTimeout(function () {
              window.scrollTo(0, 0);
          }, 300);
      $("#open_popup").click(function(){
        $("#open_popup").hide();
        $("#search_top_bar").show();
        $("#close_popup").show();
    });
    $("#close_popup").click(function(){
      $("#open_popup").show();
        $("#search_top_bar").hide();
        $("#close_popup").hide();
    });



    // $('#to-top').hide();
    $(window).scroll(function(){
        if ($(this).scrollTop() > 100) {
            $('.to-top').addClass('show-top-btn');
        } else {
            $('.to-top').removeClass('show-top-btn');
        }
    });
    });

  $(".RegistrationButton").on("click",function(){
    $(".heading_title-change4").html("Registration");
    $(".heading_description-change4").html("Fill this form to register your self.");
    $(".LoginForm").hide();
    $(".ReSendMailForm").hide();
    $(".RegistrationForm").show();
  });

  $(".LoginButton").on("click",function(){
    $(".heading_title-change4").html("Login");
    $(".heading_description-change4").html("Enter your email or phone number & password.");
    $(".RegistrationForm").hide();
    $(".ReSendMailForm").hide();
    $(".LoginForm").show();
      $(".passwordHide").show();
      $(".passwordHide").attr("required",true);
      $(".ForgetButton").html("Login");
      $(".ForgetPassword").show();
      $(".LoginForm").attr("action","{{URL::to('/clientLogin')}}");
      $(".LoginEmail").attr("placeholder","Enter Email or Phone number");
  });
  $(".ReSendMail").on("click",function(){
    $(".heading_title-change4").html("Re Send Mail");
    $(".heading_description-change4").html("Enter your email & press Enter");
    $(".RegistrationForm").hide();
    $(".LoginForm").hide();
    $(".ReSendMailForm").show();
  });
</script>

<script>
    new WOW().init();
</script>


<!-- back to top -->
<!-- <a href="#top" class="to-top"><i class="fa fa-angle-up"></i></a> -->
<script type="text/javascript">

  // Select all links with hashes
  $('a[href="#top"]')
    // Remove links that don't actually link to anything
    .not('[href="#0"]')
    .click(function(event) {
    // On-page links
    if (
      location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '')
      &&
      location.hostname == this.hostname
    ) {
      // Figure out element to scroll to
      var target = $(this.hash);
      target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
      // Does a scroll target exist?
      if (target.length) {
        // Only prevent default if animation is actually gonna happen
        event.preventDefault();
        $('html, body').animate({
          scrollTop: target.offset().top
        }, 1000, function() {
          // Callback after animation
          // Must change focus!
          var $target = $(target);
          $target.focus();
          if ($target.is(":focus")) { // Checking if the target was focused
            return false;
          } else {
            $target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
            $target.focus(); // Set focus again
          };
        });
      }
    }
  });


</script>
<script>
    function initVideo() {
        var vidDefer = document.getElementsByTagName('iframe');
        for (var i=0; i<vidDefer.length; i++) {
            if(vidDefer[i].getAttribute('data-src')) {
                vidDefer[i].setAttribute('src',vidDefer[i].getAttribute('data-src'));
            }
        }
    }
    window.onload = initVideo;
</script>

<script type="text/javascript">
    $(window).on('load', function(){
     $('#loading').hide();
  });
  $(".ForgetPassword").on("click",function(){
    $(".heading_title-change4").html("Forget Password");
    $(".passwordHide").hide();
    $(".ForgetButton").html("Send Mail");
    $(".ForgetPassword").hide();
    $(".passwordHide").attr("required",false);
    $(".LoginForm").attr("action","{{URL::to('/clientForget')}}");
    $(".LoginEmail").attr("placeholder","Enter Email");
  });
</script>

<!-- news slide script -->

<script>
  /* webflow only this section swiper pagination */
  $(document).ready(function() {
    /* add html by js (no way to add this HTML by webflow UI beacuse this is CMS list*/
    var part1 = "<div class=swiper-pagination></div>";
    //  var part2 = '<div class="swiper-button-prev"></div>';
    //var part3 = '<div class="swiper-button-next"></div>';
    // var swiperString = part1.concat(part2, part3);
    $("#swiper-press").append(part1);
  });

  /* change active class when click */
  $(".swiper-container-videos .swiper-wrapper .swiper-slide a").click(function() {
    $(this)
      .closest(".swiper-slide")
      .addClass("selected")
      .siblings()
      .removeClass("selected");
    mySwiper1.slideTo(mySwiper1.clickedIndex);
  });

  $(".swiper-container-videos .swiper-slide")
  .first()
  .addClass("selected");

  /* 1 of 2 : SWIPER */
  var mySwiper1 = new Swiper(".swiper-container-videos", {
    // If loop true set photoswipe - counterEl: false
    loop: false,
    /* slidesPerView || auto - if you want to set width by css like flickity.js layout - in this case width:80% by CSS */
    slidesPerView: "auto",
    spaceBetween: 15,
    centeredSlides: false,

    // If we need pagination
    pagination: {
      el: ".swiper-pagination",
      clickable: true
    },
    navigation: {
      nextEl: ".swiper-custom-next",
      prevEl: ".swiper-custom-prev"
    },

    keyboard: {
      enabled: true,
      onlyInViewport: true
    }
  });

  /* This is what makes the videos responsive. You can either include this in a <script> tag in the markup, or better yet, include it in a separata JavaScript file.*/
  $(function() {
    //Look for all the videos inside this element and make them responsive
    $(".vid-container").fitVids();
  });

  /*JS FOR SCROLLING THE ROW OF THUMBNAILS*/

  $(document).ready(function() {
    $(".vid-item").each(function(index) {
      $(this).on("click", function() {
        var current_index = index + 1;
        $(".vid-item .thumb").removeClass("active");
        $(".vid-item:nth-child(" + current_index + ") .thumb").addClass("active");
      });
    });
    $("#siteWrapper").find(". siteWrapper")
  });


</script>

<script>

    // Show hide popover

    var toggleIdCount = 0;
  $(document).on("click", function(event){
      var $trigger = $("#toggler12345");
      if($trigger != event.target && !$trigger.has(event.target).length){
          $("#navbarSupportedContent1").slideUp(800,"swing");
          toggleIdCount = 0;
      }
  });
  $(document).ready(function(){
    $("#toggler12").click(function(){
        console.log(toggleIdCount);
      if (toggleIdCount == 0) {
        $("#toggler12345").find("#navbarSupportedContent1").slideDown(800,"swing");
        toggleIdCount = 1;
      }else{
        $("#toggler12345").find("#navbarSupportedContent1").slideUp(800,"swing");
        toggleIdCount = 0;
      }
    });
  });
</script>

<script>
    grecaptcha.ready(function() {
        grecaptcha.execute('6LfoWyEaAAAAAC-Bs8wiRSMTBSLB3AR8Nq8eS3kH', {action: 'homepage'}).then(function(token) {
            document.getElementById("token").value = token;
        });
    });
    $(".RegistrationForm").on("submit",function(e){
      var email = $(".emailRegistration").val();
      var emailHost = email.split("@")
      console.log(email);
      if (emailHost[1] != "gmail.com" && emailHost[1] != "yahoo.com"){
        e.preventDefault();
        $(".RegistrationError").html("Please! correct your email.")
      }else{
        var password = $(".password").val();
        var comfirmedPassword = $(".comfirmedPassword").val();
        if(password != comfirmedPassword){
          e.preventDefault();
          $(".RegistrationError").html("Your Password and Comfirmed Password is not matched.")
        }
      }
      var $captcha = $( '#recaptcha' ),
              response = grecaptcha.getResponse();
          
          if (response.length === 0) {
              e.preventDefault();
              $(".RegistrationError").html("Recaptcha is mandatory.");
          } 
    });


</script>

    <script type="text/javascript">
      var blink = document.getElementById('blink');
      @if(Session::has('client'))
        var blink1 = document.getElementById('blink1');
      @endif
      setInterval(function() {
        blink.style.opacity = (blink.style.opacity == 0 ? 1 : 0);
        @if(Session::has('client'))
          blink1.style.opacity = (blink1.style.opacity == 0 ? 1 : 0);
        @endif
      }, 700);


          // city & State Error

          $("#sel1").on("change",function(){
              var myusername = $("#sel1").val();
              var url = "{{URL::to('user-registration/stateData')}}" + "/" + myusername;
                          console.log(url);
              $.ajax({
                  type: "POST",
                  url: url,
                  data: myusername,
                  success: function(data){
                      $("#sel2").html('');
                      $("#sel3").html('');
                      console.log("hello");
                          $("#sel2").append("<option value=''>none</option>");
                      for(var i = 0; i < data.length; i++) {
                          console.log("hello2");
                          $("#sel2").append("<option value='"+data[i].id+"'>"+data[i].name+"</option>")
                      }
                  }
              });
          });
          $("#sel2").on("change",function(){
              var myusername1 = $("#sel2").val();
              var url1 = "{{URL::to('user-registration/cityData')}}" + "/" + myusername1;
              $.ajax({
                  type: "POST",
                  url: url1,
                  data: myusername1,
                  success: function(data){
                      $("#sel3").html('');
                      for(var i = 0; i < data.length; i++) {
                          $("#sel3").append("<option value='"+data[i].id+"'>"+data[i].name+"</option>")
                      }
                  }
              });
          });
    </script>

  <script>
    var adBlockEnabled = false;
    var testAd = document.createElement('div');
    testAd.innerHTML = '&nbsp;';
    testAd.className = 'adsbox';
    document.body.appendChild(testAd);
    window.setTimeout(function() {
      if (testAd.offsetHeight === 0) {
        $(".adblock-wrapper").css('display','flex');
        $(".adblock-wrapper").show();
      }else{
        $(".adblock-wrapper").hide();
      }
      testAd.remove();
      console.log('AdBlock Enabled? ', adBlockEnabled)
    }, 100);

  // screen Width and Height

    // var screen_width = screen.width;
    // var screen_height = screen.height;
    // alert("width: " + screen_width + " height: " + screen_height);

  // location

    // navigator.geolocation.getCurrentPosition(console.log,console.log)

  // Tab Count

    // var session = localStorage.getItem('tabs');
    // if (session == null) {
    //   var ies = 1;
    //   console.log(ies);
    //   localStorage.setItem('tabs',ies);
    //   alert(localStorage.getItem('tabs'));
    // }else{
    //   ies = localStorage.getItem('tabs');
    //   ies++;
    //   localStorage.setItem('tabs',ies);
    //   alert(localStorage.getItem('tabs'));
    // }
    // window.addEventListener("beforeunload", function (e) {
    //   ies = localStorage.getItem('tabs');
    //   ies--;
    //   localStorage.setItem('tabs',ies);
    // });

    console.log("successewqewq");
    var timer = setInterval(() => {
      console.log("dsadas");
      $.ajax({
          type: "Post",
          url: "{{URL::to('unRegisterUser/Save')}}",

          success: function(response) {
              console.log("success");
          },
          error: function(data) {
              console.log("fail");
          }
      });

    }, 5000);

    $(window).blur(function() {
      console.log("blur");
      clearInterval(timer)
      // $.ajax({
      //     type: "Post",
      //     url: "{{URL::to('unRegisterUser/Delete')}}",

      //     success: function(response) {
      //         console.log("success");
      //     },
      //     error: function(data) {
      //         console.log("fail");
      //     }
      // });
    });
    // $(window).focus(function() {
    //   console.log("focus");
    //   var timer = setInterval(() => {
    //     console.log("dsadas");
    //     $.ajax({
    //         type: "Post",
    //         url: "{{URL::to('unRegisterUser/Save')}}",

    //         success: function(response) {
    //             console.log("success");
    //         },
    //         error: function(data) {
    //             console.log("fail");
    //         }
    //     });

    //   }, 5000);
    // });
  </script>
              @if(Session::has('success1'))
                <script>
                  $("#requestQuoteModal").css('display','block');
                  $(".LoginForm").hide();
                  $(".modelClosemodel").on("click",function() {
                    $("#requestQuoteModal").css('display','none');
                  })
                </script>
                @php Session::pull('success1') @endphp
              @endif

@if(Session::has('client'))
    @php
        $value = Session::get('client');
    @endphp
    <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
    <script>

      // Enable pusher logging - don't include this in production
      Pusher.logToConsole = false;

      var pusher = new Pusher("{{env('PUSHER_APP_KEY')}}", {
        cluster: "{{env('PUSHER_APP_CLUSTER')}}"
      });

      var channel = pusher.subscribe("{{$value['email']}}");
      channel.bind("firstEvent12", function(data) {
        console.log(data.message.message);
        $(".countChatBoxUnRead1").attr("class","countChatBoxUnRead");
        var countChatBoxUnReadCount = $(".countChatBoxUnRead").html();
        $(".countChatBoxUnRead").html(++countChatBoxUnReadCount);
        $("#NotificationSound")[0].play();
        setTimeout(function(){ $("#NotificationSound")[0].pause(); }, 4000);
        $(".chatbox__display").append("<div class='d-flex'><img class='media-object img-radius mr-2' src='{{URL::to('public/assets/assets/img/favicon.png')}}' alt=''><p class='chatbox__display-chat mt-1'>"+data.message.message+" </p></div>");
      });

      var channel = pusher.subscribe("{{$value['email']}}");
      channel.bind("firstEvent", function(data) {
        var emailNoti = "{{$value['email']}}";
            if(data.message.email == emailNoti){
                var url12 =  "";
                var linkNoti = "{{URL::to('clientNotification')}}" + '/' + data.message.id;
                if(data.message.userType == 0){
                    url12 = "{{URL::to('getAdminDetail')}}" + '/' + data.message.userId;
                }else{
                    url12 = "{{URL::to('getClientDetail')}}" + '/' + data.message.userId;
                }
                $.ajax({
                    type: "POST",
                    url: url12,
                    success: function(data123){
                        if (data.message.userType == 0) {
                            if(data123.userImage == null){
                                data123.userImage = "WebImages/avatar-5.jpg";
                            }
                            var imageSrc = "{{URL::to('public/assets/assets/img/favicon.png')}}";
                            var ClientNotiName = "Admin";
                        }else{
                            if(data123.image == null){
                                data123.image = "WebImages/avatar-5.jpg";
                            }
                            var imageSrc = "{{URL::to('storage/app')}}" + '/' + data123.image;
                            var ClientNotiName = data123.name;
                        }
                        $(".list-unstyled12").prepend("<li class='media'><div class='media'><img class='img-radius ImageClientNotification' src='"+imageSrc+"' alt='Generic placeholder image' /><div class='media-body'><p class='m-0'><strong>"+ClientNotiName+"</strong></p><p class='m-0'>"+data.message.message+"</p></div><a href='"+linkNoti+"' class='text-primary linkClientNotification m-0'>View</a></div></li>");
                        var ClientNotificationCount = $(".ClientNotificationCount").html();
                        $(".ClientNotificationCount").html(++ClientNotificationCount);
                        $("#NotificationSound")[0].play();
                        setTimeout(function(){ $("#NotificationSound")[0].pause(); }, 4000);
                    }
                });
            }
        console.log((data.message));
      });

      var channel = pusher.subscribe("firstChannel1");
      channel.bind("firstEvent1", function(data) {

          var url12 =  "";
                  var linkNoti = "{{URL::to('clientNotification')}}" + '/' + data.message.id;
                  if(data.message.userType == 0){
                      url12 = "{{URL::to('getAdminDetail')}}" + '/' + data.message.userId;
                  }else{
                      url12 = "{{URL::to('getClientDetail')}}" + '/' + data.message.userId;
                  }
                  $.ajax({
                      type: "POST",
                      url: url12,
                      success: function(data123){
                          if (data.message.userType == 0) {
                              if(data123.userImage == null){
                                  data123.userImage = "WebImages/avatar-5.jpg";
                              }
                              var imageSrc = "{{URL::to('public/assets/assets/img/favicon.png')}}";
                              var ClientNotiName = "Admin";
                          }else{
                              if(data123.image == null){
                                  data123.image = "WebImages/avatar-5.jpg";
                              }
                              var imageSrc = "{{URL::to('storage/app')}}" + '/' + data123.image;
                              var ClientNotiName = data123.name;
                          }
                          $(".list-unstyled12").prepend("<li class='media'><div class='media'><img class='img-radius ImageClientNotification' src='"+imageSrc+"' alt='Generic placeholder image' /><div class='media-body'><p class='m-0'><strong>"+ClientNotiName+"</strong></p><p class='m-0'>"+data.message.message+"</p></div><a href='"+linkNoti+"' class='text-primary linkClientNotification m-0'>View</a></div></li>");
                          var ClientNotificationCount = $(".ClientNotificationCount").html();
                          $(".ClientNotificationCount").html(++ClientNotificationCount);
                          $("#NotificationSound")[0].play();
                          setTimeout(function(){ $("#NotificationSound")[0].pause(); }, 4000);
                      }
                  });

          console.log((data.message));
      });

    </script>
@endif

</body>
</html>
