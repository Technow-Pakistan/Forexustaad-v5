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
                                        @if($totalClientInfo->image == null)
                                          <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
                                        @else
                                          <img src="{{URL::to('storage/app/')}}/{{$totalClientInfo->image}}" alt="Admin" class="rounded-circle" width="150">
                                        @endif
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
                                        <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                                          <h6 class="mb-0">{{$socials[$i]}}</h6>
                                          <span class="text-secondary">{{$socialLinks[$i]}}</span>
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