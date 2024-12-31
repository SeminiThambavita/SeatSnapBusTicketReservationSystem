<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SeatSnap Bus Ticket Reservation System</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            background-image: url('{{ asset('bus interior.jpg') }}');
            background-size: cover;
            background-position: center;
        }
        .overlay {
            background-color: rgba(30, 58, 138, 0.75); /* Semi-transparent indigo-900 */
            padding: 20px;
            border-radius: 10px;
        }
    </style>
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex flex-col justify-center items-center">
        <div class="overlay text-center">
            <h1 class="text-4xl font-bold mb-8 text-white">SeatSnap Bus Ticket Reservation System</h1>
            <div>
                <a href="{{ route('login') }}" class="bg-blue-500 text-white px-4 py-2 rounded mr-4">Login</a>
                <a href="{{ route('register') }}" class="bg-green-500 text-white px-4 py-2 rounded">Register</a>
            </div>
        </div>
    </div>
</body>
</html>