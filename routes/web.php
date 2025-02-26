<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Themecontroller;
use Illuminate\Support\Facades\Route;


Route::controller(Themecontroller::class)->name('Theme.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('category', 'category')->name('category');
    Route::get('contact', 'contact')->name('contact');
    Route::get('blog', 'blog')->name('blog');
    Route::get('login', 'login')->name('login');
    Route::get('register', 'register')->name('register');
});














Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
