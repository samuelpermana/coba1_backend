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
        Schema::create('riwayat_revisi_ormawas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('proposal_id');
            $table->unsignedBigInteger('revisi_id');
            $table->string('judul_lama');
            $table->string('judul_hasil_revisi')->nullable();
            $table->text('deskripsi_lama');
            $table->text('deskripsi_hasil_revisi')->nullable();
            $table->string('file_lama');
            $table->string('file_hasil_revisi')->nullable();
            $table->timestamps();

            $table->foreign('proposal_id')->references('id')->on('proposal_ormawas')->onDelete('cascade');
            $table->foreign('revisi_id')->references('id')->on('revisi_proposals')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('riwayat_revisi_ormawas');
    }
};
