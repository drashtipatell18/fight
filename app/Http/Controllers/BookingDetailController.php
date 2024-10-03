<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\BookingDetail;
use App\Models\BookingMaster;

class BookingDetailController extends Controller
{
    public function bookingdetail()
    {
        $bookingdetails = BookingDetail::with('booking')->get();
        return view('bookingdetail.view_bookingdetail', compact('bookingdetails'));
    }
    public function bookingdetailCreate()
    {
        $bookingmasters = BookingMaster::pluck('total_amount', 'id');
        return view('bookingdetail.create_bookingdetail', compact('bookingmasters'));
    }
    public function bookingdetailStore(Request $request)
    {
         $request->validate([
            'booking_id' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'gender' => 'required',
            'dob' => 'required',
            'country' => 'required',
            'mobile_no' => 'required',
            'alternate_mobile_no' => 'required',
            'email1' => 'required',
            'address' => 'required',
        ]);

        $bookingdetail = BookingDetail::create([
            'booking_id' => $request->input('booking_id'),
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'gender' => $request->input('gender'),
            'dob' => $request->input('dob'),
            'country' => $request->input('country'),
            'mobile_no' => $request->input('mobile_no'),
            'alternate_mobile_no' => $request->input('alternate_mobile_no'),
            'email1' => $request->input('email1'),
            'email2' => $request->input('email2'),
            'address' => $request->input('address'),

        ]);
        session()->flash('success', 'Booking Detail created successfully');
        return redirect()->route('bookingdetail');
    }
    public function bookingdetailEdit($id)
    {
        $bookingdetail = BookingDetail::find($id);
        return view('bookingdetail.create_bookingdetail', compact('bookingdetail'));
    }
    public function bookingdetailUpdate(Request $request, $id)
    {
        $request->validate([
            'booking_id' => 'required',
            'first_name' => 'required',
            'last_name' => 'required',
            'dob' => 'required',
            'country' => 'required',
            'mobile_no' => 'required',
            'alternate_mobile_no' => 'required',
            'email1' => 'required',
            'email2' => 'required',
            'address' => 'required',
        ]);
        $bookingdetail = BookingDetail::find($id);
        $bookingdetail->update([
            'booking_id' => $request->input('booking_id'),
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'dob' => $request->input('dob'),
            'country' => $request->input('country'),
            'mobile_no' => $request->input('mobile_no'),
            'alternate_mobile_no' => $request->input('alternate_mobile_no'),
            'email1' => $request->input('email1'),
            'email2' => $request->input('email2'),
        ]);
        session()->flash('success', 'Booking Detail updated successfully');
        return redirect()->route('bookingdetail');
    }
    public function bookingdetailDestroy($id)
    {
        $bookingdetail = BookingDetail::find($id);
        $bookingdetail->delete();
        session()->flash('success', 'Booking Detail deleted successfully');
        return redirect()->route('bookingdetail');
    }
}
