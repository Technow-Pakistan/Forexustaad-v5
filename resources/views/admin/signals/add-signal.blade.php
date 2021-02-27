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
										<a href="#!">Add a New Signal</a>
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
                                            <option value="Register User">Register User</option>
                                            <option value="VIP Member">VIP Member</option>
                                            <option value="Free User">Free User</option>
                                        </select>
                                        <small class="text-warning">Select for whom is this signal for ? </small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <!-- Buy or sell Button -->
                                        <label for="">Buy Or Sell ? </label>
                                        <select class="form-control" name="buySale" required="">
                                            <option selected=""></option>
                                            <option value="Buy"> Buy</option>
                                            <option value="Sell"> Sell</option>
                                            <option value="Buy limit">Buy limit</option>
                                            <option value="Sell limit"> Sell limit</option>
                                            <option value="Buy Stop"> Buy Stop</option>
                                            <option value="Sell Stop"> Sell Stop</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Select Category & Pair </label>
                                        <div class="d-flex justify-content-start">
                                            <select name="fieldtwo" id="fieldtwo" class="form-control leftSelectParir">
                                                @php $ijk = 0; @endphp
                                                @foreach($totalCategory as $category)
                                                    @if($ijk == 0) @php $data2345 = $category->id; @endphp @endif 
                                                        <option value="{{$category->id}}">{{$category->category}}</option>
                                                    @php $ijk++ @endphp
                                                @endforeach
                                            </select>
                                            <select name="forexPairs" id="findtwo"  class="form-control js-example-tags rightSelectParir">
                                                @foreach($totalData as $data)
                                                    @if($data2345 == $data->categoryId)
                                                        <option value="{{$data->id}}">{{$data->pair}}</option>
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
                                        <input type="text" required="" name="price" value="" placeholder="0.23242" class="form-control">
                                        <!-- <small>Closed</small> -->
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <!-- Enter Stop lose for Signal -->
                                        <label>Stop Lose</label>
                                        <input type="text" required="" name="stopLose" value="" placeholder="0.23242" class="form-control">
                                        <small>Closed</small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <!-- Enter the estimate profit -->
                                        <div class="dynamic-field" id="dynamic-field-1">
                                            <label>Take Profit</label>
                                            <input type="text" name="takeProfit[]" value="" placeholder="0.234334" required="" class="form-control">
                                        </div>
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
                                        <input type="date" class="form-control" name="date">
                                        <small class="text-info">Select how long this signal will be valid</small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Select time</label>
                                        <input type="time" class="form-control" name="time">
                                        <small class="text-danger">Select how long this signal will be valid (formate : 5:00 PM)</small>
                                    </div>
                                </div>
                                <!-- this field is not required -->
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <label>Enter your Comments about Signal</label>
                                        <textarea class="form-control" name="comments" rows="5"></textarea>
                                    </div>
                                </div>
                            </div>
                            <p class="submit text-right">
                                <input type="submit" name="submit" id="submit" class="btn btn-outline-primary" value="Post"> <span class="spinner"></span>
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