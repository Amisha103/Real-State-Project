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
    public function delete($id)
    {
        $all = AllData::find($id);
        $all->delete();
        return redirect()->back()->with('success', 'Data deleted successfully.');
    }
}