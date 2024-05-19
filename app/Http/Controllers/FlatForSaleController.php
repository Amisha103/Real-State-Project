<?php

namespace App\Http\Controllers;

use App\Models\FlatForSale;
use Illuminate\Http\Request;

class FlatForSaleController extends Controller
{
    public function FlatSaleData()
    {
        $flatForSaleData = FlatForSale::all();
        return view('buy_options.flat_for_sale', compact('flatForSaleData'));
    }

    public function index()
    {
        $allData = FlatForSale::all();
        return view('admin.flatSaleData', compact('allData'));
    }

    public function addFlatPage()
    {
        return view('admin.addFlatPage');
    }

    public function delete($id)
    {
        $all = FlatForSale::find($id);
        $all->delete();
        return redirect()->back()->with('success', 'Data deleted successfully.');
    }

    public function addFlatData(Request $request)
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

            $alldata = new FlatForSale();
            $alldata->image = $path . $fileName;
            $alldata->owner_name = $request->input('owner_name');
            $alldata->details = $request->input('details');
            $alldata->type = $request->input('type');
            $alldata->address = $request->input('address');
            $alldata->mobile_number = $request->input('mobile_number');
            $alldata->save();

            return redirect('/flat-sale-admin')->with('success', 'Flat Data added successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('fail', $e->getMessage());
        }
    }

    public function edit($id)
    {
        $data = FlatForSale::find($id);
        return view('admin.editFlat', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $file = $request->file('image');
        $extansion = $file->getClientOriginalExtension();

        $originalNameWithoutExtension = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
        $fileName = $originalNameWithoutExtension . '.' . $extansion;
        $path = 'asset/images/';
        $file->move($path, $fileName);


        $data = FlatForSale::find($id);
        $data->image = $path . $fileName;
        $data->owner_name = $request->input('owner_name');
        $data->type = $request->input('type');
        $data->details = $request->input('details');
        $data->address = $request->input('address');
        $data->mobile_number = $request->input('mobile_number');
        $data->save();
        return redirect('/flat-sale-admin')->with('success', 'Data updated successfully');
    }
}
