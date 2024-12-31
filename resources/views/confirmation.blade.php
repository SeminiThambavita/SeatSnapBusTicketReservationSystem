<!DOCTYPE html>
<html>
<head>
    <title>Booking Confirmation</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        h1 {
            color: #333;
        }
        p {
            margin: 5px 0;
        }
        .button {
            display: inline-block;
            margin: 10px 5px;
            padding: 10px 15px;
            background-color: #007BFF;
            color: white;
            text-decoration: none;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .button:hover {
            background-color: #0056b3;
        }
        .button-container {
            display: flex;
            justify-content: flex-start; /* Align buttons to the left */
            align-items: center;
            gap: 10px;
        }
        form {
            display: inline;
        }
    </style>
</head>
<body>
    <h1>Booking Confirmation</h1>
    <p><strong>Name:</strong> {{ $booking->name }}</p>
    <p><strong>Contact Number:</strong> {{ $booking->contact_number }}</p>
    <p><strong>Route:</strong> {{ $booking->busRoute->route }} - {{ $booking->busRoute->bus_type }} - {{ $booking->busRoute->departure_time }}</p>
    <p><strong>Date of Travel:</strong> {{ $booking->travel_date }}</p>
    <p><strong>Number of Passengers:</strong> {{ $booking->no_of_passengers }}</p>
    <p><strong>Seat Numbers:</strong> {{ implode(', ', $booking->seat_numbers) }}</p>
    <p><strong>Bus Stop:</strong> {{ $booking->busStop->name }}</p>
    <p><strong>Pay Amount:</strong> Rs. {{ $booking->pay_amount }}</p>

    <div class="button-container">
        <!-- Add Home Button -->
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" class="button">Home</button>
        </form>

        <!-- Add Print Button -->
        <button onclick="window.print()" class="button">Print</button>
    </div>
</body>
</html>