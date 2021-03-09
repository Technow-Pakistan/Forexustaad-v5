@include ('inc/header')
<!-- /.End of tricker -->
<section class="after_banner_content_area">
   <div class="container">
      <div class="row justify-content-center">
         <div class="col-lg-3 col-md-6 col-sm-12 order-2 order-lg-1">
            @include ('inc/home-left-sidebar')
         </div>
         <div class="col-lg-6 col-md-12 order-1 order-lg-2">
            @if($MidBannerHomeActive)
                <div class="mb-5">
                    <a href="{{$MidBannerHomeActive->link}}" target="_blank">
                        <img src="{{URL::to('storage/app')}}/{{$MidBannerHomeActive->image}}" width="100%">
                      </a>
                </div>
            @endif
            <div class="content_area_heading text-center">
               <h1 class="heading_title wow animated fadeInUp">
                  Broker Detail
               </h1>
               <div class="heading_border wow animated fadeInUp">
                  <span class="two"></span><span class="three"></span>
               </div>
            </div>
            <table cellpadding="0" cellspacing="0" class="tbl-accordion">
               <tbody>
                  <tr>
                     <td colspan="4">
                        <table cellpadding="0" cellspacing="0" class="tbl-accordion-nested">
                           <thead>
                              <tr>
                                 <td colspan="4" class="tbl-accordion-section">COMPANY INFORMATION <span class="BrokerDetailIconAdjust" check="open"><i class="fa fa-chevron-right"></i></span></td>
                              </tr>
                           <thead>
                           <tbody>
                              <!-- <tr>
                                 <th>Monthly Packages</th>
                                 <th id="planbronze">Bronze</th>
                                 <th id="plansilver">Silver</th>
                                 <th id="plangold">Gold</th>
                                 </tr> -->
                              <tr>
                                 <td>Company Name</td>
                                 <td></td>
                                 <td>{{$broker1->title}}</td>
                                 <td></td>
                              </tr>
                              <tr>
                                 <td>REGULATIONS</td>
                                 <td></td>
                                 <td>{{$broker1->regulations}}</td>
                                 <td></td>
                              </tr>
                              <tr>
                                 <td>HEADQUARTERS COUNTRY</td>
                                 <td></td>
                                 <td>{{$broker1->headquaters}}</td>
                                 <td></td>
                              </tr>
                              <tr>
                                 <td>FOUNDATION YEAR</td>
                                 <td></td>
                                 <td>{{$broker1->foundation}}</td>
                                 <td></td>
                              </tr>
                              <tr>
                                 <td>PUBLICLY TRADED</td>
                                 <td></td>
                                 <td>{{$broker1->traded}}</td>
                                 <td></td>
                              </tr>
                              <tr>
                                 <td>NUMBER OF EMPLOYEES</td>
                                 <td></td>
                                 <td>{{$broker1->employees}}</td>
                                 <td></td>
                              </tr>
                           </tbody>
                        </table>
                     </td>
                  </tr>
                  <tr>
                     <td colspan="4">
                        <table cellpadding="0" cellspacing="0" class="tbl-accordion-nested">
                           <thead>
                              <tr>
                                 <td colspan="4" class="tbl-accordion-section">DEPOSIT & WITHDRAWAL <span class="BrokerDetailIconAdjust" check="open"><i class="fa fa-chevron-right"></i></span></td>
                              </tr>
                           <thead>
                           <tbody>
                              <tr>
                                 <td>DEPOSIT OPTIONS</td>
                                 <td></td>
                                 <td>{{$broker2->deposit}}</td>
                                 <td></td>
                              </tr>
                              <tr>
                                 <td>WITHDRAWAL OPTIONS</td>
                                 <td></td>
                                 <td>{{$broker2->withdrawal}}</td>
                                 <td></td>
                              </tr>
                           </tbody>
                        </table>
                     </td>
                  </tr>
                  <tr>
                     <td colspan="4">
                        <table cellpadding="0" cellspacing="0" class="tbl-accordion-nested">
                           <thead>
                              <tr>
                                 <td colspan="4" class="tbl-accordion-section">COMMISSIONS & FEES <span class="BrokerDetailIconAdjust" check="open"><i class="fa fa-chevron-right"></i></span></td>
                              </tr>
                           <thead>
                           <tbody>
                              <tr>
                                 <td>COMMISSION ON TRADES</td>
                                 <td></td>
                                 <td>{{$broker3->commission}}</td>
                                 <td></td>
                              </tr>
                              <tr>
                                 <td>FIXED SPREADS</td>
                                 <td></td>
                                 <td>{{$broker3->spread}}</td>
                                 <td></td>
                              </tr>
                           </tbody>
                        </table>
                     </td>
                  </tr>
                  <tr>
                     <td colspan="4">
                        <table cellpadding="0" cellspacing="0" class="tbl-accordion-nested">
                           <thead>
                              <tr>
                                 <td colspan="4" class="tbl-accordion-section">ACCOUNT INFORMATION <span class="BrokerDetailIconAdjust" check="open"><i class="fa fa-chevron-right"></i></span></td>
                              </tr>
                           <thead>
                           <tbody>
                              <tr>
                                 <td>TRADING DESK TYPE</td>
                                 <td></td>
                                 <td>{{$broker4->trade}}</td>
                                 <td></td>
                              </tr>
                              <tr>
                                 <td>MIN DEPOSIT</td>
                                 <td></td>
                                 <td>{{$broker4->min}}</td>
                                 <td></td>
                              </tr>
                              <tr>
                                 <td>MAX LEVERAGE</td>
                                 <td></td>
                                 <td>{{$broker4->max}}</td>
                                 <td></td>
                              </tr>
                              <tr>
                                 <td>MINI ACCOUNT</td>
                                 <td></td>
                                 <td>{{$broker4->mini}}$</td>
                                 <td></td>
                              </tr>
                              <tr>
                                 <td>PREMIUM ACCOUNT</td>
                                 <td></td>
                                 <td>{{$broker4->premium}}</td>
                                 <td></td>
                              </tr>
                              <tr>
                                 <td>DEMO ACCOUNT</td>
                                 <td></td>
                                 <td>{{$broker4->demo}}</td>
                                 <td></td>
                              </tr>
                              <tr>
                                 <td>ISLAMIC ACCOUNT</td>
                                 <td></td>
                                 <td>{{$broker4->islamic}}</td>
                                 <td></td>
                              </tr>
                              <tr>
                                 <td>SEGREGATED ACCOUNT</td>
                                 <td></td>
                                 <td>{{$broker4->segregated}}</td>
                                 <td></td>
                              </tr>
                              <tr>
                                 <td>MANAGED ACCOUNT</td>
                                 <td></td>
                                 <td>{{$broker4->managed}}</td>
                                 <td></td>
                              </tr>
                              <tr>
                                 <td>SUITABLE FOR BEGINNERS</td>
                                 <td></td>
                                 <td>{{$broker4->beginner}}</td>
                                 <td></td>
                              </tr>
                              <tr>
                                 <td>SUITABLE FOR PROFESSIONALS</td>
                                 <td></td>
                                 <td>{{$broker4->professional}}</td>
                                 <td></td>
                              </tr>
                              <tr>
                                 <td>SUITABLE FOR SCALPING</td>
                                 <td></td>
                                 <td>{{$broker4->scalping}}</td>
                                 <td></td>
                              </tr>
                              <tr>
                                 <td>SUITABLE FOR DAILY TRADING</td>
                                 <td></td>
                                 <td>{{$broker4->daily}}</td>
                                 <td></td>
                              </tr>
                              <tr>
                                 <td>SUITABLE FOR WEEKLY TRADING</td>
                                 <td></td>
                                 <td>{{$broker4->weekly}}</td>
                                 <td></td>
                              </tr>
                              <tr>
                                 <td>SUITABLE FOR SWING TRADING</td>
                                 <td></td>
                                 <td>{{$broker4->swing}}</td>
                                 <td></td>
                              </tr>
                           </tbody>
                        </table>
                     </td>
                  </tr>
                  <tr>
                     <td colspan="4">
                        <table cellpadding="0" cellspacing="0" class="tbl-accordion-nested">
                           <thead>
                              <tr>
                                 <td colspan="4" class="tbl-accordion-section">TRADABLE ASSETS <span class="BrokerDetailIconAdjust" check="open"><i class="fa fa-chevron-right"></i></span></td>
                              </tr>
                           <thead>
                           <tbody>
                              <tr>
                                 <td>TRADES CURRENCIES</td>
                                 <td></td>
                                 <td>{{$broker5->currency}}</td>
                                 <td></td>
                              </tr>
                              <tr>
                                 <td>TRADES COMMODITIES</td>
                                 <td></td>
                                 <td>{{$broker5->tradeCommodities}}</td>
                                 <td></td>
                              </tr>
                              <tr>
                                 <td>TRADES INDICES</td>
                                 <td></td>
                                 <td>{{$broker5->tradeIndices}}</td>
                                 <td></td>
                              </tr>
                              <tr>
                                 <td>TRADES STOCKS</td>
                                 <td></td>
                                 <td>{{$broker5->tradeStocks}}</td>
                                 <td></td>
                              </tr>
                              <tr>
                                 <td>TRADES CRYPTOCURRENCY</td>
                                 <td></td>
                                 <td>{{$broker5->cryptocurrency}}</td>
                                 <td></td>
                              </tr>
                              <tr>
                                 <td>TRADES ETF'S</td>
                                 <td></td>
                                 <td>{{$broker5->etfs}}</td>
                                 <td></td>
                              </tr>
                              <tr>
                                 <td>TRADES BONDS</td>
                                 <td></td>
                                 <td>{{$broker5->tradeBonds}}</td>
                                 <td></td>
                              </tr>
                              <tr>
                                 <td>TRADES FUTURES</td>
                                 <td></td>
                                 <td>{{$broker5->tradeFuture}}</td>
                                 <td></td>
                              </tr>
                              <tr>
                                 <td>TRADES OPTIONS</td>
                                 <td></td>
                                 <td>{{$broker5->options}}</td>
                                 <td></td>
                              </tr>
                              <tr>
                                 <td>SUPPORTED CRYPTOCOINS</td>
                                 <td></td>
                                 <td>{{$broker5->cryptocoins}}</td>
                                 <td></td>
                              </tr>
                              <tr>
                                 <td>NUMBER OF TRADABLE ASSETS</td>
                                 <td></td>
                                 <td>{{$broker5->tradableassets}}</td>
                                 <td></td>
                              </tr>
                              <tr>
                                 <td>NUMBER OF CURRENCY PAIRS</td>
                                 <td></td>
                                 <td>{{$broker5->currencypairs}}</td>
                                 <td></td>
                              </tr>
                              <tr>
                                 <td>NUMBER OF CRYPTOCURRENCIES</td>
                                 <td></td>
                                 <td>{{$broker5->cryptocurrencies}}</td>
                                 <td></td>
                              </tr>
                              <tr>
                                 <td>NUMBER OF STOCKS</td>
                                 <td></td>
                                 <td>{{$broker5->NoOfStocks}}</td>
                                 <td></td>
                              </tr>
                              <tr>
                                 <td>NUMBER OF INDICES</td>
                                 <td></td>
                                 <td>{{$broker5->noOfIndices}}</td>
                                 <td></td>
                              </tr>
                              <tr>
                                 <td>NUMBER OF COMMODITIES</td>
                                 <td></td>
                                 <td>{{$broker5->noOfCommodities}}</td>
                                 <td></td>
                              </tr>
                              <tr>
                                 <td>NUMBER OF FUTURES</td>
                                 <td></td>
                                 <td>{{$broker5->noOfFutures}}</td>
                                 <td></td>
                              </tr>
                              <tr>
                                 <td>NUMBER OF OPTIONS</td>
                                 <td></td>
                                 <td>{{$broker5->noOfOptions}}</td>
                                 <td></td>
                              </tr>
                              <tr>
                                 <td>NUMBER OF BONDS</td>
                                 <td></td>
                                 <td>{{$broker5->noOfBonds}}</td>
                                 <td></td>
                              </tr>
                           </tbody>
                        </table>
                     </td>
                  </tr>
                  <tr>
                     <td colspan="4">
                        <table cellpadding="0" cellspacing="0" class="tbl-accordion-nested">
                           <thead>
                              <tr>
                                 <td colspan="4" class="tbl-accordion-section">TRADING PLATFORMS <span class="BrokerDetailIconAdjust" check="open"><i class="fa fa-chevron-right"></i></span></td>
                              </tr>
                           <thead>
                           <tbody>

                              <tr>
                                 <td>TRADING PLATFORMS</td>
                                 <td></td>
                                 <td>{{$broker6->platform}}</td>
                                 <td></td>
                              </tr>
                              <tr>
                                 <td>OS COMPATIBILITY</td>
                                 <td></td>
                                 <td>{{$broker6->os}}</td>
                                 <td></td>
                              </tr>
                              <tr>
                                 <td>MOBILE TRADING</td>
                                 <td></td>
                                 <td>{{$broker6->mobile}}</td>
                                 <td></td>
                              </tr>
                              <tr>
                                 <td>TRADING PLATFORM SUPPORTED LANGUAGES</td>
                                 <td></td>
                                 <td>{{$broker6->language}}</td>
                                 <td></td>
                              </tr>
                           </tbody>
                        </table>
                     </td>
                  </tr>
                  <tr>
                     <td colspan="4">
                        <table cellpadding="0" cellspacing="0" class="tbl-accordion-nested">
                           <thead>
                              <tr>
                                 <td colspan="4" class="tbl-accordion-section">TRADING FEATURES<span class="BrokerDetailIconAdjust" check="open"><i class="fa fa-chevron-right"></i></span></td>
                              </tr>
                           <thead>
                           <tbody>
                              <tr>
                                 <td>EDUCATIONAL SERVICES</td>
                                 <td></td>
                                 <td>{{$broker7->educationServices}}</td>
                                 <td></td>
                              </tr>
                              <tr>
                                 <td>SOCIAL TRADING / COPY TRADING</td>
                                 <td></td>
                                 <td>{{$broker7->social}}</td>
                                 <td></td>
                              </tr>
                              <tr>
                                 <td>TRADING SIGNALS</td>
                                 <td></td>
                                 <td>{{$broker7->signals}}</td>
                                 <td></td>
                              </tr>
                              <tr>
                                 <td>EMAIL ALERTS</td>
                                 <td></td>
                                 <td>{{$broker7->email}}</td>
                                 <td></td>
                              </tr>
                              <tr>
                                 <td>GUARANTEED STOP LOSS</td>
                                 <td></td>
                                 <td>{{$broker7->stop}}</td>
                                 <td></td>
                              </tr>
                              <tr>
                                 <td>GUARANTEED LIMIT ORDERS</td>
                                 <td></td>
                                 <td>{{$broker7->limited}}</td>
                                 <td></td>
                              </tr>
                              <tr>
                                 <td>GUARANTEED FILLS / LIQUIDITY</td>
                                 <td></td>
                                 <td>{{$broker7->guaranteed}}</td>
                                 <td></td>
                              </tr>
                              <tr>
                                 <td>OCO ORDERS</td>
                                 <td></td>
                                 <td>{{$broker7->oco}}</td>
                                 <td></td>
                              </tr>
                              <tr>
                                 <td>TRAILING SP/TP</td>
                                 <td></td>
                                 <td>{{$broker7->trailings}}</td>
                                 <td></td>
                              </tr>
                              <tr>
                                 <td>AUTOMATED TRADING</td>
                                 <td></td>
                                 <td>{{$broker7->automated}}</td>
                                 <td></td>
                              </tr>
                              <tr>
                                 <td>API TRADING</td>
                                 <td></td>
                                 <td>{{$broker7->api}}</td>
                                 <td></td>
                              </tr>
                              <tr>
                                 <td>VPS SERVICES</td>
                                 <td></td>
                                 <td>{{$broker7->vps}}</td>
                                 <td></td>
                              </tr>
                              <tr>
                                 <td>TRADING FROM CHART</td>
                                 <td></td>
                                 <td>{{$broker7->chart}}</td>
                                 <td></td>
                              </tr>
                              <tr>
                                 <td>INTEREST ON MARGIN</td>
                                 <td></td>
                                 <td>{{$broker7->margin}}</td>
                                 <td></td>
                              </tr>
                              <tr>
                                 <td>OFFERS HEDGING</td>
                                 <td></td>
                                 <td>{{$broker7->hedging}}</td>
                                 <td></td>
                              </tr>
                              <tr>
                                 <td>OFFERS PROMOTIONS</td>
                                 <td></td>
                                 <td>{{$broker7->promotions}}</td>
                                 <td></td>
                              </tr>
                              <tr>
                                 <td>ONE-CLICK TRADING</td>
                                 <td></td>
                                 <td>{{$broker7->oneClick}}</td>
                                 <td></td>
                              </tr>
                              <tr>
                                 <td>EXPERT ADVISORS (EA)</td>
                                 <td></td>
                                 <td>{{$broker7->advisors}}</td>
                                 <td></td>
                              </tr>
                              <tr>
                                 <td>OTHER TRADING FEATURES</td>
                                 <td></td>
                                 <td>{{$broker7->features}}</td>
                                 <td></td>
                              </tr>
                           </tbody>
                        </table>
                     </td>
                  </tr>
                  <tr>
                     <td colspan="4">
                        <table cellpadding="0" cellspacing="0" class="tbl-accordion-nested">
                           <thead>
                              <tr>
                                 <td colspan="4" class="tbl-accordion-section">CUSTOMER SERVICE <span class="BrokerDetailIconAdjust" check="open"><i class="fa fa-chevron-right"></i></span></td>
                              </tr>
                           <thead>
                           <tbody>
                              <tr>
                                 <td>CUSTOMER SUPPORT LANGUAGES</td>
                                 <td></td>
                                 <td>{{$broker8->languages}}</td>
                                 <td></td>
                              </tr>
                              <tr>
                                 <td>24H SUPPORT</td>
                                 <td></td>
                                 <td>{{$broker8->supports}}</td>
                                 <td></td>
                              </tr>
                              <tr>
                                 <td>SUPPORT DURING WEEKENDS</td>
                                 <td></td>
                                 <td>{{$broker8->weekend}}</td>
                                 <td></td>
                              </tr>
                              <tr>
                                 <td>LIVE CHAT</td>
                                 <td></td>
                                 <td>{{$broker8->chat}}</td>
                                 <td></td>
                              </tr>
                           </tbody>
                        </table>
                     </td>
                  </tr>
                  <tr>
                     <td colspan="4">
                        <table cellpadding="0" cellspacing="0" class="tbl-accordion-nested">
                           <thead>
                              <tr>
                                 <td colspan="4" class="tbl-accordion-section">RESEARCH & EDUCATION <span class="BrokerDetailIconAdjust" check="open"><i class="fa fa-chevron-right"></i></span></td>
                              </tr>
                           <thead>
                           <tbody>
                              <tr>
                                 <td>DAILY MARKET COMMENTARY</td>
                                 <td></td>
                                 <td>{{$broker9->commentary}}</td>
                                 <td></td>
                              </tr>
                              <tr>
                                 <td>NEWS (TOP-TIER SOURCES)</td>
                                 <td></td>
                                 <td>{{$broker9->news}}</td>
                                 <td></td>
                              </tr>
                              <tr>
                                 <td>AUTOCHARTIST</td>
                                 <td></td>
                                 <td>{{$broker9->autochartist}}</td>
                                 <td></td>
                              </tr>
                              <tr>
                                 <td>TRADING CENTRAL (RECOGNIA)</td>
                                 <td></td>
                                 <td>{{$broker9->tradingCentral}}</td>
                                 <td></td>
                              </tr>
                              <tr>
                                 <td>DELKOS RESEARCH</td>
                                 <td></td>
                                 <td>{{$broker9->delkos}}</td>
                                 <td></td>
                              </tr>
                              <tr>
                                 <td>ACUITY TRADING</td>
                                 <td></td>
                                 <td>{{$broker9->acuity}}</td>
                                 <td></td>
                              </tr>
                              <tr>
                                 <td>WEBINARS</td>
                                 <td></td>
                                 <td>{{$broker9->webinars}}</td>
                                 <td></td>
                              </tr>
                              <tr>
                                 <td>VIDEO EDUCATION</td>
                                 <td></td>
                                 <td>{{$broker9->education}}</td>
                                 <td></td>
                              </tr>
                              <tr>
                                 <td>ECONOMIC CALENDAR</td>
                                 <td></td>
                                 <td>{{$broker9->calendar}}</td>
                                 <td></td>
                              </tr>
                           </tbody>
                        </table>
                     </td>
                  </tr>
                  <tr>
                     <td colspan="4">
                        <table cellpadding="0" cellspacing="0" class="tbl-accordion-nested">
                           <thead>
                              <tr>
                                 <td colspan="4" class="tbl-accordion-section">PROMOTIONS <span class="BrokerDetailIconAdjust" check="open"><i class="fa fa-chevron-right"></i></span></td>
                              </tr>
                           <thead>
                           <tbody>
                              <tr>
                                 <td>PROMOTIONS</td>
                                 <td></td>
                                 <td>{{$broker->promotions}}</td>
                                 <td></td>
                              </tr>
                              <tr>
                                 <td>READ REVIEW</td>
                                 <td></td>
                                 <td>{{$broker->review}}</td>
                                 <td></td>
                              </tr>
                              <tr>
                                 <td>Link</td>
                                 <td></td>
                                 <td><a href="{{$broker->link}}">{{$broker->link}}</a></td>
                                 <td></td>
                              </tr>

                           </tbody>
                        </table>
                     </td>
                  </tr>
               </tbody>
            </table>
         </div>
         <div class="col-lg-3 col-md-6 col-sm-12 order-3 order-lg-3">
            @include ('inc/home-right-sidebar')
         </div>
      </div>
   </div>
</section>
@include ('inc/footer')
<style>
   .tbl-accordion {
   margin: 0 auto;
   width: 100%;
   border: 1px solid #d9d9d9;
   }
   .tbl-accordion thead {
   background: #d9d9d9;
   }
   .tbl-accordion .tbl-accordion-nested {
   width: 100%;
   }
   /* .tbl-accordion .tbl-accordion-nested tr:nth-child(even) {
   background-color: #eee;
   } */
   .tbl-accordion .tbl-accordion-nested td, .tbl-accordion .tbl-accordion-nested th {
   padding: 10px;
   border-bottom: 1px solid #d9d9d9;
   }
   .tbl-accordion .tbl-accordion-nested .tbl-accordion-section {
   background: linear-gradient(45deg, #ff0024, #0d5fe9);
   color: #fff;
   cursor: pointer;
   font-family: Arial;
   }
   th {
   text-align: left !important;
   }
</style>
<script>
   $('.tbl-accordion-nested').on("click",function(){
      var BrokerDetailIconAdjust = $(this).find('.BrokerDetailIconAdjust');
      var data3w = $(BrokerDetailIconAdjust).attr("check");
      console.log(data3w);
      if(data3w == "open"){
         $(BrokerDetailIconAdjust).css("transform","rotate(0deg)");
         $(BrokerDetailIconAdjust).attr("check","close");
         console.log("end");
      }else{
         $(BrokerDetailIconAdjust).css("transform","rotate(90deg)");
         $(BrokerDetailIconAdjust).attr("check","open");
         console.log("hello");
      }
   });
   $('.tbl-accordion-nested').each(function(){
   var thead = $(this).find('thead');
   var tbody = $(this).find('tbody');

   tbody.show();
   thead.click(function(){
   tbody. slideToggle();
   })
   });


</script>
