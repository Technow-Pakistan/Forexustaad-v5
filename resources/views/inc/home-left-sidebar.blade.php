<section class="explore_services">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="counter_home">
                        @include ('inc/counter')
                    </div>
                </div>

                <!-- <div class="col-sm-12">
                    <div class="service_us">
                        <div class="content_area_heading large-heading ">

                            <p class="h1 heading_title wow animated fadeInUp">
                                Our Process
                            </p>
                            <div class="heading_border wow animated fadeInUp p-0">
                                <span class="two"></span><span class="three"></span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-12">
                    <div class="services_circle_box text-center">
                        <div class="circle_module_circuit_services fadeInUp wow animated circle_services">
                            <div class="services_wrapper">

                                <?php
                                    $services = [
                                        ['id' => '1', 'left_margin' => '53.7283%', 'top_margin' => '2.00887%', 'icon_1' => 'services_icon-grad1 fa fa-search', 'icon_2' => 'services_icon-grad2 fa fa-search', 'tagline_title' => 'Choose Your Wallet'],
                                        ['id' => '2', 'left_margin' => '82.0896%', 'top_margin' => '41.0448%', 'icon_1' => 'services_icon-grad1 fa fa-chart-line', 'icon_2' => 'services_icon-grad2 fa fa-chart-line', 'tagline_title' => 'Make Payment'],
                                        ['id' => '3', 'left_margin' => '53.7283%', 'top_margin' => '80.0807%', 'icon_1' => 'services_icon-grad1 fa fa-code', 'icon_2' => 'services_icon-grad2 fa fa-code', 'tagline_title' => 'Buy Or Sell'],
                                        ['id' => '4', 'left_margin' => '7.83885%', 'top_margin' => '65.1703%', 'icon_1' => 'services_icon-grad1 fa fa-registered', 'icon_2' => 'services_icon-grad2 fa fa-registered', 'tagline_title' => 'Investment in Trade'],
                                        ['id' => '5', 'left_margin' => '7.83885%', 'top_margin' => '16.9193%', 'icon_1' => 'services_icon-grad1 fa fa-lock', 'icon_2' => 'services_icon-grad2 fa fa-lock', 'tagline_title' => 'Gain profit'],
                                    ];
                                    $services_grid = '';
                                    foreach ($services as $services_val => $value) {
                                        $active_val = $value['id'] === '1' ? 'active' : '';

                                        $services_grid .= '<div class="services_item-wrap '.$active_val.'">';

                                    $services_grid .='
                                                            <div class="services_item-icon" style="left: '.$value['left_margin'].'; top: '.$value['top_margin'].';"><i class="services_icon '.$value['icon_1'].'"></i><i class="services_icon '.$value['icon_2'].'"></i></div>
                                                            <div class="services_item-content">
                                                                <div class="services_subtitle"></div>
                                                                <h3 class="services_title">'.$value['tagline_title'].'</h3>

                                                            </div>
                                                        </div>
                                                                    ';
                                    }
                                ?>
                                <?php echo ($services_grid); ?>
                            </div>
                        </div>
                    </div>
                </div>  -->

            </div>
        </div>
    </section>



<!-- <section class="analysis">
    <div class="container">
        <div class="content_area_heading large-heading">

            <p class="h1 heading_title wow animated fadeInUp">
              Upcoming Webinars
            </p>
            <div class="heading_border wow animated fadeInUp">
                <span class="two"></span><span class="three"></span>
            </div>
        </div>


        <div class="row">

            <?php
$analysis = [
    ['src' => '1.jpg', 'url' => '', 'anchor_text' => 'Cras sit amet nibh'],
    ['src' => '2.jpg', 'url' => '', 'anchor_text' => 'Cras sit amet nibh'],
    ['src' => '3.jpg', 'url' => '', 'anchor_text' => 'Cras sit amet nibh'],
    ['src' => '4.png', 'url' => '', 'anchor_text' => 'Cras sit amet nibh']
];

$opinion_analysis = '';
foreach ($analysis as $analysiss_val => $value) {
        $opinion_analysis .='
        <div class="col-md-12">
                <div class="media">
              <img class="mr-3" src="assets/img/latest_news/'.$value['src'].'" alt="Generic placeholder image">
              <div class="media-body">
                <p class="date m-0">Jan 16, 2020 - 8:00 AM EST</p>
                <h6 class="m-0"><a href="'.$value['url'].'">'.$value['anchor_text'].'</a></h6>
                <p class="m-0 nameby">By Ellen WAld, PHD.</p>
              </div>
            </div>
            </div>
        ';

    }

    echo ($opinion_analysis);

?>


        </div>
    </div>
</section> -->




    <div class="row">
    <div class="col-lg-12">
        <div class="ver-a-img">
            <!-- Api Top Left -->
            @foreach($AllLeftApi as $TopApi)
                @if($TopApi->area == "Top")
                    <div class="mb-4">
                        @php
                            echo $TopApi->link
                        @endphp
                    </div>
                @endif
            @endforeach

            <!-- Banner Top Left -->
            @foreach($AllLeftBanner as $TopBanner)
                @if($TopBanner->area == "Top")
                    @if($TopBanner->id != $MainLeftBanner->id)
                        @if($TopBanner->banner != null)
                            <a href="{{$TopBanner->link}}">
                                <img src="{{URL::to('storage/app')}}/{{$TopBanner->banner}}" class="mb-4">
                            </a>
                        @else
                            <div class="mb-4">
                                @php
                                    echo $TopBanner->htmlLink;
                                @endphp
                            </div>
                        @endif
                    @endif
                @endif
            @endforeach

            <!-- Banner Center Left -->
            @foreach($AllLeftBanner as $CenterBanner)
                @if($CenterBanner->area == "Center")
                    @if($CenterBanner->banner != null)
                        <a href="{{$CenterBanner->link}}">
                            <img src="{{URL::to('storage/app')}}/{{$CenterBanner->banner}}" class="mb-4">
                        </a>
                    @else
                        <div class="mb-4">
                            @php
                                echo $CenterBanner->htmlLink;
                            @endphp
                        </div>
                    @endif
                @endif
            @endforeach

            <!-- Api Center Left -->
            @foreach($AllLeftApi as $CenterApi)
                @if($CenterApi->area == "Center")
                    <div class="mb-4">
                        @php
                            echo $CenterApi->link
                        @endphp
                    </div>
                @endif
            @endforeach

            <!-- Banner Bottom Left -->
            @foreach($AllLeftBanner as $BottomBanner)
                @if($BottomBanner->area == "Bottom")
                    @if($BottomBanner->banner != null)
                        <a href="{{$BottomBanner->link}}">
                            <img src="{{URL::to('storage/app')}}/{{$BottomBanner->banner}}" class="mb-4">
                        </a>
                    @else
                        <div class="mb-4">
                            @php
                                echo $BottomBanner->htmlLink;
                            @endphp
                        </div>
                    @endif
                @endif
            @endforeach

            <!-- Api Bottom Left -->
            @foreach($AllLeftApi as $BottomApi)
                @if($BottomApi->area == "Bottom")
                    <div class="mb-4">
                        @php
                            echo $BottomApi->link
                        @endphp
                    </div>
                @endif
            @endforeach
        </div>
    </div>
</div>
