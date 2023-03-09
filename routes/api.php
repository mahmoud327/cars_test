<?php

use App\Http\Controllers\Api\CatgoryController;
use App\Http\Controllers\Api\MatchController;
use App\Http\Controllers\Api\MatchVideoController;
use App\Http\Controllers\Api\PostController;
use App\Http\Controllers\Api\TeamController;
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
Route::group(['prefix' => 'v1', 'middleware' => ['cors', 'lang']], function () {

    Route::apiResource('posts', PostController::class);
    Route::get('matches', [MatchController::class, 'index']);
    Route::get('match/{id}/{slug1}/{slug2}/{slug3}/{slug4}', [MatchController::class, 'show'])->middleware('cors');
    Route::get('all-matches', [MatchController::class, 'allMatch']);
    Route::get('all-tournaments', [MatchController::class, 'allTournament']);

    Route::get('match-videos',[MatchVideoController::class,'index']);
    Route::apiResource('categories', CatgoryController::class);
});
