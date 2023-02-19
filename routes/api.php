<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\ActorController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\api\PeliculaController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::apiResource('peliculas', PeliculaController::class);
Route::post('login', [LoginController::class, 'login']);
Route::get('peliculas/{id}/actors',[PeliculaController::class,'actores']);
Route::get('peliculas/{id}/directors',[PeliculaController::class,'directores']);
