@include('admin.include.header')
	@php
		$count = 0;
		$url = "new";
	@endphp
	@isset($lecture->id)
		@php
			$url = "edit/" . $lecture->id;
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
									<h5 class="m-b-10">{{($count != 0 ? 'Edit' : 'Add' )}} Lecture</h5>
								</div>
								<ul class="breadcrumb">
									<li class="breadcrumb-item">
										<a href="{{URL::to('/ustaad/dashboard')}}"><i class="feather icon-home"></i></a>
									</li>
									<li class="breadcrumb-item"><a href="{{URL::to('/ustaad/lecture')}}">All Lectures</a></li>
									<li class="breadcrumb-item">
										<a href="#!">{{($count != 0 ? 'Edit' : 'Add' )}} Lecture</a>
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
							<div class="card-header">Lecture</div>
							<div class="card-body">
								<form action="{{URL::to('/ustaad/lecture')}}/{{$url}}" method="post" enctype="multipart/form-data">
									<div class="form-group">
										<label for="">Lecture Title</label>
										<div>
											<input type="text" name="title" value="{{($count != 0 ? $lecture->title : '' )}}" class="form-control" required>
										</div>
									</div>
									<div class="form-group">
										<label for="">Embed Code</label>
										<div>
											<textarea name="embed" id="" class="form-control" required>{{($count != 0 ? $lecture->embed : '' )}}</textarea>
										</div>
									</div>
									<div class="form-group">
										<label>Lecture Content</label>
										<textarea
											name="editor1"
											class="form-control"
											placeholder="Page Body"
											required
										>
											<?php
												if($count != 0){
													$description = html_entity_decode($lecture->description);
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
