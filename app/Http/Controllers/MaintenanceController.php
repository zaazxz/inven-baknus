<?php

namespace App\Http\Controllers;

use App\Models\Inventaris;
use App\Models\Maintenance;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

class MaintenanceController extends Controller
{

    // Maintenance View Index
    public function index()
    {
        return view('backend.maintenance.index', [
            'title'         => 'Maintenance',
            'title_header'  => 'Maintenance',
            'halaman'       => 'Maintenance',
            'data'          => Maintenance::all()
        ]);
    }

    // Maintenance Daalam Perbaikan View Index
    public function perbaikan()
    {
        return view('backend.maintenance.index', [
            'title'         => 'Maintenance Dalam Pengerjaan',
            'title_header'  => 'Maintenance Dalam Pengerjaan',
            'halaman'       => 'Dalam Pengerjaan',
            'data'          => Maintenance::where('status', 'Sedang Dalam Pengerjaan')->get()
        ]);
    }

    // Maintenance Selesai View Index
    public function selesai()
    {
        return view('backend.maintenance.index', [
            'title'         => 'Maintenance Selesai',
            'title_header'  => 'Maintenance Selesai',
            'halaman'       => 'Selesai',
            'data'          => Maintenance::where('status', 'Selesai')->get()
        ]);
    }



    // Create View
    public function create()
    {
        return view('backend.maintenance.create', [
            'title'         => 'Maintenance Tambah Maintenance',
            'title_header'  => 'Maintenance Tambah Maintenance',
            'halaman'       => 'Tambah Data',
            'inven'         => Inventaris::where('status', 'Tersedia')->get(),
        ]);
    }

    // Store Function
    public function store(Request $request)
    {
        $data = $request->validate([
            'inven_id'          => 'required',
            'tgl_maintenance'   => 'required',
            'jenis_maintenance' => 'required',
            'jumlah'            => 'required',
            'komponen'          => '',
            'keterangan'        => ''
        ]);

        // Set Sedang Dalam Pengerjaan Status
        $data['status'] = "Sedang Dalam Pengerjaan";

        // Set Tgl Penyelesaian to NULL
        $data['tgl_penyelesaian'] = NULL;

        Maintenance::create($data);

        if ($data) {
            Alert::success('Success', 'Data Maintenance berhasil ditambahkan!');
            return redirect()->route('maintenance.index');
        } else {
            Alert::error('Error', 'Data Maintenance gagal ditambahkan!');
            return redirect()->route('maintenance.index');
        }

    }

    // Function Update
    public function update(Request $request, Maintenance $maintenance)
    {
        $data = $request->validate([
            'inven_id'          => '',
            'tgl_maintenance'   => '',
            'jenis_maintenance' => '',
            'jumlah'            => '',
            'tgl_penyelesaian'  => 'required',
            'komponen'          => '',
            'keterangan'        => ''
        ]);

        // Set Sedang Dalam Pengerjaan Status
        $data['status'] = "Selesai";

        Maintenance::where('id', $maintenance->id)
            ->update($data);

        if ($data) {
            Alert::success('Success', 'Maintenance Selesai!');
            return redirect()->route('maintenance.index');
        } else {
            Alert::error('Error', 'Maintenance Gagal diselesaikan!');
            return redirect()->route('maintenance.index');
        }

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Maintenance $maintenance)
    {
        //
    }
}
