<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles = [
            ['id' => 1, 'role_name' => 'Administrator', 'role_slug' => 'admin'],
            ['id' => 2, 'role_name' => 'Organisasi Mahasiswa FH', 'role_slug' => 'ormawa'],
            ['id' => 3, 'role_name' => 'Pimpinan Tinggi', 'role_slug' => 'pt'],
            ['id' => 4, 'role_name' => 'Komisi', 'role_slug' => 'komisi'],
            ['id' => 5, 'role_name' => 'Badan', 'role_slug' => 'ba'],
        ];

        // Insert data into roles table
        DB::table('roles')->insert($roles);

        
    }
}
