<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function index()
    {
        return view('pages.post');
    }
    // public function PostBlog(Request $request)
    // {
    //     $request->validate([
    //         'title' => 'required|string',
    //         'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
    //         'content' => 'required|string',
    //     ]);

    //     if ($request->has('image')) {
    //         $file = $request->file('image');
    //         $extansion = $file->getClientOriginalExtension();

    //         $originalNameWithoutExtension = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
    //         $fileName = $originalNameWithoutExtension . '.' . $extansion;
    //         $path = 'asset/blog_img/';
    //         $file->move($path, $fileName);
    //     }


    //     $blog = new Blog;
    //     $blog->title = $request->input('title');
    //     $blog->image = $path . $fileName;
    //     $blog->content = $request->input('content');
    //     $blog->customerId = session()->get('id');
    //     $blog->save();

    //     return redirect()->back()->with('success', 'Blog post created successfully!');
    // }
    public function PostBlog(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg|max:2048',
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

            $blog = new Blog;
            $blog->title = $request->input('title');
            $blog->image = $path . $fileName;
            $blog->content = $request->input('content');
            $blog->customerId = session()->get('id');
            $blog->save();

            return redirect()->back()->with('success', 'Blog post created successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('fail', $e->getMessage());
        }
    }
}
