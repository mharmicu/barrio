<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report Incident | BARRIO</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="icon" type="image/png" href="{{ asset('/img/385-logo.png') }}">
    <link href="../css/styles.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <div class="container">
            <a class="navbar-brand" href="/">
                <img src="{{ asset('/img/385-logo.png') }}" width="40" height="40" alt="">
            </a>
            <a class="navbar-brand" href="/"><span class="text-danger">BAR</span>RIO</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Go back to Home</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link active" href="{{route('report')}}">Report</a>
                    </li>


                    @if (Route::has('login'))
                    @auth
                    <x-app-layout>
                    </x-app-layout>
                    @else
                    <li class="nav-item">
                        <a class="nav-link btn btn-danger ml-lg-3" href="{{ route('login') }}">Login</a>
                    </li>
                    @endauth
                    @endif
                </ul>

            </div>
        </div>
    </nav>


    <div class="d-flex " id="wrapper">

        <!-- Page content wrapper-->
        <div id="page-content-wrapper">

            <!-- Page content-->
            <div class="container-fluid" style="margin-top: 150px">


                <div class="row d-flex justify-content-center mt-4">
                    <div class="col-sm">

                        <img src="{{ asset('/img/385-logo.png') }}" class="img-fluid rounded mx-auto d-block" alt="..." width="300" height="300">

                        <div class="text-center mt-5">
                            <!-- Button trigger modal -->
                            <button type="button" class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                <i class="bi bi-plus-square-fill"></i> New Incident Report
                            </button>
                        </div>


                        @if (session()->has('success'))
                        <script>
                            Swal.fire({
                                icon: 'success',
                                title: 'Incident Report submitted successfully',
                                footer: '<a href="/">Return to home</a>'
                            })
                        </script>
                        @else
                        @endif


                        <!-- Modal -->
                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                            <div class="modal-dialog  modal-dialog-centered modal-dialog-scrollable modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="staticBackdropLabel">Create an Incident Report</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">


                                        <!-- card -->
                                        <div class="card p-3">
                                            <h2 class="mt-3">Incident Report</h2>
                                            <p class="card-text mb-3">Please fill out all the fields below and click on
                                                the "Submit" button to save the Incident Report to the database.</p>
                                            <hr>

                                            <!-- form -->
                                            <form method="POST" enctype="multipart/form-data" id="form" action="{{route('report.store')}}">
                                                @csrf
                                                <div class="mb-3" id="textboxDiv">

                                                    <div class="mb-3">
                                                        <label for="type" class="form-label">Description of Incident</label>
                                                        <select class="form-select shadow-none  @error('type') is-invalid @enderror" name="type" id="type" required>
                                                            <option selected disabled value="">-</option>
                                                            <option value="disorderly conduct" {{ old('type') == "disorderly conduct" ? 'selected' : '' }}>disorderly conduct</option>
                                                            <option value="public scandal" {{ old('type') == "public scandal" ? 'selected' : '' }}>public scandal</option>
                                                            <option value="harassment" {{ old('type') == "harassment" ? 'selected' : '' }}>harassment</option>
                                                            <option value="drunkenness" {{ old('type') == "drunkenness" ? 'selected' : '' }}>drunkenness</option>
                                                            <option value="public intoxication" {{ old('type') == "public intoxication" ? 'selected' : '' }}>public intoxication</option>
                                                            <option value="criminal nuisance" {{ old('type') == "criminal nuisance" ? 'selected' : '' }}>criminal nuisance</option>
                                                            <option value="vandalism" {{ old('type') == "vandalism" ? 'selected' : '' }}>vandalism</option>
                                                            <option value="gambling" {{ old('type') == "gambling" ? 'selected' : '' }}>gambling</option>
                                                            <option value="mendicancy" {{ old('type') == "mendicancy" ? 'selected' : '' }}>mendicancy</option>
                                                            <option value="littering" {{ old('type') == "littering" ? 'selected' : '' }}>littering</option>
                                                            <option value="public urination" {{ old('type') == "public urination" ? 'selected' : '' }}>public urination</option>
                                                            <option value="trespassing" {{ old('type') == "trespassing" ? 'selected' : '' }}>trespassing</option>
                                                            <option value="curfew violations" {{ old('type') == "curfew violations" ? 'selected' : '' }}>curfew violations</option>
                                                            <option value="truancy" {{ old('type') == "truancy" ? 'selected' : '' }}>truancy</option>
                                                            <option value="parental disobedience" {{ old('type') == "parental disobedience" ? 'selected' : '' }}>parental disobedience</option>
                                                            <option value="anti-smoking ordinances" {{ old('type') == "anti-smoking ordinances" ? 'selected' : '' }}>anti-smoking ordinances</option>
                                                            <option value="anti-drinking ordinances" {{ old('type') == "anti-drinking ordinances" ? 'selected' : '' }}>anti-drinking ordinances</option>
                                                            <option value="others" {{ old('type') == "others" ? 'selected' : '' }}>others</option>
                                                        </select>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="date_of_incident" class="form-label">Inclusive
                                                            Date of the Incident</label>
                                                        <input type="date" class="form-control shadow-none  @error('date_of_incident') is-invalid @enderror" value="{{ old('date_of_incident') }}" name="date_of_incident" id="date_of_incident" required>
                                                        @error('date_of_incident')
                                                        <small id="helpId" class="form-text text-danger">{{ $message }}</small>
                                                        @enderror
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="street" class="form-label">Street</label>
                                                        <select class="form-select shadow-none  @error('street') is-invalid @enderror" name="street" id="street" required>
                                                            <option selected disabled value="">-</option>
                                                            <option value="Arlegui St." {{ old('street') == "Arlegui St." ? 'selected' : '' }}>Arlegui St.</option>
                                                            <option value="Castillejos St." {{ old('street') == "Castillejos St." ? 'selected' : '' }}>Castillejos St.</option>
                                                            <option value="Duque St." {{ old('street') == "Duque St." ? 'selected' : '' }}>Duque St.</option>
                                                            <option value="Farnecio St." {{ old('street') == "Farnecio St." ? 'selected' : '' }}>Farnecio St.</option>
                                                            <option value="Fraternal St." {{ old('street') == "Fraternal St." ? 'selected' : '' }}>Fraternal St.</option>
                                                            <option value="Pascual Casal St." {{ old('street') == "Pascual Casal St." ? 'selected' : '' }}>Pascual Casal St.</option>
                                                            <option value="Pax St." {{ old('street') == "Pax St." ? 'selected' : '' }}>Pax St.</option>
                                                            <option value="Vergara St." {{ old('street') == "Vergara St." ? 'selected' : '' }}>Vergara St.</option>

                                                        </select>
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="location" class="form-label">Exact Location
                                                            of the Incident</label>
                                                        <textarea class="form-control shadow-none  @error('location') is-invalid @enderror" value="{{ old('location') }}" name="location" id="location" placeholder="(room, building, area, school, street, sitio, barangay, municipality, etc.)" required>{{ old('location') }}</textarea>
                                                        @error('location')
                                                        <small id="helpId" class="form-text text-danger">{{ $message }}</small>
                                                        @enderror
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="persons" class="form-label">Involved
                                                            Person/s & Specific Participation</label>
                                                        <textarea class="form-control shadow-none  @error('persons') is-invalid @enderror" value="{{ old('persons') }}" name="persons" id="persons" required>{{ old('persons') }}</textarea>
                                                        @error('persons')
                                                        <small id="helpId" class="form-text text-danger">{{ $message }}</small>
                                                        @enderror
                                                    </div>

                                                    <div class="mb-3">
                                                        <label for="narrative" class="form-label">Narrative
                                                            Details of the Incident</label>
                                                        <textarea class="form-control shadow-none  @error('narrative') is-invalid @enderror" value="{{ old('narrative') }}" name="narrative" id="narrative" required>{{ old('narrative') }}</textarea>
                                                        @error('narrative')
                                                        <small id="helpId" class="form-text text-danger">{{ $message }}</small>
                                                        @enderror
                                                    </div>

                                                    <div class="mb-3">
                                                        <div class="form-check form-switch">
                                                            <input class="form-check-input" type="checkbox" role="switch" id="data_privacy" required>
                                                            <label class="form-check-label" for="data_privacy">
                                                                PRIVACY CONSENT. I understand and agree that by filling out this report, I am allowing the Barangay 385 / Zone 39 
                                                                to collect, process, use, share, and disclose the information I provided and also to store it as long as necessary for the 
                                                                fulfillment of Incident Reporting stated purpose and in accordance with applicable laws, 
                                                                including the Data Privacy Act of 2012 and its Implementing Rules and Regulations, and the Barangay 385 / Zone 39 Privacy Policy. 
                                                                The purpose and extent of the collection, use, sharing, disclosure, and storage of the information were cleared to me.
                                                            </label>
                                                        </div>
                                                    </div>
                                                </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-warning ">Submit Incident
                                                Report</button>
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


        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>



        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
        </script>
</body>


</html>