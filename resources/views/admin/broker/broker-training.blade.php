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
									<h5 class="m-b-10">Broker Training</h5>
								</div>
								<ul class="breadcrumb">
									<li class="breadcrumb-item">
										<a href="{{URL::to('/ustaad/dashboard')}}"><i class="feather icon-home"></i></a>
									</li>
									<li class="breadcrumb-item"><a href="{{URL::to('/ustaad/brokersTraining')}}/{{$value['memberId']}}">All Broker Trainings</a></li>
									<li class="breadcrumb-item"><a href="#!">Broker Training</a></li>
									
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
												<th>Training Title</th>
												<th>Date</th>
												
												<th>Status</th>
											</tr>
										</thead>
										<tbody>
											@foreach($brokerTraining as $training)
												@php
													$broker = $training->GetBrokerInfo();
												@endphp
												<tr  draggable="true">
													<td>
														<div>
															<img src="{{URL::to('storage/app')}}/{{$broker->image}}" alt="" class="img-fluid" width="150">
														</div>
													</td>
													<td>{{$broker->title}}</td>
													<td>{{$training->title}}</td>
													<td>{{$training->created_at->format("M d, Y")}}</td>
												
													<td>
                                                        @if($training->pending == 0)
                                                            <span class="badge badge-light-success">Active</span>
                                                            <div class="overlay-edit">
                                                                <a href="{{URL::to('/ustaad/brokersTrainings/edit')}}/{{$training->id}}"> <button type="button" class="btn btn-icon btn-success"><i class="feather icon-check-circle"></i></button></a>
                                                                <a href="{{URL::to('/ustaad/brokersTrainings/trash')}}/{{$training->id}}" data-toggle="modal" data-target="#myModal" class="addAction"><button type="button" class="btn btn-icon btn-danger"><i class="feather icon-trash-2"></i></button></a>
                                                            </div>
                                                        @elseif($value['memberId'] != 6)
                                                            <form action="{{URL::to('ustaad/brokersTrainings/allow')}}/{{$training->id}}" method="post">
                                                                <span class="badge badge-light-warning">
                                                                    Allow
                                                                    <input type="checkbox" class="AllowBroker" name="pending" id="" value="0">
                                                                </span>
                                                            </form>
                                                        @elseif($value['memberId'] == 6)
                                                            <span class="badge badge-light-warning">Pending</span>
                                                            <div class="overlay-edit">
                                                                <a href="{{URL::to('/ustaad/brokersTrainings/edit')}}/{{$training->id}}"> <button type="button" class="btn btn-icon btn-success"><i class="feather icon-check-circle"></i></button></a>
                                                                <a href="{{URL::to('/ustaad/brokersTrainings/trash')}}/{{$training->id}}" data-toggle="modal" data-target="#myModal" class="addAction"><button type="button" class="btn btn-icon btn-danger"><i class="feather icon-trash-2"></i></button></a>
                                                            </div>
                                                        @endif
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


