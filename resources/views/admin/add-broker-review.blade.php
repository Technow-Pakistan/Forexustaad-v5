@php
	$value =Session::get('admin');
@endphp
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
									<h5 class="m-b-10">Broker Review</h5>
								</div>
								<ul class="breadcrumb">
									<li class="breadcrumb-item">
										<a href="{{URL::to('/ustaad/dashboard')}}"><i class="fa fa-home"></i></a>
									</li>
									<li class="breadcrumb-item"><a href="{{URL::to('/ustaad/allbrokers')}}/{{$value['memberId']}}">All Brokers</a></li>
									<li class="breadcrumb-item">
										<a href="#!">Broker Review</a>
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
							<div class="card-header">Broker Review</div>
							<div class="card-body">
								@php 
									$count = 0;
									$titleId = 0;
									$url = "new";
									$value3 =Session::get('admin');
								@endphp
								@isset($brokerReview->image)
									<?php $url = "edit/" . $brokerReview->id; ?>
								@endisset
								<form action="{{URL::to('/ustaad/brokersReview')}}/{{$url}}" method="post" enctype="multipart/form-data">
									@isset($brokerReview->image)
										<div>
											<img src="{{URL::to('storage/app')}}/{{$brokerReview->image}}" alt="Your Image" />
										</div>
										@php 
											$count++;
											$titleId = $brokerReview->brokerId;
										@endphp
									@endisset
										<div class="custom-file my-3 h-100">
											<input type="file" class="form-control h-100" name="file_photo" id="customFile" {{($count == 0 ? 'required' : '' )}}>
										</div>
									<div class="form-group">
										<label for="">Review Title</label>
										<div>
											<input type="text" name="ReviewTitle" value="{{($count != 0 ? $brokerReview->ReviewTitle : '' )}}" class="form-control" required>
										</div>
									</div>
									<div class="form-group">
										<label for="">Broker Title</label>
										<div>
											<select name="brokerId" class="form-control" id="">
												@foreach($broker as $title)
													@if($value3['memberId'] == 6)
														@if($title->userId == $value3['id'])
															<option value="{{$title->id}}" {{($titleId == $title->id ? 'selected' : '' )}}>{{$title->title}}</option>
														@endif
													@else
														<option value="{{$title->id}}" {{($titleId == $title->id ? 'selected' : '' )}}>{{$title->title}}</option>
													@endif
												@endforeach
											</select>
										</div>
									</div>	
									<div class="form-group">
										<label for="news-description" class="form-control-label m-0">Description (Max-character 200)</label>
										<p class="text-right text-danger m-0 descriptionCount"></p>
										<textarea name="shortDescription" maxlength="200" class="form-control description" id="news-description" rows="3" cols="40" required="" placeholder="Enter your Description here ...">@if($count != 0){{$brokerReview->shortDescription}}@endif</textarea>
									</div>
									<div class="form-group">
										<label>Review Content</label>
										<textarea
											name="editor1"
											class="form-control"
											placeholder="Page Body"
											required
										>
											<?php
												if($count != 0){
													$description = html_entity_decode($brokerReview->description);
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


