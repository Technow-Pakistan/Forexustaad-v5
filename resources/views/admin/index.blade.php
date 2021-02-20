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


<!-- crypto-section start -->
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="toolbar btn-group">
                                    <button id="one_month" class="btn btn-sm btn-outline-primary">1M</button>
                                    <button id="six_months" class="btn btn-sm btn-outline-primary">6M</button>
                                    <button id="one_year" class="btn btn-sm btn-outline-primary active">1Y</button>
                                    <button id="ytd" class="btn btn-sm btn-outline-primary">YTD</button>
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
@include('admin.include.footer')
<script>
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
                    x: new Date('14 Nov 2012').getTime(),
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
                name: 'Active Users',
                data: [
                    [1327359600000, 30.95],
                    [1327446000000, 31.34],
                    [1327532400000, 31.18],
                    [1327618800000, 31.05],
                    [1327878000000, 31.00],
                    [1327964400000, 30.95],
                    [1328050800000, 31.24],
                    [1328137200000, 31.29],
                    [1328223600000, 31.85],
                    [1328482800000, 31.86],
                    [1328569200000, 32.28],
                    [1328655600000, 32.10],
                    [1328742000000, 32.65],
                    [1328828400000, 32.21],
                    [1329087600000, 32.35],
                    [1329174000000, 32.44],
                    [1329260400000, 32.46],
                    [1329346800000, 32.86],
                    [1329433200000, 32.75],
                    [1329778800000, 32.54],
                    [1329865200000, 32.33],
                    [1329951600000, 32.97],
                    [1330038000000, 33.41],
                    [1330297200000, 33.27],
                    [1330383600000, 33.27],
                    [1330470000000, 32.89],
                    [1330556400000, 33.10],
                    [1330642800000, 33.73],
                    [1330902000000, 33.22],
                    [1330988400000, 31.99],
                    [1331074800000, 32.41],
                    [1331161200000, 33.05],
                    [1331247600000, 33.64],
                    [1331506800000, 33.56],
                    [1331593200000, 34.22],
                    [1331679600000, 33.77],
                    [1331766000000, 34.17],
                    [1331852400000, 33.82],
                    [1332111600000, 34.51],
                    [1332198000000, 33.16],
                    [1332284400000, 33.56],
                    [1332370800000, 33.71],
                    [1332457200000, 33.81],
                    [1332712800000, 34.40],
                    [1332799200000, 34.63],
                    [1332885600000, 34.46],
                    [1332972000000, 34.48],
                    [1333058400000, 34.31],
                    [1333317600000, 34.70],
                    [1333404000000, 34.31],
                    [1333490400000, 33.46],
                    [1333576800000, 33.59],
                    [1333922400000, 33.22],
                    [1334008800000, 32.61],
                    [1334095200000, 33.01],
                    [1334181600000, 33.55],
                    [1334268000000, 33.18],
                    [1334527200000, 32.84],
                    [1334613600000, 33.84],
                    [1334700000000, 33.39],
                    [1334786400000, 32.91],
                    [1334872800000, 33.06],
                    [1335132000000, 32.62],
                    [1335218400000, 32.40],
                    [1335304800000, 33.13],
                    [1335391200000, 33.26],
                    [1335477600000, 33.58],
                    [1335736800000, 33.55],
                    [1335823200000, 33.77],
                    [1335909600000, 33.76],
                    [1335996000000, 33.32],
                    [1336082400000, 32.61],
                    [1336341600000, 32.52],
                    [1336428000000, 32.67],
                    [1336514400000, 32.52],
                    [1336600800000, 31.92],
                    [1336687200000, 32.20],
                    [1336946400000, 32.23],
                    [1337032800000, 32.33],
                    [1337119200000, 32.36],
                    [1337205600000, 32.01],
                    [1337292000000, 31.31],
                    [1337551200000, 32.01],
                    [1337637600000, 32.01],
                    [1337724000000, 32.18],
                    [1337810400000, 31.54],
                    [1337896800000, 31.60],
                    [1338242400000, 32.05],
                    [1338328800000, 31.29],
                    [1338415200000, 31.05],
                    [1338501600000, 29.82],
                    [1338760800000, 30.31],
                    [1338847200000, 30.70],
                    [1338933600000, 31.69],
                    [1339020000000, 31.32],
                    [1339106400000, 31.65],
                    [1339365600000, 31.13],
                    [1339452000000, 31.77],
                    [1339538400000, 31.79],
                    [1339624800000, 31.67],
                    [1339711200000, 32.39],
                    [1339970400000, 32.63],
                    [1340056800000, 32.89],
                    [1340143200000, 31.99],
                    [1340229600000, 31.23],
                    [1340316000000, 31.57],
                    [1340575200000, 30.84],
                    [1340661600000, 31.07],
                    [1340748000000, 31.41],
                    [1340834400000, 31.17],
                    [1340920800000, 32.37],
                    [1341180000000, 32.19],
                    [1341266400000, 32.51],
                    [1341439200000, 32.53],
                    [1341525600000, 31.37],
                    [1341784800000, 30.43],
                    [1341871200000, 30.44],
                    [1341957600000, 30.20],
                    [1342044000000, 30.14],
                    [1342130400000, 30.65],
                    [1342389600000, 30.40],
                    [1342476000000, 30.65],
                    [1342562400000, 31.43],
                    [1342648800000, 31.89],
                    [1342735200000, 31.38],
                    [1342994400000, 30.64],
                    [1343080800000, 30.02],
                    [1343167200000, 30.33],
                    [1343253600000, 30.95],
                    [1343340000000, 31.89],
                    [1343599200000, 31.01],
                    [1343685600000, 30.88],
                    [1343772000000, 30.69],
                    [1343858400000, 30.58],
                    [1343944800000, 32.02],
                    [1344204000000, 32.14],
                    [1344290400000, 32.37],
                    [1344376800000, 32.51],
                    [1344463200000, 32.65],
                    [1344549600000, 32.64],
                    [1344808800000, 32.27],
                    [1344895200000, 32.10],
                    [1344981600000, 32.91],
                    [1345068000000, 33.65],
                    [1345154400000, 33.80],
                    [1345413600000, 33.92],
                    [1345500000000, 33.75],
                    [1345586400000, 33.84],
                    [1345672800000, 33.50],
                    [1345759200000, 32.26],
                    [1346018400000, 32.32],
                    [1346104800000, 32.06],
                    [1346191200000, 31.96],
                    [1346277600000, 31.46],
                    [1346364000000, 31.27],
                    [1346709600000, 31.43],
                    [1346796000000, 32.26],
                    [1346882400000, 32.79],
                    [1346968800000, 32.46],
                    [1347228000000, 32.13],
                    [1347314400000, 32.43],
                    [1347400800000, 32.42],
                    [1347487200000, 32.81],
                    [1347573600000, 33.34],
                    [1347832800000, 33.41],
                    [1347919200000, 32.57],
                    [1348005600000, 33.12],
                    [1348092000000, 34.53],
                    [1348178400000, 33.83],
                    [1348437600000, 33.41],
                    [1348524000000, 32.90],
                    [1348610400000, 32.53],
                    [1348696800000, 32.80],
                    [1348783200000, 32.44],
                    [1349042400000, 32.62],
                    [1349128800000, 32.57],
                    [1349215200000, 32.60],
                    [1349301600000, 32.68],
                    [1349388000000, 32.47],
                    [1349647200000, 32.23],
                    [1349733600000, 31.68],
                    [1349820000000, 31.51],
                    [1349906400000, 31.78],
                    [1349992800000, 31.94],
                    [1350252000000, 32.33],
                    [1350338400000, 33.24],
                    [1350424800000, 33.44],
                    [1350511200000, 33.48],
                    [1350597600000, 33.24],
                    [1350856800000, 33.49],
                    [1350943200000, 33.31],
                    [1351029600000, 33.36],
                    [1351116000000, 33.40],
                    [1351202400000, 34.01],
                    [1351638000000, 34.02],
                    [1351724400000, 34.36],
                    [1351810800000, 34.39],
                    [1352070000000, 34.24],
                    [1352156400000, 34.39],
                    [1352242800000, 33.47],
                    [1352329200000, 32.98],
                    [1352415600000, 32.90],
                    [1352674800000, 32.70],
                    [1352761200000, 32.54],
                    [1352847600000, 32.23],
                    [1352934000000, 32.64],
                    [1353020400000, 32.65],
                    [1353279600000, 32.92],
                    [1353366000000, 32.64],
                    [1353452400000, 32.84],
                    [1353625200000, 33.40],
                    [1353884400000, 33.30],
                    [1353970800000, 33.18],
                    [1354057200000, 33.88],
                    [1354143600000, 34.09],
                    [1354230000000, 34.61],
                    [1354489200000, 34.70],
                    [1354575600000, 35.30],
                    [1354662000000, 35.40],
                    [1354748400000, 35.14],
                    [1354834800000, 35.48],
                    [1355094000000, 35.75],
                    [1355180400000, 35.54],
                    [1355266800000, 35.96],
                    [1355353200000, 35.53],
                    [1355439600000, 37.56],
                    [1355698800000, 37.42],
                    [1355785200000, 37.49],
                    [1355871600000, 38.09],
                    [1355958000000, 37.87],
                    [1356044400000, 37.71],
                    [1356303600000, 37.53],
                    [1356476400000, 37.55],
                    [1356562800000, 37.30],
                    [1356649200000, 36.90],
                    [1356908400000, 37.68],
                    [1357081200000, 38.34],
                    [1357167600000, 37.75],
                    [1357254000000, 38.13],
                    [1357513200000, 37.94],
                    [1357599600000, 38.14],
                    [1357686000000, 38.66],
                    [1357772400000, 38.62],
                    [1357858800000, 38.09],
                    [1358118000000, 38.16],
                    [1358204400000, 38.15],
                    [1358290800000, 37.88],
                    [1358377200000, 37.73],
                    [1358463600000, 37.98],
                    [1358809200000, 37.95],
                    [1358895600000, 38.25],
                    [1358982000000, 38.10],
                    [1359068400000, 38.32],
                    [1359327600000, 38.24],
                    [1359414000000, 38.52],
                    [1359500400000, 37.94],
                    [1359586800000, 37.83],
                    [1359673200000, 38.34],
                    [1359932400000, 38.10],
                    [1360018800000, 38.51],
                    [1360105200000, 38.40],
                    [1360191600000, 38.07],
                    [1360278000000, 39.12],
                    [1360537200000, 38.64],
                    [1360623600000, 38.89],
                    [1360710000000, 38.81],
                    [1360796400000, 38.61],
                    [1360882800000, 38.63],
                    [1361228400000, 38.99],
                    [1361314800000, 38.77],
                    [1361401200000, 38.34],
                    [1361487600000, 38.55],
                    [1361746800000, 38.11],
                    [1361833200000, 38.59],
                    [1361919600000, 39.60],
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
                min: new Date('01 Mar 2012').getTime(),
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
                    min: new Date('01 Jan 2013').getTime(),
                    max: new Date('27 Feb 2013').getTime(),
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

