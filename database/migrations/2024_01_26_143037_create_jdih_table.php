<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJdihTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('jdih', function (Blueprint $table) {
            $table->id();
            $table->string('tahun');
            $table->string('jenis_peraturan');
            $table->string('nama_peraturan');
            $table->date('tanggal_disahkan');
            $table->text('peraturan');
            $table->string('status_peraturan');
            $table->string('file_peraturan');
            $table->string('file_naskah')->nullable();
            $table->string('file_inventarisasi')->nullable();
            $table->string('file_lainnya')->nullable();
            $table->boolean('is_deleted')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jdih');
    }
}
