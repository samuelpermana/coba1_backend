<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // User::create([
        //     'name' => 'Admin',
        //     'email' => 'adminsmfh@gmail.com',
        //     'password' => Hash::make('adminFH12!'),
        //     'role_id' => 1,
        // ]);


        // Seeder untuk membuat 18 akun ormawa
        for ($i = 1; $i <= 18; $i++) {
            User::create([
                'name' => 'ORMAWA ' . $i,
                'email' => 'ormawa' . $i . '@example.com',
                'password' => Hash::make('password'),
                'role_id' => 2, 
            ]);
        }

        // Seeder untuk membuat 1 akun Pimpinan Tinggi
        User::create([
            'name' => 'Pimpinan Tinggi',
            'email' => 'pimpinantinggi@example.com',
            'password' => Hash::make('password'),
            'role_id' => 3, // Sesuaikan dengan id role Pimpinan Tinggi
        ]);

        $roles = [
            ['id' => 4, 'role_name' => 'Komisi1', 'role_slug' => 'komisi-i'],
            ['id' => 5, 'role_name' => 'Komisi2', 'role_slug' => 'komisi-ii'],
            ['id' => 6, 'role_name' => 'Komisi3', 'role_slug' => 'komisi-iii'],
            ['id' => 7, 'role_name' => 'Komisi4', 'role_slug' => 'komisi-iv'],
            ['id' => 8, 'role_name' => 'Badan Anggaran', 'role_slug' => 'badan-anggaran'],
            ['id' => 9, 'role_name' => 'Badan Kehormatan', 'role_slug' => 'badan-kehormatan'],
            ['id' => 10, 'role_name' => 'Badan Legislasi', 'role_slug' => 'badan-legislasi'],
            ['id' => 11, 'role_name' => 'BKSAP', 'role_slug' => 'bksap'],
        ];

        foreach ($roles as $role) {
            User::create([
                'name' => $role['role_name'],
                'email' => strtolower($role['role_slug']) . '@example.com',
                'password' => Hash::make('password'),
                'role_id' => $role['id'],
            ]);
        }
    
    }
}
