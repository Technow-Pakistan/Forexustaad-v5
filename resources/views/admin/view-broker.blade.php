@php
	$value =Session::get('admin');
@endphp
@include('admin.include.header')
		<!-- [ Main Content ] start -->
		<section class="pcoded-main-container">
			<div class="pcoded-content">
				<!-- [ breadcrumb ] start -->
				<div class="page-header">
					<div class="page-block">
						<div class="row align-items-center">
							<div class="col-md-12">
								<div class="page-header-title">
									<h5 class="m-b-10">View Broker Details</h5>
								</div>
								<ul class="breadcrumb">
									<li class="breadcrumb-item">
										<a href="{{URL::to('/ustaad/dashboard')}}"><i class="feather icon-home"></i></a>
									</li>
									<li class="breadcrumb-item"><a href="{{URL::to('/ustaad/allbrokers')}}/{{$value['memberId']}}">All Brokers</a></li>
									<li class="breadcrumb-item">
										<a href="#!">Details</a>
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
									<div class="col-md-12">	
										<div class="progress-group">
											<div class="wrapper">
												<div class="step step01 complete"><progress class="progress progress1" value="0" max="100" aria-describedby="Step 01"></progress>
													<div class="progress-circle"></div>
												</div>
												<div class="step step02 complete"><progress class="progress progress2" value="0" max="100" aria-describedby="Step 02"></progress>
													<div class="progress-circle"></div>
												</div>
												<div class="step step03 complete"><progress class="progress progress3" value="0" max="100" aria-describedby="Step 03"></progress>
													<div class="progress-circle"></div>
												</div>
												<div class="step step04"><progress class="progress progress4" value="0" max="100" aria-describedby="Step 04"></progress>
													<div class="progress-circle"></div>
												</div>
												<div class="step step05"><progress class="progress progress5" value="0" max="100" aria-describedby="Step 05"></progress>
													<div class="progress-circle"></div>
												</div>
												
											</div>
										</div>
										<div class="progress-labels">
											<div class="label">Step 01</div>
											<div class="label">Step 02</div>
											<div class="label">Step 03</div>
											<div class="label">Step 04</div>
											<div class="label">Step 05</div>
										</div>
									</div>
								<div class="row">
									<div class="col-md-3 mt-4" style="border-right:1px solid lightgray">
										<ul class="nav nav-pills nav-fill mb-3" role="tablist">
											<li class="nav-item">
												<a class="nav-link active" data-toggle="tab" href="#COMPANYINFORMATION" role="tab">COMPANY INFORMATION
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
											<li class="nav-item">
												<a class="nav-link" data-toggle="tab" href="#TRADINGPLATFORMS" role="tab">TRADING PLATFORMS

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
									</div>
									<div class="col-md-9">
										<!-- Tab panes -->
													@php
														$AllowCompanyInformation = $broker1->GetAllowCompanyInformation();
														$AllowDeposit = $broker2->GetAllowDeposit();
														$AllowCommission = $broker3->GetAllowCommission();
														$AllowAccountInfo = $broker4->GetAllowAccountInfo();
														$AllowTradableAssets = $broker5->GetAllowTradableAssets();
														$AllowPlatform = $broker6->GetAllowPlatform();
														$AllowTradingFeature = $broker7->GetAllowTradingFeature();
														$AllowCustomerServices = $broker8->GetAllowCustomerServices();
														$AllowReserchEducation = $broker9->GetAllowReserchEducation();
														$AllowformPromotion = $broker->GetAllowformPromotion();
													@endphp
										<div class="tab-content">
											<div class="tab-pane active" id="COMPANYINFORMATION" role="tabpanel">
												<div class="">
													<div class="card-header d-flex justify-content-between">
														<div class=" text-danger f-26">
															COMPANY INFORMATION
														</div>
														<div>
															@if($value['memberId'] == 1)
																@if($AllowCompanyInformation != null )
																	<a href="{{URL::to('ustaad/brokerCompanyInformation/allow')}}/{{$broker1->id}}" class="btn btn-outline-primary">
																		Allow
																	</a>
																@endif
															@endif
														</div>
													</div>
													<div class="card-body">
														<form action="">
															<div class="row">
																<div class="col-sm-6">
																	<div class="form-group">
																		<label for="">Title <sup><span class="badge badge-light-danger">{{isset($AllowCompanyInformation)  ? ($AllowCompanyInformation->title != $broker1->title ? 'updated' : '' ) : "" }}</span></sup></label>
																		<span class="h4 text-danger broker-details">{{$broker1->title}}</span>
																	</div>
																</div>
																<div class="col-sm-6">
																	<div class="form-group">
																		<label for="">Image<sup><span class="badge badge-light-danger">{{isset($AllowCompanyInformation)  ? ($AllowCompanyInformation->image != $broker1->image ? 'updated' : '' ) : "" }}</span></sup></label><br>
																		<span>
																			<img
																				id="slider1"
																				src="{{URL::to('storage/app')}}/{{$broker1->image}}"
																				class="img-fluid"
																				alt="your image"
																			/>
																		</span>
																	</div>
																</div>
																<div class="col-sm-6">
																	<div class="form-group">
																		<label for="">REGULATIONS <sup><span class="badge badge-light-danger">{{isset($AllowCompanyInformation)  ? ($AllowCompanyInformation->regulations != $broker1->regulations ? 'updated' : '' ) : "" }}</span></sup></label>
																		<span class="h4 text-danger broker-details">{{$broker1->regulations}}</span>
																	</div>
																</div>
																<div class="col-sm-6">
																	<div class="form-group">
																		<label for="">HEADQUARTERS COUNTRY <sup><span class="badge badge-light-danger">{{isset($AllowCompanyInformation)  ? ($AllowCompanyInformation->headquaters != $broker1->headquaters ? 'updated' : '' ) : "" }}</span></sup></label>
																		<span class="h4 text-danger broker-details">{{$broker1->headquaters}}</span>
																	</div>
																</div>
																<div class="col-sm-6">
																	<div class="form-group">
																		<label for="">FOUNDATION YEAR <sup><span class="badge badge-light-danger">{{isset($AllowCompanyInformation)  ? ($AllowCompanyInformation->foundation != $broker1->foundation ? 'updated' : '' ) : "" }}</span></sup></label>
																		<span class="h4 text-danger broker-details">{{$broker1->foundation}}</span>
																	</div>
																</div>
																<div class="col-sm-6">
																	<div class="form-group">
																		<label for="">PUBLICLY TRADED <sup><span class="badge badge-light-danger">{{isset($AllowCompanyInformation)  ? ($AllowCompanyInformation->traded != $broker1->traded ? 'updated' : '' ) : "" }}</span></sup></label>
																		<span class="h4 text-danger broker-details">{{$broker1->traded}}</span>
																	</div>
																</div>
																<div class="col-sm-6">
																	<div class="form-group">
																		<label for="">NUMBER OF EMPLOYEES <sup><span class="badge badge-light-danger">{{isset($AllowCompanyInformation)  ? ($AllowCompanyInformation->employees != $broker1->employees ? 'updated' : '' ) : "" }}</span></sup></label>
																		<span class="h4 text-danger broker-details">{{$broker1->employees}}</span>
																	</div>
																</div>
																@if($broker1->start != null && $broker1->end != null)
																	<div class="col-sm-6">
																		<div class="form-group">
																			<label for="">Start Date</label>
																			<span class="h4 text-danger broker-details">{{$broker1->start}}</span>
																		</div>
																	</div>
																	<div class="col-sm-6">
																		<div class="form-group">
																			<label for="">End Date</label>
																			<span class="h4 text-danger broker-details">{{$broker1->end}}</span>
																		</div>
																	</div>
																@else
																	<div class="col-sm-12">
																		<div class="form-group">
																			<span class="h4 text-danger broker-details">Never End</span>
																		</div>
																	</div>
																@endif
															</div>
															
														</form>
													</div>
												</div>
											</div>
											<div class="tab-pane" id="DEPOSIT" role="tabpanel">
												<div class="">
													<div class="card-header d-flex justify-content-between">
														<div class="text-danger f-26">
															DEPOSIT & WITHDRAWAL
														</div>
														<div>
															@if($value['memberId'] == 1)
																@if($broker2->pending == 1)
																	<a href="{{URL::to('ustaad/brokerDeposit/allow')}}/{{$broker2->id}}" class="btn btn-outline-primary">
																		Allow
																	</a>
																@endif
															@endif
														</div>
													</div>
													<div class="card-body">
														<form action="">
															<div class="form-group">
																<label for="">DEPOSIT OPTIONS <sup><span class="badge badge-light-danger">{{isset($AllowDeposit)  ? ($AllowDeposit->deposit != $broker2->deposit ? 'updated' : '' ) : "" }}</span></sup></label>
																<span class="h4 text-danger broker-details">{{$broker2->deposit}}</span>
															</div>
															<div class="form-group">
																<label for="">WITHDRAWAL OPTIONS <sup><span class="badge badge-light-danger">{{isset($AllowDeposit)  ? ($AllowDeposit->withdrawal != $broker2->withdrawal ? 'updated' : '' ) : "" }}</span></sup></label>
																<span class="h4 text-danger broker-details">{{$broker2->withdrawal}}</span>
															</div>
															
															
															
														</form>
													</div>
												</div>
											</div>
											<div class="tab-pane" id="COMMISSIONS" role="tabpanel">
												<div class="">
													<div class="card-header d-flex justify-content-between">
														<div class=" text-danger f-26">
															COMMISSIONS & FEES
														</div>
														<div>
															@if($value['memberId'] == 1)
																@if($broker3->pending == 1)
																	<a href="{{URL::to('ustaad/brokerCommission/allow')}}/{{$broker3->id}}" class="btn btn-outline-primary">
																		Allow
																	</a>
																@endif
															@endif
														</div>
													</div>
													<div class="card-body">
														<form action="">
															<div class="form-group">
																<label for="">COMMISSION ON TRADES <sup><span class="badge badge-light-danger">{{isset($AllowCommission)  ? ($AllowCommission->commission != $broker3->commission ? 'updated' : '' ) : "" }}</span></sup></label>
																<span class="h4 text-danger broker-details">{{$broker3->commission}}</span>
															</div>
															<div class="form-group">
																<label for="">FIXED SPREADS<sup><span class="badge badge-light-danger">{{isset($AllowCommission)  ? ($AllowCommission->spread != $broker3->spread ? 'updated' : '' ) : "" }}</span></sup></label>
																<span class="h4 text-danger broker-details">{{$broker3->spread}}</span>
																<div>
																	
																</div>
															</div>
															<div>
																
															</div>
														</form>
													</div>
												</div>
											</div>
											<div class="tab-pane" id="ACCOUNT" role="tabpanel">
												<div class="">
													<div class="card-header d-flex justify-content-between">
														<div class=" text-danger f-26">
															ACCOUNT INFORMATION
														</div>
														<div>
															@if($value['memberId'] == 1)
																@if($broker4->pending == 1)
																	<a href="{{URL::to('ustaad/brokerAccountInfo/allow')}}/{{$broker4->id}}" class="btn btn-outline-primary">
																		Allow
																	</a>
																@endif
															@endif
														</div>
													</div>
													<div class="card-body">
														<form action="">
															<div class="row">
																<div class="col-sm-6">
																	<div class="form-group">
																		<label for="">TRADING DESK TYPE<sup><span class="badge badge-light-danger">{{isset($AllowAccountInfo)  ? ($AllowAccountInfo->trade != $broker4->trade ? 'updated' : '' ) : "" }}</span></sup></label>
																		<span class="h4 text-danger broker-details">{{$broker4->trade}}</span>
																	</div>
																</div>
																<div class="col-sm-6">
																	<div class="form-group">
																		<label for="">MIN DEPOSIT<sup><span class="badge badge-light-danger">{{isset($AllowAccountInfo)  ? ($AllowAccountInfo->min != $broker4->min ? 'updated' : '' ) : "" }}</span></sup></label>
																		<span class="h4 text-danger broker-details">{{$broker4->min}}</span>
																		<div>
																			
																		</div>
																	</div>
																</div>
																<div class="col-sm-6">
																	<div class="form-group">
																		<label for="">MAX LEVERAGE<sup><span class="badge badge-light-danger">{{isset($AllowAccountInfo)  ? ($AllowAccountInfo->mini != $broker4->mini ? 'updated' : '' ) : "" }}</span></sup></label>
																		<span class="h4 text-danger broker-details">{{$broker4->mini}}</span>
																		<div>
																			
																		</div>
																	</div>
																</div>
																<div class="col-sm-6">
																	<div class="form-group">
																		<label for="">MINI ACCOUNT<sup><span class="badge badge-light-danger">{{isset($AllowAccountInfo)  ? ($AllowAccountInfo->max != $broker4->max ? 'updated' : '' ) : "" }}</span></sup></label>
																		<span class="h4 text-danger broker-details">{{$broker4->max}}</span>
																		<div>
																			
																		</div>
																	</div>
																</div>
																<div class="col-sm-6">
																	<div class="form-group">
																		<label for="">PREMIUM ACCOUNT<sup><span class="badge badge-light-danger">{{isset($AllowAccountInfo)  ? ($AllowAccountInfo->premium != $broker4->premium ? 'updated' : '' ) : "" }}</span></sup></label>
																		<span class="h4 text-danger broker-details">{{$broker4->premium}}</span>
																		<div>
																			
																		</div>
																	</div>
																</div>
																<div class="col-sm-6">
																	<div class="form-group">
																		<label for="">DEMO ACCOUNT<sup><span class="badge badge-light-danger">{{isset($AllowAccountInfo)  ? ($AllowAccountInfo->demo != $broker4->demo ? 'updated' : '' ) : "" }}</span></sup></label>
																		<span class="h4 text-danger broker-details">{{$broker4->demo}}</span>
																		<div>
																			
																		</div>
																	</div>
																</div>
																<div class="col-sm-6">
																	
															<div class="form-group">
																<label for="">ISLAMIC ACCOUNT<sup><span class="badge badge-light-danger">{{isset($AllowAccountInfo)  ? ($AllowAccountInfo->islamic != $broker4->islamic ? 'updated' : '' ) : "" }}</span></sup></label>
																<span class="h4 text-danger broker-details">{{$broker4->islamic}}</span>
																<div>
																	
																</div>
															</div>
																</div>
																<div class="col-sm-6">
																	<div class="form-group">
																		<label for="">SEGREGATED ACCOUNT<sup><span class="badge badge-light-danger">{{isset($AllowAccountInfo)  ? ($AllowAccountInfo->segregated != $broker4->segregated ? 'updated' : '' ) : "" }}</span></sup></label>
																		<span class="h4 text-danger broker-details">{{$broker4->segregated}}</span>
																		<div>
																			
																		</div>
																	</div>
																</div>
																<div class="col-sm-6">
																	<div class="form-group">
																		<label for="">MANAGED ACCOUNT<sup><span class="badge badge-light-danger">{{isset($AllowAccountInfo)  ? ($AllowAccountInfo->managed != $broker4->managed ? 'updated' : '' ) : "" }}</span></sup></label>
																		<span class="h4 text-danger broker-details">{{$broker4->managed}}</span>
																		<div>
																			
																		</div>
																	</div>
																</div>
																<div class="col-sm-6">
																	<div class="form-group">
																		<label for="">SUITABLE FOR BEGINNERS<sup><span class="badge badge-light-danger">{{isset($AllowAccountInfo)  ? ($AllowAccountInfo->beginner != $broker4->beginner ? 'updated' : '' ) : "" }}</span></sup></label>
																		<span class="h4 text-danger broker-details">{{$broker4->beginner}}</span>
																		<div>
																			
																		</div>
																	</div>
																</div>
																<div class="col-sm-6">
																	<div class="form-group">
																		<label for="">SUITABLE FOR PROFESSIONALS<sup><span class="badge badge-light-danger">{{isset($AllowAccountInfo)  ? ($AllowAccountInfo->professional != $broker4->professional ? 'updated' : '' ) : "" }}</span></sup></label>
																		<span class="h4 text-danger broker-details">{{$broker4->professional}}</span>
																		<div>
																			
																		</div>
																	</div>
																</div>
																<div class="col-sm-6">
																	<div class="form-group">
																		<label for="">SUITABLE FOR SCALPING<sup><span class="badge badge-light-danger">{{isset($AllowAccountInfo)  ? ($AllowAccountInfo->scalping != $broker4->scalping ? 'updated' : '' ) : "" }}</span></sup></label>
																		<span class="h4 text-danger broker-details">{{$broker4->scalping}}</span>
																		<div>
																			
																		</div>
																	</div>
																</div>
																<div class="col-sm-6">
																	<div class="form-group">
																		<label for="">SUITABLE FOR DAILY TRADING<sup><span class="badge badge-light-danger">{{isset($AllowAccountInfo)  ? ($AllowAccountInfo->daily != $broker4->daily ? 'updated' : '' ) : "" }}</span></sup></label>
																		<span class="h4 text-danger broker-details">{{$broker4->daily}}</span>
																		<div>
																			
																		</div>
																	</div>
																</div>
																<div class="col-sm-6">
																	<div class="form-group">
																		<label for="">SUITABLE FOR WEEKLY TRADING<sup><span class="badge badge-light-danger">{{isset($AllowAccountInfo)  ? ($AllowAccountInfo->weekly != $broker4->weekly ? 'updated' : '' ) : "" }}</span></sup></label>
																		<span class="h4 text-danger broker-details">{{$broker4->weekly}}</span>
																		<div>
																			
																		</div>
																	</div>
																</div>
																<div class="col-sm-6">
																	<div class="form-group">
																		<label for="">SUITABLE FOR SWING TRADING<sup><span class="badge badge-light-danger">{{isset($AllowAccountInfo)  ? ($AllowAccountInfo->swing != $broker4->swing ? 'updated' : '' ) : "" }}</span></sup></label>
																		<span class="h4 text-danger broker-details">{{$broker4->swing}}</span>
																		<div>
																			
																		</div>
																	</div>
																</div>
															</div>
															<div>
																
															</div>
														</form>
													</div>
												</div>
											</div>
											<div class="tab-pane" id="TRADABLE" role="tabpanel">
												<div class="">
													<div class="card-header d-flex justify-content-between">
														<div class=" text-danger f-26">
															TRADABLE ASSETS
														</div>
														<div>
															@if($value['memberId'] == 1)
																@if($broker5->pending == 1)
																	<a href="{{URL::to('ustaad/brokerTradableAssets/allow')}}/{{$broker5->id}}" class="btn btn-outline-primary">
																		Allow
																	</a>
																@endif
															@endif
														</div>
													</div>
													<div class="card-body">
														<form action="">
															<div class="row">
																<div class="col-sm-6">
																	<div class="form-group">
																		<label for="">TRADES CURRENCIES <sup><span class="badge badge-light-danger">{{isset($AllowTradableAssets)  ? ($AllowTradableAssets->currency != $broker5->currency ? 'updated' : '' ) : "" }}</span></sup></label>
																		<span class="h4 text-danger broker-details">{{$broker5->currency}}</span>
																	</div>
																</div>
																<div class="col-sm-6">
																	<div class="form-group">
																		<label for="">TRADES COMMODITIES <sup><span class="badge badge-light-danger">{{isset($AllowTradableAssets)  ? ($AllowTradableAssets->tradeCommodities != $broker5->tradeCommodities ? 'updated' : '' ) : "" }}</span></sup></label>
																		<span class="h4 text-danger broker-details">{{$broker5->tradeCommodities}}</span>
																		<div>
																			
																		</div>
																	</div>
																</div>
																<div class="col-sm-6">
																	<div class="form-group">
																		<label for="">TRADES INDICES <sup><span class="badge badge-light-danger">{{isset($AllowTradableAssets)  ? ($AllowTradableAssets->tradeIndices != $broker5->tradeIndices ? 'updated' : '' ) : "" }}</span></sup></label>
																		<span class="h4 text-danger broker-details">{{$broker5->tradeIndices}}</span>
																		<div>
																			
																		</div>
																	</div>
																</div>
																<div class="col-sm-6">
																	<div class="form-group">
																		<label for="">TRADES STOCKS <sup><span class="badge badge-light-danger">{{isset($AllowTradableAssets)  ? ($AllowTradableAssets->tradeStocks != $broker5->tradeStocks ? 'updated' : '' ) : "" }}</span></sup></label>
																		<span class="h4 text-danger broker-details">{{$broker5->tradeStocks}}</span>
																		<div>
																			
																		</div>
																	</div>
																</div>
																<div class="col-sm-6">
																	<div class="form-group">
																		<label for="">TRADES CRYPTOCURRENCY <sup><span class="badge badge-light-danger">{{isset($AllowTradableAssets)  ? ($AllowTradableAssets->cryptocurrency != $broker5->cryptocurrency ? 'updated' : '' ) : "" }}</span></sup></label>
																		<span class="h4 text-danger broker-details">{{$broker5->cryptocurrency}}</span>
																		<div>
																			
																		</div>
																	</div>
																</div>
																<div class="col-sm-6">
																	<div class="form-group">
																		<label for="">TRADES ETF'S <sup><span class="badge badge-light-danger">{{isset($AllowTradableAssets)  ? ($AllowTradableAssets->etfs != $broker5->etfs ? 'updated' : '' ) : "" }}</span></sup></label>
																		<span class="h4 text-danger broker-details">{{$broker5->etfs}}</span>
																		<div>
																			
																		</div>
																	</div>
																</div>
																<div class="col-sm-6">
																	<div class="form-group">
																		<label for="">TRADES BONDS <sup><span class="badge badge-light-danger">{{isset($AllowTradableAssets)  ? ($AllowTradableAssets->tradeBonds != $broker5->tradeBonds ? 'updated' : '' ) : "" }}</span></sup></label>
																		<span class="h4 text-danger broker-details">{{$broker5->tradeBonds}}</span>
																		<div>
																			
																		</div>
																	</div>
																</div>
																<div class="col-sm-6">
																	<div class="form-group">
																		<label for="">TRADES FUTURES <sup><span class="badge badge-light-danger">{{isset($AllowTradableAssets)  ? ($AllowTradableAssets->tradeFuture != $broker5->tradeFuture ? 'updated' : '' ) : "" }}</span></sup></label>
																		<span class="h4 text-danger broker-details">{{$broker5->tradeFuture}}</span>
																		<div>
																			
																		</div>
																	</div>
																</div>
																<div class="col-sm-6">
																	<div class="form-group">
																		<label for="">TRADES OPTIONS <sup><span class="badge badge-light-danger">{{isset($AllowTradableAssets)  ? ($AllowTradableAssets->options != $broker5->options ? 'updated' : '' ) : "" }}</span></sup></label>
																		<span class="h4 text-danger broker-details">{{$broker5->options}}</span>
																		<div>
																			
																		</div>
																	</div>
																</div>
																<div class="col-sm-6">
																	
															<div class="form-group">
																<label for="">SUPPORTED CRYPTOCOINS <sup><span class="badge badge-light-danger">{{isset($AllowTradableAssets)  ? ($AllowTradableAssets->cryptocoins != $broker5->cryptocoins ? 'updated' : '' ) : "" }}</span></sup></label>
																<span class="h4 text-danger broker-details">{{$broker5->cryptocoins}}</span>
																<div>
																	
																</div>
															</div>
																</div>
																<div class="col-sm-6">
																	<div class="form-group">
																		<label for="">NUMBER OF TRADABLE ASSETS <sup><span class="badge badge-light-danger">{{isset($AllowTradableAssets)  ? ($AllowTradableAssets->tradableassets != $broker5->tradableassets ? 'updated' : '' ) : "" }}</span></sup></label>
																		<span class="h4 text-danger broker-details">{{$broker5->tradableassets}}</span>
																		<div>
																			
																		</div>
																	</div>
																</div>
																<div class="col-sm-6">
																	<div class="form-group">
																		<label for="">NUMBER OF CURRENCY PAIRS <sup><span class="badge badge-light-danger">{{isset($AllowTradableAssets)  ? ($AllowTradableAssets->currencypairs != $broker5->currencypairs ? 'updated' : '' ) : "" }}</span></sup></label>
																		<span class="h4 text-danger broker-details">{{$broker5->currencypairs}}</span>
																		<div>
																			
																		</div>
																	</div>
																</div>
																<div class="col-sm-6">
																	<div class="form-group">
																		<label for="">NUMBER OF CRYPTOCURRENCIES <sup><span class="badge badge-light-danger">{{isset($AllowTradableAssets)  ? ($AllowTradableAssets->cryptocurrencies != $broker5->cryptocurrencies ? 'updated' : '' ) : "" }}</span></sup></label>
																		<span class="h4 text-danger broker-details">{{$broker5->cryptocurrencies}}</span>
																		<div>
																			
																		</div>
																	</div>
																</div>
																<div class="col-sm-6">
																	<div class="form-group">
																		<label for="">NUMBER OF STOCKS <sup><span class="badge badge-light-danger">{{isset($AllowTradableAssets)  ? ($AllowTradableAssets->NoOfStocks != $broker5->NoOfStocks ? 'updated' : '' ) : "" }}</span></sup></label>
																		<span class="h4 text-danger broker-details">{{$broker5->NoOfStocks}}</span>
																		<div>
																			
																		</div>
																	</div>
																</div>
																<div class="col-sm-6">
																	<div class="form-group">
																		<label for="">NUMBER OF INDICES <sup><span class="badge badge-light-danger">{{isset($AllowTradableAssets)  ? ($AllowTradableAssets->noOfIndices != $broker5->noOfIndices ? 'updated' : '' ) : "" }}</span></sup></label>
																		<span class="h4 text-danger broker-details">{{$broker5->noOfIndices}}</span>
																		<div>
																			
																		</div>
																	</div>
																</div>
																<div class="col-sm-6">
																	<div class="form-group">
																		<label for="">NUMBER OF COMMODITIES <sup><span class="badge badge-light-danger">{{isset($AllowTradableAssets)  ? ($AllowTradableAssets->noOfCommodities != $broker5->noOfCommodities ? 'updated' : '' ) : "" }}</span></sup></label>
																		<span class="h4 text-danger broker-details">{{$broker5->noOfCommodities}}</span>
																		<div>
																			
																		</div>
																	</div>
																</div>
																<div class="col-sm-6">
																	<div class="form-group">
																		<label for="">NUMBER OF FUTURES <sup><span class="badge badge-light-danger">{{isset($AllowTradableAssets)  ? ($AllowTradableAssets->noOfFutures != $broker5->noOfFutures ? 'updated' : '' ) : "" }}</span></sup></label>
																		<span class="h4 text-danger broker-details">{{$broker5->noOfFutures}}</span>
																		<div>
																			
																		</div>
																	</div>
																</div>
																<div class="col-sm-6">
																	<div class="form-group">
																		<label for="">NUMBER OF OPTIONS <sup><span class="badge badge-light-danger">{{isset($AllowTradableAssets)  ? ($AllowTradableAssets->noOfOptions != $broker5->noOfOptions ? 'updated' : '' ) : "" }}</span></sup></label>
																		<span class="h4 text-danger broker-details">{{$broker5->noOfOptions}}</span>
																		<div>
																			
																		</div>
																	</div>
																</div>
																<div class="col-sm-6">
																	<div class="form-group">
																		<label for="">NUMBER OF BONDS <sup><span class="badge badge-light-danger">{{isset($AllowTradableAssets)  ? ($AllowTradableAssets->noOfBonds != $broker5->noOfBonds ? 'updated' : '' ) : "" }}</span></sup></label>
																		<span class="h4 text-danger broker-details">{{$broker5->noOfBonds}}</span>
																		<div>
																			
																		</div>
																	</div>
																</div>
															</div>
															<div>
																
															</div>
														</form>
													</div>
												</div>
											</div>
											<div class="tab-pane" id="TRADINGPLATFORMS" role="tabpanel">
												<div class="">
													<div class="card-header d-flex justify-content-between">
														<div class="text-danger f-26">
															TRADING PLATFORMS
														</div>
														<div>
															@if($value['memberId'] == 1)
																@if($broker6->pending == 1)
																	<a href="{{URL::to('ustaad/brokerPlatform/allow')}}/{{$broker6->id}}" class="btn btn-outline-primary">
																		Allow
																	</a>
																@endif
															@endif
														</div>
													</div>
													<div class="card-body">
														<form action="">
															<div class="form-group">
																<label for="">TRADING PLATFORMS <sup><span class="badge badge-light-danger">{{isset($AllowPlatform)  ? ($AllowPlatform->platform != $broker6->platform ? 'updated' : '' ) : "" }}</span></sup></label>
																<span class="h4 text-danger broker-details">{{$broker6->platform}}</span>
															</div>
															<div class="form-group">
																<label for="">OS COMPATIBILITY <sup><span class="badge badge-light-danger">{{isset($AllowPlatform)  ? ($AllowPlatform->os != $broker6->os ? 'updated' : '' ) : "" }}</span></sup></label>
																<span class="h4 text-danger broker-details">{{$broker6->os}}</span>
															</div>
															<div class="form-group">
																<label for="">MOBILE TRADING <sup><span class="badge badge-light-danger">{{isset($AllowPlatform)  ? ($AllowPlatform->mobile != $broker6->mobile ? 'updated' : '' ) : "" }}</span></sup></label>
																<span class="h4 text-danger broker-details">{{$broker6->mobile}}</span>
															</div>
															<div class="form-group">
																<label for="">TRADING PLATFORM SUPPORTED LANGUAGES <sup><span class="badge badge-light-danger">{{isset($AllowPlatform)  ? ($AllowPlatform->language != $broker6->language ? 'updated' : '' ) : "" }}</span></sup></label>
																<span class="h4 text-danger broker-details">{{$broker6->language}}</span>
															</div>
															
														</form>
													</div>
												</div>
											</div>
											<div class="tab-pane" id="TRADINGFEATURES" role="tabpanel">
												<div class="">
													<div class="card-header d-flex justify-content-between">
														<div class="text-danger f-26">
															TRADING FEATURES
														</div>
														<div>
															@if($value['memberId'] == 1)
																@if($broker7->pending == 1)
																	<a href="{{URL::to('ustaad/brokerFeature/allow')}}/{{$broker7->id}}" class="btn btn-outline-primary">
																		Allow
																	</a>
																@endif
															@endif
														</div>
													</div>
													<div class="card-body">
														<form action="">
															<div class="row">
																<div class="col-sm-6">
																	<div class="form-group">
																		<label for="">EDUCATIONAL SERVICES <sup><span class="badge badge-light-danger">{{isset($AllowTradingFeature)  ? ($AllowTradingFeature->educationServices != $broker7->educationServices ? 'updated' : '' ) : "" }}</span></sup></label>
																		<span class="h4 text-danger broker-details">{{$broker7->educationServices}}</span>
																	</div>
																</div>
																<div class="col-sm-6">
																	<div class="form-group">
																		<label for="">SOCIAL TRADING / COPY TRADING <sup><span class="badge badge-light-danger">{{isset($AllowTradingFeature)  ? ($AllowTradingFeature->social != $broker7->social ? 'updated' : '' ) : "" }}</span></sup></label>
																		<span class="h4 text-danger broker-details">{{$broker7->social}}</span>
																		<div>
																			
																		</div>
																	</div>
																</div>
																<div class="col-sm-6">
																	<div class="form-group">
																		<label for="">TRADING SIGNALS <sup><span class="badge badge-light-danger">{{isset($AllowTradingFeature)  ? ($AllowTradingFeature->signals != $broker7->signals ? 'updated' : '' ) : "" }}</span></sup></label>
																		<span class="h4 text-danger broker-details">{{$broker7->signals}}</span>
																		<div>
																			
																		</div>
																	</div>
																</div>
																<div class="col-sm-6">
																	<div class="form-group">
																		<label for="">EMAIL ALERTS <sup><span class="badge badge-light-danger">{{isset($AllowTradingFeature)  ? ($AllowTradingFeature->email != $broker7->email ? 'updated' : '' ) : "" }}</span></sup></label>
																		<span class="h4 text-danger broker-details">{{$broker7->email}}</span>
																		<div>
																			
																		</div>
																	</div>
																</div>
																<div class="col-sm-6">
																	<div class="form-group">
																		<label for="">GUARANTEED STOP LOSS <sup><span class="badge badge-light-danger">{{isset($AllowTradingFeature)  ? ($AllowTradingFeature->stop != $broker7->stop ? 'updated' : '' ) : "" }}</span></sup></label>
																		<span class="h4 text-danger broker-details">{{$broker7->stop}}</span>
																		<div>
																			
																		</div>
																	</div>
																</div>
																<div class="col-sm-6">
																	<div class="form-group">
																		<label for="">GUARANTEED LIMIT ORDERS <sup><span class="badge badge-light-danger">{{isset($AllowTradingFeature)  ? ($AllowTradingFeature->limited != $broker7->limited ? 'updated' : '' ) : "" }}</span></sup></label>
																		<span class="h4 text-danger broker-details">{{$broker7->limited}}</span>
																		<div>
																			
																		</div>
																	</div>
																</div>
																<div class="col-sm-6">
																	<div class="form-group">
																		<label for="">GUARANTEED FILLS / LIQUIDITY <sup><span class="badge badge-light-danger">{{isset($AllowTradingFeature)  ? ($AllowTradingFeature->guaranteed != $broker7->guaranteed ? 'updated' : '' ) : "" }}</span></sup></label>
																		<span class="h4 text-danger broker-details">{{$broker7->guaranteed}}</span>
																		<div>
																			
																		</div>
																	</div>
																</div>
																<div class="col-sm-6">
																	<div class="form-group">
																		<label for="">OCO ORDERS <sup><span class="badge badge-light-danger">{{isset($AllowTradingFeature)  ? ($AllowTradingFeature->oco != $broker7->oco ? 'updated' : '' ) : "" }}</span></sup></label>
																		<span class="h4 text-danger broker-details">{{$broker7->oco}}</span>
																		<div>
																			
																		</div>
																	</div>
																</div>
																<div class="col-sm-6">
																	<div class="form-group">
																		<label for="">TRAILING SP/TP <sup><span class="badge badge-light-danger">{{isset($AllowTradingFeature)  ? ($AllowTradingFeature->trailings != $broker7->trailings ? 'updated' : '' ) : "" }}</span></sup></label>
																		<span class="h4 text-danger broker-details">{{$broker7->trailings}}</span>
																		<div>
																			
																		</div>
																	</div>
																</div>
																<div class="col-sm-6">
																	<div class="form-group">
																		<label for="">AUTOMATED TRADING <sup><span class="badge badge-light-danger">{{isset($AllowTradingFeature)  ? ($AllowTradingFeature->automated != $broker7->automated ? 'updated' : '' ) : "" }}</span></sup></label>
																		<span class="h4 text-danger broker-details">{{$broker7->automated}}</span>
																	</div>
																</div>
																<div class="col-sm-6">
																	<div class="form-group">
																		<label for="">API TRADING <sup><span class="badge badge-light-danger">{{isset($AllowTradingFeature)  ? ($AllowTradingFeature->api != $broker7->api ? 'updated' : '' ) : "" }}</span></sup></label>
																		<span class="h4 text-danger broker-details">{{$broker7->api}}</span>
																		<div>
																			
																		</div>
																	</div>
																</div>
																<div class="col-sm-6">
																	<div class="form-group">
																		<label for="">VPS SERVICES <sup><span class="badge badge-light-danger">{{isset($AllowTradingFeature)  ? ($AllowTradingFeature->vps != $broker7->vps ? 'updated' : '' ) : "" }}</span></sup></label>
																		<span class="h4 text-danger broker-details">{{$broker7->vps}}</span>
																		<div>
																			
																		</div>
																	</div>
																</div>
																<div class="col-sm-6">
																	<div class="form-group">
																		<label for="">TRADING FROM CHART <sup><span class="badge badge-light-danger">{{isset($AllowTradingFeature)  ? ($AllowTradingFeature->chart != $broker7->chart ? 'updated' : '' ) : "" }}</span></sup></label>
																		<span class="h4 text-danger broker-details">{{$broker7->chart}}</span>
																		<div>
																			
																		</div>
																	</div>
																</div>
																<div class="col-sm-6">
																	<div class="form-group">
																		<label for="">INTEREST ON MARGIN <sup><span class="badge badge-light-danger">{{isset($AllowTradingFeature)  ? ($AllowTradingFeature->margin != $broker7->margin ? 'updated' : '' ) : "" }}</span></sup></label>
																		<span class="h4 text-danger broker-details">{{$broker7->margin}}</span>
																		<div>
																			
																		</div>
																	</div>
																</div>
																<div class="col-sm-6">
																	<div class="form-group">
																		<label for="">OFFERS HEDGING <sup><span class="badge badge-light-danger">{{isset($AllowTradingFeature)  ? ($AllowTradingFeature->hedging != $broker7->hedging ? 'updated' : '' ) : "" }}</span></sup></label>
																		<span class="h4 text-danger broker-details">{{$broker7->hedging}}</span>
																		<div>
																			
																		</div>
																	</div>
																</div>
																<div class="col-sm-6">
																	<div class="form-group">
																		<label for="">OFFERS PROMOTIONS <sup><span class="badge badge-light-danger">{{isset($AllowTradingFeature)  ? ($AllowTradingFeature->promotions != $broker7->promotions ? 'updated' : '' ) : "" }}</span></sup></label>
																		<span class="h4 text-danger broker-details">{{$broker7->promotions}}</span>
																		<div>
																			
																		</div>
																	</div>
																</div>
																<div class="col-sm-6">
																	<div class="form-group">
																		<label for="">ONE-CLICK TRADING <sup><span class="badge badge-light-danger">{{isset($AllowTradingFeature)  ? ($AllowTradingFeature->oneClick != $broker7->oneClick ? 'updated' : '' ) : "" }}</span></sup></label>
																		<span class="h4 text-danger broker-details">{{$broker7->oneClick}}</span>
																		<div>
																			
																		</div>
																	</div>
																</div>
																<div class="col-sm-6">
																	<div class="form-group">
																		<label for="">EXPERT ADVISORS (EA) <sup><span class="badge badge-light-danger">{{isset($AllowTradingFeature)  ? ($AllowTradingFeature->advisors != $broker7->advisors ? 'updated' : '' ) : "" }}</span></sup></label>
																		<span class="h4 text-danger broker-details">{{$broker7->advisors}}</span>
																		<div>
																			
																		</div>
																	</div>
																</div>
																<div class="col-sm-6">
																	<div class="form-group">
																		<label for="">OTHER TRADING FEATURES <sup><span class="badge badge-light-danger">{{isset($AllowTradingFeature)  ? ($AllowTradingFeature->features != $broker7->features ? 'updated' : '' ) : "" }}</span></sup></label>
																		<span class="h4 text-danger broker-details">{{$broker7->features}}</span>
																		<div>
																			
																		</div>
																	</div>
																</div>
															</div>
															<div>
																
															</div>
														</form>
													</div>
												</div>
											</div>
											<div class="tab-pane" id="CUSTOMER" role="tabpanel">
												<div class="">
													<div class="card-header d-flex justify-content-between">
														<div class="text-danger f-26">
															CUSTOMER SERVICE
														</div>
														<div>
															@if($value['memberId'] == 1)
																@if($broker8->pending == 1)
																	<a href="{{URL::to('ustaad/brokerCustomerServices/allow')}}/{{$broker8->id}}" class="btn btn-outline-primary">
																		Allow
																	</a>
																@endif
															@endif
														</div>
													</div>
													<div class="card-body">
														<form action="">
															<div class="form-group">
																<label for="">CUSTOMER SUPPORT LANGUAGES <sup><span class="badge badge-light-danger">{{isset($AllowCustomerServices)  ? ($AllowCustomerServices->languages != $broker8->languages ? 'updated' : '' ) : "" }}</span></sup></label>
																<span class="h4 text-danger broker-details">{{$broker8->languages}}</span>
															</div>
															<div class="form-group">
																<label for="">24H SUPPORT <sup><span class="badge badge-light-danger">{{isset($AllowCustomerServices)  ? ($AllowCustomerServices->supports != $broker8->supports ? 'updated' : '' ) : "" }}</span></sup></label>
																<span class="h4 text-danger broker-details">{{$broker8->supports}}</span>
															</div>
															<div class="form-group">
																<label for="">SUPPORT DURING WEEKENDS <sup><span class="badge badge-light-danger">{{isset($AllowCustomerServices)  ? ($AllowCustomerServices->weekend != $broker8->weekend ? 'updated' : '' ) : "" }}</span></sup></label>
																<span class="h4 text-danger broker-details">{{$broker8->weekend}}</span>
															</div>
															<div class="form-group">
																<label for="">LIVE CHAT <sup><span class="badge badge-light-danger">{{isset($AllowCustomerServices)  ? ($AllowCustomerServices->chat != $broker8->chat ? 'updated' : '' ) : "" }}</span></sup></label>
																<span class="h4 text-danger broker-details">{{$broker8->chat}}</span>
															</div>
															<div>
																
															</div>
														</form>
													</div>
												</div>
											</div>
											<div class="tab-pane" id="RESEARCH" role="tabpanel">
												<div class="">
													<div class="card-header d-flex justify-content-between">
														<div class="text-danger f-26">
															RESEARCH & EDUCATION
														</div>
														<div>
															@if($value['memberId'] == 1)
																@if($broker9->pending == 1)
																	<a href="{{URL::to('ustaad/brokerReserchEducation/allow')}}/{{$broker9->id}}" class="btn btn-outline-primary">
																		Allow
																	</a>
																@endif
															@endif
														</div>
													</div>
													<div class="card-body">
														<form action="">
															<div class="row">
																<div class="col-sm-6">
																	<div class="form-group">
																		<label for="">DAILY MARKET COMMENTARY <sup><span class="badge badge-light-danger">{{isset($AllowReserchEducation)  ? ($AllowReserchEducation->commentary != $broker9->commentary ? 'updated' : '' ) : "" }}</span></sup></label>
																		<span class="h4 text-danger broker-details">{{$broker9->commentary}}</span>
																	</div>
																</div>
																<div class="col-sm-6">
																	<div class="form-group">
																		<label for="">NEWS (TOP-TIER SOURCES) <sup><span class="badge badge-light-danger">{{isset($AllowReserchEducation)  ? ($AllowReserchEducation->news != $broker9->news ? 'updated' : '' ) : "" }}</span></sup></label>
																		<span class="h4 text-danger broker-details">{{$broker9->news}}</span>
																	</div>
																</div>
																<div class="col-sm-6">
																	<div class="form-group">
																		<label for="">AUTOCHARTIST <sup><span class="badge badge-light-danger">{{isset($AllowReserchEducation)  ? ($AllowReserchEducation->autochartist != $broker9->autochartist ? 'updated' : '' ) : "" }}</span></sup></label>
																		<span class="h4 text-danger broker-details">{{$broker9->autochartist}}</span>
																	</div>
																</div>
																<div class="col-sm-6">
																	<div class="form-group">
																		<label for="">TRADING CENTRAL (RECOGNIA) <sup><span class="badge badge-light-danger">{{isset($AllowReserchEducation)  ? ($AllowReserchEducation->tradingCentral != $broker9->tradingCentral ? 'updated' : '' ) : "" }}</span></sup></label>
																		<span class="h4 text-danger broker-details">{{$broker9->tradingCentral}}</span>
																	</div>
																</div>
																<div class="col-sm-6">
																	<div class="form-group">
																		<label for="">DELKOS RESEARCH <sup><span class="badge badge-light-danger">{{isset($AllowReserchEducation)  ? ($AllowReserchEducation->delkos != $broker9->delkos ? 'updated' : '' ) : "" }}</span></sup></label>
																		<span class="h4 text-danger broker-details">{{$broker9->delkos}}</span>
																	</div>
																</div>
																<div class="col-sm-6">
																	<div class="form-group">
																		<label for="">ACUITY TRADING <sup><span class="badge badge-light-danger">{{isset($AllowReserchEducation)  ? ($AllowReserchEducation->acuity != $broker9->acuity ? 'updated' : '' ) : "" }}</span></sup></label>
																		<span class="h4 text-danger broker-details">{{$broker9->acuity}}</span>
																	</div>
																</div>
																<div class="col-sm-6">
																	<div class="form-group">
																		<label for="">WEBINARS <sup><span class="badge badge-light-danger">{{isset($AllowReserchEducation)  ? ($AllowReserchEducation->webinars != $broker9->webinars ? 'updated' : '' ) : "" }}</span></sup></label>
																		<span class="h4 text-danger broker-details">{{$broker9->webinars}}</span>
																	</div>
																</div>
																<div class="col-sm-6">
																	<div class="form-group">
																		<label for="">VIDEO EDUCATION <sup><span class="badge badge-light-danger">{{isset($AllowReserchEducation)  ? ($AllowReserchEducation->education != $broker9->education ? 'updated' : '' ) : "" }}</span></sup></label>
																		<span class="h4 text-danger broker-details">{{$broker9->education}}</span>
																	</div>
																</div>
																<div class="col-sm-6">
																	<div class="form-group">
																		<label for="">ECONOMIC CALENDAR <sup><span class="badge badge-light-danger">{{isset($AllowReserchEducation)  ? ($AllowReserchEducation->calendar != $broker9->calendar ? 'updated' : '' ) : "" }}</span></sup></label>
																		<span class="h4 text-danger broker-details">{{$broker9->calendar}}</span>
																	</div>
																</div>
															</div>
															<div>
																
															</div>
														</form>
													</div>
												</div>
											</div>
											<div class="tab-pane" id="PROMOTIONS" role="tabpanel">
												<div class="">
													<div class="card-header d-flex justify-content-between">
														<div class="text-danger f-26">
															PROMOTIONS
														</div>
														<div>
															@if($value['memberId'] == 1)
																@if($broker->pending == 1)
																	<a href="{{URL::to('ustaad/brokerformPromotion/allow')}}/{{$broker->id}}" class="btn btn-outline-primary">
																		Allow
																	</a>
																@endif
															@endif
														</div>
													</div>
													<div class="card-body">
														<form action="">
															<div class="form-group">
																<label for="">PROMOTIONS <sup><span class="badge badge-light-danger">{{isset($AllowformPromotion)  ? ($AllowformPromotion->promotions != $broker->promotions ? 'updated' : '' ) : "" }}</span></sup></label>
																<span class="h4 text-danger broker-details">{{$broker->promotions}}</span>
															</div>
															<div class="form-group">
																<label for="">READ REVIEW <sup><span class="badge badge-light-danger">{{isset($AllowformPromotion)  ? ($AllowformPromotion->review != $broker->review ? 'updated' : '' ) : "" }}</span></sup></label>
																<span class="h4 text-danger broker-details">{{$broker->review}}</span>
															</div>
															<div class="form-group">
																<label for="">Link <sup><span class="badge badge-light-danger">{{isset($AllowformPromotion)  ? ($AllowformPromotion->link != $broker->link ? 'updated' : '' ) : "" }}</span></sup></label>
																<span class="h4 text-danger broker-details">{{$broker->link}}</span>
															</div>
															
															<div>
																
															</div>
														</form>
													</div>
												</div>
											</div>
											<div>
												<a href="{{URL::to('ustaad/editBroker')}}/{{$id}}">
													<input type="submit" id="doaction" class="btn btn-outline-danger" value="Edit">
												</a>
												<!-- @if($value['memberId'] == 1)
													@if($broker1->pending == 1)
														<a href="{{URL::to('ustaad/broker/allow')}}/{{$id}}" class="btn btn-outline-primary">
															Allow
														</a>
													@endif
												@endif -->
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
	<style>
		.broker-details{
			text-transform: uppercase;
    		padding-left: 20px;
		}
		
	/* Progress Bar */
	.progress {
		display: vertical;
		width: 100%;
		height: 12px;
		position: relative;
		z-index: 5;
		padding-right: 8px;
		padding-top: 2px;
	}
	@media all and (min--moz-device-pixel-ratio:0) and (min-resolution: 3e1dpcm) {
		.progress {
			height: 10px;
		}
	}
	.progress[value] {
		background-color: transparent;
		border: 0;
		appearance: none;
		border-radius: 0;
	}
	.progress[value]::-ms-fill {
		background-color: #0074d9;
		border: 0;
	}
	.progress[value]::-moz-progress-bar {
		background-color: #0074d9;
		margin-right: 8px;
	}
	.progress[value]::-webkit-progress-inner-element {
		background-color: #eee;
	}
	.progress[value]::-webkit-progress-value {
		background-color: #0074d9;
	}
	.progress[value]::-webkit-progress-bar {
		background-color: #eee;
	}
	.progress-circle {
		width: 24px;
		height: 24px;
		position: absolute;
		right: 3px;
		top: -5px;
		z-index: 5;
		border-radius: 50%;
	}
	.progress-circle:before {
		content: "";
		width: 6px;
		height: 6px;
		background: white;
		border-radius: 50%;
		display: block;
		transform: translate(-50%, -50%);
		position: absolute;
		left: 50%;
		top: 50%;
	}
	.progress-group {
		margin-top: 36px;
	}
	@media (max-width: 991px) {
		.progress-group {
			margin-left: -18px;
			margin-right: -18px;
			flex-basis: 100%;
			padding: 18px;
		}
	}
	@media (max-width: 768px) {
		.progress-group {
			padding: 18px 18px 0;
			margin-bottom: 12px;
		}
	}
	.progress-group .title {
		margin-bottom: 18px;
	}
	.progress-group .wrapper {
		background: white;
		border: 1px solid #eee;
		border-radius: 12px;
		height: 14px;
		display: flex;
		filter: drop-shadow(0 0 1px rgba(0, 0, 0, 0.3));
	}
	.progress-group .step {
		width: 20%;
		position: relative;
	}
	.progress-group .step:after {
		content: "";
		height: 30px;
		width: 30px;
		background: white;
		border-radius: 50%;
		display: block;
		position: absolute;
		right: 0;
		top: 50%;
		transform: translateY(-50%);
	}
	.progress-group .step:first-of-type .progress {
		padding-left: 4px;
	}
	.progress-group .step:first-of-type .progress[value]::-moz-progress-bar {
		border-radius: 5px 0 0 5px;
	}
	.progress-group .step:first-of-type .progress[value]::-webkit-progress-value {
		border-radius: 5px 0 0 5px;
	}
	.progress-group .step:not(:first-of-type) .progress[value]::-moz-progress-bar {
		border-radius: 0;
	}
	.progress-group .step:not(:first-of-type) .progress[value]::-webkit-progress-value {
		border-radius: 0;
	}
	.progress-group .step .progress[value] + .progress-circle {
		background: #eee;
	}
	.progress-group .step.step01 .progress[value]::-moz-progress-bar {
		background-color: #010c4e;
	}
	.progress-group .step.step01 .progress[value]::-webkit-progress-value {
		background-color: #010c4e;
	}
	.progress-group .step.step01 .progress[value="100"] + .progress-circle {
		background-color: #010c4e;
	}
	.progress-group .step.step02 .progress[value]::-moz-progress-bar {
		background-color: #002d88;
	}
	.progress-group .step.step02 .progress[value]::-webkit-progress-value {
		background-color: #002d88;
	}
	.progress-group .step.step02 .progress[value="100"] + .progress-circle {
		background-color: #002d88;
	}
	.progress-group .step.step03 .progress[value]::-moz-progress-bar {
		background-color: #017aa9;
	}
	.progress-group .step.step03 .progress[value]::-webkit-progress-value {
		background-color: #017aa9;
	}
	.progress-group .step.step03 .progress[value="100"] + .progress-circle {
		background-color: #017aa9;
	}
	.progress-group .step.step04 .progress[value]::-moz-progress-bar {
		background-color: #03c2b2;
	}
	.progress-group .step.step04 .progress[value]::-webkit-progress-value {
		background-color: #03c2b2;
	}
	.progress-group .step.step04 .progress[value="100"] + .progress-circle {
		background-color: #03c2b2;
	}
	.progress-group .step.step05 .progress[value]::-moz-progress-bar {
		background-color: #05e8b0;
	}
	.progress-group .step.step05 .progress[value]::-webkit-progress-value {
		background-color: #05e8b0;
	}
	.progress-group .step.step05 .progress[value="100"] + .progress-circle {
		background-color: #05e8b0;
	}
	.progress-labels {
		display: flex;
		justify-content: space-between;
	}
	.progress-labels .label {
		text-align: center;
		text-transform: uppercase;
		margin: 12px 0;
		width: 20%;
		font-size: 11px;
		padding-right: 24px;
		font-weight: 600;
		opacity: 0.7;
	}
	.page-title {
		letter-spacing: -0.05rem;
	}
	</style>
@include('admin.include.footer')

	@php
		$prograssBar = 0;
		if($broker1->title != null){
			$prograssBar += 50;
		}
		if($broker2->deposit != null){
			$prograssBar += 50;
		}
		if($broker3->commission != null){
			$prograssBar += 50;
		}
		if($broker4->trade != null){
			$prograssBar += 50;
		}
		if($broker5->currency != null){
			$prograssBar += 50;
		}
		if($broker6->platform != null){
			$prograssBar += 50;
		}
		if($broker7->educationServices != null){
			$prograssBar += 50;
		}
		if($broker8->supports != null){
			$prograssBar += 50;
		}
		if($broker9->commentary != null){
			$prograssBar += 50;
		}
		if($broker->promotions != null){
			$prograssBar += 50;
		}
	@endphp

		<script>
			var i = {{$prograssBar}};
			if(i > 0 && i<= 100){
				console.log("dsa");
				$(".progress1").attr("value",i);
			}else if(i > 100 && i <= 200){
				console.log("dsa");
				$(".progress1").attr("value",100);
				let r = i - 100;
				$(".progress2").attr("value",r);
			}else if(i > 200 && i <= 300){
				console.log("dsa");
				$(".progress1").attr("value",100);
				$(".progress2").attr("value",100);
				let r = i - 200;
				$(".progress3").attr("value",r);
			}else if(i > 300 && i <= 400){
				console.log("dsa");
				$(".progress1").attr("value",100);
				$(".progress2").attr("value",100);
				$(".progress3").attr("value",100);
				let r = i - 300;
				$(".progress4").attr("value",r);
			}else if(i > 400 && i <= 500){
				console.log("dsa");
				$(".progress1").attr("value",100);
				$(".progress2").attr("value",100);
				$(".progress3").attr("value",100);
				$(".progress4").attr("value",100);
				let r = i - 400;
				console.log(r);
				$(".progress5").attr("value",r);
			}
				console.log(i);
		</script>
<style>
	.nav-fill .nav-item .nav-link{
		padding:15px;
	}
	.nav-fill .nav-item .active{
		color:#4099ff;
		background-color:white;
	}
</style>



