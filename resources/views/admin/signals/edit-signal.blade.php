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
                                            <option value="Premium User" {{$data->selectUser == "Premium User" ? 'selected' : ''}}>Premium User</option>
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
                                <!-- <div class="col-md-6">
                                    <div class="form-group">
                                        <label> Forex Pairs</label>
                                        <div class="" id="textbos">
                                            <select class="form-control" name="forexPairs" required="">
                                                <option value="EUR/USD" {{$data->forexPairs == "EUR/USD" ? 'selected' : ''}}>EUR/USD</option>
                                                <option value="GBP/USD" {{$data->forexPairs == "GBP/USD" ? 'selected' : ''}}>GBP/USD</option>
                                                <option value="USD/JPY" {{$data->forexPairs == "USD/JPY" ? 'selected' : ''}}>USD/JPY</option>
                                                <option value="USD/CHF" {{$data->forexPairs == "USD/CHF" ? 'selected' : ''}}>USD/CHF</option>
                                                <option value="USD/CAD" {{$data->forexPairs == "USD/CAD" ? 'selected' : ''}}>USD/CAD</option>
                                                <option value="AUD/USD" {{$data->forexPairs == "AUD/USD" ? 'selected' : ''}}>AUD/USD</option>
                                                <option value="NZD/USD" {{$data->forexPairs == "NZD/USD" ? 'selected' : ''}}>NZD/USD</option>
                                                <option value="EUR/JPY" {{$data->forexPairs == "EUR/JPY" ? 'selected' : ''}}>EUR/JPY</option>
                                                <option value="EUR/CHF" {{$data->forexPairs == "EUR/CHF" ? 'selected' : ''}}>EUR/CHF</option>
                                                <option value="EUR/GBP" {{$data->forexPairs == "EUR/GBP" ? 'selected' : ''}}>EUR/GBP</option>
                                                <option value="AUD/CAD" {{$data->forexPairs == "AUD/CAD" ? 'selected' : ''}}>AUD/CAD</option>
                                                <option value="AUD/CHF" {{$data->forexPairs == "AUD/CHF" ? 'selected' : ''}}>AUD/CHF</option>
                                                <option value="AUD/JPY" {{$data->forexPairs == "AUD/JPY" ? 'selected' : ''}}>AUD/JPY</option>
                                                <option value="CAD/CHF" {{$data->forexPairs == "CAD/CHF" ? 'selected' : ''}}>CAD/CHF</option>
                                                <option value="CAD/JPY" {{$data->forexPairs == "CAD/JPY" ? 'selected' : ''}}>CAD/JPY</option>
                                                <option value="CHF/JPY" {{$data->forexPairs == "CHF/JPY" ? 'selected' : ''}}>CHF/JPY</option>
                                                <option value="NZD/CAD" {{$data->forexPairs == "NZD/CAD" ? 'selected' : ''}}>NZD/CAD</option>
                                                <option value="NZD/CHF" {{$data->forexPairs == "NZD/CHF" ? 'selected' : ''}}>NZD/CHF</option>
                                                <option value="NZD/JPY" {{$data->forexPairs == "NZD/JPY" ? 'selected' : ''}}>NZD/JPY</option>
                                                <option value="EUR/AUD" {{$data->forexPairs == "EUR/AUD" ? 'selected' : ''}}>EUR/AUD</option>
                                                <option value="GBP/CHF" {{$data->forexPairs == "GBP/CHF" ? 'selected' : ''}}>GBP/CHF</option>
                                                <option value="GBP/JPY" {{$data->forexPairs == "GBP/JPY" ? 'selected' : ''}}>GBP/JPY</option>
                                                <option value="AUD/NZD" {{$data->forexPairs == "AUD/NZD" ? 'selected' : ''}}>AUD/NZD</option>
                                                <option value="EUR/NZD" {{$data->forexPairs == "EUR/NZD" ? 'selected' : ''}}>EUR/NZD</option>
                                                <option value="GBP/AUD" {{$data->forexPairs == "GBP/AUD" ? 'selected' : ''}}>GBP/AUD</option>
                                                <option value="GBP/CAD" {{$data->forexPairs == "GBP/CAD" ? 'selected' : ''}}>GBP/CAD</option>
                                                <option value="GBP/NZD" {{$data->forexPairs == "GBP/NZD" ? 'selected' : ''}}>GBP/NZD</option>
                                                <option value="USD/DKK" {{$data->forexPairs == "USD/DKK" ? 'selected' : ''}}>USD/DKK</option>
                                                <option value="USD/SEK" {{$data->forexPairs == "USD/SEK" ? 'selected' : ''}}>USD/SEK</option>
                                                <option value="USD/NOK" {{$data->forexPairs == "USD/NOK" ? 'selected' : ''}}>USD/NOK</option>
                                                <option value="USD/ZAR" {{$data->forexPairs == "USD/ZAR" ? 'selected' : ''}}>USD/ZAR</option>
                                                <option value="USD/RUR" {{$data->forexPairs == "USD/RUR" ? 'selected' : ''}}>USD/RUR</option>
                                                <option value="EUR/RUR" {{$data->forexPairs == "EUR/RUR" ? 'selected' : ''}}>EUR/RUR</option>
                                                <option value="AUD/CZK" {{$data->forexPairs == "AUD/CZK" ? 'selected' : ''}}>AUD/CZK</option>
                                                <option value="AUD/DKK" {{$data->forexPairs == "AUD/DKK" ? 'selected' : ''}}>AUD/DKK</option>
                                                <option value="AUD/HKD" {{$data->forexPairs == "AUD/HKD" ? 'selected' : ''}}>AUD/HKD</option>
                                                <option value="AUD/HUF" {{$data->forexPairs == "AUD/HUF" ? 'selected' : ''}}>AUD/HUF</option>
                                                <option value="AUD/MXN" {{$data->forexPairs == "AUD/MXN" ? 'selected' : ''}}>AUD/MXN</option>
                                                <option value="AUD/NOK" {{$data->forexPairs == "AUD/NOK" ? 'selected' : ''}}>AUD/NOK</option>
                                                <option value="AUD/PLN" {{$data->forexPairs == "AUD/PLN" ? 'selected' : ''}}>AUD/PLN</option>
                                                <option value="AUD/SEK" {{$data->forexPairs == "AUD/SEK" ? 'selected' : ''}}>AUD/SEK</option>
                                                <option value="AUD/SGD" {{$data->forexPairs == "AUD/SGD" ? 'selected' : ''}}>AUD/SGD</option>
                                                <option value="AUD/ZAR" {{$data->forexPairs == "AUD/ZAR" ? 'selected' : ''}}>AUD/ZAR</option>
                                                <option value="CAD/CZK" {{$data->forexPairs == "CAD/CZK" ? 'selected' : ''}}>CAD/CZK</option>
                                                <option value="CAD/DKK" {{$data->forexPairs == "CAD/DKK" ? 'selected' : ''}}>CAD/DKK</option>
                                                <option value="CAD/HKD" {{$data->forexPairs == "CAD/HKD" ? 'selected' : ''}}>CAD/HKD</option>
                                                <option value="CAD/HUF" {{$data->forexPairs == "CAD/HUF" ? 'selected' : ''}}>CAD/HUF</option>
                                                <option value="CAD/MXN" {{$data->forexPairs == "CAD/MXN" ? 'selected' : ''}}>CAD/MXN</option>
                                                <option value="CAD/NOK" {{$data->forexPairs == "CAD/NOK" ? 'selected' : ''}}>CAD/NOK</option>
                                                <option value="CAD/PLN" {{$data->forexPairs == "CAD/PLN" ? 'selected' : ''}}>CAD/PLN</option>
                                                <option value="CAD/SEK" {{$data->forexPairs == "CAD/SEK" ? 'selected' : ''}}>CAD/SEK</option>
                                                <option value="CAD/ZAR" {{$data->forexPairs == "CAD/ZAR" ? 'selected' : ''}}>CAD/ZAR</option>
                                                <option value="CHF/CZK" {{$data->forexPairs == "CHF/CZK" ? 'selected' : ''}}>CHF/CZK</option>
                                                <option value="CHF/DKK" {{$data->forexPairs == "CHF/DKK" ? 'selected' : ''}}>CHF/DKK</option>
                                                <option value="CHF/HKD" {{$data->forexPairs == "CHF/HKD" ? 'selected' : ''}}>CHF/HKD</option>
                                                <option value="CHF/HUF" {{$data->forexPairs == "CHF/HUF" ? 'selected' : ''}}>CHF/HUF</option>
                                                <option value="CHF/MXN" {{$data->forexPairs == "CHF/MXN" ? 'selected' : ''}}>CHF/MXN</option>
                                                <option value="CHF/NOK" {{$data->forexPairs == "CHF/NOK" ? 'selected' : ''}}>CHF/NOK</option>
                                                <option value="CHF/PLN" {{$data->forexPairs == "CHF/PLN" ? 'selected' : ''}}>CHF/PLN</option>
                                                <option value="CHF/SEK" {{$data->forexPairs == "CHF/SEK" ? 'selected' : ''}}>CHF/SEK</option>
                                                <option value="CHF/SGD" {{$data->forexPairs == "CHF/SGD" ? 'selected' : ''}}>CHF/SGD</option>
                                                <option value="CHF/ZAR" {{$data->forexPairs == "CHF/ZAR" ? 'selected' : ''}}>CHF/ZAR</option>
                                                <option value="EUR/CZK" {{$data->forexPairs == "EUR/CZK" ? 'selected' : ''}}>EUR/CZK</option>
                                                <option value="EUR/DKK" {{$data->forexPairs == "EUR/DKK" ? 'selected' : ''}}>EUR/DKK</option>
                                                <option value="EUR/HKD" {{$data->forexPairs == "EUR/HKD" ? 'selected' : ''}}>EUR/HKD</option>
                                                <option value="EUR/HUF" {{$data->forexPairs == "EUR/HUF" ? 'selected' : ''}}>EUR/HUF</option>
                                                <option value="EUR/MXN" {{$data->forexPairs == "EUR/MXN" ? 'selected' : ''}}>EUR/MXN</option>
                                                <option value="EUR/NOK" {{$data->forexPairs == "EUR/NOK" ? 'selected' : ''}}>EUR/NOK</option>
                                                <option value="EUR/PLN" {{$data->forexPairs == "EUR/PLN" ? 'selected' : ''}}>EUR/PLN</option>
                                                <option value="EUR/SEK" {{$data->forexPairs == "EUR/SEK" ? 'selected' : ''}}>EUR/SEK</option>
                                                <option value="EUR/ZAR" {{$data->forexPairs == "EUR/ZAR" ? 'selected' : ''}}>EUR/ZAR</option>
                                                <option value="GBP/CZK" {{$data->forexPairs == "GBP/CZK" ? 'selected' : ''}}>GBP/CZK</option>
                                                <option value="GBP/DKK" {{$data->forexPairs == "GBP/DKK" ? 'selected' : ''}}>GBP/DKK</option>
                                                <option value="GBP/HKD" {{$data->forexPairs == "GBP/HKD" ? 'selected' : ''}}>GBP/HKD</option>
                                                <option value="GBP/HUF" {{$data->forexPairs == "GBP/HUF" ? 'selected' : ''}}>GBP/HUF</option>
                                                <option value="GBP/MXN" {{$data->forexPairs == "GBP/MXN" ? 'selected' : ''}}>GBP/MXN</option>
                                                <option value="GBP/NOK" {{$data->forexPairs == "GBP/NOK" ? 'selected' : ''}}>GBP/NOK</option>
                                                <option value="GBP/PLN" {{$data->forexPairs == "GBP/PLN" ? 'selected' : ''}}>GBP/PLN</option>
                                                <option value="GBP/SEK" {{$data->forexPairs == "GBP/SEK" ? 'selected' : ''}}>GBP/SEK</option>
                                                <option value="GBP/SGD" {{$data->forexPairs == "GBP/SGD" ? 'selected' : ''}}>GBP/SGD</option>
                                                <option value="GBP/ZAR" {{$data->forexPairs == "GBP/ZAR" ? 'selected' : ''}}>GBP/ZAR</option>
                                                <option value="NZD/DKK" {{$data->forexPairs == "NZD/DKK" ? 'selected' : ''}}>NZD/DKK</option>
                                                <option value="NZD/HKD" {{$data->forexPairs == "NZD/HKD" ? 'selected' : ''}}>NZD/HKD</option>
                                                <option value="NZD/HUF" {{$data->forexPairs == "NZD/HUF" ? 'selected' : ''}}>NZD/HUF</option>
                                                <option value="NZD/MXN" {{$data->forexPairs == "NZD/MXN" ? 'selected' : ''}}>NZD/MXN</option>
                                                <option value="NZD/NOK" {{$data->forexPairs == "NZD/NOK" ? 'selected' : ''}}>NZD/NOK</option>
                                                <option value="NZD/PLN" {{$data->forexPairs == "NZD/PLN" ? 'selected' : ''}}>NZD/PLN</option>
                                                <option value="NZD/SEK" {{$data->forexPairs == "NZD/SEK" ? 'selected' : ''}}>NZD/SEK</option>
                                                <option value="NZD/SGD" {{$data->forexPairs == "NZD/SGD" ? 'selected' : ''}}>NZD/SGD</option>
                                                <option value="NZD/ZAR" {{$data->forexPairs == "NZD/ZAR" ? 'selected' : ''}}>NZD/ZAR</option>
                                                <option value="USD/CZK" {{$data->forexPairs == "USD/CZK" ? 'selected' : ''}}>USD/CZK</option>
                                                <option value="USD/HUF" {{$data->forexPairs == "USD/HUF" ? 'selected' : ''}}>USD/HUF</option>
                                                <option value="USD/MXN" {{$data->forexPairs == "USD/MXN" ? 'selected' : ''}}>USD/MXN</option>
                                                <option value="USD/PLN" {{$data->forexPairs == "USD/PLN" ? 'selected' : ''}}>USD/PLN</option>
                                                <option value="USD/SGD" {{$data->forexPairs == "USD/SGD" ? 'selected' : ''}}>USD/SGD</option>
                                                <option value="CZK/JPY" {{$data->forexPairs == "CZK/JPY" ? 'selected' : ''}}>CZK/JPY</option>
                                                <option value="DKK/JPY" {{$data->forexPairs == "DKK/JPY" ? 'selected' : ''}}>DKK/JPY</option>
                                                <option value="HKD/JPY" {{$data->forexPairs == "HKD/JPY" ? 'selected' : ''}}>HKD/JPY</option>
                                                <option value="HUF/JPY" {{$data->forexPairs == "HUF/JPY" ? 'selected' : ''}}>HUF/JPY</option>
                                                <option value="MXN/JPY" {{$data->forexPairs == "MXN/JPY" ? 'selected' : ''}}>MXN/JPY</option>
                                                <option value="NOK/JPY" {{$data->forexPairs == "NOK/JPY" ? 'selected' : ''}}>NOK/JPY</option>
                                                <option value="SEK/JPY" {{$data->forexPairs == "SEK/JPY" ? 'selected' : ''}}>SEK/JPY</option>
                                                <option value="ZAR/JPY" {{$data->forexPairs == "ZAR/JPY" ? 'selected' : ''}}>ZAR/JPY</option>
                                                <option value="USD/INR" {{$data->forexPairs == "USD/INR" ? 'selected' : ''}}>USD/INR</option>
                                            </select>
                                        </div>
                                    </div>
                                </div> -->
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
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Result</label>
                                        <input type="text" name="result" value="{{$data->result}}" class="form-control">
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