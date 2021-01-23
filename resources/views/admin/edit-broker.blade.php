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
									<h5 class="m-b-10">Add Broker</h5>
								</div>
								<ul class="breadcrumb">
									<li class="breadcrumb-item">
										<a href="{{URL::to('/ustaad/dashboard')}}"><i class="feather icon-home"></i></a>
									</li>
									<li class="breadcrumb-item"><a href="{{URL::to('/ustaad/allbrokers')}}/{{$value['memberId']}}">All Broker</a></li>
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
										<a class="nav-link @if(Session::has('activeFormsData')){{Session::get('activeFormsData') == 'COMPANY INFORMATION' ? 'active' : ''}}@else active @endif" data-toggle="tab" href="#COMPANYINFORMATION
										" role="tab">COMPANY INFORMATION
										</a>
										<div class="slide bg-c-blue"></div>
									</li>
									<li class="nav-item">
										<a class="nav-link @if(Session::has('activeFormsData')){{Session::get('activeFormsData') == 'DEPOSIT & WITHDRAWAL' ? 'active' : ''}}@endif" data-toggle="tab" href="#DEPOSIT" role="tab">DEPOSIT & WITHDRAWAL
										</a>
										<div class="slide bg-c-green"></div>
									</li>
									<li class="nav-item">
										<a class="nav-link @if(Session::has('activeFormsData')){{Session::get('activeFormsData') == 'COMMISSIONS & FEES' ? 'active' : ''}}@endif" data-toggle="tab" href="#COMMISSIONS" role="tab">COMMISSIONS & FEES
										</a>
										<div class="slide bg-c-red"></div>
									</li>
									<li class="nav-item">
										<a class="nav-link @if(Session::has('activeFormsData')){{Session::get('activeFormsData') == 'ACCOUNT INFORMATION' ? 'active' : ''}}@endif" data-toggle="tab" href="#ACCOUNT" role="tab">ACCOUNT INFORMATION
										</a>
										<div class="slide bg-c-yellow"></div>
									</li>
									<li class="nav-item">
										<a class="nav-link @if(Session::has('activeFormsData')){{Session::get('activeFormsData') == 'TRADABLE ASSETS' ? 'active' : ''}}@endif" data-toggle="tab" href="#TRADABLE" role="tab">TRADABLE ASSETS</a>
										<div class="slide bg-c-yellow"></div>
									</li>
									
								</ul>
								<!-- Tab panes -->
								<div class="tab-content">
									<div class="tab-pane @if(Session::has('activeFormsData')){{Session::get('activeFormsData') == 'COMPANY INFORMATION' ? 'active' : ''}}@else active @endif" id="COMPANYINFORMATION" role="tabpanel">
										<div class="">
											<div class="card-header text-danger f-26 ">
												COMPANY INFORMATION
											</div>
											<div class="card-body">
											<form action="{{URL::to('ustaad/editBroker')}}/{{$broker1->id}}" method="post" enctype="multipart/form-data">
												<div class="row">
													<div class="col-sm-6">
														<div class="form-group">
															<label for="">Company Name</label>
															<input type="text" name="title" value="{{$broker1->title}}" class="form-control" required>
														</div>
													</div>
													<div class="col-sm-6">
														<div class="form-group">
															<img src="{{URL::to('storage/app')}}/{{$broker1->image}}" class="img-fluid mb-1">
															<input type="file" name="file_photo" id="file_photo" class="form-control h-100">
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
														
													</div>
													<div class="col-sm-4">
														Never End 
														<input type="checkbox" name="neverEnd" id="neverEnd" value="1" {{$broker1->neverEnd == 1 ? 'checked' : ''}}>
													</div>
													<div class="col-sm-4 txtTime">
														<div class="form-group">
															<label for="">Start Date</label>
															<input type="date" name="start" class="form-control" id="startDatetime" value="{{$broker1->start}}">
														</div>
													</div>
													<div class="col-sm-4 txtTime">
														<div class="form-group">
															<label for="">End Date</label>
															<input type="date" name="end" class="form-control" id="endDatetime" value="{{$broker1->end}}">
														</div>
													</div>
												</div>
												<div>
													<input type="hidden" name="activeForm" class="form-control" value="COMPANY INFORMATION">
													<input type="submit" id="doaction" class="btn btn-outline-primary" value="Save">
												</div>
											</form>
										</div>
										</div>
									</div>
									<div class="tab-pane @if(Session::has('activeFormsData')){{Session::get('activeFormsData') == 'DEPOSIT & WITHDRAWAL' ? 'active' : ''}}@endif" id="DEPOSIT" role="tabpanel">
										<div class="">
											<div class="card-header text-danger f-26">
												DEPOSIT & WITHDRAWAL
											</div>
											<div class="card-body">
												<form action="{{URL::to('ustaad/broker/addDeposit')}}" method="post">
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
														<input type="hidden" name="activeForm" class="form-control" value="DEPOSIT & WITHDRAWAL">
														<input type="submit" id="doaction" class="btn btn-outline-primary" value="Save">
													</div>
												</form>
											</div>
										</div>
									</div>
									<div class="tab-pane @if(Session::has('activeFormsData')){{Session::get('activeFormsData') == 'COMMISSIONS & FEES' ? 'active' : ''}}@endif" id="COMMISSIONS" role="tabpanel">
										<div class="">
											<div class="card-header text-danger f-26">
												COMMISSIONS & FEES
											</div>
											<div class="card-body">
												<form action="{{URL::to('ustaad/broker/addCommission')}}" method="post">
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
														<input type="hidden" name="activeForm" class="form-control" value="COMMISSIONS & FEES">
														<input type="submit" id="doaction" class="btn btn-outline-primary" value="Save">
													</div>
												</form>
											</div>
										</div>
									</div>
									<div class="tab-pane @if(Session::has('activeFormsData')){{Session::get('activeFormsData') == 'ACCOUNT INFORMATION' ? 'active' : ''}}@endif" id="ACCOUNT" role="tabpanel">
										<div class="">
											<div class="card-header text-danger f-26">
												ACCOUNT INFORMATION
											</div>
											<div class="card-body">
												<form action="{{URL::to('ustaad/broker/addAccountInfo')}}" method="post">
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
														<input type="hidden" name="activeForm" class="form-control" value="ACCOUNT INFORMATION">
														<input type="submit" id="doaction" class="btn btn-outline-primary" value="Save">
													</div>
												</form>
											</div>
										</div>
									</div>
									<div class="tab-pane @if(Session::has('activeFormsData')){{Session::get('activeFormsData') == 'TRADABLE ASSETS' ? 'active' : ''}}@endif" id="TRADABLE" role="tabpanel">
										<div class="">
											<div class="card-header text-danger f-26">
												TRADABLE ASSETS
											</div>
											<div class="card-body">
												<form action="{{URL::to('ustaad/broker/addTradableAssets')}}" method="post">
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
														<input type="hidden" name="activeForm" class="form-control" value="TRADABLE ASSETS">
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
										<a class="nav-link @if(Session::has('activeFormsBottomData')){{Session::get('activeFormsBottomData') == 'TRADING PLATFORMS' ? 'active' : ''}}@else active @endif" data-toggle="tab" href="#TRADINGPLATFORMS" role="tab">TRADING PLATFORMS

										</a>
										<div class="slide bg-c-blue"></div>
									</li>
									<li class="nav-item">
										<a class="nav-link @if(Session::has('activeFormsBottomData')){{Session::get('activeFormsBottomData') == 'TRADING FEATURES' ? 'active' : ''}}@endif" data-toggle="tab" href="#TRADINGFEATURES
										" role="tab">TRADING FEATURES
										</a>
										<div class="slide bg-c-green"></div>
									</li>
									<li class="nav-item">
										<a class="nav-link @if(Session::has('activeFormsBottomData')){{Session::get('activeFormsBottomData') == 'CUSTOMER SERVICE' ? 'active' : ''}}@endif" data-toggle="tab" href="#CUSTOMER" role="tab">CUSTOMER SERVICE
										</a>
										<div class="slide bg-c-red"></div>
									</li>
									<li class="nav-item">
										<a class="nav-link @if(Session::has('activeFormsBottomData')){{Session::get('activeFormsBottomData') == 'RESEARCH & EDUCATION' ? 'active' : ''}}@endif" data-toggle="tab" href="#RESEARCH" role="tab">RESEARCH & EDUCATION
										</a>
										<div class="slide bg-c-yellow"></div>
									</li>
									<li class="nav-item">
										<a class="nav-link @if(Session::has('activeFormsBottomData')){{Session::get('activeFormsBottomData') == 'PROMOTIONS' ? 'active' : ''}}@endif" data-toggle="tab" href="#PROMOTIONS" role="tab">PROMOTIONS</a>
										<div class="slide bg-c-yellow"></div>
									</li>
									
								</ul>
								<!-- Tab panes -->
								<div class="tab-content">
									<div class="tab-pane @if(Session::has('activeFormsBottomData')){{Session::get('activeFormsBottomData') == 'TRADING PLATFORMS' ? 'active' : ''}}@else active @endif" id="TRADINGPLATFORMS" role="tabpanel">
										<div class="">
											<div class="card-header text-danger f-26">
											TRADING PLATFORMS
											</div>
											<div class="card-body">
											<form action="{{URL::to('ustaad/broker/addPlatform')}}" method="post" >
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
													<input type="hidden" name="activeForm" class="form-control" value="TRADING PLATFORMS">
													<input type="submit" id="doaction" class="btn btn-outline-primary" value="Save">
												</div>
											</form>
										</div>
										</div>
									</div>
									<div class="tab-pane @if(Session::has('activeFormsBottomData')){{Session::get('activeFormsBottomData') == 'TRADING FEATURES' ? 'active' : ''}}@endif" id="TRADINGFEATURES" role="tabpanel">
										<div class="">
											<div class="card-header text-danger f-26">
												TRADING FEATURES
											</div>
											<div class="card-body">
												<form action="{{URL::to('ustaad/broker/addFeature')}}" method="post" >
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
														<input type="hidden" name="activeForm" class="form-control" value="TRADING FEATURES">
														<input type="submit" id="doaction" class="btn btn-outline-primary" value="Save">
													</div>
												</form>
											</div>
										</div>
									</div>
									<div class="tab-pane @if(Session::has('activeFormsBottomData')){{Session::get('activeFormsBottomData') == 'CUSTOMER SERVICE' ? 'active' : ''}}@endif" id="CUSTOMER" role="tabpanel">
										<div class="">
											<div class="card-header text-danger f-26">
												CUSTOMER SERVICE
											</div>
											<div class="card-body">
												<form action="{{URL::to('ustaad/broker/addCustomerServices')}}" method="post" >
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
														<input type="hidden" name="activeForm" class="form-control" value="CUSTOMER SERVICE">
														<input type="submit" id="doaction" class="btn btn-outline-primary" value="Save">
													</div>
												</form>
											</div>
										</div>
									</div>
									<div class="tab-pane @if(Session::has('activeFormsBottomData')){{Session::get('activeFormsBottomData') == 'RESEARCH & EDUCATION' ? 'active' : ''}}@endif" id="RESEARCH" role="tabpanel">
										<div class="">
											<div class="card-header text-danger f-26">
												RESEARCH & EDUCATION
											</div>
											<div class="card-body">
												<form action="{{URL::to('ustaad/broker/addResearchEducation')}}" method="post" >
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
														<input type="hidden" name="activeForm" class="form-control" value="RESEARCH & EDUCATION">
														<input type="submit" id="doaction" class="btn btn-outline-primary" value="Save">
													</div>
												</form>
											</div>
										</div>
									</div>
									<div class="tab-pane @if(Session::has('activeFormsBottomData')){{Session::get('activeFormsBottomData') == 'PROMOTIONS' ? 'active' : ''}}@endif" id="PROMOTIONS" role="tabpanel">
										<div class="">
											<div class="card-header text-danger f-26">
												PROMOTIONS
											</div>
											<div class="card-body">
												<form action="{{URL::to('ustaad/broker/addPromotion')}}" method="post" >
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
														<input type="hidden" name="activeForm" class="form-control" value="PROMOTIONS">
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


<script>
	if($("#neverEnd").prop('checked') == true){
		$(".txtTime").hide();
		$("#startDatetime").attr("required",false);
		$("#endDatetime").prop("required",false);
	}else{
		$(".txtTime").show();
		$("#startDatetime").attr("required",true);
		$("#endDatetime").prop("required",true);
	}
	$("#neverEnd").click(function(){
		if(this.checked){
			$(".txtTime").hide();
			$("#startDatetime").attr("required",false);
			$("#endDatetime").prop("required",false);
		}else{
			$(".txtTime").show();
			$("#startDatetime").attr("required",true);
			$("#endDatetime").prop("required",true);
		}
	})
</script>