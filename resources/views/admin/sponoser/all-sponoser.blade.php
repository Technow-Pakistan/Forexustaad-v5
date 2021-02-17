
@php
	$value =Session::get('admin');
	$icount = 0;
@endphp
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
									<h5 class="m-b-10">All Sponsors</h5>
								</div>
								<div class="d-flex justify-content-between">
									<ul class="breadcrumb p-0 m-0 bg-white">
										<li class="breadcrumb-item">
											<a href="{{URL::to('/ustaad/dashboard')}}"><i class="fa fa-home"></i></a>
										</li>
										<li class="breadcrumb-item"><a href="#!">All Sponsors</a></li>
									</ul>
									<div>
										<a href="{{URL::to('ustaad/sponsor/add')}}"> Add New Sponsors</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- [ breadcrumb ] end -->
				<!-- [ Main Content ] start -->
				<div class="row">
					<div class="col-lg-12">
						<div class="card user-profile-list">
							<div class="card-body">
								<div class="dt-responsive table-responsive">
									<table id="user-list-table" class="table nowrap">
										<thead>
											<tr>
												<th>ID</th>
												<th>Image</th>
												<th>link</th>
												<th>Date</th>
												<th>Status</th>
											</tr>
										</thead>
										<tbody>
											@foreach($sponoserData as $data)
												@php 
													$icount++;
												@endphp
												<tr>
													<td>{{$icount}}</td>
													<td><img src="{{URL::to('storage/app')}}/{{$data->image}}" class="thumbnail" width="100" height="70"></td>
													<td>{{$data->link}}</td>
													<td>{{$data->created_at->format("M d, Y")}}</td>
													<td>
														<span class="badge {{$data->status == 0 ? 'badge-light-success' : 'badge-light-danger'}}">{{$data->status == 0 ? 'Active' : 'Deactive'}}</span>
														<div class="overlay-edit">
															<a href="{{URL::to('/ustaad/sponsor/edit')}}/{{$data->id}}">
																<button type="button" class="btn btn-icon btn-success"><i class="fa fa-edit"></i></button>
															</a>
															@if($data->status == 0)
																<button type="button" href="{{URL::to('/ustaad/sponsor/delete')}}/{{$data->id}}" class="btn btn-icon btn-danger addAction" data-toggle="modal" data-target="#myModal"><i class="fa fa-lock"></i></button>
															@elseif($data->status == 1)
																<button type="button" href="{{URL::to('/ustaad/sponsor/active')}}/{{$data->id}}" class="btn btn-icon btn-success addAction" data-toggle="modal" data-target="#myModal"><i class="fa fa-unlock"></i></button>
															@endif
														</div>
													</td>
												</tr>
											@endforeach
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>

				
				<!-- [ Main Content ] end -->
			</div>
		</section>
		<!-- [ Main Content ] end -->

@include('admin.include.footer')