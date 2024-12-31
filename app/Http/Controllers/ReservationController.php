<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\BusRoute;
use App\Models\BusStop;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    public function showForm()
    {
        $busRoutes = BusRoute::with('busStops')->get();
        return view('reservation', compact('busRoutes'));
    }

    public function submitForm(Request $request)
    {
        $request->validate([
            'bus_route_id' => 'required|exists:bus_routes,id',
            'bus_stop_id' => 'required|exists:bus_stops,id',
            'no_of_passengers' => 'required|integer|min:1',
            'seat_numbers' => 'required|array|min:1',
            'seat_numbers.*' => 'required|integer|min:1|max:40|distinct',
            'travel_date' => 'required|date',
            'contact_number' => 'required|string|max:15',
        ]);

        // Check for already booked seats
        $bookedSeats = Booking::where('bus_route_id', $request->bus_route_id)
            ->where('travel_date', $request->travel_date)
            ->pluck('seat_numbers')
            ->flatten()
            ->toArray();

        $requestedSeats = $request->seat_numbers;
        $alreadyBookedSeats = [];
        foreach ($requestedSeats as $seat) {
            if (in_array($seat, $bookedSeats)) {
                $alreadyBookedSeats[] = $seat;
            }
        }

        if (!empty($alreadyBookedSeats)) {
            return back()->withErrors(['seat_numbers' => 'The following seats are already booked: ' . implode(', ', $alreadyBookedSeats)])->withInput();
        }

        // Calculate the pay amount
        $busStop = BusStop::find($request->bus_stop_id);
        $payAmount = 300 * $busStop->order * $request->no_of_passengers;

        // Create a new booking
        $booking = new Booking();
        $booking->user_id = Auth::id();
        $booking->bus_route_id = $request->bus_route_id;
        $booking->bus_stop_id = $request->bus_stop_id;
        $booking->pay_amount = $payAmount;
        $booking->seat_numbers = $request->seat_numbers;
        $booking->travel_date = $request->travel_date;
        $booking->no_of_passengers = $request->no_of_passengers;
        $booking->name = Auth::user()->name;
        $booking->contact_number = $request->contact_number;
        $booking->save();

        // Redirect to the confirmation page with the booking details
        return view('confirmation', ['booking' => $booking]);
    }
}