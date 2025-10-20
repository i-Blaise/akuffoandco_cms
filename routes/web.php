<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\CaseStudyController;
use Illuminate\Support\Facades\Auth;

Route::middleware('guest')->group(function () {
    Route::get('/login', fn() => view('auth.login'))->name('login');
    Route::post('/login', [LoginController::class, 'store'])->name('login.store');

    Route::get('/register', fn() => view('auth.register'))->name('register');
    Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
});

Route::post('/logout', [LoginController::class, 'destroy'])
    ->middleware('auth')->name('logout');



Route::middleware('auth')->group(function () {
    // Route::get('add-case-study', function () {
    //     return view('index');
    // })->name('index');

    // Route::get('add-case-study', function () {
    //     return view('index');
    // });

    Route::get('/', [CaseStudyController::class, 'create']);

    Route::get('add-case-study', [CaseStudyController::class, 'create'])->name('add-case-study');

    Route::post('case-study/store', [CaseStudyController::class, 'store'])->name('case-study.store');

    Route::get('list-case-studies', [CaseStudyController::class, 'index'])->name('list-case-studies');

    Route::patch('/case-studies/{caseStudy}/toggle', [CaseStudyController::class, 'togglePublish'])
     ->name('case-studies.toggle');

    Route::delete('/case-studies/{caseStudy}', [CaseStudyController::class, 'destroy'])
        ->name('case-studies.destroy');

    Route::get('edit-case-study/{id}', [CaseStudyController::class, 'edit'])->name('edit-case-study');

    Route::post('update-case-study/{id}', [CaseStudyController::class, 'update'])->name('update-case-study');

    // Route::get('list-case-studies', function () {
    //     return view('pages.case-study.list');
    // })->name('list-case-studies');

    // Route::get('edit-case-study', function () {
    //     return view('pages.case-study.edit');
    // })->name('edit-case-study');


    // Route::get('add-blog-post', function () {
    //     return view('pages.blog.add');
    // })->name('add-blog-post');




    // Blogs Route

    Route::get('list-blog-posts', [BlogController::class, 'index'])->name('list-blog-posts');

    Route::get('add-blog-post', [BlogController::class, 'create'])->name('add-blog-post');

    Route::post('blog/store', [BlogController::class, 'store'])->name('blog.store');

    Route::get('edit-blog-post/{id}', [BlogController::class, 'edit'])->name('edit-blog-post');

    Route::post('update-blog-post/{id}', [BlogController::class, 'update'])->name('update-blog-post');

    Route::delete('/blogs/{blog}', [BlogController::class, 'destroy'])
        ->name('blogs.destroy');

    Route::patch('/blogs/{blog}/toggle', [BlogController::class, 'togglePublish'])
     ->name('blogs.toggle');
});

Route::get('/test-auth', function () {
    return Auth::check() ? Auth::user()->name : 'No user logged in';
});


// Route::get('edit-blog-post', function () {
//     return view('pages.blog.edit');
// })->name('edit-blog-post');
