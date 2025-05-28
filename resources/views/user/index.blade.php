@extends('layouts.user')

@section('content')

    @if (isset($rooms) && count($rooms) > 0)
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach ($rooms as $room)
                    <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                        <div class="relative h-60">
                            <img src="{{ $room->main_image ?? 'https://via.placeholder.com/400x300' }}" alt="Room Image"
                                class="w-full h-full object-cover rounded-t-lg">
                        </div>
                        <div class="p-6 space-y-4">
                            <div>
                                <h2 class="text-xl font-semibold text-[#1e2837]">{{ $room->room_name }}</h2>
                                <p class="text-gray-600">{{ $room->type ?? 'Suite' }}</p>
                            </div>
                            <p class="text-gray-600 text-sm">{{ $room->description ?? 'No description provided.' }}</p>

                            <div class="text-sm text-gray-600">
                                <p><strong>Size:</strong> {{ $room->size ?? 'N/A' }}</p>
                                <p><strong>Occupancy:</strong> {{ $room->occupancy ?? 'N/A' }}</p>
                                <p><strong>Bed Type:</strong> {{ $room->bed_type ?? 'N/A' }}</p>
                            </div>

                            <div class="flex justify-between items-center">
                                <div>
                                    <p class="text-gray-500 text-sm">Price per night</p>
                                    <p class="text-xl font-semibold text-[#4d7cfe]">{{ $room->price }}</p>
                                </div>
                                <span class="px-3 py-1 rounded-full text-xs font-medium 
                                            {{ $room->is_available ? 'bg-[#e6f7e6] text-[#28a745]' : 'bg-red-100 text-red-600' }}">
                                    {{ $room->is_available ? 'Available' : 'Booked' }}
                                </span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    @else
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="text-center bg-white rounded-lg shadow-sm p-12">
                <div class="max-w-md mx-auto space-y-8">
                    <i class="fas fa-bed text-[#4d7cfe] text-5xl"></i>
                    <div class="space-y-4">
                        <h2 class="text-2xl font-semibold text-[#1e2837]">No Bookings Yet</h2>
                        <p class="text-gray-600">
                            You haven't made any room bookings yet. Start your experience by exploring our available rooms and
                            booking your perfect stay.
                        </p>
                    </div>
                    <a href="{{ route('user.browse') }}"
                        class="bg-[#4d7cfe] text-white px-8 py-3 rounded-lg text-sm font-medium hover:bg-[#3d63cb] transition-colors">
                        Browse Available Rooms
                    </a>
                </div>
            </div>
        </div>
    @endif

@endsection