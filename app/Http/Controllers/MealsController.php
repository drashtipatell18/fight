<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\meal;
class MealsController extends Controller
{
    public function meals()
    {
        $meals = meal::all();
        return view('meals.view_meals', compact('meals'));
    }

    public function mealsCreate()
    {
        return view('meals.create_meals');
    }

    public function mealsStore(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'type' => 'required|in:veg,nonveg',
        ]);

        $meals = meal::create([
            'name'        => $request->input('name'),
            'description' => $request->input('description'),
            'price'       => $request->input('price'),
            'type'        => $request->input('type'),
        ]);
        session()->flash('success', 'Meal added successfully!');
        return redirect()->route('meals');
    }

    public function mealsEdit($id)
    {
        $meals = meal::find($id);
        return view('meals.create_meals', compact('meals'));
    }

    public function mealsUpdate(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'type' => 'required|in:veg,nonveg',
        ]);

        $meal = meal::find($id);
        $meal->update([
            'name'        => $request->input('name'),
            'description' => $request->input('description'),
            'price'       => $request->input('price'),
            'type'        => $request->input('type'),
        ]);
        session()->flash('success', 'Meal updated successfully!');
        return redirect()->route('meals');
    }

    public function mealsDestroy($id)
    {
        $meal = meal::find($id);
        $meal->delete();
        return redirect()->route('meals');
    }
}
