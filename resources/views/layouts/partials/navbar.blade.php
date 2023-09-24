<nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

    {{-- Sidebar Toggle (Topbar) : Start --}}
    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
        <i class="fa fa-bars"></i>
    </button>
    {{-- Sidebar Toggle (Topbar) : End --}}

    {{-- Logo Only : Start --}}
    <div class="navbar-nav mr-auto">
        <p class="ml-3 mt-4 d-inline-block textSatu font-weight-bold">SMP BAKTI NUSANTARA 666 INVENTARIS</p>
    </div>
    {{-- Logo Only : End --}}

    {{-- Topbar Navbar : Start --}}
    <ul class="navbar-nav ml-auto">

        {{-- User Divider : Start --}}
        <div class="topbar-divider d-md-none d-sm-block"></div>
        {{-- User Divider : End --}}

        {{-- User Information : Start --}}
        <li class="nav-item dropdown no-arrow">
            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ auth()->user()->name }}</span>
                @if (auth()->user()->picture)
                    <img class="img-profile rounded-circle" src="{{ asset('storage/' . auth()->user()->picture) }}">
                @else
                    <img class="img-profile rounded-circle" src="{{ asset('sb-admin/img/undraw_profile.svg') }}">
                @endif
            </a>
            <!-- Dropdown - User Information -->
            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                    <i class="fa-solid fa-gear fa-sm fa-fw mr-2 text-gray-400"></i>
                    Change Password
                </a>
                <div class="dropdown-divider"></div>
                <button class="dropdown-item" class="btn btn-primary" data-toggle="modal" data-target="#modalUser{{ auth()->user()->id }}">
                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                    Profil
                </button>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="{{ route('config.pengguna.edit', auth()->user()->id) }}">
                    <i class="fa-solid fa-gear fa-sm fa-fw mr-2 text-gray-400"></i>
                    Konfigurasi Profil
                </a>
                <div class="dropdown-divider"></div>
                <form action="{{ route('logout.auth') }}" method="post">
                    @csrf
                    <button class="dropdown-item" type="submit">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        Logout
                    </button>
                </form>
            </div>
        </li>
        {{-- User Information : End --}}

    </ul>
    {{-- Topbar Navbar : End --}}

</nav>

<div class="modal fade" id="modalUser{{ auth()->user()->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
    <div class="modal-content">
        <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail User {{ auth()->user()->name }}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
        </div>
        <div class="modal-body">
            <ul class="list-group">
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-4">Nama</div>
                        <div class="col-8">: {{ auth()->user()->name }}</div>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-4">E-mail</div>
                        <div class="col-8">: {{ auth()->user()->email }}</div>
                    </div>
                </li>
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-4">Role User</div>
                        <div class="col-8">: {{ auth()->user()->role }}</div>
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
