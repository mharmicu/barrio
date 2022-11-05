<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Account</title>
    <link href="../../css/styles.css" rel="stylesheet" />
    <link rel="icon" type="image/png" href="{{ asset('/img/385-logo.png') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
</head>

<body>
    <div class="d-flex " id="wrapper">
        @include('admin.sidebar')

        <!-- Page content wrapper-->
        <div id="page-content-wrapper">
            <!-- Top navigation-->
            <nav class="navbar navbar-expand-lg navbar-light bg-light border-bottom">
                <div class="container-fluid">
                    <button class="btn btn-warning" id="sidebarToggle"><span class="navbar-toggler-icon"></span></button>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                            <li class="nav-item"><a class="nav-link" href="{{route('blotter.settled')}}">Settled Cases</a></li>
                            <li class="nav-item active"><a class="nav-link" href="{{route('blotter.summary')}}">Search Case</a></li>

                            <x-app-layout>
                            </x-app-layout>
                        </ul>
                    </div>
                </div>
            </nav>

            <!-- Page content-->
            <div class="container-fluid">

                <div class="row d-flex justify-content-center  p-5">
                    <div class="card p-3 shadow w-75">
                        <form method="post" action="{{route('account.edit.store', $user->id)}}" enctype="multipart/form-data">
                            @csrf
                            <div class="row p-3">
                                <h3 class="mt-3">Edit Account</b></h3>
                                <hr>

                                <div class="row">
                                    <div class="col">
                                        <label for="name" class="form-label">Name</label>
                                        <input type="text" placeholder="" class="form-control shadow-none" value="{{$user->name}}" name="name" id="name" required  disabled readonly>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" placeholder="" class="form-control shadow-none" value="{{$user->email}}" name="email" id="email" required disabled readonly>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col">
                                        <label for="user_type" class="form-label">User Type</label>
                                        <select class="form-select shadow-none  @error('user_type') is-invalid @enderror" name="user_type" id="user_type" required>
                                            <option selected disabled value="">-</option>
                                            <option value="1" {{ $user->user_type_id == "1" ? 'selected' : '' }}>Lupon</option>
                                            <option value="2" {{ $user->user_type_id == "2" ? 'selected' : '' }}>Sangguniang Barangay</option>
                                        </select>
                                    </div>

                                    <div class="col">
                                        <label for="personnel_position" class="form-label">Personnel Position</label>
                                        <select class="form-select shadow-none  @error('personnel_position') is-invalid @enderror" name="personnel_position" id="personnel_position" required>
                                            <option selected disabled value="">-</option>
                                            <option value="1" {{ $user->position_id == "1" ? 'selected' : '' }}>Punong Barangay</option>
                                            <option value="2" {{ $user->position_id == "2" ? 'selected' : '' }}>Secretary</option>
                                            <option value="3" {{ $user->position_id == "3" ? 'selected' : '' }}>Sangguniang Barangay Member</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="mt-3 d-md-block">
                                    <button type="submit" class="btn btn-primary ">Save Changes</button>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>