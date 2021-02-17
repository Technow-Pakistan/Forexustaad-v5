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
										<a href="#!">Gallery</a>
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
							<div class="card-header">Edit your Image Details</div>
							<div class="card-body">
								<form action="" method="post"  enctype="multipart/form-data">
									<div>
										<img src="{{URL::to('storage/app')}}/{{$title}}" width="300" alt="Your Image" />
									</div>
									<div class="form-group">
										<label for="">Title</label>
										<div>
											<input type="text" name="title" value="{{$count!=0 ? $data->title : ''}}" class="form-control" required>
										</div>
									</div>
									<div class="form-group">
										<label for="">Alt</label>
										<div>
											<input type="text" name="alt" value="{{$count!=0 ? $data->alt : ''}}" class="form-control" required>
										</div>
									</div>
									<div class="form-group">
										<label for="">Caption</label>
										<div>
											<input type="text" name="caption" value="{{$count!=0 ? $data->caption : ''}}" class="form-control" required>
										</div>
									</div>
									<div>
										<input type="submit" name="submit" id="submit" class="btn btn-outline-primary" value="Save">
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