<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight text-center">
            {{ __('Admin Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 text-center">
                    {{ __("Welcome to the Admin Dashboard!") }}
                </div>
                <div class="p-6">
                    <h3 class="font-semibold text-2xl text-gray-800 leading-tight text-center mb-6">
                        {{ __('All Reservations') }}
                    </h3>
                    <div class="overflow-x-auto">
                        <table class="min-w-full bg-white border border-gray-200 mx-auto">
                            <thead>
                                <tr>
                                    <th class="py-2 px-4 border-b">ID</th>
                                    <th class="py-2 px-4 border-b">User</th>
                                    <th class="py-2 px-4 border-b">Date</th>
                                    <th class="py-2 px-4 border-b">Route</th>
                                    <th class="py-2 px-4 border-b">Number of Seats</th>
                                    <th class="py-2 px-4 border-b">Seat Numbers</th>
                                    <th class="py-2 px-4 border-b">Bus Stop</th>
                                    <th class="py-2 px-4 border-b">Pay Amount</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($reservations as $reservation)
                                    <tr>
                                        <td class="py-2 px-4 border-b">{{ $reservation->id }}</td>
                                        <td class="py-2 px-4 border-b">{{ $reservation->user->name }}</td>
                                        <td class="py-2 px-4 border-b">{{ $reservation->travel_date ?? 'N/A' }}</td>
                                        <td class="py-2 px-4 border-b">{{ $reservation->busRoute->route ?? 'N/A' }}</td>
                                        <td class="py-2 px-4 border-b">{{ $reservation->no_of_passengers ?? 'N/A' }}</td>
                                        <td class="py-2 px-4 border-b">{{ implode(', ', $reservation->seat_numbers) }}</td>
                                        <td class="py-2 px-4 border-b">{{ $reservation->busStop->name ?? 'N/A' }}</td>
                                        <td class="py-2 px-4 border-b">{{ $reservation->pay_amount }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <!-- Add Home Button -->
                    <div class="mt-4 text-center">
                        <a href="{{ route('home') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Home
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>