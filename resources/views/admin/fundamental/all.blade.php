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
									<h5 class="m-b-10">All Fundamental</h5>
								</div>
								<div class="d-flex justify-content-between">
									<ul class="breadcrumb p-0 m-0 bg-white">
										<li class="breadcrumb-item">
											<a href="{{URL::to('/ustaad/dashboard')}}"><i class="fa fa-home"></i></a>
										</li>
										<li class="breadcrumb-item"><a href="#!">All Fundamental</a></li>
									</ul>
									<a href="{{URL::to('ustaad/fundamental/add')}}">Add New Fundamental</a>
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
                                    <form action="{{URL::to('/EditMetaProcess')}}" method="post">
                                        <label for="">Title</label>
                                        <input type="text" class="form-control" name="title" value="{{$meta->title}}">
                                        <label for="">Description</label>
                                        <textarea name="description" class="form-control">{{$meta->description}}</textarea>
                                        <label for="">Keywords</label>
                                        <select class="js-example-tokenizer col-sm-12" name="keywords[]" multiple="multiple" required>
                                            @foreach ($MetaKeywords as $metas)
                                                @php
                                                    $keywords = explode(',',$meta->keywordsimp);
                                                    $selectedAll = 0;
                                                @endphp
                                                @for($i = 0; $i< count($keywords); $i++)
                                                    @if($keywords[$i] == $metas->name)
                                                        @php   $selectedAll = 1;  @endphp
                                                    @endif
                                                @endfor
                                                <option value="{{$metas->name}}" {{$selectedAll == 1 ? 'selected' : ''}}>{{$metas->name}}</option>
                                            @endforeach
                                        </select>
                                        <p align="right">
                                            <input type="hidden" name="name" value="{{$meta->name_page}}">
                                            <input type="submit" value="Save" class="btn btn-primary mt-3 mb-3 btn-sm">
                                        </p>
                                    </form>
									<form action="{{URL::to('/ustaad/fundamental/order')}}" method="post">
										<table id="user-list-table" class="table nowrap">
											<thead>
												<tr>
													<th>Id</th>
													<th>Image</th>
													<th>Title</th>
													<th>Date</th>
													<th>Status</th>
												</tr>
											</thead>
											<tbody>
												@foreach($Fundamental as $data)
													<tr draggable="true" ondragstart="dragit(event)" ondragover="dragover(event)">
														<td>
															{{$data->position}}
															<input type="hidden" name="position[]" value="{{$data->id}}">
														</td>
														<td>
																<img src="{{URL::to('storage/app')}}/{{$data->image}}" alt="" class="img-fluid" width="150">

														</td>
														<td>{{$data->title}}</td>
														<td>{{$data->created_at->format('Md, Y')}}</td>
														<td>
															<span class="badge {{$data->status == 1 ? 'badge-light-success' : 'badge-light-danger'}}">{{$data->status == 1 ? 'Active' : 'Deactive'}}</span>
															<div class="overlay-edit">
																<a href="{{URL::to('/ustaad/fundamental/edit')}}/{{$data->id}}"> <button type="button" class="btn btn-icon btn-success"><i class="fa fa-edit"></i></button></a>
																@if($data->status == 1)
																	<button href="{{URL::to('/ustaad/fundamental/deactive')}}/{{$data->id}}" type="button"  class="btn btn-icon btn-danger addAction" data-toggle="modal" data-target="#myModal"><i class="fa fa-lock"></i></button>
																@elseif($data->status == 0)
																	<button type="button" href="{{URL::to('/ustaad/fundamental/active')}}/{{$data->id}}" class="btn btn-icon btn-success addAction" data-toggle="modal" data-target="#myModal"><i class="fa fa-unlock"></i></button>
																@endif
															</div>
														</td>
													</tr>
												@endforeach
											</tbody>
										</table>
										<input type="submit" class="btn btn-primary" value="Submit">
									</form>
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
