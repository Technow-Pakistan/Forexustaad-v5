@include ('inc/header')
<!-- /.End of tricker -->
<!-- /.End of tricker -->
<!-- /.End of tricker -->
<!-- /.End of tricker -->
<!-- /.End of tricker -->
<!-- /.End of tricker -->
<!-- /.End of tricker -->
<!-- /.End of tricker -->
<!-- /.End of tricker -->
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
                                 <td colspan="4" class="tbl-accordion-section">COMPANY INFORMATION</td>
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
                                 <td>Forexustaad</td>
                                 <td></td>
                              </tr>
                              <tr>
                                 <td>REGULATIONS</td>
                                 <td></td>
                                 <td>yes</td>
                                 <td></td>
                              </tr>
                              <tr>
                                 <td>HEADQUARTERS COUNTRY</td>
                                 <td></td>
                                 <td>Pairs</td>
                                 <td></td>
                              </tr>
                              <tr>
                                 <td>FOUNDATION YEAR</td>
                                 <td></td>
                                 <td>2020</td>
                                 <td></td>
                              </tr>
                              <tr>
                                 <td>PUBLICLY TRADED</td>
                                 <td></td>
                                 <td>20</td>
                                 <td></td>
                              </tr>
                              <tr>
                                 <td>NUMBER OF EMPLOYEES</td>
                                 <td></td>
                                 <td>5</td>
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
                                 <td colspan="4" class="tbl-accordion-section">DEPOSIT & WITHDRAWAL</td>
                              </tr>
                           <thead>
                           <tbody>
                              <tr>
                                 <td>DEPOSIT OPTIONS</td>
                                 <td></td>
                                 <td>50$</td>
                                 <td></td>
                              </tr>
                              <tr>
                                 <td>WITHDRAWAL OPTIONS</td>
                                 <td></td>
                                 <td>20$</td>
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
                                 <td colspan="4" class="tbl-accordion-section">COMMISSIONS & FEES</td>
                              </tr>
                           <thead>
                           <tbody>
                              <tr>
                                 <td>COMMISSION ON TRADES</td>
                                 <td></td>
                                 <td>50%</td>
                                 <td></td>
                              </tr>
                              <tr>
                                 <td>FIXED SPREADS</td>
                                 <td></td>
                                 <td>Up to $2000</td>
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
                                 <td colspan="4" class="tbl-accordion-section">ACCOUNT INFORMATION</td>
                              </tr>
                           <thead>
                           <tbody>
                              <tr>
                                 <td>TRADING DESK TYPE</td>
                                 <td></td>
                                 <td>Full</td>
                                 <td></td>
                              </tr>
                              <tr>
                                 <td>MIN DEPOSIT</td>
                                 <td></td>
                                 <td>Unlimited</td>
                                 <td></td>
                              </tr>
                              <tr>
                                 <td>MAX LEVERAGE</td>
                                 <td></td>
                                 <td>1:500</td>
                                 <td></td>
                              </tr>
                              <tr>
                                 <td>MINI ACCOUNT</td>
                                 <td></td>
                                 <td>5000$</td>
                                 <td></td>
                              </tr>
                              <tr>
                                 <td>PREMIUM ACCOUNT</td>
                                 <td></td>
                                 <td>5000$</td>
                                 <td></td>
                              </tr>
                              <tr>
                                 <td>DEMO ACCOUNT</td>
                                 <td></td>
                                 <td>5000$</td>
                                 <td></td>
                              </tr>
                              <tr>
                                 <td>ISLAMIC ACCOUNT</td>
                                 <td></td>
                                 <td>5000$</td>
                                 <td></td>
                              </tr>
                              <tr>
                                 <td>SEGREGATED ACCOUNT</td>
                                 <td></td>
                                 <td>5000$</td>
                                 <td></td>
                              </tr>
                              <tr>
                                 <td>MANAGED ACCOUNT</td>
                                 <td></td>
                                 <td>5000$</td>
                                 <td></td>
                              </tr>
                              <tr>
                                 <td>SUITABLE FOR BEGINNERS</td>
                                 <td></td>
                                 <td>5000$</td>
                                 <td></td>
                              </tr>
                              <tr>
                                 <td>SUITABLE FOR PROFESSIONALS</td>
                                 <td></td>
                                 <td>5000$</td>
                                 <td></td>
                              </tr>
                              <tr>
                                 <td>SUITABLE FOR SCALPING</td>
                                 <td></td>
                                 <td>5000$</td>
                                 <td></td>
                              </tr>
                              <tr>
                                 <td>SUITABLE FOR DAILY TRADING</td>
                                 <td></td>
                                 <td>5000$</td>
                                 <td></td>
                              </tr>
                              <tr>
                                 <td>SUITABLE FOR WEEKLY TRADING</td>
                                 <td></td>
                                 <td>5000$</td>
                                 <td></td>
                              </tr>
                              <tr>
                                 <td>SUITABLE FOR SWING TRADING</td>
                                 <td></td>
                                 <td>5000$</td>
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
                                 <td colspan="4" class="tbl-accordion-section">TRADABLE ASSETS</td>
                              </tr>
                           <thead>
                           <tbody>
                              <tr>
                                 <td>TRADES CURRENCIES</td>
                                 <td></td>
                                 <td>All</td>
                                 <td></td>
                              </tr>
                              <tr>
                                 <td>TRADES COMMODITIES</td>
                                 <td></td>
                                 <td>All</td>
                                 <td></td>
                              </tr>
                              <tr>
                                 <td>TRADES INDICES</td>
                                 <td></td>
                                 <td>All</td>
                                 <td></td>
                              </tr>
                              <tr>
                                 <td>TRADES STOCKS</td>
                                 <td></td>
                                 <td>All</td>
                                 <td></td>
                              </tr>
                              <tr>
                                 <td>TRADES CRYPTOCURRENCY</td>
                                 <td></td>
                                 <td>All</td>
                                 <td></td>
                              </tr>
                              <tr>
                                 <td>TRADES ETF'S</td>
                                 <td></td>
                                 <td>All</td>
                                 <td></td>
                              </tr>
                              <tr>
                                 <td>TRADES BONDS</td>
                                 <td></td>
                                 <td>All</td>
                                 <td></td>
                              </tr>
                              <tr>
                                 <td>TRADES FUTURES</td>
                                 <td></td>
                                 <td>All</td>
                                 <td></td>
                              </tr>
                              <tr>
                                 <td>TRADES OPTIONS</td>
                                 <td></td>
                                 <td>All</td>
                                 <td></td>
                              </tr>
                              <tr>
                                 <td>SUPPORTED CRYPTOCOINS</td>
                                 <td></td>
                                 <td>All</td>
                                 <td></td>
                              </tr>
                              <tr>
                                 <td>NUMBER OF TRADABLE ASSETS</td>
                                 <td></td>
                                 <td>All</td>
                                 <td></td>
                              </tr>
                              <tr>
                                 <td>NUMBER OF CURRENCY PAIRS</td>
                                 <td></td>
                                 <td>All</td>
                                 <td></td>
                              </tr>
                              <tr>
                                 <td>NUMBER OF CRYPTOCURRENCIES</td>
                                 <td></td>
                                 <td>All</td>
                                 <td></td>
                              </tr>
                              <tr>
                                 <td>NUMBER OF STOCKS</td>
                                 <td></td>
                                 <td>All</td>
                                 <td></td>
                              </tr>
                              <tr>
                                 <td>NUMBER OF INDICES</td>
                                 <td></td>
                                 <td>All</td>
                                 <td></td>
                              </tr>
                              <tr>
                                 <td>NUMBER OF COMMODITIES</td>
                                 <td></td>
                                 <td>All</td>
                                 <td></td>
                              </tr>
                              <tr>
                                 <td>NUMBER OF FUTURES</td>
                                 <td></td>
                                 <td>All</td>
                                 <td></td>
                              </tr>
                              <tr>
                                 <td>NUMBER OF OPTIONS</td>
                                 <td></td>
                                 <td>All</td>
                                 <td></td>
                              </tr>
                              <tr>
                                 <td>NUMBER OF BONDS</td>
                                 <td></td>
                                 <td>All</td>
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
                                 <td colspan="4" class="tbl-accordion-section">TRADING PLATFORMS</td>
                              </tr>
                           <thead>
                           <tbody>
                              
                              <tr>
                                 <td>TRADING PLATFORMS</td>
                                 <td></td>
                                 <td>All</td>
                                 <td></td>
                              </tr>
                              <tr>
                                 <td>OS COMPATIBILITY</td>
                                 <td></td>
                                 <td>All</td>
                                 <td></td>
                              </tr>
                              <tr>
                                 <td>MOBILE TRADING</td>
                                 <td></td>
                                 <td>All</td>
                                 <td></td>
                              </tr>
                              <tr>
                                 <td>TRADING PLATFORM SUPPORTED LANGUAGES</td>
                                 <td></td>
                                 <td>All</td>
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
                                 <td colspan="4" class="tbl-accordion-section">TRADING FEATURES</td>
                              </tr>
                           <thead>
                           <tbody>
                              <tr>
                                 <td>EDUCATIONAL SERVICES</td>
                                 <td></td>
                                 <td>ALl</td>
                                 <td></td>
                              </tr>
                              <tr>
                                 <td>SOCIAL TRADING / COPY TRADING</td>
                                 <td></td>
                                 <td>All</td>
                                 <td></td>
                              </tr>
                              <tr>
                                 <td>TRADING SIGNALS</td>
                                 <td></td>
                                 <td>All</td>
                                 <td></td>
                              </tr>
                              <tr>
                                 <td>EMAIL ALERTS</td>
                                 <td></td>
                                 <td>All</td>
                                 <td></td>
                              </tr>
                              <tr>
                                 <td>GUARANTEED STOP LOSS</td>
                                 <td></td>
                                 <td>ALl</td>
                                 <td></td>
                              </tr>
                              <tr>
                                 <td>GUARANTEED LIMIT ORDERS</td>
                                 <td></td>
                                 <td>ALl</td>
                                 <td></td>
                              </tr>
                              <tr>
                                 <td>GUARANTEED FILLS / LIQUIDITY</td>
                                 <td></td>
                                 <td>ALl</td>
                                 <td></td>
                              </tr>
                              <tr>
                                 <td>OCO ORDERS</td>
                                 <td></td>
                                 <td>All</td>
                                 <td></td>
                              </tr>
                              <tr>
                                 <td>TRAILING SP/TP</td>
                                 <td></td>
                                 <td>All</td>
                                 <td></td>
                              </tr>
                              <tr>
                                 <td>AUTOMATED TRADING</td>
                                 <td></td>
                                 <td>ALl</td>
                                 <td></td>
                              </tr>
                              <tr>
                                 <td>API TRADING</td>
                                 <td></td>
                                 <td>ALl</td>
                                 <td></td>
                              </tr>
                              <tr>
                                 <td>VPS SERVICES</td>
                                 <td></td>
                                 <td>ALl</td>
                                 <td>ALl</td>
                              </tr>
                              <tr>
                                 <td>TRADING FROM CHART</td>
                                 <td></td>
                                 <td>ALl</td>
                                 <td></td>
                              </tr>
                              <tr>
                                 <td>INTEREST ON MARGIN</td>
                                 <td></td>
                                 <td>ALl</td>
                                 <td></td>
                              </tr>
                              <tr>
                                 <td>OFFERS HEDGING</td>
                                 <td></td>
                                 <td>ALl</td>
                                 <td></td>
                              </tr>
                              <tr>
                                 <td>OFFERS PROMOTIONS</td>
                                 <td></td>
                                 <td>ALl</td>
                                 <td></td>
                              </tr>
                              <tr>
                                 <td>ONE-CLICK TRADING</td>
                                 <td></td>
                                 <td>ALl</td>
                                 <td></td>
                              </tr>
                              <tr>
                                 <td>EXPERT ADVISORS (EA)</td>
                                 <td></td>
                                 <td>ALl</td>
                                 <td></td>
                              </tr>
                              <tr>
                                 <td>OTHER TRADING FEATURES</td>
                                 <td></td>
                                 <td>ALl</td>
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
                                 <td colspan="4" class="tbl-accordion-section">CUSTOMER SERVICE</td>
                              </tr>
                           <thead>
                           <tbody>
                              <tr>
                                 <td>CUSTOMER SUPPORT LANGUAGES</td>
                                 <td></td>
                                 <td>All</td>
                                 <td></td>
                              </tr>
                              <tr>
                                 <td>24H SUPPORT</td>
                                 <td></td>
                                 <td>1 Hour</td>
                                 <td></td>
                              </tr>
                              <tr>
                                 <td>SUPPORT DURING WEEKENDS</td>
                                 <td></td>
                                 <td>1 Hour</td>
                                 <td></td>
                              </tr>
                              <tr>
                                 <td>LIVE CHAT</td>
                                 <td></td>
                                 <td>1 Hour</td>
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
                                 <td colspan="4" class="tbl-accordion-section">RESEARCH & EDUCATION</td>
                              </tr>
                           <thead>
                           <tbody>
                              <tr>
                                 <td>DAILY MARKET COMMENTARY</td>
                                 <td></td>
                                 <td>All</td>
                                 <td></td>
                              </tr>
                              <tr>
                                 <td>NEWS (TOP-TIER SOURCES)</td>
                                 <td></td>
                                 <td>1 Hour</td>
                                 <td></td>
                              </tr>
                              <tr>
                                 <td>AUTOCHARTIST</td>
                                 <td></td>
                                 <td>1 Hour</td>
                                 <td></td>
                              </tr>
                              <tr>
                                 <td>TRADING CENTRAL (RECOGNIA)</td>
                                 <td></td>
                                 <td>1 Hour</td>
                                 <td></td>
                              </tr>
                              <tr>
                                 <td>DELKOS RESEARCH</td>
                                 <td></td>
                                 <td>1 Hour</td>
                                 <td></td>
                              </tr>
                              <tr>
                                 <td>ACUITY TRADING</td>
                                 <td></td>
                                 <td>1 Hour</td>
                                 <td></td>
                              </tr>
                              <tr>
                                 <td>WEBINARS</td>
                                 <td></td>
                                 <td>1 Hour</td>
                                 <td></td>
                              </tr>
                              <tr>
                                 <td>VIDEO EDUCATION</td>
                                 <td></td>
                                 <td>1 Hour</td>
                                 <td></td>
                              </tr>
                              <tr>
                                 <td>ECONOMIC CALENDAR</td>
                                 <td></td>
                                 <td>1 Hour</td>
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
                                 <td colspan="4" class="tbl-accordion-section">PROMOTIONS</td>
                              </tr>
                           <thead>
                           <tbody>
                              <tr>
                                 <td>PROMOTIONS</td>
                                 <td></td>
                                 <td>All</td>
                                 <td></td>
                              </tr>
                              <tr>
                                 <td>READ REVIEW</td>
                                 <td></td>
                                 <td>1 Hour</td>
                                 <td></td>
                              </tr>
                              <tr>
                                 <td>Link</td>
                                 <td></td>
                                 <td>1 Hour</td>
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
   $('.tbl-accordion-nested').each(function(){
   var thead = $(this).find('thead');
   var tbody = $(this).find('tbody');
   
   tbody.show();
   thead.click(function(){
   tbody. slideToggle();
   })
   });
   
   
</script>