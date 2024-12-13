<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class kantorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kantors')->insert([
            ['nama_kantor' => 'Kantor Pusat'],
            ['nama_kantor' => 'Kantor Cabang'],
            ['nama_kantor' => 'Tambang 1'],
            ['nama_kantor' => 'Tambang 2'],
            ['nama_kantor' => 'Tambang 3'],
            ['nama_kantor' => 'Tambang 4'],
            ['nama_kantor' => 'Tambang 5'],
            ['nama_kantor' => 'Tambang 6'],
        ]);
    }
}
