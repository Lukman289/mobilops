<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ValidatorController;
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

Route::get('/login', [AuthController::class,'index'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.auth');    
Route::get('/logout', [AuthController::class,'logout'])->name('logout');

Route::group(['middleware' => ['auth', 'checkRole:admin'] ,'prefix'=> 'admin'], function () {
    Route::get('/', [AdminController::class, 'index']);
});

Route::group(['middleware' => ['auth', 'checkRole:validator'] ,'prefix'=> 'validator'], function () {
    Route::get('/', [ValidatorController::class,'index']);
});

