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
									<h6 class="text-white" style="font-size: 15px">Total Clients</h6>
									<h2 class="text-right text-white m-0" style="font-size: 20px">
										<i class="fa fa-users float-left" style="font-size: 20px"></i
										><span>{{$TotalClientNumber}}</span>
									</h2>
									<p class="m-b-0 text-light" style="border-bottom:1px solid #f8f9fa;font-size: 12px">
										This Day<span class="float-right">{{$ToDayClientNumber}}</span>
									</p>
									<p class="m-b-0 text-light" style="border-bottom:1px solid #f8f9fa;font-size: 12px">
										This Week<span class="float-right">{{$WeeklyClientNumber}}</span>
									</p>
									<p class="m-b-0 text-light" style="font-size: 12px">
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
				<!-- active-user start -->
					<div class="col-sm-4">
						<div class="card bg-patern" style="height:430px;">
							<div class="card-header d-flex justify-content-between">
								<h4>Active User</h2> <strong class="activeUserAll"></strong>
							</div>
							<div class="card-body">
								<div class="chartjs-size-monitor" style="position: absolute; left: 0px; top: 0px; right: 0px; bottom: 0px; overflow: hidden; pointer-events: none; visibility: hidden; z-index: -1;">
									<div class="chartjs-size-monitor-expand" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
										<div style="position:absolute;width:1000000px;height:1000000px;left:0;top:0"></div>
									</div>
									<div class="chartjs-size-monitor-shrink" style="position:absolute;left:0;top:0;right:0;bottom:0;overflow:hidden;pointer-events:none;visibility:hidden;z-index:-1;">
										<div style="position:absolute;width:200%;height:200%;left:0; top:0"></div>
									</div>
								</div> <canvas id="chart-line" width="500" height="400" class="chartjs-render-monitor" style="display: block; width: 299px; height: 200px;"></canvas>
								<div class="row mt-3">
									<div class="col">
										<h3 class="m-0">
											<i class="fas fa-circle f-10 m-r-5 text-success"></i
											><span class="activeMobileUser"></span>
										</h3>
										<span>Mobile</span>
									</div>
									<div class="col">
										<h3 class="m-0">
											<i class="fas fa-circle text-primary f-10 m-r-5"></i
											><span class="activeDesktopUser"></span>
										</h3>
										<span>Desktop</span>
									</div>
									<div class="col">
										<h3 class="m-0">
											<i class="fas fa-circle text-warning f-10 m-r-5"></i
											><span class="activeTabUser"></span>
										</h3>
										<span>Tab</span>
									</div>
								</div>
							</div>

						</div>
					</div>
				<!-- active-user start -->
				<!-- browser-% start -->
					<div class="col-sm-4">
						<div class="card table-card" style="height:430px;">
							<div class="card-header borderless">
								<h5>Browser States</h5>
							</div>
							<div class="card-body px-0 py-0">
								<div class="table-responsive">
									<table class="table table-hover mb-0">
										<tbody>
											<tr>
												<td>Google Chrome</td>
												<td><span class="text-right d-block m-0"><span class="m-r-15">{{$browserDataUniqueArray[0]}}%</span><span class="data-attributes" data-peity='{ "fill": ["#4099ff", "#eeeeee"],"innerRadius": 8, "radius": 13 }'>{{$browserDataUniqueArray[0]}}/100</span></span></td>
											</tr>
											<tr>
												<td>Mozila Firefox</td>
												<td><span class="text-right d-block m-0"><span class="m-r-15">{{$browserDataUniqueArray[1]}}%</span><span class="data-attributes" data-peity='{ "fill": ["#FF5370", "#eeeeee"],"innerRadius": 8, "radius": 13 }'>{{$browserDataUniqueArray[1]}}/100</span></span></td>
											</tr>
											<tr>
												<td>Apple Safari</td>
												<td><span class="text-right d-block m-0"><span class="m-r-15">{{$browserDataUniqueArray[2]}}%</span><span class="data-attributes" data-peity='{ "fill": ["#2ed8b6", "#eeeeee"],"innerRadius": 8, "radius": 13 }'>{{$browserDataUniqueArray[2]}}/100</span></span></td>
											</tr>
											<tr>
												<td>Internet Explorer</td>
												<td><span class="text-right d-block m-0"><span class="m-r-15">{{$browserDataUniqueArray[3]}}%</span><span class="data-attributes" data-peity='{ "fill": ["#7759de", "#eeeeee"],"innerRadius": 8, "radius": 13 }'>{{$browserDataUniqueArray[3]}}/100</span></span></td>
											</tr>
											<tr>
												<td>Opera mini</td>
												<td><span class="text-right d-block m-0"><span class="m-r-15">{{$browserDataUniqueArray[4]}}%</span><span class="data-attributes" data-peity='{ "fill": ["#FF9800", "#eeeeee"],"innerRadius": 8, "radius": 13 }'>{{$browserDataUniqueArray[4]}}/100</span></span></td>
											</tr>
											<tr>
												<td>Microsoft Edge</td>
												<td><span class="text-right d-block m-0"><span class="m-r-15">{{$browserDataUniqueArray[5]}}%</span><span class="data-attributes" data-peity='{ "fill": ["#152B39", "#eeeeee"],"innerRadius": 8, "radius": 13 }'>{{$browserDataUniqueArray[5]}}/100</span></span></td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				<!-- browser-% end -->
				<!-- pending signal start -->
					<div class="col-sm-4">
						<div class="card table-card" style="height:430px;">
							<div class="card-header borderless d-flex justify-content-between">
								<h5>Signals</h5>
								<a href="{{URL::to('ustaad/signals/add')}}">Add New Signal</a>
							</div>
							<div class="col-sm-12">

								<div class="card user-profile-list">
									<div class="card-body">
										<div class="dt-responsive table-responsive">
											<table id="user-list-table1s" class="table nowrap">
												<thead>
													<tr>
														<th>Pairs</th>
														<th>User</th>
														<th>Status</th>
													</tr>
												</thead>
												<tbody>
													@foreach($signalPendingData as $data)
														@php
															$pair = $data->getPair();
														@endphp
														@php
															$url = $data->id;
															$loginClientData = Session::get('client');
															$go = 1;
															$go3 = 1;
															$profits = explode('@',$data->takeProfit);
															$time1 = strtotime($data->time);
															$time = date('h:i A', $time1);
															$date1 = strtotime($data->date);
															$date = date('d M Y', $date1);
															if($data->date == date("Y-m-d")){
																if($data->time >= date("H:i:s")){
																	$go = 0;
																	$go3 = 3;
																}
															}
															if($data->date > date("Y-m-d")){
																$go = 0;
																	$go3 = 3;
															}
															$timeDate1 = strtotime(date("Y-m-d H:i:s"));
															$timeDate2 = strtotime($data->created_at->format("Y-m-d H:i:s"));
															$minsDate = ($timeDate1 - $timeDate2) / 60;
																		$pair = $data->getPair();
															$flags = explode("/",$pair->pair);
														@endphp
                                                		@if($go3 == 3)
															<tr>
																<td>{{ isset($pair->pair) ? $pair->pair : $data->forexPairs}}</td>
																@php
																	$adminUser = $data->GetMember();
																@endphp
																<td>{{$adminUser == null ? 'admin' : $adminUser->username}}</td>
																<td>
																	@if($data->pending == 1)
																		<span class="badge badge-light-warning">Pending</span>
																	@else
																		<span class="badge {{$data->status == 0 ? 'badge-light-success' : 'badge-light-danger'}}">{{$data->status == 0 ? 'Active' : 'Deactive'}}</span>
																	@endif
																	@if($data->pending == 1 && $value['memberId'] != 7)
																		<div class="overlay-edit">
																			<form action="{{URL::to('ustaad/signals/allow')}}/{{$data->id}}" method="post">
																				<span class="badge badge-light-warning">
																					Allow
																					<input type="checkbox" class="AllowBroker" name="pending" id="" value="0">
																				</span>
																			</form>
																			<a href="{{URL::to('/ustaad/signals/edit')}}/{{$data->id}}">
																				<button type="button" class="btn btn-icon btn-success" style="width: 20px;height: 20px;padding: 12px;"><i class="fa fa-edit" style="font-size: 12px;"></i></button>
																			</a>
																			@if($data->status == 0)
																				<button type="button" href="{{URL::to('/ustaad/signals/delete')}}/{{$data->id}}" class="btn btn-icon btn-danger addAction" data-toggle="modal" data-target="#myModal"style="width: 20px;height: 20px;padding: 12px;"><i class="fa fa-lock" style="font-size: 12px;"></i></button>
																			@elseif($data->status == 1)
																				<button type="button" href="{{URL::to('/ustaad/signals/active')}}/{{$data->id}}" class="btn btn-icon btn-success addAction" data-toggle="modal" data-target="#myModal"style="width: 20px;height: 20px;padding: 12px;"><i class="fa fa-unlock" style="font-size: 12px;"></i></button>
																			@endif
																		</div>
																	@else
																		<div class="overlay-edit">
																			@if($value['memberId'] == 1)
																				<form action="{{URL::to('ustaad/signals')}}/{{$data->star == 0 ? 'star' : 'unstar'}}/{{$data->id}}" method="post">
																					<span>
																						<input type="checkbox" class="AllowBroker hiddenCheckBox" name="pending" id="option{{$data->id}}" value="0">
																						<label for="option{{$data->id}}" class="mt-2 mr-2"><i class="fa fa-star {{$data->star == 1 ? 'yellowStar' : ''}}"></i></label>
																					</span>
																				</form>
																			@endif
																			<a href="{{URL::to('/ustaad/signals/edit')}}/{{$data->id}}">
																				<button type="button" class="btn btn-icon btn-success"><i class="fa fa-edit"></i></button>
																			</a>
																			@if($data->status == 0)
																				<button type="button" href="{{URL::to('/ustaad/signals/delete')}}/{{$data->id}}" class="btn btn-icon btn-danger addAction" data-toggle="modal" data-target="#myModal"><i class="fa fa-lock"></i></button>
																			@elseif($data->status == 1)
																				<button type="button" href="{{URL::to('/ustaad/signals/active')}}/{{$data->id}}" class="btn btn-icon btn-success addAction" data-toggle="modal" data-target="#myModal"><i class="fa fa-unlock"></i></button>
																			@endif
																		</div>
																	@endif
																</td>
															</tr>
														@endif
													@endforeach
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				<!-- pending signal end -->
				<!-- Latest Signal Comments start -->
					<div class="col-sm-4">
						<div class="card table-card" style="height:470px;">
							<div class="card-header borderless">
								<h5>Latest Signal Comments</h5>
							</div>
							<div class="col-sm-12">

								<div class="card user-profile-list">
									<div class="card-body">
										<div class="dt-responsive table-responsive">
											<table id="user-list-table2s" class="table nowrap">
												<thead>
													<tr>
														<th>Pairs</th>
														<th>Comment</th>
													</tr>
												</thead>
												<tbody>
													@foreach($signalLatestComments as $data)
														@php
															$pair = $data->getPair();
														@endphp

														<tr>
															<td><a href="{{URL::to('ustaad/signals/comment')}}/{{$data->signalId}}" class="text-dark">{{$pair->pair}}</a></td>
															<td class="tdLinkScroll"><a href="{{URL::to('ustaad/signals/comment')}}/{{$data->signalId}}" class="text-dark">{{$data->comment}}</a></td>
														</tr>
													@endforeach
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				<!-- Latest Signal Comments end -->
				<!-- Latest Training Comments start -->
					<div class="col-sm-4">
						<div class="card table-card" style="height:470px;">
							<div class="card-header borderless d-flex justify-content-between">
								<h5>Latest Training Comments</h5>
								<p class="m-0">
									Fliter:
									<select name="fliterTraining" id="LatestTrainingCommentChange">
										<option value="Advance">Advance</option>
										<option value="Basic">Basic</option>
										<option value="Habbit">Habbit</option>
									</select>
								</p>
							</div>
							<div class="col-sm-12">

								<div class="card user-profile-list">
									<div class="card-body">
										<div class="dt-responsive table-responsive AdvanceTrainingTableChange">
											<table id="user-list-table3s" class="table nowrap">
												<thead>
													<tr>
														<th>Lecture</th>
														<th>Comment</th>
													</tr>
												</thead>
												<tbody id="LatestTrainingCommentChangeBody">
													@foreach($AdvanceTrainingLatestComments as $data)
														<tr>
															<td><a href="{{URL::to('ustaad/lecture/AdvanceCategory')}}/{{$data->lectureId}}" class="text-dark">Lecture {{$data->lectureId}}</a></td>
															<td class="tdLinkScroll"><a href="{{URL::to('ustaad/lecture/AdvanceCategory')}}/{{$data->lectureId}}" class="text-dark">{{$data->comment}}</a></td>
														</tr>
													@endforeach
												</tbody>
											</table>
										</div>
										<div class="dt-responsive table-responsive BasicTrainingTableChange">
											<table id="user-list-table31s" class="table nowrap">
												<thead>
													<tr>
														<th>Lecture</th>
														<th>Comment</th>
													</tr>
												</thead>
												<tbody id="LatestTrainingCommentChangeBody">
													@foreach($BasicTrainingLatestComments as $data)
														<tr>
															<td><a href="{{URL::to('ustaad/lecture/BasicCategory')}}/{{$data->lectureId}}" class="text-dark">Lecture {{$data->lectureId}}</a></td>
															<td class="tdLinkScroll"><a href="{{URL::to('ustaad/lecture/BasicCategory')}}/{{$data->lectureId}}" class="text-dark">{{$data->comment}}</a></td>
														</tr>
													@endforeach
												</tbody>
											</table>
										</div>
										<div class="dt-responsive table-responsive HabbitTrainingTableChange">
											<table id="user-list-table32s" class="table nowrap">
												<thead>
													<tr>
														<th>Lecture</th>
														<th>Comment</th>
													</tr>
												</thead>
												<tbody id="LatestTrainingCommentChangeBody">
													@foreach($HabbitTrainingLatestComments as $data)
														<tr>
															<td><a href="{{URL::to('ustaad/lecture/HabbitCategory')}}/{{$data->lectureId}}" class="text-dark">Lecture {{$data->lectureId}}</a></td>
															<td class="tdLinkScroll"><a href="{{URL::to('ustaad/lecture/HabbitCategory')}}/{{$data->lectureId}}" class="text-dark">{{$data->comment}}</a></td>
														</tr>
													@endforeach
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				<!-- Latest Training Comments end -->
				<!-- Latest Signal Comments start -->
					<div class="col-sm-4">
						<div class="card table-card" style="height:470px;">
							<div class="card-header borderless">
								<h5>Latest Blog Post Comments</h5>
							</div>
							<div class="col-sm-12">

								<div class="card user-profile-list">
									<div class="card-body">
										<div class="dt-responsive table-responsive">
											<table id="user-list-table4s" class="table nowrap">
												<thead>
													<tr>
														<th>Title</th>
														<th>Comment</th>
													</tr>
												</thead>
												<tbody>
													@foreach($BlogPostLatestComments as $data)
														@php
															$blogPost = $data->getBlogPost();
														@endphp

														<tr>
															<td class="tdLinkScroll"><a href="{{URL::to('ustaad/post/comment')}}/{{$data->blogId}}" class="text-dark">{{$blogPost->mainTitle}}</a></td>
															<td class="tdLinkScroll"><a href="{{URL::to('ustaad/post/comment')}}/{{$data->blogId}}" class="text-dark">{{$data->comment}}</a></td>
														</tr>
													@endforeach
												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				<!-- Latest Signal Comments end -->

				<!-- <div class="col-md-6">
                </div> -->
<!-- crypto-section start -->
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="toolbar btn-group">
                                    <button id="one_month" class="btn btn-sm btn-outline-primary">1M</button>
                                    <button id="six_months" class="btn btn-sm btn-outline-primary">6M</button>
                                    <button id="one_year" class="btn btn-sm btn-outline-primary">1Y</button>
                                    <button id="ytd" class="btn btn-sm btn-outline-primary active">YTD</button>
                                    <button id="all" class="btn btn-sm btn-outline-primary">ALL</button>
                                </div>
                                <div id="crypto-chart"></div>
                            </div>
                        </div>
                    </div>
<!-- crypto-section end -->


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
								<i class="fa fa-save f-20 text-c-red"></i>
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

<style>
	#SvgjsG1071{
		display: none!important;
	}
	.flex {
		-webkit-box-flex: 1;
		-ms-flex: 1 1 auto;
		flex: 1 1 auto
	}

	@media (max-width:991.98px) {
		.padding {
			padding: 1.5rem
		}
	}

	@media (max-width:767.98px) {
		.padding {
			padding: 1rem
		}
	}

</style>

@include('admin.include.footer')
<script>
	$(".HabbitTrainingTableChange").hide();
	$(".BasicTrainingTableChange").hide();
	$("#LatestTrainingCommentChange").on("change",function(){
		var LatestTrainingCommentChange = $(this).val();

		if(LatestTrainingCommentChange == "Basic"){
			$(".AdvanceTrainingTableChange").hide();
			$(".HabbitTrainingTableChange").hide();
			$(".BasicTrainingTableChange").show();
		}else if(LatestTrainingCommentChange == "Advance"){
			$(".HabbitTrainingTableChange").hide();
			$(".BasicTrainingTableChange").hide();
			$(".AdvanceTrainingTableChange").show();
        }else if(LatestTrainingCommentChange == "Habbit"){
			$(".AdvanceTrainingTableChange").hide();
			$(".BasicTrainingTableChange").hide();
			$(".HabbitTrainingTableChange").show();
        }
	})
</script>
<script>
	$(document).ready(function () {
		$('#user-list-table1s').dataTable({
			"autoWidth": false,
			"lengthChange": false,
			"pageLength": 5
		});
		$('#user-list-table2s').dataTable({
			"autoWidth": false,
			"lengthChange": false,
			"pageLength": 5
		});
		$('#user-list-table3s').dataTable({
			"autoWidth": false,
			"lengthChange": false,
			"pageLength": 5
		});
		$('#user-list-table31s').dataTable({
			"autoWidth": false,
			"lengthChange": false,
			"pageLength": 5
		});
		$('#user-list-table32s').dataTable({
			"autoWidth": false,
			"lengthChange": false,
			"pageLength": 5
		});
		$('#user-list-table4s').dataTable({
			"autoWidth": false,
			"lengthChange": false,
			"pageLength": 3
		});
	});
</script>
<script>

			@php
				$dateGetToStart1 = strtotime("-1 days", strtotime(date("d M Y")));
				$dateGetToStart = date('d M Y', $dateGetToStart1)
			@endphp

     $(function() {
        var options = {
            annotations: {
                yaxis: [{
                    y: 30,
                    borderColor: '#999',
                    label: {
                        show: true,
                        text: 'Support',
                        style: {
                            color: "#fff",
                            background: '#00E396'
                        }
                    }
                }],
                xaxis: [{
                    x: new Date('24 Feb 2021').getTime(),
                    borderColor: '#999',
                    yAxisIndex: 0,
                    label: {
                        show: true,
                        text: 'Rally',
                        style: {
                            color: "#fff",
                            background: '#775DD0'
                        }
                    }
                }]
            },
            chart: {
                type: 'area',
                height: 320,
            },
            dataLabels: {
                enabled: false
            },
            series: [{
                name: 'Daily Visitors',
				data: [
						@foreach($activeUserGraphAllDataArray as $activeUserGraphData)
							[{{$activeUserGraphData[0]}},{{$activeUserGraphData[1]}}],
						@endforeach
				]
            }, ],
            stroke: {
                curve: 'straight',
                width: 2,
            },
            markers: {
                size: 0,
                style: 'hollow',
            },
            colors: ["#4099ff"],
            xaxis: {
                type: 'datetime',
                min: new Date('{{$dateGetToStart}}').getTime(),
                tickAmount: 6,
            },
            tooltip: {
                x: {
                    format: 'dd MMM yyyy'
                }
            },
            fill: {
                type: 'gradient',
                gradient: {
                    shadeIntensity: 1,
                    opacityFrom: 0.7,
                    opacityTo: 0.9,
                    stops: [0, 100]
                }
            },

        }
        var chart = new ApexCharts(
            document.querySelector("#crypto-chart"),
            options
        );
        chart.render();
        var resetCssClasses = function(activeEl) {
            var els = document.querySelectorAll("button");
            Array.prototype.forEach.call(els, function(el) {
                el.classList.remove('active');
            });

            activeEl.target.classList.add('active')
        }
        document.querySelector("#one_month").addEventListener('click', function(e) {
            resetCssClasses(e)
            chart.updateOptions({
                xaxis: {
                    min: new Date('23 Feb 2021').getTime(),
                    max: new Date('23 Mar 2021').getTime(),
                }
            })
        })
        document.querySelector("#six_months").addEventListener('click', function(e) {
            resetCssClasses(e)
            chart.updateOptions({
                xaxis: {
                    min: new Date('23 Feb 2021').getTime(),
                    max: new Date('23 Sep 2021').getTime(),
                }
            })
        })
        document.querySelector("#one_year").addEventListener('click', function(e) {
            resetCssClasses(e)
            chart.updateOptions({
                xaxis: {
                    min: new Date('23 Feb 2021').getTime(),
                    max: new Date('23 Feb 2022').getTime(),
                }
            })
        })
        document.querySelector("#ytd").addEventListener('click', function(e) {
            resetCssClasses(e)
            chart.updateOptions({
                xaxis: {
                    min: new Date('23 Feb 2021').getTime(),
                    max: new Date('28 Feb 2021').getTime(),
                }
            })
        })
        document.querySelector("#all").addEventListener('click', function(e) {
            resetCssClasses(e)
            chart.updateOptions({
                xaxis: {
                    min: undefined,
                    max: undefined,
                }
            })
        })
        document.querySelector("#ytd").addEventListener('click', function() {})
    });
    // [ crypto-chart ] end
</script>

<script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.bundle.min.js'></script>

<script>
    $(document).ready(function() {
		var ctx = $("#chart-line");
		var timer = setInterval(() => {
			$.ajax({
				type: "Post",
				url: "{{URL::to('ustaad/GetRealTimeData/Get')}}",

				success: function(response) {
					var json = $.parseJSON(response);
					// console.log(json[3].length);
					$(".activeUserAll").text(json[0].length);
					$(".activeMobileUser").text(json[1].length);
					$(".activeDesktopUser").text(json[2].length);
					$(".activeTabUser").text(json[3].length);
					if (json[1].length != 0 || json[2].length != 0 || json[3].length != 0) {
						$("#chart-line").css('display','block');
						var myLineChart = new Chart(ctx, {
							type: 'doughnut',
							data: {
								labels: ["Mobile", "Desktop", "Tab"],
								datasets: [{
									data: [json[1].length, json[2].length, json[3].length],
									backgroundColor: ["#2ed8b6", "#4099ff", "#ffcb80"]
								}]
							},
							options: {
							}
						});

					}else{
						$("#chart-line").css('display','none');
					}
				},
				error: function(data) {
					console.log("fail");
				}
			});

		}, 5000);
    });
</script>
