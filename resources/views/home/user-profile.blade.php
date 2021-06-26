
<?php

$useragent=$_SERVER['HTTP_USER_AGENT'];

if(preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i',$useragent)||preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i',substr($useragent,0,4))){
  $mobile = 0;
}else{
  $mobile = 1;
}
?>
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
                              <div class="row gutters-sm">
                                <div class="col-md-4 mb-3">
                                  <div class="card">
                                    <div class="card-body">
                                      <div class="d-flex flex-column align-items-center text-center">
                                          <div class="" style="position: relative">
                                            @php
                                              if($totalClientInfo->image == null){
                                                $imgProfileSrc = "https://bootdey.com/img/Content/avatar/avatar7.png";
                                              }else{
                                                $imgProfileSrc = URL::to('storage/app/') . "/" . $totalClientInfo->image;
                                              }
                                            @endphp
                                            @if($mobile == 0)
                                              @if($totalClientInfo->memberType == 3)
                                                <img src="{{URL::to('public/assets/assets/img/paid.png')}}" alt="adminn" style="width: 280px">
                                                <div style="position: absolute; top:86px; left:100px">
                                                  <img src="{{$imgProfileSrc}}" class="rounded-circle" style="width: 82px !important;height: 78px !important;">
                                                </div>
                                              @elseif($totalClientInfo->memberType == 2)
                                                <img src="{{URL::to('public/assets/assets/img/vipbg.png')}}" alt="adminn" style="width: 228px">
                                                <div style="position: absolute; top:49px; left:55px">
                                                  <img src="{{$imgProfileSrc}}" class="rounded-circle" style="width: 118px !important;height: 115px !important;">
                                                </div>
                                              @endif
                                            @elseif($mobile == 1)
                                              @if($totalClientInfo->memberType == 3)
                                                <img src="{{URL::to('public/assets/assets/img/paid.png')}}" alt="adminn" style="width: 280px">
                                                <div style="position: absolute; top:53px; left:65px">
                                                  <img src="{{$imgProfileSrc}}" class="rounded-circle" style="width: 53px !important;height: 52px !important;">
                                                </div>
                                              @elseif($totalClientInfo->memberType == 2)
                                                <img src="{{URL::to('public/assets/assets/img/vipbg.png')}}" alt="adminn" style="width: 228px">
                                                <div style="position: absolute; top:38px; left:41px">
                                                  <img src="{{$imgProfileSrc}}" class="rounded-circle" style="width: 98px !important;height: 96px !important;">
                                                </div>
                                              @endif
                                            @endif
                                            @if($totalClientInfo->memberType == 1)
                                              <img src="{{$imgProfileSrc}}" class="rounded-circle" style="width: 118px !important;height: 115px !important;">
                                            @endif
                                          </div>
                                        <!-- @if($totalClientInfo->image == null)
                                          <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
                                        @else
                                          <img src="{{URL::to('storage/app/')}}/{{$totalClientInfo->image}}" alt="Admin" class="rounded-circle" width="150">
                                        @endif -->
                                        <div class="mt-3">
                                          <h4>{{$totalClientInfo->name}}</h4>
                                          <p class="text-secondary mb-1">{{$clientMember->member}}</p>
                                          <a href="{{URL::to('user-registration')}}">Edit Profile</a>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                            @php
                                              $emails = explode('@#',$totalClientInfo->addEmail);
                                              array_shift($emails);
                                              $mobiles = explode('@#',$totalClientInfo->addMobile);
                                              array_shift($mobiles);
                                              $socials = explode('@#',$totalClientInfo->social);
                                              $socialLinks = explode('@#',$totalClientInfo->socialLink);
                                            @endphp
                                  <div class="card mt-3">
                                    <ul class="list-group list-group-flush">
                                      @for($i = 0; $i < count($socials); $i++)
                                        <li class="list-group-item d-flex justify-content-start align-items-center flex-wrap">
                                            <a href="{{$socialLinks[$i]}}" target="_blank">
                                              <span class="mb-0 mr-2">
                                                @if($socials[$i] == "Facebook")
                                                  <i class="fab fa-facebook text-primary"></i>
                                                @elseif($socials[$i] == "Pinterest")
                                                  <i class="fab fa-pinterest text-primary"></i>
                                                @elseif($socials[$i] == "Twitter")
                                                  <i class="fab fa-twitter text-primary"></i>
                                                @elseif($socials[$i] == "Instagram")
                                                  <i class="fab fa-instagram-square text-primary"></i>
                                                @elseif($socials[$i] == "Snapchat")
                                                  <i class="fab fa-snapchat-square text-primary"></i>
                                                @elseif($socials[$i] == "Tiktok")
                                                  <i class="fab fa-tiktok text-primary"></i>
                                                @elseif($socials[$i] == "Telegam")
                                                  <i class="fab fa-telegram text-primary"></i>
                                                @elseif($socials[$i] == "GooglePlus")
                                                  <i class="fab fa-google-plus text-primary"></i>
                                                @elseif($socials[$i] == "LinkedIn")
                                                  <i class="fab fa-linkedin text-primary"></i>
                                                @else
                                                  {{$socials[$i]}}
                                                @endif
                                              </span>
                                              <span class="text-secondary" style="word-break: break-all;">{{$socialLinks[$i]}}</span>
                                            </a>
                                        </li>
                                      @endfor
                                      
                                    </ul>
                                  </div>
                                </div>
                                <div class="col-md-8">
                                  <div class="card mb-3">
                                    <div class="card-body">
                                      <div class="row">
                                        <div class="col-sm-3">
                                          <h6 class="mb-0">Full Name</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                          {{$totalClientInfo->name}} {{$totalClientInfo->lastName}}
                                        </div>
                                      </div>
                                      <hr>
                                      <div class="row">
                                        <div class="col-sm-3">
                                          <h6 class="mb-0">Email</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                          {{$totalClientInfo->email}}
                                          <a class="btn pl-0" data-toggle="collapse" data-target="#demo"><i class="fa fa-caret-down" aria-hidden="true"></i></a>
                                          <div id="demo" class="collapse">
                                            @for($i=0; $i < count($emails); $i++)
                                              <p>{{$emails[$i]}}</p>
                                            @endfor
                                          </div>
                                        </div>
                                      </div>
                                      <hr>
                                      <div class="row">
                                        <div class="col-sm-3">
                                          <h6 class="mb-0">Phone</h6>
                                        </div>
                                        <div class="col-sm-9 text-secondary">
                                          {{$totalClientInfo->mobile}}
                                          <a class="btn pl-0" data-toggle="collapse" data-target="#demo12"><i class="fa fa-caret-down" aria-hidden="true"></i></a>
                                          <div id="demo12" class="collapse">
                                            @for($i=0; $i < count($mobiles); $i++)
                                              <p>{{$mobiles[$i]}}</p>
                                            @endfor
                                          </div>
                                        </div>
                                      </div>
                                      <hr>
                                      <div class="row">
                                        @if($totalClientInfo->cityId == null)
                                          <div class="col-sm-3">
                                            <h6 class="mb-0">City</h6>
                                          </div>
                                          <div class="col-sm-9 text-secondary">
                                            {{$totalClientInfo->city}}
                                          </div>
                                        @else
                                            @php
                                              $cityInfo = $totalClientInfo->GetCitysInfo(); 
                                              $statesInfo = $totalClientInfo->GetStateInfo(); 
                                              $CountryInfo = $totalClientInfo->GetCountryInfo(); 
                                            @endphp
                                            <div class="col-sm-3">
                                              <p class="mb-1 clr252525">City</p>
                                              <p class="mb-1 clr252525">State</p>
                                              <p class="mb-1 clr252525">Country</p>
                                            </div>
                                            <div class="col-sm-9 text-secondary">
                                              <p class="mb-1">{{$cityInfo->name}}</p>
                                              <p class="mb-1">{{$statesInfo->name}}</p>
                                              <p class="mb-1">{{$CountryInfo->name}}</p>
                                            </div>
                                        @endif
                                      </div>
                                      <hr>
                                    </div>
                                  </div>
                                  <div class="card">
                                      <div class="card-header">
                                          Bio
                                      </div>
                                      <div class="card-body">
                                        {{$totalClientInfo->description}}
                                      </div>
                                  </div>
                                  <div class="row gutters-sm pt-3">
                                    @foreach($clientAccount as $account)
                                      @php
                                        $brokerTitle = $account->getBroker();
                                      @endphp
                                      <div class="col-sm-6 mb-3">
                                        <div class="card h-100">
                                          <div class="card-body">
                                            <h6 class="d-flex align-items-center mb-3"><i class="material-icons text-info mr-2">{{$brokerTitle->title}}</i></h6>
                                            <small>Account Number</small>
                                            <div class="progress mb-3">
                                              <p>{{$account->accountNumber}}</p>
                                            </div>
                                            <small>Account Name</small>
                                            <div class="progress mb-3">
                                              <p>{{$account->accountName}}</p>
                                            </div>
                                            <small>Account Email</small>
                                            <div class="progress mb-3">
                                              <p>{{$account->accountemail}}</p>
                                            </div>
                                            <small>Deposit</small>
                                            <div class="progress mb-3">
                                              <p>{{$account->accountdeposit}}</p>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                    @endforeach
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