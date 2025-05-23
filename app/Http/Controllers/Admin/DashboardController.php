<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index(){
        $users = User::where(['role_id' => 2])->get();
        $counts = $users->count();
        return view('admin.index',['users' => $users,"counts" => $counts]);
    }

    public function delete(User $user){
        $user->delete();
    }
}
