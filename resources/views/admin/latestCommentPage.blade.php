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
                                <a class="nav-link active" data-toggle="tab" href="#home3" role="tab"><i class="fa fa-chart-line m-r-10"></i>Signal Comments</a>
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
                            <div class="tab-pane active" id="home3" role="tabpanel">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>
                                                    Signal Comments
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
											@foreach($signalLatestComments as $data)
												@php 
													$member = App\Models\ClientRegistrationModel::where('id',$data->memberId)->first();
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
													<td class="d-flex">
														<a href="{{URL::to('ustaad/signals/comment/')}}/{{$data->signalId}}">
															<div>
																<img class="rounded-circle" style="width:40px;" src="{{$memberImage}}" alt="activity-user">
															</div>
															<div class="ml-4">
																<h6 class="mb-1">{{$member != null ? $member->name : ''}}</h6>
																<p class="m-0 text-dark" style="white-space:normal">{{$data->comment}}</p>
															</div>
														</a>
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
                                            </tr>
                                        </thead>
                                        <tbody>
											@foreach($BlogPostLatestComments as $data)
												@php 
													$member = App\Models\ClientRegistrationModel::where('id',$data->memberId)->first();
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
													<td class="d-flex">
														<a href="{{URL::to('ustaad/post/comment/')}}/{{$data->blogId}}">
															<div>
																<img class="rounded-circle" style="width:40px;" src="{{$memberImage}}" alt="activity-user">
															</div>
															<div class="ml-4">
																<h6 class="mb-1">{{$member != null ? $member->name : ''}}</h6>
																<p class="m-0 text-dark" style="white-space:normal">{{$data->comment}}</p>
															</div>
														</a>
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
                                            </tr>
                                        </thead>
                                        <tbody>
											@foreach($AdvanceTrainingLatestComments as $data)
												@php 
													$member = App\Models\ClientRegistrationModel::where('id',$data->memberId)->first();
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
													<td class="d-flex">
														<a href="{{URL::to('ustaad/lecture/AdvanceCategory')}}/{{$data->lectureId}}">
															<div>
																<img class="rounded-circle" style="width:40px;" src="{{$memberImage}}" alt="activity-user">
															</div>
															<div class="ml-4">
																<h6 class="mb-1">{{$member != null ? $member->name : ''}}</h6>
																<p class="m-0" style="white-space:normal">{{$data->comment}}</p>
															</div>
														</a>
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
                                            </tr>
                                        </thead>
                                        <tbody>
											@foreach($BasicTrainingLatestComments as $data)
												@php 
													$member = App\Models\ClientRegistrationModel::where('id',$data->memberId)->first();
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
													<td class="d-flex">
														<a href="{{URL::to('ustaad/lecture/BasicCategory')}}/{{$data->lectureId}}">
															<div>
																<img class="rounded-circle" style="width:40px;" src="{{$memberImage}}" alt="activity-user">
															</div>
															<div class="ml-4">
																<h6 class="mb-1">{{$member != null ? $member->name : ''}}</h6>
																<p class="m-0" style="white-space:normal">{{$data->comment}}</p>
															</div>
														</a>
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
                                            </tr>
                                        </thead>
                                        <tbody>
											@foreach($HabbitTrainingLatestComments as $data)
												@php 
													$member = App\Models\ClientRegistrationModel::where('id',$data->memberId)->first();
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
													<td class="d-flex">
													
														<a href="{{URL::to('ustaad/lecture/HabbitCategory')}}/{{$data->lectureId}}">
															<div>
																<img class="rounded-circle" style="width:40px;" src="{{$memberImage}}" alt="activity-user">
															</div>
															<div class="ml-4">
																<h6 class="mb-1">{{$member != null ? $member->name : ''}}</h6>
																<p class="m-0" style="white-space:normal">{{$data->comment}}</p>
															</div>
														</a>
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