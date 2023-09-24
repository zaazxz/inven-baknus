<?php

namespace App\Http\Controllers;

use App\Models\Inventaris;
use App\Models\Peminjaman;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    // View Backend
    public function backend() {
        return view('backend.index', [
            'title'                 => 'DASHBOARD',
            'inven'                 => Inventaris::all()->count(),
            'inven_tersedia'        => Inventaris::where('status', 'Tersedia')->count(),
            'inven_tidak'           => Inventaris::where('status', 'Tidak Tersedia')->count(),
            'inventaris_baru'       => Inventaris::orderBy('created_at', 'desc')->get(),
            'inventaris_tersedia'   => Inventaris::where('status', 'Tersedia')->get(),
            'inventaris_peminjaman' => Peminjaman::all()
        ]);
    }

    // View Landing
    public function landing() {
        return view('index', [
            'inven'                 => Inventaris::all()->count(),
            'inven_tersedia'        => Inventaris::where('status', 'Tersedia')->count(),
            'inven_tidak'           => Inventaris::where('status', 'Tidak Tersedia')->count(),
            'inventaris_baru'       => Inventaris::orderBy('created_at', 'desc')->get(),
            'inventaris_tersedia'   => Inventaris::where('status', 'Tersedia')->get(),
            'inventaris_tidak'      => Inventaris::where('status', 'Tidak Tersedia')->get(),
        ]);
    }

}
