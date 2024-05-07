<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IndikatorController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\SkalaController;
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

Route::controller(DashboardController::class)->prefix('dashboard')->group(function () {
    Route::get('/', 'index')->name('dashboard');
});

Route::controller(KriteriaController::class)->prefix('kriteria')->group(function () {
    Route::get('/', 'index')->name('kriteria.index');
    Route::get('/create', 'create')->name('kriteria.create');
    Route::post('/post', 'store')->name('kriteria.store');
    Route::get('/edit/{kriteria}', 'edit')->name('kriteria.edit');
    Route::put('/update/{kriteria}', 'update')->name('kriteria.update');
    Route::delete('/delete/{kriteria}', 'destroy')->name('kriteria.delete');
});

Route::controller(IndikatorController::class)->prefix('indikator')->group(function () {
    Route::get('/', 'index')->name('indikator.index');
    Route::get('/create', 'create')->name('indikator.create');
    Route::post('/post', 'store')->name('indikator.store');
    Route::get('/edit/{indikator}', 'edit')->name('indikator.edit');
    Route::put('/update/{indikator}', 'update')->name('indikator.update');
    Route::delete('/delete/{indikator}', 'destroy')->name('indikator.delete');
});

Route::controller(SkalaController::class)->prefix('skala')->group(function () {
    Route::get('/', 'index')->name('skala.index');
    Route::get('/create', 'create')->name('skala.create');
    Route::post('/post', 'store')->name('skala.store');
    Route::get('/edit/{skala}', 'edit')->name('skala.edit');
    Route::put('/update/{skala}', 'update')->name('skala.update');
    Route::delete('/delete/{skala}', 'destroy')->name('skala.delete');
});
