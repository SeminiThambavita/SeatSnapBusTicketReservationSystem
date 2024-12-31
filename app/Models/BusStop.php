<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusStop extends Model
{
    use HasFactory;

    protected $fillable = ['bus_route_id', 'name', 'order'];

    public function busRoute()
    {
        return $this->belongsTo(BusRoute::class);
    }
}