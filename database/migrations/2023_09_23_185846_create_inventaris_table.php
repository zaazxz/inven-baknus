<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('inventaris', function (Blueprint $table) {
            $table->id();
            $table->string('kode_barang')->unique();
            $table->string('nama_barang');
            $table->string('merk')->nullable();
            $table->text('spesifikasi')->nullable();
            $table->string('no_seri')->nullable();
            $table->string('tahun');
            $table->integer('jumlah');
            $table->integer('stok');
            $table->enum('kondisi', ['Baru', 'Bekas']);
            $table->enum('status', ['Tersedia', 'Tidak Tersedia', 'Maintenance']);
            $table->text('keterangan')->nullable();
            $table->foreignId('lokasi_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('inventaris');
    }
};
