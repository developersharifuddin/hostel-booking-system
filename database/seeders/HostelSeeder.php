<?php

use App\Models\Hostel;
use Illuminate\Database\Seeder;

class HostelSeeder extends Seeder
{
    public function run()
    {
        Hostel::create([
            'name' => 'Example Hostel 1',
            'location' => 'Example Location 1',
            'available_rooms' => 10,
        ]);

        Hostel::create([
            'name' => 'Example Hostel 2',
            'location' => 'Example Location 2',
            'available_rooms' => 15,
        ]);
    }
}
