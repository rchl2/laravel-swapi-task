<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Resources\ResourceController;

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

    // Resource controllers.
    Route::get('/films', [ResourceController::class, 'getUserFilms']);
    Route::get('/species', [ResourceController::class, 'getUserSpecies']);
    Route::get('/vehicles', [ResourceController::class, 'getUserVehicles']);
    Route::get('/starships', [ResourceController::class, 'getUserStarships']);
    Route::get('/planets', [ResourceController::class, 'getUserPlanets']);
});
