<?php

namespace Database\Seeders;

use App\Models\Room;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //$
        Room::insert([
            ['room_name'=>'casa de lami','room_type' => 'luxury', 'price' => 1000, 'is_available' => 1 ],
            ['room_name'=>'Mi Casa su Casa','room_type' => 'luxury', 'price' => 1500, 'is_available' => 1 ],
            ['room_name'=>'Hotel de Gucci','room_type' => 'luxury', 'price' =>500, 'is_available' => 1 ],
        ]);
    }
}
