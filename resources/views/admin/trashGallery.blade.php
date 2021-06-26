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
										<a href="{{URL::to('/ustaad/dashboard')}}"><i class="fa fa-home"></i></a>
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
															<button type="button" class="btn btn-icon btn-success"><i class="fa fa-edit"></i></button>
														</a>
														<a href="{{URL::to('/ustaad/trashGallery/delete')}}/{{$title}}" class="addAction" data-toggle="modal" data-target="#myModal">
															<button type="button" class="btn btn-icon btn-danger"><i class="fa fa-trash"></i></button>
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


