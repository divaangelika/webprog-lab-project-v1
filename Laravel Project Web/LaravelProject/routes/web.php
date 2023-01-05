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
// asd
//test1
//test2

Route::get('/', function () {
    return view('homepage.homepage');
});

Route::get('/register', function () {
    return view('register.register');
});

<<<<<<< Updated upstream
// Route::get('/login', function () {
//     return view('login');
//     // return ("test");
// });

# Route untuk Login
Route::get('/login', [AuthController::class, 'loginPage']);
Route::post('/login', [AuthController::class, 'loginMember']);

# Route untuk Register
Route::get('/register', [AuthController::class, 'registerPage']);
Route::post('/register', [AuthController::class, 'registerMember']);
=======
Route::get('/login', function () {
    return view('login.login');
});
>>>>>>> Stashed changes



