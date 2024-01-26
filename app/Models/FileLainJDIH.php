<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FileLainJDIH extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_file',
        'id_jdih'
    ];

    public function JDIH()
    {

        return $this -> belongsTo(JDIH::class);
    }
}
