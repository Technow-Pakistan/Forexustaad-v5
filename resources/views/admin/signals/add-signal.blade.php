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
										<a href="{{URL::to('/ustaad/dashboard')}}"><i class="feather icon-home"></i></a>
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
                                            <option value="Premium User">Premium User</option>
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
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <!-- Select Pair / Symbol This Field is required -->
                                        <label> Forex Pairs</label>
                                        <div class="" id="textbos">
                                            <select class="form-control" name="forexPairs" required="">
                                                <option value="EUR/USD">EUR/USD</option>
                                                <option value="GBP/USD">GBP/USD</option>
                                                <option value="USD/JPY">USD/JPY</option>
                                                <option value="USD/CHF">USD/CHF</option>
                                                <option value="USD/CAD">USD/CAD</option>
                                                <option value="AUD/USD" selected="">AUD/USD</option>
                                                <option value="NZD/USD">NZD/USD</option>
                                                <option value="EUR/JPY">EUR/JPY</option>
                                                <option value="EUR/CHF">EUR/CHF</option>
                                                <option value="EUR/GBP">EUR/GBP</option>
                                                <option value="AUD/CAD">AUD/CAD</option>
                                                <option value="AUD/CHF">AUD/CHF</option>
                                                <option value="AUD/JPY">AUD/JPY</option>
                                                <option value="CAD/CHF">CAD/CHF</option>
                                                <option value="CAD/JPY">CAD/JPY</option>
                                                <option value="CHF/JPY">CHF/JPY</option>
                                                <option value="NZD/CAD">NZD/CAD</option>
                                                <option value="NZD/CHF">NZD/CHF</option>
                                                <option value="NZD/JPY">NZD/JPY</option>
                                                <option value="EUR/AUD">EUR/AUD</option>
                                                <option value="GBP/CHF">GBP/CHF</option>
                                                <option value="GBP/JPY">GBP/JPY</option>
                                                <option value="AUD/NZD">AUD/NZD</option>
                                                <option value="EUR/NZD">EUR/NZD</option>
                                                <option value="GBP/AUD">GBP/AUD</option>
                                                <option value="GBP/CAD">GBP/CAD</option>
                                                <option value="GBP/NZD">GBP/NZD</option>
                                                <option value="USD/DKK">USD/DKK</option>
                                                <option value="USD/SEK">USD/SEK</option>
                                                <option value="USD/NOK">USD/NOK</option>
                                                <option value="USD/ZAR">USD/ZAR</option>
                                                <option value="USD/RUR">USD/RUR</option>
                                                <option value="EUR/RUR">EUR/RUR</option>
                                                <option value="AUD/CZK">AUD/CZK</option>
                                                <option value="AUD/DKK">AUD/DKK</option>
                                                <option value="AUD/HKD">AUD/HKD</option>
                                                <option value="AUD/HUF">AUD/HUF</option>
                                                <option value="AUD/MXN">AUD/MXN</option>
                                                <option value="AUD/NOK">AUD/NOK</option>
                                                <option value="AUD/PLN">AUD/PLN</option>
                                                <option value="AUD/SEK">AUD/SEK</option>
                                                <option value="AUD/SGD">AUD/SGD</option>
                                                <option value="AUD/ZAR">AUD/ZAR</option>
                                                <option value="CAD/CZK">CAD/CZK</option>
                                                <option value="CAD/DKK">CAD/DKK</option>
                                                <option value="CAD/HKD">CAD/HKD</option>
                                                <option value="CAD/HUF">CAD/HUF</option>
                                                <option value="CAD/MXN">CAD/MXN</option>
                                                <option value="CAD/NOK">CAD/NOK</option>
                                                <option value="CAD/PLN">CAD/PLN</option>
                                                <option value="CAD/SEK">CAD/SEK</option>
                                                <option value="CAD/ZAR">CAD/ZAR</option>
                                                <option value="CHF/CZK">CHF/CZK</option>
                                                <option value="CHF/DKK">CHF/DKK</option>
                                                <option value="CHF/HKD">CHF/HKD</option>
                                                <option value="CHF/HUF">CHF/HUF</option>
                                                <option value="CHF/MXN">CHF/MXN</option>
                                                <option value="CHF/NOK">CHF/NOK</option>
                                                <option value="CHF/PLN">CHF/PLN</option>
                                                <option value="CHF/SEK">CHF/SEK</option>
                                                <option value="CHF/SGD">CHF/SGD</option>
                                                <option value="CHF/ZAR">CHF/ZAR</option>
                                                <option value="EUR/CZK">EUR/CZK</option>
                                                <option value="EUR/DKK">EUR/DKK</option>
                                                <option value="EUR/HKD">EUR/HKD</option>
                                                <option value="EUR/HUF">EUR/HUF</option>
                                                <option value="EUR/MXN">EUR/MXN</option>
                                                <option value="EUR/NOK">EUR/NOK</option>
                                                <option value="EUR/PLN">EUR/PLN</option>
                                                <option value="EUR/SEK">EUR/SEK</option>
                                                <option value="EUR/ZAR">EUR/ZAR</option>
                                                <option value="GBP/CZK">GBP/CZK</option>
                                                <option value="GBP/DKK">GBP/DKK</option>
                                                <option value="GBP/HKD">GBP/HKD</option>
                                                <option value="GBP/HUF">GBP/HUF</option>
                                                <option value="GBP/MXN">GBP/MXN</option>
                                                <option value="GBP/NOK">GBP/NOK</option>
                                                <option value="GBP/PLN">GBP/PLN</option>
                                                <option value="GBP/SEK">GBP/SEK</option>
                                                <option value="GBP/SGD">GBP/SGD</option>
                                                <option value="GBP/ZAR">GBP/ZAR</option>
                                                <option value="NZD/DKK">NZD/DKK</option>
                                                <option value="NZD/HKD">NZD/HKD</option>
                                                <option value="NZD/HUF">NZD/HUF</option>
                                                <option value="NZD/MXN">NZD/MXN</option>
                                                <option value="NZD/NOK">NZD/NOK</option>
                                                <option value="NZD/PLN">NZD/PLN</option>
                                                <option value="NZD/SEK">NZD/SEK</option>
                                                <option value="NZD/SGD">NZD/SGD</option>
                                                <option value="NZD/ZAR">NZD/ZAR</option>
                                                <option value="USD/CZK">USD/CZK</option>
                                                <option value="USD/HUF">USD/HUF</option>
                                                <option value="USD/MXN">USD/MXN</option>
                                                <option value="USD/PLN">USD/PLN</option>
                                                <option value="USD/SGD">USD/SGD</option>
                                                <option value="CZK/JPY">CZK/JPY</option>
                                                <option value="DKK/JPY">DKK/JPY</option>
                                                <option value="HKD/JPY">HKD/JPY</option>
                                                <option value="HUF/JPY">HUF/JPY</option>
                                                <option value="MXN/JPY">MXN/JPY</option>
                                                <option value="NOK/JPY">NOK/JPY</option>
                                                <option value="SEK/JPY">SEK/JPY</option>
                                                <option value="ZAR/JPY">ZAR/JPY</option>
                                                <option value="USD/INR">USD/INR</option>
                                            </select>
                                        </div>
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


@include('admin.include.footer')
	
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