<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    //
    public function index()
    {
        $rooms = Room::all();
        return view('admin.rooms',array_merge(['rooms' => $rooms],$this->getstats()));
    }

    public function delete(Room $room)
    {
        $room->delete();
        return redirect()->route('admin.rooms')->with('message', 'Deleted Successfully');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'room_name' => 'required',
            'room_type' => 'required',
            'price' => 'required',
            'is_available' => 'required'
        ]);

        Room::create($validated);

        return redirect()->route('admin.rooms')->with('message', "Successfully Added a new Room");
    }

    public function edit(Request $request, Room $room)
    {
        $rooms = Room::all();
        return view('admin.rooms', array_merge(['rooms' => $rooms, 'update_room' => $room],$this->getstats()));
    }

    public function update(Request $request, Room $room)
    {

        $validated = $request->validate([
            'room_name' => 'required',
            'room_type' => 'required',
            'price' => 'required',
            'is_available' => 'required'
        ]);
        $room->update($validated);

        return redirect()->route('admin.rooms')->with('message', 'Room  Updated');
    }

    public function getstats(){
        return [
            'counted_rooms' => Room::count(),
            'available_rooms' => Room::where(['is_available'=>1])->count(),
            'booked_rooms' => Room::where(['is_available' => 0])->count()
        ];
    }
}
