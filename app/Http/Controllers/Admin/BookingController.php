<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $all = Booking::where(['status' => 'approved'])->get();
        return view('admin.bookings', ['bookings' => $all]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        dd(auth()->check());
        if(!auth()->check()){
            return redirect()->route('register')->with('message','create an account first');
        }
        
    }

    /**
     * Display the specified resource.
     */
    public function show(Booking $booking)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Booking $booking)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Booking $booking)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Booking $booking)
    {
        $room = $booking->room;
        $booking->delete();
        
        // Delete other pending bookings for this room
        Booking::where('room_id', $room->id)
              ->where('status', 'pending')
              ->delete();
              
        $room->is_available = 1;
        $room->save();
        
        return redirect()->route('admin.bookings.index')->with('message','deleted successfully');
    }

    public function approve(Booking $booking)
    {
        $room = $booking->room;
        
        // Add logging to debug the query
        \Log::info('Room ID: ' . $room->id);
        \Log::info('Booking ID: ' . $booking->id);
        
        // Get pending bookings before deletion
        $pendingBookings = Booking::where('room_id', $room->id)
                                 ->where('id', '!=', $booking->id) 
                                 ->where('status', 'pending')
                                 ->get();
                                 
        \Log::info('Pending bookings to delete: ' . $pendingBookings->count());
        \Log::info($pendingBookings->toArray());

        // Delete other pending bookings for this room
        $deleted = Booking::where('room_id', $room->id)
                         ->where('id', '!=', $booking->id)
                         ->where('status', 'pending')
                         ->delete();
                         
        \Log::info('Number of records deleted: ' . $deleted);
        
        $booking->status = 'approved';
        $booking->save();

        $room->is_available = 0;
        $room->save();

        return redirect()->route('admin.bookings.pending')->with('message','User Approved');
    }

    public function pending(){
        $pending = Booking::where(['status'=>'pending'])->get();
        return view('admin.pending',['bookings' => $pending]);
    }

    public function done(Booking $booking){
        $room = $booking->room;
        
        $booking->status = 'completed';
        $booking->save();

        // Room becomes available again
        $room->is_available = 1;
        $room->save();

        return redirect()->route('admin.bookings.index')->with('message','One room unoccupied');
    }
}
