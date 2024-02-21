<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatRevisiOrmawa extends Model
{
    use HasFactory;

    protected $fillable = [
        'proposal_id',
        'revisi_id',
        'judul_lama',
        'judul_hasil_revisi',
        'deskripsi_lama',
        'deskripsi_hasil_revisi',
        'file_lama',
        'file_hasil_revisi',

    ];

    public function proposal()
    {
        return $this->belongsTo(Proposal::class, 'proposal_id');
    }

    public function revisi()
    {
        return $this->belongsTo(RevisiProposal::class, 'revisi_id');
    }

}
