<?php

use App\Http\Controllers\Api\CaseStudyApiController;
use App\Http\Controllers\BlogApiController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::get('case-studies', [CaseStudyApiController::class, 'index']);
Route::get('case-studies/{caseStudy}', [CaseStudyApiController::class, 'show']);



Route::get('blogs', [BlogApiController::class, 'index']);
Route::get('blogs/{slug}', [BlogApiController::class, 'show']);
