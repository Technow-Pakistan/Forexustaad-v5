@include('admin.include.header')
								@php 
									$count = 0;
									$url = "new";
								@endphp
								@isset($analysis->id)
									@php 
										$url = "edit/" . $analysis->id;
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
									<h5 class="m-b-10">Analysis</h5>
								</div>
								<ul class="breadcrumb">
									<li class="breadcrumb-item">
										<a href="{{URL::to('/ustaad/dashboard')}}"><i class="feather icon-home"></i></a>
									</li>
									<li class="breadcrumb-item"><a href="#!">All Posts</a></li>
									<li class="breadcrumb-item">
										<a href="#!">{{($count != 0 ? 'Edit' : 'Add' )}} Analysis</a>
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
                                    <form id="addtag" method="post" action="" class="" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="analysis-name" class="form-control-label">Title</label>
                                            <input name="title" class="form-control " id="analysis-name" type="text" value="{{($count != 0 ? $analysis->title : '' )}}" size="40" aria-required="true" required="">
                                            <small>The title is how it appears on your site.</small>
                                        </div>
                                        <div class="form-group">
                                            <label for="analysis-description" class="form-control-label">Description</label>
                                            <textarea name="description" class="form-control" id="description" rows="5" cols="40" placeholder="Enter your Description here ...">{{($count != 0 ? $analysis->description : '' )}}</textarea>
                                        </div><br>
                                        <hr>
                                        <p class="text-danger">Please Upload Images According To Given Order Below</p>
                                        <div class="row">
                                            <div class="col-6">
                                                <div class=" form-group">
                                                    <h4> Gold</h4>
                                                    @isset($analysis->goldImage)
                                                        <div>
                                                            <img src="{{URL::to('storage/app')}}/{{$analysis->goldImage}}" height="150px" alt="Your Image" />
                                                        </div><br>
                                                    @endisset
                                                    <div class="form-group">
                                                        <div class="custom-file h-100">
                                                            <input type="file" class="form-control h-100" name="file_photo[]" id="customFile" {{($count == 0 ? 'required' : '' )}}>
                                                        </div>
                                                    </div>
                                                    <small>Upload the Analysis images</small>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class=" form-group">
                                                    <h4>GBPUSD</h4>
                                                    @isset($analysis->gbpusdImage)
                                                        <div>
                                                            <img src="{{URL::to('storage/app')}}/{{$analysis->gbpusdImage}}" height="150px" alt="Your Image" />
                                                        </div><br>
                                                    @endisset
                                                    <div class="form-group">
                                                        <div class="custom-file h-100">
                                                            <input type="file" class="form-control h-100" name="file_photo[]" id="customFile" {{($count == 0 ? 'required' : '' )}}>
                                                        </div>
                                                    </div>
                                                    <small>Upload the Analysis images</small>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class=" form-group">
                                                    <h4>Crude Oil</h4>
                                                    @isset($analysis->crudeOilImage)
                                                        <div>
                                                            <img src="{{URL::to('storage/app')}}/{{$analysis->crudeOilImage}}" height="150px" alt="Your Image" />
                                                        </div><br>
                                                    @endisset
                                                    <div class="form-group">
                                                        <div class="custom-file h-100">
                                                            <input type="file" class="form-control h-100" name="file_photo[]" id="customFile" {{($count == 0 ? 'required' : '' )}}>
                                                        </div>
                                                    </div>
                                                    <small>Upload the Analysis images</small>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class=" form-group">
                                                    <h4>AUDUSD</h4>
                                                    @isset($analysis->audushImage)
                                                        <div>
                                                            <img src="{{URL::to('storage/app')}}/{{$analysis->audushImage}}" height="150px" alt="Your Image" />
                                                        </div><br>
                                                    @endisset
                                                    <div class="form-group">
                                                        <div class="custom-file h-100">
                                                            <input type="file" class="form-control h-100" name="file_photo[]" id="customFile" {{($count == 0 ? 'required' : '' )}}>
                                                        </div>
                                                    </div>
                                                    <small>Upload the Analysis images</small>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class=" form-group">
                                                    <h4>USDCAD</h4>
                                                    @isset($analysis->usdcadImage)
                                                        <div>
                                                            <img src="{{URL::to('storage/app')}}/{{$analysis->usdcadImage}}" height="150px" alt="Your Image" />
                                                        </div><br>
                                                    @endisset
                                                    <div class="form-group">
                                                        <div class="custom-file h-100">
                                                            <input type="file" class="form-control h-100" name="file_photo[]" id="customFile" {{($count == 0 ? 'required' : '' )}}>
                                                        </div>
                                                    </div>
                                                    <small>Upload the Analysis images</small>
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class=" form-group">
                                                    <h4>Optional </h4>
                                                    @isset($analysis->optionalImage)
                                                        <div>
                                                            <img src="{{URL::to('storage/app')}}/{{$analysis->optionalImage}}" height="150px" alt="Your Image" />
                                                        </div><br>
                                                    @endisset
                                                    <div class="form-group">
                                                        <div class="custom-file h-100">
                                                            <input type="file" class="form-control h-100" name="file_photo[]" id="customFile" {{($count == 0 ? 'required' : '' )}}>
                                                        </div>
                                                    </div>
                                                    <small>Upload the Analysis images</small>
                                                </div>
                                            </div>
                                        </div>
                                        <p class="submit">
                                            <input type="submit" name="submit" id="submit" class="btn btn-outline-primary" value="Post"> <span class="spinner"></span>
                                            <input type="reset" name="reset" id="reset" class="btn btn-outline-danger" value="reset"> <span class="spinner"></span>
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
