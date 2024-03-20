<?php

namespace App\Http\Controllers;

use App\Models\Hostel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class HostelController extends Controller
{
    public function index()
    {
        try {
            $hostels = Hostel::all();
            return view('welcome', compact('hostels'));
        } catch (\Exception $e) {
            Log::error('Error occurred while fetching hostels: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to fetch hostels. Please try again later.');
        }
    }

    public function view($id)
    {
        try {
            $hostel = Hostel::findOrFail($id);
            return view('hostels', compact('hostel'));
        } catch (ModelNotFoundException $e) {
            Log::error('Hostel not found with ID ' . $id);
            abort(404);
        } catch (\Exception $e) {
            Log::error('Error occurred while fetching hostel: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to fetch hostel. Please try again later.');
        }
    }
}
