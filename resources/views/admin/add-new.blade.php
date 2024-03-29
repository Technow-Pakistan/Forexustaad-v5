@include('admin.include.header')
		<!-- [ Main Content ] start -->
		<section class="pcoded-main-container">
			<div class="pcoded-content">
				<!-- [ breadcrumb ] start -->
				<div class="page-header">
					<div class="page-block">
						<div class="row align-items-center">
							<div class="col-md-12">
								<div class="page-header-title">
									<h5 class="m-b-10">New Post</h5>
								</div>
								<ul class="breadcrumb">
									<li class="breadcrumb-item">
										<a href="{{URL::to('/ustaad/dashboard')}}"><i class="fa fa-home"></i></a>
									</li>
									<li class="breadcrumb-item"><a href="#!">Post</a></li>
									<li class="breadcrumb-item">
										<a href="#!">New Post</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<!-- [ breadcrumb ] end -->
				<!-- [ Main Content ] start -->
                <div class="row">
                    <!-- <div class="col-12 mt-4">
                        <h4 class="mb-0">Text alignment</h4>
                        <p class="text-muted mt-0 font-12">You can quickly change the text
                            alignment<code>.text-center .text-right</code>.</p>
					</div> -->
					@php $i=0 @endphp
					@foreach($totalData as $data)
						<div class="col-md-4">
							<div class="card text-center">
								@php
									if($i == 0){
										$url = URL::to('ustaad/fundamental');
									}elseif($i == 1){
										$url = URL::to('ustaad/analysis');
									}elseif($i == 2){
										$url = URL::to('/ustaad/post/viewAll');
									}elseif($i == 3){
										$url = URL::to('/ustaad/signals');
									}elseif($i == 4){
										$url = URL::to('ustaad/strategies');
									}else{
										$url = "#";
									}
								@endphp
								<a href="{{$url}}">
									<div class="card-body addn">
										@if($i == 0)
											<i class=" fas fa-clock text-danger"></i>
										@elseif($i == 1)
											<i class=" far fa-chart-bar text-danger"></i>
										@elseif($i == 2)
											<i class="  fab fa-blogger text-danger"></i>
										@elseif($i == 3)
											<i class="  fas fa-chart-line text-danger"></i>
										@else
											<i class=" fas fa-clock text-danger"></i>
										@endif
											<h4 class="card-title">{{$data->name}}</h4>
										@php $i++ @endphp
									</div>
								</a>
							</div>
						</div>
					@endforeach
					<!-- <div class="col-md-4">
                        <div class="card text-center">
                            <div class="card-body addn">
                                <i class=" fas fa-newspaper text-danger"></i>
                                <h4 class="card-title">NEWSLETTER</h4>
                            </div>
                        </div>
                    </div> -->
                    
                    <!-- <div class="col-md-4">
                        <div class="card text-center">
                            <div class="card-body addn">
                                <i class=" far fa-chart-bar text-danger"></i>
                                <h4 class="card-title">ANALYSIS</h4>
                            </div>
                        </div>
                    </div> -->
                </div>
				<!-- [ Main Content ] end -->
			</div>
		</section>
		<!-- [ Main Content ] end -->

@include('admin.include.footer')
