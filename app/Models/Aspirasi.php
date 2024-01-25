<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Aspirasi extends Model
{
    use HasFactory;
    protected $table = 'aspirasi';  
    protected $fillable = [
        'name',
        'email',
        'angkatan',
        'id_line',
        'message',
        'tipe_aspirasi_id',
        'answer',
        'is_actived',
        'is_deleted',
        'created_at',
        'updated_at'
    ];

    public function tipe_aspirasi()
    {
        return $this->belongsTo(TipeAspirasi::class);
    }

}
