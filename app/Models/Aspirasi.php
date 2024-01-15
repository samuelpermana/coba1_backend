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
        'message',
        'is_deleted',
    ];
}
