<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Room;
use Illuminate\Http\Request;

class BrowseController extends Controller
{
    //
    public function index(){
        $rooms = Room::all();
        return view('user.browse',['rooms' => $rooms]);
    }

    public function avail(Request $request, Room $room)
    {
        $user = auth()->user();
        
        $hasPendingBooking = Booking::where([
            'user_id' => $user->id,
            'status' => 'pending'
        ])->exists();

        $hasApprovedBooking = Booking::where([
            'user_id' => $user->id,
            'status' => 'approved'
        ])->exists();

        if ($hasApprovedBooking) {
            return redirect()
                ->route('user.browse')
                ->with('error', 'You have already approved a room');
        }

        if ($hasPendingBooking) {
            return redirect()
                ->route('user.browse')
                ->with('error', 'Request Pending');
        }

        Booking::create([
            'user_id' => $user->id,
            'room_id' => $room->id,
            'status' => 'pending'
        ]);

        return redirect()
            ->route('user.browse')
            ->with('message', 'Please Wait for approval');
    }
}
