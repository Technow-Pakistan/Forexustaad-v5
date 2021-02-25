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
                                    <h5>Client Type</h5>
                                </div>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{URL::to('/ustaad/dashboard')}}"><i class="fa fa-home"></i></a></li>
                                    <li class="breadcrumb-item"><a href="#!">User</a></li>
                                    <li class="breadcrumb-item"><a href="#!">Client Type</a></li>
                                </ul>
							</div>
						</div>
					</div>
				</div>
				<!-- [ breadcrumb ] end -->
				<!-- [ Main Content ] start -->
                    @php 
                        $colors = ["green","blue","red","yellow"];
                        $i = 0;
                    @endphp
                <div>
                    <h5>Clients By Member Type</h5>
                </div>

                <div class="row">
					<div class="col-md-3">
                        <div class="card bg-c-{{$colors[$i]}} order-card">
                            <div class="card-body">
                                @php
                                    $url1 = URL::to('ustaad/clientMember/All');
                                @endphp
                                <a href="{{$url1}}">
                                    <h6 class="text-white text-center">All Clients</h6>
                                    <h2 class="text-right text-white">
                                        <i class="fa fa-users float-left"></i
                                        ><span>{{count($totalUsers)}}</span>
                                    </h2>
                                </a>
                            </div>
                        </div>
					</div>
                    @foreach($MemberType as $member)
                        @php
                            $i++;
                            if($i >= count($colors)){
                                $i=0;
                            }
                            $numberUsers = $member->GetNumberOfClient();
                            if($numberUsers != 0 ){
                                $url = URL::to('ustaad/clientMember') . '/' . $member->id;
                            }else{
                                $url = "#!";
                            }
                        @endphp

						<div class="col-md-3">
                            <div class="card bg-c-{{$colors[$i]}} order-card">
                                <div class="card-body">
                                    @if($member->member != "Subscriber")
                                        <a href="{{$url}}">
                                            <h6 class="text-white text-center">{{$member->member}} Clients</h6>
                                            <h2 class="text-right text-white">
                                                <i class="fa fa-users float-left"></i
                                                ><span>{{$numberUsers}}</span>
                                            </h2>
                                        </a>
                                    @else
                                        @php
                                            $numberUsers1 = App\Models\ClientRegistrationModel::where('memberType',$member->id)->where('confirmationEmail',1)->get();
                                            $numberUsers2 = App\Models\ClientRegistrationModel::where('memberType',$member->id)->where('confirmationEmail',0)->get();
                                        @endphp
                                        <h6 class="text-white text-right"><span class="float-left">Total {{$member->member}}</span> {{$numberUsers}}</h6>
                                        <a href="{{URL::to('ustaad/clientMember')}}/{{$member->id}}?client=confirm">
                                            <p class="text-right text-white mb-1 pb-1" style="border-bottom:1px solid lightgray">
                                                <span class="float-left">
                                                <i class="fas fa-user-check float-left" style="font-size: 20px;"></i>&nbsp;&nbsp; Confirm
                                                </span>
                                                <span>{{count($numberUsers1)}}</span>
                                            </p>
                                        </a>
                                        <a href="{{URL::to('ustaad/clientMember')}}/{{$member->id}}?client=unconfirm">
                                            <p class="text-right text-white m-0">
                                                <span class="float-left">
                                                    <i class="fas fa-user-times float-left" style="font-size: 20px;"></i>&nbsp;&nbsp; Unconfirm
                                                </span>
                                                <span>{{count($numberUsers2)}}</span>
                                            </p>
                                        </a>
                                    @endif
                                </div>
                            </div>
						</div>
                    @endforeach
                </div>

                @php $i = 0; @endphp

                <div>
                    <h5>Clients By Broker Accounts</h5>
                </div>
                
                <div class="row">
					<div class="col-md-3">
                        <div class="card bg-c-{{$colors[$i]}} order-card">
                            <div class="card-body">
                                @php
                                    $url5 = URL::to('ustaad/clientMemberAccounts/All');
                                @endphp
                                <a href="{{$url5}}">
                                    <h6 class="text-white text-center">All Accounts</h6>
                                    <h2 class="text-right text-white">
                                        <i class="fas fa-hands-helping float-left"></i
                                        ><span>{{count($totalClientAccounts)}}</span>
                                    </h2>
                                </a>
                            </div>
                        </div>
					</div>
                    @foreach($totalBrokers as $broker)
                        @php
                            $i++;
                            if($i >= count($colors)){
                                $i=0;
                            }
                            $numberOfAccouonts = $broker->GetNumberClientAccouontsNumber();
                            $numberOfAccouonts1 = App\Models\ClientAccountDetailModel::where('brokerId',$broker->id)->where('verified',1)->get();
                            $numberOfAccouonts2 = App\Models\ClientAccountDetailModel::where('brokerId',$broker->id)->where('verified',0)->get();
                            $numberOfAccouonts3 = App\Models\ClientAccountDetailModel::where('brokerId',$broker->id)->where('verified',2)->get();
                            $url6 = "#!";
                            if(count($numberOfAccouonts1) > 0){
                                $url6 = URL::to('ustaad/clientMemberAccounts') . '/' . $broker->id . '?account=verified';
                            }
                            $url7 = "#!";
                            if(count($numberOfAccouonts2) > 0){
                                $url7 = URL::to('ustaad/clientMemberAccounts') . '/' . $broker->id . '?account=pending';
                            }
                            $url8 = "#!";
                            if(count($numberOfAccouonts3) > 0){
                                $url8 = URL::to('ustaad/clientMemberAccounts') . '/' . $broker->id . '?account=rejected';
                            }
                        @endphp

						<div class="col-md-3">
                            <div class="card bg-c-{{$colors[$i]}} order-card">
                                <div class="card-body">
                                    <!-- <a href="">
                                        <h6 class="text-white text-center">{{$broker->title}}</h6>
                                        <h2 class="text-right text-white">
                                            <i class="fas fa-hands-helping float-left"></i
                                            ><span>{{count($numberOfAccouonts)}}</span>
                                        </h2>
                                    </a> -->
                                    
                                    <h6 class="text-white text-right"><span class="float-left">{{$broker->title}} Accounts</span> {{count($numberOfAccouonts)}}</h6>
                                        <a href="{{$url6}}">
                                            <p class="text-right text-white mb-1 pb-1" style="border-bottom:1px solid lightgray">
                                                <span class="float-left">
                                                    <i class="fas fa-hands-helping float-left" style="font-size: 20px;"></i>&nbsp;&nbsp; Verified
                                                </span>
                                                <span>{{count($numberOfAccouonts1)}}</span>
                                            </p>
                                        </a>
                                        <a href="{{$url7}}">
                                            <p class="text-right text-white mb-1 pb-1" style="border-bottom:1px solid lightgray">
                                                <span class="float-left">
                                                    <i class="fas fa-hands-helping float-left" style="font-size: 20px;"></i>&nbsp;&nbsp; Pending
                                                </span>
                                                <span>{{count($numberOfAccouonts2)}}</span>
                                            </p>
                                        </a>
                                        <a href="{{$url8}}">
                                            <p class="text-right text-white m-0">
                                                <span class="float-left">
                                                    <i class="fas fa-hands-helping float-left" style="font-size: 20px;"></i>&nbsp;&nbsp; Rejected
                                                </span>
                                                <span>{{count($numberOfAccouonts3)}}</span>
                                            </p>
                                        </a>
                                </div>
                            </div>
						</div>
                    @endforeach
				</div>
				<!-- [ Main Content ] end -->
			</div>
		</section>
		<!-- [ Main Content ] end -->

@include('admin.include.footer')
