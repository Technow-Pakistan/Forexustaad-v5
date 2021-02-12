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
                <div class="row">
					<div class="col-md-3">
                        <div class="card bg-c-green order-card">
                            <div class="card-body">
                                @php
                                    $url1 = URL::to('ustaad/clientMember/All');
                                    $totalUsers = App\Models\ClientRegistrationModel::all();
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
                            if($member->id == 1){
                                $color = "blue";
                            }elseif($member->id == 2){
                                $color = "red";
                            }elseif($member->id == 3){
                                $color = "yellow";
                            }elseif($member->id == 4){
                                $color = "green";
                            }

                            $numberUsers = $member->GetNumberOfClient();
                            if($numberUsers != 0 ){
                                $url = URL::to('ustaad/clientMember') . '/' . $member->id;
                            }else{
                                $url = "#!";
                            }
                        @endphp

						<div class="col-md-3">
                            <div class="card bg-c-{{$color}} order-card">
                                <div class="card-body">
                                    <a href="{{$url}}">
                                        <h6 class="text-white text-center">{{$member->member}} Clients</h6>
                                        <h2 class="text-right text-white">
                                            <i class="fa fa-users float-left"></i
                                            ><span>{{$numberUsers}}</span>
                                        </h2>
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
