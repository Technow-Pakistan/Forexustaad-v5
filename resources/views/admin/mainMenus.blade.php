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
                            <div class="d-flex justify-content-between">
                                <ul class="breadcrumb p-0 m-0 bg-white">
                                    <li class="breadcrumb-item"><a href="{{URL::to('/ustaad/dashboard')}}"><i class="fa fa-home"></i></a></li>
                                    <li class="breadcrumb-item"><a href="#!">Header</a></li>
                                    <li class="breadcrumb-item"><a href="#!">Nav Menus</a></li>
                                </ul>
                                <div>
                                    <a href="{{URL::to('ustaad/subMenu/')}}">All Sub Menus</a>
                                </div>
							</div>
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
                            Change or Add Nav Bar Menus
                        </div>
                        <div class="card-body">
                            <form class="navForm" action="" method="post">
                                <div class="form-group pt-4">
                                    <label for="" class="">Add Menu</label>
                                    <input type="text" name="menu" class="form-control navMenu" placeholder="Add Menu" required>
                                </div>
                                <div class="form-group pt-4">
                                    <label for="" class="">Add Link</label>
                                    <input type="text" name="link" class="form-control navLink" placeholder="Add Link" required>
                                </div>
                                <div class="form-group pt-4">
                                    <label for="" class="">Upper Menu</label>
                                    <input type="checkbox" name="upper" class="navupper" value="1">
                                </div>
                                <input type="submit" id="doaction" class="btn btn-outline-primary mt-4 navButton" value="Add">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            List of Nav Menus
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead class="bg-primary text-white">
                                    <tr>
                                        <th>Menus</th>
                                        <th>Link</th>
                                        <th>Menu Appears</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody class="border border-primary">
                                    @foreach($totalData as $data)
                                        <tr>
                                            <td>{{$data->menu}}</td>
                                            <td>
                                                <a href="{{$data->link}}">{{$data->link}}</a>
                                            </td>
                                            <td>{{$data->upper == 1 ? 'Upper Menu' : 'Nav Bar'}}</td>
                                            <td>{{$data->updated_at->format("d/m/Y")}}</td>
                                            <td>
                                                <a href="#">
                                                    <i class="far fa-edit text-success mr-2 editlink" value="{{$data->id}}"></i>
                                                </a>
                                                <a href="{{URL::to('/ustaad/navMenu/trash')}}/{{$data->id}}" class="addAction" data-toggle="modal" data-target="#myModal">
                                                    <i class="fa fa-times text-danger"></i>
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
		var menu = $(this).parent().parent().parent().children()[0].innerText;
		var link = $(this).parent().parent().parent().children()[1].innerText;
		var upper = $(this).parent().parent().parent().children()[2].innerText;
        if(upper == "Upper Menu"){
            $(".navupper").prop('checked',true);
        }else{
            $(".navupper").prop('checked',false);
        }
		$(".navLink").val(link);
		$(".navMenu").val(menu);
		$(".navButton").val("Update");
		$(".navButton").attr("class","btn btn-outline-danger mt-4 socialButton");
		$(".navForm").attr("action","{{URL::to('/ustaad/navMenu/edit/')}}/"+id+"");
		console.log(id);
	});
</script>
