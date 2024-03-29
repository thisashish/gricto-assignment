<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\State;
use App\Models\City;
use App\Models\Pincode;
use Illuminate\Support\Facades\Validator;

class LocationController extends Controller
{
    public function index()
    {
        // Retrieve and return locations
        $states = State::all();
        $cities = City::all();
        $pincodes = Pincode::all();

        return view('locations.index', compact('states', 'cities', 'pincodes'));
    }

    public function create()
    {
        // Show form to create a new location
        $states = State::all();
        return view('locations.create', compact('states'));
    }

    public function store(Request $request)
    {
        // Store new location
        $validator = Validator::make($request->all(), [
            'state_id' => 'required|exists:states,id',
            'city_id' => 'required|exists:cities,id',
            'pincode_id' => 'required|exists:pincodes,id',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Store the location logic here

        return redirect()->route('locations.index')->with('success', 'Location created successfully.');
    }

    public function edit($id)
    {
        // Show form to edit location
        $location = Location::findOrFail($id);
        $states = State::all();
        return view('locations.edit', compact('location', 'states'));
    }

    public function update(Request $request, $id)
    {
        // Update location
        $location = Location::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'state_id' => 'required|exists:states,id',
            'city_id' => 'required|exists:cities,id',
            'pincode_id' => 'required|exists:pincodes,id',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Update the location logic here

        return redirect()->route('locations.index')->with('success', 'Location updated successfully.');
    }

    public function destroy($id)
    {
        // Delete location
        $location = Location::findOrFail($id);
        $location->delete();

        return redirect()->route('locations.index')->with('success', 'Location deleted successfully.');
    }
}
