@include('admin.include.header')

<!-- <link rel="stylesheet" href="{{URL::to('/public/AdminAssets/assets/css/plugins/daterangepicker.css')}}" /> -->


		<style>
			.accordion-msg {
	cursor: pointer;
	margin-bottom: 0;
    color: #222;
    font-size: 14px;
    font-weight: 700;
    display: block;
    padding: 14px 20px;
	border-top: 1px solid #ddd;
}

.accordion-msg:focus,
.accordion-msg:hover {
	text-decoration: none;
	outline: none
}

.faq-accordion .accordion-desc {
	padding: 20px
}

.accordion-desc {
	color: #222222;
	padding: 0 20px 20px
}

#color-accordion .accordion-desc {
	margin-top: 14px;
}

.ui-accordion-header-icon {
	float: right;
	font-size: 20px
}

.accordion-title {
	margin-bottom: 0
}

.accordion-block {
	padding: 0
}

.accordion-block p {
	margin-bottom: 0
}

.color-accordion-block a.ui-state-active,
.color-accordion-block a:focus,
.color-accordion-block a:hover {
	color: #fff;
	background: #4680ff
}
.select2-container--default{
    width: 100% !important;
}
		</style>
		<!-- [ Main Content ] start -->
		<section class="pcoded-main-container">
			<div class="pcoded-content">
				<!-- [ breadcrumb ] start -->
				<div class="page-header">
					<div class="page-block">
						<div class="row align-items-center">
							<div class="col-md-12">
								<div class="page-header-title">
									<h5 class="m-b-10">Add Post</h5>
								</div>
								<ul class="breadcrumb">
									<li class="breadcrumb-item">
										<a href="{{URL::to('/ustaad/dashboard')}}"><i class="feather icon-home"></i></a>
									</li>
									<li class="breadcrumb-item"><a href="{{URL::to('/ustaad/post/viewAll')}}">All Posts</a></li>
									<li class="breadcrumb-item">
										<a href="#!">Post</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<!-- [ breadcrumb ] end -->
				<!-- [ Main Content ] start -->
                
                <form id="SaveButton" method="post" action="{{URL::to('ustaad/post/all')}}" class=""  enctype="multipart/form-data">
   <div class="row">
      <div class="col-sm-8 col-xl-8 col-md-8 ">
         <div class="card">
            <div class="card-body">
               <div class="form-wrap">
                  <div class="form-group">
                     <label for="news-title" class="form-control-label">Main Title</label>
                     <input name="mainTitle" class="form-control mainTitle"  id="news-title" type="text" value="" size="40" aria-required="true" required="">
                     <small>The title is how it appears on your Forex News Page.</small>
                  </div>
                  <!-- <div class="form-group">
                     <label for="sub-title" class="form-control-label">Author</label>
                     <input name="subTitle" class="form-control " id="sub-title" type="text" value="" size="40" aria-required="true" required="">
                     <small>This is subtitle is how it appears on your Forex News Page.</small>
                  </div> -->
                  @php 
                     $value =Session::get('admin');
                  @endphp
                  <input type="hidden" name="userId" value="{{$value['id']}}">
                  <div class="form-group">
                     <label for="news-description" class="form-control-label m-0">Description (Max-character 200)</label>
                     <p class="text-right text-danger m-0 descriptionCount"></p>
                     <textarea name="description" maxlength="200" class="form-control description" id="news-description" rows="5" cols="40" required="" placeholder="Enter your Description here ..."></textarea>
                  </div>
                  <!-- <br>
                  <hr>
                  <input type="file" name="srcImage" id="srcImage" class="srcImage">
                  <input type="hidden" name="filePath" id="filePath" class="filePath" value="PostImages">
                  <br>
                  <hr> -->
                  <p class="text-danger  h4  pb-3"> Enter Detail Description</p>
                  <div class="form-group">
                     <!-- <textarea id="myEditor"></textarea> -->
                     <textarea name="editor1" id="editor1"></textarea>
                  </div>
                  <p class="submit">
                     <input type="submit" name="submit" id="submit" class="btn btn-outline-primary" value="Post"> <span class="spinner"></span>
                  </p>
               </div>
            </div>
         </div>
      </div>
      <div class="col-md-4 col-sm-4">
         <div class="card">
            <div class="card-header">
               <h5 class="card-header-text">Setting Of Post</h5>
            </div>
            <div class="card-block accordion-block">
               <div id="accordion" role="tablist" aria-multiselectable="true">
                  <div class="accordion-panel">
                     <div class="accordion-heading" role="tab" id="headingOne">
                        <h5 class="card-title accordion-title">
                           <a class="accordion-msg" data-toggle="collapse"
                              data-parent="#accordion" href="#collapseOne"
                              aria-expanded="true" aria-controls="collapseOne">
                           Status &amp; visibility
                           </a>
                        </h5>
                     </div>
                     <div id="collapseOne" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="headingOne">
                        <div class="accordion-content accordion-desc">
                           <div class="form-group">
                              <span>Visibility</span>
                              <span>
                                 <select class="js-example-basic-hide-search col-sm-12" name="visibility[]" multiple="multiple" style="width: 75%" required>
                                    <option value="0">All</option>
                                    @foreach($ClientMember as $member)
                                       <option value="{{$member->id}}">{{$member->member}}</option>
                                    @endforeach
                                 </select>
                              </span>
                           </div>
                           <div class="form-group">
                              <span>Publish</span>
                              <input type="date" name="publishDate" class="form-control" required/>
                           </div>
                           <div class="form-group">
                              <div>
                                 <input type="checkbox" id="scales" name="stickToTop" value="1">
                                 <label for="scales">Stick to the top of the blog</label>
                              </div>
                              <div>
                                 <input type="checkbox" id="pending" name="pending" value="0">
                                 <label for="pending">Pending review</label>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="accordion-panel">
                  <div class="accordion-heading" role="tab" id="headingTwo">
                     <h5 class="card-title accordion-title">
                        <a class="accordion-msg" data-toggle="collapse"
                           data-parent="#accordion" href="#collapseTwo"
                           aria-expanded="false"
                           aria-controls="collapseTwo">
                        Permalink
                        </a>
                     </h5>
                  </div>
                  <div id="collapseTwo" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingTwo">
                     <div class="accordion-content accordion-desc">
                        <div class="form-group">
                           <label for="">View Post</label>
                           <textarea type="text" name="permalink" class="form-control permalink" >{{URL::to('Blogs')}}/</textarea>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="accordion-panel">
                  <div class=" accordion-heading" role="tab" id="headingSeven">
                     <h5 class="card-title accordion-title">
                        <a class="accordion-msg" data-toggle="collapse"
                           data-parent="#accordion" href="#collapseSeven"
                           aria-expanded="false"
                           aria-controls="collapseSeven">
                        Category
                        </a>
                     </h5>
                  </div>
                  <div id="collapseSeven" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSeven">
                     <div class="accordion-content accordion-desc">
                        <!-- <div class="form-group">
                           <label for="">Serach</label>
                           <input type="text" class="form-control">
                        </div> -->
                        <div class="form-group">
                              <div class="newCategoryAppend">
                                 <ul class="pl-2 ulcat" style="list-style-type:none">
                                    @foreach($allMainCategory as $mainCategory)
                                       @php
                                          $subCategory = $mainCategory->GetSubCategory();
                                       @endphp
                                       <li class="{{$mainCategory->categoryName}}">
                                          <input type="checkbox" name="category[]" value="{{$mainCategory->categoryName}}"> {{$mainCategory->categoryName}}
                                          @if(count($subCategory) >= 1 )
                                             @foreach($subCategory as $sub)
                                                <ul  style="list-style-type:none">
                                                   <li class="{{$sub->categoryName}}">
                                                      <input type="checkbox" name="subCategory[]" value="{{$sub->categoryName}}"> {{$sub->categoryName}}
                                                   </li>
                                                </ul>
                                             @endforeach
                                          @endif
                                       </li>
                                    @endforeach
                                 </ul>
                              </div>
                           <div id="showmenu" class="text-primary pb-3">Add New Category</div>
                           <div class="menu" style="display: none;">
                              <div class="form-group">
                                 <label for="Add Category">Add Category</label>
                                 <input type="text" class="form-control newCategoryInput">
                              </div>
                              <div class="form-group">
                                 <label for="">Parent Category</label>
                                 <select name="Pcategory" id="selectedIndex" class="form-control partentcat">
                                    <option value="None" selected>None</option>
                                    @foreach($allMainCategory as $mainCategory)
                                       <option value="{{$mainCategory->categoryName}}">{{$mainCategory->categoryName}}</option>                                       
                                    @endforeach
                                 </select>
                                 <!-- <input type="text" class="form-control"> -->
                              </div>
                              <input type="" name="" id="submit" class="btn btn-outline-primary newCategoryRegister" value="Add New Category">
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="accordion-panel">
                  <div class=" accordion-heading" role="tab" id="headingThree">
                     <h5 class="card-title accordion-title">
                        <a class="accordion-msg" data-toggle="collapse"
                           data-parent="#accordion" href="#collapseThree"
                           aria-expanded="false"
                           aria-controls="collapseThree">
                        Tags
                        </a>
                     </h5>
                  </div>
                  <div id="collapseThree" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingThree">
                     <div class="accordion-content accordion-desc">
                        <div class="form-group">
                           <label for="">Add Tags</label>
                           <div class=" ">
                              <select class="js-example-tokenizer col-sm-12" name="tag[]" multiple="multiple" required>
                                @foreach($allTags as $tag)   
                                    <option value="{{$tag->tagName}}">{{$tag->tagName}}</option>
                                @endforeach
                              </select>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div class="accordion-panel">
                  <div class=" accordion-heading" role="tab" id="headingFour">
                     <h5 class="card-title accordion-title">
                        <a class="accordion-msg" data-toggle="collapse"
                           data-parent="#accordion" href="#collapseFour"
                           aria-expanded="false"
                           aria-controls="collapseFour">
                        Feature Image
                        </a>
                     </h5>
                  </div>
                  <div id="collapseFour" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFour">
                     <div class="accordion-content accordion-desc">
                        <div class="form-group">
                           <label for="">Upload Thumbnail</label>
                           <input type="file" id="img" name="img" accept="image/*">
                        </div>
                     </div>
                  </div>
               </div>
               <!-- <div class="accordion-panel">
                  <div class=" accordion-heading" role="tab" id="headingSix">
                     <h5 class="card-title accordion-title">
                        <a class="accordion-msg" data-toggle="collapse"
                           data-parent="#accordion" href="#collapseSix"
                           aria-expanded="false"
                           aria-controls="collapseSix">
                        Excerpt
                        </a>
                     </h5>
                  </div>
                  <div id="collapseSix" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingSix">
                     <div class="accordion-content accordion-desc">
                        <div class="form-group">
                           <label for="">Write an excerpt (optional)</label>
                           <textarea name="excerpt" id="" class="form-control" cols="30" rows="10"></textarea>
                        </div>
                     </div>
                  </div>
               </div> -->
               <div class="accordion-panel">
                  <div class=" accordion-heading" role="tab" id="headingFive">
                     <h5 class="card-title accordion-title">
                        <a class="accordion-msg" data-toggle="collapse"
                           data-parent="#accordion" href="#collapseFive"
                           aria-expanded="false"
                           aria-controls="collapseFive">
                        Discussion
                        </a>
                     </h5>
                  </div>
                  <div id="collapseFive" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingFive">
                     <div class="accordion-content accordion-desc">
                        <div class="form-group">
                           <div>
                              <input type="checkbox" id="scales" name="comment" value="1" checked>
                              <label for="scales">Allow Comments</label>
                           </div>
                           <div>
                              <input type="checkbox" id="scales" name="scales" checked>
                              <label for="scales">Allow pingbacks & trackbacks</label>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <input type="hidden" class="newMainCategory" name="newMainCategory" value="null">
   <input type="hidden" class="newSubCategory" name="newSubCategory" value="null">
</form>
				<!-- [ Main Content ] end -->
			</div>
		</section>
		<!-- [ Main Content ] end -->

       

@include('admin.include.footer')

<script src="{{URL::to('/public/AdminAssets/assets/js/plugins/moment.min.js')}}"></script>
<script src="{{URL::to('/public/AdminAssets/assets/js/plugins/daterangepicker.js')}}"></script>
<script src="{{URL::to('/public/AdminAssets/assets/js/pages/ac-datepicker.js')}}"></script>
<script>


        $(".fr-form").on("click",function(){
          
        var file =  $(".fr-form").find("input>");
        console.log(file); 
        })
      $(document).ready(function() {
        $('#showmenu').click(function() {
                $('.menu').slideToggle("fast");
        });
    }); 
    var link = $(".permalink").html();
    $(".mainTitle").on("change",function(){
        console.log("asd");
        var title = $(".mainTitle").val();
        title = title.replace(/ /g, '-');
        var url = link + title;
        var mainLink = $(".permalink").html(url);
        console.log(title);
        console.log("url[0]");
    });

    $(".newCategoryRegister").on("click",function(){
        var input = $(".newCategoryInput").val();
        if (input != "") {
            var selectedIndex =$('#selectedIndex').find(":selected").text();
            if (selectedIndex == "None") {
                $(".ulcat").append("<li  class='"+input+"'><input type='checkbox' name='category[]' value="+input+"> "+input+"</li>");
                $(".partentcat").append("<option value="+input+">"+input+"</option>");
                $(".newCategoryInput").val("");
                var old = $(".newMainCategory").val();
                var newCat = old + "@" + input;
                $(".newMainCategory").val(newCat);
            }else{
                var className = "." + selectedIndex;
                var asd = $(".ulcat").find(className).append("<ul style='list-style-type:none'><li class='"+input+"'><input type='checkbox' name='subCategory[]' value="+input+"@"+selectedIndex+"> "+input+"</li></ul>");
               
                var oldSub = $(".newSubCategory").val();
                var newSubCat =  oldSub + "," + input + "@" + selectedIndex;
                $(".newSubCategory").val(newSubCat);
            }
        }
    });

    // description Limit
    $(".descriptionCount").hide();
    $(".description").on("keyup",function(){
       var count = $(".description").val();
       var len = count.length;

       if(len == 0){
          $(".descriptionCount").hide();
       }else{
          $(".descriptionCount").show();
       }
       len = 200 - len;
       $(".descriptionCount").html("remaining: " + len);
    });


    // file src get
   $(document).ready(function() {
      $('#srcImage').change(function(){
        var file_data = $('#srcImage').prop('files')[0]; 
        var file_path = $('#filePath').val();   
        var form_data = new FormData();                  
        form_data.append('file', file_data);             
        form_data.append('filePath', file_path);
        $.ajax({
            url: "{{URL::to('/pro-img-disk.php')}}",
            type: "POST",
            data: form_data,
            contentType: false,
            cache: false,
            processData:false,
            success: function(data){
               alert(data)
            }
        });
      });
   });
</script>

