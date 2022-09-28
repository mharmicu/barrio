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
                OFFICE OF THE PUNONG BARANGAY <br><br>
                <b>NOTICE FOR CONSTITUTION OF PANGKAT </b> <br>

            </p>
        </div>

        <div class="row">
            <div class="col-2">
                TO:
                <br><u><b>{{$complainant->salutation}} {{$complainant->first_name}} {{$complainant->middle_name}} {{$complainant->last_name}}</b></u><br>
                Complainant <br> <br> <br>
            </div>

            <div class="col-2">
                <br><u><b>{{$respondent->salutation}} {{$respondent->first_name}} {{$respondent->middle_name}} {{$respondent->last_name}}</b></u><br>
                Respondent <br><br><br>
            </div>
        </div>

        <div class="row">
            <?php
            $day = date('F d, Y, h:iA', strtotime($notice->date_of_meeting));
            $day = date('jS', strtotime($notice->date_of_meeting));
            $month = date('F', strtotime($notice->date_of_meeting));
            $year = date('Y', strtotime($notice->date_of_meeting));
            $time = date('h:i', strtotime($notice->date_of_meeting));
            ?>

            <p class="lh-lg">You are hereby to required to appear before me on the <b>{{$day}}</b> day of <b>{{$month}}, {{$year}}</b>, at <b>{{$time}}</b> o'clock in the morning/afternoon, for the constitution of the Pangkat ng Tagapagkasundo which shall conciliate your dispute. Should you fail to agree on the
                Pangkat membership or to appear on the aforesaid date for the constitution of the Pangkat, I shall determine the membership thereof by drawing lots.</p>
            <p class="lh-lg">This <b>{{date('jS')}}</b> day of <b>{{date('F')}}, {{date('Y')}}.</b></p>
            <p class="lh-lg"> _______________________<br>Punong Barangay/Lupon Chairman</p>
            <p class="lh-lg">Notified this <b>{{date('jS', strtotime($notice->date_notified))}}</b> day of <b>{{date('F', strtotime($notice->date_notified))}}, {{date('Y', strtotime($notice->date_notified))}}.</b></p>
            </p>
        </div>

        <div class="row">
            <div class="col-2">
                TO:
                <br><u><b>{{$complainant->salutation}} {{$complainant->first_name}} {{$complainant->middle_name}} {{$complainant->last_name}}</b></u><br>
                Complainant <br> <br> <br>
            </div>

            <div class="col-2">
                <br><u><b>{{$respondent->salutation}} {{$respondent->first_name}} {{$respondent->middle_name}} {{$respondent->last_name}}</b></u><br>
                Respondent <br><br><br>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>