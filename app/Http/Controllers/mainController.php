<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

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
}
