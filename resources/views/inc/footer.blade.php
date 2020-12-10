
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
							<li><a href="http://goo.gl/2BnxlY"><i class="fa fa-arrow-right"></i> <span>{{$FooterWebinar[0]->webinar}}</span></a></li>
							<li><a href="http://goo.gl/RaLVUN"><i class="fa fa-arrow-right"></i> <span>{{$FooterWebinar[1]->webinar}}</span></a></li>
							<li><a href="http://goo.gl/ddgFcJ"><i class="fa fa-arrow-right"></i> <span>{{$FooterWebinar[2]->webinar}}</span></a></li>
							<li><a href="http://goo.gl/VhGRYF"><i class="fa fa-arrow-right"></i> <span>{{$FooterWebinar[3]->webinar}}</span></a></li>
							<li><a href="http://goo.gl/nUigIQ"><i class="fa fa-arrow-right"></i> <span>{{$FooterWebinar[4]->webinar}}</span></a></li>
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
					<div class="col-12 col-lg-5 col-md-12">
            <p>
						<span>
              {{$copyRight->description}}
            </span>
            
            <span class="text-white">
              <a href="{{URL::to('/term-of-services.html')}}" class="text-white">TOS</a>
            </span>
            <span>
              |
            </span>
            <!-- <span >
              <a href="sitemap.xml" class="text-white">Site Map</a>
            </span> -->
            <span >
              
            </span>
            <span >
              <a href="{{URL::to('/privacy-policy.html')}}" class="text-white">Privacy Policy</a>
            </span>
            </p>

					</div>
          
          <div class="col-12 col-lg-7 col-md-12">
            <p>{{$copyRight->description2}}</p>
          </div>
				</div>
			</div>
		</section>

		<div class="to-top">
			<a href="#top"><i class="fa fa-angle-up backtotop_btn"></i></a>
		</div>


	</div>
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
     <script src="{{URL::to('/public/assets/assets/js/jquery-3.2.1.min.js')}}"></script> 
     <!-- <script src="assets/js/isotope.pkgd.min.js"></script> -->
     <script src="{{URL::to('/public/assets/assets/js/wow.js')}}"></script> 
     <script defer src="{{URL::to('/public/assets/assets/js/slick.js')}}"></script> 
     <script src="{{URL::to('/public/assets/assets/js/jquery.marquee.min.js')}}"></script>
     <script defer src="{{URL::to('/public/assets/node_modules/bootstrap/dist/js/bootstrap.js')}}"></script> 
     <script src="{{URL::to('/public/assets/assets/js/popper.min.js')}}"></script>
     <script src="{{URL::to('/public/assets/assets/js/jquery.dataTables.min.js')}}"></script>
     <script src="{{URL::to('/public/assets/assets/js/dataTables.bootstrap.min.js')}}"></script>
     <script src="{{URL::to('/public/assets/assets/js/dataTables.responsive.min.js')}}"></script>
     <script src="{{URL::to('/public/assets/assets/js/bootstrap-toggle.min.js')}}"></script>
     <!-- charts -->
      <!--news slide script  -->
      <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/4.3.3/js/swiper.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/fitvids/1.0.1/jquery.fitvids.js"></script>
     <!-- Splide Slider -->

     <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/js/splide.min.js"></script>

     <!-- Resources -->
    <script src="{{URL::to('/public/assets/assets/amcharts4/core.js')}}"></script>
    <script src="{{URL::to('/public/assets/assets/amcharts4/charts.js')}}"></script>
    <script src="{{URL::to('/public/assets/assets/amcharts4/themes/material.js')}}"></script>
    <script src="{{URL::to('/public/assets/assets/amcharts4/themes/animated.js')}}"></script>
     <!-- charts ends -->
     <script src="{{URL::to('/public/assets/assets/js/custom.js')}}"></script>
    <!--  <script type="text/javascript">
        $(function() {
            // init Isotope
            let $grid = $('.projects-grid').isotope();
            // filter items on button click
            $('.filter-button-group button.isotope-nav').on( 'click', function() {
                $('.filter-button-group button.isotope-nav').removeClass('active');

                let filterValue = $(this).addClass('active').data('filter');
                $grid.isotope({ filter: filterValue });
            });
        });
     </script> -->

      <script>
     	$(document).ready(function(){
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
     </script>

     <script>
         new WOW().init();
     </script>

<!-- Request Quote Modal -->
<div class="modal fade" id="requestQuoteModal" tabindex="-1" role="dialog" aria-labelledby="requestQuoteModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body py-5 px-3">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <div class="row justify-content-center">
          <!-- <div class="col-md-2"></div> -->
          <div class="col-lg-8 col-md-10">
            <div class="content_area_heading large-heading text-center fadeInUp wow mb-5">
              <div class="heading_border fadeInUp wow">
                <span class="one"></span><span class="two"></span><span class="three"></span>
              </div>  
              <h1 class="heading_title fadeInUp wow secondary-text-color">
               Register
              </h1>
              <p class="heading-description fadeInUp wow w-100" data-wow-delay="0.2s">
               Lorem Ipsum has been the industrys standard dummy text ever since the 1500s 
              </p>
            </div>

              <form action="{{URL::to('/clientRegistration')}}" class="RegistrationForm" method="post" class="quote_msg_form">

                  <div class="contact_us_form wow animated fadeInUp">
                    <div class="row">
                      <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="form-group">
                          <input type="text" class="form-control text-gray explore_form name abc_into" placeholder="Your Name *" name="name" id="quote_name" required>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="form-group">
                          <input type="text" class="form-control text-gray explore_form phone" placeholder="Your Phone *" name="mobile" id="quote_phone" required>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="form-group">
                          <input type="text" class="form-control text-gray explore_form email" placeholder="Your Email *" name="email" id="quote_email" required>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="form-group">
                          <input type="text" class="form-control text-gray explore_form email" placeholder="Your City/Country *" name="city" id="quote_email" required>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="form-group">
                          <input type="password" class="form-control text-gray explore_form email password" placeholder="Your Password *" name="password" id="quote_email" required>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-12 col-12">
                        <div class="form-group">
                          <input type="password" class="form-control text-gray explore_form email comfirmedPassword" placeholder="Comfirmed Password *" name="comfrimpassword" id="quote_email" required>
                        </div>
                      </div>
                    </div>
                      <div class="form-group text-left">
                        <button type="submit" class="btn btn-primary text-uppercase quote_send_msg" data-type="quote">Register</button>
                        <span class="text-danger RegistrationError"></span>
                      </div>
                  </div>
              </form>

              
              <form action="{{URL::to('/clientLogin')}}" class="LoginForm" method="post" class="quote_msg_form">

                  <div class="contact_us_form wow animated fadeInUp">
                    <div class="form-group">
                      <input type="text" class="form-control text-gray explore_form name abc_into" placeholder="Enter Email or Phone number" name="username" id="quote_name" required>
                    </div>
                    <div class="form-group">
                      <input type="password" class="form-control text-gray explore_form name abc_into" placeholder="Enter Password" name="password" id="quote_name" required>
                    </div>
                    <div class="form-group text-left">
                      <button type="submit" class="btn btn-primary text-uppercase quote_send_msg" data-type="quote">Login</button>
                      <span class="text-danger LoginError"></span>
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
<!-- Request Quote Modal ends -->


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
<script>function initVideo() {
          var vidDefer = document.getElementsByTagName('iframe');
          for (var i=0; i<vidDefer.length; i++) {
            if(vidDefer[i].getAttribute('data-src')) {
              vidDefer[i].setAttribute('src',vidDefer[i].getAttribute('data-src'));
        } } }
        window.onload = initVideo;
</script> 

<script type="text/javascript">
    $(window).on('load', function(){
     $('#loading').hide();
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
  slidesPerView: "false",
  spaceBetween: 15,
  centeredSlides: false,

  // If we need pagination
  // pagination: {
  //   el: ".swiper-pagination",
  //   clickable: true
  // },
  // navigation: {
  //   nextEl: ".swiper-custom-next",
  //   prevEl: ".swiper-custom-prev"
  // },

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
});

$(".RegistrationForm").on("submit",function(e){
  var password = $(".password").val();
  var comfirmedPassword = $(".comfirmedPassword").val();
  console.log(comfirmedPassword);
  console.log(password);
  if(password != comfirmedPassword){
    e.preventDefault();
    $(".RegistrationError").html("Your Password and Comfirmed Password is not matched.")
  }
});
$(".RegistrationButton").on("click",function(){
  $(".heading_title").html("Registration");
  $(".LoginForm").hide();
  $(".RegistrationForm").show();
})
$(".LoginButton").on("click",function(){
  $(".heading_title").html("Login");
  $(".RegistrationForm").hide();
  $(".LoginForm").show();
})
</script>
</body>
</html>
