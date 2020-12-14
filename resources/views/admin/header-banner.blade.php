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
									<h5 class="m-b-10">Header Banner</h5>
								</div>
								<ul class="breadcrumb">
									<li class="breadcrumb-item">
										<a href="index.html"><i class="feather icon-home"></i></a>
									</li>
									<li class="breadcrumb-item">
										<a href="#!">Header Banner</a>
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
					<div class="col-md-6">
						<div class="card">
							<div class="card-header">Left Banner</div>
							<div class="card-body">
								<form action="" class="firstForm bannerLeftForm" method="post" enctype="multipart/form-data">
									<div class="form-group">
										<span>
											<div class="bannerLeftTitle">
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
											</div>
										</span>
										<div class="custom-file my-3 h-100">
											<input type="file" class="form-control h-100" name="file_photo" id="file1">
										</div>
										<div class="fileError1 text-danger text-right"></div>
									</div>
									<div class="form-group pt-2">
										<label for="">Enter Link</label>
										<input type="link" name="link" class="form-control fileLink bannerLeftLink">
									</div>
									<div class="form-group pt-2">
										<label for="">Enter HTMLLink</label>
										<textarea name="htmlLink" class="form-control htmlLink bannerLeftHtmlLink"></textarea>
									</div>
									<div class="form-group pt-2">
										<label for="" class="">Start Date </label>
										<input type="date" class="form-control bannerLeftStart" name="start" required>
									</div>
									<div class="form-group pt-2">
										<label for="" class="">End Date </label>
										<input type="date" class="form-control bannerLeftEnd" name="end" required>
									</div>
									<input type="submit" class="btn btn-info mt-3 bannerLeftButton" value="Upload">
									<p class="error1 text-danger"></p>
								</form>
								<table class="table mt-5">
									<thead class="bg-primary text-white">
										<tr>
											<th>Image</th>
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
													<a href="{{$data->link}}">
														<img
															id="slider1"
															src="{{URL::to('/storage/app')}}/{{$data->banner}}"
															class="img-fluid"
															alt="your image"
														/>
													</a>
												@else
													<div class="bannerContactHtmlLink">
														@php
															echo $data->htmlLink;
														@endphp
													</div>
												@endif
											</td>
											<td>
												{{$data->start}}
											</td>
											<td>
												{{$data->end}}
											</td>
											<td>
												<a href="#">
													<i class="far fa-edit text-success mr-2 editLeftlink" value="{{$data->id}}"></i>
												</a>
												<a href="{{URL::to('/ustaad/banner/header-banner/delete')}}/{{$data->id}}">
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
							<div class="card-header">Right Banner</div>
							<div class="card-body">
								<form action="{{URL::to('ustaad/banner/header-banner/right')}}" method="post" class="Form2 bannerRightForm" enctype="multipart/form-data">
									<div class="form-group">
										<span>
											<div class="bannerRightTitle">
												@if($totalRightData[0]->banner != null)
													<img
														id="slider1"
														src="{{URL::to('/storage/app')}}/{{$totalRightData[0]->banner}}"
														class="img-fluid"
														alt="your image"
													/>
												@else
													@php
														echo $totalRightData[0]->htmlLink;
													@endphp
												@endif
											</div>
										</span>
										<div class="custom-file my-3 h-100">
											<input type="file" class="form-control h-100" name="file_photo" id="file2">
										</div>
										<div class="fileError2 text-danger text-right"></div>
									</div>
									<div class="form-group pt-2">
										<label for="">Enter Link</label>
										<input type="link" name="link" class="form-control fileLink2 bannerRightLink">
									</div>
									<div class="form-group pt-2">
										<label for="">Enter HTMLLink</label>
										<textarea name="htmlLink" class="form-control htmlLink2 bannerRightHtmlLink"></textarea>
									</div>
									<div class="form-group pt-2">
										<label for="" class="">Start Date </label>
										<input type="date" class="form-control bannerRightStart" name="start" required>
									</div>
									<div class="form-group pt-2">
										<label for="" class="">End Date</label>
										<input type="date" class="form-control bannerRightEnd" name="end" required>
									</div>
									<input type="submit" class="btn btn-info mt-3 bannerRightButton" value="Upload">
									<p class="error2 text-danger"></p>
								</form>
								<table class="table mt-5">
									<thead class="bg-primary text-white">
										<tr>
											<th>Image</th>
											<th>Start</th>
											<th>End</th>
											<th>Action</th>
										</tr>
									</thead>
									<tbody class="border border-primary">
										@foreach($totalRightData as $data)
											<tr>
												<td>
													@if($data->banner != null)
														<a href="{{$data->link}}">
															<img
																id="slider1"
																src="{{URL::to('/storage/app')}}/{{$data->banner}}"
																class="img-fluid"
																alt="your image"
															/>
														</a>
													@else		
														<div class="bannerContactRightHtmlLink">											
															@php
																echo $data->htmlLink;
															@endphp
														</div>
													@endif
												</td>
												<td>
													{{$data->start}}
												</td>
												<td>
													{{$data->end}}
												</td>
												<td>
													<a href="#">
														<i class="far fa-edit text-success mr-2 editRightlink" value="{{$data->id}}"></i>
													</a>
													<a href="{{URL::to('/ustaad/banner/header-banner/deleteright')}}/{{$data->id}}">
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

	<!-- edit left Content -->
	<script>
		$(".editLeftlink").on("click",function(){
			var id = $(this).attr('value');
			var title = $(this).parent().parent().parent()[0].children[0].innerHTML;
			title = title.trim();
			var start = $(this).parent().parent().parent()[0].children[1].innerText;
			var end = $(this).parent().parent().parent()[0].children[2].innerText;
			$(".bannerLeftTitle").html(title);
			$(".bannerLeftStart").val(start);
			$(".bannerLeftEnd").val(end);
			$(".bannerLeftButton").val("Update");
			$(".bannerLeftButton").attr("class","btn btn-outline-danger mt-4 bannerLeftButton");
			$(".bannerLeftForm").attr("action","{{URL::to('/ustaad/banner/header-banner/edit-left')}}/"+id+"");

			var Link = $(".bannerLeftTitle").find('a').attr('href');
		
			var htmlLink = $(".bannerLeftTitle").find(".bannerContactHtmlLink");
			if(htmlLink.length != 0){
				var htmlLinkdata = $(".bannerContactHtmlLink").html();
				htmlLinkdata = htmlLinkdata.trim();
				$(".bannerLeftLink").val("");
				$(".bannerLeftHtmlLink").val(htmlLinkdata);
			}else{
				$(".bannerLeftLink").val(Link);
				$(".bannerLeftHtmlLink").val("");
				$("#file1").attr("id"," ");
			}
				console.log(Link);
			console.log(htmlLink);
		});
	</script>

	<!-- edit right Content -->
	<script>
		$(".editRightlink").on("click",function(){
			var id2 = $(this).attr('value');
			var title2 = $(this).parent().parent().parent()[0].children[0].innerHTML;
			title2 = title2.trim();
			var start2 = $(this).parent().parent().parent()[0].children[1].innerText;
			var end2 = $(this).parent().parent().parent()[0].children[2].innerText;
			$(".bannerRightTitle").html(title2);
			$(".bannerRightStart").val(start2);
			$(".bannerRightEnd").val(end2);
			$(".bannerRightButton").val("Update");
			$(".bannerRightButton").attr("class","btn btn-outline-danger mt-4 bannerRightButton");
			$(".bannerRightForm").attr("action","{{URL::to('/ustaad/banner/header-banner/edit-right')}}/"+id2+"");

			var Link2 = $(".bannerRightTitle").find('a').attr('href');
		
			var htmlLink2 = $(".bannerRightTitle").find(".bannerContactRightHtmlLink");
			if(htmlLink2.length != 0){
				var htmlLinkdata2 = $(".bannerContactRightHtmlLink").html();
				htmlLinkdata2 = htmlLinkdata2.trim();
				$(".bannerRightLink").val("");
				$(".bannerRightHtmlLink").val(htmlLinkdata2);
			}else{
				$(".bannerRightLink").val(Link2);
				$(".bannerRightHtmlLink").val("");
				$("#file2").attr("id"," ");
			}
				console.log(Link2);
			console.log(htmlLink2);
		});
	</script>



<script>
	// check file error1
	var _URL = window.URL || window.webkitURL;
	var fileError1 = 0;
	$("#file1").change(function (e) {
		console.log("asd");
		var file, img;
		if ((file = this.files[0])) {
			img = new Image();
			var objectUrl = _URL.createObjectURL(file);
			fileError1 = 0;
			img.onload = function () {
				if(this.width > this.height ){
					console.log("asd1");
					$(".fileError1").html("");
					fileError1 = 0;
				}else{
					console.log("asd0");
					$(".fileError1").html("Your select an invalid image");
					fileError1 = 1;
				}
				_URL.revokeObjectURL(objectUrl);
			};
			img.src = objectUrl;
		}
	});

	// check htmllink or imageurl in form1
	$(".error1").hide();
	$(".firstForm").on("submit",function(e){
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
			if(fileError1 != 0){
				e.preventDefault();
				$(".error1").show();
				$(".error1").html("Pealse enter valid Image or HTMLLink.");
			}
			var link = $(".fileLink").val();
			if(link == ""){
				e.preventDefault();
				$(".error1").show();
				$(".error1").html("Pealse enter Link with Image");
			}
		}
	});


	// check file error2
	var _URL = window.URL || window.webkitURL;
	var fileError2 = 0;
	$("#file2").change(function (e) {
		console.log("asd");
		var file, img;
		if ((file = this.files[0])) {
			img = new Image();
			var objectUrl = _URL.createObjectURL(file);
			fileError2 = 0;
			img.onload = function () {
				if(this.width > this.height ){
					console.log("asd1");
					$(".fileError2").html("");
					fileError2 = 0;
				}else{
					console.log("asd0");
					$(".fileError2").html("Your select an invalid image");
					fileError2 = 1;
				}
				_URL.revokeObjectURL(objectUrl);
			};
			img.src = objectUrl;
		}
	});

	// check htmllink or imageurl in form1

	$(".error2").hide();
	$(".Form2").on("submit",function(e){
		var data2 = $(".htmlLink2").val();
		var len2 = $("#file2")[0].files.length;
		if (data2 == "" && len2 == 0) {
			e.preventDefault();
			$(".error2").show();
			$(".error2").html("Pealse enter Image or HTMLLink.");
		}
		if (data2 != "" && len2 != 0 ) {
			e.preventDefault();
			$(".error2").show();
			$(".error2").html("Pealse enter any one Image or HTMLLink.");
		}
		if (len2 != 0){
			if(fileError2 != 0){
				e.preventDefault();
				$(".error2").show();
				$(".error2").html("Pealse enter valid Image or HTMLLink.");
			}
			var link2 = $(".fileLink2").val();
			if(link2 == ""){
				e.preventDefault();
				$(".error2").show();
				$(".error2").html("Pealse enter Link with Image");
			}
		}
	});
</script>