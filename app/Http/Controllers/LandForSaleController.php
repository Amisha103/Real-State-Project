<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LandForSale;

class LandForSaleController extends Controller
{
    public function LandSale()
    {
        $landForSaleData = LandForSale::all();
        return view('buy_options.land_for_sale', compact('landForSaleData'));
    }

    public function index()
    {
        $allData = LandForSale::all();
        return view('admin.landSaleData', compact('allData'));
    }
    public function addLandPage()
    {
        return view('admin.addLandPage');
    }

    public function delete($id)
    {
        $all = LandForSale::find($id);
        $all->delete();
        return redirect()->back()->with('success', 'Data deleted successfully.');
    }

    public function addLandData(Request $request)
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

            $alldata = new LandForSale();
            $alldata->image = $path . $fileName;
            $alldata->owner_name = $request->input('owner_name');
            $alldata->details = $request->input('details');
            $alldata->type = $request->input('type');
            $alldata->address = $request->input('address');
            $alldata->mobile_number = $request->input('mobile_number');
            $alldata->save();

            return redirect('/land-sale-admin')->with('success', 'Land data added successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('fail', $e->getMessage());
        }
    }

    public function edit($id)
    {
        $data = LandForSale::find($id);
        return view('admin.editLand', compact('data'));
    }

    public function updateLand(Request $request, $id)
    {
        $file = $request->file('image');
        $extansion = $file->getClientOriginalExtension();

        $originalNameWithoutExtension = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $fileName = $originalNameWithoutExtension . '.' . $extansion;
        $path = 'asset/images/';
        $file->move($path, $fileName);


        $data = LandForSale::find($id);
        $data->image = $path . $fileName;
        $data->owner_name = $request->input('owner_name');
        $data->type = $request->input('type');
        $data->details = $request->input('details');
        $data->address = $request->input('address');
        $data->mobile_number = $request->input('mobile_number');
        $data->save();
        return redirect('/land-sale-admin')->with('success', 'Data updated successfully');
    }
}
