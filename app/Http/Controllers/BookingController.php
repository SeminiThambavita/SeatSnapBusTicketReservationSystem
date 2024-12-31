<?php

namespace App\Http\Controllers;

use App\Models\BusRoute;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Show the reservation form.
     */
    public function create()
    {
        $routes = BusRoute::all();
        return view('reservation', compact('routes'));
    }

    /**
     * Store a new booking.
     */
    public function store(Request $request)
    {
        // Validate the incoming request data
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'contact_number' => 'required|string|max:15',
            'number_of_seats' => 'required|integer|min=1',
            'route_id' => 'required|exists:bus_routes,id',
            'seat_numbers' => 'required|string',
            'travel_date' => 'required|date',
        ]);

        // Fetch the selected route
        $route = BusRoute::find($request->route_id);

        // Calculate the total payment amount (assuming a fixed rate of 200 per seat)
        $payAmount = $request->number_of_seats * 200;

        // Create a new booking
        $booking = Booking::create([
            'name' => $request->name,
            'address' => $request->address,
            'contact_number' => $request->contact_number,
            'number_of_seats' => $request->number_of_seats,
            'pay_amount' => $payAmount,
            'route_details' => $route->route . ', ' . $route->bus_type . ', ' . $route->departure_time,
            'seat_numbers' => $request->seat_numbers,
            'travel_date' => $request->travel_date,
        ]);

        // Redirect to a confirmation view with the booking details
        return view('confirmation', compact('booking'));
    }
}
