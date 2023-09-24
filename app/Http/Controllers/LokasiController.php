<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Lokasi;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class LokasiController extends Controller
{
    // View Lokasi
    public function index()
    {
        return view('backend.lokasi.index', [
            'title'         => 'Lokasi',
            'title_header'  => 'Lokasi',
            'halaman'       => 'Lokasi',
            'data'          => Lokasi::all()
        ]);
    }

    // View Create
    public function create()
    {
        return view('backend.lokasi.create', [
            'title'         => 'Lokasi',
            'title_header'  => 'Tambah Data Lokasi',
            'halaman'       => 'Tambah Lokasi',
            'data'          => User::where('lokasi_id', NULL)->get()
        ]);
    }

    // Store Function
    public function store(Request $request)
    {
        $data = $request->validate([
            'nama_lokasi' => 'required',
            'user_id'     => '',
        ]);

        Lokasi::create($data);

        if ($data) {
            Alert::success('Success', 'Lokasi Baru berhasil ditambahkan!');
            return redirect()->route('lokasi.index');
        } else {
            Alert::error('Error', 'Lokasi Baru gagal ditambahkan!');
            return redirect()->route('lokasi.index');
        }

    }

    // Edit View
    public function edit(Lokasi $lokasi)
    {
        return view('backend.lokasi.edit', [
            'title'             => 'Lokasi',
            'title_header'      => 'Update Data Lokasi',
            'halaman'           => 'Update Lokasi',
            'user'              => User::where('id', '!=', $lokasi->user_id)->get(),
            'user_terdaftar'    => User::where('lokasi_id', NULL)->get(),
            'data'              => $lokasi
        ]);
    }

    // Update Function
    public function update(Request $request, Lokasi $lokasi)
    {
        $data = $request->validate([
            'nama_lokasi' => '',
            'user_id'     => '',
        ]);

        Lokasi::where('id', $lokasi->id)
            ->update($data);

        if ($data) {
            Alert::success('Success', 'Lokasi berhasil diubah!');
            return redirect()->route('lokasi.index');
        } else {
            Alert::error('Error', 'Lokasi gagal diubah!');
            return redirect()->route('lokasi.index');
        }
    }

    // Destroy Function
    public function destroy(Lokasi $lokasi)
    {
        Lokasi::destroy('id', $lokasi->id);

        if ($lokasi) {
            Alert::success('Success', 'Lokasi berhasil dihapus!');
            return redirect()->route('lokasi.index');
        } else {
            Alert::error('Error', 'Lokasi gagal dihapus!');
            return redirect()->route('lokasi.index');
        }

    }
}
