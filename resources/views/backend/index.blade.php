{{-- Extends The Layouts --}}
@extends('layouts.backend')

{{-- Section Styling (CSS) --}}
@section('style')@endsection

{{-- Your Code Here --}}
@section('content')

    {{-- Heading : Start --}}
    <div class="d-sm-flex align-items-center justify-content-between mb-4 bg-primary rounded p-3 border-white shadow">
        <h1 class="h3 mb-0 text-light font-weight-bold">Dashboard</h1>
        <small class="bg-white p-1 rounded font-weight-bold px-3">Dashboard</small>
    </div>
    {{-- Heading : Start --}}

    {{-- Card Shortcut Status : Start --}}
    <div class="row">
        <div class="col-xl-4 col-md-4 col-sm-12 col-12 mb-4">
            <div class="card border-left-primary shadow py-4">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Jumlah Barang (Keseluruhan)</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">5</div>
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
                                Jumlah Barang (Keseluruhan)</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">5</div>
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
                                Jumlah Barang (Keseluruhan)</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">5</div>
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

    {{-- Pemisah Section : Start  --}}
    <div class="mb-3 mt-1">
        <div class="card py-2 pt-3 shadow border-primary border-bottom-primary">
            <h4 class="text-center text-primary font-weight-bolder">BARANG INVENTARIS TERBARU</h4>
        </div>
    </div>
    {{-- Pemisah Section : End  --}}

    {{-- Tabel Data : Start --}}
    <div class="row mb-4">
        <div class="col-12">
            <div class="card p-3 border-0 shadow">
                <table id="table" class="table table-striped table-bordered tableData" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Tanggal Penambahan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>001</td>
                            <td>Komputer Server</td>
                            <td>20 - 02 - 2023</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>001</td>
                            <td>Komputer Server</td>
                            <td>20 - 02 - 2023</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>001</td>
                            <td>Komputer Server</td>
                            <td>20 - 02 - 2023</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>001</td>
                            <td>Komputer Server</td>
                            <td>20 - 02 - 2023</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>001</td>
                            <td>Komputer Server</td>
                            <td>20 - 02 - 2023</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- Tabel Data : End --}}

    {{-- Pemisah Section : Start  --}}
    <div class="mb-3 mt-1">
        <div class="card py-2 pt-3 shadow border-primary border-bottom-primary">
            <h4 class="text-center text-primary font-weight-bolder">DATA PEMINJAMAN</h4>
        </div>
    </div>
    {{-- Pemisah Section : End  --}}

    {{-- Tabel Data : Start --}}
    <div class="row mb-4">
        <div class="col-12">
            <div class="card p-3 border-0 shadow">
                <table id="table" class="table table-striped table-bordered tableData" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Tanggal Penambahan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>001</td>
                            <td>Komputer Server</td>
                            <td>20 - 02 - 2023</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>001</td>
                            <td>Komputer Server</td>
                            <td>20 - 02 - 2023</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>001</td>
                            <td>Komputer Server</td>
                            <td>20 - 02 - 2023</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>001</td>
                            <td>Komputer Server</td>
                            <td>20 - 02 - 2023</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>001</td>
                            <td>Komputer Server</td>
                            <td>20 - 02 - 2023</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- Tabel Data : End --}}

@endsection

{{-- Section JavaScript --}}
@section('script')@endsection
