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
									<h5 class="m-b-10">Broker News</h5>
								</div>
								<ul class="breadcrumb">
									<li class="breadcrumb-item">
										<a href="{{URL::to('/ustaad/dashboard')}}"><i class="feather icon-home"></i></a>
									</li>
									<li class="breadcrumb-item"><a href="{{URL::to('/ustaad/brokersNews')}}">All Brokers News</a></li>
									<li class="breadcrumb-item">
										<a href="#!">Broker News</a>
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
							<div class="card-header">Broker News</div>
							<div class="card-body">
								@php 
									$count = 0;
									$titleId = 0;
									$url = "new";
								@endphp
								@isset($brokerNews->image)
									<?php $url = "edit/" . $brokerNews->id; ?>
								@endisset
								<form action="{{URL::to('/ustaad/brokersNews')}}/{{$url}}" method="post" enctype="multipart/form-data">
									@isset($brokerNews->image)
										<div>
											<img src="{{URL::to('storage/app')}}/{{$brokerNews->image}}" alt="Your Image" />
										</div>
										@php 
											$count++;
											$titleId = $brokerNews->brokerId;
										@endphp
									@endisset
										<div class="custom-file my-3 h-100">
											<input type="file" class="form-control h-100" name="file_photo" id="customFile" {{($count == 0 ? 'required' : '' )}}>
										</div>
									<div class="form-group">
										<label for="">News Title</label>
										<div>
											<input type="text" name="NewsTitle" value="{{($count != 0 ? $brokerNews->NewsTitle : '' )}}" class="form-control" required>
										</div>
									</div>
									<div class="form-group">
										<label for="">Title</label>
										<div>
											<select name="brokerId" class="form-control" id="">
												@foreach($broker as $title)
													<option value="{{$title->id}}" {{($titleId == $title->id ? 'selected' : '' )}}>{{$title->title}}</option>
												@endforeach
											</select>
										</div>
									</div>	
									<div class="form-group">
										<label for="news-description" class="form-control-label m-0">Description (Max-character 200)</label>
										<p class="text-right text-danger m-0 descriptionCount"></p>
										<textarea name="shortDescription" maxlength="200" class="form-control description" id="news-description" rows="3" cols="40" required="" placeholder="Enter your Description here ...">@if($count != 0){{$brokerNews->shortDescription}}@endif</textarea>
									</div>
									<hr>
										<input type="file" name="srcImage" id="srcImage" class="srcImage">
										<input type="hidden" name="filePath" id="filePath" class="filePath" value="BrokerImages">
									<br>
									<hr>
									<div class="form-group pt-4">
										<label>News Content</label>
										<textarea
											name="editor1"
											class="form-control"
											placeholder="Page Body"
											required
										>
											<?php
												if($count != 0){
													$description = html_entity_decode($brokerNews->description);
													echo $description;
												}
											?>
										</textarea>
									</div>
									<!-- <div class="form-group">
										<label for="">Use Ebeded Code For Videos</label>
										<div>
											<input type="text" name="videoCode" value="{{($count != 0 ? $brokerNews->videoCode : '' )}}" class="form-control" required>
										</div>
									</div>
									<div class="form-group">
										<label for="">Link</label>
										<div>
											<input type="text" name="link" value="{{($count != 0 ? $brokerNews->link : '' )}}" class="form-control" required>
										</div>
									</div> -->
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
			// file src get
			$(document).ready(function() {
			$('#srcImage').change(function(){
				var file_data = $('#srcImage').prop('files')[0]; 
				var file_path = $('#filePath').val();   
				var form_data = new FormData();                  
				form_data.append('file', file_data);             
				form_data.append('filePath', file_path);
				$.ajax({
					url: "{{URL::to('/pro-img-disk.php')}}",
					type: "POST",
					data: form_data,
					contentType: false,
					cache: false,
					processData:false,
					success: function(data){
					alert(data)
					}
				});
			});
			});
		</script>
