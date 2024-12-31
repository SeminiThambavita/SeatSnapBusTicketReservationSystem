<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'bus_route_id',
        'bus_stop_id',
        'pay_amount',
        'seat_numbers',
        'travel_date',
        'no_of_passengers',
        'name',
        'contact_number',
    ];

    protected $casts = [
        'seat_numbers' => 'array',
    ];

    public function busRoute()
    {
        return $this->belongsTo(BusRoute::class);
    }

    public function busStop()
    {
        return $this->belongsTo(BusStop::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}