<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemesanan extends Model
{
    use HasFactory;
    protected $fillable = [
        "status_pengajuan",
        "tanggal_pemakaian",
        "kendaraan_id",
        "lokasi_peminjaman_id",
        "driver_id",
        "pengesah_id",
    ];

    public function getKendaraan() {
        return $this->belongsTo(Kendaraan::class, 'kendaraan_id');
    }

    public function getLokasi() {
        return $this->belongsTo(Kantor::class,'lokasi_peminjaman_id');
    }

    public function getDriver() {
        return $this->belongsTo(Pegawai::class,'driver_id');
    }

    public function getPengesah() {
        return $this->belongsTo(Pegawai::class, 'pengesah_id');
    }
}
