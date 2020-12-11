@include ('inc/header')

    <!-- /.End of tricker -->
    <section class="after_banner_content_area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-3 col-md-6 col-sm-12 order-2 order-lg-1">
                    @include ('inc/home-left-sidebar')
                </div>
                <div class="col-lg-6 col-md-12 order-1 order-lg-2">
                    <div class="row">
                        @foreach($totalData as $data)
                            @php
                                $deposit = $data->GetAccountInfo();
                            @endphp
                            <div class="visibleoptions col-md-12 col-sm-12 col-xs-12 m-t-30 p-a-10">
                                <div class="row">
                                    <div class="col-md-2 col-sm-2 col-xs-12 text-align-center border-r-grey p-a-15">
                                        <div class="img text-center">
                                            <img src="{{URL::to('storage/app')}}/{{$data->image}}" class="img-fluid" />
                                        </div>
                                        <div class="link pt-3">
                                            <a href="#" class="text-danger">Exness Review</a>
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
                                    <div class="col-md-3 col-sm-3 col-xs-12 text-align-center">
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
                                            <a href="#" class="text-danger">Visit Broker
                                                
                                            </a>
                                            
                                        </div>
                                        <span class="f-10">Your capital is at risk

                                                </span>
                                        </div>
                                        
                                    </div>
                                </div>
                            
                            </div>
                        @endforeach
                    
                    </div>



                </div>
                <div class="col-lg-3 col-md-6 col-sm-12 order-3 order-lg-3">
                    @include ('inc/home-right-sidebar')
                </div>
            </div>
        </div>
    </section>

@include ('inc/footer')