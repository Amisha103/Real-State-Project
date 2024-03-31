<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::all(); // Retrieve all blogs from the database
        return view('pages.blog', compact('blogs')); // Pass blogs data to the view
    }
}
