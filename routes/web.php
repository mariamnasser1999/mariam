<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SubscriberController;
use App\Http\Controllers\Themecontroller;
use Illuminate\Support\Facades\Route;


Route::controller(Themecontroller::class)->name('Theme.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('category/{id}', 'category')->name('category');
    Route::get('contact', 'contact')->name('contact');
    Route::get('blog/{id}', 'blog')->name('blog');
    // Route::get('login', 'login')->name('login');
    // Route::get('register', 'register')->name('register');
});


Route::post('subscribe/store', [SubscriberController::class, 'store'])->name('subscribers.store');

Route::post('coontact/store', [ContactController::class, 'store'])->name('contact.store');

Route::get('/my-blogs',[BlogController::class ,'myBlogs'])->name('blogs.my-blogs');
Route::resource('blogs',BlogController::class);


Route::post('comment/store', [ContactController::class, 'store'])->name('comment.store');





Route::get('/dashboard', function () {
    return to_route('Theme.index');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
