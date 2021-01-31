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
                                    <li class="breadcrumb-item"><a href="{{URL::to('/ustaad/dashboard')}}"><i class="feather icon-home"></i></a></li>
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
                    <!-- <div class="col-12 mt-4">
                        <h4 class="mb-0">Text alignment</h4>
                        <p class="text-muted mt-0 font-12">You can quickly change the text
                            alignment<code>.text-center .text-right</code>.</p>
					</div> -->
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

						<div class="col-md-4">
                            <div class="card bg-c-{{$color}} order-card">
                                <div class="card-body">
                                    <a href="{{$url}}">
                                        <h6 class="text-white text-center">{{$member->member}} Clients</h6>
                                        <h2 class="text-right text-white">
                                            <i class="feather icon-users float-left"></i
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
