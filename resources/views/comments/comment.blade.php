
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
                                    <form action="{{URL::to('/comments/save')}}" method="post">
                                        @if(!Session::has('client'))
                                            <a href="#" class="LoginButton" data-toggle="modal" data-target="#requestQuoteModal">
                                                <textarea class="commentar" placeholder="Add a comment..."></textarea>
                                            </a>
                                        @else
                                            <textarea class="commentar" name="comment" placeholder="Add a comment..." required></textarea>
                                        @endif
                                        <div class="box_post">
                                        <div class="pull-right">
                                            @if(Session::has('client'))
                                                @php
                                                    $value =Session::get('client');
                                                @endphp
                                                <input type="hidden" name="memberId" value="{{$value['id']}}">
                                                <input type="hidden" name="userType" value="client">
                                                <input type="hidden" name="objectId" value="{{$commentObjectId}}">
                                                <input type="hidden" name="commentPageId" value="{{$commentPage}}">
                                                <input type="hidden" name="link" value="{{Request::path()}}">
                                                <button type="submit">Post</button>
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
                                          <h4>{{$comment->userType == "client" ? $client->name : $adminDetailInfo->firstName . ' ' . $adminDetailInfo->lastName}}</h4>
                                          <p>{{$comment->comment}}</p>
                                          <div class="tools_comment">
                                            @php
                                              $replys = $comment->getReply();
                                            @endphp
                                            @if(Session::has('client'))
                                              <a class="replay" commentId="{{$comment->id}}" replyId="{{$comment->reply}}" replyCommentMember="{{$comment->memberId}}">Reply</a>
                                            @else
                                              <a class="replay LoginButton" href="#" data-toggle="modal" data-target="#requestQuoteModal">Reply</a>
                                            @endif
                                            <a class="ml-3" data-toggle="collapse" data-target="#demo{{$comment->id}}">View Replies <span class="text-dark">({{count($replys)}})</span></a>&nbsp;&nbsp;&nbsp;&nbsp;
                                            @php
                                              $clientLikeshow = 0;
                                              if (Session::has('client')) {
                                                $value = Session::get('client');
                                                $clientLike = App\Models\AllCommentLikeModel::where('allCommentId',$comment->id)->where('userId',$value['id'])->first();
                                                if ($clientLike){
                                                  $clientLikeshow = 1;
                                                }
                                              }
                                              $likeComment = $comment->getCommentLike();
                                              $dislikeComment = $comment->getCommentDislike();
                                            @endphp
                                            <span CommentId="{{$comment->id}}" class="likeForm likeForm1 {{!Session::has('client') ? "LoginButton" : ''}} {{$clientLikeshow == 1 ? ($clientLike->liked == 1 ? 'text-primary' :'') : '' }}" text="{{$clientLikeshow == 1 ? ($clientLike->liked == 1 ? 'text-primary' :'') : ''  }}" value="1" {{!Session::has('client') ? "data-toggle=modal data-target=#requestQuoteModal" : ''}}> <i class="fa fa-thumbs-up"></i> </span>
                                            (<span class="totalLiked text-primary">{{$likeComment}}</span>)
                                            (<span class="totalDisliked text-danger">{{$dislikeComment}}</span>)
                                            <span CommentId="{{$comment->id}}" class="likeForm disLikeForm1 {{!Session::has('client') ? "LoginButton" : ''}} {{$clientLikeshow == 1 ? ($clientLike->liked == 0 ? 'text-danger' :'') : ''  }}" text="{{$clientLikeshow == 1 ? ($clientLike->liked == 0 ? 'text-danger' :'') : ''  }}" value="0" {{!Session::has('client') ? "data-toggle=modal data-target=#requestQuoteModal" : ''}}><i class="fa fa-thumbs-up" style="transform: rotate(174deg);"></i></span>
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
                                                      <h4>{{ $reply->userType == "client" ? $client->name : $adminDetailInfo1->firstName . ' ' . $adminDetailInfo1->lastName}}</h4>
                                                      <p><span class="ml-3 text-primary">{{$reply->replyName}} </span> {{$reply->comment}}</p>
                                                      <div class="tools_comment">
                                                        <!-- <a class="like" href="#">Like</a>
                                                        <span aria-hidden="true"> · </span> -->
                                                        @if(Session::has('client'))
                                                          <a class="replay" commentId="{{$comment->id}}" replyId="{{$reply->reply}}" replyCommentMember="{{$reply->memberId}}">Reply</a>
                                                        @else
                                                          <a class="replay LoginButton" href="#" data-toggle="modal" data-target="#requestQuoteModal" href="javascript_void(0)">Reply</a>
                                                        @endif&nbsp;&nbsp;&nbsp;&nbsp;
                                                        @php
                                                            $clientLikeshow = 0;
                                                            if (Session::has('client')) {
                                                                $value = Session::get('client');
                                                                $clientLike = App\Models\AllCommentLikeModel::where('allCommentId',$reply->id)->where('userId',$value['id'])->first();
                                                                if ($clientLike) {
                                                                    $clientLikeshow = 1;
                                                                }
                                                            }
                                                            $likeComment = $reply->getCommentLike();
                                                            $dislikeComment = $reply->getCommentDislike();
                                                        @endphp
                                                        <span CommentId="{{$reply->id}}" class="likeForm likeForm1 {{!Session::has('client') ? "LoginButton" : ''}} {{$clientLikeshow == 1 ? ($clientLike->liked == 1 ? 'text-primary' :'') : '' }}" text="{{$clientLikeshow == 1 ? ($clientLike->liked == 1 ? 'text-primary' :'') : ''  }}" value="1" {{!Session::has('client') ? "data-toggle=modal data-target=#requestQuoteModal" : ''}}> <i class="fa fa-thumbs-up"></i> </span>
                                                        (<span class="totalLiked text-primary">{{$likeComment}}</span>)
                                                        (<span class="totalDisliked text-danger">{{$dislikeComment}}</span>)
                                                        <span CommentId="{{$reply->id}}" class="likeForm disLikeForm1 {{!Session::has('client') ? "LoginButton" : ''}} {{$clientLikeshow == 1 ? ($clientLike->liked == 0 ? 'text-danger' :'') : ''  }}" text="{{$clientLikeshow == 1 ? ($clientLike->liked == 0 ? 'text-danger' :'') : ''  }}" value="0" {{!Session::has('client') ? "data-toggle=modal data-target=#requestQuoteModal" : ''}}><i class="fa fa-thumbs-up" style="transform: rotate(174deg);"></i></span>
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