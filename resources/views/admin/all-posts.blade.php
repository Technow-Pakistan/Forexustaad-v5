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
									<h5 class="m-b-10">All Posts</h5>
								</div>
								<ul class="breadcrumb">
									<li class="breadcrumb-item">
										<a href="index.html"><i class="feather icon-home"></i></a>
									</li>
									<li class="breadcrumb-item"><a href="#!">All Posts</a></li>
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
												<th>Title</th>
												<th>Category</th>
												<th>Tsgs</th>
												<th>Date</th>
												<th>Status</th>
											</tr>
										</thead>
										<tbody>
											@foreach($allPosts as $post)
												@php 
													$category = $post->GetCategory();
													$count = $post->GetCount();
													$c = count($count);
												@endphp
												<tr>
													<td>
														{{$post->mainTitle}}
													</td>
													<td>{{$category->mainCategory}}</td>
													<td>{{$c}}</td>
													<td>{{$post->publishDate}}</td>
													<td>
														<span class="badge {{$post->status == 1 ? 'badge-light-success' : 'badge-light-danger'}}">{{$post->status == 1 ? 'Active' : 'Deactive'}}</span>
														<div class="overlay-edit">
															<!-- <a href="{{URL::to('/admin/post/edit')}}/{{$post->id}}">
																<button type="button" class="btn btn-icon btn-success"><i class="feather icon-check-circle"></i></button>
															</a> -->
															<button type="button" class="btn btn-icon btn-success"><i class="feather icon-check-circle"></i></button>
															@if($post->status == 1)
																<a href="{{URL::to('/admin/post/delete')}}/{{$post->id}}">
																	<button type="button" class="btn btn-icon btn-danger"><i class="feather icon-trash-2"></i></button>
																</a>
															@elseif($post->status == 0)
																<a href="{{URL::to('/admin/post/active')}}/{{$post->id}}">
																	<button type="button" class="btn btn-icon btn-success"><i class="feather icon-unlock"></i></button>
																</a>
															@endif
														</div>
													</td>
												</tr>
											@endforeach
											<!-- <tr>
												<td>
													Posts
												</td>
												<td>Accountant</td>
												<td>Tokyo</td>
												<td>63</td>
												<td>2011/07/25</td>
												<td>
													<span class="badge badge-light-danger">Disabled</span>
													<div class="overlay-edit">
														<button type="button" class="btn btn-icon btn-success"><i class="feather icon-check-circle"></i></button>
														<button type="button" class="btn btn-icon btn-danger"><i class="feather icon-trash-2"></i></button>
													</div>
												</td>
											</tr>
											<tr>
												<td>
													Posts
												</td>
												<td>Junior Technical Author</td>
												<td>San Francisco</td>
												<td>66</td>
												<td>2009/01/12</td>
												<td>
													<span class="badge badge-light-danger">Disabled</span>
													<div class="overlay-edit">
														<button type="button" class="btn btn-icon btn-success"><i class="feather icon-check-circle"></i></button>
														<button type="button" class="btn btn-icon btn-danger"><i class="feather icon-trash-2"></i></button>
													</div>
												</td>
											</tr>
											<tr>
												<td>
													Posts
												</td>
												<td>Senior Javascript Developer</td>
												<td>Edinburgh</td>
												<td>22</td>
												<td>2012/03/29</td>
												<td>
													<span class="badge badge-light-success">Active</span>
													<div class="overlay-edit">
														<button type="button" class="btn btn-icon btn-success"><i class="feather icon-check-circle"></i></button>
														<button type="button" class="btn btn-icon btn-danger"><i class="feather icon-trash-2"></i></button>
													</div>
												</td>
											</tr>
											<tr>
												<td>
													Posts
												</td>
												<td>Accountant</td>
												<td>Tokyo</td>
												<td>33</td>
												<td>2008/11/28</td>
												<td>
													<span class="badge badge-light-success">Active</span>
													<div class="overlay-edit">
														<button type="button" class="btn btn-icon btn-success"><i class="feather icon-check-circle"></i></button>
														<button type="button" class="btn btn-icon btn-danger"><i class="feather icon-trash-2"></i></button>
													</div>
												</td>
											</tr>
											<tr>
												<td>
													Posts
												</td>
												<td>Integration Specialist</td>
												<td>New York</td>
												<td>61</td>
												<td>2012/12/02</td>
												<td>
													<span class="badge badge-light-danger">Disabled</span>
													<div class="overlay-edit">
														<button type="button" class="btn btn-icon btn-success"><i class="feather icon-check-circle"></i></button>
														<button type="button" class="btn btn-icon btn-danger"><i class="feather icon-trash-2"></i></button>
													</div>
												</td>
											</tr> -->
										</tbody>
										<tfoot>
											<tr>
												<th>Title</th>
												<th>Category</th>
												<th>Tsgs</th>
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

