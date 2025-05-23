<?php


use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\RoomController;
use App\Http\Controllers\Admin\BookingController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\User\DashboardController as UserDashboardController;
use App\Http\Controllers\User\BrowseController ;
use App\Models\Booking;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::prefix("admin/")->middleware(['auth','checkrole:admin'])->name("admin.")->group(function(){
    
    Route::get("dashboard",[AdminDashboardController::class,'index'])->name('dashboard');
    Route::delete('dashboard/delete/{user}',[AdminDashboardController::class,'delete'])->name('delete.user');
    
    
    Route::get("dashboard/rooms",[RoomController::class,'index'])->name('rooms');
    Route::post("dashboard/create/room",[RoomController::class,'store'])->name('store.room');
    Route::get("dashboard/edit/room/{room}",[RoomController::class,'edit'])->name('edit.room');
    Route::put("dashboard/update/room/{room}",[RoomController::class,'update'])->name('update.room');
    Route::delete("dashboard/rooms/{room}",[RoomController::class,'delete'])->name('delete.room');
    
    Route::resource('dashboard/bookings',BookingController::class);
    Route::post('dashboard/approved/bookings/{booking}',[BookingController::class,'approve'])->name('bookings.approve');
    Route::get('dashboard/pending/bookings',[BookingController::class,'pending'])->name('bookings.pending');
    Route::post('dashbaord/bookings/done/{booking}',[BookingController::class,'done'])->name('bookings.done');
});


Route::get('user/browse',[BrowseController::class,'index'])->name('user.browse');

Route::prefix("user/")->middleware(["checkrole:user","auth"])->name('user.')->group(function(){
    Route::get("dashboard",[UserDashboardController::class,'index'])->name('dashboard');
    Route::post('user/avail/{room}',[BrowseController::class,'avail'])->name('avail');
});