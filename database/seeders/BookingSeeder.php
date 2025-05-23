<?php

namespace Database\Seeders;

use App\Models\Booking;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Booking::insert([
            ['user_id' => 2,'room_id' => 1,'status' => 'pending'],
            ['user_id' => 2,'room_id' => 1,'status' => 'pending'],
        ]);
    }
}
