<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maintenance extends Model
{
    use HasFactory;

    protected $table = 'maintenances';
    protected $guarded = ['id'];

    public function inven() {
        return $this->belongsTo(Inventaris::class);
    }

}
