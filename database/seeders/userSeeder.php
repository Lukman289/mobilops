<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class userSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'username' => 'budi',
                'password' => bcrypt('admin1234'),
                'role' => 'admin',
                'pegawai_id' => 1,
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => 'rina',
                'password' => bcrypt('rinapassword'),
                'role' => 'validator',
                'pegawai_id' => 2,
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => 'andi',
                'password' => bcrypt('andipassword'),
                'role' => 'validator',
                'pegawai_id' => 3,
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => 'tetra',
                'password' => bcrypt('tetrapassword'),
                'role' => 'validator',
                'pegawai_id' => 4,
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        
        ]);
    }
}
