<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;


Route::middleware('guest')->group(function () {
    Route::get('/login', fn() => view('auth.login'))->name('login');
    Route::post('/login', [LoginController::class, 'store'])->name('login.store');

    Route::get('/register', fn() => view('auth.register'))->name('register');
    Route::post('/register', [RegisterController::class, 'store'])->name('register.store');
});

Route::post('/logout', [LoginController::class, 'destroy'])
    ->middleware('auth')->name('logout');



Route::middleware('auth')->group(function () {
    Route::get('/dashboard', function () {
        return view('index');
    })->name('dashboard');
    Route::get('add-case-study', function () {
        return view('pages.case-study.add');
    })->name('add-case-study');

    Route::get('list-case-studies', function () {
        return view('pages.case-study.list');
    })->name('list-case-studies');

    Route::get('edit-case-study', function () {
        return view('pages.case-study.edit');
    })->name('edit-case-study');


    Route::get('add-blog-post', function () {
        return view('pages.blog.add');
    })->name('add-blog-post');

    Route::get('list-blog-posts', function () {
        return view('pages.blog.list');
    })->name('list-blog-posts');
});



// Route::get('edit-blog-post', function () {
//     return view('pages.blog.edit');
// })->name('edit-blog-post');
