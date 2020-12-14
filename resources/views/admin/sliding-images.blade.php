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
										<a href="index.html"><i class="feather icon-home"></i></a>
									</li>
									<li class="breadcrumb-item">
										<a href="#!">Sliding Images</a>
									</li>
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
							<div class="card-header">Sliding Images</div>
							<div class="card-body">
								<form action="" method="post" enctype="multipart/form-data">
									<div class="custom-file my-3 h-100">
										<input type="file" class="form-control h-100" name="file_photo" id="customFile" required>
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
									<p align="right"> <button class="btn btn-info mt-1">Upload</button></p>
								</form>
								<div id="content">
									<div id="featured_img">
										<img
											id="img"
											src="{{URL::to('/storage/app')}}/{{$images[0]->image}}"
										/>
									</div>
									<div id="thumb_img" class="cf">
										@php $i = 1 @endphp
										@foreach($images as $image)
											<img
												class="{{$i==1 ? 'active' : ''}}"
												src="{{URL::to('/storage/app')}}/{{$image->image}}"
												onclick="changeimg('{{URL::to('/storage/app')}}/{{$image->image}}','{{URL::to('/ustaad/edit-slider-image')}}/{{$image->id}}',this);"
											/>
											@php $i++ @endphp
										@endforeach
									</div>
									<a href="{{URL::to('/ustaad/edit-slider-image')}}/{{$images[0]->id}}" class="text-center" id="detailLink">
										<button class="btn btn-primary mt-3">Edit</button>
									</a>
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
		<script>
			function changeimg(url,path, e) {
				document.getElementById("img").src = url;
				document.getElementById("detailLink").href = path;
				let nodes = document.getElementById("thumb_img");
				let img_child = nodes.children;
				for (i = 0; i < img_child.length; i++) {
					img_child[i].classList.remove("active");
				}
				e.classList.add("active");
			}
		</script>
