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
                <a href="{{ route('pengguna.index') }}">Pengguna</a> /
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
                    <a class="btn {{ str_contains($url, 'index') ? 'btn-primary text-white' : 'btn-light' }} mt-2 ml-2 mx-1 shadow" href="{{ route('pengguna.index') }}">Keseluruhan</a>
                    <a class="btn {{ str_contains($url, 'administrator') ? 'btn-primary text-white' : 'btn-light' }} mt-2 ml-2 mx-1 shadow" href="{{ route('pengguna.administrator') }}">Administrator</a>
                    <a class="btn {{ str_contains($url, 'laboran') ? 'btn-primary text-white' : 'btn-light' }} mt-2 mx-1 shadow" href="{{ route('pengguna.laboran') }}">Laboran</a>
                    <a class="btn {{ str_contains($url, 'pj') ? 'btn-primary text-white' : 'btn-light' }} mt-2 mx-1 shadow" href="{{ route('pengguna.pj') }}">Penanggung Jawab</a>
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
                            <th>Nama User</th>
                            <th>Role</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $data)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $data->name }}</td>
                                <td>{{ $data->role }}</td>
                                <td>
                                    <div class="row">
                                        <div class="col-lg-2 col-md-12 mb-1 d-flex justify-content-center">
                                            <a href="{{ route('pengguna.edit', $data->id) }}" class="btn btn-warning">
                                                <i class="fa-solid fa-pen"></i>
                                            </a>
                                        </div>
                                        <div class="col-lg-2 col-md-12 mb-1 d-flex justify-content-center">
                                            <a href="{{ route('pengguna.destroy', $data->id) }}" class="btn btn-danger">
                                                <i class="fa-solid fa-trash-can"></i>
                                            </a>
                                        </div>
                                        <div class="col-lg-2 col-md-12 mb-1 d-flex justify-content-center">
                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalUser{{ $data->id }}">
                                                <i class="fa-solid fa-circle-info"></i>
                                            </button>
                                        </div>
                                    </div>
                                </td>
                            </tr>

                            <div class="modal fade" id="modalUser{{ $data->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Detail User {{ $data->name }}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                    </div>
                                    <div class="modal-body">
                                        <ul class="list-group">
                                            <li class="list-group-item">
                                                <div class="row">
                                                    <div class="col-4">Nama</div>
                                                    <div class="col-8">: {{ $data->name }}</div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="row">
                                                    <div class="col-4">E-mail</div>
                                                    <div class="col-8">: {{ $data->email }}</div>
                                                </div>
                                            </li>
                                            <li class="list-group-item">
                                                <div class="row">
                                                    <div class="col-4">Role User</div>
                                                    <div class="col-8">: {{ $data->role }}</div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
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
            <a href="{{ route('pengguna.create') }}" class="btn btn-primary btn-block shadow font-weight-bold">Tambah Pengguna Baru</a>
        </div>
    </div>
    {{-- Button Create Data : Start --}}

@endsection

{{-- Section JavaScript --}}
@section('script')@endsection
