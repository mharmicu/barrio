<?php

use Maize\Encryptable\Encryption;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/styles.css" rel="stylesheet" />
    <title>Dashboard | BARRIO</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="icon" type="image/png" href="{{ asset('/img/385-logo.png') }}">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-date-fns/dist/chartjs-adapter-date-fns.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-chart-matrix@1.2.0/dist/chartjs-chart-matrix.min.js"></script>
    <script src="https://unpkg.com/chart.js-plugin-labels-dv/dist/chartjs-plugin-labels.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/chartjs-plugin-datalabels/2.1.0/chartjs-plugin-datalabels.min.js" integrity="sha512-Tfw6etYMUhL4RTki37niav99C6OHwMDB2iBT5S5piyHO+ltK2YX8Hjy9TXxhE1Gm/TmAV0uaykSpnHKFIAif/A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>


    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/wordcloud.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <script src="https://code.highcharts.com/themes/dark-unica.js"></script>


    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />

    <style>
        /*styling the controls of basic carousel */
        .carousel-control-prev {
            /*size */
            height: 10px;
            width: 10px;
            margin-block: auto;
        }

        .carousel-control-next {
            /*size */
            height: 10px;
            width: 10px;
            margin-block: auto;
        }

        #lineChart {
            width: 100% !important;
        }

        #barChart {
            width: 100% !important;
        }

        #lineBlotter {
            width: 100% !important;
        }

        #doughnutChart {
            width: 100% !important;
        }

        #onGoingChart {
            width: 100% !important;
        }

        #pieChartIncident {
            width: 100% !important;
        }

        #pieBlotter {
            width: 100% !important;
        }

        #lineIncident {
            width: 100% !important;
        }

        #horizontalBarArticle {
            width: 100% !important;
        }

        #matrixAll {
            width: 100% !important;
            height: 500px !important;
        }

        #matrixChartArlegui,
        #matrixChartCastillejos,
        #matrixChartDuque,
        #matrixChartFarnecio,
        #matrixChartFraternal,
        #matrixChartPCasal,
        #matrixChartPax,
        #matrixChartVergara {
            height: 200px !important;
        }

        #js-legend li span {
            display: inline-flex;
            align-items: center;
            justify-content: center;

            width: 50px;
            height: 25px;

            border-radius: 5px;
            color: #fff;
            font-size: 15px;
            font-weight: bold;
            border: 2px solid #fff;
        }

        .highcharts-figure,
        .highcharts-data-table table {
            min-width: 320px;
            max-width: 800px;
            margin: 1em auto;
        }

        .highcharts-data-table table {
            font-family: Verdana, sans-serif;
            border-collapse: collapse;
            border: 1px solid #ebebeb;
            margin: 10px auto;
            text-align: center;
            width: 100%;
            max-width: 500px;
        }

        .highcharts-data-table caption {
            padding: 1em 0;
            font-size: 1.2em;
            color: #555;
        }

        .highcharts-data-table th {
            font-weight: 600;
            padding: 0.5em;
        }

        .highcharts-data-table td,
        .highcharts-data-table th,
        .highcharts-data-table caption {
            padding: 0.5em;
        }

        .highcharts-data-table thead tr,
        .highcharts-data-table tr:nth-child(even) {
            background: #f8f8f8;
        }

        .highcharts-data-table tr:hover {
            background: #f1f7ff;
        }

        #stats {
            height: 100% !important;
        }


        #map {
            height: 100vh;
            width: 100%;
        }

        .info {
            padding: 6px 8px;
            font: 14px/16px Arial, Helvetica, sans-serif;
            background: white;
            background: rgba(255, 255, 255, 0.8);
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.2);
            border-radius: 5px;
        }

        .info h4 {
            margin: 0 0 5px;
            color: #777;
        }

        .legend {
            line-height: 18px;
            color: #555;
        }

        .legend i {
            width: 18px;
            height: 18px;
            float: left;
            margin-right: 8px;
            opacity: 0.7;
        }
    </style>
</head>

<body>
    <div class="d-flex" id="wrapper">

        @include('admin.sidebar')

        <!-- Page content wrapper-->
        <div id="page-content-wrapper">
            <!-- Top navigation-->
            @include('admin.navbar')

            <!-- Page content-->
            <div class="container-fluid p-5" style="background-color: #f1f2f5;">

                <h1 class="mb-3">Dashboard</h1>
                <div class="row">
                    <div class="col">
                        <div class="card mb-3" id="stats" style="background-color: #264ED0;">
                            <div class="card-header text-light" style="background-color: #1c1919;"><b>Blotter Cases</b></div>
                            <div class="card-body align-items-center">
                                <h1 class="card-title text-center text-light" style="font-family: sans-serif; font-size: 60px;"><b>{{$currentCountBlotter}}</b></h1>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item list-group-item-action text-light" style="background-color: #264ED0;">
                                        <div class="row">
                                            <div class="col">
                                                Today
                                            </div>
                                            <div class="col text-end">{{$todayCountBlotter}}</div>
                                        </div>
                                    </li>
                                    <li class="list-group-item list-group-item-action text-light" style="background-color: #264ED0;">
                                        <div class="row">
                                            <div class="col">
                                                This Week
                                            </div>
                                            <div class="col text-end">{{$weekCountBlotter}}</div>
                                        </div>
                                    </li>
                                    <li class="list-group-item list-group-item-action text-light" style="background-color: #264ED0;">
                                        <div class="row">
                                            <div class="col">
                                                This Month
                                            </div>
                                            <div class="col text-end">{{$monthCountBlotter}}</div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card mb-3" id="stats" style="background-color: #FFA800;">
                            <div class="card-header text-light " style="background-color: #1c1919;"><b>Settled Cases</b></div>
                            <div class="card-body align-items-center">
                                <h1 class="card-title text-center text-light" style="font-family: sans-serif; font-size: 60px;"><b>{{$settledCases}}</b></h1>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item list-group-item-action text-light" style="background-color: #FFA800;">
                                        <div class="row">
                                            <div class="col">
                                                Total Cases
                                            </div>
                                            <div class="col text-end">{{$currentCountBlotter}}</div>
                                        </div>
                                    </li>

                                    <li class="list-group-item list-group-item-action text-light" style="background-color: #FFA800;">
                                        <div class="row">
                                            <div class="col">
                                                Unsettled Cases
                                            </div>
                                            <div class="col text-end">{{$unsettledCases}}</div>
                                        </div>
                                    </li>
                                    <li class="list-group-item list-group-item-action text-light" style="background-color: #FFA800;">
                                        <div class="row">
                                            <div class="col">
                                                Court Action
                                            </div>
                                            <div class="col text-end">{{$courtAction}}</div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col mt-sm-0 mt-3">
                        <div class="card mb-3" id="stats" style="background-color: #333333;">
                            <div class="card-header text-light " style="background-color: #1c1919;"><b>Incident Reports</b></div>
                            <div class="card-body align-items-center ">
                                <h1 class="card-title text-center text-light" style="font-family: sans-serif; font-size: 60px;"><b>{{$currentCountIncident}}</b></h1>
                                <ul class="list-group list-group-flush ">
                                    <li class="list-group-item list-group-item-action text-light" style="background-color: #333333;">
                                        <div class="row">
                                            <div class="col">
                                                Today
                                            </div>
                                            <div class="col text-end">{{$todayCountIncident}}</div>
                                        </div>
                                    </li>
                                    <li class="list-group-item list-group-item-action text-light" style="background-color: #333333;">
                                        <div class="row">
                                            <div class="col">
                                                This Week
                                            </div>
                                            <div class="col text-end">{{$weekCountIncident}}</div>
                                        </div>
                                    </li>
                                    <li class="list-group-item list-group-item-action text-light" style="background-color: #333333;">
                                        <div class="row">
                                            <div class="col">
                                                This Month
                                            </div>
                                            <div class="col text-end">{{$monthCountIncident}}</div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="col mt-sm-0 mt-3">
                        <div class="card mb-3" id="stats" style="background-color: #C23B21;">
                            <div class="card-header text-light" style="background-color: #1c1919;"><b>Current Hearings</b></div>
                            <div class="card-body d-flex justify-content-center align-items-center ">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item list-group-item-action" style="background-color: #C23B21;">
                                        <div class="row">
                                            <div class="col text-light">
                                                <b>Mediation by the Lupon </b>
                                            </div>
                                            <div class="col text-end"><a href="{{route('settlement.show.mediation')}}"><span class="badge bg-primary rounded-pill">{{$mediationCount}}</span></a></div>
                                        </div>
                                    </li>
                                    <li class="list-group-item list-group-item-action" style="background-color: #C23B21;">
                                        <div class="row">
                                            <div class="col text-light">
                                                <b> Conciliation by the Pangkat </b>
                                            </div>
                                            <div class="col text-end"><a href="{{route('settlement.show.conciliation')}}"><span class="badge bg-primary rounded-pill">{{$conciliationCount}}</span></a></div>
                                        </div>
                                    </li>
                                    <li class="list-group-item list-group-item-action" style="background-color: #C23B21;">
                                        <div class="row">
                                            <div class="col text-light">
                                                <b> Arbitration </b>
                                            </div>
                                            <div class="col text-end"> <a href="{{route('settlement.show.arbitration')}}"><span class="badge bg-primary rounded-pill">{{$arbitrationCount}}</span></a></div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>

                <h5 class="mt-4 fw-bold">Blotter Cases</h5>
                <div class="row mt-3 mb-3">
                    <div class="col">
                        <div class="card">
                            <h5 class="card-header"><i class="bi bi-record-circle"></i> Blotter Trend</h5>
                            <div class="card-body">
                                <div class="row g-0">
                                    <div class="col">
                                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                            <input type="month" class="" onchange="filterChart(this)" id="month" />
                                            <button onclick="reset()" class="btn btn-sm btn-primary">Reset</button>
                                        </div>
                                        <canvas id="barBlotter"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col mt-sm-0 mt-3">
                        <div class="card">
                            <h5 class="card-header"><i class="bi bi-bar-chart-line-fill"></i> Hearing Schedule</h5>
                            <div class="card-body">
                                <ul class="list-group">
                                    <li class="list-group-item list-group-item-action">
                                        <div class="d-flex w-100 justify-content-between">
                                            <h5 class="mb-1">Today</h5>
                                            <small>{{$todayCount}}</small>
                                        </div>

                                        @forelse($todaySchedule as $sched => $values)
                                        <?php
                                        $case_title = Encryption::php()->decrypt($todayCaseTitle[$sched]);
                                        ?>
                                        <small><b>{{$case_title}}</b> <i>{{$values}}</i></small><br>
                                        @empty
                                        <small>-</small>
                                        @endforelse

                                    </li>
                                    <li class="list-group-item list-group-item-action">
                                        <div class="d-flex w-100 justify-content-between">
                                            <h5 class="mb-1">Tomorrow</h5>
                                            <small>{{$tomorrowCount}}</small>
                                        </div>

                                        @forelse($tomorrowSchedule as $sched => $values)
                                        <?php
                                        $case_title = Encryption::php()->decrypt($tomorrowCaseTitle[$sched]);
                                        ?>
                                        <small><b>{{$case_title}}</b> <i>{{$values}}</i></small><br>
                                        @empty
                                        <small>-</small>
                                        @endforelse
                                    </li>
                                    <li class="list-group-item list-group-item-action">
                                        <div class="d-flex w-100 justify-content-between">
                                            <h5 class="mb-1">Next Week</h5>
                                            <small>{{$nextWeekCount}}</small>
                                        </div>

                                        @forelse($nextWeekSchedule as $sched => $values)
                                        <?php
                                        $case_title = Encryption::php()->decrypt($nextWeekCaseTitle[$sched]);
                                        ?>
                                        <small><b>{{$case_title}}</b> <i>{{$values}}</i></small><br>
                                        @empty
                                        <small>-</small>
                                        @endforelse
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>


                </div>

                <div class="row mt-3 mb-3">
                    <div class="col">
                        <div class="card">
                            <h5 class="card-header"><i class="bi bi-bar-chart-line-fill"></i> Common Case Article No.</h5>
                            <div class="card-body">
                                <canvas id="horizontalBarArticle"></canvas>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card h-100">
                            <h5 class="card-header"><i class="bi bi-bar-chart-line-fill"></i> Total Hearings of Settled Cases</h5>
                            <div class="card-body">
                                <canvas id="pieBlotter"></canvas>
                            </div>
                        </div>
                    </div>


                </div>

                <div class="row mt-3 mb-3">
                    <div class="col">
                        <div class="card">
                            <h5 class="card-header"><i class="bi bi-badge-wc-fill"></i> Word Analytics</h5>
                            <div class="card-body">
                                <figure class="highcharts-figure">
                                    <div id="container"></div>
                                </figure>
                            </div>
                        </div>
                    </div>
                </div>
                <hr class="mb-3">

                <h5 class="mt-4 fw-bold">Incident Reports</h5>
                <div class="row mb-3">
                    <div class="col">
                        <div class="card">
                            <h5 class="card-header"><i class="bi bi-record-circle"></i> Top 5 Incidents</h5>
                            <div class="card-body">
                                <div class="row g-0">
                                    <div class="col">
                                        <canvas id="pieChartIncident"></canvas>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card">
                            <h5 class="card-header"><i class="bi bi-record-circle"></i> Incident Trend</h5>
                            <div class="card-body">
                                <div class="row g-0">
                                    <div class="col">
                                        <canvas id="lineIncident"></canvas>
                                    </div>
                                    <!--
                                    <div class="col">
                                        <div id="js-legend" class="float-end"></div>
                                    </div>
                                    -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col">
                        <div class="card">
                            <h5 class="card-header"><i class="bi bi-geo-alt-fill"></i> Street Map Incidents</h5>
                            <div class="card-body">
                                <div class="row g-0">
                                    <div class="col">
                                        <div id="map" style="max-height: 560px;"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mb-3 ">
                    <div class="col">
                        <div class="card">
                            <h5 class="card-header"><i class="bi bi-map-fill"></i> Street Reports</h5>
                            <div class="card-body">
                                <div id="matrixCarousel" class="carousel slide carousel-dark" data-bs-ride="carousel">

                                    <div class="carousel-indicators">
                                        <button type="button" data-bs-target="#matrixCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                        <button type="button" data-bs-target="#matrixCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                        <button type="button" data-bs-target="#matrixCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
                                        <button type="button" data-bs-target="#matrixCarousel" data-bs-slide-to="3" aria-label="Slide 4"></button>
                                        <button type="button" data-bs-target="#matrixCarousel" data-bs-slide-to="4" aria-label="Slide 5"></button>
                                        <button type="button" data-bs-target="#matrixCarousel" data-bs-slide-to="5" aria-label="Slide 6"></button>
                                        <button type="button" data-bs-target="#matrixCarousel" data-bs-slide-to="6" aria-label="Slide 7"></button>
                                        <button type="button" data-bs-target="#matrixCarousel" data-bs-slide-to="7" aria-label="Slide 8"></button>
                                        <button type="button" data-bs-target="#matrixCarousel" data-bs-slide-to="8" aria-label="Slide 9"></button>
                                    </div>

                                    <div class="carousel-inner text-center">
                                        <div class="carousel-item active" data-bs-interval="15000">
                                            <h5><span class="badge rounded-pill bg-dark">Monthly incident reports on each street</span></h5>
                                            <h5><span class="badge rounded-pill bg-dark"></span></h5>
                                            <canvas id="matrixAll" class=""></canvas>
                                        </div>
                                        <!-- <div class="carousel-item " data-bs-interval="10000">
                                            <h5><span class="badge rounded-pill bg-dark">1. Arlegui St.</span></h5>
                                            <canvas id="matrixChartArlegui" class=""></canvas>
                                        </div>
                                        <div class="carousel-item " data-bs-interval="100000">
                                            <h5><span class="badge rounded-pill bg-dark">2. Castillejos St.</span></h5>
                                            <canvas id="matrixChartCastillejos" class=""></canvas>
                                        </div>
                                        <div class="carousel-item " data-bs-interval="100000">
                                            <h5><span class="badge rounded-pill bg-dark">3. Duque St.</span></h5>
                                            <canvas id="matrixChartDuque" class=""></canvas>
                                        </div>
                                        <div class="carousel-item " data-bs-interval="100000">
                                            <h5><span class="badge rounded-pill bg-dark">4. Farnecio St.</span></h5>
                                            <canvas id="matrixChartFarnecio" class=""></canvas>
                                        </div>
                                        <div class="carousel-item " data-bs-interval="100000">
                                            <h5><span class="badge rounded-pill bg-dark">5. Fraternal St.</span></h5>
                                            <canvas id="matrixChartFraternal" class=""></canvas>
                                        </div>
                                        <div class="carousel-item " data-bs-interval="100000">
                                            <h5><span class="badge rounded-pill bg-dark">6. Pascual Casal St.</span></h5>
                                            <canvas id="matrixChartPCasal" class=""></canvas>
                                        </div>
                                        <div class="carousel-item " data-bs-interval="100000">
                                            <h5><span class="badge rounded-pill bg-dark">7. Pax St.</span></h5>
                                            <canvas id="matrixChartPax" class=""></canvas>
                                        </div>
                                        <div class="carousel-item " data-bs-interval="100000">
                                            <h5><span class="badge rounded-pill bg-dark">8. Vergara St.</span></h5>
                                            <canvas id="matrixChartVergara" class=""></canvas>
                                        </div> -->

                                    </div>
                                    <!-- <button class="carousel-control-prev " type="button" data-bs-target="#matrixCarousel" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon prevIcon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next " type="button" data-bs-target="#matrixCarousel" data-bs-slide="next">
                                        <span class="carousel-control-next-icon nextIcon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>  
            </div>
        </div>


        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

        <script type="text/javascript">
            var _ydata = JSON.parse('{!! json_encode($months) !!}');
            var _xdata = JSON.parse('{!! json_encode($monthCount) !!}');

            var x_type = JSON.parse('{!! json_encode($types) !!}');
            var y_type = JSON.parse('{!! json_encode($typeCount) !!}');

            var x_type2 = JSON.parse('{!! json_encode($types2) !!}');
            var y_type2 = JSON.parse('{!! json_encode($typeCount2) !!}');

            var article_no = JSON.parse('{!! json_encode($article_no) !!}');
            var article_count = JSON.parse('{!! json_encode($article_count) !!}');

            var report_count = JSON.parse('{!! json_encode($report_count) !!}');

            var x_ar = JSON.parse('{!! json_encode($dates_ar) !!}');
            var y_ar = JSON.parse('{!! json_encode($dateCount_ar) !!}');

            var x_cas = JSON.parse('{!! json_encode($dates_cas) !!}');
            var y_cas = JSON.parse('{!! json_encode($dateCount_cas) !!}');

            var x_duq = JSON.parse('{!! json_encode($dates_duq) !!}');
            var y_duq = JSON.parse('{!! json_encode($dateCount_duq) !!}');

            var x_far = JSON.parse('{!! json_encode($dates_far) !!}');
            var y_far = JSON.parse('{!! json_encode($dateCount_far) !!}');

            var x_fra = JSON.parse('{!! json_encode($dates_fra) !!}');
            var y_fra = JSON.parse('{!! json_encode($dateCount_fra) !!}');

            var x_pcasal = JSON.parse('{!! json_encode($dates_pcasal) !!}');
            var y_pcasal = JSON.parse('{!! json_encode($dateCount_pcasal) !!}');

            var x_pax = JSON.parse('{!! json_encode($dates_pax) !!}');
            var y_pax = JSON.parse('{!! json_encode($dateCount_pax) !!}');

            var x_ver = JSON.parse('{!! json_encode($dates_ver) !!}');
            var y_ver = JSON.parse('{!! json_encode($dateCount_ver) !!}');

            var complaint_desc = '{!! htmlspecialchars($cleanedText, ENT_QUOTES, "UTF-8") !!}';

            var y_pie_blotter = JSON.parse('{!! json_encode($hearing_type_count) !!}');
            //console.log('{!! htmlspecialchars($cleanedText, ENT_QUOTES, "UTF-8") !!}')

            var _monthX = JSON.parse('{!! json_encode($monthX) !!}');
            var _streetY = JSON.parse('{!! json_encode($streetY) !!}');
            var _incidentCount = JSON.parse('{!! json_encode($incidentCount) !!}');
            var numberArray = [];
            length = _incidentCount.length;
            for (var i = 0; i < length; i++) {
                numberArray.push(parseInt(_incidentCount[i]));
            }
            //console.log(numberArray);

            var _monthIPM = JSON.parse('{!! json_encode($monthIPM) !!}');
            var _incidentCount2 = JSON.parse('{!! json_encode($incidentCount2) !!}');
            var numberArray2 = [];
            length = _incidentCount2.length;
            for (var i = 0; i < length; i++) {
                numberArray2.push(parseInt(_incidentCount2[i]));
            }

            var _total_incident_street = JSON.parse('{!! json_encode($total_incident_street) !!}');
            //console.log(_total_incident_street);
        </script>
        <!-- <script src="{{ asset('assets/charts/bar.js')}} "></script> -->
        <!-- <script src="{{ asset('assets/charts/line.js')}} "></script> -->
        <!-- <script src="{{ asset('assets/charts/matrix.js')}} "></script> -->
        <!-- <script src="{{ asset('assets/charts/matrixArlegui.js')}} "></script>
        <script src="{{ asset('assets/charts/matrixCastillejos.js')}} "></script>
        <script src="{{ asset('assets/charts/matrixDuque.js')}} "></script>
        <script src="{{ asset('assets/charts/matrixFarnecio.js')}} "></script>
        <script src="{{ asset('assets/charts/matrixFraternal.js')}} "></script>
        <script src="{{ asset('assets/charts/matrixPCasal.js')}} "></script>
        <script src="{{ asset('assets/charts/matrixPax.js')}} "></script>
        <script src="{{ asset('assets/charts/matrixVergara.js')}} "></script> -->
        <!-- <script src="{{ asset('assets/charts/doughnutReports.js')}} "></script> -->
        <script src="{{ asset('assets/charts/wordCloud.js')}} "></script>
        <script src="{{ asset('assets/charts/pieIncident.js')}} "></script>
        <script src="{{ asset('assets/charts/barBlotter.js')}} "></script>
        <script src="{{ asset('assets/charts/pieBlotter.js')}} "></script>
        <script src="{{ asset('assets/charts/horizontalBarArticle.js')}} "></script>
        <script src="{{ asset('assets/charts/matrixAll.js')}} "></script>
        <script src="{{ asset('assets/charts/lineIncident.js')}} "></script>
</body>
<!-- Charts.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js" integrity="sha512-ElRFoEQdI5Ht6kZvyzXhYG9NqjtkmlkfYk0wr6wHxU9JEHakS7UJZNeml5ALk+8IKlU6jDgMabC3vkumRokgJA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</html>

<script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
<script src="{{ asset('assets/leaflet-geochart/data/line.js')}}"></script>
<script src="{{ asset('assets/leaflet-geochart/data/point.js')}}"></script>
<script src="{{ asset('assets/leaflet-geochart//data/polygon.js')}}"></script>
<script src="{{ asset('assets/leaflet-geochart/data/nepaldata.js')}}"></script>

<!-- Choropleth -->
<script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>

<script src="{{ asset('assets/leaflet-geochart/data/quiapo.js')}}"></script>
<script>

    /*===================================================
                      OSM  LAYER               
===================================================*/

    var map = L.map('map').setView([14.5958, 120.9875], 18);
    var osm = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
    });
    osm.addTo(map);

    /*===================================================
                          MARKER               
    ===================================================*/

    var singleMarker = L.marker([28.25255, 83.97669]);
    singleMarker.addTo(map);
    var popup = singleMarker.bindPopup('This is a popup')
    popup.addTo(map);

    /*===================================================
                         TILE LAYER               
    ===================================================*/

    var CartoDB_DarkMatter = L.tileLayer('https://{s}.basemaps.cartocdn.com/dark_all/{z}/{x}/{y}{r}.png', {
        attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors &copy; <a href="https://carto.com/attributions">CARTO</a>',
        subdomains: 'abcd',
        maxZoom: 19
    });
    CartoDB_DarkMatter.addTo(map);

    // Google Map Layer

    googleStreets = L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}', {
        maxZoom: 20,
        subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
    });
    googleStreets.addTo(map);

    // Satelite Layer
    googleSat = L.tileLayer('http://{s}.google.com/vt/lyrs=s&x={x}&y={y}&z={z}', {
        maxZoom: 20,
        subdomains: ['mt0', 'mt1', 'mt2', 'mt3']
    });
    googleSat.addTo(map);

    var Stamen_Watercolor = L.tileLayer('https://stamen-tiles-{s}.a.ssl.fastly.net/watercolor/{z}/{x}/{y}.{ext}', {
        attribution: 'Map tiles by <a href="http://stamen.com">Stamen Design</a>, <a href="http://creativecommons.org/licenses/by/3.0">CC BY 3.0</a> &mdash; Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors',
        subdomains: 'abcd',
        minZoom: 1,
        maxZoom: 16,
        ext: 'jpg'
    });
    Stamen_Watercolor.addTo(map);


    /*===================================================
                          GEOJSON               
    ===================================================*/

    var linedata = L.geoJSON(lineJSON).addTo(map);
    var pointdata = L.geoJSON(pointJSON).addTo(map);
    var nepalData = L.geoJSON(nepaldataa).addTo(map);
    var polygondata = L.geoJSON(polygonJSON, {
        onEachFeature: function (feature, layer) {
            layer.bindPopup('<b>This is a </b>' + feature.properties.name)
        },
        style: {
            fillColor: 'red',
            fillOpacity: 1,
            color: 'green'
        }
    }).addTo(map);

    /*===================================================
                          LAYER CONTROL               
    ===================================================*/

    var baseLayers = {
        "Satellite": googleSat,
        "Google Map": googleStreets,
        "Water Color": Stamen_Watercolor,
        "OpenStreetMap": osm,
    };

    var overlays = {
        "Marker": singleMarker,
        "PointData": pointdata,
        "LineData": linedata,
        "PolygonData": polygondata
    };

    L.control.layers(baseLayers, overlays).addTo(map);


    /*===================================================
                          SEARCH BUTTON               
    ===================================================*/

    L.Control.geocoder().addTo(map);


    /*===================================================
                          Choropleth Map               
    ===================================================*/

    L.geoJSON(quiapoData).addTo(map);


    function getColor(d) {
        return d > 1000 ? '#800026' :
            d > 500 ? '#BD0026' :
            d > 200 ? '#E31A1C' :
            d > 100 ? '#FC4E2A' :
            d > 50 ? '#FD8D3C' :
            d > 20 ? '#FEB24C' :
            d > 10 ? '#FED976' :
                    '#FFEDA0';
    }

    function style(feature) {
        return {
            fillColor: getColor(feature.properties.density),
            weight: 2,
            opacity: 1,
            color: 'white',
            dashArray: '3',
            fillOpacity: 0.7
        };
    }

    L.geoJson(quiapoData, { style: style }).addTo(map);

    function highlightFeature(e) {
        var layer = e.target;

        layer.setStyle({
            weight: 5,
            color: '#666',
            dashArray: '',
            fillOpacity: 0.7
        });

        if (!L.Browser.ie && !L.Browser.opera && !L.Browser.edge) {
            layer.bringToFront();
        }

        info.update(layer.feature.properties);
        //console.log(layer.feature.properties);
        //console.log(_total_incident_street);
    }

    function resetHighlight(e) {
        geojson.resetStyle(e.target);
        info.update();
    }

    var geojson;
    // ... our listeners
    geojson = L.geoJson(quiapoData);

    function zoomToFeature(e) {
        map.fitBounds(e.target.getBounds());
    }

    function onEachFeature(feature, layer) {
        layer.on({
            mouseover: highlightFeature,
            mouseout: resetHighlight,
            click: zoomToFeature
        });
    }

    geojson = L.geoJson(quiapoData, {
        style: style,
        onEachFeature: onEachFeature
    }).addTo(map);

    var info = L.control();

    info.onAdd = function (map) {
        this._div = L.DomUtil.create('div', 'info'); // create a div with a class "info"
        this.update();
        return this._div;
    };

    // method that we will use to update the control based on feature properties passed
    info.update = function (props) {
        this._div.innerHTML = '<h4>Barangay 385 Incident Density</h4>' + (props ?
            '<b>' + props.name + '</b><br />' + props.density + ' incident reports'
            : 'Hover over a street');
    };

    info.addTo(map);

    var legend = L.control({ position: 'bottomright' });

    legend.onAdd = function (map) {

        var div = L.DomUtil.create('div', 'info legend'),
            grades = [0, 10, 20, 50, 100, 200, 500, 1000],
            labels = [];

        // loop through our density intervals and generate a label with a colored square for each interval
        for (var i = 0; i < grades.length; i++) {
            div.innerHTML +=
                '<i style="background:' + getColor(grades[i] + 1) + '"></i> ' +
                grades[i] + (grades[i + 1] ? '&ndash;' + grades[i + 1] + '<br>' : '+');
        }

        return div;
    };

    legend.addTo(map);


</script>