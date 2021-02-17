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
                            <h5 class="m-b-10">Signal Pairs</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{URL::to('/ustaad/dashboard')}}"><i class="fa fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{URL::to('/ustaad/signals')}}">All Signals</a></li>
                            <li class="breadcrumb-item"><a href="#!">Pairs</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                Add Pair Category
                            </div>
                            <div class="card-body">
								<form class="socialForm1" action="{{URL::to('ustaad/signals/pairCategory')}}" method="post">
									<div class="form-group pt-4">
										<label for="" class="">Add Pair Category</label>
										<input type="text" name="category" class="form-control socialLink1" placeholder="Enter Category" required>
									</div>
									<input type="submit" id="doaction" class="btn btn-outline-primary mt-4 socialButton1" value="Apply">
								</form>
							</div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                Add Pair
                            </div>
                            <div class="card-body">
								<form class="socialForm" action="" method="post">
									<div class="alignleft actions bulkactions">
										<label for="bulk-action-selector-top" class="d-block ">Select Category</label>
										<select name="categoryId" class="form-control d-inline-block socialIcon" id="bulk-action-selector-top">
                                            @foreach($totalCategory as $category)
                                                @if($category->active == 0)
											        <option class="{{$category->category}}" value="{{$category->id}}">{{$category->category}}</option>
                                                @endif
                                            @endforeach
										</select>
										
									</div>
									<div class="form-group pt-4">
										<label for="" class="">Add Pair</label>
										<input type="text" name="pair" class="form-control socialLink" placeholder="Enter Pair" required>
									</div>
									<input type="submit" id="doaction" class="btn btn-outline-primary mt-4 socialButton" value="Apply">
								</form>
							</div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                List of Categories
                            </div>
                            <div class="card-body">
                                <table class="table" id="user-list-table">
                                    <thead class="bg-primary text-white">
                                        <tr>
                                            <th>Category</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="border border-primary">
										@foreach($totalCategory as $data)
											<tr>
												<td class="tdLinkScroll">
													{{$data->category}}
												</td>
												<td>
													<a href="#">
														<i class="far fa-edit text-success mr-2 editlink1" value="{{$data->id}}"></i>
													</a>
													<a href="{{URL::to('/ustaad/signals/pairCategory')}}/{{$data->active == 0 ? 'delete' : 'active'}}/{{$data->id}}" class="addAction" data-toggle="modal" data-target="#myModal">
														@if($data->active == 0)
                                                            <i class="fa fa-lock text-danger addAction" ></i>
                                                        @else
                                                            <i class="fa fa-unlock text-success"></i>
                                                        @endif
													</a>
												</td>
											</tr>
										@endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                List of Pairs
                            </div>
                            <div class="card-body">
                                <table class="table" id="user-list-table1">
                                    <thead class="bg-primary text-white">
                                        <tr>
                                            <th class="w-30">Pair</th>
                                            <th>Category</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="border border-primary">
										@foreach($totalData as $data)
                                            @php 
                                                $categoryInfo = $data->getCategory();
                                            @endphp
											<tr>
												<td>
													{{$data->pair}}
												</td>
												<td class="tdLinkScroll">
													{{$categoryInfo->category}}
												</td>
												<td>
													<a href="#">
														<i class="far fa-edit text-success mr-2 editlink" value="{{$data->id}}"></i>
													</a>
													<a href="{{URL::to('/ustaad/signals/pair')}}/{{$data->active == 0 ? 'delete' : 'active'}}/{{$data->id}}" class="addAction" data-toggle="modal" data-target="#myModal">
                                                        @if($data->active == 0)
                                                            <i class="fa fa-lock text-danger"></i>
                                                        @else
                                                            <i class="fa fa-unlock text-success"></i>
                                                        @endif
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
        <!-- [ Main Content ] end -->
    </div>
</section>
<!-- [ Main Content ] end -->
@include('admin.include.footer')
<script>
	$(".editlink").on("click",function(){
		var id = $(this).attr('value');
		var icon = $(this).parent().parent().parent().children()[0].innerText;
		var link = $(this).parent().parent().parent().children()[1].innerText;
		$(".socialIcon").find("."+link).attr("selected",true);
		$(".socialLink").val(icon);
		$(".socialButton").val("Update");
		$(".socialButton").attr("class","btn btn-outline-danger mt-4 socialButton");
		$(".socialForm").attr("action","{{URL::to('/ustaad/signals/pair/edit/')}}/"+id+"");
	});
	$(".editlink1").on("click",function(){
		var id = $(this).attr('value');
        console.log('Ge');
		var icon = $(this).parent().parent().parent().children()[0].innerText;
		$(".socialLink1").val(icon);
		$(".socialButton1").val("Update");
		$(".socialButton1").attr("class","btn btn-outline-danger mt-4 socialButton1");
		$(".socialForm1").attr("action","{{URL::to('ustaad/signals/pairCategory/edit/')}}/"+id+"");
	});
</script>