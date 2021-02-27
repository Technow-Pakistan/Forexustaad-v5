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
                        <form action="" method="post">
                            <div class="row">
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
                                            <option value="none">None</option>
                                            <option value="TP Hit" {{$data->result == "TP Hit" ? 'selected' : ''}}>TP Hit</option>
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
                            <div class="form-group">
                                <label>Expired</label>
                                <input type="checkbox" name="expired" id="expired" value="1" {{$data->expired == 1 ? 'checked' : ''}}>
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