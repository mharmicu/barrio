<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BARRIO - Brgy. 385</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="icon" type="image/png" href="{{ asset('/img/385-logo.png') }}">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        h1 {
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
            font-weight: bolder;
        }

        h2 {
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        }
    </style>

</head>

<body>

    @if (session()->has('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Query submitted successfully',
            footer: '<a href="/">Return to home</a>'
        })
    </script>
    @else
    @endif

    <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <div class="container">
            <a class="navbar-brand" href="">
                <img src="{{ asset('/img/385-logo.png')}}" width="40" height="40" alt="">
            </a>
            <a class="navbar-brand" href=""><span class="text-danger">BAR</span>RIO</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        @if(Route::has('login'))
                        @auth
                        @if(Auth::user()->user_type_id == 1 || Auth::user()->user_type_id == 2)
                        <a class="nav-link" href="{{route('home')}}">Dashboard</a>
                        @endif

                        @else
                        <a class="nav-link" href="">Home</a>
                        @endauth
                        @endif


                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#services">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#portfolio">Features</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">About</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#team">Officials</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact">Contact</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{route('report')}}">Report</a>
                    </li>


                    @if(Route::has('login'))
                    @auth
                    <x-app-layout>
                    </x-app-layout>

                    @else
                    <li class="nav-item">
                        <a class="nav-link btn btn-danger ml-lg-3" href="{{route('login')}}">Login</a>
                    </li>
                    @endauth
                    @endif
                </ul>

            </div>
        </div>
    </nav>

    <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
        </div>
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="../img/street-2.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption">
                    <h5>Blotter Cases Repository</h5>
                    <p> Secure Cases Repository with Incident Reporting and Analytics Generation</p>
                    <p><a href="#" class="btn btn-danger mt-3">Learn More</a></p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="../img/street-1.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption">
                    <h5>Incident Reporting</h5>
                    <p>Secure Cases Repository with Incident Reporting and Analytics Generation</p>
                    <p><a href="#" class="btn btn-danger mt-3">Learn More</a></p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="../img/street-3.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption">
                    <h5>Analytics</h5>
                    <p>Secure Cases Repository with Incident Reporting and Analytics Generation</p>
                    <p><a href="#" class="btn btn-danger mt-3">Learn More</a></p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

    <!-- services section -->
    <section id="services" class="services section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-header text-center pb-2">
                        <h1>Services</h1>
                        <p class="lead">These various services are what this system offers.</p>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12 col-md-12 col-lg-6">
                    <div class="card text-white text-center bg-dark pb-2">
                        <div class="card-body">
                            <i class="bi bi-pen"></i>
                            <h2 class="card-title">Blotter</h2>
                            <p class=" fs-6">This is a record of daily events/cases occurring within the territory/jurisdiction of the barangay. It provides important information on reported or discovered violations of laws, rules, and ordinances as well as requests for barangay assistance on any issue calling for legal or additional action. This barangay blotter is a record of information that can be used as evidence or as a reference.</p>
                            <button class="btn btn-warning text-dark">Read More </button>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-12 col-lg-6">
                    <div class="card text-white text-center bg-dark pb-2 h-100">
                        <div class="card-body">
                            <i class="bi bi-bell"></i>
                            <h2 class="card-title">Notices</h2>
                            <p class="fs-6">Before an incident report case will be subjected to hearing process of determine agreement, notice records must first be created. </p>
                            <button class="btn btn-warning text-dark">Read More </button>
                        </div>
                    </div>
                </div>


            </div>

            <div class="row">
                <div class="col-12 col-md-12 col-lg-6">
                    <div class="card text-white text-center bg-dark pb-2">
                        <div class="card-body">
                            <i class="bi bi-alarm"></i>
                            <h2 class="card-title">Hearings</h2>
                            <p class="fs-6">The goal of the hearing process to allow the complainant and respondent to find all possible ways to amicably settle their dispute. Dispute that is caused the respondent towards the complaint where its rights have been violated.</p>
                            <button class="btn btn-warning text-dark">Read More </button>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-12 col-lg-6">
                    <div class="card text-white text-center bg-dark pb-2">
                        <div class="card-body">
                            <i class="bi bi-inboxes"></i>
                            <h2 class="card-title">Incidents</h2>
                            <p class="fs-6">Incident reporting is a component of the katarungang pambarangay, or barangay justice system, which amicably resolves conflicts within the community to promote peace, justice, and harmonious relationships. </p>
                            <button class="btn btn-warning text-dark">Read More </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Portfolio section -->
    <section id="portfolio" class="portfolio section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-header text-center pb-2">
                        <h1>Features</h1>
                        <p class="lead">Analytics • Encryption • Audit Trail</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-md-12 col-lg-4 mb-3 mb-xxl-0">
                    <div class="card text-center bg-white pb-2 h-100">
                        <div class="card-body text-dark">
                            <div class="img-area mb-4">
                                <img src="../img/analysis.png" alt="" class="img-fluid mx-auto d-block" style="max-width: 250px;">
                            </div>
                            <h2 class="card-title">Analytics</h2>
                            <p class="lead">Refers to the procedure of gathering data from the system, processing it, and then analyzing it to identify patterns and make inferences about the data it collects.
                            </p>
                            <button class="btn bg-warning text-dark">Learn More</button>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-12 col-lg-4 mb-3 mb-xxl-0">
                    <div class="card text-center bg-white pb-2 h-100">
                        <div class="card-body text-dark">
                            <div class="img-area mb-4">
                                <img src="../img/encryption.png" alt="" class="img-fluid mx-auto d-block" style="max-width: 250px;">
                            </div>
                            <h2 class="card-title">Encryption</h2>
                            <p class="lead">Data privacy can be protected in this way as it is saved on computers and transmitted over the internet. This can validate the data's origin and make sure that it hasn't changed since it was received, while also protecting its confidentiality.
                            </p>
                            <button class="btn bg-warning text-dark">Learn More</button>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-12 col-lg-4 mb-3 mb-xxl-0">
                    <div class="card text-center bg-white pb-2 h-100">
                        <div class="card-body text-dark">
                            <div class="img-area mb-4">
                                <img src="../img/audit.png" alt="" class="img-fluid mx-auto d-block" style="max-width: 250px;">
                            </div>
                            <h2 class="card-title">Audit Trail</h2>
                            <p class="lead">Every transaction a user makes in this system will be recorded by the audit trail feature. This allows for easier monitoring and investigation of any fraudulent activity and has the ability to list the recorded trails.
                            </p>
                            <button class="btn bg-warning text-dark">Learn More</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- about section -->

    <section id="about" class="about section-padding">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-12 col-12">
                    <div class="about-img">
                        <img src="../img/map.jpg" alt="" class="img-fluid">
                    </div>
                </div>
                <div class="col-lg-8 col-md-12 col-12 ps-lg-5 ">
                    <div class="about-text">
                        <h1>About Barangay 385 Zone 39 District III</h1>
                        <h5 class="fw-bold">MISSION</h5>
                        <p class="lead">Barangay 385 and all its stakeholders are committed to empower disadvantaged families to ATTAIN better lives acquiring ORDFERLY, PEACEFUL, BEAUTIFUL and very CLEAN COMMUNITY and maximization of their potentials to gain a very healthy, well educated citizenry to become enlightened, economically dependent and values oriented FILIPINOS.</p>
                        <h5 class="fw-bold">VISION</h5>
                        <p class="lead">Five years from now, Barangay 385 envisions itself to have an orderly peaceful, beautiful, very clean community with a very healthy, well educated, virtue oriented and productive citizenry.</p>
                        <a href="#" class="btn btn-warning">Learn More</a>
                    </div>
                </div>
            </div>
        </div>
    </section>





    <!-- team section -->

    <section id="team" class="team seaction-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-header text-center pb-3 fw-bold">
                        <h1>Barangay 385 / Zone 39 Public Servants</h1>
                    </div>
                </div>
            </div>

            <!-- part 1 officials -->
            <div class="row mb-3">
                <div class="col mb-3 mb-xxl-0">
                    <div class="card text-center h-100">
                        <div class="card-body">
                            <img src="../img/zarate.jpg" alt="" class="rounded-circle mx-auto d-block" width="150px">
                            <h3 class="card-title py-2 fs-4 mt-2">Ma. Aileen Frances A. Zarate</h3>
                            <p class="card-text fw-bold">Barangay Chairperson (Captain)</p>
                        </div>
                    </div>
                </div>

                <div class="col mb-3 mb-xxl-0">
                    <div class="card text-center h-100">
                        <div class="card-body">
                            <img src="../img/de_jesus.jpg" alt="" class="rounded-circle mx-auto d-block" width="150px">
                            <h3 class="card-title py-2 fs-4 mt-2">Angel A. De Jesus</h3>
                            <p class="card-text fw-bold">Kagawad (Councilor)</p>

                        </div>
                    </div>
                </div>

                <div class="col mb-3 mb-xxl-0">
                    <div class="card text-center h-100">
                        <div class="card-body">
                            <img src="../img/maglapit.jpg" alt="" class="rounded-circle mx-auto d-block" width="150px">
                            <h3 class="card-title py-2 fs-4 mt-2">Melanie G. Maglapit</h3>
                            <p class="card-text fw-bold">Kagawad (Councilor)</p>

                        </div>
                    </div>
                </div>

                <div class="col mb-3 mb-xxl-0">
                    <div class="card text-center h-100">
                        <div class="card-body">
                            <img src="../img/calces.jpg" alt="" class="rounded-circle mx-auto d-block" width="150px">
                            <h3 class="card-title py-2 fs-4 mt-2">David C. Calces</h3>
                            <p class="card-text fw-bold">Kagawad (Councilor)</p>

                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-3">

                <div class="col mb-3 mb-xxl-0">
                    <div class="card text-center h-100">
                        <div class="card-body">
                            <img src="../img/santos_rocelyn.jpg" alt="" class="rounded-circle mx-auto d-block" width="150px">
                            <h3 class="card-title py-2 fs-4 mt-2">Rocelyn M. Santos</h3>
                            <p class="card-text fw-bold">Kagawad (Councilor)</p>

                        </div>
                    </div>
                </div>


                <div class="col mb-3 mb-xxl-0">
                    <div class="card text-center h-100">
                        <div class="card-body">
                            <img src="../img/andaya.jpg" alt="" class="rounded-circle mx-auto d-block" width="150px">
                            <h3 class="card-title py-2 fs-4 mt-2">Bernardine U. Andaya</h3>
                            <p class="card-text fw-bold">Kagawad (Councilor)</p>

                        </div>
                    </div>
                </div>

                <div class="col mb-3 mb-xxl-0">
                    <div class="card text-center h-100">
                        <div class="card-body">
                            <img src="../img/acuzar.jpg" alt="" class="rounded-circle mx-auto d-block" width="150px">
                            <h3 class="card-title py-2 fs-4 mt-2">Emeterio Z. Acuzar</h3>
                            <p class="card-text fw-bold">Kagawad (Councilor)</p>

                        </div>
                    </div>
                </div>

                <div class="col mb-3 mb-xxl-0">
                    <div class="card text-center h-100">
                        <div class="card-body">
                            <img src="../img/atutubo.jpg" alt="" class="rounded-circle mx-auto d-block" width="150px">
                            <h3 class="card-title py-2 fs-4 mt-2">Quiterio F. Atutubo</h3>
                            <p class="card-text fw-bold">Kagawad (Councilor)</p>

                        </div>
                    </div>
                </div>


            </div>
            <!-- part 2 officials-->
            <div class="row justify-content-center">

                <div class="col col-lg-3">
                    <div class="card text-center h-100">
                        <div class="card-body">
                            <img src="../img/tuscano.jpg" alt="" class="rounded-circle mx-auto d-block" width="150px">
                            <h3 class="card-title py-2 fs-4 mt-2">Irene Tuscano</h3>
                            <p class="card-text fw-bold">Barangay Secretary</p>
                        </div>
                    </div>
                </div>
                <div class="col col-lg-3">
                    <div class="card text-center h-100">
                        <div class="card-body">
                            <img src="../img/dela_cruz.jpg" alt="" class="rounded-circle mx-auto d-block" width="150px">
                            <h3 class="card-title py-2 fs-4 mt-2">Laila P. Dela Cruz</h3>
                            <p class="card-text fw-bold">Barangay Treasurer</p>
                        </div>
                    </div>
                </div>

                <div class="col col-lg-3">
                    <div class="card text-center h-100">
                        <div class="card-body">
                            <img src="../img/bareja.jpg" alt="" class="rounded-circle mx-auto d-block" width="150px">
                            <h3 class="card-title py-2 fs-4 mt-2">Johne Jerome M. Bareja</h3>
                            <p class="card-text fw-bold">SK Chairperson</p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- contact section -->
    <section id="contact" class="contact section-padding">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-header text-center">
                        <h1>Your voice matters</h1>
                        <p class="lead">You may reach us if you have any concern regarding the barangay services. Rest assured that your concerns will be receive.
                    </div>
                </div>
            </div>

            <div class="row m-0">
                <div class="col-md-12 p-0 pt-4 pb-4">
                    <form action="{{url('contactForm')}}" class="bg-light p-4 m-auto" method="POST">
                        @csrf
                        <div class="row">
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <input type="text" class="form-control" name="name" id="name" required placeholder="Your Full Name">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <input type="tel" class="form-control" name="phone" id="phone" required placeholder="Phone">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="mb-3">
                                    <input type="email" class="form-control" name="email" id="email" required placeholder="Your Email Here">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="mb-3">
                                    <textarea rows="3" required class="form-control" name="message" id="message" placeholder="Your Query Here"></textarea>
                                </div>
                            </div>

                            <button type="submit" class="btn btn-warning btn-lg btn-block mt-3">Send Now</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- footer -->
    <footer class="bg-dark p-2 text-center">
        <div class="container">
            <p class="text-white pt-2"><i class="bi bi-c-circle"></i> All Rights Reserved BARRIO 2022</p>
        </div>
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


</body>

</html>