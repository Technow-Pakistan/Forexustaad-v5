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
                    <div class="family">
                                        <div>
                                            <h4>{{$analysis->title}}</h4>
                                        </div>
                                        <div class="pt-3">
                                            @php 
                                                $Description = html_entity_decode($analysis->description);
                                                echo $Description;
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

<!--     <div id="particles-js" style="height: 0;"></div> -->
</div>
<style>
    .borderRadius80{
        border-radius: 80px;
    }
</style>

@include('inc.footer')
