
@php
$value =Session::get('admin');
$icount = 0;
@endphp
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
                                <h5 class="m-b-10">Signals</h5>
                            </div>
                            <div class="d-flex justify-content-between">
                                <ul class="breadcrumb p-0 m-0 bg-white">
                                    <li class="breadcrumb-item">
                                        <a href="{{URL::to('/ustaad/dashboard')}}"><i class="fa fa-home"></i></a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#!">All Signals</a></li>
                                </ul>
                                <div>
                                    <a href="{{URL::to('ustaad/signals/add')}}"> Add New Signal</a>
                                    @if($value['memberId'] != 7)
                                         / <a href="{{URL::to('ustaad/signals/addPair')}}">Add Category & Pair </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ breadcrumb ] end -->
            <!-- [ Main Content ] start -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="card user-profile-list">
                        <div class="card-body">
                            <div class="dt-responsive table-responsive">
                                <h1 class="text-primary">Current Signal</h1>
                                <table id="user-list-table" class="table table-striped table-bordered dt-responsive nowrap">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>User</th>
                                            <th>Forex Pairs</th>
                                            @if($value['memberId'] != 7)
                                                <th>Admin User</th>
                                                <th>Comments</th>
                                            @endif
                                            <th>Date</th>
                                            <th>Time</th>
                                            <th>Rating</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($signalData as $data)
                                            @php
                                                $icount++;
                                                $pair = $data->getPair();
                                            @endphp
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
                                            @if($go3 == 3)
                                                <tr>
                                                    <td>{{$icount}}</td>
                                                    <td>{{$data->selectUser}}</td>
                                                    <td>{{ isset($pair->pair) ? $pair->pair : $data->forexPairs}}</td>
                                                    @if($value['memberId'] != 7)
                                                        @php
                                                            $adminUser = $data->GetMember();
                                                        @endphp
                                                        <td>{{$adminUser == null ? 'admin' : $adminUser->username}}</td>
                                                        <td><a href="{{URL::to('/ustaad/signals/comment')}}/{{$data->id}}">View Comments</a></td>
                                                    @endif
                                                    <td>{{$data->date}}</td>
                                                    <td>
                                                        @php
                                                            $date = strtotime($data->time);
                                                            echo date('h:i a', $date);
                                                        @endphp
                                                    </td>
                                                    <td>
                                                        @php $SignalRatingPoints = $data->GetRatingPoints(); @endphp
                                                        <fieldset class="rating1">
                                                            <input type="radio" name="rating1" value="5" {{ $SignalRatingPoints == 5 ? 'checked' : '' }}/><i class="fa fa-star full" for="star5" title="Awesome - 5 stars"></i>
                                                            <input type="radio" name="rating1" value="4.5"  {{ $SignalRatingPoints == 4.5 ? 'checked' : '' }}/><i class="fa fa-star half" for="star4half" title="Pretty good - 4.5 stars"></i>
                                                            <input type="radio" name="rating1" value="4"  {{ $SignalRatingPoints == 4 ? 'checked' : '' }}/><i class = "fa fa-star full" for="star4" title="Pretty good - 4 stars"></i>
                                                            <input type="radio" name="rating1" value="3.5"  {{ $SignalRatingPoints == 3.5 ? 'checked' : '' }}/><i class="fa fa-star half" for="star3half" title="Meh - 3.5 stars"></i>
                                                            <input type="radio" name="rating1" value="3"  {{ $SignalRatingPoints == 3 ? 'checked' : '' }}/><i class = "fa fa-star full" for="star3" title="Meh - 3 stars"></i>
                                                            <input type="radio" name="rating1" value="2.5"  {{ $SignalRatingPoints == 2.5 ? 'checked' : '' }}/><i class="fa fa-star half" for="star2half" title="Kinda bad - 2.5 stars"></i>
                                                            <input type="radio" name="rating1" value="2"  {{ $SignalRatingPoints == 2 ? 'checked' : '' }}/><i class = "fa fa-star full" for="star2" title="Kinda bad - 2 stars"></i>
                                                            <input type="radio" name="rating1" value="1.5"  {{ $SignalRatingPoints == 1.5 ? 'checked' : '' }}/><i class="fa fa-star half" for="star1half" title="Meh - 1.5 stars"></i>
                                                            <input type="radio" name="rating1" value="1"  {{ $SignalRatingPoints == 1 ? 'checked' : '' }}/><i class = "fa fa-star full" for="star1" title="Sucks big time - 1 star"></i>
                                                            <input type="radio" name="rating1" value="0.5"  {{ $SignalRatingPoints == 0.5 ? 'checked' : '' }}/><i class="fa fa-star half" for="starhalf" title="Sucks big time - 0.5 stars"></i>
                                                        </fieldset>
                                                    </td>
                                                    <td>
                                                        @if($data->pending == 1)
                                                            <span class="badge badge-light-warning">Pending</span>
                                                        @else
                                                            <span class="badge {{$data->status == 0 ? 'badge-light-success' : 'badge-light-danger'}}">{{$data->status == 0 ? 'Active' : 'Deactive'}}</span>
                                                        @endif
                                                        @if($data->pending == 1 && $value['memberId'] != 7)
                                                            <div class="overlay-edit">
                                                                <form action="{{URL::to('ustaad/signals/allow')}}/{{$data->id}}" method="post">
                                                                    <span class="badge badge-light-warning">
                                                                        Allow
                                                                        <input type="checkbox" class="AllowBroker" name="pending" id="" value="0">
                                                                    </span>
                                                                </form>
                                                                <a href="{{URL::to('/ustaad/signals/edit')}}/{{$data->id}}">
                                                                    <button type="button" class="btn btn-icon btn-success" style="width: 20px;height: 20px;padding: 12px;"><i class="fa fa-edit" style="font-size: 12px;"></i></button>
                                                                </a>
                                                                @if($data->status == 0)
                                                                    <button type="button" href="{{URL::to('/ustaad/signals/delete')}}/{{$data->id}}" class="btn btn-icon btn-danger addAction" data-toggle="modal" data-target="#myModal"style="width: 20px;height: 20px;padding: 12px;"><i class="fa fa-lock" style="font-size: 12px;"></i></button>
                                                                @elseif($data->status == 1)
                                                                    <button type="button" href="{{URL::to('/ustaad/signals/active')}}/{{$data->id}}" class="btn btn-icon btn-success addAction" data-toggle="modal" data-target="#myModal"style="width: 20px;height: 20px;padding: 12px;"><i class="fa fa-unlock" style="font-size: 12px;"></i></button>
                                                                @endif
                                                            </div>
                                                        @else
                                                            <div class="overlay-edit">
                                                                @if($value['memberId'] == 1)
                                                                    <form action="{{URL::to('ustaad/signals')}}/{{$data->star == 0 ? 'star' : 'unstar'}}/{{$data->id}}" method="post">
                                                                        <span>
                                                                            <input type="checkbox" class="AllowBroker hiddenCheckBox" name="pending" id="option{{$data->id}}" value="0">
                                                                            <label for="option{{$data->id}}" class="mt-2 mr-2"><i class="fa fa-star {{$data->star == 1 ? 'yellowStar' : ''}}"></i></label>
                                                                        </span>
                                                                    </form>
                                                                @endif
                                                                <a href="{{URL::to('/ustaad/signals/edit')}}/{{$data->id}}">
                                                                    <button type="button" class="btn btn-icon btn-success"><i class="fa fa-edit"></i></button>
                                                                </a>
                                                                @if($data->status == 0)
                                                                    <button type="button" href="{{URL::to('/ustaad/signals/delete')}}/{{$data->id}}" class="btn btn-icon btn-danger addAction" data-toggle="modal" data-target="#myModal"><i class="fa fa-lock"></i></button>
                                                                @elseif($data->status == 1)
                                                                    <button type="button" href="{{URL::to('/ustaad/signals/active')}}/{{$data->id}}" class="btn btn-icon btn-success addAction" data-toggle="modal" data-target="#myModal"><i class="fa fa-unlock"></i></button>
                                                                @endif
                                                            </div>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>User</th>
                                            <th>Forex Pairs</th>
                                            @if($value['memberId'] != 7)
                                                <th>Admin User</th>
                                                <th>Comments</th>
                                            @endif
                                            <th>Date</th>
                                            <th>Time</th>
                                            <th>Rating</th>
                                            <th>Status</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="card user-profile-list">
                        <div class="card-body">
                            <div class="dt-responsive table-responsive">
                                <h1 class="text-danger">Expired Signal</h1>
                                <table id="user-list-table1" class="table table-striped table-bordered dt-responsive nowrap">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>User</th>
                                            <th>Forex Pairs</th>
                                            @if($value['memberId'] != 7)
                                                <th>Admin User</th>
                                                <th>Comments</th>
                                            @endif
                                            <th>Result</th>
                                            <th>Rating</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($signalData as $data)
                                            @php
                                                $signalDataApi = $data->GetSignalApiData();
                                                $icount++;
                                                $pair = $data->getPair();
                                            @endphp
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
                                                <tr>
                                                    <td>{{$icount}}</td>
                                                    <td>{{$data->selectUser}}</td>
                                                    <td>{{ isset($pair->pair) ? $pair->pair : $data->forexPairs}}</td>
                                                    @if($value['memberId'] != 7)
                                                        @php
                                                            $adminUser = $data->GetMember();
                                                        @endphp
                                                        <td>{{$adminUser == null ? 'admin' : $adminUser->username}}</td>
                                                        <td><a href="{{URL::to('/ustaad/signals/comment')}}/{{$data->id}}">View Comments</a></td>
                                                    @endif
                                                    <td>
                                                        @if($data->result != null)
                                                            <span class="badge {{strpos($data->result,'TP Hit') != null ? 'badge-light-success' : ''}}{{$data->result == 'SL Hit' ? 'badge-light-danger' : ''}}"><strong style="white-space: normal"> {{$data->result == null ? 'manually closed' : $data->result}}</strong></span>
                                                        @elseif($signalDataApi)
                                                            <span class="badge {{strpos($signalDataApi->result,'TP Hit') != null ? 'badge-light-success' : ''}}{{$signalDataApi->result == 'SL Hit' ? 'badge-light-danger' : ''}}"><strong> {{$signalDataApi->result == null ? 'manually closed' : $signalDataApi->result}}</strong></span>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @php $SignalRatingPoints = $data->GetRatingPoints(); @endphp
                                                        <fieldset class="rating1">
                                                            <input type="radio" name="rating1" value="5" {{ $SignalRatingPoints == 5 ? 'checked' : '' }}/><i class="fa fa-star full" for="star5" title="Awesome - 5 stars"></i>
                                                            <input type="radio" name="rating1" value="4.5"  {{ $SignalRatingPoints == 4.5 ? 'checked' : '' }}/><i class="fa fa-star half" for="star4half" title="Pretty good - 4.5 stars"></i>
                                                            <input type="radio" name="rating1" value="4"  {{ $SignalRatingPoints == 4 ? 'checked' : '' }}/><i class = "fa fa-star full" for="star4" title="Pretty good - 4 stars"></i>
                                                            <input type="radio" name="rating1" value="3.5"  {{ $SignalRatingPoints == 3.5 ? 'checked' : '' }}/><i class="fa fa-star half" for="star3half" title="Meh - 3.5 stars"></i>
                                                            <input type="radio" name="rating1" value="3"  {{ $SignalRatingPoints == 3 ? 'checked' : '' }}/><i class = "fa fa-star full" for="star3" title="Meh - 3 stars"></i>
                                                            <input type="radio" name="rating1" value="2.5"  {{ $SignalRatingPoints == 2.5 ? 'checked' : '' }}/><i class="fa fa-star half" for="star2half" title="Kinda bad - 2.5 stars"></i>
                                                            <input type="radio" name="rating1" value="2"  {{ $SignalRatingPoints == 2 ? 'checked' : '' }}/><i class = "fa fa-star full" for="star2" title="Kinda bad - 2 stars"></i>
                                                            <input type="radio" name="rating1" value="1.5"  {{ $SignalRatingPoints == 1.5 ? 'checked' : '' }}/><i class="fa fa-star half" for="star1half" title="Meh - 1.5 stars"></i>
                                                            <input type="radio" name="rating1" value="1"  {{ $SignalRatingPoints == 1 ? 'checked' : '' }}/><i class = "fa fa-star full" for="star1" title="Sucks big time - 1 star"></i>
                                                            <input type="radio" name="rating1" value="0.5"  {{ $SignalRatingPoints == 0.5 ? 'checked' : '' }}/><i class="fa fa-star half" for="starhalf" title="Sucks big time - 0.5 stars"></i>
                                                        </fieldset>
                                                    </td>
                                                    <td>
                                                        <span class="badge {{$data->status == 0 ? 'badge-light-success' : 'badge-light-danger'}}">{{$data->status == 0 ? 'Active' : 'Deactive'}}</span>
                                                        <div class="overlay-edit">
                                                            @if($value['memberId'] == 1)
                                                                <form action="{{URL::to('ustaad/signals')}}/{{$data->star == 0 ? 'star' : 'unstar'}}/{{$data->id}}" method="post">
                                                                    <span>
                                                                        <input type="checkbox" class="AllowBroker hiddenCheckBox" name="pending" id="option{{$data->id}}" value="0">
                                                                        <label for="option{{$data->id}}" class="mt-2 mr-2"><i class="fa fa-star {{$data->star == 1 ? 'yellowStar' : ''}}"></i></label>
                                                                    </span>
                                                                </form>
                                                            @endif
                                                            <a href="{{URL::to('/ustaad/signals/edit')}}/{{$data->id}}">
                                                                <button type="button" class="btn btn-icon btn-success"><i class="fa fa-edit"></i></button>
                                                            </a>
                                                            @if($data->status == 0)
                                                                <button type="button" href="{{URL::to('/ustaad/signals/delete')}}/{{$data->id}}" class="btn btn-icon btn-danger addAction" data-toggle="modal" data-target="#myModal"><i class="fa fa-lock"></i></button>
                                                            @elseif($data->status == 1)
                                                                <button type="button" href="{{URL::to('/ustaad/signals/active')}}/{{$data->id}}" class="btn btn-icon btn-success addAction" data-toggle="modal" data-target="#myModal"><i class="fa fa-unlock"></i></button>
                                                            @endif
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>User</th>
                                            <th>Forex Pairs</th>
                                            @if($value['memberId'] != 7)
                                                <th>Admin User</th>
                                                <th>Comments</th>
                                            @endif
                                            <th>Result</th>
                                            <th>Rating</th>
                                            <th>Status</th>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- [ Main Content ] end -->
        </div>
    </section>
    <!-- [ Main Content ] end -->
<style>
    
  /* Star Rating style start */
  .rating,.rating1 { 
      float:left;
      border: none;
      position:relative;
    }

    .rating > input,.rating1 > input { display: none; } 
    .rating > i:before,.rating1 > i:before { 
      margin: 5px;
      font-size: 1.25em;
    }

    .rating > .half:before,.rating1 > .half:before { 
      content: "\f089";
      position: absolute;
      top: -5px;
    }

    .rating > i,.rating1 > i { 
      color: #ddd; 
      float: right; 
    }

    /***** CSS Magic to Highlight Stars on Hover *****/

    .rating1 > input:checked ~ i, /* show gold star when clicked */
    .rating > input:checked ~ i, /* show gold star when clicked */
    .rating:not(:checked) > i:hover, /* hover current star */
    .rating:not(:checked) > i:hover ~ i { color: #FFD700;  } /* hover previous stars in list */

    .rating > input:checked + i:hover, /* hover current star when changing rating */
    .rating > input:checked ~ i:hover,
    .rating > i:hover ~ input:checked ~ i, /* lighten current selection */
    .rating > input:checked ~ i:hover ~ i { color: #FFED85;  } 
  /* Star Rating style end */
</style>
@include('admin.include.footer')
<script>
$('#user-list-table1').DataTable();
</script>
