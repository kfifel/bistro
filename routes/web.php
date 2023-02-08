<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PlatController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::resource('plats', PlatController::class)
    ->except([
        'show'
    ])
    ->middleware(['auth']);
Route::resource('plats', PlatController::class)
    ->only([
        'show'
    ]);

Route::match(['GET', 'POST'], '/login',[AuthController::class, 'login'])
    ->name('login');

Route::match(['GET', 'POST'], '/register', [AuthController::class, 'register'])
    ->name('register');

Route::delete('/logout', [AuthController::class, 'logout'])
    ->name('logout');
