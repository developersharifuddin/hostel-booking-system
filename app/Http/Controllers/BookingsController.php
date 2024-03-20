<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Mail\ReservationConfirmation;
use Illuminate\Support\Facades\Validator;

class BookingsController extends Controller
{

    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                'room_type' => 'required|in:single,double',
                'occupants' => 'required|integer|min:1|max:4',
                'check_in_date' => 'required|date',
                'check_out_date' => 'required|date|after:check_in_date',
            ]);

            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }

            DB::beginTransaction();

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

            DB::commit();

            session()->flash('success', 'Booking successful! Notify to mail');
            return redirect()->back()->with('success', 'Booking successful!');
        } catch (\Exception $e) {
            DB::rollBack();

            // Log the error
            Log::error('Error occurred during booking: ' . $e->getMessage());

            session()->flash('error', 'An error occurred while processing your request. Please try again later.');
            return back()->withErrors(['error' => 'An error occurred while processing your request. Please try again later.'])->withInput();
        }
    }
}
