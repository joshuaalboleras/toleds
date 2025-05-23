<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Room;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index(){
        $id = auth()->user()->id;

        // Eager load the 'room' relationship
        $booking = Booking::with('room')->where(['user_id' => $id, 'status' => 'approved'])->first();

        return view('user.index',['room'=>$booking->room ?? null]);
    }

    public function browse(){
        $rooms = Room::all();
        return view('user.browse',['rooms' => $rooms]);
    }
}
