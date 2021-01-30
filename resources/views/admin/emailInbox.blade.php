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
                            <h5 class="m-b-10">Inbox</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{URL::to('/ustaad/dashboard')}}"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">Contact</a></li>
                            <li class="breadcrumb-item"><a href="#!">Inbox</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
        <form action="" class="InboxSentForm" method="post">
            <div class="row">
                <div class="col-sm-12">
                    <div class="card email-card">
                        <div class="card-header">
                            <div class="mail-header">
                                <div class="row align-items-center">
                                    <!-- [ inbox-left section ] start -->
                                    <div class="col-xl-2 col-md-3">
                                        <a href="{{URL::to('/ustaad/dashboard')}}" class="b-brand">
                                            <div class="b-bg">
                                                F
                                            </div>
                                            <span class="b-title text-muted">Forexustaad</span>
                                        </a>
                                    </div>
                                    <!-- [ inbox-left section ] end -->
                                    <!-- [ inbox-right section ] start -->
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
                                    <!-- [ inbox-right section ] end -->
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="mail-body">
                                <div class="row">
                                    <!-- [ inbox-left section ] start -->
                                    <div class="col-xl-2 col-md-3">
                                        <div class="mb-3">
                                            <a href="{{URL::to('/ustaad/contact/emailCompose')}}" class="btn waves-effect waves-light btn-rounded btn-outline-primary">+ Compose</a>
                                        </div>
                                        <ul class="mb-2 nav nav-tab flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                            <li class="nav-item mail-section inboxData">
                                                <a class="nav-link text-left active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="false">
                                                    <span><i class="feather icon-inbox"></i>Inbox</span>
                                                    <span class="float-right">{{count($totalData)}}</span>
                                                </a>
                                            </li>
                                            <li class="nav-item mail-section inboxData">
                                                <a class="nav-link text-left" id="v-pills-starred-tab" data-toggle="pill" href="#v-pills-starred" role="tab">
                                                    <span><i class="feather icon-star-on"></i> Starred</span>
                                                </a>
                                            </li>
                                            <li class="nav-item mail-section inboxData">
                                                <a class="nav-link text-left" id="v-pills-settings-tab" data-toggle="pill" href="#v-pills-mail" role="tab">
                                                    <span><i class="feather icon-navigation"></i> Sent Mail</span>
                                                </a>
                                            </li>
                                            <li class="nav-item mail-section inboxData">
                                                <a class="nav-link text-left" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-draft" role="tab">
                                                    <span><i class="feather icon-file-text"></i> Drafts</span>
                                                </a>
                                            </li>
                                            <li class="nav-item mail-section inboxData UnTrashData">
                                                <a class="nav-link text-left" id="v-pills-Trash-tab" data-toggle="pill" href="#v-pills-Trash" role="tab">
                                                    <span><i class="feather icon-trash-2"></i> Trash</span>
                                                </a>
                                            </li>
                                        </ul>
                                        <!-- <a class="email-more-link" data-toggle="collapse" href="#email-more-cont" role="button" aria-expanded="false" aria-controls="email-more-cont">
                                            <span><i class="feather icon-chevron-down mr-2"></i>More</span>
                                            <span style="display: none;"><i class="feather icon-chevron-up mr-2"></i>Less</span>
                                        </a> -->
                                        <div class="collapse" id="email-more-cont">
                                            <ul class="nav nav-tab flex-column nav-pills">
                                                <li class="nav-item mail-section">
                                                    <a class="nav-link text-left">
                                                        <span><i class="feather icon-zap"></i> Important</span>
                                                        <span class="float-right">6</span>
                                                    </a>
                                                </li>
                                                <li class="nav-item mail-section">
                                                    <a class="nav-link text-left">
                                                        <span><i class="feather icon-message-circle"></i> Chats</span>
                                                    </a>
                                                </li>
                                                <li class="nav-item mail-section">
                                                    <a class="nav-link text-left">
                                                        <span><i class="feather icon-alert-triangle"></i> Spam</span>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- [ inbox-left section ] end -->
                                    <!-- [ inbox-right section ] start -->
                                    <div class="col-xl-10 col-md-9 inbox-right">
                                        <div class="email-btn">
                                            <!-- <button type="button" class="btn waves-effect waves-light btn-icon btn-rounded btn-outline-secondary mb-2"><i class="feather icon-alert-circle"></i></button> -->
                                            <!-- <button type="button" class="btn waves-effect waves-light btn-icon btn-rounded btn-outline-secondary mb-2"><i class="feather icon-inbox"></i></button> -->
                                            <button type="submit" class="btn waves-effect waves-light btn-icon btn-rounded btn-outline-secondary mb-2 "><i class="feather icon-trash-2"></i></button>
                                            <button type="submit" class="btn waves-effect waves-light btn-icon btn-rounded btn-outline-secondary mb-2" id="UnTrashData"><i class="feather icon-refresh-ccw"></i></button>
                                        </div>
                                        <div class="tab-content p-0" id="v-pills-tabContent">
                                            <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
                                                <div class="tab-content" id="pills-tabContent">
                                                    <div class="tab-pane fade show active" id="pills-primary" role="tabpanel" aria-labelledby="pills-primary-tab">
                                                        <div class="mail-body-content table-responsive">
                                                            <table class="table">
                                                                <tbody>
                                                                    @php
                                                                        $countCheck = 0;
                                                                    @endphp
                                                                    @foreach($totalData as $data)
                                                                        @if($data->trashMail == 0)
                                                                            <tr class="{{$data->read == 1 ? 'read' : 'unread'}}" link="{{$data->read == 1 ? '' : $data->id}}">
                                                                                <td>
                                                                                    <div class="check-star">
                                                                                        <div class="form-group d-inline">
                                                                                            <div class="checkbox checkbox-primary checkbox-fill d-inline">
                                                                                                <input type="checkbox" name="inbox[]" id="checkbox-s-infill-{{$countCheck}}" value="{{$data->id}}">
                                                                                                <label for="checkbox-s-infill-{{$countCheck}}" class="cr"></label>
                                                                                            </div>
                                                                                        </div>
                                                                                        <a href="{{URL::to('/ustaad/contact/starMessage')}}/{{$data->id}}"><i class="feather {{$data->star == 1 ? 'icon-star-on text-c-yellow' : 'icon-star'}} ml-2"></i></a>
                                                                                    </div>
                                                                                </td>
                                                                                <td><a href="{{URL::to('ustaad/contact/emailRead')}}/{{$data->id}}">{{$data->email}}</a></td>
                                                                                <td><a href="{{URL::to('ustaad/contact/emailRead')}}/{{$data->id}}">{{$data->name}}</a></td>
                                                                                <td><a href="{{URL::to('ustaad/contact/emailRead')}}/{{$data->id}}">{{$data->created_at->format("dM,Y h:i a")}}</a></td>
                                                                            </tr>
                                                                            @php $countCheck++ @endphp
                                                                        @endif
                                                                    @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="v-pills-starred" role="tabpanel">
                                                <p class="mb-0">
                                                    <div class="tab-pane fade show active" id="pills-starred" role="tabpanel">
                                                        <div class="mail-body-content table-responsive">
                                                            <table class="table">
                                                                <tbody>
                                                                    @foreach($totalData as $data)
                                                                        @if($data->star == 1 && $data->trashMail == 0)
                                                                            <tr class="{{$data->read == 1 ? 'read' : 'unread'}}">
                                                                                <td>
                                                                                    <div class="check-star">
                                                                                        <div class="form-group d-inline">
                                                                                            <div class="checkbox checkbox-primary checkbox-fill d-inline">
                                                                                                <input type="checkbox"  name="inbox[]" id="checkbox-s-infill-{{$countCheck}}" value="{{$data->id}}">
                                                                                                <label for="checkbox-s-infill-{{$countCheck}}" class="cr"></label>
                                                                                            </div>
                                                                                        </div>
                                                                                        <a href="{{URL::to('/ustaad/contact/starMessage')}}/{{$data->id}}"><i class="feather icon-star-on text-c-yellow ml-2"></i></a>
                                                                                    </div>
                                                                                </td>
                                                                                <td><a href="{{URL::to('ustaad/contact/emailRead')}}/{{$data->id}}">{{$data->email}}</a></td>
                                                                                <td><a href="{{URL::to('ustaad/contact/emailRead')}}/{{$data->id}}">{{$data->name}}</a></td>
                                                                                <td><a href="{{URL::to('ustaad/contact/emailRead')}}/{{$data->id}}">{{$data->created_at->format("dM,Y h:i a")}}</a></td>
                                                                            </tr>
                                                                            @php $countCheck++ @endphp
                                                                        @endif
                                                                    @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                            </div>
                                            <div class="tab-pane fade" id="v-pills-mail" role="tabpanel">
                                                <div class="mail-body-content table-responsive">
                                                    <table class="table">
                                                        <tbody>
                                                            @foreach($totalCompose as $data)
                                                                @if($data->draft == 0 && $data->trashMail == 0)
                                                                    <tr class="read">
                                                                        <td>
                                                                            <div class="check-star">
                                                                                <div class="form-group d-inline">
                                                                                    <div class="checkbox checkbox-primary checkbox-fill d-inline">
                                                                                        <input type="checkbox" name="sent[]" id="checkbox-s-infill-{{$countCheck}}" value="{{$data->id}}">
                                                                                        <label for="checkbox-s-infill-{{$countCheck}}" class="cr"></label>
                                                                                        <a href="{{URL::to('ustaad/contact/sendEmailRead')}}/{{$data->id}}">{{$data->emailTo}}</a></td>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        <td><a href="{{URL::to('ustaad/contact/sendEmailRead')}}/{{$data->id}}">{{$data->subject}}</a></td>
                                                                        <td><a href="{{URL::to('ustaad/contact/sendEmailRead')}}/{{$data->id}}">{{$data->created_at->format("dM,Y h:i a")}}</a></td>
                                                                    </tr>
                                                                    @php $countCheck++ @endphp
                                                                @endif
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="v-pills-draft" role="tabpanel">
                                                <div class="mail-body-content table-responsive">
                                                    <table class="table">
                                                        <tbody>
                                                            @foreach($totalCompose as $data)
                                                                @if($data->draft == 1 && $data->trashMail == 0)
                                                                    <tr class="read">
                                                                        <td>
                                                                            <div class="check-star">
                                                                                <div class="form-group d-inline">
                                                                                    <div class="checkbox checkbox-primary checkbox-fill d-inline">
                                                                                        <input type="checkbox" name="sent[]" id="checkbox-s-infill-{{$countCheck}}" value="{{$data->id}}"> 
                                                                                        <label for="checkbox-s-infill-{{$countCheck}}" class="cr"></label>
                                                                                        <a href="{{URL::to('/ustaad/contact/draftEmailRead')}}/{{$data->id}}" class="email-name waves-effect">{{$data->emailTo}}</a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td>
                                                                            <a href="{{URL::to('/ustaad/contact/draftEmailRead')}}/{{$data->id}}" class="email-name waves-effect">{{$data->message}}</a>    
                                                                        </td>
                                                                        <td class="email-time">{{$data->created_at->format("dM,Y h:i a")}}</td>
                                                                    </tr>
                                                                    @php $countCheck++ @endphp
                                                                @endif
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="v-pills-Trash" role="tabpanel">
                                                <div class="mail-body-content table-responsive">
                                                    <table class="table">
                                                        <tbody>
                                                            @foreach($totalCompose as $data)
                                                                @if($data->trashMail == 1)
                                                                    <tr class="read">
                                                                        <td>
                                                                            <div class="check-star">
                                                                                <div class="form-group d-inline">
                                                                                    <div class="checkbox checkbox-primary checkbox-fill d-inline">
                                                                                        <input type="checkbox" name="sentTrash[]" id="checkbox-s-infill-{{$countCheck}}" value="{{$data->id}}"> 
                                                                                        <label for="checkbox-s-infill-{{$countCheck}}" class="cr"></label>
                                                                                        <a href="{{URL::to('ustaad/contact')}}/{{$data->draft == 1 ? 'draftEmailRead' : 'sendEmailRead'}}/{{$data->id}}">{{$data->emailTo}}</a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td><a href="{{URL::to('ustaad/contact')}}/{{$data->draft == 1 ? 'draftEmailRead' : 'sendEmailRead'}}/{{$data->id}}">{{$data->subject}}</a></td>
                                                                        <td><a href="{{URL::to('ustaad/contact')}}/{{$data->draft == 1 ? 'draftEmailRead' : 'sendEmailRead'}}/{{$data->id}}">{{$data->created_at->format("dM,Y h:i a")}}</a></td>
                                                                    </tr>
                                                                    @php $countCheck++ @endphp
                                                                @endif
                                                            @endforeach
                                                            @foreach($totalData as $data)
                                                                @if($data->trashMail == 1)
                                                                    <tr class="{{$data->read == 1 ? 'read' : 'unread'}}">
                                                                        <td>
                                                                            <div class="check-star">
                                                                                <div class="form-group d-inline">
                                                                                    <div class="checkbox checkbox-primary checkbox-fill d-inline">
                                                                                        <input type="checkbox"  name="inboxTrash[]" id="checkbox-s-infill-{{$countCheck}}" value="{{$data->id}}">
                                                                                        <label for="checkbox-s-infill-{{$countCheck}}" class="cr"></label>
                                                                                        <a href="{{URL::to('ustaad/contact/emailRead')}}/{{$data->id}}">{{$data->email}}</a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                        <td><a href="{{URL::to('ustaad/contact/emailRead')}}/{{$data->id}}">{{$data->name}}</a></td>
                                                                        <td><a href="{{URL::to('ustaad/contact/emailRead')}}/{{$data->id}}">{{$data->created_at->format("dM,Y h:i a")}}</a></td>
                                                                    </tr>
                                                                    @php $countCheck++ @endphp
                                                                @endif
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- [ inbox-right section ] end -->
                                </div>
                            </div>
                        </di
                    </div>
                </div>
            </div>
        </form>
        <!-- [ Main Content ] end -->
    </div>
</section>

@include('admin.include.footer')

<style>
    .Cursor{
       cursor: pointer;
    }
</style>
<script>
    $("#UnTrashData").hide();
    $("#UnTrashData").on("click",function() {
        $(".InboxSentForm").attr("action","{{URL::to('ustaad/contact/unTrash')}}");
    })
    $(".InboxSentForm").on("submit",function(e) {
        if ($(".InboxSentForm input:checkbox:checked").length <= 0)
        {
            e.preventDefault();
        }
    })
    $(".inboxData").on("click",function() {
        $("#UnTrashData").hide();
        $(".InboxSentForm").attr("action","{{URL::to('ustaad/contact/')}}");
        $('input[type="checkbox"]').each(function() {
			this.checked = false;
		});
    })
    $(".UnTrashData").on("click",function() {
        $("#UnTrashData").show();
        $(".InboxSentForm").attr("action","{{URL::to('ustaad/contact/')}}");
        $('input[type="checkbox"]').each(function() {
			this.checked = false;
		});
    })
</script>