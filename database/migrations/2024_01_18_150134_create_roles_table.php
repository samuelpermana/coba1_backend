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
            ['id' => 3, 'role_name' => 'Pimpinan Tinggi', 'role_slug' => 'pt'],
            ['id' => 4, 'role_name' => 'Komisi', 'role_slug' => 'komisi'],
            ['id' => 5, 'role_name' => 'Badan Anggaran', 'role_slug' => 'ba'],
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('roles');
    }
};
