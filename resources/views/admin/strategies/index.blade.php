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
									<h5 class="m-b-10">Strategies</h5>
								</div>
								<div class="d-flex justify-content-between">
									<ul class="breadcrumb p-0 m-0 bg-white">
										<li class="breadcrumb-item">
											<a href="{{URL::to('/ustaad/dashboard')}}"><i class="fa fa-home"></i></a>
										</li>
										<li class="breadcrumb-item"><a href="#!">All Strategies</a></li>
									</ul>
									<a href="{{URL::to('ustaad/strategies/new')}}">Add New Strategy</a>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- [ breadcrumb ] end -->
				<!-- [ Main Content ] start -->
                <div class="row">
					<div class="col-md-12">
						<div class="card user-profile-list">
							<div class="card-header">All Strategies</div>
							<div class="card-body">
								<div class="dt-responsive table-responsive">
									<table id="user-list-table" class="table nowrap">
										<thead>
											<tr>
												<th>Image</th>
												<th>Title</th>
												<th>Date</th>
												<th>Comments</th>
												<th>Status</th>
											</tr>
										</thead>
										<tbody>
											@foreach($Strategies as $data)
												<tr>
													<td><img src="{{URL::to('storage/app')}}/{{$data->image}}" height="70px" alt="Your Image" /></td>
													<td>{{$data->title}}</td>
													<td>{{$data->created_at->format("M d, Y")}}</td>
													<td><a href="{{URL::to('ustaad/strategies/comment')}}/{{$data->id}}">View Comments</a></td>
													<td>
														<span class="badge {{$data->status == 0 ? 'badge-light-success' : 'badge-light-danger'}}">{{$data->status == 0 ? 'Active' : 'Deactive'}}</span>
														<div class="overlay-edit">
															<a href="{{URL::to('/ustaad/strategies/edit')}}/{{$data->id}}">
																<button type="button" class="btn btn-icon btn-success"><i class="fa fa-edit"></i></button>
															</a>
															@if($data->status == 0)
																<button type="button" href="{{URL::to('/ustaad/strategies/delete')}}/{{$data->id}}" class="btn btn-icon btn-danger addAction" data-toggle="modal" data-target="#myModal">
																	<i class="fa fa-unlock"></i>
																</button>
															@elseif($data->status == 1)
																<button type="button" href="{{URL::to('/ustaad/strategies/active')}}/{{$data->id}}" class="btn btn-icon btn-success addAction" data-toggle="modal" data-target="#myModal">
																	<i class="fa fa-unlock"></i>
																</button>
															@endif
														</div>
													</td>
												</tr>
											@endforeach
										</tbody>
										<tfoot>
											<tr>
												<th>Image</th>
												<th>Title</th>
												<th>Date</th>
												<th>Comments</th>
												<th>Status</th>
											</tr>
										</tfoot>
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


