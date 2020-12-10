@include('admin.include.header')
		<!-- [ chat user list ] start -->
		<section class="header-user-list">
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
											src="assets/images/user/avatar-2.jpg"
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
											src="assets/images/user/avatar-3.jpg"
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
											src="assets/images/user/avatar-1.jpg"
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
											src="assets/images/user/avatar-4.jpg"
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
											src="assets/images/user/avatar-1.jpg"
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
											src="assets/images/user/avatar-2.jpg"
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
											src="assets/images/user/avatar-3.jpg"
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
											src="assets/images/user/avatar-1.jpg"
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
											src="assets/images/user/avatar-4.jpg"
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
											src="assets/images/user/avatar-1.jpg"
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
											src="assets/images/user/avatar-2.jpg"
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
											src="assets/images/user/avatar-3.jpg"
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
											src="assets/images/user/avatar-1.jpg"
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
											src="assets/images/user/avatar-2.jpg"
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
											src="assets/images/user/avatar-3.jpg"
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
											src="assets/images/user/avatar-4.jpg"
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
											src="assets/images/user/avatar-2.jpg"
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
		</section>
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
									src="assets/images/user/avatar-2.jpg"
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
									src="assets/images/user/avatar-1.jpg"
									alt="Generic placeholder image"
							/></a>
						</div>
						<div class="media chat-messages">
							<a class="media-left photo-table" href="#!"
								><img
									class="media-object img-radius img-radius m-t-5"
									src="assets/images/user/avatar-2.jpg"
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

		<!-- [ Main Content ] start -->
		<section class="pcoded-main-container">
			<div class="pcoded-content">
				<!-- [ breadcrumb ] start -->
				<div class="page-header">
					<div class="page-block">
						<div class="row align-items-center">
							<div class="col-md-12">
								<div class="page-header-title">
									<h5 class="m-b-10">Add Broker</h5>
								</div>
								<ul class="breadcrumb">
									<li class="breadcrumb-item">
										<a href="index.html"><i class="feather icon-home"></i></a>
									</li>
									<li class="breadcrumb-item"><a href="all-broker.html">All Broker</a></li>
									<li class="breadcrumb-item">
										<a href="#!">Broker Details</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<!-- [ breadcrumb ] end -->
				<!-- [ Main Content ] start -->
                <div class="row">
					<div class="col-sm-12">
						<div class="card tabs-card">
							<div class="card-body">
								<!-- Nav tabs -->
											@isset($error)
												<div class="alert alert-danger">
													{{$error}}
												</div>
											@endisset
								<ul class="nav nav-pills nav-fill mb-3" role="tablist">
									<li class="nav-item">
										<a class="nav-link active" data-toggle="tab" href="#COMPANYINFORMATION
										" role="tab">COMPANY INFORMATION
										</a>
										<div class="slide bg-c-blue"></div>
									</li>
									<li class="nav-item">
										<a class="nav-link" data-toggle="tab" href="#DEPOSIT" role="tab">DEPOSIT & WITHDRAWAL
										</a>
										<div class="slide bg-c-green"></div>
									</li>
									<li class="nav-item">
										<a class="nav-link" data-toggle="tab" href="#COMMISSIONS" role="tab">COMMISSIONS & FEES
										</a>
										<div class="slide bg-c-red"></div>
									</li>
									<li class="nav-item">
										<a class="nav-link" data-toggle="tab" href="#ACCOUNT" role="tab">ACCOUNT INFORMATION
										</a>
										<div class="slide bg-c-yellow"></div>
									</li>
									<li class="nav-item">
										<a class="nav-link" data-toggle="tab" href="#TRADABLE" role="tab">TRADABLE ASSETS</a>
										<div class="slide bg-c-yellow"></div>
									</li>
									
								</ul>
								<!-- Tab panes -->
								<div class="tab-content">
									<div class="tab-pane active" id="COMPANYINFORMATION
									" role="tabpanel">
									<div class="">
										<div class="card-header text-danger f-26">
											COMPANY INFORMATION 
										</div>
										<div class="card-body">
											<form action="{{URL::to('admin/broker/editBroker')}}" method="post" enctype="multipart/form-data">
												<div class="row">
													<div class="col-sm-6">
														<div class="form-group">
															<label for="">Company Name</label>
															<input type="text" name="title" value="{{$broker1->title}}" class="form-control" required>
														</div>
													</div>
													<div class="col-sm-6">
														<div class="form-group">
														<label for="">Company Logo</label>
															<div class="custom-file">
																<input
																	type="file"
																	class="custom-file-input"
																	id="customFile"
																	name="file_photo"
																	onchange="sliderimgone(this);"
																	required
																/>
																<label class="custom-file-label" for="customFile"
																	>Choose file</label
																>
															</div>
														</div>
													</div>
													<div class="col-sm-6">
														<div class="form-group">
															<label for="">REGULATIONS</label>
															<input type="text" name="regulations" value="{{$broker1->regulations}}" class="form-control" required>
														</div>
													</div>
													<div class="col-sm-6">
														<div class="form-group">
															<label for="">HEADQUARTERS COUNTRY</label>
															<input type="text" name="headquaters" value="{{$broker1->headquaters}}" class="form-control" required>
														</div>
													</div>
													<div class="col-sm-6">
														<div class="form-group">
															<label for="">FOUNDATION YEAR</label>
															<input type="text" name="foundation" value="{{$broker1->foundation}}" class="form-control" required>
														</div>
													</div>
													<div class="col-sm-6">
														<div class="form-group">
															<label for="">PUBLICLY TRADED</label>
															<input type="text" name="traded" value="{{$broker1->traded}}" class="form-control" required>
														</div>
													</div>
													<div class="col-sm-6">
														<div class="form-group">
															<label for="">NUMBER OF EMPLOYEES</label>
															<input type="text" name="employees" value="{{$broker1->employees}}" class="form-control" required>
														</div>
													</div>
													<div class="col-sm-6">
														<div class="form-group">
															<label for="">Start Date</label>
															<input type="date" name="start" value="{{$broker1->start}}" class="form-control" required>
														</div>
													</div>
													<div class="col-sm-6">
														<div class="form-group">
															<label for="">End Date</label>
															<input type="date" name="end" value="{{$broker1->end}}" class="form-control" required>
														</div>
													</div>
												</div>
												<div>
													<input type="submit" id="doaction" class="btn btn-outline-primary" value="Save">
												</div>
											</form>
										</div>
									</div>
									</div>
									<div class="tab-pane" id="DEPOSIT" role="tabpanel">
										<div class="">
											<div class="card-header text-danger f-26">
												DEPOSIT & WITHDRAWAL
											</div>
											<div class="card-body">
												<form action="{{URL::to('admin/broker/addDeposit')}}" method="post">
													<div class="form-group">
														<label for="">DEPOSIT OPTIONS</label>
														<input type="text" name="deposit" value="{{$broker2->deposit}}" class="form-control" required>
													</div>
													<div class="form-group">
														<label for="">WITHDRAWAL OPTIONS</label>
														<input type="text" name="withdrawal" value="{{$broker2->withdrawal}}" class="form-control">
													</div>
													@isset($id)
														<input type="hidden" name="brokerId" value="{{$id}}">
													@endisset
													<div>
														<input type="submit" id="doaction" class="btn btn-outline-primary" value="Save">
													</div>
												</form>
											</div>
										</div>
									</div>
									<div class="tab-pane" id="COMMISSIONS" role="tabpanel">
										<div class="">
											<div class="card-header text-danger f-26">
												COMMISSIONS & FEES
											</div>
											<div class="card-body">
												<form action="{{URL::to('admin/broker/addCommission')}}" method="post">
													<div class="form-group">
														<label for="">COMMISSION ON TRADES</label>
														<input type="text" name="commission" value="{{$broker3->commission}}" class="form-control">
													</div>
													<div class="form-group">
														<label for="">FIXED SPREADS</label>
														<input type="text" name="spread" value="{{$broker3->spread}}" class="form-control">
														<div>
															
														</div>
													</div>
													@isset($id)
														<input type="hidden" name="brokerId" value="{{$id}}">
													@endisset

													<div>
														<input type="submit" id="doaction" class="btn btn-outline-primary" value="Save">
													</div>
												</form>
											</div>
										</div>
									</div>
									<div class="tab-pane" id="ACCOUNT" role="tabpanel">
										<div class="">
											<div class="card-header text-danger f-26">
												ACCOUNT INFORMATION
											</div>
											<div class="card-body">
												<form action="{{URL::to('admin/broker/addAccountInfo')}}" method="post">
													<div class="row">
														<div class="col-sm-6">
															<div class="form-group">
																<label for="">TRADING DESK TYPE</label>
																<input type="text" name="trade" value="{{$broker4->trade}}" class="form-control" required>
															</div>
														</div>
														<div class="col-sm-6">
															<div class="form-group">
																<label for="">MIN DEPOSIT</label>
																<input type="text" name="min" value="{{$broker4->min}}" class="form-control" required>
																<div>
																	
																</div>
															</div>
														</div>
														<div class="col-sm-6">
															<div class="form-group">
																<label for="">MAX LEVERAGE</label>
																<input type="text" name="max" value="{{$broker4->max}}" class="form-control" required>
																<div>
																	
																</div>
															</div>
														</div>
														<div class="col-sm-6">
															<div class="form-group">
																<label for="">MINI ACCOUNT</label>
																<input type="text" name="mini" value="{{$broker4->mini}}" class="form-control" required>
																<div>
																	
																</div>
															</div>
														</div>
														<div class="col-sm-6">
															<div class="form-group">
																<label for="">PREMIUM ACCOUNT</label>
																<input type="text" name="premium" value="{{$broker4->premium}}" class="form-control" required>
																<div>
																	
																</div>
															</div>
														</div>
														<div class="col-sm-6">
															<div class="form-group">
																<label for="">DEMO ACCOUNT</label>
																<input type="text" name="demo" value="{{$broker4->demo}}" class="form-control" required>
																<div>
																	
																</div>
															</div>
														</div>
														<div class="col-sm-6">
															
													<div class="form-group">
														<label for="">ISLAMIC ACCOUNT</label>
														<input type="text" name="islamic" value="{{$broker4->islamic}}" class="form-control" required>
														<div>
															
														</div>
													</div>
														</div>
														<div class="col-sm-6">
															<div class="form-group">
																<label for="">SEGREGATED ACCOUNT</label>
																<input type="text" name="segregated" value="{{$broker4->segregated}}" class="form-control" required>
																<div>
																	
																</div>
															</div>
														</div>
														<div class="col-sm-6">
															<div class="form-group">
																<label for="">MANAGED ACCOUNT</label>
																<input type="text" name="managed" value="{{$broker4->managed}}" class="form-control" required>
																<div>
																	
																</div>
															</div>
														</div>
														<div class="col-sm-6">
															<div class="form-group">
																<label for="">SUITABLE FOR BEGINNERS</label>
																<input type="text" name="beginner" value="{{$broker4->beginner}}" class="form-control" required>
																<div>
																	
																</div>
															</div>
														</div>
														<div class="col-sm-6">
															<div class="form-group">
																<label for="">SUITABLE FOR PROFESSIONALS</label>
																<input type="text" name="professional" value="{{$broker4->professional}}" class="form-control" required>
																<div>
																	
																</div>
															</div>
														</div>
														<div class="col-sm-6">
															<div class="form-group">
																<label for="">SUITABLE FOR SCALPING</label>
																<input type="text" name="scalping" value="{{$broker4->scalping}}" class="form-control" required>
																<div>
																	
																</div>
															</div>
														</div>
														<div class="col-sm-6">
															<div class="form-group">
																<label for="">SUITABLE FOR DAILY TRADING</label>
																<input type="text" name="daily" value="{{$broker4->daily}}" class="form-control" required>
																<div>
																	
																</div>
															</div>
														</div>
														<div class="col-sm-6">
															<div class="form-group">
																<label for="">SUITABLE FOR WEEKLY TRADING</label>
																<input type="text" name="weekly" value="{{$broker4->weekly}}" class="form-control" required>
																<div>
																	
																</div>
															</div>
														</div>
														<div class="col-sm-6">
															<div class="form-group">
																<label for="">SUITABLE FOR SWING TRADING</label>
																<input type="text" name="swing" value="{{$broker4->swing}}" class="form-control" required>
																<div>
																	
																</div>
															</div>
														</div>
													</div>
													@isset($id)
														<input type="hidden" name="brokerId" value="{{$id}}">
													@endisset
													<div>
														<input type="submit" id="doaction" class="btn btn-outline-primary" value="Save">
													</div>
												</form>
											</div>
										</div>
									</div>
									<div class="tab-pane" id="TRADABLE" role="tabpanel">
										<div class="">
											<div class="card-header text-danger f-26">
												TRADABLE ASSETS
											</div>
											<div class="card-body">
												<form action="{{URL::to('admin/broker/addTradableAssets')}}" method="post">
													<div class="row">
														<div class="col-sm-6">
															<div class="form-group">
																<label for="">TRADES CURRENCIES</label>
																<input type="text" name="currency" value="{{$broker5->currency}}" class="form-control" required required>
															</div>
														</div>
														<div class="col-sm-6">
															<div class="form-group">
																<label for="">TRADES COMMODITIES</label>
																<input type="text" name="tradeCommodities" value="{{$broker5->tradeCommodities}}" class="form-control" required required>
																<div>
																	
																</div>
															</div>
														</div>
														<div class="col-sm-6">
															<div class="form-group">
																<label for="">TRADES INDICES</label>
																<input type="text" name="tradeIndices" value="{{$broker5->tradeIndices}}" class="form-control" required>
																<div>
																	
																</div>
															</div>
														</div>
														<div class="col-sm-6">
															<div class="form-group">
																<label for="">TRADES STOCKS</label>
																<input type="text" name="tradeStocks" value="{{$broker5->tradeStocks}}" class="form-control" required>
																<div>
																	
																</div>
															</div>
														</div>
														<div class="col-sm-6">
															<div class="form-group">
																<label for="">TRADES CRYPTOCURRENCY</label>
																<input type="text" name="cryptocurrency" value="{{$broker5->cryptocurrency}}" class="form-control" required>
																<div>
																	
																</div>
															</div>
														</div>
														<div class="col-sm-6">
															<div class="form-group">
																<label for="">TRADES ETF'S</label>
																<input type="text" name="etfs" value="{{$broker5->etfs}}" class="form-control" required>
																<div>
																	
																</div>
															</div>
														</div>
														<div class="col-sm-6">
															<div class="form-group">
																<label for="">TRADES BONDS</label>
																<input type="text" name="tradeBonds" value="{{$broker5->tradeBonds}}" class="form-control" required>
																<div>
																	
																</div>
															</div>
														</div>
														<div class="col-sm-6">
															<div class="form-group">
																<label for="">TRADES FUTURES</label>
																<input type="text" name="tradeFuture" value="{{$broker5->tradeFuture}}" class="form-control" required>
																<div>
																	
																</div>
															</div>
														</div>
														<div class="col-sm-6">
															<div class="form-group">
																<label for="">TRADES OPTIONS</label>
																<input type="text" name="options" value="{{$broker5->options}}" class="form-control" required>
																<div>
																	
																</div>
															</div>
														</div>
														<div class="col-sm-6">
															
													<div class="form-group">
														<label for="">SUPPORTED CRYPTOCOINS</label>
														<input type="text" name="cryptocoins" value="{{$broker5->cryptocoins}}" class="form-control" required>
														<div>
															
														</div>
													</div>
														</div>
														<div class="col-sm-6">
															<div class="form-group">
																<label for="">NUMBER OF TRADABLE ASSETS</label>
																<input type="text" name="tradableassets" value="{{$broker5->tradableassets}}" class="form-control" required>
																<div>
																	
																</div>
															</div>
														</div>
														<div class="col-sm-6">
															<div class="form-group">
																<label for="">NUMBER OF CURRENCY PAIRS</label>
																<input type="text" name="currencypairs" value="{{$broker5->currencypairs}}" class="form-control" required>
																<div>
																	
																</div>
															</div>
														</div>
														<div class="col-sm-6">
															<div class="form-group">
																<label for="">NUMBER OF CRYPTOCURRENCIES</label>
																<input type="text" name="cryptocurrencies" value="{{$broker5->cryptocurrencies}}" class="form-control" required>
																<div>
																	
																</div>
															</div>
														</div>
														<div class="col-sm-6">
															<div class="form-group">
																<label for="">NUMBER OF STOCKS</label>
																<input type="text" name="NoOfStocks" value="{{$broker5->NoOfStocks}}" class="form-control" required>
																<div>
																	
																</div>
															</div>
														</div>
														<div class="col-sm-6">
															<div class="form-group">
																<label for="">NUMBER OF INDICES</label>
																<input type="text" name="noOfIndices" value="{{$broker5->noOfIndices}}" class="form-control" required>
																<div>
																	
																</div>
															</div>
														</div>
														<div class="col-sm-6">
															<div class="form-group">
																<label for="">NUMBER OF COMMODITIES</label>
																<input type="text" name="noOfCommodities" value="{{$broker5->noOfCommodities}}" class="form-control" required>
																<div>
																	
																</div>
															</div>
														</div>
														<div class="col-sm-6">
															<div class="form-group">
																<label for="">NUMBER OF FUTURES</label>
																<input type="text" name="noOfFutures" value="{{$broker5->noOfFutures}}" class="form-control" required>
																<div>
																	
																</div>
															</div>
														</div>
														<div class="col-sm-6">
															<div class="form-group">
																<label for="">NUMBER OF OPTIONS</label>
																<input type="text" name="noOfOptions" value="{{$broker5->noOfOptions}}" class="form-control" required>
																<div>
																	
																</div>
															</div>
														</div>
														<div class="col-sm-6">
															<div class="form-group">
																<label for="">NUMBER OF BONDS</label>
																<input type="text" name="noOfBonds" value="{{$broker5->noOfBonds}}" class="form-control" required>
																<div>
																	
																</div>
															</div>
														</div>
													</div>
													@isset($id)
														<input type="hidden" name="brokerId" value="{{$id}}">
													@endisset
													<div>
														<input type="submit" id="doaction" class="btn btn-outline-primary" value="Save">
													</div>
												</form>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>

					<div class="col-sm-12">
						<div class="card tabs-card">
							<div class="card-body">
								<!-- Nav tabs -->
								<ul class="nav nav-pills nav-fill mb-3" role="tablist">
									<li class="nav-item">
										<a class="nav-link active" data-toggle="tab" href="#TRADINGPLATFORMS" role="tab">TRADING PLATFORMS

										</a>
										<div class="slide bg-c-blue"></div>
									</li>
									<li class="nav-item">
										<a class="nav-link" data-toggle="tab" href="#TRADINGFEATURES
										" role="tab">TRADING FEATURES
										</a>
										<div class="slide bg-c-green"></div>
									</li>
									<li class="nav-item">
										<a class="nav-link" data-toggle="tab" href="#CUSTOMER" role="tab">CUSTOMER SERVICE
										</a>
										<div class="slide bg-c-red"></div>
									</li>
									<li class="nav-item">
										<a class="nav-link" data-toggle="tab" href="#RESEARCH" role="tab">RESEARCH & EDUCATION
										</a>
										<div class="slide bg-c-yellow"></div>
									</li>
									<li class="nav-item">
										<a class="nav-link" data-toggle="tab" href="#PROMOTIONS" role="tab">PROMOTIONS</a>
										<div class="slide bg-c-yellow"></div>
									</li>
									
								</ul>
								<!-- Tab panes -->
								<div class="tab-content">
									<div class="tab-pane active" id="TRADINGPLATFORMS
									" role="tabpanel">
									<div class="">
										<div class="card-header text-danger f-26">
											TRADING PLATFORMS
										</div>
										<div class="card-body">
											<form action="{{URL::to('admin/broker/addPlatform')}}" method="post" >
												<div class="form-group">
													<label for="">TRADING PLATFORMS</label>
													<input type="text" name="platform" value="{{$broker6->platform}}" class="form-control" required>
												</div>
												<div class="form-group">
													<label for="">OS COMPATIBILITY</label>
													<input type="text" name="os" value="{{$broker6->os}}" class="form-control" required>
												</div>
												<div class="form-group">
													<label for="">MOBILE TRADING</label>
													<input type="text" name="mobile" value="{{$broker6->mobile}}" class="form-control" required>
												</div>
												<div class="form-group">
													<label for="">TRADING PLATFORM SUPPORTED LANGUAGES</label>
													<textarea name="language" id="language" class="form-control" cols="30" rows="10" required>{{$broker6->language}}</textarea>
												</div>
												@isset($id)
													<input type="hidden" name="brokerId" value="{{$id}}">
												@endisset
												<div>
													<input type="submit" id="doaction" class="btn btn-outline-primary" value="Save">
												</div>
											</form>
										</div>
									</div>
									</div>
									<div class="tab-pane" id="TRADINGFEATURES" role="tabpanel">
										<div class="">
											<div class="card-header text-danger f-26">
												TRADING FEATURES
											</div>
											<div class="card-body">
												<form action="{{URL::to('admin/broker/addFeature')}}" method="post" >
													<div class="row">
														<div class="col-sm-6">
															<div class="form-group">
																<label for="">EDUCATIONAL SERVICES</label>
																<input type="text" name="educationServices" value="{{$broker7->educationServices}}" class="form-control" required>
															</div>
														</div>
														<div class="col-sm-6">
															<div class="form-group">
																<label for="">SOCIAL TRADING / COPY TRADING</label>
																<input type="text" name="social" value="{{$broker7->social}}" class="form-control" required>
																<div>
																	
																</div>
															</div>
														</div>
														<div class="col-sm-6">
															<div class="form-group">
																<label for="">TRADING SIGNALS</label>
																<input type="text" name="signals" value="{{$broker7->signals}}" class="form-control" required>
																<div>
																	
																</div>
															</div>
														</div>
														<div class="col-sm-6">
															<div class="form-group">
																<label for="">EMAIL ALERTS</label>
																<input type="text" name="email" value="{{$broker7->email}}" class="form-control" required>
																<div>
																	
																</div>
															</div>
														</div>
														<div class="col-sm-6">
															<div class="form-group">
																<label for="">GUARANTEED STOP LOSS</label>
																<input type="text" name="stop" value="{{$broker7->stop}}" class="form-control" required>
																<div>
																	
																</div>
															</div>
														</div>
														<div class="col-sm-6">
															<div class="form-group">
																<label for="">GUARANTEED LIMIT ORDERS</label>
																<input type="text" name="limited" value="{{$broker7->limited}}" class="form-control" required>
																<div>
																	
																</div>
															</div>
														</div>
														<div class="col-sm-6">
															<div class="form-group">
																<label for="">GUARANTEED FILLS / LIQUIDITY</label>
																<input type="text" name="guaranteed" value="{{$broker7->guaranteed}}" class="form-control" required>
																<div>
																	
																</div>
															</div>
														</div>
														<div class="col-sm-6">
															<div class="form-group">
																<label for="">OCO ORDERS</label>
																<input type="text" name="oco" value="{{$broker7->oco}}" class="form-control" required>
																<div>
																	
																</div>
															</div>
														</div>
														<div class="col-sm-6">
															<div class="form-group">
																<label for="">TRAILING SP/TP</label>
																<input type="text" name="trailings" value="{{$broker7->trailings}}" class="form-control" required>
																<div>
																	
																</div>
															</div>
														</div>
														<div class="col-sm-6">
															<div class="form-group">
																<label for="">AUTOMATED TRADING</label>
																<input type="text" name="automated" value="{{$broker7->automated}}" class="form-control" required>
															</div>
														</div>
														<div class="col-sm-6">
															<div class="form-group">
																<label for="">API TRADING</label>
																<input type="text" name="api" value="{{$broker7->api}}" class="form-control" required>
																<div>
																	
																</div>
															</div>
														</div>
														<div class="col-sm-6">
															<div class="form-group">
																<label for="">VPS SERVICES</label>
																<input type="text" name="vps" value="{{$broker7->vps}}" class="form-control" required>
																<div>
																	
																</div>
															</div>
														</div>
														<div class="col-sm-6">
															<div class="form-group">
																<label for="">TRADING FROM CHART</label>
																<input type="text" name="chart" value="{{$broker7->chart}}" class="form-control" required>
																<div>
																	
																</div>
															</div>
														</div>
														<div class="col-sm-6">
															<div class="form-group">
																<label for="">INTEREST ON MARGIN</label>
																<input type="text" name="margin" value="{{$broker7->margin}}" class="form-control" required>
																<div>
																	
																</div>
															</div>
														</div>
														<div class="col-sm-6">
															<div class="form-group">
																<label for="">OFFERS HEDGING</label>
																<input type="text" name="hedging" value="{{$broker7->hedging}}" class="form-control" required>
																<div>
																	
																</div>
															</div>
														</div>
														<div class="col-sm-6">
															<div class="form-group">
																<label for="">OFFERS PROMOTIONS</label>
																<input type="text" name="promotions" value="{{$broker7->promotions}}" class="form-control" required>
																<div>
																	
																</div>
															</div>
														</div>
														<div class="col-sm-6">
															<div class="form-group">
																<label for="">ONE-CLICK TRADING</label>
																<input type="text" name="oneClick" value="{{$broker7->oneClick}}" class="form-control" required>
																<div>
																	
																</div>
															</div>
														</div>
														<div class="col-sm-6">
															<div class="form-group">
																<label for="">EXPERT ADVISORS (EA)</label>
																<input type="text" name="advisors" value="{{$broker7->advisors}}" class="form-control" required>
																<div>
																	
																</div>
															</div>
														</div>
														<div class="col-sm-6">
															<div class="form-group">
																<label for="">OTHER TRADING FEATURES</label>
																<input type="text" name="features" value="{{$broker7->features}}" class="form-control" required>
																<div>
																	
																</div>
															</div>
														</div>
													</div>
													@isset($id)
														<input type="hidden" name="brokerId" value="{{$id}}">
													@endisset
													<div>
														<input type="submit" id="doaction" class="btn btn-outline-primary" value="Save">
													</div>
												</form>
											</div>
										</div>
									</div>
									<div class="tab-pane" id="CUSTOMER" role="tabpanel">
										<div class="">
											<div class="card-header text-danger f-26">
												CUSTOMER SERVICE
											</div>
											<div class="card-body">
												<form action="{{URL::to('admin/broker/addCustomerServices')}}" method="post" >
													<div class="form-group">
														<label for="">CUSTOMER SUPPORT LANGUAGES</label>
														<textarea name="languages" class="form-control" id="" cols="30" rows="10" required>{{$broker8->languages}} </textarea>
													</div>
													<div class="form-group">
														<label for="">24H SUPPORT</label>
														<input type="text" name="supports" value="{{$broker8->supports}}" class="form-control" required>
													</div>
													<div class="form-group">
														<label for="">SUPPORT DURING WEEKENDS</label>
														<input type="text" name="weekend" value="{{$broker8->weekend}}" class="form-control" required>
													</div>
													<div class="form-group">
														<label for="">LIVE CHAT</label>
														<input type="text" name="chat" value="{{$broker8->chat}}" class="form-control" id="" required>
													</div>
													@isset($id)
														<input type="hidden" name="brokerId" value="{{$id}}">
													@endisset
													<div>
														<input type="submit" id="doaction" class="btn btn-outline-primary" value="Save">
													</div>
												</form>
											</div>
										</div>
									</div>
									<div class="tab-pane" id="RESEARCH" role="tabpanel">
										<div class="">
											<div class="card-header text-danger f-26">
												RESEARCH & EDUCATION
											</div>
											<div class="card-body">
												<form action="{{URL::to('admin/broker/addResearchEducation')}}" method="post" >
													<div class="row">
														<div class="col-sm-6">
															<div class="form-group">
																<label for="">DAILY MARKET COMMENTARY</label>
																<input type="text" name="commentary" value="{{$broker9->commentary}}" class="form-control" required>
															</div>
														</div>
														<div class="col-sm-6">
															<div class="form-group">
																<label for="">NEWS (TOP-TIER SOURCES)</label>
																<input type="text" name="news" value="{{$broker9->news}}" class="form-control" required>
															</div>
														</div>
														<div class="col-sm-6">
															<div class="form-group">
																<label for="">AUTOCHARTIST</label>
																<input type="text" name="autochartist" value="{{$broker9->autochartist}}" class="form-control" required>
															</div>
														</div>
														<div class="col-sm-6">
															<div class="form-group">
																<label for="">TRADING CENTRAL (RECOGNIA)</label>
																<input type="text" name="tradingCentral" value="{{$broker9->tradingCentral}}" class="form-control" required>
															</div>
														</div>
														<div class="col-sm-6">
															<div class="form-group">
																<label for="">DELKOS RESEARCH</label>
																<input type="text" name="delkos" value="{{$broker9->delkos}}" class="form-control" required>
															</div>
														</div>
														<div class="col-sm-6">
															<div class="form-group">
																<label for="">ACUITY TRADING</label>
																<input type="text" name="acuity" value="{{$broker9->acuity}}" class="form-control" required>
															</div>
														</div>
														<div class="col-sm-6">
															<div class="form-group">
																<label for="">WEBINARS</label>
																<input type="text" name="webinars" value="{{$broker9->webinars}}" class="form-control" required>
															</div>
														</div>
														<div class="col-sm-6">
															<div class="form-group">
																<label for="">VIDEO EDUCATION</label>
																<input type="text" name="education" value="{{$broker9->education}}" class="form-control" required>
															</div>
														</div>
														<div class="col-sm-6">
															<div class="form-group">
																<label for="">ECONOMIC CALENDAR</label>
																<input type="text" name="calendar" value="{{$broker9->calendar}}" class="form-control" required>
															</div>
														</div>
													</div>
													@isset($id)
														<input type="hidden" name="brokerId" value="{{$id}}">
													@endisset
													<div>
														<input type="submit" id="doaction" class="btn btn-outline-primary" value="Save">
													</div>
												</form>
											</div>
										</div>
									</div>
									<div class="tab-pane" id="PROMOTIONS" role="tabpanel">
										<div class="">
											<div class="card-header text-danger f-26">
												PROMOTIONS
											</div>
											<div class="card-body">
												<form action="{{URL::to('admin/broker/addPromotion')}}" method="post" >
													<div class="form-group">
														<label for="">PROMOTIONS</label>
														<input type="text" name="promotions" value="{{$broker->promotions}}" class="form-control" required>
													</div>
													<div class="form-group">
														<label for="">READ REVIEW</label>
														<input type="text" name="review" value="{{$broker->review}}" class="form-control" required required>
													</div>
													<div class="form-group">
														<label for="">Link</label>
														<input type="text" name="link" value="{{$broker->link}}" class="form-control" required required>
													</div>
													
													@isset($id)
														<input type="hidden" name="brokerId" value="{{$id}}">
													@endisset
													<div>
														<input type="submit" id="doaction" class="btn btn-outline-primary" value="Save">
													</div>
												</form>
											</div>
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


