<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Amicable Settlement Form</title>
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
            <p class="h5 text-center fw-bold">AMICABLE SETTLEMENT</p>
        </div>

        <div class="row">
            <p class="lh-lg">We, complainant/s and respondent/s in the above-captioned case, do hearby agree to settle our dispute as follows:
                <br><b><u> {{$amicable_settlement->agreement_desc}}. </u></b>
            </p>
            <p class="lh-lg">and bind ourselves to comply honestly and faithfully with the above terms of settlement.</p>
            <p class="lh-lg">Entered in this <b>{{date('jS', strtotime($amicable_settlement->date_agreed))}}</b> day of <b>{{date('F', strtotime($amicable_settlement->date_agreed))}}</b>, <b>{{date('Y', strtotime($amicable_settlement->date_agreed))}}</b>.</p>

            <div class="row">
                <div class="col-2">
                    Complainant<br>
                    <u><b>{{$complainant->salutation}} {{$complainant->first_name}} {{$complainant->middle_name}} {{$complainant->last_name}}</b></u>
                </div>

                <div class="col-2">
                    Respondent<br>
                    <u><b>{{$respondent->salutation}} {{$respondent->first_name}} {{$respondent->middle_name}} {{$respondent->last_name}}</b></u>
                </div>
            </div>

            <div class="row mt-3">
                <p class="text-center text-uppercase">ATTESTATION</p>
                <p class="lh-lg">I hereby certify that the foregoing amicable settlement was entered into by the parties freely and voluntarily, after I had explained to them the nature and consequence of such settlement.</p>
                <p class="lh-lg">__________________________ <br>Punong Barangay/Pangkat Chairman</p>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>