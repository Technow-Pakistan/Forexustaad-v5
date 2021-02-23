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
				<!-- active-user start -->
					<div class="col-sm-3">	
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
										<span class="ml-3">Mobile</span>
									</div>
									<div class="col">
										<h3 class="m-0">
											<i class="fas fa-circle text-primary f-10 m-r-5"></i
											><span class="activeDesktopUser"></span>
										</h3>
										<span class="ml-3">Desktop</span>
									</div>
									<div class="col">
										<h3 class="m-0">
											<i class="fas fa-circle text-warning f-10 m-r-5"></i
											><span class="activeTabUser"></span>
										</h3>
										<span class="ml-3">Tab</span>
									</div>
								</div>
							</div>
							
						</div>
					</div>
				<!-- active-user start -->
				<!-- browser-% end -->
					<div class="col-sm-3">	
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
				
				<div class="col-md-6">
                </div>
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
                    <div class="col-12 mb-4">
						<div class="p-3" style="background: #152B39; height:380px;">
							<canvas id='c12' style="border:3px solid black;" width="100%" height="100%"></canvas><br>
							<div class="label12 text-danger"></div>
						</div>
					</div>
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
                    x: new Date('23 Feb 2021').getTime(),
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
                    min: new Date('28 Jan 2013').getTime(),
                    max: new Date('27 Feb 2013').getTime(),
                }
            })
        })
        document.querySelector("#six_months").addEventListener('click', function(e) {
            resetCssClasses(e)
            chart.updateOptions({
                xaxis: {
                    min: new Date('27 Sep 2012').getTime(),
                    max: new Date('27 Feb 2013').getTime(),
                }
            })
        })
        document.querySelector("#one_year").addEventListener('click', function(e) {
            resetCssClasses(e)
            chart.updateOptions({
                xaxis: {
                    min: new Date('27 Feb 2012').getTime(),
                    max: new Date('27 Feb 2013').getTime(),
                }
            })
        })
        document.querySelector("#ytd").addEventListener('click', function(e) {
            resetCssClasses(e)
            chart.updateOptions({
                xaxis: {
                    min: new Date('20 Feb 2021').getTime(),
                    max: new Date('27 Feb 2021').getTime(),
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
<script>
	var label = document.querySelector(".label12");
	var c = document.getElementById("c12");
	var ctx = c.getContext("2d");
	var cw = c.width = 1200;
	var ch = c.height = 310;
	var cx = cw / 2,
		cy = ch / 2;
	var rad = Math.PI / 180;
	var frames = 0;

	ctx.lineWidth = 1;
	ctx.strokeStyle = "#999";
	ctx.fillStyle = "#ccc";
	ctx.font = "14px monospace";

	var grd = ctx.createLinearGradient(0, 0, 0, cy);
	grd.addColorStop(0, "hsla(167,72%,60%,1)");
	grd.addColorStop(1, "hsla(167,72%,60%,0)");

	@php
		$data12[0] = date("Y-m-d",mktime(0, 0, 0, date("m"), date("y")-0,date("y")));
		$data12[1] = date("Y-m-d",mktime(0, 0, 0, date("m"), date("y")-1,date("y")));
		$data12[2] = date("Y-m-d",mktime(0, 0, 0, date("m"), date("y")-2,date("y")));
		$data12[3] = date("Y-m-d",mktime(0, 0, 0, date("m"), date("y")-3,date("y")));
		$data12[4] = date("Y-m-d",mktime(0, 0, 0, date("m"), date("y")-4,date("y")));
		$data12[5] = date("Y-m-d",mktime(0, 0, 0, date("m"), date("y")-5,date("y")));
		$data12[6] = date("Y-m-d",mktime(0, 0, 0, date("m"), date("y")-6,date("y")));
		$data12[7] = date("Y-m-d",mktime(0, 0, 0, date("m"), date("y")-7,date("y")));
		$data12[8] = date("Y-m-d",mktime(0, 0, 0, date("m"), date("y")-8,date("y")));
		$data12[9] = date("Y-m-d",mktime(0, 0, 0, date("m"), date("y")-9,date("y")));
		$data12[10] = date("Y-m-d",mktime(0, 0, 0, date("m"), date("y")-10,date("y")));
		$data12[11] = date("Y-m-d",mktime(0, 0, 0, date("m"), date("y")-11,date("y")));
		$data12[12] = date("Y-m-d",mktime(0, 0, 0, date("m"), date("y")-12,date("y")));
		$data12[13] = date("Y-m-d",mktime(0, 0, 0, date("m"), date("y")-13,date("y")));
		$data12[14] = date("Y-m-d",mktime(0, 0, 0, date("m"), date("y")-14,date("y")));

	@endphp
	var oData = {
		"{{$data12[0]}}": 10,
		"{{$data12[1]}}": 39.9,
		"{{$data12[2]}}": 17,
		"{{$data12[3]}}": 30.0,
		"{{$data12[4]}}": 5.3,
		"{{$data12[5]}}": 38.4,
		"{{$data12[6]}}": 15.7,
		"{{$data12[7]}}": 9.0,
		"{{$data12[8]}}": 39.9,
		"{{$data12[9]}}": 17,
		// "{{$data12[10]}}": 50.0,
		// "{{$data12[11]}}": 5.3,
		// "{{$data12[12]}}": 38.4,
		// "{{$data12[13]}}": 15.7,
		// "{{$data12[14]}}": 9.0,
	};

	var valuesRy = [];
	var propsRy = [];
	for (var prop in oData) {

		valuesRy.push(oData[prop]);
		propsRy.push(prop);
	}


	var vData = 4;
	var hData = valuesRy.length;
	var offset = 50.5; //offset chart axis
	var chartHeight = ch - 2 * offset;
	var chartWidth = cw - 2 * offset;
	var t = 1 / 7; // curvature : 0 = no curvature
	var speed = 2; // for the animation

	var A = {
		x: offset,
		y: offset
	}
	var B = {
		x: offset,
		y: offset + chartHeight
	}
	var C = {
		x: offset + chartWidth,
		y: offset + chartHeight
	}

	/*
		A  ^
			|  |
			+ 25
			|
			|
			|
			+ 25
		|_|____________  C
		B
	*/

	// CHART AXIS -------------------------
	ctx.beginPath();
	ctx.moveTo(A.x, A.y);
	ctx.lineTo(B.x, B.y);
	ctx.lineTo(C.x, C.y);
	ctx.stroke();

	// vertical ( A - B )
	var aStep = (chartHeight - 50) / (vData);

	var Max = Math.ceil(arrayMax(valuesRy) / 10) * 10;
	var Min = Math.floor(arrayMin(valuesRy) / 10) * 10;
	var aStepValue = (Max - Min) / (vData);
	console.log("aStepValue: " + aStepValue); //8 units
	var verticalUnit = aStep / aStepValue;

	var a = [];
	ctx.textAlign = "right";
	ctx.textBaseline = "middle";
	for (var i = 0; i <= vData; i++) {

		if (i == 0) {
			a[i] = {
				x: A.x,
				y: A.y + 25,
				val: Max
			}
		} else {
			a[i] = {}
			a[i].x = a[i - 1].x;
			a[i].y = a[i - 1].y + aStep;
			a[i].val = a[i - 1].val - aStepValue;
		}
		drawCoords(a[i], 3, 0);
	}

	//horizontal ( B - C )
	var b = [];
	ctx.textAlign = "center";
	ctx.textBaseline = "hanging";
	var bStep = chartWidth / (hData + 1);

	for (var i = 0; i < hData; i++) {
		if (i == 0) {
			b[i] = {
				x: B.x + bStep,
				y: B.y,
				val: propsRy[0]
			};
		} else {
			b[i] = {}
			b[i].x = b[i - 1].x + bStep;
			b[i].y = b[i - 1].y;
			b[i].val = propsRy[i]
		}
		drawCoords(b[i], 0, 3)
	}

	function drawCoords(o, offX, offY) {
		ctx.beginPath();
		ctx.moveTo(o.x - offX, o.y - offY);
		ctx.lineTo(o.x + offX, o.y + offY);
		ctx.stroke();

		ctx.fillText(o.val, o.x - 2 * offX, o.y + 2 * offY);
	}
	//----------------------------------------------------------

	// DATA
	var oDots = [];
	var oFlat = [];
	var i = 0;

	for (var prop in oData) {
		oDots[i] = {}
		oFlat[i] = {}

		oDots[i].x = b[i].x;
		oFlat[i].x = b[i].x;

		oDots[i].y = b[i].y - oData[prop] * verticalUnit - 25;
		oFlat[i].y = b[i].y - 25;

		oDots[i].val = oData[b[i].val];

		i++
	}



	///// Animation Chart ///////////////////////////
	//var speed = 3;
	function animateChart() {
		requestId = window.requestAnimationFrame(animateChart);
		frames += speed; //console.log(frames)
		ctx.clearRect(60, 0, cw, ch - 60);

		for (var i = 0; i < oFlat.length; i++) {
			if (oFlat[i].y > oDots[i].y) {
				oFlat[i].y -= speed;
			}
		}
		drawCurve(oFlat);
		for (var i = 0; i < oFlat.length; i++) {
			ctx.fillText(oDots[i].val, oFlat[i].x, oFlat[i].y - 25);
			ctx.beginPath();
			ctx.arc(oFlat[i].x, oFlat[i].y, 3, 0, 2 * Math.PI);
			ctx.fill();
		}

		if (frames >= Max * verticalUnit) {
			window.cancelAnimationFrame(requestId);

		}
	}
	requestId = window.requestAnimationFrame(animateChart);

	/////// EVENTS //////////////////////
	c.addEventListener("mousemove", function(e) {
		label.innerHTML = "";
		label.style.display = "none";
		this.style.cursor = "default";

		var m = oMousePos(this, e);
		for (var i = 0; i < oDots.length; i++) {

			output(m, i);
		}

	}, false);

	function output(m, i) {
		ctx.beginPath();
		ctx.arc(oDots[i].x, oDots[i].y, 20, 0, 2 * Math.PI);
		if (ctx.isPointInPath(m.x, m.y)) {
			//console.log(i);
			label.style.display = "block";
			label.style.top = (m.y + 10) + "px";
			label.style.left = (m.x + 10) + "px";
			label.innerHTML = "<strong>" + propsRy[i] + "</strong>: " + valuesRy[i] + "%";
			c.style.cursor = "pointer";
		}
	}

	// CURVATURE
	function controlPoints(p) {
		// given the points array p calculate the control points
		var pc = [];
		for (var i = 1; i < p.length - 1; i++) {
			var dx = p[i - 1].x - p[i + 1].x; // difference x
			var dy = p[i - 1].y - p[i + 1].y; // difference y
			// the first control point
			var x1 = p[i].x - dx * t;
			var y1 = p[i].y - dy * t;
			var o1 = {
				x: x1,
				y: y1
			};

			// the second control point
			var x2 = p[i].x + dx * t;
			var y2 = p[i].y + dy * t;
			var o2 = {
				x: x2,
				y: y2
			};

			// building the control points array
			pc[i] = [];
			pc[i].push(o1);
			pc[i].push(o2);
		}
		return pc;
	}

	function drawCurve(p) {

		var pc = controlPoints(p); // the control points array

		ctx.beginPath();
		//ctx.moveTo(p[0].x, B.y- 25);
		ctx.lineTo(p[0].x, p[0].y);
		// the first & the last curve are quadratic Bezier
		// because I'm using push(), pc[i][1] comes before pc[i][0]
		ctx.quadraticCurveTo(pc[1][1].x, pc[1][1].y, p[1].x, p[1].y);

		if (p.length > 2) {
			// central curves are cubic Bezier
			for (var i = 1; i < p.length - 2; i++) {
				ctx.bezierCurveTo(pc[i][0].x, pc[i][0].y, pc[i + 1][1].x, pc[i + 1][1].y, p[i + 1].x, p[i + 1].y);
			}
			// the first & the last curve are quadratic Bezier
			var n = p.length - 1;
			ctx.quadraticCurveTo(pc[n - 1][0].x, pc[n - 1][0].y, p[n].x, p[n].y);
		}

		//ctx.lineTo(p[p.length-1].x, B.y- 25);
		ctx.stroke();
		ctx.save();
		ctx.fillStyle = grd;
		ctx.fill();
		ctx.restore();
	}

	function arrayMax(array) {
		return Math.max.apply(Math, array);
	};

	function arrayMin(array) {
		return Math.min.apply(Math, array);
	};

	function oMousePos(canvas, evt) {
		var ClientRect = canvas.getBoundingClientRect();
		return { //objeto
			x: Math.round(evt.clientX - ClientRect.left),
			y: Math.round(evt.clientY - ClientRect.top)
		}
	}
</script>

<script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.1.4/Chart.bundle.min.js'></script>
<script>
</script>
<script>
    $(document).ready(function() {
		var timer = setInterval(() => {
			console.log("dsadas");
			$.ajax({
				type: "Post",
				url: "{{URL::to('ustaad/GetRealTimeData/Get')}}",
				
				success: function(response) {
					var json = $.parseJSON(response);
					console.log(json[3].length);
					$(".activeUserAll").text(json[0].length);
					$(".activeMobileUser").text(json[1].length);
					$(".activeDesktopUser").text(json[2].length);
					$(".activeTabUser").text(json[3].length);
					if (json[1].length != 0 || json[2].length != 0 || json[3].length != 0) {
						$("#chart-line").css('display','block');
						var ctx = $("#chart-line");
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
