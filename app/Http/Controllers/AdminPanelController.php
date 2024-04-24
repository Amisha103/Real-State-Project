<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminUser;

class AdminPanelController extends Controller
{
    public function index()
    {
        return view('admin.adminLogin');
    }
    public function UpdateBlog()
    {
        return view('admin.updateBlog');
    }
    public function adminRegister()
    {
        return view('admin.adminReg');
    }
    public function adminHome()
    {
        return view('admin.adminHome');
    }
    public function adminRegisterUser(Request $data)
    {
        $newUser = new AdminUser();
        $newUser->name = $data->input('username');
        $newUser->email = $data->input('email');
        $newUser->password = $data->input('password');
        $newUser->save();

        if ($newUser) return redirect('/admin-login')->with('success', 'Your account is ready !');
        else return redirect('/admin-register')->with('fail', 'Account creation failed ! ');
    }
    public function AdminLoginUser(Request $data)
    {
        $user = AdminUser::where('email', $data->input('email'))->where('password', $data->input('password'))->first();
        if ($user) {
            session()->put('id', $user->id);
            return view('admin.adminHome');
        } else
            return redirect('/admin-login')->with('fail', 'Login failed! Incorrect email or password');
    }

    public function purchaseDetailsAdmin()
    {
        

    }
}
