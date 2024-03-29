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
									<h5 class="m-b-10">Training</h5>
								</div>
								<ul class="breadcrumb">
									<li class="breadcrumb-item">
										<a href="{{URL::to('/ustaad/dashboard')}}"><i class="fa fa-home"></i></a>
									</li>
									<li class="breadcrumb-item"><a href="#!">All Training</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<!-- [ breadcrumb ] end -->
				<!-- [ Main Content ] start -->
				<div class="row">
					<div class="col-md-12">
						<div class="card">
							<div class="card-header">

							</div>	
							<div class="card-body">
								<div class="row">
									<div class="col-12">
										<form action="">
												<div class="alignleft actions form-group">
													<label class="screen-reader-text d-block" for="cat"
														>Filter by category</label
													>
													<div class="d-flex">
														<select
															name="fliter"
															id="fliterSelect"
															class="d-inline-block postform form-control"
														>
														<option value="basic">Basic Training</option>
														<option value="advance" {{$category == "advance" ? 'selected' : ''}}>Advance Training</option>
														<option value="habbit" {{$category == "habbit" ? 'selected' : ''}}>50 Habbits Training</option>
														</select>
														<input
															type="submit"
															id="post-query-submit"
															class="btn btn-outline-primary"
															value="Filter"
														/>
													</div>
												</div>
										</form>
									</div>
								
									
								</div>
							</div>
						</div>
					</div>
				</div>
                <div class="row">
					<div class="col-md-12">
						<form action="{{URL::to('/ustaad/lecture/order')}}" method="post">
							<div class="card user-profile-list">
								<div class="card-header">All Training</div>
								<div class="card-body">
									<div class="dt-responsive table-responsive">
										<table id="user-list-table" class="table nowrap">
											<thead>
												<tr>
													<th>ID</th>
													<th>Title</th>
													@if($category == "advance")
														<th>Member</th>
													@endif
													<th>Comments</th>
													<th>Date</th>
													<th>Status</th>
												</tr>
											</thead>
											<tbody>
												@foreach($Lectures as $data)
													@php
														if($category == "advance"){
															$CommentsCategory = "AdvanceCategory";
														}elseif($category == "basic"){
															$CommentsCategory = "BasicCategory";
														}if($category == "habbit"){
															$CommentsCategory = "HabbitCategory";
														}
													@endphp
													<tr draggable="true" ondragstart="dragit(event)" ondragover="dragover(event)">
														<td>{{$data->poistion}}</td>
														<td>
															{{$data->title}}
															<input type="hidden" name="poistion[]" value="{{$data->id}}">
														</td>
														@if($category == "advance")
															<td>{{$data->vipMember == 0 ? 'Free' : 'Vip'}}</td>
														@endif
														<td><a href="{{URL::to('ustaad')}}/{{$category}}/comment/{{$data->id}}">View Comments</a></td>
														<td>{{$data->created_at->format("M d, Y")}}</td>
														<td>
															<span class="badge {{$data->status == 0 ? 'badge-light-success' : 'badge-light-danger'}}">{{$data->status == 0 ? 'Active' : 'Deactive'}}</span>
															<div class="overlay-edit">
																<a href="{{URL::to('/ustaad/lecture')}}/{{$category}}/edit/{{$data->id}}">
																	<button type="button" class="btn btn-icon btn-success"><i class="fa fa-edit"></i></button>
																</a>
																@if($data->status == 0)
																	<button type="button" href="{{URL::to('/ustaad/lecture')}}/{{$category}}/delete/{{$data->id}}" class="btn btn-icon btn-danger addAction" data-toggle="modal" data-target="#myModal">
																		<i class="fa fa-lock"></i>
																	</button>
																@elseif($data->status == 1)
																	<button type="button" href="{{URL::to('/ustaad/lecture')}}/{{$category}}/active/{{$data->id}}" class="btn btn-icon btn-success addAction" data-toggle="modal" data-target="#myModal">
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
													<th>ID</th>
													<th>Title</th>
													@if($category == "advance")
														<th>Member</th>
													@endif
													<th>Comments</th>
													<th>Date</th>
													<th>Status</th>
												</tr>
											</tfoot>
										</table>
										<input type="hidden" name="category" value="{{$category}}">
										<input type="submit" class="btn btn-primary" value="Submit">
									</div>
								</div>
							</div>
						</form>
					</div>
				</div>
				<!-- [ Main Content ] end -->
			</div>
		</section>
		<!-- [ Main Content ] end -->

@include('admin.include.footer')

