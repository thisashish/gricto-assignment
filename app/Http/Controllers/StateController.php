<?php

namespace App\Http\Controllers;

use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StateController extends Controller
{
    public function index()
    {
        $states = State::all();
        return view('states.index', compact('states'));
    }

    public function create()
    {
        return view('states.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255|unique:states',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        State::create($request->all());

        return redirect()->route('states.index')->with('success', 'State created successfully.');
    }

    public function edit(State $state)
    {
        return view('states.edit', compact('state'));
    }

    public function update(Request $request, State $state)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255|unique:states,name,' . $state->id,
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $state->update($request->all());

        return redirect()->route('states.index')->with('success', 'State updated successfully.');
    }

    public function destroy(State $state)
    {
        $state->delete();

        return redirect()->route('states.index')->with('success', 'State deleted successfully.');
    }
}
