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

Route::get('/kriteria', [App\Http\Controllers\Api\KriteriaApiController::class, 'index']);
Route::get('/kriteria/{id}', [App\Http\Controllers\Api\KriteriaApiController::class, 'show']);
Route::post('/kriteria', [App\Http\Controllers\Api\KriteriaApiController::class, 'store']);
Route::put('/kriteria/{id}', [App\Http\Controllers\Api\KriteriaApiController::class, 'update']);
Route::delete('/kriteria/{id}', [App\Http\Controllers\Api\KriteriaApiController::class, 'destroy']);
