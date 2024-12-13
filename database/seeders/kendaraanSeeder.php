<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class kendaraanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kendaraans')->insert([
            [
                'nomor_polisi' => 'P 1976 XC',
                'jarak_tempuh' => 2564,
                'jenis_kendaraan' => 'Angkutan Orang',
                'konsumsi_bbm' => 12.5,
                'status_kepemilikan' => 'Milik Perusahaan',
                'lokasi_kendaraan_id' => 1,
            ],
            [
                'nomor_polisi' => 'P 1976 VD',
                'jarak_tempuh' => 4125,
                'jenis_kendaraan' => 'Angkutan Orang',
                'konsumsi_bbm' => 12.5,
                'status_kepemilikan' => 'Milik Perusahaan',
                'lokasi_kendaraan_id' => 2,
            ],
            [
                'nomor_polisi' => 'P 2065 VK',
                'jarak_tempuh' => 5612,
                'jenis_kendaraan' => 'Angkutan Barang',
                'konsumsi_bbm' => 12.5,
                'status_kepemilikan' => 'Sewa',
                'lokasi_kendaraan_id' => 3,
            ],
        ]);
    }
}
