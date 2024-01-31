<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('file_jdih', function (Blueprint $table) {
            $table->id();
            $table->string('nama_file');
            $table->unsignedBigInteger('j_d_i_h_id');
            $table->timestamps();

            $table->foreign('j_d_i_h_id')->references('id')->on('jdih')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('file_jdih');
    }
};
