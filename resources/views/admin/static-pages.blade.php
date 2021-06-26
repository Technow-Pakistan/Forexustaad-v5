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
                                <form action="" method="post" enctype="multipart/form-data">
                                    <div class="bg-primary p-3">
                                        <span type="button" class="arrow-toggle collapsed" data-toggle="collapse" data-target="#collapseH" id="collapseP">
                                            <span class="fa fa-arrow-down text-white"></span>
                                            <span class="fa fa-arrow-up text-white"></span>
                                            <span class="h3 text-white"> Meta Tags</span>
                                        </span>
                                    </div>
									<div id="collapseH" class="collapse in px-5">
                                        <div class="d-flex justify-content-between">
                                            <label for="">Meta Title</label>
                                            <p class="text-right text-danger m-0 titleCount"></p>
                                        </div>
                                        <input type="text" class="form-control titleCountFlied" maxlength="580" name="metaTitle" value="{{$newMeta != null ? $newMeta->title : ''}}">
                                        <div class="form-group">
                                            <label for="">
                                                @if ($newMeta == null || $newMeta->image == null)
                                                    Image
                                                @else
                                                    <img src="{{URL::to('storage/app')}}/{{$newMeta->image}}" alt="" width="100px" height="100px">
                                                @endif
                                            </label>
                                            <input type="file" class="form-control" name="image">
                                        </div>
                                        <div class="d-flex justify-content-between">
                                            <label for="">Meta Description</label>
                                            <p class="text-right text-danger m-0 descriptionCount1"></p>
                                        </div>
                                        <textarea name="metaDescription" maxlength="990" class="form-control description1">{{$newMeta != null ? $newMeta->description : ''}}</textarea>
                                        <label for="">Meta Keywords</label>
                                        <select class="js-example-tokenizer col-sm-12" name="metaKeywords[]" multiple="multiple" required>
                                            @foreach ($MetaKeywords as $metas)
                                                @if($newMeta != null)
                                                    @php
                                                        $keywords = explode(',',$newMeta->keywordsimp);
                                                        $selectedAll = 0;
                                                    @endphp
                                                    @for($i = 0; $i< count($keywords); $i++)
                                                        @if($keywords[$i] == $metas->name)
                                                            @php   $selectedAll = 1;  @endphp
                                                        @endif
                                                    @endfor
                                                @endif
                                                <option value="{{$metas->name}}" {{$newMeta != null ? ($selectedAll == 1 ? 'selected' : '') : ''}}>{{$metas->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
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

<script>
    // description Limit
    var count = $(".description1").val();
    var len = count.length;
    len = 990 - len;
    $(".descriptionCount1").html("remaining: " + len);
    $(".description1").on("keyup",function(){
       var count = $(".description1").val();
       var len = count.length;

       if(len == 0){
          $(".descriptionCount1").hide();
       }else{
          $(".descriptionCount1").show();
       }
       len = 990 - len;
       $(".descriptionCount1").html("remaining: " + len);
    });

    // title Limit
    var count = $(".titleCountFlied").val();
    var len = count.length;
    len = 580 - len;
    $(".titleCount").html("remaining: " + len);
    $(".titleCountFlied").on("keyup",function(){
       var count = $(".titleCountFlied").val();
       var len = count.length;

       if(len == 0){
          $(".titleCount").hide();
       }else{
          $(".titleCount").show();
       }
       len = 580 - len;
       $(".titleCount").html("remaining: " + len);
    });
</script>

