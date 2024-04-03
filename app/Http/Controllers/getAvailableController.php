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
}
