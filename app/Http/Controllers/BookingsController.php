<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ReservationConfirmation;
use Illuminate\Support\Facades\Validator;

class BookingsController extends Controller
{

    public function store(Request $request)
    {
        // Validate form inputs
        $validator = Validator::make($request->all(), [
            'room_type' => 'required|in:single,double',
            'occupants' => 'required|integer|min:1|max:4',
            'check_in_date' => 'required|date',
            'check_out_date' => 'required|date|after:check_in_date',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        // Check room availability
        $existingBooking = Booking::where('hostel_id', $request->hostel_id)
            ->where(function ($query) use ($request) {
                $query->whereBetween('check_in_date', [$request->check_in_date, $request->check_out_date])
                    ->orWhereBetween('check_out_date', [$request->check_in_date, $request->check_out_date]);
            })
            ->first();

        if ($existingBooking) {

            session()->flash('error', 'Selected room is not available for the specified dates');
            return back()->withErrors(['error' => 'Selected room is not available for the specified dates.'])->withInput();
        }

        $booking = new Booking();
        $booking->user_id = auth()->user()->id;
        $booking->hostel_id = $request->hostel_id;
        $booking->check_in_date = $request->check_in_date;
        $booking->check_out_date = $request->check_out_date;
        $booking->room_type = $request->room_type;
        $booking->occupants = $request->occupants;
        $booking->status = "Pending";
        $booking->save();

        // Send confirmation email
        Mail::to(auth()->user()->email)->send(new ReservationConfirmation($booking));


        session()->flash('success', 'Booking successful! Notify to mail');
        return redirect()->back()->with('success', 'Booking successful!');
    }
}
