@php
	$value =Session::get('admin');
@endphp
@include('admin.include.header')

<section class="pcoded-main-container">
    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Comment</h5>
                        </div>
                        <div class="d-flex justify-content-between">
                            <ul class="breadcrumb p-0 m-0 bg-white">
                                <li class="breadcrumb-item">
                                    <a href="{{URL::to('/ustaad/dashboard')}}"><i class="fa fa-home"></i></a>
                                </li>
                                <li class="breadcrumb-item"><a href="{{URL::to('/ustaad/fundamental')}}">All Fundamental</a></li>
                                <li class="breadcrumb-item"><a href="#!" class="text-dark">Comments</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
        <div class="row">
            <div class="col-lg-12">

                @php 
                    $idf = 1;
                    $idf1 = 2;
                @endphp
                @foreach($comments as $com)
                    @if($com->reply == 0)
                        @php
                            $idf+=2;
                            $idf1+=2;
                            if($com->userType == "client"){
                                $memberInfo = $com->getMemberInformation();
                                if($memberInfo->image == null){
                                    $urlImageSrc = URL::to('/public/assets/assets/img/user1.jpg');
                        }else{
                            $urlImageSrc = URL::to('/storage/app') . '/' . $memberInfo->image;
                        }
                            }else{
                                $adminInfo = $com->getAdminInformation();
                                $adminDetailInfo = $com->getAdminDetailInformation();
                                $urlImageSrc = URL::to('/storage/app') . '/' . $adminDetailInfo->userImage;
                            }
                            $BlogRplies = $com->getReply();
                        @endphp
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-12 mt-3">
                                    <div class="card">
                                        <div class="row">
                                                <div class="col-md-12">
                                                    <div class="card-horizontal">
                                                        <div class="img-square-wrapper">
                                                            <img class="" src="{{$urlImageSrc}}" alt="Card image cap">
                                                        </div>
                                                        <div class="card-body">
                                                            <div class="d-flex">
                                                                <span><h4 class="card-title">{{$com->userType == "client" ? $memberInfo->name : $adminInfo->username}}</h4></span>
                                                            </div>
                                                            <p class="card-text">{{$com->comment}}</p>
                                                            <div>
                                                                <ul class="d-flex pl-13 p-0">
                                                                    <li class="cursor text-primary" data-toggle="collapse" data-target="#demo{{$idf}}">Reply</li>
                                                                    <li class="cursor" data-toggle="collapse" data-target="#demo{{$idf1}}">{{count($BlogRplies)}} Replies <i class="fa fa-angle-down" aria-hidden="true"></i></li>
                                                                    <!-- <li><a href="{{URL::to('ustaad/comment/latest/delete')}}/{{$com->id}}" class="addAction" data-toggle="modal" data-target="#myModal"><i class="fa fa-trash text-danger" aria-hidden="true"></i></a></li> -->
                                                                </ul>
                                                                <div id="demo{{$idf}}" class="collapse">
                                                                    <form action="{{URL::to('/ustaad/fundamental/CommentViewReply/add')}}" method="post">
                                                                        <textarea class="form-control" name="comment"></textarea>
                                                                        <input type="hidden" name="memberId" value="{{$value['id']}}">
                                                                        <input type="hidden" name="userType" value="admin">
                                                                        <!-- <input type="hidden" name="fundamentalId" value="{{$com->fundamentalId}}"> -->
                                                                        <input type="hidden" name="reply" value="1">
                                                                        <input type="hidden" name="commentId" value="{{$com->id}}">
                                                                        <p class="text-right"><input type="submit" class="btn btn-primary mt-2" value="submit"></p>
                                                                    </form>
                                                                </div>
                                                                <div id="demo{{$idf1}}" class="collapse">
                                                                    @foreach($BlogRplies as $reply)
                                                                        @php
                                                                            if($reply->userType == "client"){
                                                                                $memberInfo1 = $reply->getMemberInformation();
                                                                                if($memberInfo1->image == null){
                                                                                    $urlImageSrc1 = URL::to('/public/assets/assets/img/user1.jpg');
                                                                                }else{
                                                                                    $urlImageSrc1 = URL::to('/storage/app') . '/' . $memberInfo1->image;
                                                                                }
                                                                            }else{
                                                                                $adminInfo1 = $reply->getAdminInformation();
                                                                                $adminDetailInfo1 = $reply->getAdminDetailInformation();
                                                                                $urlImageSrc1 = URL::to('/storage/app') . '/' . $adminDetailInfo1->userImage;
                                                                            }
                                                                        @endphp
                                                                        <div class="card-horizontal">
                                                                            <div class="img-square-wrapper">
                                                                                <img class="" src="{{$urlImageSrc1}}" alt="Card image cap">
                                                                            </div>
                                                                            <div class="card-body">
                                                                                <div class="d-flex">
                                                                                    <span><h4 class="card-title">{{$reply->userType == "client" ? $memberInfo1->name : $adminInfo1->username }}</h4></span>
                                                                                </div>
                                                                                <p class="card-text"><span class="ml-1 text-primary">{{$reply->replyName}} </span> {{$reply->comment}}</p>
                                                                            </div>
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>


        <!-- [ Main Content ] end -->
    </div>
</section>
<!-- [ Main Content ] end -->

@include('admin.include.footer')

<style type="text/css">
    .cursor{
        cursor:pointer;
    }
    .card-horizontal {
        display: flex;
        flex: 1 1 auto;
    }
    .img-square-wrapper{
        padding: 19px;
    }
    .img-square-wrapper img{
        width: 60px;
        border-radius: 50%;
        height: 60px;
    }
    .pl-13 li {
        padding-left: 13px;
        list-style-type: none;
    }
</style>
