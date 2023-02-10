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

Route::middleware(['auth', 'isAdmin'])->group(function (){
    Route::resource('plats', PlatController::class)
        ->except(['index', 'show']);
});

Route::middleware(['auth'])->group(function (){
    Route::delete('/logout', [AuthController::class, 'logout'])
        ->name('logout');

    Route::resource('plats', PlatController::class)
        ->only(['show']);
});

Route::middleware(['guest'])->group(function (){
    Route::match(['GET', 'POST'], '/login',[AuthController::class, 'login'])
        ->name('login');

    Route::match(['GET', 'POST'], '/register', [AuthController::class, 'register'])
        ->name('register');

});

    Route::resource('plats', PlatController::class)
        ->only(['index']);
