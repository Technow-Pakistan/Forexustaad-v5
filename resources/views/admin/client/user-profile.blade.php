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
									<h5 class="m-b-10">Client Profile</h5>
								</div>
								<ul class="breadcrumb">
									<li class="breadcrumb-item">
										<a href="{{URL::to('/ustaad/dashboard')}}"><i class="fa fa-home"></i></a>
									</li>
                  @if($value['memberId'] != 8)
  									<li class="breadcrumb-item"><a href="{{URL::to('/ustaad/member/clientList')}}">All Client Users</a></li>
									@else
  									<li class="breadcrumb-item"><a href="{{URL::to('/ustaad/clientMember/All')}}">All Client</a></li>
                  @endif
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
                      <form action="{{URL::to('ustaad/viewClientProfile/Keyword')}}/{{$totalClientInfo->id}}" method="post">
                        <label for="">Keywords</label>
                        <select class="js-example-tokenizer form-control w-50 m-0" name="keywords[]" multiple="multiple" required>
                          @if($totalClientInfo->Keywords != null)
                            @php
                              $allKeywords = explode(',',$totalClientInfo->Keywords);
                            @endphp
                            @foreach ($allKeywords as $Keyword)
                              <option value="{{$Keyword}}" selected>{{$Keyword}}</option>
                            @endforeach
                          @endif
                        </select><br>
                        <input type="submit" value="Save" class="btn btn-primary btn-sm" >
                      </form>
                    </div>
                  </div>
                </div>
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
                                              if($account1->verified == 1 && $account1->depositConfirm == 1){
                                                $vipTypeNumber += $account1->accountdeposit;
                                              }
                                            @endphp
                                          @endforeach
                                          @if($vipTypeNumber > 5 && $vipTypeNumber < 1000)
                                            <span class="badge badge-light-warning fts_18">Small Deposit Account</span> <br>
                                          @elseif($vipTypeNumber > 1000)
                                            <span class="badge badge-light-success fts_18">Big Deposit Account</span> <br>
                                          @endif
                                          <div class="" style="position: relative">
                                            @php
                                              if($totalClientInfo->image == null){
                                                $imgProfileSrc = "https://bootdey.com/img/Content/avatar/avatar7.png";
                                              }else{
                                                $imgProfileSrc = URL::to('storage/app/') . "/" . $totalClientInfo->image;
                                              }
                                            @endphp
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
                                            @elseif($totalClientInfo->memberType == 1)
                                              <img src="{{$imgProfileSrc}}" class="rounded-circle" style="width: 118px !important;height: 115px !important;">
                                            @endif
                                          </div>
                                        <div class="mt-3">
                                          <h4>{{$totalClientInfo->name}}</h4>
                                          @if($value['memberId'] == 1 || $value['memberId'] == 2)
                                            <p class="text-secondary mb-1">{{$clientMember->member}}</p>
                                            <form action="{{URL::to('/ustaad/changeMemberType')}}/{{$totalClientInfo->id}}" method="post">

                                              <a class="btn pl-0 text-primary" href="#!" data-toggle="collapse" data-target="#demo123">Change Member Type</a>
                                              <div id="demo123" class="collapse">
                                                <label for="">Select Member Type</label>
                                                <select name="memberType" class="form-control" id="">
                                                  <option value="1" {{$clientMember->memberType == 1 ? 'selected' : ''}}>Subscriber</option>
                                                  <option value="2" {{$clientMember->memberType == 2 ? 'selected' : ''}}>Vip</option>
                                                  <option value="3" {{$clientMember->memberType == 3 ? 'selected' : ''}}>Paid</option>
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
                                        <li class="list-group-item d-flex justify-content-start align-items-center flex-wrap">
                                            <a href="{{$socialLinks[$i]}}" target="_blank">
                                              <span class="mb-0 mr-2" style="font-size:18px">
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
                                              <div class="verifiedBtnAccount d-flex justify-content-end">
                                                @if($account->verified == 0 && ($value['memberId'] == 1 || $value["memberId"] == 2))
                                                  <form action="{{URL::to('ustaad/viewClientProfile/accountVerified')}}/{{$account->id}}" method="post" class="mr-2">
                                                    Verified <input type="checkbox" name="verified" id="" class="AdminConfirmationEmail" value="1">
                                                  </form>
                                                  <form action="{{URL::to('ustaad/viewClientProfile/accountVerified')}}/{{$account->id}}" method="post" class="mr-2">
                                                    Rejected <input type="checkbox" name="verified" id="" class="AdminConfirmationEmail" value="2">
                                                  </form>
                                                @elseif($account->verified == 1)
                                                  <span class="badge badge-light-success mr-2">Verified</span>
                                                @elseif($account->verified == 2)
                                                  <span class="badge badge-light-danger mr-2">Rejected</span>
                                                @endif
                                              </div>
                                              @if($value['memberId'] == 1 || $value["memberId"] == 2)
                                                <a href="{{URL::to('ustaad/DeleteClientAccount')}}/{{$account->id}}" class="addAction trashBtnAccount" data-toggle="modal" data-target="#myModal"><i class="fa fa-trash text-danger"></i></a>
                                              @endif
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
                                            <small class="d-flex justify-content-between">
                                              Deposit
                                                <div class="d-flex">
                                                @if($account->depositConfirm == 0  && ($value['memberId'] == 1 || $value["memberId"] == 2))
                                                  <form action="{{URL::to('ustaad/viewClientProfile/accountdepositConfirm')}}/{{$account->id}}" method="post" class="mr-2">
                                                    Yes <input type="checkbox" name="depositConfirm" id="" class="AdminConfirmationEmail heig_10px" value="1">
                                                  </form>
                                                  <form action="{{URL::to('ustaad/viewClientProfile/accountdepositConfirm')}}/{{$account->id}}" method="post" class="mr-2">
                                                  No <input type="checkbox" name="depositConfirm" id="" class="AdminConfirmationEmail heig_10px" value="2">
                                                  </form>
                                                @elseif($account->depositConfirm == 1 && ($value['memberId'] == 1 || $value["memberId"] == 2))
                                                  <form action="{{URL::to('ustaad/viewClientProfile/accountdepositConfirm')}}/{{$account->id}}" method="post" class="mr-2">
                                                    No <input type="checkbox" name="depositConfirm" id="" class="AdminConfirmationEmail heig_10px" value="2">
                                                  </form>
                                                  <span class="badge badge-light-success mr-2">Yes</span>
                                                @elseif($account->depositConfirm == 2 && ($value['memberId'] == 1 || $value["memberId"] == 2))
                                                  <form action="{{URL::to('ustaad/viewClientProfile/accountdepositConfirm')}}/{{$account->id}}" method="post" class="mr-2">
                                                  Yes <input type="checkbox" name="depositConfirm" id="" class="AdminConfirmationEmail heig_10px" value="1">
                                                  </form>
                                                  <span class="badge badge-light-danger mr-2">No</span>
                                                @endif
                                                </div>
                                            </small>
                                            <div class="progress {{$account->depositConfirm == 2 ? 'text-danger' : ''}} {{$account->depositConfirm == 1 ? 'text-success' : ''}} mb-3">
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
  .select2-container--default{
    margin-bottom:0px;
  }
  .heig_10px{
    height:10px;
  }
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

