<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\IndikatorController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\SkalaController;
use App\Http\Controllers\UserController;
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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', [UserController::class, 'login'])->name('login');


Route::group(['middleware' => 'auth:web'], function () {

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

    Route::controller(PegawaiController::class)->prefix('pegawai')->group(function () {
        Route::get('/', 'index')->name('pegawai.index');
        Route::get('/create', 'create')->name('pegawai.create');
        Route::post('/post', 'store')->name('pegawai.store');
        Route::get('/edit/{pegawai}', 'edit')->name('pegawai.edit');
        Route::put('/update/{pegawai}', 'update')->name('pegawai.update');
        Route::delete('/delete/{pegawai}', 'destroy')->name('pegawai.delete');
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

    Route::controller(NilaiController::class)->prefix('nilai')->group(function () {
        Route::get('/', 'index')->name('nilai.index');

        Route::get('/create', 'create')->name('nilai.create');
        Route::post('/post', 'store')->name('nilai.store');
        Route::get('/show/{tanggal}', 'show')->name('nilai.show');
        Route::get('/detail/{id}', 'detail')->name('nilai.detail');
        Route::get('/edit/{nilai}', 'edit')->name('nilai.edit');
        Route::put('/update/{nilai}', 'update')->name('nilai.update');
        Route::delete('/delete/{nilai}', 'destroy')->name('nilai.delete');
    });


    Route::controller(UserController::class)->prefix('user')->group(function () {
        Route::get('/', 'index')->name('user.index');
        Route::get('/create', 'create')->name('user.create');
        Route::post('/post', 'store')->name('user.store');
        Route::get('/edit/{user}', 'edit')->name('user.edit');
        Route::put('/update/{user}', 'update')->name('user.update');
        Route::get('/resetPassword/{user}', 'resetPassword')->name('user.resetpassword');
        Route::delete('/delete/{user}', 'destroy')->name('user.delete');
    });
});
