<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../css/styles.css" rel="stylesheet" />
    <link rel="icon" type="image/png" href="{{ asset('/img/385-logo.png') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function() {
            var maxField = 10;
            var addButton = $('.add_button');
            var wrapper = $('.field_wrapper');
            var fieldHTML = '<div class="row justify-content-center"><div class="col form-floating mb-3 px-2"><input type="text" id="lastName" class="form-control" name="lastName[]" required><label for="lastName">Last Name</label></div><div class="col form-floating mb-3 px-2"><input type="text" id="firstName" class="form-control" name="firstName[]" required><label for="firstName">First Name</label></div><div class="col form-floating mb-3 px-2"><input type="text" id="middleName" class="form-control" name="middleName[]" required><label for="middleName">Middle Name</label></div><div class="col-auto"><a href="javascript:void(0);" class="remove_button btn btn-danger" title="Remove field"><i class="bi bi-dash-circle"></i> REMOVE</a></div></div>';

            var x = 1;

            //Once add button is clicked
            $(addButton).click(function() {
                if (x < maxField) {
                    x++;
                    $(wrapper).append(fieldHTML);
                }
            });

            //Once remove button is clicked
            $(wrapper).on('click', '.remove_button', function(e) {
                e.preventDefault();
                $(this).parent('div').parent('div').remove(); //Remove fields html
                x--; //Decrement field counter
            });
        });
    </script>

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
                    @if(session()->has('success'))
                    <script>
                        Swal.fire({
                            icon: 'success',
                            title: 'Notice created successfully',
                        })
                    </script>
                    @endif
                    @if(session()->has('added'))
                    <script>
                        Swal.fire({
                            icon: 'success',
                            title: 'Witness added successfully',
                        })
                    </script>
                    @endif
                    @if(session()->has('deleted'))
                    <script>
                        Swal.fire({
                            icon: 'error',
                            title: 'Witness removed successfully',
                        })
                    </script>
                    @endif
                    @if(session()->has('fail_to_notify'))
                    <script>
                        Swal.fire({
                            icon: 'error',
                            title: 'Failed to notify. Not yet in conciliation process.',
                        })
                    </script>
                    @endif

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
                            <a href="{{route('notice.schedule', $notice->case_no)}}">Change schedule?</a>
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
                                            <td>
                                                @if($hearing)
                                                @if($hearing->notified == 1)
                                                <b class="text-success">NOTIFIED</b>
                                                @else
                                                <b class="text-danger">TO NOTIFY</b>
                                                @endif
                                                @endif
                                            </td>

                                            @if($hearing)
                                            <div class="btn-group" role="group">
                                                <td><a href="{{route('notice.notify', $hearing->notice_id)}}" class="btn btn-success">NOTIFY</a><a href="{{route('hearing.pdf', $hearing->notice_id)}}" class="btn btn-dark">DOWNLOAD</a></td>
                                            </div>
                                            @else
                                            <td><a href="{{route('notice.hearing', $notice->case_no)}}" class="btn btn-primary">Create Hearing Record</a></td>
                                            @endif

                                        </tr>
                                        <tr>
                                            <th scope="row">Summon Notice</th>
                                            <td>{{$respondent->salutation}} {{$respondent->first_name}} {{$respondent->middle_name}} {{$respondent->last_name}}</td>
                                            <td class="text-danger">
                                                @if($summon)
                                                @if($summon->notified == 1)
                                                <b class="text-success">NOTIFIED</b>
                                                @else
                                                <b class="text-danger">TO NOTIFY</b>
                                                @endif
                                                @endif
                                            </td>
                                            @if($summon)
                                            <div class="btn-group" role="group">
                                                <td><a href="{{route('notice.notify', $summon->notice_id)}}" class="btn btn-success">NOTIFY</a><a href="{{route('summon.pdf', $summon->notice_id)}}" class="btn btn-dark">DOWNLOAD</a></td>
                                            </div>
                                            @else
                                            <td><a href="{{route('notice.summon', $notice->case_no)}}" class="btn btn-primary">Create Summon Record</a></td>
                                            @endif
                                        </tr>
                                        <tr>
                                            <th scope="row">Pangkat Notice</th>
                                            <td>-</td>
                                            <td class="text-danger">
                                                @if($constitution)
                                                @if($constitution->notified == 1)
                                                <b class="text-success">NOTIFIED</b>
                                                @else
                                                <b class="text-danger">TO NOTIFY</b>
                                                @endif
                                                @endif
                                            </td>
                                            @if($constitution)
                                            <div class="btn-group" role="group">
                                                <td><a href="{{route('notice.notify', $constitution->notice_id)}}" class="btn btn-success">NOTIFY</a><a href="{{route('pangkat.pdf', $constitution->notice_id)}}" class="btn btn-dark">DOWNLOAD</a></td>
                                            </div>
                                            @else
                                            <td><a href="{{route('notice.constitution', $notice->case_no)}}" class="btn btn-primary">Create Pangkat Constitution Notice</a></td>
                                            @endif
                                        </tr>
                                        <tr>
                                            <th scope="row">Subpoena Notice</th>
                                            <td>-</td>
                                            <td class="text-danger">@if($subpoena)
                                                @if($subpoena->notified == 1)
                                                <b class="text-success">NOTIFIED</b>
                                                @else
                                                <b class="text-danger">TO NOTIFY</b>
                                                @endif
                                                @endif</td>
                                            <td><button type="button" class="btn btn-secondary" data-bs-toggle="collapse" data-bs-target="#collapseExample">Create Witness Record <i class="bi bi-caret-down-fill"></i></button></td>
                                        </tr>
                                    </tbody>

                                </table>

                                <div class="collapse" id="collapseExample">
                                    <div class="card card-body">
                                        Subpoena Notice
                                        <hr>
                                        <p class="fw-bold">WITNESSES</p>

                                        @forelse($persons as $person)
                                        <p class="font-monospace lh-1">{{ $loop->index+1 }}.) {{$person->last_name}}, {{$person->first_name}} {{$person->middle_name}} | <a href="{{route('notice.removeWitness', $person->person_id)}}">Remove this witness</a></p>
                                        @empty
                                        <p class="font-monospace fw-bold">No Witnesses...</b></p>
                                        
                                        @endforelse
                                        <hr>
                                        <form action="{{route('notice.addWitness', $notice->case_no)}}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="field_wrapper">
                                                <div class="row justify-content-center">
                                                    <div class="col form-floating mb-3 px-2">
                                                        <input type="text" id="lastName" class="form-control" name="lastName[]" required>
                                                        <label for="lastName">Last Name</label>
                                                    </div>
                                                    <div class="col form-floating mb-3 px-2">
                                                        <input type="text" id="firstName" class="form-control" name="firstName[]" required>
                                                        <label for="firstName">First Name</label>
                                                    </div>
                                                    <div class="col form-floating mb-3 px-2">
                                                        <input type="text" id="middleName" class="form-control" name="middleName[]" required>
                                                        <label for="middleName">Middle Name</label>
                                                    </div>
                                                    <div class="col-auto">
                                                        <a href="javascript:void(0);" class="add_button btn btn-success" title="Add field"><i class="bi bi-plus-circle"></i> ADD</a>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row text-right">
                                                <div class="col">
                                                    <div class="btn-grou" role="group">
                                                        <input type="submit" name="submit" class="btn btn-warning" value="Add to Witnesses" />
                                                        @if($subpoena)
                                                        <a href="{{route('subpoena.pdf', $subpoena->notice_id)}}" class="btn btn-dark">Download Subpoena Notice</a>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
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