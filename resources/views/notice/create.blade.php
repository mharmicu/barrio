<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../css/styles.css" rel="stylesheet" />
    <link rel="icon" type="image/png" href="{{ asset('/img/385-logo.png') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
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
                        <p class="fw-bolder text-primary fs-5">Notice of Case <u><i>{{$notice->case_no}}</i></u> </p>
                        <p class="fst-italic text-primary">{{$blotter_report->case_title}}</p>

                        <div class="row justify-content-center">
                            <div class="col-auto align-self-center">
                                <b>Hearing Schedule</b>
                            </div>
                            <div class="col-9 align-self-center">
                                <?php
                                $strSched = date('F d, Y, h:iA', strtotime($notice->date_of_meeting));
                                ?>
                                <input type="text" class="form-control" readonly value="{{$strSched}}">
                            </div>
                        </div>
                        <div class="row text-right">
                            <a href="#">Change schedule?</a>
                        </div>


                        <div class="row mt-5">
                            <div class="table-responsive">
                                <table class="table ">
                                    <thead>
                                        <tr>
                                            <th>Type of Notice</th>
                                            <th>Resident Name(s)</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row">Hearing Notice</th>
                                            <td>{{$complainant->salutation}} {{$complainant->first_name}} {{$complainant->middle_name}} {{$complainant->last_name}}</td>
                                            <td class="text-danger"><b>TO NOTIFY</b></td>
                                            <td><button type="button" class="btn btn-success">Set to Notified</button></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Summon Notice</th>
                                            <td>{{$respondent->salutation}} {{$respondent->first_name}} {{$respondent->middle_name}} {{$respondent->last_name}}</td>
                                            <td class="text-danger"><b></b></td>
                                            <td><button type="button" class="btn btn-light">PB Signature</button><button type="button" class="btn btn-primary">Create Summon Record</button></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Pangkat Notice</th>
                                            <td>-</td>
                                            <td class="text-danger"><b></b></td>
                                            <td><button type="button" class="btn btn-light">PB Signature</button><button type="button" class="btn btn-primary">Create Pangkat Constitution Notice</button></td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Subpoena Notice</th>
                                            <td>-</td>
                                            <td class="text-danger"><b></b></td>
                                            <td><button type="button" class="btn btn-secondary" data-bs-toggle="collapse" data-bs-target="#collapseExample">Create Witness Record <i class="bi bi-caret-down-fill"></i></button></td>
                                        </tr>
                                    </tbody>

                                </table>

                                <div class="collapse" id="collapseExample">
                                    <div class="card card-body">
                                        Subpoena Notice
                                        <hr>
                                        <p class="text-right align-text-bottom"><a href="#">Add another withness</a></p>
                                        <p class="fw-bold">Witness</p>

                                        <div class="row justify-content-center">
                                            <div class="col form-floating mb-3 px-2">
                                                <input type="text" id="lastName" class="form-control">
                                                <label for="lastName">Last Name</label>
                                            </div>
                                            <div class="col form-floating mb-3 px-2">
                                                <input type="text" id="firstName" class="form-control">
                                                <label for="firstName">First Name</label>
                                            </div>
                                            <div class="col form-floating mb-3 px-2">
                                                <input type="text" id="middleName" class="form-control">
                                                <label for="middleName">Middle Name</label>
                                            </div>
                                            <div class="col-auto">
                                                <button type="button" class="btn btn-danger">Remove</button>
                                            </div>
                                        </div>

                                        <div class="row text-right">
                                            <div class="col ">
                                                <button type="button" class="btn btn-light">PB Signature</button>
                                                <button type="button" class="btn btn-primary">Create Witness Record</button>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </div>
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
</body>

</html>