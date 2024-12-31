<!DOCTYPE html>
<html>
<head>
    <title>Reservation Form</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const busRoutes = @json($busRoutes);
            const busRouteSelect = document.getElementById('bus_route_id');
            const busStopSelect = document.getElementById('bus_stop_id');
            const noOfPassengersInput = document.getElementById('no_of_passengers');
            const payAmountInput = document.getElementById('pay_amount');
            const seatNumbersDiv = document.getElementById('seat_numbers_div');

            busRouteSelect.addEventListener('change', function () {
                const selectedRouteId = this.value;
                const selectedRoute = busRoutes.find(route => route.id == selectedRouteId);

                // Clear existing options
                busStopSelect.innerHTML = '';

                // Add new options
                selectedRoute.bus_stops.forEach(busStop => {
                    const option = document.createElement('option');
                    option.value = busStop.id;
                    option.text = busStop.name;
                    option.dataset.order = busStop.order;
                    busStopSelect.appendChild(option);
                });

                // Trigger pay amount calculation
                calculatePayAmount();
            });

            noOfPassengersInput.addEventListener('input', function () {
                generateSeatInputs(this.value);
                calculatePayAmount();
            });
            busStopSelect.addEventListener('change', calculatePayAmount);

            function calculatePayAmount() {
                const noOfPassengers = noOfPassengersInput.value;
                const busStopOrder = busStopSelect.selectedOptions[0]?.dataset.order || 0;
                const payAmount = noOfPassengers * 300 * busStopOrder;
                payAmountInput.value = payAmount;
            }

            function generateSeatInputs(noOfPassengers) {
                seatNumbersDiv.innerHTML = '';
                for (let i = 1; i <= noOfPassengers; i++) {
                    const label = document.createElement('label');
                    label.setAttribute('for', `seat_number_${i}`);
                    label.innerText = `Seat Number ${i}:`;
                    label.classList.add('block', 'text-gray-700', 'text-sm', 'font-bold', 'mb-2');
                    const input = document.createElement('input');
                    input.setAttribute('type', 'number');
                    input.setAttribute('id', `seat_number_${i}`);
                    input.setAttribute('name', 'seat_numbers[]');
                    input.setAttribute('min', '1');
                    input.setAttribute('max', '40');
                    input.setAttribute('required', 'required');
                    input.classList.add('shadow', 'appearance-none', 'border', 'rounded', 'w-full', 'py-2', 'px-3', 'text-gray-700', 'leading-tight', 'focus:outline-none', 'focus:shadow-outline');
                    seatNumbersDiv.appendChild(label);
                    seatNumbersDiv.appendChild(input);
                    seatNumbersDiv.appendChild(document.createElement('br'));
                }
            }
        });
    </script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto px-4 py-8">
        <h1 class="text-3xl font-bold text-center mb-8">Reservation Form</h1>
        <form action="{{ route('reservation.submit') }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
            @csrf
            <div class="mb-4">
                <label for="bus_route_id" class="block text-gray-700 text-sm font-bold mb-2">Bus Route:</label>
                <select id="bus_route_id" name="bus_route_id" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    <option value="">Select a route</option>
                    @foreach ($busRoutes as $route)
                        <option value="{{ $route->id }}">{{ $route->route }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label for="bus_stop_id" class="block text-gray-700 text-sm font-bold mb-2">Bus Stop:</label>
                <select id="bus_stop_id" name="bus_stop_id" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                    <option value="">Select a bus stop</option>
                </select>
            </div>

            <div class="mb-4">
                <label for="travel_date" class="block text-gray-700 text-sm font-bold mb-2">Date of Travel:</label>
                <input type="date" id="travel_date" name="travel_date" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <div class="mb-4">
                <label for="no_of_passengers" class="block text-gray-700 text-sm font-bold mb-2">Number of Passengers:</label>
                <input type="number" id="no_of_passengers" name="no_of_passengers" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <div id="seat_numbers_div" class="mb-4"></div>

            <div class="mb-4">
                <label for="contact_number" class="block text-gray-700 text-sm font-bold mb-2">Contact Number:</label>
                <input type="text" id="contact_number" name="contact_number" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            <div class="mb-4">
                <label for="pay_amount" class="block text-gray-700 text-sm font-bold mb-2">Pay Amount:</label>
                <input type="text" id="pay_amount" name="pay_amount" readonly class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>

            @if ($errors->has('seat_numbers'))
                <div class="mb-4 text-red-500 text-sm">
                    {{ $errors->first('seat_numbers') }}
                </div>
            @endif

            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                    Submit
                </button>
            </div>
        </form>
    </div>
</body>
</html>