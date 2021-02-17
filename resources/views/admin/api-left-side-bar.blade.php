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
									<h5 class="m-b-10">API Left Side Bar</h5>
								</div> 
								<ul class="breadcrumb">
									<li class="breadcrumb-item">
										<a href="{{URL::to('/ustaad/dashboard')}}"><i class="fa fa-home"></i></a>
									</li>
									<li class="breadcrumb-item"><a href="#!">API Left Side</a></li>
									
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
                                Left Side Bar API
							</div>	
							<div class="card-body">
								<form class="apiForm" action="" method="post">
									<div class="form-group">
										<label for="">Title</label>
										<input type="text" name="title" class="form-control apiTitle" required>
									</div>
									<div class="form-group">
										<label for="">API Link</label>
										<textarea type="text" name="link" class="form-control apiLink" required></textarea>
									</div>
									<div class="form-group">
										<label for="">Area</label>
										<select name="area" class="form-control apiArea" id="">
											<option value="Top">Top</option>
											<option value="Center">Center</option>
											<option value="Bottom">Bottom</option>
										</select>
									</div>
									<input type="submit" id="doaction" class="btn btn-outline-primary mt-4 apiButton" value="Add">
								</form>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12">
						<div class="card user-profile-list">
							<div class="card-body">
								<div class="dt-responsive table-responsive">
								<form action="{{URL::to('/ustaad/apileftorder')}}" method="post">
										<table class="table nowrap" id="user-list-table">
											<thead>
												<tr>
													<th>ID</th>
													<th>Title</th>
													<th>Link</th>
													<th>Area</th>
													
													<th>Status</th>
												</tr>
											</thead>
											<tbody>
													@foreach($totalData as $data)
														<tr class="row1">
															<td>{{$data->poistion}}</td>
															<td>
																<input type="hidden" name="poistion[]" value="{{$data->id}}">
																{{$data->title}}
															</td>
															<td class="tdLinkScroll">{{$data->link}}</td>
															<td>{{$data->area}}</td>
														
															<td>
																<span class="badge badge-light-success">Active</span>
																<div class="overlay-edit editlink" value="{{$data->id}}">
																	<button type="button" class="btn btn-icon btn-success"><i class="fa fa-edit"></i></button>
																	<button type="button" href="{{URL::to('/ustaad/api/api-left/trash')}}/{{$data->id}}" class="btn btn-icon btn-danger addAction" data-toggle="modal" data-target="#myModal"><i class="fa fa-trash"></i></button>
																</div>
															</td>
														</tr>
													@endforeach

											</tbody>
											
										</table>
										<input type="submit" value="Submit">
									</form>
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
	<!-- edit Content -->
<script>
	$(".editlink").on("click",function(){
		var id = $(this).attr('value');
		var title = $(this).parent().parent()[0].childNodes[1].innerText;
		var api = $(this).parent().parent()[0].childNodes[3].innerText;
		var area = $(this).parent().parent()[0].childNodes[5].innerText;
		$(".apiTitle").val(title);
		$(".apiLink").val(api);
		$(".apiArea").find("."+area).attr("selected",true);
		$(".apiArea").val(area);
		$(".apiButton").val("Update");
		$(".apiButton").attr("class","btn btn-outline-danger mt-4 apiButton");
		$(".apiForm").attr("action","{{URL::to('/ustaad/api/api-left/edit/')}}/"+id+"");
		console.log(title);
		
	});
</script>


