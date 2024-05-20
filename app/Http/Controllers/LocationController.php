<?php

namespace App\Http\Controllers;

use App\Models\LocationModel;
use Illuminate\Http\Request;

class LocationController extends Controller
{
    function index()
    {
        $locations = LocationModel::all();
        return view('admin.locationUpdate', compact('locations'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'latitude' => 'required|string',
            'longitude' => 'required|string',
        ]);

        $location = LocationModel::find($id);
        $location->latitude = $request->input('latitude');
        $location->longitude = $request->input('longitude');
        $location->admin_id = session()->get('id');
        $location->save();

        return redirect()->back()->with('success', 'Location updated successfully.');
    }

    public function getLocationData()
    {
        $locations = LocationModel::all();
        return response()->json($locations);
    }
}
