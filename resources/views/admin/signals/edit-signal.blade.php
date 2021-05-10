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
									<h5 class="m-b-10">Forex Signals</h5>
								</div>
								<ul class="breadcrumb">
									<li class="breadcrumb-item">
										<a href="{{URL::to('/ustaad/dashboard')}}"><i class="fa fa-home"></i></a>
									</li>
									<li class="breadcrumb-item"><a href="{{URL::to('/ustaad/signals')}}">All Signals</a></li>
									<li class="breadcrumb-item">
										<a href="#!">Edit Signal</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<!-- [ breadcrumb ] end -->
				<!-- [ Main Content ] start -->
                <div class="card">
                    <div class="card-body">
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="d-flex justify-content-between">
                                <label for="">Title</label>
                                <p class="text-right text-danger m-0 titleCount"></p>
                            </div>
                            <input type="text" class="form-control titleCountFlied" maxlength="580" name="metaTitle" value="{{$newMeta != null ? $newMeta->title : ''}}">
                            <div class="form-group">
                                <label for="">
                                    @if ($newMeta == null || $newMeta->image == null)
                                        Image
                                    @else
                                        <img src="{{URL::to('storage/app')}}/{{$newMeta->image}}" alt="" width="100px" height="100px">
                                    @endif
                                </label>
                                <input type="file" class="form-control" name="image">
                            </div>
                            <div class="d-flex justify-content-between">
                                <label for="">Description</label>
                                <p class="text-right text-danger m-0 descriptionCount"></p>
                            </div>
                            <textarea name="metaDescription" maxlength="990" class="form-control asdasd">{{$newMeta != null ? $newMeta->description : ''}}</textarea>
                            <label for="">Keywords</label>
                            <select class="js-example-tokenizer col-sm-12" name="metaKeywords[]" multiple="multiple" required>
                                @foreach ($MetaKeywords as $metas)
                                    @if($newMeta != null)
                                        @php
                                            $keywords = explode(',',$newMeta->keywordsimp);
                                            $selectedAll = 0;
                                        @endphp
                                        @for($i = 0; $i< count($keywords); $i++)
                                            @if($keywords[$i] == $metas->name)
                                                @php   $selectedAll = 1;  @endphp
                                            @endif
                                        @endfor
                                    @endif
                                    <option value="{{$metas->name}}" {{$newMeta != null ? ($selectedAll == 1 ? 'selected' : '') : ''}}>{{$metas->name}}</option>
                                @endforeach
                            </select>
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <!-- User Selection for signal view -->
                                        <label for="">Order Type</label>
                                        <select class="form-control" name="orderType" required>
                                            <option value="Market Execution" {{$data->orderType == "Market Execution" ? 'selected' : ''}}>Market Execution</option>
                                            <option value="Pending Order" {{$data->orderType == "Pending Order"  ? 'selected' : ''}}>Pending Order</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <!-- User Selection for signal view -->
                                        <label for="">Select User</label>
                                        <select class="form-control" name="selectUser" required="">
                                            <option value="Register User" {{$data->selectUser == "Register User" ? 'selected' : ''}}>Register User</option>
                                            <option value="VIP Member" {{$data->selectUser == "VIP Member"  ? 'selected' : ''}}>VIP Member</option>
                                            <option value="Free User" {{$data->selectUser == "Free User" ? 'selected' : ''}}>Free User</option>
                                        </select>
                                        <small class="text-warning">Select for whom is this signal for ? </small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <!-- Buy or sell Button -->
                                        <label for="">Buy Or Sell ? </label>
                                        <select class="form-control" name="buySale" required="">
                                            <option></option>
                                            <option value="Buy" {{$data->buySale == "Buy" ? 'selected' : ''}}> Buy</option>
                                            <option value="Sell" {{$data->buySale == "Sell" ? 'selected' : ''}}> Sell</option>
                                            <option value="Buy limit" {{$data->buySale == "Buy limit" ? 'selected' : ''}}>Buy limit</option>
                                            <option value="Sell limit" {{$data->buySale == "Sell limit" ? 'selected' : ''}}> Sell limit</option>
                                            <option value="Buy Stop" {{$data->buySale == "Buy Stop" ? 'selected' : ''}}> Buy Stop</option>
                                            <option value="Sell Stop" {{$data->buySale == "Sell Stop" ? 'selected' : ''}}> Sell Stop</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Select Category & Pair </label>
                                        <div class="d-flex justify-content-start">
                                            <select name="fieldtwo" id="fieldtwo" class="form-control leftSelectParir">
                                                @foreach($totalCategory as $category)
                                                    @if($category->id == $SelectedPair->categoryId) @php $data2345 = $category->id; @endphp @endif
                                                        <option value="{{$category->id}}" {{$category->id == $SelectedPair->categoryId ? 'selected' : ''}}>{{$category->category}}</option>
                                                @endforeach
                                            </select>
                                            <select name="forexPairs" id="findtwo"  class="form-control js-example-tags rightSelectParir">
                                                @foreach($totalData as $data12)
                                                    @if($data2345 == $data12->categoryId)
                                                        <option value="{{$data12->id}}" {{$data12->id == $data->forexPairs ? 'selected' : ''}}>{{$data12->pair}}</option>
                                                    @endif
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <!-- Enter Stop lose for Signal -->
                                        <label>Price</label>
                                        <input type="text" required="" name="price" value="{{$data->price}}" placeholder="0.23242" class="form-control">
                                        <!-- <small>Closed</small> -->
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <!-- Enter Stop lose for Signal -->
                                        <label>Stop Lose</label>
                                        <input type="text" required="" name="stopLose" value="{{$data->stopLose}}" placeholder="0.23242" class="form-control">
                                        <small>Closed</small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <!-- Enter the estimate profit -->
                                        @php
                                            $profits = explode('@',$data->takeProfit);
                                        @endphp
                                        @for($i=1; $i<=count($profits); $i++)
                                            <div class="dynamic-field" id="dynamic-field-{{$i}}">
                                                <label>Take Profit {{$i != 1 ? $i : ''}}</label>
                                                @php $ic = $i -1; @endphp
                                                <input type="text" name="takeProfit[]" value="{{$profits[$ic]}}" placeholder="0.234334" required="" class="form-control">
                                            </div>
                                        @endfor
                                        <!-- when user click on add new please on append of id aff show a new Take profit text field we can add multiple profit  -->
                                        <div class="text-right clearfix" id="aff">
                                            <span class="float-left"><small>Sale Trade</small></span>
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
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Select Date</label>
                                        <input type="date" class="form-control" name="date" value="{{$data->date}}">
                                        <small class="text-info">Select how long this signal will be valid</small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Select time</label>
                                        <input type="time" class="form-control" name="time" value="{{$data->time}}">
                                        <small class="text-danger">Select how long this signal will be valid (formate : 5:00 PM)</small>
                                    </div>
                                </div>
                                <!-- this field is not required -->
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Result</label>
                                        <select name="result" class="form-control">
                                            <option value="">None</option>
                                            <option value="Manually Closed" {{$data->result == "Manually Closed" ? 'selected' : ''}}>Manually Closed</option>
                                            @for($i=1; $i<=count($profits); $i++)
                                                @if($i == 1 && $data->result == "TP Hit")
                                                    <option value="{{$i}} TP Hit" selected>{{$i}} TP Hit</option>
                                                @else
                                                    <option value="{{$i}} TP Hit" {{$data->result == "$i TP Hit" ? 'selected' : ''}}>{{$i}} TP Hit</option>
                                                @endif
                                            @endfor
                                            <option value="SL Hit" {{$data->result =="SL Hit"  ? 'selected' : ''}}>SL Hit</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>PIPs</label>
                                        <input type="text" class="form-control" name="pips" value="{{$data->pips}}">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Enter your Comments about Signal</label>
                                        <textarea class="form-control" name="comments" rows="5">{{$data->comments}}</textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>Enter Image and Article</label>
                                    <textarea class="form-control" name="editor1">
                                        @php
                                            $detailDescription = html_entity_decode($data->detailDescription);
                                            echo $detailDescription;
                                        @endphp
                                    </textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Expired</label>
                                <input type="checkbox" name="expired" id="expired" value="1" {{$data->expired == 1 ? 'checked' : ''}}>
                                @if($value['memberId'] != 7 && $data->pending == 1)
                                    <label class="ml-3">Allow</label>
                                    <input type="checkbox" name="pending" id="pending" value="0">
                                @endif
                            </div>
                            <p class="submit text-right">
                                <input type="submit" name="submit" id="submit" class="btn btn-outline-primary" value="Update"> <span class="spinner"></span>
                                <input type="reset" name="reset" id="reset" class="btn btn-outline-danger" value="reset"> <span class="spinner"></span>
                            </p>
                        </form>
                    </div>
                </div>
				<!-- [ Main Content ] end -->
			</div>
		</section>
		<!-- [ Main Content ] end -->

    <style>
        .leftSelectParir{
            border-radius:5px 0px 0px 5px;
        }
        .rightSelectParir{
            border-radius:0px 5px 5px 0px;
        }
    </style>

@include('admin.include.footer')

<script>
    // description Limit
    var count = $(".description").val();
    var len = count.length;
    len = 990 - len;
    $(".descriptionCount").html("remaining: " + len);
    $(".description").on("keyup",function(){
       var count = $(".description").val();
       var len = count.length;

       if(len == 0){
          $(".descriptionCount").hide();
       }else{
          $(".descriptionCount").show();
       }
       len = 990 - len;
       $(".descriptionCount").html("remaining: " + len);
    });

    // title Limit
    var count = $(".titleCountFlied").val();
    var len = count.length;
    len = 580 - len;
    $(".titleCount").html("remaining: " + len);
    $(".titleCountFlied").on("keyup",function(){
       var count = $(".titleCountFlied").val();
       var len = count.length;

       if(len == 0){
          $(".titleCount").hide();
       }else{
          $(".titleCount").show();
       }
       len = 580 - len;
       $(".titleCount").html("remaining: " + len);
    });
</script>

<script type='text/javascript'>
<?php
    $php_array1 = $totalCategory;
    $js_array1 = json_encode($php_array1);
    echo "var javascript_array1 = ". $js_array1 . ";\n";
    $php_array2 = $totalData;
    $js_array2 = json_encode($php_array2);
    echo "var javascript_array2 = ". $js_array2 . ";\n";
?>
    $("#fieldtwo").on('change',function(){
        var selectedOption = $("#fieldtwo").val();
        $("#findtwo").html("");
        for (let i = 0; i < javascript_array2.length; i++){
            if (javascript_array2[i].categoryId == selectedOption) {
                $("#findtwo").prepend("<option value='"+javascript_array2[i].id+"'>"+javascript_array2[i].pair+"</option>");
            }

        }
    })
</script>
<script>
        $(".js-example-tags").select2({
            tags: true
        });
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
            field.children("label").text("Take Profit " + count);
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
