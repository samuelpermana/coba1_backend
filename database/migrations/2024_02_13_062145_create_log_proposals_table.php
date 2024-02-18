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
        Schema::create('log_proposals', function (Blueprint $table) {
            $table->id();
            $table->string('action');
            $table->text('keterangan');
            $table->unsignedBigInteger('proposal_id');
            $table->unsignedBigInteger('revisi_id')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->foreign('proposal_id')->references('id')->on('proposal_ormawas')->onDelete('cascade');
            $table->foreign('revisi_id')->references('id')->on('revisi_proposals')->onDelete('set null');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('log_proposals');
    }
};
