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
							<h5>Contact</h5>
						</div>
						<ul class="breadcrumb">
							<li class="breadcrumb-item"><a href="{{URL::to('/ustaad/dashboard')}}"><i class="feather icon-home"></i></a></li>
							<li class="breadcrumb-item"><a href="#!">Contact</a></li>
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
										<th>Phone</th>
										<th>Email</th>
										<th>Message</th>
										<th>Country</th>
									</tr>
								</thead>
								<tbody>
									@foreach($totalData as $data)
											<tr>
												<td>{{$data->name}}</td>
												<td>{{$data->phone}}</td>
												<td>{{$data->email}}</td>
												<td class="tdLinkScroll">{{$data->message}}</td>
												<td>{{$data->country}}</td>
											</tr>
									@endforeach
								</tbody>
								<tfoot>
									<tr>
										<th>Name</th>
										<th>Phone</th>
										<th>Email</th>
										<th>Message</th>
										<th>Country</th>
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

@include('admin.include.footer')

<!-- datatable Js -->
<script src="assets/js/plugins/jquery.dataTables.min.js"></script>
<script src="assets/js/plugins/dataTables.bootstrap4.min.js"></script>


<script>
	$('#user-list-table').DataTable();
</script>
