<?php

namespace App\Http\Controllers;

use App\Models\Hostel;
use Illuminate\Http\Request;

class HostelController extends Controller
{
    public function index()
    {
        $hostels = Hostel::all();
        return view('welcome', compact('hostels'));
    }

    public function view($id)
    {
        // Fetch the hostel from the database using the provided ID
        $hostel = Hostel::findOrFail($id);

        // Pass the hostel data to a view and return it
        return view('hostels', compact('hostel'));
    }
}
