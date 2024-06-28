<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('jenis_jdihs', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->timestamps();
        });

        // Insert data
        DB::table('jenis_jdihs')->insert([
            ['name' => 'Konstitusi'],
            ['name' => 'Peraturan Mahasiswa'],
            ['name' => 'Standard Operating Procedure'],
            ['name' => 'Peraturan Senat Mahasiswa'],
            ['name' => 'Keputusan'],
            ['name' => 'Rancangan Peraturan'],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jenis_jdihs');
    }
};
