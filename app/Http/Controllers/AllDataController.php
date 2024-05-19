<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AllData;

class AllDataController extends Controller
{
    public function getAllData()
    {
        $allData = AllData::all();
        return view('buy_options.all')->with('allData', $allData);
    }
    public function index()
    {
        $allData = AllData::all();
        return view('admin.AdminAllData')->with('allData', $allData);
    }
    public function addData()
    {
        return view('admin.addSalesData');
    }

    public function addAllSales(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg|max:8048',
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

            $alldata = new AllData();
            $alldata->image = $path . $fileName;
            $alldata->owner_name = $request->input('owner_name');
            $alldata->details = $request->input('details');
            $alldata->type = $request->input('type');
            $alldata->address = $request->input('address');
            $alldata->mobile_number = $request->input('mobile_number');
            $alldata->save();

            return redirect('/all-property-admin')->with('success', 'Data added successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('fail', $e->getMessage());
        }
    }

    public function delete($id)
    {
        $all = AllData::find($id);
        $all->delete();
        return redirect()->back()->with('success', 'Data deleted successfully.');
    }

    public function edit($id)
    {
        $data = AllData::find($id);
        return view('admin.editAll', compact('data'));
    }

    public function updateAll(Request $request, $id)
    {
        $file = $request->file('image');
        $extansion = $file->getClientOriginalExtension();

        $originalNameWithoutExtension = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $fileName = $originalNameWithoutExtension . '.' . $extansion;
        $path = 'asset/images/';
        $file->move($path, $fileName);

        $data = AllData::find($id);
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
