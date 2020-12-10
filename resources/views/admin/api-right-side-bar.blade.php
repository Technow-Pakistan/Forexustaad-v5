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
									<h5 class="m-b-10">API Right Side Bar</h5>
								</div>
								<ul class="breadcrumb">
									<li class="breadcrumb-item">
										<a href="index.html"><i class="feather icon-home"></i></a>
									</li>
									<li class="breadcrumb-item"><a href="#!">Api Right Side</a></li>
									
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
                                Right Side Bar API
							</div>	
							<div class="card-body">
								<form class="navForm" action="" method="post">
									<div class="form-group">
										<label for="">Title</label>
										<input type="text" name="title" class="form-control" required>
									</div>
									<div class="form-group">
										<label for="">API Link</label>
										<textarea type="text" name="link" class="form-control" required></textarea>
									</div>
									<div class="form-group">
										<label for="">Area</label>
										<select name="area" class="form-control" id="">
											<option value="Top">Top</option>
											<option value="Center">Center</option>
											<option value="Bottom">Bottom</option>
										</select>
									</div>
									<input type="submit" id="doaction" class="btn btn-outline-primary mt-4 navButton" value="Add">
								</form>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-lg-12">
						<div class="card user-profile-list">
							<div class="card-body">
								<div class="dt-responsive table-responsive">
									<table class="table nowrap">
										<thead>
											<tr>
												<th>Title</th>
												<th>Link</th>
												<th>Area</th>
												
												<th>Status</th>
											</tr>
										</thead>
										<tbody>
											@foreach($totalData as $data)
												<tr  draggable="true">
													<td>
														{{$data->title}}
													</td>
													<td class="tdLinkScroll">{{$data->link}}</td>
													<td>{{$data->area}}</td>
													<td>
														<span class="badge badge-light-success">Active</span>
														<div class="overlay-edit">
															<!-- <a href="add-promotiton.html"> <button type="button" class="btn btn-icon btn-success"><i class="feather icon-check-circle"></i></button></a> -->
															<a type="button" href="{{URL::to('/admin/api/api-right/delete')}}/{{$data->id}}" class="btn btn-icon btn-danger"><i class="feather icon-trash-2"></i></a>
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
		<script src="{{URL::to('public/AdminAssets/assets/js/plugins/jquery.dataTables.min.js')}}"></script>
		<script src="{{URL::to('public/AdminAssets/assets/js/plugins/dataTables.bootstrap4.min.js')}}"></script>


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
