<?php

namespace App\Http\Controllers;

use App\Http\Resources\BlogResource;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogApiController extends Controller
{
    public function index(Request $request)
    {
        $search   = $request->get('search');
        $category = $request->get('category');

        $query = Blog::query()
            ->where('published', true)
            ->when($search, fn($q) =>
                $q->where(fn($x) => $x->where('title', 'like', "%{$search}%")
                                    ->orWhere('summary', 'like', "%{$search}%")
                                    ->orWhere('content', 'like', "%{$search}%")))
            ->when($category, fn($q) => $q->where('category', $category))
            ->latest();

        // fetch all
        $caseStudies = $query->get();

        // rename fields for JSON output
        $data = $caseStudies->map(fn($cs) => [
            'id'          => $cs->id,
            'title'  => $cs->title,
            'slug'   => $cs->slug,
            'excerpt'=> $cs->summary,
            'body'   => $cs->body,
            'category'    => $cs->category,
            'published_on'=> $cs->created_at->toDateString(),
        ]);

        return response()->json($data);
    }

    public function show(Blog $blog)
    {
        return new BlogResource($blog);
    }
}
