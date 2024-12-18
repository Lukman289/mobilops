<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\JadwalServiceController;
use App\Http\Controllers\KantorController;
use App\Http\Controllers\KendaraanController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PemesananController;
use App\Http\Controllers\UserController;
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
    return view('index');
});

Route::get('/login', [AuthController::class,'index'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.auth');    
Route::get('/logout', [AuthController::class,'logout'])->name('logout');

Route::group(['middleware' => ['auth', 'checkRole:admin'] ,'prefix'=> 'admin'], function () {
    Route::get('/', [AdminController::class, 'index'])->name('dashboard');

    Route::get('/kendaraan', [KendaraanController::class, 'index'])->name('kendaraan');
    Route::get('/kendaraan/add', [KendaraanController::class, 'create'])->name('kendaraan.create');
    Route::post('/kendaraan/add', [KendaraanController::class, 'store'])->name('kendaraan.store');
    Route::get('/kendaraan/detail/{id}', [KendaraanController::class, 'show'])->name('kendaraan.show');
    Route::get('/kendaraan/edit/{id}', [KendaraanController::class, 'edit'])->name('kendaraan.edit');
    Route::put('/kendaraan/edit/{id}', [KendaraanController::class, 'update'])->name('kendaraan.update');
    Route::delete('/kendaraan/{id}', [KendaraanController::class,'destroy'])->name('kendaraan.delete');
    
    Route::get('/pegawai', [PegawaiController::class, 'index'])->name('pegawai');
    Route::get('/pegawai/add', [PegawaiController::class, 'create'])->name('pegawai.create');
    Route::post('/pegawai/add', [PegawaiController::class, 'store'])->name('pegawai.store');
    Route::get('/pegawai/detail/{id}', [PegawaiController::class, 'show'])->name('pegawai.show');
    Route::get('/pegawai/edit/{id}', [PegawaiController::class, 'edit'])->name('pegawai.edit');
    Route::put('/pegawai/edit/{id}', [PegawaiController::class, 'update'])->name('pegawai.update');
    Route::delete('/pegawai/{id}', [PegawaiController::class,'destroy'])->name('pegawai.delete');

    Route::get('/pemesanan', [PemesananController::class, 'index'])->name('pemesanan');
    Route::get('/pemesanan/add', [PemesananController::class, 'create'])->name('pemesanan.create');
    Route::post('/pemesanan/add', [PemesananController::class, 'store'])->name('pemesanan.store');
    Route::get('/pemesanan/detail/{id}', [PemesananController::class, 'show'])->name('pemesanan.show');
    Route::get('/pemesanan/edit/{id}', [PemesananController::class, 'edit'])->name('pemesanan.edit');
    Route::put('/pemesanan/edit/{id}', [PemesananController::class, 'update'])->name('pemesanan.update');
    Route::delete('/pemesanan/{id}', [PemesananController::class,'destroy'])->name('pemesanan.delete');
    
    Route::get('/kantor', [KantorController::class, 'index'])->name('kantor');
    Route::get('/kantor/add', [KantorController::class, 'create'])->name('kantor.create');
    Route::post('/kantor/add', [KantorController::class, 'store'])->name('kantor.store');
    Route::get('/kantor/detail/{id}', [KantorController::class, 'show'])->name('kantor.show');
    Route::get('/kantor/edit/{id}', [KantorController::class, 'edit'])->name('kantor.edit');
    Route::put('/kantor/edit/{id}', [KantorController::class, 'update'])->name('kantor.update');
    Route::delete('/kantor/{id}', [KantorController::class,'destroy'])->name('kantor.delete');

    Route::get('/service', [JadwalServiceController::class, 'index'])->name('service');
    Route::get('/service/add', [JadwalServiceController::class, 'create'])->name('service.create');
    Route::post('/service/add', [JadwalServiceController::class, 'store'])->name('service.store');
    Route::get('/service/detail/{id}', [JadwalServiceController::class, 'show'])->name('service.show');
    Route::get('/service/edit/{id}', [JadwalServiceController::class, 'edit'])->name('service.edit');
    Route::put('/service/edit/{id}', [JadwalServiceController::class, 'update'])->name('service.update');
    Route::delete('/service/{id}', [JadwalServiceController::class,'destroy'])->name('service.delete');
    
    Route::get('/user', [UserController::class, 'index'])->name('user');
    Route::get('/user/add', [UserController::class, 'create'])->name('user.create');
    Route::post('/user/add', [UserController::class, 'store'])->name('user.store');
    Route::get('/user/detail/{id}', [UserController::class, 'show'])->name('user.show');
    Route::get('/user/edit/{id}', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/user/edit/{id}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/user/{id}', [UserController::class,'destroy'])->name('user.delete');
});

Route::group(['middleware' => ['auth', 'checkRole:validator'] ,'prefix'=> 'validator'], function () {
    Route::get('/', [ValidatorController::class,'index']);
    Route::post('/validator', [ValidatorController::class,'approve'])->name('validator.approve');
});

