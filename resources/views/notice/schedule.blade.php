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
                        <form method="post" action="{{route('editHearingSched', $blotter_report->case_no)}}" enctype="multipart/form-data">
                            @csrf
                            <div class="row p-3">
                                <h3 class="mt-3">Schedule Selection for <b>#{{$blotter_report->case_no}}</b></h3>
                                <p class="card-text fst-italic text-primary mb-3">{{$blotter_report->case_title}}</p>
                                <hr>

                                <div class="col">
                                    <div class="mb-3">
                                        <label for="complainant" class="form-label">Complainant</label>
                                        <input type="text" class="form-control" id="complainant" aria-describedby="emailHelp" disabled placeholder="{{$complainant->salutation}} {{$complainant->first_name}} {{$complainant->middle_name}} {{$complainant->last_name}}">
                                    </div>
                                    <div class="mb-3">
                                        <label for="respondent" class="form-label">Respondent</label>
                                        <input type="text" class="form-control" id="respondent" aria-describedby="emailHelp" disabled placeholder="{{$respondent->salutation}} {{$respondent->first_name}} {{$respondent->middle_name}} {{$respondent->last_name}}">
                                    </div>
                                </div>

                                <div class="col">
                                    <p class="fw-bold text-primary">Select Hearing Schedule</p>
                                    <div class="mb-3">
                                        <div class="form-floating">
                                            <input type="date" class="form-control" name="hearing_date" id="hearing_date">
                                            <label for="hearing_date" class="form-label">Hearing Date</label>
                                            @error('hearing_date')
                                            <small id="helpId" class="form-text text-danger">{{$message}}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <div class="form-floating">
                                            <input type="time" class="form-control" name="hearing_time" id="hearing_time">
                                            <label for="hearing_time">Hearing Time</label>
                                            @error('hearing_time')
                                            <small id="helpId" class="form-text text-danger">{{$message}}</small>
                                            @enderror
                                        </div>
                                    </div>

                                    <div class="mb-3">
                                        <button type="submit" class="btn btn-primary float-end">Submit Schedule</button>
                                    </div>

                                    <div class="mb-3">
                                        <br><br>
                                        <p class="fw-bold fst-italic text-primary">Present Hearing Schedule(s)</p>
                                        @forelse ($present_sched as $sched)
                                        <?php
                                        $strSched = date('F d, Y @ h:iA', strtotime($sched->date_of_meeting));
                                        ?>

                                        <p class="fw-normal">{{$strSched}} <b><i>{{$sched->case_title}}</i></b></p>
                                        <hr>

                                        @empty
                                        <p class="fw-normal">No Present Hearing Schedule</b></p>
                                        <hr>
                                        @endforelse
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Pang disable ng past dates -->
    <script language="javascript">
        var today = new Date();
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0');
        var yyyy = today.getFullYear();

        today = yyyy + '-' + mm + '-' + dd;
        $('#hearing_date').attr('min', today);
    </script>


    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>