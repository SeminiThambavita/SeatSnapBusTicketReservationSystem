<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\BusRoute;

class BusRouteSeeder extends Seeder
{
    public function run(): void
    {
        BusRoute::create([
            'route' => 'Colombo to Kandy',
            'bus_type' => 'Luxury',
            'departure_time' => '08:00:00',
        ]);

        BusRoute::create([
            'route' => 'Galle to Jaffna',
            'bus_type' => 'Semi-Luxury',
            'departure_time' => '06:30:00',
        ]);

        // Add more routes
        BusRoute::create([
            'route' => 'Colombo to Galle',
            'bus_type' => 'Luxury',
            'departure_time' => '07:00:00',
        ]);

        BusRoute::create([
            'route' => 'Kandy to Nuwara Eliya',
            'bus_type' => 'Semi-Luxury',
            'departure_time' => '09:00:00',
        ]);

        BusRoute::create([
            'route' => 'Jaffna to Trincomalee',
            'bus_type' => 'Luxury',
            'departure_time' => '05:00:00',
        ]);

        BusRoute::create([
            'route' => 'Anuradhapura to Polonnaruwa',
            'bus_type' => 'Semi-Luxury',
            'departure_time' => '10:00:00',
        ]);
    }
}