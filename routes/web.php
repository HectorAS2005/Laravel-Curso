<?php

use App\Http\Controllers\Dashboard\PostController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

/* Route::get('/contact', function () {
    // return redirect('/contact2', 303);
    // return redirect()->route('contact2', 303);
    return view('contact',['name' => 'Hector']);
})->name('contact');

Route::get('/contact2', function () {
    return view('contact2');
})->name('contact2');

Route::get('test', [PrimerControlador::class, 'index']);
Route::get('otro/{post}/{otro}', [PrimerControlador::class, 'otro']);
 */

Route::resource('post', PostController::class);