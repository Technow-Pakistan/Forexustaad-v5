@include('admin.include.header')
		<section class="pcoded-main-container">
			<div class="pcoded-content">
				<!-- [ breadcrumb ] start -->
				<div class="page-header">
					<div class="page-block">
						<div class="row align-items-center">
							<div class="col-md-12">
								<div class="page-header-title">
									<h5 class="m-b-10">Forex Signals</h5>
								</div>
								<ul class="breadcrumb">
									<li class="breadcrumb-item">
										<a href="{{URL::to('/ustaad/dashboard')}}"><i class="feather icon-home"></i></a>
									</li>
									<li class="breadcrumb-item"><a href="{{URL::to('/ustaad/member/clientList')}}">All Client Users</a></li>
									<li class="breadcrumb-item">
										<a href="#!">Profile</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<!-- [ breadcrumb ] end -->
				<!-- [ Main Content ] start -->
                <div class="card">
                    <div class="card-body" style="background-color: lightgray;">
                        <div class="">
                            <div class="">
                              <div class="row gutters-sm">
                                <div class="col-md-4 mb-3">
                                  <div class="card">
                                    <div class="card-body">
                                      <div class="d-flex flex-column align-items-center text-center">
                                          @php
                                            $vipTypeNumber = 0;
                                          @endphp
                                          @foreach($clientAccount as $account1)
                                            @php
                                              if($account1->verified == 1){
                                                $vipTypeNumber += $account1->accountdeposit;
                                              }
                                            @endphp
                                          @endforeach
                                          @if($vipTypeNumber > 5 && $vipTypeNumber < 1000)
                                            <span class="badge badge-light-warning fts_18">Small Deposit Account</span> <br>
                                          @elseif($vipTypeNumber > 1000)
                                            <span class="badge badge-light-success fts_18">Big Deposit Account</span> <br>
                                          @endif
                                        @if($totalClientInfo->image == null)
                                          <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
                                        @else
                                          <img src="{{URL::to('storage/app/')}}/{{$totalClientInfo->image}}" alt="Admin" class="rounded-circle" width="150">
                                        @endif
                                        <div class="mt-3">
                                          <h4>{{$totalClientInfo->name}}</h4>
                                          @php
                                            $value =Session::get('admin');
                                          @endphp
                                          @if($value['memberId'] == 1 || $value['memberId'] == 2)
                                            <p class="text-secondary mb-1">{{$clientMember->member}}</p>
                                            <form action="{{URL::to('/ustaad/changeMemberType')}}/{{$totalClientInfo->id}}" method="post"> 
                                            
                                              <a class="btn pl-0 text-primary" href="#!" data-toggle="collapse" data-target="#demo123">Change Member Type</a>
                                              <div id="demo123" class="collapse">
                                                <label for="">Select Member Type</label>
                                                <select name="memberType" class="form-control" id="">
                                                  <option value="1" {{$clientMember->memberType == 1 ? 'selected' : ''}}>Subscriber</option>
                                                  <option value="2" {{$clientMember->memberType == 2 ? 'selected' : ''}}>Vip</option>
                                                </select>
                                                <input type="submit" class="btn btn-primary btn-outline mt-2" value="Submit">
                                              </div>
                                            </form>
                                          @endif
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
                                          <h6 class="mb-0 pt-2">Email</h6>
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
                                          <h6 class="mb-0 pt-2">Phone</h6>
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
                                            <h6 class="d-flex align-items-center mb-3">
                                              <i class="material-icons text-info mr-2">{{$brokerTitle->title}}</i>
                                              <div class="verifiedBtnAccount">
                                                @if($account->verified == 0)
                                                  <form action="{{URL::to('ustaad/viewClientProfile/accountVerified')}}/{{$account->id}}" method="post">
                                                    Verified <input type="checkbox" name="verified" id="" class="AdminConfirmationEmail" value="1">
                                                  </form>
                                                @else
                                                  <span class="badge badge-light-success">Verified</span>
                                                @endif
                                              </div>
                                              <a href="{{URL::to('ustaad/DeleteClientAccount')}}/{{$account->id}}" class="addAction trashBtnAccount" data-toggle="modal" data-target="#myModal"><i class="fa fa-trash text-danger"></i></a>
                                            </h6>
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
                </div>
				<!-- [ Main Content ] end -->
			</div>
		</section>
		<!-- [ Main Content ] end -->


@include('admin.include.footer')

<style>
  .verifiedBtnAccount{
    position: absolute;
    top: 15px;
    right: 50px;
  }
  .trashBtnAccount{
    position: absolute;
    top: 15px;
    right: 20px;
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

<script>
	$(".AdminConfirmationEmail").on('change',function() {
		var data = $(this).parent();
		data.submit();
	})
</script>


<style>
    .certificated-badge-style{
      bottom: 8px;
      right: 0;
      z-index: 2;
      position: relative;
      bottom: 15px;
      LEFT: 15px;
      border-radius: 50%;
      width: 60px;
      height: 60px;
      background: #fff;
      padding: 5px 3px;
    }
    .fa-certificate-style{
      font-size: 55px;
    }
    .front-broker-title-style{
      font-size: 11px;
      position: absolute;
      top: 22PX;
      left: 11px;
    }
  </style>

