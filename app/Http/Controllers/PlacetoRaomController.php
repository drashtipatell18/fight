<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\places_to_roam;
use App\Models\popular_place;

class PlacetoRaomController extends Controller
{
    public function placetoRoam()
    {
        $placetoroams = places_to_roam::with('popularPlace')->get();
        return view('placetoroam.view_placetoroam', compact('placetoroams'));
    }

    public function placetoRoamCreate()
    {
        $popularplaces = popular_place::pluck('name', 'id');
        return view('placetoroam.create_placetoroam', compact('popularplaces'));
    }

    public function placetoRoamStore(Request $request)
    {
        $request->validate([
            'title'            => 'required',
            'description'      => 'required',
            'location'         => 'required',
            'exploration_time' => 'required',
            'dob'              => 'required',
            'popular_place_id' => 'required',
        ]);

        $filename = '';
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move('images', $filename);
        }
        
        $placetoroam = places_to_roam::create([
            'title'            => $request->input('title'),
            'description'      => $request->input('description'),
            'location'         => $request->input('location'),
            'exploration_time' => $request->input('exploration_time'),
            'popular_place_id' => $request->input('popular_place_id'),
            'image'            => $filename,
        ]);

        session()->flash('success', 'Place to Roam added successfully!');
        return redirect()->route('placetoroam');
    }

    public function placetoRoamEdit($id)
    {
        $placetoroams = places_to_roam::find($id);
        $popularplaces = popular_place::pluck('name', 'id');
        return view('placetoroam.create_placetoroam', compact('placetoroams', 'popularplaces'));
    }
    public function placetoRoamUpdate(Request $request, $id)
    {
        $request->validate([
            'title'            => 'required',
            'description'      => 'required',
            'location'         => 'required',
            'exploration_time' => 'required',
            'popular_place_id' => 'required',
        ]);
        $placetoroam = places_to_roam::find($id);
        $filename = $placetoroam->image; 
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move('images', $filename);
        }
        $placetoroam->update([
            'title'            => $request->input('title'),
            'description'      => $request->input('description'),
            'location'         => $request->input('location'),
            'exploration_time' => $request->input('exploration_time'),
            'popular_place_id' => $request->input('popular_place_id'),
            'image'            => $filename, // Added this line to update the image
        ]);
        session()->flash('success', 'Place to Roam updated successfully!');
        return redirect()->route('placetoroam');
    }

    public function placetoRoamDelete($id) {
        $placetoroam = places_to_roam::find($id);
        $placetoroam->delete();
        session()->flash('success', 'Place to Roam deleted successfully!');
        return redirect()->route('placetoroam');
    }
}
