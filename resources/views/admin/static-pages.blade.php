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
									<h5 class="m-b-10">{{$data->title}}</h5>
								</div>
								<ul class="breadcrumb">
									<li class="breadcrumb-item">
										<a href="{{URL::to('/ustaad/dashboard')}}"><i class="feather icon-home"></i></a>
									</li>
									<li class="breadcrumb-item"><a href="#!">Static Pages</a></li>
									<li class="breadcrumb-item">
										<a href="#!">{{$data->title}}</a>
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
							<div class="card-header">{{$data->title}}</div>
							<div class="card-body">
                                <form action="" method="post">
                                    <label for="">Title</label>
                                    <input type="text" class="form-control" name="title" value="{{$data->title}}" required>
                                    <label for="">Description</label>
                                    <textarea name="editor1" class="form-control" cols="30" rows="10" required>
                                        @php
                                            $description = html_entity_decode($data->description);
                                            echo $description;
                                        @endphp
                                    </textarea>
                                    <input type="hidden" name="contentPage" value="{{$data->contentPage}}">
                                    <input type="submit" class="btn btn-primary mt-4" value="Submit">
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


