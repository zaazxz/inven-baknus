{{-- Extends The Layouts --}}
@extends('layouts.landing')

{{-- Section Styling (CSS) --}}
@section('style')
    <style>
        @font-face {
            font-family: poppins-bold;
            src: {{ asset('font/poppins/Poppins-Black.ttf') }};
        }

        .textSatu {
            font-size: 100%;
            font-family:
                poppins-bold;
            font-weight: bolder;
        }

        #bagianAtas {
            scroll-behavior: smooth;
        }

        .bold {
            font-weight: bold;
            transition: 3s;
        }

        .nav-link {
            cursor: pointer;
        }

    </style>
@endsection

{{-- Your Code Here --}}
@section('content')
    {{-- Your Content  : Start --}}
    <div id="content-wrapper" class="d-flex flex-column">

        <div id="content">

            {{-- Navbar : Start --}}
            <nav class="bg-white shadow d-flex justify-content-center">
                <div class="container-fluid">
                    <img src="{{ asset('image/assets/smp-logo.jpeg') }}" alt="" width="70px">
                    <p class="ml-3 mt-4 d-inline-block textSatu">SMP BAKTI NUSANTARA 666 INVENTARIS</p>
                </div>
            </nav>
            <nav class="navbar navbar-expand navbar-light bg-primary topbar mb-4 static-top">
                <div class="container-fluid">

                    {{-- Navbar Left : Start --}}
                    <ul class="navbar-nav mr-auto">
                        <ul class="navbar-nav mr-auto">

                            <li class="nav-item dropdown no-arrow mx-1">
                                <a class="nav-link dropdown-toggle text-white bold" id="dashboard">
                                    Dashboard
                                </a>
                            </li>

                            <li class="nav-item dropdown no-arrow mx-1">
                                <a class="nav-link dropdown-toggle text-white" id="listBarang">
                                    List Barang
                                </a>
                            </li>

                            <li class="nav-item dropdown no-arrow mx-1">
                                <a class="nav-link dropdown-toggle text-white" id="tentangKami">
                                    Tentang Kami
                                </a>
                            </li>

                        </ul>
                    </ul>
                    {{-- Navbar Left : End --}}

                    {{-- Navbar Right : Start --}}
                    <ul class="navbar-nav ml-auto">
                        <ul class="navbar-nav ml-auto">

                            <li class="nav-item dropdown no-arrow mx-1">
                                <a class="nav-link dropdown-toggle" href="{{ route('login.page') }}" id="alertsDropdown">
                                    <button class="btn btn-light font-weight-bold shadow">Masuk</button>
                                </a>
                            </li>

                        </ul>
                    </ul>
                    {{-- Navbar Right : End --}}

                </div>
            </nav>
            {{-- Navbar : End --}}

            {{-- Content 1 Page : Start --}}
            <div class="container" id="contentSatu" style="display: ;">

                {{-- Card Shortcut Status : Start --}}
                <div class="row">
                    <div class="col-xl-4 col-md-4 col-sm-12 col-12 mb-4">
                        <div class="card border-left-primary shadow py-4">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            Jumlah Barang (Keseluruhan)</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            {{ $inven }}
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fa-solid fa-desktop fa-2x"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-4 col-sm-12 col-12 mb-4">
                        <div class="card border-left-danger shadow py-4">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                            Jumlah Barang (Tidak Tersedia)</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            {{ $inven_tidak }}
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fa-solid fa-desktop fa-2x"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-4 col-sm-12 col-12 mb-4">
                        <div class="card border-left-success shadow py-4">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                            Jumlah Barang (Tersedia)</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                                            {{ $inven_tersedia }}
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fa-solid fa-desktop fa-2x"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- Card Shortcut Status : End --}}

                <div class="mb-3 mt-1">
                    <div class="card py-2 pt-3 shadow border-primary border-bottom-primary">
                        <h4 class="text-center text-primary font-weight-bolder">BARANG INVENTARIS TERBARU</h4>
                    </div>
                </div>

                {{-- Table Barang Terbaru : Start --}}
                <div class="row mb-4">
                    <div class="col-12">
                        <div class="card p-3 border-0 shadow">
                            <table id="table_one" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Kode Barang</th>
                                        <th>Nama Barang</th>
                                        <th>Tanggal / Jam Penambahan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($inventaris_baru as $inven)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $inven->kode_barang }}</td>
                                        <td>{{ $inven->nama_barang }}</td>
                                        <td>{{ $inven->created_at }}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {{-- Table Barang Terbaru : Start --}}

            </div>
            {{-- Content 1 Page : End --}}

            {{-- Content 2 Page : Start --}}
            <div class="container" id="contentDua" style="display: none;">

                <div class="row">

                    {{-- Barang Inventaris --}}
                    <div class="col-lg-12 col-md-12 col-12">

                        <div class="mb-3 mt-1">
                            <div class="card py-2 pt-3 shadow border-primary border-bottom-primary">
                                <h4 class="text-center text-primary font-weight-bolder">BARANG INVENTARIS</h4>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-12">
                                <div class="card p-3 border-0 shadow">
                                    <table id="table_two" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Kode Barang</th>
                                                <th>Nama Barang</th>
                                                <th>Tanggal / Jam Penambahan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($inventaris_baru as $inven)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $inven->kode_barang }}</td>
                                                    <td>{{ $inven->nama_barang }}</td>
                                                    <td>{{ $inven->created_at }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Barang Tersedia --}}
                    <div class="col-lg-6 col-md-12 col-12">

                        <div class="mb-3 mt-1">
                            <div class="card py-2 pt-3 shadow border-success border-bottom-success">
                                <h4 class="text-center text-success font-weight-bolder">BARANG INVENTARIS TERSEDIA</h4>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-12">
                                <div class="card p-3 border-0 shadow">
                                    <table id="table_two" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Kode Barang</th>
                                                <th>Nama Barang</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($inventaris_tersedia as $inven)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $inven->kode_barang }}</td>
                                                    <td>{{ $inven->nama_barang }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Barang Tidak Tersedia --}}
                    <div class="col-lg-6 col-md-12 col-12">

                        <div class="mb-3 mt-1">
                            <div class="card py-2 pt-3 shadow border-danger border-bottom-danger">
                                <h4 class="text-center text-danger font-weight-bolder">BARANG INVENTARIS TIDAK TERSEDIA</h4>
                            </div>
                        </div>

                        <div class="row mb-4">
                            <div class="col-12">
                                <div class="card p-3 border-0 shadow">
                                    <table id="table_two" class="table table-striped table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>Kode Barang</th>
                                                <th>Nama Barang</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($inventaris_tidak as $inven)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $inven->kode_barang }}</td>
                                                    <td>{{ $inven->nama_barang }}</td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            {{-- Content 2 Page : End --}}

            {{-- Content 3 Page : Start --}}
            <div class="container" id="contentTiga" style="display: none;">

                <div class="mb-3 mt-1">
                    <div class="card py-2 pt-3 shadow border-primary border-bottom-primary">
                        <h4 class="text-center text-primary font-weight-bolder">TENTANG KAMI</h4>
                    </div>
                </div>

                {{-- Table Barang Terbaru : Start --}}
                <div class="row mb-4">
                    <div class="col-12">
                        <div class="card p-5">
                            <p>
                                <span class="text-primary font-weight-bold">Inventaris Barang SMP Bakti Nusantara 666</span>
                                adalah sebuah aplikasi berbasis website untuk kebutuhan menghitung, dan memonitoring data
                                barang - barang Inventaris di SMP Bakti Nusantara 666, juga memantau kegiatan yang menggunakan barang - barang
                                inventaris SMP Bakti Nusantara 666 seperti peminjaman, perbaikan (Maintenance). Monitoring dilakukan dengan
                                otomatisasi dan mudah untuk difahami. Dibuat dengan menggunakan teknologi Framework Laravel versi 10, Bootstrap
                                versi 4, dan bantuan Library JavaScript seperti JQuery, DataTables, dan lainnya.
                            </p>

                            {{-- Card Component : Start --}}
                            <div class="row">

                                <div class="col-lg-4 col-md-12 my-2 d-flex justify-content-center">
                                    <img src="{{ asset('image/assets/laravel.png') }}" alt="" class="img-fluid" width="70%;">
                                </div>
                                <div class="col-lg-4 col-md-12 my-2 d-flex justify-content-center">
                                    <img src="{{ asset('image/assets/bootstrap.png') }}" alt="" class="img-fluid" width="70%;">
                                </div>
                                <div class="col-lg-4 col-md-12 my-2 d-flex justify-content-center">
                                    <img src="{{ asset('image/assets/jquery.png') }}" alt="" class="img-fluid" width="70%;">
                                </div>

                            </div>
                            {{-- Card Component : End --}}

                        </div>
                    </div>
                </div>

                <div class="mb-3 mt-1">
                    <div class="card py-2 pt-3 shadow border-primary border-bottom-primary">
                        <h4 class="text-center text-primary font-weight-bolder">DEVELOPER</h4>
                    </div>
                </div>

                <div class="row mb-4">

                    {{-- Profil Mirza Qamaruzzaman --}}
                    <div class="col-12 my-2">
                        <div class="card p-4">
                            <div class="row">
                                <div class="col-lg-4 col-md-12 py-3 d-flex justify-content-center">
                                    <img src="{{ asset('sb-admin/img/undraw_profile.svg') }}" alt="" srcset="" class="img-fluid" style="width: 200px;">
                                </div>
                                <div class="col-lg-8 col-md-12">
                                    <ul class="list-group mt-4">
                                        <li class="list-group-item">
                                            <div class="row">
                                                <div class="col-lg-4 col-md-12">Nama</div>
                                                <div class="col-lg-8 col-md-12">: Mirza Qamaruzzaman</div>
                                            </div>
                                        </li>
                                        <li class="list-group-item">
                                            <div class="row">
                                                <div class="col-lg-4 col-md-12">E-mail</div>
                                                <div class="col-lg-8 col-md-12">: <a href="mailto:mirzaqamaruzzaman18@gmail.com">mirzaqamaruzzaman18@gmail.com</a></div>
                                            </div>
                                        </li>
                                        <li class="list-group-item">
                                            <div class="row">
                                                <div class="col-lg-4 col-md-12">Github</div>
                                                <div class="col-lg-8 col-md-12">: <a href="https://github.com/zaazxz">Zaazxz</a></div>
                                            </div>
                                        </li>
                                        <li class="list-group-item">
                                            <div class="row">
                                                <div class="col-lg-4 col-md-12">Linkedin</div>
                                                <div class="col-lg-8 col-md-12">: <a href="https://linkedin.com/in/mirzaqamaruzzaman18">Mirza Qamaruzzaman</a></div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Profil Rio Andrianto --}}
                    <div class="col-12 my-2">
                        <div class="card p-4">
                            <div class="row">
                                <div class="col-lg-4 col-md-12 py-3 d-flex justify-content-center">
                                    <img src="{{ asset('sb-admin/img/undraw_profile.svg') }}" alt="" srcset="" class="img-fluid" style="width: 200px;">
                                </div>
                                <div class="col-lg-8 col-md-12">
                                    <ul class="list-group mt-4">
                                        <li class="list-group-item">
                                            <div class="row">
                                                <div class="col-lg-4 col-md-12">Nama</div>
                                                <div class="col-lg-8 col-md-12">: Rio andrianto, S.kom., Gr</div>
                                            </div>
                                        </li>
                                        <li class="list-group-item">
                                            <div class="row">
                                                <div class="col-lg-4 col-md-12">E-mail</div>
                                                <div class="col-lg-8 col-md-12">: <a href="mailto:r.andrianto@gmail.com">r.andrianto@gmail.com</a></div>
                                            </div>
                                        </li>
                                        <li class="list-group-item">
                                            <div class="row">
                                                <div class="col-lg-4 col-md-12">Github</div>
                                                <div class="col-lg-8 col-md-12">: <a href="https://github.com/neushepa">neushepa</a></div>
                                            </div>
                                        </li>
                                        <li class="list-group-item">
                                            <div class="row">
                                                <div class="col-lg-4 col-md-12">Linkedin</div>
                                                <div class="col-lg-8 col-md-12">: <a href="https://linkedin.com/in/rioandrianto">Rio Andrianto</a></div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
            {{-- Content 3 Page : End --}}

        </div>

        <!-- Footer -->
        <footer class="sticky-footer bg-white mt-4">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; 2023 Development By <a href="https://github.com/zaazxz" target="_blank">Mirza</a></span>
                </div>
            </div>
        </footer>
        <!-- End of Footer -->

    </div>
    {{-- Your Content : End --}}
@endsection

{{-- Section JavaScript --}}
@section('script')

    {{-- Datatables --}}
    <script>
        $(document).ready(function () {
            $('.table').DataTable();
        });
    </script>

    {{-- My Javascript Syntax --}}
    <script>
        $(document).ready(function () {

            // Button Dashboard
            $('#dashboard').click(function (e) {
                e.preventDefault();

                // If content 2 showing Display
                if ($('#contentTiga').is(':hidden')) {
                    $('#contentDua').queue(function(next) {
                        $('#listBarang').removeClass('bold');
                        $('#contentDua').fadeOut(3000);
                        next()
                    }).queue(function(next) {
                        $('#dashboard').addClass('bold');
                        $('#contentSatu').fadeIn(3000);
                        next()
                    });
                }

                // If content 3 Showing Display
                else if ($('#contentDua').is(':hidden')) {
                    $('#contentTiga').queue(function(next) {
                        $('#tentangKami').removeClass('bold');
                        $('#contentTiga').fadeOut(3000);
                        next()
                    }).queue(function(next) {
                        $('#dashboard').addClass('bold');
                        $('#contentSatu').fadeIn(3000);
                        next()
                    });
                }

            });

            // Button List Barang
            $('#listBarang').click(function (e) {
                e.preventDefault();

                // If content 1 showing Display
                if ($('#contentTiga').is(':hidden')) {
                    $('#contentSatu').queue(function(next) {
                        $('#dashboard').removeClass('bold');
                        $('#contentSatu').fadeOut(3000);
                        next()
                    }).queue(function(next) {
                        $('#listBarang').addClass('bold');
                        $('#contentDua').fadeIn(3000);
                        next()
                    });
                }

                // If content 3 Showing Display
                else if ($('#contentSatu').is(':hidden')) {
                    $('#contentTiga').queue(function(next) {
                        $('#tentangKami').removeClass('bold');
                        $('#contentTiga').fadeOut(3000);
                        next()
                    }).queue(function(next) {
                        $('#listBarang').addClass('bold');
                        $('#contentDua').fadeIn(3000);
                        next()
                    });
                }

            });

            // Button Tentang Kami
            $('#tentangKami').click(function (e) {
                e.preventDefault();

                // If content 1 showing Display
                if ($('#contentDua').is(':hidden')) {
                    $('#contentSatu').queue(function(next) {
                        $('#dashboard').removeClass('bold');
                        $('#contentSatu').fadeOut(3000);
                        next()
                    }).queue(function(next) {
                        $('#tentangKami').addClass('bold');
                        $('#contentTiga').fadeIn(3000);
                        next()
                    });
                }

                // If content 2 Showing Display
                else if ($('#contentSatu').is(':hidden')) {
                    $('#contentDua').queue(function(next) {
                        $('#listBarang').removeClass('bold');
                        $('#contentDua').fadeOut(3000);
                        next()
                    }).queue(function(next) {
                        $('#tentangKami').addClass('bold');
                        $('#contentTiga').fadeIn(3000);
                        next()
                    });
                }

            });

        });
    </script>

@endsection
