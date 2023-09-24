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
            </div>
        </div>
    </div>
    {{-- Pemisah Section : End  --}}

    {{-- Form : Start --}}
    <div class="row mb-4">

        {{-- Form Data : Start --}}
        <div class="col-lg-6 col-md-12 my-2 mb-3">
            <div class="card p-3">
                <form action="{{ route('pengguna.update', $data->id) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="name" class="ml-1">Masukkan Nama Anda : </label>
                    <input
                    type="text"
                    class="form-control form-control-user @error('name') is-invalid @enderror"
                    id="name"
                    placeholder="Masukkan Nama Anda"
                    name="name"
                    value="{{ $data->name }}">
                    </div>
                    @error('name') {{ $message }} @enderror
                <div class="form-group">
                    <label for="email" class="ml-1">Masukkan Email Anda : </label>
                    <input
                    type="email"
                    class="form-control form-control-user @error('email') is-invalid @enderror"
                    id="email"
                    placeholder="Masukkan Email Anda"
                    name="email"
                    value="{{ $data->email }}"
                    disabled>
                    @error('email') {{ $message }} @enderror
                </div>
                <div class="form-group">
                    <label for="role">Pilih Role</label>
                    <select class="form-control form-control-user" id="role" name="role">
                        <option value="Administrator" {{ ($data->role == 'Administrator') ? 'selected' : '' }}>Administrator</option>
                        <option value="Laboran" {{ ($data->role == 'Laboran') ? 'selected' : '' }}>Laboran</option>
                        <option value="Penanggung Jawab" {{ ($data->role == 'Penanggung Jawab') ? 'selected' : '' }}>Penanggung Jawab</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="lokasi">Pilih Lokasi</label>
                    <select class="form-control form-control-user" id="lokasi" name="lokasi_id">
                        @if ($data->lokasi_id)
                            <option value="{{ $data->lokasi_id }}">{{ $data->lokasi->nama_lokasi ?? '' }}</option>
                            @foreach ($lokasi_null as $lokasi)
                                <option value="{{ $lokasi->id }}">{{ $lokasi->nama_lokasi }}</option>
                            @endforeach
                        @elseif(!$data->lokasi_id)
                                <option value="" selected></option>
                            @foreach ($lokasi_null as $lokasi)
                                <option value="{{ $lokasi->id }}">{{ $lokasi->nama_lokasi }}</option>
                            @endforeach
                        @endif
                    </select>
                </div>
            </div>
        </div>
        {{-- Form Data : End --}}

        {{-- Form Data : Start --}}
        <div class="col-lg-6 col-md-12 my-2 mb-3">
            <div class="card p-3">
                <div class="form-group">
                    <label for="picture" class="ml-1">Masukkan Gambar : </label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" id="picture" name="picture" onchange="previewImage()" value="{{ $data->picture }}">
                        <label class="custom-file-label" for="picture" id="placeholderImage">Gambar Sebelumnya</label>
                    </div>
                    @error('picture')
                        {{ $message }}
                    @enderror
                    </div>
                    <div class="row">
                        <div class="col-12 border d-flex justify-content-center py-4">
                        <img src="{{ ($data->picture ? asset('storage/' . $data->picture) : asset('image/assets/dummy.png')) }}" width="120px;" id="image">
                    </div>
                </div>
            </div>
        </div>
        {{-- Form Data : End --}}

        {{-- Button : Start --}}
        <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block shadow font-weight-bold">Submit</a>
            </form>
        </div>
        {{-- Button : End --}}

    </div>
    {{-- Form : End --}}

@endsection

{{-- Section JavaScript --}}
@section('script')@endsection
