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
                'role_id' => 2, // Sesuaikan dengan id role Ormawa
            ]);
        }

        // Seeder untuk membuat 1 akun Pimpinan Tinggi
        User::create([
            'name' => 'Pimpinan Tinggi',
            'email' => 'pimpinantinggi@example.com',
            'password' => Hash::make('password'),
            'role_id' => 3, // Sesuaikan dengan id role Pimpinan Tinggi
        ]);

        // Seeder untuk membuat 5 akun komisi
        $komisiNames = ['Komisi 1', 'Komisi 2', 'Komisi 3', 'Komisi 4', 'Badan Anggaran'];
        foreach ($komisiNames as $komisiName) {
            User::create([
                'name' => $komisiName,
                'email' => strtolower(str_replace(' ', '', $komisiName)) . '@example.com',
                'password' => Hash::make('password'),
                'role_id' => 4, // Sesuaikan dengan id role Komisi
            ]);
        }

        // Seeder untuk membuat 3 akun badan
        $badanNames = ['Badan Kehormatan', 'Badan Legislasi', 'BKSAP'];
        foreach ($badanNames as $badanName) {
            User::create([
                'name' => $badanName,
                'email' => strtolower(str_replace(' ', '', $badanName)) . '@example.com',
                'password' => Hash::make('password'),
                'role_id' => 5, // Sesuaikan dengan id role Badan
            ]);
        }
    
    }
}
