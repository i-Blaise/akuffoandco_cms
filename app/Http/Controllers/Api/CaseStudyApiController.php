<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CaseStudyResource;
use App\Models\CaseStudy;
use Illuminate\Http\Request;

class CaseStudyApiController extends Controller
{
        public function index(Request $request)
    {
        $perPage   = (int) $request->get('per_page', 10);
        $search    = $request->get('search');
        $category  = $request->get('category');
        $published = $request->boolean('published', null);

        $query = CaseStudy::query()
            ->when($search, fn($q) =>
                $q->where(fn($x) => $x->where('title', 'like', "%{$search}%")
                                     ->orWhere('summary', 'like', "%{$search}%")
                                     ->orWhere('content', 'like', "%{$search}%")))
            ->when($category, fn($q) => $q->where('category', $category))
            ->when(!is_null($published), fn($q) => $q->where('published', $published))
            ->latest();

        return CaseStudyResource::collection($query->paginate($perPage));
    }

    // GET /api/case-studies/{caseStudy}
    public function show(CaseStudy $caseStudy)
    {
        return new CaseStudyResource($caseStudy);
    }
}
