@php
	$value =Session::get('admin');
	$linkchangess = 0;
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
									<h5 class="m-b-10">{{!isset($data) ? 'Add New Static Page' : $data->title}}</h5>
								</div>
								<ul class="breadcrumb">
									<li class="breadcrumb-item">
										<a href="{{URL::to('/ustaad/dashboard')}}"><i class="fa fa-home"></i></a>
									</li>
									<li class="breadcrumb-item"><a href="{{URL::to('/ustaad/staticpages')}}">All Static Pages</a></li>
									<li class="breadcrumb-item">
										<a href="#!">{{!isset($data) ? 'Add New Static Page' : $data->title}}</a>
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
							<div class="card-header">{{!isset($data) ? '' : $data->title}}</div>
							<div class="card-body">
                                <form action="" method="post">
                                    <label for="">Title</label>
                                    <input type="text" class="form-control title" name="title" value="{{!isset($data) ? '' : $data->title}}" required>
                                    <label for="">Description</label>
                                    <textarea name="editor1" class="form-control" cols="30" rows="10" required>
										@if(isset($data))
											@php
												$description = html_entity_decode($data->description);
												echo $description;
												if($data->contentPage == "privacyPolice" || $data->contentPage == "TOS"){
													$linkchangess = 1;
												}
											@endphp
										@endif
									</textarea>
									<label for="">Permalink</label>
                                    <input type="text" class="form-control permalink" name="link" {{$linkchangess == 1 ? 'disabled' : ''}} required>
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

<script>
	@if (isset($data))
		let oldPermalink = "{{URL::to('/p')}}/{{$data->link}}";
		$(".permalink").val(oldPermalink);
	@endif
    $(".title").on("keyup",function() {
		console.log("das");
        let fixedUrl = "{{URL::to('/p')}}/";
		console.log(fixedUrl);
		let link = $(this).val();
  		let dashesLink = link.replace(/ /g, '-');
		console.log(dashesLink);
        let url = fixedUrl + dashesLink;
		console.log(url);
        $(".permalink").val(url);
    })
</script>

