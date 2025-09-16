<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class BlogController extends Controller
{
        public function index()
    {
        $blogs = Blog::all();
        return view('pages.blog.list', compact('blogs'));
    }

        public function create()
    {
        return view('pages.blog.add');
    }


            public function uploadProfileImage($imageFile): string
    {
        //Move Uploaded File to public folder
        $destinationPath = 'storage/case_study_images/';
        $hashed_image_name = $imageFile->hashName();
        $profile_img_path = $destinationPath.$hashed_image_name;
        $imageFile->move(public_path($destinationPath), $hashed_image_name);

        return $profile_img_path;
    }

    public function store(Request $request)
    {
        // dd('here');
        // Validate the request data
        $validatedData = $request->validate([
            'image' => 'required|image|max:2048',
            'title' => 'required|string|max:255',
            'summary' => 'required|string',
            'body' => 'required|string',
            'category' => 'required|string|max:255'
        ]);

        $validatedData['slug'] = Str::slug($validatedData['title']).'-'.rand();
        $validatedData['author'] = Auth::user()->name;

        // dd($validatedData);

        // Handle file upload

        if(!is_null($request->file('image')))
        {
            $imagePath = $this->uploadProfileImage($request->file('image'));
        }
        $validatedData['image'] = $imagePath;
        // Create a new blog record
        Blog::create($validatedData);

        return redirect()->route('list-blog-posts')->with('success', 'Blog post created successfully.');
    }
}
