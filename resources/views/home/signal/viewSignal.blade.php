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
                <div class="col-lg-6 col-md-12 order-1 order-lg-2">
                    <div class="">
                        <div class="">
											@php
												$pair = $signalData->getPair();
                                            	$flags = explode("/",$pair->pair);
											@endphp
                              <div class="row gutters-sm">
                                <div class="col-md-4 mb-3">
                                  <div class="card">
                                    <div class="card-body">
                                      <div class="d-flex flex-column align-items-center text-center">
									  		<div>
												@foreach($flags as $flag)
												@php $flag4 = str_replace(' ', '', $flag) @endphp
												<img src="{{URL::to('storage/app/signalFlag')}}/{{$flag4}}.jpg" width="50" height="35" alt=""> &nbsp;&nbsp;
												@endforeach
											</div>
                                        <div class="mt-3">
                                          <h4>{{$pair->pair}}</h4>
                                          <p class="text-secondary mb-1">{{$signalData->selectUser}}</p>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                            @php
                                              $Profits = explode('@',$signalData->takeProfit);
                                              $profit = array_shift($Profits);
                                              $mobiles = explode('@#',$signalData->addMobile);
                                              array_shift($mobiles);
                                              $socials = explode('@#',$signalData->social);
                                              $socialLinks = explode('@#',$signalData->socialLink);
                                            @endphp
                                  <div class="card mt-3">
                                    
                                    <div class="card">
                                        <div class="card-header">
                                            Reviews
                                        </div>
                                        <div class="card-body">
                                            {{$signalData->comments}}
                                        </div>
                                    </div>
                                    <!-- <ul class="list-group list-group-flush">
                                      @for($i = 0; $i < count($socials); $i++)
                                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                          <h6 class="mb-0">{{$socials[$i]}}</h6>
                                          <span class="text-secondary">{{$socialLinks[$i]}}</span>
                                        </li>
                                      @endfor
                                      
                                    </ul> -->
                                  </div>
                                </div>
                                <div class="col-md-8">
                                  <div class="card mb-3">
                                    <div class="card-body">
                                      <div class="row">
                                        <div class="col-sm-3">
                                          <h6 class="mb-0">Price</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                          {{$signalData->price}}
                                        </div>
                                      </div>
                                      <hr>
                                      <div class="row">
                                        <div class="col-sm-3">
                                          <h6 class="mb-0  pt-2">Take Profit</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                          {{$profit}}
                                          <a class="btn pl-0" data-toggle="collapse" data-target="#demo"><i class="fa fa-caret-down" aria-hidden="true"></i></a>
                                          <div id="demo" class="collapse">
                                            @for($i=0; $i < count($Profits); $i++)
                                              <p>{{$Profits[$i]}}</p>
                                            @endfor
                                          </div>
                                        </div>
                                      </div>
                                      <hr>
                                      <div class="row">
                                        <div class="col-sm-3">
                                          <h6 class="mb-0">Stop Lose</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                          {{$signalData->stopLose}}
                                        </div>
                                      </div>
                                      <hr>
                                      <div class="row">
                                        <div class="col-sm-3">
                                          <h6 class="mb-0">Buy Or Sell</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                          {{$signalData->buySale}}
                                        </div>
                                      </div>
                                      <hr>
                                      <div class="row">
                                        <div class="col-sm-3">
                                          <h6 class="mb-0">Result</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                          {{$signalData->result == null ? 'Pending' : $signalData->result}}
                                        </div>
                                      </div>
                                      <hr>
                                      <!-- <div class="row">
                                        <div class="col-sm-3">
                                          <h6 class="mb-0">Address</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                          Bay Area, San Francisco, CA
                                        </div>
                                      </div> -->
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </div>

                        @if(Session::has('client'))
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
											<form action="{{URL::to('/signal/comment/add')}}" method="post">
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
													<input type="hidden" name="signalId" value="{{$signalData->id}}"> 
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
														$client = $comment->getMemberInformation();
													@endphp
													<li class="box_result row">
														<div class="avatar_comment col-md-2">
															<img src="https://static.xx.fbcdn.net/rsrc.php/v1/yi/r/odA9sNLrE86.jpg" alt="avatar"/>
														</div>
														<div class="result_comment col-md-10">
															<h4>{{$client->name}}</h4>
															<p>{{$comment->comment}}</p>
															<div class="tools_comment">
																<!-- <a class="like" href="#">Like</a>
																<span aria-hidden="true"> · </span> -->
																<a class="replay" commentId="{{$comment->id}}">Reply</a>
																<!-- <span aria-hidden="true"> · </span>
																<i class="fa fa-thumbs-o-up"></i> <span class="count">1</span>
																<span aria-hidden="true"> · </span>
																<span>26m</span> -->
															</div>
															@php
																$replys = $comment->getReply();
															@endphp
															@foreach($replys as $reply)
																	@php
																		$client = $reply->getMemberInformation();
																	@endphp
																	<ul class="child_replay">
																		<li class="box_reply row">
																			<div class="avatar_comment col-md-2">
																				<img src="https://static.xx.fbcdn.net/rsrc.php/v1/yi/r/odA9sNLrE86.jpg" alt="avatar"/>
																			</div>
																			<div class="result_comment col-md-10">
																				<h4>{{$client->name}}</h4>
																				<p>{{$reply->comment}}</p>
																				<div class="tools_comment">
																					<!-- <a class="like" href="#">Like</a>
																					<span aria-hidden="true"> · </span> -->
																					<a class="replay" commentId="{{$reply->id}}">Reply</a>
																					<!-- <span aria-hidden="true"> · </span>
																					<i class="fa fa-thumbs-o-up"></i> <span class="count">1</span>
																					<span aria-hidden="true"> · </span>
																					<span>26m</span> -->
																				</div>
																				@php
																					$replys1 = $reply->getReply();
																				@endphp
																				@foreach($replys1 as $reply1)
																					@php
																						$client = $reply1->getMemberInformation();
																					@endphp
																					<ul class="child_replay">
																						<li class="box_reply row">
																							<div class="avatar_comment col-md-2">
																								<img src="https://static.xx.fbcdn.net/rsrc.php/v1/yi/r/odA9sNLrE86.jpg" alt="avatar"/>
																							</div>
																							<div class="result_comment col-md-10">
																								<h4>{{$client->name}}</h4>
																								<p>{{$reply1->comment}}</p>
																								<div class="tools_comment">
																									<!-- <a class="like" href="#">Like</a>
																									<span aria-hidden="true"> · </span> -->
																									<a class="replay" commentId="{{$reply1->id}}">Reply</a>
																									<!-- <span aria-hidden="true"> · </span>
																									<i class="fa fa-thumbs-o-up"></i> <span class="count">1</span>
																									<span aria-hidden="true"> · </span>
																									<span>26m</span> -->
																								</div>
																								@php
																									$replys2 = $reply1->getReply();
																								@endphp
																								@foreach($replys2 as $reply2)
																									@php
																										$client = $reply2->getMemberInformation();
																									@endphp
																									<ul class="child_replay">
																										<li class="box_reply row">
																											<div class="avatar_comment col-md-2">
																												<img src="https://static.xx.fbcdn.net/rsrc.php/v1/yi/r/odA9sNLrE86.jpg" alt="avatar"/>
																											</div>
																											<div class="result_comment col-md-10">
																												<h4>{{$client->name}}</h4>
																												<p>{{$reply2->comment}}</p>
																												<div class="tools_comment">
																													<!-- <a class="like" href="#">Like</a>
																													<span aria-hidden="true"> · </span> -->
																													<a class="replay" commentId="{{$reply2->id}}">Reply</a>
																													<!-- <span aria-hidden="true"> · </span>
																													<i class="fa fa-thumbs-o-up"></i> <span class="count">1</span>
																													<span aria-hidden="true"> · </span>
																													<span>26m</span> -->
																												</div>
																												@php
																													$replys3 = $reply2->getReply();
																												@endphp
																												@foreach($replys3 as $reply3)
																													@php
																														$client = $reply3->getMemberInformation();
																													@endphp
																													<ul class="child_replay">
																														<li class="box_reply row">
																															<div class="avatar_comment col-md-2">
																																<img src="https://static.xx.fbcdn.net/rsrc.php/v1/yi/r/odA9sNLrE86.jpg" alt="avatar"/>
																															</div>
																															<div class="result_comment col-md-10">
																																<h4>{{$client->name}}</h4>
																																<p>{{$reply3->comment}}</p>
																																<div class="tools_comment">
																																	<!-- <a class="like" href="#">Like</a>
																																	<span aria-hidden="true"> · </span> -->
																																	<a class="replay" commentId="{{$reply3->id}}">Reply</a>
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
																										</li>
																									</ul>
																								@endforeach
																							</div>
																						</li>
																					</ul>
																				@endforeach
																			</div>
																		</li>
																	</ul>
															@endforeach
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
                               
               
                <div class="col-lg-3 col-md-6 col-sm-12 order-3 order-lg-3">
                    @include('inc.home-right-sidebar')

                </div>
            </div>
        </div>
    </section>
     
<!--     <div id="particles-js" style="height: 0;"></div> -->
</div>

<style>

.main-body {
    padding: 15px;
}
.card {
    box-shadow: 0 1px 3px 0 rgba(0,0,0,.1), 0 1px 2px 0 rgba(0,0,0,.06);
}

.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 0 solid rgba(0,0,0,.125);
    border-radius: .25rem;
}

.card-body {
    flex: 1 1 auto;
    min-height: 1px;
    padding: 1rem;
}

.gutters-sm {
    margin-right: -8px;
    margin-left: -8px;
}

.gutters-sm>.col, .gutters-sm>[class*=col-] {
    padding-right: 8px;
    padding-left: 8px;
}
.mb-3, .my-3 {
    margin-bottom: 1rem!important;
}

.bg-gray-300 {
    background-color: #e2e8f0;
}
.h-100 {
    height: 100%!important;
}
.shadow-none {
    box-shadow: none!important;
}
</style>

@include('inc.footer')
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
				var commentId =	$current.attr("commentId");
				el = document.createElement('li');
				el.className = "box_reply row";
				el.innerHTML =
					'<div class=\"col-md-12 reply_comment\">'+
						'<div class=\"row\">'+
							'<div class=\"avatar_comment col-md-2\">'+
							'<img src=\"https://static.xx.fbcdn.net/rsrc.php/v1/yi/r/odA9sNLrE86.jpg\" alt=\"avatar\"/>'+
							'</div>'+
							'<div class=\"box_comment col-md-10\">'+
								'<form action=\"{{URL::to('/signal/comment/add')}}\" method="post">'+
									'<textarea class=\"comment_replay\" name=\"comment\" placeholder=\"Add a comment...\"></textarea>'+
									'<div class=\"box_post\">'+
										'<div class=\"pull-right\">'+
										'<span>'+
											'<img src=\"https://static.xx.fbcdn.net/rsrc.php/v1/yi/r/odA9sNLrE86.jpg\" alt=\"avatar\" />'+
											'<i class=\"fa fa-caret-down\"></i>'+
										'</span>'+
										'<input type=\"hidden\" name=\"memberId\" value=\"{{$value['id']}}\">'+ 
										'<input type=\"hidden\" name=\"userType\" value=\"client\">'+
										'<input type=\"hidden\" name=\"signalId\" value=\"{{$signalData->id}}\"> '+
										'<input type=\"hidden\" name=\"reply\" value=\"{{$signalData->id}}\"> '+
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