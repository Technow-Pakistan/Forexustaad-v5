@include ('inc/header')
    <!-- /.End of tricker -->
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
                    @include ('inc/home-left-sidebar')
                </div>
                <div class="col-lg-6 col-md-12 order-1 order-lg-2">
                    <div class="row">
                  		<div class="col-sm-12">
                    		<div class="news_us">
                        		<div class="content_area_heading large-heading text-center">

                            		<h1 class="heading_title wow animated fadeInUp">
                               			Our Brokers
                            		</h1>
                            		<div class="heading_border wow animated fadeInUp">
                                		<span class="one"></span><span class="two"></span><span class="three"></span>
                            		</div>
                        		</div>
                    		</div>
                        </div>
                    <div class="col-md-12">
                        <div class="card-body">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                @php $i=0 @endphp
                                @foreach($totalBrokerCategories as $category)
                                    <li class="nav-item">
                                        <a class="nav-link {{$i == 0 ? 'active' : ''}}" id="{{$category->category}}-tab" data-toggle="tab" href="#{{$category->category}}" role="tab" aria-controls="{{$category->category}}" aria-selected="true">{{$category->category}}</a>
                                    </li>
                                    @php $i++ @endphp
                                @endforeach
                            </ul>
                            <div class="tab-content" id="myTabContent">
                                @php $i=0 @endphp
                                @foreach($totalBrokerCategories as $category)
                                    <div class="tab-pane fade show {{$i == 0 ? 'active' : ''}}" id="{{$category->category}}" role="tabpanel" aria-labelledby="{{$category->category}}-tab">
                                        
                                        @foreach($totalData as $data)
                                            @php
                                                $deposit = $data->GetAccountInfo();
                                                $title = str_replace(" ","-",$data->title);

                                                $paymentDate = date('Y-m-d');
                                                $paymentDate=date('Y-m-d', strtotime($paymentDate));
                                                //echo $paymentDate; // echos today! 
                                                $contractDateBegin = date('Y-m-d', strtotime($data->start));
                                                $contractDateEnd = date('Y-m-d', strtotime($data->end));
                                            @endphp
                                            @if((($paymentDate >= $contractDateBegin) && ($paymentDate <= $contractDateEnd)) || $data->neverEnd == 1)
                                                @if($data->categoryId == $category->id)
                                                <div class="visibleoptions col-md-12 col-sm-12 col-xs-12 m-t-30 p-a-10">
                                                    <div class="row">
                                                        <div class="col-md-2 col-sm-2 col-xs-12 text-align-center border-r-grey p-a-15">
                                                            <div class="img text-center">
                                                                <img src="{{URL::to('storage/app')}}/{{$data->image}}" class="img-fluid" />
                                                            </div>
                                                            <div class="link pt-3">
                                                                <a href="{{URL::to('/brokerList/brokerReview')}}/{{$title}}" class="text-danger">{{$data->title}} Review</a>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-5 col-sm-6 col-xs-12 text-align-c768">
                                                            <div class="form-group d-flex">
                                                                <span>
                                                                    <label for="" class="f-14">Regulated By:</label>
                                                                </span>
                                                                <span>
                                                                    <label for="" class="pl-12">{{$data->regulations}}</label>
                                                                </span>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="" class="f-14">Foundation Year:</label>
                                                                <span>
                                                                    <label for="" class="pl-12">{{$data->foundation}}</label>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3 col-sm-3 col-xs-12 text-align-center border-r-grey">
                                                            <div class="form-group">
                                                                <label for="" class="f-14">Headquarters:</label>
                                                                <span>
                                                                    <label for="" class="pl-12">{{$data->headquaters}}</label>
                                                                </span>
                                                            </div>
                                                            <div class="form-group">
                                                                <label for="" class="f-14">Min Deposit:</label>
                                                                <span>
                                                                    <label for="" class="pl-12">{{$deposit->min}}</label>
                                                                </span>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2 col-sm-2 col-xs-12 text-align-center p-a-15">
                                                            <div class="form-group">
                                                            <div class="link pt-3">
                                                                <a href="{{URL::to('/brokerList/brokerDetail')}}/{{$title}}" class="text-danger">Visit {{$data->title}}

                                                                </a>

                                                            </div>
                                                            <span class="f-10">Your capital is at risk

                                                                    </span>
                                                            </div>

                                                        </div>
                                                        <div class="col-lg-12 col-sm-12 col-12 col-xl-12">
                                                            <div class="link">
                                                                <a href="{{URL::to('/brokerList/brokerNews')}}/{{$title}}"  class="text-danger mr-3">{{$data->title}} News</a>
                                                                <a href="{{URL::to('brokerList/brokerPromotion')}}/{{$title}}"  class="text-danger mr-3">{{$data->title}} Promotions</a>
                                                                <a href="#"  class="text-danger">{{$data->title}} Training</a>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                @endif
                                            @endif
                                        @endforeach
                                    </div>
                                    @php $i++ @endphp
                                @endforeach
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 order-3 order-lg-3">
                    @include ('inc/home-right-sidebar')
                </div>
            </div>
        </div>
    </section>
</div>

@include ('inc/footer')
