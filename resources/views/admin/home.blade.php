<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-date-fns/dist/chartjs-adapter-date-fns.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-chart-matrix@1.2.0/dist/chartjs-chart-matrix.min.js"></script>


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

        #doughnutChart {
            width: 100% !important;
        }

        #onGoingChart {
            width: 100% !important;
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
                @if(session()->has('filed_court_action'))
                <script>
                    Swal.fire({
                        icon: 'success',
                        title: 'Court Action Filed Successfully'
                    })
                </script>
                @endif

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

                    <div class="col">
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

                    <div class="col">
                        <div class="card mb-3" id="stats">
                            <div class="card-header"><b>Hearings</b></div>
                            <div class="card-body d-flex justify-content-center align-items-center">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col">
                                                <b>Mediation by the Lupon </b>
                                            </div>
                                            <div class="col text-end">{{$mediationCount}}</div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col">
                                               <b> Conciliation by the Pangkat </b>
                                            </div>
                                            <div class="col text-end">{{$conciliationCount}}</div>
                                        </div>
                                    </li>
                                    <li class="list-group-item">
                                        <div class="row">
                                            <div class="col">
                                                <b> Arbitration </b>
                                            </div>
                                            <div class="col text-end">{{$arbitrationCount}}</div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="row mt-3 mb-3">
                    <div class="col">
                        <div class="card">
                            <h5 class="card-header"><i class="bi bi-bar-chart-line-fill"></i> Blotter per month</h5>
                            <div class="card-body">
                                <canvas id="barChart"></canvas>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="card">
                            <h5 class="card-header"><i class="bi bi-record-circle"></i> Incident Reports</h5>
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
                            <h5 class="card-header"><i class="bi bi-map-fill"></i> Incidents in each street</h5>
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
                                    </div>

                                    <div class="carousel-inner text-center">
                                        <div class="carousel-item active" data-bs-interval="10000">
                                            <h5><span class="badge rounded-pill bg-dark">Arlegui St.</span></h5>
                                            <canvas id="matrixChartArlegui" class=""></canvas>
                                        </div>
                                        <div class="carousel-item " data-bs-interval="100000">
                                            <h5><span class="badge rounded-pill bg-dark">Castillejos St.</span></h5>
                                            <canvas id="matrixChartCastillejos" class=""></canvas>
                                        </div>
                                        <div class="carousel-item " data-bs-interval="100000">
                                            <h5><span class="badge rounded-pill bg-dark">Duque St.</span></h5>
                                            <canvas id="matrixChartDuque" class=""></canvas>
                                        </div>
                                        <div class="carousel-item " data-bs-interval="100000">
                                            <h5><span class="badge rounded-pill bg-dark">Farnecio St.</span></h5>
                                            <canvas id="matrixChartFarnecio" class=""></canvas>
                                        </div>
                                        <div class="carousel-item " data-bs-interval="100000">
                                            <h5><span class="badge rounded-pill bg-dark">Fraternal St.</span></h5>
                                            <canvas id="matrixChartFraternal" class=""></canvas>
                                        </div>
                                        <div class="carousel-item " data-bs-interval="100000">
                                            <h5><span class="badge rounded-pill bg-dark">Pascual Casal St.</span></h5>
                                            <canvas id="matrixChartPCasal" class=""></canvas>
                                        </div>
                                        <div class="carousel-item " data-bs-interval="100000">
                                            <h5><span class="badge rounded-pill bg-dark">Pax St.</span></h5>
                                            <canvas id="matrixChartPax" class=""></canvas>
                                        </div>
                                        <div class="carousel-item " data-bs-interval="100000">
                                            <h5><span class="badge rounded-pill bg-dark">Vergara St.</span></h5>
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
        //console.log('{!! htmlspecialchars($cleanedText, ENT_QUOTES, "UTF-8") !!}')
    </script>
    <script src="{{ asset('assets/charts/bar.js')}} "></script>
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
</body>
<!-- Charts.js -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js" integrity="sha512-ElRFoEQdI5Ht6kZvyzXhYG9NqjtkmlkfYk0wr6wHxU9JEHakS7UJZNeml5ALk+8IKlU6jDgMabC3vkumRokgJA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</html>