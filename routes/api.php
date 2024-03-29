<?php

use App\Http\Controllers\Api\BannerController;
use App\Http\Controllers\Api\CarController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\CityController;
use App\Http\Controllers\Api\CompanyCarController;
use App\Http\Controllers\Api\CompanyController;
use App\Http\Controllers\Api\FeatureController;
use App\Http\Controllers\Api\TagController;
use App\Http\Controllers\Api\User\Auth\AuthController;
use App\Http\Controllers\Api\UserCarController;
use App\Http\Controllers\Api\WishlistCompanyController;
use App\Http\Controllers\Api\WishlistUserController;
use App\Models\Car;
use App\Models\Setting;
use App\Models\Wishlist;
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

    Route::get('views', function () {
        $setting = Setting::find(1);

        $setting->increment('views');
        return sendJsonResponse([
            'views' => $setting->views,
            'cars' => Car::count()
        ]);
    });

    Route::apiResource('cities', CityController::class);
    Route::get('users/cars', [UserCarController::class,'allCar']);

    Route::apiResource('banners', BannerController::class);
    Route::get('categories', [CategoryController::class, 'index']);
    Route::get('models/{make_id}', [CategoryController::class, 'models']);

    Route::get('features', [FeatureController::class, 'index']);
    Route::get('tags', [TagController::class, 'index']);
    Route::apiResource('cars', CarController::class);

    Route::group(['middleware' => ['auth:api']], function () {
        Route::post('user/cars', [UserCarController::class, 'store']);
        Route::get('user/cars', [UserCarController::class, 'index']);
        Route::post('user', [AuthController::class, 'show']);
        Route::get('car/{car_id}/active', [UserCarController::class, 'active']);
        Route::get('mywishlist', [WishlistUserController::class, 'index']);
        Route::post('wishlist', [WishlistUserController::class, 'wishlist']);
        Route::post('not-wishlist', [WishlistUserController::class, 'notWishlist']);
    });
    Route::post('company', [CompanyController::class, 'store']);

    Route::get('companies', [CompanyController::class, 'index']);
    Route::post('company/login', [CompanyController::class, 'login']);
    Route::get('company-details/{id}', [CompanyController::class, 'companyDetail']);
    Route::group(['middleware' => ['auth:company']], function () {
        Route::apiResource('company/cars', CompanyCarController::class);
        Route::get('company', [CompanyController::class, 'show']);
        Route::get('company/mywishlist', [WishlistCompanyController::class, 'index']);
        Route::post('company/wishlist', [WishlistCompanyController::class, 'wishlist']);
        Route::post('company/not-wishlist', [WishlistCompanyController::class, 'notWishlist']);


        Route::put('company', [CompanyController::class, 'update']);
    });

});
