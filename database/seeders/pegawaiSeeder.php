<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class pegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pegawais')->insert([
            // Pegawai di Kantor Pusat
            [
                'nama_pegawai' => 'Budi Santoso',
                'no_hp' => '081234567890',
                'email' => 'budi@gmail.com',
                'jabatan' => 'Pimpinan',
                'kantor_id' => 1,
                'pimpinan_id' => null,
            ],
            [
                'nama_pegawai' => 'Rina Sari',
                'no_hp' => '082345678901',
                'email' => 'rina@gmail.com',
                'jabatan' => 'Pegawai',
                'kantor_id' => 1,
                'pimpinan_id' => 1,
            ],

            // Pegawai di Kantor Cabang
            [
                'nama_pegawai' => 'Andi Prasetyo',
                'no_hp' => '083456789012',
                'email' => 'andi@gmail.com',
                'jabatan' => 'Pimpinan',
                'kantor_id' => 2,
                'pimpinan_id' => NULL,
            ],
            [
                'nama_pegawai' => 'Tetra Setiawan',
                'no_hp' => '083456451012',
                'email' => 'Tetra@gmail.com',
                'jabatan' => 'Pegawai',
                'kantor_id' => 2,
                'pimpinan_id' => 3,
            ],

            // Pegawai di Tambang 1
            [
                'nama_pegawai' => 'Dewi Lestari',
                'no_hp' => '084567890123',
                'email' => 'dewi@gmail.com',
                'jabatan' => 'Pegawai',
                'kantor_id' => 3,
                'pimpinan_id' => NULL,
            ],
            [
                'nama_pegawai' => 'Joko Tirta',
                'no_hp' => '088651890123',
                'email' => 'jota@gmail.com',
                'jabatan' => 'Pegawai',
                'kantor_id' => 3,
                'pimpinan_id' => 5,
            ],

            // Pegawai di Tambang 2
            [
                'nama_pegawai' => 'Eka Suci',
                'no_hp' => '085678901234',
                'email' => 'eka@gmail.com',
                'jabatan' => 'Pimpinan',
                'kantor_id' => 4,
                'pimpinan_id' => NULL,
            ],
            [
                'nama_pegawai' => 'Tanu Surya',
                'no_hp' => '085678486524',
                'email' => 'tanu@gmail.com',
                'jabatan' => 'Pegawai',
                'kantor_id' => 4,
                'pimpinan_id' => 7,
            ],

            // Pegawai di Tambang 3
            [
                'nama_pegawai' => 'Fajar Hidayat',
                'no_hp' => '086789012345',
                'email' => 'fajar@gmail.com',
                'jabatan' => 'Pimpinan',
                'kantor_id' => 5,
                'pimpinan_id' => NULL,
            ],
            [
                'nama_pegawai' => 'Dito Pratama',
                'no_hp' => '086787322345',
                'email' => 'pratama@gmail.com',
                'jabatan' => 'Pegawai',
                'kantor_id' => 5,
                'pimpinan_id' => 9,
            ],

            // Pegawai di Tambang 4
            [
                'nama_pegawai' => 'Gita Handayani',
                'no_hp' => '087890123456',
                'email' => 'gita@gmail.com',
                'jabatan' => 'Pimpinan',
                'kantor_id' => 6,
                'pimpinan_id' => NULL,
            ],
            [
                'nama_pegawai' => 'Handoko',
                'no_hp' => '087890128566',
                'email' => 'handoko@gmail.com',
                'jabatan' => 'Pegawai',
                'kantor_id' => 6,
                'pimpinan_id' => 11,
            ],

            // Pegawai di Tambang 5
            [
                'nama_pegawai' => 'Hadi Wijaya',
                'no_hp' => '088901234567',
                'email' => 'hadi@gmail.com',
                'jabatan' => 'Pimpinan',
                'kantor_id' => 7,
                'pimpinan_id' => NULL,
            ],
            [
                'nama_pegawai' => 'Syahdan',
                'no_hp' => '088907531567',
                'email' => 'syahdan@gmail.com',
                'jabatan' => 'Pegawai',
                'kantor_id' => 7,
                'pimpinan_id' => 13,
            ],

            // Pegawai di Tambang 6
            [
                'nama_pegawai' => 'Indah Puspita',
                'no_hp' => '089012345678',
                'email' => 'indah@gmail.com',
                'jabatan' => 'Pimpinan',
                'kantor_id' => 8,
                'pimpinan_id' => NULL,
            ],
            [
                'nama_pegawai' => 'Seto Adi',
                'no_hp' => '08975235678',
                'email' => 'seto@gmail.com',
                'jabatan' => 'Pegawai',
                'kantor_id' => 8,
                'pimpinan_id' => 15,
            ],
        ]);
    }
}
