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
									<li class="breadcrumb-item"><a href="{{URL::to('/ustaad/analysis')}}">All Analysis</a></li>
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
											@isset($analysis->image)
												<div>
													<img src="{{URL::to('storage/app')}}/{{$analysis->image}}" alt="Your Image" />
												</div>
											@endisset
											@if($count == 0)
												<label for='analysis-name' class='form-control-label'>Image</label>
											@endif
											<input type="file" class="form-control h-100" name="file_photo" id="customFile" {{($count == 0 ? 'required' : '' )}}>
										</div>
                                        <div class="form-group">
                                            <label for="analysis-description" class="form-control-label">Description (Max-character 200)</label>
											<p class="text-right text-danger m-0 descriptionCount"></p>
                                            <textarea name="description" class="form-control description" maxlength="200" id="description" rows="3" placeholder="Enter your Description here ...">{{($count != 0 ? $analysis->description : '' )}}</textarea>
                                        </div><br>
                                        <div class="form-group">
                                            <label for="analysis-description" class="form-control-label">Detail Description</label>
                                            <textarea name="editor1" class="form-control" id="description" rows="5" cols="40" placeholder="Enter your Description here ...">
												@if($count != 0) 
													@php
														$detailDescription = html_entity_decode($analysis->detailDescription);
														echo $detailDescription;
													@endphp
												@endif
											</textarea>
                                        </div><br>
                                        
                                        <p class="submit">
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
        <script>
			// description Limit
			$(".descriptionCount").hide();
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
