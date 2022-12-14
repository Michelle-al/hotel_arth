<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    //    To stop Laravel from creating updated_at and created_at fields while populating the db with a seeder
    public $timestamps = false;

    public $fillable = [
        'room_number',
        'style',
        'price',
    ];

    /**
     * Get reservations that owns the rooms
     */
    public function hasReservation()
    {
        return $this->belongsTo(ReservationRoom::class);
    }
}
