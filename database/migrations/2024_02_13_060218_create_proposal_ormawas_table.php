<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('proposal_ormawas', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->text('deskripsi');
            $table->string('file_proposal');
            $table->boolean('is_checked')->default(false);
            $table->enum('tipe', ['pengajuan', 'revisi'])->default('pengajuan');
            $table->enum('status', ['admin', 'komisi', 'badan anggaran', 'sekjen'])->default('admin');
            $table->enum('status_persetujuan', ['pending', 'direvisi', 'rejected', 'approved'])->default('pending');
            $table->unsignedBigInteger('created_by');
            $table->unsignedBigInteger('komisi_checked_by')->nullable();
            $table->timestamp('approved_at')->nullable();
            $table->timestamps();
            $table->string('file_final_sekjen')->nullable();
            $table->string('file_final')->nullable();
            $table->foreign('created_by')->references('id')->on('users');
            $table->foreign('komisi_checked_by')->references('id')->on('users');
            

        });
    }
    public function down(): void
    {
        Schema::dropIfExists('proposal_ormawas');
    }
};
