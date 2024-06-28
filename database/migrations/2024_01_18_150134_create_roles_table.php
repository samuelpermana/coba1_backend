<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('roles', function (Blueprint $table) {
            $table->id();
            $table->string('role_name');
            $table->string('role_slug');
        });

        // Insert default data
        DB::table('roles')->insert([
            ['id' => 1, 'role_name' => 'Administrator', 'role_slug' => 'admin'],
            ['id' => 2, 'role_name' => 'Organisasi Mahasiswa FH', 'role_slug' => 'ormawa'],
            ['id' => 3, 'role_name' => 'Pimpinan Tinggi', 'role_slug' => 'pimpinan'],
            ['id' => 4, 'role_name' => 'Komisi1', 'role_slug' => 'komisi-i'],
            ['id' => 5, 'role_name' => 'Komisi2', 'role_slug' => 'komisi-ii'],
            ['id' => 6, 'role_name' => 'Komisi3', 'role_slug' => 'komisi-iii'],
            ['id' => 7, 'role_name' => 'Komisi4', 'role_slug' => 'komisi-iv'],
            ['id' => 8, 'role_name' => 'Badan Anggaran', 'role_slug' => 'badan-anggaran'],
            ['id' => 9, 'role_name' => 'Badan Kehormatan', 'role_slug' => 'badan-kehormatan'],
            ['id' => 10, 'role_name' => 'Badan Legislasi', 'role_slug' => 'badan-legislasi'],
            ['id' => 11, 'role_name' => 'BKSAP', 'role_slug' => 'bksap'],
            ['id' => 12, 'role_name' => 'BURT', 'role_slug' => 'burt'],
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('roles');
    }
};
