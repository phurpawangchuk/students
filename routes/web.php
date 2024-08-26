<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\StudentController;

Route::get('/', [PublicController::class, 'welcome'])->name('welcome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::resource('products', ProductController::class);
    Route::resource('posts', PostController::class);
    Route::resource('students', StudentController::class);

});

Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::get('/students', [StudentController::class, 'index'])->name('students.index');

require __DIR__.'/auth.php';