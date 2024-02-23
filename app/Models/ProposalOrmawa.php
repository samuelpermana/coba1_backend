<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProposalOrmawa extends Model
{
    use HasFactory;

    protected $fillable = [
        'judul',
        'deskripsi',
        'file_proposal',
        'status',
        'status_persetujuan',
        'created_by',
        'komisi_checked_by',
        'tipe',
        'approved_at',
        'is_checked',
        'file_final'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function createdBy()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function komisiCheckedBy()
    {
        return $this->belongsTo(User::class, 'komisi_checked_by');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'created_by');
    }
}
