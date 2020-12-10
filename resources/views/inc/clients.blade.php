<section class="page-section gray-sec">
		<div class="container">
			<div class="row">
				<div class="col-12">
					<div class="content_area_heading large-heading fadeInUp wow">
						
						<h1 class="heading_title wow animated fadeInUp">
							Our Sponsers
						</h1>
						<div class="heading_border wow animated fadeInUp">
							<span class="two"></span><span class="three"></span>
						</div>	
					</div>
				</div>
			</div>
			<section class="customer-logos slider fadeInUp wow" data-wow-delay="0.2s">
				<?php 
				$clients = array('exness.png','cabana.png','liquidity.png');
				$countsClients = count($clients);
				?>
				@foreach ($clients as $value) 
					<div class="">
						<img src="{{URL::to('public/assets/assets/img/brands')}}/{{$value}}" class="card-img">
					</div>
		      	@endforeach
		   </section>
		</div>
	</section>

