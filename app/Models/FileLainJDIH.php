<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FileLainJDIH extends Model
{
    use HasFactory;
    protected $table = 'file_jdih'; 
    protected $fillable = [
        'nama_file',
        'j_d_i_h_id'
    ];

    public function JDIH()
    {
        return $this->belongsTo(JDIH::class, 'j_d_i_h_id');
    }
}
