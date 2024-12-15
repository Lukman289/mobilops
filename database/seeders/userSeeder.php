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
                'username' => 'andi',
                'password' => bcrypt('andipassword'),
                'role' => 'validator',
                'pegawai_id' => 3,
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => 'dewi',
                'password' => bcrypt('dewipassword'),
                'role' => 'validator',
                'pegawai_id' => 5,
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => 'eka',
                'password' => bcrypt('ekapassword'),
                'role' => 'validator',
                'pegawai_id' => 7,
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => 'fajar',
                'password' => bcrypt('fajarpassword'),
                'role' => 'validator',
                'pegawai_id' => 9,
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => 'gita',
                'password' => bcrypt('gitapassword'),
                'role' => 'validator',
                'pegawai_id' => 11,
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => 'hadi',
                'password' => bcrypt('hadipassword'),
                'role' => 'validator',
                'pegawai_id' => 13,
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'username' => 'indah',
                'password' => bcrypt('indahpassword'),
                'role' => 'validator',
                'pegawai_id' => 15,
                'remember_token' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        
        ]);
    }
}
