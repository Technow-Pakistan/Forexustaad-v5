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
							<h5>Replies</h5>
						</div>
						<ul class="breadcrumb">
							<li class="breadcrumb-item"><a href="{{URL::to('/ustaad/dashboard')}}"><i class="fa fa-home"></i></a></li>
							<li class="breadcrumb-item"><a href="#!">Comment</a></li>
							<li class="breadcrumb-item"><a href="#!">Replies</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<!-- [ breadcrumb ] end -->
		<!-- [ Main Content ] start -->
		
		<div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                Reply
                            </div>
                            <div class="card-body">
								<form class="socialForm" action="" method="post">
									<div class="form-group pt-4">
										<label for="" class="">Enter Message </label>
										<textarea class="form-control mt-2" name="message" placeholder="Messeage" rows="5" required></textarea>
										<input type="hidden" name="commentId" value="{{$id}}">
										@php 
											$value =Session::get('admin');
										@endphp
										<input type="hidden" name="userId" value="{{$value['id']}}">
									</div>
									<input type="submit" id="doaction" class="btn btn-outline-primary mt-4 socialButton" value="Add">
								</form>
							</div>
                        </div>
                    </div>
                </div>

		<!-- [ Main Content ] end -->
	</div>
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
										<th>date</th>
										<th>Status</th>
									</tr>
								</thead>
								<tbody>
									@foreach($totalData as $data)
										@php
											$user = $data->GetUser();
										@endphp
											<tr>
												<td>{{$user->firstName}}</td>
												<td class="tdLinkScroll">{{$data->message}}</td>
												<td>{{$data->created_at->format(" d/m/y ")}}</td>
												<td>
													<span class="badge badge-light-success">Active</span>
													<div class="overlay-edit">
														<a href="{{URL::to('ustaad/comment/reply/delete')}}/{{$data->id}}"><button type="button" class="btn btn-icon btn-danger"><i class="fa fa-trash-2"></i></button></a>
													</div>
												</td>
											</tr>
									@endforeach
								</tbody>
								<tfoot>
									<tr>
										<th>Name</th>
										<th>message</th>
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