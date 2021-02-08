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

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="news_us">
                                        <div class="content_area_heading large-heading text-center">

                                            <h1 class="heading_title wow animated fadeInUp">
                                                {{$data->title}}
                                            </h1>
                                            <div class="heading_border wow animated fadeInUp">
                                                <span class="one"></span><span class="two"></span><span class="three"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    @php
                                        $description = html_entity_decode($data->description);
                                        echo $description;
                                    @endphp
                                </div>
                            </div>
                        </div>
                                
                        <div class="col-lg-3 col-md-6 col-sm-12 order-3 order-lg-3">
                            @include('inc.home-right-sidebar')

                        </div>
                    </div>
                </div>
            </section>
        </div>

@include('inc.footer')