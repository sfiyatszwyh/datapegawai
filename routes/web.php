<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\DashboardController;

Route::group(["middleware" => ["auth", 'cekrole:admin']], function(){
    //dashboard
    Route::get('/dashboard', [DashboardController::class,'index']);

    //data pegawai
    Route::get('/datapegawai', [PegawaiController::class, 'index']);
    Route::get('/datapegawai/create', [PegawaiController::class, 'create']);
    Route::post('/datapegawai', [PegawaiController::class, 'store']);
    Route::get('/datapegawai/{pegawai}', [PegawaiController::class, 'show']);
    Route::get('/datapegawai/{pegawai}/edit', [PegawaiController::class, 'edit']);
    Route::put('/datapegawai/{pegawai}', [PegawaiController::class, 'update']);
    Route::delete('/datapegawai/{pegawai}', [PegawaiController::class, 'destroy']);
});


//route landing page home
Route::get('/', function () {
    return view('landingpage.home');
});

//route landing page about
Route::get('/about', function () {
    return view('landingpage.about');
});

//route landing page service
Route::get('/service', function () {
    return view('landingpage.service');
});

//route landing page contact
Route::get('/contact', function () {
    return view('landingpage.contact');
});

//route login-logout
Route::get('/login', function () {
    return view('auth.login');
})->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout']);

