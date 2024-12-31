<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;

class AdminController extends Controller
{
    public function index()
    {
        $reservations = Booking::all();
        return view('admin.dashboard', compact('reservations'));
    }

    public function reservations()
    {
        $reservations = Booking::all();
        return view('admin.reservations', compact('reservations'));
    }

    // Method to update a reservation
    public function updateReservation(Request $request, $id)
    {
        // Find the reservation by ID
        $reservation = Booking::findOrFail($id);

        // Validate the input data
        $validatedData = $request->validate([
            'travel_date' => 'nullable|date',
            'bus_route_id' => 'nullable|exists:bus_routes,id',
            'bus_stop_id' => 'nullable|exists:bus_stops,id',
            'no_of_passengers' => 'nullable|integer|min:1',
            'seat_numbers' => 'nullable|array',
            'seat_numbers.*' => 'string',
            'pay_amount' => 'nullable|numeric|min:1',
        ]);

        // Update the reservation data
        $reservation->update($validatedData);

        // Redirect or return response after update
        return redirect()->route('admin.reservations')->with('success', 'Reservation updated successfully!');
    }

    // Method to delete a reservation
    public function deleteReservation($id)
    {
        // Find the reservation by ID
        $reservation = Booking::findOrFail($id);

        // Delete the reservation
        $reservation->delete();

        // Redirect or return response after deletion
        return redirect()->route('admin.reservations')->with('success', 'Reservation deleted successfully!');
    }
}
