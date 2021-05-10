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
									<h5 class="m-b-10">Header</h5>
								</div>
								<ul class="breadcrumb">
									<li class="breadcrumb-item">
										<a href="{{URL::to('ustaad/dashboard')}}"><i class="fa fa-home"></i></a>
									</li>
									<li class="breadcrumb-item"><a href="{{URL::to('ustaad/meta-tags')}}">Meta Tags</a></li>
									<li class="breadcrumb-item active"><a href="#!">Update</a></li>
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
							<div class="card-header">Meta Tags</div>
							<div class="card-body">
                                <form action="" method="post" enctype="multipart/form-data">
                                    <label for="">Page</label>
                                    <input type="text" class="form-control" name="" value="{{$data->name_page}}" disabled>
                                    <div class="d-flex justify-content-between">
                                        <label for="">Title</label>
                                        <p class="text-right text-danger m-0 titleCount"></p>
                                    </div>
                                    <input type="text" class="form-control titleCountFlied" maxlength="580" name="metaTitle" value="{{$data != null ? $data->title : ''}}">
                                    <div class="form-group">
                                        <label for=""><img src="{{URL::to('storage/app')}}/{{$data->image}}" alt="" width="100px" height="100px"></label>
                                        <input type="file" class="form-control" name="image">
                                    </div>
                                    <div class="d-flex justify-content-between">
                                        <label for="">Description</label>
                                        <p class="text-right text-danger m-0 descriptionCount"></p>
                                    </div>
                                    <textarea name="metaDescription"  maxlength="990" class="form-control description">{{$data != null ? $data->description : ''}}</textarea>
                                    <label for="">Keywords</label>
                                    <select class="js-example-tokenizer col-sm-12" name="metaKeywords[]" multiple="multiple" required>
                                        @foreach ($MetaKeywords as $metas)
                                            @if($data != null)
                                                @php
                                                    $keywords = explode(',',$data->keywordsimp);
                                                    $selectedAll = 0;
                                                @endphp
                                                @for($i = 0; $i< count($keywords); $i++)
                                                    @if($keywords[$i] == $metas->name)
                                                        @php   $selectedAll = 1;  @endphp
                                                    @endif
                                                @endfor
                                            @endif
                                            <option value="{{$metas->name}}" {{$data != null ? ($selectedAll == 1 ? 'selected' : '') : ''}}>{{$metas->name}}</option>
                                        @endforeach
                                    </select>
                                    <input type="submit" value="Save" class="btn btn-primary btn-sm" >
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
    var count = $(".description").val();
    var len = count.length;
    len = 990 - len;
    $(".descriptionCount").html("remaining: " + len);
    $(".description").on("keyup",function(){
       var count = $(".description").val();
       var len = count.length;

       if(len == 0){
          $(".descriptionCount").hide();
       }else{
          $(".descriptionCount").show();
       }
       len = 990 - len;
       $(".descriptionCount").html("remaining: " + len);
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
