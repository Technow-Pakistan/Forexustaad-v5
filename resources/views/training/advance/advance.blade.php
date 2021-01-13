@include('inc.header')
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
                    		<div class="news_us">
                        		<div class="content_area_heading large-heading text-center">
                            
                            		<h1 class="heading_title wow animated fadeInUp">
										Advance Trainning
                            		</h1>
                            		<div class="heading_border wow animated fadeInUp">
                                		<span class="one"></span><span class="two"></span><span class="three"></span>
                            		</div>
                        		</div>
                    		</div>
				<!-- <h4 class="text-center mt-5">
					Advance Trainning
				</h4> -->
				<div class="card mt-5 rounded-lg shadow-lg">
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
						 			Lecture {{$lecture->id}}: {{$lecture->title}}
						 		</p>
						 	</div>
						 	<div>
						 		<div class="d-flex">
									<span class="pt-3 pr-2">
										<a href="{{isset($lastTitle) ? URL::to('advance'). '/' . $lastTitle : '#!'}}" class="text-white">
											<i class="fa fa-chevron-left" aria-hidden="true"></i>
										</a>
									</span>
									<span class="pt-3">
										<a href="{{isset($nextTitle) ? URL::to('advance'). '/' . $nextTitle : '#!'}}" class="text-white">
											<i class="fa fa-chevron-right" aria-hidden="true"></i>
										</a>
									</span>
						 			<span>
						 		
						 		<nav class="navbar navbar-expand-lg">
  
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_nav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="main_nav">

 <ul class="navbar-nav">
	
	<li class="nav-item dropdown">
	    <a class="nav-link  dropdown-toggle text-light" href="#" data-toggle="dropdown">
	    	<i class="fa fa-ellipsis-h" aria-hidden="true"></i>
	    </a>
	    <ul class="dropdown-menu fade-up">
			@foreach($Lectures as $data)
				@php
					$title = str_replace(' ','-',$data->title);
				@endphp
				<li><a class="dropdown-item" href="{{URL::to('advance'). '/' . $title}}">{{$data->id . '. ' . $data->title}}  </a></li>
			@endforeach
	    </ul>
	</li>
</ul>
	  
  </div> <!-- navbar-collapse.// -->

</nav>
</span>
</div>

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
			@php echo $lecture->embed @endphp
		@else
			<p>This lecture has been delete contact to administrator.</p>
		@endif
  	</div>
  </div>
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
  	<div class="pt-3">
		  <h4>Links or text related to video</h1><br>
		@if($lecture->status == 0)
            @php 
                $Description = html_entity_decode($data->description);
                echo $Description;
            @endphp
		@else
			<p>This lecture has been delete contact to administrator.</p>
		@endif
  		
  	</div>
  </div>
  
</div>
					</div>
				</div>
			</div>
            <div class="col-lg-3 col-md-6 col-sm-12 order-3 order-lg-3">
               @include('inc.home-right-sidebar')
            </div>
         </div>
      </div>
   </section>

</div>
@include('inc.footer')


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