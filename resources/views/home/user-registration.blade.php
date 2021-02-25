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
                                                                        <select name="" id="sel1" class="form-control">
                                                                            @php 
                                                                                $cityId = $clientValue['cityId'];
                                                                                if($cityId != null){
                                                                                    $citiesInfo = App\Models\AllCitiesModel::find($cityId);
                                                                                    $stateData = App\Models\AllStatesModel::where('country_id',$citiesInfo->country_id)->get();
                                                                                    $citiesData = App\Models\AllCitiesModel::where('state_id',$citiesInfo->state_id)->get();
                                                                                }
                                                                            @endphp
                                                                            @foreach($AllCountries as $country)
                                                                                @php
                                                                                    $selected1 = 0;
                                                                                    if($cityId != null){
                                                                                        if($country->id == $citiesInfo->country_id){
                                                                                            $selected1 = 1;
                                                                                        }
                                                                                    }  
                                                                                @endphp
                                                                                <option value="{{$country->id}}" {{$selected1 == 1 ? 'selected' : ''}}>{{$country->name}}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <select name="" id="sel2" class="form-control">
                                                                            @if($cityId != null)
                                                                                @foreach($stateData as $state)
                                                                                    @php
                                                                                        $selected2 = 0;
                                                                                        if($cityId != null){
                                                                                            if($state->id == $citiesInfo->state_id){
                                                                                                $selected2 = 1;
                                                                                            }
                                                                                        }  
                                                                                    @endphp
                                                                                    <option value="{{$state->id}}" {{$selected2 == 1 ? 'selected' : ''}}>{{$state->name}}</option>
                                                                                @endforeach
                                                                            @endif
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <select name="cityId" id="sel3" class="form-control">
                                                                            @if($cityId != null)
                                                                                @foreach($citiesData as $city)
                                                                                    @php
                                                                                        $selected3 = 0;
                                                                                        if($cityId != null){
                                                                                            if($city->id == $citiesInfo->id){
                                                                                                $selected3 = 1;
                                                                                            }
                                                                                        }  
                                                                                    @endphp
                                                                                    <option value="{{$city->id}}" {{$selected3 == 1 ? 'selected' : ''}}>{{$city->name}}</option>
                                                                                @endforeach
                                                                            @endif
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
                                                        <form action="{{URL::to('/user-registration/Account')}}" class="AddDepositFullForm" method="post">
                                                            <div class="col-md-12 ">
                                                                <div class="">
                                                                    <div2 class="form-group">

                                                                        <!-- Enter the estimate profit -->
                                                                            @php $addAccount = 0 @endphp
                                                                        @if($clientAccount1 != null)
                                                                            @foreach($clientAccount as $accountInfo)
                                                                                <div class="dynamic-field233" id="dynamic-field-3424">
                                                                                    <label class="d-none"></label>
                                                                                    <div class="row">
                                                                                        <div class="col-sm-6 pb-3">
                                                                                            <input type="hidden" class="form-control" name="verified[]" value="{{$accountInfo->verified}}"/> 
                                                                                            <select class="custom-select" name="brokerId[]"{{$accountInfo->verified == 1 ? 'disabled' : ''}}>
                                                                                                @foreach($allBroker as $broker)
                                                                                                    <option value="{{$broker->id}}" {{$broker->id == $accountInfo->brokerId ? 'selected' : ''}}>{{$broker->title}}</option>
                                                                                                @endforeach
                                                                                            </select>
                                                                                            @if($accountInfo->verified == 1)
                                                                                                <input type="hidden" class="form-control" name="brokerId[]" value="{{$accountInfo->brokerId}}"/>
                                                                                            @endif
                                                                                        </div>
                                                                                        <div class="col-md-6">
                                                                                            <div class="form-group">
                                                                                                <input type="text" class="form-control" name="clientAccountId[]" value="{{$accountInfo->clientAccountId}}" placeholder="Client Id " {{$accountInfo->verified == 1 ? 'disabled' : ''}}/>
                                                                                                @if($accountInfo->verified == 1)
                                                                                                    <input type="hidden" class="form-control" name="clientAccountId[]" value="{{$accountInfo->clientAccountId}}" placeholder="Client Id "/>
                                                                                                @endif
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-md-6">
                                                                                            <div class="form-group">
                                                                                                <input type="text" class="form-control" name="accountNumber[]" value="{{$accountInfo->accountNumber}}" placeholder="Account Number *" required {{$accountInfo->verified == 1 ? 'disabled' : ''}}/>
                                                                                                @if($accountInfo->verified == 1)
                                                                                                    <input type="hidden" class="form-control" name="accountNumber[]" value="{{$accountInfo->accountNumber}}" placeholder="Account Number *"/>
                                                                                                @endif
                                                                                            </div>
                                                                                            <div class="form-group">
                                                                                                <input type="text" class="form-control" name="accountName[]" value="{{$accountInfo->accountName}}" placeholder="Account Name *" required {{$accountInfo->verified == 1 ? 'disabled' : ''}}/>
                                                                                                @if($accountInfo->verified == 1)
                                                                                                    <input type="hidden" class="form-control" name="accountName[]" value="{{$accountInfo->accountName}}" placeholder="Account Name *"}/>
                                                                                                @endif
                                                                                            </div>
                                                                                        </div>
                                                                                        <div class="col-md-6">
                                                                                            <div class="form-group">
                                                                                                <input type="mail" class="form-control" name="accountemail[]" value="{{$accountInfo->accountemail}}" placeholder="Account Email *" required {{$accountInfo->verified == 1 ? 'disabled' : ''}}/>
                                                                                                @if($accountInfo->verified == 1)
                                                                                                    <input type="hidden" class="form-control" name="accountemail[]" value="{{$accountInfo->accountemail}}" placeholder="Account Email *"/>
                                                                                                @endif
                                                                                            </div>
                                                                                            <div class="form-group">
                                                                                                @if($accountInfo->verified == 0)
                                                                                                    <input type="number" class="form-control" name="accountdeposit[]" value="{{$accountInfo->accountdeposit}}" placeholder="Deposit" required/>
                                                                                                @else
                                                                                                    <div class="d-flex justifly-content-end">
                                                                                                        <input type="hidden" class="form-control alreadyDeposit{{$addAccount}}" name="accountdeposit[]" value="{{$accountInfo->accountdeposit}}" placeholder="Deposit"/> 
                                                                                                        <input type="number" class="form-control" name="" value="{{$accountInfo->accountdeposit}}" placeholder="Deposit" disabled/> 
                                                                                                        <span class="m-2">+</span>
                                                                                                        <input type="number" class="form-control newDeposit{{$addAccount}}">
                                                                                                    </div>
                                                                                                @endif
                                                                                            </div>
                                                                                        </div>

                                                                                    </div>
                                                                                </div>
                                                                                @php $addAccount++ @endphp
                                                                            @endforeach
                                                                        @endif
                                                                            <div class="dynamic-field3" id="dynamic-field-4">
                                                                                <label class="d-none"></label>
                                                                                <div class="row ">
                                                                                    <div class="col-sm-6 pb-3">
                                                                                            <input type="hidden" class="form-control" name="verified[]" value="0"/> 
                                                                                        <select class="custom-select" name="brokerId[]">
                                                                                            @foreach($allBroker as $broker)
                                                                                                <option value="{{$broker->id}}">{{$broker->title}}</option>
                                                                                            @endforeach
                                                                                        </select>
                                                                                    </div>
                                                                                    <div class="col-sm-6">
                                                                                        <div class="form-group">
                                                                                            <input type="text" class="form-control" name="clientAccountId[]" value="" placeholder="Client Id "/>
                                                                                        </div>
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
                                                                <div class="col-md-12 justify-content-end d-flex p-2">
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
    $(".AddDepositFullForm").on("submit",function(e) {
           console.log("asd");
        for (let i = 0; i < {{$addAccount}}; i++) {
           let newDeposit = ".newDeposit" + i;
           let data = $(newDeposit).val();
           if(data != "" && data != null){
               let alreadyDeposit = ".alreadyDeposit" + i;
               let addData = $(alreadyDeposit).val();
               let finelData = parseInt(data) + parseInt(addData);
               $(alreadyDeposit).val(finelData);
           }
        }
    });
    $("#sel1").on("change",function(){
        var myusername = $("#sel1").val();
        var url = "{{URL::to('user-registration/stateData')}}" + "/" + myusername;
        $.ajax({
            type: "POST",
            url: url,
            data: myusername,
            success: function(data){
                $("#sel2").html('');
                $("#sel3").html('');
                console.log("hello");
                for(var i = 0; i < data.length; i++) {
                    console.log("hello2");
                    $("#sel2").append("<option value='"+data[i].id+"'>"+data[i].name+"</option>")
                }
            }
        });
    });
    $("#sel2").on("change",function(){
        var myusername1 = $("#sel2").val();
        var url1 = "{{URL::to('user-registration/cityData')}}" + "/" + myusername1;
        $.ajax({
            type: "POST",
            url: url1,
            data: myusername1,
            success: function(data){
                $("#sel3").html('');
                for(var i = 0; i < data.length; i++) {
                    $("#sel3").append("<option value='"+data[i].id+"'>"+data[i].name+"</option>")
                }
            }
        });
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
