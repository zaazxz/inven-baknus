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
                <a href="{{ route('lokasi.index') }}">Peminjaman</a> /
                {{ $halaman }}
            @endif
        </small>
    </div>
    {{-- Heading : Start --}}

    {{-- Pemisah Section : Start  --}}
    <div class="mb-3 mt-1">
        <div class="card py-2 pt-3 shadow border-primary border-bottom-primary">
            <h4 class="text-center text-primary font-weight-bolder">{{ $title }}</h4>
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
                            <th>Nama Peminjam</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pinjam as $pinjam)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $pinjam->inven->nama_barang }}</td>
                                <td>{{ $pinjam->peminjam }}</td>
                                <td>
                                    <div class="row">
                                        <div class="col-lg-2 col-md-12 mb-1 d-flex justify-content-center">
                                            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#modalData{{ $pinjam->id }}">
                                                <i class="fa-solid fa-circle-info"></i>
                                            </a>
                                        </div>
                                        <div class="col-lg-2 col-md-12 mb-1 d-flex justify-content-center">
                                            <a href="{{ route('peminjaman.destroy', $pinjam->id) }}" class="btn btn-danger">
                                                <i class="fa-solid fa-trash-can"></i>
                                            </a>
                                        </div>
                                        <div class="col-lg-2 col-md-12 mb-1 d-flex justify-content-center">
                                            <a href="#" class="btn btn-success" data-toggle="modal" data-target="#modalPengembalian{{ $pinjam->id }}">
                                                <i class="fa-solid fa-hand-holding-hand"></i>
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>

                            {{-- Modal Detail --}}
                            <div class="modal fade" id="modalData{{ $pinjam->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Detail Peminjaman {{ $pinjam->peminjam }}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                        <ul class="list-group">
                                            <li class="list-group-item">
                                                <div class="row">
                                                    <div class="col-6">Nama Peminjam</div>
                                                    <div class="col-6">: {{ $pinjam->peminjam }}</div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="row">
                                                    <div class="col-6">Tanggal Peminjaman</div>
                                                    <div class="col-6">: {{ $pinjam->tgl_pinjam }}</div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="row">
                                                    <div class="col-6">Tanggal Pengembalian</div>
                                                    <div class="col-6">: {{ $pinjam->tgl_kembali ?? '-' }}</div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="row">
                                                    <div class="col-6">Penanggung Jawab</div>
                                                    <div class="col-6">: {{ $pinjam->user->name }}</div>
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

                            {{-- Modal Pengembalian --}}
                            <div class="modal fade" id="modalPengembalian{{ $pinjam->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Pengembalian</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="{{ route('peminjaman.update', $pinjam->id) }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">

                                                {{-- Data pinjam 1 --}}
                                                <div class="col-lg-6 col-md-12">
                                                    <div class="form-group">
                                                        <label for="tgl_pinjam" class="ml-1">Masukkan Tanggal Peminjaman : </label>
                                                        <input
                                                        type="date"
                                                        class="form-control form-control-user"
                                                        id="tgl_pinjam"
                                                        name="tgl_pinjam"
                                                        placeholder="Masukkan Tanggal Peminjaman"
                                                        value="{{ $pinjam->tgl_pinjam }}"
                                                        disabled>
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="peminjam" class="ml-1">Masukkan nama Peminjam : </label>
                                                        <input
                                                        type="text"
                                                        class="form-control form-control-user"
                                                        id="peminjam"
                                                        name="peminjam"
                                                        placeholder="{{ $pinjam->peminjam }}"
                                                        disabled>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6 col-md-12">
                                                    <div class="form-group">
                                                        <label for="tgl_kembali" class="ml-1">Masukkan Tanggal Pengembalian : </label>
                                                        <input
                                                        type="date"
                                                        class="form-control form-control-user"
                                                        id="tgl_kembali"
                                                        name="tgl_kembali"
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
                                                        placeholder="{{ $pinjam->jumlah }}"
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
            <a href="{{ route('peminjaman.create') }}" class="btn btn-primary btn-block shadow font-weight-bold">Buat Peminjaman</a>
        </div>
    </div>
    {{-- Button Create Data : Start --}}

@endsection

{{-- Section JavaScript --}}
@section('script')@endsection
