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
									<li class="breadcrumb-item"><a href="#!">Trash</a></li>
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
												<th>Title</th>
												<th>Belongs</th>
												<th>User</th>
												<th>Operation</th>
											</tr>
										</thead>
										<tbody>
											@foreach($totalData as $data)
												@php 
													$user = $data->GetMember();
												@endphp
												<tr>
													<td>
														{{$data->deleteTitle}}
													</td>
													<td>{{$data->category}}</td>
													<td>{{$user->username}}</td>
													<td>
														<a href="{{URL::to('/ustaad')}}/{{$data->trashItem}}/trashRestore/{{$data->deleteId}}">
															<button type="button" class="btn btn-icon btn-success"><i class="fa fa-trash-restore"></i></button>
														</a>
														<button href="{{URL::to('/ustaad/')}}/{{$data->trashItem}}/delete/{{$data->deleteId}}" data-toggle="modal" data-target="#myModal" type="button" class="btn btn-icon btn-danger "><i class="fa fa-trash"></i></button>
													</td>
												</tr>
											@endforeach
										</tbody>
										<tfoot>
											<tr>
												<th>Title</th>
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


