<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusRoute extends Model
{
    use HasFactory;

    protected $fillable = ['route', 'bus_type', 'departure_time'];

    public function busStops()
    {
        return $this->hasMany(BusStop::class)->orderBy('order');
    }
}