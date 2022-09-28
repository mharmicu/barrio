<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pangkat Notice</title>
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
                Complainant <br> <br> <br>

                --- against --- <br><br><br>

                <u><b>{{$respondent->salutation}} {{$respondent->first_name}} {{$respondent->middle_name}} {{$respondent->last_name}}</b></u><br>
                Respondent <br><br><br>
            </div>

            <div class="col-2">
                Barangay Case No. <b>{{$kp_case->article_no}}</b> <br>
                For: <b>{{$kp_case->case_name}}</b> <br>
            </div>

        </div>

        <div class="row mt-3">
            <p class="h5 text-center fw-bold">C O M P L A I N T</p>
        </div>

        <div class="row">
            <p class="lh-lg">I/WE hereby complain against above named respondent/s for violating my/our rights and interests in the following manner:
                <br><b><u> {{$blotter_report->complaint_desc}}. </u></b>
            </p>
            <p class="lh-lg">THEREFORE, I/WE pray that the following relief/s be granted to me/us in accordance with law and/or equity:
                <br><b><u> {{$blotter_report->relief_desc}}. </u></b>
            </p>

            <?php
            $dayI = date('jS', strtotime($blotter_report->date_of_incident));
            $monthI = date('F', strtotime($blotter_report->date_of_incident));
            $yearI = date('Y', strtotime($blotter_report->date_of_incident));

            $dayR = date('jS', strtotime($blotter_report->date_reported));
            $monthR = date('F', strtotime($blotter_report->date_reported));
            $yearR = date('Y', strtotime($blotter_report->date_reported));
            ?>

            <p class="lh-lg">Made this <b>{{$dayI}}</b> day of <b>{{$monthI}}</b>, <b>{{$yearI}}</b>.</p>
            <p class="lh-lg"><u><b>{{$complainant->salutation}} {{$complainant->first_name}} {{$complainant->middle_name}} {{$complainant->last_name}}</b></u><br>
                Complainant</p>
            <p class="lh-lg">Received and filed this <b>{{$dayR}}</b> day of <b>{{$monthR}}</b>, <b>{{$yearR}}</b>.</p>
            <p class="lh-lg"> _______________________<br>Punong Barangay/Lupon Chairman</p>
        </div>




    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>