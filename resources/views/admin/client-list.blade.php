@php
	$value =Session::get('admin');
@endphp
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
									<li class="breadcrumb-item"><a href="{{URL::to('/ustaad/dashboard')}}"><i class="fa fa-home"></i></a></li>
									@if($value['memberId'] != 8)
										<li class="breadcrumb-item"><a href="{{URL::to('/ustaad/member/clientList')}}">Client Type</a></li>
									@else
										<li class="breadcrumb-item"><a href="#">Users</a></li>
									@endif
									<li class="breadcrumb-item"><a href="#!">Client list</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<!-- [ breadcrumb ] end -->
				<!-- [ Main Content ] start -->
				@if($id == "All")
					<div class="card">
						<div class="card-body" style="background-color: #f1f1f1;">
							<div class="">
								<form action="">
									@php 
										if(isset($_GET['startDate']) && isset($_GET['endDate']) ){
											$startDate = $_GET['startDate'];
											$endDate = $_GET['endDate'];
										}else{
											$startDate = "";
											$endDate = "";
										}
									@endphp
									<label for="">Start Date: </label>
									<input type="date" name="startDate" value="{{$startDate}}" required>
									<label for="">End Date: </label>
									<input type="date" name="endDate" value="{{$endDate}}" required>
									<input type="submit" value="Save" class="btn btn-primary btn-sm" >
								</form>
							</div>
						</div>
					</div>
				@endif
				<div class="row">
					<div class="col-lg-12">
						<div class="card user-profile-list">
							<div class="card-body">
								<div class="dt-responsive table-responsive">
									<table id="user-list-table"class="table table-striped table-bordered dt-responsive nowrap">
										<thead>
											<tr>
												<th>ID</th>
												<th>Name</th>
												@if($id == "All")
													<th>Position</th>
												@endif
												<th>City/State/Country</th>
												<th>Start date</th>
												<th>Confirm mailer</th>
												<th>Status</th>
												<th class="none">Phone Number: </th>
												<th class="none">Email: </th>
												<th class="none">Account Detail: </th>
												<th class="none">Deposit Detail: </th>
												<th class="none">Keywords: </th>
											</tr>
										</thead>
										<tbody>
											@php $iorder = 0; @endphp 
											@foreach($memberData as $member)
													@php
														$memberType = $member->GetMember();
														$memberAccountDeposit = $member->GetAccountsDepositDetail();
														$memberAccount = $member->GetAccountsDetail();
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
															<a href="{{URL::to('/ustaad/viewClientProfile')}}/{{$member->id}}">
																<div class="d-inline-block align-middle">
																	@if($member->image == null)
																		<img src="{{URL::to('/public/assets/assets/img/user1.jpg')}}" alt="user" class="img-radius align-top m-r-15 hei-40 wid-40">
																	@else
																		<img src="{{URL::to('/storage/app')}}/{{$member->image}}" alt="user" class="img-radius align-top m-r-15 hei-40 wid-40">
																	@endif
																	<div class="d-inline-block">
																		<h6 class="m-b-0">{{$member->name}}{{$member->lastName}}</h6>
																	</div>
																</div>
															</a>
														</td>
															@if($id == "All")
																<td>{{$memberType->member}}</td>
															@endif
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
														<td>{{$member->created_at->format(" d/m/y ")}}</td>
														<td>
															@if($member->confirmationEmail == 1)
																<span class="badge badge-light-success">Comfirm</span>
															@else
																<form action="{{URL::to('ustaad/client/confirmEmail')}}/{{$member->id}}" method="post">
																	<input type="checkbox" name="confirmationEmail" class="AdminConfirmationEmail" id="" value="1">
																	<span class="badge badge-light-danger">UnComfirm</span>
																</form>
																<a href="{{URL::to('ustaad/ReconformationMail')}}/{{$member->id}}" class="badge badge-light-warning">Refirmation Mail</a>
															@endif
														</td>
														<td>
															<span class="badge {{($member->status == 1 && $member->confirmationEmail == 1) ? 'badge-light-success' : 'badge-light-danger'}}">{{($member->status == 1 && $member->confirmationEmail == 1) ? 'Active' : 'Deactive'}}</span>
															<div class="overlay-edit">
																@if($value['memberId'] != 8)
																	@if($member->status == 1)
																		<button href="{{URL::to('ustaad/client/delete')}}/{{$member->id}}" data-toggle="modal" data-target="#myModal" type="button" class="btn btn-icon btn-danger addAction"><i class="fa fa-lock"></i></button>
																	@elseif($member->status == 0)
																		<button href="{{URL::to('ustaad/client/active')}}/{{$member->id}}" data-toggle="modal" data-target="#myModal" type="button" class="btn btn-icon btn-success addAction"><i class="fa fa-unlock"></i></button>
																	@endif
																@else
																	<button href="#" type="button" userId="{{$member->id}}" class="btn btn-icon btn-warning OpenClientDialogBox"><i class="fa fa-comment-dots"></i></button>
																@endif
															</div>
														</td>
														<td>{{$member->mobile}}</td>
														<td>{{$member->email}}</td>
														<td>
															<span>{{$memberAccount[0]}}</span> / <span class="text-success">{{$memberAccount[1]}}</span> / <span class="text-danger">{{$memberAccount[2]}}</span> / <span class="text-warning">{{$memberAccount[3]}}</span>
														</td>
														<td>
															<span>{{$memberAccountDeposit[0]}}</span> / <span class="text-success">{{$memberAccountDeposit[1]}}</span> / <span class="text-danger">{{$memberAccountDeposit[2]}}</span> / <span class="text-warning">{{$memberAccountDeposit[3]}}</span>
														</td>
														<td>{{$member->keywords}}</td>
													</tr>
											@endforeach
										</tbody>
										<tfoot>
											<tr>
												<th>ID</th>
												<th>Name</th>
												@if($id == "All")
													<th>Position</th>
												@endif
												<th>City/State/Country</th>
												<th>Start date</th>
												<th>Confirm mailer</th>
												<th>Status</th>
												<th>Phone Number</th>
												<th>Email</th>
												<th>Account Detail</th>
												<th>Deposit Detail</th>
												<th>Keywords</th>
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
		
		table.dataTable.dtr-inline.collapsed>tbody>tr>td:first-child:before {
				top: 32px;
				left: 10px;
				height: 14px;
				width: 14px;
				display: block;
				position: absolute;
				color: white;
				border: 2px solid white;
				border-radius: 14px;
				box-shadow: 0 0 3px #444;
				box-sizing: content-box;
				text-align: center;
				font-family: 'Courier New', Courier, monospace;
				line-height: 14px;
				content: '+';
				background-color: #31b131;
			}
	</style>

@include('admin.include.footer')
<script>
	$(".AdminConfirmationEmail").on('change',function() {
		var data = $(this).parent();
		data.submit();
	})

	// User Direct Msg Send
	$(".OpenClientDialogBox").on("click",function(){
		var id = $(this).attr("userId");
		$(".h-send-chat").attr("userId",id);
      var url = "{{URL::to('ustaad/clientDataMessage')}}/" + id;
      console.log(url);
			$.ajax({
				type: "Post",
				url: url,
				success: function(response){
					var json = $.parseJSON(response);
            var userId = json[0].id;
            var chatName = json[0].name;
            var chatImg = json[0].image;
            if (chatImg == null) {
              var chatImgSrc = "https://bootdey.com/img/Content/avatar/avatar7.png";
            }else{
              var chatImgSrc = "{{URL::to('storage/app')}}" + "/" + chatImg;
            }
              var chatImgSrc1 = "{{URL::to('public/assets/assets/img/favicon.png')}}";
            json.shift();
            $(".clientDataMessagesUser").html("");
            $(".clientDataMessagesUser").html(chatName);
            $(".clientDataMessagesUser").attr('userId',userId);
            $(".main-friend-chat").html("");
              var chatMessages = [];
              var chatStartCount = 0; 
              var AllAtOneClientMessageData = "";
            for (let index = 0; index < json[0].length; index++) {
              if (json[0][index].userType == 2 && chatStartCount == 1){
                  for (let index1 = 0; index1 < chatMessages.length; index1++){
                    AllAtOneClientMessageData = AllAtOneClientMessageData + chatMessages[index1];
                  }
                  ChatClientMessageThrough(chatImgSrc,AllAtOneClientMessageData)
              }
              if (json[0][index].userType == 1 && chatStartCount == 2){
                  for (let index1 = 0; index1 < chatMessages.length; index1++){
                    AllAtOneClientMessageData = AllAtOneClientMessageData + chatMessages[index1];
                  }
                  AdminClientMessageThrough(chatImgSrc1,AllAtOneClientMessageData)
              }
              if (json[0][index].userType == 1){
                if (chatStartCount == 2) {
                  console.log("a2");
                  chatMessages = [];
                  AllAtOneClientMessageData = "";
                }
                var chatOneMessage = "<p class='chat-cont mr-1'>"+json[0][index].message+"</p></br>"
                chatMessages.push(chatOneMessage); 
                chatStartCount = 1;
              }
              if (json[0][index].userType == 2){
                if (chatStartCount == 1) {
                  console.log("a1");
                  chatMessages = [];
                  AllAtOneClientMessageData = "";
                }
                var chatOneMessage = "<p class='chat-cont mr-1'>"+json[0][index].message+"</p></br>"
                chatMessages.push(chatOneMessage); 
                chatStartCount = 2;
                  console.log("c");
              }
              if (index+1 == json[0].length) {
                  for (let index1 = 0; index1 < chatMessages.length; index1++){
                    AllAtOneClientMessageData = AllAtOneClientMessageData + chatMessages[index1];
                  }
                  if (json[0][index].userType == 2){
                    AdminClientMessageThrough(chatImgSrc1,AllAtOneClientMessageData);
                  }else{
                    ChatClientMessageThrough(chatImgSrc,AllAtOneClientMessageData);
                  }
                }
            }
            $(".header-chat").addClass("open");
            $(".header-user-list").toggleClass("msg-open");
           
            // Chat Box Scroll Bottom
            var objDiv = document.getElementById("main-chat-cont ");
			objDiv.scrollTop = objDiv.scrollHeight;
			
				},
				error: function(data) {
					console.log("fail");
				}
      });
	})
</script>


