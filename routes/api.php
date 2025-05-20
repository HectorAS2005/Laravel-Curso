<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PostController;

Route::prefix('post')->group(function () {

    // Ruta para obtener todos los posts (sin conflicto con {post})
    Route::get('all', [PostController::class, 'all']);

    // Ruta para paginación de posts
    Route::get('', [PostController::class, 'index']);

    // Rutas para operaciones con post individual, usando route model binding
    Route::get('{post}', [PostController::class, 'show']);
    Route::put('{post}', [PostController::class, 'update']);
    Route::delete('{post}', [PostController::class, 'destroy']);

    // Ruta para crear un post
    Route::post('', [PostController::class, 'store']);

    // Ruta para obtener post por slug (si la usas)
    Route::get('slug/{post}', [PostController::class, 'slug']);
});
