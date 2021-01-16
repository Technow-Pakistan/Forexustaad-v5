@include('admin.include.header')
	@php
		$count = 0;
		$url = "new";
	@endphp
	@isset($lecture->id)
		@php
			$url = $category . "/edit/" . $lecture->id;
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
									<li class="breadcrumb-item"><a href="{{URL::to('/ustaad/lecture')}}">All Training</a></li>
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
										<label for="">Training Category</label>
										<div>
											<select name="lectureCategory" id="lectureCategory" class="form-control" {{($count != 0 ? 'disabled' : '' )}}>
												<option value="basic" {{($category == 'basic' ? 'selected' : '' )}}>Basic Training</option>
												<option value="advance" {{($category == 'advance' ? 'selected' : '' )}}>Advance Training</option>
												<option value="habbit" {{($category == 'habbit' ? 'selected' : '' )}}>50 Habbits Training</option>
											</select>
										</div>
									</div>
									<div class="form-group vipMember">
										<label for="">Member</label>
										<div>
											<select name="vipMember" id="vipMember" class="form-control">
												<option value="0" {{($count != 0 && $lecture->vipMember == 0 ? 'selected' : '' )}}>Free Member</option>
												<option value="1" {{($count != 0 && $lecture->vipMember == 1 ? 'selected' : '' )}}>Vip Member</option>
											</select>
										</div>
									</div>
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
<script>
	@if($category != "advance")
		$(".vipMember").hide();
	@endif
	$("#lectureCategory").on("change",function () {
		var category = $(this).val();
		if(category == "advance"){
			$(".vipMember").show();
		}else{
			$(".vipMember").hide();
		}
	})
</script>