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
            </div>
        </div>
    </div>
    {{-- Pemisah Section : End  --}}

    {{-- Form : Start --}}
    <div class="row mb-4">

        {{-- Form Data 1 : Start --}}
        <div class="col-12 my-2 mb-3">
            <div class="card p-3">
            <form action="{{ route('maintenance.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="inven_id">Pilih Barang Inventaris :</label>
                    <select class="form-control form-control-user" id="inven_id" name="inven_id">
                        @foreach ($inven as $inven)
                            <option value="{{ $inven->id }}">{{ $inven->nama_barang }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="jumlah" class="ml-1">Masukkan Jumlah Perbaikan : </label>
                    <input
                    type="number"
                    class="form-control form-control-user"
                    id="jumlah"
                    name="jumlah"
                    placeholder="Masukkan Jumlah Perbaikan"
                    required>
                </div>
                <div class="form-group">
                    <label for="jenis_maintenance" class="ml-1">Masukkan Jenis Perbaikan : </label>
                    <select class="form-control form-control-user" id="jenis_maintenance" name="jenis_maintenance">
                        <option value="Perbaikan">Perbaikan</option>
                        <option value="Install Ulang">Install Ulang</option>
                        <option value="Ganti Spare Part">Ganti Spare Part</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="tgl_maintenance" class="ml-1">Masukkan Tanggal Perbaikan : </label>
                    <input
                    type="date"
                    class="form-control form-control-user"
                    id="tgl_maintenance"
                    name="tgl_maintenance"
                    placeholder="Masukkan Tanggal Perbaikan"
                    required>
                </div>
            </div>
        </div>
        {{-- Form Data 1 : End --}}

        {{-- Pemisah Section : Start  --}}
        <div class="col-12 my-2">
            <div class="card py-2 pt-3 shadow border-primary border-bottom-primary">
                <div class="row">
                    <div class="col-12">
                        <h4 class="text-center text-primary font-weight-bolder">Komponen</h4>
                    </div>
                </div>
            </div>
        </div>
        {{-- Pemisah Section : End  --}}

        {{-- Trix Editor : Start --}}
        <div class="col-12 my-2">
            <div class="card p-3">
                <input id="keterangan" type="hidden" name="keterangan">
                <trix-editor input="keterangan" style="height: 200px;"></trix-editor>
            </div>
        </div>
        {{-- Trix Editor : End --}}

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

        {{-- Trix Editor : Start --}}
        <div class="col-12 my-2">
            <div class="card p-3">
                <input id="keterangan" type="hidden" name="keterangan">
                <trix-editor input="keterangan" style="height: 200px;"></trix-editor>
            </div>
        </div>
        {{-- Trix Editor : End --}}

        {{-- Button : Start --}}
        <div class="col-12 mt-2">
            <button type="submit" class="btn btn-primary btn-block shadow font-weight-bold">Submit</button>
            </form>
        </div>
        {{-- Button : End --}}

    </div>
    {{-- Form : End --}}

@endsection

{{-- Section JavaScript --}}
@section('script')
<script>
    $(document).ready(function () {

        $('#inven_id').click(function (e) {
            e.preventDefault();

            let inven_id = $('#inven_id').val();

            console.log(inven_id);

            $.ajax({
            url: '{{ route('getjumlahinven') }}',
            method: 'GET',
            data: {
                inven_id:inven_id
            },
            cache: false,
            success: function(data) {

                // Kode Changed
                $('#jumlah').on('input', function() {
                    if (data.jumlah < $('#jumlah').val()) {
                        $('#jumlah').addClass('is-invalid');
                        $('#jumlah').attr('name', '');
                    } else {
                        $('#jumlah').removeClass('is-invalid');
                        $('#jumlah').attr('name', 'jumlah');
                    }

                    console.log($('#jumlah').val());
                });

            },
            error: function(e) {
                response.text(e);
            }
            });

        });

        $('#inven_id').change(function (e) {
            e.preventDefault();

            let inven_id = $('#inven_id').val();

            console.log(inven_id);

            $.ajax({
            url: '{{ route('getjumlahinven') }}',
            method: 'GET',
            data: {
                inven_id:inven_id
            },
            cache: false,
            success: function(data) {

                // Kode Changed
                $('#jumlah').on('input', function() {
                    if (data.jumlah < $('#jumlah').val()) {
                        $('#jumlah').addClass('is-invalid');
                        $('#jumlah').attr('name', '');
                    } else {
                        $('#jumlah').removeClass('is-invalid');
                        $('#jumlah').attr('name', 'jumlah');
                    }

                    console.log($('#jumlah').val());
                });

            },
            error: function(e) {
                response.text(e);
            }
            });

        });

    });
</script>
@endsection
