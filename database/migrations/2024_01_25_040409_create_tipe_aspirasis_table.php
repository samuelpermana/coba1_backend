<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTipeAspirasisTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tipe_aspirasis', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Menambahkan kolom name untuk menyimpan nilai Sarpras, Birokrasi, Akademik
            $table->timestamps();
        });

        // Insert data
        DB::table('tipe_aspirasis')->insert([
            ['name' => 'Sarpras'],
            ['name' => 'Birokrasi'],
            ['name' => 'Akademik'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tipe_aspirasis');
    }
}
