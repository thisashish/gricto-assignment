<?php

namespace App\Http\Controllers;

use App\Models\Pincode;
use App\Models\City;
use Illuminate\Http\Request;

class PincodeController extends Controller
{
    public function index()
    {
        $pincodes = Pincode::all();
        return view('pincodes.index', compact('pincodes'));
    }

    public function create()
    {
        $cities = City::all();
        return view('pincodes.create', compact('cities'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|string|unique:pincodes',
            'city_id' => 'required|exists:cities,id',
        ]);

        Pincode::create($request->all());

        return redirect()->route('pincodes.index')->with('success', 'Pincode created successfully.');
    }

    public function edit(Pincode $pincode)
    {
        $cities = City::all();
        return view('pincodes.edit', compact('pincode', 'cities'));
    }

    public function update(Request $request, Pincode $pincode)
    {
        $request->validate([
            'code' => 'required|string|unique:pincodes,code,' . $pincode->id,
            'city_id' => 'required|exists:cities,id',
        ]);

        $pincode->update($request->all());

        return redirect()->route('pincodes.index')->with('success', 'Pincode updated successfully.');
    }

    public function destroy(Pincode $pincode)
    {
        $pincode->delete();

        return redirect()->route('pincodes.index')->with('success', 'Pincode deleted successfully.');
    }
}
