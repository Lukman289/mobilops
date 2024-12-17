<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kantor extends Model
{
    use HasFactory;
    protected $fillable = [
        "nama_kantor",
    ];

    public function getKendaraan()
    {
        return $this->hasMany(Kendaraan::class, 'lokasi_kendaraan_id');
    }

    public function getPegawai()
    {
        return $this->hasMany(Pegawai::class);
    }
}
