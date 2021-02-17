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
									<h5 class="m-b-10">Header</h5>
								</div>
								<ul class="breadcrumb">
									<li class="breadcrumb-item">
										<a href="{{URL::to('ustaad/dashboard')}}"><i class="fa fa-home"></i></a>
									</li>
									<li class="breadcrumb-item"><a href="#!">Logo</a></li>
									<!-- <li class="breadcrumb-item"><a href="#!">Invoice Summary</a></li> -->
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
							<div class="card-header">Change or Add Logo</div>
							<div class="card-body">
								<form action="" class="socialForm" method="post" enctype="multipart/form-data">
									<div class="form-group">
										<span>
											<img
												id="slider1"
												src="{{URL::to('/storage/app')}}/{{$featureLogo->logo}}"
												class="img-fluid imageSrc"
												alt="your image"
											/>
										</span>
										<div class="custom-file my-3 h-100">
											<input type="file" class="form-control h-100 editLogoImage" name="file_photo" id="customFile" required>
										</div>
										<!-- <div class="custom-file my-3">
											<input
												type="file"
												class="custom-file-input"
												id="customFile"
												name="file_photo"
												onchange="sliderimgone(this);"
												required
											/>
											<label class="custom-file-label" for="customFile"
												>Choose file</label
											>
										</div> -->
									</div>
									<div class="form-group pt-2">
										<label for="" class="">Active </label>
										<input type="checkbox" name="active" class="logoCheckBox" value="1">
									</div>

									<input type="submit" class="btn btn-info mt-3 socialButton" value="Upload">
								</form>
								<table class="table mt-5">
									<thead class="bg-primary text-white">
										<tr>
											<th>Image</th>
											<th>Active</th>
											<th>Date</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody class="border border-primary">
										@foreach($totalData as $data)
										<tr>
											<td>
												<p class="src">{{URL::to('/storage/app')}}/{{$data->logo}}</p>
												<img
													id="slider1"
													src="{{URL::to('/storage/app')}}/{{$data->logo}}"
													class="img-fluid"
													alt="your image"
												/>
											</td>
											<td>
												{{$data->active==1 ? "Active" : ""}}
											</td>
											<td>
												{{$data->updated_at->format("d/m/Y")}}
											</td>
											<td>
												<a href="#">
													<i class="far fa-edit text-success mr-2 editlink" value="{{$data->id}}"></i>
												</a>
												<a href="{{URL::to('/ustaad/logo-panel/trash')}}/{{$data->id}}" class="addAction" data-toggle="modal" data-target="#myModal">
													<i class="fa fa-times text-danger"></i>
												</a>
											</td>
										</tr>
										@endforeach
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<div class="col-md-6">
						<div class="card">
							<div class="card-header">Change or Add Favicon</div>
							<div class="card-body">
								<form action="{{URL::to('/ustaad/logo-favicon')}}" class="socialForm2" method="post" enctype="multipart/form-data">
									<div class="form-group">
										<span>
											<img
												id="slider1"
												src="{{URL::to('/storage/app')}}/{{$featurefavicon->favicon}}"
												class="img-fluid imageSrc2"
												alt="your image"
												width="100"
											/>
										</span>
										<div class="custom-file my-3 h-100">
											<input type="file" class="form-control h-100 editLogoImage2" name="file_photo" id="customFile" required>
										</div>
										<!-- <div class="custom-file my-3">
											<input
												type="file"
												class="custom-file-input"
												id="customFile"
												name="file_photo"
												onchange="sliderimgone(this);"
												required
											/>
											<label class="custom-file-label" for="customFile"
												>Choose file</label
											>
										</div> -->
									</div>
									<div class="form-group pt-2">
										<label for="" class="">Active </label>
										<input type="checkbox" class="logoCheckBox2" name="active" value="1">
									</div>

									<input type="submit" class="btn btn-info mt-3 socialButton2" value="Upload">
								</form>
								<table class="table mt-5">
									<thead class="bg-primary text-white">
										<tr>
											<th>Image</th>
											<th>Active</th>
											<th>Date</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody class="border border-primary">
										@foreach($totalfaviconData as $data)
											<tr>
												<td>
													<p class="src2">{{URL::to('/storage/app')}}/{{$data->favicon}}</p>
													<img
														id="slider1"
														src="{{URL::to('/storage/app')}}/{{$data->favicon}}"
														class="img-fluid"
														alt="your image"
														width="100"
													/>
												</td>
												<td>
													{{$data->active==1 ? "Active" : ""}}
												</td>
												<td>
													{{$data->updated_at->format("d/m/Y")}}
												</td>
												<td>
													<a href="#">
														<i class="far fa-edit text-success mr-2 editlink2" value="{{$data->id}}"></i>
													</a>
													<a href="{{URL::to('/ustaad/logo-favicon/trash')}}/{{$data->id}}" class="addAction" data-toggle="modal" data-target="#myModal">
														<i class="fa fa-times text-danger"></i>
													</a>
												</td>
											</tr>
										@endforeach
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
				<!-- [ Main Content ] end -->
			</div>
		</section>
		<!-- [ Main Content ] end -->

@include('admin.include.footer')
<script>
	$(".src").hide();
	$(".editlink").on("click",function(){
		var id = $(this).attr('value');
		var src = $(this).parent().parent().parent().children()[0].childNodes[1].innerText;
		var active = $(this).parent().parent().parent().children()[1].innerText;
		if(active == "Active"){
			$(".logoCheckBox").attr("checked",true);
		}else{
			$(".logoCheckBox").attr("checked",false);
		}
		$(".editLogoImage").attr("required",false);
		$(".imageSrc").attr("src",src);
		$(".socialButton").val("Update");
		$(".socialButton").attr("class","btn btn-outline-danger mt-4 socialButton");
		$(".socialForm").attr("action","{{URL::to('/ustaad/logo-panel/edit/')}}/"+id+"");
		console.log(active);
		
	});

	
	$(".src2").hide();
	$(".editlink2").on("click",function(){
		var id2 = $(this).attr('value');
		var src2 = $(this).parent().parent().parent().children()[0].childNodes[1].innerText;
		var active2 = $(this).parent().parent().parent().children()[1].innerText;
		if(active2 == "Active"){
			$(".logoCheckBox2").attr("checked",true);
		}else{
			$(".logoCheckBox2").attr("checked",false);
		}
		$(".editLogoImage2").attr("required",false);
		$(".imageSrc2").attr("src",src2);
		$(".socialButton2").val("Update");
		$(".socialButton2").attr("class","btn btn-outline-danger mt-4 socialButton2");
		$(".socialForm2").attr("action","{{URL::to('/ustaad/logo-favicon/edit/')}}/"+id2+"");
		console.log(active2);
		
	});
</script>
