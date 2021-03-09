@php
	$value =Session::get('admin');
@endphp
<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Forexustaad Admin Panel</title>

		<!-- Meta -->
		<meta charset="utf-8" />
		<meta
			name="viewport"
			content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<meta name="author" content="Codedthemes" />
		<!-- Favicon icon -->
		<link rel="icon" href="{{URL::to('/public/assets/assets/img/favicon.png')}}" type="image/x-icon" />
		<link rel="stylesheet" href="{{URL::to('/public/assets/assets/css/select2.min.css')}}" />
		<!-- vendor css -->
		<link rel="stylesheet" href="{{URL::to('/public/assets/assets/css/adminstyle.css')}}" />
		<!-- Check Editor -->
		<script src="https://cdn.ckeditor.com/4.6.2/full/ckeditor.js"></script>

		<!-- animate -->
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.5.2/animate.min.css" />
		<!-- data Tables -->
		<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.css"/>
  		<!-- font-awesome -->
		<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" rel="stylesheet">
		<style>
			.fa{
				font-family: "Font Awesome 5 Free", Open Sans;
				font-weight:501;
			}
			.fa{
				font-family: 'Font Awesome 5 Pro', 'Font Awesome 5 Free','Font Awesome 5 Solids', 'Font Awesome 5 Brands' !important;
			}
		</style>


	</head>
	<body class="">
        @if(Session::has('desktopNotification'))
            @include('send')
        @endif
		<!-- [ Pre-loader ] start -->
		<div class="loader-bg">
			<div class="loader-track">
				<div class="loader-fill"></div>
			</div>
		</div>
		<!-- [ Pre-loader ] End -->
		<!-- [ navigation menu ] start -->
		<nav class="pcoded-navbar menupos-fixed menu-light">
			<div class="navbar-wrapper">
				<div class="navbar-content scroll-div">
					<ul class="nav pcoded-inner-navbar">
						@if($value['memberId'] != 6)
							<li class="nav-item pcoded-menu-caption">
								<label>Dashboard Design</label>
							</li>
							<li class="nav-item">
								<a href="{{URL::to('/ustaad/dashboard')}}" class="nav-link"
									><span class="pcoded-micon"
										><i class="fa fa-home"></i></span
									><span class="pcoded-mtext">Dashboard</span></a
								>
							</li>
							<li class="nav-item pcoded-menu-caption">
								<label>Posts Area</label>
							</li>
							<li class="nav-item pcoded-hasmenu">
								<a href="#!" class="nav-link"
									><span class="pcoded-micon"
										><i class="fab fa-blogger"></i></span
									><span class="pcoded-mtext">Posts</span></a
								>
								<ul class="pcoded-submenu">
									<li><a href="{{URL::to('ustaad/allCategories')}}">Add New</a></li>
									<li><a href="{{URL::to('ustaad/category')}}">Categories</a></li>
									<li><a href="{{URL::to('ustaad/tag')}}">Tags</a></li>
								</ul>
							</li>
							<li class="nav-item pcoded-menu-caption">
								<label>training Area</label>
							</li>
							<li class="nav-item pcoded-hasmenu">
								<a href="#!" class="nav-link"
									><span class="pcoded-micon"
										><i class="fab fa-blogger"></i></span
									><span class="pcoded-mtext">Training</span></a
								>
								<ul class="pcoded-submenu">
									<li><a href="{{URL::to('ustaad/lecture')}}">All Training</a></li>
									<li><a href="{{URL::to('ustaad/lecture/new')}}">Add Lecture</a></li>
									<li><a href="{{URL::to('ustaad/comment/latest')}}">Latest Comments</a></li>
								</ul>
							</li>
							<li class="nav-item pcoded-menu-caption">
								<label>Webinar Area</label>
							</li>
							<li class="nav-item pcoded-hasmenu">
								<a href="#!" class="nav-link"
									><span class="pcoded-micon"
										><i class="fab fa-blogger"></i></span
									><span class="pcoded-mtext">Webinar</span></a
								>
								<ul class="pcoded-submenu">
									<li><a href="{{URL::to('ustaad/webinar')}}">All Webinar</a></li>
									<li><a href="{{URL::to('ustaad/webinar/add')}}">Add Webinar</a></li>
								</ul>
							</li>
						@endif
							<li class="nav-item pcoded-menu-caption">
								<label>Broker Area</label>
							</li>
							<li class="nav-item pcoded-hasmenu">
								<a href="#!" class="nav-link"
									><span class="pcoded-micon"
										><i class="fab fa-blogger"></i></span
									><span class="pcoded-mtext">Brokers</span></a
								>
								<ul class="pcoded-submenu">
									<li><a href="{{URL::to('ustaad/allbrokers')}}/{{$value['memberId']}}">All Brokers</a></li>
									<li><a href="{{URL::to('/ustaad/brokersPromotion')}}/{{$value['memberId']}}">All Broker Promotion</a></li>
									<li><a href="{{URL::to('/ustaad/brokersNew')}}/{{$value['memberId']}}">All Broker News</a></li>
									@if($value['memberId'] != 6)
										<li><a href="{{URL::to('/ustaad/brokersTraining')}}/{{$value['memberId']}}">All Broker Trainings</a></li>
										<!-- <li><a href="{{URL::to('/ustaad/brokerReview/new')}}">Add Broker Review</a></li>
										<li><a href="{{URL::to('ustaad/brokersTrainings/new')}}">Add New Training</a></li> -->
									@endif
									<!-- <li><a href="{{URL::to('ustaad/broker/category')}}">Add New Broker</a></li>
									<li><a href="{{URL::to('/ustaad/brokersPromotions/new')}}">Add Promotion</a></li>
									<li><a href="{{URL::to('/ustaad/brokersNews/new')}}">Add Broker News</a></li> -->
								</ul>
							</li>
						@if($value['memberId'] != 6)
							<li class="nav-item pcoded-menu-caption">
								<label>Navigation</label>
							</li>
							<li class="nav-item">
								<a href="{{URL::to('ustaad/staticpages
								')}}" class="nav-link"
									><span class="pcoded-micon"
										><i class="fa fa-cube"></i></span
									><span class="pcoded-mtext">Static Pages</span></a
								>
							</li>
							<li class="nav-item pcoded-hasmenu">
								<a href="#!" class="nav-link"
									><span class="pcoded-micon"
										><i class="fa fa-cube"></i></span
									><span class="pcoded-mtext">Header</span></a
								>
								<ul class="pcoded-submenu">
									<li><a href="{{URL::to('ustaad/firstNav')}}">First Nav Bar</a></li>
									<li><a href="{{URL::to('ustaad/navMenu')}}">Nav Menus</a></li>
									<li><a href="{{URL::to('ustaad/logo-panel')}}">Logo Panel</a></li>
									<li><a href="{{URL::to('ustaad/sliding-images')}}">Sliding Images</a></li>
								</ul>
							</li>
							<li class="nav-item">
								<a href="{{URL::to('ustaad/edit-footer
								')}}" class="nav-link"
									><span class="pcoded-micon"
										><i class="fa fa-cube"></i></span
									><span class="pcoded-mtext">Footer</span></a
								>
							</li>
						@if($value['memberId'] != 4)
							<li class="nav-item pcoded-menu-caption">
								<label>Banner Panel</label>
							</li>
							<li class="nav-item pcoded-hasmenu">
								<a href="#!" class="nav-link"
									><span class="pcoded-micon"
										><i class="fa fa-layer-group"></i></span
									><span class="pcoded-mtext">Banners</span></a
								>
								<ul class="pcoded-submenu">
									<li><a href="{{URL::to('ustaad/banner/header-banner')}}">Header Banner</a></li>
									<li><a href="{{URL::to('ustaad/banner/mid-banner')}}">Mid Banner</a></li>
									<li><a href="{{URL::to('ustaad/banner/left-side-banner')}}">Left Side Bar Banner</a></li>
									<li><a href="{{URL::to('ustaad/banner/right-side-banner')}}">Right Side Bar</a></li>
									<li><a href="{{URL::to('ustaad/sponsor')}}">Sponsors</a></li>
								</ul>
							</li>
							<li class="nav-item pcoded-menu-caption">
								<label>Api Panel</label>
							</li>
							<li class="nav-item pcoded-hasmenu">
								<a href="#!" class="nav-link"
									><span class="pcoded-micon"
										><i class="fa fa-layer-group"></i></span
									><span class="pcoded-mtext">Api</span></a
								>
								<ul class="pcoded-submenu">
									<li><a href="{{URL::to('ustaad/api/api-home')}}">API Home Page</a></li>
									<li><a href="{{URL::to('ustaad/api/api-left')}}">API Left Side Bar </a></li>
									<li><a href="{{URL::to('ustaad/api/api-right')}}">API Right Side</a></li>
								</ul>
							</li>
							<li class="nav-item pcoded-menu-caption">
								<label>User</label>
							</li>
							<li class="nav-item pcoded-hasmenu">
								<a href="#!" class="nav-link"
									><span class="pcoded-micon"
										><i class="fa fa-users"></i></span
									><span class="pcoded-mtext">User</span></a
								>
								<ul class="pcoded-submenu">
									<li><a href="{{URL::to('ustaad/member/userList')}}">User List</a></li>
									<li><a href="{{URL::to('ustaad/member/clientList')}}">Client User List</a></li>
								</ul>
							</li>
							<li class="nav-item pcoded-menu-caption">
								<label>App</label>
							</li>
							<li class="nav-item pcoded-hasmenu">
								<a href="#!" class="nav-link"
									><span class="pcoded-micon"
										><i class="fa fa-image"></i></span
									><span class="pcoded-mtext">Gallery</span></a
								>
								<ul class="pcoded-submenu">
									@php
										$totalData = scandir("storage/app");
										$selectedImagesFloders = [];
										foreach ($totalData as $data) {
											if (strpos($data, 'Images') != false) {
												array_push($selectedImagesFloders,$data);
											}
										}
									@endphp
									@foreach($selectedImagesFloders as $imageFloder)
										<li><a href="{{URL::to('/ustaad/gallery')}}/{{$imageFloder}}">{{$imageFloder}}</a></li>
									@endforeach
								</ul>
							</li>
							@if($value["memberId"] == 1)
								<li class="nav-item pcoded-menu-caption">
									<label>Trash area</label>
								</li>
								<li class="nav-item pcoded-hasmenu">
									<a href="#!" class="nav-link"
										><span class="pcoded-micon"
											><i class="fa fa-trash"></i></span
										><span class="pcoded-mtext">Trash</span></a
									>
									<ul class="pcoded-submenu">
										<li><a href="{{URL::to('/ustaad/trash')}}">Trash</a></li>
										<li><a href="{{URL::to('/ustaad/trashGallery')}}">Gallery Trash</a></li>
									</ul>
								</li>
							@endif <br><br><br><br>
						@endif
						@endif

					</ul>
				</div>
			</div>
		</nav>
		<!-- [ navigation menu ] end -->
		<!-- [ Header ] start -->
		<header
			class="navbar pcoded-header navbar-expand-lg navbar-light headerpos-fixed header-blue"
		>
			<div class="m-header">
				<a class="mobile-menu" id="mobile-collapse" href="#!"><span></span></a>
				<a href="#!" class="b-brand">
					<!-- ========   change your logo hear   ============ -->
					<img src="{{URL::to('/public/assets/assets/img/logo.png')}}" alt="" class="logo" />
					<!-- <img src="{{URL::to('/public/assets/assets/img/logo-icon.png')}}" alt="" class="logo-thumb" /> -->
				</a>
				<a href="#!" class="mob-toggler">
					<i class="fa fa-ellipsis-v"></i>
				</a>
			</div>
			<div class="collapse navbar-collapse">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item">
						<a href="#!" class="pop-search"
							><i class="fa fa-search"></i
						></a>
						<div class="search-bar">
							<input
								type="text"
								class="form-control border-0 shadow-none"
								placeholder="Search here"
							/>
							<button type="button" class="close" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
					</li>
					<li class="nav-item">
						<a
							href="#!"
							class="full-screen"
							onclick="javascript:toggleFullScreen()"
							><i class="fa fa-expand"></i
						></a>
					</li>
				</ul>
				<ul class="navbar-nav ml-auto">
					@if($value['memberId'] != 6)
					<li>
						<div class="dropdown">
							<a class="dropdown-toggle" href="#" data-toggle="dropdown">
								<i class="fa fa-bell"></i>
								@if(count($NotificationMessage) != 0)
									<sup><span class="text-danger" style="position:absolute;top:4px;font-size:14px;">{{count($NotificationMessage)}}</span></sup>
								@endif
							</a>
							@if(count($NotificationMessage) != 0)
								<div class="dropdown-menu dropdown-menu-right notification">
										<form action="{{URL::to('/ustaad/notification/checked/delete')}}" method="post">
									<div class="noti-head">
										<h6 class="d-inline-block m-b-0">Notifications</h6>
										<div class="float-right">
											<input type="submit" class="btn clearSelectedNotification text-white p-0" value="clear">
										</div>
									</div>
									<ul class="noti-body">
										@foreach($NotificationMessage as $messageNoti)
											@php
												if($messageNoti->userType != 1){
													$user = $messageNoti->GetUser();
													$userInfo = $messageNoti->GetUserInfo();
													if($userInfo->userImage == null){
														$userInfo->userImage = "WebImages/avatar-5.jpg";
													}
												}else{
													$userClient = $messageNoti->GetClientUser();
													if($userClient->image == null){
														$userClient->image = "WebImages/avatar-5.jpg";
													}
												}
											@endphp
											<li class="notification">
													<div class="media">
														<span class="mt-3 mr-2"><input type="checkbox" name="notification[]" id="checkedNotification" value="{{$messageNoti->id}}"> </span>
														<img class="img-radius" src="{{URL::to('/storage/app/')}}/{{$messageNoti->userType != 1 ? $userInfo->userImage : $userClient->image}}" alt="Generic placeholder image" />
														<div class="media-body">
															<p><strong>{{$messageNoti->userType != 1 ? $user->username : $userClient->name}}</strong></p>
															<p>{{$messageNoti->text}}</p>
														</div>
														<a href="{{URL::to('ustaad/notification')}}/{{$messageNoti->id}}" class="text-primary">View</a>
													</div>
											</li>
										@endforeach
									</ul>
									</form>
									<div class="noti-footer">
										<input type="submit" class="btn selectedAllNotification" style="cursor:pointer" value="check all">
									</div>
								</div>
							@endif
						</div>
					</li>
					<li>
						<div class="dropdown">
							<a href="{{URL::to('ustaad/contact')}}" class="displayChatbox dropdown-toggle">
								<i class="fas fa-envelope"></i>
								@if(count($HeaderUnReadMessage) != 0)
									<sup><span class="text-success" style="position:absolute;top:4px;font-size:14px;">{{count($HeaderUnReadMessage)}}</span></sup>
								@endif
							</a>
						</div>
					</li>
					@endif
					<li>
						@php
						 	$memberData = App\Models\AdminMemberDetailModel::where('adminTableId',$value['id'])->first();
						@endphp
						@php
							if($memberData->userImage == null ){
								$memberData->userImage = "WebImages/avatar-5.jpg";
							}
						@endphp
						<div class="dropdown drp-user">
							<a href="#!" class="dropdown-toggle" data-toggle="dropdown">
								<img
									src="{{URL::to('storage/app')}}/{{$memberData->userImage}}"
									class="img-radius wid-40 hei-40"
									alt="User-Profile-Image"
								/>
							</a>
							<div
								class="dropdown-menu dropdown-menu-right profile-notification"
							>
								<div class="pro-head">
									<img
										src="{{URL::to('storage/app')}}/{{$memberData->userImage}}"
										class="img-radius"
										alt="User-Profile-Image"
									/>
									<span>{{$value['username']}}</span>
									<a href="{{URL::to('/ustaad/logout')}}" class="dud-logout" title="Logout">
										<i class="fa fa-sign-out-alt"></i>
									</a>
								</div>
								<ul class="pro-body">
									<li>
										<a href="{{URL::to('ustaad/member/profile')}}/{{$value['id']}}" class="dropdown-item"
											><i class="fa fa-user"></i> Profile</a
										>
									</li>
									@if($value['memberId'] == 1 || $value['memberId'] == 2)
										<li>
											<a href="{{URL::to('ustaad/member/add')}}"  class="dropdown-item">
												<i class="fa fa-user-plus"></i> Add User
											</a>
										</li>
									@endif
									<li>
										<a href="{{URL::to('ustaad/member/changePassword')}}" class="dropdown-item">
											<i class="fa fa-lock"></i> Change Password
										</a>
									</li>
								</ul>
							</div>
						</div>
					</li>
				</ul>
			</div>
		</header>
		<!-- [ Header ] end -->


