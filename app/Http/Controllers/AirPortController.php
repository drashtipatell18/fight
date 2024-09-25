<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\airport;

class AirPortController extends Controller
{
    public function airport()
    {
        $airports = airport::all();
        return view('airport.view_airport', compact('airports'));
    }

    public function airportCreate()
    {
        return view('airport.create_airport');
    }

    public function airportStore(Request $request)
    {

        $request->validate([

            'name' => 'required',
            'city' => 'required',
            'description' => 'required',
        ]);
        $filename = '';
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move('images', $filename);
        }
        airport::create([
            'name' => $request->input('name'),
            'city' => $request->input('city'),
            'description' => $request->input('description'),
            'image' => $filename,
        ]);
        session()->flash('success', 'Airport added successfully!');
        return redirect()->route('airport');
    }

    public function airportEdit($id){
        $airports = airport::find($id);
        return view('airport.create_airport', compact('airports'));
    }

    public function airportUpdate(Request $request, $id){
        $request->validate([
            'name' => 'required',
            'city' => 'required',
            'description' => 'required',
        ]);
        $airport = airport::find($id);
        
        $filename = $airport->image; 
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move('images', $filename);
        }
        $airport->update([
            'name' => $request->input('name'),
            'city' => $request->input('city'),
            'description' => $request->input('description'),
            'image' => $filename, // {{ edit_1 }} Added image field to update
        ]);
        session()->flash('success', 'Airport updated successfully!');
        return redirect()->route('airport');
    }

    public function airportDelete($id){
        $airport = airport::find($id);
        $airport->delete();
        return redirect()->route('airport')->with('success', 'Airport deleted successfully.');
    }
}
