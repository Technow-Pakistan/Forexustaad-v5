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
									<h5 class="m-b-10">Broker News</h5>
								</div>
								<ul class="breadcrumb">
									<li class="breadcrumb-item">
										<a href="{{URL::to('/ustaad/dashboard')}}"><i class="fa fa-home"></i></a>
									</li>
									<li class="breadcrumb-item"><a href="{{URL::to('/ustaad/brokersNews')}}/">All Brokers News</a></li>
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
									$value3 =Session::get('admin');
								@endphp
								@isset($brokerNews->image)
									@if($value3['memberId'] != 6 && $brokerNews->editId != null)
										@php $exitingBroker = $brokerNews->GetAllowNews(); @endphp
									@endif
									<?php $url = "edit/" . $brokerNews->id; ?>
								@endisset
								<form action="{{URL::to('/ustaad/brokersNews')}}/{{$url}}" method="post" enctype="multipart/form-data">
									<div class="bg-primary p-3">
										<span type="button" class="arrow-toggle collapsed" data-toggle="collapse" data-target="#collapseH" id="collapseP">
											<span class="fa fa-arrow-down text-white"></span>
											<span class="fa fa-arrow-up text-white"></span>
											<span class="h3 text-white"> Meta Tags</span>
										</span>
									</div>
									<div id="collapseH" class="collapse in px-5">
										<label for="">Keywords</label>
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
									@isset($brokerNews->image)
										<div>
											<img src="{{URL::to('storage/app')}}/{{$brokerNews->image}}" alt="Your Image" height="150px"/>
										</div>
										@php 
											$count++;
											$titleId = $brokerNews->brokerId;
										@endphp
									@endisset
										<div class="custom-file my-3 h-100">
											<span class="badge badge-light-danger mb-2">{{isset($exitingBroker)  ? ($exitingBroker->image != $brokerNews->image ? 'updated' : '' ) : "" }}</span>
											<input type="file" class="form-control h-100" name="file_photo" id="customFile" {{($count == 0 ? 'required' : '' )}}>
										</div>
									<div class="form-group">
										<label for="">News Title <sup><span class="badge badge-light-danger">{{isset($exitingBroker)  ? ($exitingBroker->NewsTitle != $brokerNews->NewsTitle ? 'updated' : '' ) : "" }}</span></sup></label>
										<div>
											<input type="text" name="NewsTitle" value="{{($count != 0 ? $brokerNews->NewsTitle : '' )}}" class="form-control" required>
										</div>
									</div>
									<div class="form-group">
										<label for="">Title <sup><span class="badge badge-light-danger">{{isset($exitingBroker)  ? ($exitingBroker->brokerId != $brokerNews->brokerId ? 'updated' : '' ) : "" }}</span></sup></label>
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
										<label for="news-description" class="form-control-label m-0">Description (Max-character 200) <sup><span class="badge badge-light-danger">{{isset($exitingBroker)  ? ($exitingBroker->shortDescription != $brokerNews->shortDescription ? 'updated' : '' ) : "" }}</span></sup></label>
										<p class="text-right text-danger m-0 descriptionCount"></p>
										<textarea name="shortDescription" maxlength="200" class="form-control description" id="news-description" rows="3" cols="40" required="" placeholder="Enter your Description here ...">@if($count != 0){{$brokerNews->shortDescription}}@endif</textarea>
									</div>
									<div class="form-group">
										<label>News Content <sup><span class="badge badge-light-danger">{{isset($exitingBroker)  ? ($exitingBroker->description != $brokerNews->description ? 'updated' : '' ) : "" }}</span></sup></label>
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
