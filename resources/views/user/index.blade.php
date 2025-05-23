@extends('layouts.user')

@section('content')

    @if (isset($room))
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
            <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8 p-6">
                    <div class="space-y-4">
                        <div class="relative h-[400px]">
                            <img id="main-room-image"
                                src="https://images.unsplash.com/photo-1611892440504-42a792e24d32?auto=format&fit=crop&w=800&h=500"
                                alt="Deluxe Ocean View view 1" class="w-full h-full object-cover rounded-lg">
                        </div>
                        <div id="thumbnail-gallery" class="flex space-x-2">
                            <button class="w-20 h-20 rounded-lg overflow-hidden ring-2 ring-[#4d7cfe]">
                                <img src="https://images.unsplash.com/photo-1611892440504-42a792e24d32?auto=format&fit=crop&w=800&h=500"
                                    alt="Deluxe Ocean View thumbnail 1" class="w-full h-full object-cover">
                            </button>
                            <button class="w-20 h-20 rounded-lg overflow-hidden">
                                <img src="https://images.unsplash.com/photo-1582719478250-c89cae4dc85b?auto=format&fit=crop&w=800&h=500"
                                    alt="Deluxe Ocean View thumbnail 2" class="w-full h-full object-cover">
                            </button>
                            <button class="w-20 h-20 rounded-lg overflow-hidden">
                                <img src="https://images.unsplash.com/photo-1631049307264-da0ec9d70304?auto=format&fit=crop&w=800&h=500"
                                    alt="Deluxe Ocean View thumbnail 3" class="w-full h-full object-cover">
                            </button>
                        </div>
                    </div>

                    <div class="space-y-6">
                        <div>
                            <h1 id="room-name" class="text-3xl font-semibold text-[#1e2837]">{{$room->room_name}}</h1>
                            <p id="room-type" class="text-gray-600">Suite</p>
                        </div>

                        <p id="room-description" class="text-gray-600">Luxurious suite with breathtaking ocean views and premium
                            amenities. Experience the perfect blend of comfort and sophistication in our carefully designed
                            spaces.</p>

                        <div class="grid grid-cols-2 gap-4">
                            <div class="space-y-1">
                                <p class="text-gray-500">Room Size</p>
                                <p id="room-size" class="font-medium">45 sq m</p>
                            </div>
                            <div class="space-y-1">
                                <p class="text-gray-500">Occupancy</p>
                                <p id="room-occupancy" class="font-medium">2 Adults, 2 Children</p>
                            </div>
                            <div class="space-y-1">
                                <p class="text-gray-500">Bed Type</p>
                                <p id="room-bed-type" class="font-medium">King Size</p>
                            </div>
                            <div class="space-y-1">
                                <p class="text-gray-500">{{$room->is_available ? 'Available' : 'Booked'}}</p>
                                <span id="room-status"
                                    class="px-3 py-1 rounded-full text-xs font-medium bg-[#e6f7e6] text-[#28a745]">Available</span>
                            </div>
                        </div>

                        <div class="border-t pt-6">
                            <div class="flex justify-between items-end">
                                <div>
                                    <p class="text-gray-500">Price per night</p>
                                    <p id="room-price" class="text-3xl font-semibold text-[#4d7cfe]">{{$room->price}}</p>
                                </div>
                                <button id="book-now-button"
                                    class="px-8 py-3 rounded-lg text-sm font-medium bg-[#4d7cfe] text-white hover:bg-[#3d63cb]">
                                    {{$room->is_available ? 'Available' : 'Booked'}}
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="border-t">
                    <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div>
                            <h2 class="text-xl font-semibold text-[#1e2837] mb-4">Room Features</h2>
                            <ul id="room-features" class="grid grid-cols-1 gap-2">
                                <li class="flex items-center space-x-2">
                                    <i class="fas fa-check text-[#4d7cfe]"></i><span>Floor-to-ceiling Windows</span>
                                </li>
                                <li class="flex items-center space-x-2">
                                    <i class="fas fa-check text-[#4d7cfe]"></i><span>Premium Bedding</span>
                                </li>
                                <li class="flex items-center space-x-2">
                                    <i class="fas fa-check text-[#4d7cfe]"></i><span>Marble Bathroom</span>
                                </li>
                                <li class="flex items-center space-x-2">
                                    <i class="fas fa-check text-[#4d7cfe]"></i><span>Rain Shower</span>
                                </li>
                                <li class="flex items-center space-x-2">
                                    <i class="fas fa-check text-[#4d7cfe]"></i><span>Workspace</span>
                                </li>
                            </ul>
                        </div>

                        <div>
                            <h2 class="text-xl font-semibold text-[#1e2837] mb-4">Amenities</h2>
                            <ul id="room-amenities" class="grid grid-cols-2 gap-2">
                                <li class="flex items-center space-x-2">
                                    <i class="fas fa-check text-[#4d7cfe]"></i><span>Ocean View</span>
                                </li>
                                <li class="flex items-center space-x-2">
                                    <i class="fas fa-check text-[#4d7cfe]"></i><span>Free Wi-Fi</span>
                                </li>
                                <li class="flex items-center space-x-2">
                                    <i class="fas fa-check text-[#4d7cfe]"></i><span>Mini Bar</span>
                                </li>
                                <li class="flex items-center space-x-2">
                                    <i class="fas fa-check text-[#4d7cfe]"></i><span>Room Service</span>
                                </li>
                                <li class="flex items-center space-x-2">
                                    <i class="fas fa-check text-[#4d7cfe]"></i><span>Air Conditioning</span>
                                </li>
                                <li class="flex items-center space-x-2">
                                    <i class="fas fa-check text-[#4d7cfe]"></i><span>Flat-screen TV</span>
                                </li>
                                <li class="flex items-center space-x-2">
                                    <i class="fas fa-check text-[#4d7cfe]"></i><span>Coffee Maker</span>
                                </li>
                                <li class="flex items-center space-x-2">
                                    <i class="fas fa-check text-[#4d7cfe]"></i><span>In-room Safe</span>
                                </li>
                                <li class="flex items-center space-x-2">
                                    <i class="fas fa-check text-[#4d7cfe]"></i><span>Private Balcony</span>
                                </li>
                                <li class="flex items-center space-x-2">
                                    <i class="fas fa-check text-[#4d7cfe]"></i><span>Luxury Bathroom</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="text-center bg-white rounded-lg shadow-sm p-12">
                <div class="max-w-md mx-auto space-y-8">
                    <i class="fas fa-bed text-[#4d7cfe] text-5xl"></i>

                    <div class="space-y-4">
                        <h2 class="text-2xl font-semibold text-[#1e2837]">
                            No Bookings Yet
                        </h2>
                        <p class="text-gray-600">
                            You haven't made any room bookings yet. Start your 
                            experience by exploring our available rooms and booking your
                            perfect stay.
                        </p>
                    </div>

                    <a href="{{route('user.browse')}}"
                        class="space-y-4 mt-2 bg-[#4d7cfe] text-white px-8 py-3 rounded-lg text-sm font-medium hover:bg-[#3d63cb] transition-colors">
                        Browse Available Rooms
                    </a>
                </div>
            </div>
        </div>
    @endif

@endsection