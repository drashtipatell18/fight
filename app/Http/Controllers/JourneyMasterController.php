<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JourneyMaster;
use App\Models\PlaneMaster;

class JourneyMasterController extends Controller
{
    public function journey()
    {
        $journeymasters = JourneyMaster::with('plane')->get();
        return view('journeymaster.view_journeymaster', compact('journeymasters'));
    }

    public function journeyCreate()
    {
        $planes = PlaneMaster::pluck('name', 'id');
        return view('journeymaster.create_journeymaster', compact('planes'));
    }
    public function journeyStore(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'from_city' => 'required',
            'to_city' => 'required',
            'plane_id' => 'required',
            'price' => 'required',
            'date' => 'required',
            'departure_datetime' => 'required',
            'arrival_datetime' => 'required',
            'total_stop' => 'required',
            'stop_name' => 'required',
            'stop_time' => 'required',
            'cabin_bag' => 'required',
            'checkin_bag' => 'required',
        ]);
       $jounery = JourneyMaster::create(
        [
            'from_city' => $request->input('from_city'),
            'to_city' => $request->input('to_city'),
            'plane_id' => $request->input('plane_id'),
            'price' => $request->input('price'),
            'date' => $request->input('date'),
            'departure_datetime' => $request->input('departure_datetime'),
            'arrival_datetime' => $request->input('arrival_datetime'),
            'total_stop' => $request->input('total_stop'),
            'stop_name' => $request->input('stop_name'),
            'stop_time' => $request->input('stop_time'),
            'cabin_bag' => $request->input('cabin_bag'),
            'checkin_bag' => $request->input('checkin_bag'),
        ]
       );
        session()->flash('success', 'Journey Master Added Successfully');
        return redirect()->route('journey');
    }
    public function journeyEdit($id)
    {
        $journey = JourneyMaster::find($id);
        $planes = PlaneMaster::pluck('name', 'id');
        return view('journeymaster.create_journeymaster', compact('journey', 'planes'));
    }
    public function journeyUpdate(Request $request, $id)
    {
        $request->validate([
            'from_city' => 'required',
            'to_city' => 'required',
            'plane_id' => 'required',
            'price' => 'required',
            'date' => 'required',
            'departure_datetime' => 'required',
            'arrival_datetime' => 'required',
            'total_stop' => 'required',
            'stop_name' => 'required',
            'stop_time' => 'required',
            'cabin_bag' => 'required',
            'checkin_bag' => 'required',
        ]);
        $journey = JourneyMaster::find($id);
        $journey->update(
            [
                'from_city' => $request->input('from_city'),
                'to_city' => $request->input('to_city'),
                'plane_id' => $request->input('plane_id'),
                'price' => $request->input('price'),
                'date' => $request->input('date'),
                'departure_datetime' => $request->input('departure_datetime'),
                'arrival_datetime' => $request->input('arrival_datetime'),
                'total_stop' => $request->input('total_stop'),
                'stop_name' => $request->input('stop_name'),
                'stop_time' => $request->input('stop_time'),
                'cabin_bag' => $request->input('cabin_bag'),
                'checkin_bag' => $request->input('checkin_bag'),
            ]
        );
        session()->flash('success', 'Journey Master Updated Successfully');
        return redirect()->route('journey');
    }
    public function journeyDestroy($id)
    {
        $journey = JourneyMaster::find($id);
        $journey->delete();
        session()->flash('success', 'Journey Master Deleted Successfully');
        return redirect()->route('journey');
    }
}
