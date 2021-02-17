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
									<h5 class="m-b-10">All Static Pages</h5>
								</div>
								<div class="d-flex justify-content-between">
									<ul class="breadcrumb p-0 m-0 bg-white">
										<li class="breadcrumb-item">
											<a href="{{URL::to('/ustaad/dashboard')}}"><i class="fa fa-home"></i></a>
										</li>
										<li class="breadcrumb-item"><a href="#!">All Static Pages</a></li>
									</ul>
									<a href="{{URL::to('ustaad/staticpages/add')}}">Add New Static Page</a>
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
                                       <table id="user-list-table" class="table nowrap">
                                        <thead>
                                            <tr>
                                                <th>Id</th>
                                                <th>Title</th>
                                                <th>Link</th>
                                                <th>Date</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($StaticPages as $data)
                                                @php
                                                    $linkchangess = 0;
                                                    if($data->contentPage == "privacyPolice"){
                                                        $linkchangess = "1";
                                                    }elseif($data->contentPage == "TOS"){
                                                        $linkchangess = 1;
                                                    }
                                                @endphp
                                                <tr>
                                                    <td>
                                                        {{$data->id}}
                                                    </td>
                                                    <td>{{$data->title}}</td>
                                                    <td><a href="{{URL::to('')}}/{{$linkchangess == 0 ? 'p/' : ''}}{{$data->link}}" target="_blank">{{URL::to('')}}/{{$linkchangess == 0 ? 'p/' : ''}}{{$data->link}}</a></td>
                                                    <td>{{$data->created_at->format('Md, Y')}}</td>
                                                    <td>
                                                        <span class="badge badge-light-success">Active</span>
                                                        <div class="overlay-edit">
                                                            <a href="{{URL::to('/ustaad/staticpages/edit')}}/{{$data->id}}"> <button type="button" class="btn btn-icon btn-success"><i class="fa fa-edit"></i></button></a>
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