<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('bus_route_id');
            $table->unsignedBigInteger('bus_stop_id'); // Keep this line
            $table->string('name');
            $table->string('contact_number');
            $table->decimal('pay_amount', 8, 2);
            $table->string('seat_numbers');
            $table->date('travel_date');
            $table->integer('no_of_passengers');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('bus_route_id')->references('id')->on('bus_routes')->onDelete('cascade');
            $table->foreign('bus_stop_id')->references('id')->on('bus_stops')->onDelete('cascade'); // Keep this line
        });
    }

    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}