<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;
    protected $fillable = [
        "nama_pegawai",
        "no_hp",
        "email",
        "jabatan",
        "kantor_id",
        "pimpinan_id",
    ];

    public function lokasiBekerja() {
        return $this->belongsTo(Kantor::class, 'kantor_id');
    }

    public function pimpinan()
    {
        return $this->belongsTo(Pegawai::class, 'pimpinan_id');
}

}
