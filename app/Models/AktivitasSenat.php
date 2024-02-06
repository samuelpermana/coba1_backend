<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AktivitasSenat extends Model
{
    use HasFactory;

    protected $table = 'aktivitas_senats';
    protected $fillable = [
        'judul',
        'isi_teks',
        'gambar',
    ];
}
