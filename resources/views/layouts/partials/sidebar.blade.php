
@php
    $url = Route::current()->getName();
@endphp

<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion toggled" id="accordionSidebar">

    {{-- Sidebar Brand : Start --}}
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('home.dashboard') }}">
        <div class="sidebar-brand-icon">
            <img src="{{ asset('image/assets/non-bg-fix.png') }}" alt="" class="img-fluid" width="80%">
        </div>
        <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
    </a>
    {{-- Sidebar Brand : End --}}

    {{-- Divider : Start --}}
    <hr class="sidebar-divider my-0">
    {{-- Divider : End --}}

    {{-- Dashboard : Start --}}
    <li class="nav-item {{ str_contains($url, 'home') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('home') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>
    {{-- Dashboard : End --}}

    {{-- Divider : Start --}}
    <hr class="sidebar-divider">
    {{-- Divider : End --}}

    {{-- Heading Sidebar : Start --}}
    <div class="sidebar-heading">
        Inventaris
    </div>
    {{-- Heading Sidebar : End --}}

    {{-- Nav Item : Start --}}
    <li class="nav-item {{ str_contains($url, 'inven') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('inven.index') }}">
            <i class="fa-solid fa-computer"></i>
            <span>Inventaris</span>
        </a>
    </li>
    {{-- Nav Item : End --}}

    {{-- Divider : Start --}}
    <hr class="sidebar-divider">
    {{-- Divider : End --}}

    {{-- Heading Sidebar : Start --}}
    <div class="sidebar-heading">
        Lainnya
    </div>
    {{-- Heading Sidebar : End --}}

    {{-- Nav Item : Start --}}
    <li class="nav-item {{ str_contains($url, 'lokasi') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('lokasi.index') }}">
            <i class="fa-solid fa-location-dot"></i>
            <span>Lokasi</span>
        </a>
    </li>
    {{-- Nav Item : End --}}

    {{-- Nav Item : Start --}}
    <li class="nav-item {{ str_contains($url, 'peminjaman') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('peminjaman.index') }}">
            <i class="fa-solid fa-handshake"></i>
            <span>Peminjaman</span>
        </a>
    </li>
    {{-- Nav Item : End --}}

    {{-- Nav Item : Start --}}
    <li class="nav-item {{ str_contains($url, 'pengguna') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('pengguna.index') }}">
            <i class="fa-solid fa-user"></i>
            <span>Pengguna</span>
        </a>
    </li>
    {{-- Nav Item : End --}}

    <!-- Divider -->
    {{-- <hr class="sidebar-divider d-none d-md-block"> --}}

</ul>
