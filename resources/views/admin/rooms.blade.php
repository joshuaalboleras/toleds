@extends("layouts.admin")
@push('styles')
    <link rel="stylesheet" href="{{ asset('css/rooms-table.css') }}">
@endpush
@section("content")
    <main class="flex-1 overflow-x-hidden overflow-y-auto bg-[#f8fafc] p-6">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-6">
            {{-- Card: Total Rooms --}}
            <div class="bg-white rounded-xl shadow-sm p-6 hover:shadow-md transition-shadow duration-200">
                <div class="flex items-center">
                    <div class="p-3 rounded-xl bg-blue-50 text-blue-500">
                        <i class="fas fa-bed text-2xl"></i> {{-- Icon for rooms --}}
                    </div>
                    <div class="ml-4">
                        <h3 class="text-gray-500 text-sm font-medium">Total Rooms</h3>
                        <p id="total-rooms-count" class="text-2xl font-semibold text-gray-800">
                            {{ $counted_rooms }} {{-- Assuming $counts array passed from controller --}}
                        </p>
                    </div>
                </div>
            </div>

            {{-- Card: Available Rooms --}}
            <div class="bg-white rounded-xl shadow-sm p-6 hover:shadow-md transition-shadow duration-200">
                <div class="flex items-center">
                    <div class="p-3 rounded-xl bg-green-50 text-green-500">
                        <i class="fas fa-door-open text-2xl"></i> {{-- Icon for available rooms --}}
                    </div>
                    <div class="ml-4">
                        <h3 class="text-gray-500 text-sm font-medium">Available Rooms</h3>
                        <p id="available-rooms-count" class="text-2xl font-semibold text-gray-800">
                            {{ $available_rooms }}
                        </p>
                    </div>
                </div>
            </div>

            {{-- Card: Booked Rooms (or Occupied) --}}
            <div class="bg-white rounded-xl shadow-sm p-6 hover:shadow-md transition-shadow duration-200">
                <div class="flex items-center">
                    <div class="p-3 rounded-xl bg-yellow-50 text-yellow-500">
                        <i class="fas fa-calendar-check text-2xl"></i> {{-- Icon for booked rooms --}}
                    </div>
                    <div class="ml-4">
                        <h3 class="text-gray-500 text-sm font-medium">Booked Rooms</h3>
                        <p id="booked-rooms-count" class="text-2xl font-semibold text-gray-800">
                            {{ $booked_rooms }}
                        </p>
                    </div>
                </div>
            </div>

            {{-- Card: Room Types (Example, could be VIP rooms, Standard, etc.) --}}
            <div class="bg-white rounded-xl shadow-sm p-6 hover:shadow-md transition-shadow duration-200">
                <div class="flex items-center">
                    <div class="p-3 rounded-xl bg-purple-50 text-purple-500">
                        <i class="fas fa-tags text-2xl"></i> {{-- Icon for room types --}}
                    </div>
                    <div class="ml-4">
                        <h3 class="text-gray-500 text-sm font-medium">Unique Room Types</h3>
                        <p id="room-types-count" class="text-2xl font-semibold text-gray-800">
                            {{ $counts['unique_room_types'] ?? 0 }}
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-xl shadow-sm overflow-hidden table-container">
            <div class="p-6">
                <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6 table-controls">
                    <h2 class="text-xl font-semibold text-gray-800">Rooms Management</h2>
                    <div class="mt-4 md:mt-0 flex items-center space-x-3">
                        <div class="relative">
                            <input type="text" id="search-rooms-input" placeholder="Search rooms..."
                                class="pl-10 pr-4 py-2 border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent search-input" />
                            <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                        </div>
                        <button id="add-room-btn"
                            class="px-4 py-2 bg-blue-500 text-white rounded-lg hover:bg-blue-600 transition-colors duration-200">
                            <i class="fas fa-plus mr-2"></i>Add Room
                        </button>
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table id="rooms-table" class="min-w-full divide-y divide-gray-200">
                        <thead>
                            <tr class="bg-gray-50">
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Room Name
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Room Type
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Price
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Availability
                                </th>
                                <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                    Actions
                                </th>
                            </tr>
                        </thead>
                        <tbody id="rooms-table-body" class="bg-white divide-y divide-gray-200">
                            @foreach ($rooms as $room) {{-- Assuming $rooms collection passed from controller --}}
                                <tr class="hover:bg-gray-50 transition-colors duration-200">
                                    <td class="px-6 py-4 whitespace-nowrap" data-label="Room Name">
                                        <div class="flex items-center">
                                            <div class="h-10 w-10 flex-shrink-0">
                                                <div
                                                    class="h-10 w-10 rounded-full bg-gradient-to-r from-blue-400 to-purple-500 flex items-center justify-center text-white">
                                                    {{ substr($room->room_name, 0, 1) }} {{-- First letter of room name --}}
                                                </div>
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">
                                                    {{ $room->room_name }}
                                                </div>
                                                <div class="text-sm text-gray-500">ID: {{ $room->id }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap" data-label="Room Type">
                                        <div class="text-sm text-gray-900">{{ $room->room_type }}</div>
                                        <div class="text-sm text-gray-500">Created {{ $room->created_at }}</div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap" data-label="Price">
                                        <span
                                            class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-indigo-100 text-indigo-800">
                                            ${{ number_format($room->price, 2) }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap" data-label="Availability">
                                        @if ($room->is_available)
                                            <span
                                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">
                                                Available
                                            </span>
                                        @else
                                            <span
                                                class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">
                                                Occupied
                                            </span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 action-links"
                                        data-label="Actions">
                                        <div class="flex items-center space-x-3">
                                            {{-- Edit Button --}}
                                            <a href="{{route('admin.edit.room', $room)}}"
                                                class="text-blue-500 hover:text-blue-600 transition-colors duration-200 edit-room-btn"
                                                data-room-id="{{ $room->id }}" data-room-name="{{ $room->room_name }}"
                                                data-room-type="{{ $room->room_type }}" data-room-price="{{ $room->price }}"
                                                data-room-available="{{ $room->is_available ? '1' : '0' }}">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form method="post" action="{{ route('admin.delete.room', $room) }}"> {{-- Updated
                                                route --}}
                                                @csrf
                                                @method("DELETE")
                                                <button type="submit"
                                                    class="text-red-500 hover:text-red-600 transition-colors duration-200">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                            <button class="text-gray-500 hover:text-gray-600 transition-colors duration-200">
                                                <i class="fas fa-ellipsis-v"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>

                {{-- Pagination Section (unchanged, as it's generic) --}}
                <div id="pagination-section"
                    class="flex items-center justify-between px-4 py-3 border-t border-gray-200 sm:px-6 pagination">
                    <div class="flex justify-between flex-1 sm:hidden">
                        <button
                            class="relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                            Previous
                        </button>
                        <button
                            class="ml-3 relative inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-white hover:bg-gray-50">
                            Next
                        </button>
                    </div>
                    <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                        <div>
                            <p class="text-sm text-gray-700">
                                Showing <span class="font-medium">1</span> to
                                <span class="font-medium">2</span> of
                                <span id="total-rooms-pagination"
                                    class="font-medium">{{ $counts['total_rooms'] ?? 0 }}</span> {{-- Updated count --}}
                                results
                            </p>
                        </div>
                        <div>
                            <nav class="relative z-0 inline-flex rounded-md shadow-sm -space-x-px" aria-label="Pagination">
                                <button
                                    class="relative inline-flex items-center px-2 py-2 rounded-l-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                                    <i class="fas fa-chevron-left"></i>
                                </button>
                                <button
                                    class="relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm font-medium text-gray-700 hover:bg-gray-50 current-page">
                                    1
                                </button>
                                <button
                                    class="relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm font-medium text-gray-500 hover:bg-gray-50">
                                    <i class="fas fa-chevron-right"></i>
                                </button>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    {{-- CREATE ROOM MODAL --}}
    <div id="create-room-modal" class="fixed inset-0 backdrop-blur-sm flex items-center justify-center z-50 hidden">
        <div class="bg-white rounded-2xl w-[450px] shadow-2xl transform transition-all duration-300 scale-100">
            <div class="p-8">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-bold text-gray-800">
                        Create New Room
                    </h2>
                    <button id="close-room-modal" class="text-gray-400 hover:text-gray-600 transition-colors">
                        <i class="fas fa-times text-xl"></i>
                    </button>
                </div>

                <form id="create-room-form" class="space-y-6" method="POST" action="{{route('admin.store.room')}}">
                    @csrf {{-- Add CSRF token for Laravel --}}
                    <div>
                        <label for="room_name" class="block text-sm font-medium text-gray-700 mb-2">
                            Room Name
                        </label>
                        <input type="text" id="room_name" name="room_name"
                            class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200"
                            required placeholder="Enter room name" />
                    </div>

                    <div>
                        <label for="room_type" class="block text-sm font-medium text-gray-700 mb-2">
                            Room Type
                        </label>
                        <input type="text" id="room_type" name="room_type"
                            class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200"
                            required placeholder="Enter room type" />
                    </div>

                    <div>
                        <label for="price" class="block text-sm font-medium text-gray-700 mb-2">
                            Price
                        </label>
                        <div class="relative">
                            <span class="absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-500">
                            </span>
                            <input type="number" id="price" name="price"
                                class="w-full pl-8 pr-4 py-3 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200"
                                required min="0" step="0.01" placeholder="0.00" />
                        </div>
                    </div>

                    <div class="flex items-center">
                        <label for="is_available" class="flex items-center cursor-pointer">
                            <div class="relative">
                                <input type="hidden" name="is_available" value="0" />
                                <input type="checkbox" id="is_available" name="is_available" class="sr-only" checked
                                    value="1" />
                                <div
                                    class="w-10 h-6 bg-gray-200 rounded-full shadow-inner transition-all duration-300 toggle-bg">
                                </div>
                                <div
                                    class="absolute w-4 h-4 bg-white rounded-full shadow transition-transform duration-300 ease-in-out toggle-dot translate-x-5 top-1">
                                </div>
                            </div>
                            <span class="ml-3 text-sm font-medium text-gray-700">
                                Available
                            </span>
                        </label>
                    </div>

                    <div class="flex justify-end gap-3 mt-8">
                        <button type="button" id="cancel-room-btn"
                            class="px-6 py-2.5 border border-gray-300 rounded-lg text-gray-700 font-medium hover:bg-gray-50 transition-all duration-200">
                            Cancel
                        </button>
                        <button type="submit"
                            class="px-6 py-2.5 bg-blue-500 hover:bg-blue-600 text-white rounded-lg font-medium transition-all duration-200 transform hover:shadow-lg">
                            Create Room
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- UPDATE ROOM MODAL --}}
    @if (isset($update_room))
        <div id="update-room-modal" class="fixed inset-0 backdrop-blur-sm flex items-center justify-center z-50 hidden">
            <div class="bg-white rounded-2xl w-[450px] shadow-2xl transform transition-all duration-300 scale-100">
                <div class="p-8">
                    <div class="flex justify-between items-center mb-6">
                        <h2 class="text-2xl font-bold text-gray-800">
                            Update Room
                        </h2>
                        <button id="close-update-room-modal" class="text-gray-400 hover:text-gray-600 transition-colors">
                            <i class="fas fa-times text-xl"></i>
                        </button>
                    </div>

                    <form id="update-room-form" class="space-y-6" method="POST"
                        action="{{route("admin.update.room", $update_room)}}">
                        @csrf
                        @method('PUT') {{-- Use PUT method for updates --}}
                        <input type="hidden" id="update_room_id" name="id"> {{-- Hidden input for room ID --}}

                        <div>
                            <label for="update_room_name" class="block text-sm font-medium text-gray-700 mb-2">
                                Room Name
                            </label>
                            <input type="text" id="update_room_name" name="room_name"
                                class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200"
                                required placeholder="Enter room name" value="{{$update_room->room_name}}" />
                        </div>

                        <div>
                            <label for="update_room_type" class="block text-sm font-medium text-gray-700 mb-2">
                                Room Type
                            </label>
                            <input type="text" id="update_room_type" name="room_type"
                                class="w-full px-4 py-3 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200"
                                required placeholder="Enter room type" value="{{$update_room->room_type}}" />
                        </div>

                        <div>
                            <label for="update_price" class="block text-sm font-medium text-gray-700 mb-2">
                                Price
                            </label>
                            <div class="relative">
                                <span class="absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-500">
                                </span>
                                <input type="number" id="update_price" name="price"
                                    class="w-full pl-8 pr-4 py-3 rounded-lg border border-gray-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-all duration-200"
                                    required min="0" step="0.01" placeholder="0.00" value="{{$update_room->price}}" />
                            </div>
                        </div>

                        <div class="flex items-center">
                            <label for="update_is_available" class="flex items-center cursor-pointer">
                                <div class="relative">
                                    <input type="hidden" name="is_available" value="0" />
                                    <input type="checkbox" id="update_is_available" name="is_available" class="sr-only"
                                        value="1" {{ $update_room->is_available ? 'checked' : '' }} />
                                    <div
                                        class="w-10 h-6 bg-gray-200 rounded-full shadow-inner transition-all duration-300 toggle-bg">
                                    </div>
                                    <div
                                        class="absolute w-4 h-4 bg-white rounded-full shadow transition-transform duration-300 ease-in-out toggle-dot top-1">
                                    </div>
                                </div>
                                <span class="ml-3 text-sm font-medium text-gray-700">
                                    Available
                                </span>
                            </label>
                        </div>

                        <div class="flex justify-end gap-3 mt-8">
                            <button type="button" id="cancel-update-room-btn"
                                class="px-6 py-2.5 border border-gray-300 rounded-lg text-gray-700 font-medium hover:bg-gray-50 transition-all duration-200">
                                Cancel
                            </button>
                            <button type="submit"
                                class="px-6 py-2.5 bg-blue-500 hover:bg-blue-600 text-white rounded-lg font-medium transition-all duration-200 transform hover:shadow-lg">
                                Update Room
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif
@endsection

@push('scripts')
    <script>
        @isset($update_room)
            const updateRoomModal = document.getElementById('update-room-modal');
            const updateIsAvailableCheckbox = document.getElementById('update_is_available');
            const closeUpdateRoomModalBtn = document.getElementById('close-update-room-modal');
            const cancelUpdateRoomBtn = document.getElementById('cancel-update-room-btn');

            // Function to manually apply the correct toggle visual state
            function updateToggleVisual(checkbox) {
                const toggleDot = checkbox.nextElementSibling.nextElementSibling;
                const toggleBg = checkbox.nextElementSibling;

                if (checkbox.checked) {
                    toggleDot.classList.remove('translate-x-0');
                    toggleDot.classList.add('translate-x-5');
                    toggleBg.classList.remove('bg-gray-200');
                    toggleBg.classList.add('bg-blue-500');
                } else {
                    toggleDot.classList.remove('translate-x-5');
                    toggleDot.classList.add('translate-x-0');
                    toggleBg.classList.remove('bg-blue-500');
                    toggleBg.classList.add('bg-gray-200');
                }
            }

            // 1. Initialize the visual state when the modal loads (from previous fix)
            updateToggleVisual(updateIsAvailableCheckbox);

            // 2. Add the event listener for the toggle functionality
            updateIsAvailableCheckbox.addEventListener('change', function () {
                updateToggleVisual(this);
            });


            // Also ensure the modal is shown when this condition is met.
            updateRoomModal.classList.remove('hidden');

            // Close modal logic (remains the same)
            closeUpdateRoomModalBtn.addEventListener('click', () => {
                updateRoomModal.classList.add('hidden');
            });

            cancelUpdateRoomBtn.addEventListener('click', () => {
                updateRoomModal.classList.add('hidden');
            });

            updateRoomModal.addEventListener('click', (e) => {
                if (e.target === updateRoomModal) {
                    updateRoomModal.classList.add('hidden');
                }
            });
        @endisset
    </script>
@endpush