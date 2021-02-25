@include('admin.include.header')
<!-- [ Main Content ] start -->
<div class="pcoded-main-container">
	<div class="pcoded-content">
		<!-- [ breadcrumb ] start -->
		<div class="page-header">
			<div class="page-block">
				<div class="row align-items-center">
					<div class="col-md-12">
						<div class="page-header-title">
							<h5>Account List</h5>
						</div>
						<ul class="breadcrumb">
							<li class="breadcrumb-item"><a href="{{URL::to('/ustaad/dashboard')}}"><i class="fa fa-home"></i></a></li>
							<li class="breadcrumb-item"><a href="{{URL::to('/ustaad/member/clientList')}}">Client Type</a></li>
							<li class="breadcrumb-item"><a href="#!">Account list</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<!-- [ breadcrumb ] end -->
		<!-- [ Main Content ] start -->
		<div class="row">
			<div class="col-lg-12">
				<div class="card user-profile-list">
					<div class="card-body">
						<div class="dt-responsive table-responsive">
							<table id="user-list-table" class="table nowrap">
								<thead>
									<tr>
										<th>ID</th>
										<th>Name</th>
										@if($id == "All")
											<th>Broker Name</th>
										@endif
										<th>Account Number</th>
										<th>Deposit</th>
										<th>Status</th>
									</tr>
								</thead>
								<tbody>
									@php $iorder = 0; @endphp 
									@foreach($memberData as $member)
											@php
												$memberType = $member->GetMember();
                                                if($verified === "All"){
												    $memberAccountDetail = $member->GetAccountData();
                                                }else{
												    $memberAccountDetail = App\Models\ClientAccountDetailModel::where('brokerId',$id)->where('clientId',$member->id)->where('verified',$verified)->get();
                                                }
												$iorder++;
											@endphp
                                            @if(count($memberAccountDetail) > 0)
                                                <tr>
                                                    <td>{{$iorder}}</td>
                                                    <td class="tdLinkScroll">
                                                        <a href="{{URL::to('/ustaad/viewClientProfile')}}/{{$member->id}}">
                                                            <div class="d-inline-block align-middle">
                                                                @if($member->image == null)
                                                                    <img src="{{URL::to('/public/assets/assets/img/user1.jpg')}}" alt="user" class="img-radius align-top m-r-15 hei-40 wid-40">
                                                                @else
                                                                    <img src="{{URL::to('/storage/app')}}/{{$member->image}}" alt="user" class="img-radius align-top m-r-15 hei-40 wid-40">
                                                                @endif
                                                                <div class="d-inline-block">
                                                                    <h6 class="m-b-0">{{$member->name}}</h6>
                                                                    <p class="m-b-0 text-secondary">{{$member->email}}</p>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </td>
                                                    @if($id == "All")
                                                        <td>
                                                            <div>
                                                                <p>
                                                                    @php $brokerFullTitle = App\Models\BrokerCompanyInformationModel::where('id',$memberAccountDetail[0]->brokerId)->first();  @endphp
                                                                    {{$brokerFullTitle->title}}
                                                                    @isset($memberAccountDetail[1])
                                                                        <i class="fa fa-chevron-circle-down fts_12  text-secondary" data-toggle="collapse" data-target="#demo{{$memberAccountDetail[0]->id}}"></i>
                                                                    @endisset
                                                                </p>    
                                                            </div>
                                                            <div id="demo{{$memberAccountDetail[0]->id}}" class="collapse">
                                                                @for($ira = 1; $ira < count($memberAccountDetail) ; $ira++)
                                                                        @php $brokerFullTitle1 = App\Models\BrokerCompanyInformationModel::where('id',$memberAccountDetail[$ira]->brokerId)->first();  @endphp
                                                                    <p>{{$brokerFullTitle1->title}}</p>
                                                                @endfor
                                                            </div>
                                                        </td>
                                                    @endif
                                                    <td>
                                                        <div>
                                                            <p>
                                                                {{$memberAccountDetail[0]->accountNumber}}
                                                                @isset($memberAccountDetail[1])
                                                                    <i class="fa fa-chevron-circle-down fts_12  text-secondary" data-toggle="collapse" data-target="#demo{{$memberAccountDetail[0]->accountNumber}}"></i>
                                                                @endisset
                                                            </p>    
                                                        </div>
                                                        <div id="demo{{$memberAccountDetail[0]->accountNumber}}" class="collapse">
                                                            @for($ira1 = 1; $ira1 < count($memberAccountDetail) ; $ira1++)
                                                                <p>{{$memberAccountDetail[$ira1]->accountNumber}}</p>
                                                            @endfor
                                                        </div>
                                                    <td>
                                                        <div>
                                                            <p class="{{($memberAccountDetail[0]->depositConfirm == 1) ? 'text-success' : ''}}{{($memberAccountDetail[0]->depositConfirm == 2) ? 'text-danger' : ''}}">
                                                                {{$memberAccountDetail[0]->accountdeposit}}
                                                                @isset($memberAccountDetail[1])
                                                                    <i class="fa fa-chevron-circle-down fts_12  text-secondary" data-toggle="collapse" data-target="#demo{{$memberAccountDetail[0]->accountdeposit}}"></i>
                                                                @endisset
                                                            </p>    
                                                        </div>
                                                        <div id="demo{{$memberAccountDetail[0]->accountdeposit}}" class="collapse">
                                                            @for($ira2 = 1; $ira2 < count($memberAccountDetail) ; $ira2++)
                                                                <p class="{{($memberAccountDetail[$ira2]->depositConfirm == 1) ? 'text-success' : ''}}{{($memberAccountDetail[$ira2]->depositConfirm == 2) ? 'text-danger' : ''}}">{{$memberAccountDetail[$ira2]->accountdeposit}}</p>
                                                            @endfor
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div>
                                                            <p>
                                                                <span class="badge {{($memberAccountDetail[0]->verified == 1) ? 'badge-light-success' : ''}}{{($memberAccountDetail[0]->verified == 2) ? 'badge-light-danger' : ''}}{{($memberAccountDetail[0]->verified == 0) ? 'badge-light-warning' : ''}}">
                                                                    {{($memberAccountDetail[0]->verified == 1) ? 'Verified' : ''}}{{($memberAccountDetail[0]->verified == 2) ? 'Rejected' : ''}}{{($memberAccountDetail[0]->verified == 0) ? 'Pending' : ''}}
                                                                </span>
                                                                @isset($memberAccountDetail[1])
                                                                    <i class="fa fa-chevron-circle-down fts_12  text-secondary" data-toggle="collapse" data-target="#demo{{$memberAccountDetail[0]->accountemail}}"></i>
                                                                @endisset
                                                            </p>    
                                                        </div>
                                                        <div id="demo{{$memberAccountDetail[0]->accountemail}}" class="collapse">
                                                            @for($ira3 = 1; $ira3 < count($memberAccountDetail) ; $ira3++)
                                                                <span class="badge {{($memberAccountDetail[$ira3]->verified == 1) ? 'badge-light-success' : ''}}{{($memberAccountDetail[$ira3]->verified == 2) ? 'badge-light-danger' : ''}}{{($memberAccountDetail[$ira3]->verified == 0) ? 'badge-light-warning' : ''}}">
                                                                    {{($memberAccountDetail[$ira3]->verified == 1) ? 'Verified' : ''}}{{($memberAccountDetail[$ira3]->verified == 2) ? 'Rejected' : ''}}{{($memberAccountDetail[$ira3]->verified == 0) ? 'Pending' : ''}}
                                                                </span>
                                                            @endfor
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endif
									@endforeach
								</tbody>
								<tfoot>
									<tr>
										<th>ID</th>
										<th>Name</th>
										@if($id == "All")
											<th>Broker Name</th>
										@endif
										<th>Account Number</th>
										<th>Deposit</th>
										<th>Status</th>
									</tr>
								</tfoot>
							</table>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- [ Main Content ] end -->
	</div>
</div>
<!-- [ Main Content ] end -->
<style>
	.veiwProfile:hover{
			color:white;
	}
</style>

@include('admin.include.footer')
<script>
	$(".AdminConfirmationEmail").on('change',function() {
		var data = $(this).parent();
		data.submit();
	})
</script>


