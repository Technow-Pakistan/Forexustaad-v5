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
                                    <div class="wrapper">
                                        <div class="progress-bar text-center">
                                          <div class="progress" style="width:0%; background-position:0%;"><span style="poistion:absolute;"></span></div>
                                        </div>
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
										<div class="tab-content">
											<div class="tab-pane active" id="COMPANYINFORMATION" role="tabpanel">
												<div class="">
													<div class="card-header text-danger f-26">
														COMPANY INFORMATION
													</div>
													<div class="card-body">
														<form action="">
															<div class="row">
																<div class="col-sm-6">
																	<div class="form-group">
																		<label for="">Title</label>
																		<span class="h4 text-danger broker-details">{{$broker1->title}}</span>
																	</div>
																</div>
																<div class="col-sm-6">
																	<div class="form-group">
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
																		<label for="">REGULATIONS:</label>
																		<span class="h4 text-danger broker-details">{{$broker1->regulations}}</span>
																	</div>
																</div>
																<div class="col-sm-6">
																	<div class="form-group">
																		<label for="">HEADQUARTERS COUNTRY</label>
																		<span class="h4 text-danger broker-details">{{$broker1->headquaters}}</span>
																	</div>
																</div>
																<div class="col-sm-6">
																	<div class="form-group">
																		<label for="">FOUNDATION YEAR</label>
																		<span class="h4 text-danger broker-details">{{$broker1->foundation}}</span>
																	</div>
																</div>
																<div class="col-sm-6">
																	<div class="form-group">
																		<label for="">PUBLICLY TRADED</label>
																		<span class="h4 text-danger broker-details">{{$broker1->traded}}</span>
																	</div>
																</div>
																<div class="col-sm-6">
																	<div class="form-group">
																		<label for="">NUMBER OF EMPLOYEES</label>
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
													<div class="card-header text-danger f-26">
														DEPOSIT & WITHDRAWAL
													</div>
													<div class="card-body">
														<form action="">
															<div class="form-group">
																<label for="">DEPOSIT OPTIONS</label>
																<span class="h4 text-danger broker-details">{{$broker2->deposit}}</span>
															</div>
															<div class="form-group">
																<label for="">WITHDRAWAL OPTIONS</label>
																<span class="h4 text-danger broker-details">{{$broker2->withdrawal}}</span>
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
														<form action="">
															<div class="form-group">
																<label for="">COMMISSION ON TRADES</label>
																<span class="h4 text-danger broker-details">{{$broker3->commission}}</span>
															</div>
															<div class="form-group">
																<label for="">FIXED SPREADS</label>
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
													<div class="card-header text-danger f-26">
														ACCOUNT INFORMATION
													</div>
													<div class="card-body">
														<form action="">
															<div class="row">
																<div class="col-sm-6">
																	<div class="form-group">
																		<label for="">TRADING DESK TYPE</label>
																		<span class="h4 text-danger broker-details">{{$broker4->trade}}</span>
																	</div>
																</div>
																<div class="col-sm-6">
																	<div class="form-group">
																		<label for="">MIN DEPOSIT</label>
																		<span class="h4 text-danger broker-details">{{$broker4->min}}</span>
																		<div>
																			
																		</div>
																	</div>
																</div>
																<div class="col-sm-6">
																	<div class="form-group">
																		<label for="">MAX LEVERAGE</label>
																		<span class="h4 text-danger broker-details">{{$broker4->mini}}</span>
																		<div>
																			
																		</div>
																	</div>
																</div>
																<div class="col-sm-6">
																	<div class="form-group">
																		<label for="">MINI ACCOUNT</label>
																		<span class="h4 text-danger broker-details">{{$broker4->max}}</span>
																		<div>
																			
																		</div>
																	</div>
																</div>
																<div class="col-sm-6">
																	<div class="form-group">
																		<label for="">PREMIUM ACCOUNT</label>
																		<span class="h4 text-danger broker-details">{{$broker4->premium}}</span>
																		<div>
																			
																		</div>
																	</div>
																</div>
																<div class="col-sm-6">
																	<div class="form-group">
																		<label for="">DEMO ACCOUNT</label>
																		<span class="h4 text-danger broker-details">{{$broker4->demo}}</span>
																		<div>
																			
																		</div>
																	</div>
																</div>
																<div class="col-sm-6">
																	
															<div class="form-group">
																<label for="">ISLAMIC ACCOUNT</label>
																<span class="h4 text-danger broker-details">{{$broker4->islamic}}</span>
																<div>
																	
																</div>
															</div>
																</div>
																<div class="col-sm-6">
																	<div class="form-group">
																		<label for="">SEGREGATED ACCOUNT</label>
																		<span class="h4 text-danger broker-details">{{$broker4->segregated}}</span>
																		<div>
																			
																		</div>
																	</div>
																</div>
																<div class="col-sm-6">
																	<div class="form-group">
																		<label for="">MANAGED ACCOUNT</label>
																		<span class="h4 text-danger broker-details">{{$broker4->managed}}</span>
																		<div>
																			
																		</div>
																	</div>
																</div>
																<div class="col-sm-6">
																	<div class="form-group">
																		<label for="">SUITABLE FOR BEGINNERS</label>
																		<span class="h4 text-danger broker-details">{{$broker4->beginner}}</span>
																		<div>
																			
																		</div>
																	</div>
																</div>
																<div class="col-sm-6">
																	<div class="form-group">
																		<label for="">SUITABLE FOR PROFESSIONALS</label>
																		<span class="h4 text-danger broker-details">{{$broker4->professional}}</span>
																		<div>
																			
																		</div>
																	</div>
																</div>
																<div class="col-sm-6">
																	<div class="form-group">
																		<label for="">SUITABLE FOR SCALPING</label>
																		<span class="h4 text-danger broker-details">{{$broker4->scalping}}</span>
																		<div>
																			
																		</div>
																	</div>
																</div>
																<div class="col-sm-6">
																	<div class="form-group">
																		<label for="">SUITABLE FOR DAILY TRADING</label>
																		<span class="h4 text-danger broker-details">{{$broker4->daily}}</span>
																		<div>
																			
																		</div>
																	</div>
																</div>
																<div class="col-sm-6">
																	<div class="form-group">
																		<label for="">SUITABLE FOR WEEKLY TRADING</label>
																		<span class="h4 text-danger broker-details">{{$broker4->weekly}}</span>
																		<div>
																			
																		</div>
																	</div>
																</div>
																<div class="col-sm-6">
																	<div class="form-group">
																		<label for="">SUITABLE FOR SWING TRADING</label>
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
													<div class="card-header text-danger f-26">
														TRADABLE ASSETS
													</div>
													<div class="card-body">
														<form action="">
															<div class="row">
																<div class="col-sm-6">
																	<div class="form-group">
																		<label for="">TRADES CURRENCIES</label>
																		<span class="h4 text-danger broker-details">{{$broker5->currency}}</span>
																	</div>
																</div>
																<div class="col-sm-6">
																	<div class="form-group">
																		<label for="">TRADES COMMODITIES</label>
																		<span class="h4 text-danger broker-details">{{$broker5->tradeCommodities}}</span>
																		<div>
																			
																		</div>
																	</div>
																</div>
																<div class="col-sm-6">
																	<div class="form-group">
																		<label for="">TRADES INDICES</label>
																		<span class="h4 text-danger broker-details">{{$broker5->tradeIndices}}</span>
																		<div>
																			
																		</div>
																	</div>
																</div>
																<div class="col-sm-6">
																	<div class="form-group">
																		<label for="">TRADES STOCKS</label>
																		<span class="h4 text-danger broker-details">{{$broker5->tradeStocks}}</span>
																		<div>
																			
																		</div>
																	</div>
																</div>
																<div class="col-sm-6">
																	<div class="form-group">
																		<label for="">TRADES CRYPTOCURRENCY</label>
																		<span class="h4 text-danger broker-details">{{$broker5->cryptocurrency}}</span>
																		<div>
																			
																		</div>
																	</div>
																</div>
																<div class="col-sm-6">
																	<div class="form-group">
																		<label for="">TRADES ETF'S</label>
																		<span class="h4 text-danger broker-details">{{$broker5->etfs}}</span>
																		<div>
																			
																		</div>
																	</div>
																</div>
																<div class="col-sm-6">
																	<div class="form-group">
																		<label for="">TRADES BONDS</label>
																		<span class="h4 text-danger broker-details">{{$broker5->tradeBonds}}</span>
																		<div>
																			
																		</div>
																	</div>
																</div>
																<div class="col-sm-6">
																	<div class="form-group">
																		<label for="">TRADES FUTURES</label>
																		<span class="h4 text-danger broker-details">{{$broker5->tradeFuture}}</span>
																		<div>
																			
																		</div>
																	</div>
																</div>
																<div class="col-sm-6">
																	<div class="form-group">
																		<label for="">TRADES OPTIONS</label>
																		<span class="h4 text-danger broker-details">{{$broker5->options}}</span>
																		<div>
																			
																		</div>
																	</div>
																</div>
																<div class="col-sm-6">
																	
															<div class="form-group">
																<label for="">SUPPORTED CRYPTOCOINS</label>
																<span class="h4 text-danger broker-details">{{$broker5->cryptocoins}}</span>
																<div>
																	
																</div>
															</div>
																</div>
																<div class="col-sm-6">
																	<div class="form-group">
																		<label for="">NUMBER OF TRADABLE ASSETS</label>
																		<span class="h4 text-danger broker-details">{{$broker5->tradableassets}}</span>
																		<div>
																			
																		</div>
																	</div>
																</div>
																<div class="col-sm-6">
																	<div class="form-group">
																		<label for="">NUMBER OF CURRENCY PAIRS</label>
																		<span class="h4 text-danger broker-details">{{$broker5->currencypairs}}</span>
																		<div>
																			
																		</div>
																	</div>
																</div>
																<div class="col-sm-6">
																	<div class="form-group">
																		<label for="">NUMBER OF CRYPTOCURRENCIES</label>
																		<span class="h4 text-danger broker-details">{{$broker5->cryptocurrencies}}</span>
																		<div>
																			
																		</div>
																	</div>
																</div>
																<div class="col-sm-6">
																	<div class="form-group">
																		<label for="">NUMBER OF STOCKS</label>
																		<span class="h4 text-danger broker-details">{{$broker5->NoOfStocks}}</span>
																		<div>
																			
																		</div>
																	</div>
																</div>
																<div class="col-sm-6">
																	<div class="form-group">
																		<label for="">NUMBER OF INDICES</label>
																		<span class="h4 text-danger broker-details">{{$broker5->noOfIndices}}</span>
																		<div>
																			
																		</div>
																	</div>
																</div>
																<div class="col-sm-6">
																	<div class="form-group">
																		<label for="">NUMBER OF COMMODITIES</label>
																		<span class="h4 text-danger broker-details">{{$broker5->noOfCommodities}}</span>
																		<div>
																			
																		</div>
																	</div>
																</div>
																<div class="col-sm-6">
																	<div class="form-group">
																		<label for="">NUMBER OF FUTURES</label>
																		<span class="h4 text-danger broker-details">{{$broker5->noOfFutures}}</span>
																		<div>
																			
																		</div>
																	</div>
																</div>
																<div class="col-sm-6">
																	<div class="form-group">
																		<label for="">NUMBER OF OPTIONS</label>
																		<span class="h4 text-danger broker-details">{{$broker5->noOfOptions}}</span>
																		<div>
																			
																		</div>
																	</div>
																</div>
																<div class="col-sm-6">
																	<div class="form-group">
																		<label for="">NUMBER OF BONDS</label>
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
													<div class="card-header text-danger f-26">
														TRADING PLATFORMS
													</div>
													<div class="card-body">
														<form action="">
															<div class="form-group">
																<label for="">TRADING PLATFORMS</label>
																<span class="h4 text-danger broker-details">{{$broker6->platform}}</span>
															</div>
															<div class="form-group">
																<label for="">OS COMPATIBILITY</label>
																<span class="h4 text-danger broker-details">{{$broker6->os}}</span>
															</div>
															<div class="form-group">
																<label for="">MOBILE TRADING</label>
																<span class="h4 text-danger broker-details">{{$broker6->mobile}}</span>
															</div>
															<div class="form-group">
																<label for="">TRADING PLATFORM SUPPORTED LANGUAGES</label>
																<span class="h4 text-danger broker-details">{{$broker6->language}}</span>
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
														<form action="">
															<div class="row">
																<div class="col-sm-6">
																	<div class="form-group">
																		<label for="">EDUCATIONAL SERVICES</label>
																		<span class="h4 text-danger broker-details">{{$broker7->educationServices}}</span>
																	</div>
																</div>
																<div class="col-sm-6">
																	<div class="form-group">
																		<label for="">SOCIAL TRADING / COPY TRADING</label>
																		<span class="h4 text-danger broker-details">{{$broker7->social}}</span>
																		<div>
																			
																		</div>
																	</div>
																</div>
																<div class="col-sm-6">
																	<div class="form-group">
																		<label for="">TRADING SIGNALS</label>
																		<span class="h4 text-danger broker-details">{{$broker7->signals}}</span>
																		<div>
																			
																		</div>
																	</div>
																</div>
																<div class="col-sm-6">
																	<div class="form-group">
																		<label for="">EMAIL ALERTS</label>
																		<span class="h4 text-danger broker-details">{{$broker7->email}}</span>
																		<div>
																			
																		</div>
																	</div>
																</div>
																<div class="col-sm-6">
																	<div class="form-group">
																		<label for="">GUARANTEED STOP LOSS</label>
																		<span class="h4 text-danger broker-details">{{$broker7->stop}}</span>
																		<div>
																			
																		</div>
																	</div>
																</div>
																<div class="col-sm-6">
																	<div class="form-group">
																		<label for="">GUARANTEED LIMIT ORDERS</label>
																		<span class="h4 text-danger broker-details">{{$broker7->limited}}</span>
																		<div>
																			
																		</div>
																	</div>
																</div>
																<div class="col-sm-6">
																	<div class="form-group">
																		<label for="">GUARANTEED FILLS / LIQUIDITY</label>
																		<span class="h4 text-danger broker-details">{{$broker7->guaranteed}}</span>
																		<div>
																			
																		</div>
																	</div>
																</div>
																<div class="col-sm-6">
																	<div class="form-group">
																		<label for="">OCO ORDERS</label>
																		<span class="h4 text-danger broker-details">{{$broker7->oco}}</span>
																		<div>
																			
																		</div>
																	</div>
																</div>
																<div class="col-sm-6">
																	<div class="form-group">
																		<label for="">TRAILING SP/TP</label>
																		<span class="h4 text-danger broker-details">{{$broker7->trailings}}</span>
																		<div>
																			
																		</div>
																	</div>
																</div>
																<div class="col-sm-6">
																	<div class="form-group">
																		<label for="">AUTOMATED TRADING</label>
																		<span class="h4 text-danger broker-details">{{$broker7->automated}}</span>
																	</div>
																</div>
																<div class="col-sm-6">
																	<div class="form-group">
																		<label for="">API TRADING</label>
																		<span class="h4 text-danger broker-details">{{$broker7->api}}</span>
																		<div>
																			
																		</div>
																	</div>
																</div>
																<div class="col-sm-6">
																	<div class="form-group">
																		<label for="">VPS SERVICES</label>
																		<span class="h4 text-danger broker-details">{{$broker7->vps}}</span>
																		<div>
																			
																		</div>
																	</div>
																</div>
																<div class="col-sm-6">
																	<div class="form-group">
																		<label for="">TRADING FROM CHART</label>
																		<span class="h4 text-danger broker-details">{{$broker7->chart}}</span>
																		<div>
																			
																		</div>
																	</div>
																</div>
																<div class="col-sm-6">
																	<div class="form-group">
																		<label for="">INTEREST ON MARGIN</label>
																		<span class="h4 text-danger broker-details">{{$broker7->margin}}</span>
																		<div>
																			
																		</div>
																	</div>
																</div>
																<div class="col-sm-6">
																	<div class="form-group">
																		<label for="">OFFERS HEDGING</label>
																		<span class="h4 text-danger broker-details">{{$broker7->hedging}}</span>
																		<div>
																			
																		</div>
																	</div>
																</div>
																<div class="col-sm-6">
																	<div class="form-group">
																		<label for="">OFFERS PROMOTIONS</label>
																		<span class="h4 text-danger broker-details">{{$broker7->promotions}}</span>
																		<div>
																			
																		</div>
																	</div>
																</div>
																<div class="col-sm-6">
																	<div class="form-group">
																		<label for="">ONE-CLICK TRADING</label>
																		<span class="h4 text-danger broker-details">{{$broker7->oneClick}}</span>
																		<div>
																			
																		</div>
																	</div>
																</div>
																<div class="col-sm-6">
																	<div class="form-group">
																		<label for="">EXPERT ADVISORS (EA)</label>
																		<span class="h4 text-danger broker-details">{{$broker7->advisors}}</span>
																		<div>
																			
																		</div>
																	</div>
																</div>
																<div class="col-sm-6">
																	<div class="form-group">
																		<label for="">OTHER TRADING FEATURES</label>
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
													<div class="card-header text-danger f-26">
														CUSTOMER SERVICE
													</div>
													<div class="card-body">
														<form action="">
															<div class="form-group">
																<label for="">CUSTOMER SUPPORT LANGUAGES</label>
																<span class="h4 text-danger broker-details">{{$broker8->languages}}</span>
															</div>
															<div class="form-group">
																<label for="">24H SUPPORT</label>
																<span class="h4 text-danger broker-details">{{$broker8->supports}}</span>
															</div>
															<div class="form-group">
																<label for="">SUPPORT DURING WEEKENDS</label>
																<span class="h4 text-danger broker-details">{{$broker8->weekend}}</span>
															</div>
															<div class="form-group">
																<label for="">LIVE CHAT</label>
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
													<div class="card-header text-danger f-26">
														RESEARCH & EDUCATION
													</div>
													<div class="card-body">
														<form action="">
															<div class="row">
																<div class="col-sm-6">
																	<div class="form-group">
																		<label for="">DAILY MARKET COMMENTARY</label>
																		<span class="h4 text-danger broker-details">{{$broker9->commentary}}</span>
																	</div>
																</div>
																<div class="col-sm-6">
																	<div class="form-group">
																		<label for="">NEWS (TOP-TIER SOURCES)</label>
																		<span class="h4 text-danger broker-details">{{$broker9->news}}</span>
																	</div>
																</div>
																<div class="col-sm-6">
																	<div class="form-group">
																		<label for="">AUTOCHARTIST</label>
																		<span class="h4 text-danger broker-details">{{$broker9->autochartist}}</span>
																	</div>
																</div>
																<div class="col-sm-6">
																	<div class="form-group">
																		<label for="">TRADING CENTRAL (RECOGNIA)</label>
																		<span class="h4 text-danger broker-details">{{$broker9->tradingCentral}}</span>
																	</div>
																</div>
																<div class="col-sm-6">
																	<div class="form-group">
																		<label for="">DELKOS RESEARCH</label>
																		<span class="h4 text-danger broker-details">{{$broker9->delkos}}</span>
																	</div>
																</div>
																<div class="col-sm-6">
																	<div class="form-group">
																		<label for="">ACUITY TRADING</label>
																		<span class="h4 text-danger broker-details">{{$broker9->acuity}}</span>
																	</div>
																</div>
																<div class="col-sm-6">
																	<div class="form-group">
																		<label for="">WEBINARS</label>
																		<span class="h4 text-danger broker-details">{{$broker9->webinars}}</span>
																	</div>
																</div>
																<div class="col-sm-6">
																	<div class="form-group">
																		<label for="">VIDEO EDUCATION</label>
																		<span class="h4 text-danger broker-details">{{$broker9->education}}</span>
																	</div>
																</div>
																<div class="col-sm-6">
																	<div class="form-group">
																		<label for="">ECONOMIC CALENDAR</label>
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
													<div class="card-header text-danger f-26">
														PROMOTIONS
													</div>
													<div class="card-body">
														<form action="">
															<div class="form-group">
																<label for="">PROMOTIONS</label>
																<span class="h4 text-danger broker-details">{{$broker->promotions}}</span>
															</div>
															<div class="form-group">
																<label for="">READ REVIEW</label>
																<span class="h4 text-danger broker-details">{{$broker->review}}</span>
															</div>
															<div class="form-group">
																<label for="">Link</label>
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
												@if($value['memberId'] == 1)
													@if($broker1->pending == 1)
														<a href="{{URL::to('ustaad/broker/allow')}}/{{$id}}" class="btn btn-outline-primary">
															Allow
														</a>
													@endif
												@endif
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
	</style>
@include('admin.include.footer')

	@php
		$prograssBar = 0;
		if($broker1->title != null){
			$prograssBar += 10;
		}
		if($broker2->deposit != null){
			$prograssBar += 10;
		}
		if($broker3->commission != null){
			$prograssBar += 10;
		}
		if($broker4->trade != null){
			$prograssBar += 10;
		}
		if($broker5->currency != null){
			$prograssBar += 10;
		}
		if($broker6->platform != null){
			$prograssBar += 10;
		}
		if($broker7->educationServices != null){
			$prograssBar += 10;
		}
		if($broker8->supports != null){
			$prograssBar += 10;
		}
		if($broker9->commentary != null){
			$prograssBar += 10;
		}
		if($broker->promotions != null){
			$prograssBar += 10;
		}
	@endphp

	<script>
        var data = {{$prograssBar}};
        var info = data + "%";
        $('.progress').html("<span style='margin-left:50%;'></span>" + info);
        $('.progress').css("width",info);
        $('.progress').css("background-position",info);
	</script>
<style>
	.progress-bar {
	height: 30px;
	margin: 30px auto;
	background: #d3d3d3;
	padding: 2px;
	border-radius: 4px;
	border: 1px solid #bbb;
	}

	.progress {
	/* transition: width 200ms ease-in */
	height: 100%;
	border-radius: 3px;
	background-size: 12000px 1px;
	background-image: url("http://monosnap.com/image/mp0hB7ZLP9c0967wBx6p4pDjujqzhP.png");
	}
	.nav-fill .nav-item .nav-link{
		padding:15px;
	}
	.nav-fill .nav-item .active{
		color:#4099ff;
		background-color:white;
	}
</style>



