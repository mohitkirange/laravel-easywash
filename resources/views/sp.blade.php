@extends('layouts.sp-app')

@section('content')
<div class="app-content content container-fluid">
  <div class="content-wrapper">

    <div class="row">
        <div class="col-xl-3 col-lg-6 col-xs-12">
            <div class="card bg-cyan">
                <div class="card-body">
                    <div class="card-block">
                        <div class="media">
                            <div class="media-left media-middle">
                                <i class="icon-pencil white font-large-2 float-xs-left"></i>
                            </div>
                            <div class="media-body white text-xs-right">
                                <h3>{{$services}}</h3>
                                <span>Total services</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-xs-12">
            <div class="card bg-deep-orange">
                <div class="card-body">
                    <div class="card-block">
                        <div class="media">
                            <div class="media-left media-middle">
                                <i class="icon-chat1 white font-large-2 float-xs-left"></i>
                            </div>
                            <div class="media-body white text-xs-right">
                                <h3>{{$comments}}</h3>
                                <span>Total comments</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-xs-12">
            <div class="card bg-teal">
                <div class="card-body">
                    <div class="card-block">
                        <div class="media">
                            <div class="media-left media-middle">
                                <i class="icon-cart4 white font-large-2 float-xs-left"></i>
                            </div>
                            <div class="media-body white text-xs-right">
                                <h3>{{$orders}}</h3>
                                <span>Total orders</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-lg-6 col-xs-12">
            <div class="card bg-pink">
                <div class="card-body">
                    <div class="card-block">
                        <div class="media">
                            <div class="media-left media-middle">
                                <i class=" icon-coin-dollar white font-large-2 float-xs-left"></i>
                            </div>
                            <div class="media-body white text-xs-right">
                                <h3>${{$amount}}</h3>
                                <span>Earned amount</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="content-body"><!-- Description -->
        <div class="row">
          <div class="row match-height">
            <div class="col-xl-5 col-lg-12">
                <div class="card card-inverse bg-info">
                    <div class="card-body">
                        <div class="position-relative">
                            <div class="chart-title position-absolute mt-2 ml-2 white">
                                <h1 class="display-4">${{$amount}}</h1>
                                <span>Total earning</span>
                            </div>
                            <canvas id="emp-satisfaction" class="height-450 block"></canvas>
                            <div class="chart-stats position-absolute position-bottom-0 position-right-0 mb-2 mr-3 white">
                                 from last month.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-7 col-lg-12">
                <div class="card">
                    <div class="card-header">
                    <h4 class="card-title">All orders</h4>
                    <a class="heading-elements-toggle"><i class="icon-ellipsis font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a data-action="reload"><i class="icon-reload"></i></a></li>
                            <li><a data-action="expand"><i class="icon-expand2"></i></a></li>
                        </ul>
                    </div>
                </div>
                    <div class="card-body">
                        <div class="card-block">
                            <p class="m-0">Total number of orders: {{$orders}}<span class="float-xs-right"><a href="#" target="_blank">Order Summary <i class="icon-arrow-right2"></i></a></span></p>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th>Order ID</th>
                                        <th>User ID</th>
                                        <th>Service ID</th>
                                        <th>Total</th>

                                    </tr>
                                </thead>
                                <tbody>
                                  @foreach($allorders as $allorders)
                                    <tr>
                                        <td class="text-truncate">{{$allorders->id}}</td>
                                        <td class="text-truncate">{{$allorders->user_id}}</td>
                                        <td class="text-truncate">{{$allorders->service_id}}</td>
                                        <td class="text-truncate">${{$allorders->finaltotal}}</td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
          </div>
        </div>
    </div>


  </div>
</div>
<!-- ////////////////////////////////////////////////////////////////////////////-->


<footer class="footer footer-static footer-light navbar-border">
  <p class="clearfix text-muted text-sm-center mb-0 px-2"><span class="float-md-left d-xs-block d-md-inline-block">Copyright  &copy; 2018 <a href="" target="_blank" class="text-bold-800 grey darken-2">EASYWASH </a>, All rights reserved. </span><span class="float-md-right d-xs-block d-md-inline-block">Hand-crafted & Made with <i class="icon-heart5 pink"></i></span></p>
</footer>

<!-- BEGIN VENDOR JS-->
<script src="{{ asset( 'app/app-assets/js/core/libraries/jquery.min.js')}}" type="text/javascript"></script>
<script src="{{ asset( 'app/app-assets/vendors/js/ui/tether.min.js')}}" type="text/javascript"></script>
<script src="{{ asset( 'app/app-assets/js/core/libraries/bootstrap.min.js')}}" type="text/javascript"></script>
<script src="{{ asset( 'app/app-assets/vendors/js/ui/perfect-scrollbar.jquery.min.js')}}" type="text/javascript"></script>
<script src="{{ asset( 'app/app-assets/vendors/js/ui/unison.min.js')}}" type="text/javascript"></script>
<script src="{{ asset( 'app/app-assets/vendors/js/ui/blockUI.min.js')}}" type="text/javascript"></script>
<script src="{{ asset( 'app/app-assets/vendors/js/ui/jquery.matchHeight-min.js')}}" type="text/javascript"></script>
<script src="{{ asset( 'app/app-assets/vendors/js/ui/screenfull.min.js')}}" type="text/javascript"></script>
<script src="{{ asset( 'app/app-assets/vendors/js/extensions/pace.min.js')}}" type="text/javascript"></script>
<!-- BEGIN VENDOR JS-->
<script type="text/javascript" src="{{ asset( 'app/app-assets/vendors/js/charts/chart.min.js')}}"></script>
<!-- BEGIN PAGE VENDOR JS-->
<script type="text/javascript" src="{{ asset( 'app/app-assets/vendors/js/ui/prism.min.js')}}"></script>
<!-- END PAGE VENDOR JS-->
<!-- BEGIN ROBUST JS-->
<script src="{{ asset( 'app/app-assets/js/core/app-menu.js')}}" type="text/javascript"></script>
<script src="{{ asset( 'app/app-assets/js/core/app.js')}}" type="text/javascript"></script>

    <script src="{{ asset( 'app/app-assets/js/scripts/cards/card-charts.js')}}" type="text/javascript"></script>
    <script type="text/javascript">

        /****************************************************
        *               Employee Satisfaction               *
        ****************************************************/
        //Get the context of the Chart canvas element we want to select
        var ctx1 = document.getElementById("emp-satisfaction").getContext("2d");

        // Create Linear Gradient
        var white_gradient = ctx1.createLinearGradient(0, 0, 0,400);
        white_gradient.addColorStop(0, 'rgba(255,255,255,0.5)');
        white_gradient.addColorStop(1, 'rgba(255,255,255,0)');

        // Chart Options
        var empSatOptions = {
            responsive: true,
            maintainAspectRatio: false,
            datasetStrokeWidth : 3,
            pointDotStrokeWidth : 4,
            tooltipFillColor: "rgba(0,0,0,0.8)",
            legend: {
                display: false,
            },
            hover: {
                mode: 'label'
            },
            scales: {
                xAxes: [{
                    display: false,
                }],
                yAxes: [{
                    display: false,
                    ticks: {
                        min: 0,
                        max: 100
                    },
                }]
            },
            title: {
                display: false,
                fontColor: "#FFF",
                fullWidth: false,
                fontSize: 50,
                text: '100%'
            }
        };

        // Chart Data
        var empSatData = {

            labels: {{$paymentids}},
            datasets: [{
                label: "Amount",
                data: {{$amounts}},
                backgroundColor: white_gradient,
                borderColor: "rgba(255,255,255,1)",
                borderWidth: 2,
                strokeColor : "#ff6c23",
                pointColor : "#fff",
                pointBorderColor: "rgba(255,255,255,1)",
                pointBackgroundColor: "#3BAFDA",
                pointBorderWidth: 2,
                pointHoverBorderWidth: 2,
                pointRadius: 5,
            }]
        };

        var empSatconfig = {
            type: 'line',

            // Chart Options
            options : empSatOptions,

            // Chart Data
            data : empSatData
        };

        // Create the chart
        var areaChart = new Chart(ctx1, empSatconfig);

    </script>
<!-- END ROBUST JS-->
<!-- BEGIN PAGE LEVEL JS-->
<!-- END PAGE LEVEL JS-->
</body>
</html>

@endsection
