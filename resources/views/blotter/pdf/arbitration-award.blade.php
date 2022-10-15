<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Arbitration Award Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>

<body style=" font-family: 'Times New Roman', serif !important;">
    <!-- Page content-->
    <div class="container-fluid">
        <div class="text-center">
            <img src="{{public_path('img/385-logo.png')}}" style="width:125px; height:125px" class="rounded img-fluid" alt="Barangay 385/Zone 39"> <br><br>
        </div>
        <div class="row">

            <p class="text-center">Republic of the Philippines <br>
                Province of Metro Manila <br>
                CITY/MUNICIPALITY OF MANILA <br>
                Barangay 385 / Zone 39 <br>
                OFFICE OF THE LUPONG TAGAPAMAYAPA <br><br>
            </p>
        </div>

        <div class="row">
            <div class="col-2">
                <u><b>{{$complainant->salutation}} {{$complainant->first_name}} {{$complainant->middle_name}} {{$complainant->last_name}}</b></u><br>
                Complainant <br> <br>

                --- against --- <br><br>

                <u><b>{{$respondent->salutation}} {{$respondent->first_name}} {{$respondent->middle_name}} {{$respondent->last_name}}</b></u><br>
                Respondent <br><br><br>
            </div>

            <div class="col-2">
                Barangay Case No. <b>{{$kp_case->article_no}}</b> <br>
                For: <b>{{$kp_case->case_name}}</b> <br>
            </div>

        </div>

        <div class="row mt-3">
            <p class="h5 text-center fw-bold">ARBITRATION AWARD</p>
        </div>

        <div class="row">
            <p class="lh-lg">After hearing the testimonies given and careful examination of the evidence presented in this case, award is hereby made as follows:
                <br><b><u> {{$arbitration_award->award_desc}}. </u></b>
            </p>
            <p class="lh-lg">Made this <b>{{date('jS', strtotime($arbitration_award->date_agreed))}}</b> day of <b>{{date('F', strtotime($arbitration_award->date_agreed))}}</b>, <b>{{date('Y', strtotime($arbitration_award->date_agreed))}}</b>.</p>


            <div class="row mt-3">
                <p class="lh-lg">__________________________ <br>Punong Barangay/Pangkat Chairman *</p>
                <p class="lh-lg">__________________________ <br>Member</p>
                <p class="lh-lg">__________________________ <br>Member</p>
                <p class="text-uppercase">ATTESTED: <br> __________________________ <br>Punong Barangay/Lupon Secretary **</p>
                
                <p class="lh-lg">
                    * To be signed by either, whoever made the arbitration award. <br>
                    ** To be signed by the Punong Barangay if the award is made by the Pangkat Chairman, and by the Lupon Secretary if the award is made by the Punon Barangay.
                </p>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>