<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\Lokasi;
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


    }
}
