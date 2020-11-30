<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Resources\FilmController;
use App\Http\Controllers\Resources\PlanetController;
use App\Http\Controllers\Resources\SpeciesController;
use App\Http\Controllers\Resources\VehicleController;
use App\Http\Controllers\Resources\StarshipController;

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

// Authorization routes.
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

// Resources behind authorization.
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/', [AuthController::class, 'authorized']);

    // Update e-mail.
    Route::post('/update-email', [UserController::class, 'updateEmail']);

    // Films.
    Route::get('/films/{id}', [FilmController::class, 'getUserSpecificFilm']);
    Route::get('/films', [FilmController::class, 'getUserFilms']);

    // Species.
    Route::get('/species/{id}', [SpeciesController::class, 'getUserSpecificSpecie']);
    Route::get('/species', [SpeciesController::class, 'getUserSpecies']);

    // Vehicles.
    Route::get('/vehicles/{id}', [VehicleController::class, 'getUserSpecificVehicle']);
    Route::get('/vehicles', [VehicleController::class, 'getUserVehicles']);

    // Starships.
    Route::get('/starships/{id}', [StarshipController::class, 'getUserSpecificStarship']);
    Route::get('/starships', [StarshipController::class, 'getUserStarships']);

    // Planets.
    Route::get('/planets/{id}', [PlanetController::class, 'getUserSpecificPlanet']);
    Route::get('/planets', [PlanetController::class, 'getUserPlanets']);
});
