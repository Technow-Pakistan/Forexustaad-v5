
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
									<h5 class="m-b-10">Signals</h5>
								</div>
								<div class="d-flex justify-content-between">
									<ul class="breadcrumb p-0 m-0 bg-white">
										<li class="breadcrumb-item">
											<a href="{{URL::to('/ustaad/dashboard')}}"><i class="feather icon-home"></i></a>
										</li>
										<li class="breadcrumb-item"><a href="#!">All Signals</a></li>
									</ul>
									<div>
										<a href="{{URL::to('ustaad/signals/add')}}"> Add New Signal</a> / 
										<a href="{{URL::to('ustaad/signals/addPair')}}">Add Category & Pair </a>
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
												<th>User</th>
												<th>Forex Pairs</th>
												<th>Comments</th>
												<th>Date</th>
												<th>Time</th>
												<th>Status</th>
											</tr>
										</thead>
										<tbody>
											@foreach($signalData as $data)
												@php 
													$icount++;
													$pair = $data->getPair();
												@endphp
												<tr>
													<td>{{$icount}}</td>
													<td>{{$data->selectUser}}</td>
													<td>{{ isset($pair->pair) ? $pair->pair : $data->forexPairs}}</td>
													<td><a href="{{URL::to('/ustaad/signals/comment')}}/{{$data->id}}">View Comments</a></td>
													<td>{{$data->date}}</td>
													<td>
                                                        @php 
                                                            $date = strtotime($data->time);
                                                            echo date('h:i a', $date);
                                                        @endphp
                                                    </td>
													<td>
														<span class="badge {{$data->status == 0 ? 'badge-light-success' : 'badge-light-danger'}}">{{$data->status == 0 ? 'Active' : 'Deactive'}}</span>
														<div class="overlay-edit">
															@if($value['memberId'] == 1)
																<form action="{{URL::to('ustaad/signals')}}/{{$data->star == 0 ? 'star' : 'unstar'}}/{{$data->id}}" method="post">
																	<span>
																		<input type="checkbox" class="AllowBroker hiddenCheckBox" name="pending" id="option{{$data->id}}" value="0">
																		<label for="option{{$data->id}}" class="mt-2 mr-2"><i class="fa fa-star {{$data->star == 1 ? 'yellowStar' : ''}}"></i></label>
																	</span>
																</form>
															@endif
															<a href="{{URL::to('/ustaad/signals/edit')}}/{{$data->id}}">
																<button type="button" class="btn btn-icon btn-success"><i class="feather icon-check-circle"></i></button>
															</a>
															@if($data->status == 0)
																<a href="{{URL::to('/ustaad/signals/delete')}}/{{$data->id}}" class="btn btn-icon btn-danger addAction" data-toggle="modal" data-target="#myModal">
																	<i class="feather icon-trash-2"></i>
																</a>
															@elseif($data->status == 1)
																<a href="{{URL::to('/ustaad/signals/active')}}/{{$data->id}}" class="btn btn-icon btn-success addAction" data-toggle="modal" data-target="#myModal">
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
												<th>User</th>
												<th>Forex Pairs</th>
												<th>Date</th>
												<th>Time</th>
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
