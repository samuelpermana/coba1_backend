<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JDIH extends Model
{
    use HasFactory;
    protected $table = 'JDIH';  
    protected $fillable = [
        'tahun',
        'jenis_peraturan',
        'nama_peraturan',
        'tanggal_disahkan',
        'peraturan',
        'status_peraturan',
        'file_peraturan',
        'file_naskah',
        'file_inventarisasi',
        'file_lainnya',
        'is_deleted',
        'created_at',
        'updated_at'
    ];
}
