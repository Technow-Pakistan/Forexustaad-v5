@include('inc.header')
        <!-- Content Area -->
        <div class="content_area">
    <section class="after_banner_content_area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-3 col-md-6 col-sm-12 order-2 order-lg-1">
                @include('inc.home-left-sidebar')
                </div>
                <div class="col-lg-6 col-md-12 order-1 order-lg-2">
                    <div class="family">
                        <div>
                            <h4>{{$BlogDetail->mainTitle}}</h4>
                        </div>
                        <div class="post_representor">
                            <ul class="">
                                <li><i class="fa fa-user"></i> Raheel Nawaz</li>
                                <li><i class="fa fa-clock-o"></i> {{$BlogDetail->publishDate}}</li>
                                <li>
                <!-- Go to www.addthis.com/dashboard to customize your tools -->
                <!-- <div class="addthis_inline_share_toolbox_sv9g"></div> -->
                <!-- <i class="fa fa-folder"></i> Forex Education -->
                </li>
                                <!-- <li><i class="fa fa-comments"></i> 8 Comments </li>
                                <li><i class="fa fa-eye"></i> 4,106 Views</li> -->
                            </ul>
                        </div>
                        <div class="pt-3">
                            @php 
                                $Description = html_entity_decode($BlogDetail->detailDescription);
                                echo $Description;
                            @endphp
                        </div>
                                        
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
                                                @php
                                                $img = URL::to('/public/assets/assets/img/user1.jpg');
                                                if(Session::has('client')){
                                                    $value = Session::get('client');
                                                    if($value['image'] != null){
                                                    $img = URL::to('/storage/app') . "/" . $value['image'];
                                                    }
                                                }
                                                @endphp
                                            <img src="{{$img}}" alt="avatar"/>
                                        </div>
                                        <div class="box_comment col-md-10">
                                            <form action="{{URL::to('/blog/comment/add')}}" method="post">
                                                @if(!Session::has('client'))
                                                <a href="#" class="LoginButton" data-toggle="modal" data-target="#requestQuoteModal">
                                                    <textarea class="commentar" placeholder="Add a comment..."></textarea>
                                                </a>
                                                @else
                                                <textarea class="commentar" name="comment" placeholder="Add a comment..." required></textarea>
                                                @endif
                                                <div class="box_post">
                                                    <div class="pull-right">
                                                        <span>
                                                            <img src="{{URL::to('/public/assets/assets/img/user1.jpg')}}" alt="avatar" />
                                                            <i class="fa fa-caret-down"></i>
                                                        </span>
                                                        @if(Session::has('client'))
                                                            @php
                                                                $value =Session::get('client');
                                                            @endphp
                                                            <input type="hidden" name="memberId" value="{{$value['id']}}"> 
                                                            <input type="hidden" name="userType" value="client"> 
                                                            <input type="hidden" name="blogId" value="{{$BlogDetail->id}}"> 
                                                            <button type="submit" >Post</button>
                                                        @else
                                                            <span class="commentDisableButton LoginButton" href="#" data-toggle="modal" data-target="#requestQuoteModal">Post</span>
                                                        @endif
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
                                                                @php
                                                                    $replys = $comment->getReply();
                                                                @endphp
                                                                <!-- <a class="like" href="#">Like</a>
                                                                <span aria-hidden="true"> · </span> -->
                                                                @if(Session::has('client'))
                                                                    <a class="replay" commentId="{{$comment->id}}" replyId="{{$comment->reply}}">Reply</a>
                                                                @else
                                                                    <a class="replay LoginButton" href="#" data-toggle="modal" data-target="#requestQuoteModal">Reply</a>
                                                                @endif
                                                                <a class="ml-3" data-toggle="collapse" data-target="#demo{{$comment->id}}">View Replies <span class="text-dark">({{count($replys)}})</span></a>
                                                            </div>
                                                            <div id="demo{{$comment->id}}" class="collapse">
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
                                                                                $urlImageSrc1 = URL::to('/storage/app/WebImages/avatar-5.jpg');
                                                                            }else{
                                                                                $urlImageSrc1 = URL::to('/storage/app') . '/' . $adminDetailInfo1->userImage;
                                                                            }
                                                                        }
                                                                    @endphp
                                                                    <ul class="child_replay">
                                                                        <li class="box_reply row">
                                                                            <div class="avatar_comment col-md-2">
                                                                                <img src="{{$urlImageSrc1}}" alt="avatar"/>
                                                                            </div>
                                                                            <div class="result_comment col-md-10">
                                                                                <h4>{{ $reply->userType == "client" ? $client->name : $adminInfo1->username}}</h4>
                                                                                <p><span class="ml-3 text-primary">{{$reply->replyName}} </span> {{$reply->comment}}</p>
                                                                                <div class="tools_comment">
                                                                                    @if(Session::has('client'))
                                                                                        <a class="replay" commentId="{{$comment->id}}" replyId="{{$reply->reply}}">Reply</a>
                                                                                    @else
                                                                                        <a class="replay LoginButton" href="#" data-toggle="modal" data-target="#requestQuoteModal" href="javascript_void(0)">Reply</a>
                                                                                    @endif
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
                    </div>
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
    .borderRadius80{
        border-radius: 80px;
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

@include('inc.footer')
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
							'<img src=\"{{URL::to('/public/assets/assets/img/user1.jpg')}}\" alt=\"avatar\"/>'+
							'</div>'+
							'<div class=\"box_comment col-md-9\">'+
								'<form action=\"{{URL::to('/blog/comment/add')}}\" method="post">'+
									'<textarea class=\"comment_replay\" name=\"comment\" placeholder=\"Add a comment...\"></textarea>'+
									'<div class=\"box_post\">'+
										'<div class=\"pull-right\">'+
										'<span>'+
											'<img src=\"{{URL::to('/public/assets/assets/img/user1.jpg')}}\" alt=\"avatar\" />'+
											'<i class=\"fa fa-caret-down\"></i>'+
										'</span>'+
										'<input type=\"hidden\" name=\"memberId\" value=\"{{$value['id']}}\">'+ 
										'<input type=\"hidden\" name=\"userType\" value=\"client\">'+
										'<input type=\"hidden\" name=\"blogId\" value=\"{{$BlogDetail->id}}\"> '+
										'<input type=\"hidden\" name=\"reply\" value=\"{{$BlogDetail->id}}\"> '+
										'<input type=\"hidden\" name=\"replyName\" value=\"'+currentH4+'\"> '+
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
