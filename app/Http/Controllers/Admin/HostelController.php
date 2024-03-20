<?php

namespace App\Http\Controllers\Admin;

use App\Models\Booking;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class HostelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {

            $query = Booking::select(
                'bookings.*'
            )
                ->latest('id');

            $query = $query->paginate(10);

            return view('admin.bookings.index', with(['bookings' => $query,]));
        } catch (\Exception $error) {

            return redirect()->back()->with([
                'success' => false,
                'error' => 'An error occurred.',
                'message' => $error->getMessage(),
            ], 500);
        }
    }


    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
    }

    /**
     * Update the specified resource in storage.
     */

    public function update($id)
    {
        try {
            DB::beginTransaction();

            $booking = Booking::findOrFail($id);

            $booking->status = 'Confirmed';

            $booking->save();

            DB::commit();

            Session::flash('success', 'Booking status updated to Confirmed.');

            return redirect()->back();
        } catch (\Exception $e) {
            DB::rollBack();

            Session::flash('error', 'Failed to update booking status.');

            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
