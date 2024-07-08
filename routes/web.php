<?php

use App\Http\Controllers\AlternatifController;
use App\Http\Controllers\KriteriaController; 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\AlternatifKriteriaController;
use App\Http\Controllers\PerhitunganController;




/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application.
| These routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('landingpage');
});


Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login-proses', [LoginController::class, 'login_proses'])->name('login-proses');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/register', [LoginController::class, 'register'])->name('register');
Route::post('/register-proses', [LoginController::class, 'register_proses'])->name('register-proses');

Route::group(['prefix' => 'admin', 'middleware' => ['auth'], 'as' => 'admin.'], function () {
    Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');

    Route::get('/user', [HomeController::class, 'index'])->name('index');
    Route::get('/create', [HomeController::class, 'create'])->name('user.create');
    Route::post('/store', [HomeController::class, 'store'])->name('user.store');

    Route::get('/edit/{id}', [HomeController::class, 'edit'])->name('user.edit');
    Route::put('/update/{id}', [HomeController::class, 'update'])->name('user.update');
    Route::delete('/delete/{id}', [HomeController::class, 'delete'])->name('user.delete');

    Route::get('/alternatif', [AlternatifController::class, 'index'])->name('alternatif.index');
    Route::get('/alternatif/create', [AlternatifController::class, 'create'])->name('alternatif.create');
    Route::post('/alternatif/store', [AlternatifController::class, 'store'])->name('alternatif.store');

    Route::get('/alternatif/edit/{id}', [AlternatifController::class, 'edit'])->name('alternatif.edit');
    Route::put('/alternatif/update/{id}', [AlternatifController::class, 'update'])->name('alternatif.update');
    Route::delete('/alternatif/delete/{id}', [AlternatifController::class, 'delete'])->name('alternatif.delete');

    Route::get('/kriteria', [KriteriaController::class, 'index'])->name('kriteria.index');
    Route::get('/kriteria/create', [KriteriaController::class, 'create'])->name('kriteria.create');
    Route::post('/kriteria/store', [KriteriaController::class, 'store'])->name('kriteria.store');

    Route::get('/kriteria/edit/{id}', [KriteriaController::class, 'edit'])->name('kriteria.edit');
    Route::put('/kriteria/update/{id}', [KriteriaController::class, 'update'])->name('kriteria.update');
    Route::delete('/kriteria/delete/{id}', [KriteriaController::class, 'delete'])->name('kriteria.delete');

    Route::get('/alternatif_kriteria', [AlternatifKriteriaController::class, 'index'])->name('alternatif_kriteria.index');
    Route::get('/alternatif_kriteria/create', [AlternatifKriteriaController::class, 'create'])->name('alternatif_kriteria.create');
    Route::post('/alternatif_kriteria/store', [AlternatifKriteriaController::class, 'store'])->name('alternatif_kriteria.store');
    Route::get('/alternatif_kriteria/{id}/edit', [AlternatifKriteriaController::class, 'edit'])->name('alternatif_kriteria.edit');
    Route::put('/alternatif_kriteria/{id}', [AlternatifKriteriaController::class, 'update'])->name('alternatif_kriteria.update');
    Route::delete('/alternatif_kriteria/{id}', [AlternatifKriteriaController::class, 'delete'])->name('alternatif_kriteria.delete');

    Route::get('/perhitungan', [PerhitunganController::class, 'index'])->name('perhitungan.index');
    Route::get('/perhitungan/calculate', [PerhitunganController::class, 'calculate'])->name('perhitungan.calculate');
    Route::get('/perhitungan/ranking', [PerhitunganController::class, 'ranking'])->name('perhitungan.ranking');

});
