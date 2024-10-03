<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\BookingMaster;
use App\Models\JourneyMaster;
class BookMasterController extends Controller
{
    public function booking()
    {
        $bookings = BookingMaster::all();
        return view('bookmaster.view_bookmaster', compact('bookings'));
    }

    public function bookingCreate()
    {
        $journeys = JourneyMaster::pluck('stop_name','id');
        return view('bookmaster.create_bookmaster', compact('journeys'));
    }

    public function bookingStore(Request $request)
    {
        $request->validate([
            'journey_id' => 'required',
            'total_amount' => 'required',
            'discount' => 'required',
            'paid_amount' => 'required',
            'booking_date' => 'required',
            'booking_time' => 'required',

        ]);

        $booking = BookingMaster::create(
            [
                'journey_id' => $request->journey_id,
                'total_amount' => $request->total_amount,
                'discount' => $request->discount,
                'paid_amount' => $request->paid_amount,
                'booking_date' => $request->booking_date,
                'booking_time' => $request->booking_time,

            ]
        );
        session()->flash('success', 'Booking created successfully');
        return redirect()->route('booking');
    }


    public function bookingEdit($id)
    {
        $journeys = JourneyMaster::pluck('stop_name','id');
        $bookings = BookingMaster::find($id);
        return view('bookmaster.create_bookmaster', compact('journeys','bookings'));
    }

    public function bookingUpdate(Request $request, $id)
    {
        $request->validate([
            'journey_id' => 'required',
            'total_amount' => 'required',
            'discount' => 'required',
            'paid_amount' => 'required',
            'booking_date' => 'required',
            'booking_time' => 'required',
        ]);

        $booking = BookingMaster::find($id);
        $booking->update(
            [
                'journey_id' => $request->journey_id,
                'total_amount' => $request->total_amount,
                'discount' => $request->discount,
                'paid_amount' => $request->paid_amount,
                'booking_date' => $request->booking_date,
                'booking_time' => $request->booking_time,
            ]
        );
        session()->flash('success', 'Booking updated successfully');
        return redirect()->route('booking');
    }

    public function bookingDestroy($id)
    {
        $booking = BookingMaster::find($id);
        $booking->delete();
        session()->flash('success', 'Booking deleted successfully');
        return redirect()->route('booking');
    }
}
