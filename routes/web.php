<?php

use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\Admin\FeatureController;
use App\Http\Controllers\Admin\FeatureListingController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
 */

Route::redirect('/', 'admin/login-page');

Auth::routes();

Route::get('/home', function () {
    return view('dashboard.index');
})->name('dashboard.index');

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function () {
    Route::get('login-page', 'AuthController@loginPage')->name('admin.login.page');
    Route::post('login', 'AuthController@login')->name('admin.login');
    Route::get('logout', 'AuthController@logout')->name('admin.logout');

    Route::group(['middleware' => ['auth:admins']], function () {

        Route::resource('users', UserController::class);
        Route::resource('companies', CompanyController::class);
        Route::get('company/{id}', [CompanyController::class,'isActive'])
        ->name('company.is-active');


        Route::resource('categories', CategoryController::class);
        Route::resource('features', FeatureController::class);
        Route::resource('feature.listings', FeatureListingController::class);
        Route::resource('tags', TagController::class);
        Route::resource('pages',PageController::class);
        Route::resource('cars', CarController::class);
    });
});
