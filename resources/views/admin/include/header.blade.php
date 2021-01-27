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
		<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.css"/>
  
		<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.js"></script>

	</head>
	<body class="">
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
										><i class="feather icon-home"></i></span
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
									<!-- <li><a href="{{URL::to('ustaad/post/viewAll')}}">All Posts</a></li>
									<li><a href="{{URL::to('ustaad/signals')}}">All Signals</a></li> -->
									<li><a href="{{URL::to('ustaad/allCategories')}}">Add New</a></li>
									<li><a href="{{URL::to('ustaad/category')}}">Categories</a></li>
									<li><a href="{{URL::to('ustaad/tag')}}">Tags</a></li>
									<li><a href="{{URL::to('ustaad/comment')}}">Comments</a></li>
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
								</ul>
							</li>
							<!-- <li class="nav-item pcoded-menu-caption">
								<label>Strategies Area</label>
							</li>
							<li class="nav-item pcoded-hasmenu">
								<a href="#!" class="nav-link"
									><span class="pcoded-micon"
										><i class="fab fa-blogger"></i></span
									><span class="pcoded-mtext">Strategies</span></a
								>
								<ul class="pcoded-submenu">
									<li><a href="{{URL::to('ustaad/strategies')}}">All Strategies</a></li>
									<li><a href="{{URL::to('ustaad/strategies/new')}}">Add Strategy</a></li>
								</ul>
							</li> -->
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
									<li><a href="{{URL::to('ustaad/broker/category')}}">Add New Broker</a></li>
									<li><a href="{{URL::to('/ustaad/brokerReview/new')}}">Add Broker Review</a></li>
									<li><a href="{{URL::to('/ustaad/brokersPromotions/new')}}">Add Promotion</a></li>
									<li><a href="{{URL::to('/ustaad/brokersNews/new')}}">Add Broker News</a></li>
								</ul>
							</li>
						@if($value['memberId'] != 6)
							<li class="nav-item pcoded-menu-caption">
								<label>Navigation</label>
							</li>
							<li class="nav-item pcoded-hasmenu">
								<a href="#!" class="nav-link"
									><span class="pcoded-micon"
										><i class="feather icon-box"></i></span
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
										><i class="feather icon-box"></i></span
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
										><i class="feather icon-layers"></i></span
									><span class="pcoded-mtext">Banners</span></a
								>
								<ul class="pcoded-submenu">
									<li><a href="{{URL::to('ustaad/banner/header-banner')}}">Header Banner</a></li>
									<li><a href="{{URL::to('ustaad/banner/left-side-banner')}}">Left Side Bar Banner</a></li>
									<li><a href="{{URL::to('ustaad/banner/right-side-banner')}}">Right Side Bar</a></li>
								</ul>
							</li>
							<li class="nav-item pcoded-menu-caption">
								<label>Api Panel</label>
							</li>
							<li class="nav-item pcoded-hasmenu">
								<a href="#!" class="nav-link"
									><span class="pcoded-micon"
										><i class="feather icon-layers"></i></span
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
										><i class="feather icon-users"></i></span
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
										><i class="feather icon-image"></i></span
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
							<!-- <li class="nav-item pcoded-menu-caption">
								<label>Contact</label>
							</li>
							<li class="nav-item">
								<a href="{{URL::to('ustaad/contact')}}" class="nav-link"
									><span class="pcoded-micon"
										><i class="feather icon-image"></i></span
									><span class="pcoded-mtext">Contact</span></a
								>
							</li> -->
							@if($value["memberId"] == 1)
								<li class="nav-item pcoded-menu-caption">
									<label>Trash area</label>
								</li>
								<li class="nav-item pcoded-hasmenu">
									<a href="#!" class="nav-link"
										><span class="pcoded-micon"
											><i class="feather icon-trash"></i></span
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
					<img src="{{URL::to('/public/assets/assets/img/logo-icon.png')}}" alt="" class="logo-thumb" />
				</a>
				<a href="#!" class="mob-toggler">
					<i class="feather icon-more-vertical"></i>
				</a>
			</div>
			<div class="collapse navbar-collapse">
				<ul class="navbar-nav mr-auto">
					<li class="nav-item">
						<a href="#!" class="pop-search"
							><i class="feather icon-search"></i
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
							><i class="feather icon-maximize"></i
						></a>
					</li>
				</ul>
				<ul class="navbar-nav ml-auto">
					@if($value['memberId'] != 6)
					<li>
						<div class="dropdown">
							<a class="dropdown-toggle" href="#" data-toggle="dropdown"
								><i class="icon feather icon-bell"></i
								><span class="badge bg-danger"
									><span class="sr-only"></span></span
							></a>
							<div class="dropdown-menu dropdown-menu-right notification">
								<div class="noti-head">
									<h6 class="d-inline-block m-b-0">Notifications</h6>
									<!-- <div class="float-right">
										<a href="#!" class="m-r-10">mark as read</a>
										<a href="#!">clear all</a>
									</div> -->
								</div>
								<ul class="noti-body">
									@php $ir=0 @endphp
									@foreach($NotificationMessage as $messageNoti)
										@php 
											$user = $messageNoti->GetUser();
											$userInfo = $messageNoti->GetUserInfo();
											if($userInfo->userImage == null){
												$userInfo->userImage = "WebImages/avatar-5.jpg";
											}
											$ir++
										@endphp
										<li class="notification">
												<div class="media">
											
													
													<span class="mt-2 mr-2">{{$ir}}. </span>
													<img class="img-radius" src="{{URL::to('/storage/app/')}}/{{$userInfo->userImage}}" alt="Generic placeholder image" />
													<div class="media-body">
														<p><strong>{{$user->username}}</strong></p>
														<p>{{$messageNoti->text}}</p>
													</div>
													<a href="{{URL::to('ustaad/notification')}}/{{$messageNoti->id}}" class="text-primary">View</a>
												</div>
										</li>
									@endforeach
								</ul>
								<div class="noti-footer"></div>
							</div>
						</div>
					</li>
					<li>
						<div class="dropdown">
							<a href="{{URL::to('ustaad/contact')}}" class="displayChatbox dropdown-toggle"
								><i class="icon feather icon-mail"></i
								><span class="badge bg-success"
									><span class="sr-only"></span></span
							></a>
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
									class="img-radius wid-40"
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
										<i class="feather icon-log-out"></i>
									</a>
								</div>
								<ul class="pro-body">
									<li>
										<a href="{{URL::to('ustaad/member/profile')}}/{{$value['id']}}" class="dropdown-item"
											><i class="feather icon-user"></i> Profile</a
										>
									</li>
									@if($value['memberId'] == 1 || $value['memberId'] == 2)
										<li>
											<a href="{{URL::to('ustaad/member/add')}}"  class="dropdown-item">
												<i class="feather icon-user-plus"></i> Add User
											</a>
										</li>
									@endif
									<!-- <li>
										<a href="email_inbox.html" class="dropdown-item">
											<i class="feather icon-mail"></i> My Messages
										</a>
									</li> -->
									<li>
										<a href="{{URL::to('ustaad/member/changePassword')}}" class="dropdown-item">
											<i class="feather icon-lock"></i> Change Password
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

		<!-- [ chat user list ] start -->
		<!-- <section class="header-user-list">
			<a href="#!" class="h-close-text"><i class="feather icon-x"></i></a>
			<ul class="nav nav-tabs" id="chatTab" role="tablist">
				<li class="nav-item">
					<a
						class="nav-link active text-uppercase border-0"
						id="chat-tab"
						data-toggle="tab"
						href="#chat"
						role="tab"
						aria-controls="chat"
						aria-selected="true"
						><i class="feather icon-message-circle mr-2"></i>Chat</a
					>
				</li>
				<li class="nav-item">
					<a
						class="nav-link text-uppercase border-0"
						id="user-tab"
						data-toggle="tab"
						href="#user"
						role="tab"
						aria-controls="user"
						aria-selected="false"
						><i class="feather icon-users mr-2"></i>User</a
					>
				</li>
				<li class="nav-item">
					<a
						class="nav-link text-uppercase border-0"
						id="setting-tab"
						data-toggle="tab"
						href="#setting"
						role="tab"
						aria-controls="setting"
						aria-selected="false"
						><i class="feather icon-settings mr-2"></i>Setting</a
					>
				</li>
			</ul>
			<div class="tab-content" id="chatTabContent">
				<div
					class="tab-pane fade show active"
					id="chat"
					role="tabpanel"
					aria-labelledby="chat-tab"
				>
					<div class="h-list-header">
						<div class="input-group">
							<input
								type="text"
								id="search-friends"
								class="form-control"
								placeholder="Search Friend . . ."
							/>
						</div>
					</div>
					<div class="h-list-body">
						<div class="main-friend-cont scroll-div">
							<div class="main-friend-list">
								<div
									class="media userlist-box"
									data-id="1"
									data-status="online"
									data-username="Josephin Doe"
								>
									<a class="media-left" href="#!"
										><img
											class="media-object img-radius"
											src="{{URL::to('/public/AdminAssets/assets/images/user/avatar-1.jpg')}}"
											alt="Generic placeholder image "
										/>
										<div class="live-status">3</div>
									</a>
									<div class="media-body">
										<h6 class="chat-header">
											Josephin Doe<small class="d-block text-c-green"
												>Typing . .
											</small>
										</h6>
									</div>
								</div>
								<div
									class="media userlist-box"
									data-id="2"
									data-status="online"
									data-username="Lary Doe"
								>
									<a class="media-left" href="#!"
										><img
											class="media-object img-radius"
											src="{{URL::to('/public/AdminAssets/assets/images/user/avatar-2.jpg')}}"
											alt="Generic placeholder image"
										/>
										<div class="live-status">1</div>
									</a>
									<div class="media-body">
										<h6 class="chat-header">
											Lary Doe<small class="d-block text-c-green">online</small>
										</h6>
									</div>
								</div>
								<div
									class="media userlist-box"
									data-id="3"
									data-status="online"
									data-username="Alice"
								>
									<a class="media-left" href="#!"
										><img
											class="media-object img-radius"
											src="{{URL::to('/public/AdminAssets/assets/images/user/avatar-3.jpg')}}"
											alt="Generic placeholder image"
									/></a>
									<div class="media-body">
										<h6 class="chat-header">
											Alice<small class="d-block text-c-green">online</small>
										</h6>
									</div>
								</div>
								<div
									class="media userlist-box"
									data-id="4"
									data-status="offline"
									data-username="Alia"
								>
									<a class="media-left" href="#!"
										><img
											class="media-object img-radius"
											src="{{URL::to('/public/AdminAssets/assets/images/user/avatar-1.jpg')}}"
											alt="Generic placeholder image"
										/>
										<div class="live-status">1</div>
									</a>
									<div class="media-body">
										<h6 class="chat-header">
											Alia<small class="d-block text-muted">10 min ago</small>
										</h6>
									</div>
								</div>
								<div
									class="media userlist-box"
									data-id="5"
									data-status="offline"
									data-username="Suzen"
								>
									<a class="media-left" href="#!"
										><img
											class="media-object img-radius"
											src="{{URL::to('/public/AdminAssets/assets/images/user/avatar-4.jpg')}}"
											alt="Generic placeholder image"
									/></a>
									<div class="media-body">
										<h6 class="chat-header">
											Suzen<small class="d-block text-muted">15 min ago</small>
										</h6>
									</div>
								</div>
								<div
									class="media userlist-box"
									data-id="1"
									data-status="online"
									data-username="Josephin Doe"
								>
									<a class="media-left" href="#!"
										><img
											class="media-object img-radius"
											src="{{URL::to('/public/AdminAssets/assets/images/user/avatar-1.jpg')}}"
											alt="Generic placeholder image "
										/>
										<div class="live-status">3</div>
									</a>
									<div class="media-body">
										<h6 class="chat-header">
											Josephin Doe<small class="d-block text-c-green"
												>Typing . .
											</small>
										</h6>
									</div>
								</div>
								<div
									class="media userlist-box"
									data-id="2"
									data-status="online"
									data-username="Lary Doe"
								>
									<a class="media-left" href="#!"
										><img
											class="media-object img-radius"
											src="{{URL::to('/public/AdminAssets/assets/images/user/avatar-2.jpg')}}"
											alt="Generic placeholder image"
										/>
										<div class="live-status">1</div>
									</a>
									<div class="media-body">
										<h6 class="chat-header">
											Lary Doe<small class="d-block text-c-green">online</small>
										</h6>
									</div>
								</div>
								<div
									class="media userlist-box"
									data-id="3"
									data-status="online"
									data-username="Alice"
								>
									<a class="media-left" href="#!"
										><img
											class="media-object img-radius"
											src="{{URL::to('/public/AdminAssets/assets/images/user/avatar-3.jpg')}}"
											alt="Generic placeholder image"
									/></a>
									<div class="media-body">
										<h6 class="chat-header">
											Alice<small class="d-block text-c-green">online</small>
										</h6>
									</div>
								</div>
								<div
									class="media userlist-box"
									data-id="4"
									data-status="offline"
									data-username="Alia"
								>
									<a class="media-left" href="#!"
										><img
											class="media-object img-radius"
											src="{{URL::to('/public/AdminAssets/assets/images/user/avatar-1.jpg')}}"
											alt="Generic placeholder image"
										/>
										<div class="live-status">1</div>
									</a>
									<div class="media-body">
										<h6 class="chat-header">
											Alia<small class="d-block text-muted">10 min ago</small>
										</h6>
									</div>
								</div>
								<div
									class="media userlist-box"
									data-id="5"
									data-status="offline"
									data-username="Suzen"
								>
									<a class="media-left" href="#!"
										><img
											class="media-object img-radius"
											src="{{URL::to('/public/AdminAssets/assets/images/user/avatar-4.jpg')}}"
											alt="Generic placeholder image"
									/></a>
									<div class="media-body">
										<h6 class="chat-header">
											Suzen<small class="d-block text-muted">15 min ago</small>
										</h6>
									</div>
								</div>
								<div
									class="media userlist-box"
									data-id="1"
									data-status="online"
									data-username="Josephin Doe"
								>
									<a class="media-left" href="#!"
										><img
											class="media-object img-radius"
											src="{{URL::to('/public/AdminAssets/assets/images/user/avatar-1.jpg')}}"
											alt="Generic placeholder image "
										/>
										<div class="live-status">3</div>
									</a>
									<div class="media-body">
										<h6 class="chat-header">
											Josephin Doe<small class="d-block text-c-green"
												>Typing . .
											</small>
										</h6>
									</div>
								</div>
								<div
									class="media userlist-box"
									data-id="2"
									data-status="online"
									data-username="Lary Doe"
								>
									<a class="media-left" href="#!"
										><img
											class="media-object img-radius"
											src="{{URL::to('/public/AdminAssets/assets/images/user/avatar-2.jpg')}}"
											alt="Generic placeholder image"
										/>
										<div class="live-status">1</div>
									</a>
									<div class="media-body">
										<h6 class="chat-header">
											Lary Doe<small class="d-block text-c-green">online</small>
										</h6>
									</div>
								</div>
								<div
									class="media userlist-box"
									data-id="3"
									data-status="online"
									data-username="Alice"
								>
									<a class="media-left" href="#!"
										><img
											class="media-object img-radius"
											src="{{URL::to('/public/AdminAssets/assets/images/user/avatar-3.jpg')}}"
											alt="Generic placeholder image"
									/></a>
									<div class="media-body">
										<h6 class="chat-header">
											Alice<small class="d-block text-c-green">online</small>
										</h6>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div
					class="tab-pane fade"
					id="user"
					role="tabpanel"
					aria-labelledby="user-tab"
				>
					<div class="h-list-body">
						<div class="main-friend-cont scroll-div">
							<div class="main-friend-list">
								<div class="media px-3 d-flex align-items-center mt-3">
									<a class="media-left m-r-15" href="#!">
										<div
											class="hei-50 wid-50 bg-primary img-radius d-flex text-white f-22 align-items-center justify-content-center"
										>
											<i class="icon feather icon-users"></i>
										</div>
									</a>
									<div class="media-body">
										<p class="chat-header f-w-600 mb-0">New Group</p>
									</div>
								</div>
								<div class="media p-3 d-flex align-items-center">
									<a class="media-left m-r-15" href="#!">
										<div
											class="hei-50 wid-50 bg-primary img-radius d-flex text-white f-22 align-items-center justify-content-center"
										>
											<i class="icon feather icon-user-plus"></i>
										</div>
									</a>
									<div class="media-body">
										<p class="chat-header f-w-600 mb-0">New Contact</p>
									</div>
								</div>
								<div
									class="media userlist-box"
									data-id="1"
									data-status="online"
									data-username="Josephin Doe"
								>
									<a class="media-left" href="#!"
										><img
											class="media-object img-radius"
											src="{{URL::to('/public/AdminAssets/assets/images/user/avatar-1.jpg')}}"
											alt="Generic placeholder image "
									/></a>
									<div class="media-body">
										<p class="chat-header">
											Josephin Doe<small class="d-block"
												>i am not what happened . .</small
											>
										</p>
									</div>
								</div>
								<div
									class="media userlist-box"
									data-id="2"
									data-status="online"
									data-username="Lary Doe"
								>
									<a class="media-left" href="#!"
										><img
											class="media-object img-radius"
											src="{{URL::to('/public/AdminAssets/assets/images/user/avatar-2.jpg')}}"
											alt="Generic placeholder image"
									/></a>
									<div class="media-body">
										<h6 class="chat-header">
											Lary Doe<small class="d-block">Avalable</small>
										</h6>
									</div>
								</div>
								<div
									class="media userlist-box"
									data-id="3"
									data-status="online"
									data-username="Alice"
								>
									<a class="media-left" href="#!"
										><img
											class="media-object img-radius"
											src="{{URL::to('/public/AdminAssets/assets/images/user/avatar-3.jpg')}}"
											alt="Generic placeholder image"
									/></a>
									<div class="media-body">
										<h6 class="chat-header">
											Alice<small class="d-block">hear using Elite able</small>
										</h6>
									</div>
								</div>
								<div
									class="media userlist-box"
									data-id="4"
									data-status="offline"
									data-username="Alia"
								>
									<a class="media-left" href="#!">
										<div
											class="hei-50 wid-50 img-radius bg-success d-flex text-white f-22 align-items-center justify-content-center"
										>
											A
										</div>
									</a>
									<div class="media-body">
										<h6 class="chat-header">
											Alia<small class="d-block text-muted">Avalable</small>
										</h6>
									</div>
								</div>
								<div
									class="media userlist-box"
									data-id="5"
									data-status="offline"
									data-username="Suzen"
								>
									<a class="media-left" href="#!"
										><img
											class="media-object img-radius"
											src="{{URL::to('/public/AdminAssets/assets/images/user/avatar-4.jpg')}}"
											alt="Generic placeholder image"
									/></a>
									<div class="media-body">
										<h6 class="chat-header">
											Suzen<small class="d-block text-muted">Avalable</small>
										</h6>
									</div>
								</div>
								<div
									class="media userlist-box"
									data-id="1"
									data-status="online"
									data-username="Josephin Doe"
								>
									<a class="media-left" href="#!">
										<div
											class="hei-50 wid-50 bg-danger img-radius d-flex text-white f-22 align-items-center justify-content-center"
										>
											JD
										</div>
									</a>
									<div class="media-body">
										<h6 class="chat-header">
											Josephin Doe<small class="d-block text-muted"
												>Don't send me image</small
											>
										</h6>
									</div>
								</div>
								<div
									class="media userlist-box"
									data-id="2"
									data-status="online"
									data-username="Lary Doe"
								>
									<a class="media-left" href="#!"
										><img
											class="media-object img-radius"
											src="{{URL::to('/public/AdminAssets/assets/images/user/avatar-2.jpg')}}"
											alt="Generic placeholder image"
									/></a>
									<div class="media-body">
										<h6 class="chat-header">
											Lary Doe<small class="d-block text-muted"
												>not send free msg</small
											>
										</h6>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div
					class="tab-pane fade"
					id="setting"
					role="tabpanel"
					aria-labelledby="setting-tab"
				>
					<div class="p-4 main-friend-cont scroll-div">
						<h6 class="mt-2">
							<i class="feather icon-monitor mr-2"></i>Desktop settings
						</h6>
						<hr />
						<div class="form-group mb-0">
							<div class="switch switch-primary d-inline m-r-10">
								<input type="checkbox" id="cn-p-1" checked />
								<label for="cn-p-1" class="cr"></label>
							</div>
							<label class="f-w-600">Allow desktop notification</label>
						</div>
						<p class="text-muted ml-5">
							you get lettest content at a time when data will updated
						</p>
						<div class="form-group mb-0">
							<div class="switch switch-primary d-inline m-r-10">
								<input type="checkbox" id="cn-p-5" />
								<label for="cn-p-5" class="cr"></label>
							</div>
							<label class="f-w-600">Store Cookie</label>
						</div>
						<h6 class="mb-0 mt-5">
							<i class="feather icon-layout mr-2"></i>Application settings
						</h6>
						<hr />
						<div class="form-group mb-0">
							<div class="switch switch-primary d-inline m-r-10">
								<input type="checkbox" id="cn-p-3" checked />
								<label for="cn-p-3" class="cr"></label>
							</div>
							<label class="f-w-600">Backup Storage</label>
						</div>
						<p class="text-muted mb-0 ml-5">
							Automaticaly take backup as par schedule
						</p>
						<div class="form-group mb-4">
							<div class="switch switch-primary d-inline m-r-10">
								<input type="checkbox" id="cn-p-4" checked />
								<label for="cn-p-4" class="cr"></label>
							</div>
							<label class="f-w-600">Allow guest to print file</label>
						</div>
						<h6 class="mb-0 mt-5">
							<i class="feather icon-globe mr-2"></i>System settings
						</h6>
						<hr />
						<div class="form-group mb-0">
							<div class="switch switch-primary d-inline m-r-10">
								<input type="checkbox" id="cn-p-2" />
								<label for="cn-p-2" class="cr"></label>
							</div>
							<label class="f-w-600">View other user chat</label>
						</div>
						<p class="text-muted ml-5">Allow to show public user message</p>
					</div>
				</div>
			</div>
		</section> -->
		<!-- [ chat user list ] end -->

		<!-- [ chat message ] start -->
		<section class="header-chat">
			<div class="h-list-header">
				<h6>Josephin Doe</h6>
				<a href="#!" class="h-back-user-list"
					><i class="feather icon-chevron-left"></i
				></a>
			</div>
			<div class="h-list-body">
				<div class="main-chat-cont scroll-div">
					<div class="main-friend-chat">
						<div class="media chat-messages">
							<a class="media-left photo-table" href="#!"
								><img
									class="media-object img-radius img-radius m-t-5"
									src="{{URL::to('/public/AdminAssets/assets/images/user/avatar-2.jpg')}}"
									alt="Generic placeholder image"
							/></a>
							<div class="media-body chat-menu-content">
								<div class="">
									<p class="chat-cont">hello tell me something</p>
									<p class="chat-cont">about yourself?</p>
								</div>
								<p class="chat-time">8:20 a.m.</p>
							</div>
						</div>
						<div class="media chat-messages">
							<div class="media-body chat-menu-reply">
								<div class="">
									<p class="chat-cont">Ohh! very nice</p>
								</div>
								<p class="chat-time">8:22 a.m.</p>
							</div>
							<a class="media-right photo-table" href="#!"
								><img
									class="media-object img-radius img-radius m-t-5"
									src="{{URL::to('/public/AdminAssets/assets/images/user/avatar-1.jpg')}}"
									alt="Generic placeholder image"
							/></a>
						</div>
						<div class="media chat-messages">
							<a class="media-left photo-table" href="#!"
								><img
									class="media-object img-radius img-radius m-t-5"
									src="{{URL::to('/public/AdminAssets/assets/images/user/avatar-2.jpg')}}"
									alt="Generic placeholder image"
							/></a>
							<div class="media-body chat-menu-content">
								<div class="">
									<p class="chat-cont">can you help me?</p>
								</div>
								<p class="chat-time">8:20 a.m.</p>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="h-list-footer">
				<div class="input-group">
					<input type="file" class="chat-attach" style="display: none" />
					<a href="#!" class="input-group-prepend btn btn-success btn-attach">
						<i class="feather icon-paperclip"></i>
					</a>
					<input
						type="text"
						name="h-chat-text"
						class="form-control h-auto h-send-chat"
						placeholder="Write hear . . "
					/>
					<button
						type="submit"
						class="input-group-append btn-send btn btn-primary"
					>
						<i class="feather icon-message-circle"></i>
					</button>
				</div>
			</div>
		</section>
		<!-- [ chat message ] end -->
