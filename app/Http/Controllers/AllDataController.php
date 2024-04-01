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
}
