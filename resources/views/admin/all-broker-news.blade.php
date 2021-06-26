@php
	$value =Session::get('admin');
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
									<h5 class="m-b-10">Broker News</h5>
								</div>
								<div class="d-flex justify-content-between">
									<ul class="breadcrumb p-0 m-0 bg-white">
										<li class="breadcrumb-item">
											<a href="{{URL::to('/ustaad/dashboard')}}"><i class="fa fa-home"></i></a>
										</li>
										<li class="breadcrumb-item"><a href="#!">All Broker News</a></li>
									</ul>
									<div>
										<a href="{{URL::to('ustaad/brokersNews/new')}}">Add Broker News</a>
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
												<th>News Image</th>
												<th>News Title</th>
												<th>Broker Name</th>
												<th>Comments</th>
												<th>Status</th>
											</tr>
										</thead>
										<tbody>
											@foreach($brokerNews as $news)
												@php
													$pendingNews = $news->GetPendingNews();
													$broker = $news->GetBrokerInfo();
												@endphp
												@if($pendingNews == null)
													<tr>
														<td>
															<div>
																<img src="{{URL::to('storage/app')}}/{{$news->image}}" alt="" class="img-fluid" width="150">
															</div>
														</td>
														<td>{{$news->NewsTitle}}</td>
														<td>{{$broker->title}}</td>
														<td><a href="{{URL::to('ustaad/brokersNews/comment')}}/{{$news->id}}">View Comments</a></td>
														<td>
															@if($news->pending == 0)
																<span class="badge badge-light-success">Active</span>
																<div class="overlay-edit">
																	<a href="{{URL::to('/ustaad/brokersNews/edit')}}/{{$news->id}}"> <button type="button" class="btn btn-icon btn-success"><i class="fa fa-edit"></i></button></a>
																	<button type="button" href="{{URL::to('/ustaad/brokersNews/trash')}}/{{$news->id}}" data-toggle="modal" data-target="#myModal" class="addAction btn btn-icon btn-danger"><i class="fa fa-trash"></i></button>
																</div>
															@elseif($value['memberId'] != 6)
																<span class="badge badge-light-warning">Pending</span>
																<div class="overlay-edit">
																	<form action="{{URL::to('ustaad/brokersNews/allow')}}/{{$news->id}}" method="post">
																		<span class="badge badge-light-warning">
																			Allow
																			<input type="checkbox" class="AllowBroker" name="pending" id="" value="0">
																		</span>
																	</form>
																		<a href="{{URL::to('/ustaad/brokersNews/edit')}}/{{$news->id}}"> <button type="button" class="btn btn-icon btn-success"><i class="fa fa-edit"></i></button></a>
																		<button type="button" href="{{URL::to('/ustaad/brokersNews/trash')}}/{{$news->id}}" data-toggle="modal" data-target="#myModal" class="addAction btn btn-icon btn-danger"><i class="fa fa-trash"></i></button>
																</div>
															@elseif($value['memberId'] == 6)
																<span class="badge badge-light-warning">Pending</span>
																<div class="overlay-edit">
																	<a href="{{URL::to('/ustaad/brokersNews/edit')}}/{{$news->id}}"> <button type="button" class="btn btn-icon btn-success"><i class="fa fa-edit"></i></button></a>
																	<button href="{{URL::to('/ustaad/brokersNews/trash')}}/{{$news->id}}" data-toggle="modal" data-target="#myModal" type="button" class="btn btn-icon btn-danger addAction"><i class="fa fa-trash"></i></button>
																</div>
															@endif
														</td>
													</tr>
												@endif
											@endforeach
										</tbody>
										<tfoot>
											<tr>
												<th>News Image</th>
												<th>News Title</th>
												<th>Broker Name</th>
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


