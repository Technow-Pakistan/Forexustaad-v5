@include('admin.include.header')
		    <!-- [ Main Content ] start -->
	<div class="pcoded-main-container">
		<div class="pcoded-content">
				<!-- [ Main Content ] start -->
			<div class="row">

            <!-- tabs card start -->
            <div class="col-sm-12">
                <div class="card tabs-card">
                    <div class="card-body">
                        <!-- Nav tabs -->
                        <ul class="nav nav-pills nav-fill mb-3" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" data-toggle="tab" href="#latest3" role="tab"><i class="fa fa-chart-line m-r-10"></i>Latest Comments</a>
                                <div class="slide bg-c-blue"></div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#home3" role="tab"><i class="fa fa-chart-line m-r-10"></i>Signal Comments</a>
                                <div class="slide bg-c-blue"></div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#profile3" role="tab"><i class="fa fa-blogger m-r-10"></i>Blog Comments</a>
                                <div class="slide bg-c-green"></div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#messages3" role="tab"><i class="fa fa-school m-r-10"></i>Advance Training Comments</a>
                                <div class="slide bg-c-red"></div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#settings3" role="tab"><i class="fa fa-school m-r-10"></i>Basic Training Comments</a>
                                <div class="slide bg-c-yellow"></div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" data-toggle="tab" href="#settings4" role="tab"><i class="fa fa-school m-r-10"></i>Habbit Training Comments</a>
                                <div class="slide bg-c-yellow"></div>
                            </li>
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content">
                            <div class="tab-pane active" id="latest3" role="tabpanel">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>
                                                    Latest Comments
                                                </th>
                                                <th>
                                                    Page Name
                                                </th>
                                                <th>
                                                    Operations
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
											@foreach($wholeCommentData as $data)
												@php
													$pageName = $data->getPageName();
													$member = $data->getMemberInformation();
													if($member){
														if($member->image == null){
															$memberImage = URL::to("public/assets/assets/img/user1.jpg");
														}else{
															$memberImage = URL::to("storage/app" . "/" .$member->image);
														}
													}else{
														$memberImage = URL::to("public/assets/assets/img/user1.jpg");
													}
												@endphp
												<tr>
													<td>
														<a href="{{URL::to('ustaad/signals/comment/')}}/{{$data->objectId}}" class="d-flex">
															<div>
																<img class="rounded-circle" style="width:40px;" src="{{$memberImage}}" alt="activity-user">
															</div>
															<div class="ml-4">
																<h6 class="mb-1">{{$member != null ? $member->name : 'Admin'}}</h6>
																<p class="m-0 text-dark" style="white-space:normal">{{$data->comment}}</p>
															</div>
														</a>
													</td>
													<td class="text-black">
														{{$pageName->page_name}}
													</td>
													<td>
														<a href="{{URL::to('ustaad/comment/edit')}}/{{$data->id}}"><i class="far fa-edit text-success mr-2 editlink" value="16"></i></a>
														<a href="{{URL::to('ustaad/comment/delete')}}/{{$data->id}}" class="addAction" data-toggle="modal" data-target="#myModal"><i class="fa fa-trash text-danger"></i></a>
													</td>
												</tr>
											@endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane" id="home3" role="tabpanel">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>
                                                    Signal Comments
                                                </th>
                                                <th>
                                                    Operations
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
											@foreach($signalLatestComments as $data)
												@php
													$member = $data->getMemberInformation();
													if($member){
														if($member->image == null){
															$memberImage = URL::to("public/assets/assets/img/user1.jpg");
														}else{
															$memberImage = URL::to("storage/app" . "/" .$member->image);
														}
													}else{
														$memberImage = URL::to("public/assets/assets/img/user1.jpg");
													}
												@endphp
												<tr>
													<td>
														<a href="{{URL::to('ustaad/signals/comment/')}}/{{$data->objectId}}" class="d-flex">
															<div>
																<img class="rounded-circle" style="width:40px;" src="{{$memberImage}}" alt="activity-user">
															</div>
															<div class="ml-4">
																<h6 class="mb-1">{{$member != null ? $member->name : 'Admin'}}</h6>
																<p class="m-0 text-dark" style="white-space:normal">{{$data->comment}}</p>
															</div>
														</a>
													</td>
													<td>
														<a href="{{URL::to('ustaad/comment/edit')}}/{{$data->id}}"><i class="far fa-edit text-success mr-2 editlink" value="16"></i></a>
														<a href="{{URL::to('ustaad/comment/delete')}}/{{$data->id}}" class="addAction" data-toggle="modal" data-target="#myModal"><i class="fa fa-trash text-danger"></i></a>
													</td>
												</tr>
											@endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane" id="profile3" role="tabpanel">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>
                                                   Blog Comments
                                                </th>
                                                <th>
                                                    Operations
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
											@foreach($BlogPostLatestComments as $data)
												@php
													$member = $data->getMemberInformation();
													if($member){
														if($member->image == null){
															$memberImage = URL::to("public/assets/assets/img/user1.jpg");
														}else{
															$memberImage = URL::to("storage/app" . "/" .$member->image);
														}
													}else{
														$memberImage = URL::to("public/assets/assets/img/user1.jpg");
													}
												@endphp
												<tr>
													<td>
														<a href="{{URL::to('ustaad/post/comment/')}}/{{$data->objectId}}" class="d-flex">
															<div>
																<img class="rounded-circle" style="width:40px;" src="{{$memberImage}}" alt="activity-user">
															</div>
															<div class="ml-4">
																<h6 class="mb-1">{{$member != null ? $member->name : 'Admin'}}</h6>
																<p class="m-0 text-dark" style="white-space:normal">{{$data->comment}}</p>
															</div>
														</a>
													</td>
													<td>
														<a href="{{URL::to('ustaad/comment/edit')}}/{{$data->id}}"><i class="far fa-edit text-success mr-2 editlink" value="16"></i></a>
														<a href="{{URL::to('ustaad/comment/delete')}}/{{$data->id}}" class="addAction" data-toggle="modal" data-target="#myModal"><i class="fa fa-trash text-danger"></i></a>
													</td>
												</tr>
											@endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane" id="messages3" role="tabpanel">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>
                                                   Advance Training Latest Comments
                                                </th>
                                                <th>
                                                    Operations
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
											@foreach($AdvanceTrainingLatestComments as $data)
												@php
													$member = $data->getMemberInformation();
													if($member){
														if($member->image == null){
															$memberImage = URL::to("public/assets/assets/img/user1.jpg");
														}else{
															$memberImage = URL::to("storage/app" . "/" .$member->image);
														}
													}else{
														$memberImage = URL::to("public/assets/assets/img/user1.jpg");
													}
												@endphp
												<tr>
													<td>
														<a href="{{URL::to('ustaad/advance/comment')}}/{{$data->objectId}}" class="d-flex">
															<div>
																<img class="rounded-circle" style="width:40px;" src="{{$memberImage}}" alt="activity-user">
															</div>
															<div class="ml-4">
																<h6 class="mb-1">{{$member != null ? $member->name : 'Admin'}}</h6>
																<p class="m-0 text-dark" style="white-space:normal">{{$data->comment}}</p>
															</div>
														</a>
													</td>
													<td>
														<a href="{{URL::to('ustaad/comment/edit')}}/{{$data->id}}"><i class="far fa-edit text-success mr-2 editlink" value="16"></i></a>
														<a href="{{URL::to('ustaad/comment/delete')}}/{{$data->id}}" class="addAction" data-toggle="modal" data-target="#myModal"><i class="fa fa-trash text-danger"></i></a>
													</td>
												</tr>
											@endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane" id="settings3" role="tabpanel">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>
                                                   Basic Training Latest Comments
                                                </th>
                                                <th>
                                                    Operations
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
											@foreach($BasicTrainingLatestComments as $data)
												@php
													$member = $data->getMemberInformation();
													if($member){
														if($member->image == null){
															$memberImage = URL::to("public/assets/assets/img/user1.jpg");
														}else{
															$memberImage = URL::to("storage/app" . "/" .$member->image);
														}
													}else{
														$memberImage = URL::to("public/assets/assets/img/user1.jpg");
													}
												@endphp
												<tr>
													<td>
														<a href="{{URL::to('ustaad/basic/comment')}}/{{$data->objectId}}" class="d-flex">
															<div>
																<img class="rounded-circle" style="width:40px;" src="{{$memberImage}}" alt="activity-user">
															</div>
															<div class="ml-4">
																<h6 class="mb-1">{{$member != null ? $member->name : 'Admin'}}</h6>
																<p class="m-0 text-dark" style="white-space:normal">{{$data->comment}}</p>
															</div>
														</a>
													</td>
													<td>
														<a href="{{URL::to('ustaad/comment/edit')}}/{{$data->id}}"><i class="far fa-edit text-success mr-2 editlink" value="16"></i></a>
														<a href="{{URL::to('ustaad/comment/delete')}}/{{$data->id}}" class="addAction" data-toggle="modal" data-target="#myModal"><i class="fa fa-trash text-danger"></i></a>
													</td>
												</tr>
											@endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="tab-pane" id="settings4" role="tabpanel">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>
                                                   Habbit Training Latest Comments
                                                </th>
                                                <th>
                                                    Operations
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
											@foreach($HabbitTrainingLatestComments as $data)
												@php
													$member = $data->getMemberInformation();
													if($member){
														if($member->image == null){
															$memberImage = URL::to("public/assets/assets/img/user1.jpg");
														}else{
															$memberImage = URL::to("storage/app" . "/" .$member->image);
														}
													}else{
														$memberImage = URL::to("public/assets/assets/img/user1.jpg");
													}
												@endphp
												<tr>
													<td>

														<a href="{{URL::to('ustaad/habbit/comment')}}/{{$data->objectId}}" class="d-flex">
															<div>
																<img class="rounded-circle" style="width:40px;" src="{{$memberImage}}" alt="activity-user">
															</div>
															<div class="ml-4">
																<h6 class="mb-1">{{$member != null ? $member->name : 'Admin'}}</h6>
																<p class="m-0 text-dark" style="white-space:normal">{{$data->comment}}</p>
															</div>
														</a>
													</td>
													<td>
														<a href="{{URL::to('ustaad/comment/edit')}}/{{$data->id}}"><i class="far fa-edit text-success mr-2 editlink" value="16"></i></a>
														<a href="{{URL::to('ustaad/comment/delete')}}/{{$data->id}}" class="addAction" data-toggle="modal" data-target="#myModal"><i class="fa fa-trash text-danger"></i></a>
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
            </div>
            <!-- tabs card end -->
            </div>

@include('admin.include.footer')


<script>
	$('.table').DataTable();
</script>
