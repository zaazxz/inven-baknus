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
        Schema::create('maintenances', function (Blueprint $table) {
            $table->id();
            $table->foreignId('inven_id');
            $table->date('tgl_maintenance');
            $table->date('tgl_penyelesaian')->nullable();
            $table->enum('status', ['Sedang Dalam Pengerjaan', 'Selesai']);
            $table->enum('jenis_maintenance', ['Perbaikan', 'Install Ulang', 'Ganti Spare Part']);
            $table->integer('jumlah');
            $table->text('komponen')->nullable();
            $table->text('keterangan')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('maintenances');
    }
};
