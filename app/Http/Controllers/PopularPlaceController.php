<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\popular_place;

class PopularPlaceController extends Controller
{
    public function popularPlace(){
        $popularplaces = popular_place::all();
        return view('popularplace.view_popularplace', compact('popularplaces'));
    }

    public function popularPlaceCreate(){
        return view('popularplace.create_popularplace');
    }

    public function popularPlaceStore(Request $request){
        $request->validate([
            'name'        => 'required',
            'description' => 'required',
            'banner_text' => 'required',
        ]);

        $filename = '';
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move('images', $filename);
        }

        $banner_image = '';
        if ($request->hasFile('banner_image')) {
            $image = $request->file('banner_image');
            $banner_image = time() . '.' . $image->getClientOriginalExtension();
            $image->move('images', $banner_image);
        }

        $popularplaces = popular_place::create([
            'name'        => $request->input('name'),
            'description' => $request->input('description'),
            'banner_text' => $request->input('banner_text'),
            'banner_image'   => $banner_image,
            'image'     => $filename,
        ]);

        session()->flash('success', 'Popular Place added successfully!');
        return redirect()->route('popularplace');
    }

    public function popularPlaceEdit($id){
        $popularplaces = popular_place::find($id);
        return view('popularplace.create_popularplace', compact('popularplaces'));
    }

    public function popularPlaceUpdate(Request $request, $id){
        $request->validate([
            'name'        => 'required',
            'description' => 'required',
            'banner_text' => 'required',
        ]);
        $popularplaces = popular_place::find($id);
    
        $filename = $popularplaces->image; 
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $filename = time() . '.' . $image->getClientOriginalExtension();
            $image->move('images', $filename);
        }
    
        $banner_image = $popularplaces->banner_image; 
        if ($request->hasFile('banner_image')) {
            $image = $request->file('banner_image');
            $banner_image = time() . '.' . $image->getClientOriginalExtension();
            $image->move('images', $banner_image);
        }
    
        // Update the popular place with new data, including images
        $popularplaces->update([
            'name'        => $request->input('name'),
            'description' => $request->input('description'),
            'banner_text' => $request->input('banner_text'),
            'banner_image' => $banner_image, // Update banner_image
            'image'      => $filename,        // Update image
        ]);
    
        session()->flash('success', 'Popular Place Update successfully!');
        return redirect()->route('popularplace');
    }

    public function popularPlaceDelete($id){
        $popularplaces = popular_place::find($id);
        $popularplaces->delete();
        return redirect()->route('popularplace')->with('danger', 'Popular Place deleted successfully.');
    }
}
