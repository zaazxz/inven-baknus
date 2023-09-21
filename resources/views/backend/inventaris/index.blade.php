{{-- PHP Variable --}}
@php
    $url = Route::current()->getName();
@endphp

{{-- Extends The Layouts --}}
@extends('layouts.backend')

{{-- Section Styling (CSS) --}}
@section('style')@endsection

{{-- Your Code Here --}}
@section('content')

    {{-- Heading : Start --}}
    <div class="d-sm-flex align-items-center justify-content-between mb-4 bg-primary rounded p-3 border-white shadow">
        <h1 class="h3 mb-0 text-light font-weight-bold">{{ $title }}</h1>
        <small class="bg-white p-1 rounded font-weight-bold px-3">
            @if (str_contains($url, 'index'))
                <a href="{{ route('home') }}">Dashboard</a> /
                {{ $halaman }}
            @else
                <a href="{{ route('home') }}">Dashboard</a> /
                <a href="{{ route('inven.index') }}">Inventaris</a> /
                {{ $halaman }}
            @endif
        </small>
    </div>
    {{-- Heading : Start --}}

    {{-- Pemisah Section : Start  --}}
    <div class="mb-3 mt-1">
        <div class="card py-2 pt-3 shadow border-primary border-bottom-primary">
            <div class="row">
                <div class="col-12">
                    <h4 class="text-center text-primary font-weight-bolder">{{ $title }}</h4>
                </div>
                <div class="col-12">
                    <div class="border border-gray-500"></div>
                </div>
                <div class="col-12">
                    <a class="btn {{ str_contains($url, 'index') ? 'btn-primary text-white' : 'btn-light' }} mt-2 ml-2 mx-1 shadow" href="{{ route('inven.index') }}">Keseluruhan</a>
                    <a class="btn {{ str_contains($url, 'tersedia') ? 'btn-primary text-white' : 'btn-light' }} mt-2 mx-1 shadow" href="{{ route('inven.tersedia') }}">Tersedia</a>
                    <a class="btn {{ str_contains($url, 'tidak') ? 'btn-primary text-white' : 'btn-light' }} mt-2 mx-1 shadow" href="{{ route('inven.tidak') }}">Tidak Tersedia</a>
                    <a class="btn {{ str_contains($url, 'maintenance') ? 'btn-primary text-white' : 'btn-light' }} mt-2 mx-1 shadow" href="{{ route('inven.maintenance') }}">Maintenance</a>
                </div>
            </div>
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

    {{-- Button Create Data : Start --}}
    <div class="row mb-4">
        <div class="col-12">
            <a href="{{ route('inven.create') }}" class="btn btn-primary btn-block shadow font-weight-bold">Tambah Barang Inventaris</a>
        </div>
    </div>
    {{-- Button Create Data : Start --}}

@endsection

{{-- Section JavaScript --}}
@section('script')@endsection
