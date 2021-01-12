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
								<ul class="breadcrumb">
									<li class="breadcrumb-item">
										<a href="{{URL::to('/ustaad/dashboard')}}"><i class="feather icon-home"></i></a>
									</li>
									<li class="breadcrumb-item"><a href="#!">All Strategies</a></li>
								</ul>
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
												<th>Status</th>
											</tr>
										</thead>
										<tbody>
											@foreach($Strategies as $data)
												<tr>
													<td><img src="{{URL::to('storage/app')}}/{{$data->image}}" height="150px" alt="Your Image" /></td>
													<td>{{$data->title}}</td>
													<td>{{$data->created_at->format("M d, Y")}}</td>
													<td>
														<span class="badge {{$data->status == 0 ? 'badge-light-success' : 'badge-light-danger'}}">{{$data->status == 0 ? 'Active' : 'Deactive'}}</span>
														<div class="overlay-edit">
															<a href="{{URL::to('/ustaad/strategies/edit')}}/{{$data->id}}">
																<button type="button" class="btn btn-icon btn-success"><i class="feather icon-check-circle"></i></button>
															</a>
															<!-- <button type="button" class="btn btn-icon btn-success"><i class="feather icon-check-circle"></i></button> -->
															@if($data->status == 0)
																<a href="{{URL::to('/ustaad/strategies/delete')}}/{{$data->id}}" class="btn btn-icon btn-danger addAction" data-toggle="modal" data-target="#myModal">
																	<i class="feather icon-trash-2"></i>
																</a>
															@elseif($data->status == 1)
																<a href="{{URL::to('/ustaad/strategies/active')}}/{{$data->id}}" class="btn btn-icon btn-success addAction" data-toggle="modal" data-target="#myModal">
																	<i class="feather icon-unlock"></i>
																</a>
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
		<!-- Data Table -->
		<script src="assets/js/plugins/jquery.dataTables.min.js"></script>
		<script src="assets/js/plugins/dataTables.bootstrap4.min.js"></script>

<script>
	$('#user-list-table').DataTable();
</script>


