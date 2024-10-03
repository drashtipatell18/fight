<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SeatMaster;
use App\Models\PlaneMaster;
class SeatMasterController extends Controller
{
    public function seatmaster()
    {
        $seatmaster = SeatMaster::with('plane')->get();
        return view('seatmaster.view_seatmaster', compact('seatmaster'));
    }
    public function seatmasterCreate()
    {
        $planes = PlaneMaster::pluck('name', 'id');
        return view('seatmaster.create_seatmaster', compact('planes'));
    }
    public function seatmasterStore(Request $request)
    {
        $request->validate([
            'plane_id'          => 'required',
            'seat_number'       => 'required',
            'is_window'         => 'required',
            'seat_type'         => 'required',
            'seat_price'        => 'required',
            'price_incrementer' => 'required',
        ]);
        SeatMaster::create(
            [
                'plane_id'          => $request->input('plane_id'),
                'seat_number'       => $request->input('seat_number'),
                'is_window'         => $request->input('is_window'),
                'seat_type'         => $request->input('seat_type'),
                'seat_status'       => 'available',
                'seat_price'        => $request->input('seat_price'),
                'price_incrementer' => $request->input('price_incrementer'),
            ]
        );
        session()->flash('success', 'Seat Master created successfully');
        return redirect()->route('seatmaster');
    }
    public function seatmasterEdit($id)
    {
        $planes = PlaneMaster::pluck('name', 'id');
        $seatmaster = SeatMaster::find($id);
        return view('seatmaster.create_seatmaster', compact('seatmaster', 'planes'));
    }
    public function seatmasterUpdate(Request $request, $id)
    {
        $request->validate([
            'plane_id'          => 'required',
            'seat_number'       => 'required',
            'is_window'         => 'required',
            'seat_type'         => 'required',
            'seat_price'        => 'required',
            'price_incrementer' => 'required',
        ]);
        $seatmaster = SeatMaster::find($id);
        $seatmaster->update(
            [
                'plane_id'          => $request->input('plane_id'),
                'seat_number'       => $request->input('seat_number'),
                'is_window'         => $request->input('is_window'),
                'seat_type'         => $request->input('seat_type'),
                'seat_status'       => 'available',
                'seat_price'        => $request->input('seat_price'),
                'price_incrementer' => $request->input('price_incrementer'),
            ]
        );
        session()->flash('success', 'Seat Master updated successfully');
        return redirect()->route('seatmaster');
    }
    public function seatmasterDelete($id)
    {
        $seatmaster = SeatMaster::find($id);
        $seatmaster->delete();
        session()->flash('success', 'Seat Master deleted successfully');
        return redirect()->route('seatmaster');
    }
}
