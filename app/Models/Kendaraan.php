<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kendaraan extends Model
{
    use HasFactory;
    protected $fillable = [
        "nomor_polisi",
        "jarak_tempuh",
        "jenis_kendaraan",
        "konsumsi_bbm",
        "status_kepemilikan",
        "lokasi_kendaraan_id",
    ];
}
