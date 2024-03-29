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
                    <div class="family">
                        <div>
                            <h4>{{$brokerReview->ReviewTitle}}</h4>
                        </div>

                        <div class="pt-3">
                            @php
                                $Description = html_entity_decode($brokerReview->description);
                                echo $Description;
                            @endphp
                        </div>
                    </div>
                    @include('comments.comment',['commentObjectId'=>$brokerReview->id,'commentPage'=>12])
                </div>

                <div class="col-lg-3 col-md-6 col-sm-12 order-3 order-lg-3">
                @include('inc.home-right-sidebar')

                </div>
            </div>
        </div>
    </section>

</div>

@include('inc.footer')
@include('comments.css_js',['commentObjectId'=>$brokerReview->id,'commentPage'=>12])
