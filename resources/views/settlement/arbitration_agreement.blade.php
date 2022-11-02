<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arbitration Agreement</title>
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

                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">Settlement</li>
                            <li class="breadcrumb-item"><a href="{{route('settlement.show.arbitration')}}">Arbitrations</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Agreement</li>
                        </ol>
                    </nav>

                    <div class="card p-3 shadow">
                        <div class="row">
                            <div class="col">

                                <p class="fs-4 fw-bold">Agreement for Arbitration</p>
                                <p class="fst-italic">{{$blotter_report->case_no}}, {{$blotter_report->case_title}}</p>

                            </div>
                            <div class="col text-right">
                                <div class="btn-group btn-group-sm" role="group" aria-label="Basic example">
                                    <a href="{{route('settlement.file-court-action', $blotter_report->case_no)}}" class="btn btn-danger">File Court Action</a>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col">
                                <div class="card shadow-sm p-2" style="height: 12rem;">
                                    <p class="fw-bold text-primary">Complainant</p>
                                    <p class="fw-normal"><span class="text-uppercase">&nbsp;&nbsp;&nbsp;&nbsp; {{$complainant->last_name}}</span>, {{$complainant->last_name}}, {{$complainant->middle_name}}</p>
                                </div>

                            </div>
                            <div class="col">
                                <div class="card shadow-sm p-2" style="height: 12rem;">
                                    <p class="fw-bold text-primary">Respondent</p>
                                    <p class="fw-normal"><span class="text-uppercase">&nbsp;&nbsp;&nbsp;&nbsp; {{$respondent->last_name}}</span>, {{$respondent->last_name}}, {{$respondent->middle_name}}</p>
                                </div>
                            </div>
                            <div class="col">
                                <div class="card shadow-sm p-2" style="height: 12rem;">
                                    <p class="fw-bold text-primary">Witness</p>
                                    @forelse($persons as $person)
                                    <ul style="border-bottom: 1px solid;">
                                        <li>
                                            <span class="text-uppercase"> {{$person->last_name}}</span>, {{$person->first_name}}, {{$person->middle_name}}
                                        </li>
                                    </ul>
                                    @empty
                                    <p class="fw-bold">No Witnesses...</b></p>
                                    @endforelse
                                </div>
                            </div>
                        </div>

                        <form method="post" action="{{route('settlement.arbitration_agreement.store', $blotter_report->case_no)}}" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="p-3">
                                    <p class="fw-bold text-primary">Amicable Settlement Agreement</p>
                                    <p class="">We hereby agree to submit our dispute for arbitration to the Punong Barangay/Pangkat ng Tagapagsundo and bind ourselves to comply with the award that may be rendered thereon. We have made this agreement freely with a fully understanding of its nature and consequences.</p>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-auto mb-3">
                                    <p class="fw-bold text-primary">Complainant's Signature</p>
                                    <input type="file" class="form-control shadow-none  @error('complainant_sign') is-invalid @enderror" onchange="previewFile(this)" name="complainant_sign" value="{{old('complainant_sign')}}">
                                    @error('complainant_sign')
                                    <small id="helpId" class="form-text text-danger">{{$message}}</small>
                                    @enderror
                                    <br>
                                    <p class="fw-bold text-primary">Respondent's Signature</p>
                                    <input type="file" class="form-control shadow-none  @error('respondent_sign') is-invalid @enderror" onchange="previewFile(this)" name="respondent_sign" value="{{old('respondent_sign')}}">
                                    @error('respondent_sign')
                                    <small id="helpId" class="form-text text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mt-5">
                                <p class="fw-bold text-primary">Attestation</p>
                                <p class="">I hereby certify that the foregoing Agreement for Arbitration was entered into by the parties freely and voluntarily, after I had explained to them nature and the consequences of such agreement.</p>
                            </div>

                            <div class="row">
                                <div class="col-md-auto mb-3">
                                    <p class="fw-bold text-primary">Lupon's Signature</p>
                                    <input type="file" class="form-control shadow-none  @error('lupon_sign') is-invalid @enderror" onchange="previewFile(this)" name="lupon_sign" value="{{old('lupon_sign')}}">
                                    @error('lupon_sign')
                                    <small id="helpId" class="form-text text-danger">{{$message}}</small>
                                    @enderror
                                </div>
                            </div>



                            <div class="mb-3 mt-3">
                                <button type="submit" class="btn btn-primary">Create Settlement</button>
                            </div>
                        </form>
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