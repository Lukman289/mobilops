<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class pemesananSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pemesanans')->insert([
            [
                'status_pengajuan' => 'menunggu',
                'tanggal_pemesanan' => Carbon::now(),
                'tanggal_pemakaian' => Carbon::now()->addDays(1),
                'kendaraan_id' => 1, 
                'lokasi_peminjaman_id' => 1, 
                'driver_id' => 2, 
                'pengesah_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'status_pengajuan' => 'disetujui',
                'tanggal_pemesanan' => Carbon::now()->subDays(2),
                'tanggal_pemakaian' => Carbon::now()->addDays(3),
                'kendaraan_id' => 2, 
                'lokasi_peminjaman_id' => 2, 
                'driver_id' => 3, 
                'pengesah_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'status_pengajuan' => 'ditolak',
                'tanggal_pemesanan' => Carbon::now()->subDays(1),
                'tanggal_pemakaian' => Carbon::now()->addDays(2),
                'kendaraan_id' => 3, 
                'lokasi_peminjaman_id' => 3, 
                'driver_id' => 4, 
                'pengesah_id' => 1,
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
