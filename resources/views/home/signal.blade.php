@include('inc.header')
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
            <div class="col-lg-3 col-md-6 col-sm-12 order-2 order-lg-1">
               @include('inc.home-left-sidebar')
            </div>
            <div class="col-lg-6 col-md-12 order-1 order-lg-2">
               <section class="">
                  <div class="">
                     <div class="content_area_heading large-heading text-center">
                        <h1 class="heading_title wow animated fadeInUp">
                           Free Signals
                        </h1>
                        <div class="heading_border wow animated fadeInUp">
                           <span class="one"></span><span class="two"></span><span class="three"></span>
                        </div>
                     </div>
                     <div class="scroll-tbl">
                        <table id="free-signals-list" class="table table-striped">
                           <thead>
                              <tr class="text-center">
                                 <th>Symbols/Pairs</th>
                                 <th>Status</th>
                                 <th>Price</th>
                                 <th>Stop Lose</th>
                                 <th>Take Profit</th>
                                 <th>Valid Till</th>
                                 <th>Signal</th>
                                 <th>&nbsp;</th>
                              </tr>
                           </thead>
                           <tbody>
                              @foreach($signalData as $data)
                                       @php
	                                       $loginClientData = Session::get('client');
                                          $go = 1;
                                          $profits = explode('@',$data->takeProfit);
                                          $time1 = strtotime($data->time);
                                          $time = date('h:i A', $time1);
                                          $date1 = strtotime($data->date);
                                          $date = date('d M Y', $date1);
                                          if($data->date == date("Y-m-d")){
                                             if($data->time >= date("H:i:s")){
                                                $go = 0;
                                             }
                                          }
                                          if($data->date > date("Y-m-d")){
                                             $go = 0;
                                          }
                                          $timeDate1 = strtotime(date("Y-m-d H:i:s"));
                                          $timeDate2 = strtotime($data->created_at->format("Y-m-d H:i:s"));
                                          $minsDate = ($timeDate1 - $timeDate2) / 60;
                                       @endphp
                                 <tr class="text-center">
                                    <td>
                                       <p class="mb-2"><span class="flag-icon flag-icon-ad">&nbsp;</span>
                                          <span class="flag-icon flag-icon-us">&nbsp;</span>
                                       </p>
                                       <h6 class="m-0 font-weight-bold"><strong>{{$data->forexPairs}}</strong></h6>
                                       @if($go == 0)
                                          <h6 class="m-0 text-danger">{{intval($minsDate)}} min ago</h6>
                                       @else
                                          <h6 class="m-0 text-danger">Expired</h6>
                                       @endif
                                    </td>
                                    <td>
                                       @if($go == 0)
                                          <button class="btn btn-success btn-sm buttonBlinking">Active</button>
                                       @else
                                          <button class="btn btn-secondary btn-sm">N/A</button>
                                       @endif
                                    </td>
                                    <td>
                                       @if($data->selectUser == "Register User" && !Session::has('client'))
                                          <strong class="font-weight-bold">Registered Users</strong>
                                       @elseif($data->selectUser == "Premium User")
                                          @if(!Session::has('client'))
                                             <strong class="font-weight-bold">Premium Only</strong>
                                          @elseif(isset($loginClientData->memberType) && $loginClientData->memberType == 1)
                                             <strong class="font-weight-bold">Premium Only</strong>
                                          @else
                                             {{$data->price}}
                                          @endif
                                       @else
                                          {{$data->price}}
                                       @endif
                                    </td>
                                    <td class="text-danger">
                                       @if($data->selectUser == "Register User" && !Session::has('client'))
                                          N/A
                                       @elseif($data->selectUser == "Premium User")
                                          @if(!Session::has('client'))
                                             N/A
                                          @elseif(isset($loginClientData->memberType) && $loginClientData->memberType == 1)
                                             N/A
                                          @else
                                             @if($data->price == null)
                                                {{$data->stopLose}}
                                             @else
                                                N/A
                                             @endif
                                          @endif
                                       @else
                                             @if($data->price == null)
                                                {{$data->stopLose}}
                                             @else
                                                N/A
                                             @endif
                                       @endif
                                    </td>
                                    <td class="text-success">
                                       @if($data->selectUser == "Register User" && !Session::has('client'))
                                          N/A
                                       @elseif($data->selectUser == "Premium User")
                                          @if(!Session::has('client'))
                                             N/A
                                          @elseif(isset($loginClientData->memberType) && $loginClientData->memberType == 1)
                                             N/A
                                          @else
                                             @if($data->price == null)
                                                {{$profits[0]}}
                                             @else
                                                N/A
                                             @endif
                                          @endif
                                       @else
                                             @if($data->price == null)
                                                {{$profits[0]}}
                                             @else
                                                N/A
                                             @endif
                                       @endif
                                    </td>
                                    <td class="text-center d-initial-flex">
                                       <p class="m-0"><strong> {{$date}} <br></strong></p>
                                       <p class="m-0"><strong> {{$time}} </strong></p>
                                    </td>
                                    <td colspan="2" class="pl-0">
                                       @if($go == 0)
                                          @if($data->selectUser == "Register User" && !Session::has('client'))
                                             <button class="btn btn-secondary bg-dark btn-sm text-white buttonBlinking">Sign in</button>
                                          @elseif($data->selectUser == "Premium User")
                                             @if(!Session::has('client'))
                                                <button class="btn btn-secondary bg-dark btn-sm text-white buttonBlinking">Sign in</button>
                                             @elseif(isset($loginClientData->memberType) && $loginClientData->memberType == 1)
                                                <button class="btn btn-secondary bg-dark btn-sm text-white buttonBlinking">Sign in</button>
                                             @else
                                                <button class="btn {{strpos($data->buySale, 'Buy') !== false ? 'btn-warning' : 'btn-danger' }} btn-sm text-white buttonBlinking">{{$data->buySale}}</button>
                                             @endif
                                          @else
                                             <button class="btn {{strpos($data->buySale, 'Buy') !== false ? 'btn-warning' : 'btn-danger' }} btn-sm text-white buttonBlinking">{{$data->buySale}}</button>
                                          @endif
                                       @else
                                          <button class="btn btn-secondary btn-sm">N/A</button>
                                       @endif
                                             @if($data->comments != null && $go == 0)
                                                <!-- <i class="fa fa-comment-o fa-lg "></i> -->
                                             @endif
                                    </td>
                                 </tr>
                                 @if($data->comments != null && $go == 0)
                                    <tr class="text-center d-initial-flex" style="display:none">
                                       <td colspan="8">
                                          {{$data->comments}}
                                       </td>
                                    </tr>
                                 @endif
                              @endforeach
                              <!-- <tr class="text-center">
                                 <td>
                                    <p class="mb-2"><span class="flag-icon flag-icon-ad">&nbsp;</span>
                                       <span class="flag-icon flag-icon-us">&nbsp;</span>
                                    </p>
                                    <h6 class="m-0 font-weight-bold"><strong>EUR/USD</strong></h6>
                                    <h6 class="m-0 text-danger">59 min ago</h6>
                                 </td>
                                 <td><button class="btn btn-success btn-sm">Active</button></td>
                                 <td>$18.90</td>
                                 <td class="text-danger">1.90934</td>
                                 <td class="text-success">1.90934</td>
                                 <td class="text-center d-initial-flex">
                                    <p class="m-0"><strong>5 Dec 2020</strong></p>
                                    <p class="m-0"><strong>18:30 PM</strong></p>
                                 </td>
                                 <td><button class="btn btn-warning btn-sm text-white">Buy</button></td>
                                 <td>&nbsp;</td>
                              </tr>
                              <tr class="text-center">
                                 <td>
                                    <p class="mb-2"><span class="flag-icon flag-icon-ad">&nbsp;</span>
                                       <span class="flag-icon flag-icon-us">&nbsp;</span>
                                    </p>
                                    <h6 class="m-0 font-weight-bold"><strong>EUR/USD</strong></h6>
                                    <h6 class="m-0 text-danger">59 min ago</h6>
                                 </td>
                                 <td><button class="btn btn-secondary btn-sm">N/A</button></td>
                                 <td><strong class="font-weight-bold">Premium Only</strong></td>
                                 <td class="text-danger">N/A</td>
                                 <td class="text-success">N/A</td>
                                 <td class="text-center d-initial-flex">
                                    <p class="m-0"><strong>5 Dec 2020</strong></p>
                                    <p class="m-0"><strong>18:30 PM</strong></p>
                                 </td>
                                 <td><button class="btn btn-secondary bg-dark btn-sm text-white">Register</button>
                                 </td>
                                 <td><i class="fa fa-comment-o fa-lg"></i></td>
                              </tr>
                              <tr class="text-center">
                                 <td>
                                    <p class="mb-2"><span class="flag-icon flag-icon-ad">&nbsp;</span>
                                       <span class="flag-icon flag-icon-us">&nbsp;</span>
                                    </p>
                                    <h6 class="m-0 font-weight-bold"><strong>EUR/USD</strong></h6>
                                    <h6 class="m-0 text-danger">58  min ago</h6>
                                 </td>
                                 <td><button class="btn btn-success btn-sm">Active</button></td>
                                 <td>$18.90</td>
                                 <td class="text-danger">1.90934</td>
                                 <td class="text-success">1.90934</td>
                                 <td class="text-center d-initial-flex">
                                    <p class="m-0"><strong>5 Dec 2020</strong></p>
                                    <p class="m-0"><strong>18:30 PM</strong></p>
                                 </td>
                                 <td><button class="btn btn-danger btn-sm text-white">Sell</button></td>
                                 <td>&nbsp;</td>
                              </tr>
                              <tr class="text-center">
                                 <td>
                                    <p class="mb-2"><span class="flag-icon flag-icon-ad">&nbsp;</span>
                                       <span class="flag-icon flag-icon-us">&nbsp;</span>
                                    </p>
                                    <h6 class="m-0 font-weight-bold"><strong>EUR/USD</strong></h6>
                                    <h6 class="m-0 text-danger">59 min ago</h6>
                                 </td>
                                 <td><button class="btn btn-secondary btn-sm">Pending</button></td>
                                 <td><strong class="font-weight-bold">Registered Users</strong></td>
                                 <td class="text-danger">1.90934</td>
                                 <td class="text-success">1.90934</td>
                                 <td class="text-center d-initial-flex">
                                    <p class="m-0"><strong>5 Dec 2020</strong></p>
                                    <p class="m-0"><strong>18:30 PM</strong></p>
                                 </td>
                                 <td><button class="btn btn-secondary bg-dark btn-sm text-white">Sign in</button></td>
                                 <td>&nbsp;</td>
                              </tr> -->
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
