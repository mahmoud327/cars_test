<?php

use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\CarController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CityController;
use App\Http\Controllers\Admin\CompanyController;
use App\Http\Controllers\Admin\FeatureController;
use App\Http\Controllers\Admin\FeatureListingController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\UserController;
use App\Models\Category;
use App\Models\Translation\Category as TranslationCategory;
use Illuminate\Support\Facades\Http;
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
use GuzzleHttp\Client;

 Route::get('test',function(){


    $client = new Client();

    $guzzleResponse = $client->get(
        'https://sayartii.com/carmakes'
    );
if ($guzzleResponse->getStatusCode() == 200) {
    $response = json_decode($guzzleResponse->getBody(),true);



    // Assuming the API response is a JSON array with IDs.
    if (is_array($response)) {
        $ids = array_column($response, 'opts/car.make');
        foreach($ids as $id){
           $category= Category::create([
                'type'=> 'make'
            ]);
            TranslationCategory::create([
                'category_id'=>$category->id,
                'name'=>$id,
                'locale'=>'en'

            ]);
        }
        return $ids;
    }
    // return $response;
}



});
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
        Route::post('company/{id}', [CompanyController::class,'isActive'])
        ->name('company.is-active');

        Route::post('car/{id}/is-active', [CarController::class,'isActive'])
        ->name('car.is-active');

        Route::post('company/{id}/distinguished', [CompanyController::class,'distinguished'])
        ->name('company.is-distinguished');

        Route::post('car/{id}/distinguished', [CarController::class,'distinguished'])
        ->name('car.distinguished');

        Route::resource('categories', CategoryController::class);
        Route::resource('banners', BannerController::class);
        Route::resource('features', FeatureController::class);
        Route::resource('feature.listings', FeatureListingController::class);
        Route::resource('tags', TagController::class);
        Route::resource('pages',PageController::class);
        Route::resource('cities',CityController::class);
        Route::resource('cars', CarController::class);


    });
});
