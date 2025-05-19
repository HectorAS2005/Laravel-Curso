<?php

use App\Http\Controllers\Api\PostController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\UserController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => 'auth:sanctum'], function () {
    Route::resource('category', CategoryController::class)->except(["create", "edit"]);
    Route::resource('post', PostController::class)->except(["create", "edit"]); 
});

Route::get('category/all', [CategoryController::class, 'all']);
Route::get('post/all', [PostController::class, 'all']);
Route::get('post/slug/{post:slug}', [PostController::class, 'slug']);
Route::get('category/{category}/posts', [CategoryController::class, 'posts']);

Route::apiResource('category', CategoryController::class);
Route::apiResource('post', PostController::class);

// Usuarios
Route::post('user/login', [UserController::class, 'login']);