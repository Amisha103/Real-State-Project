<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Cart;
use Illuminate\Support\Facades\DB;

class mainController extends Controller
{
    public function registerUser(Request $data)
    {
        $newUser = new User();
        $newUser->fullname = $data->input('fullname');
        $newUser->email = $data->input('email');
        $newUser->password = $data->input('password');
        $newUser->type = "Customer";

        if ($newUser->save()) return redirect('/login-user')->with('success', 'Your account is ready!');
    }
    public function loginUser(Request $data)
    {
        $user = User::where('email', $data->input('email'))->where('password', $data->input('password'))->first();
        if ($user) {
            session()->put('id', $user->id);
            session()->put('type', $user->type);

            if ($user->type == 'Customer')
                return redirect('/');
            else
                return redirect('/admin');
        } else
            return redirect('/login-user')->with('fail', 'Login failed! Incorrect email or password');
    }
    public function login()
    {
        return view('pages.login');
    }

    public function cart()
    {
        $cartItems = DB::table('all_data')
            ->join('carts', function ($join) {
                $join->on('carts.productId', '=', 'all_data.id');
            })
            ->select('all_data.image', 'all_data.details', 'all_data.type', 'all_data.mobile_number', 'carts.*')
            ->where('carts.customerId', session()->get('id'))
            ->get();
        $allCartItems = $cartItems;

        $cartItems = DB::table('flat_for_sale')
            ->join('carts', function ($join) {
                $join->on('carts.productId', '=', 'flat_for_sale.id');
            })
            ->select('flat_for_sale.image', 'flat_for_sale.details', 'flat_for_sale.type', 'flat_for_sale.mobile_number', 'carts.*')
            ->where('carts.customerId', session()->get('id'))
            ->get();
        $allCartItems = $allCartItems->merge($cartItems);

        $cartItems = DB::table('available_data')
            ->join('carts', function ($join) {
                $join->on('carts.productId', '=', 'available_data.id');
            })
            ->select('available_data.image', 'available_data.details', 'available_data.type', 'available_data.mobile_number', 'carts.*')
            ->where('carts.customerId', session()->get('id'))
            ->get();
        $allCartItems = $allCartItems->merge($cartItems);

        $cartItems = DB::table('land_sale_table')
            ->join('carts', function ($join) {
                $join->on('carts.productId', '=', 'land_sale_table.id');
            })
            ->select('land_sale_table.image', 'land_sale_table.details', 'land_sale_table.type', 'land_sale_table.mobile_number', 'carts.*')
            ->where('carts.customerId', session()->get('id'))
            ->get();
        $allCartItems = $allCartItems->merge($cartItems);

        return view('pages.cart', compact('allCartItems'));
    }

    public function register()
    {
        return view('pages.register');
    }
    public function logout()
    {
        session()->forget('id');
        session()->forget('type');
        return view('pages.home');
    }
    public function deleteCartItem($id)
    {
        $Item = Cart::find($id);
        $Item->delete();
        return redirect()->back()->with('success', 'item deleted from cart!');
    }
    public function addToCart(Request $data)
    {
        if (session()->has('id')) {
            $item = new Cart;
            $item->productId = $data->input('productId');
            $item->quantity = $data->input('quantity');
            $item->type = $data->input('type');
            $item->customerId = session()->get('id');
            $item->save();
            return redirect()->back()->with('success', 'item added to cart!');
        } else  return redirect('/login-user')->with('fail', 'Login to your account fisrt!');
    }
}