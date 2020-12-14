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
									<h5 class="m-b-10">Add New Category</h5>
								</div>
								<ul class="breadcrumb">
									<li class="breadcrumb-item">
										<a href="index.html"><i class="feather icon-home"></i></a>
									</li>
									<li class="breadcrumb-item"><a href="add-new.html">Add New Posts</a></li>
									<li class="breadcrumb-item">
										<a href="#!">Add New Category</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<!-- [ breadcrumb ] end -->
				<!-- [ Main Content ] start -->
                <div class="row">
                    <div class="col-sm-12 col-xl-4 col-md-12 ">
                        <div class="form-wrap">
                            <h5 class="text-dark pb-2">Add New Category</h5>
                            <form id="addtag" method="post" action="" class="">
                                <div class="form-group">
                                    <label for="cat-name" class="form-control-label">Name</label>
                                    <input name="name" class="form-control " id="cat-name" type="text" value="" size="40" aria-required="true" required>
                                    <small>The name is how it appears on your site.</small>
                                </div>
                                <div class="form-group">
                                    <label for="cat-slug" class="form-control-label">Slug</label>
                                    <input name="slug" id="cat-slug" type="text" class="form-control" value="" size="40" required>
                                    <small>The “slug” is the URL-friendly version of the name. It is usually all lowercase and contains only letters, numbers, and hyphens.</small>
                                </div>
                                <div class="form-group">
                                    <label for="parent" class="form-control-label">Parent Category</label>
                                    <select name="parent" id="parent" class="form-control">
                                        <option value="-1">None</option>
                                        <option class="level-0" value="1">Uncategorized</option>
                                    </select>
                                    <small>Categories, unlike tags, can have a hierarchy. You might have a Jazz category, and under that have children categories for Bebop and Big Band. Totally optional.</small>
                                </div>
                                <div class="form-group">
                                    <label for="cat-description" class="form-control-label">Description</label>
                                    <textarea name="description" class="form-control" id="cat-description" rows="5" cols="40" required></textarea>
                                    <small>The description is not prominent by default; however, some themes may show it.</small>
                                </div>
                                <p class="submit">
                                    <input type="submit" name="submit" id="submit" class="btn btn-outline-primary" value="Add New Category"> <span class="spinner"></span>
                                </p>
                            </form>
                        </div>
                    </div>
                    <div class="col-xl-8 col-md-12 col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                <form id="posts-filter" method="get">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="alignleft pt-2 actions bulkactions">
                                                <select name="action" class="form-control w-75 d-inline-block" id="bulk-action-selector-top">
                                                    <option value="-1">Bulk Actions</option>
                                                    <option value="trash">Delete</option>
                                                </select>
                                                <input type="submit" id="doaction" class="btn btn-outline-primary" value="Apply">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class=" clearfix pt-2">
                                                <div class="float-right">
                                                    <p class="search-box form-group d-flex">
                                                        <input type="search" id="post-search-input" name="s" class=" mr-2 form-control" value="" placeholder="Search...">
                                                        <input type="submit" id="search-submit" class="btn btn-outline-primary" value="Search Posts">
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <br class="clear">
                                    <div class=" p-3">
                                        <table class="table">
                                            <thead class="bg-primary text-white">
                                                <tr>
                                                    <th class="w-25">Name</th>
                                                    <th>Description</th>
                                                    <th>Slug</th>
                                                    <th>Count</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody class="border border-primary">
												@foreach($totalData as $data)
													<tr>
														<td class="w-25">{{$data->name}}</td>
														<td>{{$data->description}}</td>
														<td><small>{{$data->slug}}</small></td>
														<td>3</td>
														<td>
															<a href="#">
																<i class="far fa-edit text-success mr-2"></i>
															</a>
															<a href="{{URL::to('/ustaad/category/delete')}}/{{$data->id}}">
																<i class="fa fa-times text-danger"></i>
															</a>
														</td>
													</tr>
												@endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
				<!-- [ Main Content ] end -->
			</div>
		</section>
		<!-- [ Main Content ] end -->
@include('admin.include.footer')
