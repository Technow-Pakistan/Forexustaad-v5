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
			// $('#list_comment').on('click', '.like', function (e) {
			// 	$current = $(this);
			// 	var x = $current.closest('div').find('.like').text().trim();
			// 	var y = parseInt($current.closest('div').find('.count').text().trim());

			// 	if (x === "Like") {
			// 		$current.closest('div').find('.like').text('Unlike');
			// 		$current.closest('div').find('.count').text(y + 1);
			// 	} else if (x === "Unlike"){
			// 		$current.closest('div').find('.like').text('Like');
			// 		$current.closest('div').find('.count').text(y - 1);
			// 	} else {
			// 		var replay = $current.closest('div').find('.like').text('Like');
			// 		$current.closest('div').find('.count').text(y - 1);
			// 	}
			// });
      @php
        $img = URL::to('/public/assets/assets/img/user1.jpg');
        if(Session::has('client')){
            $value = Session::get('client');
            if($value['image'] != null){
                $img = URL::to('/storage/app') . "/" . $value['image'];
            }
        }
      @endphp
			$('#list_comment').on('click', '.replay', function (e) {
				cancel_reply();
				$current = $(this);
				var currentH4122 = $(this).parent().parent().children()[0].innerHTML;
        		var currentH4  = "@" + currentH4122;
				var commentId =	$current.attr("commentId");
				var replyId =	$current.attr("replyId");
				var replyCommentMember =	$current.attr("replyCommentMember");
				if(replyId == 0){
					currentH4 = "";
				}
				el = document.createElement('li');
				el.className = "box_reply row";
				el.innerHTML =
					'<div class=\"col-md-12 reply_comment\">'+
						'<div class=\"row\">'+
							'<div class=\"avatar_comment col-md-2\">'+
							'<img src=\"{{$img}}\" alt=\"avatar\"/>'+
							'</div>'+
							'<div class=\"box_comment col-md-9\">'+
								'<form action=\"{{URL::to('/comments/save')}}\" method="post">'+
									'<textarea class=\"comment_replay\" name=\"comment\" placeholder=\"Add a comment...\"></textarea>'+
									'<div class=\"box_post\">'+
										'<div class=\"pull-right\">'+
										'<input type=\"hidden\" name=\"memberId\" value=\"{{$value['id']}}\">'+
										'<input type=\"hidden\" name=\"userType\" value=\"client\">'+
										'<input type=\"hidden\" name=\"objectId\" value=\"{{$commentObjectId}}\"> '+
										'<input type=\"hidden\" name=\"reply\" value=\"{{$commentObjectId}}\"> '+
										'<input type=\"hidden\" name=\"replyName\" value=\"'+currentH4+'\"> '+
										'<input type=\"hidden\" name=\"commentId\" value=\"'+commentId+'\"> '+
										'<input type=\"hidden\" name=\"replyCommentMember\" value=\"'+replyCommentMember+'\"> '+
                                        '<input type=\"hidden\" name=\"commentPageId\" value=\"{{$commentPage}}\">'+
                                        '<input type=\"hidden\" name=\"link\" value=\"{{Request::path()}}\">'+
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
    {{-- like form script --}}
    <script>
        $(".likeForm").on("click",function(){
            var likeData = $(this).attr('value');
            var previousClass = $(this).attr('text');
            var CommentId = $(this).attr('CommentId');
            console.log(CommentId);
            if (likeData == 0) {
                if (previousClass == null || previousClass == "") {
                    var ifd = $(this).parent().children(".likeForm1").attr('text');
                    console.log(ifd);
                    if (ifd != null && ifd != "") {
                        var like1 = parseInt($(".totalLiked").html());
                        $(this).parent().children(".totalLiked").html(--like1);
                        $(this).parent().children(".likeForm1").attr('class','likeForm likeForm1');
                        $(this).parent().children(".likeForm1").attr('text','');
                    }
                    $(this).attr('class','likeForm disLikeForm1 text-danger');
                    $(this).attr('text','text-danger');
                    var dislike = parseInt($(this).parent().children(".totalDisliked").html());
                    $(this).parent().children(".totalDisliked").html(++dislike);
                }else{
                    $(this).attr('class','likeForm disLikeForm1');
                    $(this).attr('text','');
                    var dislike = parseInt($(this).parent().children(".totalDisliked").html());
                    $(this).parent().children(".totalDisliked").html(--dislike);
                }
            }else{
                if (previousClass == null || previousClass == "") {
                    var ifd1 = $(this).parent().children(".disLikeForm1").attr('text');
                    console.log(ifd1);
                    if (ifd1 != null && ifd1 != "") {
                    console.log(ifd1);
                        var dislike1 = parseInt($(this).parent().children(".totalDisliked").html());
                        $(this).parent().children(".totalDisliked").html(--dislike1);
                        $(this).parent().children(".disLikeForm1").attr('class','likeForm disLikeForm1');
                        $(this).parent().children(".disLikeForm1").attr('text','');
                    }
                    $(this).attr('class','likeForm likeForm1 text-primary');
                    $(this).attr('text','text-primary');
                    var like = parseInt($(this).parent().children(".totalLiked").html());
                    $(this).parent().children(".totalLiked").html(++like);
                }else{
                    $(this).attr('class','likeForm likeForm1');
                    $(this).attr('text','');
                    var like = parseInt($(this).parent().children(".totalLiked").html());
                    $(this).parent().children(".totalLiked").html(--like);
                }
            }
            if (CommentId != undefined) {
              var url = "{{URL::to('comment/like')}}" + "/" + CommentId + "/" + likeData;
            }else{
              var url = "{{URL::to('signal/like')}}" + "/" + "{{$commentObjectId}}" + "/" + likeData;
            }
            $.ajax({
                  type: "POST",
                  url: url,
                  data: likeData,
                  success: function(data){
                      console.log(data);
                  }
              });
        })
    </script>
@endif