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
            <a href="{{ route('home') }}">Dashboard</a> /
            {{ $halaman }}
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
            <form action="{{ route('pass.pengguna.update', auth()->user()->id) }}" method="get" enctype="multipart/form-data">
            {{ @csrf_field() }}
            <div class="card p-3">
                    <div class="form-group">
                        <label for="current_password" class="ml-1">Masukkan Password Saat Ini : </label>
                        <input
                        type="password"
                        class="form-control form-control-user"
                        id="current_password"
                        placeholder="Masukkan Password Lama"
                        name="current_password"
                        required>
                        @if ($errors->has('current_password'))
                            <strong>{{ $errors->alert('Error', 'current_password') }}</strong>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="new_password" class="ml-1">Masukkan Password Baru : </label>
                        <input
                        type="password"
                        class="form-control form-control-user"
                        id="new_password"
                        placeholder="Masukkan Password Baru"
                        name="new_password"
                        required>
                        @if ($errors->has('new_password'))
                            <strong>{{ $errors->alert('Error', 'new_password') }}</strong>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="new_password_confirmation" class="ml-1">Konfirmasi Password Baru : </label>
                        <input
                        type="password"
                        class="form-control form-control-user"
                        id="new_password_confirmation"
                        placeholder="Konfirmasi Password Baru"
                        name="new_password_confirmation"
                        required>
                        @if ($errors->has('new_password_confirmation'))
                            <strong>{{ $errors->alert('Error', 'new_password_confirmation') }}</strong>
                        @endif
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
@section('script')
<script>
    $(document).ready(function() {

    $('#new_password_confirmation').on('input', function() {

        let newPassword = $('#new_password').val();

        if (newPassword === $('#new_password_confirmation').val()) {
            $('#new_password_confirmation').removeClass('is-invalid');
            console.log($('#new_password_confirmation').val());
        } else {
            $('#new_password_confirmation').addClass('is-invalid');
        }

    });

});
</script>
@endsection
