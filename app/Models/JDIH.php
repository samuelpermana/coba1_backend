<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JDIH extends Model
{
    use HasFactory;

    protected $table = 'jdih'; // sesuaikan dengan nama tabel yang benar

    protected $fillable = [
        'tahun',
        'jenis_jdih_id', 
        'nama_peraturan',
        'tanggal_disahkan',
        'peraturan',
        'status_peraturan',
        'file_peraturan',
        'file_naskah',
        'file_inventarisasi',
        'is_deleted',
    ];

    public function jenisPeraturan()
    {
        return $this->belongsTo(JenisJdih::class, 'jenis_jdih_id');
    }

    public function file_lain()
    {
        return $this->hasMany(FileLainJDIH::class);
    }
}
