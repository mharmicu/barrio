<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of Notices | BARRIO</title>
    <link href="../css/styles.css" rel="stylesheet" />
    <link rel="icon" type="image/png" href="{{ asset('/img/385-logo.png') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>

<body>
    <div class="d-flex " id="wrapper">
        @include('admin.sidebar')

        <!-- Page content wrapper-->
        <div id="page-content-wrapper">
            <!-- Top navigation-->
            @include('admin.navbar')

            <!-- Page content-->
            <div class="container-fluid">
                <div class="row d-flex justify-content-center mt-5 px-5">
                    @if(session()->has('none'))
                    <script>
                        Swal.fire({
                            icon: 'error',
                            title: 'No Record Found. Please check the case no.',
                            footer: '<a href="/blotter/summary">Return to case summary</a>'
                        })
                    </script>
                    @endif
                    @if(session()->has('success'))
                    <script>
                        Swal.fire({
                            icon: 'success',
                            title: 'Notice notified',
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

                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">Notice</li>
                            <li class="breadcrumb-item active" aria-current="page">Lists of Notices</li>
                        </ol>
                    </nav>

                    <h5 class="text-primary">Search for an blotter case report</h5>

                    <div class="p-2">
                        <form action="{{route('blotter.summary')}}" method="get">
                            @csrf
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control shadow-none" name="search" id="caseNo" placeholder="Case No." value="{{request()->query('search')}}" data-bs-toggle="collapse" data-bs-target="#collapseExample">
                                <label for="caseNo" class="p-3">Case No.</label>
                            </div>
                        </form>
                    </div>


                    <div class="card p-3 shadow">
                        @foreach($blotter_report as $blotter)
                        <div class="card-body bg-light mb-3">
                            <div class="row">
                                <div class="col">
                                    <h5 class="card-title"><b><u>Case #{{$blotter->case_no}}</u></b></h5>
                                    <p class="card-text fw-bold text-primary"><i>{{$blotter->case_title}}</i></p>
                                </div>
                                <div class="col">
                                    <!--
                                    <p class="card-text text-end"><b>Hearing Type</b></p>
                                    <p class="card-text text-end"><b>Hearing Schedule</b></p>
                                    -->
                                </div>
                            </div>

                            <div class="row mt-3">

                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th>Type of Notice</th>
                                                <th>Resident Name(s)</th>
                                                <th>Status</th>
                                                <th>Date Notified</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>

                                        <tbody>
                                            <tr>
                                                <th scope="row">Hearing Notice</th>
                                                <td>{{$complainant[$loop->index]->salutation}} {{$complainant[$loop->index]->first_name}} {{$complainant[$loop->index]->middle_name}} {{$complainant[$loop->index]->last_name}}</td>
                                                <td>
                                                    @forelse($notices[$loop->index] as $notice)
                                                    @if ($notice->notice_type_id == 1)
                                                    @if ($notice->notified == 1)
                                                    <b class="text-success">NOTIFIED</b>
                                                    @else
                                                    <b class="text-danger">TO NOTIFY</b>
                                                    @endif
                                                    @else

                                                    @endif
                                                    @empty
                                                    <b class="text-danger">Notice not yet created</b>
                                                    @endforelse
                                                </td>
                                                <td>
                                                    @forelse($notices[$loop->index] as $notice)
                                                    @if ($notice->notice_type_id == 1)
                                                    @if ($notice->notified == 1)
                                                    <i>{{$notice->date_notified}}</i>
                                                    @else

                                                    @endif
                                                    @else

                                                    @endif
                                                    @empty
                                                    <b class="text-danger">---</b>
                                                    @endforelse
                                                </td>
                                                <td>
                                                    @forelse($notices[$loop->index] as $notice)
                                                    @if ($notice->notice_type_id == 1)
                                                    @if ($notice->notified == 1)

                                                    @else
                                                    <a href="{{route('notice.notify', $notice->notice_id)}}" class="btn btn-outline-success ">Set to Notified</a>
                                                    @endif
                                                    @else

                                                    @endif
                                                    @empty
                                                    <b class="text-danger">---</b>
                                                    @endforelse
                                                </td>
                                            </tr>

                                            <tr>
                                                <th scope="row">Summon Notice</th>
                                                <td>{{$respondent[$loop->index]->salutation}} {{$respondent[$loop->index]->first_name}} {{$complainant[$loop->index]->middle_name}} {{$respondent[$loop->index]->last_name}}</td>
                                                <td>
                                                    @forelse($notices[$loop->index] as $notice)
                                                    @if ($notice->notice_type_id == 2)
                                                    @if ($notice->notified == 1)
                                                    <b class="text-success">NOTIFIED</b>
                                                    @else
                                                    <b class="text-danger">TO NOTIFY</b>
                                                    @endif
                                                    @else

                                                    @endif
                                                    @empty
                                                    <b class="text-danger">Notice not yet created</b>
                                                    @endforelse
                                                </td>
                                                <td>
                                                    @forelse($notices[$loop->index] as $notice)
                                                    @if ($notice->notice_type_id == 2)
                                                    @if ($notice->notified == 1)
                                                    <i>{{$notice->date_notified}}</i>
                                                    @else

                                                    @endif
                                                    @else

                                                    @endif
                                                    @empty
                                                    <b class="text-danger">---</b>
                                                    @endforelse
                                                </td>
                                                <td>
                                                    @forelse($notices[$loop->index] as $notice)
                                                    @if ($notice->notice_type_id == 2)
                                                    @if ($notice->notified == 1)

                                                    @else
                                                    <a href="{{route('notice.notify', $notice->notice_id)}}" class="btn btn-outline-success ">Set to Notified</a>
                                                    @endif
                                                    @else

                                                    @endif
                                                    @empty
                                                    <b class="text-danger">---</b>
                                                    @endforelse
                                                </td>
                                            </tr>

                                            <tr>
                                                <th scope="row">Pangkat Constitution Notice</th>
                                                <td></td>
                                                <td>
                                                    @forelse($notices[$loop->index] as $notice)
                                                    @if ($notice->notice_type_id == 4)
                                                    @if ($notice->notified == 1)
                                                    <b class="text-success">NOTIFIED</b>
                                                    @else
                                                    <b class="text-danger">TO NOTIFY</b>
                                                    @endif
                                                    @else

                                                    @endif
                                                    @empty
                                                    <b class="text-danger">Notice not yet created</b>
                                                    @endforelse
                                                </td>
                                                <td>
                                                    @forelse($notices[$loop->index] as $notice)
                                                    @if ($notice->notice_type_id == 4)
                                                    @if ($notice->notified == 1)
                                                    <i>{{$notice->date_notified}}</i>
                                                    @else

                                                    @endif
                                                    @else

                                                    @endif
                                                    @empty
                                                    <b class="text-danger">---</b>
                                                    @endforelse
                                                </td>
                                                <td>
                                                    @forelse($notices[$loop->index] as $notice)
                                                    @if ($notice->notice_type_id == 4)
                                                    @if ($notice->notified == 1)

                                                    @else
                                                    <a href="{{route('notice.notify', $notice->notice_id)}}" class="btn btn-outline-success ">Set to Notified</a>
                                                    @endif
                                                    @else

                                                    @endif
                                                    @empty
                                                    <b class="text-danger">---</b>
                                                    @endforelse
                                                </td>
                                            </tr>

                                            <tr>
                                                <th scope="row">Subpoena Notice</th>
                                                <td></td>
                                                <td>
                                                    @forelse($notices[$loop->index] as $notice)
                                                    @if ($notice->notice_type_id == 3)
                                                    @if ($notice->notified == 1)
                                                    <b class="text-success">NOTIFIED</b>
                                                    @else
                                                    <b class="text-danger">TO NOTIFY</b>
                                                    @endif
                                                    @else

                                                    @endif
                                                    @empty
                                                    <b class="text-danger">Notice not yet created</b>
                                                    @endforelse
                                                </td>
                                                <td>
                                                    @forelse($notices[$loop->index] as $notice)
                                                    @if ($notice->notice_type_id == 3)
                                                    @if ($notice->notified == 1)
                                                    <i>{{$notice->date_notified}}</i>
                                                    @else

                                                    @endif
                                                    @else

                                                    @endif
                                                    @empty
                                                    <b class="text-danger">---</b>
                                                    @endforelse
                                                </td>
                                                <td>
                                                    @forelse($notices[$loop->index] as $notice)
                                                    @if ($notice->notice_type_id == 3)
                                                    @if ($notice->notified == 1)

                                                    @else
                                                    <a href="{{route('notice.notify', $notice->notice_id)}}" class="btn btn-outline-success ">Set to Notified</a>
                                                    @endif
                                                    @else

                                                    @endif
                                                    @empty
                                                    <b class="text-danger">---</b>
                                                    @endforelse
                                                </td>
                                            </tr>

                                            <tr>
                                                @forelse($notices[$loop->index] as $notice)
                                                @if ($notice->notice_id)
                                                <td class="text-right" colspan="5"><a href="{{route('notice.create', $notice->case_no)}}" class="btn btn-sm btn-primary text-right">Manage Notice</a></td>
                                                @endif
                                                @break
                                                @empty
                                                <td class="text-right" colspan="5"><a href="{{route('notice.schedule', $blotter->case_no)}}" class="btn btn-sm btn-danger text-right">No schedule yet</a></td>
                                                @endforelse
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="justify-content-end p-3">{{ $blotter_report->appends(['search'=>request()->query('search')])->links() }} </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>