<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
// Route::middleware('jwt.verify')->get('test', function (Request $request) {
//     return 'success';
// });

Route::post('/login', [App\Http\Controllers\Api\UserApiController::class, 'login']);
Route::group(['middleware' => ['jwt.verify']], function ($router) {
    Route::get('dashboard', [App\Http\Controllers\Api\DashboardApiController::class, 'index']);
    Route::get('/kriteria', [App\Http\Controllers\Api\KriteriaApiController::class, 'index']);
    Route::get('/kriteria/{id}', [App\Http\Controllers\Api\KriteriaApiController::class, 'show']);
    Route::post('/kriteria', [App\Http\Controllers\Api\KriteriaApiController::class, 'store']);
    Route::put('/kriteria/{id}', [App\Http\Controllers\Api\KriteriaApiController::class, 'update']);
    Route::delete('/kriteria/{id}', [App\Http\Controllers\Api\KriteriaApiController::class, 'destroy']);

    Route::controller(App\Http\Controllers\Api\IndikatorApiController::class)->prefix('indikator')->group(function () {
        Route::get('/', 'index');
        Route::get('/kriteria/{id}', 'getIndikatorByKriteria');
        Route::get('/{id}', 'show');
        Route::post('/', 'store');
        Route::put('/{id}', 'update');
        Route::delete('/{id}', 'destroy');
    });

    Route::controller(App\Http\Controllers\Api\SkalaApiController::class)->prefix('skala')->group(function () {
        Route::get('/', 'index');
        Route::get('/{id}', 'show');
        Route::post('/', 'store');
        Route::put('/{id}', 'update');
        Route::delete('/{id}', 'destroy');
    });

    Route::controller(App\Http\Controllers\Api\PegawaiApiController::class)->prefix('pegawai')->group(function () {
        Route::get('/', 'index');
        Route::get('/{id}', 'show');
        Route::post('/', 'store');
        Route::put('/{id}', 'update');
        Route::delete('/{id}', 'destroy');
    });
    Route::controller(App\Http\Controllers\Api\NilaiApiController::class)->prefix('nilai')->group(function () {
        Route::get('/', 'index');
        Route::get('/{id}', 'show');
        Route::post('/', 'store');
        Route::put('/{id}', 'update');
        Route::delete('/{id}', 'destroy');
    });






    Route::post('logout', [App\Http\Controllers\Api\UserApiController::class, 'logout']);
});
