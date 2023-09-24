<?php

namespace App\Http\Controllers;

use App\Models\Inventaris;
use App\Models\Peminjaman;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class PeminjamanController extends Controller
{
    // view Index
    public function index()
    {
        return view('backend.peminjaman.index', [
            'title'         => 'List Data Peminjaman',
            'title_header'  => 'Peminjaman',
            'halaman'       => 'Peminjaman',
            'pinjam'        => Peminjaman::all()
        ]);
    }

    // View Create
    public function create()
    {
        return view('backend.peminjaman.create', [
            'title'         => 'Buat Data Peminjaman',
            'title_header'  => 'Tambah Peminjaman',
            'halaman'       => 'Tambah Data',
            'inven'         => Inventaris::where('status', 'Tersedia')->get(),
        ]);
    }

    // Store Function
    public function store(Request $request)
    {
        $data = $request->validate([
            'inven_id'      => 'required',
            'peminjam'      => 'required',
            'jumlah'        => 'required',
            'tgl_pinjam'    => 'required',
            'keterangan'    => ''
        ]);

        // Use User ID
        $data['user_id'] = Auth::user()->id;

        // Tgl Kembali To NULL
        $data['tgl_kembali'] = NULL;

        Peminjaman::create($data);

        if ($data) {
            Alert::success('Success', 'Peminjaman Berhasil!');
            return redirect()->route('peminjaman.index');
        } else {
            Alert::error('Error', 'Peminjaman Gagal!');
            return redirect()->route('peminjaman.index');
        }

    }

    // Update Function
    public function update(Request $request, Peminjaman $peminjaman)
    {
        $data = $request->validate([
            'inven_id'      => '',
            'peminjam'      => '',
            'jumlah'        => '',
            'tgl_pinjam'    => '',
            'tgl_kembali'   => 'required',
            'keterangan'    => ''
        ]);

        // Use User ID
        $data['user_id'] = Auth::user()->id;

        Peminjaman::where('id', $peminjaman->id)
            ->update($data);

        if ($data) {
            Alert::success('Success', 'Pengembalian Berhasil! ');
            return redirect()->route('peminjaman.index');
        } else {
            Alert::error('Error', 'Pengembalian Gagal! ');
            return redirect()->route('peminjaman.index');
        }
    }

    // Destroy Function
    public function destroy(Peminjaman $peminjaman)
    {
        Peminjaman::destroy('id', $peminjaman->id);

        if ($peminjaman) {
            Alert::success('Success', 'Peminjaman Berhasil dibatalkan!');
            return redirect()->route('peminjaman.index');
        } else {
            Alert::error('Error', 'Peminjaman Gagal dibatalkan!');
            return redirect()->route('peminjaman.index');
        }
    }
}
