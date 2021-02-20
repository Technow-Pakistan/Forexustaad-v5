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
                     <div class="scroll-tbl">
                        <h4 class="ml-2 Color0d5fe9">Current Signals</h4>
                        <table id="free-signals-list" class="table table-striped">
                           <thead>
                              <tr class="text-center">
                                 <th>Symbols/Pairs</th>
                                 <th>Status</th>
                                 <th>Users</th>
                                 <th>Valid Till</th>
                                 <th>Signal</th>
                                 <th>&nbsp;</th>
                              </tr>
                           </thead>
                           <tbody>
                              @foreach($signalData as $data)
                                       @php
                                          $url = $data->id;
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
                                    @if($go3 == 3)
                                       <tr class="text-center">
                                          <td>
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
                                             <button class="btn btn-success btn-sm buttonBlinking">Active</button>
                                          </td>
                                          <td><strong class="font-weight-bold">{{$data->selectUser}}</strong></td>
                                          <td class="text-center d-initial-flex">
                                             <p class="m-0 pr-2"><strong> {{$date}}</strong></p>
                                             <p class="m-0"><strong> {{$time}} </strong></p>
                                          </td>
                                          <td colspan="2" class="pl-0">
                                             @if($go == 0)
                                                @if($data->selectUser == "Register User" && !Session::has('client'))
                                                   <a href="#!"  class="LoginButton" data-toggle="modal" data-target="#requestQuoteModal">View Signal</a>
                                                @elseif($data->selectUser == "Premium User")
                                                   @if(!Session::has('client'))
                                                      <a href="#!"  class="LoginButton" data-toggle="modal" data-target="#requestQuoteModal">View Signal</a>
                                                   @elseif(isset($loginClientData->memberType))
                                                      @if($loginClientData->memberType == 1)
                                                         <a href="#!" onclick="snackbar1()">View Signal</a>
                                                      @else
                                                         <a href="{{URL::to('signal')}}/{{$url}}">View Signal</a>
                                                      @endif
                                                   @endif
                                                @else
                                                   <a href="{{URL::to('signal')}}/{{$url}}">View Signal</a>
                                                @endif
                                             @endif
                                          </td>
                                       </tr>
                                    @endif
                              @endforeach
                           </tbody>
                        </table>
                     </div>
                     <div class="scroll-tbl">
                        <h4 class="ml-2 Colorff0024">Expired Signals</h4>
                        <table id="free-signals-list" class="table table-striped">
                           <thead>
                              <tr class="text-center">
                                 <th>Symbols/Pairs</th>
                                 <th>Status</th>
                                 <th>Users</th>
                                 <th>Result</th>
                                 <th>Pips</th>
                                 <th>Signal</th>
                                 <th>&nbsp;</th>
                              </tr>
                           </thead>
                           <tbody>
                              @foreach($signalData as $data)
                                       @php
                                          $url = $data->id;
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
                                    @if($go3 != 3)
                                 <tr class="text-center">
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
                                    <td>
                                       <button class="btn btn-secondary btn-sm">Expired</button>
                                    </td>
                                    <td><strong class="font-weight-bold">{{$data->selectUser}}</strong></td>
                                    <td class="text-center">
                                       <p class="m-0 {{$data->result == 'TP Hit' ? 'text-success' : ''}}{{$data->result == 'SL Hit' ? 'text-danger' : ''}}"><strong> {{$data->result == null ? 'none' : $data->result}}</strong></p>
                                    </td>
                                    <td class="text-center">
                                       @if($data->pips != null)
                                       <p class="m-0 {{str_contains($data->pips,'+') != null ? 'text-success' : ''}}{{str_contains($data->pips,'-') ? 'text-danger' : ''}}"><strong> {{$data->pips == null ? 'none' : $data->pips}}</strong></p>
                                       @endif
                                    </td>
                                    <td colspan="2" class="pl-0">
                                       <a href="{{URL::to('signal')}}/{{$url}}">View Signal</a>
                                    </td>
                                 </tr>
                                 @endif
                              @endforeach
                           </tbody>
                        </table>
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
   .Color0d5fe9{
      color: #0d5fe9;
   }
   .Colorff0024{
      color:#ff0024;
   }
</style>
