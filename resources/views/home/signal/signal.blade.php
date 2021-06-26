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
                     <ul class="row nav nav-tabs">
                        <li class="col-sm-6 active">
                           <a data-toggle="tab" href="#AllSignalData">
                              <div class="news_us">
                                    <div class="content_area_heading large-heading text-center">
                                       <h1 class="heading_title wow animated fadeInUp">
                                          All Signals
                                       </h1>
                                       <div class="heading_border wow animated fadeInUp">
                                          <span class="one"></span><span class="two"></span><span class="three"></span>
                                       </div>
                                    </div>
                              </div>
                           </a>
                        </li>
                        <li class="col-sm-6">
                           <a data-toggle="tab" href="#SignalResult">
                              <div class="news_us">
                                 <div class="content_area_heading large-heading text-center">
                                    <h1 class="heading_title wow animated fadeInUp">
                                       Signal Result
                                    </h1>
                                    <div class="heading_border wow animated fadeInUp">
                                       <span class="one"></span><span class="two"></span><span class="three"></span>
                                    </div>
                                 </div>
                              </div>
                           </a>
                        </li>
                     </ul>
                     <div class="tab-content">
                        <div id="AllSignalData" class="tab-pane fade show active">
                           <!-- /.End of How to Get  Start -->
                              <div class="currency-table">
                                 <div class="with-nav-tabs currency-tabs">
                                    <div class="tab-header">
                                       <ul class="nav nav-tabs" id="currencyTab" role="tablist">
                                          <li class="nav-item"><a class="nav-link" href="#crypto" data-toggle="tab" role="tab" aria-controls="crypto" aria-selected="true">Crypto</a></li>
                                          <li class="nav-item" class="active"><a class="nav-link active" href="#forex" data-toggle="tab" role="tab" aria-controls="forex" aria-selected="false">Forex</a></li>
                                          <li class="nav-item"><a class="nav-link" role="tab" aria-controls="stocks" aria-selected="false" href="#stocks" data-toggle="tab">Commodities</a></li>
                                       </ul>
                                    </div>
                                    <div class="container">
                                       <div class="tab-content" id="currencyTabContent"> 
                                          @for($i = 1 ; $i < 4; $i++)
                                             @php 
                                                $icount = 1;
                                                if($i == 1){
                                                   $categoryID = 2;
                                                   $categoryIDD = 2;
                                                   echo "<div class='tab-pane fade' id='crypto' role='tabpanel' aria-labelledby='crypto-tab'>";
                                                }elseif($i == 2){
                                                   $categoryID = 1;
                                                   $categoryIDD = 1;
                                                   echo "<div class='tab-pane fade show active' id='forex' role='tabpanel' aria-labelledby='forex-tab'>";
                                                }else{
                                                   $categoryID = 3;
                                                   $categoryIDD = 4;
                                                   echo "<div class='tab-pane fade' id='stocks' role='tabpanel' aria-labelledby='stocks-tab'>";
                                                }
                                             @endphp
                                                   <div class="scroll-tbl">
                                                      <!-- Current -->
                                                      <h4 class="ml-2 Color0d5fe9">Current Signals</h4>
                                                      <table id="" class="SignalDataTable Border-Theme table table-striped table-bordered dt-responsive nowrap" style="width:100%">
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
                                                               @foreach($signalData as $data)
                                                                  @php
                                                                     $url = $data->GetURL();
                                                                     $agoTime = $data->GetAgoTime();
                                                                     $pair = $data->getPair();
                                                                     $flags = explode("/",$pair->pair);
                                                                     $signalExpired = $data->GetExpiredOrNot();
                                                                  @endphp
                                                                  @if($signalExpired == 1 && ($pair->categoryId == $categoryID || $pair->categoryId == $categoryIDD))
                                                                     <tr>
                                                                        <td>{{$icount++}}</td>
                                                                        <td class="text-center">
                                                                           <p class="mb-2">
                                                                              @if($pair->image == null)
                                                                                 @foreach($flags as $flag)
                                                                                    @php $flag4 = str_replace(' ', '', $flag) @endphp
                                                                                    <img src="{{URL::to('storage/app/signalFlag')}}/{{$flag4}}.jpg" width="50" height="35" alt=""> &nbsp;&nbsp;
                                                                                 @endforeach
                                                                              @else
                                                                                 <img src="{{URL::to('storage/app')}}/{{$pair->image}}" width="100" height="35"  alt="">
                                                                              @endif
                                                                           </p>
                                                                           <h6 class="m-0 font-weight-bold"><strong>{{$pair->pair}}</strong></h6>
                                                                           <h6 class="m-0 text-danger">{{$agoTime}}</h6>
                                                                        </td>
                                                                        <td>
                                                                           <a href="{{URL::to('signal')}}/{{$url}}" class="btn btn-success btn-sm buttonBlinking">Active</a>
                                                                        </td>
                                                                        <td><strong class="font-weight-bold">{{$data->selectUser}}</strong></td>
                                                                        <td>
                                                                        <span><strong class="mr-2"> {{date('d M Y', strtotime($data->date))}}</strong><strong> {{date('h:i A', strtotime($data->time))}} </strong></span>
                                                                        </td>
                                                                     </tr>
                                                                  @endif
                                                               @endforeach
                                                         </tbody>
                                                      </table>
                                                      <!-- Expired -->
                                                      <h4 class="ml-2 Colorff0024">Expired Signals</h4>
                                                      <table id="" class="SignalDataTable Border-Theme table table-striped table-bordered dt-responsive nowrap" style="width:100%">
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
                                                                  $url = $data->GetURL();
                                                                  $pair = $data->getPair();
                                                                  $flags = explode("/",$pair->pair);
                                                                  $signalExpired = $data->GetExpiredOrNot();
                                                               @endphp
                                                               @if($signalExpired == 0 && ($pair->categoryId == $categoryID || $pair->categoryId == $categoryIDD))
                                                                  <tr>
                                                                     <td>{{$icount++}}</td>
                                                                     <td>
                                                                        <p class="mb-2">
                                                                              @if($pair->image == null)
                                                                                 @foreach($flags as $flag)
                                                                                 @php $flag4 = str_replace(' ', '', $flag) @endphp
                                                                                 <img src="{{URL::to('storage/app/signalFlag')}}/{{$flag4}}.jpg" class="thumbnail" width="50" height="35" alt=""> &nbsp;&nbsp;
                                                                                 @endforeach
                                                                              @else
                                                                                 <img src="{{URL::to('storage/app')}}/{{$pair->image}}" width="100" height="35"  alt="">
                                                                              @endif
                                                                        </p>
                                                                        <h6 class="m-0 font-weight-bold"><strong>{{$pair->pair}}</strong></h6>
                                                                        <h6 class="m-0 text-danger">Expired</h6>
                                                                     </td>
                                                                     <td class="pl-0">
                                                                        <a href="{{URL::to('signal')}}/{{$url}}">View Signal</a>
                                                                     </td>
                                                                     <td><strong class="font-weight-bold">{{$data->selectUser}}</strong></td>
                                                                     <td class="text-center">
                                                                        <span class="{{strpos($data->result,'TP Hit') != null ? 'text-success' : ''}}{{$data->result == 'SL Hit' ? 'text-danger' : ''}}"><strong style="white-space: normal"> {{$data->result == null ? 'manually closed' : $data->result}}</strong></span>
                                                                     </td>
                                                                     <td class="text-center">
                                                                        <span class="m-0 {{strpos($data->pips,'+') != null ? 'text-success' : ''}}{{strpos($data->pips,'-') ? 'text-danger' : ''}}"><strong> {{$data->pips == null ? '0' : $data->pips}}</strong></span>
                                                                     </td>
                                                                  </tr>
                                                            @endif
                                                         @endforeach
                                                         </tbody>
                                                      </table>
                                                   </div>
                                                </div>
                                          @endfor
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           <!-- /.End of currency table -->
                        </div>
                        <div id="SignalResult" class="tab-pane fade">
                           <h4 class="ml-2 Color0d5fe9">Result</h4>
                           <form action="" class="pl-4">
                                 Start Date: <input type="date" name="startPoint">
                                 End Date: <input type="date" name="endPoint">
                                 <input  class="pre-header text-white border-0 px-3 p-1" type="submit" value="Submit">
                           </form><br>
                           <table id="" class="SignalDataTable Border-Theme table table-striped table-bordered dt-responsive nowrap" style="width:100%">
                              <thead>
                                 <tr class="back-Theme">
                                    <th>Start Date</th>
                                    <th>End Date</th>
                                    <th>Total Signal</th>
                                    <th>Tp Hit</th>
                                    <th>Sl Hit</th>
                                    <th>Manually Closed</th>
                                    <th>Pips Earned</th>
                                 </tr>
                              </thead>
                              <tbody>
                                 <tr>
                                    <td>{{$startPoint}}</td>
                                    <td>{{$endPoint}}</td>
                                    <td>{{$TotalSignalCount}}</td>
                                    <td>{{$TotalTpHit}}</td>
                                    <td>{{$TotalSlHit}}</td>
                                    <td>{{$TotalManuallyClosed}}</td>   
                                    <td><span class="{{$RemainingPips < 0 ? 'text-danger' : 'text-primary'}}">{{$RemainingPips}}</span></td>       
                                 </tr>
                              </tbody>
                           </table>
                        </div>
                     </div>
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
//Data Table
$('.SignalDataTable').DataTable({
    responsive: true
});
</script>
<script data-ad-client="ca-pub-4965167409528757" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>