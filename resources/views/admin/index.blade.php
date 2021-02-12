@include('admin.include.header')
		<!-- [ Main Content ] start -->
		<div class="pcoded-main-container">
			<div class="pcoded-content">
				
				<!-- [ Main Content ] start -->
				<div class="row">
					<!-- order-card start -->
					<div class="col-md-6 col-xl-3">
						<div class="card bg-c-blue order-card">
							<div class="card-body">
								<a href="{{URL::to('ustaad/member/clientList')}}">
									<h6 class="text-white">Total Clients</h6>
									<h2 class="text-right text-white">
										<i class="fa fa-users float-left"></i
										><span>{{$TotalClientNumber}}</span>
									</h2>
									<p class="m-b-0 text-light">
										This Month<span class="float-right">{{$MonthlyClientNumber}}</span>
									</p>
								</a>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-xl-3">
						<div class="card bg-c-green order-card">
							<div class="card-body">
								<a href="{{URL::to('ustaad/member/userList')}}">
									<h6 class="text-white">Total Admin Members</h6>
									<h2 class="text-right text-white">
										<i class="fa fa-tag float-left"></i><span>{{$TotalAdminUsersNumber}}</span>
									</h2>
									<p class="m-b-0 text-light">
										This Month<span class="float-right">{{$MonthlyAdminUsersNumber}}</span>
									</p>
								</a>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-xl-3">
						<div class="card bg-c-yellow order-card">
							<div class="card-body">
								<a href="{{URL::to('ustaad/post/viewAll')}}">
									<h6 class="text-white">Total Posts</h6>
									<h2 class="text-right text-white">
										<i class="fa fa-portrait float-left"></i
										><span>{{$TotalPostNumber}}</span>
									</h2>
									<p class="m-b-0 text-light">
										Active<span class="float-right">{{$MonthlyPostNumber}}</span>
									</p>
								</a>
							</div>
						</div>
					</div>
					@php
						$value =Session::get('admin');
					@endphp
					<div class="col-md-6 col-xl-3">
						<div class="card bg-c-red order-card">
							<div class="card-body">
								<a href="{{URL::to('/ustaad/allbrokers')}}/{{$value['memberId']}}">
									<h6 class="text-white">Total Brokers</h6>
									<h2 class="text-right text-white">
										<i class="fa fa-award float-left"></i
										><span>{{$TotalBrokerNumber}}</span>
									</h2>
									<p class="m-b-0 text-light">
										Active<span class="float-right">{{$MonthlyBrokerNumber}}</span>
									</p>
								</a>
							</div>
						</div>
					</div>
					<!-- order-card end -->
					<!-- users visite start -->
					<div class="col-md-12 col-xl-6">
						<div class="card">
							<div class="card-header">
								<h5>Unique Visitor</h5>
							</div>
							<div class="card-body pl-0 pb-0">
								<div id="unique-visitor-chart"></div>
							</div>
						</div>
					</div>
					<div class="col-md-12 col-xl-6">
						<div class="row">
							<div class="col-sm-6">
								<div class="card">
									<div class="card-body bg-patern">
										<div class="row">
											<div class="col-auto">
												<span>Customers</span>
											</div>
											<div class="col text-right">
												<h2 class="mb-0">826</h2>
												<span class="text-c-green"
													>8.2%<i class="feather icon-trending-up ml-1"></i
												></span>
											</div>
										</div>
										<div id="customer-chart"></div>
										<div class="row mt-3">
											<div class="col">
												<h3 class="m-0">
													<i class="fas fa-circle f-10 m-r-5 text-success"></i
													>674
												</h3>
												<span class="ml-3">New</span>
											</div>
											<div class="col">
												<h3 class="m-0">
													<i class="fas fa-circle text-primary f-10 m-r-5"></i
													>182
												</h3>
												<span class="ml-3">Return</span>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-sm-6">
								<div class="card bg-primary text-white">
									<div class="card-body bg-patern-white">
										<div class="row">
											<div class="col-auto">
												<span>Customers</span>
											</div>
											<div class="col text-right">
												<h2 class="mb-0 text-white">826</h2>
												<span class="text-white"
													>8.2%<i class="feather icon-trending-up ml-1"></i
												></span>
											</div>
										</div>
										<div id="customer-chart1"></div>
										<div class="row mt-3">
											<div class="col">
												<h3 class="m-0 text-white">
													<i class="fas fa-circle f-10 m-r-5 text-success"></i
													>674
												</h3>
												<span class="ml-3">New</span>
											</div>
											<div class="col">
												<h3 class="m-0 text-white">
													<i class="fas fa-circle f-10 m-r-5 text-white"></i>182
												</h3>
												<span class="ml-3">Return</span>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- users visite end -->

					<!-- social statustic start -->
					<div class="col-md-6 col-lg-4">
						<div class="card seo-card overflow-hidden">
							<div class="card-body seo-statustic">
								<i class="feather icon-save f-20 text-c-red"></i>
								<h5 class="mb-1">65%</h5>
								<p>Memory</p>
							</div>
							<div class="seo-chart">
								<div id="seo-card1"></div>
							</div>
						</div>
					</div>
					<div class="col-md-12 col-lg-4">
						<div class="card">
							<div class="card-body text-center">
								<i class="fa fa-envelope-open text-c-blue d-block f-40"></i>
								<h4 class="m-t-20">
									<span class="text-c-blue">8.62k</span> Subscribers
								</h4>
								<p class="m-b-20">Your main list is growing</p>
								<button class="btn btn-primary btn-sm btn-round">
									Manage List
								</button>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-lg-4">
						<div class="card">
							<div class="card-body text-center">
								<i class="fab fa-twitter text-c-green d-block f-40"></i>
								<h4 class="m-t-20">
									<span class="text-c-blgreenue">+40</span> Followers
								</h4>
								<p class="m-b-20">Your main list is growing</p>
								<button class="btn btn-success btn-sm btn-round">
									Check them out
								</button>
							</div>
						</div>
					</div>
					<!-- social statustic end -->
				</div>
				<!-- [ Main Content ] end -->
			</div>
		</div>
		<!-- [ Main Content ] end -->
@include('admin.include.footer')
