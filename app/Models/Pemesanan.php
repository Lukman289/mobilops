<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    use HasFactory;
    protected $fillable = [
        "status_pengajuan",
        "tanggal_pemesanan",
        "tanggal_pemakaian",
        "kendaraan_id",
        "lokasi_peminjaman_id",
        "driver_id",
        "pengesah_id",
    ];
}
