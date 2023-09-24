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
                <a href="{{ route('maintenance.index') }}">Maintenance</a> /
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
                    <a class="btn {{ str_contains($url, 'index') ? 'btn-primary text-white' : 'btn-light' }} mt-2 ml-2 mx-1 shadow" href="{{ route('maintenance.index') }}">Keseluruhan</a>
                    <a class="btn {{ str_contains($url, 'perbaikan') ? 'btn-primary text-white' : 'btn-light' }} mt-2 mx-1 shadow" href="{{ route('maintenance.perbaikan') }}">Dalam Pengerjaan</a>
                    <a class="btn {{ str_contains($url, 'selesai') ? 'btn-primary text-white' : 'btn-light' }} mt-2 mx-1 shadow" href="{{ route('maintenance.selesai') }}">Selesai</a>
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
                            <th>Nama Barang</th>
                            <th>Jenis Maintenance</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->inven->nama_barang }}</td>
                                <td>{{ $data->jenis_maintenance }}</td>
                                <td>
                                    <div class="row">
                                        <div class="col-lg-2 col-md-12 mb-1 d-flex justify-content-center">
                                            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modalData{{ $data->id }}">
                                                <i class="fa-solid fa-circle-info"></i>
                                            </a>
                                        </div>
                                        @if ($data->tgl_penyelesaian)
                                        @else
                                        <div class="col-lg-2 col-md-12 mb-1 d-flex justify-content-center">
                                            <a href="{{ route('peminjaman.destroy', $data->id) }}" class="btn btn-danger">
                                                <i class="fa-solid fa-trash-can"></i>
                                            </a>
                                        </div>
                                        <div class="col-lg-2 col-md-12 mb-1 d-flex justify-content-center">
                                            <a href="#" class="btn btn-success" data-toggle="modal" data-target="#modalPenyelesaian{{ $data->id }}">
                                                <i class="fa-solid fa-hand-holding-hand"></i>
                                            </a>
                                        </div>
                                        @endif
                                    </div>
                                </td>
                            </tr>

                            {{-- Modal Show Detail --}}
                            <div class="modal fade" id="modalData{{ $data->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Detail Perbaikan {{ $data->inven->nama_barang }}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                        <ul class="list-group">
                                            <li class="list-group-item">
                                                <div class="row">
                                                    <div class="col-6">Nama Barang</div>
                                                    <div class="col-6">: {{ $data->inven->nama_barang }}</div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="row">
                                                    <div class="col-6">Jumlah Barang Diperbaiki</div>
                                                    <div class="col-6">: {{ $data->jumlah }}</div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="row">
                                                    <div class="col-6">Tanggal Mulai Perbaikan</div>
                                                    <div class="col-6">: {{ $data->tgl_maintenance }}</div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="row">
                                                    <div class="col-6">Tanggal Perbaikan Selesai</div>
                                                    <div class="col-6">: {{ $data->tgl_penyelesaian ?? '-' }}</div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="row">
                                                    <div class="col-6">Jenis Maintenance</div>
                                                    <div class="col-6">: {{ $data->jenis_maintenance }}</div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="row">
                                                    <div class="col-6">Status Perbaikan Saat Ini</div>
                                                    <div class="col-6">: {{ $data->status }}</div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                                </div>
                            </div>

                            {{-- Modal Penyelesaian --}}
                            <div class="modal fade" id="modalPenyelesaian{{ $data->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Penyelesaian Maintenance</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('maintenance.update', $data->id) }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">

                                                {{-- Data pinjam 1 --}}
                                                <div class="col-lg-6 col-md-12">
                                                    <div class="form-group">
                                                        <label for="tgl_maintenance" class="ml-1">Masukkan Tanggal Mulai Perbaikan : </label>
                                                        <input
                                                        type="date"
                                                        class="form-control form-control-user"
                                                        id="tgl_maintenance"
                                                        name="tgl_maintenance"
                                                        placeholder="Masukkan Tanggal Mulai Perbaikan"
                                                        value="{{ $data->tgl_maintenance }}"
                                                        disabled>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="inven_id" class="ml-1">Masukkan Nama Barang : </label>
                                                        <input
                                                        type="text"
                                                        class="form-control form-control-user"
                                                        id="inven_id"
                                                        name="inven_id"
                                                        placeholder="{{ $data->inven->nama_barang }}"
                                                        disabled>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-12">
                                                    <div class="form-group">
                                                        <label for="tgl_penyelesaian" class="ml-1">Masukkan Tanggal Selesai Maintenance : </label>
                                                        <input
                                                        type="date"
                                                        class="form-control form-control-user"
                                                        id="tgl_penyelesaian"
                                                        name="tgl_penyelesaian"
                                                        placeholder="Masukkan Tanggal Peminjaman"
                                                        required
                                                        >
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="jumlah" class="ml-1">Masukkan Jumlah Peminjaman : </label>
                                                        <input
                                                        type="text"
                                                        class="form-control form-control-user"
                                                        id="jumlah"
                                                        name="jumlah"
                                                        placeholder="{{ $data->jumlah }}"
                                                        disabled>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary">Simpan</button>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        </form>
                                    </div>
                                </div>
                                </div>
                            </div>

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
            <a href="{{ route('maintenance.create') }}" class="btn btn-primary btn-block shadow font-weight-bold">Tambah Data Maintenance</a>
        </div>
    </div>
    {{-- Button Create Data : Start --}}

@endsection

{{-- Section JavaScript --}}
@section('script')@endsection
