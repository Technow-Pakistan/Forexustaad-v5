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
								<div class="d-flex justify-content-between">
									<ul class="breadcrumb p-0 m-0 bg-white">
										<li class="breadcrumb-item">
											<a href="{{URL::to('/ustaad/dashboard')}}"><i class="fa fa-home"></i></a>
										</li>
										<li class="breadcrumb-item"><a href="#!">All Posts</a></li>
									</ul>
									<a href="{{URL::to('ustaad/post/new/4')}}">Add New Post</a>
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
												<th>Title</th>
												<th>Category</th>
												<th>Comments</th>
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
													<td><a href="{{URL::to('ustaad/post/comment')}}/{{$post->id}}">View Comments</a></td>
													<td>{{$c}}</td>
													<td>{{$post->publishDate}}</td>
													<td>
														<span class="badge {{$post->status == 1 ? 'badge-light-success' : 'badge-light-danger'}}">{{$post->status == 1 ? 'Active' : 'Deactive'}}</span>
														<div class="overlay-edit">
															<a href="{{URL::to('/ustaad/post/edit')}}/{{$post->id}}">
																<button type="button" class="btn btn-icon btn-success"><i class="fa fa-edit"></i></button>
															</a>
															@if($post->status == 1)
																<button type="button" href="{{URL::to('/ustaad/post/delete')}}/{{$post->id}}" class="btn btn-icon btn-danger addAction" data-toggle="modal" data-target="#myModal">
																	<i class="fa fa-lock"></i>
																</button>
															@elseif($post->status == 0)
																<button type="button" href="{{URL::to('/ustaad/post/active')}}/{{$post->id}}" class="btn btn-icon btn-success addAction" data-toggle="modal" data-target="#myModal">
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


