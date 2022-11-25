<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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


Route::apiResource('reservation', App\Http\Controllers\ReservationController::class);

Route::apiResource('film', App\Http\Controllers\FilmController::class);

Route::apiResource('cinema', App\Http\Controllers\CinemaController::class);

Route::apiResource('salle', App\Http\Controllers\SalleController::class);

Route::apiResource('seance', App\Http\Controllers\SeanceController::class);

Route::apiResource('friandise', App\Http\Controllers\FriandiseController::class);


//Route::apiResource('reservation', App\Http\Controllers\ReservationController::class);
//
//Route::apiResource('film', App\Http\Controllers\FilmController::class);
//
//Route::apiResource('cinema', App\Http\Controllers\CinemaController::class);
//
//Route::apiResource('salle', App\Http\Controllers\SalleController::class);
//
//Route::apiResource('seance', App\Http\Controllers\SeanceController::class);
//
//Route::apiResource('friandise', App\Http\Controllers\FriandiseController::class);
//
//
//Route::apiResource('reservation', App\Http\Controllers\ReservationController::class);
//
//Route::apiResource('film', App\Http\Controllers\FilmController::class);
//
//Route::apiResource('cinema', App\Http\Controllers\CinemaController::class);
//
//Route::apiResource('salle', App\Http\Controllers\SalleController::class);
//
//Route::apiResource('seance', App\Http\Controllers\SeanceController::class);
//
//Route::apiResource('friandise', App\Http\Controllers\FriandiseController::class);
//
//
//Route::apiResource('reservation', App\Http\Controllers\ReservationController::class);
//
//Route::apiResource('film', App\Http\Controllers\FilmController::class);
//
//Route::apiResource('cinema', App\Http\Controllers\CinemaController::class);
//
//Route::apiResource('salle', App\Http\Controllers\SalleController::class);
//
//Route::apiResource('seance', App\Http\Controllers\SeanceController::class);
//
//Route::apiResource('friandise', App\Http\Controllers\FriandiseController::class);
//
//
//Route::apiResource('reservation', App\Http\Controllers\ReservationController::class);
//
//Route::apiResource('film', App\Http\Controllers\FilmController::class);
//
//Route::apiResource('cinema', App\Http\Controllers\CinemaController::class);
//
//Route::apiResource('salle', App\Http\Controllers\SalleController::class);
//
//Route::apiResource('seance', App\Http\Controllers\SeanceController::class);
//
//Route::apiResource('friandise', App\Http\Controllers\FriandiseController::class);
//
//
//Route::apiResource('reservation', App\Http\Controllers\ReservationController::class);
//
//Route::apiResource('film', App\Http\Controllers\FilmController::class);
//
//Route::apiResource('cinema', App\Http\Controllers\CinemaController::class);
//
//Route::apiResource('salle', App\Http\Controllers\SalleController::class);
//
//Route::apiResource('seance', App\Http\Controllers\SeanceController::class);
//
//Route::apiResource('friandise', App\Http\Controllers\FriandiseController::class);
//
//
//Route::apiResource('reservation', App\Http\Controllers\ReservationController::class);
//
//Route::apiResource('film', App\Http\Controllers\FilmController::class);
//
//Route::apiResource('cinema', App\Http\Controllers\CinemaController::class);
//
//Route::apiResource('salle', App\Http\Controllers\SalleController::class);
//
//Route::apiResource('seance', App\Http\Controllers\SeanceController::class);
//
//Route::apiResource('friandise', App\Http\Controllers\FriandiseController::class);
//
//
//Route::apiResource('reservation', App\Http\Controllers\ReservationController::class);
//
//Route::apiResource('film', App\Http\Controllers\FilmController::class);
//
//Route::apiResource('cinema', App\Http\Controllers\CinemaController::class);
//
//Route::apiResource('salle', App\Http\Controllers\SalleController::class);
//
//Route::apiResource('seance', App\Http\Controllers\SeanceController::class);
//
//Route::apiResource('friandise', App\Http\Controllers\FriandiseController::class);
//
//
//Route::apiResource('reservation', App\Http\Controllers\ReservationController::class);
//
//Route::apiResource('film', App\Http\Controllers\FilmController::class);
//
//Route::apiResource('cinema', App\Http\Controllers\CinemaController::class);
//
//Route::apiResource('salle', App\Http\Controllers\SalleController::class);
//
//Route::apiResource('seance', App\Http\Controllers\SeanceController::class);
//
//Route::apiResource('friandise', App\Http\Controllers\FriandiseController::class);
//
//
//Route::apiResource('reservation', App\Http\Controllers\ReservationController::class);
//
//Route::apiResource('film', App\Http\Controllers\FilmController::class);
//
//Route::apiResource('cinema', App\Http\Controllers\CinemaController::class);
//
//Route::apiResource('salle', App\Http\Controllers\SalleController::class);
//
//Route::apiResource('seance', App\Http\Controllers\SeanceController::class);
//
//Route::apiResource('friandise', App\Http\Controllers\FriandiseController::class);
//
//
//Route::apiResource('reservation', App\Http\Controllers\ReservationController::class);
//
//Route::apiResource('film', App\Http\Controllers\FilmController::class);
//
//Route::apiResource('cinema', App\Http\Controllers\CinemaController::class);
//
//Route::apiResource('salle', App\Http\Controllers\SalleController::class);
//
//Route::apiResource('seance', App\Http\Controllers\SeanceController::class);
//
//Route::apiResource('friandise', App\Http\Controllers\FriandiseController::class);
//
//
//Route::apiResource('reservation', App\Http\Controllers\ReservationController::class);
//
//Route::apiResource('film', App\Http\Controllers\FilmController::class);
//
//Route::apiResource('cinema', App\Http\Controllers\CinemaController::class);
//
//Route::apiResource('salle', App\Http\Controllers\SalleController::class);
//
//Route::apiResource('seance', App\Http\Controllers\SeanceController::class);
//
//Route::apiResource('friandise', App\Http\Controllers\FriandiseController::class);
//
//
//Route::apiResource('reservation', App\Http\Controllers\ReservationController::class);
//
//Route::apiResource('film', App\Http\Controllers\FilmController::class);
//
//Route::apiResource('cinema', App\Http\Controllers\CinemaController::class);
//
//Route::apiResource('salle', App\Http\Controllers\SalleController::class);
//
//Route::apiResource('seance', App\Http\Controllers\SeanceController::class);
//
//Route::apiResource('friandise', App\Http\Controllers\FriandiseController::class);
