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
                            <h5 class="m-b-10">{{$id}}</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{URL::to('/ustaad/dashboard')}}"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">Gallery</a></li>
                            <li class="breadcrumb-item"><a href="#!">{{$id}}</a></li>
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
                                {{$id}}
                            </div>
                            <div class="card-body">
                                
                                <form action="" method="post" enctype="multipart/form-data">
                                    <input type="file" class="form-control h-100" name="file_photo" id="" required>
                                    <br>
                                    <p align="right"> <button class="btn btn-info mt-1">Upload</button></p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
        <!-- [ Main Content ] end -->
        <!-- [ Main Content ] start -->
        <div class="row">

            <!-- [ Gallery-description ] start -->
            <div class="col-sm-12 gallery-masonry">
                <h5 class="mt-4 mb-3">{{$id}}</h5>
                <div class="card-columns">
                    @foreach($totalData as $data)
                        @php
                            $title = str_replace("/","@-",$data);
                            $extension = explode(".",$data);
                            $number = count($extension);
                            $num = $number-1;
                            $size = get_headers("http://localhost/forexustaad/storage/app/$data",1);
                            $ImageSize = $size["Content-Length"] / 1024;
                            $fileImageSize = number_format($ImageSize,2);
                            $dimensions = getimagesize("http://localhost/forexustaad/storage/app/$data");
                        @endphp
                        <div class="card">
                            <img class="img-fluid card-img-top mainImageButton" src="{{URL::to('storage/app')}}/{{$data}}" alt="Card image" data-toggle="popover" title="Image Detail" data-content="extension: {{$extension[$num]}} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; size: {{$fileImageSize}} Kb &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; width: {{$dimensions[0]}} pixels &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; height: {{$dimensions[1]}} pixels &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; path:{{URL::to('storage/app')}}/{{$data}}">
                            <a href="{{URL::to('/ustaad/gallery/delete')}}/{{$title}}" class="deleteImageButton"><i class="feather icon-trash text-danger"></i></a> 
                            <a href="#" class="editImageButton"><i class="feather icon-edit text-primary"></i></a> 
                        </div>
                    @endforeach
                </div>
            </div>
            <!-- [ Gallery-description ] end -->
        </div>
        <!-- [ Main Content ] end -->
    </div>
</section>
<!-- [ Main Content ] end -->
@include('admin.include.footer')
<style>
    .deleteImageButton{
        position:absolute;
        top:10px;
        right:10px;
        font-size:20px;
    }
    .editImageButton{
        position:absolute;
        top:10px;
        right:40px;
        font-size:20px;
    }
        
    .mainImageButton{
        position:relative;
    }
</style>
    
   