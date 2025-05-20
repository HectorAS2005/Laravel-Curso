<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\web\BlogController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\PostController;
use App\Http\Controllers\Dashboard\CategoryController;

// Página de bienvenida
Route::get('/', function () {
    return view('welcome');
});

// Panel de usuario
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

// Rutas de perfil
Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

// Rutas del panel de administración (dashboard)
Route::prefix('dashboard')->group(function () {
    Route::resource('post', PostController::class);
    Route::resource('category', CategoryController::class);
});

// Rutas públicas del blog
Route::prefix('blog')->controller(BlogController::class)->group(function () {
    Route::get('/', 'index')->name('blog.index');       // Listado paginado
    Route::get('/{post}', 'show')->name('blog.show');   // Detalle del post
});

Route::get('/test2', function() {
    return [
        'Laravel test' => app()->version(),
    ];
});

require __DIR__.'/auth.php';
