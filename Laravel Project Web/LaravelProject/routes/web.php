<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

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


Route::get('/', function () {
    return view('homepage.homepage');
});

# Route untuk Login
// Route::get('/login', [AuthController::class, 'loginPage']);
// Route::post('/login', [AuthController::class, 'loginMember']);

// Route::get('/login', 'AuthController@loginPage');
// Route::post('/login', 'AuthController@loginMember');

# Route untuk Register
// Route::get('/register', [AuthController::class, 'registerPage']);
// Route::post('/register', [AuthController::class, 'registerMember']);


// Route::get('/register', 'AuthController@registerPage');
// Route::post('/register', 'AuthController@registerMember');

Route::get('/login', '\App\Http\Controllers\AuthController@loginPage');
Route::post('/login', '\App\Http\Controllers\AuthController@loginMember');

Route::get('/register', '\App\Http\Controllers\AuthController@registerPage');
Route::post('/register', '\App\Http\Controllers\AuthController@registerMember');


