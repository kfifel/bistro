<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PlatController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [ HomeController::class, 'home'] )
    ->name('home');

Route::get('/about', [ HomeController::class, 'about'] )
    ->name('about');

Route::resource('plats', PlatController::class)
    ->only(['index']);

Route::middleware(['auth', 'isAdmin'])->group(function (){
    Route::resource('plats', PlatController::class)
        ->except(['index', 'show']);

    Route::get('/plats/deleted', [PlatController::class, 'showPlatsDeleted'])
        ->name('plats.deleted');

    Route::delete('/plats/{plat}/force-delete', [PlatController::class, 'forceDelete'])
        ->name('plats.forceDelete');

    Route::post('/plats/{plat}/restore', [PlatController::class, 'restore'])
        ->name('plats.restore');

});

Route::middleware(['auth'])->group(function (){
    Route::delete('/logout', [AuthController::class, 'logout'])
        ->name('logout');

    Route::resource('plats', PlatController::class)
        ->only(['show']);

    Route::get('profile', [UserController::class, 'index'])
        ->name('profile.index');

    Route::put('/profile/password', [UserController::class, 'updatePassword'])
        ->name('profile.update.password');

    Route::put('/profile', [UserController::class, 'updateProfile'])
        ->name('profile.update');

});

Route::middleware(['guest'])->group(function (){
    Route::match(['GET', 'POST'], '/login',[AuthController::class, 'login'])
        ->name('login');

    Route::match(['GET', 'POST'], '/register', [AuthController::class, 'register'])
        ->name('register');

    Route::get('/forgot-password', function () {
        return view('auth.forgot-password');
    })->name('password.request');

    Route::post('/forget-password', [AuthController::class, 'resetPassword'])
        ->name('password.email');

    Route::get('/reset-password/{token}', function ($token) {
        return view('auth.reset-password', ['token' => $token]);
    })->name('password.reset');

    Route::post('/reset-password/{token}', [AuthController::class, 'updatePassword'])
        ->name('password.update');
});

