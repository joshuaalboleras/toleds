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

    public function avail(Request $request,Room $room){
        $id = auth()->user()->id;
        $room_id = $room->id;

        $counts = Booking::where(['user_id'=>$id, 'status' => 'pending'])->get()->count();
       
        if($counts == 0){
            Booking::insert(['user_id'=>$id,'room_id' => $room_id,'status' => 'pending']);
            return redirect()->route('user.browse')->with('message','Please Wait for approval');
        }else{     
            return redirect()->route('user.browse')->with('error','Request Pending');
        }

    }
}
