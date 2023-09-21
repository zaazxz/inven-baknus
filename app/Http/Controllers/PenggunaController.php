<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PenggunaController extends Controller
{
    // View Index
    public function index()
    {
        return view('backend.pengguna.index', [
            'title'         => 'Data Pengguna',
            'title_header'  => 'Pengguna',
            'halaman'       => 'Pengguna',
        ]);
    }

    // View Create
    public function create()
    {
        return view('backend.pengguna.create', [
            'title'         => 'Data Pengguna Baru',
            'title_header'  => 'Tambah Data Pengguna',
            'halaman'       => 'Tambah Data',
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
