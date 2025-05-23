@extends('layouts.user')
@push('styles')
    <link rel="stylesheet" href="{{asset('css/user/dashboard.css')}}">
@endpush
@section('content')

    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        <div class="bg-white rounded-lg shadow-sm p-6 mb-8">
            <div class="flex flex-wrap gap-4 items-center justify-between">
                <div class="space-y-2">
                    <h3 class="text-[#1e2837] font-medium">Room Type</h3>
                    <div class="flex flex-wrap gap-2">
                        <button class="px-4 py-2 rounded-lg text-sm bg-[#4d7cfe] text-white">
                            All
                        </button>
                        <button class="px-4 py-2 rounded-lg text-sm bg-gray-100 text-gray-700 hover:bg-gray-200">
                            Standard
                        </button>
                        <button class="px-4 py-2 rounded-lg text-sm bg-gray-100 text-gray-700 hover:bg-gray-200">
                            Suite
                        </button>
                        <button class="px-4 py-2 rounded-lg text-sm bg-gray-100 text-gray-700 hover:bg-gray-200">
                            Villa
                        </button>
                    </div>
                </div>
                <div class="space-y-2">
                    <h3 class="text-[#1e2837] font-medium">Price Range</h3>
                    <div class="flex gap-2 items-center">
                        <input type="range" min="0" max="1000" value="1000" class="w-48" disabled />
                        <span class="text-gray-600">Up to $1000</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
           
            @foreach ($rooms as $room)
                <div class="bg-white rounded-lg shadow-sm overflow-hidden">
                    <img src="https://images.unsplash.com/photo-1611892440504-42a792e24d32?auto=format&fit=crop&w=800&h=500"
                        alt="Deluxe Ocean View" class="w-full h-48 object-cover"
                        onerror="this.onerror=null;this.src='https://placehold.co/800x500/CCCCCC/333333?text=Image+Not+Found';" />
                    <div class="p-6">
                        <div class="flex justify-between items-start mb-4">
                            <div>
                                <h3 class="text-lg font-semibold text-[#1e2837]">
                                    {{$room->room_name}}
                                </h3>
                                <p class="text-gray-600 text-sm">{{$room->room_type}}</p>
                            </div>
                            <div class="text-right">
                                <div class="text-lg font-semibold text-[#4d7cfe]">
                                    {{$room->price}}
                                </div>
                                <div class="text-sm text-gray-500">per night</div>
                            </div>
                        </div>
                        <p class="text-gray-600 mb-4">Luxurious suite with breathtaking ocean views and premium amenities.</p>
                        <div class="flex justify-between items-center">
                            <span class="px-3 py-1 rounded-full text-xs font-medium {{$room->is_available == 0 ? " bg-[#ffebee] text-[#dc3545]":" bg-[#e6f7e6] text-[#28a745]"}}">
                                {{$room->is_available ? "Available" : "Booked"}}
                            </span>

                            <form action="{{route('user.avail',$room)}}" method="POST">
                                @csrf
                                <button class="px-4 py-2 rounded-lg text-sm hover:bg-[#3d63cb] {{$room->is_available == 0 ? "bg-gray-200 text-white-500":" bg-[#4d7cfe] text-white"}}" {{$room->is_available == 0 ? "disabled" : ""}}>
                                    {{$room->is_available ? "Available" : "Not Available"}}
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
@endsection