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
									<h5 class="m-b-10">Edit Your Slider Images</h5>
								</div>
								<ul class="breadcrumb">
									<li class="breadcrumb-item">
										<a href="{{URL::to('ustaad/dashboard')}}"><i class="fa fa-home"></i></a>
									</li>
									<li class="breadcrumb-item">
										<a href="{{URL::to('ustaad/sliding-images')}}">Sliding Images</a>
									</li>
									<li class="breadcrumb-item"><a href="#!">Edit Image</a></li>
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
							<div class="card-header">Edit your Image and Details</div>
							<div class="card-body">
								<form action="" method="post"  enctype="multipart/form-data">
									<div>
										<img src="{{URL::to('storage/app')}}/{{$image->image}}" width="300" alt="Your Image" />
									</div>
									<div class="custom-file my-3">
										<input
											type="file"
											class="custom-file-input"
											id="customFile"
											name="file_photo"
											onchange="sliderimgone(this);"
										/>
										<label class="custom-file-label" for="customFile"
											>Choose file</label
										>
									</div>
									<div class="form-group">
										<label for="">Title</label>
										<div>
											<input type="text" name="title" value="{{$image->title}}" class="form-control" required>
										</div>
									</div>	
									<div class="form-group pt-4">
										<label>Image Content (Max-character 200)</label>
										<p class="text-right text-danger m-0 descriptionCount"></p>
										<textarea
											name="description"
											class="form-control description"
											placeholder="Page Body"
											maxlength="200"
											required
											>{{$image->description}}</textarea>
									</div>
									<div class="form-group">
										<label for="">Link</label>
										<div>
											<input type="url" name="link" value="{{$image->link}}" class="form-control" required>
										</div>
									</div>
									<div>
										<input type="submit" name="submit" id="submit" class="btn btn-outline-primary" value="Save">
										<a href="{{URL::to('/ustaad/sliding-images/trash')}}/{{$image->id}}" class="text-center btn btn-outline-danger addAction" id="detailLink1" data-toggle="modal" data-target="#myModal">Delete</a>
									</div>
								</form>
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
       count = $(".description").val();
       len = count.length;
       len = 200 - len;
       $(".descriptionCount").html("remaining: " + len);
    $(".description").on("keyup",function(){
       var count = $(".description").val();
       var len = count.length;

       if(len == 0){
          $(".descriptionCount").hide();
       }else{
          $(".descriptionCount").show();
       }
       len = 200 - len;
       $(".descriptionCount").html("remaining: " + len);
	});
	
</script>

