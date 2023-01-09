<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\MovieController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomepageController::class, 'load_homepage'])->name('home');

# Route untuk Login
Route::get('/login', [AuthController::class, 'loginPage']);
Route::post('/login', [AuthController::class, 'loginMember'])->name('login-post');

# Route untuk Register
Route::get('/register', [AuthController::class, 'registerPage']);
Route::post('/register', [AuthController::class, 'registerMember']);

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// admin
Route::get('/addMovie', [MovieController::class, 'addMoviePage'])->name('add-movie');
Route::post('/addMovie', [MovieController::class, 'addMovie'])->name('add-movie-database');


// Route::get('/login', '\App\Http\Controllers\AuthController@loginPage');
// Route::post('/login', '\App\Http\Controllers\AuthController@loginMember');
// Route::get('/register', '\App\Http\Controllers\AuthController@registerPage');
// Route::post('/register', '\App\Http\Controllers\AuthController@registerMember');



