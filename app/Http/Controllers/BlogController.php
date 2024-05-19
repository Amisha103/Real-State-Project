<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{

    public function index()
    {
        $blogs = Blog::all();
        return view('pages.blog', compact('blogs'));
    }
    
    public function indexUpdate()
    {
        $blogs = Blog::all();
        return view('admin.updateBlog', compact('blogs'));
    }

    public function YourBlog($b_id)
    {
        $blogs = Blog::where('customerId', $b_id)->get();
        return view('pages.yourBlog', compact('blogs'));
    }


    public function delete($id)
    {
        $blog = Blog::find($id);
        $blog->delete();
        return redirect()->back()->with('success', 'Blog entry deleted successfully.');
    }
}
