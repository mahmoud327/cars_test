<?php

use App\Http\Controllers\Api\CarController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\CityController;
use App\Http\Controllers\Api\CompanyCarController;
use App\Http\Controllers\Api\CompanyController;
use App\Http\Controllers\Api\FeatureController;
use App\Http\Controllers\Api\TagController;
use App\Http\Controllers\Api\UserCarController;
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




    // Route::apiResource('categories', CatgoryController::class);
    // Route::apiResource('brands',    BrandController::class);
    Route::apiResource('cities', CityController::class);
    Route::get('categories', [CategoryController::class, 'index']);
    Route::get('features', [FeatureController::class, 'index']);
    Route::get('features', [FeatureController::class, 'index']);

    Route::get('tags', [TagController::class, 'index']);
    Route::apiResource('cars', CarController::class)->except('store');

    

    Route::post('user', [UserCarController::class, 'show'])->middleware('auth:api');

    Route::prefix('user')->group(['middleware' => ['auth:api']], function () {

        Route::post('cars', UserCarController::class)->except('store');
    });



    Route::prefix('company')->group(['middleware' => ['auth:company']], function () {

        Route::apiResource('cars', CompanyCarController::class);
    });
    Route::post('company', [CompanyController::class, 'store']);
    Route::get('company', [CompanyController::class, 'show'])->middleware('auth:company');
});
