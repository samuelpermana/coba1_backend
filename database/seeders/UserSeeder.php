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
        User::create([
            'name' => 'Admin SM FH Undip',
            'email' => 'bksap24cmswebsite@gmail.com',
            'password' => Hash::make('password'),
            'role_id' => 1,
        ]);
        User::create([
            'name' => 'Pimpinan Tinggi SMFH',
            'email' => 'senatmahasiswa.fhundip@gmail.com',
            'password' => Hash::make('password'),
            'role_id' => 3,
        ]);
        User::create([
            'name' => 'Komisi I SM FH Undip',
            'email' => 'komisi1aryawiraraja2024@gmail.com',
            'password' => Hash::make('password'),
            'role_id' => 4,
        ]);
        User::create([
            'name' => 'Komisi II SM FH Undip',
            'email' => 'komisi2smfhundip24@gmail.com',
            'password' => Hash::make('password'),
            'role_id' => 5,
        ]);
        User::create([
            'name' => 'Komisi III SM FH Undip',
            'email' => 'komisi3senatfh@gmail.com',
            'password' => Hash::make('password'),
            'role_id' => 6,
        ]);
        User::create([
            'name' => 'Komisi IV SM FH Undip',
            'email' => 'komisi4smfhundip@gmail.com',
            'password' => Hash::make('password'),
            'role_id' => 7,
        ]);
        User::create([
            'name' => 'Badan Anggaran',
            'email' => 'badananggaransenatfh@gmail.com',
            'password' => Hash::make('password'),
            'role_id' => 8,
        ]);

        User::create([
            'name' => 'Badan Kehormatan',
            'email' => 'bksmfhundip@gmail.com',
            'password' => Hash::make('password'),
            'role_id' => 9,
        ]);
        User::create([
            'name' => 'Badan Legislasi',
            'email' => 'smfhundipbadanlegislasi@gmail.com',
            'password' => Hash::make('password'),
            'role_id' => 10,
        ]);
        User::create([
            'name' => 'BKSAP',
            'email' => 'bksapsmfhundip24@gmail.com',
            'password' => Hash::make('password'),
            'role_id' => 11,
        ]);
        User::create([
            'name' => 'BURT',
            'email' => 'burtsmfh24@gmail.com',
            'password' => Hash::make('password'),
            'role_id' => 12,
        ]);

        User::create([
            'name' => 'Badan Eksekutif Mahasiswa FH Undip Tahun 2024',
            'email' => 'bemfhundip2024@gmail.com',
            'password' => Hash::make('password'),
            'role_id' => 2,
        ]);
        
        User::create([
            'name' => 'Minat dan Bakat BEM FH',
            'email' => 'mikatbemfhundip2024@gmail.com',
            'password' => Hash::make('password'),
            'role_id' => 2,
        ]);
        
        User::create([
            'name' => 'Karir dan Profesi BEM FH',
            'email' => 'kaprobemfhundip2024@gmail.com',
            'password' => Hash::make('password'),
            'role_id' => 2,
        ]);
        
        User::create([
            'name' => 'Pemberdayaan Perempuan BEM FH',
            'email' => 'ppbemfhundip2024@gmail.com',
            'password' => Hash::make('password'),
            'role_id' => 2,
        ]);
        
        User::create([
            'name' => 'Hubungan antar Lembaga dan Masyarakat BEM FH Undip',
            'email' => 'halmasbemfhundip2024@gmail.com',
            'password' => Hash::make('password'),
            'role_id' => 2,
        ]);
        
        User::create([
            'name' => 'Riset dan Keilmuan BEM FH Undip',
            'email' => 'riskelbemfhundip@gmail.com',
            'password' => Hash::make('password'),
            'role_id' => 2,
        ]);
        
        User::create([
            'name' => 'Advokesma BEM FH Undip',
            'email' => 'Advokesmabemfhundip2024@gmail.com',
            'password' => Hash::make('password'),
            'role_id' => 2,
        ]);
        
        User::create([
            'name' => 'Ekonomi dan Kreatif BEM FH Undip',
            'email' => 'ekotifbemfhundip2024@gmail.com',
            'password' => Hash::make('password'),
            'role_id' => 2,
        ]);
        
        User::create([
            'name' => 'Tim Penjamin Mutu Organisasi BEM FH Undip',
            'email' => 'tpmobemfhundip@gmail.com',
            'password' => Hash::make('password'),
            'role_id' => 2,
        ]);
        
        User::create([
            'name' => 'Pengembangan Sumber Daya Mahasiswa BEM FH Undip',
            'email' => 'psdmbemfhundip2024@gmail.com',
            'password' => Hash::make('password'),
            'role_id' => 2,
        ]);
        
        User::create([
            'name' => 'Hubungan Sosial dan Politik BEM FH Undip',
            'email' => 'hspbemfhundip@gmail.com',
            'password' => Hash::make('password'),
            'role_id' => 2,
        ]);
        
        User::create([
            'name' => 'Kantor Media dan Informasi BEM FH Undip',
            'email' => 'kmibemfhundip2024@gmail.com',
            'password' => Hash::make('password'),
            'role_id' => 2,
        ]);
        
        User::create([
            'name' => 'Pengabdian Masyarakat BEM FH Undip',
            'email' => 'dimasbemfhundip@gmail.com',
            'password' => Hash::make('password'),
            'role_id' => 2,
        ]);
        
        User::create([
            'name' => 'UKM-F Kelompok Riset dan Debat FH Undip Tahun 2024',
            'email' => 'krd.undip@gmail.com',
            'password' => Hash::make('password'),
            'role_id' => 2,
        ]);
        
        User::create([
            'name' => 'UKM-F Pseudorechtspraak FH Undip Tahun 2024',
            'email' => 'pseudofhundip@gmail.com',
            'password' => Hash::make('password'),
            'role_id' => 2,
        ]);
        
        User::create([
            'name' => 'UKM-F Asian Law Students Association Local Chapter Undip Tahun 2024',
            'email' => 'alsaundip@gmail.com',
            'password' => Hash::make('password'),
            'role_id' => 2,
        ]);
        
        User::create([
            'name' => 'UKM-F Kelompok Studi Hukum Islam FH Undip Tahun 2024',
            'email' => 'kshiundip@gmail.com',
            'password' => Hash::make('password'),
            'role_id' => 2,
        ]);
        
        User::create([
            'name' => 'UKM-F Kelompok Studi Bahasa Asing FH Undip Tahun 2024',
            'email' => 'ksbafhundipofficial@gmail.com',
            'password' => Hash::make('password'),
            'role_id' => 2,
        ]);
        
        User::create([
            'name' => 'UKM-F Paduan Suara Mahasiswa Satya Dharma Gita FH Undip Tahun 2024',
            'email' => 'sdg.choir2002@gmail.com',
            'password' => Hash::make('password'),
            'role_id' => 2,
        ]);
        
        User::create([
            'name' => 'UKM-F Bola FH Undip Tahun 2024',
            'email' => 'bolafhundip@gmail.com',
            'password' => Hash::make('password'),
            'role_id' => 2,
        ]);
        
        User::create([
            'name' => 'UKM-F Basket FH Undip Tahun 2024',
            'email' => 'basketfhundip01@gmail.com',
            'password' => Hash::make('password'),
            'role_id' => 2,
        ]);
        
        User::create([
            'name' => 'UKM-F Bela Diri FH Undip Tahun 2024',
            'email' => 'beladirifhundip@gmail.com',
            'password' => Hash::make('password'),
            'role_id' => 2,
        ]);
        
        User::create([
            'name' => 'UKM-F Persekutuan Mahasiswa Kristen FH Undip Tahun 2024',
            'email' => 'fhpmkundip@gmail.com',
            'password' => Hash::make('password'),
            'role_id' => 2,
        ]);
        
        User::create([
            'name' => 'UKM-F Pelayanan Rohani Mahasiswa Katolik FH Undip Tahun 2024',
            'email' => 'prmkfhundip@gmail.com',
            'password' => Hash::make('password'),
            'role_id' => 2,
        ]);
        
        User::create([
            'name' => 'UKM-F Nebula Indonesia FH Undip Tahun 2024',
            'email' => 'nebulaindonesia.2024@gmail.com',
            'password' => Hash::make('password'),
            'role_id' => 2,
        ]);
        
        User::create([
            'name' => 'UKM-F Teater Themis FH Undip Tahun 2024',
            'email' => 'kesekretariatanteaterthemis@gmail.com',
            'password' => Hash::make('password'),
            'role_id' => 2,
        ]);
        
        User::create([
            'name' => 'UKM-F Koordinator Kegiatan Islam FH Undip Tahun 2024',
            'email' => 'kki.fh.unfip@gmail.com',
            'password' => Hash::make('password'),
            'role_id' => 2,
        ]);
        
        User::create([
            'name' => 'UKM-F Kelompok Diskusi Kelas Sosial FH Undip Tahun 2024',
            'email' => 'official.kdksfhundip@gmail.com',
            'password' => Hash::make('password'),
            'role_id' => 2,
        ]);
        
        User::create([
            'name' => 'UKM-F LPM Gema Keadilan FH Undip Tahun 2024',
            'email' => 'lpmgemakeadilan2024@gmail.com',
            'password' => Hash::make('password'),
            'role_id' => 2,
        ]);
        User::create([
            'name' => 'Senat Mahasiswa FH Undip Tahun 2024 ',
            'email' => 'senatfhundip24@gmail.com',
            'password' => Hash::make('password'),
            'role_id' => 2,
        ]);
    
    }
}
