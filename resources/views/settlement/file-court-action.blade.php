<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mediation Settlement</title>
    <link href="../../css/styles.css" rel="stylesheet" />
    <link rel="icon" type="image/png" href="{{ asset('/img/385-logo.png') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <style>

    </style>

</head>

<body>

    <div class="d-flex " id="wrapper">
        @include('admin.sidebar')

        <!-- Page content wrapper-->
        <div id="page-content-wrapper">
            <!-- Top navigation-->
            <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                <div class="container-fluid">
                    <button class="btn btn-warning" id="sidebarToggle"><span class="navbar-toggler-icon"></span></button>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                            <li class="nav-item"><a class="nav-link" href="{{route('blotter.settled')}}">Settled Cases</a></li>
                            <li class="nav-item active"><a class="nav-link" href="{{route('blotter.summary')}}">Search Case</a></li>

                            <x-app-layout>
                            </x-app-layout>
                        </ul>
                    </div>
                </div>
            </nav>

            <!-- Page content-->
            <div class="container-fluid">

                <div class="row d-flex justify-content-center  p-5">
                    <div class="card p-3 shadow">
                        <p class="fs-4 fw-bold text-danger">File Court Action</p>
                        <p class="fst-italic text-primary">Case #{{$blotter_report->case_no}}, {{$complainant->first_name}} {{$complainant->last_name}} vs. {{$respondent->first_name}} {{$respondent->last_name}}</p>

                        <p class="fw-normal"><b>Latest Hearing: <span class="text-uppercase">{{$hearing_type->type_name}}</span> on {{date('F', strtotime($hearing->date_of_meeting))}} {{date('j', strtotime($hearing->date_of_meeting))}}, {{date('Y', strtotime($hearing->date_of_meeting))}},  {{date('h:i A', strtotime($hearing->date_of_meeting))}}</b></p><br>

                        <p class="fw-bold text-primary">This is to certify that:</p><br>
                        <p class="lh-1" style="border-bottom: 1px solid grey; padding-bottom:15px">1. There has been a personal confrontation between the parties before the Punong Barangay by mediation failed.</p>
                        <p class="lh-1" style="border-bottom: 1px solid grey; padding-bottom:15px">2. The Pangkat ng Tagapagsundo was constituted but the personal confrontation before the Pangkat likewise did not result into a settlement; and</p>
                        <p class="lh-1">3. Therefore, the corresponding complaint for the dispute may now be filed in court/government office.</p>

                        <!--
                        <div class="mb-3 mt-5">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                                <label class="form-check-label" for="flexSwitchCheckDefault">Signed by the Barangay Secretary</label>
                            </div>
                        </div>
                        
                        <div class="mb-3">
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                                <label class="form-check-label" for="flexSwitchCheckDefault">Signed by the Punong Barangay</label>
                            </div>
                        </div>
                        -->
                        
                        <div class="mb-3 mt-3">
                            <a href="{{route('settlement.court-action-store', $blotter_report->case_no)}}" class="btn btn-danger">File Court Action </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>