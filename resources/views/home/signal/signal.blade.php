@include('inc.header')
<!-- Content Area -->
<div class="content_area">
   <section class="after_banner_content_area">
      <div class="container">
         <div class="row justify-content-center">

            <div class="col-lg-3 col-md-6 col-sm-12 order-2 order-lg-1">
               @include('inc.home-left-sidebar')
            </div>
            <div class="col-lg-6 col-md-12 order-1 order-lg-2">
                @if($MidBannerHomeActive)
                    <div class="mb-5">
                        <a href="{{$MidBannerHomeActive->link}}" target="_blank">
                            <img src="{{URL::to('storage/app')}}/{{$MidBannerHomeActive->image}}" width="100%">
                          </a>
                    </div>
                @endif
               <section class="">
                  <div class="">
                     <div class="content_area_heading large-heading text-center">
                        <h1 class="heading_title wow animated fadeInUp">
                           All Signals
                        </h1>
                        <div class="heading_border wow animated fadeInUp">
                           <span class="one"></span><span class="two"></span><span class="three"></span>
                        </div>
                     </div>
                     <!-- /.End of How to Get  Start -->
                         <div class="currency-table">
                            <div class="with-nav-tabs currency-tabs">
                                <div class="tab-header">
                                    <ul class="nav nav-tabs" id="currencyTab" role="tablist">
                                        <li class="nav-item" class="active"><a class="nav-link active" href="#crypto"
                                                data-toggle="tab" role="tab" aria-controls="crypto"
                                                aria-selected="true">Crypto</a></li>
                                        <li class="nav-item"><a class="nav-link" href="#forex" data-toggle="tab"
                                                role="tab" aria-controls="forex" aria-selected="false">Forex</a></li>
                                        <li class="nav-item"><a class="nav-link" role="tab" aria-controls="stocks"
                                                aria-selected="false" href="#stocks" data-toggle="tab">Stocks</a></li>
                                    </ul>
                                </div>
                                <div class="container">
                                    <div class="tab-content" id="currencyTabContent">
                                        <div class="tab-pane fade show active" id="crypto" role="tabpanel"
                                            aria-labelledby="crypto-tab">
                                            <div class="scroll-tbl">
                                                <h4 class="ml-2 Color0d5fe9">Current Signals</h4>
                                                <table id="cryptoTable1" class="Border-Theme table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                                                    <thead>                                                      
                                                        <tr class="back-Theme">
                                                            <th>Sr#</th>
                                                            <th>Symbols/Pairs</th>
                                                            <th>Status</th>
                                                            <th>Users</th>
                                                            <th>Valid Till</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                         @php $icount = 1 @endphp
                                                         @foreach($signalData as $data)
                                                            @php
                                                               $url = $data->GetURL();
                                                               $loginClientData = Session::get('client');
                                                               $go = 1;
                                                               $go3 = 1;
                                                               $profits = explode('@',$data->takeProfit);
                                                               $time1 = strtotime($data->time);
                                                               $time = date('h:i A', $time1);
                                                               $date1 = strtotime($data->date);
                                                               $date = date('d M Y', $date1);
                                                               if($data->date == date("Y-m-d")){
                                                                  if($data->time >= date("H:i:s")){
                                                                     $go = 0;
                                                                     $go3 = 3;
                                                                  }
                                                               }
                                                               if($data->date > date("Y-m-d")){
                                                                  $go = 0;
                                                                  $go3 = 3;
                                                               }
                                                               $timeDate1 = strtotime(date("Y-m-d H:i:s"));
                                                               $timeDate2 = strtotime($data->created_at->format("Y-m-d H:i:s"));
                                                               $minsDate = ($timeDate1 - $timeDate2) / 60;
                                                               $formatEng = "min";
                                                               $finelmin = intval($minsDate);
                                                               if($finelmin > 60){
                                                                  $finelmin /= 60;
                                                                  $formatEng = "hours";
                                                                  if($finelmin > 24){
                                                                     $finelmin /= 24;
                                                                     $formatEng = "days";
                                                                     if($finelmin > 7){
                                                                        $finelmin /= 7;
                                                                        $formatEng = "weeks";
                                                                        if($finelmin > 4){
                                                                           $finelmin /= 4;
                                                                           $formatEng = "moths";
                                                                           if($finelmin > 12){
                                                                              $finelmin /= 12;
                                                                              $formatEng = "years";
                                                                           }
                                                                        }
                                                                     }
                                                                  }
                                                               }
                                                               $finelmin = intval($finelmin);
                                                               $pair = $data->getPair();
                                                               $flags = explode("/",$pair->pair);
                                                            @endphp
                                                            @if($go3 == 3 && $pair->categoryId ==2)
                                                               <tr>
                                                                  <td>{{$icount++}}</td>
                                                                  <td class="text-center">
                                                                     <p class="mb-2">
                                                                        @foreach($flags as $flag)
                                                                           @php $flag4 = str_replace(' ', '', $flag) @endphp
                                                                           <img src="{{URL::to('storage/app/signalFlag')}}/{{$flag4}}.jpg" width="50" height="35" alt=""> &nbsp;&nbsp;
                                                                        @endforeach
                                                                        <!-- <span class="flag-icon flag-icon-ad">&nbsp;</span>
                                                                        <span class="flag-icon flag-icon-us">&nbsp;</span> -->
                                                                     </p>
                                                                     <h6 class="m-0 font-weight-bold"><strong>{{$pair->pair}}</strong></h6>
                                                                     <h6 class="m-0 text-danger">{{$finelmin}} {{$formatEng}} ago</h6>
                                                                  </td>
                                                                  <td>
                                                                     @if($go == 0)
                                                                        @if($data->selectUser == "Register User" && !Session::has('client'))
                                                                           <a href="#!"  class="LoginButton btn btn-success btn-sm buttonBlinking" data-toggle="modal" data-target="#requestQuoteModal">Active</a>
                                                                        @elseif($data->selectUser == "VIP Member")
                                                                           @if(!Session::has('client'))
                                                                              <a href="#!"  class="LoginButton btn btn-success btn-sm buttonBlinking" data-toggle="modal" data-target="#requestQuoteModal">Active</a>
                                                                           @elseif(isset($loginClientData->memberType))
                                                                              @if($loginClientData->memberType == 1)
                                                                                 <a href="#!" class="btn btn-success btn-sm buttonBlinking" onclick="snackbar1()">Active</a>
                                                                              @else
                                                                                 <a href="{{URL::to('signal')}}/{{$url}}" class="btn btn-success btn-sm buttonBlinking">Active</a>
                                                                              @endif
                                                                           @endif
                                                                        @else
                                                                           <a href="{{URL::to('signal')}}/{{$url}}" class="btn btn-success btn-sm buttonBlinking">Active</a>
                                                                        @endif
                                                                     @endif
                                                                  </td>
                                                                  <td><strong class="font-weight-bold">{{$data->selectUser}}</strong></td>
                                                                  <td>
                                                                     <span><strong class="mr-2"> {{$date}}</strong><strong> {{$time}} </strong></span>
                                                                  </td>
                                                               </tr>
                                                            @endif
                                                         @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="forex" role="tabpanel"
                                            aria-labelledby="forex-tab">
                                            <div class="scroll-tbl">
                                                <h4 class="ml-2 Color0d5fe9">Current Signals</h4>
                                                <table id="forexTable1" class="Border-Theme table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                                                   <thead>                                                     
                                                      <tr class="back-Theme">
                                                         <th>Sr#</th>
                                                         <th>Symbols/Pairs</th>
                                                         <th>Status</th>
                                                         <th>Users</th>
                                                         <th>Valid Till</th>
                                                      </tr>
                                                   </thead>
                                                   <tbody>
                                                      @php $icount = 1 @endphp
                                                      @foreach($signalData as $data)
                                                         @php
                                                            $url = $data->GetURL();
                                                            $loginClientData = Session::get('client');
                                                            $go = 1;
                                                            $go3 = 1;
                                                            $profits = explode('@',$data->takeProfit);
                                                            $time1 = strtotime($data->time);
                                                            $time = date('h:i A', $time1);
                                                            $date1 = strtotime($data->date);
                                                            $date = date('d M Y', $date1);
                                                            if($data->date == date("Y-m-d")){
                                                               if($data->time >= date("H:i:s")){
                                                                  $go = 0;
                                                                  $go3 = 3;
                                                               }
                                                            }
                                                            if($data->date > date("Y-m-d")){
                                                               $go = 0;
                                                               $go3 = 3;
                                                            }
                                                            $timeDate1 = strtotime(date("Y-m-d H:i:s"));
                                                            $timeDate2 = strtotime($data->created_at->format("Y-m-d H:i:s"));
                                                            $minsDate = ($timeDate1 - $timeDate2) / 60;
                                                            $formatEng = "min";
                                                            $finelmin = intval($minsDate);
                                                            if($finelmin > 60){
                                                               $finelmin /= 60;
                                                               $formatEng = "hours";
                                                               if($finelmin > 24){
                                                                  $finelmin /= 24;
                                                                  $formatEng = "days";
                                                                  if($finelmin > 7){
                                                                     $finelmin /= 7;
                                                                     $formatEng = "weeks";
                                                                     if($finelmin > 4){
                                                                        $finelmin /= 4;
                                                                        $formatEng = "moths";
                                                                        if($finelmin > 12){
                                                                           $finelmin /= 12;
                                                                           $formatEng = "years";
                                                                        }
                                                                     }
                                                                  }
                                                               }
                                                            }
                                                            $finelmin = intval($finelmin);
                                                            $pair = $data->getPair();
                                                            $flags = explode("/",$pair->pair);
                                                         @endphp
                                                         @if($go3 == 3 && ($pair->categoryId == 3 || $pair->categoryId == 4 ))
                                                            <tr>
                                                               <td>{{$icount++}}</td>
                                                               <td class="text-center">
                                                                  <p class="mb-2">
                                                                     @foreach($flags as $flag)
                                                                        @php $flag4 = str_replace(' ', '', $flag) @endphp
                                                                        <img src="{{URL::to('storage/app/signalFlag')}}/{{$flag4}}.jpg" width="50" height="35" alt=""> &nbsp;&nbsp;
                                                                     @endforeach
                                                                     <!-- <span class="flag-icon flag-icon-ad">&nbsp;</span>
                                                                     <span class="flag-icon flag-icon-us">&nbsp;</span> -->
                                                                  </p>
                                                                  <h6 class="m-0 font-weight-bold"><strong>{{$pair->pair}}</strong></h6>
                                                                  <h6 class="m-0 text-danger">{{$finelmin}} {{$formatEng}} ago</h6>
                                                               </td>
                                                               <td>
                                                                  @if($go == 0)
                                                                     @if($data->selectUser == "Register User" && !Session::has('client'))
                                                                        <a href="#!"  class="LoginButton btn btn-success btn-sm buttonBlinking" data-toggle="modal" data-target="#requestQuoteModal">Active</a>
                                                                     @elseif($data->selectUser == "VIP Member")
                                                                        @if(!Session::has('client'))
                                                                           <a href="#!"  class="LoginButton btn btn-success btn-sm buttonBlinking" data-toggle="modal" data-target="#requestQuoteModal">Active</a>
                                                                        @elseif(isset($loginClientData->memberType))
                                                                           @if($loginClientData->memberType == 1)
                                                                              <a href="#!" class="btn btn-success btn-sm buttonBlinking" onclick="snackbar1()">Active</a>
                                                                           @else
                                                                              <a href="{{URL::to('signal')}}/{{$url}}" class="btn btn-success btn-sm buttonBlinking">Active</a>
                                                                           @endif
                                                                        @endif
                                                                     @else
                                                                        <a href="{{URL::to('signal')}}/{{$url}}" class="btn btn-success btn-sm buttonBlinking">Active</a>
                                                                     @endif
                                                                  @endif
                                                               </td>
                                                               <td><strong class="font-weight-bold">{{$data->selectUser}}</strong></td>
                                                               <td>
                                                                  <span><strong class="mr-2"> {{$date}}</strong><strong> {{$time}} </strong></span>
                                                               </td>
                                                            </tr>
                                                         @endif
                                                      @endforeach
                                                   </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="stocks" role="tabpanel"
                                            aria-labelledby="stocks-tab">
                                            <div class="scroll-tbl">
                                                <h4 class="ml-2 Color0d5fe9">Current Signals</h4>
                                                <table id="stocks" class="Border-Theme stocks table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                                                    <thead>                                                    
                                                        <tr class="back-Theme">
                                                            <th>Sr#</th>
                                                            <th>Symbols/Pairs</th>
                                                            <th>Status</th>
                                                            <th>Users</th>
                                                            <th>Valid Till</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                      @php $icount = 1 @endphp
                                                      @foreach($signalData as $data)
                                                         @php
                                                            $url = $data->GetURL();
                                                            $loginClientData = Session::get('client');
                                                            $go = 1;
                                                            $go3 = 1;
                                                            $profits = explode('@',$data->takeProfit);
                                                            $time1 = strtotime($data->time);
                                                            $time = date('h:i A', $time1);
                                                            $date1 = strtotime($data->date);
                                                            $date = date('d M Y', $date1);
                                                            if($data->date == date("Y-m-d")){
                                                               if($data->time >= date("H:i:s")){
                                                                  $go = 0;
                                                                  $go3 = 3;
                                                               }
                                                            }
                                                            if($data->date > date("Y-m-d")){
                                                               $go = 0;
                                                               $go3 = 3;
                                                            }
                                                            $timeDate1 = strtotime(date("Y-m-d H:i:s"));
                                                            $timeDate2 = strtotime($data->created_at->format("Y-m-d H:i:s"));
                                                            $minsDate = ($timeDate1 - $timeDate2) / 60;
                                                            $formatEng = "min";
                                                            $finelmin = intval($minsDate);
                                                            if($finelmin > 60){
                                                               $finelmin /= 60;
                                                               $formatEng = "hours";
                                                               if($finelmin > 24){
                                                                  $finelmin /= 24;
                                                                  $formatEng = "days";
                                                                  if($finelmin > 7){
                                                                     $finelmin /= 7;
                                                                     $formatEng = "weeks";
                                                                     if($finelmin > 4){
                                                                        $finelmin /= 4;
                                                                        $formatEng = "moths";
                                                                        if($finelmin > 12){
                                                                           $finelmin /= 12;
                                                                           $formatEng = "years";
                                                                        }
                                                                     }
                                                                  }
                                                               }
                                                            }
                                                            $finelmin = intval($finelmin);
                                                            $pair = $data->getPair();
                                                            $flags = explode("/",$pair->pair);
                                                         @endphp
                                                         @if($go3 == 3 && $pair->categoryId ==1)
                                                            <tr>
                                                               <td>{{$icount++}}</td>
                                                               <td class="text-center">
                                                                  <p class="mb-2">
                                                                     @foreach($flags as $flag)
                                                                        @php $flag4 = str_replace(' ', '', $flag) @endphp
                                                                        <img src="{{URL::to('storage/app/signalFlag')}}/{{$flag4}}.jpg" width="50" height="35" alt=""> &nbsp;&nbsp;
                                                                     @endforeach
                                                                     <!-- <span class="flag-icon flag-icon-ad">&nbsp;</span>
                                                                     <span class="flag-icon flag-icon-us">&nbsp;</span> -->
                                                                  </p>
                                                                  <h6 class="m-0 font-weight-bold"><strong>{{$pair->pair}}</strong></h6>
                                                                  <h6 class="m-0 text-danger">{{$finelmin}} {{$formatEng}} ago</h6>
                                                               </td>
                                                               <td>
                                                                  @if($go == 0)
                                                                     @if($data->selectUser == "Register User" && !Session::has('client'))
                                                                        <a href="#!"  class="LoginButton btn btn-success btn-sm buttonBlinking" data-toggle="modal" data-target="#requestQuoteModal">Active</a>
                                                                     @elseif($data->selectUser == "VIP Member")
                                                                        @if(!Session::has('client'))
                                                                           <a href="#!"  class="LoginButton btn btn-success btn-sm buttonBlinking" data-toggle="modal" data-target="#requestQuoteModal">Active</a>
                                                                        @elseif(isset($loginClientData->memberType))
                                                                           @if($loginClientData->memberType == 1)
                                                                              <a href="#!" class="btn btn-success btn-sm buttonBlinking" onclick="snackbar1()">Active</a>
                                                                           @else
                                                                              <a href="{{URL::to('signal')}}/{{$url}}" class="btn btn-success btn-sm buttonBlinking">Active</a>
                                                                           @endif
                                                                        @endif
                                                                     @else
                                                                        <a href="{{URL::to('signal')}}/{{$url}}" class="btn btn-success btn-sm buttonBlinking">Active</a>
                                                                     @endif
                                                                  @endif
                                                               </td>
                                                               <td><strong class="font-weight-bold">{{$data->selectUser}}</strong></td>
                                                               <td>
                                                                  <span><strong class="mr-2"> {{$date}}</strong><strong> {{$time}} </strong></span>
                                                               </td>
                                                            </tr>
                                                         @endif
                                                      @endforeach
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.End of currency table -->


                     <!-- /.End of How to Get  Start -->
                        <div class="currency-table">
                            <div class="with-nav-tabs currency-tabs">
                                <div class="tab-header">
                                    <ul class="nav nav-tabs" id="currencyTab" role="tablist">
                                        <li class="nav-item" class="active"><a class="nav-link active" href="#crypto1"
                                                data-toggle="tab" role="tab" aria-controls="crypto"
                                                aria-selected="true">Crypto</a></li>
                                        <li class="nav-item"><a class="nav-link" href="#forex1" data-toggle="tab"
                                                role="tab" aria-controls="forex" aria-selected="false">Forex</a></li>
                                        <li class="nav-item"><a class="nav-link" role="tab" aria-controls="stocks"
                                                aria-selected="false" href="#stocks1" data-toggle="tab">Stocks</a></li>
                                    </ul>
                                </div>
                                <div class="container">
                                    <div class="tab-content" id="currencyTabContent">
                                        <div class="tab-pane fade show active" id="crypto1" role="tabpanel"
                                            aria-labelledby="crypto-tab">
                                            <div class="scroll-tbl">
                                                <h4 class="ml-2 Colorff0024">Expired Signals</h4>
                                                <table id="cryptoTable2" class="Border-Theme table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                                                    <thead>                                                      
                                                        <tr class="back-Theme">
                                                            <th>Sr#</th>
                                                            <th>Symbols/Pairs</th>
                                                            <th>Signal</th>
                                                            <th>Users</th>
                                                            <th>Result</th>
                                                            <th>Pips</th>
                                                        </tr>
                                                    </thead>
                                                   <tbody>
                                                      @php $icount = 1 @endphp
                                                      @foreach($signalData as $data)
                                                         @php
                                                            $signalDataApi = $data->GetSignalApiData();
                                                            $url = $data->GetURL();
                                                            $loginClientData = Session::get('client');
                                                            $go = 1;
                                                            $go3 = 1;
                                                            $profits = explode('@',$data->takeProfit);
                                                            $time1 = strtotime($data->time);
                                                            $time = date('h:i A', $time1);
                                                            $date1 = strtotime($data->date);
                                                            $date = date('d M Y', $date1);
                                                            if($data->date == date("Y-m-d")){
                                                               if($data->time >= date("H:i:s")){
                                                                  $go = 0;
                                                                  $go3 = 3;
                                                               }
                                                            }
                                                            if($data->date > date("Y-m-d")){
                                                               $go = 0;
                                                                  $go3 = 3;
                                                            }
                                                            $timeDate1 = strtotime(date("Y-m-d H:i:s"));
                                                            $timeDate2 = strtotime($data->created_at->format("Y-m-d H:i:s"));
                                                            $minsDate = ($timeDate1 - $timeDate2) / 60;
                                                            $pair = $data->getPair();
                                                            $flags = explode("/",$pair->pair);
                                                         @endphp
                                                         @if($go3 != 3 && $pair->categoryId == 2)
                                                            <tr>
                                                               <td>{{$icount++}}</td>
                                                               <td>
                                                                  <p class="mb-2">
                                                                     @foreach($flags as $flag)
                                                                        @php $flag4 = str_replace(' ', '', $flag) @endphp
                                                                        <img src="{{URL::to('storage/app/signalFlag')}}/{{$flag4}}.jpg" class="thumbnail" width="50" height="35" alt=""> &nbsp;&nbsp;
                                                                     @endforeach
                                                                     <!-- <span class="flag-icon flag-icon-ad">&nbsp;</span>
                                                                     <span class="flag-icon flag-icon-us">&nbsp;</span> -->
                                                                  </p>
                                                                  <h6 class="m-0 font-weight-bold"><strong>{{$pair->pair}}</strong></h6>
                                                                  <h6 class="m-0 text-danger">Expired</h6>
                                                               </td>
                                                               <td class="pl-0">
                                                                  <a href="{{URL::to('signal')}}/{{$url}}">View Signal</a>
                                                               </td>
                                                               <td><strong class="font-weight-bold">{{$data->selectUser}}</strong></td>
                                                               <td class="text-center">
                                                                  @if($data->result != null)
                                                                     <span class="{{$data->result == 'TP Hit' ? 'text-success' : ''}}{{$data->result == 'SL Hit' ? 'text-danger' : ''}}"><strong> {{$data->result == null ? 'manually closed' : $data->result}}</strong></span>
                                                                  @elseif($signalDataApi)
                                                                     <span class="{{$signalDataApi->result == 'TP Hit' ? 'text-success' : ''}}{{$signalDataApi->result == 'SL Hit' ? 'text-danger' : ''}}"><strong> {{$signalDataApi->result == null ? 'manually closed' : $signalDataApi->result}}</strong></span>
                                                                  @endif
                                                               </td>
                                                               <td class="text-center">
                                                                  @if($data->pips != null)
                                                                     <span class="m-0 {{str_contains($data->pips,'+') != null ? 'text-success' : ''}}{{str_contains($data->pips,'-') ? 'text-danger' : ''}}"><strong> {{$data->pips == null ? '0' : $data->pips}}</strong></span>
                                                                  @elseif($signalDataApi)
                                                                     <span class="m-0 {{str_contains($signalDataApi->pips,'+') != null ? 'text-success' : ''}}{{str_contains($signalDataApi->pips,'-') ? 'text-danger' : ''}}"><strong> {{$signalDataApi->pips == null ? 'none' : $signalDataApi->pips}}</strong></span>
                                                                  @endif
                                                               </td>
                                                            </tr>
                                                         @endif
                                                      @endforeach
                                                   </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="forex1" role="tabpanel"
                                            aria-labelledby="forex-tab">
                                            <div class="scroll-tbl">
                                                <h4 class="ml-2 Colorff0024">Expired Signals</h4>
                                                <table id="forexTable2" class="Border-Theme table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                                                    <thead>                                                     
                                                        <tr class="back-Theme">
                                                            <th>Sr#</th>
                                                            <th>Symbols/Pairs</th>
                                                            <th>Signal</th>
                                                            <th>Users</th>
                                                            <th>Result</th>
                                                            <th>Pips</th>
                                                        </tr>
                                                    </thead>
                                                   <tbody>
                                                      @php $icount = 1 @endphp
                                                      @foreach($signalData as $data)
                                                         @php
                                                            $signalDataApi = $data->GetSignalApiData();
                                                            $url = $data->GetURL();
                                                            $loginClientData = Session::get('client');
                                                            $go = 1;
                                                            $go3 = 1;
                                                            $profits = explode('@',$data->takeProfit);
                                                            $time1 = strtotime($data->time);
                                                            $time = date('h:i A', $time1);
                                                            $date1 = strtotime($data->date);
                                                            $date = date('d M Y', $date1);
                                                            if($data->date == date("Y-m-d")){
                                                               if($data->time >= date("H:i:s")){
                                                                  $go = 0;
                                                                  $go3 = 3;
                                                               }
                                                            }
                                                            if($data->date > date("Y-m-d")){
                                                               $go = 0;
                                                                  $go3 = 3;
                                                            }
                                                            $timeDate1 = strtotime(date("Y-m-d H:i:s"));
                                                            $timeDate2 = strtotime($data->created_at->format("Y-m-d H:i:s"));
                                                            $minsDate = ($timeDate1 - $timeDate2) / 60;
                                                            $pair = $data->getPair();
                                                            $flags = explode("/",$pair->pair);
                                                         @endphp
                                                         @if($go3 != 3 && $pair->categoryId == 1)
                                                            <tr>
                                                               <td>{{$icount++}}</td>
                                                               <td>
                                                                  <p class="mb-2">
                                                                     @foreach($flags as $flag)
                                                                        @php $flag4 = str_replace(' ', '', $flag) @endphp
                                                                        <img src="{{URL::to('storage/app/signalFlag')}}/{{$flag4}}.jpg" class="thumbnail" width="50" height="35" alt=""> &nbsp;&nbsp;
                                                                     @endforeach
                                                                     <!-- <span class="flag-icon flag-icon-ad">&nbsp;</span>
                                                                     <span class="flag-icon flag-icon-us">&nbsp;</span> -->
                                                                  </p>
                                                                  <h6 class="m-0 font-weight-bold"><strong>{{$pair->pair}}</strong></h6>
                                                                  <h6 class="m-0 text-danger">Expired</h6>
                                                               </td>
                                                               <td class="pl-0">
                                                                  <a href="{{URL::to('signal')}}/{{$url}}">View Signal</a>
                                                               </td>
                                                               <td><strong class="font-weight-bold">{{$data->selectUser}}</strong></td>
                                                               <td class="text-center">
                                                                  @if($data->result != null)
                                                                     <span class="{{$data->result == 'TP Hit' ? 'text-success' : ''}}{{$data->result == 'SL Hit' ? 'text-danger' : ''}}"><strong> {{$data->result == null ? 'manually closed' : $data->result}}</strong></span>
                                                                  @elseif($signalDataApi)
                                                                     <span class="{{$signalDataApi->result == 'TP Hit' ? 'text-success' : ''}}{{$signalDataApi->result == 'SL Hit' ? 'text-danger' : ''}}"><strong> {{$signalDataApi->result == null ? 'manually closed' : $signalDataApi->result}}</strong></span>
                                                                  @endif
                                                               </td>
                                                               <td class="text-center">
                                                                  @if($data->pips != null)
                                                                     <span class="m-0 {{str_contains($data->pips,'+') != null ? 'text-success' : ''}}{{str_contains($data->pips,'-') ? 'text-danger' : ''}}"><strong> {{$data->pips == null ? '0' : $data->pips}}</strong></span>
                                                                  @elseif($signalDataApi)
                                                                     <span class="m-0 {{str_contains($signalDataApi->pips,'+') != null ? 'text-success' : ''}}{{str_contains($signalDataApi->pips,'-') ? 'text-danger' : ''}}"><strong> {{$signalDataApi->pips == null ? 'none' : $signalDataApi->pips}}</strong></span>
                                                                  @endif
                                                               </td>
                                                            </tr>
                                                         @endif
                                                      @endforeach
                                                   </tbody>
                                                </table>
                                            </div>
                                        </div>
                                        <div class="tab-pane fade" id="stocks1" role="tabpanel"
                                            aria-labelledby="stocks-tab">
                                            <div class="scroll-tbl">
                                                <h4 class="ml-2 Colorff0024">Expired Signals</h4>
                                                <table id="stocksTable2" class="Border-Theme table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                                                   <thead>                                                    
                                                      <tr class="back-Theme">
                                                      <th>Sr#</th>
                                                      <th>Symbols/Pairs</th>
                                                      <th>Signal</th>
                                                      <th>Users</th>
                                                      <th>Result</th>
                                                      <th>Pips</th>
                                                      </tr>
                                                   </thead>
                                                   <tbody>
                                                      @php $icount = 1 @endphp
                                                      @foreach($signalData as $data)
                                                         @php
                                                            $signalDataApi = $data->GetSignalApiData();
                                                            $url = $data->GetURL();
                                                            $loginClientData = Session::get('client');
                                                            $go = 1;
                                                            $go3 = 1;
                                                            $profits = explode('@',$data->takeProfit);
                                                            $time1 = strtotime($data->time);
                                                            $time = date('h:i A', $time1);
                                                            $date1 = strtotime($data->date);
                                                            $date = date('d M Y', $date1);
                                                            if($data->date == date("Y-m-d")){
                                                               if($data->time >= date("H:i:s")){
                                                                  $go = 0;
                                                                  $go3 = 3;
                                                               }
                                                            }
                                                            if($data->date > date("Y-m-d")){
                                                               $go = 0;
                                                                  $go3 = 3;
                                                            }
                                                            $timeDate1 = strtotime(date("Y-m-d H:i:s"));
                                                            $timeDate2 = strtotime($data->created_at->format("Y-m-d H:i:s"));
                                                            $minsDate = ($timeDate1 - $timeDate2) / 60;
                                                            $pair = $data->getPair();
                                                            $flags = explode("/",$pair->pair);
                                                         @endphp
                                                         @if($go3 != 3 && ($pair->categoryId == 3 || $pair->categoryId == 4))
                                                            <tr>
                                                               <td>{{$icount++}}</td>
                                                               <td>
                                                                  <p class="mb-2">
                                                                     @foreach($flags as $flag)
                                                                        @php $flag4 = str_replace(' ', '', $flag) @endphp
                                                                        <img src="{{URL::to('storage/app/signalFlag')}}/{{$flag4}}.jpg" class="thumbnail" width="50" height="35" alt=""> &nbsp;&nbsp;
                                                                     @endforeach
                                                                     <!-- <span class="flag-icon flag-icon-ad">&nbsp;</span>
                                                                     <span class="flag-icon flag-icon-us">&nbsp;</span> -->
                                                                  </p>
                                                                  <h6 class="m-0 font-weight-bold"><strong>{{$pair->pair}}</strong></h6>
                                                                  <h6 class="m-0 text-danger">Expired</h6>
                                                               </td>
                                                               <td class="pl-0">
                                                                  <a href="{{URL::to('signal')}}/{{$url}}">View Signal</a>
                                                               </td>
                                                               <td><strong class="font-weight-bold">{{$data->selectUser}}</strong></td>
                                                               <td class="text-center">
                                                                  @if($data->result != null)
                                                                     <span class="{{$data->result == 'TP Hit' ? 'text-success' : ''}}{{$data->result == 'SL Hit' ? 'text-danger' : ''}}"><strong> {{$data->result == null ? 'manually closed' : $data->result}}</strong></span>
                                                                  @elseif($signalDataApi)
                                                                     <span class="{{$signalDataApi->result == 'TP Hit' ? 'text-success' : ''}}{{$signalDataApi->result == 'SL Hit' ? 'text-danger' : ''}}"><strong> {{$signalDataApi->result == null ? 'manually closed' : $signalDataApi->result}}</strong></span>
                                                                  @endif
                                                               </td>
                                                               <td class="text-center">
                                                                  @if($data->pips != null)
                                                                     <span class="m-0 {{str_contains($data->pips,'+') != null ? 'text-success' : ''}}{{str_contains($data->pips,'-') ? 'text-danger' : ''}}"><strong> {{$data->pips == null ? '0' : $data->pips}}</strong></span>
                                                                  @elseif($signalDataApi)
                                                                     <span class="m-0 {{str_contains($signalDataApi->pips,'+') != null ? 'text-success' : ''}}{{str_contains($signalDataApi->pips,'-') ? 'text-danger' : ''}}"><strong> {{$signalDataApi->pips == null ? 'none' : $signalDataApi->pips}}</strong></span>
                                                                  @endif
                                                               </td>
                                                            </tr>
                                                         @endif
                                                      @endforeach
                                                   </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                     <!-- /.End of currency table -->

                  </div>
               </section>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-12 order-3 order-lg-3">
               @include('inc.home-right-sidebar')
            </div>
         </div>
      </div>
   </section>

</div>
@include('inc.footer')
<style>
   .Border-Theme{
    border: 10px solid;
    border-image-slice: 1;
    border-width: 8px;
    border-image-source: linear-gradient(45deg, #ff0024, #0d5fe9);
   }
   .back-Theme th{
    background: linear-gradient(45deg, #0d5fe9, #ff0024);
    color: white;
   }
   .Color0d5fe9{
      color: #0d5fe9;
   }
   .Colorff0024{
      color:#ff0024;
   }
</style>
<script>
//Crypto Table
$('#cryptoTable1').DataTable({
    responsive: true
});
//Forex Table
$('#forexTable1').DataTable({
    responsive: true
});
//Stocks Table
$('.stocks').DataTable({
    responsive: true
});

//Crypto Table
$('#cryptoTable2').DataTable({
    responsive: true
});
//Forex Table
$('#forexTable2').DataTable({
    responsive: true
});
//Stocks Table
$('#stocksTable2').DataTable({
    responsive: true
});

</script>
<script data-ad-client="ca-pub-4965167409528757" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>

