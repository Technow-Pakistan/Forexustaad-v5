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
                            <h5 class="m-b-10">Header</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{URL::to('/ustaad/dashboard')}}"><i class="fa fa-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">Header</a></li>
                            <li class="breadcrumb-item"><a href="#!">First Nav Bar</a></li>
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
                                Change Social Media Icons
                            </div>
                            <div class="card-body">
								<form class="socialForm" action="" method="post">
									<div class="alignleft actions bulkactions">
										<label for="bulk-action-selector-top" class="d-block ">Select Social Media</label>
										<select name="iconName" class="form-control w-75 d-inline-block socialIcon" id="bulk-action-selector-top">
											<option value="-1">Select</option>
											<option class="Twitter" value="Twitter">Twitter</option>
											<option class="Youtube" value="Youtube">Youtube</option>
											<option class="Facebook" value="Facebook">Facebook</option>
											<option class="LinkedIn" value="LinkedIn">LinkedIn</option>
											<option class="GooglePlus" value="GooglePlus">Google Plus</option>
											<option class="Pinterest" value="Pinterest">Pinterest</option>
											<option class="Snapchat" value="Snapchat">Snapchat</option>
											<option class="Tiktok" value="Tiktok">Tiktok</option>
											<option class="Instagram" value="Instagram">Instagram</option>
										</select>
										
									</div>
									<div class="form-group pt-4">
										<label for="" class="">Enter Link </label>
										<input type="url" name="link" class="form-control socialLink" placeholder="Enter Link" required>
									</div>
									<input type="submit" id="doaction" class="btn btn-outline-primary mt-4 socialButton" value="Apply">
								</form>
							</div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                List of Social Media
                            </div>
                            <div class="card-body">
                                <table id="user-list-table" class="table nowrap">
                                    <thead class="bg-primary text-white">
                                        <tr>
                                            <th class="w-30">Title</th>
                                            <th>Link</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="border border-primary">
										@foreach($totalData as $data)
											<tr>
												<td>
													{{$data->iconName}}
												</td>
												<td class="tdLinkScroll">
													{{$data->link}}
												</td>
												<td>

													{{$data->updated_at->format("d/m/Y")}}
												</td>
												<td>
													<a href="#">
														<i class="far fa-edit text-success mr-2 editlink" value="{{$data->id}}"></i>
													</a>
													<a href="{{URL::to('/ustaad/firstNav/trash')}}/{{$data->id}}" class="addAction">
														<i class="fa fa-times text-danger"></i>
													</a>
												</td>
											</tr>
										@endforeach
                                        
                                        
                                        
                                    </tbody>
									<tfoot>
                                        <tr>
                                            <th class="w-30">Title</th>
                                            <th>Link</th>
                                            <th>Date</th>
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
<script>
	$(".editlink").on("click",function(){
		var id = $(this).attr('value');
		var icon = $(this).parent().parent().parent().children()[0].innerText;
		var link = $(this).parent().parent().parent().children()[1].innerText;
		$(".socialIcon").find("."+icon).attr("selected",true);
		$(".socialLink").val(link);
		$(".socialButton").val("Update");
		$(".socialButton").attr("class","btn btn-outline-danger mt-4 socialButton");
		$(".socialForm").attr("action","{{URL::to('/ustaad/firstNav/edit/')}}/"+id+"");
		
		
	});
</script>