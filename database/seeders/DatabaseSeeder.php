<?php

namespace Database\Seeders;

use App\Models\User;

use App\Models\Hostel;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        Hostel::factory(10)->create();
        User::factory(1)->create();
    }
}
