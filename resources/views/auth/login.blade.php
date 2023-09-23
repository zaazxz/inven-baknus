<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>My App</title>

    {{-- Bootstrap --}}
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">

    {{-- Custom fonts for this template --}}
    <link href="{{ asset('fontawesome/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    {{-- Custom styles for this template --}}
    <link href="{{ asset('sb-admin/css/sb-admin-2.min.css') }}" rel="stylesheet">

    <style>

    @font-face {
            font-family: poppins-bold;
            src: {{ asset('font/poppins/Poppins-Black.ttf') }};
        }

    </style>

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="row">

                        <div class="card-body p-0">
                            <div class="row">
                                <div class="col-lg-6 d-none d-lg-block border bg-gray-200">
                                    <div class="col-12">
                                        <div class="text-center">
                                            <img src="{{ asset('image/assets/non-bg-fix.png') }}" alt="SMP BN" style="width: 50%; margin-top: 25%;">
                                        </div>
                                    </div>
                                    <div class="col-12 mt-3">
                                        <h3 class="font-weight-bolder text-center text-dark">
                                            INVENTARIS BARANG <br>
                                            SMP BAKTI NUSANTARA 666
                                        </h3>
                                        <small class="text-muted d-flex justify-content-center">Copyright 2023, Created By <a href="https://github.com/zaazxz" target="_blank" class="ml-1">Mirza</a>.</small>
                                    </div>
                                </div>
                                <div class="col-lg-6" style="padding-top: 12vh; padding-bottom: 12vh;">
                                    <div class="p-5 pl-4">
                                        <div class="text-center">
                                            <h1 class="h4 text-gray-900 mb-5">Silahkan Masukkan <br> Email dan Password</h1>
                                        </div>
                                        <form class="user" method="post" action="{{ route('login.auth') }}">
                                            @csrf
                                            <div class="form-group">
                                                <input
                                                type="email"
                                                class="form-control form-control-user"
                                                id="email"
                                                aria-describedby="emailHelp"
                                                placeholder="Enter Email Address..."
                                                name="email"
                                                required>
                                            </div>
                                            <div class="row">
                                                <div class="col-10">
                                                    <div class="form-group">
                                                        <input
                                                        type="password"
                                                        class="form-control form-control-user"
                                                        id="password"
                                                        placeholder="Password"
                                                        name="password"
                                                        required>
                                                    </div>
                                                </div>
                                                <div class="col-2">
                                                    <button class="rounded btn btn-outline-dark py-2 mt-1" id="btnPassword">
                                                        <i class="fa-solid fa-eye" id="iconPassword"></i>
                                                    </button>
                                                </div>
                                            </div>
                                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                                Login
                                            </button>
                                            <hr>
                                            <small class="d-flex justify-content-center">
                                                <a href="{{ route('home.dashboard') }}">Kembali</a>
                                            </small>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>

        </div>

    </div>

    {{-- Bootstrap core JavaScript --}}
    <script src="{{ asset('sb-admin/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('sb-admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    {{-- Core plugin JavaScript --}}
    <script src="{{ asset('sb-admin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    {{-- Custom scripts for all pages --}}
    <script src="{{ asset('sb-admin/js/sb-admin-2.min.js') }}"></script>

    {{-- Jquery --}}
    <script>
        $(document).ready(function () {

            $('#btnPassword').click(function(e) {
                e.preventDefault();
                $('#iconPassword').toggleClass('fa-solid fa-eye');
                $('#iconPassword').toggleClass('fa-solid fa-eye-slash');
            });

            $('#btnPassword').click(function(e) {
                e.preventDefault();

                if ($('#password').attr('type') === 'password') {
                    $('#password').attr('type', 'text');
                } else {
                    $('#password').attr('type', 'password');
                }

            });

        });
    </script>

</body>

</html>
