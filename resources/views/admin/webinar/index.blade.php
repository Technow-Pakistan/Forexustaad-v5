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
									<h5 class="m-b-10">All Webinars</h5>
								</div>
								<ul class="breadcrumb">
									<li class="breadcrumb-item">
										<a href="{{URL::to('/ustaad/dashboard')}}"><i class="fa fa-home"></i></a>
									</li>
									<li class="breadcrumb-item"><a href="#!">All Webinars</a></li>
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
												<th>Image</th>
												<th>Title</th>
												<th>Member</th>
												<th>Date</th>
												<th>Time</th>
												<th>Status</th>
											</tr>
										</thead>
										<tbody>
											@foreach($webinarsData as $data)
												<tr  draggable="true">
													<td>
														<div>
															<img src="{{URL::to('storage/app')}}/{{$data->image}}" alt="" class="img-fluid" width="150">
														</div>
													</td>
													<td>{{$data->title}}</td>
													<td>{{$data->vipMember == 1 ? 'Vip Member' : 'Free Member'}}</td>
													<td>{{$data->date}}</td>
													<td>{{$data->time}}</td>
													<td>
														<span class="badge {{$data->status == 1 ? 'badge-light-success' : 'badge-light-danger'}}">{{$data->status == 1 ? 'Active' : 'Deactive'}}</span>
														<div class="overlay-edit">
															<a href="{{URL::to('/ustaad/webinar/edit')}}/{{$data->id}}"> <button type="button" class="btn btn-icon btn-success"><i class="fa fa-edit"></i></button></a>
															@if($data->status == 1)
																<button type="button" href="{{URL::to('/ustaad/webinar/deactive')}}/{{$data->id}}" class="btn btn-icon btn-danger addAction" data-toggle="modal" data-target="#myModal">
																	<i class="fa fa-lock"></i>
																</button>
															@elseif($data->status == 0)
																<button type="button" href="{{URL::to('/ustaad/webinar/active')}}/{{$data->id}}" class="btn btn-icon btn-success addAction" data-toggle="modal" data-target="#myModal">
																	<i class="fa fa-unlock"></i>
																</button>
															@endif
														</div>
													</td>
												</tr>
											@endforeach
										</tbody>
										<tfoot>
											<tr>
												<th>Image</th>
												<th>Title</th>
												<th>Member</th>
												<th>Date</th>
												<th>Time</th>
												<th>Status</th>
											</tr>
										</tfoot>
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


