<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChirpController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('chirps', [ChirpController::class, 'index']);
Route::post('chirps', [ChirpController::class, 'store']);
Route::put('chirps/{chirp}/update', [ChirpController::class, 'update']);
Route::delete('chirps/{chirp}/delete', [ChirpController::class, 'destroy']);