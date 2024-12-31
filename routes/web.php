<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\AdminController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckRole;  // Import the custom middleware

// Existing routes ...

Route::get('/', function () {
    return view('home');
})->name('home');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Reservation routes
Route::middleware('auth')->group(function () {
    Route::get('/reservation', [ReservationController::class, 'showForm'])->name('reservation.form');
    Route::post('/reservation', [ReservationController::class, 'submitForm'])->name('reservation.submit');
});

// Profile routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin routes (with role-based protection using CheckRole middleware)
Route::middleware(['auth', 'role:admin'])->group(function () {  // Use 'role' here instead of 'checkrole'
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/admin/reservations', [AdminController::class, 'reservations'])->name('admin.reservations');
    
    // PUT route for updating a reservation
    Route::put('/admin/reservations/{id}', [AdminController::class, 'updateReservation'])->name('admin.reservation.update');

    // DELETE route for deleting a reservation
    Route::delete('/admin/reservations/{id}', [AdminController::class, 'deleteReservation'])->name('admin.reservation.delete');
});

require __DIR__.'/auth.php';
