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

            <!-- [ Gallery-description ] start -->
            <div class="col-sm-12 gallery-masonry">
                <h5 class="mt-4 mb-3">{{$id}}</h5>
                <div class="card-columns">
                    @foreach($totalData as $data)
                    <div class="card">
                        <img class="img-fluid card-img-top" src="{{URL::to('storage/app')}}/{{$data}}" alt="Card image">
                        <div class="card-body">
                            <p>{{URL::to('storage/app')}}/{{$data}}</p>
                        </div>
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
    
   