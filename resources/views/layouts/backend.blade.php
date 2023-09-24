<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>INSAR | {{ $title }}</title>

    {{-- Datatables --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/dataTables.bootstrap4.min.css">

    {{-- Trix Ediitor --}}
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/trix@2.0.0/dist/trix.css">

    {{-- Bootstrap 4 --}}
    <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css') }}">

    {{-- Fontawesome --}}
    <link href="{{ asset('fontawesome/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    {{-- SB Admin Template --}}
    <link href="{{ asset('sb-admin/css/sb-admin-2.css') }}" rel="stylesheet">

    {{-- Your CSS --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    @yield('style')

    {{-- Icon --}}
    <link rel="shortcut icon" href="{{ asset('image/assets/non-bg-fix.png') }}" type="image/x-icon">

</head>

<body id="page-top" class="sidebar-toggled">

    {{-- Page Wrapper : Start --}}
    <div id="wrapper">

        {{-- Include Sidebar : Start --}}
        @include('layouts.partials.sidebar')
        {{-- Include Sidebar : End --}}

        {{-- Content Wrapper : Start --}}
        <div id="content-wrapper" class="d-flex flex-column">

            {{-- Main Content : Start --}}
            <div id="content">

                {{-- Include Navbar : Start --}}
                @include('layouts.partials.navbar')
                {{-- Include Navbar : End --}}

                {{-- Content Page : Start --}}
                <div class="container-fluid">

                    @yield('content')

                </div>
                {{-- Content Page : End --}}

            </div>
            {{-- Main Content : End --}}

            {{-- Footer : Start --}}
            @include('layouts.partials.footer')
            {{-- Footer : Start --}}

        </div>
        {{-- Content Wrapper : End --}}

    </div>
    {{-- Page Wrapper : End --}}

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    {{-- Sweetalert --}}
    @include('sweetalert::alert')

    {{-- Bootstrap Javascript --}}
    <script src="{{ asset('jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>

    {{-- Datatables --}}
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap4.min.js"></script>

    {{-- Trix Editor --}}
    <script type="text/javascript" src="https://unpkg.com/trix@2.0.0/dist/trix.umd.min.js"></script>

    {{-- Core plugin JavaScript --}}
    <script src="{{ asset('sb-admin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    {{-- SB Admin Javascript --}}
    <script src="{{ asset('sb-admin/js/sb-admin-2.min.js') }}"></script>
    <script src="{{ asset('sb-admin/vendor/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('sb-admin/js/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('sb-admin/js/demo/chart-pie-demo.js') }}"></script>

    {{-- Your Javascript --}}
    <script src="{{ asset('js/script.js') }}"></script>
    <script>
        $(document).ready(function () {
            $('.tableData').dataTable({
                "columnDefs": [{
                        width: 200,
                        targets: 1
                    },
                    {
                        width: 200,
                        targets: 2
                    }
                ],
            });
        });

        // Vanilla Javascript
        function previewImage() {
            const image = document.querySelector("#picture");
            const imgPreview = document.querySelector("#image");
            const placeholder = document.querySelector("#placeholderImage");

            imgPreview.style.display = 'block';

            const oFReader = new FileReader();
            oFReader.readAsDataURL(image.files[0]);

            oFReader.onload = function(oFREvent) {
                imgPreview.src = oFREvent.target.result;
            }

            placeholder.innerHTML = 'Added File!';

        }
    </script>
    @yield('script')

</body>

</html>
