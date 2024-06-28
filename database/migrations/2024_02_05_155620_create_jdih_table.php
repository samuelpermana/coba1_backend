<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('jdih', function (Blueprint $table) {
            $table->id();
            $table->string('tahun');
            $table->unsignedBigInteger('jenis_jdih_id'); // ubah menjadi jenis_peraturan_id
            $table->string('nama_peraturan');
            $table->date('tanggal_disahkan');
            $table->text('peraturan');
            $table->string('status_peraturan');
            $table->string('file_peraturan')->nullable();
            $table->string('file_naskah')->nullable();
            $table->string('file_inventarisasi')->nullable();
            $table->boolean('is_deleted')->default(false);
            $table->timestamps();

            // Menambahkan constraint foreign key
            $table->foreign('jenis_jdih_id')->references('id')->on('jenis_jdihs');
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jdih');
    }
};
