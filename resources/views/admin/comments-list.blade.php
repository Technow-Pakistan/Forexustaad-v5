@include('admin.include.header')
<!-- [ Main Content ] start -->
<div class="pcoded-main-container">
	<div class="pcoded-content">
		<!-- [ breadcrumb ] start -->
		<div class="page-header">
			<div class="page-block">
				<div class="row align-items-center">
					<div class="col-md-12">
						<div class="page-header-title">
							<h5>Comments</h5>
						</div>
						<ul class="breadcrumb">
							<li class="breadcrumb-item"><a href="{{URL::to('/ustaad/dashboard')}}"><i class="feather icon-home"></i></a></li>
							<li class="breadcrumb-item"><a href="#!">Comment</a></li>
							<li class="breadcrumb-item"><a href="#!">Comments</a></li>
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
										<th>Name</th>
										<th>message</th>
										<th>Blog-Title</th>
										<th>Reply</th>
										<th>date</th>
										<th>Status</th>
									</tr>
								</thead>
								<tbody>
									@foreach($totalData as $data)
											@php
                                                $blogPostData = $data->GetPostData();
                                            @endphp
											<tr>
												<td>
													{{$data->name}}
												</td>
												<td class="tdLinkScroll">{{$data->message}}</td>
												<td>{{$blogPostData->mainTitle}}</td>
												<td  class="veiwProfile"><a href="{{URL::to('ustaad/comment/reply')}}/{{$data->id}}" class="veiwProfile">View Replies</a></td>
												<td>{{$data->created_at->format(" d/m/y ")}}</td>
												<td>
													<span class="badge badge-light-success">Active</span>
													<div class="overlay-edit">
                                                        <!-- <a href="{{URL::to('ustaad/comment/edit')}}/{{$data->id}}"><button type="button" class="btn btn-icon btn-success"><i class="feather icon-check-circle"></i></button></a> -->
                                                        <a href="{{URL::to('ustaad/comment/delete')}}/{{$data->id}}" class="addAction" data-toggle="modal" data-target="#myModal"><button type="button" class="btn btn-icon btn-danger"><i class="feather icon-trash-2"></i></button></a>
													</div>
												</td>
											</tr>
									@endforeach
								</tbody>
								<tfoot>
									<tr>
										<th>Name</th>
										<th>message</th>
										<th>Blog-Title</th>
										<th>Reply</th>
										<th>date</th>
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
</div>
<!-- [ Main Content ] end -->
<style>
	.veiwProfile:hover{
			color:white;
	}
</style>

@include('admin.include.footer')

<!-- datatable Js -->
<script src="assets/js/plugins/jquery.dataTables.min.js"></script>
<script src="assets/js/plugins/dataTables.bootstrap4.min.js"></script>


<script>
	$('#user-list-table').DataTable();
</script>