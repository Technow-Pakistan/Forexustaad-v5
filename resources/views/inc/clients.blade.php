
@if(count($SponoserAddActive) > 0)
	<section class="page-section gray-sec">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="content_area_heading large-heading fadeInUp wow">
						
						<p class=" h1heading_title wow animated fadeInUp">
							Our Sponsers
						</p>
						<div class="heading_border wow animated fadeInUp">
							<span class="two"></span><span class="three"></span>
						</div>	
					</div>
				</div>
			</div>
			<section class="customer-logos slider fadeInUp wow" data-wow-delay="0.2s">
				@foreach($SponoserAddActive as $sponoserAdd)
					<div class="">
						<img src="{{URL::to('storage/app')}}/{{$sponoserAdd->image}}" class="card-img">
					</div>
		      	@endforeach
		   </section>
		</div>
	</section>
@endif

