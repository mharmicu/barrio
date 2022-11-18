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
            <a class="navbar-brand" href="#">
                <img src="{{ asset('/img/385-logo.png')}}" width="40" height="40" alt="">
            </a>
            <a class="navbar-brand" href="#"><span class="text-danger">BAR</span>RIO</a>
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
                        <a class="nav-link" href="#team">Team</a>
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
                <img src="../img/home-1.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption">
                    <h5>Secure Cases Repository</h5>
                    <p> Secure Cases Repository with Incident Reporting and Analytics Generation</p>
                    <p><a href="#" class="btn btn-danger mt-3">Learn More</a></p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="../img/home-2.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption">
                    <h5>Incident Reporting</h5>
                    <p>Secure Cases Repository with Incident Reporting and Analytics Generation</p>
                    <p><a href="#" class="btn btn-danger mt-3">Learn More</a></p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="../img/home-3.jpg" class="d-block w-100" alt="...">
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
                    <div class="section-header text-center pb-5">
                        <h2>Services</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. <br>Facere delectus veritatis
                            dolores laborum nesciunt vitae.</p>
                    </div>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-12 col-md-12 col-lg-6">
                    <div class="card text-white text-center bg-dark pb-2">
                        <div class="card-body">
                            <i class="bi bi-person-lines-fill"></i>
                            <h3 class="card-title">Blotter</h3>
                            <p class="lead">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Possimus quo
                                dignissimos officia, neque ducimus ab enim optio voluptates omnis nesciunt incidunt
                                illum pariatur vel magni.</p>
                            <button class="btn btn-warning text-dark">Read More </button>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-12 col-lg-6">
                    <div class="card text-white text-center bg-dark pb-2">
                        <div class="card-body">
                            <i class="bi bi-megaphone"></i>
                            <h3 class="card-title">Hearings</h3>
                            <p class="lead">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Possimus quo
                                dignissimos officia, neque ducimus ab enim optio voluptates omnis nesciunt incidunt
                                illum pariatur vel magni.</p>
                            <button class="btn btn-warning text-dark">Read More </button>
                        </div>
                    </div>
                </div>


            </div>

            <div class="row">
                <div class="col-12 col-md-12 col-lg-6">
                    <div class="card text-white text-center bg-dark pb-2">
                        <div class="card-body">
                            <i class="bi bi-journal-text"></i>
                            <h3 class="card-title">Incidents</h3>
                            <p class="lead">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Possimus quo
                                dignissimos officia, neque ducimus ab enim optio voluptates omnis nesciunt incidunt
                                illum pariatur vel magni.</p>
                            <button class="btn btn-warning text-dark">Read More </button>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-12 col-lg-6">
                    <div class="card text-white text-center bg-dark pb-2">
                        <div class="card-body">
                            <i class="bi bi-envelope-paper"></i>
                            <h3 class="card-title">Notices</h3>
                            <p class="lead">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Possimus quo
                                dignissimos officia, neque ducimus ab enim optio voluptates omnis nesciunt incidunt
                                illum pariatur vel magni.</p>
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
                    <div class="section-header text-center pb-5">
                        <h2>Features</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. <br>Quibusdam reprehenderit,
                            perferendis cupiditate est consequuntur impedit dicta maiores debitis consequatur eligendi.
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-md-12 col-lg-4">
                    <div class="card text-center bg-white pb-2">
                        <div class="card-body text-dark">
                            <div class="img-area mb-4">
                                <img src="../img/feature-1.png" alt="" class="img-fluid">
                            </div>
                            <h3 class="card-title">Building Make</h3>
                            <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae recusandae
                                beatae cupiditate ullam praesentium fuga eius amet repudiandae necessitatibus provident.
                            </p>
                            <button class="btn bg-warning text-dark">Learn More</button>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-12 col-lg-4">
                    <div class="card text-center bg-white pb-2">
                        <div class="card-body text-dark">
                            <div class="img-area mb-4">
                                <img src="../img/feature-2.png" alt="" class="img-fluid">
                            </div>
                            <h3 class="card-title">Building Make</h3>
                            <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae recusandae
                                beatae cupiditate ullam praesentium fuga eius amet repudiandae necessitatibus provident.
                            </p>
                            <button class="btn bg-warning text-dark">Learn More</button>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-12 col-lg-4">
                    <div class="card text-center bg-white pb-2">
                        <div class="card-body text-dark">
                            <div class="img-area mb-4">
                                <img src="../img/feature-3.png" alt="" class="img-fluid">
                            </div>
                            <h3 class="card-title">Building Make</h3>
                            <p class="lead">Lorem ipsum dolor sit amet consectetur adipisicing elit. Vitae recusandae
                                beatae cupiditate ullam praesentium fuga eius amet repudiandae necessitatibus provident.
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
                        <img src="../img/barangay-385.jpg" alt="" class="img-fluid">
                    </div>
                </div>
                <div class="col-lg-8 col-md-12 col-12 ps-lg-5 mt-md-5">
                    <div class="about-text">
                        <h2>We Provide Best Quality <br> Services Ever</h2>
                        <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Soluta, quam suscipit. Voluptate
                            ullam corrupti dolorum deserunt, soluta dolorem nobis minima obcaecati omnis, sed nihil
                            excepturi unde. Magnam ipsa nihil vero dolorum harum modi ut inventore. Accusantium
                            excepturi, odio adipisci quidem facilis accusamus in. Pariatur temporibus illo error
                            tempore, aperiam fuga?</p>
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
                    <div class="section-header text-center pb-5">
                        <h2>Our Team</h2>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. <br>Facere delectus veritatis
                            dolores laborum nesciunt vitae.</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 col-md-6 col-lg-3">
                    <div class="card text-center">
                        <div class="card-body">
                            <img src="../img/team-1.jpg" alt="" class="img-fluid rounded-center">
                            <h3 class="card-title py-2">Jack Wilson</h3>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim, harum.</p>

                            <p class="socials">
                                <i class="bi bi-twitter text-dark mx-1"></i>
                                <i class="bi bi-facebook text-dark mx-1"></i>
                                <i class="bi bi-linkedin text-dark mx-1"></i>
                                <i class="bi bi-instagram text-dark mx-1"></i>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-3">
                    <div class="card text-center">
                        <div class="card-body">
                            <img src="../img/team-2.jpg" alt="" class="img-fluid rounded-center">
                            <h3 class="card-title py-2">Jack Wilson</h3>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim, harum.</p>

                            <p class="socials">
                                <i class="bi bi-twitter text-dark mx-1"></i>
                                <i class="bi bi-facebook text-dark mx-1"></i>
                                <i class="bi bi-linkedin text-dark mx-1"></i>
                                <i class="bi bi-instagram text-dark mx-1"></i>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-3">
                    <div class="card text-center">
                        <div class="card-body">
                            <img src="../img/team-3.jpg" alt="" class="img-fluid rounded-center">
                            <h3 class="card-title py-2">Jack Wilson</h3>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim, harum.</p>

                            <p class="socials">
                                <i class="bi bi-twitter text-dark mx-1"></i>
                                <i class="bi bi-facebook text-dark mx-1"></i>
                                <i class="bi bi-linkedin text-dark mx-1"></i>
                                <i class="bi bi-instagram text-dark mx-1"></i>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-3">
                    <div class="card text-center">
                        <div class="card-body">
                            <img src="../img/team-4.jpg" alt="" class="img-fluid rounded-center">
                            <h3 class="card-title py-2">Jack Wilson</h3>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim, harum.</p>

                            <p class="socials">
                                <i class="bi bi-twitter text-dark mx-1"></i>
                                <i class="bi bi-facebook text-dark mx-1"></i>
                                <i class="bi bi-linkedin text-dark mx-1"></i>
                                <i class="bi bi-instagram text-dark mx-1"></i>
                            </p>
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
                    <div class="section-header text-center pb-5">
                        <h2>Contact Us</h2>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. <br>Quibusdam reprehenderit,
                            perferendis cupiditate est consequuntur impedit dicta maiores debitis consequatur eligendi.
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
            <p class="text-white">All Rights Reserved Barrio 2022</p>
        </div>
    </footer>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>


</body>

</html>