<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LokasiController extends Controller
{
    // View Lokasi
    public function index()
    {
        return view('backend.lokasi.index', [
            'title'         => 'Lokasi',
            'title_header'  => 'Lokasi',
            'halaman'       => 'Lokasi',
        ]);
    }

    // View Create
    public function create()
    {
        return view('backend.lokasi.create', [
            'title'         => 'Lokasi',
            'title_header'  => 'Tambah Data Lokasi',
            'halaman'       => 'Tambah Lokasi',
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
