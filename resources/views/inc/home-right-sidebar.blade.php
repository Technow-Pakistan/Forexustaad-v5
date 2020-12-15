<!-- <div class="price-chart">
    <div id="chartdiv" class="charts"></div>   
</div> -->
<!-- /.End of chart -->
@include ('inc/clients')


<!-- <section class="analysis">
    <div class="container">
        <div class="content_area_heading large-heading">
        
            <h1 class="heading_title wow animated fadeInUp">
               Most Read
            </h1>
            <div class="heading_border wow animated fadeInUp">
                <span class="two"></span><span class="three"></span>
            </div>
        </div>


        <div class="row">

            <?php
$analysis = [
    ['src' => '1.jpg', 'url' => '', 'anchor_text' => 'Cras sit amet nibh libero, in gravida nulla'],
    ['src' => '2.jpg', 'url' => '', 'anchor_text' => 'Cras sit amet nibh libero, in gravida'],
    ['src' => '3.jpg', 'url' => '', 'anchor_text' => 'Cras sit amet nibh libero'],
    ['src' => '4.png', 'url' => '', 'anchor_text' => 'Cras sit amet nibh libero, in gravida nulla nibh libero']
];

$opinion_analysis = '';
foreach ($analysis as $analysiss_val => $value) {
        $opinion_analysis .='
        <div class="col-md-12">
                <div class="media">
              <img class="mr-3" src="assets/img/latest_news/'.$value['src'].'" alt="Generic placeholder image">
              <div class="media-body">
                <p class="date m-0">Jan 16, 2020</p>
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

<section class="newsletter">
	<div class="container">
		 <div class="content_area_heading large-heading">
            <h1 class="heading_title wow animated fadeInUp">
               Get Updates
            </h1>
            <div class="heading_border wow animated fadeInUp">
                <span class="two"></span><span class="three"></span>
            </div>
        </div>
		<div class="row">
			<div class="col-lg-12">
            <div id="mc_embed_signup">
<form action="https://gmail.us4.list-manage.com/subscribe/post?u=cd218c9f98ecf24ef623b52af&amp;id=a708ee86ba" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
    <div id="mc_embed_signup_scroll">
	<label for="mce-EMAIL">Subscribe to our Newsletter!</label>
	<input type="email" value="" class="form-control" name="EMAIL" class="email" id="mce-EMAIL" placeholder="email address" required>
    <!-- real people should not fill this in and expect good things - do not remove this or risk form bot signups-->
    <div style="position: absolute; left: -5000px;" aria-hidden="true"><input type="text" name="b_cd218c9f98ecf24ef623b52af_a708ee86ba" tabindex="-1" value=""></div>
    <div class="clear pt-3"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="btn btn-primary btn-radial"></div>
    </div>
</form>
</div>
			</div>
		</div>
	</div>
</section>





<!-- <div class="price-chart mt-5">
    <div id="chartdiv2" class="charts"></div>   
</div> -->
<!-- /.End of chart -->


<!--<div class="row pt-5">-->
<!--	<div class="col-lg-12">-->
<!--		<div class="ver-a-img">-->
<!--            <a href="href=https://promo.theliquidity.com/afl-forexustaad/">-->
<!--                <img src="{{URL::to('/public/assets/assets/img/ff.png')}}">-->
<!--            </a>-->
<!--        </div>-->
<!--	</div>-->
<!--</div>-->


<div class="row pt-5">
	<div class="col-lg-12">
		<div class="ver-a-img">
            <!-- Api Top Right -->
            @foreach($AllRightApi as $TopApi)
                @if($TopApi->area == "Top")
                    <div class="mb-4">
                        @php
                            echo $TopApi->link
                        @endphp
                    </div>   
                @endif
            @endforeach
            
            <!-- Banner Top Right -->
            @foreach($AllRightBanner as $TopBanner)
                @if($TopBanner->area == "Top")
                    @if($TopBanner->id != $MainRightBanner->id)
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
            
            <!-- Banner Center Right -->
            @foreach($AllRightBanner as $CenterBanner)
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

            <!-- Api Center Right -->
            @foreach($AllRightApi as $CenterApi)
                @if($CenterApi->area == "Center")
                    <div class="mb-4">
                        @php
                            echo $CenterApi->link
                        @endphp   
                    </div>
                @endif
            @endforeach

            <!-- Banner Bottom Right -->
            @foreach($AllRightBanner as $BottomBanner)
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

            <!-- Api Bottom Right -->
            @foreach($AllRightApi as $BottomApi)
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



<!-- <div class="row pt-5">
	<div class="col-lg-12">
		<div class="ver-a-img">
            <a href="https://secure.cabanacapitals.com/ib/links/go/334">
                <img src="{{URL::to('/public/assets/assets/img/cabanarec.jpg')}}">
            </a>
        </div>
	</div>
</div> -->
