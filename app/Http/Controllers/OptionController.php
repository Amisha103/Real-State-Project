<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OptionController extends Controller
{
    public function getOption(Request $request)
    {
        $option = $request->option;
        // Return the view content based on the selected option
        switch ($option) {
            case 'all':
                return redirect()->route('getAllData');
            case 'available_sales':
                return redirect()->route('getAvailableData');
            case 'flat_for_sale':
                return redirect()->route('FlatSaleData');
            case 'land_for_sale':
                return redirect()->route('LandSale');
            default:
                return "Invalid option";
        }
    }
}
