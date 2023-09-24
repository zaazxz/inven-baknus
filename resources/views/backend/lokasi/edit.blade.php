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
            <div class="row">
                <div class="col-12">
                    <h4 class="text-center text-primary font-weight-bolder">{{ $title }}</h4>
                </div>
            </div>
        </div>
    </div>
    {{-- Pemisah Section : End  --}}

    {{-- Form : Start --}}
    <div class="row mb-4">

        {{-- Form Data : Start --}}
        <div class="col-12 my-2 mb-3">
            <form action="{{ route('lokasi.update', $data->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card p-3">
                    <div class="form-group">
                        <label for="nama" class="ml-1">Masukkan Nama Lokasi : </label>
                        <input
                        type="text"
                        class="form-control form-control-user"
                        id="nama"
                        placeholder="Masukkan Nama Lokasi"
                        name="nama_lokasi"
                        value="{{ $data->nama_lokasi }}">
                    </div>
                    <div class="form-group">
                        <label for="penanggung_jawab">Pilih Penanggung Jawab</label>
                        <select class="form-control form-control-user" id="penanggung_jawab" name="user_id">
                            @if (!$data->user_id)
                                @foreach ($user_terdaftar as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            @else
                                <option value="{{ $data->user_id }}" selected>{{ $data->user->name ?? '' }}</option>
                                @foreach ($user_terdaftar as $user)
                                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                                @endforeach
                            @endif
                        </select>
                    </div>
                </div>
            </div>
            {{-- Form Data : End --}}

            {{-- Button : Start --}}
            <div class="col-12">
                <button class="btn btn-primary btn-block shadow font-weight-bold" type="submit">Submit</button>
            </div>
        </form>
        {{-- Button : End --}}

    </div>
    {{-- Form : End --}}

@endsection

{{-- Section JavaScript --}}
@section('script')@endsection
