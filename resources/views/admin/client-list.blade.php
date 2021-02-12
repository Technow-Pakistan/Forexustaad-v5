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
							<h5>Client List</h5>
						</div>
						<ul class="breadcrumb">
							<li class="breadcrumb-item"><a href="{{URL::to('/ustaad/dashboard')}}"><i class="feather icon-home"></i></a></li>
							<li class="breadcrumb-item"><a href="{{URL::to('/ustaad/member/clientList')}}">Client Type</a></li>
							<li class="breadcrumb-item"><a href="#!">Client list</a></li>
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
										<th>Position</th>
										<th>City/State/Country</th>
										<th>Profile</th>
										<th>Start date</th>
										<th>Confirm mailer</th>
										<th>Status</th>
									</tr>
								</thead>
								<tbody>
									@php $iorder = 0; @endphp 
									@foreach($memberData as $member)
											@php
												$memberType = $member->GetMember();
                                                $cityId = $member['cityId'];
                                                if($cityId != null){
                                                    $citiesInfo = App\Models\AllCitiesModel::find($cityId);
                                                    $stateData = App\Models\AllStatesModel::find($citiesInfo->state_id);
                                                    $CountryData = App\Models\AllCountriesModel::find($citiesInfo->country_id);
												}
												$iorder++;
											@endphp
											<tr>
												<td>{{$iorder}}</td>
												<td class="tdLinkScroll">
													<div class="d-inline-block align-middle">
														@if($member->image == null)
															<img src="{{URL::to('/public/assets/assets/img/user1.jpg')}}" alt="user" class="img-radius align-top m-r-15 hei-40 wid-40">
														@else
															<img src="{{URL::to('/storage/app')}}/{{$member->image}}" alt="user" class="img-radius align-top m-r-15 hei-40 wid-40">
														@endif
														<div class="d-inline-block">
															<h6 class="m-b-0">{{$member->name}}</h6>
															<p class="m-b-0">{{$member->email}}</p>
														</div>
													</div>
												</td>
												<td>{{$memberType->member}}</td>
												<td>
                                                	@if($cityId != null)
														<div>
															<p><strong>City:</strong> {{$citiesInfo->name}} <i class="fa fa-chevron-circle-down fts_12  text-secondary" data-toggle="collapse" data-target="#demo{{$member->id}}"></i></p>
															
														</div>
														<div id="demo{{$member->id}}" class="collapse">
															<p><strong>State:</strong> {{$stateData->name}} </p>
															<p><strong>Country:</strong> {{$CountryData->name}} </p>
														</div>
													@else
														<p><strong>City:</strong> {{$member->city}} </p>
													@endif
												</td>
												<td><a href="{{URL::to('/ustaad/viewClientProfile')}}/{{$member->id}}">Veiw Profile</a></td>
												<td>{{$member->created_at->format(" d/m/y ")}}</td>
												<td>
													@if($member->confirmationEmail == 1)
														<span class="badge badge-light-success">Comfirm</span>
													@else
														<form action="{{URL::to('ustaad/client/confirmEmail')}}/{{$member->id}}" method="post">
															<span class="badge badge-light-danger">UnComfirm</span>
															<input type="checkbox" name="confirmationEmail" class="AdminConfirmationEmail" id="" value="1">
														</form>
													@endif
												</td>
												<td>
													<span class="badge {{($member->status == 1 && $member->confirmationEmail == 1) ? 'badge-light-success' : 'badge-light-danger'}}">{{($member->status == 1 && $member->confirmationEmail == 1) ? 'Active' : 'Deactive'}}</span>
													<div class="overlay-edit">
														<!-- <a href="{{URL::to('ustaad/member/edit')}}/{{$member->id}}"><button type="button" class="btn btn-icon btn-success"><i class="feather icon-check-circle"></i></button></a> -->
														@if($member->status == 1)
															<a href="{{URL::to('ustaad/client/delete')}}/{{$member->id}}" class="addAction" data-toggle="modal" data-target="#myModal"><button type="button" class="btn btn-icon btn-danger"><i class="feather icon-trash-2"></i></button></a>
														@elseif($member->status == 0)
															<a href="{{URL::to('ustaad/client/active')}}/{{$member->id}}" class="addAction" data-toggle="modal" data-target="#myModal"><button type="button" class="btn btn-icon btn-success"><i class="feather icon-unlock"></i></button></a>
														@endif
													</div>
												</td>
											</tr>
									@endforeach
								</tbody>
								<tfoot>
									<tr>
										<th>ID</th>
										<th>Name</th>
										<th>Position</th>
										<th>City/State/Country</th>
										<th>Profile</th>
										<th>Start date</th>
										<th>Confirm mailer</th>
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


