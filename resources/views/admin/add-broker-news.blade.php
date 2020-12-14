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
										<a href="index.html"><i class="feather icon-home"></i></a>
									</li>
									<li class="breadcrumb-item"><a href="all-broker-news.html">All Brokers News</a></li>
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
									<!-- <div class="custom-file my-3">
										<input
											type="file"
											class="custom-file-input"
											id="customFile"
											name="file_photo"
											onchange="sliderimgone(this);"
											{{($count == 0 ? 'required' : '' )}}
										/>
										<label class="custom-file-label" for="customFile"
											>Choose file</label
										>
									</div> -->
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
									<div class="form-group">
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
        <!-- <script src="http://cdn.ckeditor.com/4.6.1/standard/ckeditor.js"></script>
        <script>
			CKEDITOR.replace("editor1");
		</script> -->


