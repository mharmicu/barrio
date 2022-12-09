<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedbacks | BARRIO</title>
    <link href="../../css/styles.css" rel="stylesheet" />
    <link rel="icon" type="image/png" href="{{ asset('/img/385-logo.png') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" rel="stylesheet">
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

                <div class="row d-flex justify-content-center  p-5">

                    <!-- User Manual -->
                    <div class="card p-3 shadow mt-4">
                        <p class="fs-4 fw-bold">User Manual</p>

                        <p class="text-dark" style="text-align: justify;">This user manual helps you navigate the entire
                            system. This will give you an overview on how
                            to use different modules and how to access them. </p>
                        <hr>


                        <div class="col-12 col-md-12 col-lg-12 mb-4">
                            <div class="card text-dark text-center pb-2 h-100" style="background-color: #ffffff;">
                                <div class="card-body">
                                    <div class="accordion accordion-flush" id="accordionFlushExample">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="flush-headingEight">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseEight" aria-expanded="false" aria-controls="flush-collapseEight" style="font-weight: bold;">
                                                    Users
                                                </button>
                                            </h2>
                                            <div id="flush-collapseEight" class="accordion-collapse collapse" aria-labelledby="flush-headingEight" data-bs-parent="#accordionFlushExample">
                                                <div class="accordion-body text-dark" style="text-align: justify;">
                                                    The administrative side of BARRIO portal can only be used by the
                                                    following users:<br>
                                                    <br> &nbsp A. <strong>Lupon</strong> - Punong Barangay and Barangay
                                                    Secretary
                                                    <br> &nbsp B. <strong>Sangguniang Bayan Member</strong> - Barangay
                                                    Councilors/Kagawad
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="flush-headingOne">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne" style="font-weight: bold;">
                                                    Categories
                                                </button>
                                            </h2>
                                            <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                                <div class="accordion-body text-dark" style="text-align: justify;">For
                                                    better accessibility, the modules of the system have been
                                                    categorized into three parts. <br>
                                                    <br> &nbsp A. <strong>Dashboard </strong> – This contains the
                                                    Analytics of the
                                                    application.
                                                    <br> &nbsp B. <strong>Content </strong>– Under this we have Blotter,
                                                    Notices, Hearing
                                                    Process,
                                                    and Incident Reports.
                                                    <br> &nbsp C. <strong>Management </strong> – This category includes
                                                    the Accounts, KP
                                                    Cases,
                                                    Feedbacks & Queries, Activity Logs, and User Manual.
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="flush-headingTwo">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo" style="font-weight: bold;">
                                                    Analytics Module
                                                </button>
                                            </h2>
                                            <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                                                <div class="accordion-body text-dark" style="text-align: justify;">The
                                                    Analytics feature will display and track barangay-wide incident
                                                    report trends.
                                                    <hr>
                                                    <div class="about-img">
                                                        <img src="../img/stats.png" alt="" class="img-fluid">
                                                    </div><br>
                                                    <p> The image above indicates the statistics of the following: </p>
                                                    <p> A. <strong> Blotter Cases </strong> - It indicates the cases
                                                        recorded today, this week, and this month. This will give you an
                                                        overview of the numbers and frequencies for blotter reporting.
                                                    </p>
                                                    <p> B. <strong>Settled Cases </strong> - It indicates the total
                                                        settled cases where the respondent and complainant had an
                                                        agreement. It also indicates the total cases, unsettled cases,
                                                        and court action.</p>
                                                    <p> C. <strong>Incident Reports </strong> - It indicates the total
                                                        incident reports recorded. This also gives you an overview of
                                                        how many incident reports were recorded today, this week, and
                                                        this month.</p>
                                                    <p> D. <strong>Current Hearings</strong> - It indicates the number
                                                        of hearings under mediation, conciliation, and arbitration.</p>

                                                    <hr>
                                                    <br>
                                                    <div class="about-img">
                                                        <img src="../img/blotter_hearing.png" alt="" class="img-fluid">
                                                    </div><br>
                                                    <p> <strong> Blotter Trend </strong> line chart indicates the
                                                        blotter reports
                                                        recorded per year and also in months. You can view specific
                                                        record of the year and month using the date picker. The reset
                                                        button will redirect you to the current year's record.</p>
                                                    <p> <strong>Hearing Schedule</strong> enables you to view the
                                                        hearing that is scheduled today, tomorrow, and next week.</p>
                                                    <hr>
                                                    <br>
                                                    <div class="about-img">
                                                        <img src="../img/article_hearing.png" alt="" class="img-fluid">
                                                    </div><br>
                                                    <p> <strong> Common Case Article No. </strong> horizontal bar graph
                                                        illustrates the ranking of Katarungang Pambarangay Article no.
                                                        that has the top recorded blotter reports under the said case.
                                                        It will give you an overview on what is the leading cases
                                                        reported in the barangay's blotter repository.</p>
                                                    <p> <strong>Total Hearings</strong> is a chart wherein you will have
                                                        an overview on how many percentages of the blotter reports are
                                                        under mediation, conciliation, and arbitration.</p>
                                                    <hr>
                                                    <br>
                                                    <div class="about-img">
                                                        <img src="../img/word_cloud.png" alt="" class="img-fluid">
                                                    </div><br>
                                                    <p> <strong> Word Analytics </strong> will help you identify the
                                                        most occuring words found in the blotter reports. It shows the
                                                        popularity of words or phrases by
                                                        making the most frequently used words appear larger or bolder
                                                        compared with the other words around them.</p>
                                                    <hr>
                                                    <br>
                                                    <div class="about-img">
                                                        <img src="../img/incident.png" alt="" class="img-fluid">
                                                    </div><br>
                                                    <p> <strong> Top 5 Incidents </strong> will help you identify the
                                                        top 5 Incident descriptions reported in the system.</p>
                                                    <p> <strong>Incident Trend</strong> is a line chart on which you can
                                                        see the trends and frequencies of the incidents happening on
                                                        each month for the entire year. You will see what month has the
                                                        most incident reported.</p>
                                                    <hr>
                                                    <br>
                                                    <div class="about-img">
                                                        <img src="../img/street_reports.png" alt="" class="img-fluid">
                                                    </div><br>
                                                    <p> <strong> Street Reports</strong> This shows the monthly
                                                        incident reports on each street, in this case, we use red. the
                                                        volume of incidents in each street per month, we can see that
                                                        the darker the color, the more incidents are reported during
                                                        that month in that street.</p>
                                                    <hr>
                                                    <br>
                                                    <div class="about-img">
                                                        <img src="../img/incident_street.png" alt="" class="img-fluid">
                                                    </div><br>
                                                    <p> <strong> Incident Report per Street Matrix</strong> To better
                                                        visualize when that incident happened, we have a matrix chart of
                                                        daily incident records for each street. Here you can see a
                                                        full-year view on a daily basis of what specific days that the
                                                        incident happened on that street.
                                                    </p>
                                                    <hr>
                                                    <br>
                                                </div>


                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="flush-headingThree">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree" style="font-weight: bold;">
                                                    Blotter Module
                                                </button>
                                            </h2>
                                            <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
                                                <div class="accordion-body text-dark" style="text-align: justify;">
                                                    Blotter Module's function is to display cases and court actions that
                                                    are currently in progress and are being managed by Lupon and SB
                                                    Members.
                                                    <hr>
                                                </div>

                                                <div class="about-img">
                                                    <img src="../img/blotter_display.png" alt="" class="img-fluid">
                                                </div><br>
                                                <p style="text-align: left;"><strong>Ongoing Blotter Cases</strong></p>
                                                <p style="text-align: justify;"> &nbsp A. <strong> Case no.</strong> -
                                                    This is based
                                                    on the current year followed by xxx. It is automatically
                                                    assigned by the system, thus, you cannot change it.</p>
                                                <p style="text-align: justify;">&nbsp B. <strong>Title </strong>- This
                                                    is the surname of Complainant
                                                    VS Respondent.</p>
                                                <p style="text-align: justify;">&nbsp C. <strong>Hearing Status
                                                    </strong>- This will give you an idea
                                                    on which hearing process the specific case is whether it is under
                                                    Mediation, Conciliation, Arbitration, or N/A which means the case
                                                    does not have a meeting schedule yet.</p>
                                                <p style="text-align: justify;">&nbsp D. <strong>Incident Description
                                                    </strong>- This is displays the
                                                    overview of the incident description based on the submitted blotter
                                                    report.</p>
                                                <p style="text-align: justify;">&nbsp E. <strong>Relief Description
                                                    </strong>- This is indicates
                                                    relief/s asked by the complainant to the respondent based on the
                                                    submitted blotter report.</p>
                                                <p style="text-align: justify;">&nbsp F. <strong>Date of Incident
                                                    </strong>- This is shows the date
                                                    on which the incident occurred.</p>
                                                <p style="text-align: justify;">&nbsp G. <strong>Date Reported
                                                    </strong>- This is shows the date on
                                                    which the complainant filed a blotter report to the barangay.</p>
                                                <p style="text-align: justify;">&nbsp H. <strong>Action </strong>-
                                                    Three different buttons will
                                                    appear on this column. The "Set Meeting Schedule" will be the first
                                                    button you will see after filling the blotter report. Once you set
                                                    the meeting schedule, the buttons in this column will change to
                                                    "Show Notices" and "Hearing". Show notices button will redirect you
                                                    to creating notices and once created, you can now proceed to Hearing
                                                    button which will let you see the specific case report and write an
                                                    amicable settlement agreement. </p>
                                                <p style="text-align: justify;">&nbsp I. <strong>New Blotter Record
                                                    </strong>- This button will let
                                                    you create a new blotter report. A form will be displayed and you
                                                    will need to fill in the necessary information for the report.</p>
                                                <hr>
                                                <br>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="flush-headingFour">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFour" aria-expanded="false" aria-controls="flush-collapseFour" style="font-weight: bold;">
                                                    Settled Cases Module
                                                </button>
                                            </h2>
                                            <div id="flush-collapseFour" class="accordion-collapse collapse" aria-labelledby="flush-headingFour" data-bs-parent="#accordionFlushExample">
                                                <div class="accordion-body text-dark" style="text-align: justify;"> In
                                                    this module is where you can view all the blotter reports that have
                                                    been settled. These cases have undergone a certain hearing process.
                                                    <hr>
                                                </div>
                                                <br>
                                                <div class="about-img">
                                                    <img src="../img/settled_cases.png" alt="" class="img-fluid">
                                                </div>
                                                <br>
                                                <p style="text-align: left;"><strong>I. Settled Cases</strong></p>
                                                <p style="text-align: justify;">This table in the center will give you
                                                    the necessary details of all the settled cases on the system's
                                                    repository.</p>
                                                <p style="text-align: justify;"> &nbsp A. <strong> Compliant
                                                        Case</strong> -
                                                    This shows what article no. the case is under.</p>
                                                <p style="text-align: justify;"> &nbsp B. <strong> Date of
                                                        Agreement</strong> -
                                                    It shows when is the date of agreement happened.</p>
                                                <p style="text-align: justify;"> &nbsp C. <strong> Date of
                                                        Execution</strong> -
                                                    It shows when is the date of agreement happened.</p>
                                                <p style="text-align: justify;"> &nbsp D. <strong> Agreement</strong> -
                                                    It shows an overview of the agreement attested and decided by both
                                                    complainant and respondent.</p>
                                                <p style="text-align: justify;"> &nbsp E. <strong> Status of Compliance
                                                    </strong> -
                                                    This states whether the respondent is compliant or non-compliant.
                                                </p>
                                                <p style="text-align: justify;"> &nbsp F. <strong> Remarks </strong> -
                                                    This column indicates the additional remarks or notes by the Lupon.
                                                </p>
                                                <br>
                                                <p style="text-align: left;"><strong>II. Cases to Execute</strong></p>
                                                <p style="text-align: justify;">The purpose of this section is to
                                                    remind the Lupon and SB Member on which cases need to update the
                                                    date of execution.</p>
                                                <br>
                                                <p style="text-align: left;"><strong>III. Person Summary</strong></p>
                                                <p style="text-align: justify;">The purpose of Person Summary is to
                                                    give you an overview on the list of names from the system's
                                                    repository for both complainant and respondent on how many times
                                                    their names got involved on a specific case. </p>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="flush-headingFive">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseFive" aria-expanded="false" aria-controls="flush-collapseFive" style="font-weight: bold;">
                                                    Search Case Module
                                                </button>
                                            </h2>
                                            <div id="flush-collapseFive" class="accordion-collapse collapse" aria-labelledby="flush-headingFive" data-bs-parent="#accordionFlushExample">
                                                <div class="accordion-body text-dark" style="text-align: justify;">
                                                    This feature is used to search blotter report cases.
                                                    <hr>
                                                    <div class="about-img">
                                                        <img src="../img/search_case.png" alt="" class="img-fluid">
                                                    </div>
                                                    <br>
                                                    <hr>
                                                    <p style="text-align: justify;"><strong>Search Case</strong> is
                                                        used to
                                                        search a specific case according to their Case no. However, you
                                                        can
                                                        only search for a settled case, thus, searching a case that is
                                                        not
                                                        yet settled will prompt you to an alert message that the case
                                                        has
                                                        not yet been settled.</p>
                                                </div>
                                                <br>

                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="flush-headingSix">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseSix" aria-expanded="false" aria-controls="flush-collapseSix" style="font-weight: bold;">
                                                    Notices Module
                                                </button>
                                            </h2>
                                            <div id="flush-collapseSix" class="accordion-collapse collapse" aria-labelledby="flush-headingSix" data-bs-parent="#accordionFlushExample">
                                                <div class="accordion-body text-dark" style="text-align: justify;">
                                                    This feature allows us to create notification documents and modify
                                                    the scheduled hearing date for a particular case.

                                                    <hr>
                                                    <div class="about-img">
                                                        <img src="../img/notice_module.png" alt="" class="img-fluid">
                                                    </div>
                                                    <br>
                                                    <hr>
                                                    <p style="text-align: justify;"><strong>Incomplete Notices</strong>
                                                        is used to
                                                        view the incomplete notices cases. In this table, you can create
                                                        notice forms by clicking the "Create Notice Forms" button under
                                                        the Actions column. You can also view the cases that has no
                                                        meeting schedules.</p>
                                                    <br>
                                                    <p>Once the notices has been created, the specific case will be
                                                        removed to this section and will be moved to the said hearing
                                                        process.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="flush-headingSeven">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseSeven" aria-expanded="false" aria-controls="flush-collapseSeven" style="font-weight: bold;">
                                                    Hearing Process Module
                                                </button>
                                            </h2>
                                            <div id="flush-collapseSeven" class="accordion-collapse collapse" aria-labelledby="flush-headingSeven" data-bs-parent="#accordionFlushExample">
                                                <div class="accordion-body text-dark" style="text-align: justify;">
                                                    Through the process of <strong>mediation</strong>, the Lupon or
                                                    Barangay Chairman
                                                    helps the contending parties to come to a negotiated settlement
                                                    agreement that satisfies their needs.
                                                    <br> <br>While in the <strong>conciliation</strong> process the
                                                    Pangkat assists the parties to
                                                    help them identify concerns and options in order to establish a
                                                    solution by an agreement that meets everyone's needs.
                                                    <br> <br>In the process of <strong>arbitration</strong>, the parties
                                                    select a neutral
                                                    third party from outside the legal system to hear and resolve their
                                                    conflict.
                                                    <hr>

                                                    <div class="about-img">
                                                        <img src="../img/mediation.png" alt="" class="img-fluid">
                                                    </div>
                                                    <br>
                                                    <p style="text-align: justify;"><strong>Mediation Process</strong>
                                                        -
                                                        Only the complainant and respondent are the ones who will make
                                                        the agreement. The requirements for the report to go through the
                                                        Mediation
                                                        process, we need to create a Hearing Notice for the complainant
                                                        and Summon Notice for the respondent.
                                                    </p>
                                                    <br>

                                                    <div class="about-img">
                                                        <img src="../img/conciliation.png" alt="" class="img-fluid">
                                                    </div>
                                                    <br>
                                                    <p style="text-align: justify;"><strong>Conciliation
                                                            Process</strong> -
                                                        This process needs a conciliation Requirement which is the
                                                        Pangkat Constitution
                                                        Notice. A Pangkat Constitution Notice is a letter for Barangay
                                                        Councilors or Kagawad to act as a Pangkat. Once the requirement
                                                        is created, you can now create an amicable settlement agreement
                                                        for this case.
                                                    </p>
                                                    <br>

                                                    <div class="about-img">
                                                        <img src="../img/arbitration.png" alt="" class="img-fluid">
                                                    </div>
                                                    <br>

                                                    <p style="text-align: justify;"><strong>Arbitration
                                                            Process</strong> -
                                                        An Arbitration Agreement is a contract that requires the parties
                                                        to resolve their disputes through an arbitration process.</p>
                                                    <br>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="flush-headingNine">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseNine" aria-expanded="false" aria-controls="flush-collapseNine" style="font-weight: bold;">
                                                    Incident Report Module
                                                </button>
                                            </h2>
                                            <div id="flush-collapseNine" class="accordion-collapse collapse" aria-labelledby="flush-headingNine" data-bs-parent="#accordionFlushExample">
                                                <div class="accordion-body text-dark" style="text-align: justify;">
                                                    <hr>
                                                    <div class="about-img">
                                                        <img src="../img/incident_reports.png" alt="" class="img-fluid">
                                                    </div>
                                                    <br>
                                                    <p style="text-align: justify;"><strong>Incident Reports</strong>
                                                        -
                                                        The incident report feature can display all incident reports
                                                        submitted
                                                        by residents, and they can edit the status of any given
                                                        complaint.
                                                    </p>
                                                    <br>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="flush-headingTen">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTen" aria-expanded="false" aria-controls="flush-collapseTen" style="font-weight: bold;">
                                                    Accounts Module
                                                </button>
                                            </h2>
                                            <div id="flush-collapseTen" class="accordion-collapse collapse" aria-labelledby="flush-headingTen" data-bs-parent="#accordionFlushExample">
                                                <div class="accordion-body text-dark" style="text-align: justify;">The
                                                    Lupon or SB member can add or create new accounts in this module.
                                                    They can also edit and disable individual accounts here.
                                                    <hr>
                                                    <div class="about-img">
                                                        <img src="../img/register_account.png" alt="" class="img-fluid">
                                                        <hr>
                                                    </div>
                                                    <p style="text-align: justify;">&nbsp A. <strong>Register New
                                                            Account</strong>
                                                        -
                                                        Only the Lupon can register a new account to the system. There
                                                        are necessary information that needs to fill up such as your
                                                        name, email address, user type, personnel
                                                        position, password, and confirmation password.
                                                    </p>
                                                    <br>
                                                    <div class="about-img">
                                                        <img src="../img/manage_accounts.png" alt="" class="img-fluid">
                                                    </div>
                                                    <p style="text-align: justify;">&nbsp B. <strong>Manage
                                                            Accounts</strong>
                                                        -
                                                        This table indicates all the users together with their names,
                                                        email addresses, user type, and position.
                                                        Under the Actions column we have disable and edit buttons.
                                                        Disabling of account is used when a Lupon or SB
                                                        member ends his term or resigned or illegally done something,
                                                        you
                                                        can immediately disable his account.
                                                    </p>
                                                    <hr>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="flush-headingEleven">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseEleven" aria-expanded="false" aria-controls="flush-collapseEleven" style="font-weight: bold;">
                                                    KP Cases Module
                                                </button>
                                            </h2>
                                            <div id="flush-collapseEleven" class="accordion-collapse collapse" aria-labelledby="flush-headingEleven" data-bs-parent="#accordionFlushExample">
                                                <div class="accordion-body text-dark" style="text-align: justify;">
                                                    <div class="about-img">
                                                        <img src="../img/kp_cases.png" alt="" class="img-fluid">
                                                    </div>
                                                    <br>
                                                    <p style="text-align: justify;">The
                                                        cases that are inputted or being entered here should be based
                                                        under
                                                        the Cases of Katarungang Pambarangay. Also, since the case
                                                        number is
                                                        based on the Katarungang Pambarangay, they are not able to
                                                        change
                                                        it. However, they can change the name of the case.</p>
                                                    <hr>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="flush-headingTwelve">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwelve" aria-expanded="false" aria-controls="flush-collapseTwelve" style="font-weight: bold;">
                                                    Feedbacks and Queries Module
                                                </button>
                                            </h2>
                                            <div id="flush-collapseTwelve" class="accordion-collapse collapse" aria-labelledby="flush-headingTwelve" data-bs-parent="#accordionFlushExample">
                                                <div class="accordion-body text-dark" style="text-align: justify;">
                                                    <div class="about-img">
                                                        <img src="../img/feedbacks.png" alt="" class="img-fluid">
                                                    </div>
                                                    <br>
                                                    <p style="text-align: justify;">The
                                                        "Feedbacks and Queries" module is where users can share their
                                                        opinions and comments about the application's usability. This
                                                        information will be used to help make improvements.</p>
                                                    <hr>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="flush-headingThirteen">
                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThirteen" aria-expanded="false" aria-controls="flush-collapseThirteen" style="font-weight: bold;">
                                                    Activity Logs
                                                </button>
                                            </h2>
                                            <div id="flush-collapseThirteen" class="accordion-collapse collapse" aria-labelledby="flush-headingThirteen" data-bs-parent="#accordionFlushExample">
                                                <div class="accordion-body text-dark" style="text-align: justify;">
                                                    <div class="about-img">
                                                        <img src="../img/activity_logs.png" alt="" class="img-fluid">
                                                    </div>
                                                    <br>
                                                    <p style="text-align: justify;">Activity Logs show a detailed
                                                        record of all the activities that were
                                                        carried out in the system by the Lupon and SB members. This
                                                        table consists of six columns. We have the ID, Date Recorded,
                                                        Done By, Description, Properties, and Module columns.</p>
                                                    <hr>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="container">
                            <div class="row mb-3">
                                <h3 class="text-center mb-4" style="font-weight: bold;">Quick Links: HOW TO?</h3>
                                <div class="col mb-3 mb-xxl-0">
                                    <div class="card mb-4" style="width: 18rem; height: 25rem; background-color: #ffeeba;">
                                        <div class="card-body">
                                            <h5 class="card-title" style="font-weight: bold;">How to create a blotter
                                                report?
                                            </h5>
                                            <p class="card-text" style="text-align: justify;">To create a blotter
                                                report, go to “Blotter” from the side
                                                navigation bar. Then select the “Display Ongoing Cases” link then
                                                proceed to
                                                creating a new blotter report by clicking the “New Blotter Record”
                                                button.
                                            </p>

                                        </div>
                                    </div>
                                </div>

                                <div class="col mb-3 mb-xxl-0">
                                    <div class="card" style="width: 18rem; height: 25rem; background-color: #ffeeba;">
                                        <div class="card-body">
                                            <h5 class="card-title" style="font-weight: bold;">How to make a blotter
                                                report under mediation?
                                            </h5>
                                            <p class="card-text" style="text-align: justify;">In order for a case to
                                                undergo a Mediation hearing process, you need to set the meeting
                                                schedule first. Once done, you need to click the “Show Notices” button
                                                to create notice letters. Hearing and Summon Notices are needed to make
                                                the case under mediation, thus, click the create button for the two.
                                            </p>

                                        </div>
                                    </div>
                                </div>

                                <div class="col mb-3 mb-xxl-0">
                                    <div class="card" style="width: 18rem; height: 25rem; background-color: #ffeeba;">
                                        <div class="card-body">
                                            <h5 class="card-title" style="font-weight: bold;">How to make a blotter
                                                report under conciliation?
                                            </h5>
                                            <p class="card-text" style="text-align: justify;">If both complainant and
                                                respondent did not settle during the mediation, conciliation takes
                                                place. To do that, click the “Proceed to CONCILIATION” button in the
                                                upper right corner of the case when selected.

                                            </p>

                                        </div>
                                    </div>
                                </div>

                                <div class="col mb-3 mb-xxl-0">
                                    <div class="card" style="width: 18rem; height: 25rem; background-color: #ffeeba;">
                                        <div class="card-body">
                                            <h5 class="card-title" style="font-weight: bold;">How to make a blotter
                                                report under arbitration?

                                            </h5>
                                            <p class="card-text" style="text-align: justify;">If both parties do not
                                                settle with the help of the Punong Barangay, the case needs to proceed
                                                with arbitration. To undergo the next phase, click the “Proceed to
                                                ARBITRATION” button in the upper right corner of the case when selected.

                                            </p>

                                        </div>
                                    </div>
                                </div>

                                <div class="col mb-3 mb-xxl-0">
                                    <div class="card" style="width: 18rem; height: 25rem; background-color: #ffeeba;">
                                        <div class="card-body">
                                            <h5 class="card-title" style="font-weight: bold;">When can I say the case
                                                needs to be filed with a court for action?
                                            </h5>
                                            <p class="card-text" style="text-align: justify;">If there has been a
                                                personal confrontation between the
                                                parties before the Punong Barangay by mediation failed. Moreover, the
                                                Pangkat ng Tagapagsundo was constituted but the personal confrontation
                                                before the Pangkat likewise did not result in a settlement; and
                                                therefore, the corresponding complaint for the dispute may now be filed
                                                in court office.
                                            </p>

                                        </div>
                                    </div>
                                </div>

                                <div class="col mb-3 mb-xxl-0">
                                    <div class="card" style="width: 18rem; height: 25rem; background-color: #ffeeba;">
                                        <div class="card-body">
                                            <h5 class="card-title" style="font-weight: bold;">How to add a KP Case?

                                            </h5>
                                            <p class="card-text" style="text-align: justify;">To add a Katarungang
                                                Pambarangay (KP) Case, go to the Management category and select KP
                                                Cases. You will be redirected to a table. Click the “Add a KP Case”
                                                button then provide the Article No. and Case Name.

                                            </p>

                                        </div>
                                    </div>
                                </div>

                                <div class="col mb-3 mb-xxl-0">
                                    <div class="card" style="width: 18rem; height: 25rem; background-color: #ffeeba;">
                                        <div class="card-body">
                                            <h5 class="card-title" style="font-weight: bold;">How to view the feedback
                                                and queries?
                                            </h5>
                                            <p class="card-text" style="text-align: justify;">Under the "Management"
                                                category in the sidebar navigation, click on the "Feedbacks and Queries"
                                                and it will display the feedback and queries from the users.
                                            </p>

                                        </div>
                                    </div>
                                </div>

                                <div class="col mb-3 mb-xxl-0">
                                    <div class="card" style="width: 18rem; height: 25rem; background-color: #ffeeba;">
                                        <div class="card-body">
                                            <h5 class="card-title" style="font-weight: bold;">How to register a new
                                                account?
                                            </h5>
                                            <p class="card-text" style="text-align: justify;">The only people who can
                                                register or create accounts are members of the Lupon and SB; to do so,
                                                click the button under the Management category and then select Register
                                                New Account from the side navigation bar. And a form will be shown,
                                                which must have all the required fields filled up. Once finished, submit
                                                by clicking the Register New Account button.


                                            </p>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- End of User Manual -->
            </div>
        </div>
    </div>
    </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- User Manual -->
</body>
</html>