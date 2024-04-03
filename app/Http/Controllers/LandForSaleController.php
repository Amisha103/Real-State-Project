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
}
