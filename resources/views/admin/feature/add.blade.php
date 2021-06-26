@include('admin.include.header')
								@php
									$value =Session::get('admin');
									$count = 0;
									$url = "new";
								@endphp
								@isset($fundamental->id)
									@php
										$url = "edit/" . $fundamental->id;
										$count++;
									@endphp
								@endisset
		<!-- [ Main Content ] start -->
		<section class="pcoded-main-container">
			<div class="pcoded-content">
				<!-- [ breadcrumb ] start -->
				<div class="page-header">
					<div class="page-block">
						<div class="row align-items-center">
							<div class="col-md-12">
								<div class="page-header-title">
									<h5 class="m-b-10">Videos</h5>
								</div>
								<ul class="breadcrumb">
									<li class="breadcrumb-item">
										<a href="{{URL::to('/ustaad/dashboard')}}"><i class="fa fa-home"></i></a>
									</li>
									<li class="breadcrumb-item"><a href="{{URL::to('/ustaad/feature-video')}}">All Feature Video</a></li>
									<li class="breadcrumb-item">
										<a href="#!">Add Video</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<!-- [ breadcrumb ] end -->
				<!-- [ Main Content ] start -->
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-12 col-xl-12 col-md-12 ">
                                <div class="form-wrap">
                                    <form method="post" action="" class="" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="fundamental-name" class="form-control-label">Title</label>
                                            <input name="name" class="form-control " type="text" required>
                                        </div>
										<div class="form-group">
											<label for='fundamental-name' class='form-control-label'>Image</label>
											<input type="file" class="form-control h-100" name="thumbnail" id="customFile" required>
										</div>
										<div class="form-group">
											<label for="">Embed Code</label>
											<div>
												<textarea name="embed" id="" class="form-control" required></textarea>
											</div>
										</div>
										<br>
                                        <p class="submit">
                                            <input type="submit" id="submit" class="btn btn-outline-primary" value="Save"> <span class="spinner"></span>
                                        </p>
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

