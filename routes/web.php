<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('auth.index');
});

Route::get('/admin', function () {
    return view('admin.index');
});

Route::get('/validator', function () {
    return view('validator.index');
});

// Route::get('/admin')->middleware('auth')->group(function () {
//     Route::get('/', 'AdminController@index');
//     Route::get('/dashboard', 'AdminController@dashboard');
//     Route::get('/profile', 'AdminController@profile');
//     Route::get('/settings', 'AdminController@settings');
// });
