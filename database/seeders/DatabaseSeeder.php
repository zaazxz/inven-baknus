<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Lokasi;
use App\Models\Inventaris;
use Illuminate\Support\Str;
use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Creating Default User
        User::create([
            'name'              => 'Administrator',
            'email'             => 'admin@iotech.id',
            'role'              => 'Administrator',
            'lokasi_id'         => NULL,
            'picture'           => NULL,
            'remember_token'    => Str::random(10),
            'password'          => bcrypt('admin123'),
            'created_at'        => Carbon::now(),
            'updated_at'        => NULL
        ]);

        User::create([
            'name'              => 'Mirza',
            'email'             => 'mirza@iotech.id',
            'role'              => 'Laboran',
            'lokasi_id'         => 1,
            'picture'           => NULL,
            'remember_token'    => Str::random(10),
            'password'          => bcrypt('laboran123'),
            'created_at'        => Carbon::now(),
            'updated_at'        => NULL
        ]);

        // Creating Default Location
        Lokasi::create([
            'user_id'       => 2,
            'nama_lokasi'   => 'Sarana Prasarana',
            'created_at'    => Carbon::now(),
            'updated_at'    => NULL
        ]);

        // Default Barang
        Inventaris::create([
            'kode_barang'   => '001',
            'nama_barang'   => 'Laptop Asus Zephyrus',
            'merk'          => 'Asus',
            'spesifikasi'   => 'Ram 32GB, SSD 1TB, INTEL CORE 19 13900-K',
            'no_seri'       => 'A4X1700',
            'tahun'         => '2023',
            'jumlah'        => 3,
            'kondisi'       => 'Baru',
            'status'        => 'Tersedia',
            'lokasi_id'     => 1,
            'keterangan'    => NULL,
            'created_at'    => Carbon::now(),
            'updated_at'    => NULL
        ]);


    }
}
