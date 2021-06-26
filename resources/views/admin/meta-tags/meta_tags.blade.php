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
									<h5 class="m-b-10">Meta Tags</h5>
								</div>
								<ul class="breadcrumb">
									<li class="breadcrumb-item">
										<a href="{{URL::to('ustaad/dashboard')}}"><i class="fa fa-home"></i></a>
									</li>
									<li class="breadcrumb-item"><a href="#!">Meta Tags</a></li>
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
							<div class="card-header">Meta Tags</div>
							<div class="card-body">
								<table class="table mt-5" id="user-list-table">
									<thead class="bg-primary text-white">
										<tr>
											<th>ID</th>
											<th>Title</th>
											<th>Image</th>
											<th>Page</th>
											<th>Action</th>
										</tr>
									</thead>
                                    <tbody>
                                        @foreach ($totalData as $data)
                                            <tr>
                                                <td>{{$data->id}}</td>
                                                <td>{{$data->title}}</td>
                                                <td>
													@if($data->image)
														<img src="{{URL::to('storage/app')}}/{{$data->image}}" alt="" width="100px" height="100px">
													@else
														Image not Added.
													@endif
												</td>
                                                <td>{{$data->name_page}}</td>
                                                <td>
                                                    <a href="{{URL::to('ustaad/meta-tags/edit')}}/{{$data->id}}">
                                                        <i class="far fa-edit text-success mr-2"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
									<tfoot>
										<tr>
											<th>ID</th>
											<th>Title</th>
											<th>Image</th>
											<th>Page</th>
											<th>Action</th>
										</tr>
									</tfoot>
								</table>
							</div>
						</div>
					</div>
				</div>
				<!-- [ Main Content ] end -->
			</div>
		</section>
		<!-- [ Main Content ] end -->

@include('admin.include.footer')

