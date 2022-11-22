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
                        <div class="card mb-3" id="stats">
                            <div class="card-header"><b>Blotter Cases</b></div>
                            <div class="card-body align-items-center">
                                <h1 class="card-title text-center" style="font-size: 50px;"><b>{{$currentCountBlotter}}</b></h1>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col">
                                                Today
                                            </div>
                                            <div class="col text-end">{{$todayCountBlotter}}</div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col">
                                                This Week
                                            </div>
                                            <div class="col text-end">{{$weekCountBlotter}}</div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
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
                        <div class="card mb-3" id="stats">
                            <div class="card-header"><b>Settled Cases</b></div>
                            <div class="card-body align-items-center">
                                <h1 class="card-title text-center" style="font-size: 50px;"><b>{{$settledCases}}</b></h1>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col">
                                                Total Cases
                                            </div>
                                            <div class="col text-end">{{$currentCountBlotter}}</div>
                                        </div>
                                    </li>

                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col">
                                                Unsettled Cases
                                            </div>
                                            <div class="col text-end">{{$unsettledCases}}</div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
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
                        <div class="card mb-3" id="stats">
                            <div class="card-header"><b>Incident Reports</b></div>
                            <div class="card-body align-items-center">
                                <h1 class="card-title text-center" style="font-size: 50px;"><b>{{$currentCountIncident}}</b></h1>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col">
                                                Today
                                            </div>
                                            <div class="col text-end">{{$todayCountIncident}}</div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col">
                                                This Week
                                            </div>
                                            <div class="col text-end">{{$weekCountIncident}}</div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
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

                    <div class="col mt-lg-0 mt-3">
                        <div class="card mb-3" id="stats">
                            <div class="card-header"><b>Current Hearings</b></div>
                            <div class="card-body d-flex justify-content-center align-items-center">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col">
                                                <b>Mediation by the Lupon </b>
                                            </div>
                                            <div class="col text-end"><a href="{{route('settlement.show.mediation')}}"><span class="badge bg-primary rounded-pill">{{$mediationCount}}</span></a></div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col">
                                                <b> Conciliation by the Pangkat </b>
                                            </div>
                                            <div class="col text-end"><a href="{{route('settlement.show.conciliation')}}"><span class="badge bg-primary rounded-pill">{{$conciliationCount}}</span></a></div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col">
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
                            <h5 class="card-header"><i class="bi bi-record-circle"></i> Blotter Reports</h5>
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

                    <div class="col">
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
                            <h5 class="card-header"><i class="bi bi-bar-chart-line-fill"></i> Article No.</h5>
                            <div class="card-body">
                                <canvas id="horizontalBarArticle"></canvas>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card h-100">
                            <h5 class="card-header"><i class="bi bi-bar-chart-line-fill"></i> Total Hearings</h5>
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
                            <h5 class="card-header"><i class="bi bi-record-circle"></i> Incident Distribution</h5>
                            <div class="card-body">
                                <div class="row g-0">
                                    <div class="col">
                                        <canvas id="doughnutChart"></canvas>
                                    </div>
                                    <div class="col">
                                        <div id="js-legend" class="float-end"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row mb-3 ">
                    <div class="col">
                        <div class="card">
                            <h5 class="card-header"><i class="bi bi-map-fill"></i> Incidents Reports</h5>
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
                                        <div class="carousel-item " data-bs-interval="10000">
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
                                        </div>

                                    </div>
                                    <button class="carousel-control-prev " type="button" data-bs-target="#matrixCarousel" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon prevIcon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>
                                    <button class="carousel-control-next " type="button" data-bs-target="#matrixCarousel" data-bs-slide="next">
                                        <span class="carousel-control-next-icon nextIcon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
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
        </script>
        <!-- <script src="{{ asset('assets/charts/bar.js')}} "></script> -->
        <!-- <script src="{{ asset('assets/charts/line.js')}} "></script> -->
        <!-- <script src="{{ asset('assets/charts/matrix.js')}} "></script> -->
        <script src="{{ asset('assets/charts/matrixArlegui.js')}} "></script>
        <script src="{{ asset('assets/charts/matrixCastillejos.js')}} "></script>
        <script src="{{ asset('assets/charts/matrixDuque.js')}} "></script>
        <script src="{{ asset('assets/charts/matrixFarnecio.js')}} "></script>
        <script src="{{ asset('assets/charts/matrixFraternal.js')}} "></script>
        <script src="{{ asset('assets/charts/matrixPCasal.js')}} "></script>
        <script src="{{ asset('assets/charts/matrixPax.js')}} "></script>
        <script src="{{ asset('assets/charts/matrixVergara.js')}} "></script>
        <script src="{{ asset('assets/charts/doughnutReports.js')}} "></script>
        <script src="{{ asset('assets/charts/wordCloud.js')}} "></script>
        <script src="{{ asset('assets/charts/pieIncident.js')}} "></script>
        <script src="{{ asset('assets/charts/barBlotter.js')}} "></script>
        <script src="{{ asset('assets/charts/pieBlotter.js')}} "></script>
        <script src="{{ asset('assets/charts/horizontalBarArticle.js')}} "></script>
        <script src="{{ asset('assets/charts/matrixAll.js')}} "></script>
</body>
<!-- Charts.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js" integrity="sha512-ElRFoEQdI5Ht6kZvyzXhYG9NqjtkmlkfYk0wr6wHxU9JEHakS7UJZNeml5ALk+8IKlU6jDgMabC3vkumRokgJA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</html>