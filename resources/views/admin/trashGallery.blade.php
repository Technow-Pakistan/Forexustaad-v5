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
									<h5 class="m-b-10">Trash</h5>
								</div>
								<ul class="breadcrumb">
									<li class="breadcrumb-item">
										<a href="{{URL::to('/ustaad/dashboard')}}"><i class="feather icon-home"></i></a>
									</li>
									<li class="breadcrumb-item"><a href="#!">Trash Gallery</a></li>
									<!-- <li class="breadcrumb-item">
										<a href="#!">Invoice Summary</a>
									</li> -->
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
									<div class="col-4">
										<div class="alignleft actions bulkactions">
											<label for="bulk-action-selector-top" class="d-block"
												>Select bulk action</label
											>
											<select
												name="action"
												class="form-control w-75 d-inline-block"
												id="bulk-action-selector-top"
											>
												<option value="-1">Bulk Actions</option>
												<option value="edit" class="hide-if-no-js">Edit</option>
												<option value="trash">Delete</option>
											</select>
											<input
												type="submit"
												id="doaction"
												class="btn btn-outline-primary"
												value="Apply"
											/>
										</div>
									</div>
									<div class="col-8">
										<div class="row">
											<div class="col-6">
												<div class="alignleft actions form-group">
													<label for="filter-by-date" class="screen-reader-text"
														>Filter by date</label
													>
													<select
														name="m"
														id="filter-by-date"
														class="form-control"
													>
														<option selected="selected" value="0">
															All dates
														</option>
														<option value="201912">December 2019</option>
													</select>
												</div>
											</div>
											<div class="col-6">
												<div class="alignleft actions form-group">
													<label class="screen-reader-text d-block" for="cat"
														>Filter by category</label
													>
													<div class="">
														<select
															name="cat"
															id="cat"
															class="w-75 d-inline-block postform form-control"
														>
															<option value="0" selected="selected">
																All Categories
															</option>
															<option class="level-0" value="1">
																Uncategorized
															</option>
														</select>
														<input
															type="submit"
															name="filter_action"
															id="post-query-submit"
															class="btn btn-outline-primary"
															value="Filter"
														/>
													</div>
												</div>
											</div>
										</div>
									</div>
								
									
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12">
						<div class="card user-profile-list">
							<div class="card-body">
								<div class="dt-responsive table-responsive">
									<table id="user-list-table" class="table nowrap">
										<thead>
											<tr>
												<th>Image</th>
												<th>Belongs</th>
												<th>User</th>
												<th>Operation</th>
											</tr>
										</thead>
										<tbody>
											@foreach($totalData as $data)
												@php 
													$user = $data->GetMember();
                                                    $title = str_replace("/","@-",$data->image);
												@endphp
												<tr>
													<td>
														<img src="{{URL::to('storage/app')}}/{{$data->image}}" class="thumbnail" width="70px" height="50px" alt="">
													</td>
													<td>{{$data->belongs}}</td>
													<td>{{$user->username}}</td>
													<td>
														<a href="{{URL::to('/ustaad/trashGallery/restore')}}/{{$title}}">
															<button type="button" class="btn btn-icon btn-success"><i class="feather icon-check-circle"></i></button>
														</a>
														<a href="{{URL::to('/ustaad/trashGallery/delete')}}/{{$title}}" class="addAction" data-toggle="modal" data-target="#myModal">
															<button type="button" class="btn btn-icon btn-danger"><i class="feather icon-trash-2"></i></button>
														</a>
														</div>
													</td>
												</tr>
											@endforeach
										</tbody>
										<tfoot>
											<tr>
												<th>Image</th>
												<th>Belongs</th>
												<th>User</th>
												<th>Operation</th>
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


