<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Support\Facades\Route;

// register
Route::get('register', [RegisteredUserController::class, 'create'])
                ->middleware('guest')
                ->name('register');

// validate register
Route::post('register', [RegisteredUserController::class, 'store'])
                ->middleware('guest');

// Konto löschen
Route::post('deleteAccount', [RegisteredUserController::class, 'delete'])
                ->middleware('auth')
                ->name('deleteAccount');

// login
Route::get('login', [AuthenticatedSessionController::class, 'create'])
                ->middleware('guest')
                ->name('login');

// validate login
Route::post('login', [AuthenticatedSessionController::class, 'store'])
                ->middleware('guest');

// logout
Route::get('logout', [AuthenticatedSessionController::class, 'destroy'])
                ->middleware('auth')
                ->name('logout');
