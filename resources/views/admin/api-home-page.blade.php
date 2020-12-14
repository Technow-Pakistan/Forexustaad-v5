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
									<h5 class="m-b-10">API Home Page</h5>
								</div>
								<ul class="breadcrumb">
									<li class="breadcrumb-item">
										<a href="index.html"><i class="feather icon-home"></i></a>
									</li>
									<li class="breadcrumb-item"><a href="#!">Api Hpme Page</a></li>
									
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
                                API Home Page
							</div>	
							<div class="card-body">	
								<form class="apiForm" action="" method="post">
									<div class="form-group">
										<label for="">Title</label>
										<input type="text" name="title" class="form-control apiTitle" required>
									</div>
									<div class="form-group">
										<label for="">API Link</label>
										<textarea type="text" name="link" class="form-control apiLink" required></textarea>
									</div>
									<div class="form-group">
										<label for="">Area</label>
										<select name="area" class="form-control apiArea" id="">
											<option class="Top" value="Top">Top</option>
											<option class="Center" value="Center">Center</option>
											<option class="Bottom" value="Bottom">Bottom</option>
										</select>
									</div>
									<input type="submit" id="doaction" class="btn btn-outline-primary mt-4 apiButton" value="Add">
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
														<div class="overlay-edit editlink" value="{{$data->id}}">
															<button type="button" class="btn btn-icon btn-success"><i class="feather icon-check-circle"></i></button>
															<a type="button" href="{{URL::to('/ustaad/api/api-home/delete')}}/{{$data->id}}" class="btn btn-icon btn-danger"><i class="feather icon-trash-2"></i></a>
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
	<!-- edit Content -->
<script>
	$(".editlink").on("click",function(){
		var id = $(this).attr('value');
		var title = $(this).parent().parent()[0].childNodes[1].innerText;
		var api = $(this).parent().parent()[0].childNodes[3].innerText;
		var area = $(this).parent().parent()[0].childNodes[5].innerText;
		$(".apiTitle").val(title);
		$(".apiLink").val(api);
		$(".apiArea").find("."+area).attr("selected",true);
		$(".apiArea").val(area);
		$(".apiButton").val("Update");
		$(".apiButton").attr("class","btn btn-outline-danger mt-4 apiButton");
		$(".apiForm").attr("action","{{URL::to('/ustaad/api/api-home/edit/')}}/"+id+"");
		console.log(title);
		
	});
</script>