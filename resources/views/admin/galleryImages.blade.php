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
                            <img class="img-fluid card-img-top mainImageButton popupOpenDetail" id="popup-open" src="{{URL::to('storage/app')}}/{{$data}}" alt="Card image" title="Image Detail" popupData="{{$extension[$num]}}@/{{$fileImageSize}} Kb@/{{$dimensions[0]}} pixels@/{{$dimensions[1]}} pixels@/{{URL::to('storage/app')}}/{{$data}}">
                            <a href="{{URL::to('/ustaad/gallery/delete')}}/{{$title}}" class="deleteImageButton"><i class="feather icon-trash text-danger"></i></a>
                            <a href="{{URL::to('/ustaad/gallery/edit')}}/{{$title}}" class="editImageButton"><i class="feather icon-edit text-primary"></i></a>
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

{{-- modal --}}
<div id="popup" class="popup">
    <div class="popup-content">
      <div class="popup-body">
        <div class="popup-info-img"><img class="imgback" src="" alt=""></div>
        <div class="popup-info">
          <svg id="popup-close" class="close" width="24" height="24" viewBox="0 0 24 24"><path d="M19,6.41L17.59,5L12,10.59L6.41,5L5,6.41L10.59,12L5,17.59L6.41,19L12,13.41L17.59,19L19,17.59L13.41,12L19,6.41Z"></path></svg>
          <div class="info-container">
            <div class="popup-info-desc pl-5">
                <div class="form-group">
                    <label for="" class="imgExtension"></label>
                </div>
                <div class="form-group">
                    <label for="" class="imgSize"></label>
                </div>
                <div class="form-group">
                    <label for="" class="imgPath"></label>
                </div>
                <div class="form-group">
                    <label for="" class="imgWidth"></label>
                </div>
                <div class="form-group">
                    <label for="" class="imgHeight"></label>
                </div>

            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@include('admin.include.footer')
<style>
    .imgPath{
      word-break: break-all;
    }
    .imageStyling{
      color: black;
    }
    .imageStyling:hover{
      color:#4099ff;
    }
    .imgback{
      width:100%;
      height:100%;
    }
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
    .popup {
  display: none;
  position: fixed;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.6);
}
.popup .popup-content {
  position: absolute;
  top: 50%;
  left: 58%;
  -moz-transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  -webkit-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
  width: 80%;
  max-height: 60vh;
  margin: 0 auto;
  font-weight: 300;
}
.popup .popup-content .popup-body {
  height: 60vh;
  position: relative;
  animation: reveal 0.3s cubic-bezier(0.215, 0.61, 0.355, 1);
  overflow: hidden;
  will-change: transform, border-radius;
}
.popup .popup-content .popup-body .popup-info-img {
  float: left;
  width: 50%;
  height: 60vh;
  background: url('data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4gPHN2ZyB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGRlZnM+PGxpbmVhckdyYWRpZW50IGlkPSJncmFkIiBncmFkaWVudFVuaXRzPSJvYmplY3RCb3VuZGluZ0JveCIgeDE9IjAuOTUyNzkiIHkxPSItMC4wMzk2MTQiIHgyPSIwLjA0NzIxIiB5Mj0iMS4wMzk2MTQiPjxzdG9wIG9mZnNldD0iMCUiIHN0b3AtY29sb3I9IiMwMDAwZmYiLz48c3RvcCBvZmZzZXQ9IjEwMCUiIHN0b3AtY29sb3I9IiNmZjAwMDAiLz48L2xpbmVhckdyYWRpZW50PjwvZGVmcz48cmVjdCB4PSIwIiB5PSIwIiB3aWR0aD0iMTAwJSIgaGVpZ2h0PSIxMDAlIiBmaWxsPSJ1cmwoI2dyYWQpIiAvPjwvc3ZnPiA=');
  background: -moz-linear-gradient(230deg, #0000ff, #ff0000);
  background: -webkit-linear-gradient(230deg, #0000ff, #ff0000);
  background: linear-gradient(220deg, #0000ff, #ff0000);
  animation: bg 15s ease infinite;
  background-size: 400% 400%;
}
.popup .popup-content .popup-body .popup-info {
  width: auto;
  height: 60vh;
  color: #4f4f4f;
    padding: 10px;
  letter-spacing: .05em;
  opacity: 1;
  background-color: rgba(255, 255, 255, 0.9);
}
.popup .popup-content .popup-body .popup-info span {
  display: block;
}
.popup .popup-content .popup-body .popup-info .info-container {

  padding: 0 2em;
  margin: 2em 0;
  height: calc(100% - 4em);
}
.popup .popup-content .popup-body .popup-info .info-container .popup-info-desc {
  line-height: 1.5em;
  -moz-column-count: 2;
  -webkit-column-count: 2;
  column-count: 2;
}
.popup .popup-content .popup-body .popup-info .info-container .popup-info-desc p:first-child {
  margin-top: 0;
}
.popup .popup-content .popup-body .popup-info .close {
  position: absolute;
  top: 1em;
  right: 1em;
  cursor: pointer;
  fill: #999999;
}
.popup .popup-content .popup-body .popup-info .close:hover {
  fill: #666666;
}

@keyframes bg {
  0% {
    background-position: 75% 25%;
  }
  50% {
    background-position: 25% 75%;
  }
  100% {
    background-position: 75% 25%;
  }
}
@keyframes reveal {
  0% {
    -moz-transform: scale(0, 0);
    -ms-transform: scale(0, 0);
    -webkit-transform: scale(0, 0);
    transform: scale(0, 0);
    -moz-border-radius: 50%;
    -webkit-border-radius: 50%;
    border-radius: 50%;
  }
  50% {
    -moz-border-radius: 30%;
    -webkit-border-radius: 30%;
    border-radius: 30%;
  }
  100% {
    -moz-transform: scale(1, 1);
    -ms-transform: scale(1, 1);
    -webkit-transform: scale(1, 1);
    transform: scale(1, 1);
    -moz-border-radius: 0;
    -webkit-border-radius: 0;
    border-radius: 0;
  }
}
</style>
<script>
  $(".popupOpenDetail").on("click",function(){
      var data = $(this).attr("popupData");
      var src = $(this).attr("src");
      var content = data.split("@/");
      $(".imgback").attr("src",src);
      $(".imgExtension").html("Extension: " + content[0]);
      $(".imgSize").html("Size: " + content[1]);
      $(".imgWidth").html("Width: " + content[2]);
      $(".imgHeight").html("Height: " + content[3]);
      $(".imgPath").html("Path: <a class='imageStyling' href='" + content[4] + "' target='_blank'>"+ content[4]+ "</a>");
      popup.style.display = 'block';
  })
  $("#popup-close").on("click",function(){
      popup.style.display = 'none';
  })
</script>
