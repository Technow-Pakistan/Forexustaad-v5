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
									<h5 class="m-b-10">Brokers List</h5>
								</div>
								<div class="d-flex justify-content-between">
									<ul class="breadcrumb p-0 m-0 bg-white">
										<li class="breadcrumb-item">
											<a href="{{URL::to('/ustaad/dashboard')}}"><i class="fa fa-home"></i></a>
										</li>
										<li class="breadcrumb-item"><a href="#!">Brokers List</a></li>
									</ul>
									<div>
										@php
											$value =Session::get('admin');
										@endphp
										@if($value['memberId'] != 6)
											<a href="{{URL::to('ustaad/broker/addCategory')}}">Add New Category</a> /
											<a href="{{URL::to('ustaad/brokerReview/new')}}">Add Broker Review</a> /
										@endif
											<a href="{{URL::to('ustaad/broker/category')}}">Add New Broker</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				<!-- [ breadcrumb ] end -->
				<!-- [ Main Content ] start -->
				<div class="row">
					<div class="col-lg-12">
						<div class="card user-profile-list">
							<div class="card-body">
								<div class="dt-responsive table-responsive">
									<table id="user-list-table" class="table nowrap">
										<thead>
											<tr>
												<th>ID</th>
												<th>Broker</th>
												<th>Broker Name</th>
												<th>Category</th>
												<th>User</th>
												<th>Broker Details</th>
												@if($value['memberId'] != 6)
													<th>Broker Review</th>
												@endif
												<th style="width:100px">Status</th>
											</tr>
										</thead>
										<tbody>
											@php $id3=1 @endphp
											@foreach($broker as $data)
												@php
													$editData = $data->GetAllowCompanyInformation();
													$pendingData = $data->GetPendingCompanyInformation();
													$category = $data->getCategory();
													$user = $data->getAdminUser();
												@endphp
												@if($editData == null)
													<tr>
														<td>{{$id3}}</td>
														<td>
															<div>
																<img src="{{URL::to('storage/app')}}/{{$data->image}}" alt="" class="img-fluid" width="150">
															</div>
														</td>
														<td>{{$pendingData == null ? $data->title : $pendingData->title}}</td>
														<td>{{$category->category}}</td>
														<td>{{$user->username}}</td>
														<!-- <td>{{$data->start}}</td>
														<td>{{$data->end}}</td> -->
														<td><a class="text-danger" href="{{URL::to('ustaad/brokersDetail')}}/{{$data->id}}"> Click For Details </a></td>
														@if($value['memberId'] != 6)
															<td><a class="text-danger" href="{{URL::to('ustaad/brokersReview')}}/{{$data->id}}"> Click For Review </a></td>
														@endif
														<td>
															@php
																$paymentDate = date('Y-m-d');
																$paymentDate=date('Y-m-d', strtotime($paymentDate));
																//echo $paymentDate; // echos today! 
																$contractDateBegin = date('Y-m-d', strtotime($data->start));
																$contractDateEnd = date('Y-m-d', strtotime($data->end));
															@endphp
															@if($data->pending == 0)
																<span class="badge {{((($paymentDate >= $contractDateBegin) && ($paymentDate <= $contractDateEnd)) || $data->neverEnd == 1) ? 'badge-light-success' : 'badge-light-danger'}}">{{((($paymentDate >= $contractDateBegin) && ($paymentDate <= $contractDateEnd)) || $data->neverEnd == 1) ? 'Active' : 'Deactive'}}</span>
																<div class="overlay-edit">
																	@if($value['memberId'] == 1)
																		<form action="{{URL::to('ustaad/broker')}}/{{$data->star == 0 ? 'star' : 'unstar'}}/{{$data->id}}" method="post">
																			<span>
																				<input type="checkbox" class="AllowBroker hiddenCheckBox" name="pending" id="option{{$id3}}" value="0">
																				<label for="option{{$id3}}" class="mt-2 mr-2"><i class="fa fa-star {{$data->star == 1 ? 'yellowStar' : ''}}"></i></label>
																			</span>
																		</form>
																	@endif
																	@if($value['memberId'] == 6)
																		<a href="{{URL::to('ustaad/editBroker')}}/{{$data->id}}"> <button type="button" class="btn btn-icon btn-success"><i class="fa fa-edit"></i></button></a>
																	@endif
																	<button href="{{URL::to('ustaad/broker/trash')}}/{{$data->id}}"  data-toggle="modal" data-target="#myModal" type="button" class="btn btn-icon btn-danger"><i class="fa fa-trash"></i></button>
																</div>
															@elseif($value['memberId'] != 6)
																<span class="badge badge-light-warning">Pending</span>
																<div class="overlay-edit">
																	<form action="{{URL::to('ustaad/broker/allow')}}/{{$data->id}}" method="post">
																		<span class="badge badge-light-warning">
																			Allow
																			<input type="checkbox" class="AllowBroker" name="pending" id="" value="0">
																		</span>
																	</form>
																	<button href="{{URL::to('ustaad/broker/trash')}}/{{$data->id}}"  data-toggle="modal" data-target="#myModal" type="button" class="btn btn-icon btn-danger addAction"><i class="fa fa-trash"></i></button>
																</div>
															@elseif($value['memberId'] == 6)
																<span class="badge badge-light-warning">Pending</span>
																<div class="overlay-edit">
																	<a href="{{URL::to('ustaad/editBroker')}}/{{$data->id}}"> <button type="button" class="btn btn-icon btn-success"><i class="fa fa-edit"></i></button></a>
																	<button href="{{URL::to('ustaad/broker/trash')}}/{{$data->id}}"  data-toggle="modal" data-target="#myModal" type="button" class="btn btn-icon btn-danger addAction"><i class="fa fa-trash"></i></button>
																</div>
															@endif
														</td>
													</tr>
													@php $id3++ @endphp
												@endif
											@endforeach
										</tbody>
										
									</table>
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
	$('#user-list-table').DataTable();

	// Almost final example
	// tr mai class row add krna h bs
	(function() {
		var id_ = 'user-list-table';
		var cols_ = document.querySelectorAll('#' + id_ + ' .row');
		var dragSrcEl_ = null;

		this.handleDragStart = function(e) {
			e.dataTransfer.effectAllowed = 'move';
			e.dataTransfer.setData('text/html', this.innerHTML);

			dragSrcEl_ = this;

			this.style.opacity = '0.4';

		};

		this.handleDragOver = function(e) {
			if (e.preventDefault) {
			e.preventDefault(); // Allows us to drop.
			}

			e.dataTransfer.dropEffect = 'move';

			return false;
		};

		this.handleDragEnter = function(e) {
		};

		this.handleDragLeave = function(e) {
		};

		this.handleDrop = function(e) {
			// this/e.target is current target element.

			if (e.stopPropagation) {
			e.stopPropagation(); // stops the browser from redirecting.
			}

			// Don't do anything if we're dropping on the same column we're dragging.
			if (dragSrcEl_ != this) {
			dragSrcEl_.innerHTML = this.innerHTML;
			this.innerHTML = e.dataTransfer.getData('text/html');
			}

			return false;
		};

		this.handleDragEnd = function(e) {
			// this/e.target is the source node.
			this.style.opacity = '1';

			[].forEach.call(cols_, function (col) {
			});
		};

		[].forEach.call(cols_, function (col) {
			col.setAttribute('draggable', 'true');  // Enable columns to be draggable.
			col.addEventListener('dragstart', this.handleDragStart, false);
			col.addEventListener('dragenter', this.handleDragEnter, false);
			col.addEventListener('dragover', this.handleDragOver, false);
			col.addEventListener('dragleave', this.handleDragLeave, false);
			col.addEventListener('drop', this.handleDrop, false);
			col.addEventListener('dragend', this.handleDragEnd, false);
		});
	})();
</script>
	</body>
</html>


