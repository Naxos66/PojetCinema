<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\CinemaController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('reservations', App\Http\Controllers\API\ReservationController::class);
Route::apiResource('cinemas', App\Http\Controllers\API\CinemaController::class);
Route::apiResource('films', \App\Http\Controllers\API\FilmController::class);
Route::apiResource('salles', \App\Http\Controllers\API\SalleController::class);
Route::apiResource('seances', App\Http\Controllers\API\SeanceController::class);
Route::apiResource('friandises', App\Http\Controllers\API\FriandiseController::class);
Route::apiResource('users', App\Http\Controllers\API\UserController::class);

Route::group(['prefix' => 'v1'], function (){
    Route::post('register', [\App\Http\Controllers\API\RegisterController::class, 'register'])->name('register');
    Route::post('login', [\App\Http\Controllers\API\RegisterController::class, 'login'])->name('login');
});
