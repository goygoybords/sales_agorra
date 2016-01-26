@extends('layouts.app')

    @section('content')
    <body>
        <section id="container" >
        @include('dashboard.header')
        
        @include('dashboard.sidebar')
        <!--main content start-->
        <section id="main-content">
            <section class="wrapper">
                <!--state overview start-->
                <div class="row state-overview">
                    <div class="col-lg-3 col-sm-6">
                        <section class="panel">
                          <div class="symbol terques">
                              <i class="fa fa-percent"></i>
                          </div>
                            <div class="value">
                                <h1 class="count">123</h1>
                                <p>percent of sale over quota</p>
                            </div>
                        </section>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <section class="panel">
                            <div class="symbol red"><i class="fa fa-user"></i></div>
                            <div class="value">
                                <h1 class=" count2">0</h1>
                                <p> Total Clients</p>
                            </div>
                        </section>
                    </div>
                    <div class="col-lg-3 col-sm-6">
                        <section class="panel">
                            <div class="symbol yellow"><i class=" fa fa-usd"></i></div>
                            <div class="value">
                                <h1 class=" count3">0</h1>
                                <p>Total Projected Sale to Date</p>
                            </div>
                        </section>
                    </div>
                </div>
                <!--state overview end-->
                <div class="row">
                    <div class="col-lg-8">
                        <!--custom chart start-->
                        <div class="border-head"><h3>Percentage of Sales over Quota</h3></div>
                        <div class="custom-bar-chart">
                            <ul class="y-axis">
                                <li><span>100</span></li>
                                <li><span>80</span></li>
                                <li><span>60</span></li>
                                <li><span>40</span></li>
                                <li><span>20</span></li>
                                <li><span>0</span></li>
                            </ul>
                            <div class="bar">
                                <div class="title">JAN-MAR</div>
                                <div class="value tooltips" data-original-title="80%" data-toggle="tooltip" data-placement="top">80%</div>
                            </div>
                            <div class="bar ">
                                <div class="title">APR-JUNE</div>
                                <div class="value tooltips" data-original-title="50%" data-toggle="tooltip" data-placement="top">50%</div>
                            </div>
                            <div class="bar ">
                                <div class="title">JUL-SEPT</div>
                                <div class="value tooltips" data-original-title="40%" data-toggle="tooltip" data-placement="top">40%</div>
                            </div>
                            <div class="bar ">
                                <div class="title">OCT-DEC</div>
                                <div class="value tooltips" data-original-title="55%" data-toggle="tooltip" data-placement="top">55%</div>
                            </div>
                        </div>
                        <!--custom chart end-->
                    </div>
                    <div class="col-lg-4">
                      <!--new earning start-->
                      
                      <!--new earning end-->

                      <!--total earning start-->
                     
                      <!--work progress start-->
                    </div>
                </section>
            </section>
        </section>      
        <!-- Right Slidebar end -->
    </body>
    @endsection
