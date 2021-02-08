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
                            <h5 class="m-b-10">Email Read</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{URL::to('ustaad/contact')}}">Contact</a></li>
                            <li class="breadcrumb-item"><a href="#!">Email Read</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
        <div class="row">
            <div class="col-sm-12">
                <div class="card email-card">
                    <div class="card-header">
                        <div class="mail-header">
                            <div class="row align-items-center">
                                <!-- [ email-left section ] start -->
                                <div class="col-xl-2 col-md-3">
                                    <a href="index.html" class="b-brand">
                                        <div class="b-bg">
                                            F
                                        </div>
                                        <span class="b-title text-muted">Forexustaad</span>
                                    </a>
                                </div>
                                <!-- [ email-left section ] end -->
                                <!-- [ email-right section ] start -->
                                <div class="col-xl-10 col-md-9">
                                    <div class="input-group mb-0">
                                        <div class="input-group-prepend">
                                            <label class="input-group-text" for="inputGroupSelect01"><i class="feather icon-search"></i></label>
                                        </div>
                                        <select class="custom-select" id="inputGroupSelect01">
                                            <option selected>Search ...</option>
                                            <option value="1">One</option>
                                            <option value="2">Two</option>
                                            <option value="3">Three</option>
                                        </select>
                                    </div>
                                </div>
                                <!-- [ email-right section ] end -->
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="mail-body">
                            <div class="row">
                                <!-- [ email-left section ] start -->
                                    <div class="col-xl-2 col-md-3">
                                        <div class="mb-3">
                                            <a href="{{URL::to('/ustaad/contact/emailCompose')}}" class="btn waves-effect waves-light btn-rounded btn-outline-primary">+ Compose</a>
                                        </div>
                                        <ul class="mb-2 nav nav-tab flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                            <li class="nav-item mail-section inboxData">
                                                <a class="nav-link text-left active" href="{{URL::to('ustaad/contact')}}" aria-controls="v-pills-home" aria-selected="false">
                                                    <span><i class="feather icon-inbox"></i>Inbox</span>
                                                    <span class="float-right">{{count($totalData)}}</span>
                                                </a>
                                            </li>
                                            <li class="nav-item mail-section inboxData">
                                                <a class="nav-link text-left" href="{{URL::to('ustaad/contact')}}">
                                                    <span><i class="feather icon-star-on"></i> Starred</span>
                                                </a>
                                            </li>
                                            <li class="nav-item mail-section inboxData">
                                                <a class="nav-link text-left" href="{{URL::to('ustaad/contact')}}">
                                                    <span><i class="feather icon-navigation"></i> Sent Mail</span>
                                                </a>
                                            </li>
                                            <li class="nav-item mail-section inboxData">
                                                <a class="nav-link text-left" href="{{URL::to('ustaad/contact')}}">
                                                    <span><i class="feather icon-file-text"></i> Drafts</span>
                                                </a>
                                            </li>
                                            <li class="nav-item mail-section inboxData UnTrashData">
                                                <a class="nav-link text-left" href="{{URL::to('ustaad/contact')}}">
                                                    <span><i class="feather icon-trash-2"></i> Trash</span>
                                                </a>
                                            </li>
                                        </ul>
                                        <!-- <a class="email-more-link" data-toggle="collapse" href="#email-more-cont" role="button" aria-expanded="false" aria-controls="email-more-cont">
                                            <span><i class="feather icon-chevron-down mr-2"></i>More</span>
                                            <span style="display: none;"><i class="feather icon-chevron-up mr-2"></i>Less</span>
                                        </a> -->
                                    </div>
                                <!-- [ email-left section ] end -->
                                <!-- [ email-right section ] start -->
                                <div class="col-xl-10 col-md-9">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="email-read">
                                                <div class="photo-table m-r-10">
                                                    <a href="#">
                                                        <img class="media-object img-radius" src="{{URL::to('storage/app/WebImages/avatar-5.jpg')}}" alt="E-mail user" style="width:50px;">
                                                    </a>
                                                </div>
                                                <div>
                                                @php
                                                    $ijk = 0;
                                                    if(isset($data)){
                                                        $ijk=1;
                                                    }
                                                    if($ijk==1){
                                                            $replyMessage = $data->getMessages();
                                                            $countReplies = count($replyMessage);
                                                       
                                                    }
                                                @endphp
                                                    <a href="#">
                                                        <p class="user-name text-dark mb-1"><strong>{{$ijk == 1 ? $data->name : $dataSend->subject }}</strong></p>
                                                    </a>
                                                    <a class="user-mail txt-muted" href="#">
                                                        <p class="user-name text-dark mb-1"><strong>From:{{$ijk == 1 ? $data->email : $dataSend->emailTo }}</strong></p>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="m-b-20 m-l-50 p-l-10 email-contant">
                                                <div class="photo-contant">
                                                    <div>
                                                        <div class="email-content">{{$ijk == 1 ? $data->message : $dataSend->message}}</div>
                                                    </div>
                                                    @if($ijk == 1)
                                                    <div class="m-t-15 text-right">
                                                        <div>
                                                            <a class="text-primary Cursor" data-toggle="collapse" data-target="#demo2">View Replies({{$countReplies}})</a>
                                                            <a class="text-primary Cursor ml-3" data-toggle="collapse" data-target="#demo1">Reply</a>
                                                        </div>
                                                        <div id="demo1" class="collapse">
                                                            <form action="{{URL::to('ustaad/contact/SendMailDirect')}}" method="post">
                                                                <textarea name="message" class="form-control ReplyMessage" required></textarea>
                                                                <p class=" text-right mb-0 mt-2">
                                                                    <input type="hidden" name="emailTo" value="{{$data->email}}">
                                                                    <input type="hidden" name="mailId" value="{{$data->id}}">
                                                                    <input type="hidden" name="userId" value="{{$value['id']}}">
                                                                    <button class="btn btn-primary btn-sm ReplySend">Submit</button>
                                                                </p>
                                                            </form>
                                                        </div>
                                                        @if($countReplies > 0)
                                                        <div id="demo2" class="collapse text-left">
                                                            <h2>Replies</h2>
                                                            @foreach($replyMessage as $message)
                                                                    @php 
                                                                        $admin = $message->GetAdminMember();
                                                                        $adminDetail = $admin->GetMemberDetail();
                                                                        if($adminDetail->userImage == null){
                                                                            $image = URL::to('storage/app/WebImages/avatar-5.jpg');
                                                                        }else{
                                                                            $image = URL::to('storage/app') . '/' . $adminDetail->userImage;
                                                                        }
                                                                    @endphp
                                                                    <div class="d-flex">
                                                                        <div>
                                                                            <div class="photo-table m-r-10">
                                                                                <a href="#">
                                                                                    <img class="media-object img-radius" src="{{$image}}" alt="E-mail user" style="width:50px;">
                                                                                </a>
                                                                            </div>
                                                                        </div>
                                                                        <div>
                                                                            <div>
                                                                                <p class="user-name text-dark mb-1"><strong>{{$admin->username}}</strong></p>
                                                                                <p class="user-name text-dark mb-1"><strong>From:mail@forexustaad.com</strong></p>
                                                                                <div class="email-content">{{$message->message}}</div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                            @endforeach
                                                        </div>
                                                        @endif
                                                    </div>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- [ email-right section ] start -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ Main Content ] end -->
    </div>
</section>

<style>
    .Cursor{
       cursor: pointer;
    }
</style>
@include('admin.include.footer')
<script src="assets/js/plugins/ekko-lightbox.min.js"></script>
<script src="assets/js/plugins/lightbox.min.js"></script>
<script>
    $(document).ready(function() {
        $(document).on('click', '[data-toggle="lightbox"]', function(event) {
            event.preventDefault();
            $(this).ekkoLightbox();
        });
    });
 
</script>
