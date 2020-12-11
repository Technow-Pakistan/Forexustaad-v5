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
									<h5 class="m-b-10">Right Side Bar Banners</h5>
								</div>
								<ul class="breadcrumb">
									<li class="breadcrumb-item">
										<a href="index.html"><i class="feather icon-home"></i></a>
									</li>
									<li class="breadcrumb-item">
										<a href="#!">Right Side Bar Banners</a>
									</li>
									<!-- <li class="breadcrumb-item">
										<a href="#!"></a>
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
							<div class="card-header">Right Side Bar Banner</div>
							<div class="card-body">
								<form action="" class="form1" method="post" enctype="multipart/form-data">
									<div class="text-lg-center">
										@if($totalData[0]->banner != null)
											<img
												id="slider1"
												src="{{URL::to('/storage/app')}}/{{$totalData[0]->banner}}"
												class="img-fluid"
												alt="your image"
											/>							
										@else
											@php
												echo $totalData[0]->htmlLink;
											@endphp
										@endif
										<div class="custom-file my-3 h-100">
											<input type="file" class="form-control h-100" name="file_photo" id="file1">
										</div>
										<div class="fileError text-danger text-right"></div>
									</div>
									<div class="form-group pt-2">
										<label for="">Enter Link</label>
										<input type="link" name="link" class="form-control fileLink">
									</div>
									<div class="form-group pt-2">
										<label for="">Enter HTMLLink</label>
										<textarea name="htmlLink" class="form-control htmlLink"></textarea>
									</div>
									<div class="form-group pt-2">
										<label for="" class="">Start Date </label>
										<input type="date" class="form-control" name="start" required>
									</div>
									<div class="form-group pt-2">
										<label for="" class="">End Date </label>
										<input type="date" class="form-control" name="end" required>
									</div>
									<div class="form-group pt-2">
										<label for="">Area </label>
										<select name="area" class="form-control" id="">
											<option value="Top">Top</option>
											<option value="Center">Center</option>
											<option value="Bottom">Bottom</option>
										</select>
									</div>
									<input type="submit" class="btn btn-info mt-3 socialButton" value="Upload">
									<p class="error1 text-danger"></p>
								</form>
								<table class="table mt-5">
									<thead class="bg-primary text-white">
										<tr>
											<th>Image</th>
											<th>Area</th>
											<th>Start</th>
											<th>End</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody class="border border-primary">
										@foreach($totalData as $data)
										<tr>
											<td>
												@if($data->banner != null)
													<img
														id="slider1"
														src="{{URL::to('/storage/app')}}/{{$data->banner}}"
														class="img-fluid"
														alt="your image"
														width="300"
													/>
												@else
													@php
														echo $data->htmlLink;
													@endphp
												@endif
											</td>
											<td>
												{{$data->area}}
											</td>
											<td>
												{{$data->start}}
											</td>
											<td>
												{{$data->end}}
											</td>
											<td>
												<a href="#">
													<i class="far fa-edit text-success mr-2 editlink" value="{{$data->id}}"></i>
												</a>
												<a href="{{URL::to('/admin/banner/right-side-banner/delete')}}/{{$data->id}}">
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
	// check file error
	var _URL = window.URL || window.webkitURL;
	var fileError = 0;
	$("#file1").change(function (e) {
		console.log("asd");
		var file, img;
		if ((file = this.files[0])) {
			img = new Image();
			var objectUrl = _URL.createObjectURL(file);
			fileError = 0;
			img.onload = function () {
				if(this.width < this.height ){
					console.log("asd1");
					$(".fileError").html("");
					fileError = 0;
				}else if(this.width == this.height ){
					console.log("asd1");
					$(".fileError").html("");
					fileError = 0;
				}else{
					console.log("asd0");
					$(".fileError").html("Your select an invalid image");
					fileError = 1;
				}
				_URL.revokeObjectURL(objectUrl);
			};
			img.src = objectUrl;
		}
	});

	// check htmllink or imageurl
	$(".error1").hide();
	$(".form1").on("submit",function(e){
		var data = $(".htmlLink").val();
		var len = $("#file1")[0].files.length;
		if (data == "" && len == 0) {
			e.preventDefault();
			$(".error1").show();
			$(".error1").html("Pealse enter Image or HTMLLink.");
		}
		if (data != "" && len != 0 ) {
			e.preventDefault();
			$(".error1").show();
			$(".error1").html("Pealse enter any one Image or HTMLLink.");
		}
		if (len != 0){
			if(fileError != 0){
				e.preventDefault();
				$(".error1").show();
				$(".error1").html("Pealse enter valid Image or HTMLLink.");
			}
			var link = $(".fileLink").val();
			if(link == ""){
				e.preventDefault();
				$(".error1").show();
				$(".error1").html("Pealse enter Link with Image.");
			}
		}
	});
</script>