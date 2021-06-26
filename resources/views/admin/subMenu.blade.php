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
                                <li class="breadcrumb-item"><a href="{{URL::to('/ustaad/navMenu')}}">Main Menus</a></li>
                                <li class="breadcrumb-item"><a href="#!">Sub Menus</a></li>
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
                            Change or Add Bar Sub Menus
                        </div>
                        <div class="card-body">
                            <form class="navForm" action="" method="post">
                                <div class="form-group pt-4">
                                    <label for="" class="">Add Sub Menu</label>
                                    <input type="text" name="submenu" class="form-control navMenu" placeholder="Add Menu" required>
                                </div>
                                <div class="form-group pt-4">
                                    <label for="" class="">Add Link</label>
                                    <input type="text" name="link" class="form-control navLink" placeholder="Add Link" required>
                                </div>
                                <div class="form-group pt-4">
                                    <label for="" class="">Main Menu</label>
                                    <select name="mainmenuId" id="" class="form-control mainMenu" required>
                                        @foreach($totalMainMenu as $menu)
                                            @php
                                                $arrayMenu = explode(' ',$menu->menu)
                                            @endphp
                                            <option class="{{$arrayMenu[0]}}" value="{{$menu->id}}">{{$menu->menu}}</option>
                                        @endforeach
                                    </select>
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
                            List of Sub Menus
                        </div>
                        <div class="card-body">
                            <table class="table">
                                <thead class="bg-primary text-white">
                                    <tr>
                                        <th>Sub Menus</th>
                                        <th>Link</th>
                                        <th>Main Menu</th>
                                        <th>Date</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody class="border border-primary">
                                    @foreach($totalData as $data)
                                        @php
                                            $Main = $data->GetMainMenu();
                                        @endphp
                                        <tr>
                                            <td>{{$data->submenu}}</td>
                                            <td>
                                                <a href="{{$data->link}}">{{$data->link}}</a>
                                            </td>
                                            <td>{{$Main->menu}}</td>
                                            <td>
                                                {{$data->updated_at->format("d/m/Y")}}
                                            </td>
                                            <td>
                                                <a href="#">
                                                    <i class="far fa-edit text-success mr-2 editlink" value="{{$data->id}}"></i>
                                                </a>
                                                <a href="{{URL::to('/ustaad/subMenu/trash')}}/{{$data->id}}" class="addAction" data-toggle="modal" data-target="#myModal">
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
		var str = $(this).parent().parent().parent().children()[2].innerText;
        var mainMenu = str.split(" ");
		$(".navLink").val(link);
		$(".navMenu").val(menu);
		$(".mainMenu").find("."+mainMenu[0]).attr("selected",true);
		$(".navButton").val("Update");
		$(".navButton").attr("class","btn btn-outline-danger mt-4 socialButton");
		$(".navForm").attr("action","{{URL::to('/ustaad/subMenu/edit/')}}/"+id+"");
		console.log(id);
	});
</script>
