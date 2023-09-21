<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InventarisController extends Controller
{
    // View Index
    public function index()
    {
        return view('backend.inventaris.index', [
            'title'         => 'BARANG INVENTARIS',
            'halaman'       => 'Inventaris',
            'title_header'  => 'Inventaris'
        ]);
    }

    // View Tersedia
    public function tersedia()
    {
        return view('backend.inventaris.index', [
            'title'         => 'BARANG INVENTARIS TERSEDIA',
            'halaman'       => 'Tersedia',
            'title_header'  => 'Inventaris Tersedia'
        ]);
    }

    // View Tidak Tersedia
    public function tidak()
    {
        return view('backend.inventaris.index', [
            'title'         => 'BARANG INVENTARIS DALAM PEMINJAMAN',
            'halaman'       => 'Tidak Tersedia',
            'title_header'  => 'Inventaris Dalam Peminjaman'
        ]);
    }

    // View Maintenance
    public function maintenance()
    {
        return view('backend.inventaris.index', [
            'title'         => 'BARANG INVENTARIS DALAM MAINTENANCE',
            'halaman'       => 'Maintenance',
            'title_header'  => 'Inventaris Dalam Maintenance'
        ]);
    }

    // View Create
    public function create()
    {
        return view('backend.inventaris.create', [
            'title'         => 'TAMBAH DATA BARANG INVENTARIS',
            'halaman'       => 'Tambah Data',
            'title_header'  => 'Tambah Data Maintenance'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
