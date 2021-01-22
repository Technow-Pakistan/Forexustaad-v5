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
                            <h5 class="m-b-10">Broker Categories</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{URL::to('/ustaad/dashboard')}}"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="{{URL::to('/ustaad/allbrokers')}}">All Brokers</a></li>
                            <li class="breadcrumb-item"><a href="#!">Categories</a></li>
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
                                Add Pair Category
                            </div>
                            <div class="card-body">
								<form class="socialForm1" action="" method="post">
									<div class="form-group pt-4">
										<label for="" class="">Add Broker Category</label>
										<input type="text" name="category" class="form-control socialLink1" placeholder="Enter Category" required>
									</div>
									<input type="submit" id="doaction" class="btn btn-outline-primary mt-4 socialButton1" value="Apply">
								</form>
							</div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                List of Categories
                            </div>
                            <div class="card-body">
                                <table class="table" id="user-list-table">
                                    <thead class="bg-primary text-white">
                                        <tr>
                                            <th>ID</th>
                                            <th>Category</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="border border-primary">
										@foreach($totalCategory as $data)
											<tr>
												<td class="tdLinkScroll">
													{{$data->id}}
												</td>
												<td class="tdLinkScroll">
													{{$data->category}}
												</td>
												<td class="tdLinkScroll">
													{{$data->created_at->format('Md, Y  h:i A')}}
												</td>
												<td>
													<a href="#">
														<i class="far fa-edit text-success mr-2 editlink1" value="{{$data->id}}"></i>
													</a>
													<a href="{{URL::to('/ustaad/broker')}}/{{$data->active == 0 ? 'deleteCategory' : 'activeCategory'}}/{{$data->id}}" class="addAction" data-toggle="modal" data-target="#myModal">
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
                </div>
        <!-- [ Main Content ] end -->
    </div>
</section>
<!-- [ Main Content ] end -->
@include('admin.include.footer')
<script>
	$(".editlink1").on("click",function(){
		var id = $(this).attr('value');
        console.log('Ge');
		var icon = $(this).parent().parent().parent().children()[1].innerText;
		$(".socialLink1").val(icon);
		$(".socialButton1").val("Update");
		$(".socialButton1").attr("class","btn btn-outline-danger mt-4 socialButton1");
		$(".socialForm1").attr("action","{{URL::to('ustaad/broker/editCategory/')}}/"+id+"");
	});
</script>