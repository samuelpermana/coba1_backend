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
        Schema::create('revisi_proposals', function (Blueprint $table) {
            $table->id();
            $table->text('komentar');
            $table->string('file_revisi')->nullable();
            $table->unsignedBigInteger('proposal_id');
            $table->unsignedBigInteger('revised_by');
            $table->boolean('is_revision_done_by_ormawa')->default(false);
            $table->timestamps();

            $table->foreign('proposal_id')->references('id')->on('proposal_ormawas')->onDelete('cascade');
            $table->foreign('revised_by')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('revisi_proposals');
    }
};
