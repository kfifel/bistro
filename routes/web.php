<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::resource('plats', \App\Http\Controllers\PlatController::class)
    ->except([
        'index', 'show'
    ])
    ->middleware(['auth']);
Route::resource('plats', \App\Http\Controllers\PlatController::class)
    ->only([
        'show'
    ]);

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');
