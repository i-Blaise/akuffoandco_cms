<?php

namespace App\Http\Controllers;

use App\Models\CaseStudy;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CaseStudyController extends Controller
{
    public function index()
    {
        $caseStudies = CaseStudy::all();
        return view('pages.case-study.list', compact('caseStudies'));
    }

    public function create()
    {
        return view('pages.case-study.add');
    }


    //     public function uploadProfileImage($imageFile): string
    // {
    //     //Move Uploaded File to public folder
    //     $destinationPath = 'storage/case_study_images/';
    //     $hashed_image_name = $imageFile->hashName();
    //     $profile_img_path = $destinationPath.$hashed_image_name;
    //     $imageFile->move(public_path($destinationPath), $hashed_image_name);

    //     return $profile_img_path;
    // }

    public function uploadProfileImage($imageFile): string
    {
        $path = $imageFile->store('case_study_images', 'public');
        return 'storage/' . $path;
    }

    public function store(Request $request)
    {
        // dd('here');
        // Validate the request data
        $validatedData = $request->validate([
            'image' => 'required|image|max:2048',
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

        if(!is_null($request->file('image')))
        {
            $imagePath = $this->uploadProfileImage($request->file('image'));
        }
        $validatedData['image'] = $imagePath;
        // Create a new case study record
        CaseStudy::create($validatedData);

        return redirect()->route('list-case-studies')->with('success', 'Case study created successfully.');
    }

    public function edit($id)
    {
        $caseStudy = CaseStudy::findOrFail($id);
        return view('pages.case-study.edit', compact('caseStudy'));
    }

    public function update(Request $request, $id)
    {
        // dd('here');
        $caseStudy = CaseStudy::findOrFail($id);

        // Validate the request data
        $validatedData = $request->validate([
            'image' => 'sometimes|image|max:2048',
            'title' => 'required|string|max:255',
            'author_name' => 'nullable|string',
            'summary' => 'required|string',
            'body' => 'required|string',
            'category' => 'required|string|max:255'
        ]);
        // Handle file upload
        if(!is_null($request->file('image')))
        {
            $imagePath = $this->uploadProfileImage($request->file('image'));
            $validatedData['image'] = $imagePath;
        }

        // Update the case study record
        $caseStudy->update($validatedData);

        return redirect()->route('list-case-studies')->with('success', 'Case study updated successfully.');
    }

    public function destroy($id)
    {
        $caseStudy = CaseStudy::findOrFail($id);
        $caseStudy->delete();

        return redirect()->route('list-case-studies')->with('success', 'Case study deleted successfully.');
    }

    public function togglePublish(CaseStudy $caseStudy)
    {
        // Flip the published value (if boolean)
        $caseStudy->published = ! $caseStudy->published;

        $caseStudy->save();

        return redirect()->route('list-case-studies')
                        ->with('success', 'Case study ' . ($caseStudy->published ? 'published' : 'unpublished') . ' successfully!');
    }


}
