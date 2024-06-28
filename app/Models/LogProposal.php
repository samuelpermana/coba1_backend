<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LogProposal extends Model
{
    use HasFactory;

    protected $fillable = [
        'action',
        'keterangan',
        'proposal_id',
        'revisi_id',
        'user_id',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function proposal()
    {
        return $this->belongsTo(Proposal::class);
    }

    public function revisi()
    {
        return $this->belongsTo(RevisiProposal::class, 'revisi_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
