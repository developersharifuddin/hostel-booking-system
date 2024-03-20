<?php

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = Admin::where('role', 'admin')->first();

        if (is_null($admin)) {
            $admin           = new Admin();
            $admin->name     = "Super Admin";
            $admin->email    = "admin@gmail.com";
            $admin->username = "superadmin";
            $admin->password = Hash::make('12345678');
            $admin->save();
        }
    }
}
