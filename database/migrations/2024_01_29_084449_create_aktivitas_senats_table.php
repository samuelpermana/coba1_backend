<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAktivitasSenatsTable extends Migration
{
    public function up()
    {
        Schema::create('aktivitas_senats', function (Blueprint $table) {
            $table->id();
            $table->string('judul');
            $table->text('isi_teks');
            $table->string('gambar')->nullable(); // Nullable if the image is optional
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('aktivitas_senats');
    }
}
