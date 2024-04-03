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
}
