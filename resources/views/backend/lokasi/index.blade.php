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
        <h1 class="h3 mb-0 text-light font-weight-bold">{{ $title_header }}</h1>
        <small class="bg-white p-1 rounded font-weight-bold px-3">
            @if (str_contains($url, 'index'))
                <a href="{{ route('home') }}">Dashboard</a> /
                {{ $halaman }}
            @else
                <a href="{{ route('home') }}">Dashboard</a> /
                <a href="{{ route('lokasi.index') }}">Lokasi</a> /
                {{ $halaman }}
            @endif
        </small>
    </div>
    {{-- Heading : Start --}}

    {{-- Pemisah Section : Start  --}}
    <div class="mb-3 mt-1">
        <div class="card py-2 pt-3 shadow border-primary border-bottom-primary">
            <h4 class="text-center text-primary font-weight-bolder">LOKASI</h4>
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
                            <th>Nama Lokasi</th>
                            <th>Penanggung Jawab</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->nama_lokasi }}</td>
                                <td>{{ $data->user->name ?? 'Belum Terdaftar' }}</td>
                                <td>
                                    <div class="row">
                                        <div class="col-lg-2 col-md-12 mb-1 d-flex justify-content-center">
                                            <a href="{{ route('lokasi.edit', $data->id) }}" class="btn btn-warning">
                                                <i class="fa-solid fa-pen"></i>
                                            </a>
                                        </div>
                                        <div class="col-lg-2 col-md-12 mb-1 d-flex justify-content-center">
                                            <a href="{{ route('lokasi.destroy', $data->id) }}" class="btn btn-danger">
                                                <i class="fa-solid fa-trash-can"></i>
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- Tabel Data : End --}}

    {{-- Button Create Data : Start --}}
    <div class="row mb-4">
        <div class="col-12">
            <a href="{{ route('lokasi.create') }}" class="btn btn-primary btn-block shadow font-weight-bold">Tambah Lokasi</a>
        </div>
    </div>
    {{-- Button Create Data : Start --}}

@endsection

{{-- Section JavaScript --}}
@section('script')@endsection
