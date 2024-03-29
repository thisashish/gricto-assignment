<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use App\Models\State;

class CityController extends Controller
{
    public function index()
    {
        $cities = City::all();
        return view('cities.index', compact('cities'));
    }

    public function create()
    {
        $states = State::all();
        return view('cities.create', compact('states'));
    }

    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255|unique:cities',
            'state_id' => 'required|exists:states,id',
        ]);

        // Create a new city with the validated data
        City::create($request->all());

        // Redirect back to the index page with a success message
        return redirect()->route('cities.index')->with('success', 'City created successfully.');
    }

    public function edit(City $city)
    {
        // Retrieve all states from the database
        $states = State::all();

        // Return the edit view with the city and states data
        return view('cities.edit', compact('city', 'states'));
    }

    public function update(Request $request, City $city)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255|unique:cities,name,' . $city->id,
            'state_id' => 'required|exists:states,id',
        ]);

        // Update the city with the validated data
        $city->update($request->all());

        // Redirect back to the index page with a success message
        return redirect()->route('cities.index')->with('success', 'City updated successfully.');
    }

    public function destroy(City $city)
    {
        // Delete the city
        $city->delete();

        // Redirect back to the index page with a success message
        return redirect()->route('cities.index')->with('success', 'City deleted successfully.');
    }
}
