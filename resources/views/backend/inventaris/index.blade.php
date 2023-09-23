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
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($inventaris as $inven)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $inven->kode_barang }}</td>
                                <td>{{ $inven->nama_barang }}</td>
                                <td>
                                    <div class="row">
                                        <div class="col-lg-2 col-md-12 mb-1 d-flex justify-content-center">
                                            <a href="{{ route('inven.edit', $inven->id) }}" class="btn btn-warning">
                                                <i class="fa-solid fa-pen"></i>
                                            </a>
                                        </div>
                                        <div class="col-lg-2 col-md-12 mb-1 d-flex justify-content-center">
                                            <a href="{{ route('inven.destroy', $inven->id) }}" class="btn btn-danger">
                                                <i class="fa-solid fa-trash-can"></i>
                                            </a>
                                        </div>
                                        <div class="col-lg-2 col-md-12 mb-1 d-flex justify-content-center">
                                            <button
                                            type="button"
                                            class="btn btn-primary"
                                            data-toggle="modal"
                                            data-target="#modalInven{{ $inven->id }}">
                                                <i class="fa-solid fa-circle-info"></i>
                                            </button>
                                        </div>
                                    </div>
                                </td>
                                </td>
                            </tr>

                            <div class="modal fade" id="modalInven{{ $inven->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-xl modal-dialog-scrollable">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Detail Barang {{ $inven->nama_barang }}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="row">

                                            {{-- Status Indikator --}}
                                            @if (str_contains($url,'index'))
                                            @else
                                                <div class="col-12 my-2">
                                                    @if (str_contains($url, 'tersedia'))
                                                        <button class="btn btn-block btn-success">{{ $inven->status }}</button>
                                                    @elseif (str_contains($url, 'tidak'))
                                                        <button class="btn btn-block btn-danger">{{ $inven->status }}</button>
                                                    @elseif (str_contains($url, 'maintenance'))
                                                        <button class="btn btn-block btn-warning">{{ $inven->status }}</button>
                                                    @endif
                                                </div>
                                            @endif

                                            {{-- Data 1 --}}
                                            <div class="col-lg-6 col-md-12 my-2">
                                                <ul class="list-group">
                                                    <li class="list-group-item">
                                                        <div class="row">
                                                            <div class="col-6">Nama Barang</div>
                                                            <div class="col-6">: {{ $inven->nama_barang }} </div>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <div class="row">
                                                            <div class="col-6">Kode Barang</div>
                                                            <div class="col-6">: {{ $inven->kode_barang }}</div>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <div class="row">
                                                            <div class="col-6">Merk</div>
                                                            <div class="col-6">: {{ $inven->merk }}</div>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <div class="row">
                                                            <div class="col-6">Tahun Penambahan</div>
                                                            <div class="col-6">: {{ $inven->tahun }}</div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>

                                            {{-- Data 2 --}}
                                            <div class="col-lg-6 col-md-12 my-2">
                                                <ul class="list-group">
                                                    <li class="list-group-item">
                                                        <div class="row">
                                                            <div class="col-6">Nomor Seri</div>
                                                            <div class="col-6">: {{ $inven->no_seri }} </div>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <div class="row">
                                                            <div class="col-6">kondisi</div>
                                                            <div class="col-6">: {{ $inven->kondisi }}</div>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <div class="row">
                                                            <div class="col-6">Jumlah Barang</div>
                                                            <div class="col-6">: {{ $inven->jumlah }}</div>
                                                        </div>
                                                    </li>
                                                    <li class="list-group-item">
                                                        <div class="row">
                                                            <div class="col-6">Jumlah Stok</div>
                                                            <div class="col-6">: {{ $inven->stok }}</div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>

                                            {{-- Spesifikasi --}}
                                            <div class="col-lg-6 col-md-12 my-2">
                                                <ul class="list-group">
                                                    <li class="list-group-item">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                Spesifikasi :
                                                            </div>
                                                            <div class="col-12">
                                                                {!! $inven->spesifikasi !!}
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>

                                            {{-- Keterangan --}}
                                            <div class="col-lg-6 col-md-12 my-2">
                                                <ul class="list-group">
                                                    <li class="list-group-item">
                                                        <div class="row">
                                                            <div class="col-12">
                                                                Keterangan :
                                                            </div>
                                                            <div class="col-12">
                                                                {!! $inven->keterangan !!}
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
            <a href="{{ route('inven.create') }}" class="btn btn-primary btn-block shadow font-weight-bold">Tambah Barang Inventaris</a>
        </div>
    </div>
    {{-- Button Create Data : Start --}}

@endsection

{{-- Section JavaScript --}}
@section('script')@endsection
