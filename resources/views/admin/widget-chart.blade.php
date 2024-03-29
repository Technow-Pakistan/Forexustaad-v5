@include('admin.include.header')
<!-- [ Main Content ] start -->

<div class="pcoded-main-container">
    <div class="pcoded-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h5 class="m-b-10">Widget Chart</h5>
                        </div>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index-2.html"><i class="feather icon-home"></i></a></li>
                            <li class="breadcrumb-item"><a href="#!">Widget</a></li>
                            <li class="breadcrumb-item"><a href="#!">Widget Chart</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <!-- [ Main Content ] start -->
        <div class="row">
            <!-- student start -->
            <div class="col-lg-8 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Students by Courses</h5>
                        <div class="card-header-right">
                            <div class="btn-group card-option">
                                <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="feather icon-more-horizontal"></i>
                                </button>
                                <ul class="list-unstyled card-option dropdown-menu dropdown-menu-right">
                                    <li class="dropdown-item full-card"><a href="#!"><span><i class="feather icon-maximize"></i> maximize</span><span style="display:none"><i class="feather icon-minimize"></i> Restore</span></a></li>
                                    <li class="dropdown-item minimize-card"><a href="#!"><span><i class="feather icon-minus"></i> collapse</span><span style="display:none"><i class="feather icon-plus"></i> expand</span></a></li>
                                    <li class="dropdown-item reload-card"><a href="#!"><i class="feather icon-refresh-cw"></i> reload</a></li>
                                    <li class="dropdown-item close-card"><a href="#!"><i class="feather icon-trash"></i> remove</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="student-chart"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Email Campaign</h5>
                        <div class="card-header-right">
                            <div class="btn-group card-option">
                                <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="feather icon-more-horizontal"></i>
                                </button>
                                <ul class="list-unstyled card-option dropdown-menu dropdown-menu-right">
                                    <li class="dropdown-item full-card"><a href="#!"><span><i class="feather icon-maximize"></i> maximize</span><span style="display:none"><i class="feather icon-minimize"></i> Restore</span></a></li>
                                    <li class="dropdown-item minimize-card"><a href="#!"><span><i class="feather icon-minus"></i> collapse</span><span style="display:none"><i class="feather icon-plus"></i> expand</span></a></li>
                                    <li class="dropdown-item reload-card"><a href="#!"><i class="feather icon-refresh-cw"></i> reload</a></li>
                                    <li class="dropdown-item close-card"><a href="#!"><i class="feather icon-trash"></i> remove</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="email-chart"></div>
                    </div>
                </div>
            </div>
            <!-- student start -->
            <!-- users visite and profile start -->
            <div class="col-md-12 col-xl-4">
                <div class="row">
                    <div class="col-lg-12 col-md-6">
                        <div class="card seo-card">
                            <div class="card-body seo-statustic">
                                <i class="feather icon-save f-20 text-c-green"></i>
                                <h5 class="mb-1">65%</h5>
                                <p>Memory</p>
                            </div>
                            <div class="seo-chart">
                                <div id="seo-card1"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12 col-md-6">
                        <div class="card seo-card">
                            <div class="card-body seo-statustic">
                                <i class="feather icon-refresh-cw f-20 text-c-blue"></i>
                                <h5 class="mb-1">$46,845</h5>
                                <p>Revenue</p>
                            </div>
                            <div class="seo-chart">

                                <div id="seo-card2"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-xl-8">
                <div class="card bg-c-blue map-visitor-card">
                    <div class="card-header">
                        <h5>Unique Visitor</h5>
                    </div>
                    <div class="card-body pl-0 pb-0">
                        <div id="unique-visitor-chart"></div>
                    </div>
                    <div class="card-footer">
                        <div class="row justify-content-center text-center">
                            <div class="col-auto b-r-default col-6 col-sm-4">
                                <h6>Visits</h6>
                                <p class="text-muted">29.703 Users (40%)</p>
                                <div class="progress">
                                    <div class="progress-bar bg-c-blue" style="width:40%"></div>
                                </div>
                            </div>
                            <div class="col-auto col-6 col-sm-4">
                                <h6>Revenue</h6>
                                <p class="text-muted">20703$ (60%)</p>
                                <div class="progress">
                                    <div class="progress-bar bg-c-green" style="width:60%"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- users visite and profile end -->
            <!-- statustic and process start -->
            <div class="col-lg-8 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Statistics</h5>
                        <div class="card-header-right">
                            <div class="btn-group card-option">
                                <button type="button" class="btn dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="feather icon-more-horizontal"></i>
                                </button>
                                <ul class="list-unstyled card-option dropdown-menu dropdown-menu-right">
                                    <li class="dropdown-item full-card"><a href="#!"><span><i class="feather icon-maximize"></i> maximize</span><span style="display:none"><i class="feather icon-minimize"></i> Restore</span></a></li>
                                    <li class="dropdown-item minimize-card"><a href="#!"><span><i class="feather icon-minus"></i> collapse</span><span style="display:none"><i class="feather icon-plus"></i> expand</span></a></li>
                                    <li class="dropdown-item reload-card"><a href="#!"><i class="feather icon-refresh-cw"></i> reload</a></li>
                                    <li class="dropdown-item close-card"><a href="#!"><i class="feather icon-trash"></i> remove</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="Statistics-chart"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Process Compliance</h5>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <p class="f-50 d-inline-block m-t-30 m-b-30">0.4</p>
                                <i class="feather icon-arrow-down text-c-red f-26 m-l-5"></i>
                                <span class="text-muted">2018 (Jan - Jun)</span>
                                <div class="m-t-30">
                                    <a href="#!" class="text-underline text-c-blue"><small>Previous Quarters</small></a>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div id="process-complience-chart"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- statustic and process end -->
            <!-- users statustic start -->
            <div class="col-lg-4 col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5>Active user</h5>
                    </div>
                    <div class="card-body">
                        <div id="user-chart1"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5>Page view</h5>
                    </div>
                    <div class="card-body">
                        <div id="user-chart2"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5>New installation</h5>
                    </div>
                    <div class="card-body">
                        <div id="user-chart3"></div>
                    </div>
                </div>
            </div>
            <!-- users statustic end -->
            <!-- amount-card start -->
            <div class="col-md-6 col-xl-3">
                <div class="card bg-c-blue overflow-hidden amount-card">
                    <div class="card-body pb-1">
                        <i class="feather icon-arrow-up"></i>
                        <h4 class="text-white">$4600,00</h4>
                    </div>
                    <div id="amunt-card1"></div>
                    <p class="text-dark">Amount Founded</p>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="card bg-c-green overflow-hidden amount-card">
                    <div class="card-body pb-1">
                        <i class="feather icon-arrow-down"></i>
                        <h4 class="text-white">$387.00</h4>
                    </div>
                    <div id="amunt-card2"></div>
                    <p class="text-dark">Balance</p>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="card bg-c-yellow overflow-hidden amount-card">
                    <div class="card-body pb-1">
                        <i class="feather icon-arrow-up"></i>
                        <h4 class="text-white">$8350.00</h4>
                    </div>
                    <div id="amunt-card3"></div>
                    <p class="text-dark">Payback Amount</p>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="card bg-c-red overflow-hidden amount-card">
                    <div class="card-body pb-1">
                        <i class="feather icon-arrow-down"></i>
                        <h4 class="text-white">$123.00</h4>
                    </div>
                    <div id="amunt-card4"></div>
                    <p class="text-dark">Planned Collection Income</p>
                </div>
            </div>
            <!-- amount-card end -->
            <!-- support-tracker start -->
            <div class="col-xl-4 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <h6>Support Analytics</h6>
                            </div>
                            <div class="col">
                                <div class="dropdown float-right">
                                    <a class="dropdown-toggle text-c-blue" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Last Week
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="#">1 week</a>
                                        <a class="dropdown-item" href="#">2 year</a>
                                        <a class="dropdown-item" href="#">3 month</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row align-items-center">
                            <div class="col-6">
                                <h2 class="mt-2 mb-0">280</h2>
                                <span class="">Tickets</span>
                                <h6 class="mb-0 mt-3">Close: <span class="text-success">120</span></h6>
                                <h6>Response <span class="text-danger">2d</span></h6>
                            </div>
                            <div class="col-6">
                                <div id="hd-complited-ticket"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- support-tracker end -->
            <!-- session-device start -->
            <div class="col-xl-4 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h6>Traffic tracker</h6>
                        <div class="row mt-2">
                            <div class="col-6">
                                <span class="d-block text-uppercase">Inbound</span>
                                <h3 class="mt-1">180 GB</h3>
                                <div class="mt-3" id="transactions1"></div>
                            </div>
                            <div class="col-6">
                                <span class="d-block text-uppercase">Outbound</span>
                                <h3 class="mt-1">597.1 GB</h3>
                                <div class="mt-3" id="transactions2"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- session-device end -->
            <!-- storage-activity start -->
            <div class="col-xl-4 col-md-12">
                <div class="card">
                    <div class="card-body pb-0">
                        <div class="row">
                            <div class="col-auto">
                                <h6>Cloud Computing</h6>
                            </div>
                            <div class="col">
                                <div class="dropdown float-right">
                                    <a class="dropdown-toggle text-c-blue" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">weekly</a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="#">1 week</a>
                                        <a class="dropdown-item" href="#">2 year</a>
                                        <a class="dropdown-item" href="#">3 month</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-auto">
                                <span class="d-block"><i class="fas fa-circle text-c-green f-10 m-r-10"></i>Storage</span>
                                <h6 class="ml-3 mt-1">10.5 GB</h6>
                            </div>
                            <div class="col">
                                <span class="d-block"><i class="fas fa-circle text-c-purple f-10 m-r-10"></i>Bandwidth</span>
                                <h6 class="ml-3 mt-1">50 GB</h6>
                            </div>
                        </div>
                    </div>
                    <div id="storage-chart"></div>
                </div>
            </div>
            <!-- storage-activity end -->
            <!-- account-section start -->
            <div class="col-xl-8">
                <div class="card">
                    <div class="card-body">
                        <h6 class="text-c-blue mb-3">Department wise annual recurring and profit</h6>
                        <div class="row">
                            <div class="col-auto">
                                <h3>$687,578</h3>
                                <h6><i class="feather icon-trending-down text-c-red mr-2"></i>Marketing Growth</h6>
                                <span>Measure How Fast You're Growing in<br>current Market.<span class="text-c-blue">Learn More</span></span>
                            </div>
                            <div class="col">
                                <h3>30%</h3>
                                <h6><i class="feather icon-trending-up text-c-blue mr-2"></i>Annual profit/stakeholders</h6>
                                <span>Ave 30% or more profite provide to investor as<br>Anual return.<span class="text-c-blue">Learn More</span></span>
                            </div>
                        </div>
                    </div>
                    <div id="account-chart"></div>
                </div>
            </div>
            <!-- account-section end -->
            <!-- traffic-monitor start -->
            <div class="col-xl-4">
                <div class="row">
                    <div class="col-xl-12 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-auto">
                                        <h6>Page view by device</h6>
                                    </div>
                                    <div class="col">
                                        <div class="dropdown float-right">
                                            <a class="dropdown-toggle text-c-blue" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">weekly</a>
                                            <div class="dropdown-menu dropdown-menu-right">
                                                <a class="dropdown-item" href="#">1 week</a>
                                                <a class="dropdown-item" href="#">2 year</a>
                                                <a class="dropdown-item" href="#">3 month</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6 pr-0">
                                        <h6 class="my-3"><i class="feather icon-monitor f-20 mr-2 text-primary"></i>66.6%<span class="text-c-green ml-2 f-14"><i class="feather icon-arrow-up"></i>2%</span></h6>
                                        <h6 class="my-3"><i class="feather icon-tablet f-20 mr-2 text-success"></i>29.7%<span class="text-c-red ml-2 f-14"><i class="feather icon-arrow-down"></i>3%</span></h6>
                                        <h6 class="my-3"><i class="feather icon-smartphone f-20 mr-2 text-danger"></i>32.8%<span class="text-c-green ml-2 f-14"><i class="feather icon-arrow-up"></i>8%</span></h6>
                                    </div>
                                    <div class="col-6">
                                        <div id="chart-percent" class="chart-percent text-center"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12 col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="row d-flex align-items-center">
                                    <div class="col-6 pr-0">
                                        <span class="d-block mb-1"><i class="fas fa-circle f-10 m-r-5 text-primary"></i>Desktop [66.6%]</span>
                                        <span class="d-block mb-1"><i class="fas fa-circle f-10 m-r-5 text-success"></i>Mobile [29.7%]</span>
                                        <span class="d-block"><i class="fas fa-circle f-10 m-r-5 text-warning"></i>Tablet [38.6%]</span>
                                    </div>
                                    <div class="col-6">
                                        <div id="device-chart"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- traffic-monitor end -->
            <!-- conversion-section start -->
            <div class="col-sm-12">
                <div class="row no-gutters">
                    <div class="col-md-4 col-xl-2 col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <span>Transactions</span>
                                <h3>61</h3>
                                <div id="real4-chart"></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4 col-xl-2 col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <span>Current stock</span>
                                <h3>50</h3>
                                <div id="real6-chart"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-xl-2 col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <span>Page bounce rate</span>
                                <h3>0.50%</h3>
                                <div id="real1-chart"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-xl-2 col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <span>Total order value</span>
                                <h3>$213.20</h3>
                                <div id="real5-chart"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-xl-2 col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <span>Revenue</span>
                                <h3>$45,789</h3>
                                <div id="real2-chart"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-xl-2 col-sm-6">
                        <div class="card">
                            <div class="card-body">
                                <span>New Purchases</span>
                                <h3>45</h3>
                                <div id="real3-chart"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- conversion-section end -->
            <!-- moodrate start -->
            <div class="col-xl-4 col-md-5">
                <div class="card rating-bar">
                    <div class="card-body">
                        <div class="row mb-3">
                            <div class="col-6">
                                <h6 class="m-0">Task Completed</h6>
                                <span>Successfull tested</span>
                            </div>
                            <div class="col-6">
                                <h2 class="text-right">60%</h2>
                            </div>
                        </div>
                        <select id="example-1to10" name="rating" autocomplete="off">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10" selected="selected">10</option>
                            <option value="11">11</option>
                            <option value="12">12</option>
                            <option value="13">13</option>
                            <option value="14">14</option>
                            <option value="15">15</option>
                            <option value="16">16</option>
                            <option value="17">17</option>
                            <option value="18">18</option>
                        </select>
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <h6 class="mb-3">Session by time of day</h6>
                        <div id="time-user"></div>
                    </div>
                </div>
            </div>
            <!-- moodrate end -->
            <!-- Population-section start -->
            <div class="col-xl-8 col-md-7">
                <div class="card">
                    <div class="card-header">
                        <h5>Product manufacturing completion by Region</h5>
                    </div>
                    <div class="card-body">
                        <div id="horizontal-bar-chart"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xl-6 col-md-12">
                        <!-- conversion1-section start -->
                        <div class="card">
                            <div class="card-body">
                                <h6>Conversions</h6>
                                <h4 class="m-0">0.85%<span class="text-c-blue ml-2"><i class="feather icon-arrow-up"></i>0.50%</span></h4>
                                <span>Purchased</span>
                            </div>
                            <div id="coversions-chart"></div>
                        </div>
                        <!-- conversion1-section end -->
                    </div>
                    <div class="col-xl-6 col-md-12">
                        <!-- site-section start -->
                        <div class="card">
                            <div class="card-body">
                                <div class="row d-flex align-items-center">
                                    <div class="col-6">
                                        <h6>Active customer <span class="d-block">on site</span></h6>
                                        <h2 class="m-0">2.86</h2>
                                        <span class="text-c-green">+85.9%</span>
                                    </div>
                                    <div class="col-6">
                                        <div id="site-chart"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- site-section end -->
                    </div>
                </div>
            </div>
            <!-- Population-section End -->
            <!-- customer-section start -->
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h6>Customer Satisfaction</h6>
                        <span>It takes continuous effort to maintain high customer satisfaction levels.Internal and external quality measures are often tied together.,as the opinion...</span>
                        <span class="text-c-blue d-block">Learn more..</span>
                        <div class="row d-flex justify-content-center align-items-center">
                            <div class="col">
                                <div id="satisfaction-chart"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- customer-section end -->
            <!-- Traffic-section start -->
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h5>Marketing campaign</h5>
                    </div>
                    <div class="card-body">
                        <div id="traffic-chart1"></div>
                    </div>
                </div>
            </div>
            <!-- Traffic-section end -->
            <!-- view-section start -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <h3>4856</h3>
                            </div>
                            <div class="col-6 text-right">
                                <span>Views</span>
                            </div>
                        </div>
                    </div>
                    <div id="view-chart"></div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <h3>678</h3>
                            </div>
                            <div class="col-6 text-right">
                                <span>Active Users</span>
                            </div>
                        </div>
                    </div>
                    <div id="view-chart1"></div>
                </div>
            </div>
            <!-- view-section end -->
            <!-- time-section start -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h5>Time on Site</h5>
                    </div>
                    <div class="card-body">
                        <div id="time-chart"></div>
                        <div class="row mt-2">
                            <div class="col-6">
                                <span class="text-muted"><i class="fas fa-circle text-c-green f-10 m-r-10"></i>Time on site</span>
                            </div>
                            <div class="col-6 text-right">
                                <span class="text-muted">1:31</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- time-section end -->
            <!-- browser-section start -->
            <div class="col-md-4">
                <div class="card table-card">
                    <div class="card-header borderless">
                        <h5>Browser States</h5>
                    </div>
                    <div class="card-body px-0 py-0">
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <tbody>
                                    <tr>
                                        <td>Google Chrome</td>
                                        <td><span class="text-right d-block m-0"><span class="m-r-15">21%</span><span class="data-attributes" data-peity='{ "fill": ["#4099ff", "#eeeeee"],"innerRadius": 8, "radius": 13 }'>5/7</span></span></td>
                                    </tr>
                                    <tr>
                                        <td>Mozila Firefox</td>
                                        <td><span class="text-right d-block m-0"><span class="m-r-15">76%</span><span class="data-attributes" data-peity='{ "fill": ["#FF5370", "#eeeeee"],"innerRadius": 8, "radius": 13 }'>3/8</span></span></td>
                                    </tr>
                                    <tr>
                                        <td>Apple Safari</td>
                                        <td><span class="text-right d-block m-0"><span class="m-r-15">20%</span><span class="data-attributes" data-peity='{ "fill": ["#2ed8b6", "#eeeeee"],"innerRadius": 8, "radius": 13 }'>5/6</span></span></td>
                                    </tr>
                                    <tr>
                                        <td>Internet Explorer</td>
                                        <td><span class="text-right d-block m-0"><span class="m-r-15">26%</span><span class="data-attributes" data-peity='{ "fill": ["#7759de", "#eeeeee"],"innerRadius": 8, "radius": 13 }'>2/6</span></span></td>
                                    </tr>
                                    <tr>
                                        <td>Opera mini</td>
                                        <td><span class="text-right d-block m-0"><span class="m-r-15">27%</span><span class="data-attributes" data-peity='{ "fill": ["#FF9800", "#eeeeee"],"innerRadius": 8, "radius": 13 }'>5/7</span></span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- browser-section end -->
            <!-- visit-section start -->
            <div class="col-xl-5 col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-auto">
                                <span>Customers</span>
                            </div>
                            <div class="col text-right">
                                <h2 class="mb-0">826</h2>
                                <span class="text-c-green">8.2%<i class="feather icon-trending-up ml-1"></i></span>
                            </div>
                        </div>
                        <div id="customer-chart" style="height:200px;"></div>
                        <div class="row mt-4">
                            <div class="col">
                                <h3 class="m-0"><i class="fas fa-circle f-10 m-r-5 text-primary"></i>674</h3>
                                <span class="ml-3">New</span>
                            </div>
                            <div class="col">
                                <h3 class="m-0"><i class="fas fa-circle text-c-blue f-10 m-r-5 text-success"></i>182</h3>
                                <span class="ml-3">Return</span>
                            </div>
                            <div class="col">
                                <h3 class="m-0"><i class="fas fa-circle text-c-purple f-10 m-r-5 text-danger"></i>768</h3>
                                <span class="ml-3">Custom</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- visit-section end -->
            <!-- Population-section start -->
            <div class="col-xl-7 col-md-12">
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h5>Current project progress</h5>
                            </div>
                            <div class="card-body">
                                <h6 class="mb-3"><span class="pie_1" data-peity='{"radius": 12 }'>226,134</span><span class="m-l-10">AFSL web app</span></h6>
                                <h6 class="mb-3"><span class="pie_2" data-peity='{"radius": 12 }'>1,4</span><span class="m-l-10">Norttech website</span></h6>
                                <h6 class="mb-0"><span class="pie_3" data-peity='{"radius": 12 }'>1/3</span><span class="m-l-10">Maestro iris attendance</span></h6>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <h6>New stock <span class="text-muted">( purchased )</span></h6>
                                <h4 class="m-0">0.85%<span class="text-info ml-2"><i class="feather icon-arrow-up"></i>0.50%</span></h4>
                            </div>
                            <div id="coversions-chart1"></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h5>Sales Report</h5>
                            </div>
                            <div class="card-body">
                                <div id="sale-chart" style="height:160px;"></div>
                                <div class="row mt-3 d-flex align-items-center text-center">
                                    <div class="col-6">
                                        <h6>$1000</h6>
                                        <span>Target</span>
                                    </div>
                                    <div class="col-6">
                                        <h6>$985</h6>
                                        <span>Last week</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Population-section end -->
            <!-- total-revenue start -->
            <div class="col-xl-4 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Total Revenue</h5>
                    </div>
                    <div class="card-body">
                        <div id="revenue-chart"></div>
                        <span class="text-center text-muted d-block">Total sales made today</span>
                    </div>
                    <div class="card-footer">
                        <div class="row d-flex align-items-center text-center">
                            <div class="col">
                                <h6>$1258</h6>
                                <span>Target</span>
                            </div>
                            <div class="col">
                                <h6>$975</h6>
                                <span>Last week</span>
                            </div>
                            <div class="col">
                                <h6>$500</h6>
                                <span>Last Day</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- total-revenue end -->
            <!-- market-dow start -->
            <div class="col-xl-4 col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5>Market Sales</h5>
                    </div>
                    <div class="card-body">
                        <h3><i class="feather icon-trending-down text-c-red mr-3"></i>27,695.65</h3>
                        <div class="row d-flex align-items-center text-center mt-4">
                            <div class="col">
                                <h6>Youtube</h6>
                                <span class="text-c-red">- 16.85%</span>
                            </div>
                            <div class="col">
                                <h6>Facebook</h6>
                                <span class="text-c-purple">+ 45.36%</span>
                            </div>
                            <div class="col">
                                <h6>Twitter</h6>
                                <span class="text-c-blue">+ 50.69%</span>
                            </div>
                        </div>
                        <div id="market-chart" style="height:200px;"></div>
                    </div>
                </div>
            </div>
            <!-- market-dow end -->
            <!-- sales-section start -->
            <div class="col-xl-4 col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5>Sale report of year</h5>
                    </div>
                    <div class="card-body">
                        <div id="type-chart" style="height:200px;"></div>
                        <div class="mt-3">
                            <span class="d-block mb-2"><i class="fas fa-circle f-10 m-r-15 text-danger"></i>Desktop Computers<span class="float-right f-w-400">76.7%</span></span>
                            <span class="d-block mb-2"><i class="fas fa-circle f-10 m-r-15 text-warning"></i>Smartphones<span class="float-right f-w-400">15%</span></span>
                            <span class="d-block"><i class="fas fa-circle f-10 m-r-15 text-info"></i>Tablets<span class="float-right f-w-400">30%</span></span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- sales-section end -->
            <!-- store-section start -->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div class="row">
                            <div class="col">
                                <h5>Store Visitors</h5>
                            </div>
                            <div class="col-auto text-right">
                                <span>This Month</span>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row mb-2">
                            <div class="col-auto">
                                <h4 class="m-0">563,756<i class="feather icon-arrow-up text-c-green"></i></h4>
                                <span>Visits per Day</span>
                            </div>
                            <div class="col-auto">
                                <h4 class="m-0">78,569<i class="feather icon-arrow-down text-c-red"></i></h4>
                                <span>Total Visitors</span>
                            </div>
                            <div class="col">
                                <h4 class="m-0">40.05%<i class="feather icon-arrow-up text-c-green"></i></h4>
                                <span>Bounce Rate</span>
                            </div>
                        </div>
                        <div id="site-visitor-chart" style="height:250px;width:100%;"></div>
                    </div>
                </div>
            </div>
            <!-- store-section end -->
            <!-- sessions-section start -->
            <div class="col-xl-12">
                <div class="card table-card">
                    <div class="card-header">
                        <h5>Advertising campaign monitor</h5>
                    </div>
                    <div class="card-body px-0 py-0">
                        <div id="traffic-chart" style="height:400px;"></div>
                        <div class="table-responsive">
                            <div class="session-scroll" style="height:380px;position:relative;">
                                <table class="table table-hover m-b-0">
                                    <thead>
                                        <tr>
                                            <th><span>Campaign date</span></th>
                                            <th><span>Click <a class="help" data-toggle="popover" title="Popover title" data-content="And here's some amazing content. It's very engaging. Right?"><i
                                                            class="feather icon-help-circle f-16"></i></a></span></th>
                                            <th><span>Cost <a class="help" data-toggle="popover" title="Popover title" data-content="And here's some amazing content. It's very engaging. Right?"><i class="feather icon-help-circle f-16"></i></a></span>
                                            </th>
                                            <th><span>CTR <a class="help" data-toggle="popover" title="Popover title" data-content="And here's some amazing content. It's very engaging. Right?"><i class="feather icon-help-circle f-16"></i></a></span>
                                            </th>
                                            <th><span>ARPU <a class="help" data-toggle="popover" title="Popover title" data-content="And here's some amazing content. It's very engaging. Right?"><i class="feather icon-help-circle f-16"></i></a></span>
                                            </th>
                                            <th><span>ECPI <a class="help" data-toggle="popover" title="Popover title" data-content="And here's some amazing content. It's very engaging. Right?"><i class="feather icon-help-circle f-16"></i></a></span>
                                            </th>
                                            <th><span>ROI <a class="help" data-toggle="popover" title="Popover title" data-content="And here's some amazing content. It's very engaging. Right?"><i class="feather icon-help-circle f-16"></i></a></span>
                                            </th>
                                            <th><span>Revenue <a class="help" data-toggle="popover" title="Popover title" data-content="And here's some amazing content. It's very engaging. Right?"><i
                                                            class="feather icon-help-circle f-16"></i></a></span></th>
                                            <th><span>Conversions <a class="help" data-toggle="popover" title="Popover title" data-content="And here's some amazing content. It's very engaging. Right?"><i
                                                            class="feather icon-help-circle f-16"></i></a></span></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Total and average</td>
                                            <td>1300</td>
                                            <td>1025</td>
                                            <td>14005</td>
                                            <td>95,3%</td>
                                            <td>29,7%</td>
                                            <td>3,25</td>
                                            <td>2:30</td>
                                            <td>45.5%</td>
                                        </tr>
                                        <tr>
                                            <td>8-11-2016</td>
                                            <td>786
                                                <div class="progress mt-1" style="height:4px;">
                                                    <div class="progress-bar bg-danger rounded" role="progressbar" style="width: 60%;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td>485
                                                <div class="progress mt-1" style="height:4px;">
                                                    <div class="progress-bar bg-primary rounded" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td>769
                                                <div class="progress mt-1" style="height:4px;">
                                                    <div class="progress-bar bg-warning rounded" role="progressbar" style="width: 70%;" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td>45,3%
                                                <div class="progress mt-1" style="height:4px;">
                                                    <div class="progress-bar bg-success rounded" role="progressbar" style="width: 60%;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td>6,7%
                                                <div class="progress mt-1" style="height:4px;">
                                                    <div class="progress-bar bg-info rounded" role="progressbar" style="width: 30%;" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td>8,56
                                                <div class="progress mt-1" style="height:4px;">
                                                    <div class="progress-bar bg-danger rounded" role="progressbar" style="width: 40%;" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td>10:55
                                                <div class="progress mt-1" style="height:4px;">
                                                    <div class="progress-bar bg-warning rounded" role="progressbar" style="width: 70%;" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td>33.8%
                                                <div class="progress mt-1" style="height:4px;">
                                                    <div class="progress-bar bg-success rounded" role="progressbar" style="width: 40%;" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>15-10-2016</td>
                                            <td>786
                                                <div class="progress mt-1" style="height:4px;">
                                                    <div class="progress-bar bg-danger rounded" role="progressbar" style="width: 65%;" aria-valuenow="65" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td>523
                                                <div class="progress mt-1" style="height:4px;">
                                                    <div class="progress-bar bg-primary rounded" role="progressbar" style="width: 80%;" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td>736
                                                <div class="progress mt-1" style="height:4px;">
                                                    <div class="progress-bar bg-warning rounded" role="progressbar" style="width: 80%;" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td>78,3%
                                                <div class="progress mt-1" style="height:4px;">
                                                    <div class="progress-bar bg-success rounded" role="progressbar" style="width: 70%;" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td>6,6%
                                                <div class="progress mt-1" style="height:4px;">
                                                    <div class="progress-bar bg-info rounded" role="progressbar" style="width: 70%;" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td>7,56
                                                <div class="progress mt-1" style="height:4px;">
                                                    <div class="progress-bar bg-danger rounded" role="progressbar" style="width: 44%;" aria-valuenow="44" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td>4:30
                                                <div class="progress mt-1" style="height:4px;">
                                                    <div class="progress-bar bg-warning rounded" role="progressbar" style="width: 68%;" aria-valuenow="68" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td>76.8%
                                                <div class="progress mt-1" style="height:4px;">
                                                    <div class="progress-bar bg-success rounded" role="progressbar" style="width: 90%;" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>8-8-2017</td>
                                            <td>624
                                                <div class="progress mt-1" style="height:4px;">
                                                    <div class="progress-bar bg-danger rounded" role="progressbar" style="width: 45%;" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td>436
                                                <div class="progress mt-1" style="height:4px;">
                                                    <div class="progress-bar bg-primary rounded" role="progressbar" style="width: 55%;" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td>756
                                                <div class="progress mt-1" style="height:4px;">
                                                    <div class="progress-bar bg-warning rounded" role="progressbar" style="width: 95%;" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td>78,3%
                                                <div class="progress mt-1" style="height:4px;">
                                                    <div class="progress-bar bg-success rounded" role="progressbar" style="width: 38%;" aria-valuenow="38" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td>6,4%
                                                <div class="progress mt-1" style="height:4px;">
                                                    <div class="progress-bar bg-info rounded" role="progressbar" style="width: 30%;" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td>9,45
                                                <div class="progress mt-1" style="height:4px;">
                                                    <div class="progress-bar bg-danger rounded" role="progressbar" style="width: 41%;" aria-valuenow="41" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td>9:05
                                                <div class="progress mt-1" style="height:4px;">
                                                    <div class="progress-bar bg-warning rounded" role="progressbar" style="width: 67%;" aria-valuenow="67" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td>8.63%
                                                <div class="progress mt-1" style="height:4px;">
                                                    <div class="progress-bar bg-success rounded" role="progressbar" style="width: 41%;" aria-valuenow="41" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>11-12-2017</td>
                                            <td>423
                                                <div class="progress mt-1" style="height:4px;">
                                                    <div class="progress-bar bg-danger rounded" role="progressbar" style="width: 54%;" aria-valuenow="54" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td>123
                                                <div class="progress mt-1" style="height:4px;">
                                                    <div class="progress-bar bg-primary rounded" role="progressbar" style="width: 70%;" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td>756
                                                <div class="progress mt-1" style="height:4px;">
                                                    <div class="progress-bar bg-warning rounded" role="progressbar" style="width: 75%;" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td>78,6%
                                                <div class="progress mt-1" style="height:4px;">
                                                    <div class="progress-bar bg-success rounded" role="progressbar" style="width: 60%;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td>45,6%
                                                <div class="progress mt-1" style="height:4px;">
                                                    <div class="progress-bar bg-info rounded" role="progressbar" style="width: 90%;" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td>6,85
                                                <div class="progress mt-1" style="height:4px;">
                                                    <div class="progress-bar bg-danger rounded" role="progressbar" style="width: 30%;" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td>7:45
                                                <div class="progress mt-1" style="height:4px;">
                                                    <div class="progress-bar bg-warning rounded" role="progressbar" style="width: 40%;" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td>33.8%
                                                <div class="progress mt-1" style="height:4px;">
                                                    <div class="progress-bar bg-success rounded" role="progressbar" style="width: 80%;" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>1-6-2015</td>
                                            <td>465
                                                <div class="progress mt-1" style="height:4px;">
                                                    <div class="progress-bar bg-danger rounded" role="progressbar" style="width: 66%;" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td>463
                                                <div class="progress mt-1" style="height:4px;">
                                                    <div class="progress-bar bg-primary rounded" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td>456
                                                <div class="progress mt-1" style="height:4px;">
                                                    <div class="progress-bar bg-warning rounded" role="progressbar" style="width: 30%;" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td>68,6%
                                                <div class="progress mt-1" style="height:4px;">
                                                    <div class="progress-bar bg-success rounded" role="progressbar" style="width: 30%;" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td>76,6%
                                                <div class="progress mt-1" style="height:4px;">
                                                    <div class="progress-bar bg-info rounded" role="progressbar" style="width: 32%;" aria-valuenow="32" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td>7,56
                                                <div class="progress mt-1" style="height:4px;">
                                                    <div class="progress-bar bg-danger rounded" role="progressbar" style="width: 70%;" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td>8:45
                                                <div class="progress mt-1" style="height:4px;">
                                                    <div class="progress-bar bg-warning rounded" role="progressbar" style="width: 71%;" aria-valuenow="71" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td>39.8%
                                                <div class="progress mt-1" style="height:4px;">
                                                    <div class="progress-bar bg-success rounded" role="progressbar" style="width: 38%;" aria-valuenow="38" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>8-11-2016</td>
                                            <td>786
                                                <div class="progress mt-1" style="height:4px;">
                                                    <div class="progress-bar bg-danger rounded" role="progressbar" style="width: 43%;" aria-valuenow="43" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td>485
                                                <div class="progress mt-1" style="height:4px;">
                                                    <div class="progress-bar bg-primary rounded" role="progressbar" style="width: 70%;" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td>769
                                                <div class="progress mt-1" style="height:4px;">
                                                    <div class="progress-bar bg-warning rounded" role="progressbar" style="width: 69%;" aria-valuenow="69" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td>45,3%
                                                <div class="progress mt-1" style="height:4px;">
                                                    <div class="progress-bar bg-success rounded" role="progressbar" style="width: 90%;" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td>6,7%
                                                <div class="progress mt-1" style="height:4px;">
                                                    <div class="progress-bar bg-info rounded" role="progressbar" style="width: 80%;" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td>8,56
                                                <div class="progress mt-1" style="height:4px;">
                                                    <div class="progress-bar bg-danger rounded" role="progressbar" style="width: 41%;" aria-valuenow="41" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td>10:55
                                                <div class="progress mt-1" style="height:4px;">
                                                    <div class="progress-bar bg-warning rounded" role="progressbar" style="width: 55%;" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td>33.8%
                                                <div class="progress mt-1" style="height:4px;">
                                                    <div class="progress-bar bg-success rounded" role="progressbar" style="width: 70%;" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>15-10-2016</td>
                                            <td>786
                                                <div class="progress mt-1" style="height:4px;">
                                                    <div class="progress-bar bg-danger rounded" role="progressbar" style="width: 61%;" aria-valuenow="61" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td>523
                                                <div class="progress mt-1" style="height:4px;">
                                                    <div class="progress-bar bg-primary rounded" role="progressbar" style="width: 45%;" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td>736
                                                <div class="progress mt-1" style="height:4px;">
                                                    <div class="progress-bar bg-warning rounded" role="progressbar" style="width: 70%;" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td>78,3%
                                                <div class="progress mt-1" style="height:4px;">
                                                    <div class="progress-bar bg-success rounded" role="progressbar" style="width: 60%;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td>6,6%
                                                <div class="progress mt-1" style="height:4px;">
                                                    <div class="progress-bar bg-info rounded" role="progressbar" style="width: 30%;" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td>7,56
                                                <div class="progress mt-1" style="height:4px;">
                                                    <div class="progress-bar bg-danger rounded" role="progressbar" style="width: 40%;" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td>4:30
                                                <div class="progress mt-1" style="height:4px;">
                                                    <div class="progress-bar bg-warning rounded" role="progressbar" style="width: 70%;" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td>76.8%
                                                <div class="progress mt-1" style="height:4px;">
                                                    <div class="progress-bar bg-success rounded" role="progressbar" style="width: 40%;" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>8-8-2017</td>
                                            <td>624
                                                <div class="progress mt-1" style="height:4px;">
                                                    <div class="progress-bar bg-danger rounded" role="progressbar" style="width: 66%;" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td>436
                                                <div class="progress mt-1" style="height:4px;">
                                                    <div class="progress-bar bg-primary rounded" role="progressbar" style="width: 55%;" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td>756
                                                <div class="progress mt-1" style="height:4px;">
                                                    <div class="progress-bar bg-warning rounded" role="progressbar" style="width: 90%;" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td>78,3%
                                                <div class="progress mt-1" style="height:4px;">
                                                    <div class="progress-bar bg-success rounded" role="progressbar" style="width: 66%;" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td>6,4%
                                                <div class="progress mt-1" style="height:4px;">
                                                    <div class="progress-bar bg-info rounded" role="progressbar" style="width: 90%;" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td>9,45
                                                <div class="progress mt-1" style="height:4px;">
                                                    <div class="progress-bar bg-danger rounded" role="progressbar" style="width: 95%;" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td>9:05
                                                <div class="progress mt-1" style="height:4px;">
                                                    <div class="progress-bar bg-warning rounded" role="progressbar" style="width: 95%;" aria-valuenow="95" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td>8.63%
                                                <div class="progress mt-1" style="height:4px;">
                                                    <div class="progress-bar bg-success rounded" role="progressbar" style="width: 39%;" aria-valuenow="39" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>11-12-2017</td>
                                            <td>423
                                                <div class="progress mt-1" style="height:4px;">
                                                    <div class="progress-bar bg-danger rounded" role="progressbar" style="width: 35%;" aria-valuenow="35" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td>123
                                                <div class="progress mt-1" style="height:4px;">
                                                    <div class="progress-bar bg-primary rounded" role="progressbar" style="width: 60%;" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td>756
                                                <div class="progress mt-1" style="height:4px;">
                                                    <div class="progress-bar bg-warning rounded" role="progressbar" style="width: 70%;" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td>78,6%
                                                <div class="progress mt-1" style="height:4px;">
                                                    <div class="progress-bar bg-success rounded" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td>45,6%
                                                <div class="progress mt-1" style="height:4px;">
                                                    <div class="progress-bar bg-info rounded" role="progressbar" style="width: 45%;" aria-valuenow="45" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td>6,85
                                                <div class="progress mt-1" style="height:4px;">
                                                    <div class="progress-bar bg-danger rounded" role="progressbar" style="width: 44%;" aria-valuenow="44" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td>7:45
                                                <div class="progress mt-1" style="height:4px;">
                                                    <div class="progress-bar bg-warning rounded" role="progressbar" style="width: 71%;" aria-valuenow="71" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td>33.8%
                                                <div class="progress mt-1" style="height:4px;">
                                                    <div class="progress-bar bg-success rounded" role="progressbar" style="width: 41%;" aria-valuenow="41" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>1-6-2015</td>
                                            <td>465
                                                <div class="progress mt-1" style="height:4px;">
                                                    <div class="progress-bar bg-danger rounded" role="progressbar" style="width: 66%;" aria-valuenow="66" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td>463
                                                <div class="progress mt-1" style="height:4px;">
                                                    <div class="progress-bar bg-primary rounded" role="progressbar" style="width: 50%;" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td>456
                                                <div class="progress mt-1" style="height:4px;">
                                                    <div class="progress-bar bg-warning rounded" role="progressbar" style="width: 30%;" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td>68,6%
                                                <div class="progress mt-1" style="height:4px;">
                                                    <div class="progress-bar bg-success rounded" role="progressbar" style="width: 90%;" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td>76,6%
                                                <div class="progress mt-1" style="height:4px;">
                                                    <div class="progress-bar bg-info rounded" role="progressbar" style="width: 85%;" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td>7,56
                                                <div class="progress mt-1" style="height:4px;">
                                                    <div class="progress-bar bg-danger rounded" role="progressbar" style="width:90%;" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td>8:45
                                                <div class="progress mt-1" style="height:4px;">
                                                    <div class="progress-bar bg-warning rounded" role="progressbar" style="width: 30%;" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                            <td>39.8%
                                                <div class="progress mt-1" style="height:4px;">
                                                    <div class="progress-bar bg-success rounded" role="progressbar" style="width: 38%;" aria-valuenow="38" aria-valuemin="0" aria-valuemax="100"></div>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- sessions-section end -->
            <!-- support-section start -->
            <div class="col-xl-4 col-md-12">
                <div class="card support-bar overflow-hidden">
                    <div class="card-body pb-0">
                        <h2 class="m-0">350</h2>
                        <span class="text-c-blue">Support Requests</span>
                        <p class="mb-3 mt-3">Total number of support requests that come in.</p>
                    </div>
                    <div id="support-chart"></div>
                    <div class="card-footer bg-primary text-white">
                        <div class="row text-center">
                            <div class="col">
                                <h4 class="m-0 text-white">10</h4>
                                <span>Open</span>
                            </div>
                            <div class="col">
                                <h4 class="m-0 text-white">5</h4>
                                <span>Running</span>
                            </div>
                            <div class="col">
                                <h4 class="m-0 text-white">3</h4>
                                <span>Solved</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- support-section end -->
            <!-- average-section start -->
            <div class="col-xl-8 col-md-12">
                <div class="row">
                    <div class="col-sm-6">
                        <div class="card mrr-card">
                            <div class="card-body mb-3">
                                <span class="d-flex align-items-center"><i class="fab fa-bitcoin text-c-blue f-22 m-r-5"></i>Bitcoin</span>
                            </div>
                            <div id="average-chart11" class="position-absolute bottom-chart w-100"></div>
                            <div class="card-body">
                                <span class="float-right">Goal: $75</span>
                                <h3 class="m-0">$80</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card mrr-card">
                            <div class="card-body mb-3">
                                <span class="d-flex align-items-center"><i class="fab fa-ethereum text-c-green f-22 m-r-5"></i>Ethereum</span>
                            </div>
                            <div id="average-chart12" class="position-absolute bottom-chart w-100"></div>
                            <div class="card-body">
                                <span class="float-right">Goal: $75</span>
                                <h3 class="m-0">$80</h3>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="card bg-danger text-white mrr-card">
                            <div class="card-body mb-3">
                                <span>Total ticket Resolved</span>
                            </div>
                            <div id="average-chart3" class="position-absolute bottom-chart" style="height:145px;width:100%;"></div>
                            <div class="card-body">
                                <span class="float-right">pending: 75</span>
                                <h3 class="m-0 text-white">400</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="card bg-warning text-white mrr-card">
                            <div class="card-body mb-3">
                                <span>Avg. Customer Satisfaction</span>
                            </div>
                            <div id="average-chart4" class="position-absolute bottom-chart" style="height:145px;width:100%;"></div>
                            <div class="card-body">
                                <span class="float-right">Reopen: 20%</span>
                                <h3 class="m-0 text-white">75%</h3>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- average-section end -->
            <!-- crypto-section start -->
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="toolbar btn-group">
                            <button id="one_month" class="btn btn-sm btn-outline-primary">1M</button>
                            <button id="six_months" class="btn btn-sm btn-outline-primary">6M</button>
                            <button id="one_year" class="btn btn-sm btn-outline-primary active">1Y</button>
                            <button id="ytd" class="btn btn-sm btn-outline-primary">YTD</button>
                            <button id="all" class="btn btn-sm btn-outline-primary">ALL</button>
                        </div>
                        <div id="crypto-chart"></div>
                    </div>
                </div>
            </div>
            <!-- crypto-section end -->
            <!-- activity feed start -->
            <div class="col-lg-4 col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Customer Feedback</h5>
                    </div>
                    <div class="card-body">
                        <span class="d-block text-c-blue f-24 f-w-600 text-center">365247</span>
                        <div id="feedback-chart"></div>
                        <div class="row justify-content-center m-t-15">
                            <div class="col-auto b-r-default m-t-5 m-b-5">
                                <h4>83%</h4>
                                <p class="text-success m-b-0"><i class="ti-hand-point-up m-r-5"></i>Positive</p>
                            </div>
                            <div class="col-auto m-t-5 m-b-5">
                                <h4>17%</h4>
                                <p class="text-danger m-b-0"><i class="ti-hand-point-down m-r-5"></i>Negative</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- activity feed end -->
        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>
<!-- [ Main Content ] end -->
  
@include('admin.include.footer')
<script src="{{URL::to('public/assets/assets/js/apexcharts.min.js')}}"></script>
<script src="{{URL::to('public/assets/assets/js/chart.js')}}"></script>
<script>
//     window.addEventListener("beforeunload", function (e) {
//   var confirmationMessage = "\o/";

//   (e || window.event).returnValue = confirmationMessage; //Gecko + IE
//   return confirmationMessage;                            //Webkit, Safari, Chrome
// });
</script>