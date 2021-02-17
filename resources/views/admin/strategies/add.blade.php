@include('admin.include.header')
								@php 
									$count = 0;
									$url = "new";
								@endphp
								@isset($strategy->id)
									@php 
										$url = "edit/" . $strategy->id;
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
									<h5 class="m-b-10">Strategies</h5>
								</div>
								<ul class="breadcrumb">
									<li class="breadcrumb-item">
										<a href="{{URL::to('/ustaad/dashboard')}}"><i class="fa fa-home"></i></a>
									</li>
									<li class="breadcrumb-item"><a href="{{URL::to('/ustaad/strategies')}}">All Strategies</a></li>
									<li class="breadcrumb-item">
										<a href="#!">{{($count != 0 ? 'Edit' : 'Add' )}} Strategy</a>
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
							<div class="card-header">{{($count != 0 ? 'Edit' : 'Add' )}} Strategy</div>
							<div class="card-body">
								<form action="{{URL::to('/ustaad/strategies')}}/{{$url}}" method="post" enctype="multipart/form-data">
									<div class="form-group">
										<label for="">Strategy Title</label>
										<div>
											<input type="text" name="title" value="{{($count != 0 ? $strategy->title : '' )}}" class="form-control" required>
										</div>
									</div>
									@isset($strategy->image)
										<div>
											<img src="{{URL::to('storage/app')}}/{{$strategy->image}}" height="150px" alt="Your Image" />
										</div><br>
									@endisset
									<div class="form-group">
										@if($count == 0)
											<label for="">Thumbnail</label>
										@endif
										<div class="custom-file h-100">
											<input type="file" class="form-control h-100" name="file_photo" id="customFile" {{($count == 0 ? 'required' : '' )}}>
										</div>
									</div>
									<div class="form-group">
										<label for="news-description" class="form-control-label m-0">Description (Max-character 200)</label>
										<p class="text-right text-danger m-0 descriptionCount"></p>
										<textarea name="shortDescription" maxlength="200" class="form-control description" id="news-description" rows="3" cols="40" required="" placeholder="Enter your Description here ...">@if($count != 0){{$strategy->shortDescription}}@endif</textarea>
									</div>
									<div class="form-group">
										<label>Strategy Content</label>
										<textarea
											name="editor1"
											class="form-control"
											placeholder="Page Body"
											required
										>
											<?php
												if($count != 0){
													$description = html_entity_decode($strategy->description);
													echo $description;
												}
											?>
										</textarea>
									</div>
									<div>
										<input type="submit" name="submit" id="submit" class="btn btn-outline-primary" value="{{($count != 0 ? 'Update' : 'Save' )}}">
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

