<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settled Cases | BARRIO</title>
    <link href="../css/styles.css" rel="stylesheet" />
    <link rel="icon" type="image/png" href="{{ asset('/img/385-logo.png') }}">

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">

    <style>
        .navbar-nav>.active>a {
            color: blue !important;
        }


        .navbar-nav .nav-item:hover .nav-link {
            color: blue !important;
        }
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
                            <li class="nav-item active "><a class="nav-link text-dark fw-bold" href="{{route('blotter.settled')}}">Settled Cases</a></li>
                            <li class="nav-item"><a class="nav-link text-dark fw-bold" href="{{route('blotter.summary')}}">Search Case</a></li>

                            <x-app-layout>
                            </x-app-layout>
                        </ul>
                    </div>
                </div>
            </nav>

            <!-- Page content-->
            <div class="container-fluid">
                <div class="row d-flex justify-content-center mt-5 p-3">
                    @if(session()->has('successMed'))
                    <script>
                        Swal.fire({
                            icon: 'success',
                            title: 'Amicable Settlement has been created.',
                            footer: '<a href="/settlement/show-mediation">Return to list of mediations</a>'
                        })
                    </script>
                    @endif

                    @if(session()->has('successCon'))
                    <script>
                        Swal.fire({
                            icon: 'success',
                            title: 'Amicable Settlement has been created.',
                            footer: '<a href="/settlement/show-conciliation">Return to list of conciliations</a>'
                        })
                    </script>
                    @endif

                    @if(session()->has('award_success'))
                    <script>
                        Swal.fire({
                            icon: 'success',
                            title: 'Arbitration Award has been created.',
                            footer: '<a href="/settlement/show-arbitration">Return to list of arbitrations</a>'
                        })
                    </script>
                    @endif

                    @if(session()->has('updated'))
                    <script>
                        Swal.fire({
                            icon: 'success',
                            title: 'Blotter updated successfully',
                            footer: '<a href="/blotter/summary">Return to case summary</a>'
                        })
                    </script>
                    @endif

                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">Blotter</li>
                            <li class="breadcrumb-item active" aria-current="page">Settled</li>
                        </ol>
                    </nav>

                    <div class="card p-3 shadow">
                        <p class="fs-4 fw-bold">Settled Cases</p>
                        <div class="table-responsive">
                            <table class="table table-bordered  yajra-datatable">
                                <thead>
                                    <tr>
                                        <th>Case No.</th>
                                        <th>Case Title</th>
                                        <th>Compliant Case</th>
                                        <th>Hearing/Action</th>
                                        <th>Date of Agreement</th>
                                        <th>Date of Execution</th>
                                        <th>Agreement</th>
                                        <th>Status of Compliance</th>
                                        <th>Remarks</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>

                            </table>
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

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
    $(function() {

        $.fn.dataTable.render.ellipsis = function(cutoff, wordbreak, escapeHtml) {
            var esc = function(t) {
                return t
                    .replace(/&/g, '&amp;')
                    .replace(/</g, '&lt;')
                    .replace(/>/g, '&gt;')
                    .replace(/"/g, '&quot;');
            };

            return function(d, type, row) {
                // Order, search and type get the original data
                if (type !== 'display') {
                    return d;
                }

                if (typeof d !== 'number' && typeof d !== 'string') {
                    return d;
                }

                d = d.toString(); // cast numbers

                if (d.length < cutoff) {
                    return d;
                }

                var shortened = d.substr(0, cutoff - 1);

                // Find the last white space character in the string
                if (wordbreak) {
                    shortened = shortened.replace(/\s([^\s]*)$/, '');
                }

                // Protect against uncontrolled HTML input
                if (escapeHtml) {
                    shortened = esc(shortened);
                }

                return '<span class="ellipsis" title="' + esc(d) + '">' + shortened + '&#8230;</span>';
            };
        };


        var table = $('.yajra-datatable').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('blotter.settled-list') }}",
            order: [[0, 'desc']],
            columns: [{
                    data: 'case_no',
                    name: 'case_no'
                },
                {
                    data: 'case_title',
                    name: 'case_title'
                },
                {
                    data: 'article_no',
                    name: 'article_no'
                },
                {
                    data: 'status',
                    name: 'status'
                },
                {
                    data: 'date_agreed',
                    name: 'date_agreed'
                },
                {
                    data: 'date_of_execution',
                    name: 'date_of_execution'
                },
                {
                    data: 'agreement',
                    name: 'agreement',
                    targets: 0,
                    render: $.fn.dataTable.render.ellipsis(80)
                },
                {
                    data: 'compliance',
                    name: 'compliance'
                },
                {
                    data: 'remarks',
                    name: 'remarks'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: true,
                    searchable: true
                },
            ]
        });

    });
</script>



</html>