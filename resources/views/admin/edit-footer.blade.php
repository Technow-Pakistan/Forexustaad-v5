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
									<h5 class="m-b-10">Footer</h5>
								</div>
								<ul class="breadcrumb">
									<li class="breadcrumb-item">
										<a href="{{URL::to('/ustaad')}}"><i class="fa fa-home"></i></a>
									</li>
									<li class="breadcrumb-item"><a href="#!">Navigation</a></li>
									<li class="breadcrumb-item">
										<a href="#!">Footer</a>
									</li>
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
                                Edit Footer
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <p class="h2 text-primary py-3">Change Webinar Link</p>
                                        <form action="{{URL::to('/ustaad/edit-footer/webinar')}}" method="post">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="" class="">Webinar 1 </label>
                                                        <input type="text" name="webinar1" value="{{$Webinar[0]->webinar}}" class="form-control" placeholder="Enter your Link">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="" class="">Webinar 2 </label>
                                                        <input type="text" name="webinar2" value="{{$Webinar[1]->webinar}}" class="form-control" placeholder="Enter your Link">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="" class="">Webinar 3 </label>
                                                        <input type="text" name="webinar3" value="{{$Webinar[2]->webinar}}" class="form-control" placeholder="Enter your Link">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="" class="">Webinar 4 </label>
                                                        <input type="text" name="webinar4" value="{{$Webinar[3]->webinar}}" class="form-control" placeholder="Enter your Link">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="" class="">Webinar 5 </label>
                                                        <input type="text" name="webinar5" value="{{$Webinar[4]->webinar}}" class="form-control" placeholder="Enter your Link">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
														<label for="">Area </label>
														<select name="area" class="form-control">
															<option value="left" {{$Webinar[0]->area == "left" ? "selected" : ""}}>Left</option>
															<option value="center" {{$Webinar[0]->area == "center" ? "selected" : ""}}>Center</option>
															<option value="right" {{$Webinar[0]->area == "right" ? "selected" : ""}}>Right</option>
														</select>
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="submit" class="btn btn-primary mt-4" value="Submit">
                                        </form>
                                    </div>
                                </div>
                                <div class="row pt-5">
                                    <div class="col-md-12">
                                        <p class="h2 text-primary py-3">Change Contact Details</p>
                                        <form action="{{URL::to('/ustaad/edit-footer/contact')}}" method="post">
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="" class="">Address</label>
                                                        <input type="text" name="contact1" value="{{$Contact[0]->contact}}" class="form-control" placeholder="Enter your Address">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="" class="">Mobile Number </label>
                                                        <input type="text" name="contact2" value="{{$Contact[1]->contact}}" class="form-control" placeholder="Enter your Number">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="" class="">Email Account </label>
                                                        <input type="text" name="contact3" value="{{$Contact[2]->contact}}" class="form-control" placeholder="Enter your Mail">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
                                                        <label for="" class="">Skype ID </label>
                                                        <input type="text" name="contact4" value="{{$Contact[3]->contact}}" class="form-control" placeholder="Enter your Skype ID">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="form-group">
														<label for="">Area </label>
														<select name="area" class="form-control">
															<option value="left" {{$Contact[0]->area == "left" ? "selected" : ""}}>Left</option>
															<option value="center" {{$Contact[0]->area == "center" ? "selected" : ""}}>Center</option>
															<option value="right" {{$Contact[0]->area == "right" ? "selected" : ""}}>Right</option>
														</select>
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="submit" class="btn btn-primary mt-4" value="Submit">
                                        </form>
                                    </div>
                                </div>
                                <!-- <div class="row pt-4">
                                    <div class="col-md-6">
                                         <div class="alignleft actions bulkactions">
                                            <label for="bulk-action-selector-top" class="d-block ">Select Area </label>
                                            <select name="action" class="form-control w-75 d-inline-block" id="bulk-action-selector-top">
                                                <option value="-1">Select</option>
                                                <option value="edit">Right Side Detail</option>
                                                <option value="edit">Left Side Details</option>
                                                <option value="edit">Make List</option>
                                                <option value="edit">Widget</option>
                                                
                                            </select>
                                            
                                        </div>
                                     </div>
                                </div> -->
                                <div class="row">
                                    <div class="col-md-12">
										<form action="{{URL::to('/ustaad/edit-footer/description')}}" method="post">
											<div class="form-group pt-4">
												<p class="h2 text-primary py-3">Change Footer Details</p>
												<textarea name="editor1" class="form-control" placeholder="Page Body">
													@php
														$description = html_entity_decode($Description[0]->description);
														echo $description;
													@endphp
												</textarea>
											</div>
											<div class="form-group">
												<label for="">Area </label>
												<select name="area" class="form-control">
													<option value="left" {{$Description[0]->area == "left" ? "selected" : ""}}>Left</option>
													<option value="center" {{$Description[0]->area == "center" ? "selected" : ""}}>Center</option>
													<option value="right" {{$Description[0]->area == "right" ? "selected" : ""}}>Right</option>
												</select>
											</div>
											<input type="submit" class="btn btn-primary mt-4" value="Submit">
										</form>
									</div>
            
                                </div>
                            </div>
                        </div>
                    </div> 
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                Edit Copy Right
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <p class="h2 text-primary py-3">Left Description</p>
                                        <form action="{{URL::to('/ustaad/edit-footer/copyRight')}}" method="post">
                                            <textarea name="editor3" class="form-control" cols="30" rows="10">
                                                @php
                                                    $description = html_entity_decode($copyRight->description);
                                                    echo $description;
                                                @endphp
                                            </textarea>
                                            <input type="submit" class="btn btn-primary mt-4" value="Submit">
                                        </form>
                                    </div>
                                    <div class="col-md-6">
                                        <p class="h2 text-primary py-3">Right Description</p>
                                        <form action="{{URL::to('/ustaad/edit-footer/copyRight')}}" method="post">
                                            <textarea name="editor2" class="form-control" cols="30" rows="10">
                                                @php
                                                    $description = html_entity_decode($copyRight->description2);
                                                    echo $description;
                                                @endphp
                                            </textarea>
                                            <input type="submit" class="btn btn-primary mt-4" value="Submit">
                                        </form>
                                    </div>
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
    CKEDITOR.replace('editor2');
    CKEDITOR.replace('editor3');
</script>


