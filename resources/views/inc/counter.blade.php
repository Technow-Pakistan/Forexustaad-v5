<!-- <?php

    $counter = [
        ['data_speed' => '465', 'counter_text' => 'WORLDWIDE TRUSTED USERS', 'id' => 'fadeInLeft'],
        ['data_speed' => '438', 'counter_text' => 'SERVICES WE DELIVERED', 'id' => 'fadeInRight'],
        ['data_speed' => '275', 'counter_text' => 'SPONSER COMPANIES', 'id' => 'fadeInRightBig'],
        ['data_speed' => '190', 'counter_text' => 'TRADING CURRENCIES', 'id' => 'fadeInUp'],
    ];
$counter_grid = '';
foreach ($counter as $counter_val => $value) {
    $counter_grid .='<div class="col-6 text-center px-sm-4 mb-5 '.$value['id'].' wow">
                      <h2 class="timer count-title count-number" data-to="'.$value['data_speed'].'" data-speed="1500"></h2>
                      <p class="count-text ">'.$value['counter_text'].'</p>
                     </div>
    ';
}

?>
<section class="facts">
<div class="row">
  <div class="col-sm-12">
        <div class="service_us">
            <div class="content_area_heading large-heading ">
                <p class="h1 heading_title wow animated fadeInUp">
                    Facts & Figures
                </p>
                <div class="heading_border wow animated fadeInUp">
                    <span class="two"></span><span class="three"></span>
                </div>
            </div>
        </div>
    </div>
  <?php echo ($counter_grid); ?>
</div>
</section> -->