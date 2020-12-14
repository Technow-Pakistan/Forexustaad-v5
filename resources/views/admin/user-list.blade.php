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
							<h5>User List</h5>
						</div>
						<ul class="breadcrumb">
							<li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
							<li class="breadcrumb-item"><a href="#!">user</a></li>
							<li class="breadcrumb-item"><a href="#!">User list</a></li>
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
										<th>Position</th>
										<th>Phone Number</th>
										<th>Profile</th>
										<th>Start date</th>
										<th>Status</th>
									</tr>
								</thead>
								<tbody>
									@foreach($memberData as $member)
										@if($member->memberId != 1)
											@php
												$memberType = $member->GetMember();
												$memberDetail = $member->GetMemberDetail();
												if($memberDetail->userImage == null ){
													$memberDetail->userImage = "MemberImages/avatar-5.jpg";
												}
											@endphp
											<tr>
												<td>
													<div class="d-inline-block align-middle">
														<img src="{{URL::to('storage/app')}}/{{$memberDetail->userImage}}" alt="user image" class="img-radius align-top m-r-15" style="width:40px;">
														<div class="d-inline-block">
															<h6 class="m-b-0">{{$memberDetail->firstName}}</h6>
															<p class="m-b-0">{{$member->email}}</p>
														</div>
													</div>
												</td>
												<td>{{$memberType->member}}</td>
												<td>{{$memberDetail->mobile}}</td>
												<td  class="veiwProfile"><a href="{{URL::to('ustaad/member/profile')}}/{{$member->id}}" class="veiwProfile">View Profile</a></td>
												<td>{{$member->created_at->format(" d/m/y ")}}</td>
												<td>
													<span class="badge badge-light-success">Active</span>
													<div class="overlay-edit">
													<a href="{{URL::to('ustaad/member/edit')}}/{{$member->id}}"><button type="button" class="btn btn-icon btn-success"><i class="feather icon-check-circle"></i></button></a>
													<a href="{{URL::to('ustaad/member/delete')}}/{{$member->id}}"><button type="button" class="btn btn-icon btn-danger"><i class="feather icon-trash-2"></i></button></a>
													</div>
												</td>
											</tr>
										@endif
									@endforeach
								</tbody>
								<tfoot>
									<tr>
										<th>Name</th>
										<th>Position</th>
										<th>Phone Number</th>
										<th>Profile</th>
										<th>Start date</th>
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
