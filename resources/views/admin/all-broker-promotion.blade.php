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
									<h5 class="m-b-10">Brokers Promotions</h5>
								</div>
								<ul class="breadcrumb">
									<li class="breadcrumb-item">
										<a href="{{URL::to('/ustaad/dashboard')}}"><i class="feather icon-home"></i></a>
									</li>
									<li class="breadcrumb-item"><a href="#!">Brokers Promotions</a></li>
									
								</ul>
							</div>
						</div>
					</div>
				</div>
				<!-- [ breadcrumb ] end -->
				<!-- [ Main Content ] start -->

                <div class="row">
					<div class="col-md-12">
						<div class="card">
							<div class="card-header">
                                Broker News
							</div>	
							<div class="card-body">
								<div class="row">
									<div class="col-4">
										<div class="alignleft actions bulkactions">
											<label for="bulk-action-selector-top" class="d-block"
												>Select bulk action</label
											>
											<select
												name="action"
												class="form-control w-75 d-inline-block"
												id="bulk-action-selector-top"
											>
												<option value="-1">Bulk Actions</option>
												<option value="edit" class="hide-if-no-js">Edit</option>
												<option value="trash">Delete</option>
											</select>
											<input
												type="submit"
												id="doaction"
												class="btn btn-outline-primary"
												value="Apply"
											/>
										</div>
									</div>
									<div class="col-8">
										<div class="row">
											<div class="col-6">
												<div class="alignleft actions form-group">
													<label for="filter-by-date" class="screen-reader-text"
														>Filter by date</label
													>
													<select
														name="m"
														id="filter-by-date"
														class="form-control"
													>
														<option selected="selected" value="0">
															All dates
														</option>
														<option value="201912">December 2019</option>
													</select>
												</div>
											</div>
											<div class="col-6">
												<div class="alignleft actions form-group">
													<label class="screen-reader-text d-block" for="cat"
														>Filter by category</label
													>
													<div class="">
														<select
															name="cat"
															id="cat"
															class="w-75 d-inline-block postform form-control"
														>
															<option value="0" selected="selected">
																All Categories
															</option>
															<option class="level-0" value="1">
																Uncategorized
															</option>
														</select>
														<input
															type="submit"
															name="filter_action"
															id="post-query-submit"
															class="btn btn-outline-primary"
															value="Filter"
														/>
													</div>
												</div>
											</div>
										</div>
									</div>
								
									
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12">
						<div class="card user-profile-list">
							<div class="card-body">
								<div class="dt-responsive table-responsive">
									<table id="user-list-table" class="table nowrap">
										<thead>
											<tr>
												<th>Broker</th>
												<th>Broker Name</th>
												<th>Promotion Title</th>
												<th>Promotion Image</th>
												
												<th>Status</th>
											</tr>
										</thead>
										<tbody>
											@foreach($brokerNews as $news)
												@php
													$broker = $news->GetBrokerInfo();
												@endphp
												<tr  draggable="true">
													<td>
														<div>
															<img src="{{URL::to('storage/app')}}/{{$broker->image}}" alt="" class="img-fluid" width="150">
														</div>
													</td>
													<td>{{$broker->title}}</td>
													<td>{{$news->PromotionTitle}}</td>
													<td>
														<div>
															<img src="{{URL::to('storage/app')}}/{{$news->image}}" alt="" class="img-fluid" width="150">
														</div>
													</td>
												
													<td>
														<span class="badge badge-light-success">Active</span>
														<div class="overlay-edit">
															<a href="{{URL::to('/ustaad/brokersPromotions/edit')}}/{{$news->id}}"> <button type="button" class="btn btn-icon btn-success"><i class="feather icon-check-circle"></i></button></a>
															<a href="{{URL::to('/ustaad/brokersPromotions/delete')}}/{{$news->id}}" class="addAction" data-toggle="modal" data-target="#myModal"><button type="button" class="btn btn-icon btn-danger"><i class="feather icon-trash-2"></i></button></a>
														</div>
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

				<!-- [ Main Content ] end -->
			</div>
		</section>
		<!-- [ Main Content ] end -->

@include('admin.include.footer')
        <!-- Data Table -->
		<script src="assets/js/plugins/jquery.dataTables.min.js"></script>
		<script src="assets/js/plugins/dataTables.bootstrap4.min.js"></script>


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


