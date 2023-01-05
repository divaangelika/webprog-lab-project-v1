<?php

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
    return view('partials.headerUnregister');
    // return view('layout.main');
    // return view('test');
    // return 'test';
    // return view('master.master');
    // return view('unregister.unregister_homepage');
});

Route::get('/register', function () {
    return view('register');
});

Route::get('/login', function () {
    return view('login');
    // return ("test");
});



