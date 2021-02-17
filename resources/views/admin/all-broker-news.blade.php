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
									<h5 class="m-b-10">Broker News</h5>
								</div>
								<ul class="breadcrumb">
									<li class="breadcrumb-item">
										<a href="{{URL::to('/ustaad/dashboard')}}"><i class="fa fa-home"></i></a>
									</li>
									<li class="breadcrumb-item"><a href="{{URL::to('/ustaad/brokersNew')}}/{{$value['memberId']}}">All Broker News</a></li>
									<li class="breadcrumb-item"><a href="#!">Broker News</a></li>
									
								</ul>
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
												<th>Broker</th>
												<th>Broker Name</th>
												<th>News Title</th>
												<th>News Image</th>
												
												<th>Status</th>
											</tr>
										</thead>
										<tbody>
											@foreach($brokerNews as $news)
												@php
													$pendingNews = $news->GetPendingNews();
													$broker = $news->GetBrokerInfo();
												@endphp
												@if($pendingNews == null)
													<tr  draggable="true">
														<td>
															<div>
																<img src="{{URL::to('storage/app')}}/{{$broker->image}}" alt="" class="img-fluid" width="150">
															</div>
														</td>
														<td>{{$broker->title}}</td>
														<td>{{$news->NewsTitle}}</td>
														<td>
															<div>
																<img src="{{URL::to('storage/app')}}/{{$news->image}}" alt="" class="img-fluid" width="150">
															</div>
														</td>
													
														<td>
														@if($news->pending == 0)
															<span class="badge badge-light-success">Active</span>
															<div class="overlay-edit">
																<a href="{{URL::to('/ustaad/brokersNews/edit')}}/{{$news->id}}"> <button type="button" class="btn btn-icon btn-success"><i class="fa fa-edit"></i></button></a>
																<button type="button" href="{{URL::to('/ustaad/brokersNews/trash')}}/{{$news->id}}" data-toggle="modal" data-target="#myModal" class="addAction btn btn-icon btn-danger"><i class="fa fa-trash"></i></button>
															</div>
														@elseif($value['memberId'] != 6)
															<span class="badge badge-light-warning">Pending</span>
															<div class="overlay-edit">
																<form action="{{URL::to('ustaad/brokersNews/allow')}}/{{$news->id}}" method="post">
																	<span class="badge badge-light-warning">
																		Allow
																		<input type="checkbox" class="AllowBroker" name="pending" id="" value="0">
																	</span>
																</form>
																	<a href="{{URL::to('/ustaad/brokersNews/edit')}}/{{$news->id}}"> <button type="button" class="btn btn-icon btn-success"><i class="fa fa-edit"></i></button></a>
																	<button type="button" href="{{URL::to('/ustaad/brokersNews/trash')}}/{{$news->id}}" data-toggle="modal" data-target="#myModal" class="addAction btn btn-icon btn-danger"><i class="fa fa-trash"></i></button>
															</div>
														@elseif($value['memberId'] == 6)
															<span class="badge badge-light-warning">Pending</span>
															<div class="overlay-edit">
																<a href="{{URL::to('/ustaad/brokersNews/edit')}}/{{$news->id}}"> <button type="button" class="btn btn-icon btn-success"><i class="fa fa-edit"></i></button></a>
																<button href="{{URL::to('/ustaad/brokersNews/trash')}}/{{$news->id}}" data-toggle="modal" data-target="#myModal" type="button" class="btn btn-icon btn-danger addAction"><i class="fa fa-trash"></i></button>
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


