{{-- PHP Variable --}}
@php
    $url = Route::current()->getName();
@endphp

{{-- Extends The Layouts --}}
@extends('layouts.backend')

{{-- Section Styling (CSS) --}}
@section('style')
    <style>

        /* Input Type Number */
        input::-webkit-outer-spin-button,
        input::-webkit-inner-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        input[type=number] {
            -moz-appearance: textfield;
        }

        /* Trix Editor */
        div .trix-button-row {
            display: flex;
            justify-content: center;
        }

        /* Broken Line */
        .trix-button-group-spacer,
        .trix-button-group--history-tools,
        .trix-button-group--file-tools {
            display: none;
            opacity: 0%;
        }

        /* Button */
        .trix-button--icon-undo,
        .trix-button--icon-redo,
        .trix-button--icon-attach,
        .trix-button--icon-increase-nesting-level,
        .trix-button--icon-decrease-nesting-level,
        .trix-button--icon-code,
        .trix-button--icon-quote,
        .trix-button--icon-link {
            display: none;
        }

    </style>
@endsection

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
            </div>
        </div>
    </div>
    {{-- Pemisah Section : End  --}}

    {{-- Form : Start --}}
    <div class="row mb-4">

        {{-- Form Data : Start --}}
        <div class="col-lg-6 col-md-12 my-2">
            <form action="{{ route('inven.update', $inven->id) }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card p-3">
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="form-group">
                            <label for="kode_barang" class="ml-1">Masukkan Kode Barang : </label>
                            <input
                            type="number"
                            class="form-control form-control-user @error('kode_barang') is-invalid @enderror"
                            id="kode_barang"
                            placeholder="Masukkan Kode Barang"
                            name="kode_barang"
                            value="{{ $inven->kode_barang ?? '' }}">
                        </div>
                        @error('kode_barang') {{ $message }} @enderror
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="form-group">
                            <label for="no_seri" class="ml-1">Masukkan Nomor Seri : </label>
                            <input
                            type="text"
                            class="form-control form-control-user @error('no_seri') is-invalid @enderror"
                            id="no_seri"
                            name="no_seri"
                            placeholder="Masukkan Nomor Seri"
                            value="{{ $inven->no_seri ?? '' }}">
                        </div>
                        @error('no_seri') {{ $message }} @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="nama_barang" class="ml-1">Masukkan Nama Barang : </label>
                    <input
                    type="text"
                    class="form-control form-control-user @error('nama_barang') is-invalid @enderror"
                    id="nama_barang"
                    name="nama_barang"
                    placeholder="Masukkan Nama Barang"
                    value="{{ $inven->nama_barang ?? '' }}">
                </div>
                @error('nama_barang') {{ $message }} @enderror
                <div class="form-group">
                    <label for="merk" class="ml-1">Masukkan Merk Barang : </label>
                    <input
                    type="text"
                    class="form-control form-control-user @error('merk') is-invalid @enderror"
                    id="merk"
                    name="merk"
                    placeholder="Masukkan Merk Barang"
                    value="{{ $inven->merk ?? '' }}">
                </div>
                @error('merk') {{ $message }} @enderror
            </div>
        </div>
        <div class="col-lg-6 col-md-12 my-2">
            <div class="card p-3">
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <div class="form-group">
                            <label for="tahun" class="ml-1">Masukkan Tahun Penambahan : </label>
                            <input
                            type="number"
                            class="form-control form-control-user @error('tahun') is-invalid @enderror"
                            id="tahun"
                            placeholder="Masukkan Tahun Penambahan"
                            name="tahun"
                            value="{{ $inven->tahun ?? '' }}">
                        </div>
                        @error('tahun') {{ $message }} @enderror
                    </div>
                    <div class="col-lg-6 col-md-12">
                        <div class="form-group">
                            <label for="jumlah" class="ml-1">Masukkan Jumlah Penambahan : </label>
                            <input
                            type="text"
                            class="form-control form-control-user @error('jumlah') is-invalid @enderror"
                            id="jumlah"
                            name="jumlah"
                            placeholder="Masukkan Jumlah Penambahan"
                            value="{{ $inven->jumlah ?? '' }}">
                        </div>
                        @error('jumlah') {{ $message }} @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="kondisi" class="ml-1">Kondisi Penambahan : </label>
                    <select class="form-control form-control-user" id="kondisi" name="kondisi">
                        @if ($inven->kondisi == 'Baru')
                            <option value="{{ $inven->kondisi }}">{{ $inven->kondisi }}</option>
                            <option value="Bekas">Bekas</option>
                        @else
                        <option value="{{ $inven->kondisi }}">{{ $inven->kondisi }}</option>
                            <option value="Baru">Baru</option>
                        @endif
                    </select>
                    @error('kondisi') {{ $message }} @enderror
                </div>
                <div class="form-group">
                    <label for="lokasi_id" class="ml-1">Masukkan Lokasi Penyimpanan : </label>
                    <select class="form-control form-control-user" id="lokasi_id" name="lokasi_id">
                            <option value="{{ $inven->lokasi_id }}">{{ $inven->lokasi->nama_lokasi }}</option>
                        @foreach ($lokasi as $lokasi)
                            <option value="{{ $lokasi->id }}">{{ $lokasi->nama_lokasi }}</option>
                        @endforeach
                    </select>
                    @error('lokasi_id') {{ $message }} @enderror
                </div>
            </div>
        </div>
        {{-- Form Data : End --}}

        {{-- Pemisah Section : Start  --}}
        <div class="col-12 my-2">
            <div class="card py-2 pt-3 shadow border-primary border-bottom-primary">
                <div class="row">
                    <div class="col-12">
                        <h4 class="text-center text-primary font-weight-bolder">Spesifikasi</h4>
                    </div>
                </div>
            </div>
        </div>
        {{-- Pemisah Section : End  --}}

        {{-- Form Spesifikasi : Start --}}
        <div class="col-12 my-2">
            <div class="card p-3">
                <input id="spesifikasi" type="hidden" name="spesifikasi" value="{!! $inven->spesifikasi !!}">
                <trix-editor input="spesifikasi" style="height: 200px;"></trix-editor>
            </div>
        </div>
        {{-- Form Spesifikasi : End --}}

        {{-- Pemisah Section : Start  --}}
        <div class="col-12 my-2">
            <div class="card py-2 pt-3 shadow border-primary border-bottom-primary">
                <div class="row">
                    <div class="col-12">
                        <h4 class="text-center text-primary font-weight-bolder">Keterangan</h4>
                    </div>
                </div>
            </div>
        </div>
        {{-- Pemisah Section : End  --}}

        {{-- Form Keterangan : Start --}}
        <div class="col-12 my-2">
            <div class="card p-3">
                <input id="keterangan" type="hidden" name="keterangan" value="{!! $inven->keterangan!!}">
                <trix-editor input="keterangan" style="height: 200px;">

                </trix-editor>
            </div>
        </div>
        {{-- Form Keterangan : End --}}

        {{-- Button : Start --}}
        <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block shadow font-weight-bold">Submit</button>
        </div>
        </form>
        {{-- Button : End --}}

    </div>
    {{-- Form : End --}}

@endsection

{{-- Section JavaScript --}}
@section('script')
    <script>
        $(document).ready(function () {
            $.ajax({
                url: '{{ route('getvaluecode') }}',
                method: 'GET',
                success: function(data) {

                    // Kode Changed on Kode Barang
                    $('#kode_barang').on('input', function() {
                        if (data.kode_barang > $('#kode_barang').val()) {
                            $('#kode_barang').addClass('is-invalid');
                        } else {
                            $('#kode_barang').removeClass('is-invalid');
                        }
                    });

                    // Kode Changed on Jumlah
                    $('#jumlah').on('input', function() {
                        if (data.stok >= $('#jumlah').val()) {
                            $('#jumlah').addClass('is-invalid');
                        } else {
                            $('#jumlah').removeClass('is-invalid');
                        }
                    });

                },
                error: function(e) {
                    response.text(e);
                }
            });
        });
    </script>
@endsection
