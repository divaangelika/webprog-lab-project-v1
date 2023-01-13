<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\MovieController;
use App\Http\Controllers\ActorController;
use App\Http\Middleware\AdminMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', [MovieController::class, 'home'])->name('home');

# Route untuk Login
Route::get('/login', [AuthController::class, 'loginPage']);
Route::post('/login', [AuthController::class, 'loginMember'])->name('login-post');

# Route untuk Register
Route::get('/register', [AuthController::class, 'registerPage']);
Route::post('/register', [AuthController::class, 'registerMember']);

Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/movies/detail/{id}', [MovieController::class, 'movieDetail']);

Route::post('/movies/deletemovie/{id}', [MovieController::class, 'deleteMovie']);

Route::get('/actors', [ActorController::class, 'actorpage']);
Route::get('/actors/detail/{id}', [ActorController::class, 'actordetail']);

Route::get('/actors/search', [ActorController::class, 'searchactor']);

Route::middleware([AdminMiddleware::class])->group(function () {
    Route::get('/movies/addmovie', [MovieController::class, 'addMoviePage']);
    Route::post('/movies/addmovie', [MovieController::class, 'addMovie']);

    Route::get('movies/editmovies/{id}', [MovieController::class, 'editMoviePage']);
    Route::post('movies/editmovies/{id}', [MovieController::class, 'editMovie']);

    Route::post('movies/deletemovie/{id}', [MovieController::class, 'deleteMovie']);

    Route::get('/actors/addactor', [ActorController::class, 'addactorpage']);
    Route::post('/actors/addactor', [ActorController::class, 'addactor']);

    Route::get('/actors/{id}/editactor', [ActorController::class, 'editactorpage']);
    Route::post('/actors/{id}/editactor', [ActorController::class, 'editactor']);

    Route::delete('/actors/delete/{id}', [ActorController::class, 'deleteactor']);
});





