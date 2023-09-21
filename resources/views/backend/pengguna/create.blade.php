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
                <form action="" method="post">
                    <div class="form-group">
                        <label for="" class="ml-1">Masukkan Email Anda : </label>
                        <input type="email" class="form-control form-control-user" id="exampleInputEmail"
                            placeholder="Email Address">
                    </div>
                    <div class="form-group">
                        <label for="" class="ml-1">Masukkan Email Anda : </label>
                        <input type="email" class="form-control form-control-user" id="exampleInputEmail"
                            placeholder="Email Address">
                    </div>
                    <div class="form-group">
                        <label for="" class="ml-1">Masukkan Email Anda : </label>
                        <input type="email" class="form-control form-control-user" id="exampleInputEmail"
                            placeholder="Email Address">
                    </div>
                </form>
            </div>
        </div>
        {{-- Form Data : End --}}

        {{-- Form Data : Start --}}
        <div class="col-lg-6 col-md-12 my-2 mb-3">
            <div class="card p-3">
                <form action="" method="post">
                    <div class="form-group">
                        <label for="" class="ml-1">Masukkan Email Anda : </label>
                        <input type="email" class="form-control form-control-user" id="exampleInputEmail"
                            placeholder="Email Address">
                    </div>
                    <div class="form-group">
                        <label for="" class="ml-1">Masukkan Email Anda : </label>
                        <input type="email" class="form-control form-control-user" id="exampleInputEmail"
                            placeholder="Email Address">
                    </div>
                    <div class="form-group">
                        <label for="" class="ml-1">Masukkan Email Anda : </label>
                        <input type="email" class="form-control form-control-user" id="exampleInputEmail"
                            placeholder="Email Address">
                    </div>
                </form>
            </div>
        </div>
        {{-- Form Data : End --}}

        {{-- Button : Start --}}
        <div class="col-12">
            <a href="{{ route('inven.create') }}" class="btn btn-primary btn-block shadow font-weight-bold">Submit</a>
        </div>
        {{-- Button : End --}}

    </div>
    {{-- Form : End --}}

@endsection

{{-- Section JavaScript --}}
@section('script')@endsection
