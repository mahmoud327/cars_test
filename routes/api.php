<?php

use App\Http\Controllers\Api\BrandController;
use App\Http\Controllers\Api\CatgoryController;
use App\Http\Controllers\Api\CityController;
use App\Http\Controllers\Api\leagueTournamentController;
use App\Http\Controllers\Api\leagueTournamentGroupController;
use App\Http\Controllers\Api\leagueTournamentMediaController;
use App\Http\Controllers\Api\MatchController;
use App\Http\Controllers\Api\MatchEnController;
use App\Http\Controllers\Api\MatchVideoController;
use App\Http\Controllers\Api\NewController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\StatisticsLeagueTournamentController;
use App\Http\Controllers\Api\TeamController;
use App\Http\Controllers\Api\TournamentNewController;
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
Route::group(['prefix' => 'v1', 'middleware' => ['lang']], function () {




    Route::apiResource('categories', CatgoryController::class);
    Route::apiResource('brands',    BrandController::class);
    Route::apiResource('cities', CityController::class);
});
