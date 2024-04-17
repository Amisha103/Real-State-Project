<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AvailableData;

class getAvailableController extends Controller
{
    public function getAvailableData()
    {
        $availableData = AvailableData::all();
        return view('buy_options.available_sales', compact('availableData'));
    }


    public function index()
    {
        $allData = AvailableData::all();
        return view('admin.AvailableData', compact('allData'));
    }

    public function delete($id)
    {
        $all = AvailableData::find($id);
        $all->delete();
        return redirect()->back()->with('success', 'Data deleted successfully.');
    }
    public function addDataPage()
    {
        return view('admin.addAvailableDataPage');
    }

    public function add_available_data(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'owner_name' => 'required|string',
            'type' => 'required|string',
            'details' => 'required|string',
            'address' => 'required|string',
            'mobile_number' => 'required|string',
        ]);

        try {
            if ($request->has('image')) {
                $file = $request->file('image');
                $extansion = $file->getClientOriginalExtension();

                $originalNameWithoutExtension = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
                $fileName = $originalNameWithoutExtension . '.' . $extansion;
                $path = 'asset/images/';
                $file->move($path, $fileName);
            } else {
                throw new \Exception('Image not uploaded.');
            }

            $alldata = new AvailableData();
            $alldata->image = $path . $fileName;
            $alldata->owner_name = $request->input('owner_name');
            $alldata->details = $request->input('details');
            $alldata->type = $request->input('type');
            $alldata->address = $request->input('address');
            $alldata->mobile_number = $request->input('mobile_number');
            $alldata->save();

            return redirect('/land-sale-admin')->with('success', 'Available property added successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('fail', $e->getMessage());
        }
    }

    public function edit($id)
    {
        $data = AvailableData::find($id);
        return view('admin.editAv', compact('data'));
    }

    public function updateAv(Request $request, $id)
    {
        $file = $request->file('image');
        $extansion = $file->getClientOriginalExtension();

        $originalNameWithoutExtension = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $fileName = $originalNameWithoutExtension . '.' . $extansion;
        $path = 'asset/images/';
        $file->move($path, $fileName);

        $data = AvailableData::find($id);
        $data->image = $path . $fileName;
        $data->owner_name = $request->input('owner_name');
        $data->type = $request->input('type');
        $data->details = $request->input('details');
        $data->address = $request->input('address');
        $data->mobile_number = $request->input('mobile_number');
        $data->save();
        return redirect('/all-property-admin')->with('success', 'Data updated successfully');
    }
}
