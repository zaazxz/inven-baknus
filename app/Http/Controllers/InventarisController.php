<?php

namespace App\Http\Controllers;

use App\Models\Lokasi;
use App\Models\Inventaris;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class InventarisController extends Controller
{
    // View Index
    public function index()
    {
        return view('backend.inventaris.index', [
            'title'         => 'BARANG INVENTARIS',
            'halaman'       => 'Inventaris',
            'title_header'  => 'Inventaris',
            'inventaris'    => Inventaris::all()
        ]);
    }

    // View Tersedia
    public function tersedia()
    {
        return view('backend.inventaris.index', [
            'title'         => 'BARANG INVENTARIS TERSEDIA',
            'halaman'       => 'Tersedia',
            'title_header'  => 'Inventaris Tersedia',
            'inventaris'    => Inventaris::where('status', 'Tersedia')->get()
        ]);
    }

    // View Tidak Tersedia
    public function tidak()
    {
        return view('backend.inventaris.index', [
            'title'         => 'BARANG INVENTARIS DALAM PEMINJAMAN',
            'halaman'       => 'Tidak Tersedia',
            'title_header'  => 'Inventaris Dalam Peminjaman',
            'inventaris'    => Inventaris::where('status', 'Tidak Tersedia')->get()
        ]);
    }

    // View Maintenance
    public function maintenance()
    {
        return view('backend.inventaris.index', [
            'title'         => 'BARANG INVENTARIS DALAM MAINTENANCE',
            'halaman'       => 'Maintenance',
            'title_header'  => 'Inventaris Dalam Maintenance',
            'inventaris'    => Inventaris::where('status', 'Maintenance')->get()
        ]);
    }

    // View Create
    public function create()
    {
        return view('backend.inventaris.create', [
            'title'         => 'TAMBAH DATA BARANG INVENTARIS',
            'halaman'       => 'Tambah Data',
            'title_header'  => 'Tambah Data Barang',
            'lokasi'        => Lokasi::all()
        ]);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'kode_barang'   => 'required|unique:inventaris',
            'nama_barang'   => 'required',
            'merk'          => '',
            'spesifikasi'   => '',
            'no_seri'       => '',
            'tahun'         => 'required',
            'jumlah'        => 'required',
            'kondisi'       => 'required',
            'keterangan'    => '',
            'lokasi_id'     => 'required'
        ]);

        // Auto fill status with 'tersedia'
        $data['status'] = 'Tersedia';

        Inventaris::create($data);

        if ($data) {
            Alert::success('Success', 'barang berhasil ditambahkan!');
            return redirect()->route('inven.index');
        } else {
            Alert::error('Error', 'barang gagal ditambahkan!');
            return redirect()->route('inven.index');
        }

    }

    // getting value code
    public function code() {
        $data = Inventaris::latest()->first();
        return response()->json($data);
    }

    // getting Jumlah
    public function jumlah(Request $request) {
        $inven_id = $request->inven_id;
        $data = Inventaris::where('id', $inven_id)->first();
        return response()->json($data);
    }

    // View Edit
    public function edit(Inventaris $inventaris)
    {
        return view('backend.inventaris.edit', [
            'title'         => 'UDATE DATA BARANG INVENTARIS',
            'halaman'       => 'Update Data',
            'title_header'  => 'Update Data Barang',
            'inven'         => $inventaris,
            'lokasi'        => Lokasi::where('id', '!==', $inventaris->lokasi_id)->get(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Inventaris $inventaris)
    {
        $data = $request->validate([
            'kode_barang'   => '',
            'nama_barang'   => '',
            'merk'          => '',
            'spesifikasi'   => '',
            'no_seri'       => '',
            'tahun'         => '',
            'jumlah'        => '',
            'kondisi'       => '',
            'keterangan'    => '',
            'lokasi_id'     => ''
        ]);

        Inventaris::where('id', $inventaris->id)
            ->update($data);

        if ($data) {
            Alert::success('Success', 'Barang berhasil diubah!');
            return redirect()->route('inven.index');
        } else {
            Alert::error('Error', 'Barang gagal diubah!');
            return redirect()->route('inven.index');
        }
    }

    // Destroy Function
    public function destroy(Inventaris $inventaris)
    {
        Inventaris::destroy('id', $inventaris->id);

        if ($inventaris) {
            Alert::success('Success', 'Barang berhasil dihapus!');
            return redirect()->route('inven.index');
        } else {
            Alert::error('Error', 'Barang gagal dihapus!');
            return redirect()->route('inven.index');
        }

    }
}
