<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\BusStop;

class BusStopsTableSeeder extends Seeder
{
    public function run()
    {
        // Delete existing records
        DB::table('bus_stops')->delete();

        // Route 1
        BusStop::create([
            'bus_route_id' => 1,
            'name' => 'Kelaniya',
            'order' => 1,
        ]);
        BusStop::create([
            'bus_route_id' => 1,
            'name' => 'Kiribathgoda',
            'order' => 2,
        ]);
        BusStop::create([
            'bus_route_id' => 1,
            'name' => 'Kandy',
            'order' => 3,
        ]);

        // Route 2
        BusStop::create([
            'bus_route_id' => 2,
            'name' => 'Matara',
            'order' => 1,
        ]);
        BusStop::create([
            'bus_route_id' => 2,
            'name' => 'Trincomalee',
            'order' => 2,
        ]);
        BusStop::create([
            'bus_route_id' => 2,
            'name' => 'Jaffna',
            'order' => 3,
        ]);

        // Route 3
        BusStop::create([
            'bus_route_id' => 3,
            'name' => 'Moratuwa',
            'order' => 1,
        ]);
        BusStop::create([
            'bus_route_id' => 3,
            'name' => 'Kalutara',
            'order' => 2,
        ]);
        BusStop::create([
            'bus_route_id' => 3,
            'name' => 'Galle',
            'order' => 3,
        ]);

        // Route 4
        BusStop::create([
            'bus_route_id' => 4,
            'name' => 'Peradeniya',
            'order' => 1,
        ]);
        BusStop::create([
            'bus_route_id' => 4,
            'name' => 'Hatton',
            'order' => 2,
        ]);
        BusStop::create([
            'bus_route_id' => 4,
            'name' => 'Nuwara Eliya',
            'order' => 3,
        ]);

        // Route 5
        BusStop::create([
            'bus_route_id' => 5,
            'name' => 'Kilinochchi',
            'order' => 1,
        ]);
        BusStop::create([
            'bus_route_id' => 5,
            'name' => 'Vavuniya',
            'order' => 2,
        ]);
        BusStop::create([
            'bus_route_id' => 5,
            'name' => 'Trincomalee',
            'order' => 3,
        ]);

        // Route 6
        BusStop::create([
            'bus_route_id' => 6,
            'name' => 'Mihintale',
            'order' => 1,
        ]);
        BusStop::create([
            'bus_route_id' => 6,
            'name' => 'Habarana',
            'order' => 2,
        ]);
        BusStop::create([
            'bus_route_id' => 6,
            'name' => 'Polonnaruwa',
            'order' => 3,
        ]);
    }
}