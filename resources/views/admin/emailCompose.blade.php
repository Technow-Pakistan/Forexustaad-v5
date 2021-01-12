
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
                            <h5 class="m-b-10">Compose Email</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{URL::to('/ustaad/dashboard')}}"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{URL::to('ustaad/contact')}}">Contact</a></li>
                            <li class="breadcrumb-item"><a href="#!">Compose Email</a></li>
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
                                    <a href="{{URL::to('/ustaad/dashboard')}}" class="b-brand">
                                        <div class="b-bg">
                                            F
                                        </div>
                                        <span class="b-title text-muted">Forxustaad</span>
                                    </a>
                                </div>
                                <!-- [ email-left section ] end -->
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="mail-body">
                            <div class="row">
                                <!-- [ email section ] start -->
                                <div class="col-xl-12 col-md-12">
                                    <div class="tab-content" id="v-pills-tabContent">
                                        <div class="mail-body-content">
                                            <form action="" method="post" class="form-material MailForm">
                                                <div class="form-group">
                                                    <label for="exampleInputEmail1">To</label>
                                                    <input type="email" name="emailTo" class="form-control" value="{{isset($data) ? $data->emailTo : ''}}" id="exampleInputEmail1" placeholder="Enter email" required>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail2">Cc</label>
                                                            <input type="email" name="emailCc" class="form-control" value="{{isset($data) ? $data->emailCc : ''}}" id="exampleInputEmail2" placeholder="Enter email">
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail3">Bcc</label>
                                                            <input type="email" name="emailBcc" class="form-control" value="{{isset($data) ? $data->emailBcc : ''}}" id="exampleInputEmail3" placeholder="Enter email">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="exampleInputEmail4">Subject</label>
                                                    <input type="text" name="subject" class="form-control" value="{{isset($data) ? $data->subject : ''}}" id="exampleInputEmail4" placeholder="Subject" required>
                                                </div>
                                                <label for="exampleInputEmail4">Message</label>
                                                <textarea id="" name="message" rows="5" placeholder="Enter Your message" class="form-control" required>{{isset($data) ? $data->message : ''}}</textarea>
                                                <div class="float-right mt-3">
                                                    <button type="submit" class="btn waves-effect waves-light btn-secondary DraftMail">Save as draft</button>
                                                    <button type="submit" class="btn waves-effect waves-light btn-primary SendMail">Send</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <!-- [ email-right section ] end -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ Main Content ] end -->
    </div>
</section>


@include('admin.include.footer')
<script>
    $(".DraftMail").on("click",function () {
        $(".MailForm").attr("action","{{isset($data) ? '' : URL::to('ustaad/contact/DraftMail')}}");
    })
    $(".SendMail").on("click",function () {
        $(".MailForm").attr("action","{{isset($data) ?  URL::to('ustaad/contact/SendDraftMail') . '/' . $data->id : URL::to('ustaad/contact/SendMail')}}");
    })
</script>

