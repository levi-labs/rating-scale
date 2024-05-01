<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\KriteriaController;
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
