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
                return view('buy_options.available_sales');
            case 'flat_for_sale':
                return view('buy_options.flat_for_sale');
            case 'land_for_sale':
                return view('buy_options.land_for_sale');
            default:
                return "Invalid option";
        }
    }
}
