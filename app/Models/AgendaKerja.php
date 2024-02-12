<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgendaKerja extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'nama',
        'status',
        'file',
        'tanggal_pelaksanaan',
    ];
}
