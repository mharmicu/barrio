<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/styles.css" rel="stylesheet" />
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

                <div class="row d-flex justify-content-center mt-4">
                    <div class="col-sm">
                        @if(session()->has('success'))
                        <script>
                            Swal.fire({
                                icon: 'success',
                                title: 'Blotter created successfully',
                                footer: '<a href="/home">Return to home</a>'
                            })
                        </script>
                        @else
                        @endif
                        <!-- card -->
                        <div class="card p-3">
                            <h2 class="mt-3">Create Blotter Record</h2>
                            <p class="card-text mb-3">Please fill out all the fields below and click on the "Submit" button to save the blotter record to the database.</p>
                            <hr>

                            <!-- form -->
                            <form method="POST" action="{{route('blotter.store')}}" enctype="multipart/form-data" id="form">
                                @csrf
                                <div class="mb-3" id="textboxDiv">
                                    <label for="complainant" class="form-label">Complainant(s)</label>
                                    <button type="button" class="btn btn-light btn-sm" id="addComplainant">Add another complainant</button>
                                    <!-- <button type="button" class="btn btn-light btn-sm" id="Remove">Remove</button> -->
                                    <div class="row">
                                        <div class="col-sm-1 mb-1">
                                            <select class="form-select shadow-none  @error('salutation') is-invalid @enderror" name="salutation" id="salutation" required>

                                                <option selected disabled>Salutation</option>
                                                <option value="Mr." {{ old('salutation') == "Mr." ? 'selected' : '' }}>Mr.</option>
                                                <option value="Ms." {{ old('salutation') == "Ms." ? 'selected' : '' }}>Ms.</option>
                                                <option value="Mrs." {{ old('salutation') == "Mrs." ? 'selected' : '' }}>Mrs.</option>
                                                <option value="">--prefer not to say--</option>
                                            </select>
                                        </div>

                                        <div class="col">
                                            <input type="text" placeholder="Last name" class="form-control shadow-none  @error('lastname') is-invalid @enderror" value="{{old('lastname')}}" name="lastname" id="lastname" required>
                                            @error('lastname')
                                            <small id="helpId" class="form-text text-danger">{{$message}}</small>
                                            @enderror
                                        </div>
                                        <div class="col">
                                            <input type="text" placeholder="First name" class="form-control shadow-none  @error('firstname') is-invalid @enderror" value="{{old('firstname')}}" name="firstname" id="firstname" required>
                                            @error('firstname')
                                            <small id="helpId" class="form-text text-danger">{{$message}}</small>
                                            @enderror
                                        </div>
                                        <div class="col">
                                            <input type="text" placeholder="Middle name" class="form-control shadow-none  @error('middlename') is-invalid @enderror" value="{{old('middlename')}}" name="middlename" id="middlename" required>
                                            @error('middlename')
                                            <small id="helpId" class="form-text text-danger">{{$message}}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>


                                <div class="mb-3">
                                    <label for="case" class="form-label">Incident Case</label>
                                    <select class="form-select shadow-none  @error('case') is-invalid @enderror" name="case" id="case" required>
                                        <option selected disabled>Verify the incident report case</option>
                                        @foreach($kp_cases as $case)
                                        <option value="{{$case->article_no}}" {{ old('case') == $case->article_no ? 'selected' : '' }}>{{$case->article_no}} - {{$case->case_name}}</option>
                                        @endforeach
                                    </select>

                                </div>

                                <div class="mb-3">
                                    <label for="complaint_desc" class="form-label">Description of Violation</label>
                                    <textarea class="form-control shadow-none  @error('complaint_desc') is-invalid @enderror" value="{{old('complaint_desc')}}" name="complaint_desc" id="complaint_desc" required>{{old('complaint_desc')}}</textarea>
                                    @error('complaint_desc')
                                    <small id="helpId" class="form-text text-danger">{{$message}}</small>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="relief_desc" class="form-label">Relief/s Asked</label>
                                    <textarea class="form-control shadow-none  @error('relief_desc') is-invalid @enderror" value="{{old('relief_desc')}}" name="relief_desc" id="relief_desc" required>{{old('relief_desc')}}</textarea>
                                    @error('relief_desc')
                                    <small id="helpId" class="form-text text-danger">{{$message}}</small>
                                    @enderror
                                </div>

                                <div class="mb-3" id="textboxDiv">
                                    <label for="respondent" class="form-label">Respondent(s)</label>
                                    <button type="button" class="btn btn-light btn-sm" id="addComplainant">Add another respondent</button>
                                    <!-- <button type="button" class="btn btn-light btn-sm" id="Remove">Remove</button> -->
                                    <div class="row">
                                        <div class="col-sm-1 mb-1">
                                            <select class="form-select shadow-none  @error('salutation_res') is-invalid @enderror" name="salutation_res" id="salutation_res" required>
                                                <option selected disabled>Salutation</option>
                                                <option value="Mr." {{ old('salutation') == "Mr." ? 'selected' : '' }}>Mr.</option>
                                                <option value="Ms." {{ old('salutation') == "Ms." ? 'selected' : '' }}>Ms.</option>
                                                <option value="Mrs." {{ old('salutation') == "Mrs." ? 'selected' : '' }}>Mrs.</option>
                                                <option value="">--prefer not to say--</option>
                                            </select>
                                        </div>
                                        <div class="col">
                                            <input type="text" placeholder="Last name" class="form-control shadow-none  @error('lastname_res') is-invalid @enderror" value="{{old('lastname_res')}}" name="lastname_res" id="lastname_res" required>
                                            @error('lastname_res')
                                            <small id="helpId" class="form-text text-danger">{{$message}}</small>
                                            @enderror
                                        </div>
                                        <div class="col">
                                            <input type="text" placeholder="First name" class="form-control shadow-none  @error('firstname_res') is-invalid @enderror" value="{{old('firstname_res')}}" name="firstname_res" id="firstname_res" required>
                                            @error('firstname_res')
                                            <small id="helpId" class="form-text text-danger">{{$message}}</small>
                                            @enderror
                                        </div>
                                        <div class="col">
                                            <input type="text" placeholder="Middle name" class="form-control shadow-none  @error('middlename_res') is-invalid @enderror" value="{{old('middlename_res')}}" name="middlename_res" id="middlename_res" required>
                                            @error('middlename_res')
                                            <small id="helpId" class="form-text text-danger">{{$message}}</small>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <label for="date_of_incident" class="form-label">Date of Incident</label>
                                    <input type="date" class="form-control shadow-none  @error('date_of_incident') is-invalid @enderror" value="{{old('date_of_incident')}}" name="date_of_incident" id="date_of_incident" required>
                                    @error('date_of_incident')
                                    <small id="helpId" class="form-text text-danger">{{$message}}</small>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="file" class="form-label">Complainant(s) Digital Signature</label>
                                    <input type="file" class="form-control shadow-none  @error('file') is-invalid @enderror" onchange="previewFile(this)" name="file" required>
                                    <img id="previewImg" alt="digital signature" style="max-width:15rem; margin-top:2rem;">
                                    @error('file')
                                    <small id="helpId" class="form-text text-danger">{{$message}}</small>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" role="switch" id="flexSwitchCheckDefault">
                                        <label class="form-check-label" for="flexSwitchCheckDefault">Signed by the Punong Barangay</label>
                                    </div>
                                </div>



                                <button type="submit" class="btn btn-dark ">Create Blotter Report</button>
                            </form>

                        </div>
                    </div>
                </div>





            </div>
        </div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

    <!-- DYNAMICALLY ADD ANOTHER COMPLAINANT
    <script>
        $(document).ready(function() {
            $("#addComplainant").on("click", function() {
                newRowAdd = '<div class="row mt-2"> <div class="col"> <input type="text" placeholder="Last name" class="form-control shadow-none name="lastname" id="lastname"> </div> <div class="col"> <input type="text" placeholder="First name" class="form-control shadow-none name="firstname" id="firstname"> </div> <div class="col"> <input type="text" placeholder="Middle name" class="form-control shadow-none name="middlename" id="middlename"> </div> </div>';


                $("#textboxDiv").append(newRowAdd);
            });
            $("#Remove").on("click", function() {
                $("#textboxDiv").children().last().remove();
            });
        });
    </script>
    -->

</body>

</html>