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
                            <h5 class="m-b-10">View Email</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{URL::to('/ustaad/dashboard')}}"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{URL::to('ustaad/contact')}}">Contact</a></li>
                            <li class="breadcrumb-item"><a href="#!">View Send Mail</a></li>
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
                                        <span class="b-title text-muted">Forexustaad</span>
                                    </a>
                                </div>
                                <!-- [ email-left section ] end -->
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="mail-body">
                            <div class="row">
                                <!-- [ email-right section ] start -->
                                <div class="col-xl-12 col-md-12">
                                    <div class="card">
                                        <!-- <div class="card-header">
                                            <h6 class="d-inline-block m-0">{{$data->subject}}</h6>
                                            <p class="float-right m-0"><strong>{{$data->created_at->format("h:i a")}}</strong></p>
                                        </div> -->
                                        <div class="card-body">
                                            <div class="email-read">
                                                <div class="photo-table m-r-10">
                                                    <a href="#">
                                                        <img class="media-object img-radius" src="{{URL::to('public/assets/assets/img/user1.jpg')}}" alt="E-mail user" style="width:50px;">
                                                    </a>
                                                </div>
                                                <div>
                                                    <a href="#">
                                                        <p class="user-name text-dark mb-1"><strong>Subject: {{$data->subject}}</strong></p>
                                                    </a>
                                                    <a class="user-mail txt-muted" href="#">
                                                        <p class="user-name text-dark mb-1"><strong>To: {{$data->emailTo}}</strong></p>
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="m-b-20 m-l-50 p-l-10 email-contant">
                                                <div class="photo-contant">
                                                    <div>
                                                        {{$data->message}}
                                                    </div>
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

@include('admin.include.footer')
<!-- ekko-lightbox Js -->
<script src="{{URL::to('public/assets/assets/js/plugins/ekko-lightbox.min.js')}}"></script>
<script src="{{URL::to('public/assets/assets/js/plugins/lightbox.min.js')}}"></script>
<script>
    $(document).ready(function() {
        $(document).on('click', '[data-toggle="lightbox"]', function(event) {
            event.preventDefault();
            $(this).ekkoLightbox();
        });
    });
</script>

