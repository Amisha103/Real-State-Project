<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AdminUser;
use App\Models\Blog;
use App\Models\Purchase;

class AdminPanelController extends Controller
{
    public function index()
    {
        return view('admin.adminLogin');
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
        $newUser->type = "admin";
        $newUser->save();

        if ($newUser) return redirect('/login-user')->with('success', 'Your account is ready !');
        else return redirect('/admin-register')->with('fail', 'Account creation failed ! ');
    }
    
    public function AddBlog(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'title' => 'required|string',
            'content' => 'required|string',
        ]);

        try {
            if ($request->has('image')) {
                $file = $request->file('image');
                $extansion = $file->getClientOriginalExtension();

                $originalNameWithoutExtension = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
                $fileName = $originalNameWithoutExtension . '.' . $extansion;
                $path = 'asset/blog_img/';
                $file->move($path, $fileName);
            } else {
                throw new \Exception('Image not uploaded.');
            }

            $alldata = new Blog();
            $alldata->image = $path . $fileName;
            $alldata->title = $request->input('title');
            $alldata->content = $request->input('content');
            $alldata->customerId = 'admin-' . session()->get('id');
            $alldata->save();

            return redirect()->back()->with('success', 'Blog added successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('fail', $e->getMessage());
        }
    }

    public function purchaseDetailsAdmin()
    {
        $purchaseData = Purchase::all();
        return view('admin.purchaseAdmin', compact('purchaseData'));
    }

    public function deletedPurchaseAdmin($id)
    {
        $deletePurchase = Purchase::find($id);
        $deletePurchase->delete();
        return redirect()->back()->with('success', 'Purchase Data deleted successfully.');
    }
}
