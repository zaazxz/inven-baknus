<?php

namespace App\Models;

use App\Models\Lokasi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Inventaris extends Model
{
    use HasFactory;

    protected $table = 'inventaris';
    protected $guarded = ['id'];

    public function lokasi() {
        return $this->belongsTo(Lokasi::class);
    }

    public function peminjaman() {
        return $this->hasMany(Peminjaman::class);
    }

    public function maintenance() {
        return $this->hasMany(Maintenance::class);
    }

}
