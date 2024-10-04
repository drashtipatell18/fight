<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PlaneMaster;
class PlaneMasterController extends Controller
{
    public function planemaster()
    {
        $plane = PlaneMaster::all();
        return view('plane.view_plane', compact('plane'));
    }
    public function planemasterCreate()
    {
        return view('plane.create_plane');
    }
    public function planemasterStore(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'company_name' => 'required',
            'food_facility' => 'required',
            'total_seat' => 'required',
            'image' => 'required',
        ]);
        $filename = '';
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move('images', $filename);
        }
        $plane = PlaneMaster::create([
            'name' => $request->input('name'),
            'company_name' => $request->input('company_name'),
            'food_facility' => $request->input('food_facility'),
            'total_seat' => $request->input('total_seat'),
            'image' => $filename,
        ]);
        session()->flash('success', 'Plane Master added successfully!');
        return redirect()->route('planemaster');
    }
    public function planemasterEdit($id)
    {
        $plane = PlaneMaster::find($id);
        return view('plane.create_plane', compact('plane'));
    }
    public function planemasterUpdate(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'company_name' => 'required',
            'food_facility' => 'required',

        ]);
        $plane = PlaneMaster::find($id);
        $plane->update([
            'name' => $request->input('name'),
            'company_name' => $request->input('company_name'),
            'food_facility' => $request->input('food_facility'),
            'total_seat' => $request->input('total_seat'),
        ]);
        session()->flash('success', 'Plane Master updated successfully!');
        return redirect()->route('planemaster');
    }
    public function planemasterDestroy($id)
    {
        $plane = PlaneMaster::find($id);
        $plane->delete();
        session()->flash('danger', 'Plane Master deleted successfully!');
        return redirect()->route('planemaster');
    }

}
