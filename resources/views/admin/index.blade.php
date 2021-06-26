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
				<!-- pending signal start -->
					<div class="col-sm-4">
						<div class="card table-card">
							<div class="card-header borderless d-flex justify-content-between">
								<h5>Signals</h5>
								<a href="{{URL::to('ustaad/signals/add')}}">Add New Signal</a>
							</div>
							<div class="col-sm-12">

								<div class="card user-profile-list">
									<div class="card-body">
										<div class="dt-responsive table-responsive">
											<table id="user-list-table1s" class="table table-striped table-bordered dt-responsive nowrap">
												<thead>
													<tr>
														<th>Pairs</th>
														<th>User</th>
														<th>Status</th>
													</tr>
												</thead>
												<tbody>
													@foreach($activeSignalData as $data)

														@php
															$pair = $data->getPair();
															$go3 = 1;
															$time = date('h:i A', strtotime($data->time));
															$date = date('d M Y', strtotime($data->date));
															if($data->date == date("Y-m-d")){
																if($data->time >= date("H:i:s")){
																	$go3 = 3;
																}
															}
															if($data->date > date("Y-m-d")){
																$go3 = 3;
															}
														@endphp
														@if($go3 == 3)
															<tr>
																<td>{{ isset($pair->pair) ? $pair->pair : $data->forexPairs}}</td>
																@php
																	$adminUser = $data->GetMember();
																@endphp
																<td class="tdLinkScroll">{{$adminUser == null ? 'admin' : $adminUser->username}}</td>
																<td>
																	@if($data->pending == 1)
																		<span class="badge badge-light-warning">Pending</span>
																	@else
																		<span class="badge {{$data->status == 0 ? 'badge-light-success' : 'badge-light-danger'}}">{{$data->status == 0 ? 'Active' : 'Deactive'}}</span>
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
				<!-- Latest Signal Comments end -->
				<div class="col-md-8">
					<div class="card table-card">
						<div class="card-header borderless">
							<h5>Recent Comment</h5>
							<div class="card-header-right">
								<div class="btn-group card-option show">
									<button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
										<i class="fa fa-ellipsis-h"></i>
									</button>
									<ul class="list-unstyled card-option dropdown-menu dropdown-menu-right" x-placement="top-end" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(-148px, -130px, 0px);">
										<li class="dropdown-item full-card"><a href="#!"><span style=""><i class="fa fa-expand"></i> maximize</span><span style="display: none;"><i class="fa fa-compress"></i> Restore</span></a></li>
										<li class="dropdown-item minimize-card"><a href="#!"><span><i class="fa fa-minus"></i> collapse</span><span style="display:none"><i class="fa fa-plus"></i> expand</span></a></li>
										<li class="dropdown-item reload-card"><a href="#!"><i class="fa fa-sync-alt"></i> reload</a></li>
										<li class="dropdown-item close-card"><a href="#!"><i class="fa fa-trash"></i> remove</a></li>
									</ul>
								</div>
							</div>
						</div>
						<div class="card-body p-0">
							<div class="table-responsive">
								<div class="recent-scroll" style="height:535px;position:relative;">
									<table class="table table-hover">
										<tbody>
											@foreach($wholeCommentData as $data)
												@php 
													$pageName = $data->getPageName();
													$member = $data->getMemberInformation();
													if($member){
														if($member->image == null){
															$memberImage = URL::to("public/assets/assets/img/user1.jpg");
														}else{
															$memberImage = URL::to("storage/app" . "/" .$member->image);
														}
													}else{
														$memberImage = URL::to("public/assets/assets/img/user1.jpg");
													}
												@endphp
												<tr>
													<td class="d-flex">
														<div>
															<img class="rounded-circle" style="width:40px;" src="{{$memberImage}}" alt="activity-user">
														</div>
														<div class="ml-4">
															<h6 class="mb-1">{{$member != null ? $member->name : ''}}</h6>
															<p class="m-0" style="white-space:normal">{{$data->comment}}</p>
														</div>
													</td>
													<td class="text-black">
														{{$pageName->page_name}}
													</td>
													<td>
														<a href="{{URL::to('ustaad/comment/edit')}}/{{$data->id}}"><i class="far fa-edit text-success mr-2 editlink" value="16"></i></a>
														<a href="{{URL::to('ustaad/comment/delete')}}/{{$data->id}}" class="addAction" data-toggle="modal" data-target="#myModal"><i class="fa fa-trash text-danger"></i></a>
													</td>
												</tr>
											@endforeach
										</tbody>
									</table>
								</div>
							</div>
						</div>
					</div>
				</div>
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

