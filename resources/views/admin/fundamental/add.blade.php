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
									<h5 class="m-b-10">Fundamental</h5>
								</div>
								<ul class="breadcrumb">
									<li class="breadcrumb-item">
										<a href="{{URL::to('/ustaad/dashboard')}}"><i class="fa fa-home"></i></a>
									</li>
									<li class="breadcrumb-item"><a href="{{URL::to('/ustaad/fundamental')}}">All Fundamental</a></li>
									<li class="breadcrumb-item">
										<a href="#!">{{($count != 0 ? 'Edit' : 'Add' )}} Fundamental</a>
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
                                            <label for="fundamental-name" class="form-control-label">Title</label>
                                            <input name="title" class="form-control " id="fundamental-name" type="text" value="{{($count != 0 ? $fundamental->title : '' )}}" size="40" aria-required="true" required="">
                                            <small>The title is how it appears on your site.</small>
                                        </div>
										<div class="form-group">
											@isset($fundamental->image)
												<div>
													<img src="{{URL::to('storage/app')}}/{{$fundamental->image}}" alt="Your Image" />
												</div>
											@endisset
											@if($count == 0)
												<label for='fundamental-name' class='form-control-label'>Image</label>
											@endif
											<input type="file" class="form-control h-100" name="file_photo" id="customFile" {{($count == 0 ? 'required' : '' )}}>
										</div>
                                        <div class="form-group">
                                            <label for="fundamental-description" class="form-control-label">Detail Description</label>
                                            <textarea name="editor1" class="form-control" id="description" rows="5" cols="40" placeholder="Enter your Description here ...">
												@if($count != 0) 
													@php
														$detailDescription = html_entity_decode($fundamental->detailDescription);
														echo $detailDescription;
													@endphp
												@endif
											</textarea>
                                        </div>
										<div class="form-group">
										<label for="">Embed Code</label>
										<div>
											<textarea name="embed" id="" class="form-control" required>{{($count != 0 ? $fundamental->embed : '' )}}</textarea>
										</div>
									</div>
										<br>
                                        
                                        <p class="submit">
                                            <input type="hidden" name="userId" value="{{$value['id']}}"> 
                                            <input type="submit" id="submit" class="btn btn-outline-primary" value="Post"> <span class="spinner"></span>
                                            <input type="reset" id="reset" class="btn btn-outline-danger" value="reset"> <span class="spinner"></span>
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
