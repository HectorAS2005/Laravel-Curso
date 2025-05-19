<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\web\BlogController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\PostController;
use App\Http\Controllers\Dashboard\CategoryController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// Rutas de perfil (sin middleware de autenticación)
Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

// Rutas de dashboard (sin middleware de autenticación ni rol admin)
Route::prefix('dashboard')->group(function () {
    Route::resource('post', PostController::class);
    Route::resource('category', CategoryController::class);
});

Route::group(['prefix' => 'blog'],function() {
    Route::controller(BlogController::class)->group(function() {
        Route::get('/', 'index')->name('web.blog.index');
        Route::get('/{post}', 'show')->name('web.blog.show');
    });
});

require __DIR__.'/auth.php';
