<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\MealsController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\A7Controller;
use App\Http\Controllers\ReviewController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Die Uebersetzung der URL zu den MVC Controllern
Route::get('/', [HomeController::class, 'index'])
    ->name('home');

Route::get('meals', [MealsController::class, 'index'])
    ->name('meals');

Route::get('reviews', [ReviewController::class, 'index'])
    ->name('reviews');

Route::view('imprint', 'imprint')
    ->name('imprint');

// Laut Aufgabe sollte review.create in die auth-Gruppe,
// allerdings hier auch als Detailseite für alle Nutzer sichtbar (und Review-Formular nur für eingeloggte Nutzer)
Route::get('review/{id}', [ReviewController::class, 'create'])
    ->name('review.create');

Route::group(['middleware' => 'auth'], function() {

    Route::post('review/{id}/store', [ReviewController::class, 'store'])
        ->name('review.store');

    Route::post('review/{id}/update', [ReviewController::class, 'update'])
        ->name('review.update');

    Route::delete('review/{id}/destroy', [ReviewController::class, 'destroy'])
        ->name('review.destroy');

    Route::view('profile', 'profile')
        ->name('profile');

    Route::put('profile', [ProfileController::class, 'update'])
        ->name('profile.update');
});


// Aufgabe 7 (examples)
Route::get('/7a', [A7Controller::class, 'm4_7a_queryparameter']);
Route::get('/7b', [A7Controller::class, 'm4_7b_kategorie']);
Route::get('/7c', [A7Controller::class, 'm4_7c_gerichte']);
Route::get('/7d', [A7Controller::class, 'm4_7d_page_x']);

require __DIR__.'/auth.php';
