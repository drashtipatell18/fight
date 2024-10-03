<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BookingPassenger;
use App\Models\BookingMaster;
use App\Models\BookingDetail;
use App\Models\SeatMaster;
use App\Models\Meal;

class BookingPassengerController extends Controller
{
    public function bookingPassenger()
    {
        $bookingPassengers = BookingPassenger::with('bookingMaster', 'bookingDetail', 'seatMaster', 'mealMaster')->get();
        return view('bookingPassenger.view_bookingPassenger', compact('bookingPassengers'));
    }
    public function bookingPassengerCreate()
    {
        $bookingMasters = BookingMaster::pluck('total_amount','id');
        $bookingDetails = BookingDetail::pluck('first_name','id');
        $seatMasters = SeatMaster::pluck('seat_number','id');
        $mealMasters = Meal::pluck('name','id');
        return view('bookingPassenger.create_bookingPassenger', compact('bookingMasters', 'bookingDetails', 'seatMasters', 'mealMasters'));
    }
    public function bookingPassengerStore(Request $request)
    {
        $request->validate([
            'booking_id' => 'required',
            'booking_detail_id' => 'required',
            'seat_id' => 'required',
            'meal_id' => 'required',
            'price' => 'required',
            'status' => 'required',
        ]);
        BookingPassenger::create([
            'booking_id' => $request->input('booking_id'),
            'booking_detail_id' => $request->input('booking_detail_id'),
            'seat_id' => $request->input('seat_id'),
            'meal_id' => $request->input('meal_id'),
            'price' => $request->input('price'),
            'status' => $request->input('status'),
        ]);
        session()->flash('success', 'Booking Passenger created successfully');
        return redirect()->route('bookingpassenger');
    }
    public function bookingPassengerEdit($id)
    {
        $bookingPassenger = BookingPassenger::find($id);
        $bookingMasters = BookingMaster::pluck('total_amount','id');
        $bookingDetails = BookingDetail::pluck('first_name','id');
        $seatMasters = SeatMaster::pluck('seat_number','id');
        $mealMasters = Meal::pluck('name','id');
        return view('bookingPassenger.create_bookingPassenger', compact('bookingPassenger', 'bookingMasters', 'bookingDetails', 'seatMasters', 'mealMasters'));
    }
    public function bookingPassengerUpdate(Request $request, $id)
    {
        $request->validate([
            'booking_id' => 'required',
            'booking_detail_id' => 'required',
            'seat_id' => 'required',
            'meal_id' => 'required',
            'price' => 'required',
            'status' => 'required',
        ]);

        $bookingPassenger = BookingPassenger::find($id);
        $bookingPassenger->update([
            'booking_id' => $request->input('booking_id'),
            'booking_detail_id' => $request->input('booking_detail_id'),
            'seat_id' => $request->input('seat_id'),
            'meal_id' => $request->input('meal_id'),
            'price' => $request->input('price'),
            'status' => $request->input('status'),
        ]);
        session()->flash('success', 'Booking Passenger updated successfully');
        return redirect()->route('bookingpassenger');
    }
    public function bookingPassengerDestroy($id)
    {
        $bookingPassenger = BookingPassenger::find($id);
        $bookingPassenger->delete();
        session()->flash('success', 'Booking Passenger deleted successfully');
        return redirect()->route('bookingpassenger');
    }
}
