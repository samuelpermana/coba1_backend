<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomSchedule extends Model
{
    use HasFactory;
    protected $fillable = [
        'room_id',
        'date',
        'time',
        'booked_by',
        'created_at',
        'updated_at'
    ];
    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
