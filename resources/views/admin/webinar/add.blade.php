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
									<h5 class="m-b-10">Add Webinar</h5>
								</div>
								<ul class="breadcrumb">
									<li class="breadcrumb-item">
										<a href="{{URL::to('/ustaad/dashboard')}}"><i class="feather icon-home"></i></a>
									</li>
									<li class="breadcrumb-item"><a href="{{URL::to('/ustaad/webinar')}}">All Webinar</a></li>
									<li class="breadcrumb-item">
										<a href="#!">Add Webinar</a>
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
							<div class="card-header">Add Webinar</div>
							<div class="card-body">
								@php
									$count = 0;
									$titleId = 0;
									$url = "add";
								@endphp
								@isset($webinar->image)
									<?php $url = "edit/" . $webinar->id; ?>
								@endisset
								<form action="{{URL::to('/ustaad/webinar')}}/{{$url}}" method="post" enctype="multipart/form-data">
									@isset($webinar->image)
										<div>
											<img src="{{URL::to('storage/app')}}/{{$webinar->image}}" alt="Your Image" />
										</div>
										@php
											$count++;
											$titleId = $webinar->brokerId;
										@endphp
									@endisset
										<div class="row">
											<div class="col-md-6">
												<div class="custom-file">
													<label for="">Thumbnail</label>
													<input type="file" class="form-control" name="file_photo" id="customFile" {{($count == 0 ? 'required' : '' )}}>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label for="">Title</label>
													<div>
														<input type="text" name="title" value="{{($count != 0 ? $webinar->title : '' )}}" class="form-control" required>
													</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label for="">Webinar Contend Name</label>
													<div>
														<input type="text" name="nameOfPerson" value="{{($count != 0 ? $webinar->nameOfPerson : '' )}}" class="form-control" required>
													</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label for="">Designation</label>
													<div>
														<input type="text" name="event" value="{{($count != 0 ? $webinar->event : '' )}}" class="form-control" required>
													</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label for="">Member</label>
													<div>
                                                        <select name="vipMember" class="form-control" id="">
                                                            <option value="0" {{($count != 0 && $webinar->vipMember == 0 ? 'selected' : '' )}}>Free Member</option>
                                                            <option value="1" {{($count != 0 && $webinar->vipMember == 1 ? 'selected' : '' )}}>Vip Member</option>
                                                        </select>
													</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label for="">link</label>
													<div>
                                                        <textarea name="link" id="link" class="form-control" required>{{($count != 0 ? $webinar->link : '' )}}</textarea>
													</div>
												</div>
											</div>
										</div>
									<div class="form-group">
										<label for="news-description" class="form-control-label m-0">Description (Max-character 200)</label>
										<p class="text-right text-danger m-0 descriptionCount"></p>
										<textarea name="description" maxlength="200" class="form-control description" id="news-description" rows="3" cols="40" required="" placeholder="Enter your Description here ...">@if($count != 0){{$webinar->description}}@endif</textarea>
									</div>
									<div class="form-group">
										<label for="news-description" class="form-control-label m-0">Video Link</label>
										<input type="text" name="embedCode" value="{{($count != 0 ? $webinar->embedCode : '' )}}" class="form-control">
									</div>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label for="">Date</label>
													<div>
														<input type="date" name="date" value="{{($count != 0 ? $webinar->date : '' )}}" class="form-control" required>
													</div>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label for="">Time</label>
													<div>
														<input type="time" name="time" value="{{($count != 0 ? $webinar->time : '' )}}" class="form-control" required>
													</div>
												</div>
											</div>
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
	<style>
		.form-control{
			height:40px;
		}
	</style>
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


