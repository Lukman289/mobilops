<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalService extends Model
{
    use HasFactory;
    protected $fillable = [
        "tanggal_service",
        "kendaraan_id",
    ];
}