<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'hostel_id', 'check_in_date', 'check_out_date', 'room_type', 'occupants', 'status'];

    // Define the relationship with the user who made the booking
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Define the relationship with the hostel associated with the booking
    public function hostel()
    {
        return $this->belongsTo(Hostel::class);
    }
}
