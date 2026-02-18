<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\MembershipController;

// Bungkus rute Auth dalam satu controller
Route::controller(AuthController::class)->group(function () {
    // Register
    Route::get('/register', 'showRegister')->name('register.show');
    Route::post('/register', 'register')->name('register.perform');

    // Login
    Route::get('/login', 'showLogin')->name('login.show');
    Route::post('/login', 'login')->name('login.perform');

    // Logout
    Route::post('/logout', 'logout')->name('logout');
});

// Membership CRUD 
Route::resource('memberships', MembershipController::class);
