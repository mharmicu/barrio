<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hearing Notice</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>

<body style=" font-family: 'Times New Roman', serif !important;">
    <!-- Page content-->
    <div class="container-fluid">
        <div class="text-center">
            <img src="{{public_path('img/385-logo.png')}}" style="width:150px; height:150px" class="rounded img-fluid" alt="Barangay 385/Zone 39"> <br><br>
        </div>
        <div class="row">

            <p class="text-center">Republic of the Philippines <br>
                Province of Metro Manila <br>
                CITY/MUNICIPALITY OF MANILA <br>
                Barangay 385 / Zone 39 <br><br>

                OFFICE OF THE LUPONG TAGAPAMAYAPA <br><br>

                <b>NOTICE OF HEARING<br>
                    (MEDIATION PROCEEDINGS)</b>
            </p>

            <p>
                TO: <b>{{$complainant->salutation}} {{$complainant->first_name}} {{$complainant->middle_name}} {{$complainant->last_name}}</b> <br>
                Complainant <br><br>
            </p>

            <p>
                <?php
                $day = date('F d, Y, h:iA', strtotime($notice->date_of_meeting));
                $day = date('jS', strtotime($notice->date_of_meeting));
                $month = date('F', strtotime($notice->date_of_meeting));
                $year = date('Y', strtotime($notice->date_of_meeting));
                $time = date('h:i', strtotime($notice->date_of_meeting));


                ?>
                You are herby required to appear before me on the <b>{{$day}}</b> day of <b>{{$month}}, {{$year}}</b> at
                <b>{{$time}}</b> o'clock <br> in the morning/afternoon for the hearing of your complaint. <br><br>

                This <b>{{date('jS')}}</b> day of <b>{{date('F')}}, {{date('Y')}} </b>. <br><br>
            </p>

            <p>
                _______________________<br>
                Punong Barangay/Lupon Chairman

                <br><br>
                Notified this <b>{{date('jS', strtotime($notice->date_notified))}}</b> day of <b>{{date('F', strtotime($notice->date_notified))}}, {{date('Y', strtotime($notice->date_notified))}}.</b> <br><br><br>

                complainant <br>
                ______________ <br>
                <b>{{$complainant->salutation}} {{$complainant->first_name}} {{$complainant->middle_name}} {{$complainant->last_name}}</b>

            </p>

        </div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>