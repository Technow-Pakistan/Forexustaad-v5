@include('admin.include.header')
	@php
		$titleId = 0;
		$count = 0;
		$url = "new";
	@endphp
	@isset($training->id)
		@php
			$url =  "edit/" . $training->id;
			$titleId = $training->brokerId;
			$count++;
		@endphp
    @endisset
    @php
        $value =Session::get('admin');
    @endphp
		<!-- [ Main Content ] start -->
		<section class="pcoded-main-container">
			<div class="pcoded-content">
				<!-- [ breadcrumb ] start -->
				<div class="page-header">
					<div class="page-block">
						<div class="row align-items-center">
							<div class="col-md-12">
								<div class="page-header-title">
									<h5 class="m-b-10">Broker Training</h5>
								</div>
								<ul class="breadcrumb">
									<li class="breadcrumb-item">
										<a href="{{URL::to('/ustaad/dashboard')}}"><i class="fa fa-home"></i></a>
									</li>
									<li class="breadcrumb-item"><a href="{{URL::to('/ustaad/brokersTraining')}}/{{$value['memberId']}}">All Brokers Trainings</a></li>
									<li class="breadcrumb-item">
										<a href="#!">Broker Training</a>
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
							<div class="card-header">Training</div>
							<div class="card-body">
								<form action="{{URL::to('/ustaad/brokersTrainings')}}/{{$url}}" method="post" enctype="multipart/form-data">
									<div class="form-group">
										<label for="">Title</label>
										<div>
											<select name="brokerId" class="form-control" id="">
												@foreach($broker as $title)
													@if($value['memberId'] == 6)
														@if($title->userId == $value['id'])
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
										<label for="">Training Title</label>
										<div>
											<input type="text" name="title" value="{{($count != 0 ? $training->title : '' )}}" class="form-control" required>
										</div>
									</div>
									<div class="form-group">
										<label for="">Embed Code</label>
										<div>
											<textarea name="embed" id="" class="form-control" required>{{($count != 0 ? $training->embed : '' )}}</textarea>
										</div>
									</div>
									<div class="form-group">
										<label>Training Content</label>
										<textarea
											name="editor1"
											class="form-control"
											placeholder="Page Body"
											required
										>
											<?php
												if($count != 0){
													$description = html_entity_decode($training->description);
													echo $description;
												}
											?>
										</textarea>
									</div>
									<div>
										<input type="submit" name="submit" id="submit" class="btn btn-outline-{{($count != 0 ? 'danger' : 'primary' )}}" value="{{($count != 0 ? 'Update' : 'Save' )}}">
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