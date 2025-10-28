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
        $destinationPath = 'storage/blog_images/';
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
            'main_image' => 'required|image|max:2048',
            'title' => 'required|string|max:255',
            'author_name' => 'nullable|string',
            'summary' => 'required|string',
            'body' => 'required|string',
            'category' => 'required|string|max:255'
        ]);

        $validatedData['slug'] = Str::slug($validatedData['title']).'-'.rand();
        $validatedData['author'] = Auth::user()->name;
        // dd($validatedData);


        // Handle file upload

        if(!is_null($request->file('main_image')))
        {
            $imagePath = $this->uploadProfileImage($request->file('main_image'));
        }
        $validatedData['main_image'] = $imagePath ? : null;
        // Create a new blog record
        Blog::create($validatedData);

        return redirect()->route('list-blog-posts')->with('success', 'Blog post created successfully.');
    }


    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        return view('pages.blog.edit', compact('blog'));
    }


    public function update(Request $request, $id)
    {
        // dd('here');
        $blog = Blog::findOrFail($id);

        // Validate the request data
        $validatedData = $request->validate([
            'main_image' => 'sometimes|image|max:2048',
            'title' => 'required|string|max:255',
            'author_name' => 'nullable|string',
            'summary' => 'required|string',
            'body' => 'required|string',
            'category' => 'required|string|max:255'
        ]);
        // Handle file upload
        if(!is_null($request->file('main_image')))
        {
            $imagePath = $this->uploadProfileImage($request->file('main_image'));
            $validatedData['main_image'] = $imagePath;
        }

        // Update the blog record
        $blog->update($validatedData);

        return redirect()->route('list-blog-posts')->with('success', 'Blog post updated successfully.');
    }


        public function togglePublish(Blog $blog)
    {
        // Flip the published value (if boolean)
        $blog->published = ! $blog->published;

        $blog->save();

        return redirect()->route('list-blog-posts')
                        ->with('success', 'Blog post ' . ($blog->published ? 'published' : 'unpublished') . ' successfully!');
    }


    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->delete();

        return redirect()->route('list-blog-posts')->with('success', 'Blog post deleted successfully.');
    }

}
