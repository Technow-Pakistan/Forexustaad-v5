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
									<h5 class="m-b-10">All Analysis</h5>
								</div>
								<div class="d-flex justify-content-between">
									<ul class="breadcrumb p-0 m-0 bg-white">
										<li class="breadcrumb-item">
											<a href="{{URL::to('/ustaad/dashboard')}}"><i class="feather icon-home"></i></a>
										</li>
										<li class="breadcrumb-item"><a href="#!">All Analysis</a></li>
									</ul>
									<a href="{{URL::to('ustaad/analysis/add')}}">Add New Analysis</a>
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
												<th>Id</th>
												<th>Image</th>
												<th>Title</th>
												<th>Date</th>
												<th>Status</th>
											</tr>
										</thead>
										<tbody>
											@foreach($Analysis as $data)
												@php $icount++; @endphp
												<tr >
                                                    <td>{{$icount}}</td>
													<td>
														<div>
															<img src="{{URL::to('storage/app')}}/{{$data->image}}" alt="" class="img-fluid" width="150">
														</div>
													</td>
													<td>{{$data->title}}</td>
													<td>{{$data->created_at->format('Md, Y')}}</td>
													<td>
                                                        <span class="badge {{$data->status == 1 ? 'badge-light-success' : 'badge-light-danger'}}">{{$data->status == 1 ? 'Active' : 'Deactive'}}</span>
														<div class="overlay-edit">
															<a href="{{URL::to('/ustaad/analysis/edit')}}/{{$data->id}}"> <button type="button" class="btn btn-icon btn-success"><i class="feather icon-check-circle"></i></button></a>
															@if($data->status == 1)
																<a href="{{URL::to('/ustaad/analysis/deactive')}}/{{$data->id}}" class="btn btn-icon btn-danger addAction" data-toggle="modal" data-target="#myModal"><i class="feather icon-trash-2"></i></a>
															@elseif($data->status == 0)
																<a href="{{URL::to('/ustaad/analysis/active')}}/{{$data->id}}" class="btn btn-icon btn-success addAction" data-toggle="modal" data-target="#myModal">
																	<i class="feather icon-unlock"></i>
																</a>
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
