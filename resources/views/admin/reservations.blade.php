<!DOCTYPE html>
<html>
<head>
    <title>Reservations</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold text-center mb-8">All Reservations</h1>
        <table class="min-w-full bg-white">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">ID</th>
                    <th class="py-2 px-4 border-b">User</th>
                    <th class="py-2 px-4 border-b">Route</th>
                    <th class="py-2 px-4 border-b">Seats</th>
                    <th class="py-2 px-4 border-b">Date</th>
                    <th class="py-2 px-4 border-b">Amount</th>
                </tr>
            </thead>
            <tbody>
                @foreach($reservations as $reservation)
                    <tr>
                        <td class="py-2 px-4 border-b">{{ $reservation->id }}</td>
                        <td class="py-2 px-4 border-b">{{ $reservation->user->name }}</td>
                        <td class="py-2 px-4 border-b">{{ $reservation->busRoute->route }}</td>
                        <td class="py-2 px-4 border-b">{{ implode(', ', $reservation->seat_numbers) }}</td>
                        <td class="py-2 px-4 border-b">{{ $reservation->travel_date }}</td>
                        <td class="py-2 px-4 border-b">{{ $reservation->pay_amount }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>