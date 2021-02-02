@include('inc.header')
    @php
        $clientValue =Session::get('client');
    @endphp
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
                                                    <div class="m-125">
                                                        <form action="" method="post" enctype="multipart/form-data">
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <input type="text" class="form-control" name="name" placeholder="First Name *" value="{{$clientValue['name']}}" required/>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <input type="text" class="form-control" name="lastName" placeholder="Last Name *" value="{{$clientValue['lastName']}}" required/>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <input type="text" class="form-control" name="userName" placeholder="UserName *" value="{{$clientValue['userName']}}" required/>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        <input type="text" class="form-control" name="nickName" placeholder="Nick Name " value="{{$clientValue['nickName']}}" required/>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <!-- <input type="text" class="form-control" name="countries" placeholder="Countries *" value="" required/> -->
                                                                        <select name="" id="sel1" class="form-control" onchange="giveSelection(this.value)">
                                                                            @php 
                                                                                $cityId = $clientValue['cityId'];
                                                                                $citiesInfo = App\Models\AllCitiesModel::find($cityId);
                                                                            @endphp
                                                                            @foreach($AllCountries as $country)
                                                                                <option value="{{$country->id}}" {{$country->id == $citiesInfo->country_id ? 'selected' : ''}}>{{$country->name}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <!-- <input type="text" class="form-control" name="states" placeholder="States *" value="" required/> -->
                                                                        <select name="" id="sel2" class="form-control" onchange="giveSelection2(this.value)">
                                                                            @foreach($AllStates as $state)
                                                                                <option value="{{$state->id}}" data-option="{{$state->country_id}}" {{$state->id == $citiesInfo->state_id ? 'selected' : ''}}>{{$state->name}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <!-- <input type="text" class="form-control" name="cities" placeholder="Cities *" value="" required/> -->
                                                                        <select name="cityId" id="sel3" class="form-control">
                                                                            @foreach($AllCities as $city)
                                                                                <option value="{{$city->id}}" data-option="{{$city->state_id}}" {{$city->id == $citiesInfo->id ? 'selected' : ''}}>{{$city->name}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <div class="form-group">
                                                                        @php
                                                                            $mobiles = explode('@#',$clientValue['addMobile']);
                                                                            $emails = explode('@#',$clientValue['addEmail']);
                                                                            $socails = explode('@#',$clientValue['social']);
                                                                            $socailLinks = explode('@#',$clientValue['socialLink']);
                                                                        @endphp
                                                                        <!-- Enter the estimate profit -->
                                                                            <input type="text" name="mobile" value="{{$clientValue['mobile']}}" placeholder="Enter Your Number" required="" disabled class="form-control">
                                                                        @for($i=0; $i < count($mobiles); $i++)
                                                                            <div class="dynamic-field1" id="dynamic-field-{{$i+50}}">
                                                                                <label class="d-none"></label>
                                                                                <input type="text" name="addMobile[]" value="{{$mobiles[$i]}}" placeholder="Enter Your Number" class="form-control">
                                                                            </div>
                                                                        @endfor
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
                                                                            <input type="email" name="email" value="{{$clientValue['email']}}" placeholder="Enter Your Mail" disabled class="form-control">
                                                                        <!-- Enter the estimate profit -->
                                                                        @for($i=0; $i < count($emails); $i++)
                                                                            <div class="dynamic-field" id="dynamic-field-{{$i+1}}">
                                                                                <label class="d-none"></label>
                                                                                <input type="email" name="addEmail[]" value="{{$emails[$i]}}" placeholder="Enter Your Mail" class="form-control">
                                                                            </div>
                                                                        @endfor
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
                                                                <div class="col-md-12">
                                                                    <div class="form-group">
                                                                        <input type="file" name="file_photo" class="form-control p-0" {{$clientValue['image'] == null ? 'required' : ''}}/>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12 ">
                                                                <div class="">
                                                                    <div class="form-group">

                                                                        <!-- Enter the estimate profit -->
                                                                        @for($i=0; $i < count($socails); $i++)
                                                                            <div class="dynamic-field2" id="dynamic-field-150">
                                                                                <label class="d-none"></label>
                                                                                <div class="input-group">
                                                                                    <div class="input-group-prepend">
                                                                                        <select class="custom-select" name="social[]" id="inputGroupSelect01">
                                                                                        <option value="Facebook" {{$socails[$i] == 'Facebook' ? 'selected' : ''}}>Facebook</option>
                                                                                        <option value="Pinterest" {{$socails[$i] == 'Pinterest' ? 'selected' : ''}}>Pinterest</option>
                                                                                        <option value="Twitter" {{$socails[$i] == 'Twitter' ? 'selected' : ''}}>Twitter</option>
                                                                                        <option value="Instagram" {{$socails[$i] == 'Instagram' ? 'selected' : ''}}>Instagram</option>
                                                                                        <option value="Snapchat" {{$socails[$i] == 'Snapchat' ? 'selected' : ''}}>Snapchat</option>
                                                                                        <option value="Tiktok" {{$socails[$i] == 'Tiktok' ? 'selected' : ''}}>Tiktok</option>
                                                                                        <option value="Telegam" {{$socails[$i] == 'Telegam' ? 'selected' : ''}}>Telegam</option>
                                                                                        <option value="GooglePlus" {{$socails[$i] == 'GooglePlus' ? 'selected' : ''}}>GooglePlus</option>
                                                                                        <option value="LinkedIn" {{$socails[$i] == 'LinkedIn' ? 'selected' : ''}}>LinkedIn</option>
                                                                                    </select>
                                                                                    </div>
                                                                                    <input type="text" name="socialLink[]" id="" value="{{$socailLinks[$i]}}" class="form-control" required>
                                                                                </div>
                                                                            </div>
                                                                        @endfor
                                                                        <!-- when user click on add new please on append of id aff show a new Take profit text field we can add multiple profit  -->
                                                                        <div class="text-right clearfix" id="aff">
                                                                            <span class="float-left"><small>Add Your More Social Media</small></span>
                                                                            <div class="float-right">
                                                                                <div class="clearfix">
                                                                                    <div class="float-left"> </div>
                                                                                    <div class="float-right">
                                                                                        <a type="button" class="border-0 text-success mr-2" id="add-button2"><i class="fa fa-plus"></i></a>
                                                                                        <a type="button" class="border-0 text-danger" id="remove-button2"><i class="fa fa-minus"></i></a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                                <div class="col-md-12">
                                                                    <textarea name="description" id="" class="form-control" cols="30" rows="5" placeholder="Describe YourSelf" required>{{$clientValue['description']}}</textarea>
                                                                </div>
                                                                <div class="col-md-12 justify-content-end d-flex pt-2">
                                                                    <input type="hidden" name="updateId" value="{{$clientValue['id']}}">
                                                                    <input type="submit" class="btn btn-primary btn-radial"  value="Save"/>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade show" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                                    <h3  class="register-heading">Account Details</h3>
                                                    <div class="m-125">
                                                        <form action="{{URL::to('/user-registration/Account')}}" method="post">
                                                            <div class="col-md-12 ">
                                                                <div class="">
                                                                    <div2 class="form-group">

                                                                        <!-- Enter the estimate profit -->
                                                                        @if($clientAccount1 != null)
                                                                            @foreach($clientAccount as $accountInfo)
                                                                                <div class="dynamic-field3" id="dynamic-field-4">
                                                                                    <label class="d-none"></label>
                                                                                    <div class="row ">
                                                                                        <div class="col-sm-12 pb-3">
                                                                                            <select class="custom-select" name="brokerId[]">
                                                                                                @foreach($allBroker as $broker)
                                                                                                    <option value="{{$broker->id}}" {{$broker->id == $accountInfo->brokerId ? 'selected' : ''}}>{{$broker->title}}</option>
                                                                                                @endforeach
                                                                                            </select>
                                                                                        </div>
                                                                                        <div class="col-md-6">
                                                                                            <div class="form-group">
                                                                                                <input type="text" class="form-control" name="accountNumber[]" value="{{$accountInfo->accountNumber}}" placeholder="Account Number *" required/>
                                                                                            </div>
                                                                                            <div class="form-group">
                                                                                                <input type="text" class="form-control" name="accountName[]" value="{{$accountInfo->accountName}}" placeholder="Account Name *" required/>
                                                                                            </div>

                                                                                        </div>
                                                                                        <div class="col-md-6">
                                                                                            <div class="form-group">
                                                                                                <input type="mail" class="form-control" name="accountemail[]" value="{{$accountInfo->accountemail}}" placeholder="Account Email *" required/>
                                                                                            </div>
                                                                                            <div class="form-group">
                                                                                                <input type="number" class="form-control" name="accountdeposit[]" value="{{$accountInfo->accountdeposit}}" placeholder="Deposit" required/>
                                                                                            </div>
                                                                                        </div>

                                                                                    </div>
                                                                                </div>
                                                                            @endforeach
                                                                        @else
                                                                            <div class="dynamic-field3" id="dynamic-field-4">
                                                                                <label class="d-none"></label>
                                                                                <div class="row ">
                                                                                    <div class="col-sm-12 pb-3">
                                                                                        <select class="custom-select" name="brokerId[]">
                                                                                            @foreach($allBroker as $broker)
                                                                                                <option value="{{$broker->id}}">{{$broker->title}}</option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                        <div class="form-group">
                                                                                            <input type="text" class="form-control" name="accountNumber[]" placeholder="Account Number *" value="" required />
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <input type="text" class="form-control" name="accountName[]" placeholder="Account Name *" value="" required/>
                                                                                        </div>

                                                                                    </div>
                                                                                    <div class="col-md-6">
                                                                                        <div class="form-group">
                                                                                            <input type="mail" class="form-control" name="accountemail[]" placeholder="Account Email *" value="" required/>
                                                                                        </div>
                                                                                        <div class="form-group">
                                                                                            <input type="number" class="form-control" name="accountdeposit[]" placeholder="Deposit" value="" required/>
                                                                                        </div>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        @endif
                                                                        <!-- when user click on add new please on append of id aff show a new Take profit text field we can add multiple profit  -->
                                                                        <div class="text-right clearfix" id="aff">
                                                                            <span class="float-left"><small>Add Your More Accounts</small></span>
                                                                            <div class="float-right">
                                                                                <div class="clearfix">
                                                                                    <div class="float-left"> </div>
                                                                                    <div class="float-right">
                                                                                        <a type="button" class="border-0 text-success mr-2" id="add-button3"><i class="fa fa-plus"></i></a>
                                                                                        <a type="button" class="border-0 text-danger" id="remove-button3"><i class="fa fa-minus"></i></a>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12 justify-content-end d-flex pt-2">
                                                                    <input type="hidden" name="clientId" value="{{$clientValue['id']}}">
                                                                    <input type="submit" class="btn btn-primary btn-radial"  value="Save"/>
                                                                </div>
                                                            </div>
                                                        </form>
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
        </div>
    </section>

<!--     <div id="particles-js" style="height: 0;"></div> -->
</div>


<style>
    #dynamic-field-1,#dynamic-field-50  .form-control{
        display:none;
    }
</style>

@include('inc.footer')

<script>
    var sel1 = document.querySelector('#sel1');
    var sel2 = document.querySelector('#sel2');
    var options2 = sel2.querySelectorAll('option');

    var sel3 = document.querySelector('#sel3');
    var options3 = sel3.querySelectorAll('option');
    
    function giveSelection(selValue) {
        sel2.innerHTML = '';
        for(var i = 0; i < options2.length; i++) {
            if(options2[i].dataset.option === selValue) {
            sel2.appendChild(options2[i]);
            }
        }
        $("#sel3").html("");
    }

    giveSelection(sel1.value);


    function giveSelection2(sel2Value) {
        sel3.innerHTML = '';
        for(var i = 0; i < options3.length; i++) {
            console.log("hello1");
            if(options3[i].dataset.option === sel2Value) {
                console.log("hello2");
                sel3.appendChild(options3[i]);
            }
        }
        console.log("hello");
    }

    giveSelection2(sel2.value);

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
            field = $("#dynamic-field-50").clone();
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
    $(document).ready(function() {
        var buttonAdd = $("#add-button2");
        var buttonRemove = $("#remove-button2");
        var className = ".dynamic-field2";
        var count = 0;
        var field = "";
        var maxFields = 5;

        function totalFields() {
            return $(className).length;
        }

        function addNewField() {
            count = totalFields() + 1;
            field = $("#dynamic-field-150").clone();
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
        var buttonAdd = $("#add-button3");
        var buttonRemove = $("#remove-button3");
        var className = ".dynamic-field3";
        var count = 0;
        var field = "";
        var maxFields = 5;

        function totalFields() {
            return $(className).length;
        }

        function addNewField() {
            count = totalFields() + 1;
            field = $("#dynamic-field-4").clone();
            field.attr("id", "dynamic-field3-" + count);
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
