@include('inc.header')

        <!-- Content Area -->

        <div class="content_area">
    <section class="after_banner_content_area">
        <div class="container">
            <div class="row justify-content-center">
                @php
                    if(Session::has('error')){
                        $error =Session::get('error');
                    }
                    @endphp
                @isset($error)
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="alert alert-danger">{{$error}}</div>
                        @php Session::pull('error') @endphp
                    </div>
                @endisset
                {{-- <div class="col-lg-3 col-md-6 col-sm-12 order-2 order-lg-1">
                    @include('inc.home-left-sidebar')
                </div> --}}
                <div class="col-lg-9 col-md-12 order-1 order-lg-2 justify-content-center d-flex">

                    <div class="user-ragistration">
                        <div class="container register">
                                    <div class="row">
                                        <div class="col-md-3 register-left">
                                            <img src="https://image.ibb.co/n7oTvU/logo_white.png" alt=""/>
                                            <div>
                                                <span>Become</span>
                                            <h3 class="text-white font-bold"> <br>VIP Member</h3>
                                            </div>
                                            <p>You are 30 seconds away from Re-shaping your Future so just fill this form and start your Free forex training </p><h3 class="text-white font-bold pt-3">NOW! </h3>
                                        </div>
                                        <div class="col-md-9 register-right">
                                            <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                                                <li class="nav-item">
                                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">User Details</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Account Details</a>
                                                </li>
                                            </ul>
                                            <div class="tab-content" id="myTabContent">
                                                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                                    <h3 class="register-heading text-center">Enter Your Detail</h3>
                                                    <div class="m-115">
                                                    <div class="row ">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" placeholder="First Name *" value="" />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <input type="email" class="form-control" placeholder="Last Name *" value="" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" placeholder="UserName *" value="" />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" placeholder="Nick Name " value="" />
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <!-- Enter the estimate profit -->
                                                                <div class="dynamic-field1" id="dynamic-field-2">
                                                                    <label class="d-none"></label>
                                                                    <input type="text" name="takeProfit[]" value="" placeholder="Enter Your Number" required="" class="form-control">
                                                                </div>
                                                                <!-- when user click on add new please on append of id aff show a new Take profit text field we can add multiple profit  -->
                                                                <div class="text-right clearfix" id="aff">
                                                                    <span class="float-left"><small>Add Your More Numbers</small></span>
                                                                    <div class="float-right">
                                                                        <div class="clearfix">
                                                                            <div class="float-left"> </div>
                                                                            <div class="float-right">
                                                                                <a type="button" class="border-0 text-success mr-2" id="add-button1"><i class="fa fa-plus"></i></a>
                                                                                <a type="button" class="border-0 text-danger" id="remove-button1"><i class="fa fa-minus"></i></a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <!-- Enter the estimate profit -->
                                                                <div class="dynamic-field" id="dynamic-field-1">
                                                                    <label class="d-none"></label>
                                                                    <input type="mail" name="takeProfit[]" value="" placeholder="Enter Your Mail" required="" class="form-control">
                                                                </div>
                                                                <!-- when user click on add new please on append of id aff show a new Take profit text field we can add multiple profit  -->
                                                                <div class="text-right clearfix" id="aff">
                                                                    <span class="float-left"><small>Add Your More Emails</small></span>
                                                                    <div class="float-right">
                                                                        <div class="clearfix">
                                                                            <div class="float-left"> </div>
                                                                            <div class="float-right">
                                                                                <a type="button" class="border-0 text-success mr-2" id="add-button"><i class="fa fa-plus"></i></a>
                                                                                <a type="button" class="border-0 text-danger" id="remove-button"><i class="fa fa-minus"></i></a>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <input type="password" class="form-control"  placeholder="Password *" value="" />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" placeholder="Confirm Password  *" value="" />
                                                            </div>

                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <textarea name="" id="" class="form-control" cols="30" rows="5" placeholder="Describe YourSelf"></textarea>

                                                        </div>
                                                        <div class="col-md-12 justify-content-end d-flex pt-2">
                                                            <input type="submit" class="btn btn-primary btn-radial"  value="Save"/>
                                                        </div>
                                                    </div>
                                                </div>
                                                </div>
                                                <div class="tab-pane fade show" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                                    <h3  class="register-heading">Account Details</h3>
                                                    <div class="m-115">
                                                    <div class="row ">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" placeholder="Account Number *" value="" />
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" placeholder="Account Name *" value="" />
                                                            </div>
                                                            {{-- <div class="form-group">
                                                                <input type="email" class="form-control" placeholder="Email *" value="" />
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="text" maxlength="10" minlength="10" class="form-control" placeholder="Phone *" value="" />

                                                            </div> --}}
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <input type="mail" class="form-control" placeholder="Email *" value="" />
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="numbers" class="form-control" placeholder="Deposit" value="" />
                                                            </div>
                                                           {{--  <div class="form-group">
                                                                <input type="text" class="form-control" placeholder="`Answer *" value="" />
                                                            </div>
                                                            <div class="form-group">
                                                                <input type="text" class="form-control" placeholder="`Answer *" value="" />
                                                            </div> --}}

                                                        </div>

                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-12 justify-content-end d-flex pt-2">
                                                            <input type="submit" class="btn btn-primary btn-radial"  value="Save"/>
                                                        </div>
                                                    </div>
                                                </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                    </div>
                </div>


                {{-- <div class="col-lg-3 col-md-6 col-sm-12 order-3 order-lg-3">
                    @include('inc.home-right-sidebar')

                </div> --}}
            </div>

            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-12 order-2 order-lg-1">
                    @include('inc.home-left-sidebar')
                </div>
                <div class="col-lg-6 col-md-12 order-1 order-lg-2">
                    <div class="container">
                        <div class="col-md-12" id="fbcomment">
                            <div class="header_comment">
                                <div class="row">
                                    <div class="col-md-6 text-left">
                                      <span class="count_comment">264235 Comments</span>
                                    </div>
                                    <div class="col-md-6 text-right">
                                      <span class="sort_title">Sort by</span>
                                      <select class="sort_by">
                                        <option>Top</option>
                                        <option>Newest</option>
                                        <option>Oldest</option>
                                      </select>
                                    </div>
                                </div>
                            </div>

                            <div class="body_comment">
                                <div class="row">
                                    <div class="avatar_comment col-md-2">
                                      <img src="https://static.xx.fbcdn.net/rsrc.php/v1/yi/r/odA9sNLrE86.jpg" alt="avatar"/>
                                    </div>
                                    <div class="box_comment col-md-10">
                                      <textarea class="commentar" placeholder="Add a comment..."></textarea>
                                      <div class="box_post">
                                        <div class="pull-left">
                                          <input type="checkbox" id="post_fb"/>
                                          <label for="post_fb">Also post on Facebook</label>
                                        </div>
                                        <div class="pull-right">
                                          <span>
                                            <img src="https://static.xx.fbcdn.net/rsrc.php/v1/yi/r/odA9sNLrE86.jpg" alt="avatar" />
                                            <i class="fa fa-caret-down"></i>
                                          </span>
                                          <button onclick="submit_comment()" type="button" value="1">Post</button>
                                        </div>
                                      </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <ul id="list_comment" class="col-md-12">
                                        <!-- Start List Comment 1 -->
                                        <li class="box_result row">
                                            <div class="avatar_comment col-md-2">
                                                <img src="https://static.xx.fbcdn.net/rsrc.php/v1/yi/r/odA9sNLrE86.jpg" alt="avatar"/>
                                            </div>
                                            <div class="result_comment col-md-10">
                                                <h4>Nath Ryuzaki</h4>
                                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's.</p>
                                                <div class="tools_comment">
                                                    <a class="like" href="#">Like</a>
                                                    <span aria-hidden="true"> · </span>
                                                    <a class="replay" href="#">Reply</a>
                                                    <span aria-hidden="true"> · </span>
                                                    <i class="fa fa-thumbs-o-up"></i> <span class="count">1</span>
                                                    <span aria-hidden="true"> · </span>
                                                    <span>26m</span>
                                                </div>
                                                <ul class="child_replay">
                                                    <li class="box_reply row">
                                                        <div class="avatar_comment col-md-2">
                                                            <img src="https://static.xx.fbcdn.net/rsrc.php/v1/yi/r/odA9sNLrE86.jpg" alt="avatar"/>
                                                        </div>
                                                         <div class="result_comment col-md-10">
                                                            <h4>Sugito</h4>
                                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's.</p>
                                                            <div class="tools_comment">
                                                                <a class="like" href="#">Like</a>
                                                                <span aria-hidden="true"> · </span>
                                                                <a class="replay" href="#">Reply</a>
                                                                <span aria-hidden="true"> · </span>
                                                                <i class="fa fa-thumbs-o-up"></i> <span class="count">1</span>
                                                                <span aria-hidden="true"> · </span>
                                                                <span>26m</span>
                                                            </div>
                                                            <ul class="child_replay"></ul>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>

                                        <!-- Start List Comment 2 -->
                                        <li class="box_result row">
                                            <div class="avatar_comment col-md-2">
                                                <img src="https://static.xx.fbcdn.net/rsrc.php/v1/yi/r/odA9sNLrE86.jpg" alt="avatar"/>
                                            </div>
                                            <div class="result_comment col-md-10">
                                                <h4>Gung Wah</h4>
                                                <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's.</p>
                                                <div class="tools_comment">
                                                    <a class="like" href="#">Like</a>
                                                    <span aria-hidden="true"> · </span>
                                                    <a class="replay" href="#">Reply</a>
                                                    <span aria-hidden="true"> · </span>
                                                    <i class="fa fa-thumbs-o-up"></i> <span class="count">1</span>
                                                    <span aria-hidden="true"> · </span>
                                                    <span>26m</span>
                                                </div>
                                                <ul class="child_replay">
                                                    <li class="box_result row">
                                                        <div class="avatar_comment col-md-2">
                                                            <img src="https://static.xx.fbcdn.net/rsrc.php/v1/yi/r/odA9sNLrE86.jpg" alt="avatar"/>
                                                        </div>
                                                        <div class="result_comment col-md-10">
                                                            <h4>Gung Wah</h4>
                                                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's.</p>
                                                            <div class="tools_comment">
                                                                <a class="like" href="#">Like</a>
                                                                <span aria-hidden="true"> · </span>
                                                                <a class="replay" href="#">Reply</a>
                                                                <span aria-hidden="true"> · </span>
                                                                <i class="fa fa-thumbs-o-up"></i> <span class="count">1</span>
                                                                <span aria-hidden="true"> · </span>
                                                                <span>26m</span>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                    </ul>
                                <button class="show_more" type="button">Load 10 more comments</button>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>

                <div class="col-lg-3 col-md-6 col-sm-12 order-3 order-lg-3">
                    @include('inc.home-right-sidebar')

                </div>
            </div>
        </div>
    </section>

<!--     <div id="particles-js" style="height: 0;"></div> -->
</div>



@include('inc.footer')

<script>
      $(document).ready(function() {
        var buttonAdd = $("#add-button");
        var buttonRemove = $("#remove-button");
        var className = ".dynamic-field";
        var count = 0;
        var field = "";
        var maxFields = 5;

        function totalFields() {
            return $(className).length;
        }

        function addNewField() {
            count = totalFields() + 1;
            field = $("#dynamic-field-1").clone();
            field.attr("id", "dynamic-field-" + count);
            field.find("input").val("");
            $(className + ":last").after($(field));
        }

        function removeLastField() {
            if (totalFields() > 1) {
                $(className + ":last").remove();
            }
        }

        function enableButtonRemove() {
            if (totalFields() === 2) {
                buttonRemove.removeAttr("disabled");
                buttonRemove.addClass("text-danger");
            }
        }

        function disableButtonRemove() {
            if (totalFields() === 1) {
                buttonRemove.attr("disabled", "disabled");
                buttonRemove.removeClass("text-light");
            }
        }

        function disableButtonAdd() {
            if (totalFields() === maxFields) {
                buttonAdd.attr("disabled", "disabled");
                buttonAdd.removeClass("text-light");
            }
        }

        function enableButtonAdd() {
            if (totalFields() === (maxFields - 1)) {
                buttonAdd.removeAttr("disabled");
                buttonAdd.addClass("text-success");
            }
        }

        buttonAdd.click(function() {
            addNewField();
            enableButtonRemove();
            disableButtonAdd();
        });

        buttonRemove.click(function() {
            removeLastField();
            disableButtonRemove();
            enableButtonAdd();
        });




    });

    $(document).ready(function() {
        var buttonAdd = $("#add-button1");
        var buttonRemove = $("#remove-button1");
        var className = ".dynamic-field1";
        var count = 0;
        var field = "";
        var maxFields = 5;

        function totalFields() {
            return $(className).length;
        }

        function addNewField() {
            count = totalFields() + 1;
            field = $("#dynamic-field-2").clone();
            field.attr("id", "dynamic-field1-" + count);
            field.find("input").val("");
            $(className + ":last").after($(field));
        }

        function removeLastField() {
            if (totalFields() > 1) {
                $(className + ":last").remove();
            }
        }

        function enableButtonRemove() {
            if (totalFields() === 2) {
                buttonRemove.removeAttr("disabled");
                buttonRemove.addClass("text-danger");
            }
        }

        function disableButtonRemove() {
            if (totalFields() === 1) {
                buttonRemove.attr("disabled", "disabled");
                buttonRemove.removeClass("text-light");
            }
        }

        function disableButtonAdd() {
            if (totalFields() === maxFields) {
                buttonAdd.attr("disabled", "disabled");
                buttonAdd.removeClass("text-light");
            }
        }

        function enableButtonAdd() {
            if (totalFields() === (maxFields - 1)) {
                buttonAdd.removeAttr("disabled");
                buttonAdd.addClass("text-success");
            }
        }

        buttonAdd.click(function() {
            addNewField();
            enableButtonRemove();
            disableButtonAdd();
        });

        buttonRemove.click(function() {
            removeLastField();
            disableButtonRemove();
            enableButtonAdd();
        });




    });
</script>

<style>
    .pull-right{
  float:right;
}
.pull-left{
  float:left;
}
#fbcomment{
  background:#fff;
  border: 1px solid #dddfe2;
  border-radius: 3px;
  color: #4b4f56;
  padding:50px;
}
.header_comment{
    font-size: 14px;
    overflow: hidden;
    border-bottom: 1px solid #e9ebee;
    line-height: 25px;
    margin-bottom: 24px;
    padding: 10px 0;
}
.sort_title{
  color: #4b4f56;
}
.sort_by{
  background-color: #f5f6f7;
  color: #4b4f56;
  line-height: 22px;
  cursor: pointer;
  vertical-align: top;
  font-size: 12px;
  font-weight: bold;
  vertical-align: middle;
  padding: 4px;
  justify-content: center;
  border-radius: 2px;
  border: 1px solid #ccd0d5;
}
.count_comment{
  font-weight: 600;
}
.body_comment{
    padding: 0 8px;
    font-size: 14px;
    display: block;
    line-height: 25px;
    word-break: break-word;
}
.avatar_comment{
  display: block;
}
.avatar_comment img{
  height: 48px;
  width: 48px;
}
.box_comment{
	display: block;
    position: relative;
    line-height: 1.358;
    word-break: break-word;
    border: 1px solid #d3d6db;
    word-wrap: break-word;
    background: #fff;
    box-sizing: border-box;
    cursor: text;
    font-family: Helvetica, Arial, sans-serif;
    font-size: 16px;
	padding: 0;
}
.box_comment textarea{
	min-height: 40px;
	padding: 12px 8px;
	width: 100%;
	border: none;
	resize: none;
}
.box_comment textarea:focus{
  outline: none !important;
}
.box_comment .box_post{
	border-top: 1px solid #d3d6db;
    background: #f5f6f7;
    padding: 8px;
    display: block;
    overflow: hidden;
}
.box_comment label{
  display: inline-block;
  vertical-align: middle;
  font-size: 11px;
  color: #90949c;
  line-height: 22px;
}
.box_comment button{
  margin-left:8px;
  background-color: #4267b2;
  border: 1px solid #4267b2;
  color: #fff;
  text-decoration: none;
  line-height: 22px;
  border-radius: 2px;
  font-size: 14px;
  font-weight: bold;
  position: relative;
  text-align: center;
}
.box_comment button:hover{
  background-color: #29487d;
  border-color: #29487d;
}
.box_comment .cancel{
	margin-left:8px;
	background-color: #f5f6f7;
	color: #4b4f56;
	text-decoration: none;
	line-height: 22px;
	border-radius: 2px;
	font-size: 14px;
	font-weight: bold;
	position: relative;
	text-align: center;
  border-color: #ccd0d5;
}
.box_comment .cancel:hover{
	background-color: #d0d0d0;
	border-color: #ccd0d5;
}
.box_comment img{
  height:16px;
  width:16px;
}
.box_result{
  margin-top: 24px;
}
.box_result .result_comment h4{
  font-weight: 600;
  white-space: nowrap;
  color: #365899;
  cursor: pointer;
  text-decoration: none;
  font-size: 14px;
  line-height: 1.358;
  margin:0;
}
.box_result .result_comment{
  display:block;
  overflow:scroll;
  padding: 0;
}
.child_replay{
	border-left: 1px dotted #d3d6db;
	margin-top: 12px;
	list-style: none;
	padding:0 0 0 8px
}
.reply_comment{
	margin:12px 0;
}
.box_result .result_comment p{
  margin: 4px 0;
  text-align:justify;
}
.box_result .result_comment .tools_comment{
  font-size: 12px;
  line-height: 1.358;
}
.box_result .result_comment .tools_comment a{
  color: #4267b2;
  cursor: pointer;
  text-decoration: none;
}
.box_result .result_comment .tools_comment span{
  color: #90949c;
}
.body_comment .show_more{
  background: #3578e5;
  border: none;
  box-sizing: border-box;
  color: #fff;
  font-size: 14px;
  margin-top: 24px;
  padding: 12px;
  text-shadow: none;
  width: 100%;
  font-weight:bold;
  position: relative;
  text-align: center;
  vertical-align: middle;
  border-radius: 2px;
}
</style>

<script>
    function submit_comment(){
  var comment = $('.commentar').val();
  el = document.createElement('li');
  el.className = "box_result row";
  el.innerHTML =
		'<div class=\"avatar_comment col-md-2\">'+
		  '<img src=\"https://static.xx.fbcdn.net/rsrc.php/v1/yi/r/odA9sNLrE86.jpg\" alt=\"avatar\"/>'+
		'</div>'+
		'<div class=\"result_comment col-md-10\">'+
		'<h4>Anonimous</h4>'+
		'<p>'+ comment +'</p>'+
		'<div class=\"tools_comment\">'+
		'<a class=\"like\" href=\"#\">Like</a><span aria-hidden=\"true\"> · </span>'+
		'<i class=\"fa fa-thumbs-o-up\"></i> <span class=\"count\">0</span>'+
		'<span aria-hidden=\"true\"> · </span>'+
		'<a class=\"replay\" href=\"#\">Reply</a><span aria-hidden=\"true\"> · </span>'+
			'<span>1m</span>'+
		'</div>'+
		'<ul class="child_replay"></ul>'+
		'</div>';
	document.getElementById('list_comment').prepend(el);
	$('.commentar').val('');
}

$(document).ready(function() {
	$('#list_comment').on('click', '.like', function (e) {
		$current = $(this);
		var x = $current.closest('div').find('.like').text().trim();
		var y = parseInt($current.closest('div').find('.count').text().trim());

		if (x === "Like") {
			$current.closest('div').find('.like').text('Unlike');
			$current.closest('div').find('.count').text(y + 1);
		} else if (x === "Unlike"){
			$current.closest('div').find('.like').text('Like');
			$current.closest('div').find('.count').text(y - 1);
		} else {
			var replay = $current.closest('div').find('.like').text('Like');
			$current.closest('div').find('.count').text(y - 1);
		}
	});

	$('#list_comment').on('click', '.replay', function (e) {
		cancel_reply();
		$current = $(this);
		el = document.createElement('li');
		el.className = "box_reply row";
		el.innerHTML =
			'<div class=\"col-md-12 reply_comment\">'+
				'<div class=\"row\">'+
					'<div class=\"avatar_comment col-md-2\">'+
					  '<img src=\"https://static.xx.fbcdn.net/rsrc.php/v1/yi/r/odA9sNLrE86.jpg\" alt=\"avatar\"/>'+
					'</div>'+
					'<div class=\"box_comment col-md-10\">'+
					  '<textarea class=\"comment_replay\" placeholder=\"Add a comment...\"></textarea>'+
					  '<div class=\"box_post\">'+
						'<div class=\"pull-right\">'+
						  '<span>'+
							'<img src=\"https://static.xx.fbcdn.net/rsrc.php/v1/yi/r/odA9sNLrE86.jpg\" alt=\"avatar\" />'+
							'<i class=\"fa fa-caret-down\"></i>'+
						  '</span>'+
						  '<button class=\"cancel\" onclick=\"cancel_reply()\" type=\"button\">Cancel</button>'+
						  '<button onclick=\"submit_reply()\" type=\"button\" value=\"1\">Reply</button>'+
						'</div>'+
					  '</div>'+
					'</div>'+
				'</div>'+
			'</div>';
		$current.closest('li').find('.child_replay').prepend(el);
	});
});

function submit_reply(){
  var comment_replay = $('.comment_replay').val();
  el = document.createElement('li');
  el.className = "box_reply row";
  el.innerHTML =
		'<div class=\"avatar_comment col-md-2\">'+
		  '<img src=\"https://static.xx.fbcdn.net/rsrc.php/v1/yi/r/odA9sNLrE86.jpg\" alt=\"avatar\"/>'+
		'</div>'+
		'<div class=\"result_comment col-md-10\">'+
		'<h4>Anonimous</h4>'+
		'<p>'+ comment_replay +'</p>'+
		'<div class=\"tools_comment\">'+
		'<a class=\"like\" href=\"#\">Like</a><span aria-hidden=\"true\"> · </span>'+
		'<i class=\"fa fa-thumbs-o-up\"></i> <span class=\"count\">0</span>'+
		'<span aria-hidden=\"true\"> · </span>'+
		'<a class=\"replay\" href=\"#\">Reply</a><span aria-hidden=\"true\"> · </span>'+
			'<span>1m</span>'+
		'</div>'+
		'<ul class="child_replay"></ul>'+
		'</div>';
	$current.closest('li').find('.child_replay').prepend(el);
	$('.comment_replay').val('');
	cancel_reply();
}

function cancel_reply(){
	$('.reply_comment').remove();
}
</script>
