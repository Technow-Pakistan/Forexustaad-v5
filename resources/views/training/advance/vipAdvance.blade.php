@include('inc.header')
<!-- Content Area -->
<div class="content_area">
   <section class="after_banner_content_area">
      <div class="container">
         <div class="row justify-content-center">
            @php
				if(Session::has('error')){
					$error =Session::get('error');
				}
            @endphp
            @isset($error)
				<div class="col-lg-12 col-md-12 col-sm-12 col-12">
					<div class="alert alert-danger">{{$error}}</div>
					@php Session::pull('error') @endphp
				</div>
            @endisset
            <div class="col-lg-3 col-md-6 col-sm-12 order-2 order-lg-1">
               @include('inc.home-left-sidebar')
            </div>
			<div class="col-lg-9 col-md-12 order-1 order-lg-2">
                <div class="row">
                  	<div class="col-md-8">
						<div class="news_us">
							<div class="content_area_heading large-heading text-center">
								<h1 class="heading_title wow animated fadeInUp">
									Vip Advance Trainning
								</h1>
								<div class="heading_border wow animated fadeInUp">
									<span class="one"></span><span class="two"></span><span class="three"></span>
								</div>
							</div>
						</div>
						<div class="card mt-5 rounded-lg shadow-lg">
							<div class="card-header pre-header">
								<div class="d-flex justify-content-between">
									<div>
										@php
											if($nextLecture != null){
												$nextTitle = str_replace(' ','-',$nextLecture->title);
											}
											if($lastLecture != null){
												$lastTitle = str_replace(' ','-',$lastLecture->title);
											}
										@endphp
										<p class="h5 p-3">
											Lecture {{$lecture->poistion}}: {{$lecture->title}}
										</p>
									</div>
									<div>
										<!-- <div class="d-flex">
											<span class="pt-3 pr-2">
												<a href="{{isset($lastTitle) ? URL::to('/vipTraining/advance'). '/' . $lastTitle : '#!'}}" class="text-white">
													<i class="fa fa-chevron-left" aria-hidden="true"></i>
												</a>
											</span>
											<span class="pt-3">
												<a href="{{isset($nextTitle) ? URL::to('/vipTraining/advance'). '/' . $category . '/' . $nextTitle : '#!'}}" class="text-white">
													<i class="fa fa-chevron-right" aria-hidden="true"></i>
												</a>
											</span>
											<span>
												<nav class="navbar navbar-expand-lg">
													<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main_nav" aria-expanded="false" aria-label="Toggle navigation">
														<span class="navbar-toggler-icon"></span>
													</button>
													<div class="collapse navbar-collapse" id="main_nav">
														<ul class="navbar-nav">
															
															<li class="nav-item dropdown">
																<a class="nav-link  dropdown-toggle text-light" href="#" data-toggle="dropdown">
																	<i class="fa fa-ellipsis-h" aria-hidden="true"></i>
																</a>
																<ul class="dropdown-menu fade-up">
																	@foreach($Lectures as $data)
																		@php
																			$title = str_replace(' ','-',$data->title);
																		@endphp
																		<li><a class="dropdown-item" href="{{URL::to('/vipTraining/advance'). '/' . $title}}">{{$data->poistion . '. ' . $data->title}}  </a></li>
																	@endforeach
																</ul>
															</li>
														</ul>
													</div>
												</nav>
											</span>
										</div> -->
									</div>
								</div>
							</div>
							<div class="card-body">
								<ul class="nav nav-tabs" id="myTab" role="tablist">
									<li class="nav-item">
										<a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true"><i class="fa fa-file-video-o" aria-hidden="true"></i> Video</a>
									</li>
									<li class="nav-item">
										<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false"><i class="fa fa-book" aria-hidden="true"></i> Reading</a>
									</li>
								</ul>
								<div class="tab-content" id="myTabContent">
									<div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
										<div class="video-iframe pt-3">
											@if($lecture->status == 0)
												@if($category == "Advance" && $lecture->id != $Lecture1Done->id)
													@if($commentAllow != null)
														@php
															$date3 = $commentAllow->created_at;
															$date4 = date('Y-m-d H:i:s', strtotime($date3 . ' +24 hours '));
															$date5 = date('Y-m-d H:i:s');
														@endphp	
														@if($date4 <= $date5)
															@php echo $lecture->embed @endphp
														@else
															<p>Please! wait for 24 Hours.</p>
														@endif
													@else
														<p>Please submit your previous home work first.</p>
													@endif
												@else
													@php echo $lecture->embed @endphp
												@endif
											@else
												<p>This lecture has been delete contact to administrator.</p>
											@endif
										</div>
									</div>
									<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
										<div class="pt-3">
											<h4>Links or text related to video</h1><br>
											@if($lecture->status == 0)
												@if($category == "Advance"  && $lecture->id != $Lecture1Done->id)
													@if($commentAllow != null)
														@php
															$date3 = $commentAllow->created_at;
															$date4 = date('Y-m-d H:i:s', strtotime($date3 . ' +24 hours '));
															$date5 = date('Y-m-d H:i:s');
														@endphp	
														@if($date4 <= $date5)
															@php 
																$Description = html_entity_decode($lecture->description);
																echo $Description;
															@endphp
														@else
															<p>Please! wait for 24 Hours.</p>
														@endif
													@else
														<p>Please submit your previous home work first.</p>
													@endif
												@else
													@php 
														$Description = html_entity_decode($lecture->description);
														echo $Description;
													@endphp
												@endif
											@else
												<p>This lecture has been delete contact to administrator.</p>
											@endif
											
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
                    <div class="col-md-4">
                        <div class="row analysis" style="margin-top: 0; margin-bottom:0;">
                            <div class="pre-header mb-2 w-100">
                                <div class="p-4">
                                    <h5 class="text-white"> Lecture {{$lecture->poistion}}: {{$lecture->title}}</h5>
                                </div>
                            </div>
                            <div class="force-overflow" id="force-overflow">
                              @foreach($Lectures as $data)
                                @php
                                  $title = str_replace(' ','-',$data->title);
                                  $img12 = $data->embed;
                                  $img123 = explode ("/",$img12);
                                  if(isset($img123[4])){
                                    $img1234 = explode (" ",$img123[4]);
                                    $img12345 = strlen($img1234[0]);
                                    $img123456 = substr($img1234[0],0,--$img12345);
                                  }else{
                                    $img123456 = null;
                                  }
                                @endphp
                                <a href="{{URL::to('/vipTraining/advance'). '/' . $title}}">
                                  <div class="col-sm-12 pl-3 {{$lecture->id == $data->id ?'activeVideo pre-header' : ''}}" id="{{$lecture->id == $data->id ? 'activeVideo' : ''}}">
                                      <div class="media">
                                          <p class="mt-4 mr-2">{{$data->poistion}}. </p>
                                        <img class="mr-3 BorderNone" src="http://i.ytimg.com/vi/{{$img123456}}/hqdefault.jpg" alt="Generic placeholder image">
                                        <div class="media-body">
                                          <h6 class="m-0 text-{{$lecture->id == $data->id ? 'white' : 'primary'}}">{{$data->title}}</h6>
                                        </div>
                                      </div>
                                  </div>
                                </a>
                              @endforeach
                            </div>
                        </div>
                    </div>
				</div>
                <div class="row mt-5">
                    <div class="col-md-8">
                        @if($commentAllow != null)
							@php
                                $go23 = 1;
								$date3 = $commentAllow->created_at;
								$date4 = date('Y-m-d H:i:s', strtotime($date3 . ' +24 hours '));
								$date5 = date('Y-m-d H:i:s');
							@endphp
							@if($date4 <= $date5)
								@php $go23 = 0; @endphp
							@endif
						@endif
						@if($lecture->id == $Lecture1Done->id)
							@php $go23 = 0; @endphp
						@endif
						@if($go23 == 0)
							<div class="container p-0 mt-4">
									<div class="col-md-12" id="fbcomment">
										<div class="header_comment">
											<div class="row">
												<div class="col-md-12 text-left">
												<span class="count_comment">{{count($comments)}} Comments</span>
												</div>
											</div>
										</div>

										<div class="body_comment">
											<div class="row">
												<div class="avatar_comment col-md-2">
												<img src="https://static.xx.fbcdn.net/rsrc.php/v1/yi/r/odA9sNLrE86.jpg" alt="avatar"/>
												</div>
												<div class="box_comment col-md-10">
													<form action="{{URL::to('/advance/comment/add')}}" method="post">
														<textarea class="commentar" name="comment" placeholder="Add a comment..."></textarea>
														<div class="box_post">
															<div class="pull-right">
															<span>
																<img src="https://static.xx.fbcdn.net/rsrc.php/v1/yi/r/odA9sNLrE86.jpg" alt="avatar" />
																<i class="fa fa-caret-down"></i>
															</span>
															@php
																$value =Session::get('client');
															@endphp
															<input type="hidden" name="memberId" value="{{$value['id']}}"> 
															<input type="hidden" name="userType" value="client"> 
															<input type="hidden" name="lectureId" value="{{$lecture->id}}"> 
															<input type="hidden" name="Category" value="{{$category}}"> 
															<button type="submit" >Post</button>
															</div>
														</div>
													</form>
												</div>
											</div>
											<div class="row">
												<ul id="list_comment" class="col-md-12">
													@foreach($comments as $comment)
														@if($comment->reply == 0)
															@php
																if($comment->userType == "client"){
																	$client = $comment->getMemberInformation();
																	if($client->image == null){
																		$urlImageSrc = URL::to('/public/assets/assets/img/user1.jpg');
																	}else{
																		$urlImageSrc = URL::to('/storage/app') . '/' . $client->image;
																	}
																}else{
																	$adminInfo = $comment->getAdminInformation();
																	$adminDetailInfo = $comment->getAdminDetailInformation();
																	if($adminDetailInfo->userImage == null){
																		$urlImageSrc = URL::to('/storage/app/WebImages/avatar-5.jpg');
																	}else{
																		$urlImageSrc = URL::to('/storage/app') . '/' . $adminDetailInfo->userImage;
																	}
																}
															@endphp
															<li class="box_result row">
																<div class="avatar_comment col-md-2">
																	<img src="{{$urlImageSrc}}" alt="avatar"/>
																</div>
																<div class="result_comment col-md-10">
																	<h4>{{ $comment->userType == "client" ? $client->name : $adminInfo->username}}</h4>
																	<p>{{$comment->comment}}</p>
																	<div class="tools_comment">
																		<!-- <a class="like" href="#">Like</a>
																		<span aria-hidden="true"> · </span> -->
																		<a class="replay" commentId="{{$comment->id}}" replyId="{{$comment->reply}}">Reply</a>
                                                						<a class="ml-3" data-toggle="collapse" data-target="#demo{{$comment->id}}">View Replies</a>
																		<!-- <span aria-hidden="true"> · </span>
																		<i class="fa fa-thumbs-o-up"></i> <span class="count">1</span>
																		<span aria-hidden="true"> · </span>
																		<span>26m</span> -->
																	</div>
                                              						<div id="demo{{$comment->id}}" class="collapse">
																		@php
																			$replys = $comment->getReply();
																		@endphp
																		@foreach($replys as $reply)
																				@php
																					if($reply->userType == "client"){
																						$client = $reply->getMemberInformation();
																						if($client->image == null){
																							$urlImageSrc1 = URL::to('/public/assets/assets/img/user1.jpg');
																						}else{
																							$urlImageSrc1 = URL::to('/storage/app') . '/' . $client->image;
																						}
																					}else{
																						$adminInfo1 = $reply->getAdminInformation();
																						$adminDetailInfo1 = $reply->getAdminDetailInformation();
																						if($adminDetailInfo1->userImage == null){
																							$urlImageSrc = URL::to('/storage/app/WebImages/avatar-5.jpg');
																						}else{
																							$urlImageSrc = URL::to('/storage/app') . '/' . $adminDetailInfo1->userImage;
																						}
																					}
																				@endphp
																				<ul class="child_replay">
																					<li class="box_reply row">
																						<div class="avatar_comment col-md-2">
																							<img src="{{$urlImageSrc1}}" alt="avatar"/>
																						</div>
																						<div class="result_comment col-md-10">
																							<h4>{{$reply->userType == "client" ? $client->name : $adminInfo1->username }}</h4>
																							<p><span class="ml-1 text-primary">{{$reply->replyName}} </span> {{$reply->comment}}</p>
																							<div class="tools_comment">
																								<!-- <a class="like" href="#">Like</a>
																								<span aria-hidden="true"> · </span> -->
																								<a class="replay" commentId="{{$comment->id}}" replyId="{{$reply->reply}}">Reply</a>
																								<!-- <span aria-hidden="true"> · </span>
																								<i class="fa fa-thumbs-o-up"></i> <span class="count">1</span>
																								<span aria-hidden="true"> · </span>
																								<span>26m</span> -->
																							</div>
																						</div>
																					</li>
																				</ul>
																		@endforeach
																	</div>
																</div>
															</li>
														@endif
													@endforeach
												</ul>
											</div>
										</div>
									</div>
							</div>
						@endif
					</div>
                    <div class="col-md-4">
                        @include('inc.home-right-sidebar')
                    </div>
				</div>
			</div>
         </div>
      </div>
   </section>

</div>
@include('inc.footer')

<script>
  var elmnt = document.getElementById("activeVideo");
  var elmnt1 = document.getElementById("force-overflow");
  elmnt.scrollIntoView();
  var der1 =  elmnt1.scrollTop;
  var der2 =  elmnt1.scrollHeight;
  var der = der2 - der1;
  if(der >= 600){
  	elmnt1.scrollBy(0, -170);
  }
</script>

<style>
		.pre-header {
    		background-image: linear-gradient(45deg, #ff0024, #0d5fe9);
    		color: white;
		}
		@media all and (min-width: 992px) {
			.navbar .nav-item .dropdown-menu{  display:block; opacity: 0;  visibility: hidden; transition:.3s; margin-top:0;  }
			.navbar .nav-item:hover .nav-link{ color: #fff;  }
			.navbar .dropdown-menu.fade-down{ top:80%; transform: rotateX(-75deg); transform-origin: 0% 0%; }
			.navbar .dropdown-menu.fade-up{ top:180%;  }
			.navbar .nav-item:hover .dropdown-menu{ transition: .3s; opacity:1; visibility:visible; top:100%; transform: rotateX(0deg); }
		}
	.dropdown-toggle::after {
		display:none;
	}
	.dropdown-menu{
		right: 0!important;
		left: auto;
		
	}
	.nav-tabs {
		margin-bottom: 25px;
	}
	.video-iframe iframe{
		width:100%;
	}
</style>
<style>
    .pull-right{
		float:right;
	}
	.pull-left{
		float:left;
	}
	#fbcomment{
		background:#fff;
		border: 1px solid #dddfe2;
		border-radius: 3px;
		color: #4b4f56;
		padding:50px;
	}
	.header_comment{
		font-size: 14px;
		overflow: hidden;
		border-bottom: 1px solid #e9ebee;
		line-height: 25px;
		margin-bottom: 24px;
		padding: 10px 0;
	}
	.sort_title{
		color: #4b4f56;
	}
	.sort_by{
		background-color: #f5f6f7;
		color: #4b4f56;
		line-height: 22px;
		cursor: pointer;
		vertical-align: top;
		font-size: 12px;
		font-weight: bold;
		vertical-align: middle;
		padding: 4px;
		justify-content: center;
		border-radius: 2px;
		border: 1px solid #ccd0d5;
	}
	.count_comment{
		font-weight: 600;
	}
	.body_comment{
		padding: 0 8px;
		font-size: 14px;
		display: block;
		line-height: 25px;
		word-break: break-word;
	}
	.avatar_comment{
		display: block;
	}
	.avatar_comment img{
		height: 48px;
		width: 48px;
	}
	.box_comment{
		display: block;
		position: relative;
		line-height: 1.358;
		word-break: break-word;
		border: 1px solid #d3d6db;
		word-wrap: break-word;
		background: #fff;
		box-sizing: border-box;
		cursor: text;
		font-family: Helvetica, Arial, sans-serif;
		font-size: 16px;
		padding: 0;
	}
	.box_comment textarea{
		min-height: 40px;
		padding: 12px 8px;
		width: 100%;
		border: none;
		resize: none;
	}
	.box_comment textarea:focus{
		outline: none !important;
	}
	.box_comment .box_post{
		border-top: 1px solid #d3d6db;
		background: #f5f6f7;
		padding: 8px;
		display: block;
		overflow: hidden;
	}
	.box_comment label{
		display: inline-block;
		vertical-align: middle;
		font-size: 11px;
		color: #90949c;
		line-height: 22px;
	}
	.box_comment button{
		margin-left:8px;
		background-color: #4267b2;
		border: 1px solid #4267b2;
		color: #fff;
		text-decoration: none;
		line-height: 22px;
		border-radius: 2px;
		font-size: 14px;
		font-weight: bold;
		position: relative;
		text-align: center;
	}
	.box_comment button:hover{
		background-color: #29487d;
		border-color: #29487d;
	}
	.box_comment .cancel{
		margin-left:8px;
		background-color: #f5f6f7;
		color: #4b4f56;
		text-decoration: none;
		line-height: 22px;
		border-radius: 2px;
		font-size: 14px;
		font-weight: bold;
		position: relative;
		text-align: center;
		border-color: #ccd0d5;
	}
	.box_comment .cancel:hover{
		background-color: #d0d0d0;
		border-color: #ccd0d5;
	}
	.box_comment img{
		height:16px;
		width:16px;
	}
	.box_result{
		margin-top: 24px;
	}
	.box_result .result_comment h4{
		font-weight: 600;
		white-space: nowrap;
		color: #365899;
		cursor: pointer;
		text-decoration: none;
		font-size: 14px;
		line-height: 1.358;
		margin:0;
	}
	.box_result .result_comment{
		display:block;
		overflow:hidden;
		padding: 0;
	}
	.child_replay{
		border-left: 1px dotted #d3d6db;
		margin-top: 12px;
		list-style: none;
		padding:0 0 0 8px
	}
	.reply_comment{
		margin:12px 0;
	}
	.box_result .result_comment p{
		margin: 4px 0;
		text-align:justify;
	}
	.box_result .result_comment .tools_comment{
		font-size: 12px;
		line-height: 1.358;
	}
	.box_result .result_comment .tools_comment a{
		color: #4267b2;
		cursor: pointer;
		text-decoration: none;
	}
	.box_result .result_comment .tools_comment span{
		color: #90949c;
	}
	.body_comment .show_more{
		background: #3578e5;
		border: none;
		box-sizing: border-box;
		color: #fff;
		font-size: 14px;
		margin-top: 24px;
		padding: 12px;
		text-shadow: none;
		width: 100%;
		font-weight:bold;
		position: relative;
		text-align: center;
		vertical-align: middle;
		border-radius: 2px;
	}
</style>
@if(Session::has('client'))
	@php
		$value =Session::get('client');
	@endphp
	<script>
		$(document).ready(function() {
			$('#list_comment').on('click', '.like', function (e) {
				$current = $(this);
				var x = $current.closest('div').find('.like').text().trim();
				var y = parseInt($current.closest('div').find('.count').text().trim());

				if (x === "Like") {
					$current.closest('div').find('.like').text('Unlike');
					$current.closest('div').find('.count').text(y + 1);
				} else if (x === "Unlike"){
					$current.closest('div').find('.like').text('Like');
					$current.closest('div').find('.count').text(y - 1);
				} else {
					var replay = $current.closest('div').find('.like').text('Like');
					$current.closest('div').find('.count').text(y - 1);
				}
			});

			$('#list_comment').on('click', '.replay', function (e) {
				cancel_reply();
				$current = $(this);
				var currentH4122 = $(this).parent().parent().children()[0].innerHTML;
        		var currentH4  = "@" + currentH4122;
				var commentId =	$current.attr("commentId");
				var replyId =	$current.attr("replyId");
				if(replyId == 0){
				currentH4 = "";
				}
				el = document.createElement('li');
				el.className = "box_reply row";
				el.innerHTML =
					'<div class=\"col-md-12 reply_comment\">'+
						'<div class=\"row\">'+
							'<div class=\"avatar_comment col-md-2\">'+
							'<img src=\"https://static.xx.fbcdn.net/rsrc.php/v1/yi/r/odA9sNLrE86.jpg\" alt=\"avatar\"/>'+
							'</div>'+
							'<div class=\"box_comment col-md-9\">'+
								'<form action=\"{{URL::to('/advance/comment/add')}}\" method="post">'+
									'<textarea class=\"comment_replay\" name=\"comment\" placeholder=\"Add a comment...\" required></textarea>'+
									'<div class=\"box_post\">'+
										'<div class=\"pull-right\">'+
										'<span>'+
											'<img src=\"https://static.xx.fbcdn.net/rsrc.php/v1/yi/r/odA9sNLrE86.jpg\" alt=\"avatar\" />'+
											'<i class=\"fa fa-caret-down\"></i>'+
										'</span>'+
										'<input type=\"hidden\" name=\"memberId\" value=\"{{$value['id']}}\">'+
										'<input type=\"hidden\" name=\"userType\" value=\"client\">'+
										'<input type=\"hidden\" name=\"lectureId\" value=\"{{$lecture->id}}\"> '+
										'<input type=\"hidden\" name=\"reply\" value=\"{{$lecture->id}}\"> '+
										'<input type=\"hidden\" name=\"replyName\" value=\"'+currentH4+'\"> '+
										'<input type=\"hidden\" name=\"Category\" value=\"{{$category}}\"> '+
										'<input type=\"hidden\" name=\"commentId\" value=\"'+commentId+'\"> '+
										'<button class=\"cancel\" onclick=\"cancel_reply()\" type=\"button\">Cancel</button>'+
										'<button type=\"submit\">Reply</button>'+
										'</div>'+
									'</div>'+
								'</form>'+
							'</div>'+
						'</div>'+
					'</div>';
				$current.parent().append(el);
			});
		});

		function cancel_reply(){
			$('.reply_comment').remove();
		}
	</script>
@endif