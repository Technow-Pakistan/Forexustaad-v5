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
                    @if($MidBannerHomeActive)
                        <div class="mb-5">
                            <a href="{{$MidBannerHomeActive->link}}" target="_blank">
                                <img src="{{URL::to('storage/app')}}/{{$MidBannerHomeActive->image}}" width="100%">
                              </a>
                        </div>
                    @endif
                    {{-- Counter Start --}}
                    <div id="clockdiv" class="text-center mb-3">
                        <div>
                            <span class="days"></span>
                            <div class="smalltext">Days</div>
                        </div>
                        <div>
                            <span class="hours"></span>
                            <div class="smalltext">Hours</div>
                        </div>
                        <div>
                            <span class="minutes"></span>
                            <div class="smalltext">Minutes</div>
                        </div>
                        <div>
                            <span class="seconds"></span>
                            <div class="smalltext">Seconds</div>
                        </div>
                    </div>
                    {{-- Counter End --}}
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
                                        <div>
                                            @php
                                                $clientLikeshow = 0;
                                                if (Session::has('client')) {
                                                    $value = Session::get('client');
                                                    $clientLike = App\Models\SignalLikeModel::where('signalId',$signalData->id)->where('userId',$value['id'])->first();
                                                    if ($clientLike) {
                                                        $clientLikeshow = 1;
                                                    }
                                                }
                                            @endphp
                                            (<span class="totalLiked text-primary">{{count($TotalLikes)}}</span>)
                                            <span class="likeForm likeForm1 {{!Session::has('client') ? "LoginButton" : ''}} {{$clientLikeshow == 1 ? ($clientLike->liked == 1 ? 'text-primary' :'') : '' }}" text="{{$clientLikeshow == 1 ? ($clientLike->liked == 1 ? 'text-primary' :'') : ''  }}" value="1" {{!Session::has('client') ? "data-toggle=modal data-target=#requestQuoteModal" : ''}}> <i class="fa fa-thumbs-up"></i> </span>
                                            (<span class="totalDisliked text-danger">{{count($TotalDislikes)}}</span>)
                                            <span class="likeForm disLikeForm1 {{!Session::has('client') ? "LoginButton" : ''}} {{$clientLikeshow == 1 ? ($clientLike->liked == 0 ? 'text-danger' :'') : ''  }}" text="{{$clientLikeshow == 1 ? ($clientLike->liked == 0 ? 'text-danger' :'') : ''  }}" value="0" {{!Session::has('client') ? "data-toggle=modal data-target=#requestQuoteModal" : ''}}><i class="fa fa-thumbs-up" style="transform: rotate(174deg);"></i></span>
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
                                  </div>
                                </div>
                                <div class="col-md-8">
                                  <div class="card mb-3">
                                    <div class="card-body">
                                        @if($signalData->orderType != null)
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <h6 class="mb-0">Order Type</h6>
                                                </div>
                                                <div class="col-sm-8 text-secondary fontBold">
                                                    {{$signalData->orderType}}
                                                </div>
                                            </div>
                                            <hr>
                                        @endif
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <h6 class="mb-0">Order</h6>
                                            </div>
                                            <div class="col-sm-8 text-{{stripos($signalData->buySale,'Sell') !== false ? 'danger' : 'primary'}} fontBold">
                                                {{$signalData->buySale}}
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <h6 class="mb-0">Price</h6>
                                            </div>
                                            <div class="col-sm-8 text-secondary fontBold">
                                                {{$signalData->price}}
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <h6 class="mb-0  pt-2">Take Profit</h6>
                                            </div>
                                            <div class="col-sm-8 text-secondary fontBold">
                                                <span class="text-primary">{{$profit}}</span>
                                            </div>
                                            @for($i=0; $i < count($Profits); $i++)
                                                <div class="col-sm-4">
                                                    <h6 class="mb-0  pt-2">Take Profit{{$i + 1}}</h6>
                                                </div>
                                                <div class="col-sm-8 text-secondary fontBold">
                                                    <span class="text-primary">{{$Profits[$i]}}</span>
                                                </div>
                                            @endfor
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <h6 class="mb-0">Stop Lose</h6>
                                            </div>
                                            <div class="col-sm-8 text-secondary fontBold">
                                                <span class="text-danger">{{$signalData->stopLose}}</span>
                                            </div>
                                        </div>
                                        <hr>
                                        @if($signalData->result != null && $signalData->result != 'none')
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <h6 class="mb-0">Result</h6>
                                                </div>
                                                <div class="col-sm-8 {{$signalData->result == 'TP Hit' ? 'text-success' : ''}}{{$signalData->result == 'SL Hit' ? 'text-danger' : ''}} fontBold">
                                                    {{$signalData->result == null ? 'none' : $signalData->result}}
                                                </div>
                                            </div>
                                            <hr>
                                        @endif
                                        @if($signalData->pips != null)
                                            <div class="row">
                                                <div class="col-sm-4">
                                                    <h6 class="mb-0">Pips</h6>
                                                </div>
                                                <div class="col-sm-8 {{str_contains($signalData->pips,'+') != null ? 'text-success' : ''}}{{str_contains($signalData->pips,'-') ? 'text-danger' : ''}} fontBold">
                                                    {{$signalData->pips == null ? 'none' : $signalData->pips}}
                                                </div>
                                            </div>
                                            <hr>
                                        @endif
                                        @if($signalApiData)
                                          @if($signalData->result == null && $signalData->pips == null)
                                              <div class="row">
                                                  <div class="col-sm-4">
                                                      <h6 class="mb-0">Current Market Price</h6>
                                                  </div>
                                                  <div class="col-sm-8 fontBold">
                                                      {{$signalApiData->price}}
                                                  </div>
                                              </div>
                                              <hr>
                                              <div class="row">
                                                  <div class="col-sm-4">
                                                      <h6 class="mb-0">Current Market Opening Price</h6>
                                                  </div>
                                                  <div class="col-sm-8 fontBold">
                                                      {{$signalApiData->opening_price}}
                                                  </div>
                                              </div>
                                              <hr>
                                              <div class="row">
                                                  <div class="col-sm-4">
                                                      <h6 class="mb-0">Current Market High</h6>
                                                  </div>
                                                  <div class="col-sm-8 fontBold">
                                                      {{$signalApiData->high}}
                                                  </div>
                                              </div>
                                              <hr>
                                              <div class="row">
                                                  <div class="col-sm-4">
                                                      <h6 class="mb-0">Current Market Low</h6>
                                                  </div>
                                                  <div class="col-sm-8 fontBold">
                                                      {{$signalApiData->low}}
                                                  </div>
                                              </div>
                                              <hr>
                                              <div class="row">
                                                  <div class="col-sm-4">
                                                      <h6 class="mb-0">Our PIPs</h6>
                                                  </div>
                                                  <div class="col-sm-8 fontBold {{$signalApiData->pips > 0 ? 'text-primary' : 'text-danger' }}">
                                                      {{$signalApiData->pips}}
                                                  </div>
                                              </div>
                                              <hr>
                                              @if($signalApiData->result != null)
                                                <div class="row">
                                                    <div class="col-sm-4">
                                                        <h6 class="mb-0">Our Current Result</h6>
                                                    </div>

                                                    <div class="col-sm-8 fontBold {{$signalApiData->result != 'SL Hit' ? 'text-primary' : 'text-danger'}} ">
                                                        {{$signalApiData->result}} 
                                                    </div>
                                                </div>
                                                <hr>
                                              @endif
                                          @endif
                                                
                                        @endif
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
                                <div class="col-md-12">
                                    @php
                                        $detailDescription = html_entity_decode($signalData->detailDescription);
                                        echo $detailDescription;
                                    @endphp
                                </div>
                              </div>
                            </div>
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
                                  <form action="{{URL::to('/signal/comment/add')}}" method="post">
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
                                        <input type="hidden" name="signalId" value="{{$signalData->id}}">
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
                                          <h4>{{ $comment->userType == "client" ? $client->name : $adminDetailInfo->firstName . ' ' . $adminDetailInfo->lastName}}</h4>
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
                                            <a class="ml-3" data-toggle="collapse" data-target="#demo{{$comment->id}}">View Replies <span class="text-dark">({{count($replys)}})</span></a>
                                            <!-- <span aria-hidden="true"> · </span>
                                            <i class="fa fa-thumbs-o-up"></i> <span class="count">1</span>
                                            <span aria-hidden="true"> · </span>
                                            <span>26m</span> -->
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
                                                        @endif
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
    /* counter Styling start */

    #clockdiv{
        font-family: sans-serif;
        color: #fff;
        display: inline-block;
        font-weight: 100;
        text-align: center !important;
        font-size: 30px;
        display: block;
    }

    #clockdiv > div{
        padding: 10px;
        border-radius: 3px;
        background: linear-gradient(45deg, #ff0024, #0d5fe9);;
        display: inline-block;
    }

    #clockdiv div > span{
        padding: 15px;
        border-radius: 3px;
        background: #00816A;
        display: inline-block;
    }

    .smalltext{
        padding-top: 5px;
        font-size: 16px;
    }
    /* Counter Styling end */

    .fontBold{
        font-weight: 900;
    }
    .likeForm{
        cursor: pointer;
    }
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

{{-- Counter Script Start --}}

    @php
        $start_date = $signalData->date . " " . $signalData->time;

        // end date

        $end_date = date("Y-m-d H:i:s");

        $ss = strtotime($start_date) - strtotime($end_date);


    @endphp

<script>
    @if($ss < 0)
        $("#clockdiv").hide();
    @endif
    function getTimeRemaining(endtime) {
        var t = Date.parse(endtime) - Date.parse(new Date());
        var seconds = Math.floor((t / 1000) % 60);
        var minutes = Math.floor((t / 1000 / 60) % 60);
        var hours = Math.floor((t / (1000 * 60 * 60)) % 24);
        var days = Math.floor(t / (1000 * 60 * 60 * 24));
        return {
            'total': t,
            'days': days,
            'hours': hours,
            'minutes': minutes,
            'seconds': seconds
        };
    }

    function initializeClock(id, endtime) {
        var clock = document.getElementById(id);
        var daysSpan = clock.querySelector('.days');
        var hoursSpan = clock.querySelector('.hours');
        var minutesSpan = clock.querySelector('.minutes');
        var secondsSpan = clock.querySelector('.seconds');

        function updateClock() {
            var t = getTimeRemaining(endtime);

            daysSpan.innerHTML = t.days;
            hoursSpan.innerHTML = ('0' + t.hours).slice(-2);
            minutesSpan.innerHTML = ('0' + t.minutes).slice(-2);
            secondsSpan.innerHTML = ('0' + t.seconds).slice(-2);

            if (t.total <= 0) {
                clearInterval(timeinterval);
            }
        }

        updateClock();
        var timeinterval = setInterval(updateClock, 1000);
    }

    var deadline = new Date(Date.parse(new Date()) + {{$ss}} * 1000);
    initializeClock('clockdiv', deadline);

</script>
{{-- Counter Script End --}}
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
							'<img src=\"{{URL::to('/public/assets/assets/img/user1.jpg')}}\" alt=\"avatar\"/>'+
							'</div>'+
							'<div class=\"box_comment col-md-9\">'+
								'<form action=\"{{URL::to('/signal/comment/add')}}\" method="post">'+
									'<textarea class=\"comment_replay\" name=\"comment\" placeholder=\"Add a comment...\"></textarea>'+
									'<div class=\"box_post\">'+
										'<div class=\"pull-right\">'+
										'<span>'+
											'<img src=\"{{URL::to('/public/assets/assets/img/user1.jpg')}}\" alt=\"avatar\" />'+
											'<i class=\"fa fa-caret-down\"></i>'+
										'</span>'+
										'<input type=\"hidden\" name=\"memberId\" value=\"{{$value['id']}}\">'+
										'<input type=\"hidden\" name=\"userType\" value=\"client\">'+
										'<input type=\"hidden\" name=\"signalId\" value=\"{{$signalData->id}}\"> '+
										'<input type=\"hidden\" name=\"reply\" value=\"{{$signalData->id}}\"> '+
										'<input type=\"hidden\" name=\"replyName\" value=\"'+currentH4+'\"> '+
										'<input type=\"hidden\" name=\"commentId\" value=\"'+commentId+'\"> '+
										'<input type=\"hidden\" name=\"replyCommentMember\" value=\"'+replyCommentMember+'\"> '+
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
            if (likeData == 0) {
                if (previousClass == null || previousClass == "") {
                    var ifd = $(".likeForm1").attr('text');
                    console.log(ifd);
                    if (ifd != null && ifd != "") {
                        var like1 = $(".totalLiked").html();
                        $(".totalLiked").html(--like1);
                        $(".likeForm1").attr('class','likeForm likeForm1');
                        $(".likeForm1").attr('text','');
                    }
                    $(this).attr('class','likeForm disLikeForm1 text-danger');
                    $(this).attr('text','text-danger');
                    var dislike = $(".totalDisliked").html();
                    $(".totalDisliked").html(++dislike);
                }else{
                    $(this).attr('class','likeForm disLikeForm1');
                    $(this).attr('text','');
                    var dislike = $(".totalDisliked").html();
                    $(".totalDisliked").html(--dislike);
                }
            }else{
                if (previousClass == null || previousClass == "") {
                    var ifd1 = $(".disLikeForm1").attr('text');
                    console.log(ifd1);
                    if (ifd1 != null && ifd1 != "") {
                    console.log(ifd1);
                        var dislike1 = $(".totalDisliked").html();
                        $(".totalDisliked").html(--dislike1);
                        $(".disLikeForm1").attr('class','likeForm disLikeForm1');
                        $(".disLikeForm1").attr('text','');
                    }
                    $(this).attr('class','likeForm likeForm1 text-primary');
                    $(this).attr('text','text-primary');
                    var like = $(".totalLiked").html();
                    $(".totalLiked").html(++like);
                }else{
                    $(this).attr('class','likeForm likeForm1');
                    $(this).attr('text','');
                    var like = $(".totalLiked").html();
                    $(".totalLiked").html(--like);
                }
            }
            var url = "{{URL::to('signal/like')}}" + "/" + "{{$signalData->id}}" + "/" + likeData;
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

<script data-ad-client="ca-pub-4965167409528757" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>